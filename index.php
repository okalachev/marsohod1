<?

require_once '/twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array('debug'=>true/*, 'cache'=>'cache'*/));

$pages = array(
	'/'=>'index',
	'/index.html'=>'index',
	'/index.php'=>'index',
	'index'=>'index',
	'/records/risunki'=>'risunki',
	'/base'=>'pano'
);

$query = $_SERVER['REQUEST_URI'];

if (isset($pages[$query])) {

	$template_name = $pages[$query] . '.html';

	$template = $twig->loadTemplate($template_name);
	echo $template->render(array());

} else {
	echo '404';
}
