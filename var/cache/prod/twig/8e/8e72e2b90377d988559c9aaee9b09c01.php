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

/* @TrinityNeutral/backend/projects/projects.html.twig */
class __TwigTemplate_c9f43341242e4f5e5afcf6b551393d3d extends Template
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
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@TrinityNeutral/backend/projects/projects.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Projects", [], "cms"), "html", null, true);
    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "\t<div class=\"card\">
\t\t<div class=\"card-body\">
\t\t\t<div class=\"card-title\">
\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t<h6>";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Projecten", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t</div>
\t\t\t\t<div class=\"card-actions\">
\t\t\t\t\t<form method=\"get\" id=\"projects-filter-form\" onsubmit=\"filterList(";
        // line 14
        echo twig_escape_filter($this->env, ($context["page"] ?? null), "html", null, true);
        echo "); return false;\" class=\"d-flex\">
\t\t\t\t\t\t<div class=\"action me-3\">
\t\t\t\t\t\t\t";
        // line 17
        echo "\t\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" placeholder=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zoeken op Projectnaam", [], "cms"), "html", null, true);
        echo "\" name=\"filter[q]\" value=\"\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"action\">
\t\t\t\t\t\t\t";
        // line 21
        echo "\t\t\t\t\t\t\t<select class=\"form-select w-auto\" name=\"filter[status]\" onchange=\"filterList(";
        echo twig_escape_filter($this->env, ($context["page"] ?? null), "html", null, true);
        echo ")\" placeholder=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Status", [], "cms"), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t<option selected=\"\" value=\"\">";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Selecteer een status", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t\t\t\t\t";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["statusses"] ?? null));
        foreach ($context['_seq'] as $context["value"] => $context["key"]) {
            // line 24
            echo "\t\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['value'], $context['key'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<button style=\"position:absolute;top:0;left:-9999px;\" type=\"submit\">";
        // line 28
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zoeken", [], "cms"), "html", null, true);
        echo "</button>
\t\t\t\t\t</form>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div id=\"projects-filter-results\">
\t\t\t";
        // line 33
        $this->loadTemplate("@TrinityNeutral/backend/projects/projects-ext.html.twig", "@TrinityNeutral/backend/projects/projects.html.twig", 33)->display(twig_array_merge($context, ["projects" =>         // line 34
($context["projects"] ?? null), "statusses" =>         // line 35
($context["statusses"] ?? null), "pagination" =>         // line 36
($context["pagination"] ?? null)]));
        // line 38
        echo "\t\t\t</div>
\t\t</div>
\t</div>
\t<script>\t\t
\t\tfunction filterList(page = 1){\t\t\t
\t\t\tvar filterUrl = \"";
        // line 43
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_neutral_projects_filter", ["page" => "test"]);
        echo "\";
\t\t\tfilterUrl = filterUrl.replace(\"test\",page);
\t\t\t\$.ajax({
\t\t\t\ttype: \"POST\",
\t\t\t\tdata: \$('#projects-filter-form').serialize(),
\t\t\t\turl:filterUrl,
\t\t\t\tsuccess: function(response){
\t\t\t\t\t\$('#projects-filter-results').html(response);
\t\t\t\t}
\t\t\t});
\t\t\treturn false;
\t\t}
\t</script>
";
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/backend/projects/projects.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 43,  125 => 38,  123 => 36,  122 => 35,  121 => 34,  120 => 33,  112 => 28,  108 => 26,  97 => 24,  93 => 23,  89 => 22,  82 => 21,  75 => 17,  70 => 14,  64 => 11,  58 => 7,  54 => 6,  47 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/backend/projects/projects.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/NeutralBundle/Resources/views/backend/projects/projects.html.twig");
    }
}
