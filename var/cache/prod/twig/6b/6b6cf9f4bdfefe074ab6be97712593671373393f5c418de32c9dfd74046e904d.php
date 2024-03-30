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

/* @TrinityNeutral/front/projects/view-project-detail.html.twig */
class __TwigTemplate_c9971a511243f56e97e73fa9268bc0e6811cf2395eca3e3d280b13c53bd8b982 extends Template
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
        echo "<section class=\"projects project-detail\">
\t<div class=\"project-header\">
\t\t";
        // line 3
        if (twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "header", [], "any", false, false, false, 3)) {
            // line 4
            echo "\t\t\t<div class=\"image\" style=\"background: url('";
            echo twig_escape_filter($this->env, ($context["imgUrlPath"] ?? null), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "header", [], "any", false, false, false, 4), "getpath", [], "any", false, false, false, 4), "html", null, true);
            echo "') no-repeat center; background-size: cover;\"></div>
\t\t";
        }
        // line 6
        echo "\t</div>

\t<div class=\"project-intro\">
\t\t<div class=\"container\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-12 col-lg-8\">
\t\t\t\t\t<div class=\"project-intro-title\">
\t\t\t\t\t\t<div class=\"logo\">
\t\t\t\t\t\t\t";
        // line 14
        if (twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "logo", [], "any", false, false, false, 14)) {
            // line 15
            echo "\t\t\t\t\t\t\t\t<div class=\"image\">
\t\t\t\t\t\t\t\t\t<img src=\"";
            // line 16
            echo twig_escape_filter($this->env, ($context["imgUrlPath"] ?? null), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "logo", [], "any", false, false, false, 16), "getpath", [], "any", false, false, false, 16), "html", null, true);
            echo "\" alt=\"\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        }
        // line 19
        echo "\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"title\">
\t\t\t\t\t\t\t<h2>";
        // line 22
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "name", [], "any", false, false, false, 22), "html", null, true);
        echo "</h2>
\t\t\t\t\t\t\t<small>";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "subtitle", [], "any", false, false, false, 23), "html", null, true);
        echo "</small>
\t\t\t\t\t\t\t";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "labels", [], "any", false, false, false, 24));
        foreach ($context['_seq'] as $context["_key"] => $context["key"]) {
            // line 25
            echo "\t\t\t\t\t\t\t<div class=\"label\">
\t\t\t\t\t\t\t\t";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "getLabelsChoices", [], "method", false, false, false, 26));
            foreach ($context['_seq'] as $context["item"] => $context["value"]) {
                // line 27
                echo "\t\t\t\t\t\t\t\t\t";
                if ((0 === twig_compare($context["key"], $context["value"]))) {
                    // line 28
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $context["item"], "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t";
                }
                // line 30
                echo "\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['item'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['key'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"description\">
\t\t\t\t\t\t<p>";
        // line 37
        echo twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "description", [], "any", false, false, false, 37);
        echo "</p>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-12 col-lg-4\">
\t\t\t\t\t<div class=\"project-sidebar\">
\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t<table>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td><b>";
        // line 46
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("CO2-Capaciteit beschikbaar"), "html", null, true);
        echo "</b></td>
\t\t\t\t\t\t\t\t\t\t<td>";
        // line 47
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "getC02CapacityAvailableByTotalCredits", [0 => ($context["totalUsedCredits"] ?? null)], "method", false, false, false, 47), "html", null, true);
        echo "%</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td colspan=\"2\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"progressbar\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress\" style=\"width: ";
        // line 52
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "getC02CapacityByTotalCredits", [0 => ($context["totalUsedCredits"] ?? null)], "method", false, false, false, 52), "html", null, true);
        echo "%;\"></div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t<strong>";
        // line 58
        echo "Totaal";
        echo "</strong>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 61
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "qtyco2credits", [], "any", false, false, false, 61), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t<strong>";
        // line 66
        echo "Gebruikt";
        echo "</strong>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 69
        echo twig_escape_filter($this->env, ($context["totalUsedCredits"] ?? null), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t<strong>";
        // line 74
        echo "Prijs per credit";
        echo "</strong>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t&euro;";
        // line 77
        echo twig_escape_filter($this->env, ($context["pricePerCredit"] ?? null), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t";
        // line 81
        if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "status", [], "any", false, false, false, 81), [0 => 4])) {
            // line 82
            echo "\t\t\t\t\t\t\t\t<a href=\"#\" id=\"pd-contact-button\" data-id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "id", [], "any", false, false, false, 82), "html", null, true);
            echo "\" class=\"btn btn-big btn-green mt-4 w-100\" data-bs-toggle=\"modal\" data-bs-target=\"#form-modal\"><i class=\"fa fa-shopping-cart\"></i> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("CO2-credits kopen"), "html", null, true);
            echo "</a>
\t\t\t\t\t\t\t\t";
        }
        // line 84
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t<h5>";
        // line 88
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Laatste transacties"), "html", null, true);
        echo "</h5>
\t\t\t\t\t\t\t\t";
        // line 89
        if ((1 === twig_compare(twig_length_filter($this->env, ($context["transactions"] ?? null)), 0))) {
            // line 90
            echo "\t\t\t\t\t\t\t\t\t<table>
\t\t\t\t\t\t\t\t\t\t";
            // line 91
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["transactions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["transaction"]) {
                // line 92
                echo "\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t";
                // line 93
                $context["dateCreated"] = twig_date_converter($this->env, twig_get_attribute($this->env, $this->source, $context["transaction"], "getDateCreated", [], "any", false, false, false, 93));
                // line 94
                echo "\t\t\t\t\t\t\t\t\t\t\t";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["transaction"], "getName", [], "any", false, false, false, 94))) {
                    // line 95
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div><b>";
                    // line 96
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["transaction"], "getName", [], "any", false, false, false, 96), "html", null, true);
                    echo "</b>";
                    if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["transaction"], "getCompany", [], "any", false, false, false, 96))) {
                        echo " (";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["transaction"], "getCompany", [], "any", false, false, false, 96), "html", null, true);
                        echo ")";
                    }
                    echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<small>";
                    // line 97
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateCreated"] ?? null), "d"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_date_format_filter($this->env, ($context["dateCreated"] ?? null), "M")), "html", null, true);
                    echo ". ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateCreated"] ?? null), "Y"), "html", null, true);
                    echo "</small>
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 100
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div><b>";
                    // line 101
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Anoniem"), "html", null, true);
                    echo "</b></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<small>";
                    // line 102
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateCreated"] ?? null), "d"), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_date_format_filter($this->env, ($context["dateCreated"] ?? null), "M")), "html", null, true);
                    echo ". ";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateCreated"] ?? null), "Y"), "html", null, true);
                    echo "</small>\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 105
                echo "\t\t\t\t\t\t\t\t\t\t\t<td>";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["transaction"], "getBlockChainUrl", [], "any", false, false, false, 105))) {
                    echo "<a target=\"_blank\" href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["transaction"], "getBlockChainUrl", [], "any", false, false, false, 105), "html", null, true);
                    echo "\" class=\"transactions\"><span>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["transaction"], "credits", [], "any", false, false, false, 105), "html", null, true);
                    echo "</span> <i class=\"fa fa-arrow-right\"></i></a>";
                } else {
                    echo "<span>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["transaction"], "credits", [], "any", false, false, false, 105), "html", null, true);
                    echo "</span> <i class=\"fa fa-arrow-right\"></i>";
                }
                echo "</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['transaction'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 108
            echo "\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t<a href=\"#\" id=\"pd-contact-button\" data-id=\"";
            // line 109
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "id", [], "any", false, false, false, 109), "html", null, true);
            echo "\" class=\"btn btn-big w-100 mt-4\" data-bs-toggle=\"modal\" data-bs-target=\"#transactions-modal\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bekijk alle transacties"), "html", null, true);
            echo " <i class=\"fa fa-arrow-right\"></i></a>
\t\t\t\t\t\t\t\t";
        }
        // line 111
        echo "\t\t\t\t\t\t\t\t";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "getBlockChainUrl", [], "any", false, false, false, 111))) {
            // line 112
            echo "\t\t\t\t\t\t\t\t<a target=\"_blank\" href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "getBlockChainUrl", [], "any", false, false, false, 112), "html", null, true);
            echo "\" class=\"btn btn-big btn-gradient w-100 mt-2\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bekijk blockchain transacties"), "html", null, true);
            echo " <i class=\"fa fa-external-link-alt\"></i></a>
\t\t\t\t\t\t\t\t";
        }
        // line 114
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t<h5>";
        // line 118
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Projectinformatie"), "html", null, true);
        echo "</h5>
\t\t\t\t\t\t\t\t<table>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td><b>";
        // line 121
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Startdatum"), "html", null, true);
        echo "</b></td>
\t\t\t\t\t\t\t\t\t\t";
        // line 122
        $context["dateTime"] = twig_date_converter($this->env, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "datestart", [], "any", false, false, false, 122));
        // line 123
        echo "\t\t\t\t\t\t\t\t\t\t<td>";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateTime"] ?? null), "d"), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateTime"] ?? null), "m"), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateTime"] ?? null), "Y"), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td><b>";
        // line 126
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Einddatum"), "html", null, true);
        echo "</b></td>
\t\t\t\t\t\t\t\t\t\t";
        // line 127
        $context["dateTime"] = twig_date_converter($this->env, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "dateend", [], "any", false, false, false, 127));
        // line 128
        echo "\t\t\t\t\t\t\t\t\t\t<td>";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateTime"] ?? null), "d"), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateTime"] ?? null), "m"), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateTime"] ?? null), "Y"), "html", null, true);
        echo "</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td><b>";
        // line 131
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Locatie"), "html", null, true);
        echo "</b></td>
\t\t\t\t\t\t\t\t\t\t<td>";
        // line 132
        echo twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "location", [], "any", false, false, false, 132);
        echo "</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>

\t";
        // line 143
        if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "id", [], "any", false, false, false, 143)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "fotogallery", [], "any", false, false, false, 143)))) {
            // line 144
            echo "\t\t<div class=\"projects-gallery\">
\t\t\t";
            // line 145
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "getFotoGalleryCollection", [], "method", false, false, false, 145));
            foreach ($context['_seq'] as $context["_key"] => $context["foto"]) {
                // line 146
                echo "\t\t\t\t<div class=\"item\">
\t\t\t\t\t<a href=\"/uploads/images/";
                // line 147
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["foto"], "path", [], "any", false, false, false, 147), "html", null, true);
                echo "\">
\t\t\t\t\t\t<img class=\"img\" src=\"/uploads/images/";
                // line 148
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["foto"], "path", [], "any", false, false, false, 148), "html", null, true);
                echo "\" alt=\"\">
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['foto'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 152
            echo "\t\t</div>
\t";
        }
        // line 154
        echo "
\t<div class=\"projects-summary\">
\t  <div class=\"container\">
\t    <div class=\"row\">
\t      <div class=\"col-sm-12 col-md-12 col-lg-5\">
\t        <div class=\"block\">
\t          <div class=\"text-wrapper\">
\t\t\t\t\t\t\t<h3>";
        // line 161
        echo "Projectsamenvatting";
        echo "</h3>
\t\t\t\t\t\t\t<p>";
        // line 162
        echo twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "summary", [], "any", false, false, false, 162);
        echo "</p>
\t          </div>
\t        </div>
\t      </div>
\t      <div class=\"col-sm-12 col-md-12 col-lg-6 offset-lg-1 \">
\t        <div class=\"block\">
\t          <div class=\"image-wrapper\">
\t            <div class=\"lcp\">
\t              <picture>
\t\t\t\t\t\t\t\t\t";
        // line 171
        if (twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "fotosummary", [], "any", false, false, false, 171)) {
            // line 172
            echo "\t\t\t\t\t\t\t\t\t\t<img class=\"img\" src=\"";
            echo twig_escape_filter($this->env, ($context["imgUrlPath"] ?? null), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "fotosummary", [], "any", false, false, false, 172), "getpath", [], "any", false, false, false, 172), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t";
        }
        // line 174
        echo "\t              </picture>
\t            </div>
\t          </div>
\t        </div>
\t      </div>
\t    </div>
\t  </div>
\t</div>

\t<div class=\"projects-more-info\">
\t\t";
        // line 184
        if (twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "fotocontactus", [], "any", false, false, false, 184)) {
            // line 185
            echo "\t\t<div class=\"image\" style=\"background: url('";
            echo twig_escape_filter($this->env, ($context["imgUrlPath"] ?? null), "html", null, true);
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "fotocontactus", [], "any", false, false, false, 185), "getpath", [], "any", false, false, false, 185), "html", null, true);
            echo "') no-repeat center; background-size: cover;\"></div>
\t\t";
        }
        // line 187
        echo "\t\t<div class=\"container\">
\t\t\t<h3>";
        // line 188
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Interesse in dit project?"), "html", null, true);
        echo "</h3>

\t\t\t<a href=\"#\" id=\"pd-contact-button\" data-id=\"";
        // line 190
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "id", [], "any", false, false, false, 190), "html", null, true);
        echo "\" class=\"btn btn-gradient\" data-bs-toggle=\"modal\" data-bs-target=\"#form-modal\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Neem contact op"), "html", null, true);
        echo " <i class=\"fa fa-arrow-right\"></i></a>
\t\t</div>
\t</div>

\t<!--
\t\t\"SNK\" => 1,
\t\t\"Gold Standard\" => 2,
\t\t\"VCS (Verified Carbon Standard)\" =>  3,
\t\t\"Climate, Community & Biodiversity (CCB) Standards\" =>  4,
\t\t\"Sustainable Development Verified Impact Standard (SD VISta)\" =>  5,
\t\t\"SOCIALCARBON\" =>  6,
\t\t\"CDM (Clean Development Mechanism)\" =>  7,
\t\t\"Climate Action Reserve\" =>  8,
\t\t\"American Carbon Registry\" =>  9,
\t\t\"Australian Carbon Credit Units\" =>  10,
\t\t\"Woodland Carbon Code\" =>  11,
\t\t\"The International REC Standard\" =>  12,
\t\t\"Gold Power\" =>  13,
\t\t\"EKOenergy\" =>  14,
\t\t\"EcoAustraliaTM\" =>  15,
\t\t\"Verra's Plastic Waste Reduction Standard\" =>  16,
\t!-->

\t";
        // line 213
        if ((twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "project_certificate", [], "any", true, true, false, 213) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "project_certificate", [], "any", false, false, false, 213)))) {
            // line 214
            echo "\t\t<div class=\"projects-certificates\">
\t\t\t<div class=\"container\">
\t\t\t\t<div class=\"introblock\">
\t\t\t\t\t<div class=\"introtitle\">
\t\t\t\t\t\t";
            // line 218
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Certificering"), "html", null, true);
            echo "
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"row justify-content-center\">
\t\t\t\t\t<div class=\"col-12 col-md-4 col-lg-3\">
\t\t\t\t\t\t<div class=\"certificate-item\">
\t\t\t\t\t\t\t<div class=\"text-center\">
\t\t\t\t\t\t\t\t";
            // line 226
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "project_certificate", [], "any", false, false, false, 226), "key", [], "any", false, false, false, 226), 4))) {
                // line 227
                echo "\t\t\t\t\t\t\t\t\t<div class=\"certificate-image\">
\t\t\t\t\t\t\t\t\t\t<img src=\"\" alt=\"image\">
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
            }
            // line 231
            echo "\t\t\t\t\t\t\t\t<div class=\"certificate-image\">
\t\t\t\t\t\t\t\t\t<img src=\"/neutraleco/gfx/certs/cert-woodland-carbon-code.jpg\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"certificate-label\">";
            // line 234
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "project_certificate", [], "any", false, false, false, 234), "label", [], "any", false, false, false, 234), "html", null, true);
            echo "</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t";
        }
        // line 242
        echo "\t";
        if ((1 === twig_compare(twig_length_filter($this->env, ($context["similar_projects"] ?? null)), 0))) {
            // line 243
            echo "\t\t<div class=\"projects-similar\">
\t\t\t<div class=\"container\">
\t\t\t\t<div class=\"introblock\">
\t\t\t\t\t<div class=\"introtitle\">";
            // line 246
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Meer projecten"), "html", null, true);
            echo "</div>
\t\t\t\t\t<div class=\"introtext\">";
            // line 247
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Een selectie van vergelijkbare initiatieven"), "html", null, true);
            echo "</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"similar-projects\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t";
            // line 252
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["similar_projects"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
                // line 253
                echo "\t\t\t\t\t\t\t<div data-id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 253), "html", null, true);
                echo "\" class=\"col-12 col-lg-4\">
\t\t\t\t\t\t\t\t<div class=\"card card-project\">
\t\t\t\t\t\t\t\t\t<div class=\"card-image\">
\t\t\t\t\t\t\t\t\t\t";
                // line 256
                if (twig_get_attribute($this->env, $this->source, $context["project"], "header", [], "any", false, false, false, 256)) {
                    // line 257
                    echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"image\" style=\"background: url('";
                    echo twig_escape_filter($this->env, ($context["imgUrlPath"] ?? null), "html", null, true);
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["project"], "header", [], "any", false, false, false, 257), "getpath", [], "any", false, false, false, 257), "html", null, true);
                    echo "') no-repeat center; background-size: cover;\"></div>
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 259
                echo "\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t<h3>";
                // line 262
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "name", [], "any", false, false, false, 262), "html", null, true);
                echo "</h3>
\t\t\t\t\t\t\t\t\t\t<div class=\"card-text\">
\t\t\t\t\t\t\t\t\t\t\t<p>";
                // line 264
                echo twig_striptags(twig_get_attribute($this->env, $this->source, $context["project"], "summary", [], "any", false, false, false, 264));
                echo "</p>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"card-data\">
\t\t\t\t\t\t\t\t\t\t<table>
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td><b>";
                // line 271
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Capaciteit beschikbaar"), "html", null, true);
                echo "</b></td>
\t\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 272
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "getC02CapacityAvailableByTotalCredits", [0 => twig_get_attribute($this->env, $this->source, $context["project"], "totalUsedCredits", [], "any", false, false, false, 272)], "method", false, false, false, 272), "html", null, true);
                echo "%</td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t<td colspan=\"2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progressbar\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress\" style=\"width: ";
                // line 277
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "getC02CapacityByTotalCredits", [0 => twig_get_attribute($this->env, $this->source, $context["project"], "totalUsedCredits", [], "any", false, false, false, 277)], "method", false, false, false, 277), "html", null, true);
                echo "%;\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['project'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 286
            echo "\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"text-center\">
\t\t\t\t\t<a class=\"btn btn-gradient\" href=\"";
            // line 290
            echo twig_escape_filter($this->env, ($context["projectsLink"] ?? null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bekijk alle projecten"), "html", null, true);
            echo " <i class=\"fa fa-arrow-right\"></i></a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t";
        }
        // line 295
        echo "</section>
";
        // line 296
        $this->loadTemplate("@TrinityNeutral/front/projects/form-popup.html.twig", "@TrinityNeutral/front/projects/view-project-detail.html.twig", 296)->display(twig_array_merge($context, ["project" => ($context["project"] ?? null)]));
        // line 297
        $this->loadTemplate("@TrinityNeutral/front/projects/transactions-popup.html.twig", "@TrinityNeutral/front/projects/view-project-detail.html.twig", 297)->display(twig_array_merge($context, ["project" => ($context["project"] ?? null)]));
        // line 298
        echo "<script src=\"https://www.google.com/recaptcha/api.js?render=6LeqH_UjAAAAAC5oYcT8pdog1dEEC2Uq_s56ujdg\"></script>";
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/front/projects/view-project-detail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  654 => 298,  652 => 297,  650 => 296,  647 => 295,  637 => 290,  631 => 286,  616 => 277,  608 => 272,  604 => 271,  594 => 264,  589 => 262,  584 => 259,  577 => 257,  575 => 256,  568 => 253,  564 => 252,  556 => 247,  552 => 246,  547 => 243,  544 => 242,  533 => 234,  528 => 231,  522 => 227,  520 => 226,  509 => 218,  503 => 214,  501 => 213,  473 => 190,  468 => 188,  465 => 187,  458 => 185,  456 => 184,  444 => 174,  437 => 172,  435 => 171,  423 => 162,  419 => 161,  410 => 154,  406 => 152,  396 => 148,  392 => 147,  389 => 146,  385 => 145,  382 => 144,  380 => 143,  366 => 132,  362 => 131,  351 => 128,  349 => 127,  345 => 126,  334 => 123,  332 => 122,  328 => 121,  322 => 118,  316 => 114,  308 => 112,  305 => 111,  298 => 109,  295 => 108,  275 => 105,  265 => 102,  261 => 101,  258 => 100,  248 => 97,  238 => 96,  235 => 95,  232 => 94,  230 => 93,  227 => 92,  223 => 91,  220 => 90,  218 => 89,  214 => 88,  208 => 84,  200 => 82,  198 => 81,  191 => 77,  185 => 74,  177 => 69,  171 => 66,  163 => 61,  157 => 58,  148 => 52,  140 => 47,  136 => 46,  124 => 37,  118 => 33,  111 => 31,  105 => 30,  99 => 28,  96 => 27,  92 => 26,  89 => 25,  85 => 24,  81 => 23,  77 => 22,  72 => 19,  65 => 16,  62 => 15,  60 => 14,  50 => 6,  43 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/front/projects/view-project-detail.html.twig", "/var/www/html/src/Trinity/NeutralBundle/Resources/views/front/projects/view-project-detail.html.twig");
    }
}
