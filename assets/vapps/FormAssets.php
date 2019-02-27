<?php
/**
 * This file is part of project EmpathyConnects. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.empathyconnects.org/
 * @copyright Copyright (c) 2018 Tathastu Social Initiatives
 */

namespace themes\blog\assets\vapps;

// Yii Imports
use yii\web\AssetBundle;
use yii\web\View;

/**
 * FormAssets registers the Velocity Apps of Form Module.
 *
 * @since 1.0.0
 */
class FormAssets extends AssetBundle {

	// Variables ---------------------------------------------------

	// Globals -------------------------------

	// Constants --------------

	// Public -----------------

	// Protected --------------

	// Variables -----------------------------

	// Public -----------------

	// Path Configuration
	public $sourcePath = '@bower/cmt-velocity-apps/src';

	// Load JS
	public $js = [
		'apps/forms/base.js',
		'apps/forms/controllers/form.js'
	];

	// JS Position
	public $jsOptions = [
		'position' => View::POS_END
	];

	// Protected --------------

	// Private ----------------

	// Traits ------------------------------------------------------

	// Constructor and Initialisation ------------------------------

	// Instance methods --------------------------------------------

	// Yii interfaces ------------------------

	// Yii parent classes --------------------

	// CMG interfaces ------------------------

	// CMG parent classes --------------------

	// FormAssets ----------------------------

}
