<?php

class URLParser {

	static function parse($url) {
		return preg_replace('/(\/+)/', '/', $url);
	}

}
