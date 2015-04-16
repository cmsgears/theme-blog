<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= $coreProperties->getSiteTitle() . " | Confirm Account";
?>
<section class="module module-basic" id="module-public">
	<div class="module-bkg"></div>
	<div class="texture texture1"></div>
	<div class="module-wrap-content valign-center">
		<div class="module-header">
			<h1 class="align-middle">ACCOUNT CONFIRMATION</h1>
		</div>
		<div class="module-content">
			<div class='frm-message'><p> <?php echo Yii::$app->session->getFlash( "message" ); ?> </p></div>
		</div>
	</div>
</section>