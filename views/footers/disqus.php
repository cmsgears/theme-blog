<?php
// Yii Imports
use yii\helpers\Url;

$commentProperties	= $this->context->getCommentProperties();
$cmsProperties		= $this->context->getCmsProperties();

$model = $this->params[ 'model' ];

$data		= json_decode( $model->data );
$settings	= isset( $data->settings ) ? $data->settings : [];

$comments	= $commentProperties->isComments() && $cmsProperties->isPostComments() && $model->comments;
$disqus		= !empty( $settings->disqus ) ? ( $comments && $settings->disqus ) : false;
$forum		= $commentProperties->getDisqusForum();
?>
<?php if( $disqus && !empty( $forum ) ) { ?>
<script>

var disqus_config = function () {
	this.page.url = '<?= Url::canonical() ?>';
	this.page.identifier = <?= $model->slug ?>; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://<?= $forum ?>.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<?php } ?>
