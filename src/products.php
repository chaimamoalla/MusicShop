<?php
class Product {
    private $id;
    private $nom;
    private $descrip;
    private $prix;
    private $couleur;
    private $image;
    private $categorie;

    public function __construct(array $donnees) {
        $this->id = $donnees['id'];
        $this->nom = $donnees['nom']; 
        $this->descrip = $donnees['descrip'];
        $this->prix = $donnees['prix']; 
        $this->couleur = $donnees['couleur'];
        $this->categorie = $donnees['categorie'];
        $this->image = $donnees['image'] ?? null;
    }
    // Getter methods
    public function getId(){
        return $this->id;
    }
    public function getNom() {
        return $this->nom;
    }
    public function getDescrip() {
        return $this->descrip;
    }
    public function getPrix() {
        return $this->prix;
    }
    public function getCouleur(){
        return $this->couleur;
    }
    public function getCategorie()
    {
        return $this->categorie;
    }
    public function getImage() {
        return $this->image;
    }
    public function setImage($image) {
        $this->image = $image;
    }    
}
?>