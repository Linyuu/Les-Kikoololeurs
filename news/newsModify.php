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

<!-- Menu de navigation -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="../images/logo_iphtest.png" alt="logo de iphtest" /></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Accueil <span class="sr-only">(current)</span></a></li>
                <li><a href="inscription.php"><span class="glyphicon glyphicon-file"></span> S'inscrire</a></li>
                <li><a href="connexion.php"><span class="glyphicon glyphicon-lock"></span> Login</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="jumbotron">
    <div class="container">
        <h1>Bienvenue sur IPHTEST !!!</h1>
        <p>Iphtest vous souhaite la bienvenue! Vous souhaitez créer un compte, et ajouter une image à votre profil !</p>
        <p>Alors n'attendez plus et inscrivez-vous !!!</p>
        <p><a class="btn btn-primary btn-lg" href="inscription.php" role="button">S'inscrire !</a></p>
        <?php

        if(isset($_GET['action'])){ //on vérifie que l'on à bien reçu une action
            $action = addslashes(htmlentities($_GET['action'])); //on sécurise l'action en l'insérant dans une variable

            switch($action){       //on fait un switch des actions
                case "modifyNews":  //récupération de la news et affichage dans un formulaire
                    if(isset($_GET['id'])){
                        $id = intval(htmlentities($_GET['id']));
                        include "../class/dbConnect.php";
                        $newsSelect = new dbConnect();
                        $news = $newsSelect->getDbNewsId($id) ;
                        if($news) {
                            ?>
                            <form method="post" action="newsModify.php?action=modifyDbNews">
                                <label for="title">Titre de la news: </label><input type="text" name="title" id="title" value="<?php echo $news['title']; ?>"><br/>
                                <label for="author">Auteur de la news: </label><input type="text" name="author" id="author" value="<?php echo $news['author']; ?>"><br/>
                                <input type="hidden" name="id" value="<?php echo $news['id']; ?>"><br/>
                                <label for="content">Contenu de la news: </label><textarea rows="8" cols="50" name="content" id="content"><?php echo $news['content']; ?></textarea><br/>
                                <br/>
                                <input type="submit" value="Modifier la news >>"/>
                            </form>
                        <?php
                        }

                        else{
                            echo '<div class="alert alert-danger" role="alert">La news n\'existe pas !!</div>';
                            header('Refresh:5, newsPage.php');
                        }
                    }

                    else{
                        echo '<div class="alert alert-danger" role="alert">Erreur Falate</div>';
                        header('Refresh: 5, newsPage.php');
                    }

                    break;//récupération de la news et affichage dans un formulaire



                case "modifyDbNews": //modification de la news en base de données
                    if(isset($_POST['title']) AND isset($_POST['author']) AND isset($_POST['id']) AND isset($_POST['content'])){
                        include "../class/newsObject.php";
                        $newsModify = new news();
                        if($newsModify->modifyNews($_POST['id'], $_POST['title'], $_POST['author'], $_POST['content']) == true){
                            echo '<div class="alert alert-success" role="alert">La news à bien été modifiée !!</div>';
                            header('Refresh:5, newsPage.php');
                        }

                        else{
                            echo '<div class="alert alert-danger" role="alert">La news n\'a pas pu être modifée !!</div>';
                        }
                    }

                    else{
                        echo '<div class="alert alert-danger" role="alert">Erreur Fatale</div>';
                    }
                    break; // fin de la modification de la news en base de données
            }
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
