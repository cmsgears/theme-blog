<?php
// Yii Imports
use yii\captcha\Captcha;
use yii\helpers\Html;
use widgets\Post;

// CMG Imports
use cmsgears\cms\frontend\services\PageService;

$page 		= PageService::findBySlug( 'home' );
$banner		= $page->content->banner;
$background	= isset( $banner ) ? $banner->getFileUrl() : '';
?>
<section id="module-banner" class="module module-basic">
	<div class="module-bkg-scroll" style="<?php if( isset( $banner ) ) echo "background-image:url( $background )";?>"></div>
</section>