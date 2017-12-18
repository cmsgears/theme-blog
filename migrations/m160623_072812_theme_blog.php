<?php
// CMG Imports
use cmsgears\core\common\config\CoreGlobal;
use cmsgears\cms\common\config\CmsGlobal;

use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\User;
use cmsgears\core\common\models\entities\Template;
use cmsgears\core\common\models\entities\Theme;

use cmsgears\cms\common\models\entities\Page;

use cmsgears\core\common\utilities\DateUtil;

class m160623_072812_theme_blog extends \yii\db\Migration {

	// Public variables

	// Make this theme as default theme.
	public $default 	= true;

	// Allow this theme to be applied for site using current site slug.
	public $activate	= true;

	// Private Variables

	private $cmgPrefix;
	private $appPrefix;

	private $site;

	private $master;

	public function init() {

		// Table prefix
		$this->cmgPrefix	= Yii::$app->migration->cmgPrefix;
		$this->appPrefix	= Yii::$app->migration->appPrefix;

		$this->site			= Site::findBySlug( CoreGlobal::SITE_MAIN );
		$this->master		= User::findByUsername( Yii::$app->migration->getSiteMaster() );
	}

	public function up() {

		// Theme
		$this->insertTheme();

		// Templates
		$this->insertThemeTemplates();

		// Objects
		$this->insertObjects();

		// Page
		$this->configurePageTemplates();

		// Site
		$this->configureTheme();
	}

	private function insertTheme() {

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'description', 'renderer', 'basePath', 'createdAt', 'modifiedAt', 'data' ];

		$themes = [
			[ $this->master->id, $this->master->id, 'Blog', 'blog', CoreGlobal::TYPE_SITE, 'Blog Theme.', null, '@themes/blog', DateUtil::getDateTime(), DateUtil::getDateTime(), null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_theme', $columns, $themes );

		if( $this->default ) {

			// Update default
			$this->update( $this->cmgPrefix . 'core_theme', [ 'default' => false ], [ 'default' => true ] );

			// Make current as default
			$this->update( $this->cmgPrefix . 'core_theme', [ 'default' => true ], "slug='blog'" );
		}
	}

	private function insertThemeTemplates() {

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'icon', 'type', 'active', 'description', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'createdAt', 'modifiedAt', 'content', 'data' ];

		$templates = [
			[ $this->master->id, $this->master->id, 'Page', 'page', null, 'page', true, 'Page layout for pages.', 'default', true, 'page/default', false, 'views/templates/page/default', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $this->master->id, $this->master->id, 'Blog', 'blog', null, 'page', true, 'Blog layout to view all blog posts or filters(category, author).', 'default', true, 'page/blog', false, 'views/templates/page/blog', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $this->master->id, $this->master->id, 'Post', 'post', null, 'blog', true, 'Post layout for posts.', 'default', true, 'post/default', true, 'views/templates/post/default', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $this->master->id, $this->master->id, 'Form', 'form', null, 'form', true, 'It can be used to display public forms.', 'default', true, 'form/default', false, 'views/templates/form/default', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $this->master->id, $this->master->id, 'Text Social', 'text-social', null, 'widget', true, 'It can be used to display key values for social links.', 'default', true, null, false, 'views/templates/widget/text/social', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $this->master->id, $this->master->id, 'Text Address', 'text-address', null, 'widget', true, 'Used to display address on contact pages.', 'default', true, null, false, 'views/templates/widget/text/address', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertObjects() {

		$tSocialTemplate	= Template::findBySlugType( 'text-social', CmsGlobal::TYPE_WIDGET );
		$tAddressTemplate	= Template::findBySlugType( 'text-address', CmsGlobal::TYPE_WIDGET );

		$columns = [ 'siteId', 'templateId', 'avatarId', 'bannerId', 'createdBy', 'modifiedBy', 'name', 'slug', 'icon', 'type', 'description', 'active', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$objects = [
			[ $this->site->id, NULL,NULL,NULL,1,1,'Main','main',NULL,'menu','Main Menu used on landing header.',1,'2014-10-11 14:22:54','2016-04-16 10:00:10',NULL,NULL,NULL ],
			[ $this->site->id, NULL,NULL,NULL,1,1,'Secondary','secondary',NULL,'menu','Secondary Menu used on public header.',1,'2014-10-11 14:22:54','2014-10-11 14:22:54',NULL,NULL,NULL ],
			[ $this->site->id, NULL,NULL,NULL,1,1,'Footer 1','footer-1',NULL,'menu','About us menu used on footer.',1,'2016-04-16 09:27:00','2016-04-16 09:27:00',NULL,NULL,NULL ],
			[ $this->site->id, $tSocialTemplate->id, NULL,NULL,1,1,'Follow Us','follow-us',NULL,'widget','Social links on main menu',1,'2014-10-11 14:22:54','2016-04-15 08:33:58',NULL,NULL,'{"classPath":"","data":{"facebook":"http:\/\/www.facebook.com","twitter":"http:\/\/www.twitter.com","google-plus":"http:\/\/www.google.com","linkedin":"http:\/\/www.linkedin.com"}}' ],
			[ $this->site->id, $tAddressTemplate->id, NULL,NULL,1,1,'Main Address','main-address',NULL,'widget','Address displayed on footer.',1,'2014-10-11 14:22:54','2016-04-14 20:03:46',NULL,NULL,'{"classPath":"","data":{"line1":"Lorem Ipsum is simply dummy text of the printing and typesetting industry.","line2":"Lorem Ipsum has been the industry standard","line3":"dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make","phone":"+00 0000000000 - +00 0000000000","email":"info@cmsgears.com"}}' ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $objects );
	}

	private function configurePageTemplates() {

		// Templates
		$pageTemplate	= Template::findBySlugType( 'page', CmsGlobal::TYPE_PAGE );
		$blogTemplate	= Template::findBySlugType( 'blog', CmsGlobal::TYPE_PAGE );

		// Pages
		$aboutPage		= Page::findBySlugType( 'about-us', CmsGlobal::TYPE_PAGE );
		$termPage		= Page::findBySlugType( 'terms', CmsGlobal::TYPE_PAGE );
		$privacyPage	= Page::findBySlugType( 'privacy', CmsGlobal::TYPE_PAGE );
		$blogPage		= Page::findBySlugType( 'blog', CmsGlobal::TYPE_PAGE );

		$pages			= [ $aboutPage->id, $termPage->id, $privacyPage->id ];
		$pages			= join( ',', $pages );

		if( $this->activate ) {

			$this->update( $this->cmgPrefix . 'cms_model_content', [ 'templateId' => $pageTemplate->id ], "id in ($pages)" );
			$this->update( $this->cmgPrefix . 'cms_model_content', [ 'templateId' => $blogTemplate->id ], "id=$blogPage->id" );
		}
	}

	private function configureTheme() {

		// Theme
		$mainTheme	= Theme::findBySlug( 'blog' );

		// Site
		$siteId		= $this->site->id;

		if( $this->activate ) {

			$this->update( $this->cmgPrefix . 'core_site', [ 'themeId' => $mainTheme->id ], "id=$siteId" );
		}
	}

	public function down() {

		echo "m160623_040743_theme_blog will be deleted with m160621_014408_core.\n";

		return true;
	}
}
