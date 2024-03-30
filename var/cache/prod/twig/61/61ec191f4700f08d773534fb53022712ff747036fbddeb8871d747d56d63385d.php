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

/* @Cms/blocks/framework_cards.html.twig */
class __TwigTemplate_fbe9f5b9390f15a74ddacea7bf404ce89266d5a50b796bfcfe5a9fa2e3a35e04 extends Template
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
        // line 32
        echo "
<section
class=\"cards ";
        // line 34
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "classList", [], "any", false, false, false, 34), "html", null, true);
        echo "\"
id=\"";
        // line 35
        ((twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "cssId", [], "any", true, true, false, 35)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "cssId", [], "any", false, false, false, 35), "html", null, true))) : (print ("")));
        echo "\"
style=\"";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "styleList", [], "any", false, false, false, 36), "html", null, true);
        echo "\"
data-id=\"";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "id", [], "any", false, false, false, 37), "html", null, true);
        echo "\">

  <div class=\"container\">

    ";
        // line 41
        if ((twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "label", [], "any", false, false, false, 41) ||  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "intro", [], "any", false, false, false, 41)))) {
            // line 42
            echo "      <div class=\"introblock\">
        ";
            // line 43
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "label", [], "any", false, false, false, 43))) {
                // line 44
                echo "          <div class=\"introtitle\">
            ";
                // line 45
                echo twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "label", [], "any", false, false, false, 45);
                echo "
          </div>
        ";
            }
            // line 48
            echo "        ";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "intro", [], "any", false, false, false, 48))) {
                // line 49
                echo "          <div class=\"introtext\">
            ";
                // line 50
                echo twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "intro", [], "any", false, false, false, 50);
                echo "
          </div>
        ";
            }
            // line 53
            echo "      </div>
    ";
        }
        // line 55
        echo "    <div class=\"row blocks\">
      ";
        // line 56
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 56));
        foreach ($context['_seq'] as $context["_key"] => $context["b"]) {
            // line 57
            echo "        <div class=\"col-sm-12 col-md-6 col-lg-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["b"], "width", [], "any", false, false, false, 57), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["b"], "class", [], "any", false, false, false, 57), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["b"], "cssid", [], "any", false, false, false, 57), "html", null, true);
            echo ">
          <div class=\"card\">
            ";
            // line 59
            if (((twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", true, true, false, 59) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, true, false, 59), "link", [], "any", true, true, false, 59)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 59), "link", [], "any", false, false, false, 59)))) {
                // line 60
                echo "            <a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 60), "link", [], "any", false, false, false, 60), "html", null, true);
                echo "\" ";
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, true, false, 60), "target", [], "any", true, true, false, 60) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 60), "target", [], "any", false, false, false, 60)))) {
                    echo "target=\"_blank\"";
                }
                echo ">
            ";
            }
            // line 62
            echo "
            <div class=\"card-image\">
              ";
            // line 64
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 64))) {
                // line 65
                echo "                <div class=\"lcp\">
                  ";
                // line 66
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 66), "hasBlurred", [], "any", false, false, false, 66)) {
                    // line 67
                    echo "                    <picture>
                      ";
                    // line 68
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 68), "hasWebp", [], "method", false, false, false, 68)) {
                        // line 69
                        echo "                        <source srcset=\"/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 69), "getBlurredWebpPath", [0 => "small"], "method", false, false, false, 69), "html", null, true);
                        echo "\" type=\"image/webp\">
                      ";
                    }
                    // line 71
                    echo "                      <source srcset=\"/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 71), "getBlurredWebPath", [0 => "small"], "method", false, false, false, 71), "html", null, true);
                    echo "\" type=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 71), "mime", [], "any", false, false, false, 71), "html", null, true);
                    echo "\">
                      <img class=\"lq\" alt=\"";
                    // line 72
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 72), "description_alt", [], "any", false, false, false, 72), "html", null, true);
                    echo "\" src=\"/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 72), "getBlurredWebPath", [0 => "small"], "method", false, false, false, 72), "html", null, true);
                    echo "\" type=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 72), "mime", [], "any", false, false, false, 72), "html", null, true);
                    echo "\" loading=\"lazy\" width=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 72), "width", [], "any", false, false, false, 72), "html", null, true);
                    echo "\" height=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 72), "height", [], "any", false, false, false, 72), "html", null, true);
                    echo "\">
                    </picture>
                  ";
                }
                // line 75
                echo "                  <picture>
                    ";
                // line 76
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 76), "hasWebp", [], "method", false, false, false, 76)) {
                    // line 77
                    echo "                      <source srcset=\"/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 77), "getWebpPath", [0 => "medium"], "method", false, false, false, 77), "html", null, true);
                    echo "\" type=\"image/webp\">
                    ";
                }
                // line 79
                echo "                    <source srcset=\"/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 79), "getWebPath", [0 => "medium"], "method", false, false, false, 79), "html", null, true);
                echo "\" type=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 79), "mime", [], "any", false, false, false, 79), "html", null, true);
                echo "\">
                    <img class=\"hq\" alt=\"";
                // line 80
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 80), "description_alt", [], "any", false, false, false, 80), "html", null, true);
                echo "\" src=\"/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 80), "getWebPath", [0 => "medium"], "method", false, false, false, 80), "html", null, true);
                echo "\" type=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 80), "mime", [], "any", false, false, false, 80), "html", null, true);
                echo "\" loading=\"lazy\" width=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 80), "width", [], "any", false, false, false, 80), "html", null, true);
                echo "\" height=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 80), "height", [], "any", false, false, false, 80), "html", null, true);
                echo "\" onload=\"this.style.opacity=1";
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 80), "hasBlurred", [], "any", false, false, false, 80)) {
                    echo ";this.closest('.lcp').getElementsByClassName('lq')[0].style.opacity=0;";
                }
                echo "\" style=\"opacity: 0;\">
                  </picture>
                </div>
              ";
            }
            // line 84
            echo "            </div>

            <div class=\"card-body card-content\">
              <h3 class=\"card-title\">";
            // line 87
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 87), "title", [], "any", false, false, false, 87), "html", null, true);
            echo "</h3>
              <div class=\"text\">
                ";
            // line 89
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 89), "content", [], "any", false, false, false, 89);
            echo "
              </div>

              ";
            // line 92
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, true, false, 92), "buttons", [], "any", true, true, false, 92)) {
                // line 93
                echo "                <div class=\"btns\">
                  ";
                // line 94
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 94), "buttons", [], "any", false, false, false, 94));
                foreach ($context['_seq'] as $context["_key"] => $context["button"]) {
                    // line 95
                    echo "                    <a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "url", [], "any", false, false, false, 95), "html", null, true);
                    echo "\" ";
                    if ((twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", true, true, false, 95) && (0 !== twig_compare(twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", false, false, false, 95), "null")))) {
                        echo " target=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", false, false, false, 95), "html", null, true);
                        echo "\" ";
                    }
                    echo " class=\"btn ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "class", [], "any", false, false, false, 95), "html", null, true);
                    echo "\">
                      ";
                    // line 96
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "label", [], "any", false, false, false, 96), "html", null, true);
                    echo "
                      <i class=\"fa fa-arrow-right\"></i>
                    </a>
                  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['button'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 100
                echo "                </div>
              ";
            }
            // line 102
            echo "            </div>
            ";
            // line 103
            if (((twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", true, true, false, 103) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, true, false, 103), "link", [], "any", true, true, false, 103)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 103), "link", [], "any", false, false, false, 103)))) {
                // line 104
                echo "            </a>
            ";
            }
            // line 106
            echo "          </div>
        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['b'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 109
        echo "    </div>
  </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "@Cms/blocks/framework_cards.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  270 => 109,  262 => 106,  258 => 104,  256 => 103,  253 => 102,  249 => 100,  239 => 96,  226 => 95,  222 => 94,  219 => 93,  217 => 92,  211 => 89,  206 => 87,  201 => 84,  182 => 80,  175 => 79,  169 => 77,  167 => 76,  164 => 75,  150 => 72,  143 => 71,  137 => 69,  135 => 68,  132 => 67,  130 => 66,  127 => 65,  125 => 64,  121 => 62,  111 => 60,  109 => 59,  99 => 57,  95 => 56,  92 => 55,  88 => 53,  82 => 50,  79 => 49,  76 => 48,  70 => 45,  67 => 44,  65 => 43,  62 => 42,  60 => 41,  53 => 37,  49 => 36,  45 => 35,  41 => 34,  37 => 32,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/blocks/framework_cards.html.twig", "/var/www/html/src/CmsBundle/Resources/views/blocks/framework_cards.html.twig");
    }
}
