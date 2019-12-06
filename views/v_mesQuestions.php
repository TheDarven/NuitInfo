<?php require_once(PATH_VIEWS . "header.php"); ?>

<div class="container" style="margin-top: 40px; padding: 10px 0;">
    <p style="text-align: center;">
        <a class="btn btn-success" href="<?= $router->generate('creerDemande') ?>" role="button" style="font-size: 30px;">Poster une demande</a>
    </p>


	<h1 style="margin-bottom: 20px;">Mes questions</h1>

<?php if(isset($pasEncoreTrouvé)){ ?>
	<ul class="list-group">
		<?php foreach ($pasEncoreTrouvé as $demande) { ?>
		<a href="<?= $router->generate('demande', ['id' => $demande->getId()]) ?>" style="margin-bottom: 15px;">
		  <li class="list-group-item" style="position:relative;">
              <p href="#" class="badge badge-warning" style="position: absolute; right: 10px; top: 10px; font-size: 13px;">En attente</p>
		  	<div>
		  		<?= "<h3>".$demande->getTitre().'</h3>'.$demande->getContenu() ?>
		  	</div>
		  	<div id="div-date">
		  		<?= $demande->getDatePost() ?>
		  	</div>
		  </li>
        </a>
		<?php } ?>
	</ul>
<?php } ?>

<?php if(isset($enCours)){ ?>
    <ul class="list-group">
        <?php foreach ($enCours as $convId => $demande) { ?>
            <p href="<?= $router->generate('conversation', ['id' => $convId]) ?>" style="margin-bottom: 15px;">
                <li class="list-group-item" style="position:relative;">
                    <a href="#" class="badge badge-primary" style="position: absolute; right: 10px; top: 10px; font-size: 13px;">En cours</a>
                    <div>
                        <?= "<h3>".$demande->getTitre().'</h3>'.$demande->getContenu() ?>
                    </div>
                    <div id="div-date">
                        <?= $convId->getDatePost() ?>
                    </div>
                </li>
            </p>
        <?php } ?>
    </ul>
<?php } ?>
	

</div>

<?php require_once(PATH_VIEWS . "footer.php"); ?>