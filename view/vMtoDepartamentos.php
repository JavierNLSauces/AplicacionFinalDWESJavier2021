<header id="header-mtoDepartamentos">
    <img id="logo-jnl" src="webroot/media/images/logo-jnl.svg" alt="logo jnl">
    <h1 id="header-title">MTO. DEPARTAMENTOS</h1>
    <div id="header-profile">
        <?php echo ($imagenUsuario != null) ? '<img id="fotoPerfil" src = "data:image/png;base64,' . base64_encode($imagenUsuario) . '" alt="Foto de perfil"/>' : "<img id='fotoPerfil' src='webroot/media/images/img-perfil-white.svg' alt='imagen perfil'/>"; ?>
    </div>
</header>
<main id="main-mtoDepartamentos">
    <form id="form-mtoDepartamentos-buscador" name="form-mtoDepartamentos-buscador" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" method="post">
        <div class="input-field-container">
            <input type="text" id="DescDepartamento" name="DescDepartamento"  value="<?php echo $busquedaDepartamento ?>"  optional>
            <label for="DescDepartamento">Busqueda Departamento</label>
        </div>
        <div class="select-field-container">
            <label for ="BusquedaPor">Buscar por: </label>
            <select name="BusquedaPor">
                <option value="descripcion" <?php echo ($criterioBusqueda=="descripcion") ? "selected" : null ?> > Descripcion </option>
                <option value="codigo" <?php echo ($criterioBusqueda=="codigo") ? "selected" : null ?> > Codigo </option>
            </select>
        </div>
        <div>
            <button class="form-button" type="submit" name="Buscar">Buscar</button>
        </div>
    </form>

    <article id="container-departamentos">
        <form id="form-mtoDepartamentos" name="form-mtoDepartamentos" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <table id="table-departamentos">
                <thead>
                    <tr>
                        <th>CodDepartamento</th>
                        <th>DescDepartamento</th>
                        <th>FechaCreacion</th>
                        <th>FechaBaja</th>
                        <th>VolumenNegocio</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if(count($aDepartamentos)>0){
                    foreach($aDepartamentos as $departamento => $oDepartamento){ 
                    $codDepartamento =  $oDepartamento->codDepartamento;
                ?>
                    <tr>
                        <td><?php echo $codDepartamento ?></td>
                        <td><?php echo $oDepartamento->descDepartamento ?></td>
                        <td><?php echo date('d/m/Y',$oDepartamento->fechaCreacionDepartamento) ?></td>
                        <td><?php echo (($oDepartamento->fechaBajaDepartamento)==null)? "NULL": date('d/m/Y',$oDepartamento->fechaBajaDepartamento); ?></td>
                        <td><?php echo $oDepartamento->volumenDeNegocio ?></td>
                        <td>
                            <button name="ConsultarModificarDepartamento" value="<?php echo $codDepartamento ?>"><img src="webroot/media/images/img-editar.svg" alt="imagen editar consultar departamento"></button>
                            <button name="EliminarDepartamento" value="<?php echo $codDepartamento ?>"><img src="webroot/media/images/img-eliminar.svg" alt="imagen eliminar departamento"></button>
                            <?php if($oDepartamento->fechaBajaDepartamento==null){ ?>
                            <button name="BajaLogicaDepartamento" value="<?php echo $codDepartamento ?>"><img src="webroot/media/images/img-baja-logica.svg" alt="baja logica"></button>
                            <?php } else { ?>
                            <button name="RehabilitacionDepartamento" value="<?php echo $codDepartamento ?>"><img src="webroot/media/images/img-rehabilitacion.svg" alt="rehabilitacion"></button>
                            <?php } ?>
                        </td>
                    </tr>
                <?php 
                    }
                }else{
                ?>
                    <tr>
                        <td id="busqueda-no-encontrada" colspan="5">No se ha encontrado ningun departamento con los criterios de la busqueda</td>
                    </tr>
                <?php  } ?>

                </tbody>
            </table>
        </form>
        <form id="form-mtoDepartamentos-paginacion" name="form-mtoDepartamentos-paginacion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            
            <div>
                <button class="form-button" type="submit" name="InsertarDepartamento"> Insertar</button>
                <button class="form-button" type="submit" name="ImportarDepartamentos"> Importar</button>
                <button class="form-button" type="submit" name="ExportarDepartamentos"> Exportar</button>
            </div>
            
            <div id="paginacion-container">
            <?php if(count($aDepartamentos)>0){ ?>
                <button type="submit" name="paginaInicial" value="1"><img class="imgPaginacion" src="webroot/media/images/img-first-page.svg" alt=""></button>
                <button type="submit" name="retrocederPagina" value="0"><img class="imgPaginacion" src="webroot/media/images/img-previous-page.svg" alt=""></button>
                <span>1 de 2</span>
                <button type="submit" name="avanzarPagina" value="2"><img class="imgPaginacion" src="webroot/media/images/img-next-page.svg" alt=""></button>
                <button type="submit" name="paginaFinal" value="2"><img class="imgPaginacion" src="webroot/media/images/img-last-page.svg" alt=""></button>
            <?php } ?>
            </div>
            
            <div>
                <button class="form-button" type="submit" name="Volver">Volver</button>
            </div>

        </form>
    </article>
</main>