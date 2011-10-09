<?php

include("Controller.php");

class Site extends Controller {

	function page($template_name) {
		$this->renderer->render($template_name);
	}

	function photo_page($template, $photo) {
		$photo = $this->load_yaml_data($photo . '.photo');
		$this->renderer->add_variable('photos', $photo);
		$this->renderer->render($template);
	}

	function album_xml($name) {
		$this->renderer->add_variable("album", $this->load_yaml_data($name));
		$this->renderer->render("xml/album.xml", false);
	}

	function album($name) {
		$album = $this->load_yaml_data($name);
		$lyrics = $this->load_yaml_data('lyrics');
		foreach($album['tracks'] as &$track) {
			if (isset($lyrics[$track['title']])) {
				$track['lyrics'] = $lyrics[$track['title']];
			}
		}
		$photo = $this->load_yaml_data($name . '.photo');
		$this->renderer->add_variable('album', $album);
		$this->renderer->add_variable('photos', $photo);
		$this->renderer->render($name);
	}

	private function load_yaml_data($name) {
		require_once "spyc.php";
		return Spyc::YAMLLoad($name . '.yaml');
	}

}
