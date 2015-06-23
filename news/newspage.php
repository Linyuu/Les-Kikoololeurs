<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" media="all" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="../css/carousel.css" />
    <link rel="icon" type="image/png" href="../images/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<!-- Initialisation de jquery -->
<script src="../js/jquery.min.js"></script>

<!-- Initialisation du java de bootstrap -->
<script src="../js/bootstrap.min.js"></script>

<?php include "../view/menu.php"; ?>

<!-- affichage des news -->
        <?php
        if(isset($_GET['news'])){
            $id = intval(htmlentities($_GET['news']));
            include "../class/dbconnect.php";
            $newsSelect = new dbConnect();
            $news = $newsSelect->getDbNewsId($id);
            if($news){
                echo '<div class="jumbotron">';
                echo '<div class="container">';
                echo '<h1>'.$news['title'].'</h1>';
                echo '<p>News écrite par: '.$news['author'].'</p>';
                echo '<p>'.$news['content'].'</p>';
                echo '<a href="newspage.php" class="btn btn-lg btn-primary" role="button">Retour aux news</a>';
            }



        }

        else {
            include "../class/dbConnect.php";
            $newsDisplay = new dbConnect();
            foreach ($newsDisplay->getDbNews() as $news) {
                echo '<div class="jumbotron">';
                echo '<div class="container">';
                echo '<h1>' . $news['title'] . '</h1>';
                echo '<p>' . $news['description'] . '</p>';
                echo '<p><a class="btn btn-lg btn-primary" role="button" href="newsModify.php?action=modifyNews&amp;id=' . $news['id'] . '">Modifier >></a>&nbsp; &nbsp; &nbsp;<a href="newspage.php?news=' . $news['id'] . '" class="btn btn-lg btn-primary" role="button">Lire la news >></a></p>';
                echo '<p>Par: ' . $news['author'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '<br />';
                echo '<br />';
                echo '<br />';
                echo '<br />';

            }
        }
        ?>

<br />
<br />
<br />
<br />
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h2>Contact Webmaster</h2>
            <p>Maxence GALLAND<br>
                Lyon (69), France</p>
            <p><a class="btn btn-default" href="mailto:maxence.galland@gmail.com" role="button"><span class="glyphicon glyphicon-envelope"></span> Envoyer un mail »</a></p>
        </div>
        <div class="col-md-4">
            <h2>Mentions légales</h2>
            <p>Pour connaître les informations concernant le Site Web, ainsi que celle de l'hebergeur.</p>
            <p><a class="btn btn-default" href="#" role="button">Cliquez ici »</a></p>
        </div>
        <div class="col-md-4">
            <h2>Suivez-nous !</h2>
            <img src="../images/facebook_logo.png" id="images_social_footer" title="Nous suivre sur Facebook !" alt="logo de facebook" /><img src="../images/twitter_logo.png" id="images_social_footer" title="Nous suivre sur Twitter !" alt="logo de twitter" /><img src="../images/google+_logo.png" id="images_social_footer" title="Nous suivre sur Google + !" alt="logo de google +" /><img src="../images/rss_logo.png" id="images_social_footer" title="Nous suivre avec Flux RSS !" alt="logo de flux rss" />
        </div>
    </div>
    <hr></hr>
    <footer>
        <p><span class="glyphicon glyphicon-copyright-mark"></span> Copyright IPHTEST 2015 <img src="../images/logo_iphtest.png" id="footer_logo" alt="logo de iphtest" /></p>
    </footer>
</div>

</body>
</html>