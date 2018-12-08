<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace themes\blog\assets;

/**
 * PrivateAssets registers the assets specific to private pages.
 *
 * @since 1.0.0
 */
class PrivateAssets extends AssetBundle {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	/**
	 * @inheritdoc
	 */
    public $css = [
		'styles/private.css'
    ];

    // Protected --------------

    // Private ----------------

    // Traits ------------------------------------------------------

    // Constructor and Initialisation ------------------------------

	public function init() {

		parent::init();

		$this->js[] = 'scripts/templates/private.js';
		$this->js[] = 'scripts/apix/private.js';
		$this->js[] = 'scripts/apps/private.js';
		$this->js[] = 'scripts/apps/core/services/user.js';
		$this->js[] = 'scripts/apps/core/controllers/main.js';
		$this->js[] = 'scripts/apps/core/controllers/user.js';
		$this->js[] = 'scripts/main.js';
		$this->js[] = 'scripts/search.js';

		$this->depends[] = 'foxslider\widgets\assets\FxsAssets';
		$this->depends[] = 'themes\blog\assets\vapps\CoreAssets';
		$this->depends[] = 'themes\blog\assets\vapps\NotifyAssets';
	}

    // Instance methods --------------------------------------------

    // Yii interfaces ------------------------

    // Yii parent classes --------------------

    // CMG interfaces ------------------------

    // CMG parent classes --------------------

    // PrivateAssets -------------------------

}
