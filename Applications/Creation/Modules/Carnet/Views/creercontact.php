<div id="creercontact">
    <?php if (isset($error_message)) : ?>
        <div class="alert alert-danger err"><?= $error_message; ?></div>
    <?php endif; ?>
    <br>
    <br>
    <div class="row">
        <div class="col-lg-6">
            Ou alors, creer un contact:
            <form method="post" name="form_contact" id="form_contact" action="/sms/creation/carnet/contact" onclick="verifAutreContact()">
                <div class="form-group">
                    <label for="nom">
                        Nom:
                    </label>
                    <input class="form-control" type="text" name="nom" value="">
                </div>
                <div class="form-group">
                    <label for="prenom">
                        Prenom:
                    </label>
                    <input class="form-control" type="text" name="prenom" id="prenom" value="">
                </div>
                <div class="form-group">
                    <label for="email">
                        Email:
                    </label>
                    <input class="form-control" id="email" type="email" name="email" value="">
                </div>
                <div class="form-group">
                    <label for="groupeContact">
                        Groupe:
                    </label>      
                    <select name="groupeContact" id="groupeContact" class="form-control">
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
                        <input type="text" name="inputAutreGroupe" id="inputAutreGroupe" class="form-control" style="color:black" value="">
                    </p>
                </div>

                <div class="form-group">
                    <label for="number1">
                        Tel1:
                    </label> 
                    <input class="form-control" id="number1" type="number" name="number1" value="">
                </div>
                <div class="form-group">
                    <label for="number2">
                        Tel2:
                    </label> 
                    <input class="form-control" id="number1" type="number" name="number2" value="">
                </div>
                <div class="form-group">
                    <label for="number3">
                        Tel1:
                    </label> 
                    <input class="form-control" id="number1" type="number" name="number3" value="">
                </div>
                <input class="btn btn-primary" type="submit" value="Creer">
            </form>    
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h3>Ou bien, uploader un fichier de contacts:</h3>
            D'abord, selectionner un groupe:
            <form action="/sms/creation/carnet/upload/contacts" method="post" id="form_uploadContact" name="form_uploadContact"
                  enctype="multipart/form-data" onclick="verifAutreUploadContact()">
                <div class="form-group">
                    <label for="groupeUploadContact">
                        Groupe:
                    </label>      
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

                </div>
                <div class="form-group">
                    Selectionner un fichier à upload: <br />

                    <input type="file" name="fichier" size="50" />

                </div>
                <input type="submit" class="btn btn-primary" value="Enregistrer"/>
            </form>
        </div>
    </div>   
</div>
