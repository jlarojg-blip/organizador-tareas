<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! session()->get('logueado')) {
            return redirect()->to(site_url('login'));
        }

        if ((int) session()->get('administrador') !== 1) {
            return redirect()->to(site_url('tareas'))
                ->with('error', 'No tienes permisos para acceder a esta sección.');
        }
    }

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        // No se requiere ninguna acción después de la petición.
    }
}
