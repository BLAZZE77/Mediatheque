<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        
    <?php 
     if (isset($_GET['logout']) && $_GET['logout'] === 'logout') {
        unset($_SESSION['user']);
        echo "Vous êtes maintenant déconnecté";
    }
    $bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8','root','');
       if (isset($_SESSION['user'])) {
        echo "<p>Bienvenue, " . htmlspecialchars($_SESSION['user']['prenom']) . " !</p>";
    ?> 
    <form action="mediatheque.php?action=logout" method="get">
    <input type="submit" value ="logout" name = "logout">
    </form>
    <?php     
    }else{
        ?>
        <a href="login.php">Connexion</a>
        <a href="register.php">Nouveau membre ? </a>
    <?php   
    }
    ?>



    
   
    <h1>Derniers films ajoutés : </h1>
   
    <?php 
        $read = $bdd -> prepare('SELECT  titre,realisateur,genre,duree FROM film ORDER BY id DESC LIMIT 3 ');
        $read -> execute(array());

        while ($data = $read->fetch()){
            echo '<p>Film  :'.$data['titre'].'</p>';
            echo '<p>Realisateur :'.$data['realisateur'].'</p>';
            echo '<p>genre:'.$data['genre'].'</p>';
            echo '<p>duree  :'.$data['duree'].'</p>';
        }
    ?>

    <a href="allfilm.php">Voir + de films</a>    
    <a  href="nouveaufilm.php">Ajouter une fiche de film </a>
    
</body>
</html>