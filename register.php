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
        $bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8','root','');
    ?>
    
    <h1>Crée un nouveau compte</h1>

    <form action="register.php" method="post">
     <p>Pseudo :</p>
    <input type="text" name="surname" required>
     <p>Mot de passe :</p>
    <input type="password" name="mdp" required>
    <p>Nom : </p>
    <input type="text" name="nom" required>
    <p>Prenom :</p>
    <input type="text" name="prenom" required>
    <p></p>
    <input type="submit" value ="register" name = "register">
    </form>

    <?php

        if (isset($_POST['register'])){
                $surname = $_POST['surname'];
                $mdp = $_POST['mdp'];
                $prenom = $_POST['prenom'];
                $nom = $_POST['nom'];
                $mdpscrpt = password_hash($mdp,PASSWORD_ARGON2I);
                $add = $bdd -> prepare('INSERT INTO user(surname,mdp,prenom,nom)
                                        VALUES(?,?,?,?)'); 
         $data = $add->execute(array($surname,$mdpscrpt,$prenom,$nom));
         echo "<p>Enregistrement réussi</p>";
    }
    ?>
    <p></p>
    <p></p>
    <a href="mediatheque.php">Retour à l’accueil</a>
    <a href="login.php">Vous avez déja un compte ? </a>

</body>
</html>