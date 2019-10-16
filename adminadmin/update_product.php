<?php require_once 'bdd.php';
    $id = $_GET['id'];
    $prod = "SELECT p.id, d.name, b.name, p.name, c.name, p.gender, p.price
    FROM product as p,
    brand as b,
    color as c,
    category as d
    WHERE
    p.id = '$id'
    AND
    p.brand_id = b.id
    AND 
    p.color_id = c.id
    AND
    p.category_id = d.id ORDER BY p.id DESC;";
    $screenProduct = mysqli_query($conn, $prod);
    $row = mysqli_fetch_row($screenProduct);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification des produits</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Modification des produits</h1>
    <div>
        <p><?php if(isset($error)){echo $error;} ?></p>
        <form action="" method="post">
            <label for="nom">Nom du produit</label><br>
            <input type="text" name="product_name" id="product_name" value="<?php 
             echo $row[3];
            ?>"><br>
            <label for="categorie">Catégorie</label><br>
            <select name="category_name" id="category_name">
            <?php
                $categories = 'select * from category ORDER BY id DESC;';
                $screenCategory = mysqli_query($conn, $categories);
                while ($row_category = mysqli_fetch_array($screenCategory)) {
                    if($row[1] == $row_categories[1]){
                        echo "<option selected='selected'>".$row_category[1]."</option>";  
                    }else{
                        echo "<option>".$row_category[1]."</option>";
                    }
                }
            ?>
            </select><br>
            <label for="marque">Marque</label><br>
            <select name="brand_name" id="brand_name">
            <?php
                $brands = 'select * from brand ORDER BY id DESC;';
                $screenbrand = mysqli_query($conn, $brands);
                while ($row_brand = mysqli_fetch_array($screenbrand)) {
                    if($row[2] == $row_brand[1]){
                        echo "<option selected='selected'>".$row_brand[1]."</option>";  
                    }else{
                        echo "<option>".$row_brand[1]."</option>";
                    }
                }
            ?>
            </select><br>
            <label for="couleur">Couleur</label><br>
            <select name="color_name" id="color_name">
            <?php
                $colors = 'select * from color ORDER BY id DESC;';
                $screenColor = mysqli_query($conn, $colors);
                while ($row_color = mysqli_fetch_array($screenColor)) {
                    if($row[4] == $row_color[1]){
                        echo "<option selected='selected'>".$row_color[1]."</option>";  
                    }else{
                        echo "<option>".$row_color[1]."</option>";
                    }
                }
            ?>
            </select><br>
            <label for="genre">Genre</label><br>
            <select name="gender_name" id="gender_name">
                <option <?php if($row[5] == 'F'){ echo 'selected="selected"';}?>  >F</option>
                <option <?php if($row[5] == 'H'){ echo 'selected="selected"';}?> >H</option>
                <option <?php if($row[5] == 'M'){ echo 'selected="selected"';}?>>M</option>
            </select><br>
            <label for="prix">Prix</label><br>
            <input type="text" name="price_name" id="price_name" value="<?php 
                echo $row[6];
            ?>"><br>
            <input type="submit" name="update_Product" id="update_Product">
            <?php
                if (!empty($_POST['updateProduct'])){
                    $error = "";
                    if(empty($_POST['product_name'])){
                        $error .= 'veuillez saisir le nom d\'un produit<br/>';
                    };
                    if(empty($_POST['price_name'])){
                        $error .= 'veuillez saisir un prix<br/>';
                    }
                };
                if((!empty($_POST['updateProduct'])) && (empty($error))){
                    $product = htmlspecialchars($_POST['product_name']);
                    $category = htmlspecialchars($_POST['category_name']);
                    $req_category = "SELECT * FROM category WHERE name = '$category'";
                    $res_category = mysqli_query($conn, $req_category);
                    $row_category = mysqli_fetch_array($res_category);
                    $id_category = intval($row_category[0]);
                    $brand = htmlspecialchars($_POST['brand_name']);
                    $req_brand = "SELECT * FROM brand WHERE name = '$brand'";
                    $res_brand = mysqli_query($conn, $req_brand);
                    $row_brand = mysqli_fetch_array($res_brand);
                    $id_brand = intval($row_brand[0]);
                    $color = htmlspecialchars($_POST['color_name']);
                    $req_color = "SELECT * FROM color WHERE name = '$color'";
                    $res_color = mysqli_query($conn, $req_color);
                    $row_color = mysqli_fetch_array($res_color);
                    $id_color = intval($row_color[0]);
                    $gender = htmlspecialchars($_POST['gender_name']);
                    $price = floatval($_POST['price_name']);
                    if(isset($_POST["updateProduct".$brandId]) AND !empty($_POST['product_name']) AND !empty($_POST['price_name'])){
                        $idproduct= intval($_GET["id"]);
                        $productmodif = "UPDATE product
                        SET name = '$product', category_id = '$id_category' , brand_id = '$id_brand', color_id = $id_color, gender = $gender, price = $price
                        WHERE product.id = '$idproduct'
                        mysqli_query($conn, $productmodif)";
                        header("location: product.php");
                    };
                    if($productmodif === false){
                        echo "ne marche pas!!!!!";
                    }
                }
            ?>
        </form>
    </div>