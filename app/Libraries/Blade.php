<?php

namespace App\Libraries;

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;

class Blade
{
    private Factory $vistas;

    public function __construct()
    {
        $archivos = new Filesystem();
        $cache = WRITEPATH . 'cache/blade';

        $archivos->ensureDirectoryExists($cache);

        $compilador = new BladeCompiler($archivos, $cache);
        $motores = new EngineResolver();

        $motores->register('blade', function () use ($compilador, $archivos) {
            return new CompilerEngine($compilador, $archivos);
        });

        $buscador = new FileViewFinder($archivos, [
            APPPATH . 'Views',
        ]);

        $contenedor = new Container();

        $this->vistas = new Factory(
            $motores,
            $buscador,
            new Dispatcher($contenedor)
        );

        $this->vistas->setContainer($contenedor);
    }

    public function render(string $vista, array $datos = []): string
    {
        return $this->vistas->make($vista, $datos)->render();
    }
}
