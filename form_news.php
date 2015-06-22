<?php
//index
if ($_GET){
    $news = new news();
    if ($news->createNews($_GET['title'], $_GET['Author'],$_GET['content']) == true){
        //c'est enregistré
    }else{
        // ya un problème.
    }

}else{

}