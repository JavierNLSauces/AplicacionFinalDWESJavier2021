<header id="header-inicio">
    <img id="logo-jnl" src="webroot/media/images/logo-jnl.svg" alt="logo jnl">
    <h1 id="header-title">INICIO</h1>
    <div id="header-profile">
        <?php echo ($imagenUsuario != null) ? '<img id="fotoPerfil" src = "data:image/png;base64,' . base64_encode($imagenUsuario) . '" alt="Foto de perfil"/>' : "<img id='fotoPerfil' src='webroot/media/images/img-perfil-white.svg' alt='imagen_perfil'/>" ; ?>
        <form id="menu-profile" name="menu-profile" action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post">
            <p id="nombre-usuario"><?php echo $descUsuario ?></p>
            <button type="submit" name='MiCuenta'>Mi Cuenta</button>
            <button type="submit" name='BorrarCuenta'>Borrar Cuenta</button>
            <button type="submit" name='CerrarSesion'>Cerrar Sesion</button>
        </form>
    </div>
</header>
<main id="main-inicio">
    <article id="bienvenida">
        <header>
            <h2>Bienvenido/a <?php echo $descUsuario ?> </h2>
        </header>
        <p><?php echo ($numConexiones > 1) ? "Se ha conectado $numConexiones veces" : 'Esta es la primera vez que se conecta';?></p>
        <?php echo ($fechaHoraUltimaConexionAnterior != null) ? "<p>Ultima Conexion: ".date('d/m/Y H:i:s',$fechaHoraUltimaConexionAnterior)."</p>" : null; ?>
    </article>
    <form id="form-vistas" name="form-vistas" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <button type="submit" id="MtoDepartamentos" name="MtoDepartamentos">
        <p>MTO DEPARTAMENTOS</p>
        </button>
        <button type="submit" id="REST" name="REST">
        <p>REST</p>
        </button>
    </form>
    
</main>