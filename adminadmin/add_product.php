<?php require_once 'bdd.php';
    //Variables and request to add a product
    if((!empty($_POST['addProduct'])) && (empty($error))){
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

        $inn = "INSERT INTO product (name, category_id, brand_id, color_id, gender, price) 
        VALUES ('$product', '$id_category', '$id_brand', '$id_color', '$gender', '$price')";
        $result = mysqli_query($conn,$inn);
        if($result === false){
            echo "ne marche pas!!!!!";
        }
    }
?>
