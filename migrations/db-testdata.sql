/* ================================ Theme Blog ============================================== */

SET FOREIGN_KEY_CHECKS=0;

--
-- Dumping data for table `cmg_core_template`
--

INSERT INTO `cmg_core_template` (`name`,`description`,`type`,`layout`,`viewPath`,`adminView`,`frontendView`,`content`) VALUES 
	('simple','Simple layout for pages and posts.','page','simple','@themes/blog/views/templates/page',null,'simple',null),
	('blog','Blog layout to view all blog posts or filters(category, author).','page','blog','@themes/blog/views/templates/page',null,'blog',null),
	('text','It can be used to display simple key values for a widget.','widget',null,'@themes/blog/views/templates/widget','text-admin',null,null),
	('form','It can be used to display form.','form','form','@themes/blog/views/templates/form',null,'form',null);

--
-- Dumping data for table `cmg_core_object`
--

INSERT INTO `cmg_core_object` VALUES 
	(1,1,1,NULL,'main','Main Menu. It can be used for site header and footer.','menu','{\"pages\":[\"1\",\"8\",\"9\",\"10\",\"11\"]}','2014-10-11 14:22:54','2014-10-11 14:22:54');

--
-- Update Page Templates
--
UPDATE cmg_cms_model_content set templateId=1 where id in (8,9,10);
UPDATE cmg_cms_model_content set templateId=2 where id=11;

SET FOREIGN_KEY_CHECKS=1;