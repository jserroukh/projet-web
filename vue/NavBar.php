<header class="navbar">
    <div class="logo">
        <img src="../image/logo.png" width="100px">
    </div>
    
    
    
    
    <?php
    //Start session si session_start() n'est pas deja lancé
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // Vérifier si la session type est définie et sa valeur
    if (isset($_SESSION['type']) && $_SESSION['type']==="Admin") {
        // Afficher si l'admin est connecté
        echo '<a href="../controleur/Accueil.php"><i class="fa-solid fa-house"></i></a>';
        echo '<a href="../controleur/Recherche.php"><i class="fa-solid fa-magnifying-glass"></i></a>';
        echo '<a href="../controleur/Profile.php"><i class="fa-solid fa-user"></i></a>';

        echo '<a href="../controleur/AjoutFormation.php"><i class="fa-solid fa-plus"></i></a>';
        echo '<a href="../controleur/Panier.php"><i class="fa-solid fa-cart-shopping navBaricone"></i></a>';
        echo '<a href="../controleur/GererSignalement.php"><i class="fa-solid fa-triangle-exclamation"></i></a>';
    }else if (isset($_SESSION['type']) && $_SESSION['type']==="Vendeur"){
        echo '<a href="../controleur/Accueil.php"><i class="fa-solid fa-house"></i></a>';
        echo '<a href="../controleur/Recherche.php"><i class="fa-solid fa-magnifying-glass"></i></a>';
        echo '<a href="../controleur/Profile.php"><i class="fa-solid fa-user"></i></a>';

        echo '<a href="../controleur/AjoutFormation.php"><i class="fa-solid fa-plus"></i></a>';
        echo '<a href="../controleur/Panier.php"><i class="fa-solid fa-cart-shopping navBaricone"></i></a>';
    }else if (isset($_SESSION['type']) && $_SESSION['type']==="Utilisateur"){
    
        echo '<a href="../controleur/Accueil.php"><i class="fa-solid fa-house"></i></a>';
        echo '<a href="../controleur/Recherche.php"><i class="fa-solid fa-magnifying-glass"></i></a>';
        echo '<a href="../controleur/Profile.php"><i class="fa-solid fa-user"></i></a>';
        echo '<a href="../controleur/Panier.php"><i class="fa-solid fa-cart-shopping navBaricone"></i></a>';
    }else{
        echo '<a href="../controleur/Accueil.php"><i class="fa-solid fa-house"></i></a>';
        echo '<a href="../controleur/Recherche.php"><i class="fa-solid fa-magnifying-glass"></i></a>';
        echo ' <a href="../controleur/Connexion.php"> Connexion </a> &nbsp;';
    }
    ?>
    
    
    
    
</header>
