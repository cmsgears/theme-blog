<?php

// Yii Imports
use \Yii;
use yii\helpers\Html;
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
$time 			= strtotime( $postTime );
$day			= date( 'd', $time );
$month			= date( 'm', $time );
$year			= date( 'y', $time );
$dateObj		= DateTime::createFromFormat( '!m', $month );
$monthName		= $dateObj->format( 'F' ); 
$monthName 		= substr( $monthName, 0, 3 );

if( isset( $banner ) ) {

	$bannerUrl	 = $banner->getFileUrl(); 
}
else {

	$postHtml	.= "<div class='post-content full'>";
}

if( $avatarThumb == '' ) {
	
	$avatarThumb = "<img class='avatar' src='$defaultAvatar'>";
}
else {		
	
	$avatarThumb = "<img class='avatar' src='$avatarThumb'>";
}

$postHtml	.= '<div class="post row clearfix">
					<div class="colf12x2 sidebar clearfix">
						<div class="date">
							<p class="day">'.$day.'</p>
							<p class="month">'.$monthName.'-'.$year.'</p>
						</div>
						<div class="comment align-middle">
							<p>235</p>
							<p class="cmti cmti-comment"></p>
						</div>
					</div>
					<div class="colf12x10 media align-middle"> 
						<div class="post-banner" style="background:url('.$bannerUrl.')"></div>
						<div class="hover-content align align-middle frm-rounded-all"> 
							<div class="shape hexagon">'.$avatarThumb.'</div> 
							<span class="author"> <span class="title"> Posted by: </span> <span class="name"> '.$author->name.' </span> </span>	
							<p>'.substr( $summary, 0, 150 ).'...</p>
							'.$view.'
						</div>	
					</div> 
					<div class="colf12x10 wrap-post-title right"><h2 class="title title-medium">'.$title.' </h2></div>
				</div>';

echo Html::tag( 'div', $postHtml, [ 'class' => 'post' ] );
?>