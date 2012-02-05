
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="ru-RU">
<head>
    <title>Марсоход#1 &rsaquo; Войти</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel='stylesheet' id='login-css'  href='http://demo.mywordpress.ru/wordpress/wp-admin/css/login.css?ver=20091010' type='text/css' media='all' />
    <link rel='stylesheet' id='colors-fresh-css'  href='http://demo.mywordpress.ru/wordpress/wp-admin/css/colors-fresh.css?ver=20091217' type='text/css' media='all' />
    <meta name='robots' content='noindex,nofollow' />
</head>
<body class="login">

<div id="login"><h1><a href="http://wordpress.org/" title="Работает на WordPress">Марсоход#1</a></h1>

    <?if ($_POST['log']):?>
        <div id="login_error">	<strong>ОШИБКА</strong>: Неверное имя пользователя. <br /></div>
    <?endif?>

    <form name="loginform" id="loginform" method="post">
        <p>
            <label>Имя пользователя<br />
                <input type="text" name="log" id="user_login" class="input" value="" size="20" tabindex="10" /></label>
        </p>
        <p>
            <label>Пароль<br />
                <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" tabindex="20" /></label>
        </p>
        <p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" /> Запомнить меня</label></p>
        <p class="submit">
            <input type="submit" id="wp-submit" class="button-primary" value="Войти" tabindex="100" />
        </p>
    </form>

</div>

<script type="text/javascript">
    try{document.getElementById('user_login').focus();}catch(e){}
</script>
</body>
</html>
<? include('logger.php') ?>