<?php
// Yii Imports 
use cmsgears\widgets\blog\BlogPost;

// CMG Imports
use cmsgears\widgets\block\BasicBlock; 

$coreProperties = $this->context->getCoreProperties();
$this->title 	= $coreProperties->getSiteTitle() . " | Blog";
?>

<?php BasicBlock::begin([
	'options' => [ 'id' => 'block-blog', 'class' => 'block block-basic' ],
	'bkg' => true,
	'texture' => true, 'textureClass' => 'texture-default',
	'header' => true, 'headerContent' => "<h3 class='align align-middle'>BLOG</h3>",
	'content' => true
]);?>

	<div class="module-content content-80">
		<?=$content->content?>
	</div>
	<div class="row clearfix max-cols-100">
		<div class="col12x6">
			<?= BlogPost::widget([
			        'options' => [ 'class' => 'content-80 blog-posts-regular' ]
			    ]);
			?>
		</div>	
	</div>	

<?php BasicBlock::end(); ?>