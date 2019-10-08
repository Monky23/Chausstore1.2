<?php require_once 'bdd.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation de la suppression de la catégorie de chaussures</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Confirmation de la suppression de la catégorie de chaussures</h1>
    <div>
    <p>Êtes-vous certain de bien vouloir supprimer cette catégorie de chaussure?</p>
    <form action="" method="post">
        <input type="submit" name="return_category" value="retour">
        <input type="submit" name="del_category_confirm" value="confirmer">
    </form>
    <?php
        if(isset($_POST["return_category"])){
            header("location: category.php");
        };
        if(isset($_POST["del_category_confirm"])){
            $idcat= intval($_GET["id"]);
            $delcat="DELETE FROM category
            WHERE id='$idcat'";
            mysqli_query($conn,$delcat);
            header("location: category.php");
        }
    ?>
    </div>
</body>
</html>