<?php
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}
?>

<div class="page-content">
	<div class="googlemap">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2528.7200004269002!2d3.187934215820373!3d50.66945907944071!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3287ae2ec3c97%3A0xa7f8d6ef37bcc486!2s119%20Rue%20Louis%20Loucheur%2C%2059510%20Hem!5e0!3m2!1sfr!2sfr!4v1588939301253!5m2!1sfr!2sfr" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
	</div>

	<div class="contact">
		<div class="title">
			<div>
				<h2>Nous contacter</h2>
			</div>
		</div>
		<div class="container">
			<div class="grid">
				<div class="column column-1">
					<div class="column-content">
						<h3>Menuiserie du Nord</h3>
						<span>
							I can't see you mama<br>But I can hardly wait<br>Ooh to touch and to feel you mama<br>Oh I just can't keep away<br>In the heat and the steam of the city<br>Oh its got me running and I just can't brake<br>So say you'll help me mama<br>Cos its getting so hard
						</span>
					</div>
				</div>
				<div class="column column-2">
					<div class="column-content">
						<h3>test 2</h3>
						<span>
							I can't see you mama<br>But I can hardly wait<br>Ooh to touch and to feel you mama<br>Oh I just can't keep away<br>In the heat and the steam of the city<br>Oh its got me running and I just can't brake<br>So say you'll help me mama<br>Cos its getting so hard
						</span>
					</div>
				</div>
				<div class="column column-3">
					<div class="column-content">
						<h3>test 3</h3>
						<span>
							I can't see you mama<br>But I can hardly wait<br>Ooh to touch and to feel you mama<br>Oh I just can't keep away<br>In the heat and the steam of the city<br>Oh its got me running and I just can't brake<br>So say you'll help me mama<br>Cos its getting so hard
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="carousel">
		<div class="slides">
			<div class="slide-1 active" style="background-image: url('fonts/image-A.png');">
				<div class="comment-1">
					<p class="comment">"Je suis très satisfait.<br>Un travail d'artiste!"</p>
					<p class="author">Pierre de Saint Meleuc<br>Fondateur de Google</p>
				</div>
				<a href="javascript:void(0);" class="carousel-button carousel-button-prev" onclick="previousImage()">
					<img src="icons/chevron-left-solid.png" class="carousel-icon icon-left">
				</a>
				<a href="javascript:void(0);" class="carousel-button carousel-button-next" onclick="nextImage()">
					<img src="icons/chevron-right-solid.png" class="carousel-icon icon-right">
				</a>
			</div>
			<div class="slide-2" style="background-image: url('fonts/image-B.png');">
				<div class="comment-2">
					<p class="comment">"Quand je l'ai vu, je n'en ai pas cru mes yeux.<br>Surprenant et sensuel, j'adore!"</p>
					<p class="author">Pierre de Saint Meleuc<br>PDG d'Amazon</p>
				</div>
				<a href="javascript:void(0);" class="carousel-button carousel-button-prev" onclick="previousImage()">
					<img src="icons/chevron-left-solid.png" class="carousel-icon icon-left">
				</a>
				<a href="javascript:void(0);" class="carousel-button carousel-button-next" onclick="nextImage()">
					<img src="icons/chevron-right-solid.png" class="carousel-icon icon-right">
				</a>
			</div>
			<div class="slide-3" style="background-image: url('fonts/image-C.jpg');">
				<div class="comment-3">
					<p class="comment">"Je n'avais jamais pensé à un trône en bois par le passé.<br>Je n'aurai pas pu être plus satisfait!"</p>
					<p class="author">Pierre de Saint Meleuc<br>Roi de Belgique</p>
				</div>
				<a href="javascript:void(0);" class="carousel-button carousel-button-prev" onclick="previousImage()">
					<img src="icons/chevron-left-solid.png" class="carousel-icon icon-left">
				</a>
				<a href="javascript:void(0);" class="carousel-button carousel-button-next" onclick="nextImage()">
					<img src="icons/chevron-right-solid.png" class="carousel-icon icon-right">
				</a>
			</div>	
		</div>
	</div>
</div>