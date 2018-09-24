<section id="menu">
    <div class="background"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="left col-xs-12 col-lg-3">
                <div class="row align-items-end">
                    <div class="col-xs-12 col-sm-8 offset-sm-4">
                        <h3 class="subtitle-md">Menu</h3>

                        <h2 class="title-md text-wrapper">Menu List</h2>
                    </div>
                </div>
            </div>

            <div class="right col-xs-12 col-lg-9">
                <div class="row">
					<div class="left col-xs-12 col-lg-8">
						<?php
							foreach ($result as $key => $value):
							if ($key < 2 ):
						?>
							<div class="item">
								<div class="mask">
									<a href="<?php echo base_url('thuc-don/'. $value['slug']) ?>">
										<img src="<?php echo base_url('assets/upload/product_category/'. $value['slug'] .'/'. $value['image']) ?>">
										<div class="cover-title">
											<h1 class="title-lg"><?php echo $value['title'] ?></h1>
										</div>
									</a>
								</div>
							</div>
						<?php
							endif;
							endforeach;
						?>
					</div>
					<div class=" right col-xs-12 col-lg-4">
						<?php
							foreach ($result as $key => $value):
							if ($key >= 2 ):
						?>
							<div class="item">
								<div class="mask">
									<a href="<?php echo base_url('thuc-don/'. $value['slug']) ?>">
										<img src="<?php echo base_url('assets/upload/product_category/'. $value['slug'] .'/'. $value['image']) ?>">
										<div class="cover-title">
											<h1 class="title-lg"><?php echo $value['title'] ?></h1>
										</div>
									</a>
								</div>
							</div>
						<?php
							endif;
							endforeach;
						?>
					</div>
                </div>
            </div>
        </div>
    </div>
</section>