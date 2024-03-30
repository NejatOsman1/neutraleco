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

/* @TrinityBlog/link.html.twig */
class __TwigTemplate_50092d67c260ee783fb4c4f894d95fb4 extends Template
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
        // line 2
        echo "
<div class=\"mb-3\">
    <label for=\"action\" class=\"form-label\">";
        // line 4
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Soort koppeling", [], "cms"), "html", null, true);
        echo "</label>
    <select class=\"form-select\" name=\"type\" id=\"link_type\">
        <option value=\"\">Regulier koppelen</option>
        <option value=\"popular\">Opsomming (meest populair)</option>
        <option value=\"categories\">Categorie overzicht</option>
    </select>
</div>

<div class=\"form-check\">
    <input class=\"form-check-input\" id=\"chk_notblogspecific\" type=\"checkbox\" name=\"notblogspecific\" ";
        // line 13
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 13), "get", [0 => "notblogspecific"], "method", false, false, false, 13)) ? ("checked=\"checked\"") : (""));
        echo " value=\"1\" onclick=\"showBlogs(); false;\"/>
    <label class=\"form-check-label\" for=\"chk_notblogspecific\">";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Toon nieuws berichten onafhankelijk van nieuws configuratie", [], "cms"), "html", null, true);
        echo "</label>
</div>

<div class=\"mb-3\">
    <label for=\"action\" class=\"form-label\">";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuws", [], "cms"), "html", null, true);
        echo "</label>
    <select class=\"form-select\" name=\"id\" id=\"config_id\">
        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["linkdata"] ?? null), "blogs", [], "any", false, false, false, 20));
        foreach ($context['_seq'] as $context["_key"] => $context["Blog"]) {
            // line 21
            echo "            <option ";
            echo (((twig_get_attribute($this->env, $this->source, $context["Blog"], "id", [], "any", false, false, false, 21) == twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 21), "get", [0 => "id"], "method", false, false, false, 21))) ? ("selected=\"selected\"") : (""));
            echo " value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Blog"], "id", [], "any", false, false, false, 21), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Blog"], "label", [], "any", false, false, false, 21), "html", null, true);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Blog'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "    </select>
</div>

<div class=\"mb-3\">
\t<label class=\"form-label\" for=\"limit\">";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Aantal berichten tonen", [], "cms"), "html", null, true);
        echo "</label>
    <input class=\"form-control\" type=\"text\" name=\"limit\" value=\"";
        // line 28
        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 28), "get", [0 => "limit"], "method", true, true, false, 28) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 28), "get", [0 => "limit"], "method", false, false, false, 28)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 28), "get", [0 => "limit"], "method", false, false, false, 28), "html", null, true))) : (print ("")));
        echo "\" />
</div>

<div class=\"mb-3\">
\t<label class=\"form-label\" for=\"uri_overview\">";
        // line 32
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuws overzicht URL", [], "cms"), "html", null, true);
        echo "</label>
    <input class=\"form-control\" type=\"text\" name=\"uri_overview\" value=\"";
        // line 33
        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 33), "get", [0 => "uri_overview"], "method", true, true, false, 33) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 33), "get", [0 => "uri_overview"], "method", false, false, false, 33)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 33), "get", [0 => "uri_overview"], "method", false, false, false, 33), "html", null, true))) : (print ("")));
        echo "\" />
</div>

<div class=\"mb-3\">
\t<label class=\"form-label\" for=\"uri\">";
        // line 37
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuws detail URL", [], "cms"), "html", null, true);
        echo "</label>
    <input class=\"form-control\" type=\"text\" name=\"uri\" value=\"";
        // line 38
        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 38), "get", [0 => "uri"], "method", true, true, false, 38) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 38), "get", [0 => "uri"], "method", false, false, false, 38)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 38), "get", [0 => "uri"], "method", false, false, false, 38), "html", null, true))) : (print ("")));
        echo "\" />
</div>

<div class=\"mb-3\">
    <label class=\"form-label\" for=\"category_id\" class=\"\">";
        // line 42
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Categorie", [], "cms"), "html", null, true);
        echo "</label>
    <select class=\"form-select\" name=\"category_id[]\" id=\"category_id\" multiple=\"1\">
        <option value=\"\">";
        // line 44
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Alle categorieën", [], "cms"), "html", null, true);
        echo "</option>
        ";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["linkdata"] ?? null), "categories", [], "any", false, false, false, 45));
        foreach ($context['_seq'] as $context["_key"] => $context["Category"]) {
            // line 46
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Category"], "id", [], "any", false, false, false, 46), "html", null, true);
            echo "\" ";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["Category"], "id", [], "any", false, false, false, 46), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 46), "get", [0 => "category_id"], "method", false, false, false, 46))) {
                echo " selected ";
            }
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Category"], "category", [], "any", false, false, false, 46), "html", null, true);
            echo "</option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "    </select>
</div>

<p class=\"select_options\" id=\"options_default\" style=\"display:block;\">
    <strong>Opties</strong>

    <div class=\"form-check\">
        <input class=\"form-check-input\" id=\"chk_pagination\" type=\"checkbox\" name=\"pagination\" ";
        // line 55
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 55), "get", [0 => "pagination"], "method", false, false, false, 55)) ? ("checked=\"checked\"") : (""));
        echo " value=\"1\" />
        <label class=\"form-check-label\" for=\"chk_pagination\">";
        // line 56
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina nummering tonen", [], "cms"), "html", null, true);
        echo "</label>
    </div>

    ";
        // line 63
        echo "
    ";
        // line 68
        echo "
    <div class=\"form-check\">
        <input class=\"form-check-input\" id=\"chk_is_overview\" type=\"checkbox\" name=\"is_overview\" ";
        // line 70
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 70), "get", [0 => "is_overview"], "method", false, false, false, 70)) ? ("checked=\"checked\"") : (""));
        echo " value=\"1\" />
        <label class=\"form-check-label\" for=\"chk_is_overview\">";
        // line 71
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Dit is een overzicht pagina", [], "cms"), "html", null, true);
        echo "</label>
    </div>

    <div class=\"form-check\">
        <input class=\"form-check-input\" id=\"chk_show_all\" type=\"checkbox\" name=\"show_all\" ";
        // line 75
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 75), "get", [0 => "show_all"], "method", false, false, false, 75)) ? ("checked=\"checked\"") : (""));
        echo " value=\"1\" />
        <label class=\"form-check-label\" for=\"chk_show_all\">";
        // line 76
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("\"Alle berichten tonen\"-knop zichtbaar maken", [], "cms"), "html", null, true);
        echo "</label>
    </div>
    <div class=\"form-check\">
        <input class=\"form-check-input\" id=\"chk_show_slider\" type=\"checkbox\" name=\"show_slider\" ";
        // line 79
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 79), "get", [0 => "show_slider"], "method", false, false, false, 79)) ? ("checked=\"checked\"") : (""));
        echo " value=\"1\" />
        <label class=\"form-check-label\" for=\"chk_show_slider\">";
        // line 80
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("\"Toon overzicht als slider (selecteer aantal)", [], "cms"), "html", null, true);
        echo "</label>
    </div>
</p>

<p>
    <strong>Detail pagina:</strong>

    <div class=\"form-check\">
        <input class=\"form-check-input\" id=\"chk_sharing\" type=\"checkbox\" name=\"sharing\" ";
        // line 88
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 88), "get", [0 => "sharing"], "method", false, false, false, 88)) ? ("checked=\"checked\"") : (""));
        echo " value=\"1\" />
        <label class=\"form-check-label\" for=\"chk_sharing\">";
        // line 89
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Delen via social media op de detail pagina", [], "cms"), "html", null, true);
        echo "</label>
    </div>

    ";
        // line 96
        echo "
    <div class=\"form-check\">
        <input class=\"form-check-input\" id=\"chk_allow_replies\" type=\"checkbox\" name=\"allow_replies\" ";
        // line 98
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 98), "get", [0 => "allow_replies"], "method", false, false, false, 98)) ? ("checked=\"checked\"") : (""));
        echo " value=\"1\" />
        <label class=\"form-check-label\" for=\"chk_allow_replies\">";
        // line 99
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reacties toestaan", [], "cms"), "html", null, true);
        echo "</label>
    </div>

    <div class=\"form-check\">
        <input class=\"form-check-input\" id=\"chk_show_anchors\" type=\"checkbox\" name=\"show_anchors\" ";
        // line 103
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 103), "get", [0 => "show_anchors"], "method", false, false, false, 103)) ? ("checked=\"checked\"") : (""));
        echo " value=\"1\" />
        <label class=\"form-check-label\" for=\"chk_show_anchors\">";
        // line 104
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Anchors tonen", [], "cms"), "html", null, true);
        echo "</label>
    </div>

    <div class=\"form-check\">
        <input class=\"form-check-input\" id=\"chk_related\" type=\"checkbox\" name=\"related\" ";
        // line 108
        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 108), "get", [0 => "related"], "method", false, false, false, 108)) ? ("checked=\"checked\"") : (""));
        echo " value=\"1\" />
        <label class=\"form-check-label\" for=\"chk_related\">";
        // line 109
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gerelateerde berichten tonen op basis van gekoppelde categorie", [], "cms"), "html", null, true);
        echo "</label>
    </div>
</p>

<script>
function showOptions(val){
    \$('.select_options').hide();
    \$('#options_' + val).show();
}
showBlogs();
function showBlogs(){
    if (\$('#notblogspecific').is(':checked')) {
        \$('#blog_config').hide();
    } else {
        \$('#blog_config').show();
    }
}
</script>
";
    }

    public function getTemplateName()
    {
        return "@TrinityBlog/link.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  255 => 109,  251 => 108,  244 => 104,  240 => 103,  233 => 99,  229 => 98,  225 => 96,  219 => 89,  215 => 88,  204 => 80,  200 => 79,  194 => 76,  190 => 75,  183 => 71,  179 => 70,  175 => 68,  172 => 63,  166 => 56,  162 => 55,  153 => 48,  138 => 46,  134 => 45,  130 => 44,  125 => 42,  118 => 38,  114 => 37,  107 => 33,  103 => 32,  96 => 28,  92 => 27,  86 => 23,  73 => 21,  69 => 20,  64 => 18,  57 => 14,  53 => 13,  41 => 4,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityBlog/link.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/BlogBundle/Resources/views/link.html.twig");
    }
}
