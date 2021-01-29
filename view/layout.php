<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>AplicacionFinalDWESJavier2021</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Javier Nieto Lorenzo">
    <meta name="robots" content="index, follow">
    <link rel="stylesheet" href="webroot/css/styles.css" type="text/css">
    <link rel="icon" href="webroot/media/images/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="webroot/js/script.js">
	</script>
</head>

<body>
    <div class="body-container">

        <?php require_once $vistaEnCurso ?>

        <footer >
            <section id="about">
                <form id="links" name="form-links" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <button type="submit" name="Tecnologias">Ver tecnologías y herramientas utilizadas</button>
                        <a href="doc/CurriculumVitae.pdf" target="_blank">Ver Curriculum vitae del Autor</a>
                        <a href="https://www.netflix.com/" target="_blank">Ir a Web Imitada</a>
                </form>

                <article id="icons">
                    <a href="https://github.com/JavierNLSauces/" target="_blank"> <img id="icon-github" src="webroot/media/images/github.svg" alt="github icon"> </a>
                    <a href="http://daw217.ieslossauces.es/" target="_blank"> <img id="icon-1and1" src="webroot/media/images/1and1.svg" alt="1and1 icon"> </a>
                    <a href="doc/phpDocumentor/index.html" target="_blank"> <img id="icon-phpDoc" src="webroot/media/images/phpDoc.svg" alt="phpDoc icon"> </a>
                    <a href="#" target="_blank"> <img id="icon-rss" src="webroot/media/images/rss.svg" alt="rss icon"> </a>
                </article>

                <article id="address">
                    <a href="../../index.html">&copy; 2020-2021 Javier Nieto Lorenzo</a>
                </article>
            </section>
        </footer>

    </div>
</body>

</html>