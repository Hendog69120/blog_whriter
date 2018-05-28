<header>
        <h1 class="main_title">Bienvenu sur mon blog :)</h1>
        <nav class="main_navbar">
            <ul class="main_navbar-all">
                <li class="main_navbar-all_element"><a href="/projet4/index.php">Retour à la liste des billets</a></li>
                <li class="main_navbar-all_element"><a href="/projet4/view/registration.php"> Je m'inscris</a></li>
                <li class="main_navbar-all_element"><a href="/projet4/view/connection.php">Connexion</a></li>
            </ul>
        </nav>

        <?php 

            if (isset($_SESSION["register"])) {

                $message =  $_SESSION["register"]; 
                echo "<h2> $message </h2>";
                  unset($_SESSION["register"], $message);
            }

            if (isset($_SESSION["connected"])) {
                //$_SESSION["connected_success"] = "Vous êtes bien enregistré";
                $message =  $_SESSION["connected"]; 
                echo "<h2> $message </h2>";
                  unset($_SESSION["connected"], $message);
            }
            if (isset($_SESSION["error"])) {
                //$_SESSION["error_success"] = "Vous êtes bien enregistré";
                $message =  $_SESSION["error"]; 
                echo "<h2> $message </h2>";
                  unset($_SESSION["error"], $message);
            }
        ?>
        
</header>


