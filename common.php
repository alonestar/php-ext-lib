<?php
defined ( 'APPLICATION_PATH' ) || define ( 'APPLICATION_PATH', realpath ( dirname ( __FILE__ ) ) );
set_include_path ( implode ( PATH_SEPARATOR, array (
		realpath ( APPLICATION_PATH . '/Library' ),
		get_include_path ()
) ) );

require_once APPLICATION_PATH . '/Library/Tools/Common.php';
Tools_Common::init ();





















//phpinfo();