<?php 
class Demande {

    private $_id;
    private $_anonymat;
    private $_contenu;
    private $_titre;
    private $_exposition;
    private $_ageMin;
    private $_ageMax;
    private $_sexe;
    private $_datePost;
    private $_idAuteur;
    private $_enCours;

    public function __construct($id, $anonymat, $contenu, $titre, $exposition, $ageMin, $ageMax, $sexe, $datePost, $idAuteur, $enCours) {
        $this->_id = $id;
        $this->_anonymat = $anonymat;
        $this->_contenu = $contenu;
        $this->_titre = $titre;
        $this->_exposition = $exposition;
        $this->_ageMin = $ageMin;
        $this->_ageMax = $ageMax;
        $this->_sexe = $sexe;
        $this->_datePost = $datePost;
        $this->_idAuteur = $idAuteur;
        $this->_enCours = $enCours;
    }

    public function getId(){
        return $this->_id;
    }
    public function getAnonymat(){
        return $this->_anonymat;
    }
    public function getContenu(){
        return $this->_contenu;
    }

    public function getTitre(){
        return $this->_titre;
    }

    public function getExposition(){
        return $this->_exposition;
    }
    public function getAgeMin(){
        return $this->_ageMin;
    }
    public function getAgeMax(){
        return $this->_ageMax;
    }
    public function getSexe(){
        return $this->_sexe;
    }
    public function getDatePost(){
        return $this->_datePost;
    }
    public function getIdAuteur(){
        return $this->_idAuteur;
    }
    public function getEnCours(){
        return $this->_enCours;
    }
}