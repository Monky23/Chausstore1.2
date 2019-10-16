<?php require_once 'bdd.php';?>
<?php require_once 'verif_prod.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des produits</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Gestion des produits</h1>
    <nav>
        <a href="index.php">Acceuil</a>
        <a href="product.php">Produits</a>
        <a href="category.php">Catégories</a>
        <a href="prod.php">Marques</a>
        <a href="color.php">Couleurs</a>
        <a href="size.php">Pointures</a>
        <a href="stock.php">Stocks</a>
    </nav>
    <h2>Ajouter un produit</h2>
    <div>
        <p><?php if(isset($error)){echo $error;} ?></p>
        <form action="" method="post">
            <label for="nom">Nom du produit</label><br>
            <input type="text" name="product_name" id="product_name" value="<?php
            if(!empty($_POST['product_name'])){
                echo $_POST['product_name'];
            }?>"><br>
            <label for="categorie">Catégorie</label><br>
            <select name="category_name" id="category_name">
            <?php
                $categories = 'select * from category ORDER BY id DESC;';
                $screenCategory = mysqli_query($conn, $categories);
                while ($row = mysqli_fetch_array($screenCategory)) {
                        echo "<option>".$row[1]."</option>";
                }
            ?>
            </select><br>
            <label for="marque">Marque</label><br>
            <select name="brand_name" id="brand_name">
            <?php
                $brands = 'select * from brand ORDER BY id DESC;';
                $screenbrand = mysqli_query($conn, $brands);
                while ($row = mysqli_fetch_array($screenbrand)) {
                    echo "<option>".$row[1]."</option>";
                }
            ?>
            </select><br>
            <label for="couleur">Couleur</label><br>
            <select name="color_name" id="color_name">
            <?php
                $colors = 'select * from color ORDER BY id DESC;';
                $screenColor = mysqli_query($conn, $colors);
                while ($row = mysqli_fetch_array($screenColor)) {
                        echo "<option>".$row[1]."</option>";
                }
            ?>
            </select><br>
            <label for="genre">Genre</label><br>
            <select name="gender_name" id="gender_name">
                <option >F</option>
                <option >H</option>
                <option >M</option>
            </select><br>
            <label for="prix">Prix</label><br>
            <input type="text" name="price_name" id="price_name" value="<?php
            if(!empty($_POST['price_name'])){
                echo $_POST['price_name'];
            }?>"><br>
            <input type="submit" name="addProduct" id="addProduct">
        </form>
    </div>
    <h2>Listing des produits</h2>
    <div>
    <?php
        $prod = "SELECT p.id, d.name, b.name, p.name, c.name, p.gender, p.price
        FROM product as p,
        brand as b,
        color as c,
        category as d
        WHERE
        p.brand_id = b.id
        AND
        p.color_id = c.id
        AND
        p.category_id = d.id ORDER BY p.id DESC;";
        $screenProduct = mysqli_query($conn, $prod);
        while ($row = mysqli_fetch_row($screenProduct)){
            $prodId= $row[0];?>
            <div id='product'><p><?php echo $row[1]." ".$row[2]." ".$row[3]." ".$row[4]." ".$row[5]." ".$row[6];?></p>
                <form method='post'>
                    <input type='submit' name='modif<?php echo $prodId; ?>' value='modifier'>
                    <input type='submit' name='del_off<?php echo $prodId; ?>' value='supprimer'>
                </form>
            </div>
            <?php
                if(isset($_POST["del_off".$prodId])){
                    header("location: del_product.php?id=".$prodId);
                };
                if(isset($_POST["modif".$prodId])){
                    header("location: update_product.php?id=".$prodId);
                };
            }
    ?>
    </div>
</body>
</html>