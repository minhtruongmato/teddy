<section id="about">
    <div class="background"></div>
    <div class="container-fluid">
        <div class="row">
            <?php
                $value = array(
                    ['https://images.unsplash.com/photo-1428515613728-6b4607e44363?ixlib=rb-0.3.5&s=1a6fe6bf24c48973234ed4323e4455dc&auto=format&fit=crop&w=1350&q=80' , 'The story of us'],
                    ['https://images.unsplash.com/photo-1468071174046-657d9d351a40?ixlib=rb-0.3.5&s=ba7023d8300e46c64ac7e6793a21a6bd&auto=format&fit=crop&w=1266&q=80' , 'Our Food'],
                    ['https://images.unsplash.com/photo-1520209268518-aec60b8bb5ca?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=b2b04f771779f9ce281cb3e6035f360e&auto=format&fit=crop&w=1168&q=80' , 'Our Place']
                );
            ?>
            <?php for($i = 0; $i < count($value); $i++){ ?>
            <div class="item col">
                <a href="<?php echo base_url('about/detail')?>">
                    <div class="mask">
                        <img src="<?php echo $value[$i][0] ?>" alt="image about">

                        <div class="cover-title">
                            <h1 class="title-lg"><?php echo $value[$i][1] ?></h1>
                        </div>
                    </div>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>