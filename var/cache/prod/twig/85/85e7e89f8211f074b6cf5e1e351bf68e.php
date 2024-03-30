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

/* @TrinitySlider/slider/index.html.twig */
class __TwigTemplate_4b0b3cc411c50023148af91325fe58de extends Template
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
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@TrinitySlider/slider/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Slider", [], "cms"), "html", null, true);
    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "\t<div class=\"card\">
\t\t<div class=\"card-content\">
\t\t\t<span class=\"card-title\">
\t\t\t\t<span class=\"card-titles\">
\t\t\t\t\t<h6>";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sliders", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t</span>
\t\t\t</span>
\t\t\t";
        // line 14
        if (($context["sliders"] ?? null)) {
            // line 15
            echo "\t\t\t<div class=\"table-responsive\">
\t\t\t<table class=\"table table-hover\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th class=\"\" style=\"width:40px;\">";
            // line 19
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("ID", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t<th>";
            // line 20
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Omschrijving", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t<th class=\"center-align\" style=\"width:80px;\">";
            // line 21
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Slides", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t<th class=\"right-align\" style=\"width:100px;\">";
            // line 22
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Acties", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>
\t\t\t\t<tbody>
\t\t\t\t\t";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["sliders"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Slider"]) {
                // line 27
                echo "\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<td class=\"\">";
                // line 28
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Slider"], "id", [], "any", false, false, false, 28));
                echo "</td>
\t\t\t\t\t\t\t<td>";
                // line 29
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Slider"], "label", [], "any", false, false, false, 29));
                echo "</td>
\t\t\t\t\t\t\t<td class=\"center-align\">";
                // line 30
                echo twig_escape_filter($this->env, twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Slider"], "entries", [], "any", false, false, false, 30)), "html", null, true);
                echo "</td>
\t\t\t\t\t\t\t<td class=\"right-align actions\">
\t\t\t\t\t\t\t\t<a href=\"";
                // line 32
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_slider_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["Slider"], "id", [], "any", false, false, false, 32)]), "html", null, true);
                echo "\" class=\"tooltipped\"  data-tooltip=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wijzigen", [], "cms"), "html", null, true);
                echo "\"><i class=\"fa fa-edit\"></i></a>
\t\t\t\t\t\t\t\t";
                // line 33
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["Slider"], "id", [], "any", false, false, false, 33), ($context["slider_used"] ?? null))) {
                    // line 34
                    echo "\t\t\t\t\t\t\t\t<span style=\"opacity: 0.5;\" title=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Niet verwijderbaar, slider is op een pagina gekoppeld", [], "cms"), "html", null, true);
                    echo "\"><i class=\"far fa-trash-alt\"></i></span>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 36
                    echo "                                <a href=\"#\" onclick=\"cpop.confirm('";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u de slider <b>%sliderlabel%</b> en de %sliderlength% verbonden slide(s) verwijderen?", ["%sliderlabel%" => twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Slider"], "label", [], "any", false, false, false, 36)), "%sliderlength%" => twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Slider"], "entries", [], "any", false, false, false, 36))], "cms");
                    echo "', function(){
\t\t\t\t\t\t\t\t\twindow.location = '";
                    // line 37
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_slider_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["Slider"], "id", [], "any", false, false, false, 37)]), "html", null, true);
                    echo "';
\t\t\t\t\t\t\t\t} ); return false;\" class=\"tooltipped\" data-tooltip=\"";
                    // line 38
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms"), "html", null, true);
                    echo "\"><i class=\"far fa-trash-alt\"></i></a>
\t\t\t\t\t\t\t\t";
                }
                // line 46
                echo "\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t</tr>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Slider'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            echo "\t\t\t\t</tbody>
\t\t\t</table>
\t\t\t</div>
\t\t\t";
        } else {
            // line 53
            echo "\t\t\t\t<div class=\"no-data\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Er zijn nog geen gegevens beschikbaar.", [], "cms"), "html", null, true);
            echo "</div>
\t\t\t";
        }
        // line 55
        echo "\t    </div>
    </div>

\t";
        // line 61
        echo "


\t<div class=\"btn-bar\">
\t\t<div class=\"right\">
\t\t\t<a href=\"";
        // line 66
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_slider_edit");
        echo "\" class=\"btn waves-effect waves-light\"><i class=\"material-icons left\">add</i>";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuwe slider", [], "cms"), "html", null, true);
        echo "</a>
\t\t</div>
\t</div>

    <script type=\"text/javascript\">
    /*\$(function() {
\t    cpop.reset().loadAjax('";
        // line 72
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_slider_edit");
        echo "');
\t});*/
    ";
        // line 83
        echo "    </script>
";
    }

    public function getTemplateName()
    {
        return "@TrinitySlider/slider/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 83,  188 => 72,  177 => 66,  170 => 61,  165 => 55,  159 => 53,  153 => 49,  145 => 46,  140 => 38,  136 => 37,  131 => 36,  125 => 34,  123 => 33,  117 => 32,  112 => 30,  108 => 29,  104 => 28,  101 => 27,  97 => 26,  90 => 22,  86 => 21,  82 => 20,  78 => 19,  72 => 15,  70 => 14,  64 => 11,  58 => 7,  54 => 6,  47 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinitySlider/slider/index.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/SliderBundle/Resources/views/slider/index.html.twig");
    }
}
