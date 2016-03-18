<<form action="" method="post" accept-charset="utf-8">
	<input type="hidden" name = "create"/>
	<input type="text" name="unknow_contact"/>
	<select name="groupe" id="">
		<?php foreach($groupes as $g):?>
			<option value="<?=$g['nom']?>"><?=$g['nom']?></option>
		<?php endforeach; ?>
	</select><br>
	<textarea placeholder="Veuillez saisir votre message" rows="20" name="message" id="comment_text" cols="40" class="ui-autocomplete-input" autocomplete="on" role="textbox" aria-autocomplete="list" aria-haspopup="true"></textarea>
	<input type="submit" value="envoyer">;
</form>
