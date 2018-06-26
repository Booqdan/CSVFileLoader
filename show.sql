SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `id` int(11) NOT NULL auto_increment,
  `nazwa` varchar(255) NOT NULL,
  `ilosc` int NOT NULL,
  `wartosc` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;