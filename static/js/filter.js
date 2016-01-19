function filter_list_by_type(url, id){
    window.location = url + id;
}

function change_url_searcher_form(_category){
    $('#searcher_form').attr('action', $('#' + _category).val());
}

var category = 'buy';

var ajaxFilterFlag = false;

function filter_by_category(){
    if (ajaxFilterFlag){
        return ;
    }

    var type = $("input[name=options_type]:checked").val();
    var category = $("input[name=options_category]:checked").val();

    if (category == 'buy'){
        $('#view_more_properties').attr('href', $('#searcher_buy_url').val());
    }else{
        $('#view_more_properties').attr('href', $('#searcher_rent_url').val());
    }

    $("#recent-carousel").addClass("loading");
    ajaxFilterFlag = true;

    $.ajax({
        type: 'POST',
        url: base_url + '/frontend/default/home_filter_property',
        data: {
            category: category,
            type: type
        },
        success:function(data){
            $("#recent-carousel").removeClass("loading");
            $('#recent-carousel').replaceWith(data);
            ajaxFilterFlag = false;
        },
        error: function(data) { // if error occured
            $("#recent-carousel").removeClass("loading");
            alert("Error occured.please try again");
            alert(data);
            ajaxFilterFlag = false;
        },

        dataType:'html'
    });
}

var ajaxInProcess = false;

function preAjax() {
    if (ajaxInProcess)
        return false;
    else {
        ajaxInProcess = true;
        $("#subscribe_div").addClass("loading");
    }
}

function postAjax() {
    ajaxInProcess = false;
    $("#subscribe_div").removeClass("loading");
}