jQuery('input').focus(function (e) {
    var name = jQuery(this).attr('id');

    jQuery('label[for="' + name + '"]').addClass('active');
    jQuery(this).parent().siblings('i').addClass('active');
});

jQuery('input').blur(function (e) {
    var name = jQuery(this).attr('id');
    if (jQuery('#' + name).val().length == 0) {
        jQuery('label[for="' + name + '"]').removeClass('active');
        jQuery(this).parent().siblings('i').removeClass('active');
    }
});

jQuery('textarea').focus(function (e) {
    var name = jQuery(this).attr('id');

    jQuery('label[for="' + name + '"]').addClass('active');
    jQuery(this).parent().siblings('i').addClass('active');
});

jQuery('textarea').blur(function (e) {
    var name = jQuery(this).attr('id');
    if (jQuery('#' + name).val().length == 0) {
        jQuery('label[for="' + name + '"]').removeClass('active');
        jQuery(this).parent().siblings('i').removeClass('active');
    }
});

jQuery('#submit-btn').submit(function () {

    alert('送信しました！');

});