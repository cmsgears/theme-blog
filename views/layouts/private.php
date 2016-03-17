<?php
// Yii Imports
use \Yii;

// CMG Imports
use themes\blog\assets\PrivateAssets;

PrivateAssets::register( $this );

// Variables available for headers, sidebars and footers included within this layout
$coreProperties = $this->context->getCoreProperties();
$themePath		= Yii::getAlias( '@themes/blog' );
$user			= Yii::$app->user->getIdentity();
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= $coreProperties->getLanguage() ?>">
    <head>
		<?php include "$themePath/views/headers/main.php"; ?>
    </head>
    <body>
        <?php $this->beginBody(); ?>
		<div id='pre-loader-main' class="max-area-cover">
			<div class="valign-center cmti cmti-5x cmti-flexible-o spin"></div>
		</div>
		<?php include "$themePath/views/headers/private.php"; ?>
        <div class="container-main container-private">
	        <div class="wrap-content">
	        	<div class="wrap-content-private clearfix">
		        	<div class="box-sidebar col12x3">
		        		<?php include "$themePath/views/sidebars/common.php"; ?>
		        	</div>
		        	<div class="box-content col12x9">
		        		<?= $content ?>
		        	</div>
		        </div>
	        </div>
        </div>
        <?php include "$themePath/views/footers/private.php"; ?>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>