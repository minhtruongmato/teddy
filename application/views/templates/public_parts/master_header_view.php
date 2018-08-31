<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- TITLE -->
	<title>Teddy's Grill House</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- FontAwesome 5 -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/solid.css" integrity="sha384-wnAC7ln+XN0UKdcPvJvtqIH3jOjs9pnKnq9qX68ImXvOGz2JuFoEiCjT8jyZQX2z" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/brands.css" integrity="sha384-nT8r1Kzllf71iZl81CdFzObMsaLOhqBU1JD2+XoAALbdtWaXDOlWOZTR4v1ktjPE" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css" integrity="sha384-HbmWTHay9psM8qyzEKPc8odH4DsOuzdejtnr+OFtDmOcIVnhgReQ4GZBH7uwcjf6" crossorigin="anonymous">

	<!-- Style -->
	<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>style.css">

</head>

<body>

<header class="">
	<nav>
		<div class="background"></div>
		<div class="nav-brand">
			<a href="<?php echo base_url('') ?>">
				<img src="<?php echo site_url('assets/img/')?>logo-03.png" alt="Teddy's Logo">
			</a>
		</div>
		<div id="expand-nav">
			<a class="btn-nav-expand" role="button" id="btn-nav-expand">
				<span class="nav-icon"></span>
			</a>
		</div>

		<div class="nav-main">
			<div class="row head">
				<div class="col item">
					<a href="<?php echo base_url('about/') ?>">
						<h3 class="subtitle-md">About Us</h3>
					</a>
					<ul class="d-none d-sm-block">
						<li>
							<a href="<?php echo base_url('') ?>">
								<h2 class="title-md">The story of us</h2>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('') ?>">
								<h2 class="title-md">Our Food</h2>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('') ?>">
								<h2 class="title-md">Our Place</h2>
							</a>
						</li>
					</ul>
				</div>

				<div class="col item">
					<a href="<?php echo base_url('menu/') ?>">
						<h3 class="subtitle-md">Menu</h3>
					</a>
					<ul class="d-none d-sm-block">
						<li>
							<a href="<?php echo base_url('') ?>">
								<h2 class="title-md">Chef's Choice</h2>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('') ?>">
								<h2 class="title-md">Steak</h2>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('') ?>">
								<h2 class="title-md">Hamburger</h2>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('') ?>">
								<h2 class="title-md">Craft Beer</h2>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('') ?>">
								<h2 class="title-md">Other</h2>
							</a>
						</li>
					</ul>
				</div>

				<div class="col item">
					<a href="<?php echo base_url('blogs/') ?>">
						<h3 class="subtitle-md">Blogs</h3>
					</a>
					<ul class="d-none d-sm-block">
						<li>
							<a href="<?php echo base_url('') ?>">
								<h2 class="title-md">News</h2>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('') ?>">
								<h2 class="title-md">Recruitment</h2>
							</a>
						</li>
					</ul>
				</div>

				<div class="col item">
					<a href="<?php echo base_url('contact/') ?>">
						<h3 class="subtitle-md">Contact Us</h3>
					</a>
					<ul class="d-none d-sm-block">
						<li>
							<a href="<?php echo base_url('contact/') ?>">
								<h2 class="title-md">Contact</h2>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('reservations/') ?>">
								<h2 class="title-md">Reservations</h2>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="row body">
				<div class="col item">
					<p class="paragraph">Location</p>
					<p class="paragraph">
						917 Rosenbaum Lodge Apt. 831
					</p>
				</div>

				<div class="col item">
					<p class="paragraph">Reservations</p>
					<table class="table">
						<tr>
							<td>Phone</td>
							<td><a href="tel:(84)12345678">(84) 1234 5678</a></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><a href="mailto:info@teddygrillhouse.vn">info@teddygrillhouse.vn</a></td>
						</tr>
					</table>
				</div>

				<div class="col item">
					<p class="paragraph">Subscribe</p>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
					<button type="button" class="btn btn-link">Subscribe</button>
				</div>
			</div>

			<div class="row foot">
				<div class="left col-sm-9 item">
					<ul>
						<li>
							<a class="active" href="<?php echo base_url('')?>">En</a>
						</li>
						<li> / </li>
						<li>
							<a href="<?php echo base_url('')?>">Vi</a>
						</li>
					</ul>
				</div>

				<div class="right col-sm-3 item">
					<ul>
						<li>
							<a href="" target="_blank">
								<i class="fab fa-facebook-square"></i>
							</a>
						</li>
						<li>
							<a href="" target="_blank">
								<i class="fab fa-twitter-square"></i>
							</a>
						</li>
						<li>
							<a href="" target="_blank">
								<i class="fab fa-instagram"></i>
							</a>
						</li>
						<li>
							<a href="" target="_blank">
								<i class="fab fa-youtube-square"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="right item">
			<div class="content">

			</div>
		</div>
	</nav>
</header>
