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

/* /neutraleco/header_scripts.html.twig */
class __TwigTemplate_00036db0ab7c2c7e37193fe18a54fa37 extends Template
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
        $context["scrollmagic"] = false;
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "blocks", [], "any", false, false, false, 3));
        foreach ($context['_seq'] as $context["_key"] => $context["wrapper"]) {
            // line 4
            echo "\t";
            if (((twig_get_attribute($this->env, $this->source, $context["wrapper"], "templatekey", [], "any", false, false, false, 4) == "framework_scrollmagic") || (twig_get_attribute($this->env, $this->source, $context["wrapper"], "templatekey", [], "any", false, false, false, 4) == "framework_content_parallax"))) {
                // line 5
                echo "\t\t";
                $context["scrollmagic"] = true;
                // line 6
                echo "\t";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['wrapper'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 8
        echo "
";
        // line 10
        if (($context["scrollmagic"] ?? null)) {
            // line 11
            echo "\t";
            // line 12
            echo "\t<script defer src=\"/neutraleco/js/gsap.min.js\"></script>
\t<script defer src=\"/neutraleco/js/animation.gsap.min.js\"></script>
\t";
        }
        // line 16
        echo "
";
        // line 19
        echo "
";
        // line 21
        echo "<script defer src=\"/neutraleco/js/website.js\"></script>

";
        // line 24
        echo "<script src=\"/neutraleco/js/sticky-sidebar.js\"></script>
";
    }

    public function getTemplateName()
    {
        return "/neutraleco/header_scripts.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 24,  74 => 21,  71 => 19,  68 => 16,  63 => 12,  61 => 11,  59 => 10,  56 => 8,  49 => 6,  46 => 5,  43 => 4,  39 => 3,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "/neutraleco/header_scripts.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/templates/neutraleco/header_scripts.html.twig");
    }
}
