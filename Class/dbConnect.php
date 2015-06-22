<?php
	class dbConnect
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
         * Nom de la base de données
         */
        private $_database = 'test';
		
		/*
		 * Constructeur
		 */
		function __construct()
		{
			$this->_connect = new PDO($this->_type . ":host=" . $this->_path . ";dbname=" . $this->_database, $this->_user, $this->_pass);
		}
		
		/* 
		 * Get my articles from database 'articles'.
		 */
		function GetMyArticles(){
			$this->_connect->query("Select * FROM `articles`");
			
			return $this->_connect->fetchAll();
		}
		
		/*
		 * Get my users from database 'users'.
		 */
<<<<<<< HEAD
		function GetMyUsers(){
			$this->_connect->query("Select * FROM `users`");
			
			return $this->_connect->fetchAll();
		}

        function CreateDbNews($title, $author, $content){
            //insertion
            $result = $this->_connect->query('Insert...');


            return true;


        }
=======
		public GetMyUsers(){
			$this->_connect->query("Select * FROM `membre`");
			
			return $this->_connect->fetchAll();
		}
		
		public GetOneUser($login){
			$this->_connect->query("SELECT * FROM `membre` WHERE login='" . $login . "';");
			
			return $this->_connect->fetch();
		}
>>>>>>> origin/master
	}