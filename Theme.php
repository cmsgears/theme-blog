<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace themes\blog;

// Yii Imports
use Yii;

class Theme extends \cmsgears\core\common\base\Theme {

	// Variables ---------------------------------------------------

	// Globals ----------------

	const MENU_MAIN			= 'main';
	const MENU_SECONDARY	= 'secondary';
	const MENU_LINKS		= 'links';
	const MENU_PAGE			= 'page';

	// Public -----------------

    public $pathMap = [
        '@frontend/views' => '@themes/blog/views',
        '@cmsgears' => '@themes/blog/modules/cmsgears'
    ];

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

    public function init() {

        parent::init();

		// The path for templates
		Yii::setAlias( '@themeTemplates', '@themes/blog/views/templates' );
	}

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// Theme ---------------------------------

}
