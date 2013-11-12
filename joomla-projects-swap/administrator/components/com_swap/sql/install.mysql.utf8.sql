DROP TABLE IF EXISTS `#__swap_content`;

CREATE TABLE IF NOT EXISTS `#__swap_content` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_title` (`title`)
) DEFAULT CHARSET=utf8;

INSERT INTO `#__swap_content` (`id`, `title`) VALUES (1, 'objet 1');
INSERT INTO `#__swap_content` (`id`, `title`) VALUES (2, 'objet 2');
