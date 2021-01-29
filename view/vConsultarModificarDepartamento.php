<header id="header-consultarModificarDepartamento">
    <img id="logo-jnl" src="webroot/media/images/logo-jnl.svg" alt="logo jnl">
    <h1 id="header-title">CONSULTAR/MODIFICAR DEPARTAMENTO</h1>
    <div id="header-profile">
        <?php echo ($imagenUsuario != null) ? '<img id="fotoPerfil" src = "data:image/png;base64,' . base64_encode($imagenUsuario) . '" alt="Foto de perfil"/>' : "<img id='fotoPerfil' src='webroot/media/images/img-perfil-white.svg' alt='imagen perfil'/>" ; ?>
    </div>
</header>
<main id="main-consultarModificarDepartamento">
    <article class="form-container">
        <header>
            <h2>Consultar/Modificar Departamento</h2>
        </header>
        <form id="form-consultarModificarDepartamento" name="form-consultarModificarDepartamento" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <div class="input-field-container">
                <input type="text" id="CodDepartamento" name="CodDepartamento" value="<?php //echo $codDepartamento?>" readonly>
                <label for="CodDepartamento">Codigo de Departamento</label>
            </div>
            <div class="input-field-container">
                <input type="text" id="DescDepartamento" name="DescDepartamento" value="<?php
                    // if(isset($_REQUEST['DescDepartamento'])){
                    //     if($aErrores['DescDepartamento'] != null){
                    //         echo $descDepartamento;
                    //     }else{
                    //         echo $_REQUEST['DescDepartamento'];
                    //     }
                    // }else{
                    //     echo $descDepartamento;
                    // }
                    ?>" required>
                    <?php
                        // echo ($aErrores['DescDepartamento'] != null) ? "<span class='error'>" . $aErrores['DescDepartamento'] . "</span>" : null; // si el campo es erroneo se muestra un mensaje de error
                    ?>
                <label for="DescDepartamento">Descripcion del Departamento</label>
            </div>
            <div class="input-field-container">
                <input type="text" id="FechaCreacion" name="FechaCreacion" value="<?php //echo empty($fechaCreacion)?"NULL":$fechaCreacion; // si la fecha esta vacia imprime null, si no su valor?>" readonly>
                <label for="fechaCreacion">Fecha Creacion</label>
            </div>
            <div class="input-field-container">
                <input type="text" id="FechaBaja" name="FechaBaja" value="<?php //echo empty($fechaBaja)?"NULL":date('d/m/Y',$fechaBaja);?>" readonly>
                <label for="FechaBaja">Fecha Baja</label>
            </div>
            <div class="input-field-container">
                <input type="text" id="VolumenNegocio" name="VolumenNegocio" value="<?php
                    // if(isset($_REQUEST['VolumenNegocio'])){
                    //     if($aErrores['VolumenNegocio'] != null){
                    //         echo $volumenNegocio;
                    //     }else{
                    //         echo $_REQUEST['VolumenNegocio'];
                    //     }
                    // }else{
                    //     echo $volumenNegocio;
                    // }
                    ?>" required>
                    <?php
                        // echo($aErrores['VolumenNegocio'] != null) ? "<span class='error'>" . $aErrores['VolumenNegocio'] . "</span>" : null; // si el campo es erroneo se muestra un mensaje de error
                    ?>
                <label for="VolumenNegocio">Volumen Negocio</label>
            </div>
            
            <div>
                <button class="form-button" type="submit" name="Aceptar">Aceptar</button>
            </div>

        </form>

        <form  id="form-buttons" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="form-buttons-consultarModificar" method="post">
            <button class="form-button" type="submit" name="Cancelar">Cancelar</button>
        </form>
    </article>
</main>