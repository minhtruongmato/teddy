<style>
	footer{
		display: none;
	}
</style>
<section id="homepage">
	<div class="container-fluid">
		<div id="homepageSlider" class="carousel slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner">
				<div class="background"></div>
				<?php
					foreach ($result as $key => $value):
					$image = json_decode($value['image']);
				?>
					<div class="carousel-item <?php echo ($key == 0)? 'active' : '' ?>">
						<div class="mask">
							<img src="<?php echo base_url('assets/upload/product/' . $value['slug'] .'/'. $image[0]) ?>" alt="First slide">
						</div>
						<div class="caption">
							<h3 class="subtitle-md"><?php echo $value['product_category_title'] ?></h3>

							<h2 class="title-md text-wrapper"><?php echo $value['description'] ?></h2>

							<a href="<?php echo base_url('menu/danh-sach/'. $value['slug']) ?>" class="btn btn-primary" role="button">
								<?php echo $this->lang->line('view-detail') ?>
							</a>
						</div>
					</div>
				<?php endforeach ?>

				<div class="carousel-extra">
					<div class="controllers item">
						<a href="#homepageSlider" data-slide="prev">Prev</a>
						/
						<a href="#homepageSlider" data-slide="next">Next</a>

					</div>

					<div class="hotline item">
						Hotline: <a href="tel:(84)12345678">(84) 1234 5678</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="reservation">
		<h3 class="subtitle-md">reservation</h3>

		<h2 class="title-md">Get 5% off when booking online</h2>

		<a href="<?php echo base_url('reservations/') ?>" class="btn btn-primary" role="button">
            <?php echo $this->lang->line('booking-now') ?>
		</a>
	</div>
</section>

