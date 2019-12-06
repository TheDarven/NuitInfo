<?php

session_name ('informatichiens');
session_start();

require_once("../vendor/autoload.php");
require_once("../config/configuration.php");
require_once("../config/text.php");

$router = new AltoRouter();
$erreur = false;

// $router->map('GET', '/article/[*:nom]-[i:id]', 'c_article', 'article');
$router->map('GET', '/', 'c_accueil', 'accueil');

$router->map('GET', '/inscription/', 'c_inscription', 'inscription');
$router->map('POST', '/inscription/', 'c_inscription');

$router->map('GET', '/connexion/', 'c_connexion', 'connexion');
$router->map('POST', '/connexion/', 'c_connexion');

$router->map('GET', '/deconnexion/', 'c_deconnexion', 'deconnexion');

$router->map('GET', '/mesQuestions/', 'c_mesQuestions', 'mesQuestions');

$router->map('GET', '/article/[i:id]', 'c_article', 'article');
$router->map('GET', '/listeArticles/', 'c_listeArticles', 'listeArticles');

$router->map('GET', '/demande/[i:id]', 'c_demande', 'demande');
$router->map('POST', '/demande/[i:id]', 'c_demande');

$router->map('GET', '/listeDemandes/', 'c_listeDemandes', 'listeDemandes');

$router->map('GET', '/creer-demande/', 'c_creerDemande', 'creerDemande');
$router->map('POST', '/creer-demande/', 'c_creerDemande');

$router->map('GET', '/conversation/[i:id]', 'c_conversation', 'conversation');
$router->map('POST', '/conversation/[i:id]', 'c_conversation');

$match = $router->match();

$connected = isset($_SESSION['idUser']) ? isset($_SESSION['idUser']) : 0;

if($match !== false){
    if(is_callable($match['target'])){
        call_user_func_array($match['target'], $match['params']);
    }else{
        if(!is_file(PATH_CONTROLLER . $match['target'] . '.php'))
            $erreur = true;
        else {
            $params = $match['params'];
            require_once(PATH_CONTROLLER . $match['target'] . '.php');
        }
    }
}else
    $erreur = true;


if($erreur){
    require_once(PATH_CONTROLLER .'c_404.php');
}