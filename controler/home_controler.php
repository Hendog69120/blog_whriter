<?php

// Connexion à la base de données
$bdd = dbConnect();

$data = getFiveLast($bdd);

require("../view/home.php");