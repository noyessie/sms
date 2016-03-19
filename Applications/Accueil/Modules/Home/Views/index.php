<div id="creergroupe">
	<?php  if(isset($error_message)) : ?>
		<div class="alert alert-danger err"><?=$error_message;?></div>
	<?php endif;?>
	<?php  if(isset($message)) : ?>
		<div class="alert alert-success"><?=$message;?></div>
	<?php endif;?>
	<br>
	<br>
        Salut bienvenue sur la plateforme!
        Il vous reste <?=$credit;?> credits 
</div>
