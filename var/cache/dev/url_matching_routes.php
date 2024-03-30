<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
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
                .'|/_(?'
                    .'|wdt/([^/]++)(*:24)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:69)'
                            .'|router(*:82)'
                            .'|exception(?'
                                .'|(*:101)'
                                .'|\\.css(*:114)'
                            .')'
                        .')'
                        .'|(*:124)'
                    .')'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:159)'
                .')'
                .'|/a(?'
                    .'|dmin/(?'
                        .'|api/(?'
                            .'|([^/]++)/(?'
                                .'|token/delete(*:212)'
                                .'|generate(*:228)'
                                .'|view(*:240)'
                            .')'
                            .'|edit(?:/([^/]++))?(*:267)'
                        .')'
                        .'|c(?'
                            .'|alendar(?'
                                .'|/(?'
                                    .'|event(?:/([^/]++))?(*:313)'
                                    .'|delete(?:/([^/]++))?(*:341)'
                                .')'
                                .'|(?:/([^/]++))?(*:364)'
                            .')'
                            .'|ommandcontrol(?'
                                .'|(?:/([^/]++))?(*:403)'
                                .'|/(?'
                                    .'|installed/([^/]++)(*:433)'
                                    .'|dns/([^/]++)(*:453)'
                                    .'|warnings/([^/]++)(*:478)'
                                    .'|bu(?'
                                        .'|lkupdate(*:499)'
                                        .'|ndles/([^/]++)(*:521)'
                                    .')'
                                    .'|update/([^/]++)(*:545)'
                                    .'|view/([^/]++)(*:566)'
                                    .'|refresh/([^/]++)(*:590)'
                                    .'|ping/([^/]++)(*:611)'
                                .')'
                            .')'
                            .'|ron/(?'
                                .'|edit(?:/([^/]++))?(*:646)'
                                .'|delete(?'
                                    .'|(?:/([^/]++))?(*:677)'
                                    .'|afterrun(?:/([^/]++))?(*:707)'
                                .')'
                                .'|s(?'
                                    .'|inglerun(?:/([^/]++))?(*:742)'
                                    .'|tatus(?:/([^/]++))?(*:769)'
                                .')'
                            .')'
                        .')'
                        .'|blo(?'
                            .'|ck(?:/([^/]++)(?:/([^/]++))?)?(*:816)'
                            .'|g/(?'
                                .'|e(?'
                                    .'|dit(?:/([^/]++))?(*:850)'
                                    .'|ntry(?'
                                        .'|/(?'
                                            .'|filter/(\\d+)(?:/(\\d+))?(*:892)'
                                            .'|replies(?'
                                                .'|/(?'
                                                    .'|delete(?:/([^/]++))?(*:934)'
                                                    .'|edit(?:/([^/]++))?(*:960)'
                                                .')'
                                                .'|(?:/([^/]++)(?:/([^/]++))?)?(*:997)'
                                            .')'
                                            .'|add/category(?'
                                                .'|(?:/([^/]++)(?:/([^/]++))?)?(*:1049)'
                                                .'|/([^/]++)/([^/]++)/delete(*:1083)'
                                            .')'
                                            .'|clone(?:/(\\d+))?(*:1109)'
                                            .'|edit(?:/([^/]++)(?:/([^/]++))?)?(*:1150)'
                                            .'|delete(?'
                                                .'|media(?:/(\\d+)(?:/(\\d+))?)?(*:1195)'
                                                .'|(?:/([^/]++))?(*:1218)'
                                            .')'
                                            .'|import(?:/([^/]++))?(*:1248)'
                                        .')'
                                        .'|(?:/([^/]++)(?:/([^/]++))?)?(*:1286)'
                                    .')'
                                .')'
                                .'|delete(?:/([^/]++))?(*:1317)'
                                .'|a(?'
                                    .'|pproval(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:1379)'
                                    .'|jax/openai(?:/([^/]++)(?:/([^/]++))?)?(*:1426)'
                                .')'
                            .')'
                        .')'
                        .'|s(?'
                            .'|witchlanguage(?:/([^/]++)(?:/([^/]++))?)?(*:1483)'
                            .'|ettings/(?'
                                .'|multisite/(?'
                                    .'|delete(?:/([^/]++))?(*:1536)'
                                    .'|edit(?:/([^/]++))?(*:1563)'
                                .')'
                                .'|templates/email(?:/([^/]++))?(*:1602)'
                                .'|languages/(?'
                                    .'|d(?'
                                        .'|elete(?:/([^/]++))?(*:1647)'
                                        .'|l/([^/]++)(?:/([^/]++))?(*:1680)'
                                    .')'
                                    .'|view/([^/]++)(*:1703)'
                                    .'|edit(?:/([^/]++))?(*:1730)'
                                .')'
                            .')'
                            .'|lider/(?'
                                .'|e(?'
                                    .'|ntry(?'
                                        .'|(?:/([^/]++))?(*:1775)'
                                        .'|/(?'
                                            .'|add(?:/([^/]++))?(*:1805)'
                                            .'|media/(?'
                                                .'|([^/]++)/add(?:/([^/]++))?(*:1849)'
                                                .'|popup(?:/([^/]++))?(*:1877)'
                                            .')'
                                            .'|edit(?'
                                                .'|/delimage(?:/([^/]++))?(*:1917)'
                                                .'|(?:/([^/]++))?(*:1940)'
                                            .')'
                                            .'|delete(?:/([^/]++))?(*:1970)'
                                            .'|replaceImage(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:2033)'
                                            .'|toggle(?:/([^/]++))?(*:2062)'
                                            .'|position(?:/([^/]++)(?:/([^/]++))?)?(*:2107)'
                                            .'|sorting/([^/]++)(*:2132)'
                                            .'|config/edit(?:/([^/]++))?(*:2166)'
                                        .')'
                                    .')'
                                    .'|dit(?'
                                        .'|/([^/]++)/add(*:2196)'
                                        .'|(?:/([^/]++))?(*:2219)'
                                    .')'
                                .')'
                                .'|delete(?:/([^/]++))?(*:2250)'
                            .')'
                        .')'
                        .'|doc(?'
                            .'|/download(?:/([^/]++))?(*:2290)'
                            .'|(?:/([^/]++))?(*:2313)'
                            .'|/loader(?:/([^/]++))?(*:2343)'
                        .')'
                        .'|in(?'
                            .'|tegrations/test(?:/([^/]++))?(*:2387)'
                            .'|stall(?'
                                .'|(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:2446)'
                                .'|/activate(?:/([^/]++))?(*:2478)'
                            .')'
                        .')'
                        .'|json(?:/([^/]++)(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?)?(*:2549)'
                        .'|m(?'
                            .'|ail/(?'
                                .'|templates/edit(?:/([^/]++))?(*:2597)'
                                .'|edit(?:/([^/]++))?(*:2624)'
                                .'|history(?'
                                    .'|(?:/([^/]++))?(*:2657)'
                                    .'|/view(?:/([^/]++))?(*:2685)'
                                .')'
                                .'|preview/(?'
                                    .'|([^/]++)(*:2714)'
                                    .'|include/([^/]++)(*:2739)'
                                .')'
                            .')'
                            .'|e(?'
                                .'|dia(?'
                                    .'|/(?'
                                        .'|folder(?:/([^/]++))?(*:2784)'
                                        .'|a(?'
                                            .'|lter(?:/([^/]++))?(*:2815)'
                                            .'|dd/folder(?:/([^/]++))?(*:2847)'
                                        .')'
                                        .'|compress(?:/([^/]++))?(*:2879)'
                                        .'|edit(?:/([^/]++))?(*:2906)'
                                        .'|restore(?:/([^/]++))?(*:2936)'
                                        .'|history(?:/([^/]++))?(*:2966)'
                                        .'|d(?'
                                            .'|l(?:/([^/]++))?(*:2994)'
                                            .'|elete(?:/([^/]++))?(*:3022)'
                                        .')'
                                        .'|webp(?:/([^/]++))?(*:3050)'
                                        .'|view(?:/([^/]++))?(*:3077)'
                                        .'|move(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:3132)'
                                        .'|popup(?:/([^/]++))?(*:3160)'
                                    .')'
                                    .'|(?:/([^/]++)(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?)?(*:3226)'
                                    .'|dir/delete(?:/([^/]++))?(*:3259)'
                                .')'
                                .'|tadata/(?'
                                    .'|edit(?:/([^/]++))?(*:3297)'
                                    .'|delete(?:/([^/]++))?(*:3326)'
                                .')'
                            .')'
                        .')'
                        .'|n(?'
                            .'|avigation/(?'
                                .'|edit(?:/([^/]++))?(*:3373)'
                                .'|delete(?:/([^/]++))?(*:3402)'
                            .')'
                            .'|eutral/(?'
                                .'|pro(?'
                                    .'|ject(?'
                                        .'|s(?'
                                            .'|(?:/([^/]++))?(*:3453)'
                                            .'|/filter(?:/([^/]++))?(*:3483)'
                                        .')'
                                        .'|/([^/]++)/(?'
                                            .'|transactions(*:3518)'
                                            .'|buyincredits(*:3539)'
                                        .')'
                                        .'|(?:/([^/]++))?(*:3563)'
                                        .'|/(?'
                                            .'|([^/]++)/add/comment(*:3596)'
                                            .'|wijzigen(?:/([^/]++))?(*:3627)'
                                            .'|verwijderen(?:/([^/]++))?(*:3661)'
                                            .'|([^/]++)/transaction/add(*:3694)'
                                            .'|wijzigen/success(?:/([^/]++))?(*:3733)'
                                            .'|approve(?:/([^/]++))?(*:3763)'
                                            .'|decline(?:/([^/]++))?(*:3793)'
                                            .'|file/download(?:/([^/]++))?(*:3829)'
                                        .')'
                                    .')'
                                    .'|file/(?'
                                        .'|dark(?:/([^/]++))?(*:3866)'
                                        .'|qr(?:/([^/]++)(?:/([^/]++))?)?(*:3905)'
                                    .')'
                                .')'
                                .'|users/(?'
                                    .'|filter(?:/(\\d+))?(*:3942)'
                                    .'|delete(?'
                                        .'|ip(?:/([^/]++))?(*:3976)'
                                        .'|(?:/([^/]++))?(*:3999)'
                                    .')'
                                    .'|blockip(?:/([^/]++))?(*:4030)'
                                    .'|edit(?'
                                        .'|/validate(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:4097)'
                                        .'|(?:/([^/]++))?(*:4120)'
                                    .')'
                                    .'|allow(?:/([^/]++))?(*:4149)'
                                .')'
                            .')'
                        .')'
                        .'|p(?'
                            .'|a(?'
                                .'|ge/(?'
                                    .'|s(?'
                                        .'|core/([^/]++)(*:4192)'
                                        .'|elector(?:/([^/]++))?(*:4222)'
                                        .'|avetemplate(?:/([^/]++))?(*:4256)'
                                    .')'
                                    .'|media/(?'
                                        .'|([^/]++)(*:4283)'
                                        .'|download/([^/]++)(*:4309)'
                                    .')'
                                    .'|b(?'
                                        .'|undles(?:/([^/]++))?(*:4343)'
                                        .'|lock\\-preview/([^/]++)(*:4374)'
                                    .')'
                                    .'|d(?'
                                        .'|ownload/([^/]++)(*:4404)'
                                        .'|elete(?:/([^/]++))?(*:4432)'
                                    .')'
                                    .'|c(?'
                                        .'|o(?'
                                            .'|mposer/uploadhandler(?:/([^/]++))?(*:4484)'
                                            .'|py(?:/([^/]++))?(*:4509)'
                                        .')'
                                        .'|lone(?:/([^/]++))?(*:4537)'
                                    .')'
                                    .'|icon/([^/]++)(?:/([^/]++))?(*:4574)'
                                    .'|edit(?:/([^/]++))?(*:4601)'
                                    .'|request_critical/([^/]++)(*:4635)'
                                    .'|permissions(?:/([^/]++))?(*:4669)'
                                    .'|link(?:/([^/]++))?(*:4696)'
                                    .'|ajax/pageid/([^/]++)(*:4725)'
                                .')'
                                .'|y/([^/]++)(*:4745)'
                            .')'
                            .'|rofile/(?'
                                .'|dark(?:/([^/]++))?(*:4783)'
                                .'|qr(?:/([^/]++)(?:/([^/]++))?)?(*:4822)'
                            .')'
                        .')'
                        .'|log(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:4878)'
                        .'|tag(?:/([^/]++))?(*:4904)'
                        .'|users/(?'
                            .'|filter(?:/(\\d+))?(*:4939)'
                            .'|delete(?'
                                .'|ip(?:/([^/]++))?(*:4973)'
                                .'|(?:/([^/]++))?(*:4996)'
                            .')'
                            .'|blockip(?:/([^/]++))?(*:5027)'
                            .'|edit(?'
                                .'|/validate(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:5094)'
                                .'|(?:/([^/]++))?(*:5117)'
                            .')'
                            .'|allow(?:/([^/]++))?(*:5146)'
                        .')'
                        .'|forms/(?'
                            .'|answers(?'
                                .'|/(?'
                                    .'|filter/(\\d+)(?:/(\\d+))?(*:5202)'
                                    .'|delete(?:/([^/]++))?(*:5231)'
                                    .'|([^/]++)/export(*:5255)'
                                .')'
                                .'|(?:/([^/]++)(?:/([^/]++))?)?(*:5293)'
                            .')'
                            .'|edit(?'
                                .'|/addelement(?:/([^/]++)(?:/([^/]++))?)?(*:5349)'
                                .'|(?:/([^/]++))?(*:5372)'
                            .')'
                            .'|config/([^/]++)(*:5397)'
                            .'|delete(?:/([^/]++))?(*:5426)'
                        .')'
                    .')'
                    .'|jax/blog(?'
                        .'|/category/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?(*:5494)'
                        .'|(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:5545)'
                        .'|/([^/]++)/like(?:/([^/]++)(?:/([^/]++))?)?(*:5596)'
                    .')'
                .')'
                .'|/doc(?:/([^/]++)(?:/([^/]++))?)?(*:5639)'
                .'|/s(?'
                    .'|ecure(?:/([^/]++)(?:/([^/]++)(?:/([^/]++))?)?)?(*:5700)'
                    .'|potlight/search(?:/([^/]++))?(*:5738)'
                    .'|itemap\\.(xml)(*:5760)'
                .')'
                .'|/wachtwoord\\-vergeten(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:5846)'
                .'|/registreren(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:5922)'
                .'|/projecten(?'
                    .'|/(?'
                        .'|project\\-aanmelden(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6021)'
                        .'|alle\\-projecten(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6100)'
                    .')'
                    .'|(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6165)'
                    .'|/filter/ajax(*:6186)'
                .')'
                .'|/over\\-ons(?'
                    .'|/(?'
                        .'|waarom\\-neutral\\-eco(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6288)'
                        .'|team(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6356)'
                        .'|ons\\-verhaal(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6432)'
                        .'|nieuws(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6502)'
                        .'|contact(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6573)'
                    .')'
                    .'|(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6638)'
                .')'
                .'|/mijn\\-account(?'
                    .'|/(?'
                        .'|uitloggen(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6733)'
                        .'|pro(?'
                            .'|jecten(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6809)'
                            .'|fiel(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6877)'
                        .')'
                    .')'
                    .'|(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:6943)'
                    .'|/profiel(*:6960)'
                .')'
                .'|/carbon\\-tracking(?'
                    .'|/(?'
                        .'|veelgestelde\\-vragen(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:7069)'
                        .'|neutrale\\-blockchain(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:7153)'
                        .'|methoden(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:7225)'
                    .')'
                    .'|(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:7290)'
                .')'
                .'|/home(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?)(?:/(.*?))?)?)?)?)?(*:7360)'
                .'|/neutral/(?'
                    .'|ajax/project/([^/]++)/(?'
                        .'|comments(*:7414)'
                        .'|buyincredits(*:7435)'
                        .'|transactions(?:/([^/]++))?(*:7470)'
                    .')'
                    .'|project/([^/]++)/add/buyincredits(*:7513)'
                .')'
                .'|/trinity/neutral/upload(?:/([^/]++))?(*:7560)'
                .'|/forms/ajax(?:/([^/]++))?(*:7594)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        24 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        69 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        82 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        101 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        114 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        124 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        159 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        212 => [[['_route' => 'admin_mod_api_delete_token', '_controller' => 'App\\Trinity\\ApiBundle\\Controller\\AdminController::deleteTokenAction'], ['id'], null, null, false, false, null]],
        228 => [[['_route' => 'admin_mod_api_generate', '_controller' => 'App\\Trinity\\ApiBundle\\Controller\\AdminController::generateAction'], ['id'], null, null, false, false, null]],
        240 => [[['_route' => 'admin_mod_api_view', '_controller' => 'App\\Trinity\\ApiBundle\\Controller\\AdminController::viewAction'], ['id'], null, null, false, false, null]],
        267 => [[['_route' => 'admin_mod_api_edit', 'id' => null, '_controller' => 'App\\Trinity\\ApiBundle\\Controller\\AdminController::clientEditAction'], ['id'], null, null, false, true, null]],
        313 => [[['_route' => 'admin_calendar_event', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\CalendarController::eventAction'], ['id'], null, null, false, true, null]],
        341 => [[['_route' => 'admin_calendar_delete', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\CalendarController::deleteEventAction'], ['id'], null, null, false, true, null]],
        364 => [[['_route' => 'admin_calendar', 'type' => null, '_controller' => 'App\\CmsBundle\\Controller\\CalendarController::indexAction'], ['type'], null, null, false, true, null]],
        403 => [[['_route' => 'admin_cc', 'branch' => null, '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::indexAction'], ['branch'], null, null, false, true, null]],
        433 => [[['_route' => 'admin_cc_installed', '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::installedAction'], ['bundle'], null, null, false, true, null]],
        453 => [[['_route' => 'admin_cc_dns', '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::dnsAction'], ['domain'], null, null, false, true, null]],
        478 => [[['_route' => 'admin_cc_warnings', '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::warningsAction'], ['domain'], null, null, false, true, null]],
        499 => [[['_route' => 'admin_cc_bulkupdate', '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::bulkupdateAction'], [], null, null, false, false, null]],
        521 => [[['_route' => 'admin_cc_bundles', '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::bundlesAction'], ['domain'], null, null, false, true, null]],
        545 => [[['_route' => 'admin_cc_update', '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::updateAction'], ['domain'], null, null, false, true, null]],
        566 => [[['_route' => 'admin_cc_view', '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::viewAction'], ['domain'], null, null, false, true, null]],
        590 => [[['_route' => 'admin_cc_refresh', '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::refreshAction'], ['domain'], null, null, false, true, null]],
        611 => [[['_route' => 'admin_cc_ping', '_controller' => 'App\\CmsBundle\\Controller\\CommandcontrolController::pingAction'], ['domain'], null, null, false, true, null]],
        646 => [[['_route' => 'admin_cron_edit', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\CronTaskController::editAction'], ['id'], null, null, false, true, null]],
        677 => [[['_route' => 'admin_cron_delete', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\CronTaskController::deleteAction'], ['id'], null, null, false, true, null]],
        707 => [[['_route' => 'admin_cron_delete_after_run', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\CronTaskController::deleteafterrunAction'], ['id'], null, null, false, true, null]],
        742 => [[['_route' => 'admin_cron_singlerun', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\CronTaskController::singlerunAction'], ['id'], null, null, false, true, null]],
        769 => [[['_route' => 'admin_cron_status', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\CronTaskController::statusAction'], ['id'], null, null, false, true, null]],
        816 => [[['_route' => 'admin_block', 'bundle' => '', 'index' => 0, '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::blockAction'], ['bundle', 'index'], null, null, false, true, null]],
        850 => [[['_route' => 'admin_mod_blog_edit', 'id' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\BlogController::editAction'], ['id'], null, null, false, true, null]],
        892 => [[['_route' => 'admin_mod_blog_entry_filter', 'page' => 1, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::filterAction'], ['blogid', 'page'], null, null, false, true, null]],
        934 => [[['_route' => 'admin_mod_blog_entry_replies_delete', 'id' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::deleteReplyAction'], ['id'], null, null, false, true, null]],
        960 => [[['_route' => 'admin_mod_blog_entry_replies_edit', 'id' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::editReplyAction'], ['id'], null, null, false, true, null]],
        997 => [[['_route' => 'admin_mod_blog_entry_replies', 'id' => null, 'page' => 1, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::repliesAction'], ['id', 'page'], null, null, false, true, null]],
        1049 => [[['_route' => 'admin_mod_blog_category_add', 'id' => null, 'catid' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::addcategoryAction'], ['id', 'catid'], null, null, false, true, null]],
        1083 => [[['_route' => 'admin_mod_blog_category_delete', '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::deleteCategoryAction'], ['id', 'catid'], null, null, false, false, null]],
        1109 => [[['_route' => 'admin_mod_blog_entry_clone', 'id' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::cloneAction'], ['id'], null, null, false, true, null]],
        1150 => [[['_route' => 'admin_mod_blog_entry_edit', 'id' => null, 'blog' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::editAction'], ['id', 'blog'], null, null, false, true, null]],
        1195 => [[['_route' => 'admin_mod_blog_entry_media_delete', 'id' => null, 'mediaid' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::deleteMediaAction'], ['id', 'mediaid'], null, null, false, true, null]],
        1218 => [[['_route' => 'admin_mod_blog_entry_delete', 'id' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::deleteAction'], ['id'], null, null, false, true, null]],
        1248 => [[['_route' => 'admin_mod_blog_entry_import', 'blog' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::importAction'], ['blog'], null, null, false, true, null]],
        1286 => [[['_route' => 'admin_mod_blog_entry', 'id' => null, 'page' => 1, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::indexAction'], ['id', 'page'], null, null, false, true, null]],
        1317 => [[['_route' => 'admin_mod_blog_delete', 'id' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\BlogController::deleteAction'], ['id'], null, null, false, true, null]],
        1379 => [[['_route' => 'admin_mod_blog_approval', 'blog' => null, 'id' => null, 'status' => null, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::approvalAction'], ['blog', 'id', 'status'], null, null, false, true, null]],
        1426 => [[['_route' => 'admin_mod_blog_ajax_openai', 'id' => null, 'type' => 'content', '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\EntryController::openAIAction'], ['id', 'type'], null, null, false, true, null]],
        1483 => [[['_route' => 'admin_switch_language', 'locale' => 'nl', 'msite' => 0, '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::languageSwitchAction'], ['locale', 'msite'], null, null, false, true, null]],
        1536 => [[['_route' => 'admin_multisite_delete', 'id' => '', '_controller' => 'App\\CmsBundle\\Controller\\MultisiteController::deleteAction'], ['id'], null, null, false, true, null]],
        1563 => [[['_route' => 'admin_multisite_edit', 'id' => 0, '_controller' => 'App\\CmsBundle\\Controller\\MultisiteController::editAction'], ['id'], null, null, false, true, null]],
        1602 => [[['_route' => 'admin_templates_email', 'template' => '', '_controller' => 'App\\CmsBundle\\Controller\\SettingsController::templatesEmailAction'], ['template'], null, null, false, true, null]],
        1647 => [[['_route' => 'admin_settings_languages_delete', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\SettingsController::deleteLanguageAction'], ['id'], null, null, false, true, null]],
        1680 => [[['_route' => 'admin_settings_languages_dl', 'group' => null, '_controller' => 'App\\CmsBundle\\Controller\\SettingsController::dlLanguageAction'], ['id', 'group'], null, null, false, true, null]],
        1703 => [[['_route' => 'admin_settings_languages_view', '_controller' => 'App\\CmsBundle\\Controller\\SettingsController::viewLanguageAction'], ['id'], null, null, false, true, null]],
        1730 => [[['_route' => 'admin_settings_languages_edit', 'id' => 0, '_controller' => 'App\\CmsBundle\\Controller\\SettingsController::editLanguageAction'], ['id'], null, null, false, true, null]],
        1775 => [[['_route' => 'admin_mod_slider_entry', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::indexAction'], ['id'], null, null, false, true, null]],
        1805 => [[['_route' => 'admin_mod_slider_entry_add', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::addAction'], ['id'], null, null, false, true, null]],
        1849 => [[['_route' => 'admin_mod_slider_entry_media_add', 'sliderid' => null, 'mediaid' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::addMediaToSlider'], ['sliderid', 'mediaid'], null, null, false, true, null]],
        1877 => [[['_route' => 'admin_slider_entry_media_popup', 'parentid' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::popupAction'], ['parentid'], null, null, false, true, null]],
        1917 => [[['_route' => 'admin_mod_slider_entry_edit_delimage', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::delimageAction'], ['id'], null, null, false, true, null]],
        1940 => [[['_route' => 'admin_mod_slider_entry_edit', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::editAction'], ['id'], null, null, false, true, null]],
        1970 => [[['_route' => 'admin_mod_slider_entry_delete', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::deleteAction'], ['id'], null, null, false, true, null]],
        2033 => [[['_route' => 'admin_mod_slider_entry_edit_replace_image', 'entryid' => null, 'mediaid' => null, 'device' => 'desktop', '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::replaceImageAction'], ['entryid', 'mediaid', 'device'], null, null, false, true, null]],
        2062 => [[['_route' => 'admin_mod_slider_entry_toggle', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::toggleEnabledAction'], ['id'], null, null, false, true, null]],
        2107 => [[['_route' => 'admin_mod_slider_entry_position', 'direction' => '', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::changePositionEntry'], ['id', 'direction'], null, null, false, true, null]],
        2132 => [[['_route' => 'admin_slider_entry_sorting', '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::sortingAction'], ['sliderid'], null, null, false, true, null]],
        2166 => [[['_route' => 'admin_slider_entry_edit_config', 'entryid' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\EntryController::configEditAction'], ['entryid'], null, null, false, true, null]],
        2196 => [[['_route' => 'admin_mod_slider_edit_add', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\SliderController::addSlideAction'], ['id'], null, null, false, false, null]],
        2219 => [[['_route' => 'admin_mod_slider_edit', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\SliderController::editAction'], ['id'], null, null, false, true, null]],
        2250 => [[['_route' => 'admin_mod_slider_delete', 'id' => null, '_controller' => 'App\\Trinity\\SliderBundle\\Controller\\SliderController::deleteAction'], ['id'], null, null, false, true, null]],
        2290 => [[['_route' => 'admin_doc_download', 'bundle' => null, '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::docDownloadAction'], ['bundle'], null, null, false, true, null]],
        2313 => [[['_route' => 'admin_doc', 'viewbundle' => null, '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::docAction'], ['viewbundle'], null, null, false, true, null]],
        2343 => [[['_route' => 'admin_doc_loader', 'key' => null, '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::docLoaderAction'], ['key'], null, null, false, true, null]],
        2387 => [[['_route' => 'admin_integrations_test', 'provider' => null, '_controller' => 'App\\CmsBundle\\Controller\\IntegrationsController::testAction'], ['provider'], null, null, false, true, null]],
        2446 => [[['_route' => 'admin_install', 'bundle' => null, 'version' => null, 'update' => 0, '_controller' => 'App\\CmsBundle\\Controller\\UpdateController::installAction'], ['bundle', 'version', 'update'], null, null, false, true, null]],
        2478 => [[['_route' => 'admin_install_activate', 'package' => '', '_controller' => 'App\\CmsBundle\\Controller\\UpdateController::activateAction'], ['package'], null, null, false, true, null]],
        2549 => [[['_route' => '_adminjson', 'caller' => null, 'param1' => null, 'param2' => null, 'param3' => null, '_controller' => 'App\\CmsBundle\\Controller\\JsonController::ajaxAction'], ['caller', 'param1', 'param2', 'param3'], null, null, false, true, null]],
        2597 => [[['_route' => 'admin_mail_templates_edit', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MailController::templatesEditAction'], ['id'], null, null, false, true, null]],
        2624 => [[['_route' => 'admin_mail_edit', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MailController::editAction'], ['id'], null, null, false, true, null]],
        2657 => [[['_route' => 'admin_mail_history', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MailController::historyAction'], ['id'], null, null, false, true, null]],
        2685 => [[['_route' => 'admin_mail_history_view', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MailController::historyViewAction'], ['id'], null, null, false, true, null]],
        2714 => [[['_route' => 'admin_mail_preview', '_controller' => 'App\\CmsBundle\\Controller\\MailController::previewAction'], ['id'], null, null, false, true, null]],
        2739 => [[['_route' => 'admin_mail_preview_include', '_controller' => 'App\\CmsBundle\\Controller\\MailController::previewIncludeAction'], ['id'], null, null, false, true, null]],
        2784 => [[['_route' => 'admin_media_folder', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::folderAction'], ['id'], null, null, false, true, null]],
        2815 => [[['_route' => 'admin_media_alter', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::alterAction'], ['id'], null, null, false, true, null]],
        2847 => [[['_route' => 'admin_media_addfolder', 'parentid' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::addfolderAction'], ['parentid'], null, null, false, true, null]],
        2879 => [[['_route' => 'admin_media_compress', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::compressAction'], ['id'], null, null, false, true, null]],
        2906 => [[['_route' => 'admin_media_edit', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::editAction'], ['id'], null, null, false, true, null]],
        2936 => [[['_route' => 'admin_media_restore', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::restoreAction'], ['id'], null, null, false, true, null]],
        2966 => [[['_route' => 'admin_media_history', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::historyAction'], ['id'], null, null, false, true, null]],
        2994 => [[['_route' => 'admin_media_download', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::downloadAction'], ['id'], null, null, false, true, null]],
        3022 => [[['_route' => 'admin_media_delete', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::deleteAction'], ['id'], null, null, false, true, null]],
        3050 => [[['_route' => 'admin_media_webp', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::webpAction'], ['id'], null, null, false, true, null]],
        3077 => [[['_route' => 'admin_media_view', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::viewAction'], ['id'], null, null, false, true, null]],
        3132 => [[['_route' => 'admin_media_move', 'source' => null, 'destination' => null, 'type' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::moveAction'], ['source', 'destination', 'type'], null, null, false, true, null]],
        3160 => [[['_route' => 'admin_media_popup', 'parentid' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::popupAction'], ['parentid'], null, null, false, true, null]],
        3226 => [[['_route' => 'admin_media', 'parentid' => 0, 'type' => null, 'inline' => false, 'composer' => false, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::indexAction'], ['parentid', 'type', 'inline', 'composer'], null, null, false, true, null]],
        3259 => [[['_route' => 'admin_mediadir_delete', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MediaController::deleteMediaDirAction'], ['id'], null, null, false, true, null]],
        3297 => [[['_route' => 'admin_metadata_edit', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MetadataController::editAction'], ['id'], null, null, false, true, null]],
        3326 => [[['_route' => 'admin_metadata_delete', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\MetadataController::deleteAction'], ['id'], null, null, false, true, null]],
        3373 => [[['_route' => 'admin_navigation_edit', 'id' => 0, '_controller' => 'App\\CmsBundle\\Controller\\NavigationController::editAction'], ['id'], null, null, false, true, null]],
        3402 => [[['_route' => 'admin_navigation_delete', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\NavigationController::deleteAction'], ['id'], null, null, false, true, null]],
        3453 => [[['_route' => 'admin_mod_neutral_projects', 'page' => 1, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::projects'], ['page'], null, null, false, true, null]],
        3483 => [[['_route' => 'admin_mod_neutral_projects_filter', 'page' => 1, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::projectsFilter'], ['page'], null, null, false, true, null]],
        3518 => [[['_route' => 'admin_mod_neutral_project_transaction', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::transactions'], ['id'], null, null, false, false, null]],
        3539 => [[['_route' => 'admin_mod_neutral_project_buyincredits', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::buyincredits'], ['id'], null, null, false, false, null]],
        3563 => [[['_route' => 'admin_mod_neutral_project', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::project'], ['id'], null, null, false, true, null]],
        3596 => [[['_route' => 'admin_mod_neutral_project_add_comment', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::projectAddComment'], ['id'], null, null, true, false, null]],
        3627 => [[['_route' => 'admin_mod_neutral_project_edit', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::projectEdit'], ['id'], null, null, false, true, null]],
        3661 => [[['_route' => 'admin_mod_neutral_project_delete', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::projectDelete'], ['id'], null, null, false, true, null]],
        3694 => [[['_route' => 'admin_mod_neutral_project_transaction_add', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::addProjectTransaction'], ['id'], null, null, false, false, null]],
        3733 => [[['_route' => 'admin_mod_neutral_project_edit_success', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::projectEditSuccess'], ['id'], null, null, false, true, null]],
        3763 => [[['_route' => 'admin_mod_neutral_project_approve', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::projectApprove'], ['id'], null, null, false, true, null]],
        3793 => [[['_route' => 'admin_mod_neutral_project_decline', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::projectDecline'], ['id'], null, null, false, true, null]],
        3829 => [[['_route' => 'admin_mod_neutral_project_file_download', 'fileid' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::download'], ['fileid'], null, null, false, true, null]],
        3866 => [[['_route' => 'admin_neutral_profile_dark', 'enabled' => 0, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::darkAction'], ['enabled'], null, null, false, true, null]],
        3905 => [[['_route' => 'admin_neutral_profile_qr', 'size' => 6, 'margin' => 2, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::qr'], ['size', 'margin'], null, null, false, true, null]],
        3942 => [[['_route' => 'admin_neutral_users_filter', 'page' => 1, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::filterAction'], ['page'], null, null, false, true, null]],
        3976 => [[['_route' => 'admin_neutral_users_deleteip', 'ip' => 0, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::deleteipAction'], ['ip'], null, null, false, true, null]],
        3999 => [[['_route' => 'admin_neutral_users_delete', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::deleteAction'], ['id'], null, null, false, true, null]],
        4030 => [[['_route' => 'admin_neutral_users_blockip', 'ip' => 0, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::blockipAction'], ['ip'], null, null, false, true, null]],
        4097 => [[['_route' => 'admin_neutral_users_edit_validate', 'type' => '', 'value' => '', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::validateAction'], ['type', 'value', 'id'], null, null, false, true, null]],
        4120 => [[['_route' => 'admin_neutral_users_edit', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::editAction'], ['id'], null, null, false, true, null]],
        4149 => [[['_route' => 'admin_neutral_users_allow', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\UsersController::allowAction'], ['id'], null, null, false, true, null]],
        4192 => [[['_route' => 'admin_page_score', '_controller' => 'App\\CmsBundle\\Controller\\PageController::scoreAction'], ['pageid'], null, null, false, true, null]],
        4222 => [[['_route' => 'admin_page_selector', 'type' => null, '_controller' => 'App\\CmsBundle\\Controller\\PageController::selectorAction'], ['type'], null, null, false, true, null]],
        4256 => [[['_route' => 'admin_page_savetemplate', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\PageController::savetemplateAction'], ['id'], null, null, false, true, null]],
        4283 => [[['_route' => 'admin_page_media', '_controller' => 'App\\CmsBundle\\Controller\\PageController::mediaAction'], ['pageid'], null, null, false, true, null]],
        4309 => [[['_route' => 'admin_page_media_download', '_controller' => 'App\\CmsBundle\\Controller\\PageController::mediadownloadAction'], ['pageid'], null, null, false, true, null]],
        4343 => [[['_route' => 'admin_page_bundles', 'type' => null, '_controller' => 'App\\CmsBundle\\Controller\\PageController::bundlesAction'], ['type'], null, null, false, true, null]],
        4374 => [[['_route' => 'admin_page_block_preview', '_controller' => 'App\\CmsBundle\\Controller\\PageController::blockpreviewAction'], ['id'], null, null, false, true, null]],
        4404 => [[['_route' => 'admin_page_download', '_controller' => 'App\\CmsBundle\\Controller\\PageController::downloadAction'], ['id'], null, null, false, true, null]],
        4432 => [[['_route' => 'admin_page_delete', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\PageController::deleteAction'], ['id'], null, null, false, true, null]],
        4484 => [[['_route' => 'admin_page_composer_uploadhandler', 'pageid' => null, '_controller' => 'App\\CmsBundle\\Controller\\PageController::composerUploadAction'], ['pageid'], null, null, false, true, null]],
        4509 => [[['_route' => 'admin_page_copy', 'locale' => null, '_controller' => 'App\\CmsBundle\\Controller\\PageController::copyAction'], ['locale'], null, null, false, true, null]],
        4537 => [[['_route' => 'admin_page_clone', 'id' => '', '_controller' => 'App\\CmsBundle\\Controller\\PageController::cloneAction'], ['id'], null, null, false, true, null]],
        4574 => [[['_route' => 'admin_page_icon', 'icon_size' => 100, '_controller' => 'App\\CmsBundle\\Controller\\PageController::iconAction'], ['id', 'icon_size'], null, null, false, true, null]],
        4601 => [[['_route' => 'admin_page_edit', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\PageController::editAction'], ['id'], null, null, false, true, null]],
        4635 => [[['_route' => 'admin_page_critical_generate', '_controller' => 'App\\CmsBundle\\Controller\\PageController::requestCriticalAction'], ['pageid'], null, null, false, true, null]],
        4669 => [[['_route' => 'admin_page_permissions', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\PageController::permissionsAction'], ['id'], null, null, false, true, null]],
        4696 => [[['_route' => 'admin_page_link', 'plugin' => null, '_controller' => 'App\\CmsBundle\\Controller\\PageController::linkAction'], ['plugin'], null, null, false, true, null]],
        4725 => [[['_route' => 'admin_page_ajax_pageid', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageGetUrlAction'], ['id'], null, null, false, true, null]],
        4745 => [[['_route' => 'admin_settings_pay', '_controller' => 'App\\CmsBundle\\Controller\\SettingsController::payAction'], ['method'], null, null, false, true, null]],
        4783 => [[['_route' => 'admin_profile_dark', 'enabled' => 0, '_controller' => 'App\\CmsBundle\\Controller\\UsersController::darkAction'], ['enabled'], null, null, false, true, null]],
        4822 => [[['_route' => 'admin_profile_qr', 'size' => 6, 'margin' => 2, '_controller' => 'App\\CmsBundle\\Controller\\UsersController::qr'], ['size', 'margin'], null, null, false, true, null]],
        4878 => [[['_route' => 'admin_log', 'page' => 1, 'filter' => null, 'val' => null, '_controller' => 'App\\CmsBundle\\Controller\\SystemController::logAction'], ['page', 'filter', 'val'], null, null, false, true, null]],
        4904 => [[['_route' => 'admin_tag_view', 'tag' => null, '_controller' => 'App\\CmsBundle\\Controller\\TagController::viewAction'], ['tag'], null, null, false, true, null]],
        4939 => [[['_route' => 'admin_users_filter', 'page' => 1, '_controller' => 'App\\CmsBundle\\Controller\\UsersController::filterAction'], ['page'], null, null, false, true, null]],
        4973 => [[['_route' => 'admin_users_deleteip', 'ip' => 0, '_controller' => 'App\\CmsBundle\\Controller\\UsersController::deleteipAction'], ['ip'], null, null, false, true, null]],
        4996 => [[['_route' => 'admin_users_delete', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\UsersController::deleteAction'], ['id'], null, null, false, true, null]],
        5027 => [[['_route' => 'admin_users_blockip', 'ip' => 0, '_controller' => 'App\\CmsBundle\\Controller\\UsersController::blockipAction'], ['ip'], null, null, false, true, null]],
        5094 => [[['_route' => 'admin_users_edit_validate', 'type' => '', 'value' => '', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\UsersController::validateAction'], ['type', 'value', 'id'], null, null, false, true, null]],
        5117 => [[['_route' => 'admin_users_edit', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\UsersController::editAction'], ['id'], null, null, false, true, null]],
        5146 => [[['_route' => 'admin_users_allow', 'id' => null, '_controller' => 'App\\CmsBundle\\Controller\\UsersController::allowAction'], ['id'], null, null, false, true, null]],
        5202 => [[['_route' => 'admin_mod_forms_answers_filter', 'page' => 1, '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::filterAction'], ['formid', 'page'], null, null, false, true, null]],
        5231 => [[['_route' => 'admin_mod_forms_answers_delete', 'id' => null, '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::deleteAmswerAction'], ['id'], null, null, false, true, null]],
        5255 => [[['_route' => 'admin_mod_forms_answers_export', 'id' => null, '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::export'], ['id'], null, null, false, false, null]],
        5293 => [[['_route' => 'admin_mod_forms_answers', 'id' => null, 'answerid' => null, '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::answersAction'], ['id', 'answerid'], null, null, false, true, null]],
        5349 => [[['_route' => 'admin_mod_forms_addrow', 'id' => null, 'type' => null, '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::addelementAction'], ['id', 'type'], null, null, false, true, null]],
        5372 => [[['_route' => 'admin_mod_forms_edit', 'id' => null, '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::editAction'], ['id'], null, null, false, true, null]],
        5397 => [[['_route' => 'admin_mod_forms_config', '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::configAction'], ['id'], null, null, false, true, null]],
        5426 => [[['_route' => 'admin_mod_forms_delete', 'id' => null, '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::deleteAction'], ['id'], null, null, false, true, null]],
        5494 => [[['_route' => 'mod_blog_category_ajax', 'uri' => '', 'catid' => 0, '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\BlogController::getCategory'], ['id', 'uri', 'catid'], null, null, false, true, null]],
        5545 => [[['_route' => 'mod_pagination_ajax', 'id' => null, 'page' => '', 'show_amount' => '', '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\BlogController::paginationAction'], ['id', 'show_amount', 'page'], null, null, false, true, null]],
        5596 => [[['_route' => 'mod_like_dislike_ajax', 'id' => null, 'entryid' => null, 'action' => '', '_controller' => 'App\\Trinity\\BlogBundle\\Controller\\BlogController::likeAction'], ['id', 'entryid', 'action'], null, null, false, true, null]],
        5639 => [[['_route' => 'doc', 'path' => null, 'file' => null, '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::doc'], ['path', 'file'], null, null, false, true, null]],
        5700 => [[['_route' => 'secure', 'dir1' => null, 'dir2' => null, 'file' => null, '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::secureAction'], ['dir1', 'dir2', 'file'], null, null, false, true, null]],
        5738 => [[['_route' => 'spotlight_search', 'q' => '', '_controller' => 'App\\CmsBundle\\Controller\\DefaultController::spotlightSearch'], ['q'], null, null, false, true, null]],
        5760 => [[['_route' => 'sample_sitemaps_sitemap', '_controller' => 'App\\CmsBundle\\Controller\\SitemapController::sitemapAction'], ['_format'], null, null, false, true, null]],
        5846 => [[['_route' => 'pages_wachtwoord_vergeten', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 7, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        5922 => [[['_route' => 'pages_registreren', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 8, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6021 => [[['_route' => 'pages_projecten_project_aanmelden', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 21, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6100 => [[['_route' => 'pages_projecten_alle_projecten', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 22, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6165 => [[['_route' => 'pages_projecten', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 13, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6186 => [[['_route' => 'mod_neutral_projects_filter_ajax', '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\NeutralController::getProjects'], [], null, null, true, false, null]],
        6288 => [[['_route' => 'pages_over_ons_waarom_neutral_eco', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 17, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6356 => [[['_route' => 'pages_over_ons_team', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 19, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6432 => [[['_route' => 'pages_over_ons_ons_verhaal', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 16, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6502 => [[['_route' => 'pages_over_ons_nieuws', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 18, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6573 => [[['_route' => 'pages_over_ons_contact', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 20, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6638 => [[['_route' => 'pages_over_ons', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 15, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6733 => [[['_route' => 'pages_mijn_account_uitloggen', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 6, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6809 => [[['_route' => 'pages_mijn_account_projecten', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 11, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6877 => [[['_route' => 'pages_mijn_account_profiel', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 10, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6943 => [[['_route' => 'pages_mijn_account', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 4, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        6960 => [[['_route' => 'mod_my_account_profile', '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\NeutralController::showAction'], [], null, null, false, false, null]],
        7069 => [[['_route' => 'pages_carbon_tracking_veelgestelde_vragen', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 23, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        7153 => [[['_route' => 'pages_carbon_tracking_neutrale_blockchain', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 25, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        7225 => [[['_route' => 'pages_carbon_tracking_methoden', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 24, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        7290 => [[['_route' => 'pages_carbon_tracking', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 14, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        7360 => [[['_route' => 'pages_home', '_controller' => 'App\\CmsBundle\\Controller\\PageController::pageAction', 'pageId' => 1, 'locale' => 'nl', 'param1' => null, 'param2' => null, 'param3' => null, 'param4' => null, 'param5' => null], ['param1', 'param2', 'param3', 'param4', 'param5'], ['POST' => 0, 'GET' => 1], null, false, true, null]],
        7414 => [[['_route' => 'admin_mod_neutral_project_comments', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::ajaxProjectComments'], ['id'], null, null, false, false, null]],
        7435 => [[['_route' => 'neutral_project_buyincredits', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::ajaxProjectBuyInCredits'], ['id'], null, null, true, false, null]],
        7470 => [[['_route' => 'admin_mod_neutral_project_transactions', 'id' => null, 'page' => 1, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::ajaxProjectTransactions'], ['id', 'page'], null, null, false, true, null]],
        7513 => [[['_route' => 'mod_neutral_project_add_buyincredits', 'id' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::projectBuyInCredits'], ['id'], null, null, true, false, null]],
        7560 => [[['_route' => 'trinity_mod_neutral_upload', 'projectId' => null, '_controller' => 'App\\Trinity\\NeutralBundle\\Controller\\ProjectsController::uploadAction'], ['projectId'], null, null, false, true, null]],
        7594 => [
            [['_route' => 'mod_forms_ajax', 'id' => null, '_controller' => 'App\\Trinity\\FormsBundle\\Controller\\FormsController::ajaxShowAction'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
