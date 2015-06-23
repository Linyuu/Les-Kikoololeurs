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
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
            <div class="container">
                <div class="carousel-caption">
                    <img src="../images/logo_iphtest.png" id="carousel-images" alt="logo de iphtest" /><br />
                    <h1>Bienvenue sur IPHTEST !!!</h1>
                    <p>Iphtest vous souhaite la bienvenue! Vous souhaitez créer un compte, et ajouter une image à votre profil !<br>
                        Alors n'attendez plus et inscrivez-vous !!!</p>
                    <p><a class="btn btn-primary btn-lg" href="inscription.php" role="button">S'inscrire !</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <img src="../images/member.png" id="carousel-images" alt="logo de membre" /><br />
                    <h1>Venez découvrir notre espace membre</h1>
                    <p>Et si vous ajoutiez votre propre photo de profil !<br>
                        Pour découvrir cette option, connectez-vous ou inscrivez-vous !</p>
                    <p><a class="btn btn-lg btn-primary" href="connexion.php" role="button">Me Connecter</a>
                        <a class="btn btn-lg btn-primary" href="inscription.php" role="button">M'Inscrire</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="jumbotron">
    <div class="container">
        <h1>Création de news !!!</h1>
        <?php
        //Création d'une news
        if (isset($_POST['title']) AND isset($_POST['author']) AND isset($_POST['content'])){ //on vérifie si on reçoit des informations
            include "Class/newsObject.php";
            $news = new news();
            if ($news->createNews($_POST['title'], $_POST['author'],$_POST['content']) == true){
                echo '<div class="alert alert-success" role="alert">La news à bien été crée !!!</div>';
            }else{
                echo '<div class="alert alert-danger" role="alert">La news n\'à pas été crée !!!</div>';
            }

        }else { //sinon la news n'a pas été créé et on affiche le formulaire
            ?>
            <form method="post" action="newsForm.php">
                <label for="title">Titre de la news: </label><input type="text" name="title" id="title"><br/>
                <label for="author">Auteur de la news: </label><input type="text" name="author" id="author"><br/>
                <label for="content">Contenu de la news: </label><textarea rows="8" cols="50" name="content" id="content"></textarea><br/>
                <br/>
                <input type="submit" value="Créer la news >>"/>
            </form>
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