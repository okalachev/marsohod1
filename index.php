<?

// Settings

$settings['cache_templates'] = true;
$settings['debug'] = false;
$settings['url_base'] = '';

include("local_settings.php");

// Initialize Twig

require_once '/twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('templates');

$twig_settings = array('debug'=>$settings['debug']);
if($settings['cache_templates']) {
	$twig_settings['cache'] = 'cache';
}

$twig = new Twig_Environment($loader, $twig_settings);

// Parse URL

$real_query = $_SERVER['REQUEST_URI'];
$query = preg_replace('/(\/+)/', '/', $real_query); // Removing unnecessary slashes

$pages = array(
	'/'=>'index',
	'/index.html'=>'index',
	'/index.php'=>'index',
	'/index'=>'index',
	'/records/risunki'=>'risunki',
	'/records/2011'=>'demo2011',
	'/base'=>'pano',
	'/photo'=>'photo'
);

// Responding

if (isset($pages[$query])) {
	if($real_query != $query) {
		// Redirect to correct URL
		Header('HTTP/1.1 301 Moved Permanently');
		Header('Location: ' . $settings['url_base'] . $query);
	} else {
		// Render page
		$template_name = $pages[$query] . '.html';
		$template = $twig->loadTemplate($template_name);
		echo $template->render(array());
	}
} else {
	// Error 404
	Header('HTTP/1.1 404 Not Found');
	echo '404';
}