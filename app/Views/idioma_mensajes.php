<script>
function traducirMensajes(idioma) {
    const traducciones = {
        'No se pudo enviar el correo de activación.':
            'The activation email could not be sent.',
        'Revisa tu correo y activa tu cuenta antes de iniciar sesión.':
            'Check your email and activate your account before signing in.',
        'Correo o contraseña incorrectos.':
            'Incorrect email or password.',
        'Activa tu cuenta desde el enlace que enviamos a tu correo.':
            'Activate your account using the link sent to your email.',
        'Ingresa un correo válido.':
            'Enter a valid email address.',
        'Si el correo está registrado, recibirás instrucciones para recuperar la contraseña.':
            'If the email is registered, you will receive password recovery instructions.',
        'El enlace de recuperación no es válido o ya venció.':
            'The recovery link is invalid or has expired.',
        'Contraseña actualizada. Ya puedes iniciar sesión.':
            'Password updated. You can now sign in.',
        'El enlace de activación no es válido.':
            'The activation link is invalid.',
        'Cuenta activada. Ya puedes iniciar sesión.':
            'Account activated. You can now sign in.',
        'La contraseña actual no es correcta.':
            'The current password is incorrect.',
        'Ese correo ya está registrado en otra cuenta.':
            'That email is already registered to another account.',
        'La nueva contraseña debe tener al menos 8 caracteres.':
            'The new password must contain at least 8 characters.',
        'Las nuevas contraseñas no coinciden.':
            'The new passwords do not match.',
        'Los datos del perfil se actualizaron.':
            'Profile details updated.',
        'Foto de perfil actualizada.':
            'Profile photo updated.',
        'Foto de perfil eliminada.':
            'Profile photo deleted.',
        'Ese correo ya pertenece a otro usuario.':
            'That email already belongs to another user.',
        'Los datos del usuario se actualizaron.':
            'User details updated.',
        'Usuario creado correctamente.':
            'User created successfully.',
        'Selecciona un estado válido.':
            'Select a valid status.',
        'Solo los profesores pueden gestionar tareas.':
            'Only teachers can manage tasks.',
        'No tienes permisos para acceder a esta sección.':
            'You do not have permission to access this section.'
    };

    document.querySelectorAll('.alert, .alert li').forEach(function (elemento) {
        // Conserva las listas de errores y las traducciones ya agregadas.
        if (elemento.children.length > 0 || elemento.hasAttribute('data-es')) {
            return;
        }

        const original = elemento.textContent.trim();


        if (Object.prototype.hasOwnProperty.call(traducciones, original)) {
    elemento.setAttribute('data-es', original);
    elemento.setAttribute('data-en', traducciones[original]);
} else {
    const reglas = [
        [/The (.+?) field is required\./g,
            'El campo $1 es obligatorio.'],
        [/The (.+?) field must contain a valid email address\./g,
            'El campo $1 debe contener un correo válido.'],
        [/The (.+?) field must contain a unique value\./g,
            'El valor de $1 ya está registrado.'],
        [/The (.+?) field does not match the (.+?) field\./g,
            'El campo $1 no coincide con $2.'],
        [/The (.+?) field must be at least (\d+) characters in length\./g,
            'El campo $1 debe tener al menos $2 caracteres.'],
        [/The (.+?) field cannot exceed (\d+) characters in length\./g,
            'El campo $1 no puede superar $2 caracteres.'],
        [/The (.+?) field must be one of: (.+?)\./g,
            'El campo $1 debe tener uno de estos valores: $2.'],
        [/(\w+) is not a valid uploaded file\./g,
            'Debes seleccionar un archivo válido para $1.'],
        [/(\w+) is too large of a file\./g,
            'El archivo de $1 supera el tamaño permitido.'],
        [/(\w+) is not a valid, uploaded image file\./g,
            'El archivo de $1 debe ser una imagen válida.'],
        [/(\w+) does not have a valid mime type\./g,
            'El formato del archivo de $1 no está permitido.'],
        [/(\w+) does not have a valid file extension\./g,
            'La extensión del archivo de $1 no está permitida.']
    ];

    let espanol = original;

    reglas.forEach(function ([patron, traduccion]) {
        espanol = espanol.replace(patron, traduccion);
    });

    const nombres = {
        confirmar_contrasena: 'confirmación de contraseña',
        nueva_contrasena: 'nueva contraseña',
        contrasena_actual: 'contraseña actual',
        contrasena: 'contraseña',
        fecha_entrega: 'fecha de entrega',
        descripcion: 'descripción'
    };

    if (espanol !== original) {
        Object.entries(nombres).forEach(function ([campo, nombre]) {
            espanol = espanol.replace(new RegExp('\\b' + campo + '\\b', 'g'), nombre);
        });

        elemento.setAttribute('data-es', espanol);
        elemento.setAttribute('data-en', original);
    }
}

    });

    document.querySelectorAll('.alert[data-es][data-en], .alert [data-es][data-en]')
        .forEach(function (elemento) {
            elemento.textContent = elemento.getAttribute(
                idioma === 'en' ? 'data-en' : 'data-es'
            );
        });
}
</script>
