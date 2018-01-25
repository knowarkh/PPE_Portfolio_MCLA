
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Melody : Home</title>
<link rel="icon" type="image/icon" href="assets/images/tabicon.ico">

<link rel="stylesheet" type="text/css" href="">
<link href="stylesheet.css" rel="stylesheet">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link
	href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,700i"
	rel="stylesheet">
<link
	href="https://fonts.googleapis.com/css?family=Crimson+Text:400,700,700i|Josefin+Sans:700"
	rel="stylesheet">
<link href="assets/css/main.css" rel="stylesheet">
<link rel="icon" href="assets/images/logo.png">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

</head>

<body>
	<div id="index">
		<!-- Index starts here -->
		<div class="container main">
			<div class="row home">
				<div id="index_left" class="col-md-6 left">
					<img class="img-responsive img-rabbit" src="assets/images/acceuil.jpg">
				</div>
				<div id="index_right" class="col-md-6 text-center right">
					<div class="logo">
						<a href="../index.php"><img src="assets/images/logo.png"></a>
						<h4>Melody</h4>
					</div>
					<p class="home-description">Bonjour, je suis étudiante et
						passionnée de systemes informatisés, spécialisée dans le
						développement d'applications.</p>
					<div class="btn-group-vertical custom_btn animated slideinright">
						<div id="about" class="btn btn-rabbit">A propos</div>
						<div id="competences" class="btn btn-rabbit">Competences</div>
						<div id="projets" class="btn btn-rabbit">Projets</div>
						<div id="contact" class="btn btn-rabbit">Contact</div>
					</div>
					<div class="social">
						<a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> <a
							href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>


		</div>
	</div>
	<!-- index ends here -->

	<div id="about_scroll" class="pages ">
		<!-- about strats here  -->
		<div class="container main">
			<div class="row">
				<div class="col-md-6 left" id="about_left">
					<img class="img-responsive img-rabbit" src="assets/images/cvweb.png"> 
				</div>

				<div class="col-md-6 right" id="about_right">
					<a href="#index" class="btn btn-rabbit back"> <i
						class="fa fa-angle-left" aria-hidden="true"></i> Accueil
					</a>
					<div id="watermark">
						<h2 class="page-title" text-center>A propos</h2>
						<div class="marker">a</div>
					</div>
					<p class='subtitle'>Bonjour je suis Melody Rous, étudiante en
						BTS Services d'Informations aux Organisations option Solutions
						Logicielles Applicatives Metier et souhaite continuer ma formation
						en licence pro.</p>
					<p class="info">"Mes centres d'interêts en informatique sont
						l'exploitation des données, l'intelligence artificielle, le
						machine Learning ainsi que toutes decouvertes dans n'importe quel
						domaine scientifique.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- About ends here -->



	<div id="competences_scroll" class="pages">
		<!-- Competences starts here -->
		<div class="container main">
			<div class="row">
				<div class="col-md-8" id="competences_left">
				<?php include ("../../db/Connexion.php");

echo \DB\Connexion\Connexion::getTableauCompetences(1);
 ?>
					<!--  <div id="owl-demo" class="owl-carousel owl-theme">-->
					<!-- <div class="item">-->
<!-- 					<img class="img-responsive img-rabbit" src="assets/images/work.jpg">  -->
					<!--</div>-->
					<!--  <div class="item"><img class="img-responsive img-rabbit" src="assets/images/home.jpg"></div>-->
					<!--<div class="item"><img class="img-responsive img-rabbit" src="assets/images/contact.jpg"></div>-->
					<!--  </div>-->
				</div>

				<div class="col-md-4" id="competences_right">
					<a href="#index" class="btn btn-rabbit back"> <i
						class="fa fa-angle-left" aria-hidden="true"></i> Accueil
					</a>
					<div id="watermark">
						<h2 class="page-title" text-center>Competences</h2>
						<div class="marker">c</div>
					</div>
					<p class='subtitle'>Ceci sont les competences acquise durant ma
						formation en BTS SIO option SLAM au greta de Vannes ainsi que
						durant mon stage effectué à l'INRA de Montpellier à l'UMR MISTEA.
					</p>
<!-- 					<p class="info">There are many variations of passages of Lorem -->
<!-- 						Ipsum available, but the majority have suffered alteration in some -->
<!-- 						form, by injected humour, or randomised words which don't look -->
<!-- 						even slightly believable. If you are going to use a passage of -->
<!-- 						Lorem Ipsum, you need to be sure there isn't anything embarrassing -->
<!-- 						hidden in the middle of text. All the Lorem Ipsum generators on -->
<!-- 						the Internet tend to repeat predefined chunks as necessary, making -->
<!-- 						this the first true generator on the Internet. It uses a -->
<!-- 						dictionary of over 200 Latin words, combined with a handful of -->
<!-- 						model sentence structures, to generate Lorem Ipsum which looks -->
<!-- 						reasonable. The generated Lorem Ipsum is therefore always free -->
<!-- 						from repetition, injected humour, or non-characteristic words etc.</p> -->
				</div>
			</div>
		</div>
	</div>
	<!-- Competences ends here  -->




<div id="projets_scroll" class="pages ">
		<!-- projets strats here  -->
		<div class="container main">
			<div class="row">
				<div class="col-md-6 left" id="about_left">
					<img class="img-responsive img-rabbit" src="assets/images/cvweb.png"> 
				</div>

				<div class="col-md-6 right" id="projets_right">
					<a href="#index" class="btn btn-rabbit back"> <i
						class="fa fa-angle-left" aria-hidden="true"></i> Accueil
					</a>
					<div id="watermark">
						<h2 class="page-title" text-center>Projets</h2>
						<div class="marker">p</div>
					</div>
					<p class='subtitle'>Voici les deux projets que j'ai choisi</p>
					<p class="info">"Premier projet description"</p>
				</div>
			</div>
		</div>
	</div>
	<!-- projets ends here -->

	<div id="contact_scroll" class="pages">
		<!-- Contact starts here -->
		<div class="container main">
			<div class="row">
				<div class="col-md-6 left" id="contact_left">
					<img class="img-responsive img-rabbit"
						src="assets/images/contact.jpg">
				</div>

				<div class="col-md-6 right" id="contact_right">
					<a href="#index" class="btn btn-rabbit back"> <i
						class="fa fa-angle-left" aria-hidden="true"></i> Back to Home
					</a>
					<div id="watermark">
						<h2 class="page-title" text-center>Contact</h2>
						<div class="marker">c</div>
					</div>
					<p class='subtitle'>Je me trouve en ce moment à Vannes en Bretagne. Une question, une offre de contrat en professionalisation, commentaire? Remplissez ce formulaire!</p>
					<!-- form -->
					<form class="form_edit">
						<div class="form-group">
							<input type="name" class="form-control" id="exampleInputName"
								placeholder="Name">
						</div>

						<div class="form-group">
							<input type="email" class="form-control" id="exampleInputEmail1"
								placeholder="Email">
						</div>

						<div class="form-group">
							<textarea class="form-control" rows="5" placeholder="Message"></textarea>
						</div>
						<button type="submit" class="btn btn-rabbit submit">Send
							Message</button>
					</form>
				</div>
			</div>
		</div>

		<footer class="text-center">
			<div class="container bottom">
				<div class="row">
					<div class="col-sm-12">
						<p>
							Made with <i class="fa fa-heartbeat" aria-hidden="true"></i> by <a
								href="https://themewagon.com/">Themewagon</a>
						</p>
					</div>
				</div>
			</div>
		</footer>

	</div>
	<!-- Contact ends here -->

	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/script.js"></script>
</body>
</html>