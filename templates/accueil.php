<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}
?>

<div class="page-content">
	<div>
		<div class="tf-work-section">
			<div class="container" id="work">
				<h2 class="h3">Our Success Stories</h2>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-12 pt-2">
						<div class="card"><img class="img-fluid card-img-top" src="images/2-start-simple.jpg" alt="2-start-simple"/>
							<div class="card-body">
								<p class="text-muted">Lorem ipsum dolor sit amet consectetur adipiscing elit interdum sagittis, nisi ac aptent vitae est facilisi.</p><a class="text-dark card-link" href="#">Learn More</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12 pt-2">
						<div class="card"><img class="img-fluid card-img-top" src="images/3-start-simple.jpg" alt="3-start-simple"/>
							<div class="card-body">
								<p class="text-muted">Porttitor varius auctor litora congue sociosqu montes eleifend facilisi elementum convallis, diam et nullam sem.</p><a class="text-dark card-link" href="#">Learn More</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12 pt-2">
						<div class="card"><img class="img-fluid card-img-top" src="images/4-start-simple.jpg" alt="4-start-simple"/>
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
							<p class="slider-text-1">"Amazing product, Start Simple cares for their customers and helps them at every step.<br>I am a satisfied customer!"</p>
							<p class="slider-text-2">Walter George<br>CEO, Founder of Gupply</p>
						</div>
					</div>
					<div class="carousel-item" style="background-image: url('images/6-start-simple-slider.jpg');">
						<div class="carousel-caption">
							<p class="slider-text-1">"Start Simple thinks outside the box and offers solutions through the creative process of developing apps.<br>They helped me succeed!"</p>
							<p class="slider-text-2">Nancy Young<br>Managing Director, Amazingly</p>
						</div>
					</div>
					<div class="carousel-item" style="background-image: url('images/7-start-simple-slider.jpg');">
						<div class="carousel-caption">
							<p class="slider-text-1">"Simple yet elegant solution to showcase our product and services.<br>Couldn't have asked for more!"</p>
							<p class="slider-text-2">Glenn Harrold<br>Marketing Manager</p>
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