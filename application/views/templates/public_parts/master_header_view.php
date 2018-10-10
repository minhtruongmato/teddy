<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<?php if ($this->uri->segment(1) == 'gioi-thieu' && $this->uri->segment(2) != '' && $this->uri->segment(2) != 'danh-sach'): ?>
		<meta name="keywords" content="<?php echo $detail['about_metakeywords'] ?>">
		<meta name="description" content="<?php echo $detail['about_metadescription'] ?>">
	<?php endif ?>

	<?php if ($this->uri->segment(1) == 'bai-viet' && $this->uri->segment(2) == 'chi-tiet'): ?>
		<meta name="keywords" content="<?php echo $detail['post_metakeywords'] ?>">
		<meta name="description" content="<?php echo $detail['post_metadescription'] ?>">
	<?php endif ?>
	
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
					<a href="<?php echo base_url('gioi-thieu/') ?>">
						<h3 class="subtitle-md">
							<?php echo $this->lang->line('about')?>
						</h3>
					</a>
					<ul class="d-none d-sm-block">
						<?php if ($about_menu): ?>
							<?php foreach ($about_menu as $key => $value): ?>
								<li>
									<a href="<?php echo base_url('gioi-thieu/' . $value['slug']) ?>">
										<h2 class="title-md"><?php echo $value['title'] ?></h2>
									</a>
								</li>
							<?php endforeach ?>
						<?php endif ?>
					</ul>
				</div>

				<div class="col item">
					<a href="<?php echo base_url('thuc-don/') ?>">
						<h3 class="subtitle-md">
                            <?php echo $this->lang->line('menu')?>
						</h3>
					</a>
					<ul class="d-none d-sm-block">
						<?php if ($category_menu): ?>
							<?php foreach ($category_menu as $key => $value): ?>
								<li>
									<a href="<?php echo base_url('thuc-don/' . $value['slug']) ?>">
										<h2 class="title-md"><?php echo $value['title'] ?></h2>
									</a>
								</li>
							<?php endforeach ?>
						<?php endif ?>
					</ul>
				</div>

				<div class="col item">
					<a href="<?php echo base_url('bai-viet/') ?>">
						<h3 class="subtitle-md">
                            <?php echo $this->lang->line('blogs')?>
						</h3>
					</a>
					<ul class="d-none d-sm-block">
						<?php if ($blog_menu): ?>
							<?php foreach ($blog_menu as $key => $value): ?>
								<li>
									<a href="<?php echo base_url($value['slug'] . '/danh-sach/') ?>">
										<h2 class="title-md"><?php echo $value['title'] ?></h2>
									</a>
								</li>
							<?php endforeach ?>
						<?php endif ?>
					</ul>
				</div>

				<div class="col item">
					<a href="<?php echo base_url('contact/') ?>">
						<h3 class="subtitle-md">
                            <?php echo $this->lang->line('contact')?>
						</h3>
					</a>
					<ul class="d-none d-sm-block">
						<li>
							<a href="<?php echo base_url('contact/') ?>">
								<h2 class="title-md">
									<?php echo $this->lang->line('contact')?>
								</h2>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('reservations/') ?>">
								<h2 class="title-md">
									<?php echo $this->lang->line('reservations')?>
								</h2>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="row body">
				<div class="col item">
					<p class="paragraph"><?php echo $this->lang->line('location')?></p>
					<p class="paragraph">
						917 Rosenbaum Lodge Apt. 831
					</p>
				</div>

				<div class="col item">
					<p class="paragraph"><?php echo $this->lang->line('reservations')?></p>
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
					<p class="paragraph"><?php echo $this->lang->line('subscribe-us')?></p>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="<?php echo $this->lang->line('form-email')?>">
					<button type="button" class="btn btn-link"><?php echo $this->lang->line('subscribe')?></button>
				</div>
			</div>

			<div class="row foot">
				<div class="left col-sm-9 item">
					<ul>
						<li>
							<a class="active change-language" data-language="en" href="javascript:void(0)">En</a>
						</li>
						<li> / </li>
						<li>
							<a class="change-language" data-language="vi" href="javascript:void(0)">Vi</a>
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
