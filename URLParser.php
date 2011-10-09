<?php

class URLParser {

	static function parse($url) {
		$url_parsed = parse_url($url);
		return preg_replace('/(\/+)/', '/', $url_parsed['path']);
	}

}
