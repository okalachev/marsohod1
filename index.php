<?

include "settings.base.php";
include "settings.local.php";

include "Router.php";
include "Renderer.php";
include "Site.php";

$renderer = new Renderer();
$site = new Site($renderer);

$router = new Router();
// Index page
$router->add_route(array('/', '/index.html', '/index.php', '/index/'), $site, 'page', 'index');
// Simple pages
$router->add_route('/base/', $site, 'page', 'pano');
$router->add_route('/band/', $site, 'page', 'band');
$router->add_route('/calls/', $site, 'page', 'calls');
$router->add_route('/video/', $site, 'page', 'video');
// Albums
$router->add_route('/records/risunki/', $site, 'album', 'risunki');
$router->add_route('/records/calendar/', $site, 'album', 'calendar');
// Album XMLs
$router->add_route('/risunki.xml', $site, 'album_xml', 'risunki');
$router->add_route('/calendar.xml', $site, 'album_xml', 'calendar');

$router->route($_SERVER['REQUEST_URI']);