<?php

class Message{

    private $_id;
    private $_idConversation;
    private $_datePost;
    private $_idAuteur;
    private $_contenu;

    public function __construct($id, $idConversation, $datePost, $idAuteur, $_contenu){
        $this->_id = $id;
        $this->_idConversation = $idConversation;
        $this->_datePost = $datePost;
        $this->_idAuteur = $idAuteur;
        $this->_contenu = $_contenu;
    }

    public function getId(){
        return $this->_id;
    }
    public function getIdConversation(){
        return $this->_idConversation;
    }
    public function getDatePost(){
        return $this->_datePost;
    }
    public function getIdAuteur(){
        return $this->_idAuteur;
    }
    public function getContenu(){
        return $this->_contenu;
    }
}