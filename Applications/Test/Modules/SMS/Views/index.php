
<h1><a href="create/"> new SMS</a></h1>
<?php
use Library\Utilities;

foreach($sms as $c):
	Utilities::print_table($c);
?>
<h3><a href="<?=$c['id']?>/delete/"> delete message <?= $c['corps']?></a></h3>
<?php endforeach;?>
