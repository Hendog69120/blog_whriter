<?php
require('../../model/entity/member.php');
require('../../model/model.php');

$post_id =$_POST['post_id'];
$message =$_POST['content'];

if ($post_id && $content != NULL) {
   addComment($post_id, $content);

   if($addContent) {
    
   }
}
else { 
    header("http://localhost/projet4/index.php?billet");
    exit;
}