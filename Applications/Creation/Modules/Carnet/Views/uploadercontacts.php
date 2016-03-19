<div id="uploadercontacts">
    <?php if (isset($error_message)) : ?>
        <div class="alert alert-danger err"><?= $error_message; ?></div>
    <?php endif; ?>
  <h3>Ou bien, uploader un fichier de contacts:</h3>
        D'abord, selectionner un groupe:
    <form action="/sms/creation/carnet/upload/contacts" method="post" id="form_uploadContact"
              enctype="multipart/form-data">
        
        <select name="groupeUploadContact" id="groupeUploadContact" class="form-control">
            <?php
            foreach ($groups as $group):
                $groupName = $group->getNom();
                ?>
                <option value="<?= $groupName; ?>"><?= $groupName; ?></option>		
            <?php endforeach; ?>
            <option value="value0"> Autre </option>
        </select>
        <p id="autreUploadGroupe" style="display:none; color:blue">
            Veuillez entrer la nouvelle valeur ici:
            <input type="text" name="inputAutreUploadGroupeContact" id="inputAutreUploadGroupeContact" class="form-control" style="color:black" value="">
        </p>

        
    Selectionner un fichier à upload: <br />
        
            <input type="file" name="fichier" size="50" />
            <input type="submit" value="Enregistrer"/>
            
        </form>
     
</div>