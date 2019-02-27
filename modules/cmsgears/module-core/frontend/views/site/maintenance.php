<?php
$coreProperties = $this->context->getCoreProperties();
$this->title 	= 'Under Maintenance | ' . $coreProperties->getSiteTitle();

if( class_exists( 'yii\debug\Module' ) ) {

	$this->off( \yii\web\View::EVENT_END_BODY, [ \yii\debug\Module::getInstance(), 'renderToolbar' ] );
}
?>
<div class="block block-basic block-error" cmt-block="block-qtf-auto">
	<div class="filler-height filler-height-medium"></div>
	<div class="block-content-wrap">
		<div class="block-header-wrap">
			<div class="block-header">
				<div class="block-header-title h3 align align-center">We are Renovating !</div>
				<div class="block-header-info h5 align align-center">Please visit us later.</div>
			</div>
		</div>
		<div class="filler-height filler-height-medium"></div>
		<div class="block-content row row-medium">
			<div class="block-content-data">
				<div class="maintenance align align-center">
					<img class="fluid" src="<?= Yii::getAlias( '@images' ) ?>/blog/maintenance.png" />
				</div>
			</div>
		</div>
	</div>
</div>
