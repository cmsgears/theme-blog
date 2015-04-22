<?php
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

$coreProperties = $this->context->getCoreProperties();
$this->title 	= $coreProperties->getSiteTitle() . " | Feedback";
?>
<section class="module module-basic" id="module-public">
	<div class="module-bkg"></div>
	<div class="texture texture1"></div>
	<div class="module-wrap-content valign-center">
		<div class="module-header">
			<h1 class="align-middle">FEEDBACK</h1>
		</div>
		<div class="module-content">
	    	<?php if( Yii::$app->session->hasFlash( "success" ) ) { ?>
				<div class='frm-message'><p> <?php echo Yii::$app->session->getFlash( "success" ); ?> </p></div>
			<?php
				}
				else {

	        		$form = ActiveForm::begin( [ 'id' => 'frm-feedback' ] ); 
	        ?>

	            	<?= $form->field( $model, 'name' )->textInput( [ 'placeholder' => 'Name*' ] )->label( false ) ?>
	            	<?= $form->field( $model, 'email' )->textInput( [ 'placeholder' => 'Email*' ] )->label( false ) ?>

					<!-- rating -->
					<label for="fields['rating'].value">Ratings</label>
					<input id="feedbackform-rating" class="form-control" type="range" min="0" max="5" value="0" step="0.5" name="FeedbackForm[rating]" value="<?=$model->rating?>" />

	            	<?= $form->field( $model, 'message' )->textArea( [ 'placeholder' => 'Message*', 'rows' => 6 ] )->label( false ) ?>

	            	<input type="submit" value="Send" />
			<?php
	        		ActiveForm::end();
				}
	        ?>
		</div>
	</div>
</section>