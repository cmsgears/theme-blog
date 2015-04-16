<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;
?>
<section class="row container clearfix">
    <h1>Account Activation</h1>
    <div class="col col2 no-float-center">
    	<?php if( Yii::$app->session->hasFlash( "message" ) ) { ?>
			<p> <?php echo Yii::$app->session->getFlash( "message" ); ?> </p>
		<?php		
			}
			else {

        		$form = ActiveForm::begin( ['id' => 'frm-activate-account'] ); 
        ?>
	        	<?= $form->field( $model, 'password' )->passwordInput() ?>
	        	<?= $form->field( $model, 'password_repeat' )->passwordInput() ?>

				<input type="submit" value="Activate" />
        <?php 
        		ActiveForm::end();
			}
		?>
	</div>
</section>