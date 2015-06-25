<!-- formulaire de changemement des informations utilisateur -->
<form method="post" action="user.php?action=modifyUserInfo">
    <fieldset>
        <legend><strong>Modification des informations du profil</strong></legend>
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Votre Nom</span>
        <input type="text" class="form-control" placeholder="Votre Nom" value="<?php echo $infosUser['nom'];?>" aria-describedby="basic-addon1" name="name">
    </div>
    <br/>

    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Votre Prénom</span>
        <input type="text" class="form-control" placeholder="Votre Prénom" value="<?php echo $infosUser['prenom'];?>" aria-describedby="basic-addon1" name="surname">
    </div>
    <br/>

    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Votre Age</span>
        <input type="text" class="form-control" placeholder="Votre Age" value="<?php echo $infosUser['age'];?>" aria-describedby="basic-addon1" name="age">
    </div>
    <br/>

    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Votre Adresse</span>
        <input type="text" class="form-control" placeholder="Votre Adresse" value="<?php echo $infosUser['adresse'];?>" aria-describedby="basic-addon1" name="address">
    </div>
    <br/>

    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Votre e-Mail</span>
        <input type="text" class="form-control" placeholder="Votre e-Mail" value="<?php echo $infosUser['email'];?>" aria-describedby="basic-addon1" name="mail">
    </div>
    <br/>
    <input type="submit" value="Modifier mes Informations >" class="btn btn-lg btn-primary"/>
        </fieldset>
</form>
