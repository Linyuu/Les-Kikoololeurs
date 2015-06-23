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
        private $_database = 'news_system';
		
		/*
		 * Constructeur
		 */
		function __construct()
		{
			$this->_connect = new PDO($this->_type . ":host=" . $this->_path . ";dbname=" . $this->_database, $this->_user, $this->_pass);
		}
		

		/*
		 * Create article into database 'news'
		 */

        function CreateDbNews($title, $author, $description, $content){
            //insertion de l'article dans la base de données
            $result = $this->_connect->prepare('INSERT INTO news (title, author, description, content) VALUES(:title, :author, :description, :content)');
            $result->execute(array(
                "title" => $title,
                "author" => $author,
                "description" => $description,
                "content" => $content
            ));

            return true;
        }


        /*
         *  Get article from DataBase 'news'
         */

        function getDbNews(){
            $result = $this->_connect->query('SELECT * FROM news');
            return $result->fetchAll();
        }




        /*
         * get news by id from database 'news'
         */

        function getDbNewsId($id){
            $result = $this->_connect->query('SELECT * FROM news WHERE id='.$id.'')->fetch();
            return $result;

        }




        /*
         * Modify articles from database 'news'
         */

        function modifyDbNews($id, $title, $author, $description, $content){
            //modification de l'article

            $request = $this->_connect->prepare('UPDATE news SET title=:title, author=:author, description=:description, content=:content WHERE id="'.$id.'"');

            $result =  $request->execute(array(
                "title" => $title,
                "author" => $author,
                "description" => $description,
                "content" => $content
            ));

            if ($result){
                return true;
            }

            return false;
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

		function GetMyUsers(){
			$this->_connect->query("Select * FROM `users`");
			
			return $this->_connect->fetchAll();
		}


		
		function GetOneUser($login){
			$this->_connect->query("SELECT * FROM `membre` WHERE login='" . $login . "';");
			
			return $this->_connect->fetch();
		}
	}