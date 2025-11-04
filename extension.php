<?php
declare(strict_types=1);

class HelloWorldExtension extends Minz_Extension {

	#[\Override]
	public function init(): void {
		Minz_View::appendStyle($this->getFileUrl('style.css'));
		Minz_View::appendScript($this->getFileUrl('script.js'));

		$this->registerTranslates();

		$this->registerController('hello');
		$this->registerController('index');
		$this->registerViews();

		$this->registerHook('entry_before_display', [self::class, 'setHelloWorldTitleHook']);
		$this->registerHook('feed_before_insert', [self::class, 'noMoreFeedsHook']);
	}

	#[\Override]
	public function handleConfigureAction(): void {
		$this->registerTranslates();
	}

	public static function setHelloWorldTitleHook(FreshRSS_Entry $entry): FreshRSS_Entry {
		static $hello_world_title_odd = false;

		if ($hello_world_title_odd) {
			$entry->_title('Hello world!');
		}
		$hello_world_title_odd = !$hello_world_title_odd;
		return $entry;
	}

	/**
	 * @throws Minz_ConfigurationNamespaceException|Minz_PDOConnectionException
	 */
	public static function noMoreFeedsHook(FreshRSS_Feed $feed): ?FreshRSS_Feed {
		$feedDAO = FreshRSS_Factory::createFeedDao();
		$feeds = $feedDAO->listFeeds();

		if (count($feeds) >= 10) {
			return null;
		} else {
			return $feed;
		}
	}
}
