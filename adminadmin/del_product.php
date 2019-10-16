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
        <input type="submit" name="return_product" value="retour">
        <input type="submit" name="del_product_confirm" value="confirmer">
    </form>
    <?php
        if(isset($_POST["return_product"])){
            header("location: product.php");
        };
        if(isset($_POST["del_product_confirm"])){
            $idproduct= intval($_GET["id"]);
            $delstock_product = "DELETE stock FROM stock
            WHERE product_id='$idproduct'";
            $delproduct="DELETE FROM product
            WHERE id='$idproduct'";
            mysqli_query($conn,$delstock_product);
            mysqli_query($conn,$delproduct);
            header("location: product.php");
        }
    ?>
    </div>
</body>
</html>