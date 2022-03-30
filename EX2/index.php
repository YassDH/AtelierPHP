<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Cours</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        if(isset($_POST['vote']) && !isset($_COOKIE['vote'])){
            $data = time().'.'.$_POST['vote'];
            setcookie('vote',$data,time()+60*2,'/');
        ?>
            <div class="sucess">
                <h4>Votre vote a été bien enregistré !</h4>                
            </div>
        <?php
        }else if(isset($_POST['vote']) && isset($_COOKIE['vote'])){
            $datar = $_COOKIE['vote'];
            $pos = strpos($datar,'.');
            $temps = substr($datar,0,$pos);
            $reponse = substr($datar,$pos-strlen($datar)+1);
            $encore = 120-time()+$temps;
        ?>        
            <div class="alert">
                <h4>Vous avez déjà voté "<?=$reponse ?>" !<br>
                Vous pouvez voter dans <?=intdiv($encore,60) ?> min <?=$encore%60 ?>s
                </h4>                
            </div>
        <?php
        }
    ?>
    
    <h3>Avis sur le cours de PHP</h3>
    <form action="./index.php" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <div>
            <input type="radio" name="vote" id="bon" value="Bon" checked>
            <label for="bon">Bon</label>
        </div>
        <div>
            <input type="radio" name="vote" value="Moyen" id="moyen">
            <label for="moyen">Moyen</label>            
        </div>
        <div>
            <input type="radio" name="vote" value="Mauvais" id="mauvais">
            <label for="mauvais">Mauvais</label>
        </div>
        <button type="submit">Voter</button>
    </form>
</body>
</html>