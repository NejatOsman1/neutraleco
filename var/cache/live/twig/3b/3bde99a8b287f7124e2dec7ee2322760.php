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
class __TwigTemplate_61c530662d46a938b224d92d27af200d extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "/neutraleco/header_scripts.html.twig"));

        // line 2
        $context["scrollmagic"] = false;
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 3, $this->source); })()), "blocks", [], "any", false, false, false, 3));
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
        if ((isset($context["scrollmagic"]) || array_key_exists("scrollmagic", $context) ? $context["scrollmagic"] : (function () { throw new RuntimeError('Variable "scrollmagic" does not exist.', 10, $this->source); })())) {
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
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

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
        return array (  81 => 24,  77 => 21,  74 => 19,  71 => 16,  66 => 12,  64 => 11,  62 => 10,  59 => 8,  52 => 6,  49 => 5,  46 => 4,  42 => 3,  40 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# check if scrollmagic is needed #}
{% set scrollmagic = false %}
{% for wrapper in Page.blocks %}
\t{% if wrapper.templatekey == 'framework_scrollmagic' or wrapper.templatekey == 'framework_content_parallax' %}
\t\t{% set scrollmagic = true %}
\t{% endif %}
{% endfor %}

{# Scrollmagic 2.0.8 #}
{% if scrollmagic %}
\t{# <script defer src=\"/neutraleco/js/ScrollMagic.min.js\"></script> #}
\t<script defer src=\"/neutraleco/js/gsap.min.js\"></script>
\t<script defer src=\"/neutraleco/js/animation.gsap.min.js\"></script>
\t{#<script defer src=\"/neutraleco/js/debug.addIndicators.min.js\"></script>#}
{% endif %}

{# simpleParallax 5.6.2 #}
{# <script defer src=\"/neutraleco/js/simpleParallax.min.js\"></script> #}

{# Site #}
<script defer src=\"/neutraleco/js/website.js\"></script>

{# Sticky sidebar #}
<script src=\"/neutraleco/js/sticky-sidebar.js\"></script>
", "/neutraleco/header_scripts.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/templates/neutraleco/header_scripts.html.twig");
    }
}
