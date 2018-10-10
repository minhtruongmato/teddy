<section id="blogs-detail">
    <div class="cover">
        <div class="mask">
            <img src="<?php echo base_url('assets/upload/post/' . $detail['image']) ?>" alt="<?php echo $detail['slug'] ?>">
        </div>

        <div class="cover-title">
            <h3 class="subtitle-md"><?php echo $category ? $category['post_category_title'] : '' ?></h3>

            <h2 class="title-md"><?php echo $detail['post_title'] ?></h2>
        </div>
    </div>

    <div class="container-fluid" id="description">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2">
					<p class="paragraph">
						<?php echo $detail['post_description'] ?>
					</p>
				</div>
			</div>
		</div>
    </div>

    <div class="container">
        <div class="content">
            <article>
                <?php echo $detail['post_content'] ?>
            </article>
        </div>
    </div>

	<div class="recommend container-fluid">
		<div class="container">
			<h2 class="title-md">
                <?php echo $this->lang->line('recommended') ?>
			</h2>
			<div class="row">
                <?php if ($recommended): ?>
                    <?php foreach ($recommended as $key => $value): ?>
                        <div class="item col-xs-12 col-sm-6">
                            <h3 class="subtitle-md"><?php echo $category ? $category['post_category_title'] : '' ?></h3>

                            <a href="<?php echo base_url('bai-viet/chi-tiet/' . $value['slug'])?>">
                                <h2 class="title-md"><?php echo $value['post_title'] ?></h2>
                            </a>

                            <p class="paragraph text-wrapper"><?php echo $value['post_description'] ?></p>

                            <a href="<?php echo base_url('bai-viet/chi-tiet/' . $value['slug'])?>"><?php echo $this->lang->line('read-more') ?></a>

                            <div class="mask">
                                <a href="<?php echo base_url('bai-viet/chi-tiet/' . $value['slug'])?>">
                                    <img src="<?php echo base_url('assets/upload/post/' . $value['image']) ?>" alt="<?php echo $value['slug'] ?>">
                                </a>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php else: ?>
                    <div class="item col-xs-12 col-sm-6">
                        Không có bài viết liên quan!
                    </div>
                <?php endif ?>

			</div>
		</div>
	</div>
</section>