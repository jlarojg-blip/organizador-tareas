<?php

namespace App\Controllers;

use App\Models\TareaModel;

class Tareas extends BaseController
{
    public function index()
    {
        $modelo = new TareaModel();
        $tareas = $modelo->findAll();

        return view('tareas', [
            'tareas' => $tareas,
        ]);

    }

    public function nueva()
{
    return view('tarea_nueva');
}

public function guardar()
{
    $modelo = new TareaModel();

    $modelo->insert([
        'titulo' => $this->request->getPost('titulo'),
        'descripcion' => $this->request->getPost('descripcion'),
        'fecha_entrega' => $this->request->getPost('fecha_entrega'),
        'estado' => 'Pendiente',
    ]);

    return redirect()->to(site_url('tareas'));
}

public function detalle($id)
{
    $modelo = new TareaModel();
    $tarea = $modelo->find($id);

    if (!$tarea) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    return view('tarea_detalle', ['tarea' => $tarea]);
}

public function eliminar($id)
{
    $modelo = new TareaModel();
    $modelo->delete($id);

    return redirect()->to(site_url('tareas'));
}

}
