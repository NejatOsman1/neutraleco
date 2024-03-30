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

/* @Cms/blocks/framework_content_image.html.twig */
class __TwigTemplate_0e61e419be636159489010d220b3ac0d extends Template
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
        // line 36
        echo "
";
        // line 46
        echo "
<section
class=\"text-blocks ";
        // line 48
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "classList", [], "any", false, false, false, 48), "html", null, true);
        echo "\"
id=\"";
        // line 49
        ((twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "cssId", [], "any", true, true, false, 49)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "cssId", [], "any", false, false, false, 49), "html", null, true))) : (print ("")));
        echo "\"
style=\"";
        // line 50
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "styleList", [], "any", false, false, false, 50), "html", null, true);
        echo "\"
data-id=\"";
        // line 51
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "id", [], "any", false, false, false, 51), "html", null, true);
        echo "\">

  <div class=\"container\">
    ";
        // line 54
        if ((twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "label", [], "any", false, false, false, 54) ||  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "intro", [], "any", false, false, false, 54)))) {
            // line 55
            echo "      <div class=\"introblock\">
        ";
            // line 56
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "label", [], "any", false, false, false, 56))) {
                // line 57
                echo "          <div class=\"introtitle\">
            ";
                // line 58
                echo twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "label", [], "any", false, false, false, 58);
                echo "
          </div>
        ";
            }
            // line 61
            echo "        ";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "intro", [], "any", false, false, false, 61))) {
                // line 62
                echo "          <div class=\"introtext\">
            ";
                // line 63
                echo twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "intro", [], "any", false, false, false, 63);
                echo "
          </div>
        ";
            }
            // line 66
            echo "      </div>
    ";
        }
        // line 68
        echo "
    <div class=\"row\">
      ";
        // line 71
        echo "      ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 71));
        foreach ($context['_seq'] as $context["_key"] => $context["b"]) {
            // line 72
            echo "        ";
            // line 73
            echo "        ";
            if ((twig_get_attribute($this->env, $this->source, (($__internal_compile_0 = twig_get_attribute($this->env, $this->source, ($context["data"] ?? null), "blocks_q", [], "any", false, false, false, 73)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, $context["b"], "templateKey", [], "any", false, false, false, 73)] ?? null) : null), "required", [], "any", false, false, false, 73) == "media")) {
                // line 74
                echo "          ";
                // line 75
                echo "          <div class=\"col-sm-12 col-lg-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["b"], "width", [], "any", false, false, false, 75), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["b"], "class", [], "any", false, false, false, 75), "html", null, true);
                echo "\" ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["b"], "cssid", [], "any", false, false, false, 75), "html", null, true);
                echo ">

            ";
                // line 77
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 77))) {
                    // line 78
                    echo "              <div class=\"lcp\">
                ";
                    // line 79
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 79), "hasBlurred", [], "any", false, false, false, 79)) {
                        // line 80
                        echo "                  <picture>
                    ";
                        // line 81
                        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 81), "hasWebp", [], "method", false, false, false, 81)) {
                            // line 82
                            echo "                      <source srcset=\"/";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 82), "getBlurredWebpPath", [0 => "medium"], "method", false, false, false, 82), "html", null, true);
                            echo "\" type=\"image/webp\">
                    ";
                        }
                        // line 84
                        echo "                    <source srcset=\"/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 84), "getBlurredWebPath", [0 => "medium"], "method", false, false, false, 84), "html", null, true);
                        echo "\" type=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 84), "mime", [], "any", false, false, false, 84), "html", null, true);
                        echo "\">
                    <img class=\"lq\" alt=\"";
                        // line 85
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 85), "description_alt", [], "any", false, false, false, 85), "html", null, true);
                        echo "\" src=\"/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 85), "getBlurredWebPath", [0 => "medium"], "method", false, false, false, 85), "html", null, true);
                        echo "\" type=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 85), "mime", [], "any", false, false, false, 85), "html", null, true);
                        echo "\" loading=\"lazy\" width=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 85), "width", [], "any", false, false, false, 85), "html", null, true);
                        echo "\" height=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 85), "height", [], "any", false, false, false, 85), "html", null, true);
                        echo "\">
                  </picture>
                ";
                    }
                    // line 88
                    echo "                <picture>
                  ";
                    // line 89
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 89), "hasWebp", [], "method", false, false, false, 89)) {
                        // line 90
                        echo "                    <source srcset=\"/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 90), "getWebpPath", [0 => "large"], "method", false, false, false, 90), "html", null, true);
                        echo "\" type=\"image/webp\">
                  ";
                    }
                    // line 92
                    echo "                  <source srcset=\"/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 92), "getWebPath", [0 => "large"], "method", false, false, false, 92), "html", null, true);
                    echo "\" type=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 92), "mime", [], "any", false, false, false, 92), "html", null, true);
                    echo "\">
                <img class=\"hq\" alt=\"";
                    // line 93
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 93), "description_alt", [], "any", false, false, false, 93), "html", null, true);
                    echo "\" src=\"/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 93), "getWebPath", [0 => "large"], "method", false, false, false, 93), "html", null, true);
                    echo "\" type=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 93), "mime", [], "any", false, false, false, 93), "html", null, true);
                    echo "\" loading=\"lazy\" width=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 93), "width", [], "any", false, false, false, 93), "html", null, true);
                    echo "\" height=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 93), "height", [], "any", false, false, false, 93), "html", null, true);
                    echo "\" onload=\"this.style.opacity=1";
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 93), "hasBlurred", [], "any", false, false, false, 93)) {
                        echo ";this.closest('.lcp').getElementsByClassName('lq')[0].style.opacity=0;";
                    }
                    echo "\" style=\"opacity: 0;\">
                </picture>
              </div>
            ";
                }
                // line 97
                echo "
          </div>
        ";
            } else {
                // line 100
                echo "          ";
                // line 101
                echo "          <div class=\"col-sm-12 col-lg-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["b"], "width", [], "any", false, false, false, 101), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["b"], "class", [], "any", false, false, false, 101), "html", null, true);
                echo "\" ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["b"], "cssid", [], "any", false, false, false, 101), "html", null, true);
                echo ">
            <div class=\"vtable\">
              <div class=\"vcell\">
                <div class=\"padder\">
                  ";
                // line 105
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 105), "title", [], "any", false, false, false, 105))) {
                    // line 106
                    echo "                    <h3 class=\"title\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 106), "title", [], "any", false, false, false, 106), "html", null, true);
                    echo "</h3>
                  ";
                }
                // line 108
                echo "                  <div class=\"text\">
                    ";
                // line 109
                echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 109), "text", [], "any", false, false, false, 109);
                echo "
                  </div>

                  ";
                // line 112
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, true, false, 112), "buttons", [], "any", true, true, false, 112)) {
                    // line 113
                    echo "                    ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 113), "buttons", [], "any", false, false, false, 113));
                    foreach ($context['_seq'] as $context["_key"] => $context["button"]) {
                        // line 114
                        echo "                      <a href=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "url", [], "any", false, false, false, 114), "html", null, true);
                        echo "\" ";
                        if (((twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", true, true, false, 114) && (twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", false, false, false, 114) != "null")) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", false, false, false, 114)))) {
                            echo " target=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", false, false, false, 114), "html", null, true);
                            echo "\" ";
                        }
                        echo " class=\"btn ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "class", [], "any", false, false, false, 114), "html", null, true);
                        echo "\">
                        ";
                        // line 115
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "label", [], "any", false, false, false, 115), "html", null, true);
                        echo "
                        <i class=\"fa fa-arrow-right\"></i>
                      </a>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['button'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 119
                    echo "                  ";
                }
                // line 120
                echo "                </div>
              </div>
            </div>
          </div>
        ";
            }
            // line 125
            echo "      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['b'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 126
        echo "
    </div>
  </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "@Cms/blocks/framework_content_image.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  278 => 126,  272 => 125,  265 => 120,  262 => 119,  252 => 115,  239 => 114,  234 => 113,  232 => 112,  226 => 109,  223 => 108,  217 => 106,  215 => 105,  203 => 101,  201 => 100,  196 => 97,  177 => 93,  170 => 92,  164 => 90,  162 => 89,  159 => 88,  145 => 85,  138 => 84,  132 => 82,  130 => 81,  127 => 80,  125 => 79,  122 => 78,  120 => 77,  110 => 75,  108 => 74,  105 => 73,  103 => 72,  98 => 71,  94 => 68,  90 => 66,  84 => 63,  81 => 62,  78 => 61,  72 => 58,  69 => 57,  67 => 56,  64 => 55,  62 => 54,  56 => 51,  52 => 50,  48 => 49,  44 => 48,  40 => 46,  37 => 36,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/blocks/framework_content_image.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/blocks/framework_content_image.html.twig");
    }
}
