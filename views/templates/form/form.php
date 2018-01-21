<?php
// Yii Imports
use yii\helpers\Html;
use yii\widgets\ActiveForm;

// CMG Imports
use cmsgears\widgets\block\BasicBlock;
use cmsgears\widgets\form\BasicForm;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= $coreProperties->getSiteTitle() . " | " . $form->name;
?>
<?php BasicBlock::begin([
	'options' => [ 'id' => 'block-public', 'class' => 'block block-basic' ],
	'bkg' => true,
	'texture' => true, 'textureClass' => 'texture-default',
	'header' => true, 'headerContent' => "<h2 class='align align-middle'>$form->name</h2>",
	'contentWrapClass' => 'align align-center', 'content' => true
]);?>

	<?php if( Yii::$app->session->hasFlash( 'message' ) ) { ?>
		<div class='frm-message frm-message-small'><p> <?php echo Yii::$app->session->getFlash( 'message' ); ?> </p></div>
	<?php
		}
		else {

			$activeForm 	= ActiveForm::begin( [ 'id' => 'frm-dynamic' ] );
	?>

			<?=BasicForm::widget( [ 'form' => $form, 'model' => $model, 'activeForm' => $activeForm ] );?>
	<?php
			ActiveForm::end();
		}
	?>

<?php BasicBlock::end(); ?>