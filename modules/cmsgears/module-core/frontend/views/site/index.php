<?php
use yii\captcha\Captcha;
use yii\helpers\Html;
use widgets\Post;
?>
<div class="module module-basic" id="module-banner">
	<img src="<?= Yii::getAlias( '@images' ) . '/train.jpg' ?>">
</div>

<div class="blog row">
	<div class="content-80 clearfix">
		<!-- Blog Posts --------------- -->
		<div class="col12x9">
			<div class="row clearfix">
				<div class="colf12x8"><h1 class="title-large"> Recent Posts </h1></div>
				<div class="colf12x4 align-right"><a class="switch-view fa fa-th icon-grid" title="Grid View"></a></div>
			</div>	
			
			<?php
			    echo Post::widget([
			        'options' => [ 'class' => 'wrap-posts clearfix' ],
			        'page' => 'home'
			    ]);
			?>
			
			<!--
			<div class="wrap-posts clearfix">
				<div class="post row clearfix">
					<div class="colf12x3 sidebar">
						<div class="date">
							<p class="day">25</p>
							<p class="month">JUNE-15</p>
						</div>
						<div class="comment align-middle">
							<p>235</p>
							<p class="fa fa-comments"></p>
						</div>
					</div>
					<div class="colf12x9 media align-middle"> 
						<img class="fluid" src="<?= Yii::getAlias( '@images' ) . '/media-1.jpg' ?>">
						<div class="hover-content frm-rounded-all">
							<div class="icon fa fa-pencil"></div>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
							<a class="btn"> VIEW POST </a>
						</div>	
					</div>
					<div class="colf12x3"></div>
					<div class="colf12x9"><h2 class="title-medium"> Post Title Goes Here </h2></div>
				</div>	 			
			</div>	-->
		</div></div>
		
		<!-- Sidebar --------------- -->
		<div class="colf12x3" id="sidebar">
			<form id="search">
				<table>
					<tr>
						<td><input type="text" placeholder="Search"></td>
						<td class="button"><button type="submit" class="fa fa-search"></button></td>
					</tr>
				</table>		 
			</form>	
			<div class="wrap-sidebar-posts">
				<h1 class="title-medium"> Popular Posts </h1>
				<a class="row sidebar-post clearfix">
					<div class="colf12x4 sidebar-media">
						<img class="fluid" src="<?= Yii::getAlias( '@images' ) . '/media-1.jpg' ?>">
					</div>	
					<div class="col12x8 content">
						<p>Lorem Ipsum is simply dummy text of the printing.</p>
					</div>	
				</a>  
				<a class="row sidebar-post clearfix">
					<div class="colf12x4 sidebar-media">
						<img class="fluid" src="<?= Yii::getAlias( '@images' ) . '/media-2.jpg' ?>">
					</div>	
					<div class="col12x8 content">
						<p>Lorem Ipsum is simply dummy text of the printing.</p>
					</div>	
				</a>	
				<a class="row sidebar-post clearfix">
					<div class="colf12x4 sidebar-media">
						<img class="fluid" src="<?= Yii::getAlias( '@images' ) . '/media-1.jpg' ?>">
					</div>	
					<div class="col12x8 content">
						<p>Lorem Ipsum is simply dummy text of the printing.</p>
					</div>	
				</a>
				<a class="row sidebar-post clearfix">
					<div class="colf12x4 sidebar-media">
						<img class="fluid" src="<?= Yii::getAlias( '@images' ) . '/media-2.jpg' ?>">
					</div>	
					<div class="col12x8 content">
						<p>Lorem Ipsum is simply dummy text of the printing.</p>
					</div>	
				</a>
				<a class="row sidebar-post clearfix">
					<div class="colf12x4 sidebar-media">
						<img class="fluid" src="<?= Yii::getAlias( '@images' ) . '/media-1.jpg' ?>">
					</div>	
					<div class="col12x8 content">
						<p>Lorem Ipsum is simply dummy text of the printing.</p>
					</div>	
				</a> 			
			</div>	
			<div class="wrap-sidebar-posts">
				<h1 class="title-medium"> Blog Archive </h1> 			
			</div>	
				<div class="wrap-sidebar-posts">
				<h1 class="title-medium"> Follow By Email </h1> 			
			</div>
			<div class="wrap-sidebar-posts">
				<h1 class="title-medium"> Tag Cloud </h1> 			
			</div>
		</div>
	</div>
	<!--Stick Menu ------------------ -->
	<div class="cmg-stick-menu">
		<ul>
			<li class="menu-close"><a class="fa fa-arrow-circle-left"></a></li>
	        <li><a>HOME</a></li>
	        <li><a>BLOG</a></li>
	        <li><a>PORTFOLIO</a></li> 
	        <li><a>CONTACT US</a></li> 
		</ul>
	</div>		
</div>
 