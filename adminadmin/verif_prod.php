<?php require_once 'bdd.php';?>
<?php
    if (!empty($_POST['addProduct'])){
        $error = "";

        if(empty($_POST['product_name'])){
            $error .= 'veuillez saisir le nom d\'un produit<br/>';
        }
        if(empty($_POST['price_name'])){
            $error .= 'veuillez saisir un prix<br/>';
        }
    }
    if (!empty($_POST['add_stock'])){
        $error = "";

        if(empty($_POST['stock_quantity'])){
            $error .= 'veuillez saisir une quantité';
        }
    }
?>