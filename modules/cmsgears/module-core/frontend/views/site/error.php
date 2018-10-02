<?php
// Yii Imports
use yii\helpers\Html;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= 'Error | ' . $coreProperties->getSiteTitle();

$code		= $exception->statusCode;
$message	= nl2br( Html::encode( $message ) );
?>
<div class="block block-basic block-error" cmt-block="block-qtf-auto">
	<div class="filler-height filler-height-medium"></div>
	<div class="block-content-wrap">
		<div class="block-header-wrap">
			<div class="block-header">
				<div class="block-header-title h3 align align-center"><?= $code ?></div>
				<div class="block-header-info h5 align align-center"><?= $message ?></div>
			</div>
		</div>
		<div class="filler-height filler-height-medium"></div>
		<div class="block-content row row-medium">
			<div class="block-content-data">
				<div class="error align align-center">
					<img class="fluid" src="<?= Yii::getAlias( '@images' ) ?>/blog/error.png" />
				</div>
			</div>
		</div>
	</div>
</div>
