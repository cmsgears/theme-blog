<?php
use cmsgears\cms\common\utilities\ContentUtil;
use themes\blog\assets\PublicAssets;

ContentUtil::initPage( $this );

PublicAssets::register( $this );

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
		<?php include "$themePath/views/headers/common.php"; ?>
        <div class="container-main">
	        <div class="pattern pattern-default"></div>
	        <div class="wrap-content">
	        	<?= $content ?>
	        </div>
        </div>
        <?php include "$themePath/views/footers/common.php"; ?>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>