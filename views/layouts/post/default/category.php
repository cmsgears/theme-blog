<?php
// CMG Imports
use cmsgears\cms\common\utilities\ContentUtil;
use cmsgears\core\common\utilities\CodeGenUtil;

use themes\blog\assets\InlineAssets;

ContentUtil::initModelPage( $this );

InlineAssets::register( $this );

$this->registerAssetBundle( 'public' );

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
    <body id="scroll-top">
    	<?= CodeGenUtil::generateSeoH1( $this->params ) ?>
        <?php $this->beginBody(); ?>
		<div id="pre-loader-main" class="pre-loader valign-center align align-center">
			<div class="spinner cmti cmti-3x cmti-spinner-1 spin"></div>
		</div>
		<?php
			if( isset( $user ) ) {

				include "$themePath/views/headers/private.php";
			}
			else {

				include "$themePath/views/headers/public.php";
			}
		?>
        <div class="container container-main">
	        <div class="content-wrap content-main-wrap">
	        	<div class="content">
	        		<?= $content ?>
	        	</div>
	        </div>
        </div>
        <?php include "$themePath/views/footers/public.php"; ?>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>
