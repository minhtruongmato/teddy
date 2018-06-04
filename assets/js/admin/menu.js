var csrf_hash = $("input[name='csrf_teddy_token']").val();
$('#select_main').change(function(){
    var url = HOSTNAME + 'admin/menu/show_sub_category';
    var slug = $(this).val();
    if (slug.length == 0) {
        $('#select_article').html('<option value="" selected="selected">Chọn bài viết</option>');
    }else{
        $.ajax({
            method: "get",
            url: url,
            data: {
                slug : slug
            },
            success: function(response){
                $('#select_article').html('<option value="" selected="selected">Chọn bài viết</option>');
                if(response.status == 200){
                    sub_cate = response.reponse.sub_cate,
                    posts = response.reponse.posts
                }
                $('#url').val(HOSTNAME + slug);
                $.each(posts, function(key, item){
                    $('#select_article').append($('<option>', {
                        value: item.slug,
                        text: item.title
                    }));
                });
            },
            error: function(jqXHR, exception){
                console.log(errorHandle(jqXHR, exception));
            }
        });
    }
    
});

$('#select_article').each(function(){
    var url = HOSTNAME + 'admin/menu/select_posts';
    var slug = $('#select_main').val();
    var slug_post = $(this).val();
    if(slug != ''){
        $('#url').val(HOSTNAME + slug + '/' + slug_post);
    }
});

$('#select_article').change(function(){
    var url = HOSTNAME + 'admin/menu/select_posts';
    var slug = $('#select_main').val();
    var slug_post = $(this).val();
    $('#url').val(HOSTNAME + slug + '/' + slug_post);
});

$('.btn-active-menu').click(function(){
    var url = HOSTNAME + 'admin/menu/active';
    var id = $(this).data('id');
    if($(this).hasClass('btn-success')){
        var question = 'Chắc chắn tắt Menu này? Nếu tắt tất cả các Menu con cũng sẽ bị tắt';
    }else{
        var question = 'Chắc chắn bật Menu này?';
    }
    if(confirm(question)){
        $.ajax({
            method: "post",
            url: url,
            data: {
                id : id, csrf_teddy_token : csrf_hash
            },
            success: function(response){
                csrf_hash = response.reponse.csrf_hash;
                if(response.status == 200){
                    if($(this).hasClass('btn-success')){
                        alert(response.message);
                    }else{
                        alert(response.message);
                    }
                    location.reload();
                }
            },
            error: function(responses){
                 if(responses.responseJSON.status == 404){
                    alert(responses.responseJSON.message);
                    location.reload();
                 }
            }
        });
    }
});

$('.btn-remove-menu').click(function(){
    var url = HOSTNAME + 'admin/menu/remove';
    var id = $(this).data('id');
    if(confirm('Chắc chắn xóa?')){
        $.ajax({
            method: "get",
            url: url,
            data: {
                id : id
            },
            success: function(response){
                console.log(response);
                if(response.status == 200 && response.isExisted == true){
                    $('.remove_' + id).fadeOut();
                }
                if(response.status == 200 && response.isExisted == false){
                    alert('Menu này có chứa Menu con. Vui lòng xóa Menu con trước trước sau đó thực hiện lại thao tác');
                }
            },
            error: function(jqXHR, exception){
                console.log(errorHandle(jqXHR, exception));
            }
        });
    }
});
$("#checkselected").click(function(){
    if($("#select_main").val() == ''){
        alert("Bạn phải chọn menu chính");
        return false;
    }
});