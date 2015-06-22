<?php
	public class User
	{
		//Propriétés (variables)
		private $nom;
		
		private $prenom
		
		private $age
		
		private $adresse
		
		private $email
		
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
		
		public setpassword($password)
		{
			$this->prenom = $password;
		}
		
		public getpassword()
		{
			return $this->password;
		}
	}
?>