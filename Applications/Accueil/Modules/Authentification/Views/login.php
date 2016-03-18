<div id="login">
	<?php  if(isset($error_message)) : ?>
		<div class="alert alert-danger err"><?=$error_message;?></div>
	<?php endif;?>
	<br>
	<br>
	<form method="post" action="verification">
	<!--form method="post" action="/stage/login"-->
		<div class="form-group">
			<div class=".col-xs-12 .col-sm-6 .col-lg-8">
				<input class="form-control" placeholder="login" type="text" name="login" value="">
			</div>
		</div>
		
		
		<div class="form-group">
			<div class=".col-xs-12 .col-sm-6 .col-lg-8">
				<input class="form-control" placeholder="passwod" type="password" name="password" value=""><br>	
			</div>
		</div>

		<div class="col-sm-4 pull-right">
			<input class="btn btn-primary btn-lg" type="submit" value="connection">
		</div>
	</form>


</div>
