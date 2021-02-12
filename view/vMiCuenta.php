<header id="header-miCuenta">
    <img id="logo-jnl" src="/AplicacionFinalDWESJavier2021/webroot/media/images/logo-jnl.svg" alt="logo jnl">
    <h1 id="header-title">MI CUENTA</h1>
    <div id="header-profile">
        <?php echo ($oUsuarioActual->imagenPerfil != null) ? '<img id="fotoPerfil" src = "data:image/png;base64,' . base64_encode($oUsuarioActual->imagenPerfil) . '" alt="Foto de perfil"/>' : "<img id='fotoPerfil' src='/AplicacionFinalDWESJavier2021/webroot/media/images/img-perfil-white.svg' alt='imagen_perfil'/>" ; ?>
    </div>
</header>
<main id="main-miCuenta">
    <article class="form-container">
        <header>
            <h2>Mi Cuenta</h2>
        </header>
        
        <form id="form-miCuenta" name="form-miCuenta" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

            <div class="input-field-container">
                <input type="text" id="CodUsuario" name="CodUsuario" value="<?php echo $oUsuarioActual->codUsuario ?>" readonly>
                <label for="CodUsuario">Usuario</label>
            </div>
            <div class="input-field-container">
                <input type="text" id="DescUsuario" name="DescUsuario" value="<?php
                    echo (isset($_REQUEST['DescUsuario'])) ? $_REQUEST['DescUsuario'] : $oUsuarioActual->descUsuario; 
                    ?>" required>
                <label for="DescUsuario">Descripcion</label>
                
            </div>
            <?php
                echo ($aErrores['DescUsuario']!=null) ? "<span class='error'>".$aErrores['DescUsuario']."</span>" : null;// si el campo es erroneo se muestra un mensaje de error
            ?>
            
            <div class="input-field-container">
                <input type="text" id="NumConexiones" name="NumConexiones" value="<?php echo $oUsuarioActual->numConexiones; ?>" readonly>
                <label for="NumConexiones">Numero de conexiones</label>
            </div>
            
            <div class="input-field-container">
                <input type="text" id="UltimaConexion" name="UltimaConexion" value="<?php echo date('d/m/Y H:i:s', $oUsuarioActual->fechaHoraUltimaConexion) ?>" readonly>
                <label for="UltimaConexion">Ultima conexion</label>
            </div>
            
            <div class="input-field-container">
                <input type="file" id="ImagenUsuario" name="ImagenUsuario">
                <label id="lImagenUsuario" for="ImagenUsuario">Imagen perfil</label>
            </div>
            <?php
                echo ($aErrores['ImagenUsuario']!=null) ? "<span class='error'>".$aErrores['ImagenUsuario']."</span>" : null;// si el campo es erroneo se muestra un mensaje de error
            ?>
            
            <div>
                <button class="form-button" type="submit" name="Editar">Editar</button>
                
            </div>

        </form>
        <form  id="form-buttons" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="registro" method="post">
            <button id="cambiarPassword" class="form-button" type="submit"name="CambiarPassword">Cambiar Password</button>
            <button class="form-button" type="submit"name="Cancelar">Cancelar</button>
        </form>
    </article>
</main>