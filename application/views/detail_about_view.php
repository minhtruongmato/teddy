<section id="about-detail">
    <div class="cover">
        <div class="mask">
            <img src="<?php echo base_url('assets/upload/about/' . $detail['image']) ?>" alt="About Detail Image">
        </div>

        <div class="cover-title">
            <h3 class="subtitle-md"><?php echo $this->lang->line('about') ?></h3>

            <h2 class="title-md"><?php echo $detail['about_title'] ?></h2>
        </div>
    </div>

    <div class="container" id="description">
        <div class="row">
            <div class="col-xs-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2">
                <p class="paragraph">
                    <?php echo $detail['about_description'] ?>
                </p>
            </div>
        </div>
    </div>

    <div class="break-image">
        <div class="mask">
            <img src="https://images.unsplash.com/photo-1428515613728-6b4607e44363?ixlib=rb-0.3.5&s=1a6fe6bf24c48973234ed4323e4455dc&auto=format&fit=crop&w=1950&q=80" alt="About Detail Image">
        </div>
    </div>

    <div class="container">
        <div class="content">
            <article>
                <?php echo $detail['about_content'] ?>
            </article>
        </div>
    </div>

    <div class="recommend container-fluid">
        <div class="container">
            <h2 class="title-md"><?php echo $this->lang->line('recommended') ?></h2>
            <div class="row">
                <?php if ($recommended): ?>
                    <?php foreach ($recommended as $key => $value): ?>
                        <div class="item col-xs-12 col-sm-6">
                            <h3 class="subtitle-md"><?php echo $this->lang->line('about') ?></h3>

                            <a href="<?php echo base_url('gioi-thieu/' . $value['slug'])?>">
                                <h2 class="title-md"><?php echo $value['about_title'] ?></h2>
                            </a>

                            <p class="paragraph text-wrapper"><?php echo $value['about_description'] ?></p>

                            <a href="<?php echo base_url('gioi-thieu/' . $value['slug'])?>"><?php echo $this->lang->line('read-more') ?></a>

                            <div class="mask">
                                <a href="<?php echo base_url('gioi-thieu/' . $value['slug'])?>">
                                    <img src="<?php echo base_url('assets/upload/about/' . $value['image']) ?>" alt="post image">
                                </a>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>