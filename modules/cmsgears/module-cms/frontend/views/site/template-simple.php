<?php
use yii\captcha\Captcha; 
use yii\helpers\Html; 
use widgets\EmailFollow;
use widgets\SocialShare;

$coreProperties 		= $this->context->getCoreProperties();
$this->title 			= $coreProperties->getSiteTitle().' | '.$page->name;
$this->params['desc']	= "The basic template with basic theme for CMSGears.";
$this->params['meta']	= "cmsgears, template, basic, theme";
?>

<section class="module module-page" id="module-page">
	<div class="texture texture1"></div>
	<div class="module-wrap-content content-80">
		<div class="module-header">
			<h1 class="align-middle"> </h1>
		</div> 
	</div>
</section>

<div class="blog row" id="template-blog">
	<div class="content-80 clearfix">
		 
		<div class="col12x9">
			<div class="row clearfix wrap-posts post-single"> 
				<div class="colf12x8"><h1 class="title-large"> <?=$page->name?> </h1></div>	
				<img class="fluid" src='<?= $page->banner->getFileUrl() ?>'> 
				<div class="post-data clearfix">
					<div class="date"> <span class="fa fa-clock-o"></span> <?= $page->publishedAt ?></div>
					<div class="comment"> <span class="fa fa-comments"></span> 220 </div>
				</div>	
				<p class="content"> <?= $page->content ?> </p>
				
				<div class="post-comment" id="wrap-comment">
					<div class="comment title-medium"> 10 Thoughts on - <?= $page->name ?></div>
					<div class="wrap-comments"> 
						<?php for( $i=0; $i<=3; $i++ ) { ?>
							<div class="row comment clearfix">
								<div class="col12x2 media">
									<?php 
									$avatar	= $page->author->avatar;
									if( isset( $avatar ) ) { ?> 
										<img class="fluid" src="<?= $avatar->getThumbUrl() ?>">
									<?php } else { ?>	
										<div class="fa fa-user"></div>
									<?php } ?>
								</div>	
								<div class="col12x10 content clearfix">
									<div class="comment-user"> By - Michelle </div>
									<div class="comment-date"> On - 10 Aug, 2015 </div>
									<p class="comment-content">Lorem Ipsum is simply dummy text of the printing.</p>
								</div>	
							</div>  
						<?php } ?>				
					</div>	
					<div id="frm-comment">
								<h1 class="title-medium"> Write Your Comment - </h1>
								<form>
									<div class="row clearfix">
										<div class="col12x5"><input type="text" placeholder="Name*"></div>
										<div class="col12x2"></div>
										<div class="col12x5"><input type="text" placeholder="Email*"></div>
									<div>
									<div class="row clearfix">
										<div class="col1">
											<textarea placeholder="Write Comment*"></textarea>
										</div>
									</div>	
									<div class="row clearfix">	
										<div class="col1"> <input type="submit" value="SUBMIT"> </div>
									</div>		
								</form>
							</div>	
						</div>	 	 
					</div>
				</div>
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
				<?php for( $i=0; $i<=3; $i++ ) { ?>
					<a class="row sidebar-post clearfix">
						<div class="colf12x4 sidebar-media">
							<img class="fluid" src="<?= Yii::getAlias( '@images' ) . '/media-1.jpg' ?>">
						</div>	
						<div class="col12x8 content">
							<p>Lorem Ipsum is simply dummy text of the printing.</p>
						</div>	
					</a> 			
				<?php } ?>	
			</div>	
			<div class="wrap-sidebar-posts">
				<h1 class="title-medium"> Blog Archive </h1> 			
			</div>	
			<div class="wrap-sidebar-posts">
				<h1 class="title-medium"> Follow By Email </h1> 
				<?php
				    echo EmailFollow::widget([
				        'options' => [ 'action' => '', 'frmClass' => '', 'placeholder' => 'Email ...', 'submitValue' => 'SUBSCRIBE', 'btnClass' => '' ]
				    ]);
				?> 	
			</div>
			<div class="wrap-sidebar-posts">
				<h1 class="title-medium"> Tag Cloud </h1> 			
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