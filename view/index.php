<div id="content">
    <div id="left">
        <div id="menu">
            <h2>Меню</h2>
            <ul>
                <li><a href="#">Ссылка 1</a></li>
                <li><a href="#">Ссылка 2</a></li>
                <li><a href="#">Ссылка 3</a></li>
                <li><a href="#">Ссылка 4</a></li>
                <li><a href="#">Ссылка 5</a></li>
            </ul>
        </div>
    </div>



    <div id="right">

        <!-- Кнопка входа на сай, ссылка на регистрацию-->
        <?php if(isset($_SESSION['login'])): ?>
            <div id="intrance">
                <p>Здравствуйте, <?php echo $_SESSION['login'] ?></p>
                <p><a href="/?logout">Выход</a> </p>
            </div>
        <?php else: ?>
        <div id="intrance">
            <p><input type="button" class="button popup-link-1" value="Войти"></p>
            <p><a href="" class="popup-link-2">Зарегистрироваться</a></p>
        </div>
        <?php endif ?>
        <!-- ----------------------------------------------------------- -->


        <!-- Попап входа на сайт -->
        <div class="popup-box" id="popup-box-1">
            <div class="close">X</div>
            <div class="top">
                <h2>Вход на сайт</h2>
            </div>
            <div class="bottom">
                <form action="../route.php" name="login_form" id="login_form" method="post">
                    <p><label for="login">Логин:</label></p>
                    <p><input type="text" name="login" id="login"></p>

                    <p><label for="password">Пароль:</label></p>
                    <p><input type="password" name="password" id="password"></p>

                    <p><input class="button" type="submit" name="login_send" id="login_send" value="Отправить"></p>
                </form>
            </div>
        </div>
        <!-- -------------------------------------------------------------------- -->



        <!-- Попап на регистрацию -->
        <div class="popup-box" id="popup-box-2">
            <div class="close">X</div>
            <div class="top">
                <h2>Регистрация</h2>
            </div>
            <div class="bottom">
                <form action="#" name="register_form" id="register_form" method="post">
                    <p><label for="register_name">*Имя:</label></p>
                    <p><input type="text" name="register_name" id="register_name"><span style="color: red" id="err_register_name"></span> </p>

                    <p><label for="register_surname">*Фамилия:</label></p>
                    <p><input type="text" name="register_surname" id="register_surname"><span style="color: red" id="err_register_surname"></span></p>

                    <p><label for="register_login">*Логин:</label></p>
                    <p><input type="text" name="register_login" id="register_login"><span style="color: red" id="err_register_login"></span></p>

                    <p><label for="register_email">*E-mail:</label></p>
                    <p><input type="email" name="register_email" id="register_email"><span style="color: red" id="err_register_email"></span></p>

                    <p><label for="register_password">*Пароль:</label></p>
                    <p><input type="password" name="register_password" id="register_password"><span style="color: red" id="err_register_password"></span></p>

                    <p><label for="register_password_confirm">*Пароль еще раз:</label></p>
                    <p><input type="password" name="register_password_confirm" id="register_password_confirm"></p>
                    <p ><span style="color: red" id="err_register_password_confirm"></span></p>

                    <p><input class="button" type="button" name="register_send" id="register_send" value="Отправить"></p>
                </form>
                <div id="success">Регистрация прошла успешно</div>
                <div id="error_save_user">Не удалось сохранить пользователся в базу данных</div>
            </div>
        </div>
        <!-- --------------------------------------------------------------------- -->

    </div>
    <div id="center">
        <?php echo $page->getMainContent(); ?>
    </div>
</div>
