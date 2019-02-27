<?php
// Yii Imports
use yii\helpers\Url;

// CMG Imports
use cmsgears\core\common\utilities\CodeGenUtil;

// Content
$content	= $model->modelContent;
$modelUrl	= isset( $widget->singlePath ) ? "$widget->singlePath/$model->slug" : Url::toRoute( [ "/$model->slug" ], true );

// Model
$title		= $model->displayName;
$site		= $model->site;
$siteUrl	= $site->getSiteUrl();

$publishedAt = date( 'F d, Y', strtotime( $content->publishedAt ) );

// Settings
$data = json_decode( $model->data );

$settings = isset( $data->settings ) ? $data->settings : [];

// Banner
$defaultBanner = !empty( $settings->defaultBanner ) ? $settings->defaultBanner : false;

$banner		= $defaultBanner ? ( isset( $pageBanner ) ? $pageBanner : 'banner-page.jpg' ) : null;
$bannerUrl	= CodeGenUtil::getFileUrl( $content->banner, [ 'image' => $banner ] );
?>
<div class="box-content-wrap clearfix <?= !empty( $bannerUrl ) ? 'box-content-split' : null ?>">
	<?php if( !empty( $bannerUrl ) ) { ?>
		<div class="box-header-wrap">
			<div class="box-header">
				<img class="fluid" src="<?= $bannerUrl ?>" title="<?= "{$model->displayName}" ?>" />
				</div>
			</div>
		</div>
	<?php } ?>
	<div class="box-content">
		<div class="box-content-info">
			<?= $publishedAt ?>
		</div>
		<div class="box-content-title reader">
			<?= $model->displayName ?>
		</div>
		<div class="box-content-data reader">
			<?= $content->getDisplaySummary( $widget->textLimit ) ?> &nbsp;&nbsp;
			... <a href="<?= "{$siteUrl}/blog/{$model->slug}" ?>">Read More</a>
		</div>
	</div>
</div><hr/>
