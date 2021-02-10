<header id="header-registro">
    <img id="logo-jnl" src="/AplicacionFinalDWESJavier2021/webroot/media/images/logo-jnl.svg" alt="logo jnl">
    <h1 id="header-title">REGISTRO</h1>
</header>
<main id="main-registro">
    <article class="form-container">
        <header>
            <h2>Registro</h2>
        </header>
        <form  id="form-registro" name="registro" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="input-field-container">
                <input type="text" id="CodUsuario" name="CodUsuario" required>
                <label for="CodUsuario">Usuario</label>

            </div>
            <?php
            echo ($aErrores['CodUsuario'] != null) ? "<span class='error'>" . $aErrores['CodUsuario'] . "</span>" : null; // si el campo es erroneo se muestra un mensaje de error
            ?>
            <div class="input-field-container">
                <input type="text" id="DescUsuario" name="DescUsuario" value="<?php
                    echo (isset($_REQUEST['DescUsuario'])) ? $_REQUEST['DescUsuario'] : null;
                    ?>" required>
                <label for="DescUsuario">Descripcion</label>

            </div>
            <?php
            echo ($aErrores['DescUsuario'] != null) ? "<span class='error'>" . $aErrores['DescUsuario'] . "</span>" : null; // si el campo es erroneo se muestra un mensaje de error
            ?>
            <div class="input-field-container">
                <input type="password" id="Password" name="Password" value="<?php
                    echo (isset($_REQUEST['Password'])) ? $_REQUEST['Password'] : null;
                    ?>" required>
                <label for="Password">Password</label>

            </div>
            <?php
            echo ($aErrores['Password'] != null) ? "<span class='error'>" . $aErrores['Password'] . "</span>" : null; // si el campo es erroneo se muestra un mensaje de error
            ?>
            <div class="input-field-container">
                <input type="password" id="PasswordRepetida" name="PasswordRepetida" value="<?php
                    echo (isset($_REQUEST['PasswordRepetida'])) ? $_REQUEST['PasswordRepetida'] : null;
                    ?>" required>
                <label for="PasswordRepetida">Repetir password</label>

            </div>
            <?php
            echo ($aErrores['PasswordRepetida'] != null) ? "<span class='error'>" . $aErrores['PasswordRepetida'] . "</span>" : null; // si el campo es erroneo se muestra un mensaje de error
            ?>
            
            <div>
                <button class="form-button" type="submit" name="Registrarse">Registrarse</button>
            </div>

        </form>
        <form  id="form-buttons" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="registro" method="post">
            <button class="form-button" type="submit" name="Cancelar"> Cancelar</button>
        </form>
    </article>
</main>