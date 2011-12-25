-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the TYPOlight *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************


-- --------------------------------------------------------

-- 
-- Table `tl_content`
-- 

CREATE TABLE `tl_content` (
  `popType` varchar(32) NOT NULL default '',
  `linkImage` char(1) NOT NULL default '',
  `linkSingleSRC` varchar(255) NOT NULL default '',
  `linkAlt` varchar(255) NOT NULL default '',
  `linkSize` varchar(64) NOT NULL default '',
  `linkCaption` varchar(255) NOT NULL default '',
  `windowSize` varchar(255) NOT NULL default '',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;