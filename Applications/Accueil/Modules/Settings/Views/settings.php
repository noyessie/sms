<div id="settings">
	<?php  if(isset($error_message)) : ?>
		<div class="alert alert-danger err"><?=$error_message;?></div>
	<?php endif;?>
	<br>
	<br>
	<form method="post" action="/sms/settings">
		<div class="form-group">
			<div class=".col-xs-12 .col-sm-6 .col-lg-8">
				<input class="form-control" placeholder="nom d'utilisateur" type="text" name="username" value="">
			</div>
		</div>
		
		
		<div class="form-group">
			<div class=".col-xs-12 .col-sm-6 .col-lg-8">
				<input class="form-control" placeholder="mot de passe" type="password" name="password" value=""><br>	
			</div>
		</div>

		<div class="col-sm-4 pull-right">
			<input class="btn btn-primary btn-lg" type="submit" value="Ok">
		</div>
	</form>


</div>
