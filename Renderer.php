<?php

require_once 'twig/Autoloader.php';

class Renderer {

	var $variables = array();
	var $postfix = '.html';
	var $add_usefull_functions = true;

	function Renderer() {
		global $settings;
		Twig_Autoloader::register();
		$loader = new Twig_Loader_Filesystem('templates');
		$twig_settings = array('debug'=>$settings['debug']);
		if($settings['cache_templates']) {
			$twig_settings['cache'] = 'cache';
		}
		$this->twig = new Twig_Environment($loader, $twig_settings);
		if ($this->add_usefull_functions) {
			$this->twig->addFunction('rand', new Twig_Function_Function('rand'));
		}
	}

	function add_variable($name, $value) {
		$this->variables[$name] = $value;
	}

	function render($template_name, $use_postfix = true) {
		$template = $this->twig->loadTemplate($template_name . ($use_postfix ? $this->postfix : ''));
		echo $template->render($this->variables);
	}

}
