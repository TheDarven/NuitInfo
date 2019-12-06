<?php

class Conversation{

    private $_id;
    private $_idDemande;
    private $_idAideur;
    private $_dateDebut;
    private $_dateFin;

    public function __construct($id, $idDemande, $idAideur, $dateDebut, $dateFin){
        $this->_id = $id;
        $this->_idDemande = $idDemande;
        $this->_idAideur = $idAideur;
        $this->_dateDebut = $dateDebut;
        $this->_dateFin = $dateFin;
    }

    public function getId(){
        return $this->_id;
    }
    public function getIdDemande(){
        return $this->_idDemande;
    }
    public function getIdAideur(){
        return $this->_idAideur;
    }
    public function getDateDebut(){
        return $this->_dateDebut;
    }
    public function getDateFin(){
        return $this->_dateFin;
    }
}