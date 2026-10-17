/# Organizador de tareas escolares

Aplicación web desarrollada con CodeIgniter 4, PHP, MariaDB y Bootswatch Brite.

## Funciones

- Registro y activación de cuentas por correo.
- Inicio de sesión, opción Recordarme y cierre de sesión.
- Recuperación de contraseña por correo.
- Perfil: edición de datos, contraseña y foto.
- Administración: creación, consulta, edición y desactivación de usuarios.
- Profesores: creación, edición y eliminación de sus tareas.
- Alumnos: consulta de las tareas publicadas por profesores.
- Búsqueda y ordenamiento de tareas.
- Borrado lógico y fechas de creación y actualización.
- Interfaz en español e inglés.

## Organización

- Vistas: interfaz, en app/Views.
- Controladores: procesamiento de solicitudes, en app/Controllers.
- Modelos: acceso a datos, en app/Models.
- Migraciones: estructura de la base de datos, en app/Database/Migrations.
- Filtros: control de acceso, en app/Filters.

## Instalación local

Se necesita PHP compatible con las dependencias de composer.json, Composer y MariaDB.

1. Clona el repositorio y entra en su carpeta:

   ```bash
   git clone https://github.com/jlarojg-blip/organizador-tareas.git
   cd organizador-tareas
   composer install
   ```

2. Inicia MariaDB:

   ```bash
   sudo systemctl start mariadb
   ```

3. Crea una base de datos llamada organizador_tareas y un usuario de MariaDB con permisos sobre ella.

4. Crea la configuración local solo si todavía no existe:

   ```bash
   [ -f .env ] || cp env .env
   ```

5. Configura en .env la conexión:

   ```ini
   database.default.hostname = localhost
   database.default.database = organizador_tareas
   database.default.username = TU_USUARIO_DE_BASE_DE_DATOS
   database.default.password = "TU_CONTRASENA_DE_BASE_DE_DATOS"
   database.default.DBDriver = MySQLi
   database.default.DBPrefix =
   database.default.port = 3306
   app.baseURL = 'http://localhost:8080/'
   app.appTimezone = 'America/Guatemala'
   ```

6. Configura el correo SMTP en .env. Para Gmail:

   ```ini
   email.protocol = smtp
   email.SMTPHost = smtp.gmail.com
   email.SMTPUser = "TU_CORREO"
   email.SMTPPass = "TU_CONTRASENA_DE_APLICACION"
   email.SMTPPort = 587
   email.SMTPCrypto = tls
   email.fromEmail = "TU_CORREO"
   email.fromName = "Organizador de tareas"
   email.CRLF = "\r\n"
   email.newline = "\r\n"
   ```

   Usa una contraseña de aplicación de la cuenta remitente. El registro y la recuperación requieren un servicio de correo configurado.

7. Aplica las migraciones:

   ```bash
   php spark migrate
   ```

8. Inicia el servidor:

   ```bash
   php spark serve
   ```

   Abre la dirección indicada. Si utiliza otro puerto, ajusta app.baseURL para que los enlaces enviados por correo apunten a esa dirección.

## Primera cuenta administradora

Registra una cuenta y actívala mediante el correo recibido.

Desde MariaDB, asigna los permisos usando el correo de esa cuenta:

```sql
USE organizador_tareas;

UPDATE usuarios
SET administrador = 1, profesor = 1
WHERE correo = 'CORREO_DE_LA_CUENTA';
```

Cierra sesión y vuelve a iniciarla para cargar los permisos.

El administrador puede asignar el tipo Alumno o Profesor desde la administración de usuarios. El permiso de administrador es independiente del permiso de profesor.

## Iniciar en sesiones posteriores

```bash
cd ~/organizador-tareas
sudo systemctl start mariadb
php spark serve
```

Las migraciones solo deben ejecutarse cuando existan cambios pendientes en la estructura.

## Configuración y datos

El archivo .env contiene la configuración privada y no se incluye en Git.
Las fotos subidas, las sesiones y los registros de ejecución tampoco se versionan.
Las migraciones crean la estructura; los datos de una instalación existente requieren un respaldo de MariaDB.

El repositorio de GitHub contiene el código. Para ejecutar la aplicación se necesita un servidor PHP y MariaDB.


## Motor de vistas Blade

Las plantillas se encuentran en `app/Views` con extensión `.blade.php`.
Los controladores las renderizan mediante la clase `App\Libraries\Blade`,
utilizando los componentes `illuminate/view` e `illuminate/events`.

Los fragmentos compartidos se cargan con `@include`.
Las plantillas conservan código PHP compatible con Blade.

Las vistas compiladas se generan automáticamente en `writable/cache/blade`
y no deben incluirse en Git.
