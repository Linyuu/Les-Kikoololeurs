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
                            <h3 align="center">- Modifier une news -</h3>
                            <form method="post" action="newsModify.php?action=modifyDbNews">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Titre de la news</span>
                                    <input type="text" class="form-control" placeholder="Titre" aria-describedby="basic-addon1" value="<?php echo $news['title']; ?>" name="title">
                                </div><br/>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Auteur de la news</span>
                                    <input type="text" class="form-control" placeholder="Auteur" aria-describedby="basic-addon1" value="<?php echo $news['author']; ?>" name="author">
                                </div><br/>
                                <input type="hidden" name="id" value="<?php echo $news['id']; ?>"><br/>
                                <label for="description">Description de la news:</label><textarea rows="8" cols="50" name="description" id="editor1"><?php echo $news['description']; ?></textarea><br /><script>CKEDITOR.replace( 'editor1' );</script>
                                <label for="content">Contenu de la news: </label><textarea rows="8" cols="50" name="content" id="editor2"><?php echo $news['content']; ?></textarea><br/><script>CKEDITOR.replace( 'editor2' );</script>
                                <br/>
                                <input type="submit" value="Modifier la news >>" class="btn btn-lg btn-primary" role="button" />
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

                    break; //récupération de la news et affichage dans un formulaire



                case "modifyDbNews": //modification de la news en base de données
                    if(isset($_POST['title']) AND isset($_POST['author']) AND isset($_POST['id']) AND isset($_POST['description']) AND isset($_POST['content'])){
                        include "../class/newsObject.php";
                        $newsModify = new news();
                        if($newsModify->modifyNews($_POST['id'], $_POST['title'], $_POST['author'], $_POST['description'], $_POST['content']) == true){
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
