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
 * LandingAssets registers the assets specific to landing page.
 *
 * @since 1.0.0
 */
class LandingAssets extends AssetBundle {

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
		'styles/landing.css'
    ];

    // Protected --------------

    // Private ----------------

    // Traits ------------------------------------------------------

    // Constructor and Initialisation ------------------------------

	public function init() {

		parent::init();

		$this->js[] = 'scripts/main.js';
		$this->js[] = 'scripts/search.js';
		$this->js[] = 'scripts/sliders.js';
		$this->js[] = 'scripts/popups.js';

		$this->depends[] = 'foxslider\widgets\assets\FxsAssets';
	}

    // Instance methods --------------------------------------------

    // Yii interfaces ------------------------

    // Yii parent classes --------------------

    // CMG interfaces ------------------------

    // CMG parent classes --------------------

    // LandingAssets -------------------------

}
