<?php
if(empty($_GET['action'])) {
    $_GET['action'] = 'home';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_GET['action']; ?></title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/carousel.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/table.css" />
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>


<!-- Initialisation de jquery -->
<script src="js/jquery.min.js"></script>

<!-- Initialisation du java de bootstrap -->
<script src="js/bootstrap.min.js"></script>

<!--affichage du menu -->
<?php
include "view/menu.php";
?>
<div class="jumbotron">
    <div class="container">
        <?php
        if(isset($_POST['name']) AND isset($_POST['surname']) AND isset($_POST['age']) AND isset($_POST['address']) AND isset($_POST['mail']) AND isset($_POST['login']) AND isset($_POST['password'])){
            include "class/dbConnect.php";
            $createUser = new dbConnect();
            if($createUser->createDbUser($_POST['name'], $_POST['surname'], $_POST['age'], $_POST['address'], $_POST['mail'], $_POST['login'], $_POST['password']) == true){
                echo'<div class="alert alert-success" role="alert">Votre inscription à bien été prise en compte !!</div>';
                header('Refresh:5, index.php?action=login');
            }
        }
        ?>
        <br />
        <h3 align="center">- Inscription -</h3>
        <br />
        <form method="post" action="inscription.php">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Votre nom:</span>
                <input type="text" class="form-control" placeholder="Votre nom" aria-describedby="basic-addon1" name="name">
            </div><br/>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Votre prénom:</span>
                <input type="text" class="form-control" placeholder="Votre prénom" aria-describedby="basic-addon1" name="surname">
            </div><br/>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Votre âge</span>
                <input type="text" class="form-control" placeholder="Votre age" aria-describedby="basic-addon1" name="age">
            </div><br/>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Votre adresse</span>
                <input type="text" class="form-control" placeholder="Votre adresse" aria-describedby="basic-addon1" name="address">
            </div><br/>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Votre email</span>
                <input type="text" class="form-control" placeholder="Votre Email" aria-describedby="basic-addon1" name="mail">
            </div><br/>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">votre login</span>
                <input type="text" class="form-control" placeholder="Votre login" aria-describedby="basic-addon1" name="login">
            </div><br/>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Votre mot de passe:</span>
                <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" name="password">
            </div><br/>
            <input type="submit" value="M'inscrire !" class="btn btn-lg btn-primary" />
        </form>
    </div>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Contact Webmaster</h2>
                <p>Kikoololeur GALLAND<br>
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
                <img src="images/facebook_logo.png" id="images_social_footer" title="Nous suivre sur Facebook !" alt="logo de facebook" /><img src="images/twitter_logo.png" id="images_social_footer" title="Nous suivre sur Twitter !" alt="logo de twitter" /><img src="images/google+_logo.png" id="images_social_footer" title="Nous suivre sur Google + !" alt="logo de google +" /><img src="images/rss_logo.png" id="images_social_footer" title="Nous suivre avec Flux RSS !" alt="logo de flux rss" />
            </div>
        </div>
        <footer>
            <p><span class="glyphicon glyphicon-copyright-mark"></span> Copyright IPHTEST 2015 <img src="images/logo_iphtest.png" id="footer_logo" alt="logo de iphtest" /></p>
        </footer>
    </div>
</body>
</html>
