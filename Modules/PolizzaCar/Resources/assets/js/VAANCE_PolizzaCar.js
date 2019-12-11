var VAANCE_PolizzaCar = {

    init: function () {
        
        this.polizzaSetup();
        // this.recalculateValues();
        this.copyButtons();
        this.signAndAcceptButton();
        this.signDocusignButton();
        this.initFileInput();
        this.saveButton();
    },

    copyButtons: function(){
        
        $(document).on('click','#contractor-copy-from-procurement',function(e){
            e.preventDefault();

            var procurementId = $('#procurement_id').val();

            if(procurementId > 0 ) {
                $.ajax({
                    type: "POST",
                    url: '/polizzacar/copy-from-procurement',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'procurement_id' : procurementId
                    },
                    dataType: 'json',
                    success: function (result) {

                        $('#company_name').val(result.data.company_name);
                        $('#company_vat').val(result.data.company_vat);
                        $('#company_email').val(result.data.company_email);
                        $('#company_phone').val(result.data.company_phone);
                        $('#company_address').val(result.data.company_address);
                        $('#company_city').val(result.data.company_city);
                        $('#company_cap').val(result.data.company_cap);
                        $('#company_provincia').val(result.data.company_provincia);
                        $('#country_id').val(result.data.country.id);
                        $('#works_type_details').val(result.data.works_type_details);
                        $('#works_descr').val(result.data.works_descr);
                        $('#works_place_city').val(result.data.works_place_city);
                        $('#works_place_pr').val(result.data.works_place_pr);
                        $('#works_duration_mm').val(result.data.works_duration_mm);

                        VAANCE_Common.initComponents();
                        $.AdminBSB.input.activate();
                    }
                });
            }else{
                VAANCE_Common.showNotification('bg-red', $.i18n._('fill_in_choices'));
            }

        });
    },

    recalculateValues: function(){

        var car_p1_limit_amount = parseFloat($('#car_p1_limit_amount').val() != '' ? $('#car_p1_limit_amount').val().replaceAll(',','').replaceAll('€ ','') : 0);
        var car_p1_premium_gross = 0;
        var car_p1_premium_net = 0;

        var car_p2_limit_amount = parseFloat($('#car_p2_limit_amount').val() != '' ? $('#car_p2_limit_amount').val().replaceAll(',','').replaceAll('€ ','') : 0);
        var car_p2_premium_gross = 0;
        var car_p2_premium_net = 0;

        var car_p3_limit_amount = parseFloat($('#car_p3_limit_amount').val() != '' ? $('#car_p3_limit_amount').val().replaceAll(',','').replaceAll('€ ','') : 0);
        var car_p3_premium_gross = 0;
        var car_p3_premium_net = 0;

        var works_duration_mm = $('#works_duration_mm').val();
        var riskId = $('#risk_id').val();

        if(riskId) {
            $.ajax({
                type: "POST",
                url: '/polizzacar/getTariffa',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'risk_id' : riskId
                },
                dataType: 'json',
                success: function (result) {

                    if (works_duration_mm == '24') {
                        $('#coeff_tariffa').val(result.data.mm_24);
                    } else {
                        $('#coeff_tariffa').val(result.data.mm_36);
                    }

                    $('#tax_rate').val(result.data.tax_rate);
                    $('#commission').val(result.data.commission);

                    VAANCE_Common.initComponents();
                    $.AdminBSB.input.activate();
                }
            });
        }else{
            VAANCE_Common.showNotification('bg-red', $.i18n._('problem_loading_rates'));
        }

        var coeff_tariffa = $('#coeff_tariffa').val();
        var tax_rate = $('#tax_rate').val();
        var commission =  $('#commission').val();

        car_p1_premium_gross = (car_p1_limit_amount * coeff_tariffa) / 1000;
        car_p2_premium_gross = (car_p2_limit_amount * coeff_tariffa) / 1000;
        car_p3_premium_gross = (car_p3_limit_amount * coeff_tariffa) / 1000;
    
        car_p1_premium_net = car_p1_premium_gross / ( 1 + (tax_rate/100));
        car_p2_premium_net = car_p2_premium_gross / ( 1 + (tax_rate/100));
        car_p3_premium_net = car_p3_premium_gross / ( 1 + (tax_rate/100));

        $('#car_p1_limit_amount').val('€ ' + $.number(car_p1_limit_amount,2,'.',','));
        $('#car_p2_limit_amount').val('€ ' + $.number(car_p2_limit_amount,2,'.',','));
        $('#car_p3_limit_amount').val('€ ' + $.number(car_p3_limit_amount,2,'.',','));

        $('#car_p1_premium_gross').val('€ ' + $.number(car_p1_premium_gross,2,'.',','));
        $('#car_p1_premium_net').val('€ ' + $.number(car_p1_premium_net,2,'.',','));
        $('#car_p2_premium_gross').val('€ ' + $.number(car_p2_premium_gross,2,'.',','));
        $('#car_p2_premium_net').val('€ ' + $.number(car_p2_premium_net,2,'.',','));
        $('#car_p3_premium_gross').val('€ ' + $.number(car_p3_premium_gross,2,'.',','));
        $('#car_p3_premium_net').val('€ ' + $.number(car_p3_premium_net,2,'.',','));

        
        tot_total = car_p1_limit_amount + car_p2_limit_amount + car_p3_limit_amount;
        $('#partite_total').html($.number(tot_total,2,'.',',')).prepend('€ ');

        tot_gross = car_p1_premium_gross + car_p2_premium_gross + car_p3_premium_gross;
        $('#total_gross').html($.number(tot_gross,2,'.',',')).prepend('€ ');

        tot_net = car_p1_premium_net + car_p2_premium_net + car_p3_premium_net;
        $('#total_net').html($.number(tot_net,2,'.',',')).prepend('€ ');
    },

    polizzaSetup: function(){
        if($('#car_p1_limit_amount').val() != undefined) {
            var car_p1_limit_amount = parseFloat($('#car_p1_limit_amount').val() != '' ? $('#car_p1_limit_amount').val().replaceAll(',','').replaceAll('€ ','') : 0);
            var car_p2_limit_amount = parseFloat($('#car_p2_limit_amount').val() != '' ? $('#car_p2_limit_amount').val().replaceAll(',','').replaceAll('€ ','') : 0);
            var car_p3_limit_amount = parseFloat($('#car_p3_limit_amount').val() != '' ? $('#car_p3_limit_amount').val().replaceAll(',','').replaceAll('€ ','') : 0);
            
            $('#car_p1_limit_amount').val('€ ' + $.number(car_p1_limit_amount,2,'.',','));
            $('#car_p2_limit_amount').val('€ ' + $.number(car_p2_limit_amount,2,'.',','));
            $('#car_p3_limit_amount').val('€ ' + $.number(car_p3_limit_amount,2,'.',','));
            
            var tot_total = car_p1_limit_amount + car_p2_limit_amount + car_p3_limit_amount;
            $('#partite_total').text($.number(tot_total,2,'.',',')).prepend('€ ');
        }
        

        $(document).on('change','.card .calc,#risk_id,#works_duration_mm,#car_p1_limit_amount,#car_p2_limit_amount,#car_p3_limit_amount' ,function(e){
           VAANCE_PolizzaCar.recalculateValues();
        });

        
    },

    initFileInput: function(){
        $('#pdf_signed_contract').fileinput({
            allowedFileExtensions: ['pdf'],
            dropZoneEnabled: false,
            uploadAsync: false,
            showUpload: false,
            showRemove: false,
            showCaption: true,
            maxFileCount: 1,
            showBrowse: true,
            showPreview: true,
            language: 'it',
            browseOnZoneClick: true,
            browseLabel: 'Sfoglia …',
            uploadUrl: '/polizzacar/polizzacar/uploadPDFfiles',
            uploadExtraData: function() {
                return {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    field_name: 'pdf_signed_contract',
                    polizzaId: $('#polizzacarId').val()
                };
            }
        });

        $('#pdf_payment_proof').fileinput({
            allowedFileExtensions: ['pdf'],
            dropZoneEnabled: false,
            uploadAsync: false,
            showUpload: false,
            showRemove: false,
            showCaption: true,
            language: 'it',
            maxFileCount: 1,
            showBrowse: true,
            showPreview: true,
            browseOnZoneClick: true,
            browseLabel: 'Sfoglia …',
            uploadUrl: '/polizzacar/polizzacar/uploadPDFfiles',
            uploadExtraData: function() {
                return {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    field_name: 'pdf_payment_proof',
                    polizzaId: $('#polizzacarId').val()
                };
            }
        });

    },

    signAndAcceptButton: function(){
        $(document).on('click','.btnUploadFile',function(e){
            e.preventDefault();
            $('div.flashmessage').text("");
            $('#modalUploadFile').modal({show: true});
        });
        $(document).on('click','.btnUploadFile2',function(e){
            e.preventDefault();
            $('div.flashmessage').text("");
            $('#modalUploadFile2').modal({show: true});
        });
    },

    signDocusignButton: function(){
        var signurl = '';
        $(document).on('click','.docuAjax',function(e){
            e.preventDefault();
            $('#signAjaxForm').modal({show: true});

            // $('#signAjaxForm .modal-dialog').removeClass('modal-lg').addClass('modal-xl');
            // $('#signAjaxForm .modal-title').html($.i18n._('choose_product_or_service'));
            if( $('#docuSigniFrame').is(':empty') ) {

                $('#signAjaxForm #docuSigniFrame').load('/polizzacar/polizzacar/docusign/'+VAANCE.polizza_Id, function (result) {

                    Url = $.parseJSON(result)
                    $('#iframe_loader').hide();

                    $('#docuSigniFrame').attr('src', Url.url);
                    
                    // $('#signAjaxForm').modal('hide');
                    signurl = Url.url;
                });
            }
        });

        $(document).on('click','#action-bar-btn-view-complete',function(e){
            e.preventDefault();
            console.log('here');
            $('#signAjaxForm').modal('hide');
        });
    },
    
    saveButton: function(){
        $(document).on('click','.btnSave',function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '/polizzacar/updateSignedContractPdfStatus',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'polizzaId' : $('#polizzacarId').val()
                },
                dataType: 'json',
                success: function (result) {                      
                    var status = result.data.status;
                    if (status == 'error') {
                      // alert(result.data.msg);
                      $('div.flashmessage').text("");      
                      $('div.flashmessage').append( 
                        "<div class='alert alert-danger'>" + 
                        result.data.msg +
                        "</div>"
                        );
                 
                    } else if (status == 'ok') {
                        //window.location.reload();
                        $('div.flashmessage').append( 
                            "<div class='alert alert-success'>" + 
                            result.data.msg +
                             "</div>"
                         );
                        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
                        $('#modalUploadFile').modal('hide');
                    }          
                }
            });
        });
        $(document).on('click','.btnSave2',function(e){
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: '/polizzacar/updatePaymentProofPdfStatus',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'polizzaId' : $('#polizzacarId').val()
                },
                dataType: 'json',
                success: function (result) {
                    var status = result.data.status;
                    if (status == 'error') {
                        $('div.flashmessage').text("");      
                      $('div.flashmessage').append( 
                        "<div class='alert alert-danger'>" + 
                        result.data.msg +
                        "</div>"
                        );
                      } else if (status == 'ok') {
                          VAANCE_Common.showNotification('bg-green', $.i18n._('upload_proof_success'));
                          $('#modalUploadFile2').modal('hide');
                          window.location.reload().delay(3000);
                    }                     
                }
            });
        });

        /* $(document).on('click', '#module_form', function (e) {
            e.preventDefault();
            
            var car_p1_limit_amount = parseFloat($('#car_p1_limit_amount').val() != '' ? $('#car_p1_limit_amount').val().replaceAll(',','').replaceAll('€ ','') : 0);
            
            if(car_p1_limit_amount < 15000000){
                document.getElementById("module_form").submit();
            }                
            else{
                $('#confirmlimit').modal({show:true});
                console.log(car_p1_limit_amount);
            }
                
        });

        $(document).on('click','.confirm', function(e){
            e.preventDefault();
            
            var car_p1_limit_amount = parseFloat($('#car_p1_limit_amount').val() != '' ? $('#car_p1_limit_amount').val().replaceAll(',','').replaceAll('€ ','') : 0);
            var car_p2_limit_amount = parseFloat($('#car_p2_limit_amount').val() != '' ? $('#car_p2_limit_amount').val().replaceAll(',','').replaceAll('€ ','') : 0);
            var car_p3_limit_amount = parseFloat($('#car_p3_limit_amount').val() != '' ? $('#car_p3_limit_amount').val().replaceAll(',','').replaceAll('€ ','') : 0);

            if(car_p2_limit_amount >= 5000000 && car_p3_limit_amount >= 5000000 ){
                $('#confirmlimit').modal('hide');
                document.getElementById("module_form").submit();
            }                
            // else
            //     $('#confirmlimit').modal('show');
        });*/
    }

};

VAANCE_PolizzaCar.init();