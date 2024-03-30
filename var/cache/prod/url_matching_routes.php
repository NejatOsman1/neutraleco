<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/admin/apidoc.json' => [[['_route' => 'app.swagger', '_controller' => 'nelmio_api_doc.controller.swagger'], null, ['GET' => 0], null, false, false, null]],
        '/admin/apidoc' => [[['_route' => 'app.swagger_ui', '_controller' => 'nelmio_api_doc.controller.swagger_ui'], null, ['GET' => 0], null, false, false, null]],
        '/admin/2fa' => [[['_route' => 'admin_2fa_login', '_controller' => 'scheb_two_factor.form_controller::form'], null, null, null, false, false, null]],
        '/admin/2fa_check' => [[['_route' => 'admin_2fa_login_check'], null, null, null, false, false, null]],
        '/api/ping' => [[['_route' => 'app_trinity_api_default_getapiping', '_controller' => 'App\\Trinity\\ApiBundle\\Controller\\DefaultController::getApiPingAction'], null, ['GET' => 0], null, false, false, null]],
        '/admin/api' => [[['_route' => 'admin_mod_api', '_controller' => 'App\\Trinity\\ApiBundle\\Controller\\AdminController::clientsAction'], null, null, null, false, false, null]],
        '/api/authorize' => [[['_route' => 'app_cms_api_postapiauthorize', '_controller' => 'App\\CmsBundle\\Controller\\ApiController::postApiAuthorizeAction'], null, ['POST' => 0], null, false, false, null]],
        '/api/bundles' => [[['_route' => 'app_cms_api_getapibundles', '_controller' => 'App\\CmsBundle\\Controller\\ApiController::getApiBundlesAction'], null, ['GET' => 0], null, false, false, null]],
        '/api/updateurl' => [[['_route' => 'app_cms_api_postapiupdateurl', '_controller' => 'App\\CmsBundle\\Controller\\ApiController::postApiUpdateurlAction'], null, ['POST' => 0], null, false, false, null]],
        '/api/info' => [[['_route' => 'app_cms_api_getapiinfo', '_controller' => 'App\\CmsBundle\\Controller\\ApiController::getApiInfoAction'], null, ['GET' => 0], null, false, false, null]],
        '/api/dashboard' => [[['_route' => 'app_cms_api_getapidashboard', '_controller' => 'App\\CmsBundle\\Controller\\ApiController::getApiDashboardAction'], null, ['GET' => 0], null, false, false, null]],
        '/api/selfupdate' => [[['_route' => 'app_cms_api_postapiselfupdate', '_controller' => 'App\\CmsBundle\\Controller\\ApiController::postApiSelfupdateAction'], null, ['POST' => 0], null, false, false, null]],
        '/api/bundleinstaller' => [[['_route' => 'app_cms_api_postapibundleinstaller', '_controller' => 'App\\CmsBundle\\Controller\\ApiController::postApiBundleinstallerAction'], null, ['POST' => 0], null, false, false, null]],
        '/admin/calendar/update' => [[['_route' => 'admin_calendar_update', '_controller' => 'App\\CmsBundle\\Controller\\CalendarController::updateEventAction'], null, null, null, false, false, null]],
        '/admin/cron' => [[['_route' => 'admin_cron', '_controller' => 'App\\CmsBundle\\Controller\\CronTaskController::indexAction'], null, null, null, false, false, null]],
        '/admin/cron/update' => [[['_route' => 'admin_cron_update', '_controller' => 'App\\CmsBundle\\Controller\\CronTaskController::cronTaskUpdateAction'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'logout', '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::logoutAction'], null, null, null, false, false, null]],
        '/postcode-api' => [[['_route' => 'postcode_api', '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::postcode'], null, null, null, false, false, null]],
        '/nav-account' => [[['_route' => 'nav_account', '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::account'], null, null, null, false, false, null]],
        '/admin/live' => [[['_route' => 'admin_live', '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::liveAction'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'admin', '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::dashboardAction'], null, null, null, false, false, null]],
        '/admin/blocks' => [[['_route' => 'admin_blocks', '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::blocksAction'], null, null, null, false, false, null]],
        '/admin/feedback' => [[['_route' => 'admin_feedback', '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::feedbackAction'], null, null, null, false, false, null]],
        '/admin/about' => [[['_route' => 'admin_about', '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::aboutAction'], null, null, null, false, false, null]],
        '/admin/features' => [[['_route' => 'admin_features', '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::featuresAction'], null, null, null, false, false, null]],
        '/admin/integrations' => [[['_route' => 'admin_integrations', '_controller' => 'App\\CmsBundle\\Controller\\IntegrationsController::indexAction'], null, null, null, false, false, null]],
        '/admin/login' => [[['_route' => 'admin_login', '_controller' => 'App\\CmsBundle\\Controller\\LoginController::loginAction'], null, null, null, false, false, null]],
        '/admin/setup2fa' => [[['_route' => 'admin_setup2fa', '_controller' => 'App\\CmsBundle\\Controller\\LoginController::setup2fa'], null, null, null, false, false, null]],
        '/admin/lostpassword' => [[['_route' => 'admin_lostpassword', '_controller' => 'App\\CmsBundle\\Controller\\LoginController::lostpasswordAction'], null, null, null, false, false, null]],
        '/admin/login_check' => [[['_route' => 'admin_login_check', '_controller' => 'App\\CmsBundle\\Controller\\LoginController::loginCheckAction'], null, null, null, false, false, null]],
        '/admin/logout' => [[['_route' => 'admin_logout', '_controller' => 'App\\CmsBundle\\Controller\\LoginController::logoutAction'], null, null, null, false, false, null]],
        '/admin/mail' => [[['_route' => 'admin_mail', '_controller' => 'App\\CmsBundle\\Controller\\MailController::indexAction'], null, null, null, false, false, null]],
        '/admin/mail/templates' => [[['_route' => 'admin_mail_templates', '_controller' => 'App\\CmsBundle\\Controller\\MailController::templatesAction'], null, null, null, false, false, null]],
        '/admin/maintenance/checkmobile' => [[['_route' => 'admin_maintenance_checkmobile', '_controller' => 'App\\CmsBundle\\Controller\\MaintenanceController::checkmobileAction'], null, null, null, false, false, null]],
        '/admin/maintenance/analytics' => [[['_route' => 'admin_maintenance_analytics', '_controller' => 'App\\CmsBundle\\Controller\\MaintenanceController::analyticsAction'], null, null, null, false, false, null]],
        '/admin/maintenance/history' => [[['_route' => 'admin_maintenance_history', '_controller' => 'App\\CmsBundle\\Controller\\MaintenanceController::historyAction'], null, null, null, false, false, null]],
        '/admin/maintenance/linktest' => [[['_route' => 'admin_maintenance_linktest', '_controller' => 'App\\CmsBundle\\Controller\\MaintenanceController::linktestAction'], null, null, null, false, false, null]],
        '/admin/maintenance' => [[['_route' => 'admin_maintenance', '_controller' => 'App\\CmsBundle\\Controller\\MaintenanceController::indexAction'], null, null, null, false, false, null]],
        '/admin/media/orphaned' => [[['_route' => 'admin_media_orphaned', '_controller' => 'App\\CmsBundle\\Controller\\MediaController::orphanedAction'], null, null, null, false, false, null]],
        '/admin/metadata' => [[['_route' => 'admin_metadata', '_controller' => 'App\\CmsBundle\\Controller\\MetadataController::indexAction'], null, null, null, false, false, null]],
        '/admin/monitor' => [[['_route' => 'admin_monitor', '_controller' => 'App\\CmsBundle\\Controller\\MonitorController::indexAction'], null, null, null, false, false, null]],
        '/admin/settings/multisite' => [[['_route' => 'admin_multisite', '_controller' => 'App\\CmsBundle\\Controller\\MultisiteController::indexAction'], null, null, null, false, false, null]],
        '/admin/navigation' => [[['_route' => 'admin_navigation', '_controller' => 'App\\CmsBundle\\Controller\\NavigationController::indexAction'], null, null, null, false, false, null]],
        '/admin/page/save/front' => [[['_route' => 'admin_page_save_front', '_controller' => 'App\\CmsBundle\\Controller\\PageController::saveFrontAction'], null, null, null, false, false, null]],
        '/admin/page' => [[['_route' => 'admin_page', '_controller' => 'App\\CmsBundle\\Controller\\PageController::indexAction'], null, null, null, false, false, null]],
        '/admin/page/list' => [[['_route' => 'admin_page_list', '_controller' => 'App\\CmsBundle\\Controller\\PageController::listAction'], null, null, null, false, false, null]],
        '/admin/page/import' => [[['_route' => 'admin_page_import', '_controller' => 'App\\CmsBundle\\Controller\\PageController::importAction'], null, null, null, false, false, null]],
        '/admin/page/inactive' => [[['_route' => 'admin_page_inactive', '_controller' => 'App\\CmsBundle\\Controller\\PageController::inactiveAction'], null, null, null, false, false, null]],
        '/admin/page/modified' => [[['_route' => 'admin_page_modified', '_controller' => 'App\\CmsBundle\\Controller\\PageController::modifiedAction'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'homepage', '_controller' => 'App\\CmsBundle\\Controller\\PageController::homepageAction'], null, null, null, false, false, null]],
        '/__submit_critical' => [[['_route' => 'page_submit_critical_css', '_controller' => 'App\\CmsBundle\\Controller\\PageController::criticalSubmitAction'], null, null, null, false, false, null]],
        '/admin/redirects' => [[['_route' => 'admin_redirects', '_controller' => 'App\\CmsBundle\\Controller\\RedirectsController::indexAction'], null, null, null, false, false, null]],
        '/admin/settings' => [[['_route' => 'admin_settings', '_controller' => 'App\\CmsBundle\\Controller\\SettingsController::indexAction'], null, null, null, false, false, null]],
        '/admin/settings/mailtest' => [[['_route' => 'admin_settings_mailtest', '_controller' => 'App\\CmsBundle\\Controller\\SettingsController::mailtestAction'], null, null, null, false, false, null]],
        '/admin/settings/languages' => [[['_route' => 'admin_settings_languages', '_controller' => 'App\\CmsBundle\\Controller\\SettingsController::languagesAction'], null, null, null, false, false, null]],
        '/admin/settings/clear/cache' => [[['_route' => 'admin_settings_clear_cache', '_controller' => 'App\\CmsBundle\\Controller\\SettingsController::clearCacheAction'], null, null, null, false, false, null]],
        '/admin/system' => [[['_route' => 'admin_system', '_controller' => 'App\\CmsBundle\\Controller\\SystemController::indexAction'], null, null, null, false, false, null]],
        '/admin/system/download' => [[['_route' => 'admin_system_download', '_controller' => 'App\\CmsBundle\\Controller\\SystemController::downloadAction'], null, null, null, false, false, null]],
        '/admin/system/restore' => [[['_route' => 'admin_system_restore', '_controller' => 'App\\CmsBundle\\Controller\\SystemController::restoreAction'], null, null, null, false, false, null]],
        '/admin/tag' => [[['_route' => 'admin_tag', '_controller' => 'App\\CmsBundle\\Controller\\TagController::indexAction'], null, null, null, false, false, null]],
        '/admin/trash' => [[['_route' => 'admin_trash', '_controller' => 'App\\CmsBundle\\Controller\\TrashController::indexAction'], null, null, null, false, false, null]],
        '/admin/update' => [[['_route' => 'admin_update', '_controller' => 'App\\CmsBundle\\Controller\\UpdateController::updateAction'], null, null, null, false, false, null]],
        '/admin/issues' => [[['_route' => 'admin_issues', '_controller' => 'App\\CmsBundle\\Controller\\UpdateController::issuesAction'], null, null, null, false, false, null]],
        '/admin/profile/setup2fa' => [[['_route' => 'admin_profile_setup2fa', '_controller' => 'App\\CmsBundle\\Controller\\UsersController::setup2fa'], null, null, null, false, false, null]],
        '/admin/profile' => [[['_route' => 'admin_profile', '_controller' => 'App\\CmsBundle\\Controller\\UsersController::profileAction'], null, null, null, false, false, null]],
        '/admin/users' => [[['_route' => 'admin_users', '_controller' => 'App\\CmsBundle\\Controller\\UsersController::indexAction'], null, null, null, false, false, null]],
        '/oauth/v2/token' => [[['_route' => 'fos_oauth_server_token', '_controller' => 'fos_oauth_server.controller.token::tokenAction'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/docs' => [[['_route' => 'nelmio_api_doc.swagger_ui', '_controller' => 'nelmio_api_doc.controller.swagger_ui'], null, ['GET' => 0], null, true, false, null]],
        '/admin/blog' => [[['_route' => 'admin_mod_blog', '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\BlogController::indexAction'], null, null, null, false, false, null]],
        '/admin/blog/entry/selector' => [[['_route' => 'admin_mod_blog_selector', '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::selectorAction'], null, null, null, false, false, null]],
        '/admin/blog/category/handler' => [[['_route' => 'admin_mod_blog_cat_handler', '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::catMediaHandlerAction'], null, null, null, false, false, null]],
        '/admin/blog/easifygpt' => [[['_route' => 'admin_mod_blog_openai', '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::easifyGptAction'], null, null, null, false, false, null]],
        '/admin/blog/entry/media/handler' => [[['_route' => 'admin_mod_blog_entry_media_handler', '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::mediaHandlerAction'], null, null, null, false, false, null]],
        '/admin/neutral/config' => [[['_route' => 'admin_mod_neutral_config', '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ConfigController::index'], null, null, null, false, false, null]],
        '/admin/neutral' => [[['_route' => 'admin_mod_neutral', '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\NeutralController::index'], null, null, null, false, false, null]],
        '/admin/neutral/profile/setup2fa' => [[['_route' => 'admin_neutral_profile_setup2fa', '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::setup2fa'], null, null, null, false, false, null]],
        '/admin/neutral/profile' => [[['_route' => 'admin_neutral_profile', '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::profileAction'], null, null, null, false, false, null]],
        '/admin/neutral/users' => [[['_route' => 'admin_neutral_users', '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::indexAction'], null, null, null, false, false, null]],
        '/admin/forms' => [[['_route' => 'admin_mod_forms', '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::indexAction'], null, null, null, false, false, null]],
        '/trinity/forms/upload' => [[['_route' => 'trinity_mod_forms_upload', '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::uploadAction'], null, null, null, false, false, null]],
        '/admin/search' => [[['_route' => 'admin_mod_search', '_controller' => 'App\\Trinity\\SearchBundle\\Controller\\SearchController::indexAction'], null, null, null, false, false, null]],
        '/admin/slider' => [[['_route' => 'admin_mod_slider', '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\SliderController::indexAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/a(?'
                    .'|dmin/(?'
                        .'|api/(?'
                            .'|([^/]++)/(?'
                                .'|token/delete(*:51)'
                                .'|generate(*:66)'
                                .'|view(*:77)'
                            .')'
                            .'|edit(?:/([^/]++))?(*:103)'
                        .')'
                        .'|c(?'
                            .'|alendar(?'
                                .'|/(?'
                                    .'|event(?:/([^/]++))?(*:149)'
                                    .'|delete(?:/([^/]++))?(*:177)'
                                .')'
                                .'|(?:/([^/]++))?(*:200)'
                            .')'
                            .'|ommandcontrol(?'
                                .'|(?:/([^/]++))?(*:239)'
                                .'|/(?'
                                    .'|installed/([^/]++)(*:269)'
                                    .'|dns/([^/]++)(*:289)'
                                    .'|warnings/([^/]++)(*:314)'
                                    .'|bu(?'
                                        .'|lkupdate(*:335)'
                                        .'|ndles/([^/]++)(*:357)'
                                    .')'
                                    .'|update/([^/]++)(*:381)'
                                    .'|view/([^/]++)(*:402)'
                                    .'|refresh/([^/]++)(*:426)'
                                    .'|ping/([^/]++)(*:447)'
                                .')'
                            .')'
                            .'|ron/(?'
                                .'|edit(?:/([^/]++))?(*:482)'
                                .'|delete(?'
                                    .'|(?:/([^/]++))?(*:513)'
                                    .'|afterrun(?:/([^/]++))?(*:543)'
                                .')'
                                .'|s(?'
                                    .'|inglerun(?:/([^/]++))?(*:578)'
                                    .'|tatus(?:/([^/]++))?(*:605)'
                                .')'
                            .')'
                        .')'
                        .'|blo(?'
                            .'|ck(?:/([^/]++)(?:/([^/]++))?)?(*:652)'
                            .'|g/(?'
                                .'|e(?'
                                    .'|dit(?:/([^/]++))?(*:686)'
                                    .'|ntry(?'
                                        .'|/(?'
                                            .'|filter/(\\d+)(?:/(\\d+))?(*:728)'
                                            .'|replies(?'
                                                .'|/(?'
                                                    .'|delete(?:/([^/]++))?(*:770)'
                                                    .'|edit(?:/([^/]++))?(*:796)'
                                                .')'
                                                .'|(?:/([^/]++)(?:/([^/]++))?)?(*:833)'
                                            .')'
                                            .'|add/category(?'
                                                .'|(?:/([^/]++)(?:/([^/]++))?)?(*:885)'
                                                .'|/([^/]++)/([^/]++)/delete(*:918)'
                                            .')'
                                            .'|clone(?:/(\\d+))?(*:943)'
                                            .'|edit(?:/([^/]++)(?:/([^/]++))?)?(*:983)'
                                            .'|delete(?'
                                                .'|media(?:/(\\d+)(?:/(\\d+))?)?(*:1027)'
                                                .'|(?:/([^/]++))?(*:1050)'
                                            .')'
                                            .'|import(?:/([^/]++))?(*:1080)'
                                        .')'
                                        .'|(?:/([^/]++)(?:/([^/]++))?)?(*:1118)'
                                    .')'
                                .')'
                                .'|delete(?:/([^/]++))?(*:1149)'
                                .'|a(?'
                                    .'|pproval(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:1211)'
                                    .'|jax/openai(?:/([^/]++)(?:/([^/]++))?)?(*:1258)'
                                .')'
                            .')'
                        .')'
                        .'|s(?'
                            .'|witchlanguage(?:/([^/]++)(?:/([^/]++))?)?(*:1315)'
                            .'|ettings/(?'
                                .'|multisite/(?'
                                    .'|delete(?:/([^/]++))?(*:1368)'
                                    .'|edit(?:/([^/]++))?(*:1395)'
                                .')'
                                .'|templates/email(?:/([^/]++))?(*:1434)'
                                .'|languages/(?'
                                    .'|d(?'
                                        .'|elete(?:/([^/]++))?(*:1479)'
                                        .'|l/([^/]++)(?:/([^/]++))?(*:1512)'
                                    .')'
                                    .'|view/([^/]++)(*:1535)'
                                    .'|edit(?:/([^/]++))?(*:1562)'
                                .')'
                            .')'
                            .'|lider/(?'
                                .'|e(?'
                                    .'|ntry(?'
                                        .'|(?:/([^/]++))?(*:1607)'
                                        .'|/(?'
                                            .'|add(?:/([^/]++))?(*:1637)'
                                            .'|media/(?'
                                                .'|([^/]++)/add(?:/([^/]++))?(*:1681)'
                                                .'|popup(?:/([^/]++))?(*:1709)'
                                            .')'
                                            .'|edit(?'
                                                .'|/delimage(?:/([^/]++))?(*:1749)'
                                                .'|(?:/([^/]++))?(*:1772)'
                                            .')'
                                            .'|delete(?:/([^/]++))?(*:1802)'
                                            .'|replaceImage(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:1865)'
                                            .'|toggle(?:/([^/]++))?(*:1894)'
                                            .'|position(?:/([^/]++)(?:/([^/]++))?)?(*:1939)'
                                            .'|sorting/([^/]++)(*:1964)'
                                            .'|config/edit(?:/([^/]++))?(*:1998)'
                                        .')'
                                    .')'
                                    .'|dit(?'
                                        .'|/([^/]++)/add(*:2028)'
                                        .'|(?:/([^/]++))?(*:2051)'
                                    .')'
                                .')'
                                .'|delete(?:/([^/]++))?(*:2082)'
                            .')'
                        .')'
                        .'|doc(?'
                            .'|/download(?:/([^/]++))?(*:2122)'
                            .'|(?:/([^/]++))?(*:2145)'
                            .'|/loader(?:/([^/]++))?(*:2175)'
                        .')'
                        .'|in(?'
                            .'|tegrations/test(?:/([^/]++))?(*:2219)'
                            .'|stall(?'
                                .'|(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:2278)'
                                .'|/activate(?:/([^/]++))?(*:2310)'
                            .')'
                        .')'
                        .'|json(?:/([^/]++)(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?)?(*:2381)'
                        .'|m(?'
                            .'|ail/(?'
                                .'|templates/edit(?:/([^/]++))?(*:2429)'
                                .'|edit(?:/([^/]++))?(*:2456)'
                                .'|history(?'
                                    .'|(?:/([^/]++))?(*:2489)'
                                    .'|/view(?:/([^/]++))?(*:2517)'
                                .')'
                                .'|preview/(?'
                                    .'|([^/]++)(*:2546)'
                                    .'|include/([^/]++)(*:2571)'
                                .')'
                            .')'
                            .'|e(?'
                                .'|dia(?'
                                    .'|/(?'
                                        .'|folder(?:/([^/]++))?(*:2616)'
                                        .'|a(?'
                                            .'|lter(?:/([^/]++))?(*:2647)'
                                            .'|dd/folder(?:/([^/]++))?(*:2679)'
                                        .')'
                                        .'|compress(?:/([^/]++))?(*:2711)'
                                        .'|edit(?:/([^/]++))?(*:2738)'
                                        .'|restore(?:/([^/]++))?(*:2768)'
                                        .'|history(?:/([^/]++))?(*:2798)'
                                        .'|d(?'
                                            .'|l(?:/([^/]++))?(*:2826)'
                                            .'|elete(?:/([^/]++))?(*:2854)'
                                        .')'
                                        .'|webp(?:/([^/]++))?(*:2882)'
                                        .'|view(?:/([^/]++))?(*:2909)'
                                        .'|move(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:2964)'
                                        .'|popup(?:/([^/]++))?(*:2992)'
                                    .')'
                                    .'|(?:/([^/]++)(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?)?(*:3058)'
                                    .'|dir/delete(?:/([^/]++))?(*:3091)'
                                .')'
                                .'|tadata/(?'
                                    .'|edit(?:/([^/]++))?(*:3129)'
                                    .'|delete(?:/([^/]++))?(*:3158)'
                                .')'
                            .')'
                        .')'
                        .'|n(?'
                            .'|avigation/(?'
                                .'|edit(?:/([^/]++))?(*:3205)'
                                .'|delete(?:/([^/]++))?(*:3234)'
                            .')'
                            .'|eutral/(?'
                                .'|pro(?'
                                    .'|ject(?'
                                        .'|s(?'
                                            .'|(?:/([^/]++))?(*:3285)'
                                            .'|/filter(?:/([^/]++))?(*:3315)'
                                        .')'
                                        .'|/([^/]++)/(?'
                                            .'|transactions(*:3350)'
                                            .'|buyincredits(*:3371)'
                                        .')'
                                        .'|(?:/([^/]++))?(*:3395)'
                                        .'|/(?'
                                            .'|([^/]++)/add/comment(*:3428)'
                                            .'|wijzigen(?:/([^/]++))?(*:3459)'
                                            .'|verwijderen(?:/([^/]++))?(*:3493)'
                                            .'|([^/]++)/transaction/add(*:3526)'
                                            .'|wijzigen/success(?:/([^/]++))?(*:3565)'
                                            .'|approve(?:/([^/]++))?(*:3595)'
                                            .'|decline(?:/([^/]++))?(*:3625)'
                                            .'|file/download(?:/([^/]++))?(*:3661)'
                                        .')'
                                    .')'
                                    .'|file/(?'
                                        .'|dark(?:/([^/]++))?(*:3698)'
                                        .'|qr(?:/([^/]++)(?:/([^/]++))?)?(*:3737)'
                                    .')'
                                .')'
                                .'|users/(?'
                                    .'|filter(?:/(\\d+))?(*:3774)'
                                    .'|delete(?'
                                        .'|ip(?:/([^/]++))?(*:3808)'
                                        .'|(?:/([^/]++))?(*:3831)'
                                    .')'
                                    .'|blockip(?:/([^/]++))?(*:3862)'
                                    .'|edit(?'
                                        .'|/validate(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:3929)'
                                        .'|(?:/([^/]++))?(*:3952)'
                                    .')'
                                    .'|allow(?:/([^/]++))?(*:3981)'
                                .')'
                            .')'
                        .')'
                        .'|p(?'
                            .'|a(?'
                                .'|ge/(?'
                                    .'|s(?'
                                        .'|core/([^/]++)(*:4024)'
                                        .'|elector(?:/([^/]++))?(*:4054)'
                                        .'|avetemplate(?:/([^/]++))?(*:4088)'
                                    .')'
                                    .'|media/(?'
                                        .'|([^/]++)(*:4115)'
                                        .'|download/([^/]++)(*:4141)'
                                    .')'
                                    .'|b(?'
                                        .'|undles(?:/([^/]++))?(*:4175)'
                                        .'|lock\\-preview/([^/]++)(*:4206)'
                                    .')'
                                    .'|d(?'
                                        .'|ownload/([^/]++)(*:4236)'
                                        .'|elete(?:/([^/]++))?(*:4264)'
                                    .')'
                                    .'|c(?'
                                        .'|o(?'
                                            .'|mposer/uploadhandler(?:/([^/]++))?(*:4316)'
                                            .'|py(?:/([^/]++))?(*:4341)'
                                        .')'
                                        .'|lone(?:/([^/]++))?(*:4369)'
                                    .')'
                                    .'|icon/([^/]++)(?:/([^/]++))?(*:4406)'
                                    .'|edit(?:/([^/]++))?(*:4433)'
                                    .'|request_critical/([^/]++)(*:4467)'
                                    .'|permissions(?:/([^/]++))?(*:4501)'
                                    .'|link(?:/([^/]++))?(*:4528)'
                                    .'|ajax/pageid/([^/]++)(*:4557)'
                                .')'
                                .'|y/([^/]++)(*:4577)'
                            .')'
                            .'|rofile/(?'
                                .'|dark(?:/([^/]++))?(*:4615)'
                                .'|qr(?:/([^/]++)(?:/([^/]++))?)?(*:4654)'
                            .')'
                        .')'
                        .'|log(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:4710)'
                        .'|tag(?:/([^/]++))?(*:4736)'
                        .'|users/(?'
                            .'|filter(?:/(\\d+))?(*:4771)'
                            .'|delete(?'
                                .'|ip(?:/([^/]++))?(*:4805)'
                                .'|(?:/([^/]++))?(*:4828)'
                            .')'
                            .'|blockip(?:/([^/]++))?(*:4859)'
                            .'|edit(?'
                                .'|/validate(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:4926)'
                                .'|(?:/([^/]++))?(*:4949)'
                            .')'
                            .'|allow(?:/([^/]++))?(*:4978)'
                        .')'
                        .'|forms/(?'
                            .'|answers(?'
                                .'|/(?'
                                    .'|filter/(\\d+)(?:/(\\d+))?(*:5034)'
                                    .'|delete(?:/([^/]++))?(*:5063)'
                                    .'|([^/]++)/export(*:5087)'
                                .')'
                                .'|(?:/([^/]++)(?:/([^/]++))?)?(*:5125)'
                            .')'
                            .'|edit(?'
                                .'|/addelement(?:/([^/]++)(?:/([^/]++))?)?(*:5181)'
                                .'|(?:/([^/]++))?(*:5204)'
                            .')'
                            .'|config/([^/]++)(*:5229)'
                            .'|delete(?:/([^/]++))?(*:5258)'
                        .')'
                    .')'
                    .'|jax/blog(?'
                        .'|/category/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?(*:5326)'
                        .'|(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:5377)'
                        .'|/([^/]++)/like(?:/([^/]++)(?:/([^/]++))?)?(*:5428)'
                    .')'
                .')'
                .'|/doc(?:/([^/]++)(?:/([^/]++))?)?(*:5471)'
                .'|/s(?'
                    .'|ecure(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:5532)'
                    .'|potlight/search(?:/([^/]++))?(*:5570)'
                    .'|itemap\\.(xml)(*:5592)'
                .')'
                .'|/wachtwoord\\-vergeten(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:5678)'
                .'|/registreren(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:5754)'
                .'|/projecten(?'
                    .'|/(?'
                        .'|project\\-aanmelden(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:5853)'
                        .'|alle\\-projecten(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:5932)'
                    .')'
                    .'|(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:5997)'
                    .'|/filter/ajax(*:6018)'
                .')'
                .'|/over\\-ons(?'
                    .'|/(?'
                        .'|waarom\\-neutral\\-eco(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6120)'
                        .'|team(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6188)'
                        .'|ons\\-verhaal(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6264)'
                        .'|nieuws(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6334)'
                        .'|contact(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6405)'
                    .')'
                    .'|(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6470)'
                .')'
                .'|/mijn\\-account(?'
                    .'|/(?'
                        .'|uitloggen(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6565)'
                        .'|pro(?'
                            .'|jecten(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6641)'
                            .'|fiel(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6709)'
                        .')'
                    .')'
                    .'|(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6775)'
                    .'|/profiel(*:6792)'
                .')'
                .'|/carbon\\-tracking(?'
                    .'|/(?'
                        .'|veelgestelde\\-vragen(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6901)'
                        .'|neutrale\\-blockchain(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6985)'
                        .'|methoden(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:7057)'
                    .')'
                    .'|(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:7122)'
                .')'
                .'|/home(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:7192)'
                .'|/neutral/(?'
                    .'|ajax/project/([^/]++)/(?'
                        .'|comments(*:7246)'
                        .'|buyincredits(*:7267)'
                        .'|transactions(?:/([^/]++))?(*:7302)'
                    .')'
                    .'|project/([^/]++)/add/buyincredits(*:7345)'
                .')'
                .'|/trinity/neutral/upload(?:/([^/]++))?(*:7392)'
                .'|/forms/ajax(?:/([^/]++))?(*:7426)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        51 => [[['_route' => 'admin_mod_api_delete_token', '_controller' => 'App\\Trinity\\ApiBundle\\Controller\\AdminController::deleteTokenAction'], ['id'], null, null, false, false, null]],
        66 => [[['_route' => 'admin_mod_api_generate', '_controller' => 'App\\Trinity\\ApiBundle\\Controller\\AdminController::generateAction'], ['id'], null, null, false, false, null]],
        77 => [[['_route' => 'admin_mod_api_view', '_controller' => 'App\\Trinity\\ApiBundle\\Controller\\AdminController::viewAction'], ['id'], null, null, false, false, null]],
        103 => [[['_route' => 'admin_mod_api_edit', 'id' => null, '_controller' => 'App\\Trinity\\ApiBundle\\Controller\\AdminController::clientEditAction'], ['id'], null, null, false, true, null]],
        149 => [[['_route' => 'admin_calendar_event', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\CalendarController::eventAction'], ['id'], null, null, false, true, null]],
        177 => [[['_route' => 'admin_calendar_delete', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\CalendarController::deleteEventAction'], ['id'], null, null, false, true, null]],
        200 => [[['_route' => 'admin_calendar', 'type' => null, '_controller' => 'App\\CmsBundle\\Controller\\CalendarController::indexAction'], ['type'], null, null, false, true, null]],
        239 => [[['_route' => 'admin_cc', 'branch' => null, '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::indexAction'], ['branch'], null, null, false, true, null]],
        269 => [[['_route' => 'admin_cc_installed', '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::installedAction'], ['bundle'], null, null, false, true, null]],
        289 => [[['_route' => 'admin_cc_dns', '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::dnsAction'], ['domain'], null, null, false, true, null]],
        314 => [[['_route' => 'admin_cc_warnings', '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::warningsAction'], ['domain'], null, null, false, true, null]],
        335 => [[['_route' => 'admin_cc_bulkupdate', '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::bulkupdateAction'], [], null, null, false, false, null]],
        357 => [[['_route' => 'admin_cc_bundles', '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::bundlesAction'], ['domain'], null, null, false, true, null]],
        381 => [[['_route' => 'admin_cc_update', '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::updateAction'], ['domain'], null, null, false, true, null]],
        402 => [[['_route' => 'admin_cc_view', '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::viewAction'], ['domain'], null, null, false, true, null]],
        426 => [[['_route' => 'admin_cc_refresh', '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::refreshAction'], ['domain'], null, null, false, true, null]],
        447 => [[['_route' => 'admin_cc_ping', '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::pingAction'], ['domain'], null, null, false, true, null]],
        482 => [[['_route' => 'admin_cron_edit', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\CronTaskController::editAction'], ['id'], null, null, false, true, null]],
        513 => [[['_route' => 'admin_cron_delete', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\CronTaskController::deleteAction'], ['id'], null, null, false, true, null]],
        543 => [[['_route' => 'admin_cron_delete_after_run', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\CronTaskController::deleteafterrunAction'], ['id'], null, null, false, true, null]],
        578 => [[['_route' => 'admin_cron_singlerun', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\CronTaskController::singlerunAction'], ['id'], null, null, false, true, null]],
        605 => [[['_route' => 'admin_cron_status', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\CronTaskController::statusAction'], ['id'], null, null, false, true, null]],
        652 => [[['_route' => 'admin_block', 'bundle' => '', 'index' => 0, '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::blockAction'], ['bundle', 'index'], null, null, false, true, null]],
        686 => [[['_route' => 'admin_mod_blog_edit', 'id' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\BlogController::editAction'], ['id'], null, null, false, true, null]],
        728 => [[['_route' => 'admin_mod_blog_entry_filter', 'page' => 1, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::filterAction'], ['blogid', 'page'], null, null, false, true, null]],
        770 => [[['_route' => 'admin_mod_blog_entry_replies_delete', 'id' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::deleteReplyAction'], ['id'], null, null, false, true, null]],
        796 => [[['_route' => 'admin_mod_blog_entry_replies_edit', 'id' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::editReplyAction'], ['id'], null, null, false, true, null]],
        833 => [[['_route' => 'admin_mod_blog_entry_replies', 'id' => null, 'page' => 1, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::repliesAction'], ['id', 'page'], null, null, false, true, null]],
        885 => [[['_route' => 'admin_mod_blog_category_add', 'id' => null, 'catid' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::addcategoryAction'], ['id', 'catid'], null, null, false, true, null]],
        918 => [[['_route' => 'admin_mod_blog_category_delete', '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::deleteCategoryAction'], ['id', 'catid'], null, null, false, false, null]],
        943 => [[['_route' => 'admin_mod_blog_entry_clone', 'id' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::cloneAction'], ['id'], null, null, false, true, null]],
        983 => [[['_route' => 'admin_mod_blog_entry_edit', 'id' => null, 'blog' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::editAction'], ['id', 'blog'], null, null, false, true, null]],
        1027 => [[['_route' => 'admin_mod_blog_entry_media_delete', 'id' => null, 'mediaid' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::deleteMediaAction'], ['id', 'mediaid'], null, null, false, true, null]],
        1050 => [[['_route' => 'admin_mod_blog_entry_delete', 'id' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::deleteAction'], ['id'], null, null, false, true, null]],
        1080 => [[['_route' => 'admin_mod_blog_entry_import', 'blog' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::importAction'], ['blog'], null, null, false, true, null]],
        1118 => [[['_route' => 'admin_mod_blog_entry', 'id' => null, 'page' => 1, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::indexAction'], ['id', 'page'], null, null, false, true, null]],
        1149 => [[['_route' => 'admin_mod_blog_delete', 'id' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\BlogController::deleteAction'], ['id'], null, null, false, true, null]],
        1211 => [[['_route' => 'admin_mod_blog_approval', 'blog' => null, 'id' => null, 'status' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::approvalAction'], ['blog', 'id', 'status'], null, null, false, true, null]],
        1258 => [[['_route' => 'admin_mod_blog_ajax_openai', 'id' => null, 'type' => 'content', '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::openAIAction'], ['id', 'type'], null, null, false, true, null]],
        1315 => [[['_route' => 'admin_switch_language', 'locale' => 'nl', 'msite' => 0, '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::languageSwitchAction'], ['locale', 'msite'], null, null, false, true, null]],
        1368 => [[['_route' => 'admin_multisite_delete', 'id' => '', '_controller' => 'App\\CmsBundle\\Controller\\MultisiteController::deleteAction'], ['id'], null, null, false, true, null]],
        1395 => [[['_route' => 'admin_multisite_edit', 'id' => 0, '_controller' => 'App\\CmsBundle\\Controller\\MultisiteController::editAction'], ['id'], null, null, false, true, null]],
        1434 => [[['_route' => 'admin_templates_email', 'template' => '', '_controller' => 'App\\CmsBundle\\Controller\\SettingsController::templatesEmailAction'], ['template'], null, null, false, true, null]],
        1479 => [[['_route' => 'admin_settings_languages_delete', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\SettingsController::deleteLanguageAction'], ['id'], null, null, false, true, null]],
        1512 => [[['_route' => 'admin_settings_languages_dl', 'group' => null, '_controller' => 'App\\CmsBundle\\Controller\\SettingsController::dlLanguageAction'], ['id', 'group'], null, null, false, true, null]],
        1535 => [[['_route' => 'admin_settings_languages_view', '_controller' => 'App\\CmsBundle\\Controller\\SettingsController::viewLanguageAction'], ['id'], null, null, false, true, null]],
        1562 => [[['_route' => 'admin_settings_languages_edit', 'id' => 0, '_controller' => 'App\\CmsBundle\\Controller\\SettingsController::editLanguageAction'], ['id'], null, null, false, true, null]],
        1607 => [[['_route' => 'admin_mod_slider_entry', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::indexAction'], ['id'], null, null, false, true, null]],
        1637 => [[['_route' => 'admin_mod_slider_entry_add', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::addAction'], ['id'], null, null, false, true, null]],
        1681 => [[['_route' => 'admin_mod_slider_entry_media_add', 'sliderid' => null, 'mediaid' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::addMediaToSlider'], ['sliderid', 'mediaid'], null, null, false, true, null]],
        1709 => [[['_route' => 'admin_slider_entry_media_popup', 'parentid' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::popupAction'], ['parentid'], null, null, false, true, null]],
        1749 => [[['_route' => 'admin_mod_slider_entry_edit_delimage', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::delimageAction'], ['id'], null, null, false, true, null]],
        1772 => [[['_route' => 'admin_mod_slider_entry_edit', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::editAction'], ['id'], null, null, false, true, null]],
        1802 => [[['_route' => 'admin_mod_slider_entry_delete', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::deleteAction'], ['id'], null, null, false, true, null]],
        1865 => [[['_route' => 'admin_mod_slider_entry_edit_replace_image', 'entryid' => null, 'mediaid' => null, 'device' => 'desktop', '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::replaceImageAction'], ['entryid', 'mediaid', 'device'], null, null, false, true, null]],
        1894 => [[['_route' => 'admin_mod_slider_entry_toggle', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::toggleEnabledAction'], ['id'], null, null, false, true, null]],
        1939 => [[['_route' => 'admin_mod_slider_entry_position', 'direction' => '', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::changePositionEntry'], ['id', 'direction'], null, null, false, true, null]],
        1964 => [[['_route' => 'admin_slider_entry_sorting', '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::sortingAction'], ['sliderid'], null, null, false, true, null]],
        1998 => [[['_route' => 'admin_slider_entry_edit_config', 'entryid' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::configEditAction'], ['entryid'], null, null, false, true, null]],
        2028 => [[['_route' => 'admin_mod_slider_edit_add', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\SliderController::addSlideAction'], ['id'], null, null, false, false, null]],
        2051 => [[['_route' => 'admin_mod_slider_edit', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\SliderController::editAction'], ['id'], null, null, false, true, null]],
        2082 => [[['_route' => 'admin_mod_slider_delete', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\SliderController::deleteAction'], ['id'], null, null, false, true, null]],
        2122 => [[['_route' => 'admin_doc_download', 'bundle' => null, '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::docDownloadAction'], ['bundle'], null, null, false, true, null]],
        2145 => [[['_route' => 'admin_doc', 'viewbundle' => null, '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::docAction'], ['viewbundle'], null, null, false, true, null]],
        2175 => [[['_route' => 'admin_doc_loader', 'key' => null, '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::docLoaderAction'], ['key'], null, null, false, true, null]],
        2219 => [[['_route' => 'admin_integrations_test', 'provider' => null, '_controller' => 'App\\CmsBundle\\Controller\\IntegrationsController::testAction'], ['provider'], null, null, false, true, null]],
        2278 => [[['_route' => 'admin_install', 'bundle' => null, 'version' => null, 'update' => 0, '_controller' => 'App\\CmsBundle\\Controller\\UpdateController::installAction'], ['bundle', 'version', 'update'], null, null, false, true, null]],
        2310 => [[['_route' => 'admin_install_activate', 'package' => '', '_controller' => 'App\\CmsBundle\\Controller\\UpdateController::activateAction'], ['package'], null, null, false, true, null]],
        2381 => [[['_route' => '_adminjson', 'caller' => null, 'param1' => null, 'param2' => null, 'param3' => null, '_controller' => 'App\\CmsBundle\\Controller\\JsonController::ajaxAction'], ['caller', 'param1', 'param2', 'param3'], null, null, false, true, null]],
        2429 => [[['_route' => 'admin_mail_templates_edit', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MailController::templatesEditAction'], ['id'], null, null, false, true, null]],
        2456 => [[['_route' => 'admin_mail_edit', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MailController::editAction'], ['id'], null, null, false, true, null]],
        2489 => [[['_route' => 'admin_mail_history', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MailController::historyAction'], ['id'], null, null, false, true, null]],
        2517 => [[['_route' => 'admin_mail_history_view', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MailController::historyViewAction'], ['id'], null, null, false, true, null]],
        2546 => [[['_route' => 'admin_mail_preview', '_controller' => 'App\\CmsBundle\\Controller\\MailController::previewAction'], ['id'], null, null, false, true, null]],
        2571 => [[['_route' => 'admin_mail_preview_include', '_controller' => 'App\\CmsBundle\\Controller\\MailController::previewIncludeAction'], ['id'], null, null, false, true, null]],
        2616 => [[['_route' => 'admin_media_folder', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::folderAction'], ['id'], null, null, false, true, null]],
        2647 => [[['_route' => 'admin_media_alter', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::alterAction'], ['id'], null, null, false, true, null]],
        2679 => [[['_route' => 'admin_media_addfolder', 'parentid' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::addfolderAction'], ['parentid'], null, null, false, true, null]],
        2711 => [[['_route' => 'admin_media_compress', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::compressAction'], ['id'], null, null, false, true, null]],
        2738 => [[['_route' => 'admin_media_edit', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::editAction'], ['id'], null, null, false, true, null]],
        2768 => [[['_route' => 'admin_media_restore', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::restoreAction'], ['id'], null, null, false, true, null]],
        2798 => [[['_route' => 'admin_media_history', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::historyAction'], ['id'], null, null, false, true, null]],
        2826 => [[['_route' => 'admin_media_download', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::downloadAction'], ['id'], null, null, false, true, null]],
        2854 => [[['_route' => 'admin_media_delete', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::deleteAction'], ['id'], null, null, false, true, null]],
        2882 => [[['_route' => 'admin_media_webp', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::webpAction'], ['id'], null, null, false, true, null]],
        2909 => [[['_route' => 'admin_media_view', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::viewAction'], ['id'], null, null, false, true, null]],
        2964 => [[['_route' => 'admin_media_move', 'source' => null, 'destination' => null, 'type' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::moveAction'], ['source', 'destination', 'type'], null, null, false, true, null]],
        2992 => [[['_route' => 'admin_media_popup', 'parentid' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::popupAction'], ['parentid'], null, null, false, true, null]],
        3058 => [[['_route' => 'admin_media', 'parentid' => 0, 'type' => null, 'inline' => false, 'composer' => false, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::indexAction'], ['parentid', 'type', 'inline', 'composer'], null, null, false, true, null]],
        3091 => [[['_route' => 'admin_mediadir_delete', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::deleteMediaDirAction'], ['id'], null, null, false, true, null]],
        3129 => [[['_route' => 'admin_metadata_edit', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MetadataController::editAction'], ['id'], null, null, false, true, null]],
        3158 => [[['_route' => 'admin_metadata_delete', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MetadataController::deleteAction'], ['id'], null, null, false, true, null]],
        3205 => [[['_route' => 'admin_navigation_edit', 'id' => 0, '_controller' => 'App\\CmsBundle\\Controller\\NavigationController::editAction'], ['id'], null, null, false, true, null]],
        3234 => [[['_route' => 'admin_navigation_delete', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\NavigationController::deleteAction'], ['id'], null, null, false, true, null]],
        3285 => [[['_route' => 'admin_mod_neutral_projects', 'page' => 1, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::projects'], ['page'], null, null, false, true, null]],
        3315 => [[['_route' => 'admin_mod_neutral_projects_filter', 'page' => 1, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::projectsFilter'], ['page'], null, null, false, true, null]],
        3350 => [[['_route' => 'admin_mod_neutral_project_transaction', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::transactions'], ['id'], null, null, false, false, null]],
        3371 => [[['_route' => 'admin_mod_neutral_project_buyincredits', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::buyincredits'], ['id'], null, null, false, false, null]],
        3395 => [[['_route' => 'admin_mod_neutral_project', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::project'], ['id'], null, null, false, true, null]],
        3428 => [[['_route' => 'admin_mod_neutral_project_add_comment', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::projectAddComment'], ['id'], null, null, true, false, null]],
        3459 => [[['_route' => 'admin_mod_neutral_project_edit', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::projectEdit'], ['id'], null, null, false, true, null]],
        3493 => [[['_route' => 'admin_mod_neutral_project_delete', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::projectDelete'], ['id'], null, null, false, true, null]],
        3526 => [[['_route' => 'admin_mod_neutral_project_transaction_add', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::addProjectTransaction'], ['id'], null, null, false, false, null]],
        3565 => [[['_route' => 'admin_mod_neutral_project_edit_success', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::projectEditSuccess'], ['id'], null, null, false, true, null]],
        3595 => [[['_route' => 'admin_mod_neutral_project_approve', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::projectApprove'], ['id'], null, null, false, true, null]],
        3625 => [[['_route' => 'admin_mod_neutral_project_decline', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::projectDecline'], ['id'], null, null, false, true, null]],
        3661 => [[['_route' => 'admin_mod_neutral_project_file_download', 'fileid' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::download'], ['fileid'], null, null, false, true, null]],
        3698 => [[['_route' => 'admin_neutral_profile_dark', 'enabled' => 0, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::darkAction'], ['enabled'], null, null, false, true, null]],
        3737 => [[['_route' => 'admin_neutral_profile_qr', 'size' => 6, 'margin' => 2, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::qr'], ['size', 'margin'], null, null, false, true, null]],
        3774 => [[['_route' => 'admin_neutral_users_filter', 'page' => 1, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::filterAction'], ['page'], null, null, false, true, null]],
        3808 => [[['_route' => 'admin_neutral_users_deleteip', 'ip' => 0, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::deleteipAction'], ['ip'], null, null, false, true, null]],
        3831 => [[['_route' => 'admin_neutral_users_delete', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::deleteAction'], ['id'], null, null, false, true, null]],
        3862 => [[['_route' => 'admin_neutral_users_blockip', 'ip' => 0, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::blockipAction'], ['ip'], null, null, false, true, null]],
        3929 => [[['_route' => 'admin_neutral_users_edit_validate', 'type' => '', 'value' => '', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::validateAction'], ['type', 'value', 'id'], null, null, false, true, null]],
        3952 => [[['_route' => 'admin_neutral_users_edit', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::editAction'], ['id'], null, null, false, true, null]],
        3981 => [[['_route' => 'admin_neutral_users_allow', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::allowAction'], ['id'], null, null, false, true, null]],
        4024 => [[['_route' => 'admin_page_score', '_controller' => 'App\\CmsBundle\\Controller\\PageController::scoreAction'], ['pageid'], null, null, false, true, null]],
        4054 => [[['_route' => 'admin_page_selector', 'type' => null, '_controller' => 'App\\CmsBundle\\Controller\\PageController::selectorAction'], ['type'], null, null, false, true, null]],
        4088 => [[['_route' => 'admin_page_savetemplate', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\PageController::savetemplateAction'], ['id'], null, null, false, true, null]],
        4115 => [[['_route' => 'admin_page_media', '_controller' => 'App\\CmsBundle\\Controller\\PageController::mediaAction'], ['pageid'], null, null, false, true, null]],
        4141 => [[['_route' => 'admin_page_media_download', '_controller' => 'App\\CmsBundle\\Controller\\PageController::mediadownloadAction'], ['pageid'], null, null, false, true, null]],
        4175 => [[['_route' => 'admin_page_bundles', 'type' => null, '_controller' => 'App\\CmsBundle\\Controller\\PageController::bundlesAction'], ['type'], null, null, false, true, null]],
        4206 => [[['_route' => 'admin_page_block_preview', '_controller' => 'App\\CmsBundle\\Controller\\PageController::blockpreviewAction'], ['id'], null, null, false, true, null]],
        4236 => [[['_route' => 'admin_page_download', '_controller' => 'App\\CmsBundle\\Controller\\PageController::downloadAction'], ['id'], null, null, false, true, null]],
        4264 => [[['_route' => 'admin_page_delete', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\PageController::deleteAction'], ['id'], null, null, false, true, null]],
        4316 => [[['_route' => 'admin_page_composer_uploadhandler', 'pageid' => null, '_controller' => 'App\\CmsBundle\\Controller\\PageController::composerUploadAction'], ['pageid'], null, null, false, true, null]],
        4341 => [[['_route' => 'admin_page_copy', 'locale' => null, '_controller' => 'App\\CmsBundle\\Controller\\PageController::copyAction'], ['locale'], null, null, false, true, null]],
        4369 => [[['_route' => 'admin_page_clone', 'id' => '', '_controller' => 'App\\CmsBundle\\Controller\\PageController::cloneAction'], ['id'], null, null, false, true, null]],
        4406 => [[['_route' => 'admin_page_icon', 'icon_size' => 100, '_controller' => 'App\\CmsBundle\\Controller\\PageController::iconAction'], ['id', 'icon_size'], null, null, false, true, null]],
        4433 => [[['_route' => 'admin_page_edit', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\PageController::editAction'], ['id'], null, null, false, true, null]],
        4467 => [[['_route' => 'admin_page_critical_generate', '_controller' => 'App\\CmsBundle\\Controller\\PageController::requestCriticalAction'], ['pageid'], null, null, false, true, null]],
        4501 => [[['_route' => 'admin_page_permissions', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\PageController::permissionsAction'], ['id'], null, null, false, true, null]],
        4528 => [[['_route' => 'admin_page_link', 'plugin' => null, '_controller' => 'App\\CmsBundle\\Controller\\PageController::linkAction'], ['plugin'], null, null, false, true, null]],
        4557 => [[['_route' => 'admin_page_ajax_pageid', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageGetUrlAction'], ['id'], null, null, false, true, null]],
        4577 => [[['_route' => 'admin_settings_pay', '_controller' => 'App\\CmsBundle\\Controller\\SettingsController::payAction'], ['method'], null, null, false, true, null]],
        4615 => [[['_route' => 'admin_profile_dark', 'enabled' => 0, '_controller' => 'App\\CmsBundle\\Controller\\UsersController::darkAction'], ['enabled'], null, null, false, true, null]],
        4654 => [[['_route' => 'admin_profile_qr', 'size' => 6, 'margin' => 2, '_controller' => 'App\\CmsBundle\\Controller\\UsersController::qr'], ['size', 'margin'], null, null, false, true, null]],
        4710 => [[['_route' => 'admin_log', 'page' => 1, 'filter' => null, 'val' => null, '_controller' => 'App\\CmsBundle\\Controller\\SystemController::logAction'], ['page', 'filter', 'val'], null, null, false, true, null]],
        4736 => [[['_route' => 'admin_tag_view', 'tag' => null, '_controller' => 'App\\CmsBundle\\Controller\\TagController::viewAction'], ['tag'], null, null, false, true, null]],
        4771 => [[['_route' => 'admin_users_filter', 'page' => 1, '_controller' => 'App\\CmsBundle\\Controller\\UsersController::filterAction'], ['page'], null, null, false, true, null]],
        4805 => [[['_route' => 'admin_users_deleteip', 'ip' => 0, '_controller' => 'App\\CmsBundle\\Controller\\UsersController::deleteipAction'], ['ip'], null, null, false, true, null]],
        4828 => [[['_route' => 'admin_users_delete', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\UsersController::deleteAction'], ['id'], null, null, false, true, null]],
        4859 => [[['_route' => 'admin_users_blockip', 'ip' => 0, '_controller' => 'App\\CmsBundle\\Controller\\UsersController::blockipAction'], ['ip'], null, null, false, true, null]],
        4926 => [[['_route' => 'admin_users_edit_validate', 'type' => '', 'value' => '', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\UsersController::validateAction'], ['type', 'value', 'id'], null, null, false, true, null]],
        4949 => [[['_route' => 'admin_users_edit', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\UsersController::editAction'], ['id'], null, null, false, true, null]],
        4978 => [[['_route' => 'admin_users_allow', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\UsersController::allowAction'], ['id'], null, null, false, true, null]],
        5034 => [[['_route' => 'admin_mod_forms_answers_filter', 'page' => 1, '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::filterAction'], ['formid', 'page'], null, null, false, true, null]],
        5063 => [[['_route' => 'admin_mod_forms_answers_delete', 'id' => null, '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::deleteAmswerAction'], ['id'], null, null, false, true, null]],
        5087 => [[['_route' => 'admin_mod_forms_answers_export', 'id' => null, '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::export'], ['id'], null, null, false, false, null]],
        5125 => [[['_route' => 'admin_mod_forms_answers', 'id' => null, 'answerid' => null, '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::answersAction'], ['id', 'answerid'], null, null, false, true, null]],
        5181 => [[['_route' => 'admin_mod_forms_addrow', 'id' => null, 'type' => null, '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::addelementAction'], ['id', 'type'], null, null, false, true, null]],
        5204 => [[['_route' => 'admin_mod_forms_edit', 'id' => null, '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::editAction'], ['id'], null, null, false, true, null]],
        5229 => [[['_route' => 'admin_mod_forms_config', '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::configAction'], ['id'], null, null, false, true, null]],
        5258 => [[['_route' => 'admin_mod_forms_delete', 'id' => null, '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::deleteAction'], ['id'], null, null, false, true, null]],
        5326 => [[['_route' => 'mod_blog_category_ajax', 'uri' => '', 'catid' => 0, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\BlogController::getCategory'], ['id', 'uri', 'catid'], null, null, false, true, null]],
        5377 => [[['_route' => 'mod_pagination_ajax', 'id' => null, 'page' => '', 'show_amount' => '', '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\BlogController::paginationAction'], ['id', 'show_amount', 'page'], null, null, false, true, null]],
        5428 => [[['_route' => 'mod_like_dislike_ajax', 'id' => null, 'entryid' => null, 'action' => '', '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\BlogController::likeAction'], ['id', 'entryid', 'action'], null, null, false, true, null]],
        5471 => [[['_route' => 'doc', 'path' => null, 'file' => null, '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::doc'], ['path', 'file'], null, null, false, true, null]],
        5532 => [[['_route' => 'secure', 'dir1' => null, 'dir2' => null, 'file' => null, '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::secureAction'], ['dir1', 'dir2', 'file'], null, null, false, true, null]],
        5570 => [[['_route' => 'spotlight_search', 'q' => '', '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::spotlightSearch'], ['q'], null, null, false, true, null]],
        5592 => [[['_route' => 'sample_sitemaps_sitemap', '_controller' => 'App\\CmsBundle\\Controller\\SitemapController::sitemapAction'], ['_format'], null, null, false, true, null]],
        5678 => [[['_route' => 'pages_wachtwoord_vergeten', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 7, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        5754 => [[['_route' => 'pages_registreren', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 8, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        5853 => [[['_route' => 'pages_projecten_project_aanmelden', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 21, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        5932 => [[['_route' => 'pages_projecten_alle_projecten', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 22, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        5997 => [[['_route' => 'pages_projecten', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 13, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6018 => [[['_route' => 'mod_neutral_projects_filter_ajax', '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\NeutralController::getProjects'], [], null, null, true, false, null]],
        6120 => [[['_route' => 'pages_over_ons_waarom_neutral_eco', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 17, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6188 => [[['_route' => 'pages_over_ons_team', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 19, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6264 => [[['_route' => 'pages_over_ons_ons_verhaal', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 16, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6334 => [[['_route' => 'pages_over_ons_nieuws', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 18, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6405 => [[['_route' => 'pages_over_ons_contact', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 20, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6470 => [[['_route' => 'pages_over_ons', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 15, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6565 => [[['_route' => 'pages_mijn_account_uitloggen', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 6, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6641 => [[['_route' => 'pages_mijn_account_projecten', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 11, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6709 => [[['_route' => 'pages_mijn_account_profiel', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 10, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6775 => [[['_route' => 'pages_mijn_account', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 4, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6792 => [[['_route' => 'mod_my_account_profile', '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\NeutralController::showAction'], [], null, null, false, false, null]],
        6901 => [[['_route' => 'pages_carbon_tracking_veelgestelde_vragen', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 23, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6985 => [[['_route' => 'pages_carbon_tracking_neutrale_blockchain', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 25, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        7057 => [[['_route' => 'pages_carbon_tracking_methoden', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 24, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        7122 => [[['_route' => 'pages_carbon_tracking', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 14, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        7192 => [[['_route' => 'pages_home', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 1, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        7246 => [[['_route' => 'admin_mod_neutral_project_comments', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::ajaxProjectComments'], ['id'], null, null, false, false, null]],
        7267 => [[['_route' => 'neutral_project_buyincredits', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::ajaxProjectBuyInCredits'], ['id'], null, null, true, false, null]],
        7302 => [[['_route' => 'admin_mod_neutral_project_transactions', 'id' => null, 'page' => 1, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::ajaxProjectTransactions'], ['id', 'page'], null, null, false, true, null]],
        7345 => [[['_route' => 'mod_neutral_project_add_buyincredits', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::projectBuyInCredits'], ['id'], null, null, true, false, null]],
        7392 => [[['_route' => 'trinity_mod_neutral_upload', 'projectId' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::uploadAction'], ['projectId'], null, null, false, true, null]],
        7426 => [
            [['_route' => 'mod_forms_ajax', 'id' => null, '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::ajaxShowAction'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
