<?php
	include 'dbConnect.php';
	$objet = new dbConnect;
?>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Connexion à une base de données</title>
	</head>
	<body>
		<div>
		<h1> Articles </h1>
		<?php
			/* Ici je veux afficher mes articles*/
			
			foreach($article in $dbConnect->GetMyArticles()){
				//afficher article
				echo '<p>' . $article['nom'] . '<p>';
				echo '<p>' . $article['contenu'] . '<p>';
			}
		?>
		</div>
		<div>
		<h1> Users </h1>
		
		<?php
			/* Ici je veux afficher mes articles*/
			
			foreach($user in $dbConnect->GetMyUsers()){
				//afficher les utilisateurs
				echo '<p>' . $user['nom'] . '<p>';
				echo '<p>' . $user['prenom'] . '<p>';
			}
		?>
		</div>
	</body>
</html>