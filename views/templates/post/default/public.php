<?php
// Yii Imports
use yii\helpers\Url;

// CMG Imports
use cmsgears\cms\common\config\CmsGlobal;

use cmsgears\social\connect\widgets\assets\FbSdkAsset;

use cmsgears\widgets\blog\PostWidget;
use cmsgears\widgets\comment\show\ShowComments;
use cmsgears\widgets\comment\submit\SubmitComment;
use cmsgears\widgets\social\share\SocialShare;

FbSdkAsset::register( $this );

$siteProperties		= $this->context->getSiteProperties();
$commentProperties	= $this->context->getCommentProperties();
$cmsProperties		= $this->context->getCmsProperties();

$modelContent	= $model->modelContent;
$data			= json_decode( $model->data );

$settings = $data->settings ?? null;

$content			= $settings->content ?? true;
$contentData		= $modelContent->content;
$contentClass		= !empty( $settings->contentClass ) ? $settings->contentClass : 'row content-90';
$contentDataClass	= !empty( $settings->contentDataClass ) ? $settings->contentDataClass : 'reader';
$boxWrapClass		= !empty( $settings->boxWrapClass ) ? $settings->boxWrapClass : 'row content-90';

$publishedAt	= date( 'F d, Y', strtotime( $modelContent->publishedAt ) );
$split			= false;
?>
<div id="block-public" class="block block-page block-post">
	<div class="block-content-wrap">
		<?php include_once dirname( __DIR__ ) . '/includes/header.php'; ?>
		<?php if( $content ) { ?>
			<div class="block-content <?= $contentClass ?>">
				<div class="block-content-info margin margin-medium-v">
					<i class="cmti cmti-calendar"></i>
					<span class="inline-block margin margin-small-h"><?= $publishedAt ?></span>
					<?= SocialShare::widget( [ 'url' => Yii::$app->request->absoluteUrl ] ) ?>
				</div>
				<div class="block-content-data <?= $contentDataClass ?>">
					<?= $contentData ?>
				</div>
				<?php if( count( $model->activeCategories ) > 0 || count( $model->activeTags ) > 0 ) { ?>
					<div class="block-content-info block-labels margin margin-medium-v">
						<div class="h4">Labels</div>
						<hr/>
						<div class="filler-height"></div>
						<ul class="nav">
							<?= $model->getCategoryLinks( Url::toRoute( [ '/blog/category' ], true ) ) ?>
							<?= $model->getTagLinks( Url::toRoute( [ '/blog/tag' ], true ) ) ?>
						</ul>
					</div>
				<?php } ?>
				<?php include_once dirname( __DIR__ ) . '/includes/elements.php'; ?>
				<?php if( $commentProperties->isComments() && $cmsProperties->isPostComments() && $model->comments ) { ?>
					<div class="block-content-buffer block-content-comments">
						<?= ShowComments::widget([
							'options' => [ 'id' => 'wrap-comments' ],
							'parentId' => $model->id,
							'parentType' => CmsGlobal::TYPE_POST,
							'templateDir' => '@themeTemplates/widget/comment'
						]) ?>
						<?= SubmitComment::widget([
							'options' => [ 'class' => 'comment-submit' ],
							'ajaxUrl' => "cms/post/submit-comment?slug=$model->slug&type=$model->type",
							'model' => $model,
							'templateDir' => '@themeTemplates/widget/comment/submit'
						]) ?>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
		<?= PostWidget::widget([
			'pagination' => false, 'widget' => 'similar', 'model' => $model, 'title' => 'Similar Posts',
			'limit' => 5, 'texture' => 'texture texture-brown', 'defaultBanner' => true,
			'options' => [ 'class' => 'card-posts' ],
			'wrapperOptions' => [ 'class' => 'card-post-wrap row content-90 max-cols-50' ],
			'singleOptions' => [ 'class' => 'card card-banner col col5 row' ],
			'templateDir' => '@themeTemplates/widget/post', 'template' => 'card'
		]);
		?>
		<?php include_once dirname( __DIR__ ) . '/includes/blocks.php'; ?>
	</div>
</div>
