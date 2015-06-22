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
<?php
	$member = new User;
	$nom = $member->nom;
	$prenom = $member->prenom;
	$age = $member->age;
	$adresse = $member->adresse;
	$email = $member->email;
	$login = $member->login;
	$pass = $member->pass_md5;
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
</body>
</html>