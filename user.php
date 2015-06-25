<!DOCTYPE html>
<html>
<head>
    <title>Les Kikoololeurs: Espace Utilisateur</title>
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

    <?php
    include "Class/dbConnect.php";
        if(session_start()){
            if(!empty($_SESSION['id']) && !empty($_SESSION['login'])) {
                $request = new dbConnect();
                $verifyUser = $request->getUserId($_SESSION['id']);
                if($request) {
                    if($verifyUser['login'] == $_SESSION['login']) {
                        $infosUser = $verifyUser;
                        include "view/menu_user.php";
                        ?>
                        <div class="jumbotron">
                            <div class="container">
                                <p><?php echo 'Bienvenue ' . $infosUser['nom'] . ' ' . $infosUser['prenom'] . ''; ?> !</p>
                                <p align="center"><img src="images/uploads/<?php echo $infosUser['image_profile']; ?>" align="center" alt="image de profil" id="image_profile"/></p><br />
                                <br />
                                <br />
                                <?php
                                    if(isset($_GET['action'])) {
                                        $action = addslashes(htmlentities($_GET['action']));
                                        switch ($action) {
                                            case "infoUser":  //afficher les informations de l'utilisateur
                                                ?>
                                                <div class="datagrid">
                                                    <table>
                                                        <thead>
                                                        <tr>
                                                            <th>Nom</th>
                                                            <th>Prenom</th>
                                                            <th>Age</th>
                                                            <th>Adresse</th>
                                                            <th>Email</th>
                                                            <th>Login</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td><?php echo $infosUser['nom']; ?></td>
                                                            <td><?php echo $infosUser['prenom']; ?></td>
                                                            <td><?php echo $infosUser['age']; ?></td>
                                                            <td><?php echo $infosUser['adresse']; ?></td>
                                                            <td><?php echo $infosUser['email']; ?></td>
                                                            <td><?php echo $infosUser['login']; ?></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php
                                                break;//fin de l'affichage des informations de l'utilisateur


                                            case "userModify": //modification des informations utilisateur
                                                ?>
                                                <ul>
                                                    <li><a href="user.php?action=modifyUserInfo"> Changer mes
                                                            informations</a></li>
                                                    <li><a href="user.php?action=modifyUserPass">Changer mon mot de
                                                            passe</a></li>
                                                    <li><a href="user.php?action=modifyUserImage">Changer ma photo de
                                                            profil</a></li>
                                                </ul>
                                                <?php
                                                break; //fin de modifications utilisateur

                                            case "modifyUserInfo": //modification des informations utilisateur
                                                $form = false;
                                                if (isset($_POST['name']) AND isset($_POST['surname']) AND isset($_POST['age']) AND isset($_POST['address']) AND isset($_POST['mail'])) {
                                                    if (!empty($_POST['name']) AND !empty($_POST['surname']) AND !empty($_POST['age']) AND !empty($_POST['address']) AND !empty($_POST['mail'])) {
                                                        $id = $_SESSION['id'];
                                                        $updateUser = new dbConnect();
                                                        if ($updateUser->modifyDbUser($id, $_POST['name'], $_POST['surname'], $_POST['age'], $_POST['address'], $_POST['mail']) == true) {
                                                            echo "<div class='alert alert-success' role='alert'>Vos modifications ont bien été prise en compte !!</div>";
                                                        } else {
                                                            echo '<div class="alert alert-danger" role="alert">Erreur Fatale !!!</div>';
                                                            header('Refresh:3, user.php');
                                                        }

                                                    } else {
                                                        echo '<div class="alert alert-danger">Vous n\'avez pas rempli tous les champs</div>';
                                                        $form = true;
                                                    }
                                                } else {
                                                    $form = true;
                                                }

                                                if ($form) {
                                                    $selectInfo = new dbConnect();
                                                    $infosUser = $selectInfo->GetOneUser($_SESSION['login']);
                                                    include "form/modifyUserInfos.php";
                                                }
                                                break; //fin de modification des informations utilisateur


                                            case"modifyUserPass": //modification du mot de passe utilisateur
                                                $form = false;
                                                if (isset($_POST['passwordOld']) AND isset($_POST['passwordNew1']) AND isset($_POST['passwordNew2'])) {
                                                    if (!empty($_POST['passwordOld']) AND !empty($_POST['passwordNew1']) AND !empty($_POST['passwordNew2'])) {
                                                        if ($_POST['passwordNew1'] == $_POST['passwordNew2']) {
                                                            $verifyPass = new dbConnect();
                                                            $verifyPassResult = $verifyPass->verifyPass($_SESSION['id']);
                                                            $passwordOld = addslashes(htmlentities(md5($_POST['passwordOld'])));
                                                            $passwordNew = addslashes(htmlentities(md5($_POST['passwordNew1'])));

                                                            if ($verifyPassResult['pass_md5'] == $passwordOld) {
                                                                $setNewPass = new dbConnect();
                                                                $setNewPassResult = $setNewPass->setNewUserPass($passwordNew);
                                                                echo '<div class="alert alert-success" role="alert">Votre mot de passe à bien été modifié !!!</div>';
                                                                header('Refresh:3, user.php');
                                                            } else {
                                                                echo '<div class="alert alert-danger" role="alert">Votre Ancien mot de passe est incorrect !!!</div>';
                                                                $form = true;
                                                            }
                                                        } else {
                                                            echo '<div class="alert alert-danger" role="alert">Les nouveaux mots de passes ne correspondent pas !!</div>';
                                                            $form = true;
                                                        }
                                                    } else {
                                                        echo '<div class="alert alert-danger" role="alert">Vous n\'avez pas rempli tous les champs</div>';
                                                        $form = true;
                                                    }
                                                } else {
                                                    $form = true;
                                                }

                                                if ($form) {
                                                    include "form/modifyUserPassword.php";
                                                }
                                                break; //fin de modification du mot de passe utilisateur


                                            case "modifyUserImage":
                                                $form = false;
                                                if(isset($_FILES['image_profile']) AND $_FILES['image_profile']['error'] == 0) {

                                                    if ($_FILES['image_profile']['size'] <= 5000000) {
                                                        $file_infos = pathinfo($_FILES['image_profile']['name']);
                                                        $filename = $_FILES['image_profile']['name'];
                                                        $extension_origin = $file_infos['extension'];
                                                        $valid_extensions = array('jpg', 'jpeg', 'png', 'gif');

                                                        if (in_array($extension_origin, $valid_extensions)) {
                                                            $req = new dbConnect();
                                                            $reqResult = $req->setImageProfile($filename);

                                                            if ($reqResult == true) {
                                                                move_uploaded_file($_FILES['image_profile']['tmp_name'], 'images/uploads/' . basename($_FILES['image_profile']['name']));
                                                                echo '<div class="alert alert-success" role="alert">Votre image de profil à bien été modifié !!!</div>';
                                                            }

                                                            else{
                                                                $form = true;
                                                                echo '<div class="alert alert-danger" role="alert">Votre image n\'a pas pu être modifiée !!!</div>';
                                                            }
                                                        }

                                                        else{
                                                            $form = true;
                                                            echo '<div class="alert alert-danger" role="alert">Votre image ne fait pas partie des formats acceptés !!!</div>';
                                                        }
                                                    }

                                                    else{
                                                        $form = true;
                                                        echo '<div class="alert alert-danger" role="alert">La taille de votre image dépasse les 5 Mo !!!</div>';
                                                    }
                                                }

                                                else{
                                                    $form = true;
                                                }


                                                if($form){
                                                    include "form/modifyImageProfile.php";
                                                }
                                                break;
                                        }
                                    }
                                ?>
                                <br />
                                <br />
                                <br />
                                <a href="index.php?action=logout">Déconnexion</a>
                            </div>
                        </div>
                        <?php
                        include "view/footer.php";
                    }

                    else{
                        echo '<div class="jumbotron">';
                        echo '<div class="container">';
                        echo '<div class="alert alert-danger" role="alert">Vous tentez d\'usurper l\'identité d\'un utilisateur !!!</div>';
                        header ('Refresh: index.php, 5');
                        echo '</div>';
                        echo '</div>';
                    }
                }

                else{
                    echo '<div class="jumbotron">';
                    echo '<div class="container">';
                    echo '<div class="alert alert-danger" role="alert">Une Erreur s\'est produite !!!</div>';
                    header ('Refresh: index.php, 5');
                    echo '</div>';
                    echo '</div>';
                }
            }

            else{
                include "view/menu.php";
                ?>
                <div class="jumbotron">
                    <div class="container">
                        <div class="alert alert-danger" role="alert">Vous n'êtes pas connecté!!! :(</div>
                    </div>
                </div>
                <?php
                include "view/footer.php";
            }
        }

        else{
            include "view/menu.php";
            ?>
                <div class="jumbotron">
                    <div class="container">
                        <div class="alert alert-danger" role="alert">Vous n'êtes pas connecté!!! :(</div>
                    </div>
                </div>
            <?php
            include "view/footer.php";
        }
    ?>

</body>
</html>