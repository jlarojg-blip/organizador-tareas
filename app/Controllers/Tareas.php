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
            'usuario_id' => session()->get('usuario_id'),
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

    return view('tarea_detalle', ['tarea' => $tarea]);
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

        return view('tarea_editar', ['tarea' => $tarea]);
    }

    public function actualizar($id)
    {
        $modelo = new TareaModel();
        $tarea = $modelo
            ->where('usuario_id', session()->get('usuario_id'))
            ->find($id);

        if (! $tarea) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Tarea no encontrada');
        }

        $estado = $this->request->getPost('estado');

        if (! in_array($estado, ['Pendiente', 'Completada'], true)) {
            return redirect()->back()->with('error', 'Selecciona un estado válido.');
        }

        $datos = [
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'fecha_entrega' => $this->request->getPost('fecha_entrega'),
            'estado' => $estado,
        ];

        $modelo->update($id, $datos);

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