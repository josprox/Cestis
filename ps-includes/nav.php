<div class="grid-home">
            <div class="header-flex">
                <nav class="nav-flex">
                    <div class="menu">
                        <div class="logo">
                            <a href="./"><img src="ps-contenido/img/logo.webp" alt="JOSPROX Logo" /></a>
                        </div>
                    </div>

                    <div class="links-cel">
                        <label for="check" class="checkbtn"><i class="fas fa-bars"></i></label>
                        <input type="checkbox" id="check" />
                        <ul class="links">
                            <li><a href="./">Inicio</a></li>
                            <li><a href="perfil">Perfil</a></li>
                            <li><a href="ps-conexion/salir.php">Cerrar sesión</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <header class="noticia">
                <p>Hola <span><?php echo utf8_decode($row['nombre']);?></span>, este es tu panel de control.😁</p>
            </header>
        </div>