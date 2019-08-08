<?php
// CMG Imports
use cmsgears\core\common\config\CoreProperties;

use cmsgears\widgets\comment\submit\SubmitTestimonial;

$site = Yii::$app->core->site;

$coreProperties = CoreProperties::getInstance();
?>
<div class="page-content-buffer">
	<div class="h6 margin margin-small-v">
		<p>Write us your experience with <?= $coreProperties->getSiteTitle() ?>.</p>
	</div>
	<?= SubmitTestimonial::widget([
	   'model' => $site, 'ratingClass' => 'cmt-rating rating-emoticons',
	   'ajaxUrl' => "core/site/submit-testimonial?slug=$site->slug",
	   'templateDir' => '@themeTemplates/comment/feedback', 'template' => 'submit'
	])?>
</div>
