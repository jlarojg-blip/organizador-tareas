# Organizador de tareas escolares

Aplicación web local creada con CodeIgniter 4, PHP, MariaDB y Bootswatch Brite.

## Funciones

- Registro e inicio de sesión.
- Crear, consultar, buscar, ordenar, editar y eliminar tareas.
- Borrado lógico de tareas.
- Administración del perfil y su foto.

## Preparar el proyecto por primera vez

1. Instala PHP, Composer y MariaDB.
2. Instala las dependencias con `composer install`.
3. Si todavía no existe `.env`, ejecuta `[ -f .env ] || cp env .env`.
4. Configura la conexión a MariaDB en `.env`. No publiques ese archivo ni compartas sus contraseñas.
5. Inicia MariaDB con `sudo systemctl start mariadb`.
6. Aplica las migraciones con `php spark migrate`. Hazlo al preparar el proyecto por primera vez o después de agregar una migración nueva.
7. Inicia el servidor con `php spark serve`.
8. Abre la dirección que indique `php spark serve`; normalmente es `http://localhost:8080`.

Las funciones de correo requieren configurar SMTP en `.env`.
