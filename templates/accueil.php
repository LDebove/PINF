<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}
?>

<div class="page-content">
	<div>
		<div class="googlemap">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2524.906895835793!2d3.1833937159793586!3d50.74021567951635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c32f6a98b57b51%3A0xa13f60d05918dbb0!2s26%20All%C3%A9e%20Louise%20Thuliez%2C%2059200%20Tourcoing!5e0!3m2!1sfr!2sfr!4v1581347399804!5m2!1sfr!2sfr" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
		</div>
		<div class="tf-work-section">
			<div class="container" id="work">
				<h2 class="h3">Nous contacter</h2>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-12 pt-2">
						<div class="card">
							<!-- <img class="img-fluid card-img-top" src="images/2-start-simple.jpg" alt="2-start-simple"/> -->
							<div class="card-body">
								<p class="text-muted">Lorem ipsum dolor sit amet consectetur adipiscing elit interdum sagittis, nisi ac aptent vitae est facilisi.</p><a class="text-dark card-link" href="#">Learn More</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12 pt-2">
						<div class="card">
							<!-- <img class="img-fluid card-img-top" src="images/3-start-simple.jpg" alt="3-start-simple"/> -->
							<div class="card-body">
								<p class="text-muted">Porttitor varius auctor litora congue sociosqu montes eleifend facilisi elementum convallis, diam et nullam sem.</p><a class="text-dark card-link" href="#">Learn More</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12 pt-2">
						<div class="card">
							<!-- <img class="img-fluid card-img-top" src="images/4-start-simple.jpg" alt="4-start-simple"/> -->
							<div class="card-body">
								<p class="text-muted">Commodo convallis varius egestas purus rhoncus cras morbi dignissim, ligula vestibulum ultrices urna semper.</p><a class="text-dark card-link" href="#">Learn More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="tf-quotes-section">
			<div class="carousel slide mt-5" id="tf-carousel" data-ride="carousel">
				<ol class="carousel-indicators">
					<li class="active" data-target="#tf-carousel" data-slide-to="0"></li>
					<li data-target="#tf-carousel" data-slide-to="1"></li>
					<li data-target="#tf-carousel" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active" style="background-image: url('images/5-start-simple-slider.jpg');">
						<div class="carousel-caption">
							<p class="slider-text-1">"Je suis très satisfait.<br>Un travail d'artiste!"</p>
							<p class="slider-text-2">Pierre de Saint Meleuc<br>Fondateur de Google</p>
						</div>
					</div>
					<div class="carousel-item" style="background-image: url('images/6-start-simple-slider.jpg');">
						<div class="carousel-caption">
							<p class="slider-text-1">"Quand je l'ai vu, je n'en ai pas cru mes yeux.<br>Surprenant et sensuel, j'adore!"</p>
							<p class="slider-text-2">Pierre de Saint Meleuc<br>PDG d'Amazon</p>
						</div>
					</div>
					<div class="carousel-item" style="background-image: url('images/7-start-simple-slider.jpg');">
						<div class="carousel-caption">
							<p class="slider-text-1">"Je n'avais jamais pensé à un trône en bois par le passé.<br>Je n'aurai pas pu être plus satisfait!"</p>
							<p class="slider-text-2">Pierre de Saint Meleuc<br>Roi de Belgique</p>
						</div>
					</div>
					<div class="carousel-item" style="background-image: url('images/5-start-simple-slider.jpg');">
						<div class="carousel-caption">
							<p class="slider-text-1">"Je suis très satisfait.<br>Un travail d'artiste!"</p>
							<p class="slider-text-2">Pierre de Saint Meleuc<br>Fondateur de Google</p>
						</div>
					</div>
				</div><a class="carousel-control-prev" href="#tf-carousel" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#tf-carousel" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
			</div>
		</div>
		<div class="tf-contact-section">
			<div class="container" id="contact">
				<h2 class="h4">Tell us About Your Requirement</h2>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-12">
						<h3 class="h5">Contact us</h3>
						<form action="https://formspree.io/youremail@example.com" method="POST">
							<div class="row no-gutters">
								<div class="col-lg-6 col-md-12 col-sm-12 tf-contact-col">
									<input class="bg-light form-control" type="text" name="name" placeholder="*Name" required="required"/>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12 pb-2">
									<input class="bg-light form-control" type="email" name="_replyto" placeholder="*Your Email Address" required="required"/>
								</div>
							</div>
							<div class="row pb-2 no-gutters">
								<div class="col-md-12 col-sm-12">
									<textarea class="bg-light mb-2 form-control" name="message" placeholder="*Your Message" rows="5" required="required"></textarea>
								</div>
							</div>
							<button class="btn btn-primary" type="submit">Submit</button>
						</form>
					</div>
					<div class="col-md-8 col-sm-12 float-right text-right">
						<h3 class="h5">Address</h3><span>Start Simple<br/>United States</span>
						<p></p>
						<h3 class="h5">Phone</h3>
						<p>(243) 948 3866</p>
						<h3 class="h5">Email</h3>
						<p>contact@example.com</p>
					</div>
				</div>
			</div>
		</div></div>
	</div>