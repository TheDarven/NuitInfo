<?php require_once(PATH_VIEWS . "header.php"); ?>
<style>
body { 
    overflow: hidden;
}
#jeu {
    position: absolute;
    margin: 0 45% 0 45%;
}
</style>
<div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" id=progress-bar></div> 
</div>

<div class="d-flex">
<div class="card">
    <div class="card-header pl-md-2"><h1>404 Error game</h1></div>
    <div class="card-body"><?= ERROR404 ?></div>
    <div class="card-footer" id="gameHUD">Déplacez vous à l'aide des flèches directionnelles</div>
</div>
    <div id="jeu"></div>
</div>
<script type="text/javascript" src="<?= PATH_SCRIPTS."game.js" ?>"></script>
<?php require_once(PATH_VIEWS . "footer.php"); ?>