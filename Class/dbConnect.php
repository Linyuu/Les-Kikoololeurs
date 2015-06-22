<?php
	public class dbConnect
	{
		/*
		 * Connexion PDO.
		 */
		private $_connect = null;
		
		/*
		 * Mot de passe de la base SQL.
		 */
		private $_pass = "";
		
		/*
		 * Utilisateur de la base SQL.
		 */
		private $_user = "root";
		
		/*
		 * Type de base utilisée.
		 */
		private $_type = "mysql";
		
		/*
		 * Chemin de la base de données.
		 */
		private $_path = "127.0.0.1";
		
		/*
		 * Constructeur
		 */
		public __construct()
		{
			$this->_connect = new PDO($this->_type . ":" . $this->_path,$this->_user, this->_pass);
		}
		
		/* 
		 * Get my articles from database 'articles'.
		 */
		public GetMyArticles(){
			$this->_connect->query("Select * FROM `articles`");
			
			return $this->_connect->fetchAll();
		}
		
		/*
		 * Get my users from database 'users'.
		 */
		public GetMyUsers(){
			$this->_connect->query("Select * FROM `users`");
			
			return $this->_connect->fetchAll();
		}
		
		public GetOneUser($login){
			$this->_connect->query("SELECT * FROM `users` WHERE login='" . $login . "';");
			
			return $this->_connect->fetch();
		}
	}