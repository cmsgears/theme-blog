<?php
// Yii Imports
use yii\helpers\Html;
use yii\widgets\ActiveForm;

// CMG Imports
use cmsgears\widgets\block\BasicBlock;
?>

<?php BasicBlock::begin([
	'options' => [ 'id' => 'block-public', 'class' => 'block block-basic' ],
	'bkg' => true,
	'texture' => true, 'textureClass' => 'texture-default',
	'header' => true, 'headerContent' => "<h2 class='align align-middle'>FORGOT PASSWORD</h2>",
	'contentWrapClass' => 'align align-center', 'content' => true
]);?>

	<?php if( Yii::$app->session->hasFlash( "message" ) ) { ?>
		<div class='frm-message'><p> <?php echo Yii::$app->session->getFlash( "message" ); ?> </p></div>
	<?php
		}
		else {

			$form = ActiveForm::begin( [ 'id' => 'frm-forgot-password' ] ); 
	?>
	    	<?= $form->field( $model, 'email' )->textInput( [ 'placeholder' => 'Email*' ] )->label( false ) ?>

			<input type="submit" value="Submit" />
	<?php
			ActiveForm::end();
		}
	?>

<?php BasicBlock::end(); ?>