<?php
/*

//vérifie que l'utilisateur est bien enregistré dans la BDD

session_start();
if (!isset($_SESSION['login'])) {
    header ('Location: ../index.php');
    exit();
}
*/?>


<!--l'utilisateur n'est pas enregistré et est renvoyé au menu de départ.-->

<html>
<head>
    <title>Espace membre</title>
</head>


<!-- l'utilisateur est bien authentifié on le renvoit à l'espace membre. -->

<body>
<?php
    include "../class/classUser.php";
	$member = new User;
    include "../class/dbConnect.php";
    $infos = new dbConnect();
    $table = $infos->GetOneUser($login);

    if ($infos == true) {
    ?>

    <p>Bienvenue <?php echo htmlentities(trim($_SESSION['login'])); ?> !</p><br/>
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
            <td><?php echo $table['nom']; ?></td>
            <td><?php echo $table['prenom']; ?></td>
            <td><?php echo $table['age']; ?></td>
            <td><?php echo $table['adresse']; ?></td>
            <td><?php echo $table['email']; ?></td>
            <td><?php echo $table['login']; ?></td>
        </tr>
        </tbody>
    </table>
    <?php }

    else{
        echo '<div class="alert alert-danger" role="alert">Erreur dans le chargement de l\'utilisateur</div>';
    }?>
<a href="deconnexion.php">Déconnexion</a>
</body>
</html>