<?php

class HelloWorldExtension extends Minz_Extension {
	public function init() {
		Minz_View::appendStyle($this->getFileUrl('style.css', 'css'));
		Minz_View::appendScript($this->getFileUrl('script.js', 'js'));

		$this->registerController('hello');
		$this->registerController('index');
		$this->registerViews();
	}
}
