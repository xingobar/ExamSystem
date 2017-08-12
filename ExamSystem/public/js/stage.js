var data = [];
$(document).ready(function () {
    ajaxSetup();
    addStage();
    postData();
});


/**
 add token into headers
 */

function ajaxSetup() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

function addStage() {
    var count = 1;
    $("#add_stage").click(function () {
        var template = " <div class=\"form-group\">\n" +
            "               <label for=\"name\" class=\"col-md-offset-2 col-md-2 control-label\">Stage <strong> " + count + "</strong></label>\n" +
            "               <div class=\"col-md-5\">\n" +
            "                  <input type=\"text\" class=\"form-control\" name=\"name\" value=\"\">\n" +
            "               </div>\n" +
            "           </div>";
        $('.form-horizontal').append(template);
        count += 1;
    });
}

function pushData() {
    var array = $("input[name='name']");
    array.map(function (index) {
        var value = $(array[index]).val();
        if(value != ""){
            data.push(value);
        }
    })
}

function postData() {
    $('.submit').click(function () {
        pushData();
        $.ajax({
            url:'/store_stage',
            type:'post',
            data:{
                name:data,
                position_id:$("select[name='position_id']").val()
            },
            success:function(){
                console.log('success');
            },
            error:function(){
                console.log('error');
            }
        })
    });
}