$(document).ready(function(){
    ajaxSetup();
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

function getPositionByLocation(element){

    $.ajax({
        url:'/get_position_by_location/'+$(element).val(),
        type:'get',
        asyc:false,
        success:function (data) {
            var positionSelect = $("select[name='position_id']");
            $(positionSelect).find('option').remove();
            data.forEach(function(position){
                var option = "<option></option>";
                option = $(option).attr('value',position.id);
                option = $(option).text(position.name);
                $(positionSelect).append(option);
            });

            getStageByPosition($("select[name = 'position_id']"));
        },
        error:function () {
            console.log("error");
        }
    });
}

function getStageByPosition(element){

    $.ajax({
        url:'/get_stage_by_position/' + $(element).val(),
        type:'get',
        async:false,
        success:function (data) {
            var stageSelect = $("select[name='stage_id']");
            $(stageSelect).find('option').remove();
            data.forEach(function(stage){
                var option = "<option></option>";
                option = $(option).attr('value',stage.id);
                option = $(option).text(stage.name);
                $(stageSelect).append(option);
            });
        },
        error:function(){
            console.log('error');
        }
    })
}