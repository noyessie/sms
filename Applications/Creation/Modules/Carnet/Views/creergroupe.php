<div id="creergroupe">
	<?php  if(isset($error_message)) : ?>
		<div class="alert alert-danger err"><?=$error_message;?></div>
	<?php endif;?>
	<br>
	<br>
	<form method="post" action="/sms/creation/groupe">
		<div class="form-group">
			<div class=".col-xs-12 .col-sm-6 .col-lg-8">
				<input class="form-control" placeholder="Entrer un nom de groupe" type="text" name="groupe" value="">
			</div>
		</div>
		<div class="col-sm-4 pull-right">
			<input class="btn btn-primary btn-lg" type="submit" value="Creer">
		</div>
	</form>


</div>
