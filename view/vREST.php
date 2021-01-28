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

        <form id="form-REST" name="form-REST" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div>
                <button class="form-button" type="submit" name="Volver">Volver</button>
            </div>
        </form>
    </article>
</main>