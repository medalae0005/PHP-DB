<?php
require "config.php";

$p = null; // variable pour stocker le produit
$msg = ""; // message d'erreur si produit non trouvé

// vérifier si id est fourni ou non... 
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $req = $pdo->prepare("SELECT * FROM Produit WHERE id=?");
    $req->execute([$id]);
    $p = $req->fetch();
    if(!$p) $msg = "Produit non trouvé";
} else {
    $msg = "Produit introuvable";
}
 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Details</title>
    </head>
    
    <body>
        <h1>Details produit</h1>

        <?php
            // Afficher le message d'erreur ou les détails du produit
            if($msg != "") {
                echo "<p>".$msg."</p>";
            } else {
                echo "<h2>".$p["nom"]."</h2>";
                echo "<p>Prix : ".$p["prix"]." DH</p>";
                echo "<p>Description : ".$p["description"]."</p>";
                echo "<p>Categorie : ".$p["categorie"]."</p>";
            }
        ?>

        <br>
        <a href="catalogue.php">Retour</a>

    </body>
</html>