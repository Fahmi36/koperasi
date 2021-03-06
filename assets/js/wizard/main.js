(function($) {

    var form = $("#signup-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
           element.before(error); 
       },
       rules: {
        nama_lengkap : {
            required: true,
        },
        tempat_lahir : {
            required: true,
        },
        tanggal_lahir : {
            required: true,
        },
        alamat : {
            required: true,
        },
        no_ktp : {
            required: true,
        },
        no_hp : {
            required: true,
        },
        // no_rek : {
        //     required: true,
        // },
        // no_kartu : {
        //     required: true,
        // },
        // cvv : {
        //     required: true,
        // },
        pekerjaan : {
            required: true,
        },
        file_fotocopy : {
            required: true,
        },
        foto_1 : {
            required: true,
        },
        foto_2: {
            required: true,
        },
        sim_sukarela : {
            required: true,
        },
        pembayaran : {
            required: true,
        },
        metode_pem : {
            required: true,
        },
        sebesar : {
            required: true,
        },
    },
    onfocusout: function(element) {
        $(element).valid();
    },
    highlight : function(element, errorClass, validClass) {
        $(element.form).find('.actions').addClass('form-error');
        $(element).removeClass('valid');
        $(element).addClass('error');
    },
    unhighlight: function(element, errorClass, validClass) {
        $(element.form).find('.actions').removeClass('form-error');
        $(element).removeClass('error');
        $(element).addClass('valid');
    }
});
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            previous : 'Previous',
            next : 'Next',
            finish : 'Submit',
            current : ''
        },
        titleTemplate : '<span class="title">#title#</span>',
        onStepChanging: function (event, currentIndex, newIndex)
        {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            var data = new FormData($(this)[0]);
            Swal.fire({
                title: 'Data Sudah benar ?',
                text: "Klik Ya",
                type: 'success',
                confirmButtonText: "Iya",
                cancelButtonText: "Belum",
                showCancelButton: true,
            })
            .then((result) => {
                if (result.value) { 
                    $.ajax({
                        url: BASE_URL + 'Action/actRegis',
                        type: "POST",
                        data: data,
                        dataType:'json',
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend:function(argument) {
                            $("#text-loader").html('Mohon Tunggu');
                            $('#page-loader').fadeIn('fast');
                        },
                        success: function (response) {
                            Swal.fire(
                                ''+response.msg+'',
                                );
                            $("#signup-form")[0].reset();
                            window.location.href = "/login";
                            $('#page-loader').fadeOut('fast'); 
                        },
                        error: function () {
                            Swal.fire(
                                '"'+response.msg+'"',
                                'Hubungi Tim Terkait',
                                );
                            $('#page-loader').fadeOut('fast'); 
                        }
                    });
                    return false;
                }
            });
            // });
        },
        // onInit : function (event, currentIndex) {
        //     event.append('demo');
        // }
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "",
        remote: "",
        email: "",
        url: "",
        date: "",
        dateISO: "",
        number: "",
        digits: "",
        creditcard: "",
        equalTo: ""
    });

    $('#gender').parent().append('<ul class="list-item" id="newgender" name="gender"></ul>');
    $('#gender option').each(function(){
        $('#newgender').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
    });
    $('#gender').remove();
    $('#newgender').attr('id', 'gender');
    $('#gender li').first().addClass('init');
    $("#gender").on("click", ".init", function() {
        $(this).closest("#gender").children('li:not(.init)').toggle();
    });
    
    var allOptions = $("#gender").children('li:not(.init)');
    $("#gender").on("click", "li:not(.init)", function() {
        allOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#gender").children('.init').html($(this).html());
        allOptions.toggle();
    });

    $('#country').parent().append('<ul class="list-item" id="newcountry" name="country"></ul>');
    $('#country option').each(function(){
        $('#newcountry').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
    });
    $('#country').remove();
    $('#newcountry').attr('id', 'country');
    $('#country li').first().addClass('init');
    $("#country").on("click", ".init", function() {
        $(this).closest("#country").children('li:not(.init)').toggle();
    });
    
    var CountryOptions = $("#country").children('li:not(.init)');
    $("#country").on("click", "li:not(.init)", function() {
        CountryOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#country").children('.init').html($(this).html());
        CountryOptions.toggle();
    });

    $('#payment_type').parent().append('<ul  class="list-item" id="newpayment_type" name="payment_type"></ul>');
    $('#payment_type option').each(function(){
        $('#newpayment_type').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
    });
    $('#payment_type').remove();
    $('#newpayment_type').attr('id', 'payment_type');
    $('#payment_type li').first().addClass('init');
    $("#payment_type").on("click", ".init", function() {
        $(this).closest("#payment_type").children('li:not(.init)').toggle();
    });
    
    var PaymentsOptions = $("#payment_type").children('li:not(.init)');
    $("#payment_type").on("click", "li:not(.init)", function() {
        PaymentsOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#payment_type").children('.init').html($(this).html());
        PaymentsOptions.toggle();
    });

    $.dobPicker({
        daySelector: '#birth_date',
        monthSelector: '#birth_month',
        yearSelector: '#birth_year',
        dayDefault: 'Day',
        monthDefault: 'Month',
        yearDefault: 'Year',
        minimumAge: 0,
        maximumAge: 120
    });

    $.dobPicker({
        daySelector: '#expiry_date',
        monthSelector: '#expiry_month',
        yearSelector: '#expiry_year',
        dayDefault: 'Day',
        monthDefault: 'Month',
        yearDefault: 'Year',
        minimumAge: 0,
        maximumAge: 120
    });

})(jQuery);

var checker = document.getElementById('s&k');
var sendbtn = document.getElementById('pinjam');
checker.onchange = function(){
    if(this.checked){
        sendbtn.disabled = false;
    } else {
        sendbtn.disabled = true;
    }
}