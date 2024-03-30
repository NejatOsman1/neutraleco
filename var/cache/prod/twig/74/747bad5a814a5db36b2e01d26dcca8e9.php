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

/* @TrinityNeutral/front/projects/view-projects-ext.html.twig */
class __TwigTemplate_776a9aedbab943b24bb8c2e2fda6fbcf extends Template
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
        if ((twig_length_filter($this->env, ($context["projects"] ?? null)) > 0)) {
            // line 2
            echo "\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["projects"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
                // line 3
                echo "\t\t<div data-id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 3), "html", null, true);
                echo "\" class=\"col-12 col-lg-4\">
\t\t\t<div class=\"card card-project\">
\t\t\t\t<a href=\"";
                // line 5
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "url", [], "any", false, false, false, 5), "html", null, true);
                echo "\">
\t\t\t\t\t<div class=\"card-image\">
\t\t\t\t\t\t";
                // line 7
                if (twig_get_attribute($this->env, $this->source, $context["project"], "header", [], "any", false, false, false, 7)) {
                    // line 8
                    echo "\t\t\t\t\t\t\t<div class=\"image\" style=\"background: url('";
                    echo twig_escape_filter($this->env, ($context["imgUrlPath"] ?? null), "html", null, true);
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["project"], "header", [], "any", false, false, false, 8), "getpath", [], "any", false, false, false, 8), "html", null, true);
                    echo "') no-repeat center; background-size: cover;\"></div>
\t\t\t\t\t\t";
                }
                // line 10
                echo "\t\t\t\t\t\t<div class=\"card-image-labels\">
\t\t\t\t\t\t\t";
                // line 11
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["project"], "status", [], "any", false, false, false, 11), [0 => 6])) {
                    echo "<div class=\"sold-out\">";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uitverkocht"), "html", null, true);
                    echo "</div>";
                }
                // line 12
                echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t<h3>";
                // line 16
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "name", [], "any", false, false, false, 16), "html", null, true);
                echo "</h3>
\t\t\t\t\t\t<div class=\"card-text\">
\t\t\t\t\t\t\t<p>";
                // line 18
                echo twig_striptags(twig_get_attribute($this->env, $this->source, $context["project"], "summary", [], "any", false, false, false, 18));
                echo "</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"card-data\">
\t\t\t\t\t\t<table>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td><b>";
                // line 25
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Capaciteit beschikbaar"), "html", null, true);
                echo "</b></td>
\t\t\t\t\t\t\t\t<td>";
                // line 26
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "getC02CapacityAvailableByTotalCredits", [0 => twig_get_attribute($this->env, $this->source, $context["project"], "totalUsedCredits", [], "any", false, false, false, 26)], "method", false, false, false, 26), "html", null, true);
                echo "%</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td colspan=\"2\">
\t\t\t\t\t\t\t\t\t<div class=\"progressbar\">
\t\t\t\t\t\t\t\t\t\t<div class=\"progress\" style=\"width: ";
                // line 31
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "getC02CapacityByTotalCredits", [0 => twig_get_attribute($this->env, $this->source, $context["project"], "totalUsedCredits", [], "any", false, false, false, 31)], "method", false, false, false, 31), "html", null, true);
                echo "%;\"></div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</table>
\t\t\t\t\t</div>
\t\t\t\t</a>
\t\t\t</div>
\t\t</div>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['project'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 42
            echo "\t<div class=\"col-12 col-lg-6\">
\t\t<span>
\t\t\t";
            // line 44
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Geen project gevonden"), "html", null, true);
            echo "
\t\t</span>
\t</div>
";
        }
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/front/projects/view-projects-ext.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 44,  123 => 42,  106 => 31,  98 => 26,  94 => 25,  84 => 18,  79 => 16,  73 => 12,  67 => 11,  64 => 10,  57 => 8,  55 => 7,  50 => 5,  44 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/front/projects/view-projects-ext.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/NeutralBundle/Resources/views/front/projects/view-projects-ext.html.twig");
    }
}
