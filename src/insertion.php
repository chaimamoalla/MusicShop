<?php
include 'products.php';
include 'productsManager.php';

if (
    empty($_POST['id']) || empty($_POST['nom']) || empty($_POST['descrip'])
    || empty($_POST['prix']) || empty($_POST['couleur']) || empty($_FILES['image']['name']) || empty($_POST['categorie'])
) {
    echo 'Erreur: Il faut remplir tous les champs';
} else {
    $uploadDirectory = '../images/';
    $imageName = $_FILES['image']['name'];
    $imagePath = $uploadDirectory . $_POST['categorie'] . '/' . $imageName;

    $donnees = array(
        "id" => $_POST['id'],
        "nom" => $_POST['nom'],
        "descrip" => $_POST['descrip'],
        "prix" => $_POST['prix'],
        "categorie" => $_POST['categorie'],
        "couleur" => $_POST['couleur'],
        "image" => $imagePath
    );
    $product = new Product($donnees);
    $db = new PDO('mysql:host=localhost;dbname=site_musique', 'root', '');
    $manager = new ProductsManager($db);
    echo '<p style="text-align:center;">Insertion Produit</p><br>';
    $manager->add($product);
}
