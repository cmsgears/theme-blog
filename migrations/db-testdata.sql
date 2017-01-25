/* ================================ Theme Blog ============================================== */

SET FOREIGN_KEY_CHECKS=0;

--
-- Theme
--

INSERT INTO `cmg_core_theme` (`createdBy`,`modifiedBy`,`name`,`slug`,`description`,`renderer`,`basePath`,`createdAt`,`modifiedAt`,`data`) VALUES  
	(1,1,'Blog','blog','Blog Theme.',NULL,'@themes/blog','2016-01-01 17:04:54','2016-01-01 17:06:22',NULL);

--
-- Map Theme with main site
--

SELECT @site := `id` FROM cmg_core_site WHERE slug = 'main';
SELECT @theme := `id` FROM cmg_core_theme WHERE slug = 'blog';

UPDATE cmg_core_site set themeId=@theme where id=@site;

--
-- Theme Templates
--

INSERT INTO `cmg_core_template` (`createdBy`,`modifiedBy`,`name`,`slug`,`icon`,`type`,`description`,`renderer`,`fileRender`,`layout`,`layoutGroup`,`viewPath`,`createdAt`,`modifiedAt`,`content`,`data`) VALUES
	(1,1,'Page','page',NULL,'page','Page layout for pages.','default',1,'page/simple',0,'views/templates/page/simple','2016-01-01 17:04:54','2016-01-01 17:06:22',NULL,NULL),
	(1,1,'Blog','blog',NULL,'page','Blog layout to view all blog posts or filters(category, author).','default',1,'page/blog',0,'views/templates/page/blog','2016-01-01 17:04:54','2016-01-01 17:06:22',NULL,NULL),
	(1,1,'Post','post',NULL,'post','Post layout for posts.','default',1,'post/simple',1,'views/templates/post/simple','2016-01-01 17:04:54','2016-01-01 17:06:22',NULL,NULL),
	(1,1,'Form','form',NULL,'form','It can be used to display public forms.','default',1,'form/simple',0,'views/templates/form/simple','2016-01-01 17:04:54','2016-01-01 17:06:22',NULL,NULL),
	(1,1,'Text Social','text-social',NULL,'widget','It can be used to display key values for social links.','default',1,NULL,0,'views/templates/widget/text/social','2016-01-01 17:04:54','2016-01-01 17:06:22',NULL,NULL);

--
-- Theme menus and widgets
--

INSERT INTO `cmg_core_object` (`siteId`,`templateId`,`avatarId`,`bannerId`,`createdBy`,`modifiedBy`,`name`,`slug`,`icon`,`type`,`description`,`active`,`createdAt`,`modifiedAt`,`htmlOptions`,`content`,`data`) VALUES   
	(@site,NULL,NULL,NULL,1,1,'Main','main',NULL,'menu','Main Menu used on site header.',1,'2014-10-11 14:22:54','2014-10-11 14:22:54',NULL,'{\"links\":{\"4\":{\"link\":\"1\",\"pageId\":\"2\",\"htmlOptions\":\"{\\\"id\\\":\\\"btn-login\\\"}\",\"icon\":\"\",\"order\":\"0\",\"type\":\"page\",\"name\":\"Login\"},\"3\":{\"address\":\"\",\"label\":\"\",\"htmlOptions\":\"\",\"private\":\"0\",\"relative\":\"0\",\"icon\":\"\",\"order\":\"0\",\"type\":\"link\"},\"2\":{\"address\":\"\",\"label\":\"\",\"htmlOptions\":\"\",\"private\":\"0\",\"relative\":\"0\",\"icon\":\"\",\"order\":\"0\",\"type\":\"link\"},\"0\":{\"address\":\"\",\"label\":\"\",\"htmlOptions\":\"\",\"private\":\"0\",\"relative\":\"0\",\"icon\":\"\",\"order\":\"0\",\"type\":\"link\"},\"1\":{\"address\":\"\",\"label\":\"\",\"htmlOptions\":\"\",\"private\":\"0\",\"relative\":\"0\",\"icon\":\"\",\"order\":\"0\",\"type\":\"link\"},\"5\":{\"link\":\"1\",\"pageId\":\"3\",\"htmlOptions\":\"{\\\"id\\\":\\\"btn-register\\\"}\",\"icon\":\"\",\"order\":\"1\",\"type\":\"page\",\"name\":\"Sign Up\"}}}',NULL),
	(@site,NULL,NULL,NULL,1,1,'Secondary','secondary',NULL,'menu','Secondary Menu used on sidebar.',1,'2014-10-11 14:22:54','2014-10-11 14:22:54',NULL,'{\"links\":{\"0\":{\"address\":\"\",\"label\":\"\",\"htmlOptions\":\"\",\"private\":\"0\",\"relative\":\"0\",\"icon\":\"\",\"order\":\"0\",\"type\":\"link\"},\"3\":{\"address\":\"\",\"label\":\"\",\"htmlOptions\":\"\",\"private\":\"0\",\"relative\":\"0\",\"icon\":\"\",\"order\":\"0\",\"type\":\"link\"},\"4\":{\"link\":\"1\",\"pageId\":\"1\",\"htmlOptions\":\"\",\"icon\":\"\",\"order\":\"0\",\"type\":\"page\",\"name\":\"Home\"},\"1\":{\"address\":\"\",\"label\":\"\",\"htmlOptions\":\"\",\"private\":\"0\",\"relative\":\"0\",\"icon\":\"\",\"order\":\"0\",\"type\":\"link\"},\"2\":{\"address\":\"\",\"label\":\"\",\"htmlOptions\":\"\",\"private\":\"0\",\"relative\":\"0\",\"icon\":\"\",\"order\":\"0\",\"type\":\"link\"},\"5\":{\"link\":\"1\",\"pageId\":\"8\",\"htmlOptions\":\"\",\"icon\":\"\",\"order\":\"1\",\"type\":\"page\",\"name\":\"About Us\"},\"6\":{\"link\":\"1\",\"pageId\":\"9\",\"htmlOptions\":\"\",\"icon\":\"\",\"order\":\"2\",\"type\":\"page\",\"name\":\"Terms\"},\"7\":{\"link\":\"1\",\"pageId\":\"10\",\"htmlOptions\":\"\",\"icon\":\"\",\"order\":\"3\",\"type\":\"page\",\"name\":\"Privacy\"},\"8\":{\"link\":\"1\",\"pageId\":\"11\",\"htmlOptions\":\"\",\"icon\":\"\",\"order\":\"4\",\"type\":\"page\",\"name\":\"Blog\"}}}',NULL),
	(@site,5,NULL,NULL,1,1,'Follow Us','follow-us',NULL,'widget','Social links on main menu',1,'2014-10-11 14:22:54','2014-10-11 14:22:54',NULL,'{\"classPath\":\"\",\"data\":{\"facebook\":\"http:\\/\\/www.facebook.com\",\"twitter\":\"http:\\/\\/www.twitter.com\",\"youtube\":\"http:\\/\\/www.youtube.com\",\"instagram\":\"http:\\/\\/www.instagram.com\"}}',NULL);

--
-- Update Page Templates
--

SELECT @tpage := `id` FROM cmg_core_template WHERE slug = 'page' AND type = 'page';
SELECT @tblog := `id` FROM cmg_core_template WHERE slug = 'blog' AND type = 'page';

UPDATE cmg_cms_model_content set templateId=@tpage where id in (8,9,10);
UPDATE cmg_cms_model_content set templateId=@tblog where id=11;

SET FOREIGN_KEY_CHECKS=1;