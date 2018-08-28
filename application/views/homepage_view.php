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
				<div class="carousel-item active">
					<div class="mask">
						<img src="https://images.unsplash.com/photo-1517800140676-e7e8312bc02d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=47c418801cb73d527f38c481b73e9733&auto=format&fit=crop&w=1350&q=80" alt="First slide">
					</div>
					<div class="caption">
						<h3 class="subtitle-md">Special Recipe</h3>

						<h2 class="title-md text-wrapper">Steak with Wine Steak with Wine Steak with Wine Steak with Wine Steak with Wine Steak with Wine Steak with Wine Steak with Wine Steak with Wine Steak with Wine Steak with Wine</h2>

						<a href="<?php echo base_url('') ?>" class="btn btn-primary" role="button">
							View Detail
						</a>
					</div>
				</div>
				<div class="carousel-item">
					<div class="mask">
						<img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=67fb2e7b1fbe39b18b51146234ef38aa&auto=format&fit=crop&w=1350&q=80" alt="Second slide">
					</div>
					<div class="caption">
						<h3 class="subtitle-md">Special Recipe</h3>

						<h2 class="title-md text-wrapper">Steak with Peanut</h2>

						<a href="<?php echo base_url('') ?>" class="btn btn-primary" role="button">
							View Detail
						</a>
					</div>
				</div>

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
			Book now
		</a>
	</div>
</section>

