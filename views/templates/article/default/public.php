<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

use cmsgears\widgets\blog\ArticleWidget;

$modelContent	= $model->modelContent;
$data			= json_decode( $model->data );

$settings = $data->settings ?? null;

$content			= $settings->content ?? true;
$contentData		= $modelContent->content;
$contentClass		= !empty( $settings->contentClass ) ? $settings->contentClass : null;
$contentDataClass	= !empty( $settings->contentDataClass ) ? $settings->contentDataClass : null;
$boxWrapClass		= !empty( $settings->boxWrapClass ) ? $settings->boxWrapClass : null;

$pageIncludes	= dirname( dirname( __DIR__ ) ) . '/page/includes';

$publishedAt	= date( 'F d, Y', strtotime( $modelContent->publishedAt ) );
$avatar			= SiteProperties::getInstance()->getDefaultAvatar();
$userAvatarUrl	= CodeGenUtil::getFileUrl( $model->creator->avatar, [ 'image' => $avatar ] );
?>
<div id="block-public" class="block block-page block-article">
	<div class="block-content-wrap">
		<?php include_once dirname( __DIR__ ) . '/includes/header.php'; ?>
		<div class="row content-90 max-cols-100">
			<div class="col col12x9">
				<?php if( $content ) { ?>
					<div class="block-content row max-cols-100 <?= $contentClass ?>">
						<div class="col col12x4 align align-center">
							<div class="avatar-wrap circled circled1">
								<img src="<?= $userAvatarUrl ?>" />
							</div>
							<div class="margin margin-medium-v text text-default-r h5">
								<?= $model->creator->getName() ?>
							</div>
						</div>
						<div class="col col12x8">
							<div class="block-content-data <?= $contentDataClass ?>">
								<?php if( !$headerBanner ) { ?>
									<div class="article-title">
										<?= $headerTitle ?>
									</div>
								<?php } ?>
								<div class="margin margin-medium-v">
									<i class="cmti cmti-calendar"></i>
									<span class="inline-block margin margin-small-h"><?= $publishedAt ?></span>
								</div>
								<div class="article-text reader">
									<?= $contentData ?>
								</div>
							</div>
							<?php include_once "$pageIncludes/elements.php"; ?>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="col col12x3">
				<div class="block-sidebar">
					<div class="widget widget-search">
						<div class="frm-icon-element icon-right">
							<i class="cmti cmti-search"></i>
							<input id="search-article" type="text" placeholder="Search Articles" />
						</div>
					</div>
					<div class="filler-height"></div>
					<div class="widget widget-post-recent">
						<p class="h5 widget-title">Recent Articles</p>
						<div class="filler-height"></div>
						<?= ArticleWidget::widget([
							'pagination' => false, 'widget' => 'recent', 'limit' => 6,
							'options' => [ 'class' => 'widget-article' ],
							'wrapperOptions' => [ 'class' => 'article-wrap' ],
							'singleOptions' => [ 'class' => 'card card-icon' ],
							'template' => 'sidebar'
						]);
						?>
					</div>
				</div>
			</div>
		</div>
		<?php include_once "$pageIncludes/blocks.php"; ?>
	</div>
</div>
