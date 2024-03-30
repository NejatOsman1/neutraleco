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
class __TwigTemplate_9f8edd1ab38d6839b262d7d2fb9ae67116567af2e7125f661830cafd6235026f extends Template
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
        // line 1
        echo "<!DOCTYPE html>
<html>
  <head>
\t";
        // line 4
        if ((((twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "critical", [], "any", true, true, false, 4) && twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "critical", [], "any", false, false, false, 4)) && twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "CricitalCss", [], "any", true, true, false, 4)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "CricitalCss", [], "any", false, false, false, 4)))) {
            // line 5
            echo "\t\t<!-- critical -->
\t\t<style id=\"page_critical_css\">
\t\t";
            // line 7
            echo twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "CricitalCss", [], "any", false, false, false, 7);
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
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "headerBar", [], "any", false, false, false, 25)) {
            echo "has-topbar";
        }
        echo " ";
        ((array_key_exists("Page", $context)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "classes", [], "any", false, false, false, 25), "html", null, true))) : (print ("")));
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
        if ((twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "optionTitle", [], "any", false, false, false, 33) || twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "optionSubtitle", [], "any", false, false, false, 33))) {
            // line 34
            echo "      <section class=\"titlebar\">

        <div class=\"lcp\">
          ";
            // line 37
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 37))) {
                // line 38
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 38), "hasBlurred", [], "any", false, false, false, 38)) {
                    // line 39
                    echo "              <picture>
                ";
                    // line 40
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 40), "hasWebp", [], "method", false, false, false, 40)) {
                        // line 41
                        echo "                  <source srcset=\"/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 41), "getBlurredWebpPath", [0 => "large"], "method", false, false, false, 41), "html", null, true);
                        echo "\" type=\"image/webp\">
                ";
                    }
                    // line 43
                    echo "                <source srcset=\"/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 43), "getBlurredWebPath", [0 => "large"], "method", false, false, false, 43), "html", null, true);
                    echo "\" type=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 43), "mime", [], "any", false, false, false, 43), "html", null, true);
                    echo "\">
                <img class=\"lq\" alt=\"";
                    // line 44
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 44), "description_alt", [], "any", false, false, false, 44), "html", null, true);
                    echo "\" src=\"/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 44), "getBlurredWebPath", [0 => "large"], "method", false, false, false, 44), "html", null, true);
                    echo "\" type=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 44), "mime", [], "any", false, false, false, 44), "html", null, true);
                    echo "\" loading=\"eager\" width=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 44), "width", [], "any", false, false, false, 44), "html", null, true);
                    echo "\" height=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 44), "height", [], "any", false, false, false, 44), "html", null, true);
                    echo "\">
              </picture>
            ";
                }
                // line 47
                echo "            <picture>
              ";
                // line 48
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 48), "hasWebp", [], "method", false, false, false, 48)) {
                    // line 49
                    echo "                <source srcset=\"/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 49), "getWebpPath", [0 => "full"], "method", false, false, false, 49), "html", null, true);
                    echo "\" type=\"image/webp\">
              ";
                }
                // line 51
                echo "              <source srcset=\"/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 51), "getWebPath", [0 => "full"], "method", false, false, false, 51), "html", null, true);
                echo "\" type=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 51), "mime", [], "any", false, false, false, 51), "html", null, true);
                echo "\">
              <img class=\"hq\" alt=\"";
                // line 52
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 52), "description_alt", [], "any", false, false, false, 52), "html", null, true);
                echo "\" src=\"/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 52), "getWebPath", [0 => "full"], "method", false, false, false, 52), "html", null, true);
                echo "\" type=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 52), "mime", [], "any", false, false, false, 52), "html", null, true);
                echo "\" loading=\"lazy\" width=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 52), "width", [], "any", false, false, false, 52), "html", null, true);
                echo "\" height=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 52), "height", [], "any", false, false, false, 52), "html", null, true);
                echo "\" onload=\"this.style.opacity=1";
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 52), "hasBlurred", [], "any", false, false, false, 52)) {
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
            if (twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "optionTitle", [], "any", false, false, false, 62)) {
                // line 63
                echo "            <h1>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "title", [], "any", false, false, false, 63), "html", null, true);
                echo "</h1>
          ";
            }
            // line 65
            echo "
          ";
            // line 66
            if (twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "optionSubtitle", [], "any", false, false, false, 66)) {
                // line 67
                echo "            <h2>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "subtitle", [], "any", false, false, false, 67), "html", null, true);
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
        if (twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "optionBreadcrumbs", [], "any", false, false, false, 75)) {
            // line 76
            echo "      <section class=\"breadcrumbs\">
        <div class=\"container\">
          ";
            // line 78
            echo $this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getBreadcrumbs(($context["Page"] ?? null));
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
        if (twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "optionSubnavigation", [], "any", false, false, false, 85)) {
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
        echo $this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getPageBlocks($this->env, ($context["Page"] ?? null), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 94), "locale", [], "any", false, false, false, 94), "");
        echo "
    ";
        // line 95
        $this->displayBlock('plain_body', $context, $blocks);
        // line 96
        echo "
    ";
        // line 98
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "headerBar", [], "any", false, false, false, 98)) {
            // line 99
            echo "      <section class=\"topbar fixed\">
        <div class=\"container\">
          <div class=\"left\">
            ";
            // line 102
            echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "headerBarLeft", [], "any", false, false, false, 102);
            echo "
          </div>
          <div class=\"right\">
            ";
            // line 105
            echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "headerBarRight", [], "any", false, false, false, 105);
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
        $this->loadTemplate("/neutraleco/footer.html.twig", "layouts/neutraleco.html.twig", 112)->display(twig_array_merge($context, ["Settings" => ($context["Settings"] ?? null)]));
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
    }

    // line 11
    public function block_admin_header($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 14
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Welkom";
    }

    // line 16
    public function block_sitetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "Website";
    }

    // line 19
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 95
    public function block_plain_body($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 116
    public function block_admin_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 117
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
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
        return array (  366 => 117,  360 => 116,  354 => 95,  348 => 19,  341 => 16,  334 => 14,  328 => 11,  322 => 118,  319 => 117,  317 => 116,  314 => 115,  312 => 114,  309 => 113,  307 => 112,  304 => 111,  302 => 110,  294 => 105,  288 => 102,  283 => 99,  280 => 98,  277 => 96,  275 => 95,  271 => 94,  268 => 93,  266 => 92,  259 => 88,  255 => 86,  252 => 85,  249 => 83,  247 => 82,  240 => 78,  236 => 76,  233 => 75,  230 => 73,  228 => 72,  223 => 69,  217 => 67,  215 => 66,  212 => 65,  206 => 63,  204 => 62,  199 => 59,  193 => 55,  175 => 52,  168 => 51,  162 => 49,  160 => 48,  157 => 47,  143 => 44,  136 => 43,  130 => 41,  128 => 40,  125 => 39,  122 => 38,  120 => 37,  115 => 34,  112 => 33,  109 => 31,  107 => 30,  95 => 25,  91 => 23,  88 => 22,  86 => 21,  83 => 20,  81 => 19,  77 => 17,  75 => 16,  72 => 15,  70 => 14,  66 => 12,  64 => 11,  61 => 10,  55 => 7,  51 => 5,  49 => 4,  44 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "layouts/neutraleco.html.twig", "/var/www/html/templates/layouts/neutraleco.html.twig");
    }
}
