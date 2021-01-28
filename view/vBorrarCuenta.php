<header id="header-borrarCuenta">
    <img id="logo-jnl" src="webroot/media/images/logo-jnl.svg" alt="logo jnl">
    <h1 id="header-title">BORRAR CUENTA</h1>
    <div id="header-profile">
        <?php echo ($imagenUsuario != null) ? '<img id="fotoPerfil" src = "data:image/png;base64,' . base64_encode($imagenUsuario) . '" alt="Foto de perfil"/>' : "<img id='fotoPerfil' src='webroot/media/images/img-perfil-white.svg' alt='imagen_perfil'/>"; ?>
    </div>
</header>
<main id="main-borrarCuenta">
    <article class="form-container">
        <header>
            <h2>Borrar Cuenta</h2>
        </header>
        <p>Al eliminar la cuenta todos sus datos seran eliminados de forma permanente</p>

        <form id="form-borrarCuenta" name="form-borrarCuenta" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <div class="input-field-container">
                <input type="password" id="Password" name="Password" required>
                <label for="Password">Password</label>

            </div>

            <div>
                <button class="form-button" type="submit" name="BorrarCuenta">Borrar Cuenta</button>
            </div>

        </form>
        <form id="form-buttons" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="form-buttons-cancelar" method="post">
            <button class="form-button" type="submit" name="Cancelar"> Cancelar</button>
        </form>
    </article>
</main>