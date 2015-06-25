<?php
include "dbConnect.php";
    class User
	{
		//Propriétés (variables)
        private $_dbCo = null;

		private $nom;
		
		private $prenom;
		
		private $age;
		
		private $adresse;
		
		private $email;
		
		private $login;
		
		private $pass_md5;
		
		//Constructeur
		function __construct()
		{
            try{
                $this->_dbCo = new dbConnect();
            }

            catch(\Exception $e){
                echo 'Erreur: ' . $e . '';
            }


		}
		
		//Setters/Getters
		function setnom($nom)
		{
			$this->nom = $nom;
		}
		
		function getnom()
		{
			return $this->nom;
		}
		
		function setprenom($prenom)
		{
			$this->prenom = $prenom;
		}
		
		function getprenom()
		{
			return $this->prenom;
		}
		
		function setage($age)
		{
			$this->age = $age;
		}
		
		function getage()
		{
			return $this->age;
		}
		
		function setadresse($adresse)
		{
			$this->adresse = $adresse;
		}
		
		function getadresse()
		{
			return $this->adresse;
		}
		
		function setemail($mail)
		{
			$this->email = $mail;
		}
		
		function getemail()
		{
			return $this->email;
		}
		
		function setlogin($login)
		{
			$this->login = $login;
		}
		
		function getlogin()
		{
			return $this->login;
		}
		
		function setpass_md5($pass_md5)
		{
			$this->pass_md5 = $pass_md5;
		}

		
		//Creation d'un utilisateur
		//On passe en argument toutes les infos à inserer en base de données, infos issus des champs du formulaire d'inscription
		
		function createUser($nom, $prenom, $age, $adresse, $email, $login, $pass_md5)
		{
			$this->nom = addslashes(htmlentities($nom));
            $this->prenom = addslashes(htmlentities($prenom));
            $this->age = addslashes(htmlentities($age));
            $this->adresse = addslashes(htmlentities($adresse));
            $this->email = addslashes(htmlentities($email));
            $this->login = addslashes(htmlentities($login));
            $this->pass_md5 = addslashes(htmlentities(md5($pass_md5)));
			
			return $this->_dbCo->createDbUser($nom, $prenom, $age, $adresse, $email, $login, $pass_md5);
		}
		
		//Suppression d'un utilisateur
		//On passe un login à cette methode pour cibler l'utilisateur à supprimer
		
		function deleteUser($login)
		{
			$connexion = new dbConnect;
			$result = $this->_connect->prepare('DELETE FROM membre WHERE login="' . $login . '";');
			$result->execute();
			
		}
		
		//Liste de tous les utilisateurs
		
		function listUser()
		{
			$connexion = new dbConnect;
			$liste = $connexion->GetMyUsers();
			return $liste;
		}
		
		//Affichage d'un seul utilisateur
		
		function afficheUser($login)
		{
			$connexion = new dbConnect;
			$membre = $connexion->GetOneUser($this->login);
			return $membre;
		}
		
		//Modification d'un utilisateur
		//On passe à cette méthode un attribut à modifier, une nouvelle valeur à donner à cette attribut et un login pour cibler l'utilisateur
		//Idee d'amelioration : Passer un tableau à $attribut pour en modif plusieurs à la fois avec un foreach().
		
		function modifUser($attribut, $newvaleur, $login)
		{
			$connexion = new dbConnect;
			$connexion->prepare('UPDATE membre SET ' . $attribut . ' = "' . $newvaleur . '" WHERE login="' . $login . '";');
			$result = $connexion->execute();
			return $result;
		}
	}
?>