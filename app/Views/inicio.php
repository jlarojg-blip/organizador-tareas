<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">

    <title>Organizador de tareas</title>
</head>


<body>
    <nav class="navbar bg-light border-bottom">
    <div class="container">
    <button type="button" class="btn btn-outline-primary" onclick="cambiarIdioma('es')">Español</button>
    <button type="button" class="btn btn-outline-primary" onclick="cambiarIdioma('en')">English</button>

        <a class="navbar-brand" href="/">Home</a>
    </div>
</nav>
    <main class="container mt-5">
        <h1 id="titulo">Organizador de tareas escolares</h1>
        <p id="mensaje">Bienvenido al sistema.</p>

        <div class="mt-4">
    <button id="login-button" type="button" class="btn btn-primary me-2">
        Iniciar sesión
    </button>

    <button id="signup-button" type="button" class="btn btn-outline-primary">
        Registrarse
    </button>
</div>
    </main>

<script>
    function cambiarIdioma(idioma) {
        const titulo = document.getElementById('titulo');
        const mensaje = document.getElementById('mensaje');
        const login = document.getElementById('login-button');
        const registro = document.getElementById('signup-button');

        if (idioma === 'en') {
            titulo.textContent = 'School Tasks Organizer';
            mensaje.textContent = 'Welcome to the system.';
            login.textContent = 'Log in';
            registro.textContent = 'Sign up';
        } else {
            titulo.textContent = 'Organizador de tareas escolares';
            mensaje.textContent = 'Bienvenido al sistema.';
            login.textContent = 'Iniciar sesión';
            registro.textContent = 'Registrarse';
        }
    }
</script>
</body>
</html>