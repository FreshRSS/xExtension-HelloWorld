<?php

class HelloWorldExtension extends Minz_Extension {
	public function init() {
		Minz_View::appendStyle($this->getFileUrl('style.css', 'css'));
		Minz_View::appendScript($this->getFileUrl('script.js', 'js'));

		$this->registerController('hello');
		$this->registerController('index');
		$this->registerViews();

		$this->registerHook('entry_before_insert',
		                    array('HelloWorldExtension', 'setHelloWorldHook'));
	}

	public static function setHelloWorldHook($entry) {
		$entry->_content('Hello world!');
		return $entry;
	}
}
