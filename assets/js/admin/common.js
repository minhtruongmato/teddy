function logout() {
    var doLogout = confirm('Do you wanna logout?');
    if (doLogout) {
        $.ajax({
            method: 'GET',
            url: HOSTNAMEADMIN + '/user/logout',
            success: function(response){
                if(response.status == 200){
                    window.location.href = HOSTNAMEADMIN + '/user/login';
                }
            },
            error: function(jqXHR, exception){
                console.log(errorHandle(jqXHR, exception));
            }
        });
    }
}

function errorHandle(jqXHR, exception){
    if (jqXHR.status === 0) {
        return ('Not connected.\nPlease verify your network connection.');
    } else if (jqXHR.status == 404) {
        return ('The requested page not found.');
    }  else if (jqXHR.status == 401) {
        return ('Sorry!! You session has expired. Please login to continue access.');
    } else if (jqXHR.status == 500) {
        return ('Internal Server Error.');
    } else if (exception === 'parsererror') {
        return ('Requested JSON parse failed.');
    } else if (exception === 'timeout') {
        return ('Time out error.');
    } else if (exception === 'abort') {
        return ('Ajax request aborted.');
    }

    return ('Unknown error occurred. Please try again.');
}

function to_slug(str){
    str = str.toLowerCase();

    str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
    str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
    str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
    str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
    str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
    str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
    str = str.replace(/(đ)/g, 'd');

    str = str.replace(/([^0-9a-z-\s])/g, '');

    str = str.replace(/(\s+)/g, '-');

    str = str.replace(/^-+/g, '');

    str = str.replace(/-+$/g, '');

    // return
    return str;
}

var csrf_hash = $("input[name='csrf_teddy_token']").val();
function remove(controller, id){
    var url = HOSTNAMEADMIN + '/' + controller + '/remove';
    if(confirm('Chắc chắn xóa?')){
        $.ajax({
            method: "post",
            url: url,
            data: {
                id : id, csrf_teddy_token : csrf_hash
            },
            success: function(response){
                csrf_hash = response.reponse.csrf_hash;
                if(response.status == 200 && response.isExisted == true){
                    console.log(response);
                    console.log(response.message);
                    if(response.message != 'undefined'){
                        alert(response.message);
                    }
                    $('.remove_' + id).fadeOut();
                }
                if(response.status == 200 && response.isExisted == false){
                    alert('Danh mục này có chứa bài viết. Vui lòng xóa bài viết trước sau đó thực hiện lại thao tác');
                }
            },
            error: function(jqXHR, exception){
                console.log(errorHandle(jqXHR, exception));
                if(jqXHR.status == 404 && jqXHR.responseJSON.message != 'undefined'){
                    alert(jqXHR.responseJSON.message);
                    location.reload();
                }
            }
        });
    }
}

function active(controller, id, question) {
    var url = HOSTNAMEADMIN + '/' + controller + '/active';
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
                    switch(controller){
                        case 'post_category' :
                            alert('Bật danh mục thành công');
                            break;
                        case 'order' :
                            alert('Hủy đặt bàn thành công');
                            break;
                        case 'banner' :
                            alert('Bật banner thành công');
                            break;
                        case 'product' :
                            alert('Bật thực đơn thành công');
                            break;
                        case 'post' :
                            alert('Bật bài viết thành công');
                            break;
                        case 'product_category' :
                            alert('Bật danh mục thành công');
                            break;
                    }
                    location.reload();
                }
                console.log(response);
            },
            error: function(jqXHR, exception){
                if(jqXHR.status == 404 &&  jqXHR.responseJSON.message != 'undefined '){
                    alert(jqXHR.responseJSON.message);
                    location.reload();
                }else{
                    // console.log(errorHandle(jqXHR, exception));
                }
            }
        });
    }
}

function deactive(controller, id, question) {
    var url = HOSTNAMEADMIN + '/' + controller + '/deactive';
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
                    switch(controller){
                        case 'post_category' :
                            alert('Tắt danh mục thành công');
                            break;
                        case 'order' :
                            alert('Hủy đặt bàn thành công');
                            break;
                        case 'banner' :
                            alert('Tắt banner thành công');
                            break;
                        case 'product' :
                            alert('Tắt thực đơn thành công');
                            break;
                        case 'post' :
                            alert('Tắt bài viết thành công');
                            break;
                        case 'product_category' :
                            alert('Tắt danh mục thành công');
                            break;
                    }
                    location.reload();
                }
            },
            error: function(jqXHR, exception){
                if(jqXHR.responseJSON.message != 'undefined '){
                    alert(jqXHR.responseJSON.message);
                    location.reload();
                }else{
                    console.log(errorHandle(jqXHR, exception));
                }
            }
        });
    }
}

function remove_image(controller, id, image, key){
    var url = HOSTNAMEADMIN + '/' + controller + '/remove_image';
    if(confirm('Chắc chắn xóa ảnh này?')){
        $.ajax({
            method: "post",
            url: url,
            data: {
                id : id, csrf_teddy_token : csrf_hash, image : image
            },
            success: function(response){
                if(response.status == 200){
                    csrf_hash = response.reponse.csrf_hash;
                    $('.row_' + key).fadeOut();
                    $("input[name='csrf_teddy_token']").val(csrf_hash);
                }
            },
            error: function(jqXHR, exception){
                console.log(errorHandle(jqXHR, exception));
            }
        });
    }
}

function active_avatar(controller, image) {
    var url = HOSTNAMEADMIN + '/' + controller + '/active_avatar';
    if(confirm('Chọn hình ảnh này làm avatar?')){
        $.ajax({
            method: "post",
            url: url,
            data: {
                csrf_teddy_token : csrf_hash, image : image
            },
            success: function(response){
                if(response.status == 200){
                    csrf_hash = response.reponse.csrf_hash;
                    location.reload();
                }
            },
            error: function(jqXHR, exception){
                console.log(errorHandle(jqXHR, exception));
            }
        });
    }
}
function edit_status(controller,id,status){
    var url = HOSTNAMEADMIN + '/' + controller + '/edit_status';
    if(confirm('Chắc chắn thay đổi?')){
        $.ajax({
            method: "post",
            url: url,
            data: {
                id : id,status : status,csrf_teddy_token : csrf_hash
            },
            success: function(response){
                if(response.status == 200){
                    csrf_hash = response.reponse.csrf_hash;
                    $('.status_' + id).fadeOut();
                    var number = Number($("#number_desk_placed_online>span").html());
                    var number_desk_status_confirm = Number($("#number_desk_status_confirm").html());
                    var number_desk_status_error = Number($("#number_desk_status_error").html());
                    if(status == "success"){
                        $("#number_desk_placed_online>span").html(number-1);
                        $("#number_desk_status_confirm").html(number_desk_status_confirm+1);
                    }else{
                        $("#number_desk_placed_online>span").html(number-1);
                        $("#number_desk_status_error").html(number_desk_status_error+1);
                    }
                }
            },
            error: function(exception){
                if(exception.responseJSON.message != 'undefined'){
                    alert(exception.responseJSON.message);
                    location.reload();
                }

            }
        });
    }
}



/*function edit_status(controller,id,status){
    var url = HOSTNAMEADMIN + '/' + controller + '/edit_status';
    if(confirm('Chắc chắn thay đổi?')){
        $.ajax({
            method: "post",
            url: url,
            data: {
                id : id,status : status,csrf_teddy_token : csrf_hash
            },
            success: function(response){
                if(response.status == 200){
                    csrf_hash = response.reponse.csrf_hash;
                    $('.status_' + id).fadeOut();
                    var number = Number($("#number_desk_placed_online").html());
                    var number_desk_status_confirm = Number($("#number_desk_status_confirm").html());
                    if(status == "success"){
                        if(window.location.href.indexOf("status/1") != '-1'){
                            $("#number_desk_placed_online").html(number-1);
                            $("#number_desk_status_confirm").html(number_desk_status_confirm+1);
                            if((number-1) == 0){
                                $(".update_order.success").attr("disabled","disabled");
                                $(".update_order.success").html("Không thể xác nhận");
                            }else{
                                $(".update_order.success").removeAttr("disabled");
                                $(".update_order.success").html("Xác nhận");
                            }
                        }
                    }
                    if(window.location.href.indexOf("status/2") != '-1'){
                        $("#number_desk_placed_online").html(number+1);
                        $("#number_desk_status_confirm").html(number_desk_status_confirm-1);
                    }
                }
            },
            error: function(exception){
                if(exception.responseJSON.message != 'undefined'){
                    alert(exception.responseJSON.message);
                    location.reload();
                }

            }
        });
    }
}*/



$("td button.update_order").click(function(){
    edit_status($(this).data().controller,$(this).data().id,$(this).data().status);
});

$("td #date").mousedown(function () {
    'use strict';
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    var checkin = $(this).datepicker({
        onRender: function (date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
        }
    }).data('datepicker');
});
$(function () {
    $('#reservation').mouseup(function() {
        $('#reservation').daterangepicker({
           format: 'DD/MM/YYYY',
        });
        $(".ranges").css("display","none");
        $(".calendar").mouseover(function(){
           $("#reservation").val($("input[name=daterangepicker_start]").val()+" - "+$("input[name=daterangepicker_end]").val());
           $(".second.right tbody .available").mousedown(function(){
               $(".daterangepicker.dropdown-menu.show-calendar.opensleft").css("display","none");
           });
        });
    });
});

$("#create_date_time").mouseover(function(){
    if($("#date").val().length != 0){
        $("#hour").removeAttr('disabled');
        var d = new Date();
        var year = d.getFullYear();
        var month = d.getMonth()+1;
        var day = d.getDate();
        var hours = d.getHours();
        var min = d.getMinutes();
        if(month<10){
             month = "0"+month.toString();
        }
        if(day<10){
             day = "0"+day.toString();
        }
        if($("#date").val() == day+"-"+month+"-"+year){
            $("#hour option").each(function(index,val){
                if($(this).val() <= hours && $(this).val() != 0){
                    $(this).css("display","none");
                    if($("#hour").val() != 0 && hours <= 22){
                        $("#hour").val(hours+1);
                    }
                    if(hours == 23){
                        $("#hour").attr('disabled','');
                    }
                }
            });
        }else{
            $("#hour option").css("display","inline-block");
        }
    }
    if($("#hour").val() != 0){
        $("#min").removeAttr('disabled');
    }else{
        $("#min").attr('disabled', '');
    }
});
$("#submit_date").click(function(){
    if($("#date").val().length == 0 || $("#hour").val() === "0" || $("#min").val() === "0"){
        alert("Bạn phải xác nhận đầy đủ thông tin");
        return false;
    }
});
var picker = new Pikaday({
    field: document.getElementById('date'),
    format: 'D/M/YYYY',
    firstDay: 1,
    minDate: new Date(),
    toString(date, format) {
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        if(month<10){
             month = "0"+month.toString();
        }
        if(day<10){
             day = "0"+day.toString();
        }
        return `${day}-${month}-${year}`;
    }
});

function check_active_side(param1 = '', param2 = ''){
    if(param1 != "" ){
        if(param2 != ""){
            if(window.location.href.indexOf('admin/'+param1) != '-1' || window.location.href.indexOf('admin/'+param2) != '-1'){
                $('li.treeview.'+param1+' ul').css("display","block");
                $('li.treeview.'+param1).addClass('menu-open');
            }
        }else{
            if(window.location.href.indexOf('admin/'+param1) != '-1'){
                $('li.treeview.'+param1+' ul').css("display","block");
                $('li.treeview.'+param1).addClass('menu-open');
            }
        }
    }
}
check_active_side('set_desk');
check_active_side('floor','desk');
check_active_side('product');
check_active_side('post');








/*function edit_number_desk_online(){
    $("#total_number_desk_online>span").css("display","none");
    $("#total_number_desk_online>input").css("display","block");
    $("#edit_number_desk_online").css("display","none");
    $("#update_number_desk_online").css("display","block");
}
function update_number_desk_online(){
    $("#total_number_desk_online>span").css("display","block");
    $("#total_number_desk_online>input").css("display","none");
    $("#edit_number_desk_online").css("display","block");
    $("#update_number_desk_online").css("display","none");
}
$("#edit_number_desk_online").click(function(){
    edit_number_desk_online();
});
$("#update_number_desk_online .btn-danger").click(function(){
        if(confirm('Chắc chắn hủy?')){
            var total_desk_online_span = Number($("#total_number_desk_online>span").html());
            $("#total_number_desk_online>input").val(total_desk_online_span);
            update_number_desk_online();
            return false;
        }
});
$("#update_number_desk_online .btn-success").click(function(){
    var total_desk_online_input = Number($("#total_number_desk_online>input").val());
    var total_desk_online_span = Number($("#total_number_desk_online>span").html());
    var total_desk = Number($("#count_total_rows_desk span").html());
    var number_desk_status_confirm = Number($("#number_desk_status_confirm").html());
    if(total_desk_online_input > total_desk){
        alert('Số Bàn đặt Online Phải nhỏ hơn hoặc bằng tổng số bàn');
        $("#total_number_desk_online>input").val(total_desk_online_span);
        update_number_desk_online();
        return false;
    }
    if(total_desk_online_input < number_desk_status_confirm){
        alert('Số bàn đặt online phải lớn hơn hoặc bằng tổng số đơn đặt bàn đã xác nhận');
        $("#total_number_desk_online>input").val(total_desk_online_span);
        update_number_desk_online();
        return false;
    }
    var url = HOSTNAMEADMIN + '/config/edit_total_desk_online';
    if(confirm('Chắc chắn thay đổi?')){
        $.ajax({
            method: "post",
            url: url,
            data: {
                total : total_desk_online_input,csrf_teddy_token : csrf_hash
            },
            success: function(response){
                if(response.status == 200){
                    csrf_hash = response.reponse.csrf_hash;
                    update_number_desk_online();
                    $("#total_number_desk_online>span").html(total_desk_online_input);
                    $("#number_desk_placed_online").html(total_desk_online_input-number_desk_status_confirm);
                    if(window.location.href.indexOf("status/1") != '-1'){
                        if($("#number_desk_placed_online").html() == '0'){
                            $(".update_order.success").attr("disabled","disabled");
                            $(".update_order.success").html("Không thể xác nhận");
                        }
                        if($("#number_desk_placed_online").html() != '0'){
                            $(".update_order.success").removeAttr("disabled");
                            $(".update_order.success").html("Xác nhận");
                        }
                    }
                }
            },
            error: function(exception){
                if(exception.responseJSON.message != ''){
                    alert(exception.responseJSON.message);
                    location.reload();
                }

            }
        });
    }


});*/
// $('.btn-dropdown-cate').each(function(){
//     if(('.btn-dropdown-cate').hasClass('is_active')){
//         $('.table-cate').removeAttr('id');
//     }else{
//         $('.table-cate').attr('id', 'sortable');
//     }
// })



