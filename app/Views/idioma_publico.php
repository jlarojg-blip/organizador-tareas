<div class="container text-center pb-4">
    <button type="button" class="btn btn-outline-primary btn-sm"
            onclick="cambiarIdioma('es')">
        Español
    </button>
    <button type="button" class="btn btn-outline-primary btn-sm"
            onclick="cambiarIdioma('en')">
        English
    </button>
</div>

<?= view('idioma_mensajes') ?>
<script>
function cambiarIdioma(idioma) {
    traducirMensajes(idioma);
    const elegido = idioma === 'en' ? 'en' : 'es';

    localStorage.setItem('idioma', elegido);
    document.documentElement.lang = elegido;

    document.querySelectorAll('[data-es][data-en]').forEach(function (elemento) {
        elemento.textContent = elemento.getAttribute('data-' + elegido);
    });
}

cambiarIdioma(localStorage.getItem('idioma') || 'es');
</script>

