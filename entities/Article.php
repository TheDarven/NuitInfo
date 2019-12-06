<?php
class Article {
    
    private $_id;
    private $_titre;
    private $_contenu;
    private $_idAuteur;
    private $_dateCreation;
    private $_visible;

    public function __construct($id, $titre, $contenu, $idAuteur, $dateCreation, $visible) {
        $this->_id = $id;
        $this->_titre = $titre;
        $this->_contenu = $contenu;
        $this->_idAuteur = $idAuteur;
        $this->_dateCreation = $dateCreation;
        $this->_visible = $visible;
    }

    public function getId(){
        return $this->_id;
    }
    public function getTitre(){
        return $this->_titre;
    }
    public function getContenu(){
        return $this->_contenu;
    }
    public function getIdAuteur(){
        return $this->_idAuteur;
    }
    public function getDateCreation(){
        return $this->_dateCreation;
    }
    public function getVisible(){
        return $this->_visible;
    }
}