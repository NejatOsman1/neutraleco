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
class __TwigTemplate_e8ffd063c44866c490b700255e8f4047 extends Template
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
        // line 2
        echo "
";
        // line 3
        $context["active"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 3), "attributes", [], "any", false, false, false, 3), "get", [0 => "_route"], "method", false, false, false, 3);
        // line 4
        $context["param"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 4), "attributes", [], "any", false, false, false, 4), "get", [0 => "_route_params"], "method", false, false, false, 4);
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
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "User", [], "any", false, false, false, 23), "checkPermissions", [0 => "ALLOW_DASHBOARD"], "method", false, false, false, 23) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "piwikUrl", [], "any", false, false, false, 23))) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "piwikApiHash", [], "any", false, false, false, 23)))) {
            // line 24
            echo "    <li class=\"";
            if ((($context["active"] ?? null) == "admin")) {
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
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "User", [], "any", false, false, false, 30), "checkPermissions", [0 => "ALLOW_PAGE"], "method", false, false, false, 30)) {
            // line 31
            echo "    <li class=\"";
            if ((is_string($__internal_compile_0 = ($context["active"] ?? null)) && is_string($__internal_compile_1 = "admin_page") && ('' === $__internal_compile_1 || 0 === strpos($__internal_compile_0, $__internal_compile_1)))) {
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
        if ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "calendar", [], "any", true, true, false, 51) && (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "calendar", [], "any", false, false, false, 51) == true))) {
            // line 52
            echo "\t<li class=\"";
            if ((is_string($__internal_compile_2 = ($context["active"] ?? null)) && is_string($__internal_compile_3 = "admin_calendar") && ('' === $__internal_compile_3 || 0 === strpos($__internal_compile_2, $__internal_compile_3)))) {
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
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "User", [], "any", false, false, false, 70), "checkPermissions", [0 => "ALLOW_MEDIA"], "method", false, false, false, 70)) {
            // line 71
            echo "    <li class=\"";
            if ((is_string($__internal_compile_4 = ($context["active"] ?? null)) && is_string($__internal_compile_5 = "admin_media") && ('' === $__internal_compile_5 || 0 === strpos($__internal_compile_4, $__internal_compile_5)))) {
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
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "User", [], "any", false, false, false, 84), "checkPermissions", [0 => "ALLOW_NAVIGATION"], "method", false, false, false, 84) && twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "customNavigation", [], "any", false, false, false, 84))) {
            // line 85
            echo "    <li class=\"";
            if ((is_string($__internal_compile_6 = ($context["active"] ?? null)) && is_string($__internal_compile_7 = "admin_navigation") && ('' === $__internal_compile_7 || 0 === strpos($__internal_compile_6, $__internal_compile_7)))) {
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
        if (((array_key_exists("installed", $context) && twig_in_filter("WebshopBundle", ($context["installed"] ?? null))) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "User", [], "any", false, false, false, 90), "checkPermissions", [0 => "ALLOW_WEBSHOP"], "method", false, false, false, 90))) {
            // line 91
            echo "\t";
            if ( !twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "isCatalog", [], "any", false, false, false, 91)) {
                // line 92
                echo "\t\t<li class=\"";
                if ((is_string($__internal_compile_8 = ($context["active"] ?? null)) && is_string($__internal_compile_9 = "admin_mod_webshop") && ('' === $__internal_compile_9 || 0 === strpos($__internal_compile_8, $__internal_compile_9)))) {
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
                if (preg_match("/^(admin_mod_catalog_products|admin_mod_webshop_tags|admin_mod_webshop_tag_displays|admin_mod_webshop_products_edit|admin_mod_webshop_channable|admin_mod_webshop_googlemerchant)/", ($context["active"] ?? null))) {
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
                if (((twig_get_attribute($this->env, $this->source, ($context["WebshopSettings"] ?? null), "tagsEnabled", [], "any", false, false, false, 101) || twig_get_attribute($this->env, $this->source, ($context["WebshopSettings"] ?? null), "channable", [], "any", false, false, false, 101)) || twig_get_attribute($this->env, $this->source, ($context["WebshopSettings"] ?? null), "googlemerchant", [], "any", false, false, false, 101))) {
                    // line 102
                    echo "\t\t\t<ul class=\"sub\">
\t\t\t";
                }
                // line 104
                echo "\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, ($context["WebshopSettings"] ?? null), "tagsEnabled", [], "any", false, false, false, 104)) {
                    // line 105
                    echo "\t\t\t\t\t<li";
                    echo ((twig_in_filter("admin_mod_webshop_tags", ($context["active"] ?? null))) ? (" class=\"active\"") : (""));
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
                    echo ((twig_in_filter("admin_mod_webshop_tag_displays", ($context["active"] ?? null))) ? (" class=\"active\"") : (""));
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
                if (twig_get_attribute($this->env, $this->source, ($context["WebshopSettings"] ?? null), "channable", [], "any", false, false, false, 112)) {
                    // line 113
                    echo "\t\t\t\t\t<li";
                    echo ((twig_in_filter("admin_mod_webshop_channable", ($context["active"] ?? null))) ? (" class=\"active\"") : (""));
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
                if (twig_get_attribute($this->env, $this->source, ($context["WebshopSettings"] ?? null), "googlemerchant", [], "any", false, false, false, 116)) {
                    // line 117
                    echo "\t\t\t\t\t<li";
                    echo ((twig_in_filter("admin_mod_webshop_googlemerchant", ($context["active"] ?? null))) ? (" class=\"active\"") : (""));
                    echo "><a href=\"";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_webshop_googlemerchant");
                    echo "\"><i class=\"material-icons\">shopping_basket</i>";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Google Merchant XML", [], "cms");
                    echo "</a></li>
\t\t\t\t";
                }
                // line 119
                echo "\t\t\t";
                if (((twig_get_attribute($this->env, $this->source, ($context["WebshopSettings"] ?? null), "tagsEnabled", [], "any", false, false, false, 119) || twig_get_attribute($this->env, $this->source, ($context["WebshopSettings"] ?? null), "channable", [], "any", false, false, false, 119)) || twig_get_attribute($this->env, $this->source, ($context["WebshopSettings"] ?? null), "googlemerchant", [], "any", false, false, false, 119))) {
                    // line 120
                    echo "\t\t\t</ul>
\t\t\t";
                }
                // line 122
                echo "\t\t</li>

\t\t<li class=\"";
                // line 124
                if (preg_match("/^(admin_mod_catalog_categories|admin_mod_webshop_categories_edit)/", ($context["active"] ?? null))) {
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
                if (preg_match("/^(admin_mod_catalog_specs|admin_mod_webshop_specs_view)/", ($context["active"] ?? null))) {
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
                    if ((is_string($__internal_compile_10 = ($context["active"] ?? null)) && is_string($__internal_compile_11 = "admin_mod_catalog_config") && ('' === $__internal_compile_11 || 0 === strpos($__internal_compile_10, $__internal_compile_11)))) {
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
        if (((array_key_exists("installed", $context) && twig_in_filter("TicketsBundle", ($context["installed"] ?? null))) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "User", [], "any", false, false, false, 139), "checkPermissions", [0 => "ALLOW_BUNDLES"], "method", false, false, false, 139))) {
            // line 140
            echo "    <li class=\"";
            if ((is_string($__internal_compile_12 = ($context["active"] ?? null)) && is_string($__internal_compile_13 = "admin_mod_tickets") && ('' === $__internal_compile_13 || 0 === strpos($__internal_compile_12, $__internal_compile_13)))) {
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
        if (((array_key_exists("installed", $context) && twig_in_filter("JobsBundle", ($context["installed"] ?? null))) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "User", [], "any", false, false, false, 145), "checkPermissions", [0 => "ALLOW_BUNDLES"], "method", false, false, false, 145))) {
            // line 146
            echo "    <li class=\"";
            if ((is_string($__internal_compile_14 = ($context["active"] ?? null)) && is_string($__internal_compile_15 = "admin_mod_jobs") && ('' === $__internal_compile_15 || 0 === strpos($__internal_compile_14, $__internal_compile_15)))) {
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
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "User", [], "any", false, false, false, 152), "checkPermissions", [0 => "ALLOW_BUNDLES"], "method", false, false, false, 152)) {
            // line 153
            echo "    <li class=\"sep\">
      <a class=\"subheader\">";
            // line 154
            echo twig_escape_filter($this->env, ($context["trinity"] ?? null), "html", null, true);
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
            $context['_seq'] = twig_ensure_traversable(twig_sort_filter($this->env, ($context["modroutes"] ?? null)));
            foreach ($context['_seq'] as $context["_key"] => $context["route"]) {
                // line 160
                echo "      ";
                if (((((((( !twig_get_attribute($this->env, $this->source, $context["route"], "hidden", [], "any", true, true, false, 160) || (twig_get_attribute($this->env, $this->source, $context["route"], "hidden", [], "any", false, false, false, 160) != true)) && (twig_get_attribute($this->env, $this->source, $context["route"], "route", [], "any", false, false, false, 160) != "admin_mod_tickets")) && (twig_get_attribute($this->env, $this->source, $context["route"], "route", [], "any", false, false, false, 160) != "admin_mod_webshop")) && (twig_get_attribute($this->env, $this->source, $context["route"], "route", [], "any", false, false, false, 160) != "admin_mod_search")) && (twig_get_attribute($this->env, $this->source, $context["route"], "route", [], "any", false, false, false, 160) != "admin_mod_jobs")) && (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["route"], "bundleName", [], "any", false, false, false, 160), twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "visibleBundles", [], "any", false, false, false, 160)) || (twig_length_filter($this->env, ($context["multisite"] ?? null)) <= 1))) && (twig_get_attribute($this->env, $this->source, $context["route"], "route", [], "any", false, false, false, 160) != "admin_mod_questionsandanswers"))) {
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
                        if ((is_string($__internal_compile_16 = ($context["active"] ?? null)) && is_string($__internal_compile_17 = twig_get_attribute($this->env, $this->source, $context["route"], "route", [], "any", false, false, false, 164)) && ('' === $__internal_compile_17 || 0 === strpos($__internal_compile_16, $__internal_compile_17)))) {
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
                                if ((($context["active"] ?? null) == twig_get_attribute($this->env, $this->source, $context["nav"], "route", [], "any", false, false, false, 177))) {
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
        if ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "ccEnabled", [], "any", false, false, false, 189) && $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN"))) {
            // line 190
            echo "    <li class=\"sep\">
      <a class=\"subheader\">";
            // line 191
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Command &amp; Control", [], "cms"), "html", null, true);
            echo "</a>
    </li>
    <li class=\"";
            // line 193
            if ((($context["active"] ?? null) == "admin_cc")) {
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
            if ((($context["active"] ?? null) == "admin_monitor")) {
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
        if ((array_key_exists("tags", $context) &&  !twig_test_empty(($context["tags"] ?? null)))) {
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
            $context['_seq'] = twig_ensure_traversable(($context["tags"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Tag"]) {
                // line 208
                echo "      <li class=\"";
                if ((((($context["active"] ?? null) == "admin_tag_view") && twig_get_attribute($this->env, $this->source, ($context["param"] ?? null), "tag", [], "any", true, true, false, 208)) && (twig_get_attribute($this->env, $this->source, ($context["param"] ?? null), "tag", [], "any", false, false, false, 208) == twig_get_attribute($this->env, $this->source, $context["Tag"], "label", [], "any", false, false, false, 208)))) {
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
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "User", [], "any", false, false, false, 227), "checkPermissions", [0 => "ALLOW_CONFIGURATION"], "method", false, false, false, 227)) {
            // line 228
            echo "      <li class=\"";
            if ((($context["active"] ?? null) == "admin_settings")) {
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
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "User", [], "any", false, false, false, 231), "checkPermissions", [0 => "ALLOW_PAGE"], "method", false, false, false, 231)) {
                // line 232
                echo "        ";
                if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
                    // line 233
                    echo "          ";
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "User", [], "any", false, false, false, 233), "checkPermissions", [0 => "ALLOW_BUNDLES"], "method", false, false, false, 233)) {
                        // line 234
                        echo "            <li class=\"";
                        if ((($context["active"] ?? null) == "admin_page_bundles")) {
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
                    if ((($context["active"] ?? null) == "admin_metadata")) {
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
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "User", [], "any", false, false, false, 246), "checkPermissions", [0 => "ALLOW_REDIRECTS"], "method", false, false, false, 246)) {
                // line 247
                echo "        <li class=\"";
                if ((is_string($__internal_compile_18 = ($context["active"] ?? null)) && is_string($__internal_compile_19 = "admin_redirects") && ('' === $__internal_compile_19 || 0 === strpos($__internal_compile_18, $__internal_compile_19)))) {
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
                if ((($context["active"] ?? null) == "admin_settings_languages")) {
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
            if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN") || twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "User", [], "any", false, false, false, 259), "checkPermissions", [0 => "ALLOW_EMAIL_TEMPLATES"], "method", false, false, false, 259))) {
                // line 260
                echo "        <li class=\"";
                if ((is_string($__internal_compile_20 = ($context["active"] ?? null)) && is_string($__internal_compile_21 = "admin_mail") && ('' === $__internal_compile_21 || 0 === strpos($__internal_compile_20, $__internal_compile_21)))) {
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
                if ((is_string($__internal_compile_22 = ($context["active"] ?? null)) && is_string($__internal_compile_23 = "admin_settings_mailtest") && ('' === $__internal_compile_23 || 0 === strpos($__internal_compile_22, $__internal_compile_23)))) {
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
                if ((is_string($__internal_compile_24 = ($context["active"] ?? null)) && is_string($__internal_compile_25 = "admin_cron") && ('' === $__internal_compile_25 || 0 === strpos($__internal_compile_24, $__internal_compile_25)))) {
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
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "uptimeRobotKey", [], "any", false, false, false, 278)) {
            // line 279
            echo "      <li class=\"";
            if ((is_string($__internal_compile_26 = ($context["active"] ?? null)) && is_string($__internal_compile_27 = "admin_status") && ('' === $__internal_compile_27 || 0 === strpos($__internal_compile_26, $__internal_compile_27)))) {
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
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "User", [], "any", false, false, false, 289), "checkPermissions", [0 => "ALLOW_USERS"], "method", false, false, false, 289)) {
            // line 290
            echo "      <li class=\"";
            if ((is_string($__internal_compile_28 = ($context["active"] ?? null)) && is_string($__internal_compile_29 = "admin_users") && ('' === $__internal_compile_29 || 0 === strpos($__internal_compile_28, $__internal_compile_29)))) {
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
            if ((is_string($__internal_compile_30 = ($context["active"] ?? null)) && is_string($__internal_compile_31 = "admin_multisite") && ('' === $__internal_compile_31 || 0 === strpos($__internal_compile_30, $__internal_compile_31)))) {
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
            if ((((is_string($__internal_compile_32 = ($context["active"] ?? null)) && is_string($__internal_compile_33 = "admin_system") && ('' === $__internal_compile_33 || 0 === strpos($__internal_compile_32, $__internal_compile_33))) || (is_string($__internal_compile_34 = ($context["active"] ?? null)) && is_string($__internal_compile_35 = "admin_install") && ('' === $__internal_compile_35 || 0 === strpos($__internal_compile_34, $__internal_compile_35)))) || (is_string($__internal_compile_36 = ($context["active"] ?? null)) && is_string($__internal_compile_37 = "admin_update") && ('' === $__internal_compile_37 || 0 === strpos($__internal_compile_36, $__internal_compile_37))))) {
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
            if ((is_string($__internal_compile_38 = ($context["active"] ?? null)) && is_string($__internal_compile_39 = "admin_log") && ('' === $__internal_compile_39 || 0 === strpos($__internal_compile_38, $__internal_compile_39)))) {
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
        if ((is_string($__internal_compile_40 = ($context["active"] ?? null)) && is_string($__internal_compile_41 = "admin_about") && ('' === $__internal_compile_41 || 0 === strpos($__internal_compile_40, $__internal_compile_41)))) {
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
        echo twig_escape_filter($this->env, ($context["trinity"] ?? null), "html", null, true);
        echo "</a>
  </li>
</ul>
";
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
        return array (  900 => 352,  896 => 351,  892 => 350,  886 => 349,  883 => 348,  877 => 345,  873 => 344,  867 => 343,  863 => 341,  859 => 316,  855 => 315,  848 => 314,  846 => 313,  843 => 312,  836 => 308,  832 => 307,  825 => 306,  822 => 305,  818 => 303,  812 => 293,  808 => 291,  801 => 290,  798 => 289,  795 => 285,  788 => 281,  784 => 280,  777 => 279,  775 => 278,  772 => 277,  769 => 276,  763 => 273,  759 => 272,  753 => 271,  748 => 269,  744 => 268,  737 => 267,  735 => 266,  732 => 265,  726 => 262,  722 => 261,  715 => 260,  713 => 259,  710 => 258,  704 => 255,  700 => 254,  693 => 253,  690 => 252,  684 => 249,  680 => 248,  673 => 247,  670 => 246,  667 => 245,  661 => 242,  657 => 241,  651 => 240,  648 => 239,  642 => 236,  638 => 235,  631 => 234,  628 => 233,  625 => 232,  623 => 231,  616 => 229,  609 => 228,  607 => 227,  601 => 224,  597 => 222,  594 => 214,  591 => 213,  582 => 210,  578 => 209,  571 => 208,  567 => 207,  562 => 205,  559 => 204,  557 => 203,  554 => 202,  548 => 199,  544 => 198,  538 => 197,  533 => 195,  529 => 194,  523 => 193,  518 => 191,  515 => 190,  513 => 189,  510 => 188,  507 => 187,  501 => 186,  498 => 185,  494 => 183,  490 => 181,  479 => 178,  472 => 177,  468 => 176,  465 => 175,  463 => 174,  460 => 173,  452 => 171,  450 => 170,  442 => 168,  440 => 167,  438 => 166,  434 => 165,  427 => 164,  424 => 163,  421 => 162,  418 => 161,  415 => 160,  410 => 159,  407 => 158,  399 => 154,  396 => 153,  394 => 152,  391 => 151,  385 => 148,  381 => 147,  374 => 146,  371 => 145,  365 => 142,  361 => 141,  354 => 140,  351 => 139,  348 => 138,  345 => 137,  339 => 134,  335 => 133,  328 => 132,  326 => 131,  319 => 129,  313 => 128,  305 => 125,  299 => 124,  295 => 122,  291 => 120,  288 => 119,  278 => 117,  276 => 116,  273 => 115,  263 => 113,  260 => 112,  252 => 109,  248 => 108,  241 => 106,  236 => 105,  233 => 104,  229 => 102,  227 => 101,  221 => 100,  215 => 99,  209 => 98,  204 => 97,  198 => 94,  194 => 93,  187 => 92,  184 => 91,  181 => 90,  175 => 87,  171 => 86,  164 => 85,  161 => 84,  157 => 82,  153 => 73,  149 => 72,  142 => 71,  139 => 70,  131 => 65,  125 => 62,  119 => 59,  113 => 56,  105 => 53,  98 => 52,  95 => 51,  91 => 49,  85 => 32,  78 => 31,  76 => 30,  73 => 29,  67 => 26,  63 => 25,  56 => 24,  54 => 23,  51 => 22,  47 => 15,  44 => 5,  42 => 4,  40 => 3,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/menu/main.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/menu/main.html.twig");
    }
}
