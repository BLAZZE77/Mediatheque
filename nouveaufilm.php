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

        

        <form action="nouveaufilm.php"  method="post" >
            <p>Titre : </p>
            <input type="text" name="titre" required>
            <p>realisateur : </p>
            <input type="text" name="realisateur" required>
            <p>genre : </p>
            <input type="text" name="genre" required>
            <p>duree : </p>
            <input type="text" name="duree"required >
            <input type="submit" value ="submit" name = "submit">
        </form>

    <?php
        if (isset($_POST['submit'])){ 
            $titre = $_POST['titre'];
            $realisateur = $_POST['realisateur'];
            $genre = $_POST['genre'];
            $duree = $_POST['duree'];
            $add = $bdd -> prepare('INSERT INTO film(titre,realisateur,genre,duree)
                                                            VALUES(?,?,?,?)');
            $data = $add->execute(array($titre,$realisateur,$genre,$duree));
        }
        
    ?>
    <a href="mediatheque.php">Retournez a L'accueil</a>

</body>
</html>