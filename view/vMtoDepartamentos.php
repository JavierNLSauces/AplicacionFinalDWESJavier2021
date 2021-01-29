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
            <input type="text" id="DescDepartamento" name="DescDepartamento"  required>
            <label for="DescDepartamento">Busqueda Departamento</label>
        </div>
        <div class="select-field-container">
            <label>Buscar por: </label>
            <select name="BusquedaPor">
                <option value="descripcion" selected="">Descripcion</option>
                <option value="codigo">Codigo</option>
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

                    <tr class='verde'>
                        <td>ALM</td>
                        <td>Departamento de almacen</td>
                        <td>23/11/2020</td>
                        <td>NULL</td>
                        <td>8</td>
                        <td>
                            <button name="ConsultarModificarDepartamento" value="ALM"><img src="webroot/media/images/img-editar.svg" alt="imagen editar consultar departamento"></button>
                            <button name="EliminarDepartamento" value="ALM"><img src="webroot/media/images/img-eliminar.svg" alt="imagen eliminar departamento"></button>
                            <button name="BajaLogicaDepartamento" value="ALM"><img src="webroot/media/images/img-baja-logica.svg" alt="baja logica"></button>
                            <button name="RehabilitacionDepartamento" value="ALM"><img src="webroot/media/images/img-rehabilitacion.svg" alt="rehabilitacion"></button>
                        </td>
                    </tr>
                    <tr class='verde'>
                        <td>AYC</td>
                        <td>Departamento de administracion y contabilidad</td>
                        <td>23/11/2020</td>
                        <td>NULL</td>
                        <td>8</td>
                        <td>
                            <button name="consultar" value="AYC"><img src="webroot/media/images/img-editar.svg" alt="imagen editar consultar departamento"></button>
                            <button name="borrar" value="AYC"><img src="webroot/media/images/img-eliminar.svg" alt="imagen eliminar departamento"></button>
                            <button name="baja" value="AYC"><img src="webroot/media/images/img-rehabilitacion.svg" alt="baja logica"></button>
                        </td>
                    </tr>
                    <tr class='verde'>
                        <td>CON</td>
                        <td>Departamento de contabilidad</td>
                        <td>23/11/2020</td>
                        <td>NULL</td>
                        <td>9</td>
                        <td>
                            <button name="consultar" value="CON"><img src="webroot/media/images/img-editar.svg" alt="imagen editar consultar departamento"></button>
                            <button name="borrar" value="CON"><img src="webroot/media/images/img-eliminar.svg" alt="imagen eliminar departamento"></button>
                            <button name="baja" value="CON"><img src="webroot/media/images/img-rehabilitacion.svg" alt="baja logica"></button>
                        </td>
                    </tr>
                    <tr class='verde'>
                        <td>DTE</td>
                        <td>Departamento de dibujo tecnico </td>
                        <td>23/11/2020</td>
                        <td>NULL</td>
                        <td>20</td>
                        <td>
                            <button name="consultar" value="DTE"><img src="webroot/media/images/img-editar.svg" alt="imagen editar consultar departamento"></button>
                            <button name="borrar" value="DTE"><img src="webroot/media/images/img-eliminar.svg" alt="imagen eliminar departamento"></button>
                            <button name="baja" value="DTE"><img src="webroot/media/images/img-baja-logica.svg" alt="baja logica"></button>
                        </td>
                    </tr>
                    <tr class='verde'>
                        <td>FIS</td>
                        <td>Departamento de fisica</td>
                        <td>23/11/2020</td>
                        <td>NULL</td>
                        <td>45</td>
                        <td>
                            <button name="consultar" value="FIS"><img src="webroot/media/images/img-editar.svg" alt="imagen editar consultar departamento"></button>
                            <button name="borrar" value="FIS"><img src="webroot/media/images/img-eliminar.svg" alt="imagen eliminar departamento"></button>
                            <button name="baja" value="FIS"><img src="webroot/media/images/img-baja-logica.svg" alt="baja logica"></button>
                        </td>
                    </tr>
                    <tr class='verde'>
                        <td>INF</td>
                        <td>Departamento de informatica</td>
                        <td>23/11/2020</td>
                        <td>NULL</td>
                        <td>5</td>
                        <td>
                            <button name="consultar" value="INF"><img src="webroot/media/images/img-editar.svg" alt="imagen editar consultar departamento"></button>
                            <button name="borrar" value="INF"><img src="webroot/media/images/img-eliminar.svg" alt="imagen eliminar departamento"></button>
                            <button name="baja" value="INF"><img src="webroot/media/images/img-rehabilitacion.svg" alt="alta logica"></button>
                        </td>
                    </tr>
                    <tr class='verde'>
                        <td>LEC</td>
                        <td>Departamento de lengua castellana</td>
                        <td>23/11/2020</td>
                        <td>NULL</td>
                        <td>4</td>
                        <td>
                            <button name="consultar" value="LEC"><img src="webroot/media/images/img-editar.svg" alt="imagen editar consultar departamento"></button>
                            <button name="borrar" value="LEC"><img src="webroot/media/images/img-eliminar.svg" alt="imagen eliminar departamento"></button>
                            <button name="baja" value="LEC"><img src="webroot/media/images/img-rehabilitacion.svg" alt="alta logica"></button>
                        </td>
                    </tr>
                    <tr class='verde'>
                        <td>MAT</td>
                        <td>Departamento de matematicas</td>
                        <td>23/11/2020</td>
                        <td>NULL</td>
                        <td>8</td>
                        <td>
                            <button name="consultar" value="MAT"><img src="webroot/media/images/img-editar.svg" alt="imagen editar consultar departamento"></button>
                            <button name="borrar" value="MAT"><img src="webroot/media/images/img-eliminar.svg" alt="imagen eliminar departamento"></button>
                            <button name="baja" value="MAT"><img src="webroot/media/images/img-rehabilitacion.svg" alt="alta logica"></button>
                        </td>
                    </tr>
                    <tr class='verde'>
                        <td>MEC</td>
                        <td>Departamento de mecanica </td>
                        <td>23/11/2020</td>
                        <td>NULL</td>
                        <td>20</td>
                        <td>
                            <button name="consultar" value="MEC"><img src="webroot/media/images/img-editar.svg" alt="imagen editar consultar departamento"></button>
                            <button name="borrar" value="MEC"><img src="webroot/media/images/img-eliminar.svg" alt="imagen eliminar departamento"></button>
                            <button name="baja" value="MEC"><img src="webroot/media/images/img-rehabilitacion.svg" alt="alta logica"></button>
                        </td>
                    </tr>
                    <tr class='verde'>
                        <td>MKT</td>
                        <td>Departamento de marketing</td>
                        <td>23/11/2020</td>
                        <td>NULL</td>
                        <td>1</td>
                        <td>
                            <button name="consultar" value="MKT"><img src="webroot/media/images/img-editar.svg" alt="imagen editar consultar departamento"></button>
                            <button name="borrar" value="MKT"><img src="webroot/media/images/img-eliminar.svg" alt="imagen eliminar departamento"></button>
                            <button name="baja" value="MKT"><img src="webroot/media/images/img-rehabilitacion.svg" alt="alta logica"></button>
                        </td>
                    </tr>
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
                <button type="submit" name="paginaInicial" value="1"><img class="imgPaginacion" src="webroot/media/images/img-first-page.svg" alt=""></button>
                <button type="submit" name="retrocederPagina" value="0"><img class="imgPaginacion" src="webroot/media/images/img-previous-page.svg" alt=""></button>
                <span>1 de 2</span>
                <button type="submit" name="avanzarPagina" value="2"><img class="imgPaginacion" src="webroot/media/images/img-next-page.svg" alt=""></button>
                <button type="submit" name="paginaFinal" value="2"><img class="imgPaginacion" src="webroot/media/images/img-last-page.svg" alt=""></button>
            </div>
            <div>
                <button class="form-button" type="submit" name="Volver">Volver</button>
            </div>

        </form>
    </article>
</main>