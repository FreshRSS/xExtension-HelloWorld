<?php
declare(strict_types=1);

class FreshExtension_index_Controller extends FreshRSS_index_Controller {
	public function aboutAction(): void {
		Minz_View::prependTitle(_t('ext.hello_world.about.title') . ' · ');
	}
}
