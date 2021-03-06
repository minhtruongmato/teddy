<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách
            <small>
                Bài Viết Giới Thiệu
            </small>
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
                            Bài Viết Giới Thiệu
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo base_url('admin/about/create') ?>" class="btn btn-primary" role="button">Thêm mới</a>
                        </div>
                        <div class="col-md-6">
                            <form action="<?php echo base_url('admin/about/index') ?>" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Tìm kiếm ..." name="search" value="">
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
                            <?php if ($result): ?>
                                <table id="table" class="table table_product">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Hình ảnh</th>
                                        <th>Tiêu đề</th>
                                        <th>Detail</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result as $key => $value): ?>
                                            <tr class="remove_<?php  ?>">
                                                <td><?php echo $key + 1 ?></td>
                                                <td>
                                                    <div class="mask_sm">
                                                        <img src="<?php echo base_url('assets/upload/about/' . $value['image']) ?>" width=150px>
                                                    </div>
                                                </td>
                                                <td><?php echo $value['title'] ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/about/detail/' . $value['id']) ?>" >
                                                    <button class="btn btn-default btn-sm" type="button" data-toggle="collapse" data-target="#collapse_1" aria-expanded="false" aria-controls="collapse_1">See Detail</button>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url('admin/about/edit/' . $value['id']) ?>" class="dataActionEdit"><i class="fa fa-pencil" aria-hidden="true"></i> </a>
                                                    <a href="javascript:void(0);" onclick="" class="dataActionDelete"><i class="fa fa-remove" aria-hidden="true"></i> </a>
                                                </td>

                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Hình ảnh</th>
                                        <th>Tiêu đề</th>
                                        <th>Detail</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            <?php else: ?>
                                Chưa tồn tại bài viết!
                            <?php endif ?>
                        </div>
                        <div class="col-md-6 col-md-offset-5 page">
                            <?php echo $page_links ?>
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
