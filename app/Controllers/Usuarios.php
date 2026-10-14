<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Usuarios extends BaseController
{
    public function index()
    {
        $orden = $this->request->getGet('orden') === 'antiguos'
            ? 'antiguos'
            : 'nuevos';

        $direccion = $orden === 'antiguos' ? 'ASC' : 'DESC';

        $modelo = new UsuarioModel();

        $usuarios = $modelo
            ->select('id, nombre, correo, activo, administrador, created_at')
            ->orderBy('created_at', $direccion)
            ->orderBy('id', $direccion)
            ->findAll();

        return view('usuarios', [
            'usuarios' => $usuarios,
            'orden'    => $orden,
        ]);
    }

    public function detalle($id)
{
    $modelo = new UsuarioModel();

    $usuario = $modelo
        ->select('id, nombre, correo, activo, administrador, created_at, updated_at')
        ->find($id);

    if (! $usuario) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'Usuario no encontrado'
        );
    }

    return view('usuario_detalle', [
        'usuario' => $usuario,
    ]);
}

public function editar($id)
{
    $modelo = new UsuarioModel();

    $usuario = $modelo
        ->select('id, nombre, correo, activo, administrador')
        ->find($id);

    if (! $usuario) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'Usuario no encontrado'
        );
    }

    return view('usuario_editar', [
        'usuario' => $usuario,
    ]);
}

public function actualizar($id)
{
    $id = (int) $id;

        $reglas = [
    'nombre'        => 'required|min_length[2]|max_length[100]',
    'correo'        => 'required|valid_email|max_length[150]',
    'activo'        => 'required|in_list[0,1]',
    'administrador' => 'required|in_list[0,1]',
];

$contrasena = (string) $this->request->getPost('contrasena');
$confirmarContrasena = (string) $this->request->getPost('confirmar_contrasena');

if ($contrasena !== '' || $confirmarContrasena !== '') {
    $reglas['contrasena'] = 'required|min_length[8]';
    $reglas['confirmar_contrasena'] = 'required|matches[contrasena]';
}

    if (! $this->validate($reglas)) {
        return redirect()->back()
            ->withInput()
            ->with('errores', $this->validator->getErrors());
    }

    $modelo = new UsuarioModel();

    $usuario = $modelo->find($id);

    if (! $usuario) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'Usuario no encontrado'
        );
    }

    $correo = trim((string) $this->request->getPost('correo'));
    $correoExistente = $modelo->where('correo', $correo)->first();

    if ($correoExistente && (int) $correoExistente['id'] !== $id) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Ese correo ya pertenece a otro usuario.');
    }

    $datos = [
        'nombre'        => trim((string) $this->request->getPost('nombre')),
        'correo'        => $correo,
        'activo'        => (int) $this->request->getPost('activo'),
        'administrador' => (int) $this->request->getPost('administrador'),
    ];

    if ($contrasena !== '') {
    $datos['contrasena'] = password_hash($contrasena, PASSWORD_DEFAULT);
}


    $modelo->update($id, $datos);

    if ($id === (int) session()->get('usuario_id')) {
        session()->set('usuario_nombre', $datos['nombre']);
    }

    return redirect()->to(site_url('usuarios/' . $id))
        ->with('mensaje', 'Los datos del usuario se actualizaron.');
}

public function nuevo()
{
    return view('usuario_nuevo');
}

public function crear()
{
    $reglas = [
        'nombre'     => 'required|min_length[2]|max_length[100]',
        'correo'     => 'required|valid_email|max_length[150]|is_unique[usuarios.correo]',
        'contrasena' => 'required|min_length[8]',
    ];

    if (! $this->validate($reglas)) {
        return redirect()->back()
            ->withInput()
            ->with('errores', $this->validator->getErrors());
    }

    $modelo = new UsuarioModel();

    $modelo->insert([
        'nombre'        => trim((string) $this->request->getPost('nombre')),
        'correo'        => trim((string) $this->request->getPost('correo')),
        'contrasena'    => password_hash(
            $this->request->getPost('contrasena'),
            PASSWORD_DEFAULT
        ),
        'activo'        => 1,
        'administrador' => 0,
    ]);

    return redirect()->to(site_url('usuarios'))
        ->with('mensaje', 'Usuario creado correctamente.');
}

}
