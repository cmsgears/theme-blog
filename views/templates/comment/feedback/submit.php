<?php
// CMG Imports
use cmsgears\core\common\widgets\Captcha;

$model			= $widget->model;
$captcha		= $widget->captcha;
$title			= $widget->title;
$success		= $widget->success;
$rating			= $widget->rating;
$ratingClass	= $widget->ratingClass;

$user = Yii::$app->core->getUser();

$ajaxUrl		= $widget->ajaxUrl;
$cmtApp			= $widget->cmtApp;
$cmtController	= $widget->cmtController;
$cmtAction		= $widget->cmtAction;
?>
<div class="form">
	<div cmt-app="<?= $cmtApp ?>" cmt-controller="<?= $cmtController ?>" cmt-action="<?= $cmtAction ?>" action="<?= $ajaxUrl ?>">
		<div class="max-area-cover spinner">
			<div class="valign-center cmti cmti-2x cmti-spinner-1 spin"></div>
		</div>
		<div class="row max-cols-100">
			<div class="colf colf15x7">
				<input type="text" name="Comment[name]" placeholder="Name" />
				<span class="error" cmt-error="Comment[name]"></span>
			</div>
			<div class="colf colf15"></div>
			<div class="colf colf15x7">
				<input type="text" name="Comment[email]" placeholder="Email" />
				<span class="error" cmt-error="Comment[email]"></span>
			</div>
		</div>
		<div class="row max-cols-100">
			<div class="colf colf15x7">
				<textarea name="Comment[content]" rows="5" placeholder="Write here ..."></textarea>
				<span class="error" cmt-error="Comment[content]"></span>
			</div>
			<div class="colf colf15"></div>
			<div class="colf colf15x7">
				<div class="margin margin-small-v">
					<?= Yii::$app->formDesigner->getRatingField(
						[ 'modelName' => 'Comment', 'fieldName' => 'rating', 'class' => $ratingClass ]
					)?>
					<span class="error" cmt-error="Comment[rating]"></span>
				</div>
				<?php if( !isset( $user ) ) { ?>
					<div class="clear captcha-wrap">
						<?= Captcha::widget( [ 'name' => 'Comment[captcha]', 'captchaAction' => '/core/site/captcha', 'options' => [ 'placeholder' => 'Captcha Key*' ] ] ) ?>
						<div class="info margin margin-small-v">Click on the captcha image to get new code.</div>
						<span class="error" cmt-error="Comment[captcha]"></span>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="row max-cols-100">
			<div class="colf colf15x7"></div>
			<div class="colf colf15"></div>
			<div class="colf colf15x7 align align-right">
				<input type="submit" class="frm-element-medium cmt-click" value="Submit">
			</div>
		</div>
		<div class="margin margin-small-v">
			<div class="filler-height"></div>
			<div class="message success"></div>
			<div class="message warning"></div>
			<div class="message error"></div>
			<div class="filler-height"></div>
		</div>
	</div>
</div>
