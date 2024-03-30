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

/* @Cms/navigation/index.html.twig */
class __TwigTemplate_df1b9c6c0ec485b9fad61455772a24e2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
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
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@Cms/navigation/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "\t";
        if ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "customNavigation", [], "any", false, false, false, 5) == true)) {
            // line 6
            echo "\t\t<div class=\"btn-bar\">
\t\t\t<div class=\"left\">
\t\t\t</div>
\t\t\t<div class=\"right\">
\t\t\t\t<a href=\"";
            // line 10
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_navigation_edit");
            echo "\" class=\"btn right waves-effect waves-light\"><i class=\"fa fa-plus\"></i> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Toevoegen", [], "cms"), "html", null, true);
            echo "</a>
\t\t\t</div>
\t\t</div>

\t\t<div class=\"card\">
\t\t\t<div class=\"card-body\">
\t\t\t\t<div class=\"table-wrapper\">
\t\t\t\t\t";
            // line 17
            if (($context["items"] ?? null)) {
                // line 18
                echo "\t\t\t\t\t\t<table class=\"table table-hover\">
\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<th style=\"width:200px;\">";
                // line 21
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sleutel", [], "cms"), "html", null, true);
                echo "</th>
\t\t\t\t\t\t\t\t\t<th>";
                // line 22
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Omschrijving", [], "cms"), "html", null, true);
                echo "</th>
\t\t\t\t\t\t\t\t\t<th class=\"center-align\" style=\"width:120px;\">";
                // line 23
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Aantal items", [], "cms"), "html", null, true);
                echo "</th>
\t\t\t\t\t\t\t\t\t<th style=\"width:100px;\">&nbsp;</th>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t";
                // line 28
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["n"]) {
                    // line 29
                    echo "\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td onclick=\"window.location = '";
                    // line 30
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_navigation_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["n"], "id", [], "any", false, false, false, 30)]), "html", null, true);
                    echo "';\" style=\"cursor:pointer;\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["n"], "short", [], "any", false, false, false, 30), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t<td onclick=\"window.location = '";
                    // line 31
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_navigation_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["n"], "id", [], "any", false, false, false, 31)]), "html", null, true);
                    echo "';\" style=\"cursor:pointer;\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["n"], "label", [], "any", false, false, false, 31), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"center-align\" onclick=\"window.location = '";
                    // line 32
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_navigation_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["n"], "id", [], "any", false, false, false, 32)]), "html", null, true);
                    echo "';\" style=\"cursor:pointer;\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["n"], "items", [], "any", false, false, false, 32), "count", [], "any", false, false, false, 32), "html", null, true);
                    echo "</td>
\t\t\t\t\t\t\t\t\t\t<td class=\"right-align actions\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 34
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_navigation_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["n"], "id", [], "any", false, false, false, 34)]), "html", null, true);
                    echo "\" class=\"tooltipped\" data-tooltip=\"";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wijzigen", [], "cms");
                    echo "\"><i class=\"fa fa-edit\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" onclick=\"cpop.confirm('";
                    // line 35
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u het navigatie menu <b>%label%</b> verwijderen?", ["%label%" => twig_get_attribute($this->env, $this->source, $context["n"], "label", [], "any", false, false, false, 35)], "cms"), "html", null, true);
                    echo "', function(){
\t\t\t\t\t\t\t\t\t\t\t\twindow.location = '";
                    // line 36
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_navigation_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["n"], "id", [], "any", false, false, false, 36)]), "html", null, true);
                    echo "';
\t\t\t\t\t\t\t\t\t\t\t} ); return false;\" class=\"tooltipped\" data-tooltip=\"";
                    // line 37
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms"), "html", null, true);
                    echo "\"><i class=\"far fa-trash-alt\"></i></a>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['n'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 41
                echo "\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t</table>
\t\t\t\t\t";
            } else {
                // line 44
                echo "\t\t\t\t\t\t<center>";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Er zijn geen navigaties toegevoegd", [], "cms"), "html", null, true);
                echo "</center>
\t\t\t\t\t";
            }
            // line 46
            echo "\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t";
        } else {
            // line 50
            echo "\t\t<div class=\"card\">
\t\t\t<div class=\"card-body center-align\">
\t\t\t\t";
            // line 52
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Custom navigatie is niet ingeschakeld", [], "cms"), "html", null, true);
            echo "

\t\t\t\t<p style=\"margin-top: 20px;\"><a href=\"";
            // line 54
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_navigation", ["enable" => 1]);
            echo "\" class=\"btn\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Custom navigatie inschakelen", [], "cms"), "html", null, true);
            echo "</a></p>
\t\t\t</div>
\t\t</div>
\t";
        }
    }

    public function getTemplateName()
    {
        return "@Cms/navigation/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  170 => 54,  165 => 52,  161 => 50,  155 => 46,  149 => 44,  144 => 41,  134 => 37,  130 => 36,  126 => 35,  120 => 34,  113 => 32,  107 => 31,  101 => 30,  98 => 29,  94 => 28,  86 => 23,  82 => 22,  78 => 21,  73 => 18,  71 => 17,  59 => 10,  53 => 6,  50 => 5,  46 => 4,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/navigation/index.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/navigation/index.html.twig");
    }
}
