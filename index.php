<!DOCTYPE html>
    <html>
<head>
    <title><?php echo $_POST['actionPage']; ?></title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/carousel.css" />
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
<!-- Initialisation de jquery -->
<script src="js/jquery.min.js"></script>

<!-- Initialisation du java de bootstrap -->
<script src="js/bootstrap.min.js"></script>
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
            <a class="navbar-brand" href="#"><img src="images/logo_iphtest.png" alt="logo de iphtest" /></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Accueil <span class="sr-only">(current)</span></a></li>
                <li><a href="index.php?action=home"><span class="glyphicon glyphicon-file"></span> S'inscrire</a></li>
                <li><a href="index.php?action=login"><span class="glyphicon glyphicon-lock"></span> Login</a></li>
                <li><a href="index.php?action=contact"><span class="glyphicon glyphicon-magnet"></span> Contact</a></li>
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

<!-- Partie PHP de connexion à l'espace membre fait par Sushi -->


<?php
// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
    if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {

        $base = mysql_connect('serveur', 'login', 'password');
        mysql_select_db('nom_base', $base);

        // on teste si une entrée de BDD contient login / pass
        $sql = 'SELECT count(*) FROM membre WHERE login="' . mysql_escape_string($_POST['login']) . '" AND pass_md5="' . mysql_escape_string(md5($_POST['pass'])) . '"';
        $req = mysql_query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
        $data = mysql_fetch_array($req);

        mysql_free_result($req);
        mysql_close();

        // si réponse, alors l'utilisateur est un membre
        if ($data[0] == 1) {
            session_start();
            $_SESSION['login'] = $_POST['login'];
            header('Location: membre.php');
            exit();
        }
        else {
                echo ("erreur de connexion");
        }
    }
}

switch ($_GET['action']){
case 'home':
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide"
                 src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                 alt="First slide">

            <div class="container">
                <div class="carousel-caption">
                    <img src="images/logo_iphtest.png" id="carousel-images" alt="logo de iphtest"/><br/>

                    <h1>Bienvenue sur IPHTEST !!!</h1>

                    <p>Iphtest vous souhaite la bienvenue! Vous souhaitez créer un compte, et ajouter une image à votre
                        profil !<br>
                        Alors n'attendez plus et inscrivez-vous !!!</p>

                    <p><a class="btn btn-primary btn-lg" href="inscription.php" role="button">S'inscrire !</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide"
                 src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                 alt="Second slide">

            <div class="container">
                <div class="carousel-caption">
                    <img src="images/member.png" id="carousel-images" alt="logo de membre"/><br/>

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
        <h1>Bienvenue sur IPHTEST !!!</h1>

        <p>Iphtest vous souhaite la bienvenue! Vous souhaitez créer un compte, et ajouter une image à votre profil !</p>

        <p>Alors n'attendez plus et inscrivez-vous !!!</p>

        <p><a class="btn btn-primary btn-lg" href="inscription.php" role="button">S'inscrire !</a></p>
    </div>
    <?php
    break;
    case 'contact':
        ?>
        <form id="contact" name="contact" method="post">
            <fieldset>
                <label for="name" id="name">Name<span class="required">*</span></label>
                <input type="text" name="name" id="name" size="30" value="" required/>

                <label for="email" id="email">Email<span class="required">*</span></label>
                <input type="text" name="email" id="email" size="30" value="" required/>

                <label for="phone" id="phone">Phone</label>
                <input type="text" name="phone" id="phone" size="30" value=""/>

                <label for="Message" id="message">Message<span class="required">*</span></label>
                <textarea name="message" id="message" required></textarea>

                <input id="submit" type="submit" name="submit" value="Send"/>
            </fieldset>
        </form>
        </div>
        <?php
        if (isset($POST)) {
            $to = "sebastien.bayle124@gmail.com";
            $from = $_REQUEST['email'];
            $name = $_REQUEST['name'];
            $headers = "De: $from";
            $subject = "Un message de votre site : Formulaire contact";

            $fields = array();
            $fields{"name"} = "name";
            $fields{"email"} = "email";
            $fields{"phone"} = "phone";
            $fields{"message"} = "message";

            $body = "Here is what was sent:\n\n";
            foreach ($fields as $a => $b) {
                $body .= sprintf("%20s: %s\n", $b, $_REQUEST[$a]);
            }

            $send = mail($to, $subject, $body, $headers);
        }
    break;
    case 'login':


//vérifie que l'utilisateur est bien enregistré dans la BDD

session_start();
if (!isset($_SESSION['login'])) {
    header ('Location: index.php');
    exit();
}
?>


    <!-- l'utilisateur est bien authentifié on le renvoit à l'espace membre. -->

    <body>
    <?php
    $member = new User;
    $nom = $member->'nom';
    $prenom = $member->'prenom';
    $age = $member->'age';
    $adresse = $member->'adresse';
    $email = $member->'email';
    $login = $member->'login';
    $pass = $member->'pass_md5';
    ?>

    <p>Bienvenue <?php echo htmlentities(trim($_SESSION['login'])); ?> !</p><br />
    <table>
        <thead>
        <tr>
            <td>Nom</td>
            <td>Prenom</td>
            <td>Age</td>
            <td>Adresse</td>
            <td>Email</td>
            <td>Login</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $nom?></td>
            <td><?php echo $prenom?></td>
            <td><?php echo $age?></td>
            <td><?php echo $adresse?></td>
            <td><?php echo $email?></td>
            <td><?php echo $login?></td>
        </tr>
        </tbody>
    </table>

    <a href="deconnexion.php">Déconnexion</a>
?>

</body>
</html>

