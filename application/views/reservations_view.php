<section id="reservations">
    <div class="container">
        <div class="row head">
            <div class="col-xs-12 col-sm-6 offset-sm-6 right">
                <h3 class="subtitle-md">
                    <?php echo $this->lang->line('reservations') ?>
				</h3>

                <h2 class="title-md">
					<?php echo $this->lang->line('reservations-title') ?>
				</h2>

                <p class="paragraph">
                    <?php echo $this->lang->line('reservations-description') ?>
                </p>

                <p class="paragraph">
                    <?php echo $this->lang->line('reservations-note') ?>
                </p>

                <div class="row">
                    <div class="item col-xs-12 col-sm-6">
                        <p class="paragraph">Location</p>
                        <p class="paragraph">
                            917 Rosenbaum Lodge Apt. 831
                        </p>
                    </div>

                    <div class="item col-xs-12 col-sm-6">
                        <p class="paragraph">Location</p>
                        <p class="paragraph">
                            917 Rosenbaum Lodge Apt. 831
                        </p>
                    </div>
                </div>
                <div class="row body">
                    <?php
                    echo form_open_multipart('homepage/get_data_to_send_mail', array('class' => 'form-horizontal'));
                    ?>

                    <div class="form-group col-xs-12 col-sm-12">
                        <?php
                        echo form_error('contact_name');
                        echo form_input('contact_name', set_value('contact_name'), 'class="form-control" id="contact_name" placeholder="' . $this->lang->line('form-name') . '"');
                        ?>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12">
                        <?php
                        echo form_error('contact_mail');
                        echo form_input('contact_mail', set_value('contact_mail'), 'class="form-control" id="contact_mail" placeholder="' . $this->lang->line('form-email') . '"');
                        ?>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12">
                        <?php
                        echo form_error('contact_phone');
                        echo form_input('contact_phone', set_value('contact_phone'), 'class="form-control" id="contact_phone" placeholder="' . $this->lang->line('form-phone') . '"');
                        ?>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12">
                        <?php
                        echo form_error('contact_address');
                        echo form_input('contact_address', set_value('contact_address'), 'class="form-control" id="contact_address" placeholder="' . $this->lang->line('form-address') . '"');
                        ?>
                    </div>

                    <div class="form-group col-xs-12 col-sm-12">
                        <?php
                        echo form_error('contact_message');
                        echo form_textarea('contact_message', set_value('contact_message'), 'class="form-control" id="contact_message" placeholder="' . $this->lang->line('form-message') . '"');
                        ?>
                    </div>

                    <div class="col-xs-12 col-sm-12">
                        <?php echo form_submit('submit', $this->lang->line('send'), 'class="btn btn-primary"'); ?>
                    </div>
                    <?php echo form_close(); ?>
                </div>

            </div>
        </div>
    </div>

    <div class="cover d-none d-sm-block">
        <div class="mask">
            <img src="https://images.unsplash.com/photo-1520218576172-c1a2df3fa5fc?ixlib=rb-0.3.5&s=0a0cd3b2d02209eb9efb15325386d4c8&auto=format&fit=crop&w=675&q=80" alt="contact cover image">
        </div>
    </div>

    <div id="side-title">
        <h1 class="title-xlg">Reservations</h1>
    </div>
</section>