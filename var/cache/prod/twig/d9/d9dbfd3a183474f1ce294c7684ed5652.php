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

/* @TrinityForms/forms/index.html.twig */
class __TwigTemplate_d4f32a5539ca65f897132b2bee975b2b extends Template
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
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@TrinityForms/forms/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Forms", [], "cms"), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Formulieren", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t";
        // line 15
        if (($context["forms"] ?? null)) {
            // line 16
            echo "\t\t\t<div class=\"table-responsive\">
\t\t\t\t<table class=\"table\">
\t\t\t\t\t<thead>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th class=\"text-center\" style=\"width:40px;\">";
            // line 20
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("ID", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t<th>";
            // line 21
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Omschrijving", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t<th class=\"text-center\" style=\"width:100px;\">";
            // line 22
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reacties", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t<th class=\"text-center\" style=\"width:100px;\">";
            // line 23
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Acties", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t</tr>
\t\t\t\t\t</thead>
\t\t\t\t\t<tbody>
\t\t\t\t\t\t";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["forms"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Form"]) {
                // line 28
                echo "\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td data-url=\"";
                // line 29
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["Form"], "id", [], "any", false, false, false, 29)]), "html", null, true);
                echo "\" class=\"text-center\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Form"], "id", [], "any", false, false, false, 29));
                echo "</td>
\t\t\t\t\t\t\t\t<td data-url=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["Form"], "id", [], "any", false, false, false, 30)]), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Form"], "label", [], "any", false, false, false, 30));
                echo "</td>
\t\t\t\t\t\t\t\t<td data-url=\"";
                // line 31
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["Form"], "id", [], "any", false, false, false, 31)]), "html", null, true);
                echo "\" class=\"text-center\">
\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 32
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers", ["id" => twig_get_attribute($this->env, $this->source, $context["Form"], "id", [], "any", false, false, false, 32)]), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Form"], "answers", [], "any", false, false, false, 32)), "html", null, true);
                echo "</a>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t<td class=\"actions text-center\">
\t\t\t\t\t\t\t\t\t<a href=\"#\" onclick=\"cpop.confirm( '";
                // line 35
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u het volgende formulier verwijderen:", [], "cms"), "html", null, true);
                echo " <b>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Form"], "label", [], "any", false, false, false, 35));
                echo "</b>.', function(){
\t\t\t\t\t\t\t\t\t\twindow.location = '";
                // line 36
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["Form"], "id", [], "any", false, false, false, 36)]), "html", null, true);
                echo "';
\t\t\t\t\t\t\t\t\t} ); return false;\" class=\"tooltipped\" data-tooltip=\"";
                // line 37
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms"), "html", null, true);
                echo "\"><i class=\"far fa-trash-alt\"></i></a>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Form'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "\t\t\t\t\t</tbody>
\t\t\t\t</table>
\t\t\t</div>
\t\t\t";
        } else {
            // line 45
            echo "\t\t\t\t<div class=\"no-data\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Er zijn nog geen gegevens beschikbaar.", [], "cms"), "html", null, true);
            echo "</div>
\t\t\t";
        }
        // line 47
        echo "\t    </div>
    </div>

\t<div class=\"btn-bar\">
\t\t<div class=\"right\">
\t\t\t<a href=\"";
        // line 52
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_edit", ["id" => 0]);
        echo "\" class=\"btn\"><i class=\"fa fa-plus\"></i> ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuw formulier", [], "cms"), "html", null, true);
        echo "</a>
\t\t</div>
\t</div>

\t<div class=\"card\">
    </div>

    <script type=\"text/javascript\">
/*    \$(\".tablesorter\").tablesorter({
        // sort on the first column and third column, order asc
        sortList: [[4,1]],
        headers: {
        \t4: {sorter:\"dd-mm-yyyy hh:ii:ss\"},
            6: {sorter: false}
        }
    });
*/


    \$('td[data-url]').css('cursor', 'pointer').click(function(){
        window.location = \$(this).data('url');
    });
    </script>
";
    }

    public function getTemplateName()
    {
        return "@TrinityForms/forms/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 52,  161 => 47,  155 => 45,  149 => 41,  139 => 37,  135 => 36,  129 => 35,  121 => 32,  117 => 31,  111 => 30,  105 => 29,  102 => 28,  98 => 27,  91 => 23,  87 => 22,  83 => 21,  79 => 20,  73 => 16,  71 => 15,  64 => 11,  58 => 7,  54 => 6,  47 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityForms/forms/index.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/FormsBundle/Resources/views/forms/index.html.twig");
    }
}
