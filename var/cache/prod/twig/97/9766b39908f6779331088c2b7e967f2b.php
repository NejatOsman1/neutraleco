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

/* @Cms/redirects/index.html.twig */
class __TwigTemplate_eebd6dadb10ecbcd2b9636c34b80be47 extends Template
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
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@Cms/redirects/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Redirect", [], "cms"), "html", null, true);
    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "\t<form method=\"post\">
\t\t<input type=\"hidden\" name=\"x\" value=\"y\">
\t\t<div class=\"card\">
\t        <div class=\"card-content\">
\t\t\t\t\t\t<div class=\"card-title\">
        \t\t\t<h6>";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Redirects beheren", [], "cms"), "html", null, true);
        echo "</h6>

\t\t\t\t\t\t\t<div class=\"card-actions\">
\t\t\t\t\t\t\t\t<button type=\"button\" onclick=\"addRow()\" class=\"btn\"><i class=\"fa fa-plus\"></i> ";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Rij toevoegen", [], "cms"), "html", null, true);
        echo "</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t        \t<table class=\"table table-responsive table-hover\">
\t        \t\t<thead>
\t        \t\t\t<tr>
\t        \t\t\t\t<th style=\"width:150px;\">";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Soort verwijzing", [], "cms"), "html", null, true);
        echo "</th>
\t\t        \t\t\t<th style=\"width:100px;\">";
        // line 23
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Code", [], "cms"), "html", null, true);
        echo "</th>
\t\t        \t\t\t<th>";
        // line 24
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Oorsprong", [], "cms"), "html", null, true);
        echo "</th>
\t\t        \t\t\t<th style=\"width:350px;\">";
        // line 25
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Doel", [], "cms"), "html", null, true);
        echo "</th>
\t\t        \t\t\t<th style=\"width:50px;\">&nbsp;</th>
\t        \t\t\t</tr>
\t        \t\t</thead>
\t        \t\t<tbody id=\"rows\">
\t        \t\t\t";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["redirectData"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 31
            echo "\t        \t\t\t\t<tr>
\t        \t\t\t\t\t<td>
\t        \t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"data[";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 33), "html", null, true);
            echo "][]\" value=\"";
            echo twig_escape_filter($this->env, (($__internal_compile_0 = $context["row"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null), "html", null, true);
            echo "\" />
\t        \t\t\t\t\t</td>
\t        \t\t\t\t\t<td>
\t        \t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"data[";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 36), "html", null, true);
            echo "][]\" value=\"";
            echo twig_escape_filter($this->env, (($__internal_compile_1 = $context["row"]) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[1] ?? null) : null), "html", null, true);
            echo "\" />
\t        \t\t\t\t\t</td>
\t        \t\t\t\t\t<td>
\t        \t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"data[";
            // line 39
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 39), "html", null, true);
            echo "][]\" value=\"";
            echo twig_escape_filter($this->env, (($__internal_compile_2 = $context["row"]) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[2] ?? null) : null), "html", null, true);
            echo "\" />
\t        \t\t\t\t\t</td>
\t        \t\t\t\t\t<td>
\t        \t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"data[";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 42), "html", null, true);
            echo "][]\" value=\"";
            echo twig_escape_filter($this->env, (($__internal_compile_3 = $context["row"]) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[3] ?? null) : null), "html", null, true);
            echo "\" />
\t        \t\t\t\t\t</td>
\t        \t\t\t\t\t<td valign=\"middle\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"actions\">
\t        \t\t\t\t\t\t\t<button type=\"button\" onclick=\"\$(this).closest('tr').remove();\" class=\"\"><i class=\"far fa-trash-alt\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t        \t\t\t\t\t</td>
\t        \t\t\t\t</tr>
\t        \t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "\t        \t\t</tbody>
\t        \t</table>
\t        </div>
\t    </div>

\t\t<div class=\"btn-bar\">
\t\t\t<div class=\"right\">
\t\t\t\t<button type=\"submit\" class=\"btn right waves-effect waves-light\"><i class=\"material-icons left\">save</i>";
        // line 58
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Opslaan", [], "cms"), "html", null, true);
        echo "</button>
\t\t\t</div>
\t\t</div>
\t</form>

\t<script>
\tfunction addRow(){
\t\tvar ts = Math.round(+new Date());
\t\tconsole.log( ts );
\t\tvar r = \$('<tr>\\
\t\t\t\t\t<td>\\
\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"data[' + ts + '][]\" value=\"redirect\" />\\
\t\t\t\t\t</td>\\
\t\t\t\t\t<td>\\
\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"data[' + ts + '][]\" value=\"301\" />\\
\t\t\t\t\t</td>\\
\t\t\t\t\t<td>\\
\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"data[' + ts + '][]\" value=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("/van", [], "cms"), "html", null, true);
        echo "\" />\\
\t\t\t\t\t</td>\\
\t\t\t\t\t<td>\\
\t\t\t\t\t\t<input type=\"text\" class=\"form-control\" name=\"data[' + ts + '][]\" value=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("/naar", [], "cms"), "html", null, true);
        echo "\" />\\
\t\t\t\t\t</td>\\
\t\t\t\t\t<td class=\"actions right-align\">\\
\t\t\t\t\t\t<button type=\"button\" onclick=\"\$(this).closest(\\'tr\\').remove();\" class=\"\"><i class=\"far fa-trash-alt\"></i></button>\\
\t\t\t\t\t</td>\\
\t\t\t\t</tr>');
\t\t\$('#rows').append(r);
\t}
\t</script>
";
    }

    public function getTemplateName()
    {
        return "@Cms/redirects/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  206 => 78,  200 => 75,  180 => 58,  171 => 51,  146 => 42,  138 => 39,  130 => 36,  122 => 33,  118 => 31,  101 => 30,  93 => 25,  89 => 24,  85 => 23,  81 => 22,  71 => 15,  65 => 12,  58 => 7,  54 => 6,  47 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/redirects/index.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/redirects/index.html.twig");
    }
}
