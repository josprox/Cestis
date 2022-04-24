<?php include "head.php"; ?>
    <div class="container-fluid py-4">
      <div class="row mb-4">
      <div class="container-fluid px-2 px-md-4">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
      </div>
      <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../ps-contenido/img/maestros/<?php echo $row['img'];?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <?php echo $row['nombre'];?>
              </h5>
              <p class="mb-0 font-weight-normal text-sm">
                CEO / Co-Founder
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
          </div>
        </div>
        <div class="row">
          <div class="row">

            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                      <h6 class="mb-0">Información del perfil</h6>
                    </div>
                    <div class="col-md-4 text-end">
                      <a href="javascript:;">
                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <p class="text-sm">
                    Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).
                  </p>
                  <hr class="horizontal gray-light my-4">
                  <ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nombre completo:</strong> &nbsp; <?php echo $row['nombre'];?></li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Discapacidad:</strong> &nbsp; <?php echo $row['discapacidad'];?></li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Correo:</strong> &nbsp; <?php echo $row['correo'];?> </li>
                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Sexo:</strong> &nbsp; <?php echo $row['sexo'];?></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">Cambiar información</h6>
                </div>
                <div class="card-body p-3">
                  <h6 class="text-uppercase text-body text-xs font-weight-bolder">Imagen de perfil</h6>
                  <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data" name="form1">
                        <table>
                            <input type="hidden" name="MAX_TAM" value="2097152" />
                            <tr>
                                <td  align="center">Cambiar imagen de perfil</td>
                            </tr>
                            <tr>
                                <td  align="center">Seleccione una imagen con tamaño inferior a 2 MB</td>
                            </tr>
                            <tr>
                                <td colspan="2" align="left">
                                    <div id="div_file">
                                        <p id="txtimg" >Insertar imagen</p>
                                        <input type="file" name="imagen" id="imagen" />
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" name="btn_enviar" id="btn_enviar" value="Enviar" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-4">
              <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                  <h6 class="mb-0">Configurar plataforma</h6>

                  <p class="text-sm" style="text-align:justify;">
                    En esta sección podrás agregar otro grado, grupo y especialidad, así podrás publicar en su panel de estudiante.
                  </p>

                  <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
                    <div class="mb-3">
                      <select name="gradgrup" class="form-select" aria-label="Default select example" required>
                        <option selected>¿Qué grado y grupo te corresponde?*</option>
                        <?php
                        $eleccion_gg = "SELECT * FROM `gradgrup`";

                        if ($restgradgrup = mysqli_query($conexion, $eleccion_gg)) {
                            while ($reggradgrup = mysqli_fetch_array($restgradgrup)) {
                                echo '<option value="' . $reggradgrup['id'] .'">' . $reggradgrup['grado'] . ' '. $reggradgrup['grupo'] .'</option>
                                ';
                            }
                        }
                        ?>
                      </select>
                      <select name="esp" class="form-select" aria-label="Default select example" required>
                        <option selected>¿Cuál es la especialidad con la que trabajarás?</option>
                        <?php
                        $especialidades = "SELECT * FROM `especialidades`";

                        if ($resultado = mysqli_query($conexion, $especialidades)) {
                            while ($registro = mysqli_fetch_array($resultado)) {
                                echo '<option value="' . $registro['id'] .'">' . $registro['especialidad'] .'</option>
                                ';
                            }
                        }
                        ?>
                      </select>
                      <select name="turno" class="form-select" aria-label="Default select example" required>
                        <option selected>¿Cuál es el turno con el que trabajarás?</option>
                        <?php
                        $eleccion_turnos = "SELECT * FROM `turnos`";

                        if ($restturnos = mysqli_query($conexion, $eleccion_turnos)) {
                            while ($regturnos = mysqli_fetch_array($restturnos)) {
                                echo '<option value="' . $regturnos['id'] .'">' . $regturnos['turno'] . '</option>
                                ';
                            }
                        }
                        ?>
                      </select>
                    </div>

                    <div class="mb-3 form-check">
                      <input value="1" type="checkbox" class="form-check-input" id="confirmar" name="confirmar" checked >
                      <label class="form-check-label" for="confirmar">¿Estás seguro?</label>
                    </div>
                    <input name="registrar" type="submit" class="btn" value="Agregar">
                  </form>

                </div>
                <div class="card-body p-3">

                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Tus publicaciones</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">

              <?php
                    $miconsulta1 = "SELECT maestros.nombre, maestros.img, publicaciones.descripcion , publicaciones.titulo, publicaciones.vista FROM maestros
                                INNER JOIN arg_public ON maestros.id = arg_public.id_mst INNER JOIN publicaciones
                                ON arg_public.id_pbc = publicaciones.id WHERE id_mst = '$iduser' ORDER BY publicaciones.id DESC LIMIT 4";

                    if ($resultado = mysqli_query($conexion, $miconsulta1)) {
                        while ($registro = mysqli_fetch_array($resultado)) {
                            echo '
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">';
                            echo '
                            <h6 class="mb-3 text-sm">Título: '.$registro['titulo'].' </h6>
                            <span class="mb-2 text-xs">Publicó: '.$registro['vista'].'</span>
                            <span class="mb-2 text-xs"><span class="text-dark font-weight-bold ms-sm-2">Descripción:</span> '.$registro['descripcion'].' </span>
                            </div>
                          </li>
                            ';
                        }
                    }
                    ?>

              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">Publicar</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                  <small><?php echo date("d") . " del " . date("m") . " de " . date("Y"); ?></small>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3">

              <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post">
                <div class="mb-3">
                  <label for="titulo" class="form-label">Título</label>
                  <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Pon el título">
                </div>
                
                <div class="mb-3">
                  <select name="gradgrup" class="form-select" aria-label="Default select example">
                    <option selected>¿Para quién es la publicación?</option>
                    <?php
                    $public = "SELECT gradgrup.id,gradgrup.grado, gradgrup.grupo FROM gradgrup INNER JOIN arg_maestro ON arg_maestro.id_gg = gradgrup.id WHERE arg_maestro.id_mst = '$iduser' GROUP BY gradgrup.grupo";

                    if ($restpublic = mysqli_query($conexion, $public)) {
                        while ($rest = mysqli_fetch_array($restpublic)) {
                            echo '<option value="' . $rest['id'] .'">' . $rest['grado'] .' '.$rest['grupo'].'</option>
                                  ';
                        }
                    }
                    ?>
                  </select>
                </div>
                
                <div class="mb-3">
                  <select name="esp" class="form-select" aria-label="Default select example">
                    <option selected>¿Para qué especialidad?</option>
                    <?php
                    $public = "SELECT especialidades.id, especialidades.especialidad FROM especialidades INNER JOIN arg_maestro ON arg_maestro.id_esp = especialidades.id WHERE arg_maestro.id_mst = '$iduser' GROUP BY especialidades.especialidad";
  
                    if ($restpublic = mysqli_query($conexion, $public)) {
                        while ($rest = mysqli_fetch_array($restpublic)) {
                            echo '<option value="' . $rest['id'] .'">'.$rest['especialidad'].'</option>
                                  ';
                        }
                    }
                    ?>
                  </select>
                </div>
                
                <div class="mb-3">
                  <select name="turn" class="form-select" aria-label="Default select example">
                    <option selected>¿Para qué turno?</option>
                    <?php
                    $public = "SELECT turnos.id, turnos.turno FROM turnos INNER JOIN arg_maestro ON arg_maestro.id_turno = turnos.id WHERE arg_maestro.id_mst = '$iduser' GROUP BY turnos.turno";
  
                    if ($restpublic = mysqli_query($conexion, $public)) {
                        while ($rest = mysqli_fetch_array($restpublic)) {
                            echo '<option value="' . $rest['id'] .'">'.$rest['turno'].'</option>
                                  ';
                        }
                    }
                    ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="vista" class="form-label">Vista previa</label>
                  <input name="vista" type="text" class="form-control" id="vista" placeholder="Pon una pequeña entrada del contenido">
                </div>
                <div class="mb-3">
                  <label for="contenido" class="form-label">Texto a agregar</label>
                  <textarea name="contenido" class="form-control" id="contenido" rows="3"></textarea>
                </div>
                <input name="publicar" type="submit" class="btn" value="Publicar">
              </form>

            </div>
          </div>
        </div>
      </div>

      </div>
  </main>
<?php include "footer.php"; ?>