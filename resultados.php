<!-- 
    Código basado en JOSPROX MX | JOSPROX Internacional, con la unión de Facilito FX, Paoo CSS, Zara CSS y código de proyecto libre basado en JS.

    para más información de uso y propiedades favor de leer en el siguiente link oficial: https://josprox.com/politicas debido a la creación de este código, el cuál es independiente de la materia, creado con la tecnología de Facitio FX con la licencia de 2015 - 2022, para más información de licencia visite: https://github.com/josprox

     Por la presente se otorga con cargo, a cualquier persona que obtenga una copia de este software y los archivos de documentación asociados (el "Software"), para operar con el Software con restricciones, incluidos, entre otros, los derechos de uso, copia, modificación, fusión , publicar, distribuir, sublicenciar y / o vender copias del Software, y permitir que las personas a las que se les proporcione el Software lo hagan, sujeto a las siguientes condiciones:

    El aviso de copyright anterior y este aviso de permiso se incluirán en todas las copias o partes sustanciales del Software.

    EL SOFTWARE SE PROPORCIONA "TAL CUAL", SIN GARANTÍA DE NINGÚN TIPO, EXPRESA O IMPLÍCITA, INCLUYENDO, PERO NO LIMITADO A, LAS GARANTÍAS DE COMERCIABILIDAD, APTITUD PARA UN PROPÓSITO PARTICULAR Y NO INFRACCIÓN. EN NINGÚN CASO LOS AUTORES O TITULARES DE LOS DERECHOS DE AUTOR SERÁN RESPONSABLES DE CUALQUIER RECLAMO, DAÑOS U OTRA RESPONSABILIDAD, YA SEA EN UNA ACCIÓN DE CONTRATO, AGRAVIO O DE OTRO MODO, QUE SURJA DE, FUERA DE O EN RELACIÓN CON EL SOFTWARE O EL USO U OTRAS NEGOCIACIONES EN EL SOFTWARE. 
 -->

 <?php
 
 session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ./");
}
$iduser = $_SESSION['id_usuario'];

 ?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <?php include "ps-includes/metas.php"; ?>
    <title>Cetis CWP | Resultados</title>
    <link rel="stylesheet" href="./ps-contenido/css/facilito_fx_ultima_ver/facilito-fx.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Cetis CWP</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./panel"><i class="fa-solid fa-house"></i> Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./perfil"><i class="fa-solid fa-user"></i> Perfil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./more"><i class="fa-solid fa-signs-post"></i> Todas las publicaciones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./search"><i class="fa-solid fa-magnifying-glass"></i> Buscador</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./ps-conexion/salir"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesión</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" name="busqueda" id="busqueda" type="text" placeholder="Buscar..." aria-label="Search">
            </form>
          </div>
        </div>
      </nav>
<br>
      <div class="container" id="datos">
          
      </div>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="./ps-contenido/js/jquery-3.6.0.min.js"></script>
      <script src="./ps-contenido/js/search.js"></script>
</body>
</html>