<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Вход в систему</title>
        <link href="/assets/html/css/style.css" rel="stylesheet" type="text/css" />
        <link href="/assets/html/css/fieldset.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/assets/html/js/jquery.js"></script>
    </head>

    <body>

        <div id="container">
            <div class="login">
                <div class="title"><h1>Авторизация</h1></div>
                <div class="login_bg">
                    <?php echo form_open("auth/login",array('id'=>"form_login"));?>
                    <fieldset>
                        <label for="name">Email</label>
                        <?php echo form_input($email);?>
                        <label for="pass">Пароль</label>
                        <?php echo form_input($password);?>

                    </fieldset>
                    <div class="clr"></div>
                    <input type="submit" class="button" value=""/>
                    <?php echo form_close();?>
                    <!-- end .login_bg --> </div>
                <!-- end .login --></div>

            <!-- end .container --></div>
    </body>
</html>

