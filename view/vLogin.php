<header id="header-login">
    <img id="logo-jnl" src="webroot/media/images/logo-jnl.svg" alt="logo jnl">
    <h1 id="header-title">LOGIN</h1>
    <div id="app-info-container">
        <button id="app-info-button" class="form-button">Informacion de la aplicacion</button>
        <article id="app-info-box">
            <div><a href="doc/201129CatalogoDeRequisitos.pdf" target="_blank"><p>Catalogo de requisitos</p></a></div>
            <div><a href="doc/210102DiagramaDeCasosDeUso.pdf" target="_blank"><p>Diagrama de casos uso</p></a></div>
            <div><a href="doc/210102DiagramaDeClases.pdf" target="_blank"><p>Diagrama de clases</p></a></div>
            <div><a href="doc/210102ArbolDeNavegación.pdf" target="_blank"><p>Arbol de navegacion</p></a></div>
            <div><a href="doc/210102RelacionDeFicheros.pdf" target="_blank"><p>Mapa web - relacion de ficheros</p></a></div>
            <div><a href="doc/200113EstructuraDeAlmacenamiento.jpg" target="_blank"><p>Estructura de almacenamiento</p></a></div>
            <div><a href="doc/201127ModeloFisicoDeDatos20-21.pdf" target="_blank"><p>Modelo físico de datos</p></a></div>
        </article>
    </div>
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
        </form>
    </article>
</main>