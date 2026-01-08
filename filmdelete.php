<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=mediatheque;charset=utf8','root','');
    $filmid = $_GET['id'];
    $read = $bdd -> prepare('SELECT  user_id FROM film where id = ?');
    $read -> execute([$filmid]);
    $data = $read->fetch();

    if (isset($_SESSION['user']) && ($data['user_id'] == $_SESSION['user']['id'] )){
        $delete = $bdd->prepare( 'DELETE FROM film WHERE id = ? AND user_id = ?');
        $delete->execute([$filmid, $_SESSION['user']['id']]);
        header("Location: allfilm.php");
    } else {
          ?>
        <p>Vous n'avez pas les droits.</p>
        <a href="allfilm.php">Revenir au films</a>
        <?php
    }
?>

        
        
