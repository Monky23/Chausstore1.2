<?php require_once 'bdd.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>confirmation de la suppression de la couleur</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Confirmation de la suppression de la couleur</h1>
    <div>
    <p>Êtes-vous certain de bien vouloir supprimer cette couleur?</p>
    <form action="" method="post">
        <input type="submit" name="return_color" value="retour">
        <input type="submit" name="del_color_confirm" value="confirmer">
    </form>
    <?php
        if(isset($_POST["return_color"])){
            header("location: color.php");
        };
        if(isset($_POST["del_color_confirm"])){
            $idcol= intval($_GET["id"]);
            $delcol="DELETE FROM color
            WHERE id='$idcol'";
            mysqli_query($conn,$delcol);
            header("location: color.php");
        }
    ?>
    </div>
</body>
</html>
