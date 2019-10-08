<?php require_once 'bdd.php';?>
<?php
$prod = 'SELECT d.name, b.name, p.name, c.name, p.gender, p.price
        from product as p ,
        brand as b,
        color as c,
        category as d
        WHERE
        p.brand_id = b.id
        AND 
        p.color_id = c.id
        AND
        p.category_id = d.id ORDER BY p.id DESC;';
    $error ="";

    if(!empty($_POST)){
        $error = "";

        if(empty($_POST['product_name'])){
            $error .= 'veuillez saisir le nom d\'un produit<br/>';
        }
        //if(empty($_POST['category_name'])){
          //  $error .= 'veuillez selectionner une categorie<br/>';
        //}
        //if(empty($_POST['brand_name'])){
          //  $error .= 'veuillez selectionner une marque<br/>';
        //}
        //if(empty($_POST['color_name'])){
        //    $error .= 'veuillez selectionner une couleur<br/>';
        //}
        //if(empty($_POST['gender_name'])){
        //$error .= 'veuillez selectionner un genre<br/>';
        //}
        if(empty($_POST['price_name'])){
            $error .= 'veuillez saisir un prix<br/>';
        }
    }
    if((!empty($_POST)) && (empty($error))){
        //$message = "Votre candidature a bien été prise en compte";
        $product = htmlspecialchars($_POST['product_name']);
        $category = htmlspecialchars($_POST['category_name']);
        $brand = htmlspecialchars($_POST['brand_name']);
        $color = htmlspecialchars($_POST['color_name']);
        $gender = htmlspecialchars($_POST['gender_name']);
        $price = htmlspecialchars($_POST['price_name']);
        $inn = "INSERT INTO product (product, category_id, brand_id, color_id, gender_id, price)
        VALUES
        ('$product', '$category', '$brand', '$color', '$gender', '$price')";
        mysqli_query($conn,$inn);
    }
?>