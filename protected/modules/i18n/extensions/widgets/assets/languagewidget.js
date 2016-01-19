jQuery(function ($) {
    $('.languageWidget').tabs({
        select: function (event, ui) {
            if (!window.selectionBlocked) { // Selected by the user
                window.selectionBlocked = true;
                $('.languageWidget.ui-tabs').not(this).tabs('option', 'selected', ui.index);
                window.selectionBlocked = false;
                return true;
            }
            // Else, change in case are not the selected
            return (ui.index != $(this).tabs('option', 'selected'));
        }
    });

    $('.languageWidget.ui-tabs .ui-widget-content div.errorMessage').each(function () {
        var jthis = $(this);
        jthis.parents('.languageWidget.ui-tabs').find('ul li a[rel=' + jthis.parent().attr('rel') + ']').css('color', 'red').last().trigger('click');
    });

    $('.languageWidget ul.ui-tabs-nav > li > a').on('click', function () {
        var jthis = $(this);
        jthis.parents('.languageWidget.ui-tabs').find('div[rel=' + jthis.attr('rel') + '] > input, div[rel=' + jthis.attr('rel') + '] > textarea').focus();
    });
});

