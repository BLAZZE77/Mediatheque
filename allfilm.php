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
        include 'auth.php';
    ?>


    <a href="mediatheque.php">Retour a l'acceuil</a>
     <?php 
        $read = $bdd -> prepare('SELECT  id,titre,realisateur,genre,duree FROM film');
        $read -> execute(array());


        while ($data = $read->fetch()){
            echo '<p>Film  :'.$data['titre'].'</p>';
            echo '<p>Realisateur :'.$data['realisateur'].'</p>';
            echo '<p>genre:'.$data['genre'].'</p>';
            echo '<p>duree  :'.$data['duree'].'</p>';
            echo '<a href="film.php?id=' . $data['id'] . '">En savoir +</a>';
            echo '<a href="filmdelete.php?id=' . $data['id'] . '">Supprimer +</a>';
        }

    ?>

</body>
</html>