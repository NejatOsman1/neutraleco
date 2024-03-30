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

/* @TrinityBlog/entry/index.html.twig */
class __TwigTemplate_ff3cec30ce3d10ebe28e0f27540eaa1c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'pagetitle' => [$this, 'block_pagetitle'],
            'catselect' => [$this, 'block_catselect'],
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
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@TrinityBlog/entry/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Blog", [], "cms"), "html", null, true);
    }

    // line 6
    public function block_catselect($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 9
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "
\t";
        // line 11
        if (($context["blogDetailPage"] ?? null)) {
            // line 12
            echo "\t\t";
            $context["baseUrl"] = ($context["blogDetailPage"] ?? null);
            // line 13
            echo "\t";
        } elseif ((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "uri", [], "any", true, true, false, 13) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "uri", [], "any", false, false, false, 13)))) {
            // line 14
            echo "\t\t";
            $context["baseUrl"] = ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("homepage") . twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "uri", [], "any", false, false, false, 14));
            // line 15
            echo "\t";
        } else {
            // line 16
            echo "\t\t";
            $context["baseUrl"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 16), "attributes", [], "any", false, false, false, 16), "get", [0 => "_route"], "method", false, false, false, 16));
            // line 17
            echo "\t";
        }
        // line 18
        echo "
\t<ul class=\"nav nav-tabs\" role=\"tablist\">
\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t<button class=\"nav-link active\" id=\"messages\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-messages\" type=\"button\" role=\"tab\" aria-controls=\"tab-messages\" aria-selected=\"true\">";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Berichten", [], "cms"), "html", null, true);
        echo "</button>
\t\t</li>
\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t<button class=\"nav-link\" id=\"categories\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-categories\" type=\"button\" role=\"tab\" aria-controls=\"tab-categories\" aria-selected=\"false\">";
        // line 24
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Categorieën", [], "cms"), "html", null, true);
        echo "</button>
\t\t</li>
\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t<button class=\"nav-link\" id=\"configs\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-configs\" type=\"button\" role=\"tab\" aria-controls=\"tab-configs\" aria-selected=\"false\">";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Configuraties", [], "cms"), "html", null, true);
        echo "</button>
\t\t</li>
\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t<button class=\"nav-link\" id=\"replies\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-replies\" type=\"button\" role=\"tab\" aria-controls=\"tab-replies\" aria-selected=\"false\">";
        // line 30
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reacties", [], "cms"), "html", null, true);
        echo "</button>
\t\t</li>
\t\t";
        // line 32
        if ( !twig_test_empty(($context["moderate_replies"] ?? null))) {
            // line 33
            echo "\t\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t\t<button class=\"nav-link\" id=\"moderation\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-moderation\" type=\"button\" role=\"tab\" aria-controls=\"tab-moderation\" aria-selected=\"false\">
\t\t\t\t\t";
            // line 35
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reacties goedkeuren", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t<span class=\"badge new\" data-badge-caption=\"\">";
            // line 36
            echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["moderate_replies"] ?? null)), "html", null, true);
            echo "</span></a>
\t\t\t\t</button>
\t\t\t</li>
\t\t";
        } else {
            // line 40
            echo "\t\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t\t<button class=\"nav-link disabled\" id=\"moderation\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-moderation\" type=\"button\" role=\"tab\" aria-controls=\"tab-moderation\" aria-selected=\"false\">
\t\t\t\t\t";
            // line 42
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reacties goedkeuren", [], "cms"), "html", null, true);
            echo "
\t\t\t\t</button>
\t\t\t</li>
\t\t";
        }
        // line 46
        echo "\t</ul>

\t<div class=\"tab-content\" id=\"myTabContent\">
\t\t<div class=\"tab-pane fade show active\" id=\"tab-messages\" role=\"tabpanel\" aria-labelledby=\"tab-messages\">
\t\t\t<div id=\"basic\" class=\"t-content\">
\t\t\t\t<div class=\"card\">
\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t<h6>";
        // line 55
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Berichten", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"card-actions card-fields\">
\t\t\t\t\t\t\t\t<form method=\"get\" id=\"filter-form\" onsubmit=\"filterList(1); return false;\">
\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"filter_sort\" name=\"filter[sort]\" value=\"p.datePublish\" />
\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"filter_order\" name=\"filter[order]\" value=\"desc\" />

\t\t\t\t\t\t\t\t\t<button style=\"display:none;\" type=\"submit\">";
        // line 63
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zoeken", [], "cms"), "html", null, true);
        echo "</button>

\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-lg-3\">
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" placeholder=\"";
        // line 67
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zoeken in berichten", [], "cms");
        echo "\" type=\"text\" name=\"filter[q]\" value=\"";
        ((array_key_exists("q", $context)) ? (print (twig_escape_filter($this->env, ($context["q"] ?? null), "html", null, true))) : (print ("")));
        echo "\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-lg-3\">
\t\t\t\t\t\t\t\t\t\t\t<select class=\"form-select\" name=\"filter[concept]\" onchange=\"\$('#filter-form').submit();\">
\t\t\t\t\t\t\t\t\t\t\t\t<option selected value=\"\">";
        // line 71
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Alle statussen", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"0\">";
        // line 72
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gepubliceerd", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"1\">";
        // line 73
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Concept", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-lg-3\">
\t\t\t\t\t\t\t\t\t\t\t<select class=\"form-select\" name=\"filter[category]\" onchange=\"\$('#filter-form').submit();\">
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">";
        // line 78
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Alle categorieën", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 79
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["Category"]) {
            // line 80
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Category"], "id", [], "any", false, false, false, 80), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Category"], "category", [], "any", false, false, false, 80), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-lg-3\">
\t\t\t\t\t\t\t\t\t\t\t<select class=\"form-select\" name=\"per_page\" id=\"per_page\" onchange=\"filterList(1);\">
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"10\">";
        // line 86
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("10 per pagina", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"20\" selected>";
        // line 87
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("20 per pagina", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"50\">";
        // line 88
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("50 per pagina", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"100\">";
        // line 89
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("100 per pagina", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>


\t\t\t\t\t\t";
        // line 99
        echo "
\t\t\t\t\t\t<div class=\"table-responsive\">
\t\t\t\t\t\t\t<table class=\"table table-hover\" id=\"qsort\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<th>";
        // line 104
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Omschrijving & URL", [], "cms"), "html", null, true);
        echo "</th>
\t\t\t\t\t\t\t\t\t\t<th>";
        // line 105
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Categorie", [], "cms"), "html", null, true);
        echo "</th>
\t\t\t\t\t\t\t\t\t\t<th>";
        // line 106
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Status", [], "cms"), "html", null, true);
        echo "</th>
\t\t\t\t\t\t\t\t\t\t<th>";
        // line 107
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Datum", [], "cms"), "html", null, true);
        echo "</th>
\t\t\t\t\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody id=\"filter-results\"></tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div id=\"filter-loader\"><div class=\"lds-ring\"><div></div><div></div><div></div><div></div></div></div>

\t\t\t\t\t\t<div class=\"pagination-wrapper\">
\t\t\t\t\t\t\t<ul id=\"pagination\" class=\"pagination left\"></ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"tab-pane fade\" id=\"tab-categories\" role=\"tabpanel\" aria-labelledby=\"tab-categories\">
\t\t\t<div class=\"card\">
\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t<h6>";
        // line 129
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Categorieën", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t<p>";
        // line 130
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Categorieën zijn collecties van nieuwsberichten, een bericht kan aan meerdere categorieën gekoppeld worden.", [], "cms"), "html", null, true);
        echo "</p>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"card-actions\">
\t\t\t\t\t\t\t<a href=\"";
        // line 134
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_category_add", ["id" => twig_get_attribute($this->env, $this->source, ($context["Blog"] ?? null), "id", [], "any", false, false, false, 134)]), "html", null, true);
        echo "\" class=\"btn\"><i class=\"fa fa-plus\"></i> ";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuwe categorie", [], "cms");
        echo "</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>


\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t<div class=\"table-responsive\">
\t\t\t\t\t\t\t<table class=\"table table-hover\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<th>";
        // line 145
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Categorieën", [], "cms"), "html", null, true);
        echo "</th>
\t\t\t\t\t\t\t\t\t\t<th style=\"width: 100px;\" class=\"text-center\">";
        // line 146
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Berichten", [], "cms"), "html", null, true);
        echo "</th>
\t\t\t\t\t\t\t\t\t\t<th style=\"width: 100px;\"></th>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t";
        // line 151
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["Category"]) {
            // line 152
            echo "\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td>";
            // line 153
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Category"], "category", [], "any", false, false, false, 153), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-center\">";
            // line 154
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Category"], "entry", [], "any", false, false, false, 154), "count", [], "any", false, false, false, 154), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"text-end actions\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 156
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_category_add", ["id" => twig_get_attribute($this->env, $this->source, ($context["Blog"] ?? null), "id", [], "any", false, false, false, 156), "catid" => twig_get_attribute($this->env, $this->source, $context["Category"], "id", [], "any", false, false, false, 156)]), "html", null, true);
            echo "\" class=\"tooltipped\"  data-tooltip=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wijzigen", [], "cms"), "html", null, true);
            echo "\"><i class=\"fa fa-edit\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" onclick=\"cpop.confirm( ' ";
            // line 157
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u de categorie <b>%category%</b> verwijderen? <br />Er zijn <b>%count%</b> bericht(en) die deze categorie gebruiken.", ["%category%" => twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Category"], "category", [], "any", false, false, false, 157)), "%count%" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Category"], "entry", [], "any", false, false, false, 157), "count", [], "any", false, false, false, 157)], "cms");
            echo "', function(){ window.location = '";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_category_delete", ["id" => twig_get_attribute($this->env, $this->source, ($context["Blog"] ?? null), "id", [], "any", false, false, false, 157), "catid" => twig_get_attribute($this->env, $this->source, $context["Category"], "id", [], "any", false, false, false, 157)]), "html", null, true);
            echo "'; } ); return false;\" class=\"tooltipped\" data-tooltip=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms"), "html", null, true);
            echo "\"><i class=\"far fa-trash-alt\"></i></a>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 161
        echo "\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"tab-pane fade\" id=\"tab-configs\" role=\"tabpanel\" aria-labelledby=\"tab-configs\">
\t\t\t<div class=\"card\">
\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t<h6>";
        // line 174
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Configuraties", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t<p>";
        // line 175
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Configuraties zijn collecties van één of meerdere categorieën, zo kunnen meerdere categorieën eenvoudig gekoppeld worden.", [], "cms"), "html", null, true);
        echo "</p>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"card-actions\">
\t\t\t\t\t\t\t<a href=\"";
        // line 179
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_edit", ["id" => twig_get_attribute($this->env, $this->source, ($context["Blog"] ?? null), "id", [], "any", false, false, false, 179)]), "html", null, true);
        echo "\" class=\"btn-flat\"><i class=\"fa fa-cog\"></i> ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Configuratie wijzigen", [], "cms"), "html", null, true);
        echo "</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>


\t\t\t\t\t<select onchange=\"changeConfig(this);\" class=\"form-select\">
\t\t\t\t\t\t";
        // line 185
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["blogs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 186
            echo "\t\t\t\t\t\t<option ";
            if ((twig_get_attribute($this->env, $this->source, ($context["Blog"] ?? null), "id", [], "any", false, false, false, 186) == twig_get_attribute($this->env, $this->source, $context["option"], "id", [], "any", false, false, false, 186))) {
                echo "selected=\"selected\"";
            }
            echo " value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "id", [], "any", false, false, false, 186), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "label", [], "any", false, false, false, 186), "html", null, true);
            echo "</option>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 188
        echo "\t\t\t\t\t\t";
        // line 189
        echo "\t\t\t\t\t</select>

\t\t\t\t\t<a data-msg=\"";
        // line 191
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Weet u zeker dat u de configuratie '%label%' wilt verwijderen?", ["%label%" => twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Blog"] ?? null), "label", [], "any", false, false, false, 191))], "cms");
        echo "\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_delete", ["id" => twig_get_attribute($this->env, $this->source, ($context["Blog"] ?? null), "id", [], "any", false, false, false, 191)]), "html", null, true);
        echo "\" class=\"confirm btn red mt-3\">
\t\t\t\t\t\t<i class=\"far fa-trash-alt\"></i> ";
        // line 192
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Huidige configuratie verwijderen", [], "cms"), "html", null, true);
        echo "
\t\t\t\t\t</a>
\t\t\t\t\t<a href=\"";
        // line 194
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_edit");
        echo "\" class=\"btn mt-3\">
\t\t\t\t\t\t<i class=\"fa fa-plus\"></i> ";
        // line 195
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Configuratie toevoegen", [], "cms"), "html", null, true);
        echo "
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"tab-pane fade\" id=\"tab-replies\" role=\"tabpanel\" aria-labelledby=\"tab-replies\">
\t\t\t<div id=\"recent\" class=\"t-content\">
\t\t\t\t<div class=\"card\">
\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t<h6>";
        // line 205
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reacties", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t<input type=\"text\" placeholder=\"Zoeken in reacties\" class=\"form-control\" style=\"width: 250px;\" id=\"q\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"table-responsive\" id=\"replies-table\">


\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"tab-pane fade\" id=\"tab-moderation\" role=\"tabpanel\" aria-labelledby=\"tab-moderation\">
\t\t\t<div id=\"moderation\" class=\"t-content\">
\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t<div class=\"table-responsive\">
\t\t\t\t\t\t\t\t\t<table class=\"table table-hover\">
\t\t\t\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th>";
        // line 224
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Naam", [], "cms"), "html", null, true);
        echo "</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th>";
        // line 225
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuwsbericht", [], "cms"), "html", null, true);
        echo "</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th>";
        // line 226
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reactie", [], "cms"), "html", null, true);
        echo "</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th>&nbsp;</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 231
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["moderate_replies"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["R"]) {
            // line 232
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            $context["detailUrl"] = ((((($context["baseUrl"] ?? null) . "/") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["R"], "entry", [], "any", false, false, false, 232), "id", [], "any", false, false, false, 232)) . "/") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["R"], "entry", [], "any", false, false, false, 232), "getDefaultSlug", [], "any", false, false, false, 232));
            // line 233
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["R"], "entry", [], "any", false, false, false, 233), "slug", [], "any", false, false, false, 233)) {
                // line 234
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["detailUrl"] = ((($context["baseUrl"] ?? null) . "/") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["R"], "entry", [], "any", false, false, false, 234), "getSlug", [], "any", false, false, false, 234));
                // line 235
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 236
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 238
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["R"], "firstname", [], "any", false, false, false, 238) . " ") . twig_get_attribute($this->env, $this->source, $context["R"], "lastname", [], "any", false, false, false, 238)), "html", null, true);
            echo "<br/>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<small>";
            // line 239
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["R"], "email", [], "any", false, false, false, 239), "html", null, true);
            echo "</small>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>";
            // line 241
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["R"], "entry", [], "any", false, false, false, 241), "label", [], "any", false, false, false, 241), "html", null, true);
            echo "<span><br/>(";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["R"], "entry", [], "any", false, false, false, 241), "datePublish", [], "any", false, false, false, 241), "d-m-Y H:i:s"), "html", null, true);
            echo ")</span></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 243
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td data-commentSmall=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $this->extensions['Twig\Extra\String\StringExtension']->createUnicodeString(twig_get_attribute($this->env, $this->source, $context["R"], "comment", [], "any", false, false, false, 243)), "truncate", [0 => 100], "method", false, false, false, 243), "html", null, true);
            echo "\" data-comment=\"";
            echo twig_get_attribute($this->env, $this->source, $context["R"], "comment", [], "any", false, false, false, 243);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 244
            echo (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["R"], "comment", [], "any", false, false, false, 244)) > 100)) ? ((((twig_get_attribute($this->env, $this->source, $this->extensions['Twig\Extra\String\StringExtension']->createUnicodeString(twig_get_attribute($this->env, $this->source, $context["R"], "comment", [], "any", false, false, false, 244)), "truncate", [0 => 100], "method", false, false, false, 244) . "<a href=\"#\" onclick=\"\$(this).closest('td').html(\$(this).closest('td').data('comment')); return false;\">") . $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Lees meer", [], "cms")) . "</a>")) : (twig_get_attribute($this->env, $this->source, $context["R"], "comment", [], "any", false, false, false, 244)));
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"right-align actions\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"tooltipped\" data-tooltip=\"";
            // line 247
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reactie goedkeuren", [], "cms"), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_approval", ["blog" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["R"], "entry", [], "any", false, false, false, 247), "blog", [], "any", false, false, false, 247), "id", [], "any", false, false, false, 247), "id" => twig_get_attribute($this->env, $this->source, $context["R"], "id", [], "any", false, false, false, 247), "status" => "1"]), "html", null, true);
            echo "\"><i class=\"fa fa-check\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"tooltipped\" data-tooltip=\"";
            // line 248
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reactie verwijderen", [], "cms"), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_approval", ["blog" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["R"], "entry", [], "any", false, false, false, 248), "blog", [], "any", false, false, false, 248), "id", [], "any", false, false, false, 248), "id" => twig_get_attribute($this->env, $this->source, $context["R"], "id", [], "any", false, false, false, 248), "status" => "0"]), "html", null, true);
            echo "\"><i class=\"far fa-trash-alt\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['R'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 252
        echo "\t\t\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>

\t<div class=\"btn-bar\">
\t\t<div class=\"left\"></div>
\t\t<div class=\"right\">
\t\t\t";
        // line 264
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
            // line 265
            echo "\t\t\t<a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_openai");
            echo "\" class=\"btn-flat\"><i class=\"fas fa-microchip fa-fw\"></i> Maak met EasifyGPT</a>
\t\t\t";
        }
        // line 267
        echo "\t\t\t<a href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_entry_edit", ["id" => 0, "blog" => twig_get_attribute($this->env, $this->source, ($context["Blog"] ?? null), "id", [], "any", false, false, false, 267)]), "html", null, true);
        echo "\" class=\"btn\"><i class=\"fa fa-plus\"></i> ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuw bericht", [], "cms"), "html", null, true);
        echo "</a>
\t\t</div>
\t</div>

\t<script>
\tvar current_page = 1;
\tvar filterUrl = '";
        // line 273
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_entry_filter", ["blogid" => twig_get_attribute($this->env, $this->source, ($context["Blog"] ?? null), "id", [], "any", false, false, false, 273)]), "html", null, true);
        echo "';
\tfunction filterList(p){
\t\tcurrent_page = p;
\t\t\$('#filter-loader').show();
\t\tvar query = '/' + current_page + '?' + \$('#filter-form').serialize() + '&pp=' + \$('#per_page').val();;
\t\t\$.ajax(filterUrl + query).done(function(response){

\t\t\t\$('#filter-results').html('');
\t\t\tif(response.count){
\t\t\t\t\t\$.each(response.results, function(ind, p){
\t\t\t\t\t\t\tvar tr = \$('<tr>');
\t\t\t\t\t\t\tif(p.concept){
\t\t\t\t\t\t\t\t\ttr.css('opacity', 0.5);
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t// tr.append('<td class=\"center-align\" data-url=\"";
        // line 287
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_entry_edit");
        echo "/' + p.id + '\">' + p.id + '</td>');

\t\t\t\t\t\t\tvar description = \$('<td data-url=\"";
        // line 289
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_entry_edit");
        echo "/' + p.id + '\">');
\t\t\t\t\t\t\tdescription.append('<div class=\"label\">' + p.label + '</div>');

\t\t\t\t\t\t\tif(p.url){
\t\t\t\t\t\t\t\t\tdescription.append('<div class=\"url\">' + p.url + '</div>');
\t\t\t\t\t\t\t}else{
\t\t\t\t\t\t\t\t\tdescription.append('<div><small>";
        // line 295
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Er is geen overzichtspagina gekoppeld.", [], "cms"), "html", null, true);
        echo "</small></div>');
\t\t\t\t\t\t\t}
\t\t\t\t\t\t\tdescription.append('</td>');
\t\t\t\t\t\t\ttr.append(description);
\t\t\t\t\t\t\ttr.append('<td data-url=\"";
        // line 299
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_entry_edit");
        echo "/' + p.id + '\">' + p.cat.join(', ') + '</td>');
\t\t\t\t\t\t\ttr.append('<td class=\"center-align\" data-url=\"";
        // line 300
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_entry_edit");
        echo "/' + p.id + '\">' + (p.concept ? '";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Concept", [], "cms"), "html", null, true);
        echo "' :  '";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gepubliceerd", [], "cms"), "html", null, true);
        echo "') + '</td>');
\t\t\t\t\t\t\ttr.append('<td class=\"center-align\" data-url=\"";
        // line 301
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_entry_edit");
        echo "/' + p.id + '\">' + p.datum + (p.datum_eind != '' ? '<span>' + p.datum_eind + '</span>' : '') + '</td>');

\t\t\t\t\t\t\tvar actions = \$('<td class=\"actions\">');
\t\t\t\t\t\t\tactions.append('<a href=\"";
        // line 304
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_entry_replies");
        echo "/' + p.id + '\" class=\"tooltipped\"  data-tooltip=\"' + p.replies + ' ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("reacties bekijken", [], "cms"), "html", null, true);
        echo "\">\\
\t\t\t\t\t\t\t\t\t<div class=\"comment\">\\
\t\t\t\t\t\t\t\t\t\t\t<i class=\"far fa-comment\"></i>\\
\t\t\t\t\t\t\t\t\t\t\t<div class=\"number\">' + p.replies + '</div>\\
\t\t\t\t\t\t\t\t\t\t\t</div>\\
\t\t\t\t\t\t\t</a>');
\t\t\t\t\t\t\tactions.append('<a class=\"popup-pad\" href=\"";
        // line 310
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_entry_clone");
        echo "/' + p.id + '?popup=1\" title=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Dupliceren", [], "cms"), "html", null, true);
        echo "\"><i class=\"far fa-clone\"></i></a>');

\t\t\t\t\t\t\tif (p.url && !p.is_external) {
\t\t\t\t\t\t\t\t\tactions.append('<a target=\"_blank\" href=\"' + p.url + '\" title=\"";
        // line 313
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("BEKIJKEN", [], "cms"), "html", null, true);
        echo "\"><i class=\"fa fa-external-link-alt\"></i></a>');
\t\t\t\t\t\t\t}

\t\t\t\t\t\t\tactions.append('<a href=\"#\" onclick=\"cpop.confirm( \\' ";
        // line 316
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u het blog bericht", [], "cms"), "html", null, true);
        echo " <b>' + p.label + '</b>   ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("verwijderen?", [], "cms"), "html", null, true);
        echo "\\', function(){ window.location = \\'";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_entry_delete");
        echo "/' + p.id + '\\'; } ); return false;\"  class=\"tooltipped\"  data-tooltip=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms"), "html", null, true);
        echo "\"><i class=\"far fa-trash-alt\"></i></a>');

\t\t\t\t\t\t\ttr.append(actions);

\t\t\t\t\t\t\t\$('#filter-results').append(tr);
\t\t\t\t\t});
\t\t\t\t\t\$('#filter-results').find('.tooltipped').tooltip({delay: 50});
\t\t\t} else {
\t\t\t\t\t\$('#filter-results').append('<tr><td colspan=\"99\" class=\"center-align\"><div class=\"alert alert-info my-3\">";
        // line 324
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Geen resultaten gevonden.", [], "cms"), "html", null, true);
        echo "</div></td></tr>');
\t\t\t}

\t\t\t\$('td[data-url]').css('cursor', 'pointer').click(function(){
\t\t\t\t\twindow.location = \$(this).data('url');
\t\t\t});

\t\t\t\$('#pagination').html('');



\t\t\tif (response.page > 1) {
\t\t\t\t\$('#pagination').append(\$('<li class=\"page-item\"><a class=\"page-link\" href=\"javascript:prevPage();\"><i class=\"fa fa-chevron-left\"></i></a></li>'));
\t\t\t}else{
\t\t\t\t\$('#pagination').append(\$('<li class=\"page-item disabled\"><a class=\"page-link\" href=\"#!\"><i class=\"fa fa-chevron-left\"></i></a></li>'));
\t\t\t}

\t\t\t\t\$.each(paginationParser(parseInt(response.page), parseInt(response.pages)), function(x, i){
\t\t\t\t\tif(i == '...'){
\t\t\t\t\t\t\$('#pagination').append(\$('<span class=\"sep-dots\">...</span>'));
\t\t\t\t\t}else{
\t\t\t\t\t\t\$('#pagination').append(\$('<li class=\"page-item' + (response.page == i ? ' active' : '') + '\"><a class=\"page-link\" href=\"javascript:filterList(' + i + ');\">' + i + '</a></li>'));
\t\t\t\t\t}
\t\t\t\t});

\t\t\tif (response.page < response.pages) {
\t\t\t\t\$('#pagination').append(\$('<li class=\"page-item\"><a class=\"page-link\" href=\"javascript:nextPage();\"><i class=\"fa fa-chevron-right\"></i></a></li>'));
\t\t\t}else{
\t\t\t\t\$('#pagination').append(\$('<li class=\"page-item disabled\"><a class=\"page-link\" href=\"#!\"><i class=\"fa fa-chevron-right\"></i></a></li>'));
\t\t\t}

\t\t\t\$('#filter-loader').hide();
\t\t\tcpop.resetPopupHandlers();
\t\t});
\t}

\tfunction nextPage(){
\t\tfilterList(current_page + 1);
\t}

\tfunction prevPage(){
\t\tfilterList(current_page - 1);
\t}

\t// Replies AJAX pages
\tlet replies_url = '";
        // line 369
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_entry", ["id" => 1]);
        echo "';

\tfunction loadRepliesAjax(page, q){
\t\t\$.ajax(replies_url + '/' + page + '?q=' + q).done(function(r){
\t\t\t\$('#replies-table').html(r);
\t\t\t\$('#tab-replies .page-link').off('click').on('click', function(e){
\t\t\t\te.preventDefault();
\t\t\t\tlet page = \$(this).data('page');
\t\t\t\tlet href = \$(this).attr('href');
\t\t\t\tloadRepliesAjax(page, q);
\t\t\t});
\t\t});
\t}

\t\$(function(){
\t\tfilterList(1);

\t\t// Load replies via AJAX
\t\tloadRepliesAjax(1, '');

\t\t\$('#q').keyup(function(e){
\t\t\tvar code = e.key; // recommended to use e.key, it's normalized across devices and languages
\t\t\tif(code===\"Enter\") e.preventDefault();
\t\t\tif(code===\"Enter\"){
\t\t\t\tloadRepliesAjax(1, \$(this).val());
\t\t\t} // missing closing if brace
\t\t});
\t});
\t</script>

\t<script type=\"text/javascript\">
\t";
        // line 408
        echo "
\tfunction changeConfig(el) {
\t\tif (el.value == '') {
\t\t\twindow.location = '";
        // line 411
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_edit");
        echo "';
\t\t} else {
\t\t\twindow.location = '";
        // line 413
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_entry");
        echo "/' + el.value;
\t\t}
\t}
\t</script>
";
    }

    public function getTemplateName()
    {
        return "@TrinityBlog/entry/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  784 => 413,  779 => 411,  774 => 408,  740 => 369,  692 => 324,  675 => 316,  669 => 313,  661 => 310,  650 => 304,  644 => 301,  636 => 300,  632 => 299,  625 => 295,  616 => 289,  611 => 287,  594 => 273,  582 => 267,  576 => 265,  574 => 264,  560 => 252,  548 => 248,  542 => 247,  536 => 244,  529 => 243,  523 => 241,  518 => 239,  514 => 238,  510 => 236,  507 => 235,  504 => 234,  501 => 233,  498 => 232,  494 => 231,  486 => 226,  482 => 225,  478 => 224,  456 => 205,  443 => 195,  439 => 194,  434 => 192,  428 => 191,  424 => 189,  422 => 188,  407 => 186,  403 => 185,  392 => 179,  385 => 175,  381 => 174,  366 => 161,  352 => 157,  346 => 156,  341 => 154,  337 => 153,  334 => 152,  330 => 151,  322 => 146,  318 => 145,  302 => 134,  295 => 130,  291 => 129,  266 => 107,  262 => 106,  258 => 105,  254 => 104,  247 => 99,  235 => 89,  231 => 88,  227 => 87,  223 => 86,  217 => 82,  206 => 80,  202 => 79,  198 => 78,  190 => 73,  186 => 72,  182 => 71,  173 => 67,  166 => 63,  155 => 55,  144 => 46,  137 => 42,  133 => 40,  126 => 36,  122 => 35,  118 => 33,  116 => 32,  111 => 30,  105 => 27,  99 => 24,  93 => 21,  88 => 18,  85 => 17,  82 => 16,  79 => 15,  76 => 14,  73 => 13,  70 => 12,  68 => 11,  65 => 10,  61 => 9,  55 => 6,  48 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityBlog/entry/index.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/BlogBundle/Resources/views/entry/index.html.twig");
    }
}
