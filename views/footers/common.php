<?php
use yii\helpers\Html;
?>
<footer class="footer-main">
	<div class="row max-cols content-80 clearfix">
		<div class="col12x2">
			<h2 class="footer-title">Site</h2>
			<ul>
				<li><?= Html::a( 'Home', [ '/' ] ) ?></li>
				<li><?= Html::a( 'Contact', [ '/contact-us' ] ) ?></li>
			</ul>
		</div>
		<div class="col12x2">
			<h2 class="footer-title">Users</h2>
			<ul>
				<li><?= Html::a( 'Login', [ '/login' ] ) ?></li>
				<li><?= Html::a( 'Register', [ '/register' ] ) ?></li>
			</ul>
		</div>
		<div class="col12x8">
			<ul class="social-icon-footer">
				<a href="https://www.facebook.com/" target="_blank"><li><i class="cmti cmti-3x cmti-social-facebook"> </i> </li></a>
				<a href="https://twitter.com/" target="_blank"><li> <i class="cmti cmti-3x cmti-social-twitter"> </i></li></a>
				<a href="https://plus.google.com" target="_blank"><li> <i class="cmti cmti-3x cmti-social-google-plus"> </i> </li></a>
				<a href="https://in.linkedin.com/" target="_blank"><li><i class="cmti cmti-3x cmti-social-linkedin"> </i> </li></a>
			</ul>
		</div>
	</div>
</footer>
<footer class="footer-copyright">
	<div class="row max-cols-100 content-80 clearfix">
		<div class="col2">Copyright © <?=date( 'Y' )?> <?=$coreProperties->getSiteName()?>. All Rights Reserved.</div>
		<div class="col2 align align-right">Designed and developed by <a href="http://www.vulpinecode.com" target="_blank">VulpineCode Technologies</a></div>
	</div>
</footer>