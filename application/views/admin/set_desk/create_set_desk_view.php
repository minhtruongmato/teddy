<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php if ($this->session->flashdata('message_error')): ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                        <?php echo $this->session->flashdata('message_error'); ?>
                    </div>
                <?php endif ?>
                <div class="box box-default">
                    <div class="box-body"  id="create_date_time">
                        <?php
                        echo form_open_multipart('', array('class' => 'form-horizontal'));
                        ?>
                        <div class="col-xs-12">
                            <h4 class="box-title">Thông tin cơ bản</h4>
                        </div>
                        <div class="row">
                            <span><?php echo $this->session->flashdata('message'); ?></span>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                                echo form_label("Name", "name");
                                echo form_error("name");
                                echo form_input("name", set_value("name"), 'class="form-control"');
                            ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                                echo form_label("Email", "email");
                                echo form_error("email");
                                echo form_input("email", set_value("email"), 'class="form-control"');
                            ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                                echo form_label("Phone", "phone");
                                echo form_error("phone");
                                echo form_input("phone", set_value("phone"), 'class="form-control"');
                            ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php
                                echo form_label("Slot", "slot");
                                echo form_error("slot");
                                echo form_input("slot", set_value("slot"), 'class="form-control"');
                            ?>
                        </div>
                        <div class="form-group col-xs-12">
                            <?php 
                                echo form_label("Time", "time", 'class="col-xs-12" style="padding:0px;"');
                                echo form_error("time");
                            ?>
                            
                            <input type="text" name="date" placeholder="Ngày" class="form-control display col-xs-4" id="date" style="width: 33.3%;" readonly>
                            <select class="form-control display col-xs-4" name="hour" style="width: 33.3%; " id="hour" disabled>
                                <option selected value="0">Chọn Giờ</option>
                                <?php 
                                    for($i=8;$i<=23;$i++){
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                ?>
                            </select>
                            <select class="form-control display col-xs-4" name="min" style="width: 33.3%;" id="min" disabled>
                                <option selected value="0">Chọn Phút</option>
                                <option value="00">00</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="45">45</option>
                            </select>
                        </div>
                        <?php echo form_submit('submit_shared', 'OK', 'class="btn btn-primary" id="submit_date"'); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- pikday create order desk -->

