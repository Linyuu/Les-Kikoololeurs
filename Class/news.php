<?php
include "dbConnect.php";

    class news{

        /*
         *
         */
        private $_dbCo = null;

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

            }
        }

        /*
         *fonction pour créer des news
         */
        function createNews($title, $author, $content){
            //securisation des variables

            $title = addslashes(htmlentities($this->_title));
            $author = addslashes(htmlentities($this->_author));
            $content = addslashes(htmlentities($this->_content));


            return $this->_dbCo->createDbNews($title, $author, $content);
        }
    }

?>