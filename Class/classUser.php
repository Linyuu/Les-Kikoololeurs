<?php
	public class User
	{
		//Propriétés (variables)
		private $nom;
		
		private $prenom
		
		private $age
		
		private $adresse
		
		private $email
		
		private $login
		
		private $pass_md5
		
		//Constructeur
		public __construct()
		{
			$connexion = new dbConnect;
			
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
	}
?>