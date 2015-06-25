<!-- Formulaire de changement de l'image de profil -->
<form action="user.php?action=modifyUserImage" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend><strong>Changement de la photo de profil</strong></legend>
        <br />
        <label for="file">Fichier à uploader:</label><input id="file" type="file" name="image_profile" /><br />
        <br />
        <br />
        <input type="submit" value="Changer mon image de profil" class="btn btn-lg btn-primary"/>
    </fieldset>
</form>