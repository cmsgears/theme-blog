<?php
namespace themes\blog\assets;

// Yii Imports
use \Yii;
use yii\web\View;
use yii\helpers\Url;

class PrivateAssets extends AssetBundle {

	// Variables ---------------------------------------------------

	// Public ----

	// Load css
    public $css     = [
		'styles/private.css'
    ];

	// Constructor and Initialisation ------------------------------

	public function init()  {

		parent::init();

		$this->depends[]	= 'cmsgears\core\common\assets\Handlebars';
	}

	// Additional Assets Registration ------------------------------

	public function registerAssetFiles( $view ) {

		parent::registerAssetFiles( $view );

		$rootUrl = Url::toRoute( '/', true );

    	$siteUrl = "var fileUploadUrl	= '" .$rootUrl . "apix/file/file-handler';";

		$view->registerJs( $siteUrl, View::POS_END );
	}
}

?>