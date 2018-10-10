<section id="blogs">
    <div class="cover">
        <div class="mask">
            <img src="https://images.unsplash.com/photo-1428515613728-6b4607e44363?ixlib=rb-0.3.5&s=1a6fe6bf24c48973234ed4323e4455dc&auto=format&fit=crop&w=1950&q=80" alt="About Detail Image">
        </div>

        <div class="cover-title">
            <h3 class="subtitle-md"><?php echo $this->lang->line('blogs') ?></h3>

            <h2 class="title-md">
                <?php echo $this->lang->line('blogs-title') ?>
			</h2>

            <p class="paragraph">
                <?php echo $this->lang->line('blogs-description') ?>
            </p>
        </div>
    </div>

    <div class="container" id="blogs-list">
        <div class="row">
            <div class="left col-xs-12 col-sm-8 col-md-9">
                <div class="row">
                    <?php foreach ($blogs as $key => $value): ?>
                        <div class="item col-xs-12 col-lg-6">
                            <div class="inner">

                                <div class="badge news"><?php echo $value['post_category_title'] ?></div>

                                <a href="<?php echo base_url('bai-viet/chi-tiet/' . $value['slug'])?>">
                                    <h2 class="heading-post text-wrapper"><?php echo $value['title'] ?></h2>
                                </a>

                                <p class="paragraph text-wrapper">
                                    <?php echo $value['description'] ?>
                                </p>

                                <a href="<?php echo base_url('bai-viet/chi-tiet/' . $value['slug'])?>">
                                    <?php echo $this->lang->line('read-more') ?>
                                </a>

                                <div class="mask news">
                                    <a href="<?php echo base_url('bai-viet/chi-tiet/' . $value['slug'])?>">
                                        <img src="<?php echo base_url('assets/upload/post/' . $value['image']) ?>" alt="post image">
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div>
                    <?php echo $page_links ?>
                </div>
            </div>

            <div class="right col-xs-12 col-sm-4 col-md-3">
                <h2 class="title-md">Categories</h2>
                <ul>
                    <?php foreach ($categories as $key => $value): ?>
                        <li>
                            <a href="<?php echo base_url($value['slug'] .'/danh-sach/') ?>">
                                <?php echo $value['title'] ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</section>