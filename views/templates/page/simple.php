<?php
// CMG Imports
use cmsgears\widgets\block\BasicBlock;
?>

<?=BasicBlock::widget([
	'options' => [ 'id' => 'block-page', 'class' => 'block block-basic' ],
	'bkg' => true,
	'texture' => true, 'textureClass' => 'texture-default',
	'header' => true, 'headerContent' => "<h3 class='align align-middle'>$page->name</h3>",
	'content' => true, 'contentData' => $content->content
]);?>