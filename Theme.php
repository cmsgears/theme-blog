<?php
namespace themes\blog;

// Yii Imports
use \Yii;

class Theme extends \cmsgears\core\common\base\Theme {

	// Menus --------------------------------------------------------

	const MENU_MAIN			= 'main';
	const MENU_SECONDARY	= 'secondary';

	// Variables ----------------------------------------------------

	// Public

    public $pathMap = [
        '@frontend/views' => '@themes/blog/views',
        '@cmsgears' => '@themes/blog/modules/cmsgears'
    ];

	// Initialisation -----------------------------------------------

    public function init() {

        parent::init();

		// The path for templates
		Yii::setAlias( '@templates', '@themes/blog/views/templates' );
	}
}

?>