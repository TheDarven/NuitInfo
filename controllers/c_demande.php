<?php

if (isset($_POST['validerDemande'])){
    require_once(PATH_MODELS.'DemandeDAO.php');
	$id = htmlspecialchars($_POST['validerDemande']);

    $demandeDAO = new DemandeDAO(true);
    $demande = $demandeDAO->getDemande($id);

    if($demande == null){
        header('Location: '.$router->generate('accueil'));
        exit();
    }


    require_once(PATH_MODELS.'ConversationDAO.php');
    $conversationDAO = new ConversationDAO(DEBUG);
<<<<<<< HEAD
    $conversation = $conversationDAO->createConversation($demande->getIdAuteur(),$_SESSION['connect']);
=======


    $idDemande = $conversationDAO->getNextConversationId();

    $conversation = $conversationDAO->createConversation($demande->getIdAuteur(),$connected);
    header('Location: '.$router->generate('conversation', ['id' => $idDemande]));
    exit();
>>>>>>> 73a76b39fe818c5b1430d9a97642ab27c44c6625
}

if (isset($params['id'])){
    require_once(PATH_MODELS.'DemandeDAO.php');
	$id = $params['id'];
    $demandeDAO = new DemandeDAO(DEBUG);
    $demande = $demandeDAO->getDemande($id);

    if($demande == null){
        header('Location: '.$router->generate('accueil'));
        exit();
    }

    require_once(PATH_MODELS.'UtilisateurDAO.php');
    $UtilisateurDAO = new UtilisateurDAO(true);

    if($demande->getExposition() == 1 && ($connected == 0 || $UtilisateurDAO->getUtilisateurWithId($connected)->getValide() == 1)){
        header('Location: '.$router->generate('accueil'));
        exit();
    }

    $auteurDemande = htmlspecialchars($demandeDAO->getNom($demande->getIdAuteur()));
}

require_once(PATH_VIEWS."demande.php");