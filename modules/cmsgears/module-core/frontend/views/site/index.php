<?php
// CMG Imports
use cmsgears\widgets\block\BasicBlock;
use cmsgears\widgets\dblock\DynamicBlock;
use cmsgears\widgets\blog\BlogPost;
?>

<?= DynamicBlock::widget([
	'options' => [ 'id' => 'block-banner', 'class' => 'block block-basic' ],
	'scrollBkg' => true,
	'slug' => 'main'
]);?>