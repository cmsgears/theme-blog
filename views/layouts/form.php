<?php
use cmsgears\cms\common\utilities\ContentUtil;
use themes\blog\assets\PublicAssetBundle;

ContentUtil::initPage( $this, 'cmgforms' );

PublicAssetBundle::register( $this );

$coreProperties 	= $this->context->getCoreProperties();
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= $coreProperties->getLanguage() ?>">
    <head>
		<?php include dirname( __DIR__ ) . "/headers/main.php"; ?>
    </head>
    <body>
        <?php $this->beginBody(); ?>
		<div id='pre-loader' class="max-area-cover"><div class="valign-center cmti cmti-5x cmti-flexible-o spin"></div></div>
		<?php include dirname( __DIR__ ) . "/headers/common.php"; ?>
        <div class="container-main">
	        <div class="pattern pattern-default"></div>
	        <div class="wrap-content">
	        	<?= $content ?>
	        </div>
        </div>
        <?php include dirname( __DIR__ ) . "/footers/common.php"; ?>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>