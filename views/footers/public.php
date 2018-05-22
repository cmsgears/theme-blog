<?php
// CMG Imports
use cmsgears\widgets\elements\Nav;
use cmsgears\widgets\blog\PostWidget;
use cmsgears\widgets\newsletter\FollowMeWidget;

// SF Imports
use themes\blog\Theme;
?>
<footer class="footer footer-basic footer-main">
	<div class="footer-content row row-large max-cols-100 col-filler-wrap">
		<div class="col col12x4 col-filler"></div>
		<div class="footer-part col col12x4">
			<div class="h5 part-header">Useful Links</div>
			<?= Nav::widget([
				'view' => $this, 'slug' => Theme::MENU_LINKS,
				'options' => [ 'id' => 'menu-links', 'class' => 'nav' ]
			])?>
		</div>
		<div class="col col12x8 col-filler"></div>
		<div class="footer-part col col12x4">
			<div class="h5 part-header">Featured Posts</div>
			<?= PostWidget::widget([
				'pagination' => false, 'defaultBanner' => true, 'limit' => 6,
				'template' => 'avatar', 'widget' => 'featured',
				'wrapperOptions' => [ 'class' => 'blog-posts row' ],
				'singleOptions' => [ 'class' => 'blog-post' ]
			])?>
		</div>
		<div class="footer-part col col12x4">
			<div class="h5 part-header">Newsletter</div>
			<div class="margin margin-small-v text text-primary">Join our newsletter to get frequent updates from us.</div>
			<?= FollowMeWidget::widget([
				'wrap' => true, 'options' => [ 'class' => 'footer-newsletter-wrap' ]
			]) ?>
		</div>
	</div>
</footer>
<footer class="footer footer-copyright row content-90">
	<div class="padding padding-small-v">
		Copyright © 2017 - <?= date( 'Y' ) ?> <?= $coreProperties->getSiteName() ?>. All Rights Reserved.
	</div>
	<a id="btn-scroll-top" href="#scroll-top" title="Scroll Up" class="smooth-scroll circled circled1">
		<i class="icon fa fa-chevron-up"></i>
	</a>
</footer>
