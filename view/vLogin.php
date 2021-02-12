<header id="header-login">
    <img id="logo-jnl" src="/AplicacionFinalDWESJavier2021/webroot/media/images/logo-jnl.svg" alt="logo jnl">
    <h1 id="header-title">LOGIN</h1>
</header>

<main id="main-login">
    <article class="form-container">
        <header>
            <h2>Iniciar Sesión</h2>
        </header>
        <form id="form-login" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="login" method="post">

            <div class="input-field-container">
                <input type="text" id="CodUsuario" name="CodUsuario" required>
                <label for="CodUsuario"> Usuario</label>

            </div>
            <div class="input-field-container">
                <input type="password" id="Password" name="Password" required>
                <label for="Password"> Password </label>
            </div>

            <div>
                <button class="form-button" type="submit" name="IniciarSesion">Login</button>
            </div>
        </form>
        <form  id="form-buttons" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="registro" method="post">
            <button class="form-button" type="submit" name="Registrarse"> Registarse</button>
            <button class="form-button" type="submit" name="Volver"> Volver</button>
        </form>
    </article>
</main>