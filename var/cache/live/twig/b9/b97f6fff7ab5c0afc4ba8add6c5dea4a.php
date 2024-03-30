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

/* /neutraleco/header_css.html.twig */
class __TwigTemplate_236ecc0fa74adfff92ced079cbfb5b0d extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "/neutraleco/header_css.html.twig"));

        // line 2
        if ((twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "CricitalCss", [], "any", true, true, false, 2) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 2, $this->source); })()), "CricitalCss", [], "any", false, false, false, 2)))) {
            // line 3
            echo "\t<link rel=\"preload\" media=\"screen\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/neutraleco/css/style.css"), "html", null, true);
            echo "?v=";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "mdYhs"), "html", null, true);
            echo "\" as=\"style\" onload=\"this.onload=null;this.rel='stylesheet';\">
\t<link rel=\"preload\" media=\"print\" type=\"text/css\" href=\"";
            // line 4
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/neutraleco/css/print.css"), "html", null, true);
            echo "\" as=\"style\" onload=\"this.onload=null;this.rel='stylesheet';\">
";
        } else {
            // line 6
            echo "\t<link rel=\"stylesheet\" media=\"screen\" href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/neutraleco/css/style.css"), "html", null, true);
            echo "?v=";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "mdYhs"), "html", null, true);
            echo "\">
\t<link rel=\"stylesheet\" media=\"print\" href=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/neutraleco/css/print.css"), "html", null, true);
            echo "\">
";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "/neutraleco/header_css.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 7,  54 => 6,  49 => 4,  42 => 3,  40 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# system #}
{% if Page.CricitalCss is defined and Page.CricitalCss is not empty %}
\t<link rel=\"preload\" media=\"screen\" type=\"text/css\" href=\"{{ asset('/neutraleco/css/style.css') }}?v={{ \"now\"|date(\"mdYhs\") }}\" as=\"style\" onload=\"this.onload=null;this.rel='stylesheet';\">
\t<link rel=\"preload\" media=\"print\" type=\"text/css\" href=\"{{ asset('/neutraleco/css/print.css') }}\" as=\"style\" onload=\"this.onload=null;this.rel='stylesheet';\">
{% else %}
\t<link rel=\"stylesheet\" media=\"screen\" href=\"{{ asset('/neutraleco/css/style.css') }}?v={{ \"now\"|date(\"mdYhs\") }}\">
\t<link rel=\"stylesheet\" media=\"print\" href=\"{{ asset('/neutraleco/css/print.css') }}\">
{% endif %}
", "/neutraleco/header_css.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/templates/neutraleco/header_css.html.twig");
    }
}
