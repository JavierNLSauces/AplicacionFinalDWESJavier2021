<header id="header-Error">
    <img id="logo-jnl" src="/AplicacionFinalDWESJavier2021/webroot/media/images/logo-jnl.svg" alt="logo jnl">
    <h1 id="header-title">ERROR</h1>
</header>

<main id="main-Error">
    <article id="Error-container">
    <header>
        <h2>Error <?php echo $errorCode ?></h2>
        <p>Lo sentimos pero esta pagina no esta disponible por el momento...</p>
    </header>
    <form id="form-Error" name="form-Error" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            <button class="form-button" type="submit" name="VolverWIP">Volver</button>
        </div>
    </form>
    </article>
</main>