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
class __TwigTemplate_ea3055e5c9faf694b04f73ac3fdea3c48de5bb5d4d1571a8edce2d618d062bd7 extends Template
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
        if ((twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "CricitalCss", [], "any", true, true, false, 2) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "CricitalCss", [], "any", false, false, false, 2)))) {
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
        return array (  58 => 7,  51 => 6,  46 => 4,  39 => 3,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "/neutraleco/header_css.html.twig", "/var/www/html/templates/neutraleco/header_css.html.twig");
    }
}
