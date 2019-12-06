<?php

if ($connected==0){
    header('Location: '.$router->generate('connexion'));
	exit();
}
require_once(PATH_MODELS."ConversationDAO.php");
require_once(PATH_MODELS."MessageDAO.php");
require_once(PATH_MODELS."DemandeDAO.php");

if(isset($_POST['connectedId']) and isset($_POST['answer']) and isset($_POST['idConversation'])) {
	$nouveaumessage = new Message(null, $_POST['idConversation'], date('Y-m-d H:i:s'), $_POST['connectedId'], $_POST['answer']);
	$messageDAO = new MessageDAO(DEBUG);
	$message = $messageDAO->createMessage($nouveaumessage);
}


$idConversation = $params['id'];
$conversationDAO = new ConversationDAO(DEBUG);
$conversation = $conversationDAO->getConversationById($idConversation);
$demandeDAO = new DemandeDAO(DEBUG);
$demande = $demandeDAO->getDemande($conversation->getIdDemande());
if($demande->getIdAuteur() == $connected || $conversation->getIdAideur() == $connected) {
	$messageDAO = new MessageDAO(DEBUG);
	$messages = $messageDAO->getMessagesByIdConv($conversation->getId());
	require_once(PATH_VIEWS."conversation.php");
}
else {
	header('Location: '.$router->generate('accueil'));
	exit();
}