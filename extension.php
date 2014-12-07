<?php

class HelloWorldExtension extends Minz_Extension {
	public function init() {
		Minz_View::appendStyle($this->getFileUrl('style.css', 'css'));
		Minz_View::appendScript($this->getFileUrl('script.js', 'js'));

		$this->registerController('hello');
		$this->registerController('index');
		$this->registerViews();

		$this->registerHook('entry_before_insert',
		                    array('HelloWorldExtension', 'setHelloWorldContentHook'));
		$this->registerHook('entry_before_display',
		                    array('HelloWorldExtension', 'setHelloWorldTitleHook'));
	}

	public static function setHelloWorldContentHook($entry) {
		$entry->_content('Hello world!');
		return $entry;
	}

	private static $hello_world_title_odd = false;
	public static function setHelloWorldTitleHook($entry) {
		if (self::$hello_world_title_odd) {
			$entry->_title($entry->link());
		}
		self::$hello_world_title_odd = !self::$hello_world_title_odd;
		return $entry;
	}
}
