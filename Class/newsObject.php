<?php
include "dbConnect.php";

    class news{

        /*
         *
         */
        private $_dbCo = null;



        /*
         * Id de la news
         */

        private $_id;


        /*
         * titre de la news
         */
        private $_title;

        /*
         * Auteur de la news
         */
        private $_author;

        /*
         * contenu de la news
         */
        private $_content;

        function __construct(){
            try{
                $this->_dbCo = new dbConnect();
            }catch(\Exception $e){
                echo 'Erreur: ' . $e . '';
            }
        }

        /*
         *fonction pour créer des news
         */
        function createNews($title, $author, $content){
            //securisation des variables

            $this->_author = addslashes(htmlentities($author));
            $this->_title = addslashes(htmlentities($title));
            $this->_content = addslashes(htmlentities($content));



            return $this->_dbCo->createDbNews($title, $author, $content);
        }

        /*
         * Fonction de récupération des news
         */
        function getNews($title, $author, $content){
            //sécurisation des variables
            $this->_title = addslashes(htmlentities($title));
            $this->_author = addslashes(htmlentities($author));
            $this->_content = addslashes(htmlentities($content));

            return $this->_dbCo->getDbNews();
        }


        /*
         * Fonction de modification de news
         */
        function modifyNews($id, $title, $author, $content){
            //sécurisation des variables
            $this->_id = addslashes(htmlentities($id));
            $this->_title = addslashes(htmlentities($title));
            $this->_author = addslashes(htmlentities($author));
            $this->_content = addslashes(htmlentities($content));

            return $this->_dbCo->modifyDbNews($id, $title, $author, $content);
        }
    }

?>