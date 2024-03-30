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

/* @TrinityNeutral/front/projects/transactions.html.twig */
class __TwigTemplate_17c6a342b3a0154984c1d70da188cb136a086398cb0ccf2b4637f7bed66839fd extends Template
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
        // line 1
        if ((( !twig_test_empty(($context["pagination"] ?? null)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getResults", [], "method", false, false, false, 1))) && (1 === twig_compare(twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getResults", [], "method", false, false, false, 1)), 0)))) {
            // line 2
            echo "\t<style>
\t\ttable{width:100%;}
\t\ttd{vertical-align:top;}
\t</style>
\t<table>
\t\t<thead>
\t\t\t<tr>
\t\t\t\t<th>";
            // line 9
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Naam"), "html", null, true);
            echo "</th>
\t\t\t\t<th>";
            // line 10
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Datum"), "html", null, true);
            echo "</th>
\t\t\t\t<th class=\"text-right\">";
            // line 11
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Credits"), "html", null, true);
            echo "</th>
\t\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t\t";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getResults", [], "method", false, false, false, 15));
            foreach ($context['_seq'] as $context["_key"] => $context["transaction"]) {
                // line 16
                echo "\t\t\t<tr>
\t\t\t\t";
                // line 17
                $context["dateCreated"] = twig_date_converter($this->env, twig_get_attribute($this->env, $this->source, $context["transaction"], "getDateCreated", [], "any", false, false, false, 17));
                // line 18
                echo "\t\t\t\t";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["transaction"], "getName", [], "any", false, false, false, 18))) {
                    // line 19
                    echo "\t\t\t\t\t<td>
\t\t\t\t\t\t<div><b>";
                    // line 20
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["transaction"], "getName", [], "any", false, false, false, 20), "html", null, true);
                    echo "</b></div>
\t\t\t\t\t\t";
                    // line 21
                    if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["transaction"], "getCompany", [], "any", false, false, false, 21))) {
                        echo "<div>";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["transaction"], "getCompany", [], "any", false, false, false, 21), "html", null, true);
                        echo "</div>";
                    }
                    // line 22
                    echo "\t\t\t\t\t</td>
\t\t\t\t";
                } else {
                    // line 24
                    echo "\t\t\t\t\t<td>
\t\t\t\t\t\t<div><b>";
                    // line 25
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Anoniem"), "html", null, true);
                    echo "</b></div>\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t</td>
\t\t\t\t";
                }
                // line 28
                echo "\t\t\t\t<td>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateCreated"] ?? null), "d"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_date_format_filter($this->env, ($context["dateCreated"] ?? null), "M")), "html", null, true);
                echo ". ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateCreated"] ?? null), "Y"), "html", null, true);
                echo "<br/>
\t\t\t\t\t";
                // line 29
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateCreated"] ?? null), "H"), "html", null, true);
                echo ":";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateCreated"] ?? null), "i"), "html", null, true);
                echo "
\t\t\t\t</td>
\t\t\t\t<td class=\"text-right\">";
                // line 31
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["transaction"], "getBlockChainUrl", [], "any", false, false, false, 31))) {
                    echo "<a target=\"_blank\" href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["transaction"], "getBlockChainUrl", [], "any", false, false, false, 31), "html", null, true);
                    echo "\" class=\"transactions\"><span>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["transaction"], "credits", [], "any", false, false, false, 31), "html", null, true);
                    echo "</span> <i class=\"fa fa-arrow-right\"></i></a>";
                } else {
                    echo "<span>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["transaction"], "credits", [], "any", false, false, false, 31), "html", null, true);
                    echo "</span> <i class=\"fa fa-arrow-right\"></i>";
                }
                echo "</td>
\t\t\t</tr>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['transaction'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo "\t\t</tbody>
\t</table>
\t";
            // line 36
            $this->loadTemplate("@TrinityNeutral/backend/pagination.html.twig", "@TrinityNeutral/front/projects/transactions.html.twig", 36)->display(twig_array_merge($context, ["path" => "admin_mod_neutral_project_transactions", "pathparameters" => ["id" =>             // line 38
($context["projectid"] ?? null)], "pagination" =>             // line 39
($context["pagination"] ?? null)]));
        }
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/front/projects/transactions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 39,  141 => 38,  140 => 36,  136 => 34,  117 => 31,  110 => 29,  101 => 28,  95 => 25,  92 => 24,  88 => 22,  82 => 21,  78 => 20,  75 => 19,  72 => 18,  70 => 17,  67 => 16,  63 => 15,  56 => 11,  52 => 10,  48 => 9,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/front/projects/transactions.html.twig", "/var/www/html/src/Trinity/NeutralBundle/Resources/views/front/projects/transactions.html.twig");
    }
}
