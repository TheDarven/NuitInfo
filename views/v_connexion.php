<?php require_once(PATH_VIEWS . "header.php"); ?>

<div class="container" style="margin-top: 40px; border: 1px solid #DEDEDE; border-radius: 5px; padding: 10px 0; background-color: white;">
    <form method="POST">
        <div style="padding: 0 20px;">
            <h2 style="margin-bottom: 10px;">Se connecter</h2>

            <div class="form-group">
                <label for="connexion-email">Adresse email*</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="connexion-email"><clr-icon shape="envelope"></clr-icon></span>
                    </div>
                    <input aria-describedby="connexion-email" type="email" id="connexion-email" class="form-control <?= (isset($erreurAdresse) && $erreurAdresse) ? 'is-invalid' : '' ?>" placeholder="Entrez votre email" name="email" <?= (isset($erreurAdresse) && !$erreurAdresse && isset($email)) ? 'value="'.$email.'"' : '' ?> required>
                    <?= (isset($erreurAdresse) && $erreurAdresse) ?
                        '<div class="invalid-feedback">
                            L\'adresse mail rentrée n\'existe pas
                        </div>' : '';
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="connexion-motDePasse">Mot de passe*</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="connexion-password"><clr-icon shape="key"></clr-icon></span>
                    </div>
                    <input aria-describedby="connexion-password" type="password" id="connexion-motDePasse" class="form-control <?= (isset($erreurMdp) && $erreurMdp) ? 'is-invalid' : '' ?>" placeholder="Entrez votre mot de passe" name="motDePasse" required>
                    <?= (isset($erreurMdp) && $erreurMdp) ?
                        '<div class="invalid-feedback">
                            Le mot de passe est incorrect
                        </div>' : '';
                    ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </div>

    </form>
</div>

<?php require_once(PATH_VIEWS . "footer.php"); ?>
