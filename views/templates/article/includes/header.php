<?php
// CMG Imports
use cmsgears\core\frontend\config\SiteProperties;

use cmsgears\core\common\utilities\CodeGenUtil;

$header				= isset( $settings ) ? $settings->header : true;
$headerIcon			= isset( $settings ) ? $settings->headerIcon : null;
$headerIconClass	= $model->icon;
$headerTitle		= !empty( $model->title ) ? $model->title : $model->name;
$headerInfo			= isset( $settings ) && $settings->description ? $model->description : null;
$headerContent		= isset( $settings ) && $settings->summary ? $modelContent->summary : null;

$bkg			= isset( $settings ) ? $settings->bkg : false;
$fixedBkg		= isset( $settings ) ? $settings->fixedBkg : false;
$scrollBkg		= isset( $settings ) ? $settings->scrollBkg : false;
$parallaxBkg	= isset( $settings ) ? $settings->parallaxBkg : false;
$bkgClass		= isset( $settings ) ? $settings->bkgClass : false;

$texture		= isset( $settings ) ? $settings->texture : true;
$textureClass	= $model->texture;

$avatar			= SiteProperties::getInstance()->getDefaultAvatar();
$headerIconUrl	= CodeGenUtil::getFileUrl( $model->avatar, [ 'image' => $avatar ] );
$headerIconUrl	= !empty( $headerIconUrl ) ? $headerIconUrl : ( !empty( $settings->headerIconUrl ) ? $settings->headerIconUrl : $widget->headerIconUrl );

$banner		= SiteProperties::getInstance()->getDefaultBanner();
$bannerUrl	= CodeGenUtil::getFileUrl( $model->modelContent->banner, [ 'image' => $banner ] );
$bannerUrl	= isset( $settings ) && $settings->banner ? $bannerUrl : null;

$gallery		= $modelContent->gallery;
$slides			= isset( $settings ) && $settings->gallery && isset( $gallery ) ? $gallery->files : [];
$headerBanner	= !empty( $bannerUrl ) && empty( $slides );
$headerClass	= !empty( $slides ) ? 'header-plain content-90' : ( $headerBanner ? 'header-banner valign-center' : null );
?>

<?php if( $header ) { ?>
<div class="block-header-wrap <?= $headerBanner || !empty( $slides ) ? 'block-header-banner' : null ?>">
	<?php if( $headerBanner ) { ?>
		<?php if( $bkg ) { ?>
			<div class="block-bkg <?= $bkgClass ?>" style="background-image: url(<?= $bannerUrl ?>);"></div>
		<?php } ?>

		<?php if( $fixedBkg ) { ?>
			<div class="block-bkg-fixed <?= $bkgClass ?>" style="background-image: url(<?= $bannerUrl ?>);"></div>
		<?php } ?>

		<?php if( $scrollBkg ) { ?>
			<div class="block-bkg-scroll <?= $bkgClass ?>" style="background-image: url(<?= $bannerUrl ?>);"></div>
		<?php } ?>

		<?php if( $parallaxBkg ) { ?>
			<div class="block-bkg-parallax <?= $bkgClass ?>" style="background-image: url(<?= $bannerUrl ?>);"></div>
		<?php } ?>

		<?php if( $texture ) { ?>
			<div class="<?= $textureClass ?>"></div>
		<?php } ?>
	<?php } ?>
	<?php if( !empty( $slides ) ) { ?>
		<div id="page-slider" class="fx-slider fx-slider-regular">
		<?php
			foreach( $slides as $slide ) {

				$slideImageUrl	= $slide->getFileUrl();
				$slideImageAlt	= $slide->altText;
		?>
			<div>
				<div class="wrap-slide-content" style="background-image:url(<?= $slideImageUrl ?>)">
					<?php if( $texture ) { ?>
						<div class="<?= $textureClass ?>"></div>
					<?php } ?>
					<div class="slide-content">
						<div class="fxs-content reader">
							<div class="h3"><?= $slide->title ?></div>
							<?php if( !empty( $slide->description ) ) { ?>
								<div class="text text-default-r">
									<?= $slide->description ?>
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
	<?php } else if( $headerBanner ) { ?>
		<div class="block-header <?= $headerClass ?>">
			<div class="block-header-icon">
			</div>
			<div class="block-header-title">
				<?= $headerTitle ?>
			</div>
			<?php if( !empty( $headerInfo ) ) { ?>
				<div class="block-header-info content-90">
					<?= $headerInfo ?>
				</div>
			<?php } ?>
			<?php if( !empty( $headerContent ) ) { ?>
				<div class="block-header-content content-90">
					<?= $headerContent ?>
				</div>
			<?php } ?>
		</div>
	<?php } ?>
</div>
<?php if( !empty( $slides ) && $headerBanner ) { ?>
	<div class="block-header-wrap">
		<div class="block-header <?= $headerClass ?>">
			<div class="block-header-icon">
			</div>
			<div class="block-header-title">
				<?= $headerTitle ?>
			</div>
			<?php if( !empty( $headerInfo ) ) { ?>
				<div class="block-header-info content-90">
					<?= $headerInfo ?>
				</div>
			<?php } ?>
			<?php if( !empty( $headerContent ) ) { ?>
				<div class="block-header-content content-90">
					<?= $headerContent ?>
				</div>
			<?php } ?>
		</div>
	</div>
<?php } ?>
<?php } ?>
