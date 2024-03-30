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

/* @TrinityNeutral/backend/projects/transactions.html.twig */
class __TwigTemplate_3916c913f0e23926479274f6646b0338 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'pagetitle' => [$this, 'block_pagetitle'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@Cms/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@TrinityNeutral/backend/projects/transactions.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Transacties", [], "cms"), "html", null, true);
    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "\t<div class=\"btn-bar\">
\t\t<div class=\"right\">
\t\t\t";
        // line 9
        if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "status", [], "any", false, false, false, 9), [0 => 4])) {
            // line 10
            echo "\t\t\t\t<a class=\"btn btn-flat\" href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_neutral_project_transaction_add", ["id" => twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "id", [], "any", false, false, false, 10)]), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Transactie toevoegen", [], "cms"), "html", null, true);
            echo "\"><i class=\"fa fa-euro-sign\"></i> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Transactie toevoegen", [], "cms"), "html", null, true);
            echo "</a>
\t\t\t";
        }
        // line 12
        echo "\t\t\t";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "getBlockChainUrl", [], "any", false, false, false, 12))) {
            // line 13
            echo "\t\t\t\t<a class=\"btn btn-flat\" target=\"_blank\" href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "getBlockChainUrl", [], "any", false, false, false, 13), "html", null, true);
            echo "\"><i class=\"fa fa-external-link-alt\"></i> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bekijk blockchain transacties", [], "cms"), "html", null, true);
            echo "</a>
\t\t\t";
        }
        // line 15
        echo "\t\t</div>
\t</div>
\t<div class=\"card\">
\t\t<div class=\"card-body\">
\t\t\t<div class=\"card-title\">
\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t<h6>";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Transacties", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div>
\t\t\t";
        // line 25
        if ((twig_length_filter($this->env, ($context["project"] ?? null)) > 0)) {
            // line 26
            echo "\t\t\t\t<style>
\t\t\t\t\ttable{width:100%;}
\t\t\t\t\ttd{vertical-align:top;}
\t\t\t\t</style>

\t\t\t\t<div class=\"table-responsive\">
\t\t\t\t\t<table class=\"table table-hover\">
\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<th>";
            // line 35
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Naam", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t\t<th>";
            // line 36
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Datum", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t\t<th class=\"text-end\">";
            // line 37
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Credits", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</thead>
\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t";
            // line 41
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_reverse_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "getTransactions", [], "any", false, false, false, 41)));
            foreach ($context['_seq'] as $context["_key"] => $context["transaction"]) {
                // line 42
                echo "\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t";
                // line 43
                $context["dateCreated"] = twig_date_converter($this->env, twig_get_attribute($this->env, $this->source, $context["transaction"], "getDateCreated", [], "any", false, false, false, 43));
                // line 44
                echo "\t\t\t\t\t\t\t\t";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["transaction"], "getName", [], "any", false, false, false, 44))) {
                    // line 45
                    echo "\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t<div><b>";
                    // line 46
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["transaction"], "getName", [], "any", false, false, false, 46), "html", null, true);
                    echo "</b></div>
\t\t\t\t\t\t\t\t\t\t";
                    // line 47
                    if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["transaction"], "getCompany", [], "any", false, false, false, 47))) {
                        echo "<div>";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["transaction"], "getCompany", [], "any", false, false, false, 47), "html", null, true);
                        echo "</div>";
                    }
                    // line 48
                    echo "\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 50
                    echo "\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t<div><b>";
                    // line 51
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Anoniem", [], "cms"), "html", null, true);
                    echo "</b></div>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t";
                }
                // line 54
                echo "\t\t\t\t\t\t\t\t<td>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateCreated"] ?? null), "d"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_date_format_filter($this->env, ($context["dateCreated"] ?? null), "M")), "html", null, true);
                echo ". ";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateCreated"] ?? null), "Y"), "html", null, true);
                echo "<br/>
\t\t\t\t\t\t\t\t\t";
                // line 55
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateCreated"] ?? null), "H"), "html", null, true);
                echo ":";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateCreated"] ?? null), "i"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t<td class=\"text-end\">";
                // line 57
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["transaction"], "getBlockChainUrl", [], "any", false, false, false, 57))) {
                    echo "<a target=\"_blank\" href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["transaction"], "getBlockChainUrl", [], "any", false, false, false, 57), "html", null, true);
                    echo "\" class=\"transactions\"><span>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["transaction"], "credits", [], "any", false, false, false, 57), "html", null, true);
                    echo "</span> <i class=\"fa fa-arrow-right\"></i></a>";
                } else {
                    echo "<span>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["transaction"], "credits", [], "any", false, false, false, 57), "html", null, true);
                    echo "</span> <i class=\"fa fa-arrow-right\"></i>";
                }
                echo "</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['transaction'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "\t\t\t\t\t\t</tbody>
\t\t\t\t\t</table>
\t\t\t\t</div>
\t\t\t";
        }
        // line 64
        echo "\t\t\t</div>
\t\t</div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/backend/projects/transactions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  207 => 64,  201 => 60,  182 => 57,  175 => 55,  166 => 54,  160 => 51,  157 => 50,  153 => 48,  147 => 47,  143 => 46,  140 => 45,  137 => 44,  135 => 43,  132 => 42,  128 => 41,  121 => 37,  117 => 36,  113 => 35,  102 => 26,  100 => 25,  93 => 21,  85 => 15,  77 => 13,  74 => 12,  64 => 10,  62 => 9,  58 => 7,  54 => 6,  47 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/backend/projects/transactions.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/NeutralBundle/Resources/views/backend/projects/transactions.html.twig");
    }
}
