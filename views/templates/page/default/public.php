<?php
$modelContent	= $model->modelContent;
$data			= json_decode( $model->data );

$settings = $data->settings ?? null;

$content			= $settings->content ?? true;
$contentData		= $modelContent->content;
$contentClass		= !empty( $settings->contentClass ) ? $settings->contentClass : 'row content-90';
$contentDataClass	= !empty( $settings->contentDataClass ) ? $settings->contentDataClass : 'reader';
$boxWrapClass		= !empty( $settings->boxWrapClass ) ? $settings->boxWrapClass : 'row content-90';
?>
<div id="block-public" class="block block-page">
	<div class="block-content-wrap">
		<?php include_once dirname( __DIR__ ) . '/includes/header.php'; ?>
		<?php if( $content ) { ?>
			<div class="block-content <?= $contentClass ?>">
				<div class="block-content-data <?= $contentDataClass ?>">
					<?= $contentData ?>
				</div>
				<?php include_once dirname( __DIR__ ) . '/includes/elements.php'; ?>
			</div>
		<?php } ?>
		<div class="page-block-wrap">
			<?php include_once dirname( __DIR__ ) . '/includes/blocks.php'; ?>
		</div>
	</div>
</div>
