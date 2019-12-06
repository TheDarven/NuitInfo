<?php
/*
 * Copyright 2016, Eric Dufour
 * http://techfacile.fr
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 *
 * menu: http://www.w3schools.com/bootstrap/bootstrap_ref_comp_navs.asp
 */
?>
<!-- Menu du site -->
<div class="container">
    <h1><?=TITRE_SITE?></h1>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" href="<?= $router->generate('accueil') ?>">Accueil</a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('mesQuestions') ?>"><?=QUESTIONS?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('listeDemandes') ?>"><?=QUESTIONS_DES_AUTRES?></a>
        </li>
    </ul>
    <ul class="navbar-nav">
    <?php if ($connected==0) { ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('inscription') ?>">Inscription</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('connexion') ?>"><clr-icon shape="login" size="18"></clr-icon> Se connecter</a>
        </li>
    <?php } else { ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('deconnexion') ?>"><clr-icon shape="logout" size="18"></clr-icon> Deconnexion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><clr-icon shape="user" class="is-solid"></clr-icon> Profil</a>
        </li>
    <?php } ?>
    </ul>
</nav>