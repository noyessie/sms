<div id="uploadercontacts">
    <?php if (isset($error_message)) : ?>
        <div class="alert alert-danger err"><?= $error_message; ?></div>
    <?php endif; ?>
    <select name="groupeUpload" id="groupeContact" class="form-control">
        <?php
        foreach ($groups as $group):
            $groupName = $group->getNom();
            ?>
            <option value="<?= $groupName; ?>"><?= $groupName; ?></option>		
        <?php endforeach; ?>
        <option value="value0"> Autre </option>
    </select>
    <p id="autreGroupe" style="display:none; color:blue">
        Veuillez entrer la nouvelle valeur ici:
        <input type="text" name="inputAutreGroupeUpload" id="inputAutreGroupe" class="form-control" style="color:black" value="">
    </p>
    <form action="/sms/creation/upload" method="post" id="form_uploadEtudiant"
          enctype="multipart/form-data">
        <input type="file" name="fichier" size="50" />
        <input type="submit" value="Enregistrer"/>
    </form>
</div>