<?php require_once 'bdd.php';
    //Variables and request to add a stock
    if((!empty($_POST['add_stock'])) && (empty($error))){
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
        $id_size = intval($row_size[0]);

        $inn = "INSERT INTO stock (product_id, size_id, stock)
        VALUES ('$id_product', '$id_size', '$stock')";
        $result = mysqli_query($conn, $inn) or die (mysqli_error($conn));
        if($result === false){
            echo "ne marche pas!!!!!";
        }
    }
?>