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

/* @TrinityNeutral/backend/projects/projects-ext.html.twig */
class __TwigTemplate_850db91a9eb4dc08592f803abd2b0dfd extends Template
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
        echo "\t<div class=\"table-responsive\">
\t\t<table class=\"table table-hover\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<th>";
        // line 5
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Projectnaam"), "html", null, true);
        echo "</th>
\t\t\t\t\t<th>";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gebruiker"), "html", null, true);
        echo "</th>
\t\t\t\t\t<th>";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Type project"), "html", null, true);
        echo "</th>
\t\t\t\t\t<th>";
        // line 8
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Start projectdatum"), "html", null, true);
        echo "</th>
\t\t\t\t\t<th>";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Eind projectdatum"), "html", null, true);
        echo "</th>
\t\t\t\t\t<th>";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Aantal CO2-credits"), "html", null, true);
        echo "</th>
\t\t\t\t\t<th>";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Prijs per credit"), "html", null, true);
        echo "</th>
\t\t\t\t\t<th>";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Status"), "html", null, true);
        echo "</th>
\t\t\t\t\t<th></th>
\t\t\t\t</tr>
\t\t\t</thead>
\t\t\t<tbody>
\t\t\t\t";
        // line 17
        if ((( !twig_test_empty(($context["pagination"] ?? null)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getResults", [], "method", false, false, false, 17))) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getResults", [], "method", false, false, false, 17)) > 0))) {
            // line 18
            echo "\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["pagination"] ?? null), "getResults", [], "method", false, false, false, 18));
            foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
                // line 19
                echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td><a href=\"";
                // line 20
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_neutral_project_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 20)]), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "name", [], "any", false, false, false, 20), "html", null, true);
                echo "</a></td>
\t\t\t\t\t\t<td>";
                // line 21
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["project"], "user", [], "any", false, false, false, 21), "firstname", [], "any", false, false, false, 21), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["project"], "user", [], "any", false, false, false, 21), "lastname", [], "any", false, false, false, 21), "html", null, true);
                echo "</td>
\t\t\t\t\t\t<td>";
                // line 22
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "project_type", [], "any", false, false, false, 22), "html", null, true);
                echo "</td>
\t\t\t\t\t\t";
                // line 23
                $context["dateTime"] = twig_date_converter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "datestart", [], "any", false, false, false, 23));
                // line 24
                echo "\t\t\t\t\t\t<td>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateTime"] ?? null), "d"), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateTime"] ?? null), "m"), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateTime"] ?? null), "Y"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t";
                // line 25
                $context["dateTime"] = twig_date_converter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "dateend", [], "any", false, false, false, 25));
                // line 26
                echo "\t\t\t\t\t\t<td>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateTime"] ?? null), "d"), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateTime"] ?? null), "m"), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateTime"] ?? null), "Y"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t<td style=\"text-align:right;\">";
                // line 27
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "qtyco2credits", [], "any", false, false, false, 27), "html", null, true);
                echo "</td>
\t\t\t\t\t\t<td style=\"text-align:right;\">&euro;";
                // line 28
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "project_pricePerCredit", [], "any", false, false, false, 28), "html", null, true);
                echo "</td>
\t\t\t\t\t\t<td>";
                // line 29
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "project_status", [], "any", false, false, false, 29), "html", null, true);
                echo "</td>
\t\t\t\t\t\t<td class=\"right-align actions\">
\t\t\t\t\t\t\t";
                // line 31
                if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "getTransactions", [], "method", false, false, false, 31)) > 0)) {
                    // line 32
                    echo "\t\t\t\t\t\t\t<a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_neutral_project_transaction", ["id" => twig_get_attribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 32)]), "html", null, true);
                    echo "\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Transacties"), "html", null, true);
                    echo "\"><i class=\"fa fa-euro-sign\"></i></a>
\t\t\t\t\t\t\t";
                }
                // line 34
                echo "\t\t\t\t\t\t\t";
                if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "getBuyInCredits", [], "method", false, false, false, 34)) > 0)) {
                    // line 35
                    echo "\t\t\t\t\t\t\t<a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_neutral_project_buyincredits", ["id" => twig_get_attribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 35)]), "html", null, true);
                    echo "\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Contact aanvragen"), "html", null, true);
                    echo "\"><i class=\"fa fa-window-maximize\"></i></a>
\t\t\t\t\t\t\t";
                }
                // line 37
                echo "\t\t\t\t\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_neutral_project_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 37)]), "html", null, true);
                echo "\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"";
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["project"], "status", [], "any", false, false, false, 37), [0 => 5, 1 => 6])) {
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bekijken"), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wijzigen"), "html", null, true);
                }
                echo "\"><i class=\"fa ";
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["project"], "status", [], "any", false, false, false, 37), [0 => 5, 1 => 6])) {
                    echo "fa-fw fa-eye";
                } else {
                    echo "fa-edit";
                }
                echo "\"></i></a>
\t\t\t\t\t\t\t<a href=\"#\" onclick=\"cpop.confirm( 'Wilt u de volgende project verwijderen? <b>";
                // line 38
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "name", [], "any", false, false, false, 38), "html", null, true);
                echo "</b>', function(){
\t\t\t\t\t\t\t\t\t\twindow.location = '";
                // line 39
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_neutral_project_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 39)]), "html", null, true);
                echo "';
\t\t\t\t\t\t\t\t\t} ); return false;\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"";
                // line 40
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen"), "html", null, true);
                echo "\"><i class=\"far fa-trash-alt\"></i></a>
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['project'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 44
            echo "\t\t\t\t";
        }
        // line 45
        echo "\t\t\t</tbody>
\t\t</table>
\t</div>

\t";
        // line 49
        $this->loadTemplate("@TrinityNeutral/backend/pagination.html.twig", "@TrinityNeutral/backend/projects/projects-ext.html.twig", 49)->display(twig_array_merge($context, ["path" => "admin_mod_neutral_projects", "pagination" =>         // line 51
($context["pagination"] ?? null)]));
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/backend/projects/projects-ext.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  206 => 51,  205 => 49,  199 => 45,  196 => 44,  186 => 40,  182 => 39,  178 => 38,  161 => 37,  153 => 35,  150 => 34,  142 => 32,  140 => 31,  135 => 29,  131 => 28,  127 => 27,  118 => 26,  116 => 25,  107 => 24,  105 => 23,  101 => 22,  95 => 21,  89 => 20,  86 => 19,  81 => 18,  79 => 17,  71 => 12,  67 => 11,  63 => 10,  59 => 9,  55 => 8,  51 => 7,  47 => 6,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/backend/projects/projects-ext.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/NeutralBundle/Resources/views/backend/projects/projects-ext.html.twig");
    }
}
