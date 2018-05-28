<?php
session_start();

$credentials = require("model/credentials.php");
require("model/MemberManager.php");
require("model/FiveLast.php");
require("model/PostManager.php");
require("model/CommentManager.php");
require("controler/members/deconnexion.php");
require("controler/members/connection_member.php");

$LastManager = new LastManager($credentials);
$postManager = new PostManager($credentials);
$commentManager = new CommentManager($credentials);

if (isset($_GET['billet']) && $_GET['billet'] > 0) {
    if (!isset($_SESSION['pseudo'])) {
        header('Location: http://localhost/projet4/view/connection.php');
        exit;
    }
    $post = $postManager->getPost($_GET['billet']);
    //var_dump($post);die;
    //var_dump($_SESSION['pseudo']);die;
    
    if (isset($_POST["comment"])) {
        //insert comment ($_get["billet], le comment)
        $commentManager->addComment($_POST['post_id'], $_SESSION['pseudo'], $_POST['comment']);
    }
    $comments = $commentManager->getComments($_GET['billet']);
    
    require('view/postView.php');
}

else if (isset($_GET["action"]) && $_GET["action"] == "deconnection")
 {
    deconnect();
}

else {
    // Connexion à la base de données
    $db = $LastManager->__construct($credentials);
    
    $data = $LastManager->getFiveLast($credentials);
    
require("view/home.php");
   
}









