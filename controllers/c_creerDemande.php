<?php

if($connected == 0){
    header('Location: '.$router->generate('connexion'));
    exit();
}

if(isset($_POST['titre']) && isset($_POST['contenu'])){
    $titre = htmlspecialchars($_POST['titre']);
    $contenu = htmlspecialchars($_POST['contenu']);
    $exposition = isset($_POST['valide']) ? 1 : 0;
    $anonymat = isset($_POST['anonymat']) ? 0 : 1;

    require_once(PATH_MODELS.'DemandeDAO.php');
    $demande = new Demande(1, $anonymat, $contenu, $titre, $exposition, 0, 0, '', date('Y-m-d H:i:s'), $connected, 1);
    $DemandeDAO = new DemandeDAO(true);
    $DemandeDAO->createDemande($demande);
    $demande = true;
}

require_once (PATH_VIEWS."creerDemande.php");