<header id="header-eliminarDepartamento">
    <img id="logo-jnl" src="webroot/media/images/logo-jnl.svg" alt="logo jnl">
    <h1 id="header-title">ELIMINAR DEPARTAMENTO</h1>
    <div id="header-profile">
        <?php echo ($imagenUsuario != null) ? '<img id="fotoPerfil" src = "data:image/png;base64,' . base64_encode($imagenUsuario) . '" alt="Foto de perfil"/>' : "<img id='fotoPerfil' src='webroot/media/images/img-perfil-white.svg' alt='imagen perfil'/>" ; ?>
    </div>
</header>
<main id="main-eliminarDepartamento">
<article class="form-container">
        <header>
            <h2>Eliminar Departamento</h2>
        </header>
        <form id="form-eliminarDepartamento" name="form-consultarModificarDepartamento" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <div class="input-field-container">
                <input type="text" id="CodDepartamento" name="CodDepartamento" readonly>
                <label for="CodDepartamento">Codigo de Departamento</label>
            </div>
            <div class="input-field-container">
                <input type="text" id="DescDepartamento" name="DescDepartamento" readonly>
                <label for="DescDepartamento">Descripcion del Departamento</label>
            </div>
            <div class="input-field-container">
                <input type="text" id="FechaCreacion" name="FechaCreacion" readonly>
                <label for="fechaCreacion">Fecha Creacion</label>
            </div>
            <div class="input-field-container">
                <input type="text" id="FechaBaja" name="FechaBaja" readonly>
                <label for="FechaBaja">Fecha Baja</label>
            </div>
            <div class="input-field-container">
                <input type="text" id="VolumenNegocio" name="VolumenNegocio" readonly>
                <label for="VolumenNegocio">Volumen Negocio</label>
            </div>
            
            <div>
                <button class="form-button" type="submit" name="Aceptar">Aceptar</button>
            </div>

        </form>

        <form  id="form-buttons" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="registro" method="post">
            <button class="form-button" type="submit" name="Cancelar">Cancelar</button>
        </form>
    </article>
</main>