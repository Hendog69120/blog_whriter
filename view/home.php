<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
	<link href="view/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
    <?php include("view/header.php"); ?>
 
    <?php

    foreach ($data as $post)
    { 
    ?>
    <div class="news">
        <h3>
            <?php echo htmlspecialchars($post['title']); ?>
            <em>le <?php echo $post['date_creation_fr']; ?></em>
        </h3>
        
        <p>
        <?php
        // On affiche le content du billet
        echo nl2br(htmlspecialchars($post['content']));
        ?>
        <br />
        <em><a href="index.php?billet=<?php echo $post['id']; ?>">Commentaires</a></em>
        </p>
    </div>

 
    <?php
    } // Fin de la boucle des post
    //$req->closeCursor();
    ?>
    <?php include("view/footer.php"); ?>
    </body>
</html>