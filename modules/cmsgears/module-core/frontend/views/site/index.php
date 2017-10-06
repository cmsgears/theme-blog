<?php
// CMG Imports 
use cmsgears\widgets\dblock\DynamicBlock;
use cmsgears\widgets\blog\BlogPost;
?>

<?= DynamicBlock::widget([
	'options' => [ 'id' => 'block-banner', 'class' => 'block block-basic' ], 
	'slug' => 'main', 
	'parallaxBkg' => true,
	'texture' => true,
	'textureClass' => 'texture texture-grid-b'
]);?>