jQuery.noConflict();

function cd_payment() { 
    console.log(jQuery(this).attr('value'));
}
jQuery(function () {
    jQuery("input[name='payment']").live('change', cd_payment)
});
