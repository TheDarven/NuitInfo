<?php
require_once(PATH_MODELS.'DAO.php');
require_once(PATH_ENTITY.'Message.php');

class MessageDAO extends DAO{

    public function getMessagesByIdConv($idConversation) {
        $req = $this->queryAll('SELECT * FROM message WHERE idConversation = ?', [$idConversation]);
        if($req == false || !is_null($this->getErreur()))
            $messages = array();
        else{
            foreach ($req as $message) {
                $messages[] = new Message($message['id'], $message['idConversation'], $message['datePost'], $message['idAuteur'], $message['contenu']);
            }
        }
        return $messages;
    }

    public function createMessage($message){
        $req = $this->queryInsert('INSERT INTO message(idConversation, datePost, idAuteur, contenu) VALUES(?,?,?,?)', [$message->getIdConversation(), $message->getDatePost(), $message->getIdAuteur(), $message->getContenu()]);
        return ($req && is_null($this->getErreur()));
    }

}