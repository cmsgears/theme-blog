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
class m181201_112655_theme_blog extends \cmsgears\core\common\base\Migration {

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
		$this->insertThemeTemplates();

		// Objects
		$this->insertMenus();
		$this->insertElements();
		$this->insertBlocks();
		$this->insertWidgets();
		$this->insertSidebars();

		// Page
		$this->insertPages();
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

	private function insertThemeTemplates() {

		$theme	= Theme::findBySlug( 'blog' );
		$prefix	= $this->themePrefix;

		$master	= $this->master;

		$columns = [ 'themeId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'title', 'active', 'description', 'classPath', 'dataPath', 'dataForm', 'attributesPath', 'attributesForm', 'configPath', 'configForm', 'settingsPath', 'settingsForm', 'renderer', 'fileRender', 'layout', 'layoutGroup', 'viewPath', 'view', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$templates = [
			// Theme Templates - Page
			//[ $theme->id, $master->id, $master->id, 'Page', 'page', CmsGlobal::TYPE_PAGE, null, null, true, 'Page layout for pages.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\PageSettings', '@breeze/templates/page/default/forms', 'default', true, 'page/default', false, '@themeTemplates/page/test', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "page-basic" }', null, null ],
			// Theme Templates - Block
			//[ $theme->id, $master->id, $master->id, 'Block', 'block', CmsGlobal::TYPE_BLOCK, null, null, true, 'Block layout for blocks.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\BlockSettings', '@breeze/templates/block/default/forms', 'default', true, null, false, '@breeze/templates/block/test', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "block-basic block-default" }', null, null ],
			// Theme Templates - Widget
			//[ $theme->id, $master->id, $master->id, 'Widget', 'widget', CmsGlobal::TYPE_WIDGET, null, null, true, 'Widget layout for widgets.', null, null, null, null, null, null, null, 'cmsgears\templates\breeze\models\forms\settings\WidgetSettings', '@breeze/templates/widget/default/forms', 'default', true, null, false, '@breeze/templates/widget/test', null, DateUtil::getDateTime(), DateUtil::getDateTime(), '{ "class": "widget-basic widget-default" }', null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_template', $columns, $templates );
	}

	private function insertMenus() {

		$theme	= Theme::findBySlug( 'blog' );
		$prefix	= $this->themePrefix;

		$master	= $this->master;

		$status	= ObjectData::STATUS_ACTIVE;
		$vis	= ObjectData::VISIBILITY_PUBLIC;

		$columns = [ 'themeId', 'templateId', 'avatarId', 'bannerId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'description', 'status', 'visibility', 'classPath', 'createdAt', 'modifiedAt', 'htmlOptions', 'content', 'data' ];

		$models = [
			//[ $theme->id, NULL, NULL ,NULL, $master->id, $master->id, 'Menu', 'menu', CmsGlobal::TYPE_MENU, NULL, 'Menu used on footer.', $status, $vis, NULL, DateUtil::getDateTime(), DateUtil::getDateTime(), NULL, NULL, NULL ]
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $models );
	}

	private function insertElements() {

		$theme	= Theme::findBySlug( 'blog' );
		$prefix	= $this->themePrefix;

		$master	= $this->master;

		$status	= ObjectData::STATUS_ACTIVE;

		$columns = [ 'themeId', 'templateId', 'avatarId', 'bannerId', 'videoId', 'galleryId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'classPath', 'link', 'status', 'visibility', 'order', 'pinned', 'featured', 'createdAt', 'modifiedAt', 'htmlOptions', 'summary', 'content', 'data' ];

		$models = [
			// Theme Elements
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $models );
	}

	private function insertBlocks() {

		$theme	= Theme::findBySlug( 'blog' );
		$prefix	= $this->themePrefix;

		$master	= $this->master;

		$status	= ObjectData::STATUS_ACTIVE;

		$columns = [ 'themeId', 'templateId', 'avatarId', 'bannerId', 'videoId', 'galleryId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'classPath', 'link', 'status', 'visibility', 'order', 'pinned', 'featured', 'createdAt', 'modifiedAt', 'htmlOptions', 'summary', 'content', 'data' ];

		$models = [
			// Theme Blocks
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $models );
	}

	private function insertWidgets() {

		$theme	= Theme::findBySlug( 'blog' );
		$prefix	= $this->themePrefix;

		$master	= $this->master;

		$status	= ObjectData::STATUS_ACTIVE;

		$defaultTemplate = Template::findGlobalBySlugType( 'default', CmsGlobal::TYPE_WIDGET );

		$columns = [ 'themeId', 'templateId', 'avatarId', 'bannerId', 'videoId', 'galleryId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'classPath', 'link', 'status', 'visibility', 'order', 'pinned', 'featured', 'createdAt', 'modifiedAt', 'htmlOptions', 'summary', 'content', 'data' ];

		$widgets = [
			// Theme Widgets
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $widgets );
	}

	private function insertSidebars() {

		$theme	= Theme::findBySlug( 'blog' );
		$prefix	= $this->themePrefix;

		$master	= $this->master;

		$status	= ObjectData::STATUS_ACTIVE;

		$defaultTemplate = Template::findGlobalBySlugType( 'default', CmsGlobal::TYPE_SIDEBAR );

		$columns = [ 'themeId', 'templateId', 'avatarId', 'bannerId', 'videoId', 'galleryId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'classPath', 'link', 'status', 'visibility', 'order', 'pinned', 'featured', 'createdAt', 'modifiedAt', 'htmlOptions', 'summary', 'content', 'data' ];

		$objects = [
			// Theme Sidebars
		];

		$this->batchInsert( $this->cmgPrefix . 'core_object', $columns, $objects );
	}

	private function insertPages() {

		$master	= $this->master;
		$prefix	= $this->themePrefix;

		$site = $this->site;

		// Templates
		$defaultTemplate = Template::findGlobalBySlugType( 'default', CmsGlobal::TYPE_PAGE );

		$columns = [ 'id', 'siteId', 'avatarId', 'parentId', 'createdBy', 'modifiedBy', 'name', 'slug', 'type', 'icon', 'texture', 'title', 'description', 'status', 'visibility', 'order', 'pinned', 'featured', 'comments', 'createdAt', 'modifiedAt', 'content', 'data', 'gridCache', 'gridCacheValid', 'gridCachedAt' ];

		$pages = [
			// Theme Pages
			//[ 10001, $site->id, null, null, $master->id, $master->id, 'Home', 'home', CmsGlobal::TYPE_PAGE, null, null, null, null, Page::STATUS_ACTIVE, Page::VISIBILITY_PUBLIC, 0, false, false, 0, DateUtil::getDateTime(), DateUtil::getDateTime(), null, null, null, 0, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_page', $columns, $pages );

		$columns = [ 'id', 'templateId', 'bannerId', 'videoId', 'galleryId', 'parentId', 'parentType', 'type', 'summary', 'seoName', 'seoDescription', 'seoKeywords', 'seoRobot', 'publishedAt', 'content', 'data' ];

		$pagesContent = [
			// Theme Pages
			//[ 10001, $defaultTemplate->id, null, null, null, Page::findBySlugType( 'home', CmsGlobal::TYPE_PAGE )->id, CmsGlobal::TYPE_PAGE, null, null, null, null, null, null, DateUtil::getDateTime(), null, null ]
		];

		$this->batchInsert( $this->cmgPrefix . 'cms_model_content', $columns, $pagesContent );
	}

	private function configurePageTemplates() {

		$pre = $this->themePrefix;

		// Templates
		$pageTemplate = Template::findGlobalBySlugType( CoreGlobal::TEMPLATE_DEFAULT, CmsGlobal::TYPE_PAGE );

		// Pages
		//$aboutPage = Page::findBySlugType( 'about-us', CmsGlobal::TYPE_PAGE );

		//$pages = join( ',', [ $aboutPage->id ] );

		//$this->update( $this->cmgPrefix . 'cms_model_content', [ 'templateId' => $pageTemplate->id ], "id in ($pages)" );
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

        echo "m181201_112655_theme_blog will be deleted with m160621_014408_core.\n";

        return true;
    }

}
