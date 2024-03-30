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

/* @Cms/blocks/framework_empty.html.twig */
class __TwigTemplate_9a4eeeb2e6e26c10c6245d1d49475f7c extends Template
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
        // line 22
        echo "
<section
class=\"empty ";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "classList", [], "any", false, false, false, 24), "html", null, true);
        echo "\"
id=\"";
        // line 25
        ((twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "cssId", [], "any", true, true, false, 25)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "cssId", [], "any", false, false, false, 25), "html", null, true))) : (print ("")));
        echo "\"
style=\"";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "styleList", [], "any", false, false, false, 26), "html", null, true);
        echo "\"
data-id=\"";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "id", [], "any", false, false, false, 27), "html", null, true);
        echo "\">

  <div class=\"container ";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["firstBlock"] ?? null), "class", [], "any", false, false, false, 29), "html", null, true);
        echo "\">
    ";
        // line 30
        if ((twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "label", [], "any", false, false, false, 30) ||  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "intro", [], "any", false, false, false, 30)))) {
            // line 31
            echo "      <div class=\"introblock\">
        ";
            // line 32
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "label", [], "any", false, false, false, 32))) {
                // line 33
                echo "          <div class=\"introtitle\">
            ";
                // line 34
                echo twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "label", [], "any", false, false, false, 34);
                echo "
          </div>
        ";
            }
            // line 37
            echo "        ";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "intro", [], "any", false, false, false, 37))) {
                // line 38
                echo "          <div class=\"introtext\">
            ";
                // line 39
                echo twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "intro", [], "any", false, false, false, 39);
                echo "
          </div>
        ";
            }
            // line 42
            echo "      </div>
    ";
        }
        // line 44
        echo "
    <div class=\"row\">
      ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 46));
        foreach ($context['_seq'] as $context["_key"] => $context["b"]) {
            // line 47
            echo "        <div class=\"col-sm-12 col-md-12 col-lg-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["b"], "width", [], "any", false, false, false, 47), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["b"], "offset", [0 => "offset-lg-"], "method", false, false, false, 47), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 47), "class", [], "any", false, false, false, 47), "html", null, true);
            echo "\" id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 47), "id", [], "any", false, false, false, 47), "html", null, true);
            echo "\">
          ";
            // line 48
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, true, false, 48), "link", [], "any", true, true, false, 48) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 48), "link", [], "any", false, false, false, 48)))) {
                // line 49
                echo "          <a href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 49), "link", [], "any", false, false, false, 49), "html", null, true);
                echo "\">
          ";
            }
            // line 51
            echo "          <div class=\"block\">
            ";
            // line 52
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "data", [], "any", false, true, false, 52), "type", [], "any", true, true, false, 52) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "data", [], "any", false, false, false, 52), "type", [], "any", false, false, false, 52) == "video"))) {
                // line 53
                echo "              <div class=\"responsive-wrapper\">
                ";
                // line 54
                echo twig_get_attribute($this->env, $this->source, $context["b"], "video", [], "any", false, false, false, 54);
                echo "
              </div>
              ";
            } elseif ( !twig_test_empty(twig_get_attribute($this->env, $this->source,             // line 56
$context["b"], "media", [], "any", false, false, false, 56))) {
                // line 57
                echo "              <div class=\"image-wrapper\">

                ";
                // line 59
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 59))) {
                    // line 60
                    echo "                  <div class=\"lcp\">
                    ";
                    // line 61
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 61), "hasBlurred", [], "any", false, false, false, 61)) {
                        // line 62
                        echo "                      <picture>
                        ";
                        // line 63
                        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 63), "hasWebp", [], "method", false, false, false, 63)) {
                            // line 64
                            echo "                          <source srcset=\"/";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 64), "getBlurredWebpPath", [0 => "medium"], "method", false, false, false, 64), "html", null, true);
                            echo "\" type=\"image/webp\">
                        ";
                        }
                        // line 66
                        echo "                        <source srcset=\"/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 66), "getBlurredWebPath", [0 => "medium"], "method", false, false, false, 66), "html", null, true);
                        echo "\" type=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 66), "mime", [], "any", false, false, false, 66), "html", null, true);
                        echo "\">
                        <img class=\"lq\" alt=\"";
                        // line 67
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 67), "description_alt", [], "any", false, false, false, 67), "html", null, true);
                        echo "\" src=\"/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 67), "getBlurredWebPath", [0 => "medium"], "method", false, false, false, 67), "html", null, true);
                        echo "\" type=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 67), "mime", [], "any", false, false, false, 67), "html", null, true);
                        echo "\" loading=\"lazy\" width=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 67), "width", [], "any", false, false, false, 67), "html", null, true);
                        echo "\" height=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 67), "height", [], "any", false, false, false, 67), "html", null, true);
                        echo "\">
                      </picture>
                    ";
                    }
                    // line 70
                    echo "                    <picture>
                      ";
                    // line 71
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 71), "hasWebp", [], "method", false, false, false, 71)) {
                        // line 72
                        echo "                        <source srcset=\"/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 72), "getWebpPath", [0 => "large"], "method", false, false, false, 72), "html", null, true);
                        echo "\" type=\"image/webp\">
                      ";
                    }
                    // line 74
                    echo "                      <source srcset=\"/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 74), "getWebPath", [0 => "large"], "method", false, false, false, 74), "html", null, true);
                    echo "\" type=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 74), "mime", [], "any", false, false, false, 74), "html", null, true);
                    echo "\">
                      <img
                        class=\"hq\"
                        alt=\"";
                    // line 77
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 77), "description_alt", [], "any", false, false, false, 77), "html", null, true);
                    echo "\"
                        src=\"/";
                    // line 78
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 78), "getWebPath", [0 => "large"], "method", false, false, false, 78), "html", null, true);
                    echo "\"
                        type=\"";
                    // line 79
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 79), "mime", [], "any", false, false, false, 79), "html", null, true);
                    echo "\"
                        loading=\"lazy\"
                        width=\"";
                    // line 81
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 81), "width", [], "any", false, false, false, 81), "html", null, true);
                    echo "\"
                        height=\"";
                    // line 82
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 82), "height", [], "any", false, false, false, 82), "html", null, true);
                    echo "\"
                        onload=\"this.style.opacity=1";
                    // line 83
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 83), "hasBlurred", [], "any", false, false, false, 83)) {
                        echo ";this.closest('.lcp').getElementsByClassName('lq')[0].style.opacity=0;";
                    }
                    echo "\"
                        style=\"opacity: 0;\">
                    </picture>
                  </div>
                ";
                }
                // line 88
                echo "
                </div>
              ";
            } else {
                // line 91
                echo "
              <div class=\"text-wrapper\">
                ";
                // line 93
                echo twig_get_attribute($this->env, $this->source, $context["b"], "content", [], "any", false, false, false, 93);
                echo "

                ";
                // line 95
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, true, false, 95), "buttons", [], "any", true, true, false, 95)) {
                    // line 96
                    echo "                  <div class=\"btns\">
                    ";
                    // line 97
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 97), "buttons", [], "any", false, false, false, 97));
                    foreach ($context['_seq'] as $context["_key"] => $context["button"]) {
                        // line 98
                        echo "                      <a href=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "url", [], "any", false, false, false, 98), "html", null, true);
                        echo "\" ";
                        if ((twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", true, true, false, 98) && (twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", false, false, false, 98) != "null"))) {
                            echo " target=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", false, false, false, 98), "html", null, true);
                            echo "\" ";
                        }
                        echo " class=\"btn ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "class", [], "any", false, false, false, 98), "html", null, true);
                        echo "\">
                        ";
                        // line 99
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "label", [], "any", false, false, false, 99), "html", null, true);
                        echo "
                        <i class=\"fa fa-arrow-right\"></i>
                      </a>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['button'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 103
                    echo "                  </div>
                ";
                }
                // line 105
                echo "              </div>
            ";
            }
            // line 107
            echo "          </div>
          ";
            // line 108
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, true, false, 108), "link", [], "any", true, true, false, 108) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 108), "link", [], "any", false, false, false, 108)))) {
                // line 109
                echo "          </a>
          ";
            }
            // line 111
            echo "        </div>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['b'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 113
        echo "    </div>
  </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "@Cms/blocks/framework_empty.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  300 => 113,  293 => 111,  289 => 109,  287 => 108,  284 => 107,  280 => 105,  276 => 103,  266 => 99,  253 => 98,  249 => 97,  246 => 96,  244 => 95,  239 => 93,  235 => 91,  230 => 88,  220 => 83,  216 => 82,  212 => 81,  207 => 79,  203 => 78,  199 => 77,  190 => 74,  184 => 72,  182 => 71,  179 => 70,  165 => 67,  158 => 66,  152 => 64,  150 => 63,  147 => 62,  145 => 61,  142 => 60,  140 => 59,  136 => 57,  134 => 56,  129 => 54,  126 => 53,  124 => 52,  121 => 51,  115 => 49,  113 => 48,  102 => 47,  98 => 46,  94 => 44,  90 => 42,  84 => 39,  81 => 38,  78 => 37,  72 => 34,  69 => 33,  67 => 32,  64 => 31,  62 => 30,  58 => 29,  53 => 27,  49 => 26,  45 => 25,  41 => 24,  37 => 22,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/blocks/framework_empty.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/blocks/framework_empty.html.twig");
    }
}
