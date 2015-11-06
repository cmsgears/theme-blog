<?php
// Yii Imports
use yii\helpers\Html;
use yii\widgets\ActiveForm;

// CMG Imports
use cmsgears\widgets\block\BasicBlock;
?>

<?php BasicBlock::begin([
	'options' => [ 'id' => 'block-public', 'class' => 'block block-basic' ],
	'texture' => true, 'textureClass' => 'texture-default',
	'header' => true, 'headerContent' => "<h2 class='align align-middle'>REGISTER</h2>",
	'contentWrapClass' => 'align align-center', 'content' => true
]);?>

	<?php if( Yii::$app->session->hasFlash( "message" ) ) { ?>
		<div class='frm-message'><p> <?php echo Yii::$app->session->getFlash( "message" ); ?> </p></div>
	<?php
		}
		else {

			$form 	= ActiveForm::begin( ['id' => 'frm-registration' ] ); 
			$terms	= "I agree to the " . Html::a( "Terms", [ '/terms' ], null ) . " and " . Html::a( "Privacy Policy", [ '/privacy' ], null ) . ".";
	?>
	    	<?= $form->field( $model, 'email' )->textInput( [ 'placeholder' => 'Email*' ] )->label( false ) ?>
	    	<?= $form->field( $model, 'password' )->passwordInput( [ 'placeholder' => 'Password*' ] )->label( false ) ?>
	    	<?= $form->field( $model, 'password_repeat' )->passwordInput([ 'placeholder' => 'Confirm Password*' ] )->label( false ) ?>
	    	<?= $form->field( $model, 'username' )->textInput( [ 'placeholder' => 'Username' ] )->label( false ) ?>
	    	<?= $form->field( $model, 'firstName' )->textInput( [ 'placeholder' => 'First Name' ] )->label( false ) ?>
	    	<?= $form->field( $model, 'lastName' )->textInput( [ 'placeholder' => 'Last Name' ] )->label( false ) ?>
			<?= $form->field( $model, 'newsletter' )->checkbox() ?>
			<?= $form->field( $model, 'terms' )->checkbox( [ 'label' => $terms ] ) ?>

			<input type="submit" value="Register" />
	<?php
			ActiveForm::end();
		}
	?>

<?php BasicBlock::end(); ?>