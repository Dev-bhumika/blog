$(function() {
    $('.form-validate-jquery').validate({
    //    ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
        errorClass: 'validation-invalid-label',
        successClass: 'validation-valid-label',
        validClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        success: function(label) {
            label.addClass('validation-valid-label').text('Success');           
        },

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Unstyled checkboxes, radios
            if (element.parents().hasClass('form-check')) {
                error.appendTo( element.parents('.form-check').parent() );
            }

            // Input with icons and Select2
            else if (element.parents().hasClass('form-group-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo( element.parent() );
            }

            // Input group, styled file input
            else if (element.parent().is('.uniform-uploader, .uniform-select') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }

            // Other elements
            else {
                error.insertAfter(element);
            }
        },
        rules: {
            val_password: {
                minlength: 6
            },
            val_confirm_password: {
                equalTo: '#val_password'
            },
            email: {
                email: true
            },
            repeat_email: {
                equalTo: '#email'
            },
            minimum_characters: {
                minlength: 10
            },
            maximum_characters: {
                maxlength: 10
            },
            minimum_number: {
                min: 10
            },
            maximum_number: {
                max: 10
            },
            number_range: {
                range: [10, 20]
            },
            url: {
                url: true
            },
            date: {
                date: true
            },
            date_iso: {
                dateISO: true
            },
            numbers: {
                number: true
            },
            digits: {
                digits: true
            },
            creditcard: {
                creditcard: true
            },
            basic_checkbox: {
                minlength: 2
            },
            styled_checkbox: {
                minlength: 2
            },
            switchery_group: {
                minlength: 2
            },
            switch_group: {
                minlength: 2
            }
        },
        messages: {
            val_password: {
                minlength: 'Password must be {0} characters long'
            },
            custom: {
                required: 'This is a custom error message'
            },
            basic_checkbox: {
                minlength: 'Please select at least {0} checkboxes'
            },
            styled_checkbox: {
                minlength: 'Please select at least {0} checkboxes'
            },
            switchery_group: {
                minlength: 'Please select at least {0} switches'
            },
            switch_group: {
                minlength: 'Please select at least {0} switches'
            },
            agree: 'Please accept our policy'
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

     
     
    $(".deleterow").click(function(){ 
        var id = $(this).data("id");
        var token = $(this).data("token");
        var action = $(this).data("action");
       
        if(action == 'companies'){
            var url = "companies/delete/"+id
        }  

        //swalInit
        swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this imaginary file!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-light'
          }).then((result) => {
            if (result.value) {                
                $.ajax(
                    {
                        url: url,
                        type: 'DELETE',
                        dataType: "json",
                        data: {
                            "id": id,
                            "_method": 'DELETE',
                            "_token": token,
                        },
                        success: function(success) 
                        {                            
                            swal(
                                success.message,                
                                success.status, 
                              )          
                              $('#tr-' + id).remove();    
                        }
                    });                           
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swal(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
              )
            }
          })    
          /* Regenerate Token */
         
    });
});

    $(document).ready(function() {
            
        /*$('.btn-submit').on('click',function(e){              
            e.preventDefault();          
           
            var id= $('#val_id').val();
                        
            var password= $('#val_password').val();
            var email= $('#val_email1').val();    
            var type = $('#val_type').val();                
            var token = $('input[name="_token"]').val();
 
            if(type == 'User')
            {
                var id1= $('#val_password_setup').val();
            } else {
                var id1= $('#val_activation_by_email').val();                
            }
           
            $.ajax({ 
                method: "POST",  
                dataType: "json",              
                url:  base_url + "/regeneratetoken/" + id,
                data: { id: id,val_password_setup : id1 ,"_token": token,val_password:password,val_email:email,type:type,val_type:type,'action':'reset'},
                success:function( msg ) {                                  
                    $('#regenerateToken').modal('hide');
                    $('.error-msg').show();
                    $('.error-msg').text(msg.data.message);            
                }                  
              })  
        });
*/
        
    });
    