<link rel="stylesheet" href="<?php echo site_url('assets/sass/admin/') ?>detail.css">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi tiết
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Chi tiết</a></li>
            <li class="active">
                Danh Mục
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Chi tiết</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="detail-info col-md-12">
                                <div class="table-responsive">
                                    <label>Thông tin</label>
                                    <table class="table table-striped">
                                        <tr>
                                            <th colspan="2">Thông tin cơ bản</th>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td><?php echo $detail['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo $detail['email'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td><?php echo $detail['phone'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Slot</th>
                                            <td><?php echo $detail['slot'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Time</th>
                                            <td><?php echo date_format(date_create($detail['time']),"d/m/Y H:i:s") ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <?php if($detail['status'] == 2): ?>
                                                <td>Success</td>
                                            <?php elseif($detail['status'] == 1): ?>
                                                <td>Waiting</td>
                                            <?php else: ?>
                                                <td>Error</td>
                                            <?php endif ?>
                                            <!-- <?php if ($detail['status'] == 3): ?>
                                                <td>Success</td>
                                            <?php elseif($detail['status'] == 2): ?>
                                                <td>Usage</td>
                                            <?php elseif($detail['status'] == 1): ?>
                                                <td>Waiting</td>
                                            <?php else: ?>
                                                <td>Error</td>
                                            <?php endif ?> -->
                                        </tr>

                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>