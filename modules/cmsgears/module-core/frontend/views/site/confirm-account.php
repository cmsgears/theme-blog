<?php
// CMG Imports
use cmsgears\widgets\block\BasicBlock;
?>

<?=BasicBlock::widget([
	'options' => [ 'id' => 'block-public', 'class' => 'block block-basic' ],
	'bkg' => true,
	'texture' => true,
	'header' => true, 'headerContent' => '<h2 class="align align-center">ACCOUNT CONFIRMATION</h2>',
	'contentWrapClass' => 'center','content' => true,
	'contentData' => Yii::$app->session->getFlash( "message" )
]);?>