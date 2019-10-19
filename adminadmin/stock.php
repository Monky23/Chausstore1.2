<?php require_once 'bdd.php';?>
<?php require_once 'verif_prod.php';?>
<?php require_once 'add_stock.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des stocks de marchandises</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Gestion des stocks</h1>
    <nav>
        <a href="index.php">Acceuil</a>
        <a href="product.php">Produits</a>
        <a href="category.php">Catégories</a>
        <a href="brand.php">Marques</a>
        <a href="color.php">Couleurs</a>
        <a href="size.php">Pointures</a>
        <a href="stock.php">Stocks</a>
    </nav>
    <h2>Ajouter du stock</h2>
    <div>
    <p><?php if(isset($error)){echo $error;} ?></p>
    <form method="post" action="" id="add_stock">
				<label for="name">Quantité</label><br>
				<input type="text" name="stock_quantity" value="<?php
            if(!empty($_POST['stock_quantity'])){
                echo $_POST['stock_quantity'];
            }?>"><br>
				<label for="product">Nom du produit</label><br>
				<select name="product_name" id="product_name">
					<?php
                    $products = 'select * from product ORDER BY id DESC;';
                    $screenProduct = mysqli_query($conn, $products);
                    while ($row = mysqli_fetch_array($screenProduct)) {
                            echo "<option>".$row[1]."</option>";
                    }
		            ?>
				</select><br>
			</p>
			<p>
				<label for="size">Taille</label><br>
				<select name="size_name" id="size_name">
					<?php
                    $sizes = 'select * from size ORDER BY id DESC;';
                    $screenSize = mysqli_query($conn, $sizes);
                    while ($row = mysqli_fetch_array($screenSize)) {
                            echo "<option>".$row[1]."</option>";
                    }
		            ?>
				</select><br>
				<input type="submit" name="add_stock" id="add_stock">
		</form>
        </div>
    <h2>listing des stocks</h2>
    <div>
    <?php
            $stock = 'SELECT stock.stock, product.name, size.name, product.id, size.id
            from stock,
            product,
            size
            WHERE
            stock.product_id = product.id
            AND
            stock.size_id = size.id ORDER BY product.id DESC;';
            $screenStock = mysqli_query($conn, $stock);
            while ($row = mysqli_fetch_row($screenStock)) {
                $id_product = $row[3];
                $id_size = $row[4];?>
                <div id='stock'><p><?php echo $row[0]." ".$row[1]." ".$row[2];?></p>
                    <form method='post'>
                        <a href="del_stock.php?idproduct=<?php echo $id_product ?>&idsize=<?php echo $id_size; ?>">Supprimer</a>
                        <a href="update_stock.php?idproduct=<?php echo $id_product ?>&idsize=<?php echo $id_size; ?>"> Modifier </a>
                    </form>
                </div>
                <?php
                }
    ?>
    </div>
</body>
</html>