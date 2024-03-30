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

/* @Cms/includes/menu-links.html.twig */
class __TwigTemplate_fc44df3ac8f41a147068df9fa26ce9b8 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Cms/includes/menu-links.html.twig"));

        // line 2
        echo "
";
        // line 3
        if ( !array_key_exists("pageIndex", $context)) {
            // line 4
            echo "\t";
            $context["pageIndex"] = false;
        }
        // line 6
        echo "
";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pages"]) || array_key_exists("pages", $context) ? $context["pages"] : (function () { throw new RuntimeError('Variable "pages" does not exist.', 7, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["pagedata"]) {
            // line 8
            echo "<li class=\"page-entry\" id=\"page_";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 8), "id", [], "any", false, false, false, 8), "html", null, true);
            echo "\" style=\"position: relative;\">
  <div
    class=\"page-entry-content ";
            // line 10
            if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 10), "visible", [], "any", false, false, false, 10) == false) || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 10), "enabled", [], "any", false, false, false, 10) == false))) {
                echo "opaque";
            }
            echo "\"
    data-slug=\"";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 11), "slugKey", [], "any", false, false, false, 11), "html", null, true);
            echo "\"
    data-simpleslug=\"";
            // line 12
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 12), "slug", [], "any", false, false, false, 12), "html", null, true);
            echo "\"
    data-url=\"";
            // line 13
            echo twig_escape_filter($this->env, twig_replace_filter($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 13), "slugkey", [], "any", false, false, false, 13)), ["app_dev.php/" => ""]), "html", null, true);
            echo "\"
    data-label=\"";
            // line 14
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 14), "label", [], "any", false, false, false, 14), "html", null, true);
            echo "\"
    data-pageid=\"";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 15), "id", [], "any", false, false, false, 15), "html", null, true);
            echo "\">

    <div class=\"entry-left\">
      <span class=\"left disclose\"></span>

      ";
            // line 20
            if (( !array_key_exists("selector", $context) || ((isset($context["selector"]) || array_key_exists("selector", $context) ? $context["selector"] : (function () { throw new RuntimeError('Variable "selector" does not exist.', 20, $this->source); })()) == false))) {
                // line 21
                echo "        <div class=\"bulk-checkbox\">
          <p>
            <input type=\"checkbox\" class=\"bulk-check\" id=\"bulk-";
                // line 23
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 23), "id", [], "any", false, false, false, 23), "html", null, true);
                echo "\" name=\"bulk[]\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 23), "id", [], "any", false, false, false, 23), "html", null, true);
                echo "\" />
            <label for=\"bulk-";
                // line 24
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 24), "id", [], "any", false, false, false, 24), "html", null, true);
                echo "\"></label>
          </p>
        </div>
      ";
            }
            // line 28
            echo "
      <span class=\"label\">
        <a";
            // line 30
            if (((null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 30, $this->source); })()), "request", [], "any", false, false, false, 30), "query", [], "any", false, false, false, 30), "get", [0 => "ckeditor"], "method", false, false, false, 30)) && ( !array_key_exists("modal", $context) || array_key_exists("allowLinks", $context)))) {
                echo " href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_edit", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 30), "id", [], "any", false, false, false, 30)]), "html", null, true);
                echo "\" ";
            }
            echo ">
          ";
            // line 31
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 31), "label", [], "any", false, false, false, 31);
            echo "
        </a>
      </span>
    </div>

    <div class=\"entry-right\">
      ";
            // line 37
            if (((null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 37, $this->source); })()), "request", [], "any", false, false, false, 37), "query", [], "any", false, false, false, 37), "get", [0 => "CKEditor"], "method", false, false, false, 37)) &&  !array_key_exists("modal", $context))) {
                // line 38
                echo "        <span class=\"actions\">
          ";
                // line 39
                if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
                    // line 40
                    echo "            <span class=\"layout-name\" title=\"";
                    if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 40), "layout", [], "any", false, false, false, 40))) {
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 40), "getLayoutLabel", [], "any", false, false, false, 40), "html", null, true);
                    }
                    echo "\" data-bs-toggle=\"tooltip\">
              ";
                    // line 41
                    if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 41), "layout", [], "any", false, false, false, 41)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 41), "layout", [], "any", false, false, false, 41) != "default"))) {
                        // line 42
                        echo "                <i class=\"fa fa-fill-drip\"></i>
              ";
                    }
                    // line 44
                    echo "            </span>
          ";
                }
                // line 46
                echo "
          ";
                // line 47
                if (((isset($context["ActivePage"]) || array_key_exists("ActivePage", $context) ? $context["ActivePage"] : (function () { throw new RuntimeError('Variable "ActivePage" does not exist.', 47, $this->source); })()) == twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 47))) {
                    // line 48
                    echo "            <span class=\"layout-name\" title=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Homepagina", [], "cms"), "html", null, true);
                    echo "\" data-bs-toggle=\"tooltip\">
              <i class=\"fa fa-home\"></i>
            </span>
          ";
                }
                // line 52
                echo "          ";
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 52), "pageType", [], "any", false, false, false, 52) == "child")) {
                    // line 53
                    echo "            <span class=\"layout-name\" title=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijst naar onderliggende pagina", [], "cms"), "html", null, true);
                    echo "\" data-bs-toggle=\"tooltip\">
              <i class=\"fa fa-level-down-alt\"></i>
            </span>
          ";
                }
                // line 57
                echo "          ";
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 57), "pageType", [], "any", false, false, false, 57) == "external")) {
                    // line 58
                    echo "            <span class=\"layout-name\" title=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijst naar externe link", [], "cms"), "html", null, true);
                    echo "\" data-bs-toggle=\"tooltip\">
              <i class=\"fa fa-link\"></i>
            </span>
          ";
                }
                // line 62
                echo "
          ";
                // line 63
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 63), "access", [], "any", false, false, false, 63) == "password")) {
                    // line 64
                    echo "            <span class=\"layout-name\" title=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Voor deze pagina is een wachtwoord vereist", [], "cms"), "html", null, true);
                    echo "\" data-bs-toggle=\"tooltip\">
              <i class=\"fa fa-key\"></i>
            </span>
          ";
                } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                 // line 67
$context["pagedata"], "Page", [], "any", false, false, false, 67), "access", [], "any", false, false, false, 67) == "login")) {
                    // line 68
                    echo "            <span class=\"layout-name\" title=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Voor deze pagina moet ingelogd worden", [], "cms"), "html", null, true);
                    echo "\" data-bs-toggle=\"tooltip\">
              <i class=\"fa fa-lock\"></i>
            </span>
          ";
                } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                 // line 71
$context["pagedata"], "Page", [], "any", false, false, false, 71), "access", [], "any", false, false, false, 71) == "no-login")) {
                    // line 72
                    echo "            <span class=\"layout-name\" title=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Deze pagina is enkel anoniem toegankelijk", [], "cms"), "html", null, true);
                    echo "\" data-bs-toggle=\"tooltip\">
              <i class=\"fa fa-unlock\"></i>
            </span>
          ";
                } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                 // line 75
$context["pagedata"], "Page", [], "any", false, false, false, 75), "access", [], "any", false, false, false, 75) == "no-role")) {
                    // line 76
                    echo "            <span class=\"layout-name\" title=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Deze pagina is alleen toegankelijk als een bepaalde rol NIET is toegewezen", [], "cms"), "html", null, true);
                    echo "\" data-bs-toggle=\"tooltip\">
              <i class=\"fa fa-user-tag\"></i>
            </span>
          ";
                }
                // line 80
                echo "
          <div class=\"dropdown\">
            <a class=\"dropdown-toggle\" id=\"page-item-dropdown\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
              <i class=\"fa fa-fw fa-ellipsis-v\"></i>
            </a>
            <div class=\"dropdown-menu\" aria-labelledby=\"page-item-dropdown\">
              <div class=\"dropdown-item-wrapper\">
\t\t\t\t\t\t<a class=\"dropdown-item\" ";
                // line 87
                if (((null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 87, $this->source); })()), "request", [], "any", false, false, false, 87), "query", [], "any", false, false, false, 87), "get", [0 => "ckeditor"], "method", false, false, false, 87)) && ( !array_key_exists("modal", $context) || array_key_exists("allowLinks", $context)))) {
                    echo "href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_edit", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 87), "id", [], "any", false, false, false, 87)]), "html", null, true);
                    echo "\"";
                }
                echo " title=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bewerken", [], "cms"), "html", null, true);
                echo "\">
                  <i class=\"fa fa-fw fa-edit\"></i> Bewerken
                </a>
              </div>
              <div class=\"dropdown-item-wrapper\">
                <a class=\" tt-downloaden dropdown-item\" title=\"";
                // line 92
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Downloaden", [], "cms"), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Downloaden", [], "cms"), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_download", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 92), "id", [], "any", false, false, false, 92)]), "html", null, true);
                echo "\">
                  <i class=\"fa fa-fw fa-download\"></i> ";
                // line 93
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Downloaden", [], "cms"), "html", null, true);
                echo "
                </a>
              </div>
              <div class=\"dropdown-item-wrapper\">
                <a class=\" tt-toevoegen dropdown-item\" title=\"";
                // line 97
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sub-pagina aanmaken", [], "cms"), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sub-pagina aanmaken", [], "cms"), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_edit", ["parent" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 97), "id", [], "any", false, false, false, 97)]), "html", null, true);
                echo "\">
                  <i class=\"fa fa-fw fa-stream\"></i> ";
                // line 98
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sub-pagina aanmaken", [], "cms"), "html", null, true);
                echo "
                </a>
              </div>
              <div class=\"dropdown-item-wrapper\">
                <a class=\"tt-weergeven dropdown-item\" title=\"";
                // line 102
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bekijken", [], "cms"), "html", null, true);
                echo "\" id=\"slugpath-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 102), "id", [], "any", false, false, false, 102), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bekijken", [], "cms"), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, ((isset($context["host"]) || array_key_exists("host", $context) ? $context["host"] : (function () { throw new RuntimeError('Variable "host" does not exist.', 102, $this->source); })()) . ((((isset($context["ActivePage"]) || array_key_exists("ActivePage", $context) ? $context["ActivePage"] : (function () { throw new RuntimeError('Variable "ActivePage" does not exist.', 102, $this->source); })()) == twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 102))) ? ("") : ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 102), "slugkey", [], "any", false, false, false, 102))))), "html", null, true);
                echo "\" target=\"_blank\" >
                  <i class=\"fa fa-fw fa-external-link-alt\"></i> ";
                // line 103
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bekijken", [], "cms"), "html", null, true);
                echo "
                </a>
              </div>
              <div class=\"dropdown-item-wrapper d-lg-none\">
                <a class=\"dropdown-item popup\" title=\"";
                // line 107
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina dupliceren", [], "cms"), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_clone", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 107), "id", [], "any", false, false, false, 107)]), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina dupliceren", [], "cms"), "html", null, true);
                echo "\">
                  <i class=\"far fa-fw fa-clone\"></i>
                  ";
                // line 109
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina dupliceren", [], "cms"), "html", null, true);
                echo "
                </a>
              </div>
              <div class=\"dropdown-item-wrapper d-lg-none\">
                <a class=\"dropdown-item\" title=\"";
                // line 113
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zichtbaarheid in menu", [], "cms"), "html", null, true);
                echo "\" onclick=\"togglePageVisibility(this); return false;\" data-pageid=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 113), "id", [], "any", false, false, false, 113), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zichtbaarheid in menu", [], "cms"), "html", null, true);
                echo "\" href=\"";
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_edit");
                echo "/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 113), "id", [], "any", false, false, false, 113), "html", null, true);
                echo "\">
                  <i class=\"";
                // line 114
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 114), "visible", [], "any", false, false, false, 114) == true)) {
                    echo "fa fa-fw fa-eye";
                }
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 114), "visible", [], "any", false, false, false, 114) == false)) {
                    echo "far fa-fw fa-eye-slash";
                }
                echo "\"></i>
                  ";
                // line 115
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zichtbaarheid in menu", [], "cms"), "html", null, true);
                echo "
                </a>
              </div>
              <div class=\"dropdown-item-wrapper d-lg-none\">
                <a class=\"dropdown-item\" title=\"";
                // line 119
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bereikbaarheid", [], "cms"), "html", null, true);
                echo "\" onclick=\"togglePageAvailability(this); return false;\" data-pageid=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 119), "id", [], "any", false, false, false, 119), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bereikbaarheid", [], "cms"), "html", null, true);
                echo "\" href=\"";
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_edit");
                echo "/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 119), "id", [], "any", false, false, false, 119), "html", null, true);
                echo "\">
                    <i class=\"";
                // line 120
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 120), "enabled", [], "any", false, false, false, 120)) {
                    echo "fa fa-fw fa-check-circle";
                } else {
                    echo "far fa-fw fa-circle";
                }
                echo "\"></i>
                    ";
                // line 121
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bereikbaarheid", [], "cms"), "html", null, true);
                echo "
                </a>
              </div>
              <div class=\"dropdown-item-wrapper d-lg-none\">
                <a class=\"dropdown-item confirm\" href=\"";
                // line 125
                echo twig_escape_filter($this->env, (($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_delete") . "/") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 125), "id", [], "any", false, false, false, 125)), "html", null, true);
                echo "\" data-callback=\"deleteNotify\" data-msg=\"Wilt u deze pagina verwijderen?\">
                  <i class=\"far fa-fw fa-trash-alt\"></i>
                  ";
                // line 127
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms"), "html", null, true);
                echo "
                </a>
              </div>
            </div>
          </div>

          <span class=\"d-none d-lg-inline-block\">
            <a class=\"popup\" title=\"";
                // line 134
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina dupliceren", [], "cms"), "html", null, true);
                echo "\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_clone", ["id" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 134), "id", [], "any", false, false, false, 134)]), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina dupliceren", [], "cms"), "html", null, true);
                echo "\" data-bs-toggle=\"tooltip\">
              <i class=\"far fa-fw fa-clone\"></i>
            </a>

            ";
                // line 138
                if ((isset($context["allowCache"]) || array_key_exists("allowCache", $context) ? $context["allowCache"] : (function () { throw new RuntimeError('Variable "allowCache" does not exist.', 138, $this->source); })())) {
                    // line 139
                    echo "              ";
                    if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
                        // line 140
                        echo "                <a class=\"\" title=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina critical CSS", [], "cms"), "html", null, true);
                        echo "\" onclick=\"togglePageCritical(this); return false;\" data-pageid=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 140), "id", [], "any", false, false, false, 140), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina critical css", [], "cms"), "html", null, true);
                        echo "\" data-bs-toggle=\"tooltip\">
                  <i class=\"";
                        // line 141
                        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 141), "critical", [], "any", false, false, false, 141) == true)) {
                            echo "fas";
                        } else {
                            echo "far";
                        }
                        echo " fa-star\"></i>
                </a>
                <a class=\"\" title=\"";
                        // line 143
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina cache", [], "cms"), "html", null, true);
                        echo "\" onclick=\"togglePageCache(this); return false;\" data-pageid=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 143), "id", [], "any", false, false, false, 143), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina cache", [], "cms"), "html", null, true);
                        echo "\" data-bs-toggle=\"tooltip\">
                  <i class=\"";
                        // line 144
                        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 144), "cache", [], "any", false, false, false, 144) == true)) {
                            echo "fas";
                        } else {
                            echo "far";
                        }
                        echo " fa-bookmark\"></i>
                </a>
              ";
                    }
                    // line 147
                    echo "            ";
                }
                // line 148
                echo "
            <a class=\"\" title=\"";
                // line 149
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zichtbaarheid in menu", [], "cms"), "html", null, true);
                echo "\" onclick=\"togglePageVisibility(this); return false;\" data-pageid=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 149), "id", [], "any", false, false, false, 149), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zichtbaarheid in menu", [], "cms"), "html", null, true);
                echo "\" href=\"";
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_edit");
                echo "/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 149), "id", [], "any", false, false, false, 149), "html", null, true);
                echo "\" data-bs-toggle=\"tooltip\">
              <i class=\"";
                // line 150
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 150), "visible", [], "any", false, false, false, 150) == true)) {
                    echo "fa fa-fw fa-eye";
                }
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 150), "visible", [], "any", false, false, false, 150) == false)) {
                    echo "far fa-fw fa-eye-slash";
                }
                echo "\"></i>
            </a>

            <a class=\"\" title=\"";
                // line 153
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bereikbaarheid", [], "cms"), "html", null, true);
                echo "\" onclick=\"togglePageAvailability(this); return false;\" data-pageid=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 153), "id", [], "any", false, false, false, 153), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bereikbaarheid", [], "cms"), "html", null, true);
                echo "\" href=\"";
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_edit");
                echo "/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 153), "id", [], "any", false, false, false, 153), "html", null, true);
                echo "\" data-bs-toggle=\"tooltip\">
                <i class=\"";
                // line 154
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 154), "enabled", [], "any", false, false, false, 154)) {
                    echo "fa fa-fw fa-check-circle";
                } else {
                    echo "far fa-fw fa-circle";
                }
                echo "\"></i>
            </a>

            <a class=\"confirm\" href=\"";
                // line 157
                echo twig_escape_filter($this->env, (($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_delete") . "/") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 157), "id", [], "any", false, false, false, 157)), "html", null, true);
                echo "\" data-callback=\"deleteNotify\" data-msg=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u deze pagina verwijderen?", [], "cms"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina verwijderen", [], "cms"), "html", null, true);
                echo "\" data-bs-toggle=\"tooltip\">
              <i class=\"far fa-fw fa-trash-alt\"></i>
            </a>
          </span>
        </span>

        ";
                // line 163
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 163), "scores", [], "any", false, false, false, 163)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 163, $this->source); })()), "user", [], "any", false, false, false, 163), "username", [], "any", false, false, false, 163) == "admin"))) {
                    // line 164
                    echo "          ";
                    $context["score"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 164), "scores", [], "any", false, false, false, 164), "first", [], "any", false, false, false, 164), "score", [], "any", false, false, false, 164);
                    // line 165
                    echo "          <a
            href=\"";
                    // line 166
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_score", ["pageid" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pagedata"], "Page", [], "any", false, false, false, 166), "id", [], "any", false, false, false, 166)]), "html", null, true);
                    echo "\"
            class=\"";
                    // line 167
                    if (((isset($context["score"]) || array_key_exists("score", $context) ? $context["score"] : (function () { throw new RuntimeError('Variable "score" does not exist.', 167, $this->source); })()) < 50)) {
                        echo "red-text";
                    } elseif (((isset($context["score"]) || array_key_exists("score", $context) ? $context["score"] : (function () { throw new RuntimeError('Variable "score" does not exist.', 167, $this->source); })()) < 80)) {
                        echo "orange-text";
                    } else {
                        echo "green-text";
                    }
                    echo " right\">
            <i class=\"material-icons left\">star</i>
            ";
                    // line 169
                    echo twig_escape_filter($this->env, (isset($context["score"]) || array_key_exists("score", $context) ? $context["score"] : (function () { throw new RuntimeError('Variable "score" does not exist.', 169, $this->source); })()), "html", null, true);
                    echo "/100</a>
        ";
                }
                // line 171
                echo "      ";
            }
            // line 172
            echo "    </div>
  </div>

  ";
            // line 175
            if (twig_get_attribute($this->env, $this->source, $context["pagedata"], "children", [], "any", false, false, false, 175)) {
                // line 176
                echo "    <ol ";
                echo (((array_key_exists("selector", $context) && ((isset($context["selector"]) || array_key_exists("selector", $context) ? $context["selector"] : (function () { throw new RuntimeError('Variable "selector" does not exist.', 176, $this->source); })()) == true))) ? ("style=\"list-style: none; padding: 0;\"") : (""));
                echo ">
      ";
                // line 177
                $this->loadTemplate("@Cms/includes/menu-links.html.twig", "@Cms/includes/menu-links.html.twig", 177)->display(twig_array_merge($context, ["pages" => twig_get_attribute($this->env, $this->source, $context["pagedata"], "children", [], "any", false, false, false, 177), "depth" => (((array_key_exists("depth", $context)) ? ((isset($context["depth"]) || array_key_exists("depth", $context) ? $context["depth"] : (function () { throw new RuntimeError('Variable "depth" does not exist.', 177, $this->source); })())) : (0)) + 1)]));
                // line 178
                echo "    </ol>
  ";
            }
            // line 180
            echo "</li>
";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pagedata'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "@Cms/includes/menu-links.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  565 => 180,  561 => 178,  559 => 177,  554 => 176,  552 => 175,  547 => 172,  544 => 171,  539 => 169,  528 => 167,  524 => 166,  521 => 165,  518 => 164,  516 => 163,  503 => 157,  493 => 154,  481 => 153,  470 => 150,  458 => 149,  455 => 148,  452 => 147,  442 => 144,  434 => 143,  425 => 141,  416 => 140,  413 => 139,  411 => 138,  400 => 134,  390 => 127,  385 => 125,  378 => 121,  370 => 120,  358 => 119,  351 => 115,  342 => 114,  330 => 113,  323 => 109,  314 => 107,  307 => 103,  297 => 102,  290 => 98,  282 => 97,  275 => 93,  267 => 92,  253 => 87,  244 => 80,  236 => 76,  234 => 75,  227 => 72,  225 => 71,  218 => 68,  216 => 67,  209 => 64,  207 => 63,  204 => 62,  196 => 58,  193 => 57,  185 => 53,  182 => 52,  174 => 48,  172 => 47,  169 => 46,  165 => 44,  161 => 42,  159 => 41,  152 => 40,  150 => 39,  147 => 38,  145 => 37,  136 => 31,  128 => 30,  124 => 28,  117 => 24,  111 => 23,  107 => 21,  105 => 20,  97 => 15,  93 => 14,  89 => 13,  85 => 12,  81 => 11,  75 => 10,  69 => 8,  52 => 7,  49 => 6,  45 => 4,  43 => 3,  40 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{% trans_default_domain 'cms' %}

{% if pageIndex is not defined %}
\t{%  set pageIndex = false %}
{% endif %}

{% for pagedata in pages %}
<li class=\"page-entry\" id=\"page_{{pagedata.Page.id}}\" style=\"position: relative;\">
  <div
    class=\"page-entry-content {% if pagedata.Page.visible == false or pagedata.Page.enabled == false %}opaque{% endif %}\"
    data-slug=\"{{pagedata.Page.slugKey}}\"
    data-simpleslug=\"{{pagedata.Page.slug}}\"
    data-url=\"{{path(pagedata.Page.slugkey) | replace({'app_dev.php/': ''})}}\"
    data-label=\"{{pagedata.Page.label}}\"
    data-pageid=\"{{pagedata.Page.id}}\">

    <div class=\"entry-left\">
      <span class=\"left disclose\"></span>

      {% if selector is not defined or selector == false %}
        <div class=\"bulk-checkbox\">
          <p>
            <input type=\"checkbox\" class=\"bulk-check\" id=\"bulk-{{pagedata.Page.id}}\" name=\"bulk[]\" value=\"{{pagedata.Page.id}}\" />
            <label for=\"bulk-{{pagedata.Page.id}}\"></label>
          </p>
        </div>
      {% endif %}

      <span class=\"label\">
        <a{% if app.request.query.get(\"ckeditor\") is null and (modal is not defined or allowLinks is defined) %} href=\"{{path('admin_page_edit', {'id': pagedata.Page.id})}}\" {% endif %}>
          {{pagedata.Page.label|raw}}
        </a>
      </span>
    </div>

    <div class=\"entry-right\">
      {% if app.request.query.get(\"CKEditor\") is null and modal is not defined %}
        <span class=\"actions\">
          {% if is_granted('ROLE_SUPER_ADMIN') %}
            <span class=\"layout-name\" title=\"{% if pagedata.Page.layout is not empty %}{{pagedata.Page.getLayoutLabel}}{% endif %}\" data-bs-toggle=\"tooltip\">
              {% if pagedata.Page.layout is not empty and pagedata.Page.layout != 'default' %}
                <i class=\"fa fa-fill-drip\"></i>
              {% endif %}
            </span>
          {% endif %}

          {% if ActivePage == pagedata.Page %}
            <span class=\"layout-name\" title=\"{{'Homepagina'|trans}}\" data-bs-toggle=\"tooltip\">
              <i class=\"fa fa-home\"></i>
            </span>
          {% endif %}
          {% if pagedata.Page.pageType == 'child' %}
            <span class=\"layout-name\" title=\"{{'Verwijst naar onderliggende pagina'|trans}}\" data-bs-toggle=\"tooltip\">
              <i class=\"fa fa-level-down-alt\"></i>
            </span>
          {% endif %}
          {% if pagedata.Page.pageType == 'external' %}
            <span class=\"layout-name\" title=\"{{'Verwijst naar externe link'|trans}}\" data-bs-toggle=\"tooltip\">
              <i class=\"fa fa-link\"></i>
            </span>
          {% endif %}

          {% if pagedata.Page.access == 'password' %}
            <span class=\"layout-name\" title=\"{{'Voor deze pagina is een wachtwoord vereist'|trans}}\" data-bs-toggle=\"tooltip\">
              <i class=\"fa fa-key\"></i>
            </span>
          {% elseif pagedata.Page.access == 'login' %}
            <span class=\"layout-name\" title=\"{{'Voor deze pagina moet ingelogd worden'|trans}}\" data-bs-toggle=\"tooltip\">
              <i class=\"fa fa-lock\"></i>
            </span>
          {% elseif pagedata.Page.access == 'no-login' %}
            <span class=\"layout-name\" title=\"{{'Deze pagina is enkel anoniem toegankelijk'|trans}}\" data-bs-toggle=\"tooltip\">
              <i class=\"fa fa-unlock\"></i>
            </span>
          {% elseif pagedata.Page.access == 'no-role' %}
            <span class=\"layout-name\" title=\"{{'Deze pagina is alleen toegankelijk als een bepaalde rol NIET is toegewezen'|trans}}\" data-bs-toggle=\"tooltip\">
              <i class=\"fa fa-user-tag\"></i>
            </span>
          {% endif %}

          <div class=\"dropdown\">
            <a class=\"dropdown-toggle\" id=\"page-item-dropdown\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
              <i class=\"fa fa-fw fa-ellipsis-v\"></i>
            </a>
            <div class=\"dropdown-menu\" aria-labelledby=\"page-item-dropdown\">
              <div class=\"dropdown-item-wrapper\">
\t\t\t\t\t\t<a class=\"dropdown-item\" {% if app.request.query.get(\"ckeditor\") is null and (modal is not defined or allowLinks is defined) %}href=\"{{path('admin_page_edit', {'id': pagedata.Page.id})}}\"{% endif %} title=\"{{'Bewerken'|trans}}\">
                  <i class=\"fa fa-fw fa-edit\"></i> Bewerken
                </a>
              </div>
              <div class=\"dropdown-item-wrapper\">
                <a class=\" tt-downloaden dropdown-item\" title=\"{{ 'Downloaden' | trans }}\" alt=\"{{'Downloaden'|trans}}\" href=\"{{path('admin_page_download', {'id': pagedata.Page.id})}}\">
                  <i class=\"fa fa-fw fa-download\"></i> {{'Downloaden'|trans}}
                </a>
              </div>
              <div class=\"dropdown-item-wrapper\">
                <a class=\" tt-toevoegen dropdown-item\" title=\"{{ 'Sub-pagina aanmaken' | trans }}\" alt=\"{{'Sub-pagina aanmaken'|trans}}\" href=\"{{path('admin_page_edit', {'parent': pagedata.Page.id})}}\">
                  <i class=\"fa fa-fw fa-stream\"></i> {{'Sub-pagina aanmaken'|trans}}
                </a>
              </div>
              <div class=\"dropdown-item-wrapper\">
                <a class=\"tt-weergeven dropdown-item\" title=\"{{ 'Bekijken' | trans }}\" id=\"slugpath-{{pagedata.Page.id}}\" alt=\"{{'Bekijken'|trans}}\" href=\"{{host ~ (ActivePage == pagedata.Page ? '' : path(pagedata.Page.slugkey))}}\" target=\"_blank\" >
                  <i class=\"fa fa-fw fa-external-link-alt\"></i> {{ 'Bekijken' | trans }}
                </a>
              </div>
              <div class=\"dropdown-item-wrapper d-lg-none\">
                <a class=\"dropdown-item popup\" title=\"{{ 'Pagina dupliceren' | trans }}\" href=\"{{path('admin_page_clone', {'id': pagedata.Page.id})}}\" alt=\"{{'Pagina dupliceren'|trans}}\">
                  <i class=\"far fa-fw fa-clone\"></i>
                  {{ 'Pagina dupliceren' | trans }}
                </a>
              </div>
              <div class=\"dropdown-item-wrapper d-lg-none\">
                <a class=\"dropdown-item\" title=\"{{ 'Zichtbaarheid in menu' | trans }}\" onclick=\"togglePageVisibility(this); return false;\" data-pageid=\"{{pagedata.Page.id}}\" alt=\"{{'Zichtbaarheid in menu'|trans}}\" href=\"{{path('admin_page_edit')}}/{{pagedata.Page.id}}\">
                  <i class=\"{% if pagedata.Page.visible == true %}fa fa-fw fa-eye{% endif %}{% if pagedata.Page.visible == false %}far fa-fw fa-eye-slash{% endif %}\"></i>
                  {{ 'Zichtbaarheid in menu' | trans }}
                </a>
              </div>
              <div class=\"dropdown-item-wrapper d-lg-none\">
                <a class=\"dropdown-item\" title=\"{{ 'Bereikbaarheid' | trans }}\" onclick=\"togglePageAvailability(this); return false;\" data-pageid=\"{{pagedata.Page.id}}\" alt=\"{{'Bereikbaarheid'|trans}}\" href=\"{{path('admin_page_edit')}}/{{pagedata.Page.id}}\">
                    <i class=\"{% if pagedata.Page.enabled %}fa fa-fw fa-check-circle{% else %}far fa-fw fa-circle{% endif %}\"></i>
                    {{ 'Bereikbaarheid' | trans }}
                </a>
              </div>
              <div class=\"dropdown-item-wrapper d-lg-none\">
                <a class=\"dropdown-item confirm\" href=\"{{path('admin_page_delete') ~ '/' ~ pagedata.Page.id}}\" data-callback=\"deleteNotify\" data-msg=\"Wilt u deze pagina verwijderen?\">
                  <i class=\"far fa-fw fa-trash-alt\"></i>
                  {{ 'Verwijderen' | trans }}
                </a>
              </div>
            </div>
          </div>

          <span class=\"d-none d-lg-inline-block\">
            <a class=\"popup\" title=\"{{ 'Pagina dupliceren' | trans }}\" href=\"{{path('admin_page_clone', {'id': pagedata.Page.id})}}\" alt=\"{{'Pagina dupliceren'|trans}}\" data-bs-toggle=\"tooltip\">
              <i class=\"far fa-fw fa-clone\"></i>
            </a>

            {% if allowCache %}
              {% if is_granted('ROLE_SUPER_ADMIN') %}
                <a class=\"\" title=\"{{ 'Pagina critical CSS' | trans }}\" onclick=\"togglePageCritical(this); return false;\" data-pageid=\"{{pagedata.Page.id}}\" alt=\"{{'Pagina critical css'|trans}}\" data-bs-toggle=\"tooltip\">
                  <i class=\"{% if pagedata.Page.critical == true %}fas{% else %}far{% endif %} fa-star\"></i>
                </a>
                <a class=\"\" title=\"{{ 'Pagina cache' | trans }}\" onclick=\"togglePageCache(this); return false;\" data-pageid=\"{{pagedata.Page.id}}\" alt=\"{{'Pagina cache'|trans}}\" data-bs-toggle=\"tooltip\">
                  <i class=\"{% if pagedata.Page.cache == true %}fas{% else %}far{% endif %} fa-bookmark\"></i>
                </a>
              {% endif %}
            {% endif %}

            <a class=\"\" title=\"{{ 'Zichtbaarheid in menu' | trans }}\" onclick=\"togglePageVisibility(this); return false;\" data-pageid=\"{{pagedata.Page.id}}\" alt=\"{{'Zichtbaarheid in menu'|trans}}\" href=\"{{path('admin_page_edit')}}/{{pagedata.Page.id}}\" data-bs-toggle=\"tooltip\">
              <i class=\"{% if pagedata.Page.visible == true %}fa fa-fw fa-eye{% endif %}{% if pagedata.Page.visible == false %}far fa-fw fa-eye-slash{% endif %}\"></i>
            </a>

            <a class=\"\" title=\"{{ 'Bereikbaarheid' | trans }}\" onclick=\"togglePageAvailability(this); return false;\" data-pageid=\"{{pagedata.Page.id}}\" alt=\"{{'Bereikbaarheid'|trans}}\" href=\"{{path('admin_page_edit')}}/{{pagedata.Page.id}}\" data-bs-toggle=\"tooltip\">
                <i class=\"{% if pagedata.Page.enabled %}fa fa-fw fa-check-circle{% else %}far fa-fw fa-circle{% endif %}\"></i>
            </a>

            <a class=\"confirm\" href=\"{{path('admin_page_delete') ~ '/' ~ pagedata.Page.id}}\" data-callback=\"deleteNotify\" data-msg=\"{{'Wilt u deze pagina verwijderen?'|trans}}\" title=\"{{'Pagina verwijderen'|trans}}\" data-bs-toggle=\"tooltip\">
              <i class=\"far fa-fw fa-trash-alt\"></i>
            </a>
          </span>
        </span>

        {% if pagedata.Page.scores is not empty and app.user.username == 'admin' %}
          {% set score = pagedata.Page.scores.first.score %}
          <a
            href=\"{{path('admin_page_score', {pageid: pagedata.Page.id})}}\"
            class=\"{% if score < 50 %}red-text{% elseif score < 80 %}orange-text{% else %}green-text{% endif %} right\">
            <i class=\"material-icons left\">star</i>
            {{score}}/100</a>
        {% endif %}
      {% endif %}
    </div>
  </div>

  {% if pagedata.children %}
    <ol {{selector is defined and selector == true ? 'style=\"list-style: none; padding: 0;\"' : ''}}>
      {% include \"@Cms/includes/menu-links.html.twig\" with {'pages': pagedata.children, 'depth': ((depth is defined ? depth : 0) + 1)} %}
    </ol>
  {% endif %}
</li>
{% endfor %}
", "@Cms/includes/menu-links.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/includes/menu-links.html.twig");
    }
}
