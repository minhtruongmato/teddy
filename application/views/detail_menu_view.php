<section id="menu-detail">
    <div class="cover">
        <div id="leftImage">
            <div class="mask">
                <img src="<?php echo base_url('assets/upload/product_category/'. $category['slug'] .'/'. $category['image']) ?>" alt="<?php echo $category['slug'] ?>">

                <div class="overlay"></div>
            </div>
        </div>

        <div id="mainImage">
            <div class="mask">
                <img src="<?php echo base_url('assets/upload/product_category/'. $category['slug'] .'/'. $category['image']) ?>" alt="<?php echo $category['slug'] ?>">

                <div class="cover-title">
                    <h1 class="title-lg"><?php echo $category['product_category_title'] ?></h1>
                </div>
            </div>
        </div>

        <div id="side-title">
            <h1 class="title-xlg"><?php echo $category['product_category_title'] ?></h1>
        </div>
    </div>

	<div class="container-fluid" id="description">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2">
					<p class="paragraph">
						<?php echo $category['product_category_description'] ?>
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container" id="menu-list">
		<h2 class="title-md"><?php echo $category['product_category_title'] ?> Menu</h2>
		<div class="row">
			<?php if ($products != null): ?>
				<?php foreach ($products as $key => $value): ?>
					<div class="item col-xs-12 col-lg-6">
						<div class="inner">
							<h3 class="subtitle-md"><?php echo $category['product_category_title'] ?></h3>

							<h2 class="title-md text-wrapper"><?php echo $value['product_title'] ?></h2>

							<h2 class="title-md"><?php echo ($value['price'] > 0) ? number_format($value['price'] - $value['discount']) . ' VND' : 'Liên Hệ' ?></h2>

							<p class="paragraph text-wrapper"><?php echo $value['product_description'] ?></p>

							<div class="mask">
								<img src="<?php echo base_url('assets/upload/product/'. $value['slug'] .'/'. $value['avatar']) ?>" alt="post image">
							</div>
						</div>
					</div>
				<?php endforeach ?>
			<?php else: ?>
				<div class="item col-xs-12 col-lg-6">Chưa có thực đơn cho Menu này</div>
			<?php endif ?>
			
		</div>
	</div>
</section>