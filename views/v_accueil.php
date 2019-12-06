<?php require_once(PATH_VIEWS . "header.php"); ?>

<div class="container p-3 my-3 bg-dark text-white">
  <h1>Qui sommes nous?</h1>
  <p>Vous avez un problème de précarité ou vous voulez aider? Ce site est fait pour vous!</p>
</div>

<p style="text-align: center;">
    <a class="btn btn-success" href="<?= $router->generate('creerDemande') ?>" role="button" style="font-size: 30px;">Poster une demande</a>
</p>

<?php require_once(PATH_VIEWS . "footer.php"); ?>