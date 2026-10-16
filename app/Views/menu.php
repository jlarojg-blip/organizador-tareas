<nav class="navbar bg-light border-bottom">
    <div class="container d-flex flex-wrap gap-3">
        <a href="<?= site_url('/') ?>" class="navbar-brand"
           data-es="Organizador de tareas" data-en="Tasks Organizer">
            Organizador de tareas
        </a>

        <div class="d-flex flex-wrap align-items-center gap-3">
            <a href="<?= site_url('/') ?>" data-es="Inicio" data-en="Home">Inicio</a>
            <a href="<?= site_url('tareas') ?>" data-es="Tareas" data-en="Tasks">Tareas</a>
            <a href="<?= site_url('perfil') ?>" data-es="Mi perfil" data-en="My profile">
                Mi perfil
            </a>

            <?php if ((int) session()->get('administrador') === 1): ?>
                <a href="<?= site_url('usuarios') ?>" data-es="Usuarios" data-en="Users">
                    Usuarios
                </a>
            <?php endif; ?>

            <span>
                <span data-es="Hola" data-en="Hello">Hola</span>,
                <?= esc(session()->get('usuario_nombre')) ?>
            </span>

            <button type="button" class="btn btn-outline-primary btn-sm"
                    onclick="cambiarIdioma('es')">
                Español
            </button>
            <button type="button" class="btn btn-outline-primary btn-sm"
                    onclick="cambiarIdioma('en')">
                English
            </button>

            <form action="<?= site_url('logout') ?>" method="post" class="m-0">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-outline-secondary btn-sm"
                        data-es="Cerrar sesión" data-en="Log out">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>
</nav>

<?= view('idioma_mensajes') ?>



<script>
function cambiarIdioma(idioma) {
    const elegido = idioma === 'en' ? 'en' : 'es';

    localStorage.setItem('idioma', elegido);
    document.documentElement.lang = elegido;

    traducirMensajes(elegido);

    document.querySelectorAll('[data-es][data-en]').forEach(function (elemento) {
        elemento.textContent = elemento.getAttribute('data-' + elegido);
    });

    document.querySelectorAll('[data-alt-es][data-alt-en]').forEach(function (elemento) {
        elemento.setAttribute('alt', elemento.getAttribute('data-alt-' + elegido));
    });

    document.querySelectorAll('[data-aria-es][data-aria-en]').forEach(function (elemento) {
        elemento.setAttribute('aria-label', elemento.getAttribute('data-aria-' + elegido));
    });
}

document.addEventListener('DOMContentLoaded', function () {
    cambiarIdioma(localStorage.getItem('idioma') || 'es');
});
</script>