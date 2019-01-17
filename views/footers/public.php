<?php
// CMG Imports
use cmsgears\widgets\elements\Nav;
use cmsgears\widgets\club\cms\PostWidget;
use cmsgears\widgets\newsletter\FollowMeWidget;

// Blog Imports
use themes\blog\Theme;
?>
<footer class="footer footer-basic footer-main">
	<div class="footer-content row row-xlarge max-cols-100 col-filler-wrap">
		<div class="colf colf12x8">
			<div class="row max-cols-50">
				<div class="footer-col col col12x6">
					<div class="h5 col-header">Links</div>
					<?= Nav::widget([
						'view' => $this, 'slug' => Theme::MENU_LINKS,
						'options' => [ 'id' => 'menu-links', 'class' => 'nav' ]
					])?>
				</div>
				<div class="footer-col col col12x6">
					<div class="h5 col-header">Featured Posts</div>
					<?= PostWidget::widget([
						'pagination' => false, 'defaultBanner' => true, 'limit' => 6,
						'template' => 'avatar', 'widget' => 'featured',
						'wrapperOptions' => [ 'class' => 'blog-posts row' ],
						'singleOptions' => [ 'class' => 'blog-post' ]
					])?>
				</div>
			</div>
		</div>
		<div class="footer-col col col12x4">
			<div class="h5 col-header">Newsletter</div>
			<div>Sign Up to receive updates from us.</div>
			<?= FollowMeWidget::widget([
				'wrap' => true, 'options' => [ 'class' => 'footer-newsletter-wrap' ],
				'templateDir' => '@themeTemplates/widget/newsletter'
			]) ?>
		</div>
	</div>
</footer>
<footer class="footer footer-copyright">
	<div class="row row-xlarge padding padding-small-v align align-center">
		Copyright © 2017 - <?= date( 'Y' ) ?> <?= $coreProperties->getSiteName() ?>. All Rights Reserved.
	</div>
</footer>
