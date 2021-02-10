<header id="header-altaDepartamento">
    <img id="logo-jnl" src="/AplicacionFinalDWESJavier2021/webroot/media/images/logo-jnl.svg" alt="logo jnl">
    <h1 id="header-title">ALTA DEPARTAMENTO</h1>
    <div id="header-profile">
        <?php echo ($imagenUsuario != null) ? '<img id="fotoPerfil" src = "data:image/png;base64,' . base64_encode($imagenUsuario) . '" alt="Foto de perfil"/>' : "<img id='fotoPerfil' src='/AplicacionFinalDWESJavier2021/webroot/media/images/img-perfil-white.svg' alt='imagen perfil'/>" ; ?>
    </div>
</header>
<main id="main-altaDepartamento">
    <article class="form-container">
        <header>
            <h2>Alta Departamento</h2>
        </header>
        <form id="form-altaDepartamento" name="form-altaDepartamento" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <div class="input-field-container">
                <input type="text" id="CodDepartamento" name="CodDepartamento" value="<?php
                    echo (isset($_REQUEST['CodDepartamento'])) ? $_REQUEST['CodDepartamento'] : null; // si el campo esta correcto mantengo su valor en el formulario
                    ?>" required>
                <label for="CodDepartamento">Codigo de Departamento</label>
            </div>
            <?php
                echo ($aErrores['CodDepartamento'] != null) ? "<span class='error'>" . $aErrores['CodDepartamento'] . "</span>" : null; // si el campo es erroneo se muestra un mensaje de error
            ?>
            <div class="input-field-container">
                <input type="text" id="DescDepartamento" name="DescDepartamento" value="<?php
                            echo (isset($_REQUEST['DescDepartamento'])) ? $_REQUEST['DescDepartamento'] : null; // si el campo esta correcto mantengo su valor en el formulario
                            ?>" required>
                <label for="DescDepartamento">Descripcion del Departamento</label>
            </div>
            <?php
                echo ($aErrores['DescDepartamento'] != null) ? "<span class='error'>" . $aErrores['DescDepartamento'] . "</span>" : null; // si el campo es erroneo se muestra un mensaje de error
            ?>
            <div class="input-field-container">
                <input type="text" id="VolumenNegocio" name="VolumenNegocio" value="<?php
                            echo (isset($_REQUEST['VolumenNegocio'])) ? $_REQUEST['VolumenNegocio'] : null; // si el campo esta correcto mantengo su valor en el formulario
                            ?>" required>
                <label for="VolumenNegocio">Volumen Negocio</label>
            </div>
            <?php
                echo($aErrores['VolumenNegocio'] != null) ? "<span class='error'>" . $aErrores['VolumenNegocio'] . "</span>" : null; // si el campo es erroneo se muestra un mensaje de error
            ?>
            
            <div>
                <button class="form-button" type="submit" name="Aceptar">Aceptar</button>
            </div>

        </form>

        <form  id="form-buttons" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="form-buttons" method="post">
            <button class="form-button" type="submit" name="Cancelar">Cancelar</button>
        </form>
    </article>
</main>