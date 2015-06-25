<!-- menu de navigation -->

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
            <a class="navbar-brand" href="#"><img src="images/logo.png" alt="logo de kikoololeurs" /></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Accueil <span class="sr-only">(current)</span></a></li>
                <li><a href="index.php?action=inscription"><span class="glyphicon glyphicon-file"></span> S'inscrire</a></li>
                <li><a href="index.php?action=login"><span class="glyphicon glyphicon-lock"></span> Login</a></li>
                <li><a href="index.php?action=contact"><span class="glyphicon glyphicon-magnet"></span> Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo ''.$infosUser['prenom'].' '.$infosUser['nom'].''; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="user.php?action=infoUser">Informations du profil</a></li>
                        <li><a href="user.php?action=userModify">Gestion du profil</a></li>
                        <li class="divider"></li>
                        <li><a href="index.php?action=logout">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>