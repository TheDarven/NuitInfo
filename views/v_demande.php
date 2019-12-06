<?php require_once(PATH_VIEWS . "header.php"); ?>

<div class="container p-3 my-3 border">
  <h1><?=$demande->getTitre()?></h1>
  <p><?=$demande->getContenu()?></p>
  <p><?php 
        if ($demande->getAnonymat()==1)
          echo ANONYME;
          
        else $auteurDemande?> 
        <?=$demande->getDatePost()?></p>
</div>
<form method="post">
<div class="container p-3 my-3 border">
<input type="hidden" value="<?= $params['id']?>" name = "validerDemande">
<input type="submit" class="btn btn-info" value="Submit Button">
</div>
</form>
<?php require_once(PATH_VIEWS . "footer.php"); ?>