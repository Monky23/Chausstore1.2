<?php require_once 'bdd.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation de la suppression de stock</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Confirmation de la suppression de stock</h1>
    <div>
    <p>Êtes-vous certain de bien vouloir supprimer ce stock</p>
    <form action="" method="post">
        <input type="submit" name="return_stock" value="retour">
        <input type="submit" name="del_stock_confirm" value="confirmer">
    </form>
    <?php
        if(isset($_POST["return_stock"])){
            header("location: stock.php");
        };
        if(isset($_POST["del_stock_confirm"])){
            $id = intval($_GET['idproduct']);
            $idsize = intval($_GET['idsize']);
            $del_stock = "DELETE FROM stock 
            WHERE product_id = '$idproduct' and size_id = '$idsize'";
            mysqli_query($conn,$del_stock);
            header("location: stock.php");
        }
    ?>
    </div>
</body>
</html>