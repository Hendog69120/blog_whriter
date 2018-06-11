<?php
session_start();
//$_SESSION['admin'] = 'toto';
//var_dump($_SESSION);
$credentials = require("model/credentials.php");
//var_dump($_SESSION);
require("model/MemberManager.php");
//var_dump($_SESSION);
require("model/FiveLast.php");
//var_dump($_SESSION);
require("model/PostManager.php");
//var_dump($_SESSION);
require("model/CommentManager.php");
//var_dump($_SESSION);
require("controler/members/deconnexion.php");
//var_dump($_SESSION);
require("controler/members/connection_member.php");
//var_dump($_SESSION);
require("view/admin.php");
//var_dump($_SESSION);
$LastManager = new LastManager($credentials);
$postManager = new PostManager($credentials);
$commentManager = new CommentManager($credentials);

if (isset($_GET['billet']) && $_GET['billet'] > 0) {
    if (!isset($_SESSION['pseudo'])) {
        header('Location: http://localhost/projet4/view/connection.php');
        exit;
    }
    $post = $postManager->getPost($_GET['billet']);

    
    
    if (isset($_POST["comment"])) {
        
        $commentManager->addComment($_POST['post_id'], $_SESSION['pseudo'], $_POST['comment']);
    }
    $comments = $commentManager->getComments($_GET['billet']);
    
    require('view/postView.php');
}
else if (isset($_SESSION['admin'])) {
    
    //session non activé !!
    if (isset($_GET['action'])&& isset($_GET['id']) && $_GET['action'] == 'remove') {
        $postManager->removePost($_GET['id']);
        //var_dump(removePost());die;
    }

    //???
    if (isset($_get['action']) && $_GET['action'] == 'update') {
        $postManager->updatePost($_GET['id']);
    }
    
}
else if (isset($_GET["action"]) && $_GET["action"] == "deconnection") {
    deconnect();
}

else {
    if (isset($_POST['title']) && (isset($_POST['content']))) {
        $postManager->addPost($_POST['title'], $_POST['content']);
        header('Location: http://localhost/projet4/index.php');
    }
    // Connexion à la base de données
    $db = $LastManager->__construct($credentials);
    
    $data = $LastManager->getFiveLast($credentials);
    //var_dump($_SESSION);die;
    require("view/home.php");
   
}









