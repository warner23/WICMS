
Table structure for table `WI_blog`

--

CREATE TABLE IF NOT EXISTS `WI_blog` 
(
  
`id` int(11) NOT NULL AUTO_INCREMENT,

`type` enum('blog_slider','blog_video','blog_image','blog_audio','NoMedia','blog_youtube') NOT NULL,
  
`day` varchar(255) NOT NULL,
  
`month` varchar(255) NOT NULL,
  
`image` varchar(255) NOT NULL,
  
`image2` varchar(255) NOT NULL,
  
`image3` varchar(255) NOT NULL,
  
`video` varchar(255) NOT NULL,
  
`audio` varchar(255) NOT NULL,
  
`youtube` varchar(255) NOT NULL,
  
`title` varchar(255) NOT NULL,
  
`href` varchar(255) NOT NULL,
  
`user` varchar(255) NOT NULL,
  
`tags` varchar(255) NOT NULL,
  
`post` varchar(255) NOT NULL,
  
`button_name` varchar(255) NOT NULL,

PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


