<?php require_once 'bdd.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation de la suppression de taille</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Confirmation de la suppression de taille</h1>
    <div>
    <p>Êtes-vous certain de bien vouloir supprimer cette taille?</p>
    <form action="" method="post">
        <input type="submit" name="return_size" value="retour">
        <input type="submit" name="del_size_confirm" value="confirmer">
    </form>
    <?php
        if(isset($_POST["return_size"])){
            header("location: size.php");
        };
        if(isset($_POST["del_size_confirm"])){
            $idsize= intval($_GET["id"]);
            $delsize="DELETE FROM size
            WHERE id='$idsize'";
            mysqli_query($conn,$delsize);
            header("location: size.php");
        }
    ?>
    </div>
</body>
</html>