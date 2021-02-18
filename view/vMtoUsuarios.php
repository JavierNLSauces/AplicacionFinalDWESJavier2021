<header id="header-mtoUsuarios">
    <img id="logo-jnl" src="/AplicacionFinalDWESJavier2021/webroot/media/images/logo-jnl.svg" alt="logo jnl">
    <h1 id="header-title">MTO. USUARIOS</h1>
    <div id="header-profile">
        <?php echo ($oUsuarioActual->imagenPerfil != null) ? '<img id="fotoPerfil" src = "data:image/png;base64,' . base64_encode($oUsuarioActual->imagenPerfil) . '" alt="Foto de perfil"/>' : "<img id='fotoPerfil' src='/AplicacionFinalDWESJavier2021/webroot/media/images/img-perfil-white.svg' alt='imagen_perfil'/>"; ?>
        <form id="menu-profile" name="menu-profile" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <p id="nombre-usuario"><?php echo $oUsuarioActual->descUsuario ?></p>
            <button type="submit" name='CerrarSesion'>Cerrar Sesion</button>
        </form>
    </div>
</header>
<main id="main-mtoUsuarios">
    <div id="form-mtoUsuarios-buscador">
        <div class="input-field-container">
            <input type="text" id="DescUsuario" name="DescUsuario"  optional>
            <label for="DescUsuario">Busqueda Usuario</label>
        </div>
    </div>

    <article id="container-usuarios">
        <div id="form-mtoUsuarios">
            <table id="table-usuarios">
                <thead>
                    <tr>
                        <th>Codigo usuario</th>
                        <th>Descripcion</th>
                        <th>Numero conexiones</th>
                        <th>Fecha Hora Ultima Conexion</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody id="usuarios">
                </tbody>
            </table>
        </div>
        <form id="form-mtoUsuarios-paginacion" name="form-mtoDepartamentos-paginacion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div>
                <button class="form-button" type="submit" name="Volver">Volver</button>
            </div>
        </form>
    </article>

    <script src="/AplicacionFinalDWESJavier2021/webroot/js/jquery-3.5.1.js"></script>
    <script src="/AplicacionFinalDWESJavier2021/webroot/js/sweetalert2.all.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="/AplicacionFinalDWESJavier2021/webroot/js/sMtoUsuarios.js"></script>
</main>