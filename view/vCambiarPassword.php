<header id="header-cambiarPassword">
    <img id="logo-jnl" src="/AplicacionFinalDWESJavier2021/webroot/media/images/logo-jnl.svg" alt="logo jnl">
    <h1 id="header-title">CAMBIAR PASSWORD</h1>
    <div id="header-profile">
        <?php echo ($oUsuarioActual->imagenPerfil != null) ? '<img id="fotoPerfil" src = "data:image/png;base64,' . base64_encode($oUsuarioActual->imagenPerfil) . '" alt="Foto de perfil"/>' : "<img id='fotoPerfil' src='/AplicacionFinalDWESJavier2021/webroot/media/images/img-perfil-white.svg' alt='imagen_perfil'/>" ; ?>
        <form id="menu-profile" name="menu-profile" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <p id="nombre-usuario"><?php echo $oUsuarioActual->descUsuario ?></p>
            <button type="submit" name='CerrarSesion'>Cerrar Sesion</button>
        </form>
    </div>
</header>
<main id="main-cambiarPassword">
    <article class="form-container">
        <header>
            <h2>Cambiar Password</h2>
        </header>
        
        <form id="form-cambiarPassword" name="form-cambiarPassword" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div class="input-field-container">
                <input type="password" id="Password" name="Password" value="<?php
                    echo (isset($_REQUEST['Password'])) ? $_REQUEST['Password'] : null;
                    ?>" required>
                <label for="Password">Password</label>

            </div>

            <div class="input-field-container">
                <input type="password" id="PasswordNueva" name="PasswordNueva" value="<?php
                    echo (isset($_REQUEST['PasswordNueva'])) ? $_REQUEST['PasswordNueva'] : null;
                    ?>" required>
                <label for="PasswordNueva">Password Nueva</label>

            </div>
            <?php
            echo ($aErrores['PasswordNueva'] != null) ? "<span class='error'>" . $aErrores['PasswordNueva'] . "</span>" : null; // si el campo es erroneo se muestra un mensaje de error
            ?>

            <div class="input-field-container">
                <input type="password" id="PasswordRepetida" name="PasswordRepetida" value="<?php
                    echo (isset($_REQUEST['PasswordRepetida'])) ? $_REQUEST['PasswordRepetida'] : null;
                    ?>" required>
                <label for="PasswordRepetida">Password Repetida</label>

            </div>
            <?php
            echo ($aErrores['PasswordRepetida'] != null) ? "<span class='error'>" . $aErrores['PasswordRepetida'] . "</span>" : null; // si el campo es erroneo se muestra un mensaje de error
            ?>
            
            <div>
                <button class="form-button" type="submit" name="CambiarPassword">Cambiar Password</button>
            </div>

        </form>
        <form  id="form-buttons" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="registro" method="post">
            <button class="form-button" type="submit"name="Cancelar">Cancelar</button>
        </form>
    </article>
</main>