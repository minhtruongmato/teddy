<section id="about">
    <div class="background"></div>
    <div class="container-fluid">
        <div class="row">
            <?php foreach ($result as $key => $value): ?>
                <div class="item col">
                    <a href="<?php echo base_url('gioi-thieu/' .$value['slug'])?>">
                        <div class="mask">
                            <img src="<?php echo base_url('assets/upload/about/' . $value['image']) ?>" alt="<?php echo $value['slug'] ?>">

                            <div class="cover-title">
                                <h1 class="title-lg"><?php echo $value['title'] ?></h1>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>