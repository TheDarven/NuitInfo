<?php

require_once(PATH_ENTITY.'Conversation.php');
require_once(PATH_MODELS.'DAO.php');
class ConversationDAO extends DAO{
    public function getConversationByAuthor($idAuteur){
        $req = $this -> queryAll('SELECT * FROM conversation where idAuteur=?', array($idAuteur));
        if($req == false || !is_null($this->getErreur()))
            $conversations = array();
        else{
            foreach ($req as $conversation) {
                $conversations[] = new Conversation($conversation['id'], $conversation['idDemande'], $conversation['idAideur'], $conversation['dateDebut'], $conversation['dateFin']);
            }
        }
        return $conversations;
    }

    public function getDerniereConversation($idDemande){
        $req = $this -> queryAll('SELECT * FROM conversation where idDemande=? ORDER BY dateDebut DESC', array($idDemande));
        if($req == false || !is_null($this->getErreur()))
            return null;
        else{
            foreach ($req as $conversation) {
                return new Conversation($conversation['id'], $conversation['idDemande'], $conversation['idAideur'], $conversation['dateDebut'], $conversation['dateFin']);
            }
        }
        return null;
    }

    public function getAllConversation(){
        $req = $this -> queryAll('SELECT * FROM conversation');
        if($req == false || !is_null($this->getErreur()))
            $conversations = array();
        else{
            foreach ($req as $conversation) {
                $conversations[] = new Conversation($conversation['id'], $conversation['idDemande'], $conversation['idAideur'], $conversation['dateDebut'], $conversation['dateFin']);
            }
        }
        return $conversations;
    }

    public function getConversationById($id){
        $req = $this -> queryAll('SELECT * FROM conversation WHERE id = ?', [$id]);
        if($req == false || !is_null($this->getErreur()))
            return null;
        else{
            foreach ($req as $conversation) {
                return new Conversation($conversation['id'], $conversation['idDemande'], $conversation['idAideur'], $conversation['dateDebut'], $conversation['dateFin']);
            }
        }
        return null;
    }

    public function createConversation($idDemande, $idAideur) {
        $date = date("Y-m-d H:i:s");
        $req = $this->queryInsert('INSERT INTO conversation(idDemande, idAideur, dateDebut, dateFin) VALUES(?,?,?,?)', [$idDemande, $idAideur,$date, '0/0/0']);
        return ($req && is_null($this->getErreur()));
    }

    public function getNextConversationId(){
        $req = $this->queryRow('SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = "'.BD_DBNAME.'" AND TABLE_NAME = "conversation"');
        if($req == false || !is_null($this->getErreur()))
            return 0;
        return $req['AUTO_INCREMENT'];
    }
}