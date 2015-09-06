<?php
use yii\captcha\Captcha; 
use yii\helpers\Html;
use widgets\Post;
use widgets\Tag;

$coreProperties 		= $this->context->getCoreProperties();
$this->title 			= $coreProperties->getSiteTitle();
$this->params['desc']	= "The basic template with basic theme for CMSGears.";
$this->params['meta']	= "cmsgears, template, basic, theme";
?>


  
<div class="blog row" id="template-blog">
	<div class="content-80 clearfix">
		 
		<div class="col12x9">
			<div class="row clearfix">
				<div class="colf12x8"><h1 class="title-large"> Recent Posts </h1></div>
				<div class="colf12x4 align-right"><a class="switch-view fa fa-th icon-grid" title="Grid View"></a></div>
			</div>	 
			<?php
			    echo Post::widget([
			        'options' => [ 'class' => 'wrap-posts clearfix' ],
			        'page' => 'blog'
			    ]);
			?>
			<!-- 
			 <div class="wrap-pagination">  
				<div class="pagination tag">
					<h1 class="title-medium"> Tag Cloud </h1>
					<ul> 
						<li><a>ajax</a></li>
						<li><a>java</a></li>
						<li><a>php</a></li>
						<li><a>c#</a></li>
						<li><a>c++</a></li>  
						<li><a>ruby</a></li>
						<li><a>rails</a></li>
						<li><a class="active">yii</a></li>
						<li><a>sass</a></li>
						<li><a>html5</a></li>   
						<li><a>c#</a></li>
						<li><a>swift</a></li>  
						<li><a>ruby</a></li>
						<li><a>visual basic</a></li>
						<li><a>ajax</a></li>
						<li><a>fox pro</a></li>
						<li><a>php</a></li>
						<li><a>c#</a></li>
						<li><a>c++</a></li>    
					</ul>	
				</div> 
			</div>	--> 
		</div>		
		</div>
		 
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
				<div class="tag">
					<?php
					    echo Tag::widget([]);
					?>  		
				</div>	
			</div>
		</div>
	</div>
	 
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
 
 