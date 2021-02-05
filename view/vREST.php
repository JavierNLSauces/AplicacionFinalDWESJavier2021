<header id="header-REST">
    <img id="logo-jnl" src="webroot/media/images/logo-jnl.svg" alt="logo jnl">
    <h1 id="header-title">REST</h1>
</header>

<main id="main-REST">
    <article id="REST-container">
        <article id="REST-peliculas-container">
            <article class="form-container">
                <header>
                    <h2>REST API Buscador de Peliculas</h2>
                    <a href="http://www.omdbapi.com/" target="_blank">Link a la API</a>
                </header>
                <form id="form-REST-pelicula" name="form-REST-pelicula" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="input-field-container">
                        <input type="text" id="NombrePelicula" name="NombrePelicula" value="<?php echo (isset($_REQUEST['NombrePelicula'])) ? $_REQUEST['NombrePelicula'] : null ?>" required>
                        <label for="NombrePelicula"> Nombre Pelicula (en ingles)</label>
                        
                    </div>
                    <?php echo (isset($_REQUEST['NombrePelicula']) && $aDatosPelicula == null) ? "<span>No se ha encontrado una pelicula con ese titulo</span>" : null;?>
                    <div>
                        <button class="form-button" type="submit" name="BuscarPelicula">Buscar Pelicula</button>
                    </div>
                </form>
            </article>
            <?php if(isset($aDatosPelicula)){ ?>
            <article id="pelicula-container">
                <header>
                    <h3><?php echo $aDatosPelicula['Titulo'] ?></h3>
                </header>
                <div id="caracteristicas-pelicula">
                    <p>Año: <?php echo $aDatosPelicula['Year'] ?></p>
                    <p>Duracion: <?php echo $aDatosPelicula['Duracion'] ?></p>
                    <p>Genero: <?php echo $aDatosPelicula['Genero'] ?></p>
                    <p>Puntuacion: <?php echo $aDatosPelicula['Puntuacion'] ?>/10</p>
                </div>
            </article>
            <?php } ?>
            
        </article>

        <article id="REST-textoImagen-container">
            <article class="form-container">
                <header>
                    <h2>REST API Generador de imagen con texto</h2>
                    <a href="http://ipsumimage.appspot.com/" target="_blank">Link a la API</a>
                </header>
                <form id="form-REST-textoImagen" name="form-REST-textoImagen" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="input-field-container">
                        <input type="text" id="TextoImagen" name="TextoImagen" value="<?php echo (isset($_REQUEST['TextoImagen'])) ? $_REQUEST['TextoImagen'] : null ?>" required>
                        <label for="TextoImagen"> Texto para la imagen</label>
                    </div>
                    <?php echo (isset($_REQUEST['TextoImagen']) && $errorTextoImagen != null) ? "<span class='error'> $errorTextoImagen</span>" : null;?>
                    <div>
                        <button class="form-button" type="submit" name="GenerarImagen">Generar Imagen</button>
                    </div>
                </form>
            </article>

            <?php if(isset($imagen)){ ?>
            <article id="textoImagen-container">
                <?php  echo '<img id="imagenGenerada" src = "data:image/png;base64,' . base64_encode($imagen) . '" alt="Imagen generada"/>' ?>
            </article>
            <?php } ?>
            
        </article>
        
        <article id="REST-departamento-GET-container">
            <article class="form-container">
                <header>
                    <h2>REST API Consultar Departamento Cristina GET</h2>
                </header>
                <form id="form-REST-departamento-GET" name="form-REST-departamento-GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="input-field-container">
                        <input type="text" id="CodDepartamento" name="CodDepartamento" value="<?php echo (isset($_REQUEST['CodDepartamento'])) ? $_REQUEST['CodDepartamento'] : null ?>" required>
                        <label for="CodDepartamento"> Codigo del Departamento</label>
                        
                    </div>
                    <?php echo (isset($_REQUEST['CodDepartamento']) && isset($errorCodDepartamento)) ? "<span>$errorCodDepartamento</span>" : null;?>
                    <div>
                        <button class="form-button" type="submit" name="ConsultarVolumenDeNegocioCristinaGET">Consultar Volumen de negocio</button>
                    </div>
                </form>
            </article>
            <?php if(isset($aDatosDepartamento['resultado'])){ ?>
            <article id="departamento-GET-container">
                <header>
                    <h3><?php echo $aDatosDepartamento['resultado']['codDepartamento'] ?></h3>
                </header>
                <div id="caracteristicas-departamento-GET">
                    <p>Descripcion departamento: <?php echo $aDatosDepartamento['resultado']['descDepartamento'] ?></p>
                    <p>Volumen de negocio: <?php echo $aDatosDepartamento['resultado']['volumenDeNegocio'] ?></p>
                </div>
            </article>
            <?php } else if(isset($aDatosDepartamento['error'])) { ?>
                <article id="departamento-GET-container">                
                    <h3><?php echo $aDatosDepartamento['error'] ?></h3>
                </article>
            <?php }?>

            <article id="REST-departamento-POST-container">
            <article class="form-container">
                <header>
                    <h2>REST API Consultar Departamento Propio POST</h2>
                </header>
                <form id="form-REST-departamento-POST" name="form-REST-departamento-POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="input-field-container">
                        <input type="text" id="CodDepartamento2" name="CodDepartamento2" value="<?php echo (isset($_REQUEST['CodDepartamento2'])) ? $_REQUEST['CodDepartamento2'] : null ?>" required>
                        <label for="CodDepartamento2"> Codigo del Departamento</label>
                    </div>
                    <?php echo (isset($_REQUEST['ApiKey']) && isset($errorCodDepartamento2)) ? "<span>$errorCodDepartamento2</span>" : null;?>
                    <div class="input-field-container">
                        <input type="text" id="ApiKey" name="ApiKey" value="<?php echo (isset($_REQUEST['ApiKey'])) ? $_REQUEST['ApiKey'] : null ?>" required>
                        <label for="ApiKey"> Clave api</label>
                    </div>
                    <?php echo (isset($_REQUEST['ApiKey']) && isset($errorApiKey)) ? "<span>$errorApiKey</span>" : null;?>
                    <div>
                        <button class="form-button" type="submit" name="ConsultarDatosDepartamentoPropioPOST">Consultar Departamento</button>
                    </div>
                </form>
            </article>
            <?php if(isset($aDatosDepartamento2->MensajeDeError)) { ?>
                <article id="departamento-POST-container">
                    <h3><?php echo $aDatosDepartamento2->MensajeDeError ?></h3>
                </article>
            <?php }else if(isset($aDatosDepartamento2)){ ?>
            <article id="departamento-POST-container">
                <header>
                    <h3><?php echo $aDatosDepartamento2->CodigoDeDepartamento ?></h3>
                </header>
                <div id="caracteristicas-departamento-POST">
                    <p>Descripcion departamento: <?php echo $aDatosDepartamento2->DescripcionDeDepartamento ?></p>
                    <p>Fecha creacion: <?php echo date("d/m/Y",$aDatosDepartamento2->FechaCreacionDeDepartamento) ?></p>
                    <p>Fecha Baja: <?php echo ($aDatosDepartamento2->FechaBajaDeDepartamento!=null) ? date("d/m/Y",$aDatosDepartamento2->FechaBajaDeDepartamento): "NULL" ?></p>
                    <p>Volumen de negocio: <?php echo $aDatosDepartamento2->VolumenDeNegocio ?></p>
                </div>
            </article>
            <?php }?>
            
        </article>


        <form id="form-REST" name="form-REST" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div>
                <button class="form-button" type="submit" name="Volver">Volver</button>
            </div>
        </form>
    </article>
</main>