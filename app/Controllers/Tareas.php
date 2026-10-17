<?php

namespace App\Controllers;

use App\Models\TareaModel;

class Tareas extends BaseController
{

public function index()
{
    $modelo = new TareaModel();

    $orden = $this->request->getGet('orden') === 'antiguas'
        ? 'ASC'
        : 'DESC';

    $tareas = $modelo
        ->select('tareas.*')
        ->join('usuarios', 'usuarios.id = tareas.usuario_id')
        ->where('usuarios.profesor', 1)
        ->orderBy('tareas.id', $orden)
        ->findAll();

    return (new \App\Libraries\Blade())->render('tareas', [
        'tareas' => $tareas,
    ]);
}

    public function nueva()
    {
        return (new \App\Libraries\Blade())->render('tarea_nueva');
    }

   public function guardar()
{
    $datos = [
        'usuario_id'    => session()->get('usuario_id'),
        'titulo'        => trim((string) $this->request->getPost('titulo')),
        'descripcion'   => trim((string) $this->request->getPost('descripcion')),
        'fecha_entrega' => (string) $this->request->getPost('fecha_entrega'),
        'estado'        => 'Pendiente',
    ];

    $reglas = [
        'titulo'        => 'required|max_length[100]',
        'descripcion'   => 'required',
        'fecha_entrega' => 'required|valid_date[Y-m-d]',
    ];

    if (! $this->validateData($datos, $reglas)) {
        return redirect()->back()
            ->withInput()
            ->with('errores', $this->validator->getErrors());
    }

    $modelo = new TareaModel();

    if ($modelo->insert($datos) === false) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'No se pudo guardar la tarea.');
    }

    return redirect()->to(site_url('tareas'));
}


public function detalle($id)
{
    $modelo = new TareaModel();

    $tarea = $modelo
        ->select('tareas.*')
        ->join('usuarios', 'usuarios.id = tareas.usuario_id')
        ->where('usuarios.profesor', 1)
        ->find($id);

    if (! $tarea) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'Tarea no encontrada'
        );
    }

    return (new \App\Libraries\Blade())->render('tarea_detalle', ['tarea' => $tarea]);
}

    public function editar($id)
    {
        $modelo = new TareaModel();
        $tarea = $modelo
            ->where('usuario_id', session()->get('usuario_id'))
            ->find($id);

        if (! $tarea) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Tarea no encontrada');
        }

        return (new \App\Libraries\Blade())->render('tarea_editar', ['tarea' => $tarea]);
    }


    public function actualizar($id)
{
    $modelo = new TareaModel();

    $tarea = $modelo
        ->where('usuario_id', session()->get('usuario_id'))
        ->find($id);

    if (! $tarea) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'Tarea no encontrada'
        );
    }

    $datos = [
        'titulo'        => trim((string) $this->request->getPost('titulo')),
        'descripcion'   => trim((string) $this->request->getPost('descripcion')),
        'fecha_entrega' => (string) $this->request->getPost('fecha_entrega'),
        'estado'        => (string) $this->request->getPost('estado'),
    ];

    $reglas = [
        'titulo'        => 'required|max_length[100]',
        'descripcion'   => 'required',
        'fecha_entrega' => 'required|valid_date[Y-m-d]',
        'estado'        => 'required|in_list[Pendiente,Completada]',
    ];

    if (! $this->validateData($datos, $reglas)) {
        return redirect()->back()
            ->withInput()
            ->with('errores', $this->validator->getErrors());
    }

    if ($modelo->update($id, $datos) === false) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'No se pudo actualizar la tarea.');
    }

    return redirect()->to(site_url('tareas'));
}

    public function eliminar($id)
    {
        $modelo = new TareaModel();
        $tarea = $modelo
            ->where('usuario_id', session()->get('usuario_id'))
            ->find($id);

        if (! $tarea) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Tarea no encontrada');
        }

        $modelo->delete($id);

        return redirect()->to(site_url('tareas'));
    }
}
