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

/* @Cms/metadata/index.html.twig */
class __TwigTemplate_6538c3024cb024e8c3f79d7b0d5241e3 extends Template
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
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@Cms/metadata/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("layout.title.metadata", [], "cms"), "html", null, true);
        echo " <small class=\"pull-right\"><a class=\"btn btn-primary\" href=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_metadata_edit");
        echo "?id=0\"><span class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></span> ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("btn.add.metatag", [], "cms"), "html", null, true);
        echo "</a></small>";
    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "    <div class=\"card\">
\t\t<div class=\"card-content\">
\t\t\t<div class=\"card-titles\">
\t\t\t\t<h6 class=\"card-title\">";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina specifiek", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t</div>
      <div class=\"table-responsive\">
\t\t\t<table class=\"table table-hover\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t<th style=\"width:200px;\">";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sleutel", [], "cms"), "html", null, true);
        echo "</th>
\t\t\t\t\t\t<th style=\"width:140px;\">";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Soort", [], "cms"), "html", null, true);
        echo "</th>
\t\t\t\t\t\t<th class=\"right-align\" style=\"width:100px;\"></th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 23
        if ( !twig_test_empty(($context["pageMetatags"] ?? null))) {
            // line 24
            echo "\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["pageMetatags"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Metatag"]) {
                // line 25
                echo "\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td>";
                // line 26
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "label", [], "any", false, false, false, 26));
                echo "</td>
\t\t\t\t\t\t\t\t<td>";
                // line 27
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "key", [], "any", false, false, false, 27));
                echo "</td>
\t\t\t\t\t\t\t\t<td>";
                // line 28
                (((twig_get_attribute($this->env, $this->source, $context["Metatag"], "valueType", [], "any", false, false, false, 28) == "image")) ? (print (twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Afbeelding", [], "cms"), "html", null, true))) : (print ("")));
                echo "</td>
\t\t\t\t\t\t\t\t<td class=\"right-align actions\">
\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_metadata_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["Metatag"], "id", [], "any", false, false, false, 30)]), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wijzigen", [], "cms"), "html", null, true);
                echo "\"><i class=\"fa fa-edit\"></i></a>
\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 31
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_metadata_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["Metatag"], "id", [], "any", false, false, false, 31)]), "html", null, true);
                echo "\" onclick=\"cpop.confirm('";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u de metatag <b>%metatagkey%</b> verwijderen?", ["%metatagkey%" => twig_get_attribute($this->env, $this->source, $context["Metatag"], "key", [], "any", false, false, false, 31)], "cms"), "html", null, true);
                echo "', function(){
\t\t\t\t\t\t\t\t\t\twindow.location = '";
                // line 32
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_metadata_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["Metatag"], "id", [], "any", false, false, false, 32)]), "html", null, true);
                echo "';
\t\t\t\t\t\t\t\t\t} ); return false;\" title=\"";
                // line 33
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms"), "html", null, true);
                echo "\"><i class=\"far fa-trash-alt\"></i></a>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Metatag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "\t\t\t\t\t";
        } else {
            // line 38
            echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td colspan=\"3\" style=\"text-align:center;\">";
            // line 39
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Geen gegevens beschikbaar.", [], "cms"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
        }
        // line 42
        echo "\t\t\t\t</tbody>
\t\t\t</table>
      </div>
\t\t</div>
\t</div>
\t<div class=\"card\">
\t\t<div class=\"card-content\">
\t\t\t<div class=\"card-titles\">
\t\t\t\t<h6 class=\"card-title\">";
        // line 50
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Globaal", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t</div>
      <div class=\"table-responsive\">
\t\t\t<table class=\"table table-hover\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t<th style=\"width:200px;\">";
        // line 57
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sleutel", [], "cms"), "html", null, true);
        echo "</th>
\t\t\t\t\t\t<th style=\"width:140px;\">";
        // line 58
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Soort", [], "cms"), "html", null, true);
        echo "</th>
\t\t\t\t\t\t<th class=\"right-align\" style=\"width:100px;\"></th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
        // line 63
        if ( !twig_test_empty(($context["systemMetatags"] ?? null))) {
            // line 64
            echo "\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["systemMetatags"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Metatag"]) {
                // line 65
                echo "\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td>";
                // line 66
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "label", [], "any", false, false, false, 66));
                echo "</td>
\t\t\t\t\t\t\t\t<td>";
                // line 67
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "key", [], "any", false, false, false, 67));
                echo "</td>
\t\t\t\t\t\t\t\t<td>";
                // line 68
                echo (((twig_get_attribute($this->env, $this->source, $context["Metatag"], "valueType", [], "any", false, false, false, 68) == "image")) ? ("Afbeelding") : (""));
                echo "</td>
\t\t\t\t\t\t\t\t<td class=\"right-align actions\">
\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 70
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_metadata_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["Metatag"], "id", [], "any", false, false, false, 70)]), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wijzigen", [], "cms"), "html", null, true);
                echo "\"><i class=\"fa fa-edit\"></i></a>
\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 71
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_metadata_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["Metatag"], "id", [], "any", false, false, false, 71)]), "html", null, true);
                echo "\" onclick=\"cpop.confirm('";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u de metatag <b>%metatagkey%</b> verwijderen?", ["%metatagkey%" => twig_get_attribute($this->env, $this->source, $context["Metatag"], "key", [], "any", false, false, false, 71)], "cms"), "html", null, true);
                echo "', function(){
\t\t\t\t\t\t\t\t\t\twindow.location = '";
                // line 72
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_metadata_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["Metatag"], "id", [], "any", false, false, false, 72)]), "html", null, true);
                echo "';
\t\t\t\t\t\t\t\t\t} ); return false;\" title=\"";
                // line 73
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms"), "html", null, true);
                echo "\"><i class=\"far fa-trash-alt\"></i></a>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Metatag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            echo "\t\t\t\t\t";
        } else {
            // line 78
            echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td colspan=\"3\" style=\"text-align:center;\">";
            // line 79
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Geen gegevens beschikbaar.", [], "cms"), "html", null, true);
            echo "</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
        }
        // line 82
        echo "\t\t\t\t</tbody>
\t\t\t</table>
      </div>
\t    </div>
    </div>

\t<div class=\"btn-bar\">
\t\t<div class=\"right\"><a href=\"";
        // line 89
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_metadata_edit", ["id" => 0]);
        echo "\" class=\"btn\"><i class=\"fa fa-plus left\"></i>";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuwe metatag toevoegen", [], "cms"), "html", null, true);
        echo "</a></div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "@Cms/metadata/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  253 => 89,  244 => 82,  238 => 79,  235 => 78,  232 => 77,  222 => 73,  218 => 72,  212 => 71,  206 => 70,  201 => 68,  197 => 67,  193 => 66,  190 => 65,  185 => 64,  183 => 63,  175 => 58,  171 => 57,  161 => 50,  151 => 42,  145 => 39,  142 => 38,  139 => 37,  129 => 33,  125 => 32,  119 => 31,  113 => 30,  108 => 28,  104 => 27,  100 => 26,  97 => 25,  92 => 24,  90 => 23,  82 => 18,  78 => 17,  68 => 10,  63 => 7,  59 => 6,  47 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/metadata/index.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/metadata/index.html.twig");
    }
}
