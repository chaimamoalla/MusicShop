<?php
class Upload
{
    private int $maxsize;
    private int $taille;
    private string $nom;
    private string $type;
    private string $temp;
    private string $repertoire;
    private string $erreur;
    private array $typesValides;

    public function __construct(array $fichier)
    {
        $this->temp = $fichier['tmp_name'];
        $this->nom = $fichier['name'];
        $this->type = $fichier['type'];
        $this->taille = $fichier['size'];
    }

    // Getter and setter for $maxsize
    public function getMaxsize(): int
    {
        return $this->maxsize;
    }

    public function setMaxsize(int $maxsize): void
    {
        $this->maxsize = $maxsize;
    }

    // Getter and setter for $taille
    public function getTaille(): int
    {
        return $this->taille;
    }

    public function setTaille(int $taille): void
    {
        $this->taille = $taille;
    }

    // Getter and setter for $nom
    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    // Getter and setter for $type
    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    // Getter and setter for $temp
    public function getTemp(): string
    {
        return $this->temp;
    }

    public function setTemp(string $temp): void
    {
        $this->temp = $temp;
    }

    // Getter and setter for $repertoire
    public function getRepertoire(): string
    {
        return $this->repertoire;
    }

    public function setRepertoire(string $repertoire): void
    {
        $this->repertoire = $repertoire;
    }

    // Getter and setter for $erreur
    public function getErreur(): string
    {
        return $this->erreur;
    }

    public function setErreur(string $erreur): void
    {
        $this->erreur = $erreur;
    }

    // Getter and setter for $typesValides
    public function getTypesValides(): array
    {
        return $this->typesValides;
    }

    public function setTypesValides(array $typesValides): void
    {
        $this->typesValides = $typesValides;
    }



    public function uploadFichier()
    {
        if (!in_array($this->type,$this->typesValides)) {
            $this->erreur = "le fichier<b>" . $this->nom . "</b> n'est pas valide";
            return false;
        } elseif ($this->taille > $this->maxsize) {
            $this->erreur = "Impossible de copier le fichier" . $this->nom;
            return false;
        } else {
            echo "transfert effectué avec succès";
            return true;
        }
    }
}
?>