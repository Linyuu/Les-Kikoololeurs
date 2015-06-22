<?php
$DB=new PDO('mysql:host=46.105.224.230;dbname=test','user','');
$login=$_POST['login'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$pass_md5=$_POST['pass_md5'];
$pass_confirm=$_POST['pass_confirm'];
$age=$_POST['age'];
$adresse=$_POST['adresse'];
$email=$_POST['email'];
$insert=$DB->prepare('update test set login=:login,nom=:nom,prenom=:prenom,pass_md5=:pass_md5,pass_confirm=:pass_confirm,age=:age,adresse=:adresse,email=:email');


?>
<form id="inscription" name="inscription" method="post">
    Nom d'utilisateur:  <input type="text" name="login"><br />
    Nom:<input type="text" name="nom"><br />
    Prénom:<input type="text" name="prenom"><br />
    Mot de passe:<input type="text" name="pass_md5"><br />
    Confirmer le mot de passe:<input type="text" name="pass_confirm"<br />
    Age:<input type="text" name="age"><br />
    Adresse:<input type="text" name="adresse"><br />
    Adresse électronique:<input type="text" name="email"><br />
    <input type="submit" value="submit">
</form>
