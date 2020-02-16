$(document).ready(function(){
    $("#cpf").mask("999.999.999-99");
    $("#cnpj").mask("99.999.999/9999-99");


    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };
    
    $('#telefone').mask(SPMaskBehavior, spOptions); 

    $('#form').validate({
        rules: {
          cpf:{
            cpf: true,
          },
          cnpj:{
            cnpj: true,
          },
          email:{
              email:true,
          }
        },
        messages:{
            email:"Insira um email valido",
        }
    });

    function validar(formulario) {
        for (i = 0; i <= formulario.length - 2; i++) {
            if ((formulario[i].value == "")) {
                alert("Preencha o campo " + formulario[i].name);
                formulario[i].focus();
                return false;
            }
        }
        formulario.submit();
    }
})