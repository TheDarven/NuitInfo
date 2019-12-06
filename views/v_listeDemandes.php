<?php require_once(PATH_VIEWS . "header.php"); ?>

<div class="container" style="margin-top: 40px; padding: 10px 0;">

	<h1>Liste des demandes</h1>

	<ul class="list-group">
		<?php
        foreach ($demande as $temp) { ?>
            <a href="<?= $router->generate('demande', ['id' => $temp->getId()]) ?>">
                <li class="list-group-item">
                    <div>
                        <?= "<h3>".$temp->getTitre().'</h3>'.$temp->getContenu() ?>
                    </div>
                    <div id="div-date">
                        <?= $temp->getDatePost() ?>
                    </div>
                </li>
            </a>
        <?php } ?>

	</ul>

</div>

<?php require_once(PATH_VIEWS . "footer.php"); ?>