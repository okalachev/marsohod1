<?

/*
 * Production settings
 */

error_reporting(0);

global $settings;

$settings['cache_templates'] = false;
$settings['debug'] = false;
$settings['url_base'] = 'http://marsohod1.ru';
$settings['social'] = true;

// Yandex metrica counter
$settings['metrica'] = '<!-- Yandex.Metrika counter -->
<div style="display:none;"><script type="text/javascript">
(function(w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter10240978 = new Ya.Metrika({id:10240978,
                    clickmap:true,
                    trackLinks:true});
        }
        catch(e) { }
    });
})(window, "yandex_metrika_callbacks");
</script></div>
<script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script>
<noscript><div><img src="//mc.yandex.ru/watch/10240978" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->';