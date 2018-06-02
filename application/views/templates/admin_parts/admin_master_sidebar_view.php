<?php
if($this->ion_auth->logged_in()) {
?>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo site_url('assets/lib/dist/img/user.jpg') ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>
                        <?php 
                            if ($this->ion_auth->logged_in()) {
                                echo $this->ion_auth->user()->row()->first_name.' '.$this->ion_auth->user()->row()->last_name;
                            }
                        ?> 
                    </p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="<?php echo base_url('admin') ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="treeview post" style="border-bottom: none;">
                    <a href="">
                        <i class="fa fa-bars"></i>
                        <span>Quản lý bài viết</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo base_url('admin/post_category') ?>"><i class="fa fa-inbox"></i> <span>Danh Mục Bài Viết</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/post') ?>"><i class="fa fa-envelope-o"></i> <span>Bài Viết</span></a>
                        </li>
                    </ul>
                </li>
                <li class="treeview product">
                    <a href="">
                        <i class="fa fa-bars"></i>
                        <span>Quản lý thực đơn</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?php echo base_url('admin/product_category') ?>"><i class="fa fa-inbox"></i> <span>Danh Mục Thực Đơn</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/product') ?>"><i class="fa fa-envelope-o"></i> <span>Thực Đơn</span></a>
                        </li>
                    </ul>
                </li>
             <!--    <li class="treeview floor">
                 <a href="">
                     <i class="fa fa-bars"></i>
                     <span>Quản lý bàn</span>
                     <span class="pull-right-container">
                         <i class="fa fa-angle-left pull-right"></i>
                     </span>
                 </a>
                 <ul class="treeview-menu">
                     <li>
                         <a href="<?php echo base_url('admin/floor') ?>"><i class="fa fa-inbox"></i> <span>Tầng</span></a>
                     </li>
                     <li>
                         <a href="<?php echo base_url('admin/desk') ?>"><i class="fa fa-envelope-o"></i> <span>Bàn</span></a>
                     </li>
                 </ul>
             </li> -->
                <li class="treeview set_desk">
                    <a href="">
                        <i class="fa fa-bars"></i>
                        <span>Đặt Bàn</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo base_url('admin/set_desk/status/1') ?>"><i class="fa fa-retweet"></i> Đơn Đặt Bàn</a></li>
                       <li><a href="<?php echo base_url('admin/set_desk/status/2') ?>"><i class="fa fa-check"></i> Đã Xác Nhận</a></li>
                       <!-- <li><a href="<?php echo base_url('admin/set_desk/status/3') ?>"><i class="fa fa-check"></i> Đã Hoàn Thành</a></li> -->
                        <li><a href="<?php echo base_url('admin/set_desk/status/0') ?>"><i class="fa fa-times"></i> Đơn Đã Hủy</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/banner') ?>">
                        <i class="fa fa-inbox"></i> <span>Quản lý banner</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/menu') ?>">
                        <i class="fa fa-envelope-o"></i> <span>Menu</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/client_gmail') ?>">
                        <i class="fa fa-inbox"></i> <span>Mail đăng kí nhận thông tin</span>
                    </a>
                </li>
                <li class="header">DOCUMENTATION</li>
                <li>
                    <a href="<?php echo base_url('admin/user/change_password') ?>">
                        <i class="fa fa-refresh" aria-hidden="true"></i> <span>Đổi Mật Khẩu</span>
                    </a>
                </li>
                <?php if ($this->ion_auth->is_admin()===TRUE): ?>
                    <li>
                        <a href="<?php echo base_url('admin/user/register') ?>">
                            <i class="fa fa-registered" aria-hidden="true"></i> <span>Tạo tài khoản</span>
                        </a>
                    </li>
                <?php endif ?>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
<?php } ?>



