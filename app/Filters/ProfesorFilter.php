<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class ProfesorFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! session()->get('logueado')) {
            return redirect()->to(site_url('login'));
        }

        if ((int) session()->get('profesor') !== 1) {
            return redirect()->to(site_url('tareas'))
                ->with('error', 'Solo los profesores pueden gestionar tareas.');
        }
    }

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
        //
    }
}