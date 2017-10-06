<?php
// Yii Imports
use yii\helpers\Html;
use yii\widgets\ActiveForm;

// CMG Imports
use cmsgears\widgets\block\BasicBlock;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= 'Error | ' . $coreProperties->getSiteTitle();
?>
<?php if ( Yii::$app->user->isGuest ) { ?>

<?=BasicBlock::widget([
	'options' => [ 'id' => 'block-public', 'class' => 'block block-basic' ],
	'bkg' => true,
	'texture' => true,
	'header' => true, 'headerContent' => '<h2 class="align align-center">ERROR</h2>',
	'contentWrapClass' => 'center','content' => true,
	'contentData' => nl2br( Html::encode( $message ) )
]);?>

<?php } else { ?>
	<h1 class="align-middle">ERROR</h1>

	<p> <?= nl2br( Html::encode( $message ) ) ?> </p>
<?php } ?>