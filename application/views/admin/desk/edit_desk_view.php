<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cập nhật
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-default">
                    <div class="box-body">
                        <?php
                        echo form_open_multipart('', array('class' => 'form-horizontal'));
                        ?>
                        <div class="col-xs-12">
                            <h4 class="box-title">Basic Information</h4>
                        </div>
                        <div class="row">
                            <span><?php echo $this->session->flashdata('message'); ?></span>
                        </div>
                        <div class="form-group col-xs-12">
                            <div class="form-group col-xs-12">
                                <?php
                                echo form_label('Slug', 'slug_shared');
                                echo form_error('slug_shared');
                                echo form_input('slug_shared', $detail['slug'], 'class="form-control" id="slug_shared" readonly');
                                ?>
                            </div>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                            echo form_label('Danh mục', 'floor_id');
                            echo form_error('floor_id');
                            echo form_dropdown('floor_id', $floor, $detail['floor_id'], 'class="form-control"');
                            ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                                echo form_label("Title", "title");
                                echo form_error("title");
                                echo form_input("title", trim($detail['title']), 'class="form-control" id="title_vi"');
                              
                            ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                                echo form_label("Slot", "slot");
                                echo form_error("slot");
                                echo form_input("slot", $detail['slot'], 'class="form-control"');
                            ?>
                        </div>
                        <!-- <div class="form-group col-xs-12">
                            <?php
                                echo form_label("Status", "status");
                                echo form_error("status");
                                echo form_input("status", $detail['status'], 'class="form-control"');
                            ?>
                        </div> -->
                        <?php echo form_submit('submit_shared', 'OK', 'class="btn btn-primary"'); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin/script.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/admin/common.js') ?>"></script>

