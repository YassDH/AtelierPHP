<?php 
session_start();
if(!isset($_SESSION['notes'])){
    $_SESSION['notes']=array();
}
if(isset($_POST['titre'])){
    $taille = count($_SESSION['notes']);
    $titre = $_POST['titre'];
    $content = $_POST['note'];
    $donnee = $titre.'#'.$content;
    $_SESSION['notes'][$taille] = $donnee;    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Ajout notes</title>
</head>
<body>
    <div class="ajout_note">
        <form action="./index.php" method="post">
            <input type="text" name="titre" placeholder="Titre" required><br>
            <textarea name="note" cols="50" rows="20" placeholder="Note" required></textarea><br>
            <button type="submit">Ajouter</button>
        </form>
        <a href="./logout.php">Se déconnecter</a>
    </div>
    <div class="notes">
        <?php 
            foreach($_SESSION['notes'] as $data){
                $position = strpos($data,'#');
                $title = substr($data,0,$position);
                $contenu = substr($data,$position-strlen($data)+1);
        ?>
        <div class="note">
            <h2 class="title"><?= $title ?></h2>
            <div class="content">
                <p><?= $contenu ?></p>
            </div>
        </div> 
        <?php
            }
        ?>       
    </div>
</body>
</html>