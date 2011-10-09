<?php

include('URLParser.php');
include('HTTPErrors.php');

class Router {

	var $routes = array();
	var $redirects = array();
	var $auto_closing_slashes = true;

	function add_route($queries, Controller $controller, $method_name, $params) {
		if (!is_array($params)) {
			$params = array($params);
		}
		if (!is_array($queries)) {
			$queries = array($queries);
		}
		foreach($queries as $query) {
			$this->routes[$query] = new Route($controller, $method_name, $params);
		}
	}

	function route($url = null) {
		if (!$url) {
			$url = Router::get_page_path();
		}
		$query = URLParser::parse($url);
		if (isset($this->routes[$query])) {
			if ($query != $url) {
				HTTPErrors::show_403($query);
			} else {
				$this->routes[$query]->run();
			}
		} elseif ($this->auto_closing_slashes && (isset($this->routes[$query . '/']))) {
			HTTPErrors::show_403($query . '/');
		} else {
			HTTPErrors::show_404();
		}
	}
	
	static function get_page_path() {
		return URLParser::parse(Router::full_page_url());
	}

	static function full_page_url() {
		$pageURL = 'http';
			if (@$_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}

}

class Route {

	function Route(Controller $controller, $method_name, $params) {
		$this->controller = $controller;
		$this->method_name = $method_name;
		$this->params = $params;
	}

	function run() {
		$method_name = $this->method_name;
		call_user_func_array(array($this->controller, $method_name), $this->params);
	}

}