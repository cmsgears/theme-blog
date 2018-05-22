<?php
// CMG Imports
use cmsgears\widgets\blog\PageWidget;

use cmsgears\core\common\utilities\CodeGenUtil;

$featuredModels	= Yii::$app->factory->get( 'pageService' )->getFeatured();
$textureClass	= 'texture texture-black';

$model		= $this->params[ 'model' ];
$settings	= $data->settings ?? null;

$content			= $settings->content ?? true;
$contentData		= $model->modelContent->content;
$contentClass		= !empty( $settings->contentClass ) ? $settings->contentClass : 'row content-90';
$contentDataClass	= !empty( $settings->contentDataClass ) ? $settings->contentDataClass : 'reader';
$boxWrapClass		= !empty( $settings->boxWrapClass ) ? $settings->boxWrapClass : 'row content-90';
?>
<div id="block-public" class="block block-page block-page-search">
	<div class="block-content-wrap">
		<?php if( !empty( $featuredModels ) ) { ?>
			<div class="block-header-wrap block-header-banner">
				<div id="post-slider" class="fx-slider fx-slider-regular">
					<?php
						foreach( $featuredModels as $featuredModel ) {

							$content	= $featuredModel->modelContent;
							$bannerUrl	= CodeGenUtil::getFileUrl( $content->banner );
					?>
						<div>
							<?php if( !empty( $bannerUrl ) ) { ?>
								<div class="wrap-slide-content" style="background-image:url(<?= $bannerUrl ?>)">
									<div class="<?= $textureClass ?>"></div>
							<?php } else { ?>
								<div class="wrap-slide-content color color-tertiary">
							<?php } ?>
									<div class="slide-content">
										<div class="fxs-content reader">
											<div class="h3"><?= $featuredModel->displayName ?></div>
											<?php if( !empty( $featuredModel->description ) ) { ?>
												<div class="text text-default-r">
													<?= $featuredModel->description ?>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
						</div>
					<?php
						}
					?>
				</div>
			</div>
		<?php } ?>
		<?php if( $content ) { ?>
			<div class="block-content row content-90">
				<div class="block-content-info search-bar row max-cols-50">
					<div class="col col3x2 h3 margin margin-bottom-small"><?= $model->displayName ?></div>
					<div class="col col3 margin margin-bottom-small">
						<div class="widget widget-search">
							<div class="frm-icon-element icon-right">
								<i class="cmti cmti-search"></i>
								<input id="search-page" type="text" placeholder="Search Pages" />
							</div>
						</div>
					</div>
				</div>
				<div class="filler-height"></div>
				<div class="block-content-buffer">
					<?= PageWidget::widget([
						'limit' => 9, 'texture' => 'texture texture-brown', 'defaultBanner' => true,
						'options' => [ 'class' => 'card-pages' ],
						'wrapperOptions' => [ 'class' => 'card-page-wrap row max-cols-50' ],
						'singleOptions' => [ 'class' => 'card card-banner col col3 row' ],
						'templateDir' => '@themeTemplates/widget/page', 'template' => 'card'
					]);
					?>
				</div>
				<?php include_once dirname( __DIR__ ) . '/includes/elements.php'; ?>
			</div>
		<?php } ?>
		<?php include_once dirname( __DIR__ ) . '/includes/blocks.php'; ?>
	</div>
</div>
