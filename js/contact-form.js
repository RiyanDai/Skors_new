jQuery(document).ready(function($) {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        console.log('Form submitted');
        
        var form = $(this);
        var formContainer = $('.form'); // Container untuk form
        var submitButton = form.find('button[type="submit"]');
        var sendmessage = $('#sendmessage');
        var errormessage = $('#errormessage');
        
        // Debug data
        console.log('Form data:', {
            name: form.find('input[name="name"]').val(),
            email: form.find('input[name="email"]').val(),
            subject: form.find('input[name="subject"]').val(),
            message: form.find('textarea[name="message"]').val()
        });
        
        // Disable submit button
        submitButton.prop('disabled', true);
        
        // Clear messages
        sendmessage.hide();
        errormessage.hide();
        
        $.ajax({
            url: contactForm.ajaxurl,
            type: 'POST',
            data: {
                action: 'contact_form_submit',
                nonce: contactForm.nonce,
                name: form.find('input[name="name"]').val(),
                email: form.find('input[name="email"]').val(),
                subject: form.find('input[name="subject"]').val(),
                message: form.find('textarea[name="message"]').val()
            },
            success: function(response) {
                if (response.success) {
                    // Sembunyikan form
                    form.fadeOut(400, function() {
                        // Tampilkan pesan sukses dengan style yang bagus
                        formContainer.html(`
                            <div class="text-center success-message">
                                <i class="fa fa-check-circle"></i>
                                <h4>Thank you!</h4>
                                <p>Your message has been sent.</p>
                            </div>
                        `);
                    });
                } else {
                    errormessage.html(response.data).fadeIn();
                    submitButton.prop('disabled', false);
                }
            },
            error: function() {
                errormessage.html('An error occurred. Please try again.').fadeIn();
                submitButton.prop('disabled', false);
            }
        });
    });
}); 