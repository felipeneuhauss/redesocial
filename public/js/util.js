function setMasks() {

    $('.form-validate').validate();

    $('body').delegate('.delete' , 'click' , function(){
        return confirm('Deseja realmente excluir o registro?');
    });

    $('body').delegate('.confirm' , 'click' , function(){
        return confirm('Deseja realmente continuar com a ação?');
    });

    /**
     * Tooltip tips.js
     */
    $('table').delegate( 'a' , 'hover' ,function(){$('a').tooltip();});

    $(".cnpj").mask("99.999.999/9999-99");
    $(".cep").mask("99999-999");
    $(".cpf").mask("999.999.999-99");
    $(".datepicker").mask("99/99/9999");
    $(".datepicker").datepicker({format:'dd/mm/yyyy', autoclose: true, language: "pt-BR"}).on('changeDate', function(ev){
        $(this).datepicker('hide');
    });
    $(".phone").mask("(99)9999-9999?9");
    $(".money").maskMoney({symbol:"R$",decimal:",",thousands:".",precision:2});

    /**
     * Funcao que valida o CPF
     * @param Pcpf
     * @returns {Boolean}
     */
    $('.cpf').blur( function(){
        var Pcpf= $(this).val();

        doisP = Pcpf.split('.');
        ultimoP = doisP[2].split('-');
        cpf = doisP[0] + doisP[1] + ultimoP[0] + ultimoP[1];

        if (cpf.length != 11 || cpf == "00000000000"
            || cpf == "11111111111" || cpf == "22222222222"
            || cpf == "33333333333" || cpf == "44444444444"
            || cpf == "55555555555" || cpf == "66666666666"
            || cpf == "77777777777" || cpf == "88888888888"
            || cpf == "99999999999" || cpf == "")
            return false;
        add = 0;
        for (i = 0; i < 9; i++)
            add += parseInt(cpf.charAt(i)) * (10 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(9)))
            return alert('CPF inválido');

        add = 0;
        for (i = 0; i < 10; i++)
            add += parseInt(cpf.charAt(i)) * (11 - i);
        rev = 11 - (add % 11);
        if (rev == 10 || rev == 11)
            rev = 0;
        if (rev != parseInt(cpf.charAt(10)))
            return alert('CPF inválido');

        return true;
    });

    /**
     * Funcao que valida o CNPJ
     * @param Pcnpj
     * @returns {Boolean}
     */
    $('.cnpj').blur( function(){
        var Pcnpj = $(this).val();
        doisP = Pcnpj.split('.');
        meio = doisP[2].split('/');
        ultimoP = meio[1].split('-');

        cnpj = doisP[0] + doisP[1] + meio[0] + ultimoP[0] + ultimoP[1];

        var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
        digitos_iguais = 1;
        if (cnpj.length < 14 && cnpj.length < 15)
            return false;
        for (i = 0; i < cnpj.length - 1; i++)
            if (cnpj.charAt(i) != cnpj.charAt(i + 1)) {
                digitos_iguais = 0;
                break;
            }
        if (!digitos_iguais) {
            tamanho = cnpj.length - 2
            numeros = cnpj.substring(0, tamanho);
            digitos = cnpj.substring(tamanho);
            soma = 0;
            pos = tamanho - 7;
            for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                    pos = 9;
            }
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(0))
                return alert('CNPJ inválido');
            tamanho = tamanho + 1;
            numeros = cnpj.substring(0, tamanho);
            soma = 0;
            pos = tamanho - 7;
            for (i = tamanho; i >= 1; i--) {
                soma += numeros.charAt(tamanho - i) * pos--;
                if (pos < 2)
                    pos = 9;
            }
            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
            if (resultado != digitos.charAt(1))
                return alert('CNPJ inválido');
            return true;
        } else
            return alert('CNPJ inválido');
    });

    $('.zip_code').change(function() {
        var zipCode = $(this).val();
        console.log(BASE_URL + '/util/postcode/'+zipCode);
        $.ajax({
            url: BASE_URL + '/util/postcode/'+zipCode,
            async: false,
            dataType: 'json',
            crossDomain: true,
            contentType: "application/json",
            beforeSend:function(){
            },
            success: function(data){
                if(data != null)
                {
                    cidade = data.cidade;
                    if ($('#address').val() == "")
                        $('#address').val(data.logradouro);
                    if ($('#district').val() == "")
                        $('#district').val(data.bairro);
//                $('#state option:contains('+data.estado+')').attr("selected","selected");
                    $('#state').val(data.estado);
//                $('#city option:contains('+data.cidade+')').attr("selected","selected");
                    $('#city').val(data.cidade);
                }
            }
        });
    }).change();

    $('body').delegate('.number', 'keypress', function(event) {
        var tecla = (window.event) ? event.keyCode : event.which;

        if ((tecla > 47 && tecla < 58) || tecla == 0 ) return true;
        else {
            if (tecla != 8) return false;
            else return true;
        }
    });

};

setMasks();
/**
 * Funcao que simula um link
 * @param id		- id do elemento
 * @param request	- url de requisicao
 */
function link( id , request ){
    $(id).click( function(){
        window.location.href = request;
    });
}
/**
 * Funcao que obtem os options de um elemento via ajax
 * @param idElementFrom - Ex: #id_pais
 * @param idElementTo - Ex: #id_estado
 * @param strUrlRequest - Ex: /location/statate/....
 * @param column - Ex: id_modulo
 */
function getOptionsViaAjax( idElementFrom , idElementTo , strUrlRequest , data ){
    console.log(idElementFrom);
    $( idElementFrom ).change( function(){
        data.value = $(this).val();
        if (data.value != undefined && data.value != "" && data.value != null) {

            $.ajax({
                type: "POST",
                url: strUrlRequest ,
                data: data ,
                beforeSend: function(){
                    $( idElementTo ).html('<option>Carregando...</option>');
                },
                success: function(data, textStatus, jqXHR){                    
                    var options = '';
                    options += '<option value="0">Selecione...</option>';
                    $.each(data.lista, function(key, value){
                        options += '<option value="' + key + '">' + value + '</option>';
                    });
                    $( idElementTo ).html(options);
                }
            });
        } else {
            $( idElementTo ).html('<option value="0">Selecione...</option>');
        }
    });
}

/**
 * Funcao que obtem os options de um elemento via ajax
 * @param idElementFrom - Ex: #id_pais
 * @param idElementTo - Ex: #id_estado
 * @param strUrlRequest - Ex: /location/statate/....
 * @param column - Ex: id_modulo
 */
function getSelectOptions( idElement, strUrlRequest, fistOption){
    $.ajax({
        type: "POST",
        url: strUrlRequest ,
        beforeSend: function(){
            $( idElement ).html('<option>Carregando...</option>');
        },
        success: function(data, textStatus, jqXHR){
            var options = '';
            options += fistOption || '<option value="">Selecione...</option>';
            $.each(data.lista, function(key, value){
                options += '<option value="' + key + '">' + value + '</option>';
            });
            $( idElement ).html(options);
        }
    });
}


/**
 * Function who set a character limit in a textarea
 * @param element
 */
function maxLengthTextAreaControl( element ){

    $(element).keypress(function(event){
        var key = event.which;

        //todas as teclas incluindo enter
        if(key >= 33 || key == 13) {
            var maxLength = $(this).attr("length");
            var length = this.value.length;
            if(length >= maxLength) {
                event.preventDefault();
                $(this).next('span').html( this.value.length + " de "+ maxLength + " caracters" ).addClass( 'error' );
            }else{
                $(this).next('span').html( this.value.length + " de " + maxLength + " caracters" ).removeClass( 'error' );
            }
        }
        var maxLength = $(this).attr("length");
        if( this.value.length > maxLength )
            $(this).next('span').html( this.value.length + " de "+ maxLength + " caracters" ).addClass( 'error' );
        else
            $(this).next('span').html( this.value.length + " de "+ maxLength + " caracters" ).removeClass( 'error' );

        $(this).next('span').css({'padding-top':'5px', 'margin': '5px' , 'display' : 'block'});

    }).keypress();
}

$('body').delegate('.date-init, .date-end', 'focus', function(){

    var checkin  = null;
    var checkout = null;
    var nowTemp   = new Date();
    var now      = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    var checkin   = $('.date-init').datepicker({
        format:'dd/mm/yyyy',
        onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
        }
        checkin.hide();
        $('.date-end')[0].focus();
    }).data('datepicker');
    var checkout = $('.date-end').datepicker({
        format:'dd/mm/yyyy',
        onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        checkout.hide();
    }).data('datepicker');
});
/**
 * Function who define a min date to a final date based in a initial date
 * @param idDateInicial
 * @param idDateFinal
 * @param minDate
 * @param maxDate
 */
function dateDiff( dateIniClass , dateEndClass){
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = $('.date-init').datepicker({
        format:'dd/mm/yyyy',
        onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
        }
        checkin.hide();
        $('.date-end')[0].focus();
    }).data('datepicker');

    var checkout = $('.date-end').datepicker({
        format:'dd/mm/yyyy',
        onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        checkout.hide();
    }).data('datepicker');
}

/**
 * Set a datepicker
 * @param idDate
 * @param minDate
 */
function setDatePicker( idDate , minDate ){
    $(idDate).datepicker({
        dateFormat:'dd/mm/yy',
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
        yearRange: '2010:c+2',
        showOtherMonths: true,
        selectOtherMonths: true,
        minDate: minDate
    });
}

function date( date ){
    $(date).datepicker({
        dateFormat:'dd/mm/yy',
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
        yearRange: '2010:c+2',
        showOtherMonths: true,
        selectOtherMonths: true
    });
}


function reviewRequiredFields() {
    var $requiredElement = $('<em style="color:red;">').text('* ').addClass('required-element');
    $('.required').each( function(){
        var nameAttr = $(this).attr('name'),
            requiredElementClone = $requiredElement.clone();
        $(this).prev().prepend(requiredElementClone);
    });
}

//reviewRequiredFields();

function ajaxFormInit(formId, resetForm, postSuccess) {
    $(formId).validate();
    $(formId).submit(function() {
        if ($(formId).valid()) {
            var options = {
                beforeSubmit:  function(formData, jqForm, options){
                    $('#error-message').removeClass('alert-success').removeClass('alert-error').addClass('alert-info').show();
                    $('#error-message-container').html("<strong>Aguarde</strong>.Estamos salvando suas informações.");
                },  // pre-submit callback
                success: function(responseText, statusText, xhr, $form){
                    if (responseText.success == false) {
                        $('#error-message').addClass('alert-error').removeClass('alert-success').show();
                        $('#error-message-container').html(responseText.message);
                    } else {
                        $('#error-message').removeClass('alert-info').removeClass('alert-error').addClass('alert-success').show();
                        $('#error-message-container').html(responseText.message);

                        postSuccess(responseText, statusText);
                    }
                }
            };

            if (resetForm) {
                options.resetForm = true
            }

            // inside event callbacks 'this' is the DOM element so we first
            // wrap it in a jQuery object and then invoke ajaxSubmit
            $(this).ajaxSubmit(options);

            // !!! Important !!!
            // always return false to prevent standard browser submit and page navigation
        }
        return false;
    });
}

/**
 * Adiciona no topo da pagina a mensagem de alerta
 * @param message
 * @param type
 */
var messageAlert = function(message, type) {
    $('#message-container').html("<div class='alert alert-"+type+"'>"+
        message+
    "</div>");

    $(".alert").slideDown('slow');
    $(".alert").click( function(){
        $(this).fadeOut(4000);
    });

    $(".alert").css('cursor','pointer');
};


/**
 * Adiciona no topo da pagina a mensagem de alerta
 * @param message
 * @param type
 */
var messageAlertAdmin = function(message, type) {
    $('#admin-message').fadeIn();
    $('#admin-message').attr('class', '').addClass("alert alert-"+type);
    $('#admin-message-container').html("<div class='alert alert-"+type+"'>"+
        message+
    "</div>");

    $('#admin-message').delay(4000).fadeOut(7000);
    $('#admin-message').click( function(){
        $(this).fadeOut(4000);
    });

    $('#admin-message').css('cursor','pointer');
};


/**
 * Obtem os categorias de forma recursiva entre os objetos pais de categoria
 * @param category
 * @returns {string}
 */
var getCategoryTree = function(category) {

    var breakIt = false;
    var count = 0;
    var categoryTree = [];
    while (!breakIt) {
        categoryTree[count] = category.name;
        count++;
        if (underscore.isObject(category.category)) {
            var category = category.category;
        } else {
            breakIt = true;
        }
    }

    return categoryTree.reverse().join(' > ');
}


/**
 * Humaniza uma data vinda do banco para o formato dd/mm/yyyy
 * @required moment.js
 * @param date
 * @returns {*}
 */
var humanizeDate = function(date) {
    return moment(date).format('DD/MM/YYYY')
}


/**
 * Retira a mascara e formata o valor monetario de forma correta
 * @param value 2.567.89,23
 * @returns value - 256789.23
 */
var resetMoneyMask = function(value){
    if (value != "" && value != undefined && value != null) {
        if (underscore.isNumber(value))
            return value;
        else
            value = value.replace("R$","");

        if (value.indexOf(',') >= 0) {
            value = value.replace(/\./g, '').replace(/,/g, '.');
        }
        return parseFloat(value);
    } else {
        return 0;
    }
}

var resetDiscountMask = function(value){
    if (value != "") {
        value = value.replace('.','');

        value = value.replace(',','.');
    } else {
        value = '0';
    }
    return parseFloat(value.replace("%","")).toFixed(1);
}


