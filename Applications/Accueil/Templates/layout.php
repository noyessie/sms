<!DOCTYPE html>
<html>
	<head>
		<title><?= isset($title) ? $title : 'Backend' ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="Web/css/accueil/accueil.css">
		<link rel="stylesheet" href="Web/plugins/bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	
	<!-- menu de navigation -->
	<nav>
		<span class="titre left">StagePro</span>	
		<span class="connection right scrollBottom"><span class="btn btn-primary">Connection</span></span>
	</nav>

	<!-- slide d'accueil -->
	<div id="my_carousel" class="carousel slide" data-ride="carousel">
			<!-- Bulles -->
		<ol class="carousel-indicators center">
			<li data-target="#my_carousel" data-slide-to="0" class="active"></li>
			<li data-target="#my_carousel" data-slide-to="1"></li>
			<li data-target="#my_carousel" data-slide-to="2"></li>
		</ol>
		<!-- Slides -->
		<div class="carousel-inner" role="listbox">
			<!-- Page 1 -->
			<div class="item active">
				<div class="carousel-page">
					<img src="Web/images/img1.jpg" class="img-responsive full"/>
				</div>
				<div class="carousel-caption">
					<h1>Placer des stages a la disposition des eleves</h1>
					<p><a class="btn btn-lg btn-primary scrollBottom" href="#" role="button">Identifier vous</a></p>
				</div>
			</div>
			<!-- Page 2 -->
			<div class="item">
				<div class="carousel-page"><img src="Web/images/img2.jpg" class="img-responsive full"/></div>
				<div class="carousel-caption">
					<h1>Les eleves peuvent choisir des stages parmi ceux qui leurs sont proposer</h1>
					<p><a class="btn btn-lg btn-primary scrollBottom" href="#" role="button">Identifier vous</a></p>
				</div>
			</div>
			<!-- Page 3 -->
			<div class="item">
				<div class="carousel-page">
					<img src="Web/images/img3.jpg" class="img-responsive full" alt="img3" />
				</div>
				<div class="carousel-caption">
					<h1>Attribuer les stages aux élèves de façon automatique ou manuel</h1>
					<p><a class="btn btn-lg btn-primary scrollBottom" href="#" role="button">Identifier vous</a></p>
				</div>
			</div>
		</div>
		<!-- Contrôles -->
		<a class="left carousel-control" href="#my_carousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#my_carousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

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
	<script type="text/javascript" src="Web/js/acceuil/accueil.js"></script>
	<script type="text/javascript" src="Web/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="Web/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="Web/js/accueil/accueil.js"></script>
	</body>
</html>