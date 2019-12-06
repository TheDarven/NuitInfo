<?php
unset($_SESSION['idUser']);

header('Location: '.$router->generate('accueil'));
exit();