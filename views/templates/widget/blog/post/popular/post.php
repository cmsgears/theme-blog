<?php

// Yii Imports
use \Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use cmsgears\core\common\utilities\DateUtil;

// Post Author
$author			= $post->creator;
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

// Post Content
$content		= $post->content;
$banner			= $content->banner;
$title			= Html::a( $post->name, [ '/post/' . $post->slug ] );
$view			= Html::a( 'VIEW POST', [ '/post/' . $post->slug ], [ 'class' => 'btn rounded rounded-50' ] );
$summary		= $content->summary;
$postTime		= $content->publishedAt;
$postHtml		= "";
$bannerUrl		= null;  

if( isset( $banner ) ) {

	$bannerUrl	 = $banner->getFileUrl(); 
}
else {

	$postHtml	.= "<div class='post-content full'>";
}

if( $avatarThumb == '' ) {
	
	$avatarThumb = "<img class='fluid' src='$defaultAvatar'>";
}
else {		
	
	$avatarThumb = "<img class='fluid' src='$avatarThumb'>";
}

$postHtml	.= '<a href="'.Url::toRoute( [ '/post/' . $post->slug ] ).'" class="sidebar-post row clearfix">
					<div class="colf12x4 sidebar-media">
						 <img class="fluid" src="'.$bannerUrl.'">
					</div>	
					<div class="col12x8 content">
						<p>'.substr( $summary, 0, 70 ).'...</p>
					</div> 
				</a>';

echo Html::tag( 'div', $postHtml );
?>