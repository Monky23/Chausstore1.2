<?php require_once 'bdd.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>confirmation de la suppression de marque de chaussures</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Confirmation de la suppression de marque de chaussures</h1>
    <div>
    <p>Êtes-vous certain de bien vouloir supprimer cette marque?</p>
    <form action="" method="post">
        <input type="submit" name="return_brand" value="retour">
        <input type="submit" name="del_brand_confirm" value="confirmer">
    </form>
    <?php
        if(isset($_POST["return_brand"])){
            header("location: brand.php");
        };
        if(isset($_POST["del_brand_confirm"])){
            $idbrand= intval($_GET["id"]);
            $delbrand="DELETE FROM brand
            WHERE id='$idbrand'";
            mysqli_query($conn,$delbrand);
            header("location: brand.php");
        }
    ?>
    </div>
</body>
</html>