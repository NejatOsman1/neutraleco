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

/* @TrinityBlog/entry/replies_ajax.html.twig */
class __TwigTemplate_d629e74c96581384e62bf67b40107b82 extends Template
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
        $context["paginationPath"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 1), "attributes", [], "any", false, false, false, 1), "get", [0 => "_route"], "method", false, false, false, 1);
        // line 2
        $context["currentFilters"] = ["id" => 1];
        // line 3
        if (array_key_exists("Entry", $context)) {
            // line 4
            echo "    ";
            $context["currentFilters"] = ["id" => twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "id", [], "any", false, false, false, 4)];
        }
        // line 7
        echo "
";
        // line 15
        echo "
<table class=\"table table-hover\">
    <thead>
        <tr>
            <th>";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Naam"), "html", null, true);
        echo "</th>
            <th>";
        // line 20
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuwsbericht"), "html", null, true);
        echo "</th>
            <th>";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reactie"), "html", null, true);
        echo "</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["replies"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["R"]) {
            // line 27
            echo "            ";
            $context["detailUrl"] = ((((($context["baseUrl"] ?? null) . "/") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["R"], "entry", [], "any", false, false, false, 27), "id", [], "any", false, false, false, 27)) . "/") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["R"], "entry", [], "any", false, false, false, 27), "getDefaultSlug", [], "any", false, false, false, 27));
            // line 28
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["R"], "entry", [], "any", false, false, false, 28), "slug", [], "any", false, false, false, 28)) {
                // line 29
                echo "                ";
                $context["detailUrl"] = ((($context["baseUrl"] ?? null) . "/") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["R"], "entry", [], "any", false, false, false, 29), "getSlug", [], "any", false, false, false, 29));
                // line 30
                echo "            ";
            }
            // line 31
            echo "            <tr>
                <td>
                    ";
            // line 33
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["R"], "firstname", [], "any", false, false, false, 33) . " ") . twig_get_attribute($this->env, $this->source, $context["R"], "lastname", [], "any", false, false, false, 33)), "html", null, true);
            echo "<br/>
                    <small>";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["R"], "email", [], "any", false, false, false, 34), "html", null, true);
            echo "</small>
                </td>
                <td><a href=\"";
            // line 36
            echo twig_escape_filter($this->env, ($context["detailUrl"] ?? null), "html", null, true);
            echo "\" target=\"_blank\"><strong>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["R"], "entry", [], "any", false, false, false, 36), "label", [], "any", false, false, false, 36), "html", null, true);
            echo "</strong><span><br/>(";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["R"], "entry", [], "any", false, false, false, 36), "datePublish", [], "any", false, false, false, 36), "d-m-Y H:i:s"), "html", null, true);
            echo ")</span></a></td>
                <td data-commentSmall=\"";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $this->extensions['Twig\Extra\String\StringExtension']->createUnicodeString(twig_get_attribute($this->env, $this->source, $context["R"], "comment", [], "any", false, false, false, 37)), "truncate", [0 => 100], "method", false, false, false, 37), "html", null, true);
            echo "\" data-comment=\"";
            echo twig_get_attribute($this->env, $this->source, $context["R"], "comment", [], "any", false, false, false, 37);
            echo "\">
                    ";
            // line 38
            echo (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["R"], "comment", [], "any", false, false, false, 38)) > 100)) ? ((((twig_get_attribute($this->env, $this->source, $this->extensions['Twig\Extra\String\StringExtension']->createUnicodeString(twig_get_attribute($this->env, $this->source, $context["R"], "comment", [], "any", false, false, false, 38)), "truncate", [0 => 100], "method", false, false, false, 38) . "<a class=\"read-more\" href=\"#\" onclick=\"\$(this).closest('td').html(\$(this).closest('td').data('comment')); return false;\">") . $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Lees meer")) . "</a>")) : (twig_get_attribute($this->env, $this->source, $context["R"], "comment", [], "any", false, false, false, 38)));
            echo "
                </td>
                <td class=\"right-align actions\">
                    <a class=\"tt\" data-info=\"";
            // line 41
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reactie wijzigen/bekijken"), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_entry_replies_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["R"], "id", [], "any", false, false, false, 41), "src" => "admin_mod_blog_entry", "srcid" => twig_get_attribute($this->env, $this->source, ($context["Blog"] ?? null), "id", [], "any", false, false, false, 41)]), "html", null, true);
            echo "\"><i class=\"fa fa-edit\"></i></a>
                    <a href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_entry_replies_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["R"], "id", [], "any", false, false, false, 42), "dst" => "index"]), "html", null, true);
            echo "\" class=\"tt confirm\" data-msg=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u deze reactie verwijderen?"), "html", null, true);
            echo "\" data-info=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reactie verwijderen"), "html", null, true);
            echo "\"><i class=\"far fa-trash-alt\"></i></a>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['R'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "    </tbody>
</table>

";
        // line 49
        $this->loadTemplate("@Cms/pagination_bootstrap.html.twig", "@TrinityBlog/entry/replies_ajax.html.twig", 49)->display(twig_to_array(["currentPage" =>         // line 50
($context["page"] ?? null), "lastPage" =>         // line 51
($context["replies_pages"] ?? null), "paginationPath" =>         // line 52
($context["paginationPath"] ?? null), "currentFilters" =>         // line 53
($context["currentFilters"] ?? null), "showAlwaysFirstAndLast" => true]));
    }

    public function getTemplateName()
    {
        return "@TrinityBlog/entry/replies_ajax.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 53,  149 => 52,  148 => 51,  147 => 50,  146 => 49,  141 => 46,  127 => 42,  121 => 41,  115 => 38,  109 => 37,  101 => 36,  96 => 34,  92 => 33,  88 => 31,  85 => 30,  82 => 29,  79 => 28,  76 => 27,  72 => 26,  64 => 21,  60 => 20,  56 => 19,  50 => 15,  47 => 7,  43 => 4,  41 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityBlog/entry/replies_ajax.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/BlogBundle/Resources/views/entry/replies_ajax.html.twig");
    }
}
