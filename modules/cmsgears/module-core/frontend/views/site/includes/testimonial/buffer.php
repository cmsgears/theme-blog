<?php
// CMG Imports
use cmsgears\widgets\comment\submit\SubmitTestimonial;

$model = Yii::$app->core->site;
?>
<div class="page-content-buffer">
	<div class="h6 margin margin-small-v">
		<p>Write us your experience with Tutorials24x7.</p>
	</div>
	<?= SubmitTestimonial::widget([
	   'model' => $model, 'ratingClass' => 'cmt-rating rating-emoticons',
	   'ajaxUrl' => "core/site/submit-testimonial?slug=$model->slug",
	   'templateDir' => '@themeTemplates/comment/feedback', 'template' => 'submit'
	]) ?>
</div>
