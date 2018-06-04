<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    /*.numberlist{*/
    /*width:450px;*/
    /*}*/
    .numberlist ol{
        counter-reset: li;
        list-style: none;
        *list-style: decimal;
        font: 15px 'trebuchet MS', 'lucida sans';
        padding: 0;
        margin-bottom: 4em;
    }
    .numberlist ol ol{
        margin: 0 0 0 2em;
    }

    .numberlist a{
        width: 80%;
        position: relative;
        display: inline-block;
        padding: .4em .4em .4em 2em;
        *padding: .4em;
        margin: .5em 0;
        background: #FFF;
        color: #444;
        text-decoration: none;
        -moz-border-radius: .3em;
        -webkit-border-radius: .3em;
        border-radius: .3em;
        text-decoration: none;
    }

    .numberlist a:hover{
        background: #cbe7f8;
        text-decoration:none;
    }
    .numberlist a:before{
        content: counter(li);
        counter-increment: li;
        position: absolute;
        left: -1.3em;
        top: 57%;
        margin-top: -1.3em;
        background: #87ceeb;
        height: 2.4em;
        width: 2.4em;
        line-height: 2em;
        border: .3em solid #fff;
        text-align: center;
        font-weight: bold;
        -moz-border-radius: 2em;
        -webkit-border-radius: 2em;
        border-radius: 2em;
        color:#FFF;
    }

     .error{
         color: red;
     }

</style>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <?php if ($this->session->flashdata('message_error')): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    <?php echo $this->session->flashdata('message_error'); ?>
                </div>
            <?php endif ?>
            <h2>Chỉnh sửa menu <span><?php echo $detail['title_vi']; ?></span></h2>
            <div class="modified-mode">
                <div class="col-lg-10 col-lg-offset-0">
                    <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'menu-form'));
                    ?>
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <?php $i = 0; ?>
                        <?php foreach ($page_languages as $key => $value): ?>
                            <li role="presentation" class="<?php echo ($i == 0)? 'active' : '' ?>">
                                <a href="#<?php echo $key ?>" aria-controls="<?php echo $key ?>" role="tab" data-toggle="tab">
                                    <span class="badge"><?php echo $i + 1 ?></span> <?php echo $value ?>
                                </a>
                            </li>
                            <?php $i++; ?>
                        <?php endforeach ?>
                    </ul>

                    <hr>
                    <div class="tab-content">
                        <?php $i = 0; ?>
                        <?php foreach ($template as $key => $value): ?>
                            <div role="tabpanel" class="form-group tab-pane <?php echo ($i == 0)? 'active' : '' ?>" id="<?php echo $key ?>">
                                <?php foreach ($value as $k => $val): ?>
                                    <div class="form-group col-xs-12">
                                        <?php
                                        if($k == 'title' && in_array($k, $request_language_template)){
                                            echo form_label($val, $k .'_'. $key);
                                            echo form_error($k .'_'. $key);
                                            echo form_input($k .'_'. $key, $detail['title_'. $key], 'class="form-control" id="title_'.$key.'"');
                                        }elseif($k == 'description' && in_array($k, $request_language_template)){
                                            echo form_label($val, $k .'_'. $key);
                                            echo form_error($k .'_'. $key);
                                            echo form_textarea($k .'_'. $key, $detail['description_'. $key], 'class="form-control" rows="5"');
                                        }elseif($k == 'content' && in_array($k, $request_language_template)){
                                            echo form_label($val, $k .'_'. $key);
                                            echo form_error($k .'_'. $key);
                                            echo form_textarea($k .'_'. $key, $detail['content_'. $key], 'class="tinymce-area form-control" rows="5"');
                                        }
                                        ?>
                                    </div>
                                <?php endforeach ?>
                            </div>
                            <?php $i++; ?>
                        <?php endforeach ?>
                    </div>
                    <?php if($count_sub == 0): ?>
                    <hr class="form-group" style="border: solid 0.5px lightgrey">
                    <h3 class="form-group">Dựng đường dẫn cho menu</h3>
                    <input type="hidden" name="slug_post" value="<?php echo $detail['slug_post'] ?>" id="slug_post">
                    <?php if($detail['slug'] != 'trang-chu' && $detail['slug'] != 'lien-he'&& $detail['slug'] != 'thuc-don'): ?>
                    <div class="form-group sub-cat">
                        <?php
                        echo form_label('Chọn menu chính (hoặc Bài viết riêng nếu là bài viết lẻ)', 'select_main');
                        echo form_error('select_main');
                        ?>
                        <select name="selectMain_shared" class="form-control" id="select_main">
                            <option value="">Chọn danh mục</option>
                            <?php build_new_category($main_category, 0, '', $detail['slug']) ?>
                        </select>
                    </div>
                    <div class="form-group sub-cat">
                        <?php
                        echo form_label('Chọn bài viết (nếu không chọn, menu sẽ trỏ đến danh sách bài viết trong danh mục phía trên)', 'selectArticle_shared');
                        echo form_error('selectArticle_shared');
                        echo form_dropdown('selectArticle_shared', $posts, set_value('selectArticle_shared', $detail['slug_post']), 'class="form-control" id="select_article"');
                        ?>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <?php
                        echo form_label('Đường dẫn hoàn chỉnh của menu', 'url_shared');
                        echo form_error('url_shared');
                        echo form_input('url_shared', $detail['url'], 'class="form-control" id="url" readonly="readonly"');
                        ?>
                    </div>
                    <hr class="form-group" style="border: solid 0.5px lightgrey">
                    <?php endif; ?>
                    <div class="form-group picture sub-cat">
                        <?php
                        echo form_label('Bật / Tắt menu', 'isActived_shared');
                        echo form_error('isActived_shared');
                        echo form_dropdown('isActived_shared', array('0' => 'Bật', '1' => 'Tắt'), set_value('isActived_shared', $detail['is_activated']), 'class="form-control" id="is_actived"');
                        ?>
                    </div>
                    <br>
                    <div class="form-group col-sm-12 text-right">
                        <?php
                        echo form_submit('submit', 'OK', 'class="btn btn-primary"');
                        echo form_close();
                        ?>
                        <a class="btn btn-default cancel" href="javascript:window.history.go(-1);">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if($detail['slug'] != 'trang-chu' && $detail['slug'] != 'lien-he' && $detail['slug'] != 'thuc-don'): ?>
    <section class="content row">
        <div class="container col-md-12 numberlist">
                <h2>Danh sách menu con trong menu
                    <span><?php echo $detail['title_vi']; ?></span>
                    &nbsp&nbsp&nbsp&nbsp
                    <button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url('admin/menu/create/' . $detail['id']); ?>'">
                        <span class="glyphicon glyphicon-plus"></span>
                     menu con</button>
                </h2>
                <h5 style="color:darkorange">Nếu có menu con đang được bật, menu chính bên trên không thể gán đường dẫn trực tiếp</h5>
            <div class="col-lg-10 col-lg-offset-0">
                <ol id="sub-sortable">
                    <?php
                    if (!empty($subs)):
                        foreach ($subs as $key => $item):
                            ?>
                            <li class="treeview remove_<?php echo $item['id'] ?>" id="<?php echo ($key + 1) . '-' . $item['id'] ?>">
                                <strong class="col-md-9"><a " href="<?php echo base_url('admin/menu/edit/' . $item['id']) ?>"><?php echo $item['title'] ?></a></strong>
                                <button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url('admin/menu/edit/' . $item['id']); ?>'"><span class="glyphicon glyphicon-pencil"></span></button>
                                <button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url('admin/menu/create/' . $item['id']); ?>'">
                                    <span class="glyphicon glyphicon-plus"> </span>
                                </button>
                                <button data-url="<?php echo base_url('admin/menu/remove'); ?>" data-id="<?php echo $item['id']; ?>" type="button" class="btn btn-danger btn-remove-menu">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                                <button data-url="<?php echo base_url('admin/menu/active'); ?>" data-parent-id="<?php echo $detail['id']; ?>" data-id="<?php echo $item['id']; ?>" data-active="<?php echo $item['is_activated']; ?>" type="button" class="btn <?php echo ($item['is_activated'] == 0) ? 'btn-success' : 'btn-danger'; ?> btn-active-menu">
                                    <i class="fa <?php echo ($item['is_activated'] == 0) ? 'fa-check' : 'fa-remove'; ?>" aria-hidden="true"></i>
                                </button>
                            </li>
                            <?php
                        endforeach;
                    else:
                    ?>
                    <div class="row">
                        <div class="col-lg-12 col-lg-offset-0" style="margin-top: 10px;">
                            <table>
                                Không có menu con!
                            </table>

                        </div>

                    </div>
                    <?php endif; ?>
                </ol>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <script>
        $( function() {
            $('#sub-sortable').sortable({
                axis: 'y',
                update: function (event, ui) {
                    var data = $(this).sortable('serialize');
                    $.ajax({
                        data: {
                            sort: data,
                        },
                        method: 'GET',
                        url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/teddy/admin/menu/sort",
                    });
                }
            });
        });
    </script>
</div>

<?php
    function build_new_category($categorie, $parent_id = 0, $char = '', $slug){
        $cate_child = array();
        foreach ($categorie as $key => $item){
            if ($item['parent_id'] == $parent_id){
                $cate_child[] = $item;
                unset($categorie[$key]);
            }
        }
        // print_r($cate_child);die;
        if ($cate_child){
            foreach ($cate_child as $key => $value){
            ?>
            <option value="<?php echo $value['slug'] ?>" <?php echo($value['slug'] == $slug)? 'selected' : ''?> ><?php echo $char.$value['title'] ?><?php echo($value['is_activated'] == 1)? '---(Danh mục hiện đang tắt bạn phải bật danh mục bài viết mà menu đã chọn là menu chính)' : ''?></option>

            <?php build_new_category($categorie, $value['id'], $char.'---|', $slug) ?>
            <?php
            }
        }
    }
?>
