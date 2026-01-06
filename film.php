<?php
    session_start();
     $bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8','root','');
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

    <?php
        $filmid = $_GET['id'];
        $read = $bdd -> prepare('SELECT synopsis,titre FROM film WHERE id = ?');
        $read->execute([$filmid]); 
        $data = $read->fetch();
        if (!empty($data['synopsis'])){
            echo '<p> Nom du film : ' . htmlspecialchars($data['titre']) . '</p>';
            echo '<p> synopsis : ' . htmlspecialchars($data['synopsis']) . '</p>';
        }else {
            echo '<p> Pas de synopsis </p>';
        }
    ?>

    <?php
       ?>


    


    
</body>
</html>