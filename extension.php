<?php

class HelloWorldExtension extends Minz_Extension {
	public function init() {
		Minz_View::appendStyle($this->getFileUrl('style.css', 'css'));
		Minz_View::appendScript($this->getFileUrl('script.js', 'js'));

		$this->registerTranslates();

		$this->registerController('hello');
		$this->registerController('index');
		$this->registerViews();

		// $this->registerHook('entry_before_insert',
		//                     array('HelloWorldExtension', 'setHelloWorldContentHook'));
		$this->registerHook('entry_before_display',
		                    array('HelloWorldExtension', 'setHelloWorldTitleHook'));
		$this->registerHook('feed_before_insert',
		                    array('HelloWorldExtension', 'noMoreFeedsHook'));
	}

	public function handleConfigureAction() {
		$this->registerTranslates();
	}

	public static function setHelloWorldContentHook($entry) {
		$entry->_content('Hello world!');
		return $entry;
	}

	private static $hello_world_title_odd = false;
	public static function setHelloWorldTitleHook($entry) {
		if (self::$hello_world_title_odd) {
			$entry->_title('Hello world!');
		}
		self::$hello_world_title_odd = !self::$hello_world_title_odd;
		return $entry;
	}

	public static function noMoreFeedsHook($feed) {
		$feedDAO = FreshRSS_Factory::createFeedDao();
		$feeds = $feedDAO->listFeeds();

		if (count($feeds) >= 10) {
			return null;
		} else {
			return $feed;
		}
	}
}
