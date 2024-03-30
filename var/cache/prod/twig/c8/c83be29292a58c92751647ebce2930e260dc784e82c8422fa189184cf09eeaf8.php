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

/* @TrinityNeutral/front/projects/transactions-popup.html.twig */
class __TwigTemplate_70755b8586d2cfaa991f8618e3ef4184802c72722d3220d655455b4546ad882d extends Template
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
        echo "<div id=\"transactions-modal\" class=\"modal modal\" data-project-id=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "getId", [], "any", false, false, false, 1), "html", null, true);
        echo "\" tabindex=\"-1\">
\t<div class=\"modal-dialog modal-dialog-centered modal-dialog-scrollable\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<div class=\"modal-title text-center\">
\t\t\t\t\t<h3>
\t\t\t\t\t\t<i class=\"fa fa-exchange-alt\"></i> ";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Transacties"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "name", [], "any", false, false, false, 7), "html", null, true);
        echo "
\t\t\t\t\t</h3>

\t\t\t\t\t<p>
\t\t\t\t\t\tHieronder een overzicht van alle transacties van dit project.
\t\t\t\t\t</p>
\t\t\t\t</div>

\t\t\t\t<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
\t\t\t</div>

\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"content-transactions\">
\t\t\t\t\t<div class=\"loader\">
\t\t\t\t\t\t<i class=\"fa fa-spin fa-circle-notch\"></i><br/>
\t\t\t\t\t\t";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Transacties laden"), "html", null, true);
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t";
        // line 30
        echo "\t\t</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/front/projects/transactions-popup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 30,  67 => 22,  47 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/front/projects/transactions-popup.html.twig", "/var/www/html/src/Trinity/NeutralBundle/Resources/views/front/projects/transactions-popup.html.twig");
    }
}
