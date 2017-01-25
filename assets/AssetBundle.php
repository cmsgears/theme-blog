<?php
namespace themes\blog\assets;

// Yii Imports
use \Yii;
use yii\web\View;
use yii\helpers\Url;

class AssetBundle extends \yii\web\AssetBundle {

	// Variables ---------------------------------------------------

	// Public ----

	// Path Configuration
	public $sourcePath	= '@themes/blog/resources';

	// Position to load css
    public $cssOptions = [
        'position' => View::POS_HEAD
    ];

	// Load Javascript
    public $js      = [
        'scripts/main.js',
        'scripts/applications.js'
    ];

	// Position to load Javascript
    public $jsOptions = [
        'position' => View::POS_END
    ];

	// Define dependent Asset Loaders
    public $depends = [
		'yii\web\JqueryAsset',
		'cmsgears\core\common\assets\JqueryUi',
		'cmsgears\core\common\assets\CmgToolsJs',
		'cmsgears\core\common\assets\MCustomScrollbar',
		'cmsgears\core\common\assets\ImagesLoaded',
		'cmsgears\widgets\aform\assets\FormAssets',
		'cmsgears\icons\assets\IconAssets'
    ];

	// Constructor and Initialisation ------------------------------

	public function init()  {

		parent::init();
		
		// init
	}

	// Additional Assets Registration ------------------------------

	public function registerAssetFiles( $view ) {

		parent::registerAssetFiles( $view );

		$rootUrl = Url::toRoute( '/', true );

    	$siteUrl = "var siteUrl 	= '$rootUrl';
					var ajaxUrl 	= '" . $rootUrl ."apix/';";

		$view->registerJs( $siteUrl, View::POS_END );
	}
}

?>