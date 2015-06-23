<?php
	public class User
	{
		//Propriétés (variables)
		private $nom;
		
		private $prenom;
		
		private $age;
		
		private $adresse;
		
		private $email;
		
		private $login;
		
		private $pass_md5;
		
		//Constructeur
		public __construct($login)
		{
			$connexion = new dbConnect;
			$infos = $connexion->GetOneUser($login);
			$this->nom = $infos['nom'];
			$this->prenom = $infos['prenom'];
			$this->age = $infos['age'];
			$this->adresse = $infos['adresse'];
			$this->email = $infos['email'];
			$this->login = $infos['login'];
			$this->pass_md5 = $infos['pass_md5'];
		}
		
		//Setters/Getters
		public setnom($nom)
		{
			$this->nom = $nom;
		}
		
		public getnom()
		{
			return $this->nom;
		}
		
		public setprenom($prenom)
		{
			$this->prenom = $prenom;
		}
		
		public getprenom()
		{
			return $this->prenom;
		}
		
		public setage($age)
		{
			$this->age = $age;
		}
		
		public getage()
		{
			return $this->age;
		}
		
		public setadresse($adresse)
		{
			$this->adresse = $adresse;
		}
		
		public getadresse()
		{
			return $this->adresse;
		}
		
		public setemail($mail)
		{
			$this->prenom = $prenom;
		}
		
		public getemail()
		{
			return $this->email;
		}
		
		public setlogin($login)
		{
			$this->login = $login;
		}
		
		public getlogin()
		{
			return $this->login;
		}
		
		public setpass_md5($pass_md5)
		{
			$this->pass_md5 = $pass_md5;
		}
		
		public getpass_md5()
		{
			return $this->pass_md5;
		}
		
		//Creation d'un utilisateur
		//On passe en argument toutes les infos à inserer en base de données, infos issus des champs du formulaire d'inscription
		
		public createUser($nom, $prenom, $age, $adresse, $email, $login, $pass_md5)
		{
			$connexion = new dbConnect;
			$result = $this->_connect->prepare('INSERT INTO membre (nom, prenom, age, adresse, email, login, pass_md5) VALUES(:nom, :prenom, :age, :adresse, :email, :login, :pass_md5)');
			$result->execute(array(
                "nom" => $nom,
                "prenom" => $prenom,
                "age" => $age,
				"adresse" => $adresse,
                "email" => $email,
                "login" => $login,
				"pass_md5" => $pass_md5
            ));
			
			return $result;
		}
		
		//Suppression d'un utilisateur
		//On passe un login à cette methode pour cibler l'utilisateur à supprimer
		
		public deleteUser($login)
		{
			$connexion = new dbConnect;
			$result = $this->_connect->prepare('DELETE FROM membre WHERE login="' . $login . '";');
			$result->execute();
			
		}
		
		//Liste de tous les utilisateurs
		
		public listUser()
		{
			$connexion = new dbConnect;
			$liste = $connexion->GetMyUsers();
			return $liste;
		}
		
		//Affichage d'un seul utilisateur
		
		public afficheUser()
		{
			$connexion = new dbConnect;
			$membre = $connexion->GetOneUser();
			return $membre;
		}
		
		//Modification d'un utilisateur
		//On passe à cette méthode un attribut à modifier, une nouvelle valeur à donner à cette attribut et un login pour cibler l'utilisateur
		//Idee d'amelioration : Passer un tableau à $attribut pour en modif plusieurs à la fois avec un foreach().
		
		public modifUser($attribut, $newvaleur, $login)
		{
			$connexion = new dbConnect;
			$connexion->prepare('UPDATE membre SET ' . $attribut . ' = "' . $newvaleur . '" WHERE login="' . $login . '";');
			$result = $connexion->execute();
			return $result;
		}
	}
?>