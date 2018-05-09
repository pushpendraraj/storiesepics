DROP TABLE IF EXISTS `user_tags`;
CREATE TABLE IF NOT EXISTS `user_tags` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;