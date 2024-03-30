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

/* @Cms/blocks/framework_content_parallax.html.twig */
class __TwigTemplate_99486734211a5d429e2cd64ce3e42119 extends Template
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
        // line 37
        echo "
<section
class=\"framework_parallax trigger-section ";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "classList", [], "any", false, false, false, 39), "html", null, true);
        echo "\"
id=\"";
        // line 40
        ((twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "cssId", [], "any", true, true, false, 40)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "cssId", [], "any", false, false, false, 40), "html", null, true))) : (print ("")));
        echo "\"
style=\"";
        // line 41
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "styleList", [], "any", false, false, false, 41), "html", null, true);
        echo "\"
data-id=\"";
        // line 42
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "id", [], "any", false, false, false, 42), "html", null, true);
        echo "\">

  <div id=\"trigger";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "id", [], "any", false, false, false, 44), "html", null, true);
        echo "\"></div>
  <div id=\"animate";
        // line 45
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "id", [], "any", false, false, false, 45), "html", null, true);
        echo "\">
    <div class=\"trigger-section-background\">
      <div class=\"row\">
        ";
        // line 48
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 48));
        foreach ($context['_seq'] as $context["_key"] => $context["b"]) {
            // line 49
            echo "          <div class=\"col-12 col-md-6 col-xl-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["b"], "width", [], "any", false, false, false, 49), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 49), "class", [], "any", false, false, false, 49), "html", null, true);
            echo "\" id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 49), "id", [], "any", false, false, false, 49), "html", null, true);
            echo "\">
            ";
            // line 50
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 50))) {
                // line 51
                echo "              <div class=\"trigger-section-image\">
                <div class=\"section-image\">

                  ";
                // line 54
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 54))) {
                    // line 55
                    echo "                    <div class=\"lcp lcp-bg parallax\">
                      ";
                    // line 65
                    echo "                      <picture>
                        ";
                    // line 66
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 66), "hasWebp", [], "method", false, false, false, 66)) {
                        // line 67
                        echo "                          <source srcset=\"/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 67), "getWebpPath", [0 => "full"], "method", false, false, false, 67), "html", null, true);
                        echo "\" type=\"image/webp\">
                        ";
                    }
                    // line 69
                    echo "                        <source srcset=\"/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 69), "getWebPath", [0 => "full"], "method", false, false, false, 69), "html", null, true);
                    echo "\" type=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 69), "mime", [], "any", false, false, false, 69), "html", null, true);
                    echo "\">
                        <img
                          class=\"hq image";
                    // line 71
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "id", [], "any", false, false, false, 71), "html", null, true);
                    echo "\"
                          alt=\"";
                    // line 72
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 72), "description_alt", [], "any", false, false, false, 72), "html", null, true);
                    echo "\"
                          src=\"/";
                    // line 73
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 73), "getWebPath", [0 => "full"], "method", false, false, false, 73), "html", null, true);
                    echo "\" type=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 73), "mime", [], "any", false, false, false, 73), "html", null, true);
                    echo "\"
                          loading=\"lazy\"
                          width=\"";
                    // line 75
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 75), "width", [], "any", false, false, false, 75), "html", null, true);
                    echo "\"
                          height=\"";
                    // line 76
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 76), "height", [], "any", false, false, false, 76), "html", null, true);
                    echo "\"
                          onload=\"this.style.opacity=1
                          ";
                    // line 78
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 78), "hasBlurred", [], "any", false, false, false, 78)) {
                        echo ";this.closest('.lcp').getElementsByClassName('lq')[0].style.opacity=0;";
                    }
                    echo "\"
                          style=\"opacity: 0;\">
                      </picture>
                    </div>
                  ";
                }
                // line 83
                echo "
                </div>
              </div>
            ";
            }
            // line 87
            echo "          </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['b'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 89
        echo "      </div>
    </div>

    <div class=\"container\">
      <div class=\"row\">

        ";
        // line 95
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 95));
        foreach ($context['_seq'] as $context["_key"] => $context["b"]) {
            // line 96
            echo "          <div class=\"col-12 col-md-6 col-xl-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["b"], "width", [], "any", false, false, false, 96), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 96), "class", [], "any", false, false, false, 96), "html", null, true);
            echo "\" id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 96), "id", [], "any", false, false, false, 96), "html", null, true);
            echo "\">
            <div class=\"block\">
              ";
            // line 98
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "data", [], "any", false, true, false, 98), "type", [], "any", true, true, false, 98) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "data", [], "any", false, false, false, 98), "type", [], "any", false, false, false, 98) == "video"))) {
                // line 99
                echo "                <div class=\"video-container\">
                  <div class=\"responsive-wrapper\">
                    ";
                // line 101
                echo twig_get_attribute($this->env, $this->source, $context["b"], "video", [], "any", false, false, false, 101);
                echo "
                  </div>
                </div>
              ";
            } elseif ( !twig_test_empty(twig_get_attribute($this->env, $this->source,             // line 104
$context["b"], "media", [], "any", false, false, false, 104))) {
                // line 105
                echo "                <div class=\"image-container\"></div>
              ";
            } else {
                // line 107
                echo "                <div class=\"text-container trigger-section-content\">
                  ";
                // line 108
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 108), "title", [], "any", false, false, false, 108))) {
                    // line 109
                    echo "                    <div class=\"section-title\">
                      <h2>";
                    // line 110
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 110), "title", [], "any", false, false, false, 110), "html", null, true);
                    echo "</h2>
                    </div>
                  ";
                }
                // line 113
                echo "
                  <div class=\"section-content\">
                    ";
                // line 115
                echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 115), "text", [], "any", false, false, false, 115);
                echo "
                  </div>

                  <div class=\"section-button\">
                    ";
                // line 119
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, true, false, 119), "buttons", [], "any", true, true, false, 119)) {
                    // line 120
                    echo "                      <div class=\"btns\">
                        ";
                    // line 121
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["b"], "config", [], "any", false, false, false, 121), "buttons", [], "any", false, false, false, 121));
                    foreach ($context['_seq'] as $context["_key"] => $context["button"]) {
                        // line 122
                        echo "                          <a href=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "url", [], "any", false, false, false, 122), "html", null, true);
                        echo "\" ";
                        if ((twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", true, true, false, 122) && (twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", false, false, false, 122) != "null"))) {
                            echo " target=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", false, false, false, 122), "html", null, true);
                            echo "\" ";
                        }
                        echo " class=\"btn ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "class", [], "any", false, false, false, 122), "html", null, true);
                        echo "\">
                            ";
                        // line 123
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "label", [], "any", false, false, false, 123), "html", null, true);
                        echo "
                            <i class=\"fa fa-arrow-right\"></i>
                          </a>
                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['button'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 127
                    echo "                      </div>
                    ";
                }
                // line 129
                echo "                  </div>
                </div>
              ";
            }
            // line 132
            echo "            </div>
          </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['b'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 135
        echo "
      </div>
    </div>

  </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "@Cms/blocks/framework_content_parallax.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  273 => 135,  265 => 132,  260 => 129,  256 => 127,  246 => 123,  233 => 122,  229 => 121,  226 => 120,  224 => 119,  217 => 115,  213 => 113,  207 => 110,  204 => 109,  202 => 108,  199 => 107,  195 => 105,  193 => 104,  187 => 101,  183 => 99,  181 => 98,  171 => 96,  167 => 95,  159 => 89,  152 => 87,  146 => 83,  136 => 78,  131 => 76,  127 => 75,  120 => 73,  116 => 72,  112 => 71,  104 => 69,  98 => 67,  96 => 66,  93 => 65,  90 => 55,  88 => 54,  83 => 51,  81 => 50,  72 => 49,  68 => 48,  62 => 45,  58 => 44,  53 => 42,  49 => 41,  45 => 40,  41 => 39,  37 => 37,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/blocks/framework_content_parallax.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/blocks/framework_content_parallax.html.twig");
    }
}
