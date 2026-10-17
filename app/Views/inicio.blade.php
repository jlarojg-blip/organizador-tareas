<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title data-es="Organizador de tareas" data-en="Tasks Organizer">
        Organizador de tareas
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
    <link rel="stylesheet" href={{ base_url('css/estilos.css') }}
</head>
<body>
    <?php if (session()->get('logueado')): ?>
        @include('menu')
    <?php else: ?>
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="<?= site_url('/') ?>"
                   data-es="Organizador de tareas" data-en="Tasks Organizer">
                    Organizador de tareas
                </a>
            </div>
        </nav>
    <?php endif; ?>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card bienvenida">
                    <div class="card-body p-4 p-md-5">
                        <p class="text-success fw-bold"
                           data-es="Tu espacio escolar" data-en="Your school space">
                            Tu espacio escolar
                        </p>

                        <h1 data-es="Organizador de tareas escolares"
                            data-en="School Tasks Organizer">
                            Organizador de tareas escolares
                        </h1>

                        <p class="lead"
                           data-es="Bienvenido. Consulta las tareas, revisa sus fechas de entrega y mantén a mano la información de tus actividades."
                           data-en="Welcome. View tasks, check their due dates and keep your activity information close at hand.">
                            Bienvenido. Consulta las tareas, revisa sus fechas
                            de entrega y mantén a mano la información de tus actividades.
                        </p>

                        <div class="d-flex flex-wrap gap-3 mt-4">
                            <?php if (session()->get('logueado')): ?>
                                <a href="<?= site_url('tareas') ?>"
                                   class="btn btn-primary"
                                   data-es="Ir a tareas" data-en="Go to tasks">
                                    Ir a tareas
                                </a>
                            <?php else: ?>
                                <a href="<?= site_url('login') ?>"
                                   class="btn btn-primary"
                                   data-es="Iniciar sesión" data-en="Sign in">
                                    Iniciar sesión
                                </a>
                                <a href="<?= site_url('registro') ?>"
                                   class="btn btn-outline-primary"
                                   data-es="Crear cuenta" data-en="Create account">
                                    Crear cuenta
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php if (! session()->get('logueado')): ?>
        @include('idioma_publico')
    <?php endif; ?>
</body>
</html>
