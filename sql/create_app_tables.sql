-- Database : `superapps`
CREATE DATABASE IF NOT EXISTS `superapps`
  DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE superapps;

--
-- Table structure for table `users`
--
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '',
  `password` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `memo` text COLLATE utf8_bin,
  `delete_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

--
-- Table structure for table `logs`
--
CREATE TABLE `logs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL,
  `host` varchar(15) COLLATE utf8_bin NOT NULL DEFAULT '',
  `method` varchar(5) COLLATE utf8_bin NOT NULL DEFAULT '',
  `path` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '',
  `code` int(3) NOT NULL,
  `referer` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '',
  `size` int(11) NOT NULL,
  `user` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '',
  `agent` varchar(400) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;