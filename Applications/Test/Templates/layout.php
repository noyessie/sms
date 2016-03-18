<!DOCTYPE html>
<html>
	<style type="text/css" media="screen">
		input{
			display: block;
		}	

	</style>

	<link rel="stylesheet" href="/sms/Web/css/style.css">
	<link rel="stylesheet" href="Web/css/accueil/accueil.css">
	<head>
		<title><?= isset($title) ? $title : 'Backend' ?></title>
		<meta charset="utf-8">
	</head>
	<body>
		<?=$content?>
	</body>
</html>