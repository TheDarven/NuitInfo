<?php require_once(PATH_VIEWS . "header.php"); ?>

<div class="container" style="margin-top: 40px; border: 1px solid #DEDEDE; border-radius: 5px; padding: 10px 0; background-color: white;">
    <form method="POST">
        <div style="padding: 0 20px;">
            <h2 style="margin-bottom: 10px;">Contenu de la demande</h2>

            <div class="form-group">
                <label for="demande-titre">Titre*</label>
                <div class="input-group mb-3">
                    <input id="demande-titre" class="form-control" placeholder="Titre de la demande" name="titre" required>
                </div>
            </div>
            <div class="form-group">
                <label for="demande-contenu">Contenu*</label>
                <div class="input-group mb-3">
                    <textarea id="demande-contenu" class="form-control" placeholder="Contenu de la demande" name="contenu" required></textarea>
                </div>
            </div>
        </div>
        <div style="margin-top: 25px; padding: 0 20px; border-top: 1px solid #DEDEDE;">
            <h2 style="margin-top: 10px; margin-bottom: 10px;">Préférences sur la visibilitée</h2>
            <div class="form-group">
                <div class="form-check">
                    <input id="demande-valide" type="checkbox" class="form-check-input" name="valide">
                    <label for="demande-valide" class="form-check-label">Visible uniquement pour les certifiés</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input id="demande-anonymat" type="checkbox" class="form-check-input" name="anonymat">
                    <label for="demande-anonymat" class="form-check-label">Afficher son nom et son prénom</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Poster la demande</button>
        </div>
    </form>
</div>

<?php require_once(PATH_VIEWS . "footer.php"); ?>

<?php if(isset($demande) && $demande){ ?>
    <script type="text/javascript" src="<?= PATH_SCRIPTS ?>sweetalert.js"></script>
    <script>
        function alertJs(title, message, type = "success"){
            swal(title, message, type)
        }
    </script>
    <?php
    echo '<script type="text/javascript">
        alertJs("Demande posté", "Votre demande a été postée avec succès !");
    </script>';
}