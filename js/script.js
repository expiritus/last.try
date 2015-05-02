$(document).ready(function() {

    /*Форма входа на сайт*/

    $('body').append('<div id="blackout"></div>');

    var boxWidth = 400;

    function centerBox() {

        /* определяем нужные данные */
        var winWidth = $(window).width();
        var winHeight = $(document).height();
        var scrollPos = $(window).scrollTop();

        /* Вычисляем позицию */

        var disWidth = (winWidth - boxWidth) / 2
        var disHeight = scrollPos + 150;

        /* Добавляем стили к блокам */
        $('.popup-box').css({'width' : boxWidth+'px', 'left' : disWidth+'px', 'top' : disHeight+'px'});
        $('#blackout').css({'width' : winWidth+'px', 'height' : winHeight+'px'});

        return false;
    }

    $(window).resize(centerBox);
    $(window).scroll(centerBox);
    centerBox();

    $('[class*=popup-link]').click(function(e) {

        /* Предотвращаем действия по умолчанию */
        e.preventDefault();
        e.stopPropagation();

        /* Получаем id (последний номер в имени класса ссылки) */
        var name = $(this).attr('class');
        var id = name[name.length - 1];
        var scrollPos = $(window).scrollTop();

        /* Корректный вывод popup окна, накрытие тенью, предотвращение скроллинга */
        $('#popup-box-'+id).show();
        $('#blackout').show();
        $('html,body').css('overflow', 'auto');

        /* Убираем баг в Firefox */
        $('html').scrollTop(scrollPos);
    });

    $('[class*=popup-box]').click(function(e) {
        /* Предотвращаем работу ссылки, если она являеться нашим popup окном */
        e.stopPropagation();
    });
    $('html').click(function() {
        var scrollPos = $(window).scrollTop();
        /* Скрыть окно, когда кликаем вне его области */
        $('[id^=popup-box-]').hide();
        $('#blackout').hide();
        $("html,body").css("overflow","auto");
        $('html').scrollTop(scrollPos);
    });
    $('.close').click(function() {
        var scrollPos = $(window).scrollTop();
        /* Скрываем тень и окно, когда пользователь кликнул по X */
        $('[id^=popup-box-]').hide();
        $('#blackout').hide();
        $("html,body").css("overflow","auto");
        $('html').scrollTop(scrollPos);
    });

    /*############################################*/



    /*Форма регистрации*/

    $('[class*=popup-link-2]').click(function(e) {
        $('#register_form').show();
        $('#success').hide();
        $('#error_save_user').hide();
        $('#err_register_password_confirm').hide();

        /* Предотвращаем действия по умолчанию */
        e.preventDefault();
        e.stopPropagation();

        /* Получаем id (последний номер в имени класса ссылки) */
        var name = $(this).attr('class');
        var id = name[name.length - 1];
        var scrollPos = $(window).scrollTop();

        /* Корректный вывод popup окна, накрытие тенью, предотвращение скроллинга */
        $('#popup-box-'+id).show();
        $('#blackout').show();
        $('html,body').css('overflow', 'auto');

        /* Убираем баг в Firefox */
        $('html').scrollTop(scrollPos);
    });

    $('[class*=popup-box-2]').click(function(e) {
        /* Предотвращаем работу ссылки, если она являеться нашим popup окном */
        e.stopPropagation();
    });
    $('html').click(function() {
        var scrollPos = $(window).scrollTop();
        /* Скрыть окно, когда кликаем вне его области */
        $('[id^=popup-box-]').hide();
        $('#blackout').hide();
        $("html,body").css("overflow","auto");
        $('html').scrollTop(scrollPos);
    });
    $('.close').click(function() {
        var scrollPos = $(window).scrollTop();
        /* Скрываем тень и окно, когда пользователь кликнул по X */
        $('[id^=popup-box-]').hide();
        $('#blackout').hide();
        $("html,body").css("overflow","auto");
        $('html').scrollTop(scrollPos);
    });
    /*############################################*/



    /*Проверка подтверждения пароля при регистрации и регистрация пользователя*/
        $('#register_send').on('click', function(){
            var register_send = $('#registr_send').val();
            var register_name = $('#register_name').val();
            var register_surname = $('#register_surname').val();
            var register_login = $('#register_login').val();
            var register_email = $('#register_email').val();
            var password = $('#register_password').val();
            var confirm_password = $('#register_password_confirm').val();
            if(register_name == ''){
                $('#err_register_name').html('Обязательное поле');
            }else{
                $('#err_register_name').html('');
            }

            if(register_surname == ''){
                $('#err_register_surname').html('Обязательное поле');
            }else{
                $('#err_register_surname').html('');
            }

            if(register_login == ''){
                $('#err_register_login').html('Обязательное поле');
            }else{
                $('#err_register_login').html('');
            }

            if(register_email == ''){
                $('#err_register_email').html('Обязательное поле');
            }else{
                $('#err_register_email').html('');
            }

            if(password == '') {
                $('#err_register_password').html('Обязательное поле');
                return false;
            }else{
                $('#err_register_password').html('');
            }

            if(register_name != '' && register_surname != '' && register_login != '' && register_email != '' &&  password == confirm_password){
                $.ajax({
                    url: '../route.php',
                    type: "POST",
                    data: {
                        register_send: register_send,
                        register_name: register_name,
                        register_surname: register_surname,
                        register_login: register_login,
                        register_email: register_email,
                        register_password: password
                    },
                    success: function(data){
                        if(data){
                            var reg_form = $('#register_form').hide();
                            var clear_input = reg_form.find('input[type=text], input[type=email], input[type=password]').val('');
                            $('#error_save_user').hide();
                            $('#success').show();
                        }else{
                            $('#register_form').hide();
                            $('#error_save_user').show();
                        }

                    }
                });
                return true;
            }else{
                if(password != confirm_password){
                    $('#err_register_password_confirm').show().html('Пароли не совпадают');
                    $('#register_password_confirm').select();
                    return false;
                }
                return false;
            }

        });

    /*###############################################*/


    /* Авторизация пользователя */
    $('#login_send').on('click', function(){
        var login = $('#login').val();
        var password = $('#password').val();
        var login_send = $('#login_send').val();
        //$.ajax({
        //    url: '../route.php',
        //    type: "POST",
        //    data: {
        //        login_send: login_send,
        //        login: login,
        //        password: password
        //    },
        //    dataType: "json",
        //    success: function(data){
        //        if(data){
        //            $('#login_form').hide();
        //            $('#greating_user').html('Здравствуйте, ' + data.login);
        //        }
        //    }
        //});
    });


    /*############################*/
});