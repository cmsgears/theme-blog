<?php
/**
 * This file is part of CMSGears Framework. Please view License file distributed
 * with the source code for license details.
 *
 * @link https://www.cmsgears.org/
 * @copyright Copyright (c) 2015 VulpineCode Technologies Pvt. Ltd.
 */

// CMG Imports
use cmsgears\core\common\config\CoreGlobal;
use cmsgears\cms\common\config\CmsGlobal;

use cmsgears\core\common\base\Migration;

use cmsgears\core\common\models\entities\ObjectData;
use cmsgears\core\common\models\entities\Site;
use cmsgears\core\common\models\entities\User;
use cmsgears\core\common\models\entities\Theme;
use cmsgears\core\common\models\entities\Template;
use cmsgears\cms\common\models\entities\Page;

use cmsgears\core\common\utilities\DateUtil;

/**
 * The blog theme migration inserts the theme data.
 *
 * @since 1.0.0
 */
class m180502_112655_theme_blog extends Migration {

	// Public variables

	// Make this theme as default theme.
	public $default 	= true;

	// Allow this theme to be applied for site using current site slug.
	public $activate	= true;

	// Private Variables

	private $cmgPrefix;
	private $sitePrefix;

	private $site;

	private $master;

	public function init() {

		// Table prefix
		$this->cmgPrefix	= Yii::$app->migration->cmgPrefix;
		$this->sitePrefix	= Yii::$app->migration->sitePrefix;

		$this->site		= Site::findBySlug( CoreGlobal::SITE_MAIN );
		$this->master	= User::findByUsername( Yii::$app->migration->getSiteMaster() );

		Yii::$app->core->setSite( $this->site );
	}

    public function up() {

		// Theme
		$this->insertTheme();

		// Templates
		$this->insertThemeTemplates();

		// Objects
		$this->insertThemeObjects();

		// Page
		$this->configurePageTemplates();

		// Site
		$this->configureTheme();
    }

	private function insertTheme() {

		$columns = [ 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'description', 'renderer', 'basePath', 'createdAt', 'modifiedAt', 'data' ];

		$themes = [
			[ $this->master->id, $this->master->id, 'Blog', 'blog', CoreGlobal::TYPE_SITE, 'Blog Theme.', 'default', '@themes/blog', DateUtil::getDateTime(), DateUtil::getDateTime(), null ]
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

		$theme = Theme::findBySlug( 'blog' );

		$columns = [ 'themeId', 'createdBy', 'modifiedBy', 'name', 'slug', 'icon', 'type', 'active', 'description', 'classPath', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'createdAt', 'modifiedAt', 'content', 'data' ];

		$templates = [
			[ $theme->id, $this->master->id, $this->master->id, 'Page', 'page', null, 'page', true, 'Page layout for pages.', null, 'default', true, 'page/default', false, 'views/templates/page/default', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Article', 'article', null, 'page', true, 'Page layout for articles.', null, 'default', true, 'page/article', false, 'views/templates/page/article', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Blog', 'blog', null, 'page', true, 'Blog layout to view all blog posts or filters(category, author).', null, 'default', true, 'page/blog', false, 'views/templates/page/blog', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Post', 'post', null, 'blog', true, 'Post layout for blog posts.', null, 'default', true, 'post/default', true, 'views/templates/post/default', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Form', 'form', null, 'form', true, 'It can be used to display public forms.', null, 'default', true, 'form/default', false, 'views/templates/form/default', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Social', 'social', null, 'widget', true, 'It can be used to display social links.', null, 'default', true, 'widget/social', true, 'views/templates/widget/social', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Address', 'address', null, 'widget', true, 'It can be used to display address and location.', null, 'default', true, 'widget/address', true, 'views/templates/widget/address', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Search', 'search', null, 'widget', true, 'It can be used to display post and article search form.', null, 'default', true, 'widget/search', true, 'views/templates/widget/search', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Post', 'post', null, 'widget', true, 'It can be used to display popular, recent, similar and related posts.', null, 'default', true, 'widget/address', true, 'views/templates/widget/address', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Archive', 'archive', null, 'widget', true, 'It can be used to display post and article archive list.', null, 'default', true, 'widget/address', true, 'views/templates/widget/address', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Adsense', 'adsense', null, 'widget', true, 'It can be used to display adsense ads.', null, 'default', true, 'widget/address', true, 'views/templates/widget/address', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Sidebar', 'sidebar', null, 'sidebar', true, 'Sidebar displayed on home, post and article pages on right side.', null, 'default', true, 'sidebar/default', false, 'views/templates/sidebar/default', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Top Sidebar', 'top-sidebar', null, 'sidebar', true, 'Sidebar displayed below header on home, post and article pages.', null, 'default', true, 'sidebar/top', false, 'views/templates/sidebar/top', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Bottom Sidebar', 'bottom-sidebar', null, 'sidebar', true, 'Sidebar displayed above footer on home, post and article pages.', null, 'default', true, 'sidebar/bottom', false, 'views/templates/sidebar/bottom', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertThemeObjects() {

		$theme	= Theme::findBySlug( 'blog' );
		$status	= ObjectData::STATUS_ACTIVE;

		$socialTemplate		= Template::findBySlugType( 'social', CmsGlobal::TYPE_WIDGET, [ 'ignoreSite' => true ] );
		$addressTemplate	= Template::findBySlugType( 'address', CmsGlobal::TYPE_WIDGET, [ 'ignoreSite' => true ] );
		$searchTemplate		= Template::findBySlugType( 'search', CmsGlobal::TYPE_WIDGET, [ 'ignoreSite' => true ] );
		$postTemplate		= Template::findBySlugType( 'post', CmsGlobal::TYPE_WIDGET, [ 'ignoreSite' => true ] );
		$archiveTemplate	= Template::findBySlugType( 'archive', CmsGlobal::TYPE_WIDGET, [ 'ignoreSite' => true ] );
		$adsenseTemplate	= Template::findBySlugType( 'adsense', CmsGlobal::TYPE_WIDGET, [ 'ignoreSite' => true ] );

		$sidebarTemplate		= Template::findBySlugType( 'sidebar', CmsGlobal::TYPE_SIDEBAR, [ 'ignoreSite' => true ] );
		$topSidebarTemplate		= Template::findBySlugType( 'top-sidebar', CmsGlobal::TYPE_SIDEBAR, [ 'ignoreSite' => true ] );
		$bottomSidebarTemplate	= Template::findBySlugType( 'bottom-sidebar', CmsGlobal::TYPE_SIDEBAR, [ 'ignoreSite' => true ] );

		$columns = [ 'siteId', 'themeId', 'templateId', 'avatarId', 'bannerId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'description', 'status', 'classPath', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$objects = [
			[ $this->site->id, $theme->id, NULL, NULL ,NULL, 1, 1, 'Main', 'main', 'menu', NULL, 'Main Menu used on landing header.', $status, NULL, '2014-10-11 14:22:54', '2016-04-16 10:00:10', NULL, NULL, NULL ],
			[ $this->site->id, $theme->id, NULL, NULL, NULL, 1, 1, 'Secondary', 'secondary', 'menu', NULL, 'Secondary Menu used on public header.', $status, NULL, '2014-10-11 14:22:54', '2014-10-11 14:22:54',NULL, NULL, NULL ],
			[ $this->site->id, $theme->id, NULL, NULL, NULL, 1, 1, 'Links', 'links', 'menu', NULL, 'Links menu used on footer.', $status, NULL,'2016-04-16 09:27:00', '2016-04-16 09:27:00', NULL, NULL, NULL ],
			[ $this->site->id, $theme->id, NULL, NULL, NULL, 1, 1, 'Page', 'page', 'menu', NULL, 'Page menu used on system pages.', $status, NULL, '2016-04-16 09:27:00', '2016-04-16 09:27:00', NULL, NULL, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $objects );
	}

	private function configurePageTemplates() {

		// Templates
		$pageTemplate	= Template::findBySlugType( 'page', CmsGlobal::TYPE_PAGE, [ 'ignoreSite' => true ] );
		$blogTemplate	= Template::findBySlugType( 'blog', CmsGlobal::TYPE_PAGE, [ 'ignoreSite' => true ] );

		// Pages
		$aboutPage		= Page::findBySlugType( 'about-us', CmsGlobal::TYPE_PAGE );
		$termPage		= Page::findBySlugType( 'terms', CmsGlobal::TYPE_PAGE );
		$privacyPage	= Page::findBySlugType( 'privacy', CmsGlobal::TYPE_PAGE );
		$blogPage		= Page::findBySlugType( 'blog', CmsGlobal::TYPE_PAGE );

		$pages = join( ',', [ $aboutPage->id, $termPage->id, $privacyPage->id ] );

		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'templateId' => $pageTemplate->id ], "id in ($pages)" );
		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'templateId' => $blogTemplate->id ], "id=$blogPage->id" );
	}

	private function configureTheme() {

		// Theme
		$mainTheme = Theme::findBySlug( 'blog' );

		// Site
		$siteId = $this->site->id;

		if( $this->activate ) {

			$this->update( $this->cmgPrefix . 'core_site', [ 'themeId' => $mainTheme->id ], "id=$siteId" );
		}
	}

    public function down() {

        echo "m180502_112655_theme_blog will be deleted with m160621_014408_core.\n";

        return true;
    }

}
