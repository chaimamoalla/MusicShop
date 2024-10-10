<?php
    require_once 'products.php';

class ProductsManager
{

    public PDO $db;

    public function __construct($db)
    {
        $this->setDb($db);
    }
    public function setDb(PDO $db)
    {
        $this->db = $db;
    }
    //add
    public function add(Product $prod)
    {
        if ($this->get($prod->getId()) == null) {
            $q = $this->db->prepare('INSERT INTO products (id, nom, descrip, prix, couleur, categorie, image) VALUES (:id, :nom, :descrip, :prix, :couleur, :categorie, :image)');
            $q->bindValue(':id', $prod->getId());
            $q->bindValue(':nom', $prod->getNom());
            $q->bindValue(':descrip', $prod->getDescrip());
            $q->bindValue(':prix', $prod->getPrix());
            $q->bindValue(':couleur', $prod->getCouleur());
            $q->bindValue(':image', $prod->getImage());
            $q->bindValue(':categorie', $prod->getCategorie());

            $R = $q->execute();
            if (!$R) {
                echo "Echec Insertion";
            } else {
                echo '<h3 style="text-align:center;">Insertion réussie</h3>';
            }
        } else {
            echo "Insertion impossible: Produit déjà existant avec cet ID";
        }
    }
    //get 
    public function get($id)
    {
        $q = $this->db->query("SELECT * FROM products WHERE id LIKE '$id'");
        if ($q->rowCount()) {
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            $prod = new Product($donnees);
            return $prod;
        }
        return null;
    }
    //getProducts
    public function getProducts()
    {
        $products = array();
        $q = $this->db->query('SELECT * FROM products');
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $prod = new Product($donnees);
            $products[] = $prod;
        }
        return $products;
    }

    public function getAllCategories()
    {
        $categories = array();
        $query = $this->db->query('SELECT DISTINCT categorie FROM products');
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $categories[] = $row['categorie'];
        }
        return $categories;
    }
    public function getProductsByCategory($categorie)
    {
        $products = array();
        $query = $this->db->prepare('SELECT * FROM products WHERE categorie = :categorie');
        $query->execute(array(':categorie' => $categorie));

        while ($donnees = $query->fetch(PDO::FETCH_ASSOC)) {
            $prod = new Product($donnees);
            $products[] = $prod;
        }
        return $products;
    }
}
