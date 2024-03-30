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

/* blocks/framework_banner_video.html.twig */
class __TwigTemplate_4c4f28f637a8d357519549d8c818e65f6f927eb5ef038b14ddb7d05460c638a5 extends Template
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
        // line 41
        echo "
<section
class=\"hero hero-banner video ";
        // line 43
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "classList", [], "any", false, false, false, 43), "html", null, true);
        echo "\"
id=\"";
        // line 44
        ((twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "cssId", [], "any", true, true, false, 44)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "cssId", [], "any", false, false, false, 44), "html", null, true))) : (print ("")));
        echo "\"
style=\"";
        // line 45
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "styleList", [], "any", false, false, false, 45), "html", null, true);
        echo "\"
data-id=\"";
        // line 46
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "id", [], "any", false, false, false, 46), "html", null, true);
        echo "\">

  <div class=\"videowrapper\">
    <div class=\"videocontainer\">
      ";
        // line 50
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (($__internal_compile_0 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 50)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[1] ?? null) : null), "media", [], "any", false, false, false, 50))) {
            // line 51
            echo "        <div class=\"lcp lcp-bg\">
          ";
            // line 52
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_1 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 52)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[1] ?? null) : null), "media", [], "any", false, false, false, 52), "hasBlurred", [], "any", false, false, false, 52)) {
                // line 53
                echo "            <picture>
              ";
                // line 54
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_2 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 54)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[1] ?? null) : null), "media", [], "any", false, false, false, 54), "hasWebp", [], "method", false, false, false, 54)) {
                    // line 55
                    echo "                <source srcset=\"/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_3 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 55)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[1] ?? null) : null), "media", [], "any", false, false, false, 55), "getBlurredWebpPath", [0 => "large"], "method", false, false, false, 55), "html", null, true);
                    echo "\" type=\"image/webp\">
              ";
                }
                // line 57
                echo "              <source srcset=\"/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_4 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 57)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4[1] ?? null) : null), "media", [], "any", false, false, false, 57), "getBlurredWebPath", [0 => "large"], "method", false, false, false, 57), "html", null, true);
                echo "\" type=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_5 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 57)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5[1] ?? null) : null), "media", [], "any", false, false, false, 57), "mime", [], "any", false, false, false, 57), "html", null, true);
                echo "\">
              <img class=\"lq\" alt=\"";
                // line 58
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_6 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 58)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6[1] ?? null) : null), "media", [], "any", false, false, false, 58), "description_alt", [], "any", false, false, false, 58), "html", null, true);
                echo "\" src=\"/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_7 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 58)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7[1] ?? null) : null), "media", [], "any", false, false, false, 58), "getBlurredWebPath", [0 => "large"], "method", false, false, false, 58), "html", null, true);
                echo "\" type=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_8 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 58)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8[1] ?? null) : null), "media", [], "any", false, false, false, 58), "mime", [], "any", false, false, false, 58), "html", null, true);
                echo "\" loading=\"lazy\" width=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_9 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 58)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9[1] ?? null) : null), "media", [], "any", false, false, false, 58), "width", [], "any", false, false, false, 58), "html", null, true);
                echo "\" height=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_10 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 58)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10[1] ?? null) : null), "media", [], "any", false, false, false, 58), "height", [], "any", false, false, false, 58), "html", null, true);
                echo "\">
            </picture>
          ";
            }
            // line 61
            echo "          <picture>
            ";
            // line 62
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_11 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 62)) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11[1] ?? null) : null), "media", [], "any", false, false, false, 62), "hasWebp", [], "method", false, false, false, 62)) {
                // line 63
                echo "              <source srcset=\"/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_12 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 63)) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12[1] ?? null) : null), "media", [], "any", false, false, false, 63), "getWebpPath", [0 => "full"], "method", false, false, false, 63), "html", null, true);
                echo "\" type=\"image/webp\">
            ";
            }
            // line 65
            echo "            <source srcset=\"/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_13 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 65)) && is_array($__internal_compile_13) || $__internal_compile_13 instanceof ArrayAccess ? ($__internal_compile_13[1] ?? null) : null), "media", [], "any", false, false, false, 65), "getWebPath", [0 => "full"], "method", false, false, false, 65), "html", null, true);
            echo "\" type=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_14 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 65)) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14[1] ?? null) : null), "media", [], "any", false, false, false, 65), "mime", [], "any", false, false, false, 65), "html", null, true);
            echo "\">
          <img class=\"hq\" alt=\"";
            // line 66
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_15 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 66)) && is_array($__internal_compile_15) || $__internal_compile_15 instanceof ArrayAccess ? ($__internal_compile_15[1] ?? null) : null), "media", [], "any", false, false, false, 66), "description_alt", [], "any", false, false, false, 66), "html", null, true);
            echo "\" src=\"/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_16 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 66)) && is_array($__internal_compile_16) || $__internal_compile_16 instanceof ArrayAccess ? ($__internal_compile_16[1] ?? null) : null), "media", [], "any", false, false, false, 66), "getWebPath", [0 => "full"], "method", false, false, false, 66), "html", null, true);
            echo "\" type=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_17 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 66)) && is_array($__internal_compile_17) || $__internal_compile_17 instanceof ArrayAccess ? ($__internal_compile_17[1] ?? null) : null), "media", [], "any", false, false, false, 66), "mime", [], "any", false, false, false, 66), "html", null, true);
            echo "\" loading=\"lazy\" width=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_18 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 66)) && is_array($__internal_compile_18) || $__internal_compile_18 instanceof ArrayAccess ? ($__internal_compile_18[1] ?? null) : null), "media", [], "any", false, false, false, 66), "width", [], "any", false, false, false, 66), "html", null, true);
            echo "\" height=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_19 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 66)) && is_array($__internal_compile_19) || $__internal_compile_19 instanceof ArrayAccess ? ($__internal_compile_19[1] ?? null) : null), "media", [], "any", false, false, false, 66), "height", [], "any", false, false, false, 66), "html", null, true);
            echo "\" onload=\"this.style.opacity=1";
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_20 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 66)) && is_array($__internal_compile_20) || $__internal_compile_20 instanceof ArrayAccess ? ($__internal_compile_20[1] ?? null) : null), "media", [], "any", false, false, false, 66), "hasBlurred", [], "any", false, false, false, 66)) {
                echo ";this.closest('.lcp').getElementsByClassName('lq')[0].style.opacity=0;";
            }
            echo "\" style=\"opacity: 0;\">
          </picture>
        </div>
      ";
        }
        // line 70
        echo "
      ";
        // line 71
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["firstBlock"] ?? null), "config", [], "any", false, false, false, 71), "video", [], "any", false, false, false, 71))) {
            // line 72
            echo "        <video playsinline=\"playsinline\" muted=\"muted\" loop=\"\" autoplay=\"true\" type=\"video/mp4\" data-radium=\"true\" ";
            if (twig_get_attribute($this->env, $this->source, (($__internal_compile_21 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 72)) && is_array($__internal_compile_21) || $__internal_compile_21 instanceof ArrayAccess ? ($__internal_compile_21[1] ?? null) : null), "media", [], "any", false, false, false, 72)) {
                echo " poster=\"\" ";
            }
            echo ">
          <source src=\"";
            // line 73
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["firstBlock"] ?? null), "config", [], "any", false, false, false, 73), "video", [], "any", false, false, false, 73), "html", null, true);
            echo "\" type=\"video/mp4\">
        </video>
      ";
        }
        // line 76
        echo "    </div>

    <div class=\"titles\">
      <div class=\"vwrapper\">
        <div class=\"valign\">
          <div class=\"container ";
        // line 81
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["firstBlock"] ?? null), "class", [], "any", false, false, false, 81), "html", null, true);
        echo "\">
            <h1>";
        // line 82
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["firstBlock"] ?? null), "config", [], "any", false, false, false, 82), "title", [], "any", false, false, false, 82), "html", null, true);
        echo "</h1>

            ";
        // line 84
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["firstBlock"] ?? null), "config", [], "any", false, false, false, 84), "content", [], "any", false, false, false, 84))) {
            // line 85
            echo "              <div class=\"text\">
                ";
            // line 86
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["firstBlock"] ?? null), "config", [], "any", false, false, false, 86), "content", [], "any", false, false, false, 86);
            echo "
              </div>
            ";
        }
        // line 89
        echo "
            ";
        // line 90
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 90));
        foreach ($context['_seq'] as $context["_key"] => $context["b"]) {
            // line 91
            echo "              ";
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, true, false, 91), "buttons", [], "any", true, true, false, 91)) {
                // line 92
                echo "                <div class=\"btns\">
                ";
                // line 93
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 93), "buttons", [], "any", false, false, false, 93));
                foreach ($context['_seq'] as $context["_key"] => $context["button"]) {
                    // line 94
                    echo "                  <a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "url", [], "any", false, false, false, 94), "html", null, true);
                    echo "\" ";
                    if (((twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", true, true, false, 94) && (0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", false, false, false, 94), "null"))) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", false, false, false, 94)))) {
                        echo " target=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", false, false, false, 94), "html", null, true);
                        echo "\" ";
                    }
                    echo " class=\"btn ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "class", [], "any", false, false, false, 94), "html", null, true);
                    echo "\">
                    ";
                    // line 95
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "label", [], "any", false, false, false, 95), "html", null, true);
                    echo "
                    <i class=\"fa fa-arrow-right\"></i>
                  </a>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['button'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 99
                echo "                </div>
              ";
            }
            // line 101
            echo "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['b'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo "          </div>
        </div>
      </div>
    </div>
  </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "blocks/framework_banner_video.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  231 => 102,  225 => 101,  221 => 99,  211 => 95,  198 => 94,  194 => 93,  191 => 92,  188 => 91,  184 => 90,  181 => 89,  175 => 86,  172 => 85,  170 => 84,  165 => 82,  161 => 81,  154 => 76,  148 => 73,  141 => 72,  139 => 71,  136 => 70,  117 => 66,  110 => 65,  104 => 63,  102 => 62,  99 => 61,  85 => 58,  78 => 57,  72 => 55,  70 => 54,  67 => 53,  65 => 52,  62 => 51,  60 => 50,  53 => 46,  49 => 45,  45 => 44,  41 => 43,  37 => 41,);
    }

    public function getSourceContext()
    {
        return new Source("", "blocks/framework_banner_video.html.twig", "/var/www/html/templates/blocks/framework_banner_video.html.twig");
    }
}
