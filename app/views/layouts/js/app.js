(function($) {
    "use strict"; // Start of use strict
    $('body').on('submit', '#login-form', function () {
        var form = $(this);
        var error = false;
        form.find('input').each(function () {
            if ($(this).val() == '') {
                $('.alert').removeClass('hide alert-success')
                    .addClass('alert-danger')
                    .html('Зaпoлнитe пoлe "' + $(this).attr('placeholder') + '"!');
                error = true;
            }
        });
        if (!error) {
            var data = form.serialize();
            $.ajax({
                type: 'POST',
                url: 'index.php?controller=user&action=login',
                dataType: 'json',
                data: data,
                beforeSend: function (data) {
                    form.find('input[type="submit"]').attr('disabled', 'disabled');
                },
                success: function (data) {
                    if (data['error']) {
                        $('.alert').removeClass('hide alert-success')
                            .addClass('alert-danger')
                            .html(data['error']);

                    } else {
                        $('.alert').removeClass('hide alert-danger')
                            .addClass('alert-success')
                            .html('Успешная авторизация');
                        location.href = '/';
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                },
                complete: function (data) {
                    form.find('input[type="submit"]').prop('disabled', false);
                }

            });
        }
        return false;
    });



    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 51
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function() {
        $('.navbar-toggle:visible').click();
    });

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 100
        }
    })
})(jQuery); // End of use strict