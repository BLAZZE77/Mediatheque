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
    <a href="mediatheque.php">Retour à l’accueil</a>
    <a href="register.php">Pas de compte ?</a>
    <form action="login.php" method="post">
     <p>Pseudo :</p>
    <input type="text" name="surname" required>
     <p>Mot de passe :</p>
    <input type="password" name="mdp" required>
    <p></p>
    <input type="submit" value ="connexion" name = "connexion">
    </form>

    <?php
        if (isset($_POST['connexion'])){
                $EntrySurname = $_POST['surname'];
                $EntryMdp = $_POST['mdp'];
                
                $verif = $bdd->prepare('SELECT * FROM user WHERE surname = ?');
                $verif->execute([$EntrySurname]); 
                $user = $verif->fetch();

                if(($user) && (password_verify($EntryMdp,$user['mdp']))){
                    $_SESSION['user'] = [
                    'surname' => $user['surname'],
                    'prenom'  => $user['prenom'],
                    'nom' => $user['nom'],
                    'id' => $user['id']
                ];    
                    if (isset($_SESSION['user'])) {
                        header("Location: mediatheque.php");
                    exit; 
                    }
                }else{
                    echo "<p>Mot de passe ou nom d'utilisateur incorrect<p>"; 
                }
        }
    ?>
</body>
</html>