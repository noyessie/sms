<div id="creercontact">
	<?php  if(isset($error_message)) : ?>
		<div class="alert alert-danger err"><?=$error_message;?></div>
	<?php endif;?>
	<br>
	<br>

  <form method="post" id="contact" action="/sms/creation/contact">
		<div class="form-group">
			<div class=".col-xs-12 .col-sm-6 .col-lg-8">
				<input class="form-control" placeholder="Entrer le nom" type="text" name="nom" value="">
			</div>
                        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
				<input class="form-control" placeholder="Entrer le prenom" type="text" name="prenom" value="">
			</div>
                        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
				<input class="form-control" placeholder="Entrer l'email" type="text" name="email" value="">
			</div>
                        <select name="groupeContact" id="groupeContact" class="form-control">
        		<?php
        		foreach($groups as $group):
        		$groupName=$group->getNom();
                        ?>
        		<option value="<?=$groupName;?>"><?=$groupName;?></option>		
        		<?php endforeach;?>
        		<option value="value0"> Autre </option>
                        </select>
                        <p id="autreGroupe" style="display:none; color:blue">
                            Veuillez entrer la nouvelle valeur ici:
                            <input type="text" name="inputAutreGroupe" id="inputAutreGroupe" class="form-control" style="color:black" value="">
                        </p>
		
                        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
                            <input class="form-control" placeholder="Entrer le numéro 1" type="number" name="number1" value="">
			</div>
                        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
                            <input class="form-control" placeholder="Entrer le numéro 2" type="number" name="number2" value="">
			</div>
                        <div class=".col-xs-12 .col-sm-6 .col-lg-8">
                            <input class="form-control" placeholder="Entrer le numéro 3" type="number" name="number3" value="">
			</div>
                        <div class="col-sm-4 pull-right">
                            <input class="btn btn-primary btn-lg" type="submit" value="Creer">
                        </div>
                </div>
    </form>    
        
    <h3>Ou bien, uploader un fichier de contacts:</h3>
        D'abord, selectionner un groupe:
    <form action="/sms/creation/upload/contacts" method="post" id="form_uploadContact"
              enctype="multipart/form-data">
        
        <select name="groupeContact" id="groupeContact" class="form-control">
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
            <input type="text" name="inputAutreUploadGroupe" id="inputAutreUploadGroupe" class="form-control" style="color:black" value="">
        </p>

        
    Selectionner un fichier à upload: <br />
        
            <input type="file" name="fichier" size="50" />
            <input type="submit" value="Enregistrer"/>
            
        </form>
             
    
<div>
