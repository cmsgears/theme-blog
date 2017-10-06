<?php 
	use cmsgears\widgets\blog\PopularPost;
	use widgets\EmailFollow;
?>
<form id="search">
	<table>
		<tr>
			<td><input type="text" placeholder="Search"></td>
			<td class="button"><button type="submit" class="cmti cmti-search"></button></td>
		</tr>
	</table>		 
</form>	
<div class="wrap-sidebar-posts">
	<h1 class="title title-small"> Popular Posts </h1>
	
	<?= PopularPost::widget([
	        'options' => [ 'class' => 'wrap-posts clearfix' ],
	        'limit' => 3,
	        'viewFile' => 'post/popular',
			'viewsDirectory' => Yii::getAlias( '@templates/widget/blog' )
	    ]);
	?>	 
	 			
</div>	
<div class="wrap-sidebar-posts">
	<h1 class="title title-small"> Blog Archive </h1> 			
</div>	
	<div class="wrap-sidebar-posts">
	<h1 class="title title-small"> Follow By Email </h1> 			
</div>
<div class="wrap-sidebar-posts">
	<h1 class="title title-small"> Tag Cloud </h1> 			
</div>

<div class="wrap-sidebar-posts">
	<h1 class="title title-small"> Follow By Email </h1>
	<?= EmailFollow::widget([]) ?> 			
</div>