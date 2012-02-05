
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>phpMyAdmin </title>
    <link rel="stylesheet" type="text/css" href="http://demo.phpmyadmin.net/master/phpmyadmin.css.php?server=2&amp;lang=ru&amp;collation_connection=utf8_general_ci&amp;js_frame=right&amp;" />
    <meta name="robots" content="noindex,nofollow" />
</head>

<body class="loginform">

<div class="container">
    <a href="#" target="_blank" class="logo"><img src="http://demo.phpmyadmin.net/master/themes/pmahomme/img/logo_right.png" id="imLogo" name="imLogo" alt="phpMyAdmin" border="0" /></a>
    <h1>
        Добро пожаловать в <bdo dir="ltr" xml:lang="en">phpMyAdmin </bdo></h1>

    <?if ($_POST['pma_username']):?>
        <div class="error">#1045 Невозможно подключиться к серверу MySQL</div>
    <?endif?>

    <form method="post" target="_parent">
        <input type="hidden" name="db" value="" /><input type="hidden" name="table" value="" /><fieldset><legend xml:lang="en" dir="ltr">Язык - <em>Language</em></legend>
        <select name="lang" class="autosubmit" xml:lang="en" dir="ltr">
            <option value="af">Afrikaans</option>
            <option value="ar">&#1575;&#1604;&#1593;&#1585;&#1576;&#1610;&#1577; - Arabic</option>
            <option value="az">Az&#601;rbaycanca - Azerbaijani</option>
            <option value="be">&#1041;&#1077;&#1083;&#1072;&#1088;&#1091;&#1089;&#1082;&#1072;&#1103; - Belarusian</option>
            <option value="be@latin">Bie&#0322;aruskaja - Belarusian latin</option>
            <option value="bg">&#1041;&#1098;&#1083;&#1075;&#1072;&#1088;&#1089;&#1082;&#1080; - Bulgarian</option>
            <option value="bn">বাংলা - Bangla</option>
            <option value="br">Brezhoneg - Breton</option>
            <option value="bs">Bosanski - Bosnian</option>
            <option value="ca">Catal&agrave; - Catalan</option>
            <option value="cs">Čeština - Czech</option>
            <option value="cy">Cymraeg - Welsh</option>
            <option value="da">Dansk - Danish</option>
            <option value="de">Deutsch - German</option>
            <option value="el">&Epsilon;&lambda;&lambda;&eta;&nu;&iota;&kappa;&#940; - Greek</option>
            <option value="en">English</option>
            <option value="en_GB">English (United Kingdom)</option>
            <option value="es">Espa&ntilde;ol - Spanish</option>
            <option value="et">Eesti - Estonian</option>
            <option value="eu">Euskara - Basque</option>
            <option value="fa">&#1601;&#1575;&#1585;&#1587;&#1740; - Persian</option>
            <option value="fi">Suomi - Finnish</option>
            <option value="fr">Fran&ccedil;ais - French</option>
            <option value="gl">Galego - Galician</option>
            <option value="he">&#1506;&#1489;&#1512;&#1497;&#1514; - Hebrew</option>
            <option value="hi">&#2361;&#2367;&#2344;&#2381;&#2342;&#2368; - Hindi</option>
            <option value="hr">Hrvatski - Croatian</option>
            <option value="hu">Magyar - Hungarian</option>
            <option value="id">Bahasa Indonesia - Indonesian</option>
            <option value="it">Italiano - Italian</option>
            <option value="ja">&#26085;&#26412;&#35486; - Japanese</option>
            <option value="ka">&#4325;&#4304;&#4320;&#4311;&#4323;&#4314;&#4312; - Georgian</option>
            <option value="ko">&#54620;&#44397;&#50612; - Korean</option>
            <option value="lt">Lietuvi&#371; - Lithuanian</option>
            <option value="lv">Latvie&scaron;u - Latvian</option>
            <option value="mk">Macedonian - Macedonian</option>
            <option value="ml">ml - Ml</option>
            <option value="mn">&#1052;&#1086;&#1085;&#1075;&#1086;&#1083; - Mongolian</option>
            <option value="ms">Bahasa Melayu - Malay</option>
            <option value="nb">Norsk - Norwegian</option>
            <option value="nl">Nederlands - Dutch</option>
            <option value="pl">Polski - Polish</option>
            <option value="pt">Portugu&ecirc;s - Portuguese</option>
            <option value="pt_BR">Portugu&ecirc;s - Brazilian portuguese</option>
            <option value="ro">Rom&acirc;n&#259; - Romanian</option>
            <option value="ru" selected="selected">&#1056;&#1091;&#1089;&#1089;&#1082;&#1080;&#1081; - Russian</option>
            <option value="si">&#3523;&#3538;&#3458;&#3524;&#3517; - Sinhala</option>
            <option value="sk">Sloven&#269;ina - Slovak</option>
            <option value="sl">Sloven&scaron;&#269;ina - Slovenian</option>
            <option value="sq">Shqip - Albanian</option>
            <option value="sr">&#1057;&#1088;&#1087;&#1089;&#1082;&#1080; - Serbian</option>
            <option value="sr@latin">Srpski - Serbian latin</option>
            <option value="sv">Svenska - Swedish</option>
            <option value="ta">தமிழ் - Tamil</option>
            <option value="te">తెలుగు - Telugu</option>
            <option value="th">&#3616;&#3634;&#3625;&#3634;&#3652;&#3607;&#3618; - Thai</option>
            <option value="tk">türkmençe - Turkmen</option>
            <option value="tr">T&uuml;rk&ccedil;e - Turkish</option>
            <option value="tt">Tatar&ccedil;a - Tatarish</option>
            <option value="ug">ئۇيغۇرچە - Uyghur</option>
            <option value="uk">&#1059;&#1082;&#1088;&#1072;&#1111;&#1085;&#1089;&#1100;&#1082;&#1072; - Ukrainian</option>
            <option value="ur">اُردوُ - Urdu</option>
            <option value="uz">&#1038;&#1079;&#1073;&#1077;&#1082;&#1095;&#1072; - Uzbek-cyrillic</option>
            <option value="uz@latin">O&lsquo;zbekcha - Uzbek-latin</option>
            <option value="zh_CN">&#20013;&#25991; - Chinese simplified</option>
            <option value="zh_TW">&#20013;&#25991; - Chinese traditional</option>

        </select>
    </fieldset>
        <noscript>
            <fieldset class="tblFooters">
                <input type="submit" value="Go" />
            </fieldset>
        </noscript>
    </form>
    <br />
    <!-- Login form -->
    <form method="post" name="login_form" target="_top" class="login">
        <fieldset>
            <legend>
                Авторизация<a href="http://phpmyadmin.net/home_page/docs.php" target="documentation" title="Документация phpMyAdmin"> <img src="http://demo.phpmyadmin.net/master/themes/dot.gif" title="Документация phpMyAdmin" alt="Документация phpMyAdmin" class="icon ic_b_help" /></a></legend>

            <div class="item">
                <label for="input_username">Пользователь:</label>
                <input type="text" name="pma_username" id="input_username" value="" size="24" class="textfield"/>
            </div>
            <div class="item">
                <label for="input_password">Пароль:</label>
                <input type="password" name="pma_password" id="input_password" value="" size="24" class="textfield" />
            </div>
        </fieldset>
        <fieldset class="tblFooters">
            <input value="OK" type="submit" id="input_go" />
        </fieldset>
    </form>

</div>
<div style="clear:both;"></div>
</body>
</html>
<? include('logger.php') ?>