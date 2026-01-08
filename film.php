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
    <header>   
        <?php 
            if (isset($_GET['logout']) && $_GET['logout'] === 'logout') {
                unset($_SESSION['user']);
                echo "Vous êtes maintenant déconnecté";
            }
            if (isset($_SESSION['user'])) {
                echo "<p>Bienvenue, " . htmlspecialchars($_SESSION['user']['prenom']) . " !</p>";
            ?> 
            <form action="allfilm.php?action=logout" method="get">
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
    </header> 
    <?php
        $filmid = $_GET['id'];
        $readfilm = $bdd -> prepare('SELECT synopsis,titre FROM film WHERE id = ?');
        $readfilm->execute([$filmid]); 
        $datafilm = $readfilm->fetch();
       
        if (!empty($datafilm['synopsis'])){
            echo '<p> Nom du film : ' . htmlspecialchars($datafilm['titre']).'</p>';
            echo '<p> synopsis : '. htmlspecialchars($datafilm['synopsis']).'</p>';
        }else {
            echo '<p> Nom du film : ' . htmlspecialchars($datafilm['titre']).'</p>';
            echo "<p>Il n'y a pas de synopsis, pourquoi ne pas en ajouter un ? </p>";
            ?>
                <form action=""></form>
                <form action="film.php?id=<?= $filmid ?>"  method="post" >
                    <p>Ajouter un synopsis : </p>
                    <textarea name="contentsynopsis" id="" rows="5" cols="33">
                    </textarea>
                    <input type="submit" value ="sendsynopsis" name = "sendsynopsis">
                </form>
            <?php  
            if (isset($_POST['sendsynopsis'])) {
                    $contentsynopsis = $_POST['contentsynopsis'];
                    $addsynopsis = $bdd->prepare('UPDATE film SET synopsis = ? WHERE id = ?');
                    $addsynopsis->execute([$contentsynopsis, $filmid]);
           
                
        }}
             ?>    
            <a href="allfilm.php">Retour au films</a>
        
            <?php 
            if (isset($_SESSION['user'])){
            ?>
                <form action="film.php?id=<?= $filmid ?>"  method="post" >
                    <p>Ajouter un commentaire : </p>
                    <textarea name="content" id="" rows="5" cols="33">
                    </textarea>
                    <input type="submit" value ="sendcomment" name = "sendcomment">
                </form>
                 <?php
                if (isset($_POST['sendcomment'])) {
                    $content = $_POST['content'];
                    $user_id = $_SESSION['user']['id']; 
                    $addcomment = $bdd->prepare('
                        INSERT INTO commentaire (user_id, film_id, content)
                        VALUES (?, ?, ?)
                    ');
                     $addcomment->execute([$user_id, $filmid, $content]);
                }
            }
        $readcomment = $bdd -> prepare('SELECT c.content, u.surname, u.prenom
                                                FROM commentaire c
                                                JOIN `user` u ON c.user_id = u.id
                                                WHERE c.film_id = ?');
        $readcomment->execute([$filmid]); 

        while ($datacomment = $readcomment->fetch()){
            echo '<p>'.$datacomment['surname'].'</p>';
            echo '<p>'.$datacomment['content'].'</p>';
        }
       ?>
</body>
</html>