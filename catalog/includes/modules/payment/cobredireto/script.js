CD = jQuery.noConflict(true);

function registra() { 
    valores = [];
    CD("#cd_config option:selected").each(function () {
        valores.push(CD(this).attr('value'))
    });
    insert = "['"+valores.join("','")+"']";
    CD("input[name='configuration[MODULE_PAYMENT_COBREDIRETO_BANDEIRAS]']").attr('value',insert)
}
CD(function () {
    CD("input[name='configuration[MODULE_PAYMENT_COBREDIRETO_BANDEIRAS]']").hide();

    valores = eval(CD("input[name='configuration[MODULE_PAYMENT_COBREDIRETO_BANDEIRAS]']").val())
    if (typeof(valores) == 'undefined')
        valores = [];


    CD("#cd_config option").each(function () {
        if (valores.length > 0 && valores.indexOf(CD(this).attr('value')) >= 0)
            CD(this).attr('selected','true');
    });

    CD("#cd_config").live('change', registra);
});
