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

	// Private Variables

	private $cmgPrefix;
	private $sitePrefix;
	private $themePrefix;

	private $site;

	private $master;

	public function init() {

		// Table prefix
		$this->cmgPrefix	= Yii::$app->migration->cmgPrefix;
		$this->sitePrefix	= Yii::$app->migration->sitePrefix;
		$this->themePrefix	= 'blog';

		$this->site		= Site::findBySlug( CoreGlobal::SITE_MAIN );
		$this->master	= User::findByUsername( Yii::$app->migration->getSiteMaster() );

		Yii::$app->core->setSite( $this->site );
	}

    public function up() {

		// Theme
		$this->insertTheme();

		// Templates
		$this->insertSiteTemplates();
		$this->insertThemeTemplates();

		// Objects
		$this->insertMenus();
		$this->insertWidgets();
		$this->insertSidebars();

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

		if( Yii::$app->controller->default ) {

			// Update default
			$this->update( $this->cmgPrefix . 'core_theme', [ 'default' => false ], [ 'default' => true ] );

			// Make current as default
			$this->update( $this->cmgPrefix . 'core_theme', [ 'default' => true ], "slug='blog'" );
		}
	}

	private function insertSiteTemplates() {

		$site = $this->site;

		$columns = [ 'siteId', 'createdBy', 'modifiedBy', 'name', 'slug', 'icon', 'type', 'active', 'description', 'classPath', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'content', 'data' ];

		$templates = [
			// Default Templates - Page
			[ $site->id, $this->master->id, $this->master->id, 'Page', "page", null, CmsGlobal::TYPE_PAGE, true, 'Page layout for pages.', null, 'default', true, 'page/default', false, 'views/templates/page/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $site->id, $this->master->id, $this->master->id, 'Article', "article", null, CmsGlobal::TYPE_ARTICLE, true, 'Article layout for articles.', null, 'default', true, 'article/default', false, 'views/templates/article/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			// Default Templates - Post
			[ $site->id, $this->master->id, $this->master->id, 'Post', "post", null, CmsGlobal::TYPE_POST, true, 'Post layout for blog posts.', null, 'default', true, 'post/default', true, 'views/templates/post/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			// Default Templates - Form
			[ $site->id, $this->master->id, $this->master->id, 'Form', "form", null, CoreGlobal::TYPE_FORM, true, 'It can be used to display public forms.', null, 'default', true, 'form/default', false, 'views/templates/form/default', null, DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertThemeTemplates() {

		$theme	= Theme::findBySlug( 'blog' );

		$columns = [ 'themeId', 'createdBy', 'modifiedBy', 'name', 'slug', 'icon', 'type', 'active', 'description', 'classPath', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'content', 'data' ];

		$templates = [
			// Theme Templates - Widget
			[ $theme->id, $this->master->id, $this->master->id, 'Search', "search", null, CmsGlobal::TYPE_WIDGET, true, 'It can be used to display page, article and post search form.', null, 'default', true, null, true, 'views/templates/widget/search', 'default', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Archive', "archive", null, CmsGlobal::TYPE_WIDGET, true, 'It can be used to display post and article archive list.', null, 'default', true, null, true, 'views/templates/widget/archive', 'default', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Page', "page", null, CmsGlobal::TYPE_WIDGET, true, 'It can be used to display popular, recent and related pages.', null, 'default', true, null, true, 'views/templates/widget/page', 'default', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Article', "article", null, CmsGlobal::TYPE_WIDGET, true, 'It can be used to display popular, recent and related articles.', null, 'default', true, null, true, 'views/templates/widget/article', 'default', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Post', "post", null, CmsGlobal::TYPE_WIDGET, true, 'It can be used to display popular, recent, similar and related posts.', null, 'default', true, null, true, 'views/templates/widget/post', 'default', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Social', "social", null, CmsGlobal::TYPE_WIDGET, true, 'It can be used to display social links.', null, 'default', true, null, true, 'views/templates/widget/social', 'default', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Address', "address", null, CmsGlobal::TYPE_WIDGET, true, 'It can be used to display address and location.', null, 'default', true, null, true, 'views/templates/widget/address', 'default', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Adsense', "adsense", null, CmsGlobal::TYPE_WIDGET, true, 'It can be used to display adsense ads.', null, 'default', true, null, true, 'views/templates/widget/adsense', 'default', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			// Theme Templates - Sidebar
			[ $theme->id, $this->master->id, $this->master->id, 'Vertical Sidebar', "vertical-sidebar", null, CmsGlobal::TYPE_SIDEBAR, true, 'Main Sidebar displayed vertically on a page.', null, 'default', true, null, false, 'views/templates/sidebar/main', 'vertical', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ],
			[ $theme->id, $this->master->id, $this->master->id, 'Horizontal Sidebar', "horizontal-sidebar", null, CmsGlobal::TYPE_SIDEBAR, true, 'Main Sidebar displayed horizontally on a page.', null, 'default', true, null, false, 'views/templates/sidebar/main', 'horizontal', DateUtil::getDateTime(), DateUtil::getDateTime(), null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertMenus() {

		$site	= $this->site;
		$theme	= Theme::findBySlug( 'blog' );
		$status	= ObjectData::STATUS_ACTIVE;

		$columns = [ 'siteId', 'themeId', 'templateId', 'avatarId', 'bannerId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'description', 'status', 'classPath', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$objects = [
			[ $site->id, $theme->id, NULL, NULL ,NULL, 1, 1, 'Main', "main", CmsGlobal::TYPE_MENU, NULL, 'Main Menu used on landing header.', $status, NULL, '2014-10-11 14:22:54', '2016-04-16 10:00:10', NULL, NULL, NULL ],
			[ $site->id, $theme->id, NULL, NULL ,NULL, 1, 1, 'Secondary', "secondary", CmsGlobal::TYPE_MENU, NULL, 'Secondary Menu used on public header.', $status, NULL, '2014-10-11 14:22:54', '2016-04-16 10:00:10', NULL, NULL, NULL ],
			[ $site->id, $theme->id, NULL, NULL, NULL, 1, 1, 'Links', "links", CmsGlobal::TYPE_MENU, NULL, 'Links menu used on footer.', $status, NULL,'2016-04-16 09:27:00', '2016-04-16 09:27:00', NULL, NULL, NULL ],
			[ $site->id, $theme->id, NULL, NULL, NULL, 1, 1, 'Page', "page", 'menu', NULL, 'Page menu used on system pages.', $status, NULL, '2016-04-16 09:27:00', '2016-04-16 09:27:00', NULL, NULL, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $objects );
	}

	private function insertWidgets() {

		$site	= $this->site;
		$theme	= Theme::findBySlug( 'blog' );
		$status	= ObjectData::STATUS_ACTIVE;

		$searchTemplate		= Template::findBySlugType( "search", CmsGlobal::TYPE_WIDGET );
		$archiveTemplate	= Template::findBySlugType( "archive", CmsGlobal::TYPE_WIDGET );
		$pageTemplate		= Template::findBySlugType( "page", CmsGlobal::TYPE_WIDGET );
		$articleTemplate	= Template::findBySlugType( "article", CmsGlobal::TYPE_WIDGET );
		$postTemplate		= Template::findBySlugType( "post", CmsGlobal::TYPE_WIDGET );

		$columns = [ 'siteId', 'templateId', 'avatarId', 'bannerId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'description', 'status', 'classPath', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$objects = [

		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $objects );
	}

	private function insertSidebars() {

		$site	= $this->site;
		$status	= ObjectData::STATUS_ACTIVE;

		$vTemplate	= Template::findBySlugType( "vertical-sidebar", CmsGlobal::TYPE_SIDEBAR );
		$hTemplate	= Template::findBySlugType( "horizontal-sidebar", CmsGlobal::TYPE_SIDEBAR );

		$columns = [ 'siteId', 'templateId', 'avatarId', 'bannerId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'description', 'status', 'classPath', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$objects = [

		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $objects );
	}

	private function configurePageTemplates() {

		// Templates
		$pageTemplate	= Template::findBySlugType( "page", CmsGlobal::TYPE_PAGE );

		// Pages
		$aboutPage		= Page::findBySlugType( 'about-us', CmsGlobal::TYPE_PAGE );
		$termPage		= Page::findBySlugType( 'terms', CmsGlobal::TYPE_PAGE );
		$privacyPage	= Page::findBySlugType( 'privacy', CmsGlobal::TYPE_PAGE );

		$pages = join( ',', [ $aboutPage->id, $termPage->id, $privacyPage->id ] );

		$this->update( $this->cmgPrefix . 'cms_model_content', [ 'templateId' => $pageTemplate->id ], "id in ($pages)" );
	}

	private function configureTheme() {

		// Theme
		$mainTheme = Theme::findBySlug( 'blog' );

		// Site
		$siteId = $this->site->id;

		if( Yii::$app->controller->activate ) {

			$this->update( $this->cmgPrefix . 'core_site', [ 'themeId' => $mainTheme->id ], "id=$siteId" );
		}
	}

    public function down() {

        echo "m180502_112655_theme_blog will be deleted with m160621_014408_core.\n";

        return true;
    }

}
