<?php
// Blog Imports
use themes\blog\assets\InlineAssets;

InlineAssets::register( $this );

$this->registerAssetBundle( 'private' );

// Common variables available for headers, sidebars and footers included within this layout
$coreProperties = $this->context->getCoreProperties();
$themePath		= Yii::getAlias( '@themes/blog' );
$user			= Yii::$app->core->getUser();
$resourceUrl	= $coreProperties->getResourceUrl();
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= $coreProperties->getLanguage() ?>">
    <head>
		<?php include "$themePath/views/headers/main.php"; ?>
    </head>
    <body>
        <?php $this->beginBody(); ?>
		<?php include "$themePath/views/templates/components/spinners/page.php"; ?>
		<?php include "$themePath/views/headers/private.php"; ?>
		<?php include "$themePath/views/sidebars/private.php"; ?>
        <div class="container container-main container-private">
	        <div class="wrap-content wrap-content-main wrap-content-private">
	        	<div class="content content-main">
	        		<?= $content ?>
	        	</div>
	        </div>
        </div>
        <?php include "$themePath/views/footers/private.php"; ?>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>
