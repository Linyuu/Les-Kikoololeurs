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
	}
?>