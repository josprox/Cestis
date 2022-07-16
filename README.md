# Cetis Control Web Panel
<img src="./ps-contenido/img data/CetisCWP.png" alt="Cetis Control Web Panel"/>

## Misión

¿Estás buscando un sistema de control para alumnos? este proyecto es el que necesitas pues, los profesores podrán enviar notificaciones a los alumnos si tienen alguna tarea, sino podrá asistir, etc. Pero lo más importante, podrás decidir quién puede registrarse, el sistema se maneja con "Números de Control", solo con aquellos números podrán registrarse.

El usuario "admin", podrá interactuar con la información de los maestros y sus publicaciones, podría agregar números de control, corregir la información tanto del alumno cómo del maestro, crear anuncios hacia los maestros y muchas más cosas.

Este sistema está programado en PHP.

## Cetis CWP ocupa los siguientes frameworks para existir:

- Facilito F(x) sites creado por JOSPROX MX | Internacional: Este framework dá la estructura para el panel del alumno y maestro (back-end), conectado hacia la base de datos y leyendo cada tabla necesaria para mostrarle información tanto al alumno (usuario) cómo al maestro.

- Laravel con livewire: Le permite al administrador poder crear, leer, actualizar o eliminar datos de las tablas que aporta la base de datos (CRUD), podrás descargarlo como un plugin <a href="https://github.com/josprox/Laravel-CCWP">dando clic aquí</a> y configurandolo. Se recomienda tener conocimientos con este framework.

## El diseño de Cetis CWP está basado en:

- Facilito F(x) creado por JOSPROX MX | Internacional: ¿Estás buscando una forma de programar de una manera fácil? te presentamos nuestros diseños totalmente responsivos.

- Bootstrap creado por Mark Otto y Jacob Thornton: es una biblioteca multiplataforma o conjunto de herramientas de código abierto para diseño de sitios y aplicaciones web.

- Otros diseñadores desconocidos.

### Usuarios precargados:

    Laravel ("./admin/"):
        usuario: joss@int.josprox.com
        Contraseña: Andyyyo12?
    
    Alumnos ("./"):
        usuario: josprox
        Contraseña: Andyyyo12?

        usuario: Alextremo
        Contraseña: Andyyyo12?

        usuario: xime04
        Contraseña: Andyyyo12?

        Usuario: Isra Lara
        Contraseña: Andyyyo12?

        Usuario: eriicksanchez_
        Contraseña: Andyyyo12?
    
    Maestros ("./maestros/"):
        usuario: emma
        Contraseña: 123

        usuario: puff
        Contraseña: 123

        usuario: norma
        contraseña: 123

### Para poder usar Cetis CWP necesitará algunos requisitos mínimos:

- Versión mínima requerida de PHP: 8.1.0

- Espacio requerido en disco: 250 mb.

- Transferencia de red requerida del servidor: 5 mb.

- Protocolo de transferencia recomendado: SFTP (SSHFTP) ó FTPS (FTPSSL).

### Instalación:

Para poder llevar a cabo una instalación sencilla, <a href="https://github.com/josprox/Cetis-CWP/releases">ve a releases o dando clic aquí</a>, después selecciona la versión que necesites y mas abajo podrás descargar un archivo llamado "installer.zip", una vez descargado sigue las instrucciones correspondientes.

Si trabajas en un servidor:

- Descomprime el archivo zip, se descomprimirá la carpeta /installer/, accede a ella y copia o corta los dos archivos a tu raiz. Una vez hecho esto podrás eliminar la carpeta /installer/ y el zip installer.zip, dejando solo el zip de la versión descargada y el archivo installer.php.

- Crea una base de datos, de preferencia usa un cortejo utf8mb4_unicode_ci.

- accede a tu dominio y al archivo correspondiente "installer.php", ejemplo: ("https://tudominio.com/installer.php")

- Sigue las instrucciones para llevar a cabo la instalación, recuerda completar todos los campos y cumplir con los requisitos mínimos.

- Una vez instalado te saldrá el siguiente mensaje 'Se ha insertado los datos de manera correcta.' y te redireccionará a tu dominio con la versión de cetis CWP instalado.

Si trabajas en un localhost (usando de ejemplo xampp):

- Descarga el archivo comprimido y guardalo en una raíz de documentos de tú servidor. Si ocupas XAMPP puede ser: C:\xampp\htdocs\

- Ahora creamos una carpeta llamada Cetis CWP (esto es un ejemplo, puedes llamarlo cómo gustes): C:\xampp\htdocs\cetis-cwp\

- Descomprime el archivo zip dentro de la carpeta antes creada, se descomprimirá la carpeta /installer/, accede a ella y copia o corta los dos archivos a tu raiz. Una vez hecho esto podrás eliminar la carpeta /installer/ y el zip installer.zip, dejando solo el zip de la versión descargada y el archivo installer.php.

- Crea una base de datos, de preferencia usa un cortejo utf8mb4_unicode_ci.

- Ve al directorio antes creado con dirección a "installer.php", ejemplo: ("https://localhost/cetis-cwp/installer.php")

- Sigue las instrucciones para llevar a cabo la instalación, recuerda completar todos los campos y cumplir con los requisitos mínimos.

- Una vez instalado te saldrá el siguiente mensaje 'Se ha insertado los datos de manera correcta.' y te redireccionará a la raíz de la carpeta.

#### Instalación para versiones anteriores a "TIMELINET versión 6.3.3"

Descarga el archivo comprimido y guardalo en una raíz de documentos de tú servidor. Si ocupas XAMPP puede ser:
C:\xampp\htdocs\
Donde creamos una carpeta llamada Cetis CWP:
C:\xampp\htdocs\cetis cwp\

Ahora para poder empezar a usarlo deberás:

- Crear una base de datos.

- importar el archivo SQL que viene en la descarga.

- Modificar el archivo "./ps-conexion/base_db.php" con los datos correspondientes para poder llevar una conexión exitosa.

Listo, desde ahora podrás correr de una manera segura Cetis CWP.

### Recomendaciones:

- Usar un servidor privado (VPS).

- Se recomienda ejecutarse con seguridad usando el protocolo ssl / tls.

- Se recomienda usar un panel de control para administrar el servidor, puede usar sin problemas Cpanel y Hestia Control Panel. De preferencia debería usar <a href="https://hestiacp.com/">Hestia Control Panel</a>.

- En caso de pruebas y mejoras, se recomienda usar XAMPP con php 8.1.0 o superior, debiado a que, fué programado con esa versión.

- Para tener un buen funcionamiento, se recomienda que una vez subidos los archivos, ponle los todos los permisos de leer, escribir y ejecutar (permiso 777).

#### Licencia.

Un programa creado por JOSPROX MX/ JOSPROX Internacional.
Licencia: Creative Commons (Atribución-NoComercial 4.0 Internacional - Compartir igual).

EL SOFTWARE SE PROPORCIONA "TAL CUAL", SIN GARANTÍA DE NINGÚN TIPO, EXPRESA O IMPLÍCITA, INCLUYENDO, PERO NO LIMITADO A, LAS GARANTÍAS DE COMERCIABILIDAD, APTITUD PARA UN PROPÓSITO PARTICULAR Y NO INFRACCIÓN. EN NINGÚN CASO LOS AUTORES O TITULARES DE LOS DERECHOS DE AUTOR SERÁN RESPONSABLES DE CUALQUIER RECLAMO, DAÑOS U OTRA RESPONSABILIDAD, YA SEA EN UNA ACCIÓN DE CONTRATO, AGRAVIO O DE OTRO MODO, QUE SURJA DE, FUERA DE O EN RELACIÓN CON EL SOFTWARE O EL USO U OTRAS NEGOCIACIONES EN EL SOFTWARE.

<img src="./ps-contenido/img data/byncsa.jpg" alt="Atribución-NoComercial 4.0 Internacional - Compartir igual"/>

Reconocimiento - Compartir Igual (by-sa)

Esta licencia permite el uso comercial de la obra y de las posibles obras derivadas, pero la distribución de éstas se debe hacer con una licencia igual a la que regula la obra original, es decir, la obra derivada que se lleve a cabo a partir de la obra original deberá ser explotada bajo la misma licencia.

Atribución-NoComercial 4.0 Internacional (CC BY-NC 4.0)

Usted es libre de:

- Compartir — copiar y redistribuir el material en cualquier medio o formato.

- Adaptar — remezclar, transformar y construir a partir del material.

Bajo los siguientes términos:

- Atribución — Usted debe dar crédito de manera adecuada, brindar un enlace a la licencia, e indicar si se han realizado cambios. Puede hacerlo en cualquier forma razonable, pero no de forma tal que sugiera que usted o su uso tienen el apoyo de la licencia.

- NoComercial — Usted no puede hacer uso del material con propósitos comerciales.