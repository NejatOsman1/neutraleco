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

/* @TrinityForms/elements/h2.html.twig */
class __TwigTemplate_4f8552ff4b8475f37ea8aa1808caf5f8165b6196ad3ab41d6a32ebb0adb9f1a4 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'field' => [$this, 'block_field'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 2
        return $this->loadTemplate([0 => ":forms_elements:row.html.twig", 1 => "@TrinityForms/elements/row.html.twig"], "@TrinityForms/elements/h2.html.twig", 2);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_field($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "\t<h2 ";
        if (array_key_exists("edit", $context)) {
            echo "contenteditable=\"true\" style=\"margin-top:40px;\"";
        }
        echo " data-type=\"title\" style=\"outline:none;\">";
        echo twig_escape_filter($this->env, _twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getTitle", [], "any", false, false, false, 5), $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Titel", [], "forms")), "html", null, true);
        echo "</h2>

\t";
        // line 8
        echo "\t";
        if (array_key_exists("edit", $context)) {
            // line 9
            echo "\t\t<div class=\"info\">
\t\t\t<span class=\"qid\">(";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getTypeLabel", [], "any", false, false, false, 10), "html", null, true);
            echo ", ID: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 10), "html", null, true);
            echo ")</span>
\t\t</div>
\t";
        }
    }

    public function getTemplateName()
    {
        return "@TrinityForms/elements/h2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 10,  62 => 9,  59 => 8,  49 => 5,  45 => 4,  35 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityForms/elements/h2.html.twig", "/var/www/html/src/Trinity/FormsBundle/Resources/views/elements/h2.html.twig");
    }
}
