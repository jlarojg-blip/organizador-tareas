<?php

namespace App\Controllers;
use App\Models\UsuarioModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('inicio');
    }


        public function login(): string
    {
        return view('login');
    }

    public function registro(): string
    {
        return view('registro');
    }

public function guardarRegistro()
{
    $reglas = [
        'nombre'     => 'required|min_length[2]',
        'correo'     => 'required|valid_email|is_unique[usuarios.correo]',
        'contrasena' => 'required|min_length[8]',
    ];

    if (! $this->validate($reglas)) {
        return redirect()->back()
            ->withInput()
            ->with('errores', $this->validator->getErrors());
    }

    $codigo = bin2hex(random_bytes(32));
    $usuarios = new UsuarioModel();

    $usuarios->insert([
        'nombre'            => $this->request->getPost('nombre'),
        'correo'            => $this->request->getPost('correo'),
        'contrasena'        => password_hash(
            $this->request->getPost('contrasena'),
            PASSWORD_DEFAULT
        ),
        'activo'            => 0,
        'codigo_activacion' => hash('sha256', $codigo),
    ]);

    $enlace = site_url('activar-cuenta/' . $codigo);

    $email = service('email');
    $email->setTo($this->request->getPost('correo'));
    $email->setSubject('Activa tu cuenta');
    $email->setMessage(
        "Para activar tu cuenta, abre este enlace:\n\n" . $enlace
    );

    if (! $email->send()) {
        log_message('error', 'No se pudo enviar el correo de activación.');
        return redirect()->to(site_url('login'))
            ->with('error', 'No se pudo enviar el correo de activación.');
    }

    return redirect()->to(site_url('login'))
        ->with('mensaje', 'Revisa tu correo y activa tu cuenta antes de iniciar sesión.');
}

public function autenticar()
{
    $usuarios = new UsuarioModel();

    $usuario = $usuarios
        ->where('correo', $this->request->getPost('correo'))
        ->first();

    if (
        ! $usuario ||
        ! password_verify(
            $this->request->getPost('contrasena'),
            $usuario['contrasena']
        )
    ) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Correo o contraseña incorrectos.');
    }

    if ((int) $usuario['activo'] !== 1) {
    return redirect()->back()
        ->withInput()
        ->with('error', 'Activa tu cuenta desde el enlace que enviamos a tu correo.');
}

    session()->set([
        'usuario_id'     => $usuario['id'],
        'usuario_nombre' => $usuario['nombre'],
        'logueado'       => true,
    ]);

    return redirect()->to(site_url('tareas'));
}

public function logout()
{
    session()->destroy();

    return redirect()->to(site_url('login'));
}
public function recuperarClave(): string
{
    return view('recuperar_clave');
}

public function enviarInstrucciones()
{
    $correo = trim((string) $this->request->getPost('correo'));

    if (! filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Ingresa un correo válido.');
    }

    $usuarios = new UsuarioModel();
    $usuario = $usuarios->where('correo', $correo)->first();

    if ($usuario) {
        $codigo = bin2hex(random_bytes(32));

        $usuarios->update($usuario['id'], [
            'codigo_recuperacion' => hash('sha256', $codigo),
            'token_expira' => date('Y-m-d H:i:s', time() + 3600),
        ]);

        $enlace = site_url('restablecer-clave/' . $codigo);

        $email = service('email');
        $email->setTo($correo);
        $email->setSubject('Recuperación de contraseña');
        $email->setMessage(
            "Para cambiar tu contraseña, abre este enlace dentro de una hora:\n\n"
            . $enlace
        );

        if (! $email->send()) {
            log_message('error', 'No se pudo enviar el correo de recuperación.');
        }
    }

    return redirect()->to(site_url('recuperar-clave'))
        ->with('mensaje', 'Si el correo está registrado, recibirás instrucciones para recuperar la contraseña.');
}

public function restablecerClave($codigo)
{
    $usuarios = new UsuarioModel();

    $usuario = $usuarios
        ->where('codigo_recuperacion', hash('sha256', $codigo))
        ->where('token_expira >=', date('Y-m-d H:i:s'))
        ->first();

    if (! $usuario) {
        return redirect()->to(site_url('login'))
            ->with('error', 'El enlace de recuperación no es válido o ya venció.');
    }

    return view('restablecer_clave', [
        'codigo' => $codigo,
    ]);
}


public function guardarNuevaContrasena($codigo)
{
    $reglas = [
        'contrasena' => 'required|min_length[8]',
        'confirmar_contrasena' => 'required|matches[contrasena]',
    ];

    if (! $this->validate($reglas)) {
        return redirect()->back()
            ->withInput()
            ->with('errores', $this->validator->getErrors());
    }

    $usuarios = new UsuarioModel();

    $usuario = $usuarios
        ->where('codigo_recuperacion', hash('sha256', $codigo))
        ->where('token_expira >=', date('Y-m-d H:i:s'))
        ->first();

    if (! $usuario) {
        return redirect()->to(site_url('recuperar-clave'))
            ->with('error', 'El enlace de recuperación no es válido o ya venció.');
    }

    $usuarios->update($usuario['id'], [
        'contrasena' => password_hash(
            $this->request->getPost('contrasena'),
            PASSWORD_DEFAULT
        ),
        'codigo_recuperacion' => null,
        'token_expira' => null,
    ]);

    return redirect()->to(site_url('login'))
        ->with('mensaje', 'Contraseña actualizada. Ya puedes iniciar sesión.');
}

public function activarCuenta($codigo)
{
    $usuarios = new UsuarioModel();

    $usuario = $usuarios
        ->where('codigo_activacion', hash('sha256', $codigo))
        ->first();

    if (! $usuario) {
        return redirect()->to(site_url('login'))
            ->with('error', 'El enlace de activación no es válido.');
    }

    $usuarios->update($usuario['id'], [
        'activo' => 1,
        'codigo_activacion' => null,
    ]);

    return redirect()->to(site_url('login'))
        ->with('mensaje', 'Cuenta activada. Ya puedes iniciar sesión.');
}

public function perfil()
{
    $usuarios = new UsuarioModel();
    $usuario = $usuarios->find(session()->get('usuario_id'));

    if (! $usuario) {
        return redirect()->to(site_url('login'));
    }

    return view('perfil', ['usuario' => $usuario]);
}

public function editarPerfil()
{
    $usuarios = new UsuarioModel();
    $usuario = $usuarios
        ->select('id, nombre, correo')
        ->find(session()->get('usuario_id'));

    if (! $usuario) {
        return redirect()->to(site_url('login'));
    }

    return view('editar_perfil', ['usuario' => $usuario]);
}

public function actualizarPerfil()
{
    $id = session()->get('usuario_id');
    $usuarios = new UsuarioModel();
    $usuario = $usuarios->find($id);

    if (! $usuario) {
        return redirect()->to(site_url('login'));
    }

    $reglas = [
        'nombre'             => 'required|min_length[2]',
        'correo'             => 'required|valid_email',
        'contrasena_actual'  => 'required',
    ];

    if (! $this->validate($reglas)) {
        $errores = implode(' ', $this->validator->getErrors());

        return redirect()->back()
            ->withInput()
            ->with('error', $errores);
    }

    $contrasenaActual = (string) $this->request->getPost('contrasena_actual');

    if (! password_verify($contrasenaActual, $usuario['contrasena'])) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'La contraseña actual no es correcta.');
    }

    $nombre = trim((string) $this->request->getPost('nombre'));
    $correo = trim((string) $this->request->getPost('correo'));

    $correoEnUso = (new UsuarioModel())
        ->where('correo', $correo)
        ->where('id !=', $id)
        ->first();

    if ($correoEnUso) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Ese correo ya está registrado en otra cuenta.');
    }

 $datos = [
    'nombre' => $nombre,
    'correo' => $correo,
];

$nuevaContrasena = (string) $this->request->getPost('nueva_contrasena');
$confirmarContrasena = (string) $this->request->getPost('confirmar_contrasena');

if ($nuevaContrasena !== '' || $confirmarContrasena !== '') {
    if (strlen($nuevaContrasena) < 8) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'La nueva contraseña debe tener al menos 8 caracteres.');
    }

    if ($nuevaContrasena !== $confirmarContrasena) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Las nuevas contraseñas no coinciden.');
    }

    $datos['contrasena'] = password_hash($nuevaContrasena, PASSWORD_DEFAULT);
}

$usuarios->update($id, $datos);

    session()->set('usuario_nombre', $nombre);

    return redirect()->to(site_url('perfil'))
        ->with('mensaje', 'Los datos del perfil se actualizaron.');
}

}