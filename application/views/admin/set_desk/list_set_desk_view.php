<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php if ($this->session->flashdata('message_error')): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    <?php echo $this->session->flashdata('message_error'); ?>
                </div>
            <?php endif ?>
            <?php if ($this->session->flashdata('message_success')): ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    <?php echo $this->session->flashdata('message_success'); ?>
                </div>
            <?php endif ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash() ?>" id="csrf" />
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                            Danh Mục
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo base_url('admin/'.$controller.'/create') ?>" class="btn btn-primary" role="button">Thêm mới</a>
                        </div>
                        <div class="col-md-12" style="padding-top:10px;">
                            <form action="<?php echo base_url('admin/'.$controller.'/status/').$this->uri->segment(4); ?>" method="get">
                                <div class="input-group col-md-6" style="float: left;border-right: 5px solid white;">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" value="<?php echo (isset($date))? $date : '';  ?>" class="form-control pull-right" id="reservation" name="date" readonly>
                                </div>

                                <div class="input-group col-md-6" style="float: left;">
                                    <input type="text" value="<?php echo (isset($keyword))? $keyword : '';  ?>" class="form-control" placeholder="Tìm kiếm ..." name="search" value="">
                                    <span class="input-group-btn">
                                        <input type="submit" class="btn btn-block btn-primary" value="Tìm kiếm">
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="table-responsive">
                            <table id="table" class="table table_product">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Slot</th>
                                    <th>Time</th>
                                    <th>Detail</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(isset($result) && $result): ?>
                                <?php $n = 1; ?>
                                <?php foreach ($result as $key => $value): ?>
                                    <tr class="status_<?php echo $value['id'] ?>">
                                        <td><?php echo $n++ ?></td>
                                        <td><?php echo $value['name'] ?></td>
                                        <td><?php echo $value['email'] ?></td>
                                        <td><?php echo $value['phone'] ?></td>
                                        <td><?php echo $value['slot'] ?></td>
                                        <td>
                                            <p><?php echo date_format(date_create($value['time']),"d/m/Y H:i:s") ?></p>
                                            <input type="text" name="" placeholder="Ngày" class="form-control display" id="date" style="width: 30%;display: none;">
                                            <select class="form-control display" style="width: 30%;display: none;" id="hour">
                                                <option selected value="08">Chọn Giờ</option>
                                                <?php 
                                                for($i=8;$i<=23;$i++){
                                                    echo '<option>'.$i.'</option>';
                                                }
                                                ?>
                                            </select>
                                            <select class="form-control display" style="width: 30%;display: none;" id="min">
                                                <option selected value="00">Chọn Phút</option>
                                                <option>00</option>
                                                <option>15</option>
                                                <option>30</option>
                                                <option>45</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('admin/'.$controller.'/detail/'.$value['id']) ?>"
                                                class="btn btn-default btn-xs" type="button" data-toggle="collapse" data-target="#collapse_1" aria-expanded="false" aria-controls="collapse_1">See Detail
                                            </a>
                                        </td>
                                        <td>
                                        <?php if($value['status'] == 1 ): ?>
                                            <button data-status="error"  data-controller="<?php echo $controller; ?>" data-id="<?php echo $value['id'] ?>" class="btn btn-danger btn-xs" role="button">Hủy đơn</button>
                                        <?php else: ?>
                                            <a class="btn btn-success btn-xs">Đã hủy</a>
                                        <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Slot</th>
                                        <th>Time</th>
                                        <th>Detail</th>
                                        <th>Status</th>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        Chưa có Event
                                    </tr>
                                <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 col-md-offset-5 page">
                            <?php echo (isset($page_links))? $page_links : ''; ?>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>