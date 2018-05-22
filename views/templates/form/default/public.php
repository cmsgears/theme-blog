<?php
// Yii Imports
use yii\widgets\ActiveForm;

// CMG Imports
use cmsgears\widgets\form\BasicForm;

$modelContent	= $model->modelContent;
$data			= json_decode( $model->data );

$settings = $data->settings ?? null;

$content			= $settings->content ?? true;
$contentData		= $modelContent->content;
$contentClass		= !empty( $settings->contentClass ) ? $settings->contentClass : 'row content-90';
$contentDataClass	= !empty( $settings->contentDataClass ) ? $settings->contentDataClass : 'reader';
$boxWrapClass		= !empty( $settings->boxWrapClass ) ? $settings->boxWrapClass : 'row content-90';

$pageIncludes	= dirname( dirname( __DIR__ ) ) . '/page/includes';
?>
<div id="block-public" class="block block-page block-dform">
	<div class="block-content-wrap">
		<?php include_once dirname( __DIR__ ) . '/includes/header.php'; ?>
		<?php if( $content ) { ?>
			<div class="block-content color color-primary-l <?= $contentClass ?>">
				<div class="block-content-data <?= $contentDataClass ?>">
					<?= $contentData ?>
				</div>
				<div class="block-content-data <?= $contentDataClass ?>">
					<div class="row padding padding-small-v">
						<div class="text text-secondary-l align align-center">
							<div class="h2 text text-default-r"> Still Have Questions? Contact Us Using  the Form Below.</div>
							<p>We are looking forward to hear from you. Please feel free to get in touch via the form below. We will get back to you as soon as possible.</p>
						</div>
						<?php
							if( Yii::$app->session->hasFlash( 'message' ) ) {
						?>
							<div class="frm-message">
								<h3 class="text align align-center text-secondary padding padding-xlarge-v"> <?php echo Yii::$app->session->getFlash( 'message' ); ?> </h3>
							</div>
						<?php
							}
							else {

								$activeForm = ActiveForm::begin( [ 'id' => 'frm-dynamic', 'options' => [ 'class' => 'frm-rounded-all align margin margin-top-medium' ] ] );
						?>
								<?= BasicForm::widget([
									'model' => $model, 'form' => $form,
									'activeForm' => $activeForm, 'captchaAction' => '/cms/form/captcha',
									'wrapCaptcha' => true, 'wrapActions' => true
								]) ?>
						<?php
								ActiveForm::end();
							}
						?>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="page-block-wrap">
			<?php include_once "$pageIncludes/blocks.php"; ?>
		</div>
	</div>
</div>
