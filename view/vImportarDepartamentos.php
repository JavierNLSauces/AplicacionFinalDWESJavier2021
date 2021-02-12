<header id="header-importarDepartamentos">
    <img id="logo-jnl" src="/AplicacionFinalDWESJavier2021/webroot/media/images/logo-jnl.svg" alt="logo jnl">
    <h1 id="header-title">IMPORTAR DEPARTAMENTOS</h1>
    <div id="header-profile">
        <?php echo ($imagenUsuario != null) ? '<img id="fotoPerfil" src = "data:image/png;base64,' . base64_encode($imagenUsuario) . '" alt="Foto de perfil"/>' : "<img id='fotoPerfil' src='/AplicacionFinalDWESJavier2021/webroot/media/images/img-perfil-white.svg' alt='imagen_perfil'/>"; ?>
    </div>
</header>
<main id="main-importarDepartamentos">
    <article class="form-container">
        <header>
            <h2>Importar Departamentos</h2>
        </header>

        <form id="form-importarDepartamentos" name="form-importarDepartamentos" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

            <div class="input-field-container">
                <input type="file" id="ArchivoImportado" name="ArchivoImportado" required>
                <label for="ArchivoImportado">Importar Archivo</label>
            </div>
            <?php
            echo (isset($errorArchivoImportado) && $errorArchivoImportado != null) ? "<span class='error'>" . $errorArchivoImportado . "</span>" : null; // si el campo es erroneo se muestra un mensaje de error
            ?>

            <div class="select-field-container">
                <label for="Formato">Formato: </label>
                <select name="Formato">
                    <option value="text/xml" <?php echo (isset($formato) && $formato == "xml") ? "selected" : null ?> > xml </option>
                    <option value="application/json" <?php echo (isset($formato) && $formato == "json") ? "selected" : null ?> > json </option>
                    <option value="application/vnd.ms-excel" <?php echo (isset($formato) && $formato == "csv") ? "selected" : null ?> > csv </option>
                </select>
            </div>
            <?php
            echo (isset($errorFormato) && $errorFormato != null) ? "<span class='error'>" . $errorFormato . "</span>" : null; // si el campo es erroneo se muestra un mensaje de error
            ?>

            <div>
                <button class="form-button" type="submit" name="Aceptar">Aceptar</button>

            </div>

        </form>
        <form id="form-buttons" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="form-buttons-importarDepartamentos" method="post">
            <button class="form-button" type="submit" name="Cancelar">Cancelar</button>
        </form>
    </article>
</main>