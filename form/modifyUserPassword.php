   <!-- Formulaire de modification du mot de passe -->
    <form method="post" action="user.php?action=modifyUserPass">
        <fieldset>
            <legend><strong>Modification du mot de passe</strong></legend>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Votre Ancien mot de passe</span>
            <input type="password" class="form-control" placeholder="Votre ancien mot de passe" aria-describedby="basic-addon1" name="passwordOld">
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Votre Nouveau mot de passe</span>
            <input type="password" class="form-control" placeholder="Votre nouveau mot de passe" aria-describedby="basic-addon1" name="passwordNew1">
        </div>
        <br/>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Retaper votre Nouveau mot de passe</span>
            <input type="password" class="form-control" placeholder="Retaper votre nouveau mot de passe"  aria-describedby="basic-addon1" name="passwordNew2">
        </div>
        <br/>
        <input type="submit" value="Changer mon mot de passe" class="btn btn-lg btn-primary" />
            </fieldset>
    </form>
