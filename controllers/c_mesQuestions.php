<?php
if ($connected==0){
	header('Location: '.$router->generate('connexion'));
	exit();
}
require_once(PATH_MODELS.'DemandeDAO.php');
require_once(PATH_MODELS.'ConversationDAO.php');
$demandesDAO=new DemandeDAO(true);
$conversationDAO=new ConversationDAO(true);

$demandes=$demandesDAO->getDemandeByAuthor($connected);
foreach ($demandes as $d) {
	$conversation = $conversationDAO->getDerniereConversation($d->getId());
	if($conversation != null){
		if($d->getEnCours() == 1){
			$enCours[$conversation->getId()] = $d;
		}else{
			$terminees[$conversation->getId()] = $d;
		}	
	}else{
		$pasEncoreTrouvé[] = $d;
	}
	
}

require_once(PATH_VIEWS."mesQuestions.php");
