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
		'no_configuration' => 'Il n’y a rien à configurer dans cette extension, désolé !',
	),
	'about' => array (
		'title' => 'About: Hello World FreshRSS',	// TODO
		'content' => 'A new about page that was overwritten by the extension “xExtension-HelloWorld”'	// TODO
	),
);
