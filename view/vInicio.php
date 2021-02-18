<header id="header-inicio">
    <img id="logo-jnl" src="/AplicacionFinalDWESJavier2021/webroot/media/images/logo-jnl.svg" alt="logo jnl">
    <h1 id="header-title">INICIO</h1>
    <div id="header-profile">
        <?php echo ($oUsuarioActual->imagenPerfil != null) ? '<img id="fotoPerfil" src = "data:image/png;base64,' . base64_encode($oUsuarioActual->imagenPerfil) . '" alt="Foto de perfil"/>' : "<img id='fotoPerfil' src='/AplicacionFinalDWESJavier2021/webroot/media/images/img-perfil-white.svg' alt='imagen_perfil'/>"; ?>
        <form id="menu-profile" name="menu-profile" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <p id="nombre-usuario"><?php echo $oUsuarioActual->descUsuario ?></p>
            <?php if($oUsuarioActual->perfil != "administrador"){ ?>
            <button type="submit" name='MiCuenta'>Mi Cuenta</button>
            <button type="submit" name='BorrarCuenta'>Borrar Cuenta</button>
            <?php } ?>
            <button type="submit" name='CerrarSesion'>Cerrar Sesion</button>
        </form>
    </div>
</header>
<main id="main-inicio">
    <article id="bienvenida">
        <header>
            <h2>Bienvenido/a <?php echo $oUsuarioActual->descUsuario ?> </h2>
        </header>
        <p><?php echo ($oUsuarioActual->numConexiones > 1) ? "Esta es la $oUsuarioActual->numConexiones vez que se conecta" : 'Esta es la primera vez que se conecta'; ?></p>
        <?php echo (isset($fechaHoraUltimaConexionAnterior)) ? "<p>Usted se conecto por ultima vez el " . date('d/m/Y', $fechaHoraUltimaConexionAnterior). " a las ". date('H:i:s', $fechaHoraUltimaConexionAnterior) . "</p>" : null; ?>
    </article>
    <form id="form-vistas" name="form-vistas" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php if($oUsuarioActual->perfil != "administrador"){ ?>
        <button type="submit" id="MtoDepartamentos" name="MtoDepartamentos">
            <p>MTO DEPARTAMENTOS</p>
        </button>
        <button type="submit" id="REST" name="REST">
            <p>REST</p>
        </button>
        <?php  } else { ?>
        <button type="submit" id="MtoUsuarios" name="MtoUsuarios">
            <p>MTO USUARIOS</p>
        </button>
        <?php } ?>
    </form>
</main>