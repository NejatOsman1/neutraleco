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

/* @TrinityNeutral/backend/pagination.html.twig */
class __TwigTemplate_29a9f9102f5b17a1eb598131612d579827b69d19bcbd6a8c2ef4b372e3b3a105 extends Template
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
        if (((array_key_exists("pagination", $context) && (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "count", [], "any", false, false, false, 2), 0))) && (1 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "totalpages", [], "any", false, false, false, 2), 0)))) {
            // line 3
            echo "\t";
            if ( !array_key_exists("pathparameters", $context)) {
                // line 4
                echo "\t\t";
                $context["pathparameters"] = [];
                // line 5
                echo "\t";
            }
            // line 6
            echo "\t<div class=\"pagination-wrapper\">
\t\t<ul id=\"pagination\" class=\"pagination\">
\t\t\t";
            // line 8
            $context["prev"] = ["page" => twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "previouspage", [], "any", false, false, false, 8)];
            // line 9
            echo "\t\t\t";
            $context["prev"] = twig_array_merge(($context["prev"] ?? null), ($context["pathparameters"] ?? null));
            // line 10
            echo "\t\t\t<li class=\"page-item page-previous";
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "page", [], "any", false, false, false, 10), 1))) {
                echo " disabled";
            }
            echo "\"><a class=\"page-link\" href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(($context["path"] ?? null), ($context["prev"] ?? null)), "html", null, true);
            echo "\"><i class=\"fa fa-chevron-left\"></i></a></li>
\t\t\t";
            // line 11
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "totalpages", [], "any", false, false, false, 11)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 12
                echo "\t\t\t\t";
                $context["current"] = ["page" => $context["i"]];
                // line 13
                echo "\t\t\t\t";
                $context["current"] = twig_array_merge(($context["current"] ?? null), ($context["pathparameters"] ?? null));
                // line 14
                echo "\t\t\t\t<li class=\"page-item page-number";
                if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "page", [], "any", false, false, false, 14), $context["i"]))) {
                    echo " active";
                }
                echo "\"><a class=\"page-link\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(($context["path"] ?? null), ($context["current"] ?? null)), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo "</a></li>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "\t\t\t";
            $context["next"] = ["page" => twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "nextpage", [], "any", false, false, false, 16)];
            // line 17
            echo "\t\t\t";
            $context["next"] = twig_array_merge(($context["next"] ?? null), ($context["pathparameters"] ?? null));
            // line 18
            echo "\t\t\t<li class=\"page-item page-next";
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "totalpages", [], "any", false, false, false, 18), twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "page", [], "any", false, false, false, 18)))) {
                echo " disabled";
            }
            echo "\"><a class=\"page-link\" href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(($context["path"] ?? null), ($context["next"] ?? null)), "html", null, true);
            echo "\"><i class=\"fa fa-chevron-right\"></i></a></li>
\t\t</ul>
\t</div>
";
        }
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/backend/pagination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 18,  94 => 17,  91 => 16,  76 => 14,  73 => 13,  70 => 12,  66 => 11,  57 => 10,  54 => 9,  52 => 8,  48 => 6,  45 => 5,  42 => 4,  39 => 3,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/backend/pagination.html.twig", "/var/www/html/src/Trinity/NeutralBundle/Resources/views/backend/pagination.html.twig");
    }
}
