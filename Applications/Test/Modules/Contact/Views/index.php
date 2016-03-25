
<h1><a href="create/"> new Contact</a></h1>
<?php
use Library\Utilities;

foreach($contacts as $c):
	Utilities::print_table($c);
?>
<h3><a href="<?=$c['id']?>/delete/"> delete user <?= $c['nom']?></a></h3>
<?php endforeach;?>
