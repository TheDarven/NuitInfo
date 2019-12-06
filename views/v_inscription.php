<?php require_once(PATH_VIEWS . "header.php"); ?>

<div class="container" style="margin-top: 40px; border: 1px solid #DEDEDE; border-radius: 5px; padding: 10px 0; background-color: white;">
    <form method="POST">
        <div style="padding: 0 20px;">
            <h2 style="margin-bottom: 10px;">Informations générales</h2>

            <div class="form-group">
                <label for="inscription-email">Adresse email*</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inscription-email"><clr-icon shape="envelope"></clr-icon></span>
                    </div>
                    <input aria-describedby="inscription-email" type="email" id="inscription-email" class="form-control <?= (isset($erreurAdresse) && $erreurAdresse) ? 'is-invalid' : '' ?>" placeholder="Entrez votre email" name="email" <?= (isset($erreurAdresse) && !$erreurAdresse && isset($email)) ? 'value="'.$email.'"' : '' ?> required>
                    <?= (isset($erreurAdresse) && $erreurAdresse) ?
                        '<div class="invalid-feedback">
                            L\'adresse mail est déjà enregistrée
                        </div>' : '';
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inscription-motDePasse">Mot de passe*</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inscription-password"><clr-icon shape="key"></clr-icon></span>
                    </div>
                    <input aria-describedby="inscription-password" type="password" id="inscription-motDePasse" class="form-control <?= (isset($erreurMdp) && $erreurMdp) ? 'is-invalid' : '' ?>" placeholder="Entrez votre mot de passe" name="motDePasse" required>
                    <?= (isset($erreurMdp) && $erreurMdp) ?
                        '<div class="invalid-feedback">
                            Les mots de passe ne sont pas identiques
                        </div>' : '';
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inscription-motDePasseRepete">Vérification du mot de passe*</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inscription-passwordRepete"><clr-icon shape="key"></clr-icon></span>
                    </div>
                    <input aria-describedby="inscription-passwordRepete" type="password" id="inscription-motDePasseRepete" class="form-control <?= (isset($erreurMdp) && $erreurMdp) ? 'is-invalid' : '' ?>" placeholder="Répétez votre mot de passe" name="motDePasseRepete" required>
                </div>
            </div>
        </div>
        <div style="margin-top: 25px; padding: 0 20px; border-top: 1px solid #DEDEDE;">
            <h2 style="margin-top: 10px; margin-bottom: 10px;">Informations personnelles</h2>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="inscription-prenom">Prenom</label>
                    <input id="inscription-prenom" class="form-control" placeholder="Entrez votre prénom" name="prenom">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="inscription-nom">Nom</label>
                    <input id="inscription-nom" class="form-control" placeholder="Entrez votre nom" name="nom">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="inscription-dateDeNaissance">Date de naissance</label>
                    <input type="date" id="inscription-dateDeNaissance" class="form-control" name="dateDeNaissance">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="inscription-codePostal">Code postal</label>
                    <input type="number" id="inscription-codePostal" class="form-control" name="codePostal">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="inscription-sexe">Sexe</label>
                    <select id="inscription-sexe" class="form-control" name="sexe">
                        <option value="F">Femme</option>
                        <option value="H">Homme</option>
                        <option value="A">Autre</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </div>

    </form>
</div>


<?php require_once(PATH_VIEWS . "footer.php"); ?>