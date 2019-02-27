<?php
// Yii Imports
use yii\helpers\Url;

// CMG Imports
use cmsgears\core\common\utilities\CodeGenUtil;

// Content
$content	= $model->modelContent;
$modelUrl	= isset( $widget->singlePath ) ? "$widget->singlePath/$model->slug" : Url::toRoute( [ "/$model->slug" ], true );

$title		= $model->displayName;
$site		= $model->site;
$siteUrl	= $site->getSiteUrl();

// Settings
$data = json_decode( $model->data );

$settings = isset( $data->settings ) ? $data->settings : [];

// Banner
$defaultBanner = !empty( $settings->defaultBanner ) ? $settings->defaultBanner : false;

$banner		= $defaultBanner ? ( isset( $pageBanner ) ? $pageBanner : 'banner-page.jpg' ) : null;
$bannerUrl	= CodeGenUtil::getFileUrl( $content->banner, [ 'image' => $banner ] );
?>
<div class="card-content-wrap clearfix <?= !empty( $bannerUrl ) ? 'card-content-split' : null ?>">
	<?php if( !empty( $bannerUrl ) ) { ?>
		<div class="card-header">
			<div class="card-bkg">
				<img class="fluid" src="<?= $bannerUrl ?>" title="<?= "{$model->displayName}" ?>" />
			</div>
		</div>
	<?php } ?>
	<div class="card-content">
		<div class="card-content-title">
			<a href="<?= "{$siteUrl}/blog/{$model->slug}" ?>"><?= $title ?></a>
		</div>
	</div>
</div>
