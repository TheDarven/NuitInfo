<?php

if($connected > 0){
    header('Location: '.$router->generate('accueil'));
    exit();
}

if(isset($_POST['email']) && isset($_POST['motDePasse'])){
    require_once(PATH_MODELS.'UtilisateurDAO.php');
    $email = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['motDePasse']);

    $UtilisateurDAO = new UtilisateurDAO(true);
    $utilisateur = $UtilisateurDAO->getUtilisateurWithEmail($email);

    $erreurAdresse = false;
    $erreurMdp = false;
    if(is_null($utilisateur)){
        $erreurAdresse = true;
    }else{
        if(!password_verify($mdp,$utilisateur->getPassword())){
            $erreurMdp = true;
        }else{
            $_SESSION['idUser'] = $utilisateur->getId();
            header('Location: '.$router->generate('accueil'));
            exit();
        }
    }
}

require_once (PATH_VIEWS."connexion.php");