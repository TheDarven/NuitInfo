<?php 
class Utilisateur {

    private $_id;
    private $_nom;
    private $_prenom;
    private $_email;
    private $_password;
    private $_dateNaissance;
    private $_sexe;
    private $_codePostal;
    private $_valide;
    private $_admin;
    private $_ban;

    public function __construct($id, $nom, $prenom, $email, $password, $dateNaissance, $sexe, $codePostal, $valide, $admin, $ban) {
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_email = $email;
        $this->_password = $password;
        $this->_dateNaissance = $dateNaissance;
        $this->_sexe = $sexe;
        $this->_valide = $valide;
        $this->_admin = $admin;
        $this->_codePostal = $codePostal;
        $this->_ban = $ban;
    }

    public function getId(){
        return $this->_id;
    }
    public function getNom(){
        return $this->_nom;
    }
    public function getPrenom(){
        return $this->_prenom;
    }
    public function getEmail(){
        return $this->_email;
    }
    public function getPassword(){
        return $this->_password;
    }
    public function getDateNaissance(){
        return $this->_dateNaissance;
    }
    public function getSexe(){
        return $this->_sexe;
    }
    public function getCodePostal(){
        return $this->_codePostal;
    }
    public function getValide(){
        return $this->_valide;
    }
    public function getAdmin(){
        return $this->_admin;
    }
    public function getBan(){
        return $this->_ban;
    }
}