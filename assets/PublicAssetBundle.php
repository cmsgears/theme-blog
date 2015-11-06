<?php
namespace themes\blog\assets;

// Yii Imports
use \Yii;
use yii\web\AssetBundle;
use yii\web\View;

class PublicAssetBundle extends AssetBundle {

	// Variables ---------------------------------------------------

	// Public ----

	// Path Configuration
	public $sourcePath	= '@themes/blog/resources';

	// Load css
    public $css     = [
		'styles/public.css'
    ];

	// Position to load css
    public $cssOptions = [
        "position" => View::POS_HEAD
    ];

	// Load Javascript
    public $js      = [
        'scripts/vendor/conditionizr-4.4.0.min.js',
        'conditionizr/detects/ie6-ie7-ie8-ie9.js',
        'scripts/vendor/imagesloaded.pkgd-3.2.0.min.js',
        'scripts/main.js'
    ];

	// Position to load Javascript
    public $jsOptions = [
        'position' => View::POS_END
    ];

	// Define dependent Asset Loaders
    public $depends = [
		'yii\web\JqueryAsset',
		'cmsgears\core\common\assets\CMTAssetBundle'
    ];

	// Constructor and Initialisation ------------------------------

	public function __construct()  {

		parent::__construct();
	}

	// Additional Assets Registration ------------------------------

	public function registerAssetFiles( $view ) {

		parent::registerAssetFiles( $view );

		$inlineScript	= "conditionizr.config({
			assets: 'conditionizr/resources/',
		        tests: {
		        ie6: [ 'script', 'style', 'class' ],
		        ie7: [ 'script', 'style', 'class' ],
		        ie8: [ 'script', 'style', 'class' ]
		        }
		    });

    		conditionizr.polyfill( 'scripts/vendor/html5shiv.min.js', [ 'ie6', 'ie7', 'ie8' ] );
    		conditionizr.polyfill( 'scripts/vendor/respond.min.js', [ 'ie6', 'ie7', 'ie8' ] );";

		$view->registerJs( $inlineScript, View::POS_READY );
	}
}

?>