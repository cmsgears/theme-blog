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
 
<div class="blog row">
	<div class="content-80 clearfix max-cols-100">
		<!-- Blog Posts --------------- -->
		<div class="col12x9">
			<div class="row clearfix">
				<div class="colf1"><h6> A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. </h6></div>			
			</div> 		 
			  	<?= BlogPost::widget([
				        'options' => [ 'class' => 'wrap-posts clearfix' ], 
				        'viewFile' => 'post/recent',
						'viewsDirectory' => Yii::getAlias( '@templates/widget/blog' ),
						'pagination' => true,
						'limit' => 5
				    ]);
				?>			 
		</div>
		<div class="col12x3" id="sidebar">
			<?php include_once Yii::getAlias("@themes")."/blog/views/sidebars/sidebar-right.php" ?>
		</div>
	</div>	
</div> 	