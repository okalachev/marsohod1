<?php

class HTTPErrors {

	static function show_404() {
		Header('HTTP/1.1 404 Not Found');
		echo '404';
	}

	static function show_403($url) {
		global $settings;
		Header('HTTP/1.1 301 Moved Permanently');
		Header('Location: ' . $settings['url_base'] . $url);
	}

}
