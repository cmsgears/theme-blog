<?php
// CMG Imports
use cmsgears\widgets\blog\PostWidget;

use cmsgears\core\common\utilities\CodeGenUtil;

$featuredModels	= Yii::$app->factory->get( 'postService' )->getFeatured();
$textureClass	= 'texture texture-black';

$model = $this->params[ 'model' ];
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
		<div class="block-content row content-90">
			<div class="block-content-info search-bar row max-cols-50">
				<div class="col col3x2 h3 margin margin-bottom-small"><?= $model->displayName ?></div>
				<div class="col col3 margin margin-bottom-small">
					<div class="widget widget-search">
						<div class="frm-icon-element icon-right">
							<i class="cmti cmti-search"></i>
							<input id="search-post" type="text" placeholder="Search Posts" />
						</div>
					</div>
				</div>
			</div>
			<div class="filler-height"></div>
			<div class="block-content-buffer">
				<?= PostWidget::widget([
					'limit' => 9, 'texture' => 'texture texture-brown', 'defaultBanner' => true,
					'options' => [ 'class' => 'card-posts' ],
					'wrapperOptions' => [ 'class' => 'card-post-wrap row max-cols-50' ],
					'singleOptions' => [ 'class' => 'card card-banner col col3 row' ],
					'templateDir' => '@themeTemplates/widget/article', 'template' => 'card'
				]);
				?>
			</div>
		</div>
	</div>
</div>
