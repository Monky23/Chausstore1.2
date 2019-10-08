<?php require_once 'bdd.php' ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestions des categories de Produits</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Gestion des catégories</h1>
    <nav>
        <a href="index.php">Acceuil</a>
        <a href="product.php">Produits</a>
        <a href="category.php">Catégories</a>
        <a href="brand.php">Marques</a>
        <a href="color.php">Couleurs</a>
        <a href="size.php">Pointures</a>
        <a href="stock.php">Stocks</a>
    </nav>
    <h2>Ajouter une catégorie</h2>
    <div>
        <form action="" method="post">
            <label for="ajout">Veuillez saisir la catégorie à ajouter</label><br>
            <input type="text" name="category_name" id="category_name">
            <input type="submit" name="addCategory" id="addCategory">
        </form>
        <?php
            if (isset($_POST['addCategory'])){
                if(!empty($_POST['category_name'])){
                    $category = htmlspecialchars($_POST['category_name']);
                    $inn = "INSERT INTO category (name)
                    VALUES
                    ('$category')";
                    mysqli_query($conn,$inn);
                }
            }
        ?>
    </div>
    <h2>Listing des catégories de chaussures avec option de modification et suppression</h2>
    <div>
    <?php
        $cat = 'select * from category ORDER BY id DESC;';
        $screenCategory = mysqli_query($conn, $cat);

        while ($row = mysqli_fetch_array($screenCategory)) {
            $categoryId= $row[0];?>
            <div id='category'><?php echo $row[1]?>
                <form method='post'>
                    <input type='text' name='new_name' placeholder='renommer'>
                    <input type='submit' name='modif<?php echo $categoryId ?>' value='modifier'>
                    <input type='submit' name='del_off<?php echo $categoryId ?>' value='supprimer'>
                </form>
            </div>
    <?php
            if(isset($_POST["del_off".$categoryId])){
                header("location: del_category.php?id=".$categoryId);
            };
            if(isset($_POST["modif".$categoryId]) AND !empty($_POST['new_name'])){
                $categorypost = htmlspecialchars($_POST['new_name']);
                $categorymodif = "UPDATE category SET name = '$categorypost'
                WHERE id = '$categoryId'";
                mysqli_query($conn, $categorymodif);
            }
        }
    ?>
    </div>
</body>
</html>