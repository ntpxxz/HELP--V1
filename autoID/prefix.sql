CREATE TABLE `prefix` (
  `keyname` varchar(10) NOT NULL,
  `val` varchar(10) NOT NULL,
  `seq` int(4) NOT NULL,
  PRIMARY KEY  (`keyname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `prefix`
-- 

INSERT INTO `prefix` VALUES ('year', '2011', 1);
