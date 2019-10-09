<?php require_once 'bdd.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des marques de produits</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Gestion de marques</h1>
    <nav>
        <a href="index.php">Acceuil</a>
        <a href="product.php">Produits</a>
        <a href="category.php">Catégories</a>
        <a href="brand.php">Marques</a>
        <a href="color.php">Couleurs</a>
        <a href="size.php">Pointures</a>
        <a href="stock.php">Stocks</a>
    </nav>
    <h2>Ajouter une marque</h2>
    <div>
        <form action="" method="post">
            <label for="ajout">Veuillez saisir la marque à ajouter</label><br>
            <input type="text" name="brand_name" id="brand_name">
            <input type="submit" name="addBrand" id="addBrand">
        </form>
        <?php
            if (isset($_POST['addBrand'])){
                if(!empty($_POST['brand_name'])){
                    $brand = htmlspecialchars($_POST['brand_name']);
                    $inn = "INSERT INTO brand (name)
                    VALUES
                    ('$brand')";
                    mysqli_query($conn,$inn);
                }
            }
        ?>
    </div>
    <h2>Listing des marques de chaussures avec option de modification et suppression</h2>
    <div>
        <?php
            $brands = 'select * from brand ORDER BY id DESC;';
            $screenBrand = mysqli_query($conn, $brands);

            while ($row = mysqli_fetch_row($screenBrand)) {
                $brandId= $row[0];?>
                <div id='color'><?php echo $row[1]?>
                    <form method='post'>
                        <input type='text' name='new_name' placeholder='renommer'>
                        <input type='submit' name='modif<?php echo $brandId ?>' value='modifier'>
                        <input type='submit' name='del_off<?php echo $brandId ?>' value='supprimer'>
                    </form>
                </div>
        <?php
                if(isset($_POST["del_off".$brandId])){
                    header("location: del_brand.php?id=".$brandId);
                };
                if(isset($_POST["modif".$brandId]) AND !empty($_POST['new_name'])){
                    $brandpost = htmlspecialchars($_POST['new_name']);
                    $brandmodif = "UPDATE brand SET name = '$brandpost'
                    WHERE id = '$brandId'";
                    mysqli_query($conn, $brandmodif);
                }
            }
        ?>
    </div>
</body>
</html>