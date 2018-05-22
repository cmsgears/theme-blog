<?php
// CMG Imports
use cmsgears\cms\common\config\CmsGlobal;

use cmsgears\cms\common\utilities\ContentUtil;
use cmsgears\core\common\utilities\CodeGenUtil;

use themes\blog\assets\InlineAssets;

ContentUtil::initPage( $this, [ 'type' => CmsGlobal::TYPE_ARTICLE ] );

InlineAssets::register( $this );

$this->registerAssetBundle( 'public' );
$this->registerAssetBundle( 'cmtjs' );

// Common variables available for headers, sidebars and footers included within this layout
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
    <body id="scroll-top">
    	<?= CodeGenUtil::generateSeoH1( $this->params ) ?>
        <?php $this->beginBody(); ?>
		<div id="pre-loader-main" class="pre-loader valign-center align align-center">
			<div class="wrap-spinner">
				<div class="first-layer">
					<div class="second-layer"></div>
				</div>
				<div class="top-layer"></div>
			</div>
		</div>
		<?php
			if( isset( $user ) ) {

				//include "$themePath/views/headers/private.php";
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
        <?php //include "$themePath/views/footers/public.php"; ?>
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>
