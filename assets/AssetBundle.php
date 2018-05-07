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
		// scripts
        'scripts/main.js',
        'scripts/search.js',
		// apix
		'scripts/apix/public.js',
		// apps
        'scripts/apps/public.js'
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
    	//'cmsgears\core\common\assets\Jquery',
		'cmsgears\core\common\assets\Conditionizr',
		'cmsgears\core\common\assets\JqueryUi',
		'cmsgears\core\common\assets\CmgToolsJs',
		'cmsgears\core\common\assets\Handlebars',
		'cmsgears\core\common\assets\ImagesLoaded',
		'cmsgears\core\common\assets\MCustomScrollbar',
		'cmsgears\core\common\assets\NoUiSlider',
		'cmsgears\core\common\assets\ProgressBar',
		'cmsgears\core\common\assets\Animate',
		'cmsgears\widgets\aform\assets\FormAssets',
		'cmsgears\icons\assets\IconAssets'
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
