<?php

if($connected > 0){
    header('Location: '.$router->generate('accueil'));
    exit();
}


if(isset($_POST['email']) && isset($_POST['motDePasse']) && isset($_POST['motDePasseRepete'])){
    require_once(PATH_MODELS.'UtilisateurDAO.php');
    $email = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['motDePasse']);
    $mdpVerif = htmlspecialchars($_POST['motDePasseRepete']);


    $nom = isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : "";
    $prenom = isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : "";
    $dateDeNaissance = isset($_POST['dateDeNaissance']) ? date('Y-m-d', strtotime($_POST['dateDeNaissance'])) : "0/0/0";
    $codePostal = isset($_POST['codePostal']) ? intval(htmlspecialchars($_POST['codePostal'])) : 0;
    $sexe = isset($_POST['sexe']) ? htmlspecialchars($_POST['sexe']) : "";

    print($nom);
    print($codePostal);

    $UtilisateurDAO = new UtilisateurDAO(true);
    $utilisateurMail = $UtilisateurDAO->getUtilisateurWithEmail($email);

    $erreurAdresse = false;
    $erreurMdp = false;

    if(!is_null($utilisateurMail)){
        $erreurAdresse = true;
    }
    if($mdp != $mdpVerif){
        $erreurMdp = true;
    }
    if(!$erreurAdresse && !$erreurMdp){
        $idUtilisateur = $UtilisateurDAO->getNextUtilisateurId();
        $utilisateur = new Utilisateur(0, $nom, $prenom, $email, password_hash($mdp, 1), $dateDeNaissance, $sexe, $codePostal, 0, 0, 0);
        $utilisateur = $UtilisateurDAO->createUtilisateur($utilisateur);

        $_SESSION['idUser'] = $idUtilisateur;
        header('Location: '.$router->generate('accueil'));
        exit();
    }
}



require_once (PATH_VIEWS."inscription.php");
