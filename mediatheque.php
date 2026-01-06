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

    <h1>Derniers films : </h1>
   
    <?php 
        $read = $bdd -> prepare('SELECT  titre,realisateur,genre,duree FROM film');
        $read -> execute(array());

        while ($data = $read->fetch()){
            echo '<p>Film  :'.$data['titre'].'</p>';
            echo '<p>Realisateur :'.$data['realisateur'].'</p>';
            echo '<p>genre:'.$data['genre'].'</p>';
            echo '<p>duree  :'.$data['duree'].'</p>';
        }
    ?>

    <form action="mediatheque.php" method="post">
        <input type="text" name="nom">
        <input type="text" name="prenom">
        <button>envoyer</button>
    </form>

    <h2>Ajouter un utilisateur : </h2>

    <form action="mediatheque.php" method="post">
     <p>Nom : </p>
    <input type="text" name="prenom">
     <p>Prenom : </p>
    <input type="text" name="nom">
    <button>envoyer</button>
    </form>

    <?php
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $add = $bdd -> prepare('INSERT INTO user(prenom,nom)
                                            VALUES(?,?)'); 
        $data = $add->execute(array($prenom,$nom));
    ?>

    <a  href="nouveaufilm.php">Ajouter une fiche de film </a>
    
</body>
</html>