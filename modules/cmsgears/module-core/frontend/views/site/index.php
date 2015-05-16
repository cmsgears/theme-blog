<?php
use yii\captcha\Captcha; 
use yii\helpers\Html;

$coreProperties 		= $this->context->getCoreProperties();
$this->title 			= $coreProperties->getSiteTitle();
$this->params['desc']	= "The basic template with basic theme for CMSGears.";
$this->params['meta']	= "cmsgears, template, basic, theme";
?>
<div class="module module-basic" id="module-banner">
	<img src="<?= Yii::getAlias( '@images' ) . '/train.jpg' ?>">	  
</div> 

<div class="blog row">
	<div class="content-80 clearfix">
		<!-- Blog Posts --------------- -->
		<div class="col12x9">
			<h1 class="title-large"> Recent Posts </h1>
			<div id="wrap-posts">
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
						<img class="fluid" src="<?= Yii::getAlias( '@images' ) . '/media-2.jpg' ?>">
						<div class="hover-content frm-rounded-all">
							<div class="icon fa fa-pencil"></div>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
							<a class="btn"> VIEW POST </a>
						</div>	
					</div>
					<div class="colf12x3"></div>
					<div class="colf12x9"><h2 class="title-medium"> Post Title Goes Here </h2></div>
				</div>	
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
			</div>	
		</div>
		
		<!-- Sidebar --------------- -->
		<div class="col12x3" id="sidebar"></div>
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
 