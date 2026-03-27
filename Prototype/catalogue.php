<?php
require "config.php";

// recuperer tous les produits
$req = $pdo->query("SELECT * FROM Produit");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Catalogue</title>
    </head>
    
    <body>

        <h1 style="font-family: 'Courier New ', monospace; font-size:28px;">Catalogue</h1>

        <?php
        // message apres ajout
        if(isset($_GET["success"])){
            echo "<p>Produit ajouté avec succès</p>";
        }
        ?>

        <a href="ajouter-produit.php">Ajouter produit</a>
        <hr>

        <?php
            // afficher chaque produit sous forme de carte
            foreach($req as $p) {
                echo "<div style='border:1px solid black;padding:10px;width:200px;margin:10px;'>";
                echo "<h3>".$p["nom"]."</h3>";
                echo "<p>Prix : ".$p["prix"]." DH</p>";
                echo "<a href='details.php?id=".$p["id"]."'>Details</a>";
                echo "</div>";
            }
        ?>

</body>
</html>