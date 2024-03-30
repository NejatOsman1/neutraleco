<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @Cms/menu/main.html.twig */
class __TwigTemplate_9c95c50bc628f92731c14eda0b1a445b extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Cms/menu/main.html.twig"));

        // line 2
        echo "
";
        // line 3
        $context["active"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 3, $this->source); })()), "request", [], "any", false, false, false, 3), "attributes", [], "any", false, false, false, 3), "get", [0 => "_route"], "method", false, false, false, 3);
        // line 4
        $context["param"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 4, $this->source); })()), "request", [], "any", false, false, false, 4), "attributes", [], "any", false, false, false, 4), "get", [0 => "_route_params"], "method", false, false, false, 4);
        // line 5
        echo "
";
        // line 15
        echo "
<ul>
  ";
        // line 22
        echo "
  ";
        // line 23
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 23, $this->source); })()), "User", [], "any", false, false, false, 23), "checkPermissions", [0 => "ALLOW_DASHBOARD"], "method", false, false, false, 23) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 23, $this->source); })()), "piwikUrl", [], "any", false, false, false, 23))) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 23, $this->source); })()), "piwikApiHash", [], "any", false, false, false, 23)))) {
            // line 24
            echo "    <li class=\"";
            if (((isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 24, $this->source); })()) == "admin")) {
                echo "active";
            }
            echo "\">
      <a href=\"";
            // line 25
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
            echo "\">
        <i class=\"fa fa-fw fa-chart-line\"></i>";
            // line 26
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Dashboard", [], "cms"), "html", null, true);
            echo "</a>
    </li>
  ";
        }
        // line 29
        echo "
  ";
        // line 30
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 30, $this->source); })()), "User", [], "any", false, false, false, 30), "checkPermissions", [0 => "ALLOW_PAGE"], "method", false, false, false, 30)) {
            // line 31
            echo "    <li class=\"";
            if ((is_string($__internal_compile_0 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 31, $this->source); })())) && is_string($__internal_compile_1 = "admin_page") && ('' === $__internal_compile_1 || 0 === strpos($__internal_compile_0, $__internal_compile_1)))) {
                echo "active";
            }
            echo "\">
      <a href=\"";
            // line 32
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page");
            echo "\"><i class=\"far fa-file-alt\"></i>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina's", [], "cms"), "html", null, true);
            echo "</a>
      ";
            // line 49
            echo "    </li>
  ";
        }
        // line 51
        echo "  ";
        if ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "calendar", [], "any", true, true, false, 51) && (twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 51, $this->source); })()), "calendar", [], "any", false, false, false, 51) == true))) {
            // line 52
            echo "\t<li class=\"";
            if ((is_string($__internal_compile_2 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 52, $this->source); })())) && is_string($__internal_compile_3 = "admin_calendar") && ('' === $__internal_compile_3 || 0 === strpos($__internal_compile_2, $__internal_compile_3)))) {
                echo "active";
            }
            echo "\">
\t\t<a href=\"";
            // line 53
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_calendar");
            echo "\"><i class=\"material-icons\">today</i>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Agenda", [], "cms"), "html", null, true);
            echo "</a>
\t\t<ul class=\"sub\">
\t\t\t<li>
\t\t\t\t<a href=\"#\" onclick=\"\$('#fc').fullCalendar('today');\$('#fc').fullCalendar('changeView', 'agendaDay');\">";
            // line 56
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Vandaag", [], "cms"), "html", null, true);
            echo "</a>
\t\t\t</li>
\t\t\t<li>
\t\t\t\t<a href=\"#\" onclick=\"\$('#fc').fullCalendar('today');\$('#fc').fullCalendar('changeView', 'agendaDay');\$('#fc').fullCalendar('incrementDate', moment.duration(1, 'day'));\">";
            // line 59
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Morgen", [], "cms"), "html", null, true);
            echo "</a>
\t\t\t</li>
\t\t\t<li>
\t\t\t\t<a href=\"#\" onclick=\"\$('#fc').fullCalendar('today');\$('#fc').fullCalendar('changeView', 'agendaWeek');\">";
            // line 62
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Deze week", [], "cms"), "html", null, true);
            echo "</a>
\t\t\t</li>
\t\t\t<li>
\t\t\t\t<a href=\"#\" onclick=\"\$('#fc').fullCalendar('today');\$('#fc').fullCalendar('changeView', 'month');\">";
            // line 65
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Deze maand", [], "cms"), "html", null, true);
            echo "</a>
\t\t\t</li>
\t\t</ul>
\t</li>
";
        }
        // line 70
        echo "  ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 70, $this->source); })()), "User", [], "any", false, false, false, 70), "checkPermissions", [0 => "ALLOW_MEDIA"], "method", false, false, false, 70)) {
            // line 71
            echo "    <li class=\"";
            if ((is_string($__internal_compile_4 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 71, $this->source); })())) && is_string($__internal_compile_5 = "admin_media") && ('' === $__internal_compile_5 || 0 === strpos($__internal_compile_4, $__internal_compile_5)))) {
                echo "active";
            }
            echo "\">
      <a href=\"";
            // line 72
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media");
            echo "\">
        <i class=\"fa fa-photo-video\"></i>";
            // line 73
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media", [], "cms"), "html", null, true);
            echo "</a>
        ";
            // line 82
            echo "    </li>
  ";
        }
        // line 84
        echo "  ";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 84, $this->source); })()), "User", [], "any", false, false, false, 84), "checkPermissions", [0 => "ALLOW_NAVIGATION"], "method", false, false, false, 84) && twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 84, $this->source); })()), "customNavigation", [], "any", false, false, false, 84))) {
            // line 85
            echo "    <li class=\"";
            if ((is_string($__internal_compile_6 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 85, $this->source); })())) && is_string($__internal_compile_7 = "admin_navigation") && ('' === $__internal_compile_7 || 0 === strpos($__internal_compile_6, $__internal_compile_7)))) {
                echo "active";
            }
            echo "\">
      <a href=\"";
            // line 86
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_navigation");
            echo "\">
        <i class=\"far fa-compass\"></i>";
            // line 87
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Navigatie", [], "cms"), "html", null, true);
            echo "</a>
    </li>
  ";
        }
        // line 90
        echo "  ";
        if (((array_key_exists("installed", $context) && twig_in_filter("WebshopBundle", (isset($context["installed"]) || array_key_exists("installed", $context) ? $context["installed"] : (function () { throw new RuntimeError('Variable "installed" does not exist.', 90, $this->source); })()))) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 90, $this->source); })()), "User", [], "any", false, false, false, 90), "checkPermissions", [0 => "ALLOW_WEBSHOP"], "method", false, false, false, 90))) {
            // line 91
            echo "\t";
            if ( !twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 91, $this->source); })()), "isCatalog", [], "any", false, false, false, 91)) {
                // line 92
                echo "\t\t<li class=\"";
                if ((is_string($__internal_compile_8 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 92, $this->source); })())) && is_string($__internal_compile_9 = "admin_mod_webshop") && ('' === $__internal_compile_9 || 0 === strpos($__internal_compile_8, $__internal_compile_9)))) {
                    echo "active";
                }
                echo "\">
\t\t  <a href=\"";
                // line 93
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_webshop");
                echo "\">
\t\t\t<i class=\"fa fa-fw fa-shopping-cart\"></i>";
                // line 94
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Webshop beheren", [], "cms"), "html", null, true);
                echo "</a>
\t\t</li>
\t";
            } else {
                // line 97
                echo "\t\t<li class=\"sep\"><a class=\"subheader\">";
                echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Catalogus", [], "cms");
                echo "</a></li>
\t\t<li class=\"";
                // line 98
                if (preg_match("/^(admin_mod_catalog_products|admin_mod_webshop_tags|admin_mod_webshop_tag_displays|admin_mod_webshop_products_edit|admin_mod_webshop_channable|admin_mod_webshop_googlemerchant)/", (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 98, $this->source); })()))) {
                    echo "active";
                }
                echo "\">
\t\t\t<a href=\"";
                // line 99
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_catalog_products");
                echo "\"><i class=\"fa fa-fw fa-shopping-bag\"></i>";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Producten", [], "cms"), "html", null, true);
                echo "</a>
\t\t\t<a class=\"btn-export\" data-bs-toggle=\"tooltip\" data-bs-placement=\"right\" href=\"";
                // line 100
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_catalog_products_export", ["what" => "products"]);
                echo "\" title=\"";
                echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Exporteren", [], "cms");
                echo "\"><i class=\"fa fa-download\"></i></a>
\t\t\t";
                // line 101
                if (((twig_get_attribute($this->env, $this->source, (isset($context["WebshopSettings"]) || array_key_exists("WebshopSettings", $context) ? $context["WebshopSettings"] : (function () { throw new RuntimeError('Variable "WebshopSettings" does not exist.', 101, $this->source); })()), "tagsEnabled", [], "any", false, false, false, 101) || twig_get_attribute($this->env, $this->source, (isset($context["WebshopSettings"]) || array_key_exists("WebshopSettings", $context) ? $context["WebshopSettings"] : (function () { throw new RuntimeError('Variable "WebshopSettings" does not exist.', 101, $this->source); })()), "channable", [], "any", false, false, false, 101)) || twig_get_attribute($this->env, $this->source, (isset($context["WebshopSettings"]) || array_key_exists("WebshopSettings", $context) ? $context["WebshopSettings"] : (function () { throw new RuntimeError('Variable "WebshopSettings" does not exist.', 101, $this->source); })()), "googlemerchant", [], "any", false, false, false, 101))) {
                    // line 102
                    echo "\t\t\t<ul class=\"sub\">
\t\t\t";
                }
                // line 104
                echo "\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, (isset($context["WebshopSettings"]) || array_key_exists("WebshopSettings", $context) ? $context["WebshopSettings"] : (function () { throw new RuntimeError('Variable "WebshopSettings" does not exist.', 104, $this->source); })()), "tagsEnabled", [], "any", false, false, false, 104)) {
                    // line 105
                    echo "\t\t\t\t\t<li";
                    echo ((twig_in_filter("admin_mod_webshop_tags", (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 105, $this->source); })()))) ? (" class=\"active\"") : (""));
                    echo ">
\t\t\t\t\t\t<a href=\"";
                    // line 106
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_webshop_tags");
                    echo "\"><i class=\"fa fa-tags\"></i>";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tags (filter)", [], "cms");
                    echo "</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li";
                    // line 108
                    echo ((twig_in_filter("admin_mod_webshop_tag_displays", (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 108, $this->source); })()))) ? (" class=\"active\"") : (""));
                    echo ">
\t\t\t\t\t\t<a href=\"";
                    // line 109
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_webshop_tag_displays");
                    echo "\"><i class=\"fa fa-tags\"></i>";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tags (weergave)", [], "cms");
                    echo "</a>
\t\t\t\t\t</li>
\t\t\t\t";
                }
                // line 112
                echo "\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, (isset($context["WebshopSettings"]) || array_key_exists("WebshopSettings", $context) ? $context["WebshopSettings"] : (function () { throw new RuntimeError('Variable "WebshopSettings" does not exist.', 112, $this->source); })()), "channable", [], "any", false, false, false, 112)) {
                    // line 113
                    echo "\t\t\t\t\t<li";
                    echo ((twig_in_filter("admin_mod_webshop_channable", (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 113, $this->source); })()))) ? (" class=\"active\"") : (""));
                    echo "><a href=\"";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_webshop_channable");
                    echo "\"><i class=\"material-icons\">shopping_basket</i>";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Channable", [], "cms");
                    echo "</a></li>
\t\t\t\t";
                }
                // line 115
                echo "
\t\t\t\t";
                // line 116
                if (twig_get_attribute($this->env, $this->source, (isset($context["WebshopSettings"]) || array_key_exists("WebshopSettings", $context) ? $context["WebshopSettings"] : (function () { throw new RuntimeError('Variable "WebshopSettings" does not exist.', 116, $this->source); })()), "googlemerchant", [], "any", false, false, false, 116)) {
                    // line 117
                    echo "\t\t\t\t\t<li";
                    echo ((twig_in_filter("admin_mod_webshop_googlemerchant", (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 117, $this->source); })()))) ? (" class=\"active\"") : (""));
                    echo "><a href=\"";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_webshop_googlemerchant");
                    echo "\"><i class=\"material-icons\">shopping_basket</i>";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Google Merchant XML", [], "cms");
                    echo "</a></li>
\t\t\t\t";
                }
                // line 119
                echo "\t\t\t";
                if (((twig_get_attribute($this->env, $this->source, (isset($context["WebshopSettings"]) || array_key_exists("WebshopSettings", $context) ? $context["WebshopSettings"] : (function () { throw new RuntimeError('Variable "WebshopSettings" does not exist.', 119, $this->source); })()), "tagsEnabled", [], "any", false, false, false, 119) || twig_get_attribute($this->env, $this->source, (isset($context["WebshopSettings"]) || array_key_exists("WebshopSettings", $context) ? $context["WebshopSettings"] : (function () { throw new RuntimeError('Variable "WebshopSettings" does not exist.', 119, $this->source); })()), "channable", [], "any", false, false, false, 119)) || twig_get_attribute($this->env, $this->source, (isset($context["WebshopSettings"]) || array_key_exists("WebshopSettings", $context) ? $context["WebshopSettings"] : (function () { throw new RuntimeError('Variable "WebshopSettings" does not exist.', 119, $this->source); })()), "googlemerchant", [], "any", false, false, false, 119))) {
                    // line 120
                    echo "\t\t\t</ul>
\t\t\t";
                }
                // line 122
                echo "\t\t</li>

\t\t<li class=\"";
                // line 124
                if (preg_match("/^(admin_mod_catalog_categories|admin_mod_webshop_categories_edit)/", (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 124, $this->source); })()))) {
                    echo "active";
                }
                echo "\">
\t\t\t<a href=\"";
                // line 125
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_catalog_categories");
                echo "\"><i class=\"material-icons\">view_day</i>";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Product categorieën", [], "cms"), "html", null, true);
                echo "</a>
\t\t</li>

\t\t<li class=\"";
                // line 128
                if (preg_match("/^(admin_mod_catalog_specs|admin_mod_webshop_specs_view)/", (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 128, $this->source); })()))) {
                    echo "active";
                }
                echo "\">
\t\t\t<a href=\"";
                // line 129
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_catalog_specs");
                echo "\"><i class=\"material-icons\">details</i>";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Product specificaties", [], "cms"), "html", null, true);
                echo "</a>
\t\t</li>
\t\t";
                // line 131
                if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
                    // line 132
                    echo "\t\t\t<li class=\"";
                    if ((is_string($__internal_compile_10 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 132, $this->source); })())) && is_string($__internal_compile_11 = "admin_mod_catalog_config") && ('' === $__internal_compile_11 || 0 === strpos($__internal_compile_10, $__internal_compile_11)))) {
                        echo "active";
                    }
                    echo "\">
\t\t\t  <a href=\"";
                    // line 133
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_catalog_config");
                    echo "\">
\t\t\t\t<i class=\"fa fa-fw fa-cog\"></i>";
                    // line 134
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Instellingen", [], "cms"), "html", null, true);
                    echo "</a>
\t\t\t</li>
\t\t";
                }
                // line 137
                echo "\t";
            }
            // line 138
            echo "  ";
        }
        // line 139
        echo "  ";
        if (((array_key_exists("installed", $context) && twig_in_filter("TicketsBundle", (isset($context["installed"]) || array_key_exists("installed", $context) ? $context["installed"] : (function () { throw new RuntimeError('Variable "installed" does not exist.', 139, $this->source); })()))) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 139, $this->source); })()), "User", [], "any", false, false, false, 139), "checkPermissions", [0 => "ALLOW_BUNDLES"], "method", false, false, false, 139))) {
            // line 140
            echo "    <li class=\"";
            if ((is_string($__internal_compile_12 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 140, $this->source); })())) && is_string($__internal_compile_13 = "admin_mod_tickets") && ('' === $__internal_compile_13 || 0 === strpos($__internal_compile_12, $__internal_compile_13)))) {
                echo "active";
            }
            echo "\">
      <a href=\"";
            // line 141
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_tickets");
            echo "\">
        <i class=\"material-icons\">event</i>";
            // line 142
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Ticketverkoop", [], "cms"), "html", null, true);
            echo "</a>
    </li>
  ";
        }
        // line 145
        echo "  ";
        if (((array_key_exists("installed", $context) && twig_in_filter("JobsBundle", (isset($context["installed"]) || array_key_exists("installed", $context) ? $context["installed"] : (function () { throw new RuntimeError('Variable "installed" does not exist.', 145, $this->source); })()))) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 145, $this->source); })()), "User", [], "any", false, false, false, 145), "checkPermissions", [0 => "ALLOW_BUNDLES"], "method", false, false, false, 145))) {
            // line 146
            echo "    <li class=\"";
            if ((is_string($__internal_compile_14 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 146, $this->source); })())) && is_string($__internal_compile_15 = "admin_mod_jobs") && ('' === $__internal_compile_15 || 0 === strpos($__internal_compile_14, $__internal_compile_15)))) {
                echo "active";
            }
            echo "\">
      <a href=\"";
            // line 147
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_jobs");
            echo "\">
        <i class=\"fa fa-fw fa-briefcase\"></i>";
            // line 148
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Vacatures beheren", [], "cms"), "html", null, true);
            echo "</a>
    </li>
  ";
        }
        // line 151
        echo "
  ";
        // line 152
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 152, $this->source); })()), "User", [], "any", false, false, false, 152), "checkPermissions", [0 => "ALLOW_BUNDLES"], "method", false, false, false, 152)) {
            // line 153
            echo "    <li class=\"sep\">
      <a class=\"subheader\">";
            // line 154
            echo twig_escape_filter($this->env, (isset($context["trinity"]) || array_key_exists("trinity", $context) ? $context["trinity"] : (function () { throw new RuntimeError('Variable "trinity" does not exist.', 154, $this->source); })()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Extensies", [], "cms"), "html", null, true);
            echo "</a>
    </li>

    ";
            // line 158
            echo "    ";
            $context["apiRoute"] = null;
            // line 159
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_sort_filter($this->env, (isset($context["modroutes"]) || array_key_exists("modroutes", $context) ? $context["modroutes"] : (function () { throw new RuntimeError('Variable "modroutes" does not exist.', 159, $this->source); })())));
            foreach ($context['_seq'] as $context["_key"] => $context["route"]) {
                // line 160
                echo "      ";
                if (((((((( !twig_get_attribute($this->env, $this->source, $context["route"], "hidden", [], "any", true, true, false, 160) || (twig_get_attribute($this->env, $this->source, $context["route"], "hidden", [], "any", false, false, false, 160) != true)) && (twig_get_attribute($this->env, $this->source, $context["route"], "route", [], "any", false, false, false, 160) != "admin_mod_tickets")) && (twig_get_attribute($this->env, $this->source, $context["route"], "route", [], "any", false, false, false, 160) != "admin_mod_webshop")) && (twig_get_attribute($this->env, $this->source, $context["route"], "route", [], "any", false, false, false, 160) != "admin_mod_search")) && (twig_get_attribute($this->env, $this->source, $context["route"], "route", [], "any", false, false, false, 160) != "admin_mod_jobs")) && (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["route"], "bundleName", [], "any", false, false, false, 160), twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 160, $this->source); })()), "visibleBundles", [], "any", false, false, false, 160)) || (twig_length_filter($this->env, (isset($context["multisite"]) || array_key_exists("multisite", $context) ? $context["multisite"] : (function () { throw new RuntimeError('Variable "multisite" does not exist.', 160, $this->source); })())) <= 1))) && (twig_get_attribute($this->env, $this->source, $context["route"], "route", [], "any", false, false, false, 160) != "admin_mod_questionsandanswers"))) {
                    // line 161
                    echo "      ";
                    if ((twig_get_attribute($this->env, $this->source, $context["route"], "route", [], "any", false, false, false, 161) == "admin_mod_api")) {
                        // line 162
                        echo "        ";
                        $context["apiRoute"] = $context["route"];
                        // line 163
                        echo "      ";
                    } else {
                        // line 164
                        echo "        <li class=\"";
                        if ((is_string($__internal_compile_16 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 164, $this->source); })())) && is_string($__internal_compile_17 = twig_get_attribute($this->env, $this->source, $context["route"], "route", [], "any", false, false, false, 164)) && ('' === $__internal_compile_17 || 0 === strpos($__internal_compile_16, $__internal_compile_17)))) {
                            echo "active";
                        }
                        echo "\">
          <a href=\"";
                        // line 165
                        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, $context["route"], "route", [], "any", false, false, false, 165));
                        echo "\">
            ";
                        // line 166
                        if (twig_in_filter("fa-", twig_get_attribute($this->env, $this->source, $context["route"], "icon", [], "any", false, false, false, 166))) {
                            // line 167
                            echo "              ";
                            // line 168
                            echo "              <i class=\"";
                            ((twig_get_attribute($this->env, $this->source, $context["route"], "icon", [], "any", false, false, false, 168)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["route"], "icon", [], "any", false, false, false, 168), "html", null, true))) : (print ("")));
                            echo " fa-fw\"></i>";
                            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["route"], "name", [], "any", false, false, false, 168), [], "cms"), "html", null, true);
                            echo "
            ";
                        } else {
                            // line 170
                            echo "              ";
                            // line 171
                            echo "              <i class=\"material-icons\">";
                            ((twig_get_attribute($this->env, $this->source, $context["route"], "icon", [], "any", false, false, false, 171)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["route"], "icon", [], "any", false, false, false, 171), "html", null, true))) : (print ("dashboard")));
                            echo "</i>";
                            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["route"], "name", [], "any", false, false, false, 171), [], "cms"), "html", null, true);
                            echo "
            ";
                        }
                        // line 173
                        echo "          </a>
          ";
                        // line 174
                        if ((twig_get_attribute($this->env, $this->source, $context["route"], "nav", [], "any", true, true, false, 174) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["route"], "nav", [], "any", false, false, false, 174)))) {
                            // line 175
                            echo "            <ul class=\"sub\">
              ";
                            // line 176
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["route"], "nav", [], "any", false, false, false, 176));
                            foreach ($context['_seq'] as $context["_key"] => $context["nav"]) {
                                // line 177
                                echo "                <li class=\"";
                                if (((isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 177, $this->source); })()) == twig_get_attribute($this->env, $this->source, $context["nav"], "route", [], "any", false, false, false, 177))) {
                                    echo "active";
                                }
                                echo "\">
                  <a href=\"";
                                // line 178
                                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, $context["nav"], "route", [], "any", false, false, false, 178));
                                echo "\">";
                                echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["nav"], "label", [], "any", false, false, false, 178), [], "cms");
                                echo "</a>
                </li>
              ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['nav'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 181
                            echo "            </ul>
          ";
                        }
                        // line 183
                        echo "        </li>
      ";
                    }
                    // line 185
                    echo "      ";
                }
                // line 186
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['route'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 187
            echo "  ";
        }
        // line 188
        echo "
  ";
        // line 189
        if ((twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 189, $this->source); })()), "ccEnabled", [], "any", false, false, false, 189) && $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN"))) {
            // line 190
            echo "    <li class=\"sep\">
      <a class=\"subheader\">";
            // line 191
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Command &amp; Control", [], "cms"), "html", null, true);
            echo "</a>
    </li>
    <li class=\"";
            // line 193
            if (((isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 193, $this->source); })()) == "admin_cc")) {
                echo "active";
            }
            echo "\">
      <a href=\"";
            // line 194
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cc");
            echo "\">
        <i class=\"material-icons\">group_work</i>";
            // line 195
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Site management", [], "cms"), "html", null, true);
            echo "</a>
    </li>
    <li class=\"";
            // line 197
            if (((isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 197, $this->source); })()) == "admin_monitor")) {
                echo "active";
            }
            echo "\">
      <a href=\"";
            // line 198
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_monitor");
            echo "\">
        <i class=\"material-icons\">network_check</i>";
            // line 199
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("System monitor", [], "cms"), "html", null, true);
            echo "</a>
    </li>
  ";
        }
        // line 202
        echo "
  ";
        // line 203
        if ((array_key_exists("tags", $context) &&  !twig_test_empty((isset($context["tags"]) || array_key_exists("tags", $context) ? $context["tags"] : (function () { throw new RuntimeError('Variable "tags" does not exist.', 203, $this->source); })())))) {
            // line 204
            echo "    <li class=\"sep\">
      <a class=\"subheader\">";
            // line 205
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tags", [], "cms"), "html", null, true);
            echo "</a>
    </li>
    ";
            // line 207
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tags"]) || array_key_exists("tags", $context) ? $context["tags"] : (function () { throw new RuntimeError('Variable "tags" does not exist.', 207, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["Tag"]) {
                // line 208
                echo "      <li class=\"";
                if (((((isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 208, $this->source); })()) == "admin_tag_view") && twig_get_attribute($this->env, $this->source, ($context["param"] ?? null), "tag", [], "any", true, true, false, 208)) && (twig_get_attribute($this->env, $this->source, (isset($context["param"]) || array_key_exists("param", $context) ? $context["param"] : (function () { throw new RuntimeError('Variable "param" does not exist.', 208, $this->source); })()), "tag", [], "any", false, false, false, 208) == twig_get_attribute($this->env, $this->source, $context["Tag"], "label", [], "any", false, false, false, 208)))) {
                    echo "active";
                }
                echo "\">
        <a href=\"";
                // line 209
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_tag_view", ["tag" => twig_get_attribute($this->env, $this->source, $context["Tag"], "label", [], "any", false, false, false, 209)]), "html", null, true);
                echo "\">
          <i class=\"material-icons\">bookmark</i>";
                // line 210
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Tag"], "label", [], "any", false, false, false, 210), "html", null, true);
                echo "</a>
      </li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Tag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 213
            echo "  ";
        }
        // line 214
        echo "
  ";
        // line 222
        echo "
  <li class=\"sep\">
    <a class=\"subheader\">";
        // line 224
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Systeem", [], "cms"), "html", null, true);
        echo "</a>
  </li>

    ";
        // line 227
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 227, $this->source); })()), "User", [], "any", false, false, false, 227), "checkPermissions", [0 => "ALLOW_CONFIGURATION"], "method", false, false, false, 227)) {
            // line 228
            echo "      <li class=\"";
            if (((isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 228, $this->source); })()) == "admin_settings")) {
                echo "active";
            }
            echo "\">
        <a href=\"";
            // line 229
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_settings");
            echo "\"><i class=\"fa fa-fw fa-cog\"></i>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Configuratie", [], "cms"), "html", null, true);
            echo "</a>
      </li>
      ";
            // line 231
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 231, $this->source); })()), "User", [], "any", false, false, false, 231), "checkPermissions", [0 => "ALLOW_PAGE"], "method", false, false, false, 231)) {
                // line 232
                echo "        ";
                if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
                    // line 233
                    echo "          ";
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 233, $this->source); })()), "User", [], "any", false, false, false, 233), "checkPermissions", [0 => "ALLOW_BUNDLES"], "method", false, false, false, 233)) {
                        // line 234
                        echo "            <li class=\"";
                        if (((isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 234, $this->source); })()) == "admin_page_bundles")) {
                            echo "active";
                        }
                        echo "\">
              <a href=\"";
                        // line 235
                        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_bundles");
                        echo "\">
                <i class=\"fa fa-fw fa-puzzle-piece\"></i> ";
                        // line 236
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gekoppelde extensies", [], "cms"), "html", null, true);
                        echo "</a>
            </li>
          ";
                    }
                    // line 239
                    echo "
          <li class=\"";
                    // line 240
                    if (((isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 240, $this->source); })()) == "admin_metadata")) {
                        echo "active";
                    }
                    echo "\">
            <a href=\"";
                    // line 241
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_metadata");
                    echo "\">
              <i class=\"fa fa-fw fa-tag\"></i> ";
                    // line 242
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Metatags beheren", [], "cms"), "html", null, true);
                    echo "</a>
          </li>
        ";
                }
                // line 245
                echo "      ";
            }
            // line 246
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 246, $this->source); })()), "User", [], "any", false, false, false, 246), "checkPermissions", [0 => "ALLOW_REDIRECTS"], "method", false, false, false, 246)) {
                // line 247
                echo "        <li class=\"";
                if ((is_string($__internal_compile_18 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 247, $this->source); })())) && is_string($__internal_compile_19 = "admin_redirects") && ('' === $__internal_compile_19 || 0 === strpos($__internal_compile_18, $__internal_compile_19)))) {
                    echo "active";
                }
                echo "\">
          <a href=\"";
                // line 248
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_redirects");
                echo "\">
            <i class=\"fa fa-random\"></i>";
                // line 249
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Redirects beheren", [], "cms"), "html", null, true);
                echo "</a>
        </li>
      ";
            }
            // line 252
            echo "      ";
            if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
                // line 253
                echo "        <li class=\"";
                if (((isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 253, $this->source); })()) == "admin_settings_languages")) {
                    echo "active";
                }
                echo "\">
          <a href=\"";
                // line 254
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_settings_languages");
                echo "\">
            <i class=\"fa fa-fw fa-language\"></i>";
                // line 255
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Talen", [], "cms"), "html", null, true);
                echo "</a>
        </li>
      ";
            }
            // line 258
            echo "
      ";
            // line 259
            if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN") || twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 259, $this->source); })()), "User", [], "any", false, false, false, 259), "checkPermissions", [0 => "ALLOW_EMAIL_TEMPLATES"], "method", false, false, false, 259))) {
                // line 260
                echo "        <li class=\"";
                if ((is_string($__internal_compile_20 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 260, $this->source); })())) && is_string($__internal_compile_21 = "admin_mail") && ('' === $__internal_compile_21 || 0 === strpos($__internal_compile_20, $__internal_compile_21)))) {
                    echo "active";
                }
                echo "\">
          <a href=\"";
                // line 261
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mail");
                echo "\">
            <i class=\"fa fa-fw fa-envelope-open\"></i>";
                // line 262
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("E-mail inhoud", [], "cms"), "html", null, true);
                echo "</a>
        </li>
      ";
            }
            // line 265
            echo "
      ";
            // line 266
            if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
                // line 267
                echo "        <li class=\"";
                if ((is_string($__internal_compile_22 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 267, $this->source); })())) && is_string($__internal_compile_23 = "admin_settings_mailtest") && ('' === $__internal_compile_23 || 0 === strpos($__internal_compile_22, $__internal_compile_23)))) {
                    echo "active";
                }
                echo "\">
          <a href=\"";
                // line 268
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_settings_mailtest");
                echo "\">
            <i class=\"fa fa-fw fa-paper-plane\"></i>";
                // line 269
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("E-mail testen", [], "cms"), "html", null, true);
                echo "</a>
        </li>
        <li class=\"";
                // line 271
                if ((is_string($__internal_compile_24 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 271, $this->source); })())) && is_string($__internal_compile_25 = "admin_cron") && ('' === $__internal_compile_25 || 0 === strpos($__internal_compile_24, $__internal_compile_25)))) {
                    echo "active";
                }
                echo "\">
          <a href=\"";
                // line 272
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cron");
                echo "\">
          <i class=\"far fa-fw fa-clock\"></i>";
                // line 273
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cronjob", [], "cms"), "html", null, true);
                echo "</a>
        </li>
      ";
            }
            // line 276
            echo "    ";
        }
        // line 277
        echo "
    ";
        // line 278
        if (twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 278, $this->source); })()), "uptimeRobotKey", [], "any", false, false, false, 278)) {
            // line 279
            echo "      <li class=\"";
            if ((is_string($__internal_compile_26 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 279, $this->source); })())) && is_string($__internal_compile_27 = "admin_status") && ('' === $__internal_compile_27 || 0 === strpos($__internal_compile_26, $__internal_compile_27)))) {
                echo "active";
            }
            echo "\">
        <a href=\"";
            // line 280
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_status");
            echo "\">
          <i class=\"material-icons\">network_check</i>";
            // line 281
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Status", [], "cms"), "html", null, true);
            echo "
        </a>
      </li>
    ";
        }
        // line 285
        echo "
  ";
        // line 289
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 289, $this->source); })()), "User", [], "any", false, false, false, 289), "checkPermissions", [0 => "ALLOW_USERS"], "method", false, false, false, 289)) {
            // line 290
            echo "      <li class=\"";
            if ((is_string($__internal_compile_28 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 290, $this->source); })())) && is_string($__internal_compile_29 = "admin_users") && ('' === $__internal_compile_29 || 0 === strpos($__internal_compile_28, $__internal_compile_29)))) {
                echo "active";
            }
            echo "\">
        <a href=\"";
            // line 291
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users");
            echo "\">
          ";
            // line 293
            echo "          <i class=\"far fa-fw fa-user\"></i>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gebruikers", [], "cms"), "html", null, true);
            echo "
        </a>
          ";
            // line 303
            echo "      </li>
    ";
        }
        // line 305
        echo "  ";
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
            // line 306
            echo "  \t<li class=\"";
            if ((is_string($__internal_compile_30 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 306, $this->source); })())) && is_string($__internal_compile_31 = "admin_multisite") && ('' === $__internal_compile_31 || 0 === strpos($__internal_compile_30, $__internal_compile_31)))) {
                echo "active";
            }
            echo "\">
  \t\t<a href=\"";
            // line 307
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_multisite");
            echo "\">
  \t\t\t<i class=\"fa fa-sitemap\"></i> ";
            // line 308
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Multi-site configuratie", [], "cms"), "html", null, true);
            echo "
  \t\t</a>
  \t</li>
  ";
        }
        // line 312
        echo "
  ";
        // line 313
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
            // line 314
            echo "    <li class=\"";
            if ((((is_string($__internal_compile_32 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 314, $this->source); })())) && is_string($__internal_compile_33 = "admin_system") && ('' === $__internal_compile_33 || 0 === strpos($__internal_compile_32, $__internal_compile_33))) || (is_string($__internal_compile_34 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 314, $this->source); })())) && is_string($__internal_compile_35 = "admin_install") && ('' === $__internal_compile_35 || 0 === strpos($__internal_compile_34, $__internal_compile_35)))) || (is_string($__internal_compile_36 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 314, $this->source); })())) && is_string($__internal_compile_37 = "admin_update") && ('' === $__internal_compile_37 || 0 === strpos($__internal_compile_36, $__internal_compile_37))))) {
                echo "active";
            }
            echo "\">
      <a href=\"";
            // line 315
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_system");
            echo "\">
        <i class=\"fa fa-fw fa-database\"></i>";
            // line 316
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Backups", [], "cms"), "html", null, true);
            echo "</a>
        ";
            // line 341
            echo "    </li>

    <li class=\"";
            // line 343
            if ((is_string($__internal_compile_38 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 343, $this->source); })())) && is_string($__internal_compile_39 = "admin_log") && ('' === $__internal_compile_39 || 0 === strpos($__internal_compile_38, $__internal_compile_39)))) {
                echo "active";
            }
            echo "\">
      <a href=\"";
            // line 344
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_log");
            echo "\">
        <i class=\"fa fa-fw fa-clipboard-check\"></i>";
            // line 345
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Systeem log", [], "cms"), "html", null, true);
            echo "</a>
    </li>
  ";
        }
        // line 348
        echo "
  <li class=\"";
        // line 349
        if ((is_string($__internal_compile_40 = (isset($context["active"]) || array_key_exists("active", $context) ? $context["active"] : (function () { throw new RuntimeError('Variable "active" does not exist.', 349, $this->source); })())) && is_string($__internal_compile_41 = "admin_about") && ('' === $__internal_compile_41 || 0 === strpos($__internal_compile_40, $__internal_compile_41)))) {
            echo "active";
        }
        echo "\">
    <a href=\"";
        // line 350
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_about");
        echo "\">
      <i class=\"fa fa-fw fa-info-circle\"></i>";
        // line 351
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Over", [], "cms"), "html", null, true);
        echo "
      ";
        // line 352
        echo twig_escape_filter($this->env, (isset($context["trinity"]) || array_key_exists("trinity", $context) ? $context["trinity"] : (function () { throw new RuntimeError('Variable "trinity" does not exist.', 352, $this->source); })()), "html", null, true);
        echo "</a>
  </li>
</ul>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "@Cms/menu/main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  903 => 352,  899 => 351,  895 => 350,  889 => 349,  886 => 348,  880 => 345,  876 => 344,  870 => 343,  866 => 341,  862 => 316,  858 => 315,  851 => 314,  849 => 313,  846 => 312,  839 => 308,  835 => 307,  828 => 306,  825 => 305,  821 => 303,  815 => 293,  811 => 291,  804 => 290,  801 => 289,  798 => 285,  791 => 281,  787 => 280,  780 => 279,  778 => 278,  775 => 277,  772 => 276,  766 => 273,  762 => 272,  756 => 271,  751 => 269,  747 => 268,  740 => 267,  738 => 266,  735 => 265,  729 => 262,  725 => 261,  718 => 260,  716 => 259,  713 => 258,  707 => 255,  703 => 254,  696 => 253,  693 => 252,  687 => 249,  683 => 248,  676 => 247,  673 => 246,  670 => 245,  664 => 242,  660 => 241,  654 => 240,  651 => 239,  645 => 236,  641 => 235,  634 => 234,  631 => 233,  628 => 232,  626 => 231,  619 => 229,  612 => 228,  610 => 227,  604 => 224,  600 => 222,  597 => 214,  594 => 213,  585 => 210,  581 => 209,  574 => 208,  570 => 207,  565 => 205,  562 => 204,  560 => 203,  557 => 202,  551 => 199,  547 => 198,  541 => 197,  536 => 195,  532 => 194,  526 => 193,  521 => 191,  518 => 190,  516 => 189,  513 => 188,  510 => 187,  504 => 186,  501 => 185,  497 => 183,  493 => 181,  482 => 178,  475 => 177,  471 => 176,  468 => 175,  466 => 174,  463 => 173,  455 => 171,  453 => 170,  445 => 168,  443 => 167,  441 => 166,  437 => 165,  430 => 164,  427 => 163,  424 => 162,  421 => 161,  418 => 160,  413 => 159,  410 => 158,  402 => 154,  399 => 153,  397 => 152,  394 => 151,  388 => 148,  384 => 147,  377 => 146,  374 => 145,  368 => 142,  364 => 141,  357 => 140,  354 => 139,  351 => 138,  348 => 137,  342 => 134,  338 => 133,  331 => 132,  329 => 131,  322 => 129,  316 => 128,  308 => 125,  302 => 124,  298 => 122,  294 => 120,  291 => 119,  281 => 117,  279 => 116,  276 => 115,  266 => 113,  263 => 112,  255 => 109,  251 => 108,  244 => 106,  239 => 105,  236 => 104,  232 => 102,  230 => 101,  224 => 100,  218 => 99,  212 => 98,  207 => 97,  201 => 94,  197 => 93,  190 => 92,  187 => 91,  184 => 90,  178 => 87,  174 => 86,  167 => 85,  164 => 84,  160 => 82,  156 => 73,  152 => 72,  145 => 71,  142 => 70,  134 => 65,  128 => 62,  122 => 59,  116 => 56,  108 => 53,  101 => 52,  98 => 51,  94 => 49,  88 => 32,  81 => 31,  79 => 30,  76 => 29,  70 => 26,  66 => 25,  59 => 24,  57 => 23,  54 => 22,  50 => 15,  47 => 5,  45 => 4,  43 => 3,  40 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{% trans_default_domain 'cms' %}

{% set active = app.request.attributes.get('_route') %}
{% set param = app.request.attributes.get('_route_params') %}

{#
<li class=\"heading {% if Settings.test %}red darken-4{% endif %}\">
  <a class=\"dropdown-button\" href=\"#!\">
    <i class=\"material-icons\">web</i>
    <span>
      <strong>{{Settings.label}}</strong>{{(app.user.name|trim) is not empty ? app.user.name : 'Administrator'}}</span>
  </a>
</li>
#}

<ul>
  {#
  <li class=\"sep\">
    <a class=\"subheader\">{{ 'Admin' | trans }}</a>
  </li>
  #}

  {% if app.User.checkPermissions('ALLOW_DASHBOARD') and Settings.piwikUrl is not empty and Settings.piwikApiHash is not empty %}
    <li class=\"{% if active == 'admin' %}active{% endif %}\">
      <a href=\"{{path('admin')}}\">
        <i class=\"fa fa-fw fa-chart-line\"></i>{{'Dashboard'|trans}}</a>
    </li>
  {% endif %}

  {% if app.User.checkPermissions('ALLOW_PAGE') %}
    <li class=\"{% if active starts with 'admin_page' %}active{% endif %}\">
      <a href=\"{{path('admin_page')}}\"><i class=\"far fa-file-alt\"></i>{{\"Pagina's\"|trans}}</a>
      {#
      <ul class=\"sub\">
        <li class=\"{% if active == 'admin_page_edit' %}active{% endif %}\">
          <a href=\"{{path('admin_page_edit')}}\">
            <i class=\"material-icons\">add</i>{{'Toevoegen'|trans}}</a>
        </li>
        <li class=\"{% if active == 'admin_page_bundles' %}active{% endif %}\">
          <a href=\"{{path('admin_page_bundles')}}\">
            <i class=\"material-icons\">link</i>{{'Extensies'|trans}}</a>
        </li>
        <li class=\"{% if active == 'admin_metadata' %}active{% endif %}\">
          <a href=\"{{path('admin_metadata')}}\">
            <i class=\"material-icons\">label</i>{{'Metatags'|trans}}</a>
        </li>
      </ul>
      #}
    </li>
  {% endif %}
  {% if Settings.calendar is defined and Settings.calendar == true %}
\t<li class=\"{% if active starts with 'admin_calendar' %}active{% endif %}\">
\t\t<a href=\"{{path('admin_calendar')}}\"><i class=\"material-icons\">today</i>{{'Agenda'|trans}}</a>
\t\t<ul class=\"sub\">
\t\t\t<li>
\t\t\t\t<a href=\"#\" onclick=\"\$('#fc').fullCalendar('today');\$('#fc').fullCalendar('changeView', 'agendaDay');\">{{'Vandaag'|trans}}</a>
\t\t\t</li>
\t\t\t<li>
\t\t\t\t<a href=\"#\" onclick=\"\$('#fc').fullCalendar('today');\$('#fc').fullCalendar('changeView', 'agendaDay');\$('#fc').fullCalendar('incrementDate', moment.duration(1, 'day'));\">{{'Morgen'|trans}}</a>
\t\t\t</li>
\t\t\t<li>
\t\t\t\t<a href=\"#\" onclick=\"\$('#fc').fullCalendar('today');\$('#fc').fullCalendar('changeView', 'agendaWeek');\">{{'Deze week'|trans}}</a>
\t\t\t</li>
\t\t\t<li>
\t\t\t\t<a href=\"#\" onclick=\"\$('#fc').fullCalendar('today');\$('#fc').fullCalendar('changeView', 'month');\">{{'Deze maand'|trans}}</a>
\t\t\t</li>
\t\t</ul>
\t</li>
{% endif %}
  {% if app.User.checkPermissions('ALLOW_MEDIA') %}
    <li class=\"{% if active starts with 'admin_media' %}active{% endif %}\">
      <a href=\"{{path('admin_media')}}\">
        <i class=\"fa fa-photo-video\"></i>{{'Media'|trans}}</a>
        {#
      <ul class=\"sub\">
        <li class=\"{% if active starts with 'admin_media_orphaned' %}active{% endif %}\">
          <a href=\"{{path('admin_media_orphaned')}}\">
            <i class=\"material-icons\">cloud_download</i>{{'Ongebruikt'|trans}}</a>
        </li>
      </ul>
      #}
    </li>
  {% endif %}
  {% if (app.User.checkPermissions('ALLOW_NAVIGATION') and Settings.customNavigation) %}
    <li class=\"{% if active starts with 'admin_navigation' %}active{% endif %}\">
      <a href=\"{{path('admin_navigation')}}\">
        <i class=\"far fa-compass\"></i>{{'Navigatie'|trans}}</a>
    </li>
  {% endif %}
  {% if installed is defined and 'WebshopBundle' in installed and app.User.checkPermissions('ALLOW_WEBSHOP') %}
\t{% if not Settings.isCatalog %}
\t\t<li class=\"{% if active starts with 'admin_mod_webshop' %}active{% endif %}\">
\t\t  <a href=\"{{path('admin_mod_webshop')}}\">
\t\t\t<i class=\"fa fa-fw fa-shopping-cart\"></i>{{'Webshop beheren'|trans}}</a>
\t\t</li>
\t{% else %}
\t\t<li class=\"sep\"><a class=\"subheader\">{{ 'Catalogus' | trans({}) | raw }}</a></li>
\t\t<li class=\"{% if active matches '/^(admin_mod_catalog_products|admin_mod_webshop_tags|admin_mod_webshop_tag_displays|admin_mod_webshop_products_edit|admin_mod_webshop_channable|admin_mod_webshop_googlemerchant)/' %}active{% endif %}\">
\t\t\t<a href=\"{{path('admin_mod_catalog_products')}}\"><i class=\"fa fa-fw fa-shopping-bag\"></i>{{'Producten'|trans}}</a>
\t\t\t<a class=\"btn-export\" data-bs-toggle=\"tooltip\" data-bs-placement=\"right\" href=\"{{path('admin_mod_catalog_products_export', {'what': 'products'})}}\" title=\"{{ 'Exporteren' | trans({}) | raw }}\"><i class=\"fa fa-download\"></i></a>
\t\t\t{% if WebshopSettings.tagsEnabled or WebshopSettings.channable or WebshopSettings.googlemerchant %}
\t\t\t<ul class=\"sub\">
\t\t\t{% endif %}
\t\t\t\t{% if WebshopSettings.tagsEnabled %}
\t\t\t\t\t<li{{'admin_mod_webshop_tags' in active ? ' class=\"active\"' : ''}}>
\t\t\t\t\t\t<a href=\"{{path('admin_mod_webshop_tags')}}\"><i class=\"fa fa-tags\"></i>{{ 'Tags (filter)' | trans({}) | raw }}</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li{{'admin_mod_webshop_tag_displays' in active ? ' class=\"active\"' : ''}}>
\t\t\t\t\t\t<a href=\"{{path('admin_mod_webshop_tag_displays')}}\"><i class=\"fa fa-tags\"></i>{{ 'Tags (weergave)' | trans({}) | raw }}</a>
\t\t\t\t\t</li>
\t\t\t\t{% endif %}
\t\t\t\t{% if WebshopSettings.channable %}
\t\t\t\t\t<li{{'admin_mod_webshop_channable' in active ? ' class=\"active\"' : ''}}><a href=\"{{path('admin_mod_webshop_channable')}}\"><i class=\"material-icons\">shopping_basket</i>{{ 'Channable' | trans({}) | raw }}</a></li>
\t\t\t\t{% endif %}

\t\t\t\t{% if WebshopSettings.googlemerchant %}
\t\t\t\t\t<li{{'admin_mod_webshop_googlemerchant' in active ? ' class=\"active\"' : ''}}><a href=\"{{path('admin_mod_webshop_googlemerchant')}}\"><i class=\"material-icons\">shopping_basket</i>{{ 'Google Merchant XML' | trans({}) | raw }}</a></li>
\t\t\t\t{% endif %}
\t\t\t{% if WebshopSettings.tagsEnabled or WebshopSettings.channable or WebshopSettings.googlemerchant %}
\t\t\t</ul>
\t\t\t{% endif %}
\t\t</li>

\t\t<li class=\"{% if active matches '/^(admin_mod_catalog_categories|admin_mod_webshop_categories_edit)/' %}active{% endif %}\">
\t\t\t<a href=\"{{path('admin_mod_catalog_categories')}}\"><i class=\"material-icons\">view_day</i>{{'Product categorieën'|trans}}</a>
\t\t</li>

\t\t<li class=\"{% if active matches '/^(admin_mod_catalog_specs|admin_mod_webshop_specs_view)/' %}active{% endif %}\">
\t\t\t<a href=\"{{path('admin_mod_catalog_specs')}}\"><i class=\"material-icons\">details</i>{{'Product specificaties'|trans}}</a>
\t\t</li>
\t\t{% if is_granted('ROLE_SUPER_ADMIN') %}
\t\t\t<li class=\"{% if active starts with 'admin_mod_catalog_config' %}active{% endif %}\">
\t\t\t  <a href=\"{{path('admin_mod_catalog_config')}}\">
\t\t\t\t<i class=\"fa fa-fw fa-cog\"></i>{{'Instellingen'|trans}}</a>
\t\t\t</li>
\t\t{% endif %}
\t{% endif %}
  {% endif %}
  {% if installed is defined and 'TicketsBundle' in installed and app.User.checkPermissions('ALLOW_BUNDLES') %}
    <li class=\"{% if active starts with 'admin_mod_tickets' %}active{% endif %}\">
      <a href=\"{{path('admin_mod_tickets')}}\">
        <i class=\"material-icons\">event</i>{{'Ticketverkoop'|trans}}</a>
    </li>
  {% endif %}
  {% if installed is defined and 'JobsBundle' in installed and app.User.checkPermissions('ALLOW_BUNDLES') %}
    <li class=\"{% if active starts with 'admin_mod_jobs' %}active{% endif %}\">
      <a href=\"{{path('admin_mod_jobs')}}\">
        <i class=\"fa fa-fw fa-briefcase\"></i>{{'Vacatures beheren'|trans}}</a>
    </li>
  {% endif %}

  {% if app.User.checkPermissions('ALLOW_BUNDLES') %}
    <li class=\"sep\">
      <a class=\"subheader\">{{trinity}} {{ 'Extensies' | trans }}</a>
    </li>

    {# Routes from other bundles #}
    {% set apiRoute = null %}
    {% for route in modroutes | sort %}
      {% if (route.hidden is not defined or route.hidden != true) and route.route != 'admin_mod_tickets' and route.route != 'admin_mod_webshop' and route.route != 'admin_mod_search' and route.route != 'admin_mod_jobs' and (route.bundleName in Settings.visibleBundles or multisite|length <= 1) and route.route != 'admin_mod_questionsandanswers' %}
      {% if route.route == 'admin_mod_api' %}
        {% set apiRoute = route %}
      {% else %}
        <li class=\"{% if active starts with route.route %}active{% endif %}\">
          <a href=\"{{path(route.route)}}\">
            {% if 'fa-' in route.icon %}
              {# FONT-AWESOME ICONS #}
              <i class=\"{{route.icon ? route.icon : ''}} fa-fw\"></i>{{route.name|trans}}
            {% else %}
              {# MATERIAL ICONS #}
              <i class=\"material-icons\">{{route.icon ? route.icon : 'dashboard'}}</i>{{route.name|trans}}
            {% endif %}
          </a>
          {% if route.nav is defined and route.nav is not empty %}
            <ul class=\"sub\">
              {% for nav in route.nav %}
                <li class=\"{% if active == nav.route %}active{% endif %}\">
                  <a href=\"{{path(nav.route)}}\">{{nav.label|trans|raw}}</a>
                </li>
              {% endfor %}
            </ul>
          {% endif %}
        </li>
      {% endif %}
      {% endif %}
    {% endfor %}
  {% endif %}

  {% if Settings.ccEnabled and is_granted('ROLE_SUPER_ADMIN') %}
    <li class=\"sep\">
      <a class=\"subheader\">{{ 'Command &amp; Control' | trans }}</a>
    </li>
    <li class=\"{% if active == 'admin_cc' %}active{% endif %}\">
      <a href=\"{{path('admin_cc')}}\">
        <i class=\"material-icons\">group_work</i>{{ 'Site management' | trans }}</a>
    </li>
    <li class=\"{% if active == 'admin_monitor' %}active{% endif %}\">
      <a href=\"{{path('admin_monitor')}}\">
        <i class=\"material-icons\">network_check</i>{{ 'System monitor' | trans }}</a>
    </li>
  {% endif %}

  {% if tags is defined and tags is not empty %}
    <li class=\"sep\">
      <a class=\"subheader\">{{ 'Tags' | trans }}</a>
    </li>
    {% for Tag in tags %}
      <li class=\"{% if active == 'admin_tag_view' and param.tag is defined and param.tag == Tag.label %}active{% endif %}\">
        <a href=\"{{path('admin_tag_view', {'tag': Tag.label})}}\">
          <i class=\"material-icons\">bookmark</i>{{Tag.label}}</a>
      </li>
    {% endfor %}
  {% endif %}

  {# <li class=\"{% if active starts with 'admin_calendar' %}active{% endif %}\"><a href=\"{{path('admin_calendar')}}\"><span><i class=\"fa fa-calendar fa-fw\"></i>{{'nav.calendar'|trans}}</a>
\t<ul class=\"sub\">
\t\t<li class=\"{% if active == 'admin_calendar' and param.type is defined and param.type == 'day' %}active{% endif %}\"><a href=\"{{path('admin_calendar', {'type': 'day'})}}\"><span>{{'nav.calendar.today'|trans}}</a></li>
\t\t<li class=\"{% if active == 'admin_calendar' and param.type is defined and param.type == 'yesterday' %}active{% endif %}\"><a href=\"{{path('admin_calendar', {'type': 'yesterday'})}}\"><span>{{'nav.calendar.yesterday'|trans}}</a></li>
\t\t<li class=\"{% if active == 'admin_calendar' and param.type is defined and param.type == 'week' %}active{% endif %}\"><a href=\"{{path('admin_calendar', {'type': 'week'})}}\"><span>{{'nav.calendar.thisweek'|trans}}</a></li>
\t\t<li class=\"{% if active == 'admin_calendar' and param.type is defined and param.type == 'month' %}active{% endif %}\"><a href=\"{{path('admin_calendar', {'type': 'month'})}}\"><span>{{'nav.calendar.thismonth'|trans}}</a></li>
\t</ul></li> #}

  <li class=\"sep\">
    <a class=\"subheader\">{{ 'Systeem' | trans }}</a>
  </li>

    {% if app.User.checkPermissions('ALLOW_CONFIGURATION') %}
      <li class=\"{% if active == 'admin_settings' %}active{% endif %}\">
        <a href=\"{{path('admin_settings')}}\"><i class=\"fa fa-fw fa-cog\"></i>{{'Configuratie'|trans}}</a>
      </li>
      {% if app.User.checkPermissions('ALLOW_PAGE') %}
        {% if is_granted('ROLE_SUPER_ADMIN') %}
          {% if app.User.checkPermissions('ALLOW_BUNDLES') %}
            <li class=\"{% if active == 'admin_page_bundles' %}active{% endif %}\">
              <a href=\"{{path('admin_page_bundles')}}\">
                <i class=\"fa fa-fw fa-puzzle-piece\"></i> {{'Gekoppelde extensies'|trans}}</a>
            </li>
          {% endif %}

          <li class=\"{% if active == 'admin_metadata' %}active{% endif %}\">
            <a href=\"{{path('admin_metadata')}}\">
              <i class=\"fa fa-fw fa-tag\"></i> {{'Metatags beheren'|trans}}</a>
          </li>
        {% endif %}
      {% endif %}
      {% if app.User.checkPermissions('ALLOW_REDIRECTS') %}
        <li class=\"{% if active starts with 'admin_redirects' %}active{% endif %}\">
          <a href=\"{{path('admin_redirects')}}\">
            <i class=\"fa fa-random\"></i>{{'Redirects beheren'|trans}}</a>
        </li>
      {% endif %}
      {% if is_granted('ROLE_SUPER_ADMIN') %}
        <li class=\"{% if active == 'admin_settings_languages' %}active{% endif %}\">
          <a href=\"{{path('admin_settings_languages')}}\">
            <i class=\"fa fa-fw fa-language\"></i>{{'Talen'|trans}}</a>
        </li>
      {% endif %}

      {% if is_granted('ROLE_SUPER_ADMIN') or app.User.checkPermissions('ALLOW_EMAIL_TEMPLATES') %}
        <li class=\"{% if active starts with 'admin_mail' %}active{% endif %}\">
          <a href=\"{{path('admin_mail')}}\">
            <i class=\"fa fa-fw fa-envelope-open\"></i>{{'E-mail inhoud'|trans}}</a>
        </li>
      {% endif %}

      {% if is_granted('ROLE_SUPER_ADMIN') %}
        <li class=\"{% if active starts with 'admin_settings_mailtest' %}active{% endif %}\">
          <a href=\"{{path('admin_settings_mailtest')}}\">
            <i class=\"fa fa-fw fa-paper-plane\"></i>{{'E-mail testen'|trans}}</a>
        </li>
        <li class=\"{% if active starts with 'admin_cron' %}active{% endif %}\">
          <a href=\"{{path('admin_cron')}}\">
          <i class=\"far fa-fw fa-clock\"></i>{{'Cronjob'|trans}}</a>
        </li>
      {% endif %}
    {% endif %}

    {% if Settings.uptimeRobotKey %}
      <li class=\"{% if active starts with 'admin_status' %}active{% endif %}\">
        <a href=\"{{path('admin_status')}}\">
          <i class=\"material-icons\">network_check</i>{{'Status'|trans}}
        </a>
      </li>
    {% endif %}

  {# {% if app.User.checkPermissions('ALLOW_ANALYTICS') %}
\t<li class=\"{% if active starts with 'admin_analytics' %}active{% endif %}\"><a href=\"{{path('admin_analytics')}}\"><i class=\"material-icons\">pie_chart</i>{{'Analytics'|trans}}</a></li>
  {% endif %} #}
    {% if app.User.checkPermissions('ALLOW_USERS') %}
      <li class=\"{% if active starts with 'admin_users' %}active{% endif %}\">
        <a href=\"{{path('admin_users')}}\">
          {# {% if moderation is defined and moderation > 0 %}<span class=\"new badge\" data-badge-caption=\"\">{{moderation}}</span>{% elseif ipblocks is defined and (ipblocks|length) > 0 and is_granted('ROLE_SUPER_ADMIN') %}<span class=\"new badge red\" data-badge-caption=\"\">{{ipblocks|length}}</span>{% endif %} #}
          <i class=\"far fa-fw fa-user\"></i>{{'Gebruikers'|trans}}
        </a>
          {#
        <ul class=\"sub\">
          <li class=\"{% if active == 'admin_users_edit' %}active{% endif %}\">
            <a href=\"{{path('admin_users_edit')}}\">
              <i class=\"material-icons\">add</i>{{'Toevoegen'|trans}}</a>
          </li>
        </ul>
        #}
      </li>
    {% endif %}
  {% if is_granted('ROLE_SUPER_ADMIN') %}
  \t<li class=\"{% if active starts with 'admin_multisite' %}active{% endif %}\">
  \t\t<a href=\"{{path('admin_multisite')}}\">
  \t\t\t<i class=\"fa fa-sitemap\"></i> {{'Multi-site configuratie'|trans}}
  \t\t</a>
  \t</li>
  {% endif %}

  {% if is_granted('ROLE_SUPER_ADMIN') %}
    <li class=\"{% if active starts with 'admin_system' or active starts with 'admin_install' or active starts with 'admin_update' %}active{% endif %}\">
      <a href=\"{{path('admin_system')}}\">
        <i class=\"fa fa-fw fa-database\"></i>{{'Backups'|trans}}</a>
        {#
      <ul class=\"sub\">
        <li class=\"{% if active starts with 'admin_install' %}active{% endif %}\">
          <a href=\"{{path('admin_install')}}\">
            <i class=\"material-icons\">cloud_download</i>{{'Extensies'|trans}}</a>
        </li>

        {% if apiRoute is defined and apiRoute %}
          <li class=\"{% if active starts with apiRoute.route %}active{% endif %}\">
            <a href=\"{{path(apiRoute.route)}}\">
              <i class=\"material-icons\">{{apiRoute.icon ? apiRoute.icon : 'dashboard'}}</i>{{apiRoute.name|trans}}</a>
            {% if apiRoute.nav is defined and apiRoute.nav is not empty %}
              <ul class=\"sub\">
                {% for nav in apiRoute.nav %}
                  <li class=\"{% if active == nav.route %}active{% endif %}\">
                    <a href=\"{{path(nav.route)}}\">{{nav.label|trans|raw}}</a>
                  </li>
                {% endfor %}
              </ul>
            {% endif %}
          </li>
        {% endif %}
      </ul>
      #}
    </li>

    <li class=\"{% if active starts with 'admin_log' %}active{% endif %}\">
      <a href=\"{{path('admin_log')}}\">
        <i class=\"fa fa-fw fa-clipboard-check\"></i>{{'Systeem log'|trans}}</a>
    </li>
  {% endif %}

  <li class=\"{% if active starts with 'admin_about' %}active{% endif %}\">
    <a href=\"{{path('admin_about')}}\">
      <i class=\"fa fa-fw fa-info-circle\"></i>{{'Over'|trans}}
      {{trinity}}</a>
  </li>
</ul>
{#
<ul class=\"nav-tray right hide-on-large-only show-on-med-and-down\">
  <li data-info=\"{{'Uitloggen'|trans}}\">
    <a href=\"{{logout_path('admin_secured_area')}}\">
      <i class=\"fa fa-power-off\"></i>Uitloggen
    </a>
  </li>
</ul>
#}
", "@Cms/menu/main.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/menu/main.html.twig");
    }
}
