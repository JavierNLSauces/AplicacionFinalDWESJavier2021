<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>AplicacionFinalDWESJavier2021</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Javier Nieto Lorenzo">
    <meta name="robots" content="index, follow">
    <link rel="stylesheet" href="/AplicacionFinalDWESJavier2021/webroot/css/styles.css" type="text/css">
    <link rel="icon" href="/AplicacionFinalDWESJavier2021/webroot/media/images/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="/AplicacionFinalDWESJavier2021/webroot/js/script.js"></script>
</head>

<body>
    <?php if(!isset($_COOKIE['PoliticaCookie'])){ ?>
    <article id='contenedor-cookie'>
        <div id='modal-cookie'>
            <form id="form-cookie" name="form-cookie" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <img id="logo-cookies" src="/AplicacionFinalDWESJavier2021/webroot/media/images/logo-jnl.svg" alt="logo jnl">
                <h2>Antes de continuar</h2>
                <p>Utilizamos cookies y otros datos para proporcionar, mantener y mejorar nuestros servicios</p>
                <button id="aceptar-cookie" class="form-button" name="Aceptar-cookie" type="submit">Aceptar</button>
            </form>
        </div>
    </article>
    <?php } ?>

    <div class="body-container">

        <?php require_once $vistaEnCurso ?>

        <footer >
            <section id="about">
                <form id="links" name="form-links" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <button type="submit" name="Tecnologias">Ver tecnologías y herramientas utilizadas</button>
                        <a href="/AplicacionFinalDWESJavier2021/doc/CurriculumVitae.pdf" target="_blank">Ver Curriculum vitae del Autor</a>
                        <a href="https://www.netflix.com/" target="_blank">Ir a Web Imitada</a>
                </form>

                <article id="icons">
                    <a href="https://github.com/JavierNLSauces/" target="_blank"> <img id="icon-github" src="/AplicacionFinalDWESJavier2021/webroot/media/images/github.svg" alt="github icon"> </a>
                    <a href="http://daw217.ieslossauces.es/" target="_blank"> <img id="icon-1and1" src="/AplicacionFinalDWESJavier2021/webroot/media/images/1and1.svg" alt="1and1 icon"> </a>
                    <a href="/AplicacionFinalDWESJavier2021/doc/phpDocumentor/index.html" target="_blank"> <img id="icon-phpDoc" src="/AplicacionFinalDWESJavier2021/webroot/media/images/phpDoc.svg" alt="phpDoc icon"> </a>
                    <a href="/AplicacionFinalDWESJavier2021/doc/doxygen/index.html" target="_blank"> <img id="icon-doxygen" src="/AplicacionFinalDWESJavier2021/webroot/media/images/doxygen.svg" alt="doxygen icon"> </a>
                    <a href="/AplicacionFinalDWESJavier2021/webroot/rss/rss.xml" target="_blank"> <img id="icon-rss" src="/AplicacionFinalDWESJavier2021/webroot/media/images/rss.svg" alt="rss icon"> </a>
                </article>

                <article id="address">
                    <a href="../../index.html">&copy; 2020-2021 Javier Nieto Lorenzo</a>
                </article>
            </section>
        </footer>

    </div>
</body>

</html>