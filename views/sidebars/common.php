<?php
use yii\helpers\Url;

use cmsgears\files\widgets\AvatarUploader;
?>

<?=AvatarUploader::widget([ 
			'options' => [ 'id' => 'avatar-user', 'class' => 'file-uploader' ], 
			'model' => $user->avatar,  
			'postaction' => true, 'cmtcontroller' => 'default', 'cmtaction' => 'avatar',
			'postactionurl' => Url::toRoute( [ 'apix/user/avatar'], true )
]);?>