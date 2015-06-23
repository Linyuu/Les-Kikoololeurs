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

<!-- Initialisation de CKEDITOR -->
<script src="../ckeditor/ckeditor.js"></script>

<!-- Menu de navigation -->
<?php include "../view/menu.php" ?>


<div class="jumbotron">
    <div class="container">
        <h3 align="center">- Créer une news -</h3><br />
        <?php
        //Création d'une news
        if (isset($_POST['title']) AND isset($_POST['author']) AND isset($_POST['description']) AND isset($_POST['content'])){ //on vérifie si on reçoit des informations
            include "../Class/newsObject.php";
            $news = new news();
            if ($news->createNews($_POST['title'], $_POST['author'], $_POST['description'], $_POST['content']) == true){
                echo '<div class="alert alert-success" role="alert">La news à bien été crée !!!</div>';
                header ('Refresh: 3, newsPage.php');
            }else{
                echo '<div class="alert alert-danger" role="alert">La news n\'à pas été crée !!!</div>';
                header ('Refresh: 3, newsPage.php');
            }

        }else { //sinon la news n'a pas été créé et on affiche le formulaire
            ?>
        <form method="post" action="newsForm.php">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Titre de la news</span>
                <input type="text" class="form-control" placeholder="Titre" aria-describedby="basic-addon1" name="title">
            </div><br/>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Auteur de la news</span>
                <input type="text" class="form-control" placeholder="Auteur" aria-describedby="basic-addon1" name="author">
            </div><br/>
            <label for="description">Description de la news:</label><textarea rows="8" cols="50" name="description" id="editor1"></textarea><br /><script>CKEDITOR.replace( 'editor1' );</script>
            <label for="content">Contenu de la news: </label><textarea rows="8" cols="50" name="content" id="editor2"></textarea><br/><script>CKEDITOR.replace( 'editor2' );</script>
            <input type="submit" value="Créer la news" class="btn btn-lg btn-primary" role="button" />
            <br/>
        <?php
        }

        ?>
    </div>
</div>
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