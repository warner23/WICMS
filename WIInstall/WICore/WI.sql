CREATE TABLE IF NOT EXISTS `wi_blockedusers` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
     `blocker` varchar(16) NOT NULL,
 `blockee` varchar(16) NOT NULL,
 `blockdate` datetime NOT NULL,
    PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wi_css` (
`id` int(4) NOT NULL,
  `href` varchar(255) NOT NULL,
 `rel` varchar(255) NOT NULL,
 PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wi_footer` (
 `footer_id` int(11) NOT NULL, AUTO_INCREMENT
`footer_content` varchar(255) NOT NULL,
 `footer_linking` varchar(255) NOT NULL,
 `website_name` varchar(255) NOT NULL,
 PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wi_header` (
 `header_id` int(11) NOT NULL AUTO_INCREMENT,
 `logo` varchar(255) NOT NULL,
 `bk_header_image` varchar(255) NOT NULL,
 `header_image` varchar(255) NOT NULL,
 `header_content` varchar(255) NOT NULL,
 `header_slogan` varchar(255) NOT NULL
 PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wi_lang` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `lang` varchar(10) NOT NULL
 PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `wi_logs` (
 `ID` int(11) NOT NULL AUTO_INCREMENT,
`date` datetime NOT NULL,
 `user` varchar(45) NOT NULL,
 `opperation` varchar(255) NOT NULL,
PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `wi_menu` (
`id` int(11) NOT NULL AUTO_INCREMENT,
 `label` varchar(50) NOT NULL DEFAULT '',
  `link` varchar(100) NOT NULL DEFAULT '#',
  `parent` int(11) NOT NULL DEFAULT '0',
 `sort` int(11) DEFAULT NULL,
 `lang` varchar(255) NOT NULL,
 PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `wi_members` (
  `user_id` int(11) NOT NULL auto_increment,
  `email` varchar(40) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `confirmation_key` varchar(40) NOT NULL,
  `confirmed` enum('Y','N') NOT NULL default 'N',
  `password_reset_key` varchar(250) NOT NULL default '',
  `password_reset_confirmed` enum('Y','N') NOT NULL default 'N',
  `password_reset_timestamp` datetime,
  `register_date` date NOT NULL,
  `user_role` int(4) NOT NULL default 1,
  `last_login` datetime,
  `ip_addr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banned` enum('Y','N') NOT NULL default 'N',
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `wi_meta` (
`meta_id` int(11) NOT NULL AUTO_INCREMENT,
 `page` varchar(255) NOT NULL,
 `name` varchar(255) NOT NULL,
`content` varchar(255) NOT NULL,
`author` varchar(255) NOT NULL,
 PRIMARY KEY  (`meta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `wi_mod` (
`mod_id` int(11) NOT NULL AUTO_INCREMENT,
 `mod_status` enum('enabled','disabled') NOT NULL DEFAULT 'disabled',
`mod_powered` enum('power_on','power_off') NOT NULL DEFAULT 'power_off',
  `mod_author` varchar(55) DEFAULT NULL,
 `module_name` varchar(55) NOT NULL,
  `Mod_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY ('mod_id')
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `wi_page` (
`id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 PRIMARY KEY ('id')
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `wi_plugin` (
`plugin_id` int(11) NOT NULL AUTO_INCREMENT,
 `plugin` varchar(255) NOT NULL,
 `activated` enum('true','false') NOT NULL,
 PRIMARY KEY ('plugin_id')
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `wi_social_logins` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `provider` varchar(50) DEFAULT 'email',
    `provider_id` varchar(250) DEFAULT NULL,
    `created_at` datetime,
    PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wi_scripts` (
`id` int(11) NOT NULL AUTO_INCREMENT,
 `src` varchar(255) NOT NULL,
 PRIMARY KEY ('id')
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `wi_sidebar` (
`id` int(11) NOT NULL AUTO_INCREMENT,
 `label` varchar(50) NOT NULL DEFAULT '',
`link` varchar(100) NOT NULL DEFAULT '#',
 `parent` int(11) NOT NULL DEFAULT '0',
 `sort` int(11) DEFAULT NULL,
`lang` varchar(255) NOT NULL,
PRIMARY KEY ('id')
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wi_site` (
`id` int(2) NOT NULL AUTO_INCREMENT,
`site_name` varchar(50) DEFAULT NULL,
`site_domain` varchar(255) NOT NULL,
`site_url` varchar(50) DEFAULT NULL,
`db_host` varchar(50) DEFAULT NULL,
`db_username` varchar(50) DEFAULT NULL,
 `db_pass` varchar(50) DEFAULT NULL,
 `db_name` varchar(50) DEFAULT NULL,
 `db_port` int(11) NOT NULL DEFAULT '25',
 `db_type` varchar(255) NOT NULL DEFAULT 'mysql',
 `secure_session` enum('false','true') NOT NULL DEFAULT 'false',
 `http_only` enum('false','true') NOT NULL DEFAULT 'true',
 `regenerate_id` enum('false','true') NOT NULL DEFAULT 'true',
`use_only_cookie` enum('1','0') NOT NULL DEFAULT '1',
 `login_fingerprint` enum('yes','no') NOT NULL,
 `max_login_attempts` int(11) NOT NULL DEFAULT '5',
 `redirect_after_login` varchar(255) NOT NULL,
 `password_encryption` varchar(255) NOT NULL,
 `encryption_cost` int(11) NOT NULL,
 `sha512_iterations` int(11) NOT NULL,
 `password_salt` varchar(255) NOT NULL,
 `reset_key_life` int(11) NOT NULL,
 `mail_confirm_required` enum('true','false') NOT NULL,
 `register_confirm` varchar(255) NOT NULL,
 `reg_pass_reset` varchar(255) NOT NULL,
 `mailer` varchar(255) NOT NULL,
 `smpt_host` varchar(255) NOT NULL,
 `smpt_port` varchar(255) NOT NULL,
 `smpt_username` varchar(255) NOT NULL,
 `smpt_password` varchar(255) NOT NULL,
 `smpt_encryption` varchar(255) NOT NULL,
 `social_callback_url` varchar(255) NOT NULL,
 `google_enabled` enum('true','false') NOT NULL,
 `google_id` varchar(255) NOT NULL,
  `google_secret` varchar(255) NOT NULL,
 `facebook_enabled` enum('true','false') NOT NULL,
 `facebook_id` varchar(255) NOT NULL,
 `facebook_secret` varchar(255) NOT NULL,
 `twitter_enabled` enum('true','false') NOT NULL,
 `twitter_key` varchar(255) NOT NULL,
 `twitter_secret` varchar(255) NOT NULL,
 `default_lang` varchar(255) NOT NULL,
 `multi_lang` enum('on','off') NOT NULL DEFAULT 'off',
 PRIMARY KEY ('id')
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `wi_social_logins` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
 `provider` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'email',
  `provider_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY ('id')
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `wi_login_attempts` (
  `id_login_attempts` int(11) NOT NULL AUTO_INCREMENT,
  `ip_addr` varchar(20) NOT NULL,
  `attempt_number` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  PRIMARY KEY (`id_login_attempts`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wi_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `posted_by` int(11) NOT NULL,
  `posted_by_name` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  `post_time` datetime NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `wi_theme` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
`theme` varchar(255) NOT NULL,
PRIMARY KEY ('id')
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wi_trans` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` varchar(50) NOT NULL,
 `keyword` varchar(255) NOT NULL,
 `translation` varchar(255) NOT NULL,
 PRIMARY KEY ('id')
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE IF NOT EXISTS `wi_user_details` (
 `id_user_details` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
`first_name` varchar(35)  NOT NULL DEFAULT '',
 `last_name` varchar(35)  NOT NULL DEFAULT '',
 `phone` varchar(30)   NOT NULL DEFAULT '',
`address` varchar(30)   NOT NULL DEFAULT '',
 `country` varchar(255)   NOT NULL,
 `region` varchar(255)   NOT NULL,
 `city` varchar(255)   NOT NULL,
 `bio_body` varchar(255)   NOT NULL,
  `website` varchar(225)   NOT NULL,
 `youtube` varchar(255)   NOT NULL,
  `facebook` varchar(255)   NOT NULL,
 `twitter` varchar(255)   NOT NULL,
 `friend_array` varchar(255)   NOT NULL,
 `avatar` varchar(255)   NOT NULL
  PRIMARY KEY (`id_user_details`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `wi_user_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `wi_user_roles` (`role_id`, `role`) VALUES
(1, 'user'),
(2, 'editor'),
(3, 'admin');

INSERT INTO `wi_css` ( `href`, `rel`) VALUES
( 'WITheme/WICMS/site/css/frameworks/bootstrap.css', 'stylesheet'),
('WIInc/login_panel/css/slide.css', 'stylesheet'),
('WITheme/WICMS/site/css/frameworks/menus.css', 'stylesheet'),
('WITheme/WICMS/site/css/style.css', 'stylesheet'),
('WITheme/WICMS/site/css/font-awesome.css', 'stylesheet');


INSERT INTO `wi_footer` (`footer_content`, `footer_linking`, `website_name`) VALUES
( 'WICMS', '', 'WI CMS');

INSERT INTO `wi_header` (`logo`, `bk_header_image`, `header_image`, `header_content`, `header_slogan`) VALUES
( 'wi_cms_logo.jpg ', '', 'bk_header', 'WI CMS', 'Making Life Easier');

INSERT INTO `wi_lang` ( `lang`) VALUES
( 'dk'),
( 'en'),
( 'es'),
( 'fr'),
( 'rs'),
( 'ru');

INSERT INTO `wi_menu` ( `label`, `link`, `parent`, `sort`, `lang`) VALUES
( 'Home', 'index.php', 0, 0, 'home'),
('About Us', 'about_us.php', 0, 0, 'about_us'),

INSERT INTO `wi_meta` ( `page`, `name`, `content`, `author`) VALUES
( '', 'viewport', 'content=width=device-width, initial-scale=1', 'Jules Warner'),
('', 'description', 'Warner-Infinity Content Management System', 'Jules Warner'),
( '', 'keywords', 'WI, WICMS, System', 'Jules Warner'),
( '', 'author', 'WI', 'Jules Warner');

INSERT INTO `wi_scripts` (`src`) VALUES
( 'WITheme/WICMS/site/js/frameworks/JQuery.js'),
('WITheme/WICMS/site/js/frameworks/bootstrap.js'),
('WIInc/login_panel/js/slide.js');

INSERT INTO `wi_sidebar` (`label`, `link`, `parent`, `sort`, `lang`) VALUES
( 'Settings', '', 0, 0, 'settings'),
( 'Site', 'WISite.php', 3, 0, 'Site'),
( 'Users', '', 0, 1, 'Users'),
('Manage User', 'WIUser.php', 5, 0, 'Manage_users'),
( 'Roles', 'WIRoles.php', 5, 1, 'roles'),
('Menu\'s', 'WIMenu.php', 3, 1, 'Menu'),
('Header', 'WIHeader.php', 3, 2, 'Header'),
('Modules', '', 0, 2, 'Modules'),
( 'Modules', 'WIModules.php', 10, 0, 'Modules'),
('Pages', '', 0, 3, 'Pages'),
('Pages', 'WIPages.php', 12, 0, 'Pages'),
('Plugins', '', 0, 4, 'Plugins'),
( 'plugin', 'WIPlugin.php', 14, 0, 'Plugin'),
('Styling', 'WIStyling.php', 3, 3, 'Styling'),
('Media', '', 0, 5, 'media'),
('Media', 'WIMedia.php', 17, 0, 'media'),
('Multi Lang', 'WIMlang.php', 3, 4, 'Multi Lang');

INSERT INTO `wi_trans` (`lang`, `keyword`, `translation`) VALUES
( 'en', 'site_name', 'WICMS'),
( 'en', 'home', 'Home'),
( 'en', 'users', 'Users'),
( 'en', 'blog', 'Blog'),
( 'en', 'shop', 'Shop'),
( 'en', 'email', 'Email'),
( 'en', 'login', 'Login'),
( 'en', 'username', 'Username'),
( 'en', 'password', 'Password'),
( 'en', 'your_email', 'Your Email'),
( 'en', 'login_with', 'Login with'),
( 'en', 'email_confirmed', 'Email confirmed'),
( 'en', 'create_account', 'Create Account'),
( 'en', 'logging_in', 'Logging In'),
( 'en', 'working', 'Working...'),
( 'en', 'info', 'Info'),
( 'en', 'admin', 'Admin'),
( 'en', 'add_user', 'Add User'),
( 'en', 'action', 'Action'),
( 'en', 'register_date', 'Register Date'),
( 'en', 'male', 'Male'),
( 'en', 'female', 'Female'),
( 'en', 'forgot_password', 'Forget pasword'),
( 'en', 'repeat_password', 'Repeat password'),
( 'en', 'reset_password', 'Reset password'),
( 'en', 'email_confirmation', 'Email Confirmation'),
( 'en', 'you_can_login_now', 'You can <a href=\'{link}\'>log in</a> now.'),
( 'en', 'user_with_key_doesnt_exist', 'User with this key doesn\'t exist in our database.'),
( 'en', 'gender', 'Gender'),
( 'en', 'dob', 'DOB'),
( 'en', 'welcoem', 'Welcome'),
( 'en', 'panel_mini_admin', 'Admin Mini Panel'),
( 'en', 'view_profile_page', 'View profile page'),
( 'en', 'log_off', 'Log Off'),
( 'en', 'admin_panel', 'Admin Panel'),
( 'en', 'member_panel', 'Member\'s Panel'),
( 'en', 'hello', 'Hello'),
( 'en', 'my_profile', 'My Profile'),
( 'en', 'user_roles', 'User Roles'),
( 'en', 'index', 'Index'),
( 'en', 'contact_us', 'Contact Us'),
( 'en', 'services', 'Services'),
( 'en', 'support_us', 'Support Us'),
( 'en', 'forum', 'Forum'),
( 'en', 'cafe', 'Cafe'),
( 'en', 'submit', 'Submit'),
( 'en', 'about_us', 'About Us'),

( 'en', 'faq', 'FAQ'),

( 'en', 'friending', 'Suggest to a Friend'),

( 'en', 'welcome_', 'Welcome to '),

( 'en', 'password_reset', 'Password reset'),

( 'en', 'reset_password', 'Reset Password'),

( 'en', 'phone', 'Phone'),

( 'en', 'note', 'Note'),

( 'en', 'update', 'Update'),

( 'en', 'address', 'Address'),

( 'en', 'first_name', 'First Name'),

( 'en', 'last_name', 'Last Name'),

( 'en', 'old_password', 'Old Password'),

( 'en', 'new_password', 'New Password'),

( 'en', 'your_details', 'Tour Details'),

( 'en', 'change_password', 'Change Password'),

( 'en', 'confirm_new_password', 'Confirm New Password'),

( 'en', 'to_change_email_username', 'If you want to change your username, email or you have registred via social network and you want to change your password now, please contact administrator.'),

( 'en', 'add', 'Add'),

( 'en', 'ban', 'Ban'),

( 'en', 'yes', 'Yes'),

( 'en', 'no', 'No'),

( 'en', 'edit', 'Edit'),

( 'en', 'next', 'Next'),

( 'en', 'previous', 'Previous'),

( 'en', 'unban', 'Unban'),

( 'en', 'cancel', 'Cancel'),

( 'en', 'delete', 'Delete'),

( 'en', 'details', 'Details'),

( 'en', 'loading', 'loading...'),

( 'en', 'role_name', 'Role Name'),

( 'en', 'user_with_role', '# of users with this role.'),

( 'en', 'user_banned', 'This user account is banned by administrator!'),

( 'en', 'field_required', 'Field cannot be empty!'),

( 'en', 'role_taken', 'Role already exist.'),

( 'en', 'email_required', 'Email is required'),

( 'en', 'email_wring_format', 'Please enter valid email.'),

( 'en', 'email_not_exist', 'This email does not exist in our database'),

( 'en', 'email_taken', 'User with this email is already registred.'),

( 'en', 'username_taken', 'This username is in use by another member.'),

( 'en', 'user_not_confirmed', 'Please confirm your email first.'),

( 'en', 'password_required', 'Password is required'),

( 'en', 'wrong_username_password', 'Wrong username/password combination.'),

( 'en', 'passwords_dont_match', 'Passwords do not match'),

( 'en', 'wrong_old_password', 'Wrong Old password'),

( 'en', 'wrong_sum', 'Wrong sum. Please check it again.'),

( 'en', 'brute_force', 'You exceeded maximum attempts limit for today. Try again tomorrow.'),

( 'en', 'success_registration_with_confirm', 'Registration successful. Please check your email.'),

( 'en', 'success_registration_no_confirm', 'Registration successful. You can log in now.'),

( 'en', 'user_added_successfully', 'User added successfully.'),

( 'en', 'user_updated_successfully', 'User updated successfully.'),

( 'en', 'user_dont_exist', 'This user doesn\'t exist.'),

( 'en', 'leave_blank', 'Leave blank if you don\'t want to change it.'),

( 'en', 'invalid_password_reset_key', 'Password reset key is invalid or expired'),

( 'en', 'password_length', 'Password must be at least 6 characters long.'),

( 'en', 'error_writing_to_db', 'Error writing to database. Please try again.'),

( 'en', 'posting', 'Posting...'),

( 'en', 'resetting', 'Resetting...'),

( 'en', 'password_updated_successfully', 'Password successfully updated.'),

( 'en', 'password_updated_successfully_login', 'Password successfully updated. You can <a href=\'login.php\'>login now</a>.'),

( 'en', 'password_reset_email_sent', 'Password reset email sent. Check your inbox (and spam) folder.'),

( 'en', 'message_couldn_be_sent', 'Message could not be sent! Please try again.'),

( 'en', 'updating', 'Updating...'),

( 'en', 'details_updated', 'Details updated successfully.'),

( 'en', 'are_you_sure', 'Are you sure'),

( 'en', 'creating_account', 'Creating Account...'),

( 'en', 'usergroup', 'User Group'),

( 'en', 'at', 'at'),

( 'en', 'logout', 'Log Out'),

( 'en', 'copyright_by', 'Copyright by'),

( 'en', 'search', 'Search'),
( 'en', 'total_records', 'total records'),

( 'en', 'filtered_from', 'Filtered from'),

( 'en', 'records', 'Records'),

( 'en', 'of', 'of'),

( 'en', 'to', 'to'),

( 'en', 'main_title', 'This is meant as a FREE CMS System, just because i love to create things, a simplified UI backend, built for high end security, database driven, everything you need in a nice bundle to build your own website.'),

( 'en', 'community', 'Community'),

( 'en', 'learn', 'WI Community for anyone who loves to build websites.'),

( 'en', 'software', 'Software Packages'),

( 'en', 'package', 'Themes, plugins, apps, custom packages, and so much more.'),

( 'en', 'it_title', 'Custom software for the commercial world.'),

( 'en', 'it', 'I.T');

