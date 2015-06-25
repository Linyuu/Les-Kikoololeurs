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


		/*
		 * Séléction des informations utilisateur
		 */
		function GetOneUser($login){
        $login = addslashes(htmlentities($login));
        $result = $this->_connect->query("SELECT * FROM `membre` WHERE login='" . $login . "'");

        $info = $result->fetch();
        return $info;
        }



        /*
         * Vérification du login de l'utilisateur
         */
        function verifyLogin($login){
            $login = addslashes(htmlentities($login));
            $result = $this->_connect->query("SELECT id FROM `membre` WHERE login='" . $login . "'");

            $info = $result->rowCount();
            return $info;
        }


        /*
         * Vérification du mot de passe utilisateur
         */

        function verifyPass($id){
            $id = intval(htmlentities($id));
            $request = $this->_connect->query('SELECT pass_md5 FROM membre WHERE id='.$id.'');
            $resultPass = $request->fetch();

            return $resultPass;
        }


        /*
         * vérification de l'id utilisateur
         */

        function getUserId($id){
            $id = intval(htmlentities($id));
            $request = $this->_connect->query('SELECT * FROM membre WHERE id='.$id.'');
            $result = $request->fetch();
            return $result;
        }

        /*
         * Create user in database membre
         */

        function createDbUser($nom, $prenom, $age, $adresse, $email, $login, $pass_md5){
            $request = $this->_connect->prepare('INSERT INTO membre (nom, prenom, age, adresse, email, login, pass_md5) VALUES(:nom, :prenom, :age, :adresse, :email, :login, :pass_md5)');
            $request->execute(array(
                "nom" => addslashes(htmlentities($nom)),
                "prenom" => addslashes(htmlentities($prenom)),
                "age" => addslashes(htmlentities($age)),
                "adresse" => addslashes(htmlentities($adresse)),
                "email" => addslashes(htmlentities($email)),
                "login" => addslashes(htmlentities($login)),
                "pass_md5" => addslashes(htmlentities(md5($pass_md5)))
            ));

            return true;
        }



        /*
         * Modification des informations utilisateur
         */

        function modifyDbUser($id, $nom, $prenom, $age, $adresse, $email){
            $id = intval(htmlentities($id));
            $request = $this->_connect->prepare('UPDATE membre SET nom=:nom, prenom=:prenom, age=:age, adresse=:adresse, email=:email WHERE id='.$id.'');
            $request->execute(array(
                "nom" => addslashes(htmlentities($nom)),
                "prenom" => addslashes(htmlentities($prenom)),
                "age" => addslashes(htmlentities($age)),
                "adresse" => addslashes(htmlentities($adresse)),
                "email" => addslashes(htmlentities($email))
            ));

            return true;
        }



        /*
         * Modification du mot de passe utilisateur
         */

        function setNewUserPass($password){
            $request = $this->_connect->prepare('UPDATE membre SET pass_md5=:password');
            $request->execute(array(
                "password" => $password
            ));
            return true;
        }


        /*
         * Modification de l'image de profil
         */

        function setImageProfile($image){
            $req = $this->_connect->prepare('UPDATE membre SET image_profile=:image');
            $req->execute(array(
                "image" => addslashes(htmlentities($image))
            ));

            return true;
        }
	}
?>