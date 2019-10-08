<?php require_once 'bdd.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des tailles des articles</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Gestion des tailles</h1>
    <nav>
        <a href="index.php">Acceuil</a>
        <a href="product.php">Produits</a>
        <a href="category.php">Catégories</a>
        <a href="brand.php">Marques</a>
        <a href="color.php">Couleurs</a>
        <a href="size.php">Pointures</a>
        <a href="stock.php">Stocks</a>
    </nav>
    <h2>Ajouter une taille</h2>
    <div>
        <form action="" method="post">
            <label for="ajout">Veuillez saisir la taille à ajouter</label><br>
            <input type="text" name="size_name" id="size_name">
            <input type="submit" name="addSize" id="addSize">
        </form>
        <?php
            if (isset($_POST['addSize'])){
                if(!empty($_POST['size_name'])){
                    $size = htmlspecialchars($_POST['size_name']);
                    $inn = "INSERT INTO size (name)
                    VALUES
                    ('$size')";
                    mysqli_query($conn,$inn);
                }
            }
        ?>
    </div>
    <h2>Listing des tailles avec option de modification et suppression</h2>
    <div>
    <?php
        $sizes = 'select * from size ORDER BY id DESC;';
        $screenSize = mysqli_query($conn, $sizes);

        while ($row = mysqli_fetch_array($screenSize)) {
            $sizeId= $row[0];?>    
            <div id='size'><?php echo $row[1]?>
                <form method='post'>
                    <input type='text' name='new_name' placeholder='renommer'>
                    <input type='submit' name='modif<?php echo $sizeId ?>' value='modifier'>
                    <input type='submit' name='del_off<?php echo $sizeId ?>' value='supprimer'>
                </form>
            </div>
    <?php
            if(isset($_POST["del_off".$sizeId])){
                header("location: del_size.php?id=".$sizeId);
            };
            if(isset($_POST["modif".$sizeId]) AND !empty($_POST['new_name'])){
                $sizepost = htmlspecialchars($_POST['new_name']);
                $sizemodif = "UPDATE size SET name = '$sizepost'
                WHERE id = '$sizeId'";
                mysqli_query($conn, $sizemodif);
            }
        }
    ?>
    </div>
</body>
</html>