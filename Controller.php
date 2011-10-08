<?php

abstract class Controller {

	function Controller(Renderer $renderer) {
		$this->renderer = $renderer;
	}

}
