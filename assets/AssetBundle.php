<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

namespace themes\blog\assets;

// Yii Imports
use yii\web\AssetBundle as BaseAssetBundle;
use yii\web\View;

/**
 * AssetBundle registers the global assets.
 *
 * @since 1.0.0
 */
class AssetBundle extends BaseAssetBundle {

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
	public $sourcePath = '@themes/blog/resources';

	/**
	 * @inheritdoc
	 */
	public $cssOptions = [
		'position' => View::POS_HEAD
	];

	/**
	 * @inheritdoc
	 */
	public $js = [
		// vendor
		// templates
        'scripts/templates/public.js',
		// apix
		'scripts/apix/public.js',
		// apps
		'scripts/apps/autoload.js',
        'scripts/apps/public.js',
		'scripts/apps/core/controllers/site.js'
	];

	/**
	 * @inheritdoc
	 */
    public $jsOptions = [
        'position' => View::POS_END
    ];

	/**
	 * @inheritdoc
	 */
    public $depends = [
    	'cmsgears\assets\jquery\Jquery',
		//'cmsgears\assets\utilities\Conditionizr',
		'cmsgears\assets\utilities\ImagesLoaded',
		'cmsgears\assets\jquery\JqueryUi',
		'cmsgears\assets\cmgtools\Velocity',
		'cmsgears\assets\templates\Handlebars',
		'cmsgears\assets\components\MCustomScrollbar',
		//'cmsgears\assets\components\NoUiSlider',
		//'cmsgears\assets\components\ProgressBar',
		//'cmsgears\assets\effects\Animate',
		//'cmsgears\widgets\aform\assets\FormAssets',
		'themes\blog\assets\vapps\FormAssets',
		'cmsgears\icons\assets\IconAssets',
		'themes\blog\assets\vapps\BaseAssets'
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

    // AssetBundle ---------------------------

}
