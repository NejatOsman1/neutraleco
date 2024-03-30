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

/* @TrinityForms/forms/answers.html.twig */
class __TwigTemplate_2aaceaeb1229269f6bc8655ef590d8be extends Template
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
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@TrinityForms/forms/answers.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Forms antwoorden", [], "cms"), "html", null, true);
    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "\t<div>
\t\t";
        // line 8
        if ((array_key_exists("Answer", $context) &&  !twig_test_empty(($context["Answer"] ?? null)))) {
            // line 9
            echo "\t\t\t<div class=\"card\">
\t\t\t\t<div class=\"card-content\">
\t\t\t\t<div class=\"table-responsive\">
\t\t\t\t\t<table class=\"table\">
            ";
            // line 13
            if (twig_get_attribute($this->env, $this->source, ($context["Answer"] ?? null), "session", [], "any", false, false, false, 13)) {
                // line 14
                echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td>Datum:</td>
\t\t\t\t\t\t\t<td>";
                // line 16
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Answer"] ?? null), "session", [], "any", false, false, false, 16), "dateStart", [], "any", false, false, false, 16), "d-m-Y H:i:s"), "html", null, true);
                echo "</td>
\t\t\t\t\t\t</tr>
                                                ";
            }
            // line 19
            echo "\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Answer"] ?? null), "answer", [], "any", false, false, false, 19));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 20
                echo "\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td>";
                // line 21
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo ":</td>
\t\t\t\t\t\t\t\t";
                // line 22
                if (twig_test_iterable($context["value"])) {
                    // line 23
                    echo "\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 25
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["value"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["v"]) {
                        // line 26
                        echo "\t\t\t\t\t\t\t\t\t\t\t<li>";
                        echo twig_escape_filter($this->env, $context["v"], "html", null, true);
                        echo "</li>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['v'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 28
                    echo "\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 31
                    echo "\t\t\t\t\t\t\t\t\t<td>";
                    echo twig_escape_filter($this->env, $context["value"], "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t";
                }
                // line 33
                echo "\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            echo "\t\t\t\t\t</table>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>



\t\t    <div class=\"btn-bar\">
\t\t        <div class=\"left\">
\t\t            ";
            // line 45
            echo "\t\t        </div>
\t\t    </div>
\t\t";
        } else {
            // line 48
            echo "
\t        <div class=\"card\">
\t            <div class=\"card-content\">
              \t<div id=\"filter-loader\"><div class=\"lds-ring\"><div></div><div></div><div></div><div></div></div></div>
\t                <div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 54
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Formulier reacties", [], "cms"), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"card-actions\">
\t\t\t\t\t\t\t\t        <form method=\"get\" id=\"filter-form\" onsubmit=\"filterList(1); return false;\" class=\"me-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"filter_sort\" name=\"filter[sort]\" value=\"p.id\" />
\t\t\t\t\t\t\t\t\t\t      <input type=\"hidden\" id=\"filter_order\" name=\"filter[order]\" value=\"desc\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" onkeyup=\"filterOnInput(this);\" name=\"filter[q]\" class=\"form-control\" value=\"";
            // line 60
            ((array_key_exists("q", $context)) ? (print (twig_escape_filter($this->env, ($context["q"] ?? null), "html", null, true))) : (print ("")));
            echo "\" placeholder=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zoeken op antwoorden", [], "cms"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"btn\" href=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers_export", ["id" => twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 62)]), "html", null, true);
            echo "\"><i class=\"fa fa-download\"></i> Exporteren</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"table-responsive\">
\t\t                <table class=\"table bordered striped highlight responsive-table\" id=\"qsort\">
\t\t                    <thead>
\t\t                        <tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th style=\"width: 200px;\">";
            // line 69
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Datum", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t                                                                <th style=\"width: 200px;\">";
            // line 70
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("IP-adres", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th>";
            // line 71
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Naam", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th style=\"width: 350px;\">";
            // line 72
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("E-mailadres", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th style=\"width: 150px;\">";
            // line 73
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Telefoonnummer", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 74
            if (($context["hasNewsletter"] ?? null)) {
                // line 75
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th class=\"center-align\" style=\"width: 100px;\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuwsbrief", [], "cms"), "html", null, true);
                echo "</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 77
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th style=\"width: 50px;\"></th>
\t\t                        </tr>
\t\t                    </thead>
\t\t                    <tbody id=\"filter-results\"></tbody>
\t\t                </table>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"pagination-wrapper d-flex justify-content-between\">
\t\t\t\t\t\t\t\t\t\t<ul id=\"pagination\" class=\"pagination left\"></ul>
\t\t\t\t\t\t\t\t\t\t<select class=\"form-select w-auto\" name=\"per_page\" id=\"per_page\" onchange=\"filterList(1);\">
\t\t\t\t\t\t\t\t\t\t\t<option value=\"10\">";
            // line 87
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("10 per pagina", [], "cms"), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"20\" selected>";
            // line 88
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("20 per pagina", [], "cms"), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"50\">";
            // line 89
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("50 per pagina", [], "cms"), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t<option value=\"100\">";
            // line 90
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("100 per pagina", [], "cms"), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t</div>
\t            </div>
\t        </div>

\t\t\t<script>
\t\t\tvar current_page = 1;
\t\t\tvar filterUrl = '";
            // line 98
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers_filter", ["formid" => twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 98)]), "html", null, true);
            echo "';
\t\t\tfunction filterList(p){
\t\t\t    current_page = p;
\t\t\t    \$('#filter-loader').show();
\t\t\t    var query = '/' + current_page + '?' + \$('#filter-form').serialize() + '&pp=' + \$('#per_page').val();;
\t\t\t    \$.ajax(filterUrl + query).done(function(response){

\t\t\t        \$('#filter-results').html('');
\t\t\t        if(response.count){
\t\t\t            \$.each(response.results, function(ind, p){
\t\t\t                var tr = \$('<tr>');

\t\t\t                tr.append('<td data-url=\"";
            // line 110
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers", ["id" => twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 110)]), "html", null, true);
            echo "/' + p.id + '\">' + p.date + '</td>');
                                        tr.append('<td data-url=\"";
            // line 111
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers", ["id" => twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 111)]), "html", null, true);
            echo "/' + p.id + '\">' + (p.ip == 'null' ? '----' : p.ip) + '</td>');
\t\t\t                tr.append('<td data-url=\"";
            // line 112
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers", ["id" => twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 112)]), "html", null, true);
            echo "/' + p.id + '\">' + p.name + '</td>');
\t\t\t                tr.append('<td data-url=\"";
            // line 113
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers", ["id" => twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 113)]), "html", null, true);
            echo "/' + p.id + '\">' + p.email + '</td>');
\t\t\t                tr.append('<td data-url=\"";
            // line 114
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers", ["id" => twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 114)]), "html", null, true);
            echo "/' + p.id + '\">' + p.phone + '</td>');
\t\t\t                ";
            // line 115
            if (($context["hasNewsletter"] ?? null)) {
                // line 116
                echo "\t\t\t\t                tr.append('<td class=\"center-align\" data-url=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers", ["id" => twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 116)]), "html", null, true);
                echo "/' + p.id + '\">' + p.nieuwsbrief + '</td>');
\t\t\t                ";
            }
            // line 118
            echo "\t\t\t                tr.append('<td class=\"actions\"><a href=\"#\" onclick=\"cpop.confirm( \\'";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u deze reactie verwijderen?", [], "cms"), "html", null, true);
            echo "\\', function(){ window.location = \\'";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers_delete");
            echo "/' + p.id + '\\'; } ); return false;\"><i class=\"far fa-trash-alt\"></i></a></td>');

\t\t\t                \$('#filter-results').append(tr);
\t\t\t            });
\t\t\t        }else{
\t\t\t            \$('#filter-results').append('<tr><td colspan=\"5\" class=\"center-align\"><em>";
            // line 123
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Geen resultaten gevonden.", [], "cms"), "html", null, true);
            echo "</em></td></tr>');
\t\t\t        }

\t\t\t        \$('td[data-url]').css('cursor', 'pointer').click(function(){
\t\t\t            window.location = \$(this).data('url');
\t\t\t        });

\t\t\t        \$('#pagination').html('');



\t\t\t        if (response.page > 1) {
\t\t\t\t\t\t\$('#pagination').append(\$('<li class=\"page-item\"><a class=\"page-link\" href=\"javascript:prevPage();\"><i class=\"fa fa-chevron-left\"></i></a></li>'));
\t\t\t\t\t}else{
\t\t\t\t\t\t\$('#pagination').append(\$('<li class=\"page-item disabled\"><a class=\"page-link\" href=\"#!\"><i class=\"fa fa-chevron-left\"></i></a></li>'));
\t\t\t\t\t}

\t\t\t\t\t\$.each(paginationParser(parseInt(response.page), parseInt(response.pages)), function(x, i){
\t\t\t\t\t\tif(i == '...'){
\t\t\t\t\t\t\t\$('#pagination').append(\$('<span class=\"sep-dots\">...</span>'));
\t\t\t\t\t\t}else{
\t\t\t\t\t\t\t\$('#pagination').append(\$('<li class=\"page-item' + (response.page == i ? ' active' : '') + '\"><a class=\"page-link\" href=\"javascript:filterList(' + i + ');\">' + i + '</a></li>'));
\t\t\t\t\t\t}
\t\t\t\t\t});

\t\t\t\t\tif (response.page < response.pages) {
\t\t\t\t\t\t\$('#pagination').append(\$('<li class=\"page-item\"><a class=\"page-link\" href=\"javascript:nextPage();\"><i class=\"fa fa-chevron-right\"></i></a></li>'));
\t\t\t\t\t}else{
\t\t\t\t\t\t\$('#pagination').append(\$('<li class=\"page-item disabled\"><a class=\"page-link\" href=\"#!\"><i class=\"fa fa-chevron-right\"></i></a></li>'));
\t\t\t\t\t}

\t\t\t        \$('#filter-loader').hide();
\t\t\t    });
\t\t\t}

\t\t\tfunction nextPage(){
\t\t\t    filterList(current_page + 1);
\t\t\t}

\t\t\tfunction prevPage(){
\t\t\t    filterList(current_page - 1);
\t\t\t}

\t\t\t\$(function(){
\t\t\t    filterList(1);
\t\t\t});
\t\t\t</script>
\t    ";
        }
        // line 171
        echo "\t</div>
";
    }

    public function getTemplateName()
    {
        return "@TrinityForms/forms/answers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  348 => 171,  297 => 123,  286 => 118,  280 => 116,  278 => 115,  274 => 114,  270 => 113,  266 => 112,  262 => 111,  258 => 110,  243 => 98,  232 => 90,  228 => 89,  224 => 88,  220 => 87,  208 => 77,  202 => 75,  200 => 74,  196 => 73,  192 => 72,  188 => 71,  184 => 70,  180 => 69,  170 => 62,  163 => 60,  154 => 54,  146 => 48,  141 => 45,  130 => 35,  123 => 33,  117 => 31,  112 => 28,  103 => 26,  99 => 25,  95 => 23,  93 => 22,  89 => 21,  86 => 20,  81 => 19,  75 => 16,  71 => 14,  69 => 13,  63 => 9,  61 => 8,  58 => 7,  54 => 6,  47 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityForms/forms/answers.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/FormsBundle/Resources/views/forms/answers.html.twig");
    }
}
