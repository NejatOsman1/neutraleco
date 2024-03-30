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

/* @Cms/blocks/framework_cta_banner.html.twig */
class __TwigTemplate_eabcf020970af45064d7bd3fd958b25d extends Template
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
        // line 30
        echo "
";
        // line 40
        echo "
<section
class=\"cta-banner ";
        // line 42
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "classList", [], "any", false, false, false, 42), "html", null, true);
        echo "\"
id=\"";
        // line 43
        ((twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "cssId", [], "any", true, true, false, 43)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "cssId", [], "any", false, false, false, 43), "html", null, true))) : (print ("")));
        echo "\"
style=\"";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "styleList", [], "any", false, false, false, 44), "html", null, true);
        echo "\"
data-id=\"";
        // line 45
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "id", [], "any", false, false, false, 45), "html", null, true);
        echo "\">

  <div class=\"container ";
        // line 47
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["firstBlock"] ?? null), "class", [], "any", false, false, false, 47), "html", null, true);
        echo "\">
    <div class=\"content\">
      ";
        // line 49
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_0 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 49)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null), "config", [], "any", false, false, false, 49), "text", [], "any", false, false, false, 49))) {
            // line 50
            echo "        <div class=\"block-left\">
          ";
            // line 51
            echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_1 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 51)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[0] ?? null) : null), "config", [], "any", false, false, false, 51), "text", [], "any", false, false, false, 51);
            echo "

          ";
            // line 53
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["firstBlock"] ?? null), "config", [], "any", false, false, false, 53), "subtext", [], "any", false, false, false, 53)) {
                // line 54
                echo "          <div class=\"subtext\">
            ";
                // line 55
                echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_2 = twig_get_attribute($this->env, $this->source, ($context["wrapper"] ?? null), "blocks", [], "any", false, false, false, 55)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[0] ?? null) : null), "config", [], "any", false, false, false, 55), "subtext", [], "any", false, false, false, 55);
                echo "
          </div>
          ";
            }
            // line 58
            echo "        </div>
        <div class=\"block-right\">
          <span>
            ";
            // line 61
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["firstBlock"] ?? null), "config", [], "any", false, true, false, 61), "buttons", [], "any", true, true, false, 61)) {
                // line 62
                echo "              ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["firstBlock"] ?? null), "config", [], "any", false, false, false, 62), "buttons", [], "any", false, false, false, 62));
                foreach ($context['_seq'] as $context["_key"] => $context["button"]) {
                    // line 63
                    echo "                <a href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "url", [], "any", false, false, false, 63), "html", null, true);
                    echo "\" ";
                    if ((twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", true, true, false, 63) && (twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", false, false, false, 63) != "null"))) {
                        echo " target=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "target", [], "any", false, false, false, 63), "html", null, true);
                        echo "\" ";
                    }
                    echo " class=\"btn ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "class", [], "any", false, false, false, 63), "html", null, true);
                    echo "\">
                  ";
                    // line 64
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["button"], "label", [], "any", false, false, false, 64), "html", null, true);
                    echo "
                  <i class=\"fa fa-arrow-right\"></i>
                </a>
              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['button'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 68
                echo "            ";
            }
            // line 69
            echo "          </span>
        </div>
      ";
        }
        // line 72
        echo "    </div>
  </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "@Cms/blocks/framework_cta_banner.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 72,  125 => 69,  122 => 68,  112 => 64,  99 => 63,  94 => 62,  92 => 61,  87 => 58,  81 => 55,  78 => 54,  76 => 53,  71 => 51,  68 => 50,  66 => 49,  61 => 47,  56 => 45,  52 => 44,  48 => 43,  44 => 42,  40 => 40,  37 => 30,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/blocks/framework_cta_banner.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/blocks/framework_cta_banner.html.twig");
    }
}
