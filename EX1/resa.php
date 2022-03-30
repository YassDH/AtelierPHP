<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Sandwich</title>
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
        form{
            display: flex;
            flex-direction: column;
        }
        form input, form select, form textarea{
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form enctype="multipart/form-data" action="./recap.php" method="post" >
        <input type="text" name="nom" placeholder="Nom" required>
        <input type="text" name="prenom" placeholder="Prenom" required>
        <input type="number" name="nbsan" required>
        <textarea name="adresse" cols="30" rows="10" required></textarea>   
        <select name="type">
            <option value="viande">Viande</option>
            <option value="poulet">Poulet</option>
            <option value="escalope">Escalope</option>
        </select>
        <input type="hidden" value="0" name="harissa">
        <div><input type="checkbox" value="1" name="harissa">Harissa</div>
        <input type="hidden" value="0" name="salade">
        <div><input type="checkbox" value="1" name="salade">Salade</div>
        <input type="hidden" value="0" name="mayo">
        <div><input type="checkbox" value="1" name="mayo">Mayo</div>
        <div>CIN : <input type="file" name="cin"></div>
        <button type="submit" value="submit" name="submit">Envoyer</button>
    </form>
</body>
</html>