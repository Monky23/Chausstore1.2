<?php require_once 'bdd.php';
    $idproduct = $_GET['idproduct'];
    $idsize = $_GET['idsize'];
    $stock = "SELECT stock.stock, product.name, size.name
    from stock,
    product,
    size
    WHERE
    stock.product_id = '$idproduct'
    AND
    stock.size_id = '$idsize'
    AND
    size.id=size_id
    AND
    product.id=product_id
     ORDER BY product.id DESC;";
    $screenStock = mysqli_query($conn, $stock);
    $row = mysqli_fetch_row($screenStock) or die (mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification des stocks</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Modification des stocks</h1>
    <div>
        <p><?php if(isset($error)){echo $error;} ?></p>
        <form action="" method="post">
            <label for="nom">Quantité</label><br>
            <input type="text" name="stock_quantity" id="stock_quantity" value="<?php 
             echo $row[0];
            ?>"><br>
            <label for="product_name">Nom du produit</label><br>
            <select name="product_name" id="product_name">
            <?php
                $products = 'select * from product ORDER BY id DESC;';
                $screenProduct = mysqli_query($conn, $products);
                while ($row_products = mysqli_fetch_array($screenProduct)) {
                    if($row[1] == $row_products[1]){
                        echo "<option selected='selected'>".$row_products[1]."</option>";  
                    }else{
                        echo "<option>".$row_products[1]."</option>";
                    }
                }
            ?>
            </select><br>
            <label for="size_name">Pointure</label><br>
            <select name="size_name" id="size_name">
            <?php
                $sizes = 'select * from size ORDER BY id DESC;';
                $screenSize = mysqli_query($conn, $sizes);
                while ($row_size = mysqli_fetch_array($screenSize)) {
                    if($row[2] == $row_size[1]){
                        echo "<option selected='selected'>".$row_size[1]."</option>";  
                    }else{
                        echo "<option>".$row_size[1]."</option>";
                    }
                }
            ?>
            </select><br>
            <input type="submit" name="update_Stock" id="update_Stock">
            <?php
                if(isset($_POST['update_Stock'])){
                    if(!empty($_POST['stock_quantity'])){
                        $stock = intval($_POST['stock_quantity']);

                        $product = htmlspecialchars($_POST['product_name']);
                        $req_product = "SELECT * FROM product WHERE name = '$product'";
                        $res_product = mysqli_query($conn, $req_product);
                        $row_product = mysqli_fetch_array($res_product);
                        $id_product = intval($row_product[0]);
                
                        $size = htmlspecialchars($_POST['size_name']);
                        $req_size = "SELECT * FROM size WHERE name = '$size'";
                        $res_size = mysqli_query($conn, $req_size);
                        $row_size = mysqli_fetch_array($res_size);
                        $id_size = intval($row_size[0]);;

                    $product_id = intval($_GET["idproduct"]);
                    $size_id = intval($_GET["idsize"]);

                    $stockmodif = "UPDATE stock
                    SET stock = '$stock', product_id = '$id_product' , size_id = '$id_size'
                    WHERE 
                    product_id = '$product_id'
                    AND
                    size_id = '$size_id'";
                    mysqli_query($conn, $stockmodif) or die (mysqli_error($conn));
                    header("location: stock.php");
                    };
                    if($stockmodif == false){
                        echo "ne marche pas!!!!!";
                    }
                }
            ?>
        </form>
    </div>
</body>
</html>    