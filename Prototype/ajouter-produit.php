<?php
require "config.php";

$err = array();

// Vérifier la formulaire...
if(isset($_POST["ajouter"])){

    // récupération des données du formulaire
    $nom = $_POST["nom"];
    $prix = $_POST["prix"];
    $description = $_POST["description"];
    $categorie = $_POST["categorie"];

    // validation simple
    if($nom == "") $err[] = "Nom obligatoire";
    if($prix == "") $err[] = "Prix obligatoire";
    if($description == "") $err[] = "Description obligatoire";
    if($categorie == "") $err[] = "Categorie obligatoire";

    // si pas d'erreur ; insérer produit dans la base
    if(count($err) == 0){
        $req = $pdo->prepare("INSERT INTO Produit(nom,prix,description,categorie) VALUES(?,?,?,?)");
        $req->execute([$nom,$prix,$description,$categorie]);

        header("Location: catalogue.php?success=1");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ajouter produit</title>
    </head>
    
    <body>
        <h1>Ajouter produit</h1>

        <a href="catalogue.php">Catalogue</a>

        <?php

            // afficher messages d'erreur...
            foreach($err as $e){
                echo "<p>".$e."</p>";
            }
        ?>

        <br><br>
        <form method="POST">
            <label for="nom">Nom:</label><br>
            <input type="text" id="nom" name="nom" value="<?php echo isset($_POST['nom'])?$_POST['nom']:""; ?>"><br><br>

            <label for="prix">Prix:</label><br>
            <input type="number" id="prix" name="prix" min="0" value="<?php echo isset($_POST['prix'])?$_POST['prix']:""; ?>"><br><br>

            <label for="description">Description:</label><br>
            <textarea id="description" name="description"><?php echo isset($_POST['description'])?$_POST['description']:""; ?></textarea><br><br>

            <label for="categorie">Categorie:</label><br>
            <input type="text" id="categorie" name="categorie" value="<?php echo isset($_POST['categorie'])?$_POST['categorie']:""; ?>"><br><br>

            <input type="submit" name="ajouter" value="Ajouter">

        </form>

    </body>
</html>