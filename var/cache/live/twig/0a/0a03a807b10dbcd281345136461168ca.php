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

/* layouts/neutraleco.html.twig */
class __TwigTemplate_8c653d321da57f90aec99f7032c26513 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'admin_header' => [$this, 'block_admin_header'],
            'title' => [$this, 'block_title'],
            'sitetitle' => [$this, 'block_sitetitle'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'plain_body' => [$this, 'block_plain_body'],
            'admin_footer' => [$this, 'block_admin_footer'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "layouts/neutraleco.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
  <head>
\t";
        // line 4
        if ((((twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "critical", [], "any", true, true, false, 4) && twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 4, $this->source); })()), "critical", [], "any", false, false, false, 4)) && twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "CricitalCss", [], "any", true, true, false, 4)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 4, $this->source); })()), "CricitalCss", [], "any", false, false, false, 4)))) {
            // line 5
            echo "\t\t<!-- critical -->
\t\t<style id=\"page_critical_css\">
\t\t";
            // line 7
            echo twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 7, $this->source); })()), "CricitalCss", [], "any", false, false, false, 7);
            echo "
\t\t</style>
\t";
        }
        // line 10
        echo "
    ";
        // line 11
        $this->displayBlock('admin_header', $context, $blocks);
        // line 12
        echo "
    <title>
      ";
        // line 14
        $this->displayBlock('title', $context, $blocks);
        // line 15
        echo "      -
      ";
        // line 16
        $this->displayBlock('sitetitle', $context, $blocks);
        // line 17
        echo "    </title>

    ";
        // line 19
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 20
        echo "
    ";
        // line 21
        $this->loadTemplate("/neutraleco/header_css.html.twig", "layouts/neutraleco.html.twig", 21)->display($context);
        // line 22
        echo "    ";
        $this->loadTemplate("/neutraleco/header_scripts.html.twig", "layouts/neutraleco.html.twig", 22)->display($context);
        // line 23
        echo "  </head>

  <body class=\"";
        // line 25
        if (twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 25, $this->source); })()), "headerBar", [], "any", false, false, false, 25)) {
            echo "has-topbar";
        }
        echo " ";
        ((array_key_exists("Page", $context)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 25, $this->source); })()), "classes", [], "any", false, false, false, 25), "html", null, true))) : (print ("")));
        echo "\">

    <div class=\"page-overlay\"></div>
    <div class=\"shop-cart-overlay\"></div>

    ";
        // line 30
        $this->loadTemplate("/neutraleco/nav.html.twig", "layouts/neutraleco.html.twig", 30)->display($context);
        // line 31
        echo "
    ";
        // line 33
        echo "    ";
        if ((twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 33, $this->source); })()), "optionTitle", [], "any", false, false, false, 33) || twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 33, $this->source); })()), "optionSubtitle", [], "any", false, false, false, 33))) {
            // line 34
            echo "      <section class=\"titlebar\">

        <div class=\"lcp\">
          ";
            // line 37
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 37, $this->source); })()), "image", [], "any", false, false, false, 37))) {
                // line 38
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 38, $this->source); })()), "image", [], "any", false, false, false, 38), "hasBlurred", [], "any", false, false, false, 38)) {
                    // line 39
                    echo "              <picture>
                ";
                    // line 40
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 40, $this->source); })()), "image", [], "any", false, false, false, 40), "hasWebp", [], "method", false, false, false, 40)) {
                        // line 41
                        echo "                  <source srcset=\"/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 41, $this->source); })()), "image", [], "any", false, false, false, 41), "getBlurredWebpPath", [0 => "large"], "method", false, false, false, 41), "html", null, true);
                        echo "\" type=\"image/webp\">
                ";
                    }
                    // line 43
                    echo "                <source srcset=\"/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 43, $this->source); })()), "image", [], "any", false, false, false, 43), "getBlurredWebPath", [0 => "large"], "method", false, false, false, 43), "html", null, true);
                    echo "\" type=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 43, $this->source); })()), "image", [], "any", false, false, false, 43), "mime", [], "any", false, false, false, 43), "html", null, true);
                    echo "\">
                <img class=\"lq\" alt=\"";
                    // line 44
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 44, $this->source); })()), "image", [], "any", false, false, false, 44), "description_alt", [], "any", false, false, false, 44), "html", null, true);
                    echo "\" src=\"/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 44, $this->source); })()), "image", [], "any", false, false, false, 44), "getBlurredWebPath", [0 => "large"], "method", false, false, false, 44), "html", null, true);
                    echo "\" type=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 44, $this->source); })()), "image", [], "any", false, false, false, 44), "mime", [], "any", false, false, false, 44), "html", null, true);
                    echo "\" loading=\"eager\" width=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 44, $this->source); })()), "image", [], "any", false, false, false, 44), "width", [], "any", false, false, false, 44), "html", null, true);
                    echo "\" height=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 44, $this->source); })()), "image", [], "any", false, false, false, 44), "height", [], "any", false, false, false, 44), "html", null, true);
                    echo "\">
              </picture>
            ";
                }
                // line 47
                echo "            <picture>
              ";
                // line 48
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 48, $this->source); })()), "image", [], "any", false, false, false, 48), "hasWebp", [], "method", false, false, false, 48)) {
                    // line 49
                    echo "                <source srcset=\"/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 49, $this->source); })()), "image", [], "any", false, false, false, 49), "getWebpPath", [0 => "full"], "method", false, false, false, 49), "html", null, true);
                    echo "\" type=\"image/webp\">
              ";
                }
                // line 51
                echo "              <source srcset=\"/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 51, $this->source); })()), "image", [], "any", false, false, false, 51), "getWebPath", [0 => "full"], "method", false, false, false, 51), "html", null, true);
                echo "\" type=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 51, $this->source); })()), "image", [], "any", false, false, false, 51), "mime", [], "any", false, false, false, 51), "html", null, true);
                echo "\">
              <img class=\"hq\" alt=\"";
                // line 52
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 52, $this->source); })()), "image", [], "any", false, false, false, 52), "description_alt", [], "any", false, false, false, 52), "html", null, true);
                echo "\" src=\"/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 52, $this->source); })()), "image", [], "any", false, false, false, 52), "getWebPath", [0 => "full"], "method", false, false, false, 52), "html", null, true);
                echo "\" type=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 52, $this->source); })()), "image", [], "any", false, false, false, 52), "mime", [], "any", false, false, false, 52), "html", null, true);
                echo "\" loading=\"lazy\" width=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 52, $this->source); })()), "image", [], "any", false, false, false, 52), "width", [], "any", false, false, false, 52), "html", null, true);
                echo "\" height=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 52, $this->source); })()), "image", [], "any", false, false, false, 52), "height", [], "any", false, false, false, 52), "html", null, true);
                echo "\" onload=\"this.style.opacity=1";
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 52, $this->source); })()), "image", [], "any", false, false, false, 52), "hasBlurred", [], "any", false, false, false, 52)) {
                    echo ";this.closest('.lcp').getElementsByClassName('lq')[0].style.opacity=0;";
                }
                echo "\" style=\"opacity: 0;\">
            </picture>
          ";
            } else {
                // line 55
                echo "            <picture>
              <img class=\"hq\" src=\"/neutraleco/gfx/sub.jpg\" type=\"jpeg\" loading=\"lazy\" onload=\"this.style.opacity=1\" style=\"opacity: 0;\">
            </picture>
          ";
            }
            // line 59
            echo "        </div>

        <div class=\"container\">
          ";
            // line 62
            if (twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 62, $this->source); })()), "optionTitle", [], "any", false, false, false, 62)) {
                // line 63
                echo "            <h1>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 63, $this->source); })()), "title", [], "any", false, false, false, 63), "html", null, true);
                echo "</h1>
          ";
            }
            // line 65
            echo "
          ";
            // line 66
            if (twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 66, $this->source); })()), "optionSubtitle", [], "any", false, false, false, 66)) {
                // line 67
                echo "            <h2>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 67, $this->source); })()), "subtitle", [], "any", false, false, false, 67), "html", null, true);
                echo "</h2>
          ";
            }
            // line 69
            echo "        </div>
      </section>
    ";
        }
        // line 72
        echo "    ";
        // line 73
        echo "
    ";
        // line 75
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 75, $this->source); })()), "optionBreadcrumbs", [], "any", false, false, false, 75)) {
            // line 76
            echo "      <section class=\"breadcrumbs\">
        <div class=\"container\">
          ";
            // line 78
            echo $this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getBreadcrumbs((isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 78, $this->source); })()));
            echo "
        </div>
      </section>
    ";
        }
        // line 82
        echo "    ";
        // line 83
        echo "
    ";
        // line 85
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 85, $this->source); })()), "optionSubnavigation", [], "any", false, false, false, 85)) {
            // line 86
            echo "      <section class=\"subnavbar\">
        <div class=\"container\">
          ";
            // line 88
            echo $this->extensions['App\CmsBundle\Twig\Extension\PageNavigation']->navigation("", "", true, true, 0, 0, 2);
            echo "
        </div>
      </section>
    ";
        }
        // line 92
        echo "    ";
        // line 93
        echo "
    ";
        // line 94
        echo $this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getPageBlocks($this->env, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 94, $this->source); })()), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 94, $this->source); })()), "request", [], "any", false, false, false, 94), "locale", [], "any", false, false, false, 94), "");
        echo "
    ";
        // line 95
        $this->displayBlock('plain_body', $context, $blocks);
        // line 96
        echo "
    ";
        // line 98
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 98, $this->source); })()), "headerBar", [], "any", false, false, false, 98)) {
            // line 99
            echo "      <section class=\"topbar fixed\">
        <div class=\"container\">
          <div class=\"left\">
            ";
            // line 102
            echo twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 102, $this->source); })()), "headerBarLeft", [], "any", false, false, false, 102);
            echo "
          </div>
          <div class=\"right\">
            ";
            // line 105
            echo twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 105, $this->source); })()), "headerBarRight", [], "any", false, false, false, 105);
            echo "
          </div>
        </div>
      </section>
    ";
        }
        // line 110
        echo "    ";
        // line 111
        echo "
    ";
        // line 112
        $this->loadTemplate("/neutraleco/footer.html.twig", "layouts/neutraleco.html.twig", 112)->display(twig_array_merge($context, ["Settings" => (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 112, $this->source); })())]));
        // line 113
        echo "
    ";
        // line 114
        $this->loadTemplate("/neutraleco/footer_scripts.html.twig", "layouts/neutraleco.html.twig", 114)->display($context);
        // line 115
        echo "
    ";
        // line 116
        $this->displayBlock('admin_footer', $context, $blocks);
        // line 117
        echo "    ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 118
        echo "  </body>
</html>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 11
    public function block_admin_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_header"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 14
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Welkom";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 16
    public function block_sitetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sitetitle"));

        echo "Website";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 19
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 95
    public function block_plain_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "plain_body"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 116
    public function block_admin_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_footer"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 117
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "layouts/neutraleco.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  408 => 117,  396 => 116,  384 => 95,  372 => 19,  359 => 16,  346 => 14,  334 => 11,  325 => 118,  322 => 117,  320 => 116,  317 => 115,  315 => 114,  312 => 113,  310 => 112,  307 => 111,  305 => 110,  297 => 105,  291 => 102,  286 => 99,  283 => 98,  280 => 96,  278 => 95,  274 => 94,  271 => 93,  269 => 92,  262 => 88,  258 => 86,  255 => 85,  252 => 83,  250 => 82,  243 => 78,  239 => 76,  236 => 75,  233 => 73,  231 => 72,  226 => 69,  220 => 67,  218 => 66,  215 => 65,  209 => 63,  207 => 62,  202 => 59,  196 => 55,  178 => 52,  171 => 51,  165 => 49,  163 => 48,  160 => 47,  146 => 44,  139 => 43,  133 => 41,  131 => 40,  128 => 39,  125 => 38,  123 => 37,  118 => 34,  115 => 33,  112 => 31,  110 => 30,  98 => 25,  94 => 23,  91 => 22,  89 => 21,  86 => 20,  84 => 19,  80 => 17,  78 => 16,  75 => 15,  73 => 14,  69 => 12,  67 => 11,  64 => 10,  58 => 7,  54 => 5,  52 => 4,  47 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
  <head>
\t{% if Page.critical is defined and Page.critical and Page.CricitalCss is defined and Page.CricitalCss is not empty %}
\t\t<!-- critical -->
\t\t<style id=\"page_critical_css\">
\t\t{{ Page.CricitalCss | raw }}
\t\t</style>
\t{% endif %}

    {% block admin_header %}{% endblock %}

    <title>
      {% block title %}Welkom{% endblock %}
      -
      {% block sitetitle %}Website{% endblock %}
    </title>

    {% block stylesheets %}{% endblock %}

    {% include '/neutraleco/header_css.html.twig' %}
    {% include '/neutraleco/header_scripts.html.twig' %}
  </head>

  <body class=\"{% if Settings.headerBar %}has-topbar{% endif %} {{Page is defined ? Page.classes:''}}\">

    <div class=\"page-overlay\"></div>
    <div class=\"shop-cart-overlay\"></div>

    {% include '/neutraleco/nav.html.twig' %}

    {# titlebar #}
    {% if Page.optionTitle or Page.optionSubtitle %}
      <section class=\"titlebar\">

        <div class=\"lcp\">
          {% if Page.image is not empty %}
            {% if Page.image.hasBlurred %}
              <picture>
                {% if Page.image.hasWebp() %}
                  <source srcset=\"/{{Page.image.getBlurredWebpPath('large')}}\" type=\"image/webp\">
                {% endif %}
                <source srcset=\"/{{Page.image.getBlurredWebPath('large')}}\" type=\"{{Page.image.mime}}\">
                <img class=\"lq\" alt=\"{{Page.image.description_alt}}\" src=\"/{{Page.image.getBlurredWebPath('large')}}\" type=\"{{Page.image.mime}}\" loading=\"eager\" width=\"{{Page.image.width}}\" height=\"{{Page.image.height}}\">
              </picture>
            {% endif %}
            <picture>
              {% if Page.image.hasWebp() %}
                <source srcset=\"/{{Page.image.getWebpPath('full')}}\" type=\"image/webp\">
              {% endif %}
              <source srcset=\"/{{Page.image.getWebPath('full')}}\" type=\"{{ Page.image.mime }}\">
              <img class=\"hq\" alt=\"{{Page.image.description_alt}}\" src=\"/{{Page.image.getWebPath('full')}}\" type=\"{{Page.image.mime}}\" loading=\"lazy\" width=\"{{Page.image.width}}\" height=\"{{Page.image.height}}\" onload=\"this.style.opacity=1{% if Page.image.hasBlurred %};this.closest('.lcp').getElementsByClassName('lq')[0].style.opacity=0;{% endif %}\" style=\"opacity: 0;\">
            </picture>
          {% else %}
            <picture>
              <img class=\"hq\" src=\"/neutraleco/gfx/sub.jpg\" type=\"jpeg\" loading=\"lazy\" onload=\"this.style.opacity=1\" style=\"opacity: 0;\">
            </picture>
          {% endif %}
        </div>

        <div class=\"container\">
          {% if Page.optionTitle %}
            <h1>{{ Page.title }}</h1>
          {% endif %}

          {% if Page.optionSubtitle %}
            <h2>{{ Page.subtitle }}</h2>
          {% endif %}
        </div>
      </section>
    {% endif %}
    {# end titlebar #}

    {# breadcrumbs #}
    {% if Page.optionBreadcrumbs %}
      <section class=\"breadcrumbs\">
        <div class=\"container\">
          {{breadcrumbs(Page)}}
        </div>
      </section>
    {% endif %}
    {# end breadcrumbs #}

    {# subnavbar #}
    {% if Page.optionSubnavigation %}
      <section class=\"subnavbar\">
        <div class=\"container\">
          {{cms_navigation('','',true, true, 0, 0, 2)}}
        </div>
      </section>
    {% endif %}
    {# end subnavbar #}

    {{pageblocks(Page, app.request.locale, '')}}
    {% block plain_body %}{% endblock %}

    {# custom topbar - is displayed above the page on large displays through CSS #}
    {% if Settings.headerBar %}
      <section class=\"topbar fixed\">
        <div class=\"container\">
          <div class=\"left\">
            {{ Settings.headerBarLeft|raw }}
          </div>
          <div class=\"right\">
            {{ Settings.headerBarRight|raw }}
          </div>
        </div>
      </section>
    {% endif %}
    {# end custom topbar #}

    {% include '/neutraleco/footer.html.twig' with { Settings : Settings } %}

    {% include '/neutraleco/footer_scripts.html.twig' %}

    {% block admin_footer %}{% endblock %}
    {% block javascripts %}{% endblock %}
  </body>
</html>
", "layouts/neutraleco.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/templates/layouts/neutraleco.html.twig");
    }
}
