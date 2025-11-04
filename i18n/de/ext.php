<?php

/******************************************************************************/
/* Each entry of that file can be associated with a comment to indicate its   */
/* state. When there is no comment, it means the entry is fully translated.   */
/* The recognized comments are (comment matching is case-insensitive):        */
/*   + TODO: the entry has never been translated.                             */
/*   + DIRTY: the entry has been translated but needs to be updated.          */
/*   + IGNORE: the entry does not need to be translated.                      */
/* When a comment is not recognized, it is discarded.                         */
/******************************************************************************/

return array(
	'hello_world' => array(
		'no_configuration' => 'Hier kann leider nichts konfiguriert werden!',
		'about' => array (
			'title' => 'Über: Hello World FreshRSS',
			'content' => 'Eine neue „Über“ Seite, die von der Erweiterung „xExtension-HelloWorld“ überschrieben wurde'
		),
	),
);
