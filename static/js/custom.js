/**
 * Created by ernesto on 17/02/15.
 */

$(document).ready(function(){
    $('#shared_networks').share({
        networks: ['twitter','facebook', 'googleplus', 'linkedin'],
        theme: 'icon',
        urlToShare: $(window).attr('location')
        });

    $('#newsletter_input').tooltip(
        {
            trigger: 'manual'
        })
    $('#newsletter_input').keyup(function()
    {
        if(!email_validation($(this)))
        {
            $('#newsletter_input').tooltip('show');
        }
        else{
            $('#newsletter_input').tooltip('hide');
        }
    })
    $('#newsletter_input').blur(function(){
        $('#newsletter_input').tooltip('hide');
    })


    $("input[name=phone]").keypress(function(event) {
        //console.log(event);
        if ((event.charCode < 48 || event.charCode > 57) && event.keyCode != 9 && event.keyCode != 8 && event.keyCode != 37 && event.keyCode != 39 && event.keyCode != 46) {
            event.preventDefault();

        }
    })


    $('#form_request_property').submit(function(){

        var name = $('input[name=name]').val();
        var email = $('input[name=email]').val();
        var message = $('textarea[name=message]').val();
        var property_id = $('input[name=property_id]').val();
        var phone = $('input[name=phone]').val();
        //console.log(email);
        if(name != '' && email != '' && email_validation($('input[name=email]'))) {
            $.post('/sendemail',
                {email: email, message: message,
                    name: name,
                    property_id: property_id,
                    phone: phone
                },
                function (data) {
                    if (data.success) {

                        $('input[name=name]').val('');
                        $('input[name=email]').val('');
                        $('input[name=phone]').val('');
                        $('textarea[name=message]').val('');

                    }
                    $("#property_contact_message").html(data.message);
                    $("#property_contact_message").fadeIn().delay(3000).fadeOut();
                },
                'json')
        }
        else{
            $('input[name=email]').tooltip('show');
        }

        return false;
    })



    setTimeout(function(){
            $(".alert").alert('close');
        }, 3000);


    $("#searcher_input").autocomplete(
        {
            minLength: 3,
            source: function( request, response ) {
                $.ajax({
                   url: '/searcherProperty',
                   dataType: "json",
                   data: {
                    q: request.term,
                    category: $("input[name=cat]:checked").val()

                   },
                   success: function( data ) {
                        response( data );
                   }
                });
            },
            open: function() {
           $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
           },
           close: function() {
           $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
           }
        }

    )
    $("#searcher_input_mobile").autocomplete(
            {
                minLength: 3,
                source: function( request, response ) {
                    $.ajax({
                       url: '/searcherProperty',
                       dataType: "json",
                       data: {
                        q: request.term,
                        category: $("input[name=cat]:checked").val()

                       },
                       success: function( data ) {
                            response( data );
                       }
                    });
                },
                open: function() {
               $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
               },
               close: function() {
               $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
               }
            }

        )


})
function show_video()
{
    $(".gallery-item").hide();
    $("#nav-images").hide();
    $("#li_video_button").hide()
    $("#iframe_container").show();
    $("#li_gallery_button").show()

}

function show_gallery()
{
    $(".gallery-item").show();
    $("#nav-images").show();
    $("#iframe_container").hide();
    $("#li_gallery_button").hide()
    $("#li_video_button").show()

}

function change_url_searcher_form(category)
{
    $("#searcher_input").val('');
    if(category == 'buy')
    {
        var url = $("#searcher_buy_url").val();
    }
    else{
        var url = $("#searcher_rent_url").val();
    }
    $("#searcher_form").attr('action', url);
}

function email_validation(email_value){
    var filter = /[\w-\.]{1,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
     if(filter.test(email_value.val()))
     {
        return true;
     }
    else
    {
        return false;
    }
}

function filter_properties()
{
    var type = $("input[name=options_type]:checked").val();
    var category = $("input[name=options_category]:checked").val();

    $.post('/frontend/default/home_filter_property', {type: type, category: category},
            function(data){

                $("#recent_properties_container").html(data);
                var count_recent = parseInt($("#recent_count_properties").val());

                if(category == 'buy')
                {
                    if(count_recent > 6)
                    {
                        $("#buy_view_more").show();
                    }
                    $("#rent_view_more").hide();
                }else if(category == 'rent'){
                    $("#buy_view_more").hide();
                    if(count_recent > 6)
                    {
                        $("#rent_view_more").show();
                    }
                }
            }
    )
}

function trigger_form_filter_properties_list()
{
    $("#filter_form").trigger('submit');
}

function add_subscribers()
{
    var email = $("#newsletter_input").val();

    if(!email_validation($("#newsletter_input")))
    {
        $('#newsletter_input').tooltip('show');
    }
    else {
        $('#newsletter_input').tooltip('hide');
        $.get('/frontend/default/add_subscribers', {email: email},
            function (data) {
                $('#newsletter_input').val('');
                $("#newsletter_message").html(data.message);
                $("#newsletter_message").fadeIn().delay(3000).fadeOut();
            },
            'json'
        )
    }
}

$("#contact_phone").mask("(999)999-9999");

$('#search_form').click(function(){
    $(this).parents("form").submit();
})