$(document).ready(function(){

    $("#cpf").inputmask("99999999999",{ "placeholder": "" });
    $("#birthday").inputmask("99/99/9999",{ "placeholder": "" });
    $("#zipcode").inputmask("99999999",{ "placeholder": "" });
    $('#phone').inputmask('(99) 99999999[9]');

});