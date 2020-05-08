$(document).ready(function () {

    $('.overlay').css({
        height: $(document).height()
    });

    $('.loading, .overlay').fadeOut();

    $('.copyright_date').html(new Date().getFullYear())

    /**
     ##########################################

     Application block

     ##########################################

     */

    /**
     * Create application
     */
    $('.create_application_button').click(function () {

        var form = $('.create_application_form'),
            formData = new FormData(form[0]),
            url = form.attr('action');

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            contentType: false,
            processData: false,
            crossDomain: true,
            data: formData,

            beforeSend: function(){

                $('.loading, .overlay').fadeIn();
            },

            success: function (data) {

                if (data.status === 0){
                    $('.error_create_msg').removeClass('hidden').html(data.msg);
                    $('.success_create_msg').addClass('hidden');

                } else {
                    $('.success_create_msg').removeClass('hidden').html(data.msg);
                    $('.error_create_msg').addClass('hidden');

                    var buffer = setInterval(function () {
                        window.location.reload();
                        clearInterval(buffer)
                    }, 200);

                }

                $('.loading, .overlay').fadeOut();

            }
        });

    });


    /**
     * get update application form
     */

    $('.update_application_link').click(function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'get',
            dataType: 'html',
            success: function (data) {
                $('.update_application_modal .modal-body').html(data);
            }
        })
    });

    /**
     * Update application
     */

    $('.update_application_button').click(function () {
        var form = $('.update_application_form'),
            formData = new FormData(form[0]),
            url = form.attr('action');

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            contentType: false,
            processData: false,
            crossDomain: true,
            data: formData,

            beforeSend: function(){

                $('.loading, .overlay').fadeIn();
            },

            success: function (data) {
                if (data.status === 0){
                    $('.error_update_msg').removeClass('hidden').html(data.msg);
                    $('.success_msg').addClass('hidden');
                } else {
                    $('.success_update_msg').removeClass('hidden').html(data.msg);
                    $('.error_update_msg').addClass('hidden');

                    var buffer = setInterval(function () {
                        window.location.reload();
                        clearInterval(buffer)
                    }, 200);

                }

                $('.loading, .overlay').fadeOut();
            }
        });
    });

    /**
     * Delete application
     */
    $('.delete_application_button').click(function (e) {
        e.preventDefault();

        if (confirm('هل تريد الحذف؟')){

            var id = $(this).attr('id'),
                tr = $('.tr_'+id);

            var form = $(this).parent('.delete_application_form'),
                formData = new FormData(form[0]),
                url = form.attr('action');

            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                contentType: false,
                processData: false,
                crossDomain: true,
                data: formData,

                beforeSend: function(){

                    $('.loading, .overlay').fadeIn();
                },

                success: function (data) {
                    if (data.status === 0){
                        $('.error_delete_msg').removeClass('hidden').html(data.msg);
                        $('.success_delete_msg').addClass('hidden');
                    } else {

                        $('.success_delete_msg').removeClass('hidden').html(data.msg);
                        $('.error_delete_msg').addClass('hidden');

                        tr.remove();

                        var buffer = setInterval(function () {
                            $('.success_delete_msg, .error_delete_msg').addClass('hidden');
                            clearInterval(buffer)
                        }, 2000);

                    }

                    $('.loading, .overlay').fadeOut();
                }
            });

        }
    });


    /**
     ##########################################

     Categories block

     ##########################################

     */

    /**
     * Create category
     */
    $('.create_category_button').click(function () {

        var form = $('.create_category_form'),
            formData = new FormData(form[0]),
            url = form.attr('action');

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            contentType: false,
            processData: false,
            crossDomain: true,
            data: formData,

            beforeSend: function(){

                $('.loading, .overlay').fadeIn();
            },

            success: function (data) {

                if (data.status === 0){
                    $('.error_create_msg').removeClass('hidden').html(data.msg);
                    $('.success_create_msg').addClass('hidden');
                } else {
                    $('.success_create_msg').removeClass('hidden').html(data.msg);
                    $('.error_create_msg').addClass('hidden');

                    var buffer = setInterval(function () {
                        window.location.reload();
                        clearInterval(buffer)
                    }, 200);

                }

                $('.loading, .overlay').fadeOut();
            }
        });

    });


    /**
     * get update application form
     */

    $('.update_category_link').click(function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'get',
            dataType: 'html',
            success: function (data) {
                $('.update_category_modal .modal-body').html(data);
            }
        })
    });

    /**
     * Update application
     */

    $('.update_category_button').click(function () {
        var form = $('.update_category_form'),
            formData = new FormData(form[0]),
            url = form.attr('action');

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            contentType: false,
            processData: false,
            crossDomain: true,
            data: formData,

            beforeSend: function(){

                $('.loading, .overlay').fadeIn();
            },

            success: function (data) {
                if (data.status === 0){
                    $('.error_update_msg').removeClass('hidden').html(data.msg);
                    $('.success_msg').addClass('hidden');
                } else {
                    $('.success_update_msg').removeClass('hidden').html(data.msg);
                    $('.error_update_msg').addClass('hidden');

                    var buffer = setInterval(function () {
                        window.location.reload();
                        clearInterval(buffer)
                    }, 200);

                }

                $('.loading, .overlay').fadeOut();
            }
        });
    });

    /**
     * Delete application
     */
    $('.delete_category_button').click(function (e) {
        e.preventDefault();

        if (confirm('هل تريد الحذف؟')){

            var id = $(this).attr('id'),
                tr = $('.tr_'+id);

            var form = $(this).parent('.delete_category_form'),
                formData = new FormData(form[0]),
                url = form.attr('action');

            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                contentType: false,
                processData: false,
                crossDomain: true,
                data: formData,

                beforeSend: function(){

                    $('.loading, .overlay').fadeIn();
                },

                success: function (data) {
                    if (data.status === 0){
                        $('.error_delete_msg').removeClass('hidden').html(data.msg);
                        $('.success_delete_msg').addClass('hidden');
                    } else {

                        $('.success_delete_msg').removeClass('hidden').html(data.msg);
                        $('.error_delete_msg').addClass('hidden');

                        tr.remove();

                        var buffer = setInterval(function () {
                            $('.success_delete_msg, .error_delete_msg').addClass('hidden');
                            clearInterval(buffer)
                        }, 2000);

                    }

                    $('.loading, .overlay').fadeOut();
                }
            });

        }
    });
    
    
    /********************** project ajax ***********************/
    /**
     * get update project form
     */

    $('.update_project_link').click(function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'get',
            dataType: 'html',
            success: function (data) {
                $('.update_project_modal .modal-body').html(data);
            }
        })
    });

    /***********************************************************/
    
    
    /********************** city ajax ***********************/
    /**
     * get update city form
     */

    $('.update_city_link').click(function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'get',
            dataType: 'html',
            success: function (data) {
                $('.update_city_modal .modal-body').html(data);
            }
        })
    });

    /***********************************************************/
    
    
    
    /*************************** user ajax ************************/

    /**
     * get update application form
     */

    $('.update_user_link').click(function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'get',
            dataType: 'html',
            success: function (data) {
                $('.update_user_modal .modal-body').html(data);
            }
        })
    });

    /**************************************************************/
    
    
        
    /*************************** offer ajax ************************/

    /**
     * get show offer form
     */

    $('.show_offer_link').click(function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'get',
            dataType: 'html',
            success: function (data) {
                $('.show_offer_modal .modal-body').html(data);
            }
        })
    });

    /**************************************************************/
    
    
   /*************************** message ajax ************************/

    /**
     * get show message form
     */

    $('.show_message_link').click(function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'get',
            dataType: 'html',
            success: function (data) {
                $('.show_message_modal .modal-body').html(data);
            }
        })
    });

    /**************************************************************/
    
    
       /*************************** milestone ajax ************************/

    /**
     * get show message form
     */

    $('.show_offer_milestone_link').click(function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'get',
            dataType: 'html',
            success: function (data) {
                $('.show_offer_milestone_modal .modal-body').html(data);
            }
        })
    });

    /**************************************************************/
    
   /*************************** dispute ajax ************************/

    /**
     * get update dispute form
     */

    $('.update_dispute_link').click(function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'get',
            dataType: 'html',
            success: function (data) {
                $('.update_dispute_modal .modal-body').html(data);
            }
        })
    });

    /**************************************************************/
    
    
       /*************************** invoice ajax ************************/

    /**
     * get update invoice form
     */

    $('.update_invoice_link').click(function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'get',
            dataType: 'html',
            success: function (data) {
                $('.update_invoice_modal .modal-body').html(data);
            }
        })
    });

    /**************************************************************/
    
    
    /*************************** receipt ajax ************************/

    /**
     * get update receipt form
     */

    $('.update_receipt_link').click(function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'get',
            dataType: 'html',
            success: function (data) {
                $('.update_receipt_modal .modal-body').html(data);
            }
        })
    });

    /**************************************************************/
    

    /**
     * Change password for admin
     */
    $('.change_password_button').click(function () {

        var form = $('.change_password_form'),
            url = form.attr('action'),
            formData = new FormData(form[0]);

        form.submit(function (e) {
            e.preventDefault();
        });

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            contentType: false,
            processData: false,
            crossDomain: true,
            data: formData,

            success: function (data) {

                if (data.status === 0){
                    $('.admin_error').removeClass('hidden').html(data.msg);
                    $('.admin_success').addClass('hidden');
                } else {

                    $('.admin_success').removeClass('hidden').html(data.msg);
                    $('.admin_error').addClass('hidden');
                    $('.change_password_form input[type=password]').each(function () {
                        $(this).val('');
                    })
                }

                var buffer = setInterval(function () {
                    $('.admin_error, .admin_success').addClass('hidden');
                    clearInterval(buffer);
                }, 3000);
            }
        })


    });
    $('.reset_password_button').click(function () {

        var form = $('.reset_password_form'),
            url = form.attr('action'),
            formData = new FormData(form[0]);

        form.submit(function (e) {
            e.preventDefault();
        });

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            contentType: false,
            processData: false,
            crossDomain: true,
            data: formData,

            success: function (data) {

                if (data.status === 0){
                    $('.admin_error').removeClass('hidden').html(data.msg);
                    $('.admin_success').addClass('hidden');

                } else {

                    $('.admin_success').removeClass('hidden').html(data.msg);
                    $('.admin_error').addClass('hidden');
                    $('.reset_password_form input[type=password], input[type=email]').each(function () {
                        $(this).val('');
                    })
                }

                var buffer = setInterval(function () {
                    $('.admin_error, .admin_success').addClass('hidden');
                    clearInterval(buffer);
                }, 3000);

            }
        })


    });


    /**
     * Show image on change
     */
    $(document).on('change', '.img', function () {

        var reader = new FileReader();

        reader.onload = function(e) {
            $('.img_content').html('<img src="'+e.target.result+'">');

        };

        reader.readAsDataURL(this.files[0]);

    });


    /**
     * Delete image
     */
    $(document).on('click', '.delete_img', function(){
        $('.img_content').html('');
        $('input#img').val('')
    });

});