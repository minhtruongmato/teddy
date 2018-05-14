<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    .error{
        color: red;
    }
</style>
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <h2>Thêm menu chính</h2>
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
                                            echo form_input($k .'_'. $key, set_value($k .'_'. $key), 'class="form-control" id="title_'.$key.'"');
                                        }elseif($k == 'description' && in_array($k, $request_language_template)){
                                            echo form_label($val, $k .'_'. $key);
                                            echo form_error($k .'_'. $key);
                                            echo form_textarea($k .'_'. $key, set_value($k .'_'. $key, '', false), 'class="form-control" rows="5"');
                                        }elseif($k == 'content' && in_array($k, $request_language_template)){
                                            echo form_label($val, $k .'_'. $key);
                                            echo form_error($k .'_'. $key);
                                            echo form_textarea($k .'_'. $key, set_value($k .'_'. $key, '', false), 'class="tinymce-area form-control" rows="5"');
                                        }
                                        ?>
                                    </div>
                                <?php endforeach ?>
                            </div>
                            <?php $i++; ?>
                        <?php endforeach ?>
                    </div>
                    <hr class="form-group" style="border: solid 0.5px lightgrey">
                    <h3 class="form-group">Dựng đường dẫn cho menu</h3>
                    <div class="form-group sub-cat">
                        <?php
                        echo form_label('Chọn menu chính (hoặc Bài viết riêng nếu là bài viết lẻ)', 'selectMain_shared');
                        echo form_error('selectMain_shared');
                        ?>
                        <select name="selectMain_shared" class="form-control" id="select_main">
                            <?php if (isset($id)): ?>
                                <option value="">Chọn danh mục</option>
                            <?php else: ?>
                                <option value="" selected="selected">Chọn danh mục</option>
                            <?php endif ?>
                            
                            <?php build_new_category($main_category, 0, $slug, '') ?>
                        </select>
                    </div>
                    <div class="form-group sub-cat">
                        <?php
                        echo form_label('Chọn bài viết (nếu không chọn, menu sẽ trỏ đến danh sách bài viết trong danh mục phía trên)', 'selectArticle_shared');
                        echo form_error('selectArticle_shared');
                        echo form_dropdown('selectArticle_shared', $posts, '', 'class="form-control" id="select_article"');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Đường dẫn hoàn chỉnh của menu', 'url_shared');
                        echo form_error('url_shared');
                        echo form_input('url_shared', set_value('url_shared'), 'class="form-control" id="url" readonly="readonly"');
                        ?>
                    </div>
                    <!-- <hr class="form-group" style="border: solid 0.5px lightgrey"> -->
                    <div class="form-group picture sub-cat">
                        <?php
                        echo form_label('Bật / Tắt menu', 'isActived_shared');
                        echo form_error('isActived_shared');
                        echo form_dropdown('isActived_shared', array('0' => 'Bật', '1' => 'Tắt'), set_value('isActived_shared', 0), 'class="form-control" id="is_actived"');
                        ?>
                    </div>
                    <br>
                    <div class="form-group col-sm-12 text-right">
                        <?php
                        echo form_submit('submit', 'OK', 'class="btn btn-primary" id="checkselected"');
                        echo form_close();
                        ?>
                        <a class="btn btn-default cancel" href="javascript:window.history.go(-1);">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php 
    function build_new_category($categorie, $parent_id = 0,$slug = '', $char = ''){
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
            <option value="<?php echo $value['slug'] ?>" <?php echo ($value['slug'] == $slug)? 'selected' : '' ?> ><?php echo $char.$value['title'] ?></option>
            <?php build_new_category($categorie, $value['id'], $slug, $char.'---|') ?>
            <?php
            }
        }
    }
?>
