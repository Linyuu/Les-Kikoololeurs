<?php
    if(empty($_GET['action'])) {
        $_GET['action'] = 'home';
    }
include "class/dbConnect.php";
/*if(!empty($_SESSION['login']) AND session_start()){

}*/
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

    switch ($_GET['action']) {
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
                        <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">

                        <div class="container">
                            <div class="carousel-caption">
                                <img src="images/logo_iphtest.png" id="carousel-images" alt="logo de iphtest"/><br/>

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

                    <p>Iphtest vous souhaite la bienvenue! Vous souhaitez créer un compte, et ajouter une image à votre
                        profil !</p>

                    <p>Alors n'attendez plus et inscrivez-vous !!!</p>

                    <p><a class="btn btn-primary btn-lg" href="inscription.php" role="button">S'inscrire !</a></p>
                </div>
            </div>
            <?php
            break;
        case 'contact':
            ?>
            <div class="jumbotron">
                <div class="container">
                    <br/>
                    <br/>

                    <h3 align="center">- Formulaire de contact -</h3>
                    <br/>

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
            $form = false;
            echo '<div class="jumbotron">';
            echo '<div class="container">';
            echo '<br />';
            echo '<h3 align="center">- Se Connecter -</h3>';
            echo '<br />';
            echo '<br />';
            if (isset($_POST['login']) AND isset($_POST['password'])) {

                if(!empty($_POST['login']) AND !empty($_POST['password'])) {
                    $verifyLogin = new dbConnect();
                    $userLogin = $verifyLogin->verifyLogin($_POST['login']);

                    if(isset($userLogin) && $userLogin == 1) {
                        $verifyPassword = new dbConnect();
                        $userPassword = $verifyPassword->GetOneUser($_POST['login']);
                        $password = addslashes(htmlentities(md5($_POST['password'])));

                        if($userPassword['pass_md5'] == $password) {
                            $infos = new dbConnect();
                            $table = $infos->GetOneUser($_POST['login']);

                            if ($infos == true) {
                                session_start();
                                $_SESSION['login'] = $table['login'];
                                $_SESSION['id'] = $table['id'];

                                header('Location:user.php');
                            }

                            else{
                                $form = true;
                                echo '<div class="alert alert-danger" role="alert">Erreur Fatale !!!</div>';
                            }
                        }

                        else{
                            $form = true;
                            echo '<div class="alert alert-danger" role="alert">Mot de pass incorrect !!!</div>';
                        }

                    }

                    else{
                        $form = true;
                        echo '<div class="alert alert-danger" role="alert">Ce compte n\'existe pas !!!</div>';
                    }

                }

                else{
                    $form = true;
                    echo '<div class="alert alert-danger" role="alert">Vous n\'avez pas rempli tous les champs !!!</div>';
                }

            }

            else {
                $form = true;
            }

            if($form){
                ?>
                <br/>
                <form method="post" action="index.php?action=login">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Votre Login:</span>
                        <input type="text" class="form-control" placeholder="Votre Login" aria-describedby="basic-addon1" name="login">
                    </div>
                    <br/>

                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Votre Mot de passe:</span>
                        <input type="password" class="form-control" placeholder="Votre Mot de passe" aria-describedby="basic-addon1" name="password">
                    </div>
                    <br/>
                    <input type="submit" value="Se Connecter" class="btn btn-lg btn-primary" />
                </form>
                <?php
            }
            echo '</div>';
            echo '</div>';
            break;

        case "inscription": //formulaire d'inscription
            $form = false;
            ?>
            <div class="jumbotron">
                <div class="container">
                    <?php
                    if (isset($_POST['name']) AND isset($_POST['surname']) AND isset($_POST['age']) AND isset($_POST['address']) AND isset($_POST['mail']) AND isset($_POST['login']) AND isset($_POST['password']) AND isset($_POST['password2'])) {

                        if (!empty($_POST['name']) AND !empty($_POST['surname']) AND !empty($_POST['age']) AND !empty($_POST['address']) AND !empty($_POST['mail']) AND !empty($_POST['login']) AND !empty($_POST['password']) AND !empty($_POST['password2'])) {

                            if (preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST['mail'])) {

                                if ($_POST['password'] == $_POST['password2']) {
                                    $infos = new dbConnect();
                                    $verifyLogin = $infos->verifyLogin($_POST['login']);

                                    if (isset($verifyLogin) && $verifyLogin == 0) {

                                        $createUser = new dbConnect();

                                        if ($createUser->createDbUser($_POST['name'], $_POST['surname'], $_POST['age'], $_POST['address'], $_POST['mail'], $_POST['login'], $_POST['password']) == true) {
                                            $form = true;
                                            echo '<div class="alert alert-success" role="alert">Votre inscription à bien été prise en compte !!!</div>';
                                            header('Refresh:5, index.php?action=login');
                                        } else {
                                            echo '<div class="alert alert-danger" role="alert">Votre inscription n\a pas pu être prise en compte !!!</div>';
                                        }
                                    } else {
                                        $form = true;
                                        echo '<div class="alert alert-danger" role="alert">Ce login existe déjà !!!</div>';
                                    }
                                } else {
                                    $form = true;
                                    echo '<div class="alert alert-danger" role="alert">Les mots de passe ne correspondent pas !!!</div>';
                                }
                            } else {
                                $form = true;
                                echo '<div class="alert alert-danger" role="alert">Votre adresse e-Mail n\'est pas valide !!!</div>';
                            }
                        } else {
                            $form = true;
                            echo '<div class="alert alert-danger" role="alert">Vous n\'avez pas rempli tous les champs !!!</div>';
                        }
                    } else {
                        $form = true;
                    }

                    if ($form) {
                        ?>
                        <br/>
                        <h3 align="center">- Inscription -</h3>
                        <br/>
                        <form method="post" action="index.php?action=inscription">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Votre nom:</span>
                                <input type="text" class="form-control" placeholder="Votre nom" aria-describedby="basic-addon1" name="name">
                            </div>
                            <br/>

                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Votre prénom:</span>
                                <input type="text" class="form-control" placeholder="Votre prénom" aria-describedby="basic-addon1" name="surname">
                            </div>
                            <br/>

                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Votre âge</span>
                                <input type="text" class="form-control" placeholder="Votre age" aria-describedby="basic-addon1" name="age">
                            </div>
                            <br/>

                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Votre adresse</span>
                                <input type="text" class="form-control" placeholder="Votre adresse" aria-describedby="basic-addon1" name="address">
                            </div>
                            <br/>

                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Votre email</span>
                                <input type="text" class="form-control" placeholder="Votre Email" aria-describedby="basic-addon1" name="mail">
                            </div>
                            <br/>

                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">votre login</span>
                                <input type="text" class="form-control" placeholder="Votre login" aria-describedby="basic-addon1" name="login">
                            </div>
                            <br/>

                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Votre mot de passe:</span>
                                <input type="password" class="form-control" placeholder="Votre mot de passe" aria-describedby="basic-addon1" name="password">
                            </div>
                            <br/>

                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Votre mot de passe:</span>
                                <input type="password" class="form-control" placeholder="Retaper Votre mot de passe" aria-describedby="basic-addon1" name="password2">
                            </div>
                            <br/>
                            <input type="submit" value="M'inscrire !" class="btn btn-lg btn-primary"/>
                        </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php
            break; //fin du formulaire d'inscription

        case "logout": //déconnexion des users
            session_start();
            $_SESSION = array();
            session_destroy();
            unset($_SESSION['login']);
            unset($_SESSION['id']);
            header('Location:index.php');
            break; //fin de la déconnexion des users

    }
    include "view/footer.php"
?>
</body>
</html>
