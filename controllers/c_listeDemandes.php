<?php

require_once(PATH_MODELS.'DemandeDAO.php');

$demandeDAO = new DemandeDAO(DEBUG);
$demande = $demandeDAO->getDemandeNonTraite();

require_once(PATH_VIEWS.'listeDemandes.php');