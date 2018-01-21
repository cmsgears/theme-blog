<?php

// Yii Imports
use yii\helpers\Html;

// CMG Imports
use cmsgears\widgets\block\BasicBlock;

// Post Author
$author			= $page->creator;
$avatar			= $author->avatar;
$defaultAvatar	= Yii::getAlias('@web') . '/images/avatar.png';
$authorInfo		= "<span class='info'>$author->name</span>";
$avatarThumb	= '';

if( isset( $avatar ) ) {

	$avatarThumb = $avatar->getThumbUrl(); 			
	$authorInfo .= "<span class='avatar'><img class='avatar' src='$avatarThumb'></span>";
}
else { 

	$authorInfo .= "<span class='avatar'><img class='avatar' src='$defaultAvatar'></span>";
}

$authorInfo	   .= "<span class='info'>$author->name</span>";
$content		= $page->content;
$banner			= $content->banner;
$title			= Html::a( $page->name, [ '/post/' . $page->slug ] );  
$postTime		= $content->publishedAt; 
$bannerUrl		= null;  

if( isset( $banner ) ) {

	$bannerUrl	 = $banner->getFileUrl(); 
}
else {

	$postHtml	.= "<div class='post-content full'>";
} 

?>
<?php BasicBlock::begin([
	'options' => [ 'id' => 'block-page', 'class' => 'block block-basic' ],
	'bkg' => true,
	'texture' => true, 'textureClass' => 'texture-default', 
	'content' => true,
	'contentClass' => 'single-post'
]);?>
 
<div class="blog row">
	<div class="clearfix max-cols-100 post-single">
		<!-- Blog Posts --------------- -->
		<div class="col12x9">
			<div class="row clearfix">
				<div class="colf1"><h6 class="title title-medium"> <?=$title?> </h6></div>			
			</div> 	
			<img class="banner fluid" src="<?=$bannerUrl?>"> 	
			<div class="clearfix row">
				<div class="col12x6 title title-small"> Posted on - <?= $postTime ?> </div>
				<div class="col12x6 align align-right title title-small"> <span class="cmti cmti-comment"> 566 </span> </div>	
			</div>
			<p class="post-content"><?=$content->content?></p>		 
		</div>
		<div class="col12x3" id="sidebar">
			<?php include_once Yii::getAlias("@themes")."/blog/views/sidebars/sidebar-right.php" ?>
		</div>
	</div>	
</div>  

<?php BasicBlock::end() ?>