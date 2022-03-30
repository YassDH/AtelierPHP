<?php 
if(!isset($_POST['submit'])){
    header('location:./resa.php');
}

//Récupération des données de la commande 

$nom = htmlentities($_POST['nom']);
$prenom = htmlentities($_POST['prenom']);
$nb = htmlentities($_POST['nbsan']);
$adresse  = htmlentities($_POST['adresse']);
$type = $_POST['type'];
$ingredient = ['harissa' => $_POST['harissa'],'salade' => $_POST['salade'],'mayo' => $_POST['mayo']];


//Upload de la CIN

$upload_dossier = "uploads/";
$imageFileType = strtolower(pathinfo(basename($_FILES['cin']['name']),PATHINFO_EXTENSION));
$random = uniqid() . '.';
$file_name = $random . $imageFileType;
$verification = move_uploaded_file($_FILES['cin']['tmp_name'], $upload_dossier.$file_name);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recap Commande</title>
    <style>
        body{
            position: absolute;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            width: 400px;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        th,td,table{
            border: 1px solid #000;
            text-align: center;
        }
        td,th{
            padding: 3px 6px;
        }
    </style>
</head>
<body>
    <?php 
        if($verification){
    ?>
            <script>
                alert("Upload effectué avec succès");
            </script>
    <?php
        }else{
    ?>
            <script>
                alert("Il ya eu une erreur au cous de l'upload du fichier");
            </script>
    <?php
        }
    ?>
    <h3>Client : <?= $nom," ",$prenom; ?></h3>
    <h4>Adrese : <?= $adresse ?></h4>
    <table>
        <tr>
            <th colspan="2">Nom</th>
            <th colspan="1">Quantitée</th>
            <th colspan="1">Prix</th>
        </tr>
        <tr>
            <td colspan="2">Sandwich</td>
            <td><?= $nb?></td>
            <td>4 DT</td>
        </tr>
        <tr>
            <td colspan="1">Composition</td>
            <td colspan="1"><?= $type ?><td>
            <td></td>
        </tr>
        <?php
            foreach($ingredient as $indice => $value){
                if($value == '1'){
                    ?>
                    <tr>
                        <td colspan="1"></td>
                        <td colspan="1"><?= $indice ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                }
            }
        ?>
        <tr>
            <th colspan="2">
                <?php
                    if($nb <10){
                        echo "Total : ";
                    }else {
                        echo "Total avant réduction :";
                    }
                ?>
            </th>
            <td colspan="2">
                <?php 
                    echo $nb*4, " DT";
                ?>
            </td>
        </tr>
        <?php 
            if($nb >= 10){
        ?>
                <th colspan="2">Total après réduction :</th>
                <td colspan="2"><?= $nb*4*0.9," DT"?></td>
        <?php        
            }
        ?>
    </table>


</body>
</html>

