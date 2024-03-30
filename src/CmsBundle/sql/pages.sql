INSERT INTO `page` (`id`, `layoutid`, `page_id`, `image`, `language_id`, `base_id`, `media_id`, `label`, `title`, `subtitle`, `layout`, `slug`, `slugkey`, `classes`, `page_type`, `custom_url`, `target`, `static`, `visible`, `enabled`, `sort`, `date_add`, `date_edit`, `controller`, `option_title`, `option_subtitle`, `option_subnavigation`, `option_breadcrumbs`, `option_hide_in_submenu`, `notify_change`, `notify_create_child`, `notify_change_child`, `notify_type`, `notify_email`, `notify_telegram_bot`, `notify_telegram_bot_chat_id`, `access`, `access_roles`, `tpl_inject`, `access_allow_login`, `access_visible_menu`, `show_in_sitemap`, `robots`, `settings_id`, `old_id`, `ref_id`, `access_alt_home`, `access_b2b`, `access_free`) VALUES
(NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Mijn account', 'Mijn account', NULL, NULL, 'mijn-account', 'pages_mijn_account', NULL, 'child', NULL, NULL, 0, 0, 1, 10, NULL, NULL, 'CmsBundle:Page:page', 0, 0, 0, 0, 0, 0, 0, 0, 'email', NULL, NULL, NULL, 'login', 'a:4:{i:0;s:9:\"ROLE_USER\";i:1;s:11:\"ROLE_EDITOR\";i:2;s:10:\"ROLE_ADMIN\";i:3;s:16:\"ROLE_SUPER_ADMIN\";}', NULL, 1, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL);
SET @main_page_id = LAST_INSERT_ID();

INSERT INTO `page` (`id`, `layoutid`, `page_id`, `image`, `language_id`, `base_id`, `media_id`, `label`, `title`, `subtitle`, `layout`, `slug`, `slugkey`, `classes`, `page_type`, `custom_url`, `target`, `static`, `visible`, `enabled`, `sort`, `date_add`, `date_edit`, `controller`, `option_title`, `option_subtitle`, `option_subnavigation`, `option_breadcrumbs`, `option_hide_in_submenu`, `notify_change`, `notify_create_child`, `notify_change_child`, `notify_type`, `notify_email`, `notify_telegram_bot`, `notify_telegram_bot_chat_id`, `access`, `access_roles`, `tpl_inject`, `access_allow_login`, `access_visible_menu`, `show_in_sitemap`, `robots`, `settings_id`, `old_id`, `ref_id`, `access_alt_home`, `access_b2b`, `access_free`) VALUES
(NULL, NULL, @main_page_id, NULL, 1, NULL, NULL, 'Mijn account', 'Mijn account', NULL, NULL, 'mijn-account', 'pages_mijn_account_mijn_account', NULL, NULL, NULL, NULL, 0, 1, 1, 11, NULL, NULL, 'CmsBundle:Page:page', 0, 0, 0, 0, 0, 0, 0, 0, 'email', NULL, NULL, NULL, NULL, 'a:0:{}', NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL);
SET @page_one = LAST_INSERT_ID();

INSERT INTO `page` (`id`, `layoutid`, `page_id`, `image`, `language_id`, `base_id`, `media_id`, `label`, `title`, `subtitle`, `layout`, `slug`, `slugkey`, `classes`, `page_type`, `custom_url`, `target`, `static`, `visible`, `enabled`, `sort`, `date_add`, `date_edit`, `controller`, `option_title`, `option_subtitle`, `option_subnavigation`, `option_breadcrumbs`, `option_hide_in_submenu`, `notify_change`, `notify_create_child`, `notify_change_child`, `notify_type`, `notify_email`, `notify_telegram_bot`, `notify_telegram_bot_chat_id`, `access`, `access_roles`, `tpl_inject`, `access_allow_login`, `access_visible_menu`, `show_in_sitemap`, `robots`, `settings_id`, `old_id`, `ref_id`, `access_alt_home`, `access_b2b`, `access_free`) VALUES
(NULL, NULL, @main_page_id, NULL, 1, NULL, NULL, 'Uitloggen', 'Uitloggen', NULL, NULL, 'uitloggen', 'pages_mijn_account_uitloggen', NULL, 'external', '/logout', NULL, 0, 1, 1, 14, NULL, NULL, 'CmsBundle:Page:page', 0, 0, 0, 0, 0, 0, 0, 0, 'email', NULL, NULL, NULL, NULL, 'a:0:{}', NULL, NULL, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL);
SET @page_four = LAST_INSERT_ID();

INSERT INTO `page` (`id`, `layoutid`, `page_id`, `image`, `language_id`, `base_id`, `media_id`, `label`, `title`, `subtitle`, `layout`, `slug`, `slugkey`, `classes`, `page_type`, `custom_url`, `target`, `static`, `visible`, `enabled`, `sort`, `date_add`, `date_edit`, `controller`, `option_title`, `option_subtitle`, `option_subnavigation`, `option_breadcrumbs`, `option_hide_in_submenu`, `notify_change`, `notify_create_child`, `notify_change_child`, `notify_type`, `notify_email`, `notify_telegram_bot`, `notify_telegram_bot_chat_id`, `access`, `access_roles`, `tpl_inject`, `access_allow_login`, `access_visible_menu`, `show_in_sitemap`, `robots`, `settings_id`, `old_id`, `ref_id`, `access_alt_home`, `access_b2b`, `access_free`) VALUES
(NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Wachtwoord vergeten', 'Wachtwoord vergeten', NULL, NULL, 'wachtwoord-vergeten', 'pages_wachtwoord_vergeten', NULL, NULL, NULL, NULL, 0, 0, 1, 15, NULL, NULL, 'CmsBundle:Page:page', 1, 0, 0, 0, 0, 0, 0, 0, 'email', NULL, NULL, NULL, NULL, 'a:0:{}', NULL, NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, NULL, NULL);
set @page_forgot = LAST_INSERT_ID();

INSERT INTO `page` (`id`, `layoutid`, `page_id`, `image`, `language_id`, `base_id`, `media_id`, `settings_id`, `label`, `title`, `subtitle`, `layout`, `slug`, `slugkey`, `classes`, `page_type`, `custom_url`, `target`, `static`, `visible`, `enabled`, `sort`, `ref_id`, `date_add`, `date_edit`, `controller`, `option_title`, `option_subtitle`, `option_subnavigation`, `option_breadcrumbs`, `option_hide_in_submenu`, `notify_change`, `notify_create_child`, `notify_change_child`, `notify_type`, `notify_email`, `notify_telegram_bot`, `notify_telegram_bot_chat_id`, `access`, `access_roles`, `cache`, `access_free`, `access_allow_login`, `access_alt_home`, `access_visible_menu`, `access_b2b`, `access_pwd`, `tpl_inject`, `show_in_sitemap`, `robots`, `old_id`) VALUES
(NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 'Registreren', 'Registreren', '', 'default', 'registreren', 'pages_registreren', '', '', '', '', 0, 0, 1, 11, NULL, NULL, NULL, 'CmsBundle:page:page', 1, 0, 0, 0, 0, 0, 0, 0, 'email', '', '', '', '', 'a:0:{}', 0, 0, 0, 0, 0, 0, '', '', 0, '', NULL);
set @page_register = LAST_INSERT_ID();



INSERT INTO `page_block_wrapper` (`id`, `page_id`, `internal_id`, `template_key`, `pos`, `enabled`, `label`, `intro`, `css_class`, `css_id`, `grid_size`, `anchor`, `bg_color`) VALUES
(NULL, @page_four, 'AUTO_MYACCOUNT_1', 'framework_empty', 0, 1, '', NULL, NULL, NULL, 0, NULL, NULL);
SET @wrapper_four = LAST_INSERT_ID();

INSERT INTO `page_block_wrapper` (`id`, `page_id`, `internal_id`, `template_key`, `pos`, `enabled`, `label`, `intro`, `css_class`, `css_id`, `grid_size`, `anchor`, `bg_color`) VALUES
(NULL, @page_forgot, 'AUTO_FORGOT_1', 'framework_empty', 0, 1, '', NULL, NULL, NULL, 0, NULL, NULL);
SET @wrapper_forgot = LAST_INSERT_ID();

INSERT INTO `page_block_wrapper` (`id`, `page_id`, `internal_id`, `template_key`, `pos`, `enabled`, `label`, `intro`, `css_class`, `css_id`, `grid_size`, `anchor`, `bg_color`) VALUES
(NULL, @page_register, 'AUTO_REGISTER_1', 'framework_empty', 0, 1, '', NULL, NULL, NULL, 0, NULL, NULL);
SET @wrapper_register = LAST_INSERT_ID();


INSERT INTO `page_block` (`id`, `wrapper_id`, `media_id`, `internal_id`, `template_key`, `pos`, `content`, `bundle`, `bundle_label`, `bundle_data`, `content_type`, `config`, `enabled`, `contained`, `data`) VALUES
(NULL, @wrapper_four, NULL, 'AUTO_MYACCOUNT_4', 'block-0', 0, NULL, NULL, NULL, NULL, NULL, 'a:7:{s:5:\"class\";s:0:\"\";s:5:\"style\";s:0:\"\";s:4:\"link\";s:0:\"\";s:6:\"target\";s:0:\"\";s:5:\"width\";s:0:\"\";s:6:\"offset\";s:0:\"\";s:2:\"id\";s:0:\"\";}', 0, NULL, '[]');

INSERT INTO `page_block` (`id`, `wrapper_id`, `media_id`, `internal_id`, `template_key`, `pos`, `content`, `data`, `bundle`, `bundle_label`, `bundle_data`, `content_type`, `config`, `enabled`, `contained`) VALUES
(NULL, @wrapper_forgot, NULL, 'AUTO_FORGOT_1', 'block-0', 0, '<h1>Admin</h1>', '[]', 'admin', 'Admin', '{\"bundlename\":\"admin\",\"id\":\"password_forgotten_link\"}', 'bundle', 'a:7:{s:5:\"class\";s:0:\"\";s:5:\"style\";s:0:\"\";s:4:\"link\";s:0:\"\";s:6:\"target\";s:0:\"\";s:5:\"width\";s:2:\"12\";s:6:\"offset\";s:0:\"\";s:2:\"id\";s:0:\"\";}', 0, ''),
(NULL, @wrapper_register, NULL, 'AUTO_REGISTER_1', 'block-0', 0, '<h1>Admin</h1>', '[]', 'admin', 'Admin', '{\"bundlename\":\"admin\",\"id\":\"register\",\"enabled\":\"1\"}', 'bundle', 'a:7:{s:5:\"class\";s:0:\"\";s:5:\"style\";s:0:\"\";s:4:\"link\";s:0:\"\";s:6:\"target\";s:0:\"\";s:5:\"width\";s:2:\"12\";s:6:\"offset\";s:0:\"\";s:2:\"id\";s:0:\"\";}', 0, '');
