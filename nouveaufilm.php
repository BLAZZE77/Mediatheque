<?php 
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
    
        <form action="nouveaufilm.php"  method="post">
            <p>Titre : </p>
            <input type="text" name="titre">
            <p>realisateur : </p>
            <input type="text" name="realisateur">
            <p>genre : </p>
            <input type="text" name="genre">
            <p>duree : </p>
            <input type="text" name="duree">
            <button>envoyer</button>
        </form>

    <?php
        $titre = $_POST['titre'];
        $realisateur = $_POST['realisateur'];
        
        $genre = $_POST['genre'];
        $duree = $_POST['duree'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];

        $add = $bdd -> prepare('INSERT INTO film(titre,realisateur,genre,duree)
                                            VALUES(?,?,?,?)');
        $data = $add->execute(array($titre,$realisateur,$genre,$duree));
    ?>


</body>
</html>