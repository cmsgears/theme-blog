<?php
// CMG Imports
use cmsgears\widgets\comment\submit\SubmitFeedback;

$model = Yii::$app->core->site;
?>
<div class="page-content-buffer">
	<div class="h6 margin margin-small-v">
		<p>We will like to hear from you about suggestions to improve site experience.</p>
	</div>
	<?= SubmitFeedback::widget([
	   'model' => $model, 'ratingClass' => 'cmt-rating rating-emoticons',
	   'ajaxUrl' => "core/site/submit-feedback?slug=$model->slug",
	   'templateDir' => '@themeTemplates/comment/feedback', 'template' => 'submit'
	]) ?>
</div>
