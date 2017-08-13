var data = [];
var score = [];
var alldata = [];
$(document).ready(function () {
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

var count = 1;

function addStage() {

    var template = " <div class=\"form-group\">\n" +
        "                                <div class=\"row\">\n" +
        "                                    <div class=\"col-md-6 col-md-offset-3\" style=\"padding-left: 10px;\">\n" +
        "                                        <label for=\"name\" class=\"control-label col-md-2\">階段</label>\n" +
        "                                        <div class=\"col-md-4\">\n" +
        "                                            <input type=\"text\" class=\"form-control\" value=\"\" name=\"name\">\n" +
        "                                        </div>\n" +
        "                                        <label for=\"score\" class=\"control-label  col-md-2\">分數</label>\n" +
        "                                        <div class=\"col-md-4\">\n" +
        "                                            <input type=\"number\" class=\"form-control\" value=\"\" name=\"score\">\n" +
        "                                        </div>\n" +
        "                                    </div>\n" +
        "                                </div>\n" +
        "                            </div>"
    $('.form-horizontal').append(template);
    count += 1;
}

var stageObj = {};
var stageId = 1;

function pushData() {
    // stage name
    var array = $("input[name='name']");

    // pass score
    var scoreArray = $("input[name='score']");

    var nameLength = $(array).length;
    var scoreLength = $(scoreArray).length;
    var positionId = $("select[name='position_id']").val();

    if (nameLength !== scoreLength) {
        console.log('error');
        return;
    } else {
        for (var index = 0; index < nameLength; index++) {
            stageObj = {};
            if (( $(array[index]).val() != "" ) && ( $(scoreArray[index]).val() != "" )) {
                stageObj.name = $(array[index]).val();
                stageObj.pass_score = $(scoreArray[index]).val();
                stageObj.position_id = positionId;
                stageObj.stage = stageId;
                stageId += 1;
                data.push(stageObj);
            }
        }
    }
}

function postData() {
    pushData();
    if (data.length === 0) {
        return;
    }
    $.ajax({
        url: '/store_stage',
        type: 'post',
        async: false,
        data: {
            data: data
        },
        success: function (html) {
            $("#app").html(html);
            data = [];
            ajaxSetup();
            console.log('success');
        },
        error: function (data) {
            console.log('error');
        }
    });
}

function deleteStageRow() {
    var lastRow = $('.form-group').last();
    $(lastRow).remove();
}

function getPositionByLocation(element) {
    var locationId = $(element).val();
    $("select[name='position_id'] option ").remove();
    $.ajax({
        url: '/get_position_by_location/' + locationId,
        type: 'get',
        success: function (data) {
            data.forEach(function (position) {
                var option = "<option></option>";
                option = $(option).attr("value", position.id);
                option = $(option).text(position.name);
                console.log(option[0]);
                $("select[name='position_id']").append(option[0]);
            });
        }
    })
}