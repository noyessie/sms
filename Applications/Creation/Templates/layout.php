<!DOCTYPE html>
<html>
	<head>
		<title><?= isset($title) ? $title : 'Backend' ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/sms/Web/css/accueil/accueil.css">
		<link rel="stylesheet" href="/sms/Web/plugins/bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	
	<!-- menu de navigation -->
	<nav>
		<span class="titre left">StagePro</span>	
		<span class="connection right scrollBottom"><span class="btn btn-primary">Connection</span></span>
	</nav>
	<div class="contenue">
		<div>
			<?= $content ?>
		</div>
	</div>

	<footer class="footer">
      <div class="container">
        <p class="text-muted">© 2015 4GI Ecole Nationale Supérieure Polytechnique</p>
      </div>
    </footer>


	<!-- inclusiton des scripts -->
	<script type="text/javascript" src="/sms/Web/js/acceuil/accueil.js"></script>
	<script type="text/javascript" src="/sms/Web/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="/sms/Web/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/sms/Web/js/accueil/accueil.js"></script>
        <script type="text/javascript" src="/sms/Web/js/accueil/autre.js"></script>
        <script type="text/javascript" src="/sms/Web/js/accueil/autreRecherche.js"></script>
	</body>
</html>