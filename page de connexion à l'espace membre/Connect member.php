<?php


//vérifie que l'utilisateur est bien enregistré dans la BDD

session_start();
if (!isset($_SESSION['login'])) {
    header ('Location: index.php');
    exit();
}
?>


<!--l'utilisateur n'est pas enregistré et est renvoyé au menu de départ.-->

<html>
<head>
    <title>Espace membre</title>
</head>


<!-- l'utilisateur est bien authentifié on le renvoit à l'espace membre. -->

<body>
Bienvenue <?php echo htmlentities(trim($_SESSION['login'])); ?> !<br />
<a href="deconnexion.php">Déconnexion</a>
</body>
</html>