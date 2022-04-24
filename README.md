# Cetis-CWP

¿Estás buscando un sistema de control para alumnos? este proyecto es el que necesitas pues, los profesores podrán enviar notificaciones a los alumnos si tienen alguna tarea, sino podrá asistir, etc. Pero lo más importante, podrás decidir quién puede registrarse, el sistema se maneja con "Números de Control", solo con aquellos números podrán registrarse.

El usuario "admin", podrá interactuar con la información de los maestros y sus publicaciones, podría agregar números de control, corregir la información tanto del alumno cómo del maestro, crear anuncios hacia los maestros y muchas más cosas.

Este sistema está programado en PHP.

## Cetis CWP ocupa los siguientes frameworks para existir:

- Facilito F(x) sites creado por JOSPROX MX | Internacional: Este framework dá la estructura para el panel del alumno y maestro (back-end), conectado hacia la base de datos y leyendo cada tabla necesaria para mostrarle información tanto al alumno (usuario) cómo al maestro.

- Laravel con livewire: Le permite al administrador poder crear, leer, actualizar o eliminar datos de las tablas que aporta la base de datos (CRUD).

## El diseño de Cetis CWP está basado en:

- Facilito F(x) creado por JOSPROX MX | Internacional: ¿Estás buscando una forma de programar de una manera fácil? te presentamos nuestros diseños totalmente responsivos.

- Bootstrap creado por Mark Otto y Jacob Thornton: es una biblioteca multiplataforma o conjunto de herramientas de código abierto para diseño de sitios y aplicaciones web.

- Otros diseñadores desconocidos.

### Para poder usar Cetis CWP necesitará algunos requisitos mínimos:

- Versión mínima requerida de PHP: 8.0.1

- Espacio requerido en disco: 190 mb. 

- Transferencia de red requerida del servidor: 5 mb.

- Protocolo de transferencia recomendado: SFTP (SSHFTP) ó FTPS (FTPSSL).

# TIMELINE versión 6.1.1 solución de errores

Fecha 23/04/22

Con esta versión se tuvieron pequeñas mejoras para el funcionamiento correcto de Cetis CWP. 

Cetis CWP Admin:

- Se solucionó un error que no permitía ver el arreglo público.
- Se actualizó la tabla "Descargas" para permitir mejorar el sistema para Cetis CWP alumnos. 

Cetis CWP alumnos:
- Ahora el usuario podrá ver el horario correspondiente a su grado, grupo, especialidad y turno. Anteriormente podía ver TODOS los horarios.
- Ahora el usuario podrá descargar su boleta correspondiente a su grado, grupo, especialidad y turno. Anteriormente podía descargar todas las boletas de todos los alumnos. 

# Versión 6.1 estable

Fecha 20/04/22

Introducción:
En esta versión se hicieron varias mejoras a Cetis Control Web Panel, tratando de hacer mas 
dinámico el sitio web, es por ello que se agregaron ciertas características tanto para los alumnos 
cómo para los maestros.

Cetis CWP Admin:
- Se han añadido números de control para que muchos alumnos puedan registrarse sin 
problemas.
- En la base de datos se mejoró la tabla “arg_public (Arreglo público)”, para así poder permitir 
que los maestros puedan publicar sus anuncios a ciertos usuarios.
- Se agregó en la base de datos y en el MVC (Modelo Vista Controlador) de laravel las nuevas 
tablas que permiten publicar “Anuncios” a los maestros.

Cetis CWP web, sección de maestros:
- Para la sección de maestros, se le habilitó al maestro la posibilidad llamada “Configurar 
Plataforma”, su objetivo de esta posibilidad es que, el maestro podrá registrar otro grado, 
grupo, especialidad y turno correspondiente para sus alumnos. Anteriormente el maestro 
estaba limitado a que, con solo una cuenta, podría publicar para todos los usuarios, esto
provocando que otros grados, grupos, especialidades y turnos pudieran leer todo sin 
especificar solo a sus grupos correspondientes.
- En la sección “Publicaciones” se agregó la posibilidad de poder elegir hacia quién va dirigida 
su publicación.
- En la pestaña “Notificaciones” ahora muestra las alertas que puede enviar el administrador 
del sistema de Cetis CWP para poder comunicar incidentes, advertencias, peligros y 
procesos completados.

Cetis CWP web, sección alumnos (usuarios):
- Los alumnos ahora verán las publicaciones correspondientes a su grado, grupo, especialidad 
y turno, permitiendo solo ver lo que sus maestros correspondientes les publiquen.
- Se habilitó el botón “Ver más”, donde el usuario podrá ver las publicaciones mas viejas de 
sus maestros, esto en base a una paginación.

Cetis CWP APP:
- Se solucionó el problema que no permitía regresar al inicio, pues este cerraba su sesión 
inesperadamente.

En conclusión:
La aplicación web llamada Cetis CWP se encuentra en una versión estable con la posibilidad de 
mejorarse.

Otras mejoras:
Con estas mejoras se solucionaron pequeños errores de seguridad que tenía Cestis (La versión 
antigua de Cetis CWP).

# TIMELINE versión 6.0.1 Beta 4

Fecha 18/04/22

En esta actualización se optimizaron los recursos y existieron mejoras que, cambiaron completamente a la aplicación web.
Integra recursos muy importantes y esto mantendrá a la aplicación en su mayoría de forma dinámica.

Mejoras:

Integración de la nueva versión "Facilito f(x)" creado por JOSPROX MX | Internacional:

- Todo el SCSS fué optimizado y organizado con un map para poder mejorar la ubicación de los códigos en estilo de cascada.
- Ya NO OCUPA javascript en el back end, dejando así los recursos a base de php.

Integración de Laravel: Laravel es un framework de código abierto para desarrollar aplicaciones y servicios web con PHP 5, PHP 7 y PHP 8. Su filosofía es desarrollar código PHP de forma elegante y simple, evitando el "código espagueti".

- Con Laravel se integró un sistema admin, el cuál podrá acceder a la base de datos para crear, leer, actualizar y eliminar información del sistema. (CRUD).
- El usuario admin podrá romper arreglos creados por el método de INNER JOIN y así eliminar por COMPLETO datos importantes.
- Contiene una interfaz amigable, pues está programado con Bootstrap 5.
- Se integró para el Super Admin (programadores) la posibilidad de Generar un crud con tan solo una línea de comando, basado en livewire.

Creación de Cetis CWP System:

- Se ha eliminado más del 80% el sistema "Cestis_CWP" para darle lugar a la versión "CETIS_CWP" y así olvidar el nombre antiguo.
- Se creó un nuevo servidor para poder "limpiar" residuos de Cestis CWP versión 4.2, eliminando así la base de datos y archivos desactualizados.
- Para poder usar Cetis CWP necesitará algunos requisitos mínimos:
• Versión mínima requerida de PHP: 8.0. 
• Espacio requerido en disco: 256 mb. 
• Transferencia de red requerida del servidor: 5 mb.
• Protocolo de transferencia recomendado: SFTP (SSHFTP) ó FTPS (FTPSSL).

Cetis CWP APP: Desde esta actualización, la aplicación web podrá ser instalada desde Android, ios, Mac y Windows con tan solo un clic, de una manera segura.

- Se creó todo lo necesario para integrar un PWA:
• Se añadió un archivo Manifest para poder permitir a Chrome la instalación rápida.
• Se añadió un ServiceWorker.
• Necesita una "promesa" para mantener un almacenamiento en caché.

Cetis CWP web:

En esta actualización se trató de mantener ciertos estilos qué maneja JOSPROX MX | Internacional, permitiendo un Navbar sencillo, un logo sin posición Fixed, entre otras.

Se añadió:

- La página "Ver más" donde encontrarás las publicaciones antiguas de tus profesores.
- Una paginación cifrada de extremo a extremo.
- Control de usuarios por NumControl. 
- impresión de la CURP registrada con el NumControl. 

Se mejoró:

- Seguridad en el registro de un alumno:
• El alumno solo se podrá registrar si, en la base de datos está registrado el Número de Control, que no exista un Usuario con ese Número de Control, que no se pueda duplicar el usuario.
- Sistema basado en la base de datos: Para la sección de registro, los usuarios podrán elegir opciones qué fueron anteriormente generados por el usuario "admin". Por ejemplo:
• Sexos: Por defecto, cetis CWP viene con 2 orientaciones sexuales, masculino y femenino (desde la versión Cestis CWP 4.0) pero ahora, debido a la integración de Laravel, se pudo integrar el "No binario" a la base de datos. Es por eso que, automáticamente en el registro aparecerá 3 opciones, pues el sistema de registro primero checa los datos en la base de datos y después los manda con un formato html al sistema para imprimirle la información al usuario. El administrador podría agregar más orientaciones Sexuales o quitarlas con unos pocos clics en el panel de Cetis CWP. 

# TIMELINE versión 5.0.1 beta 6

Fecha 14/04/22

Se integra laravel con livewire para crear el sistema de administración.