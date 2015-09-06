/* ================================ Theme Blog ============================================== */

SET FOREIGN_KEY_CHECKS=0;

--
-- Dumping data for table `cmg_core_template`
--

INSERT INTO `cmg_core_template` (`name`,`description`,`type`,`layout`,`viewPath`,`adminView`,`frontendView`,`content`) VALUES 
	('simple','Simple layout for pages and posts.','page','simple','@themes/blog/views/templates/page',null,'simple',null),
	('blog','Blog layout to view all blog posts or filters(category, author).','page','blog','@themes/blog/views/templates/page',null,'blog',null),
	('text','It can be used to display simple key values for a widget.','widget',null,'@themes/blog/views/templates/widget','text-admin',null,null);

--
-- Dumping data for table `cmg_cms_menu`
--

INSERT INTO `cmg_cms_menu` VALUES 
	(1,NULL,'main','Main Menu. It can be used for site header and footer.');

--
-- Dumping data for table `cmg_cms_menu_page`
--

INSERT INTO `cmg_cms_menu_page` VALUES
	(1,1,0),
	(1,13,0),
	(1,10,0),
	(1,8,0);


SET FOREIGN_KEY_CHECKS=1;