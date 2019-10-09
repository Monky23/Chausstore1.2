<?php require_once 'bdd.php';?>
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
    <form method="post" action="add_stock.php" id="add_stock">
				<label for="name">Quantité</label><br>
				<input type="text" name="stock"><br>
				<label for="product">Nom du produit</label><br>
				<select name="product_stock" id="product_stock"><
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
				<select name="size_stock" id="size_stock"><
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
        <table class="table_stock">
            <thead>
                <tr>
                    <td>Stock</td>
                    <td>Produit</td>
                    <td>Taille</td>
                </tr>     
            </thead>
            <tbody>
            <?php
                $stock = 'SELECT stock.stock, product.name, size.name
                from stock,
                product,
                size
                WHERE
                stock.product_id = product.id
                AND
                stock.size_id = size.id;';
                $screenStock = mysqli_query($conn, $stock);

                while ($row = mysqli_fetch_row($screenStock)) {
                    echo "<tr>";                    
                    for($i = 0; $i < count($row); ++$i){
                        echo("<td>".$row[$i]."</td>");
                    }
                    echo("</tr>");
                }
            ?>
            </tbody>
        </table>>
    </div>
</body>
</html>