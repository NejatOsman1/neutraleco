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

/* @TrinityForms/elements/text.html.twig */
class __TwigTemplate_ea914fd5fe9e88e73cd70bbd805a50130d8edf8669c6460b6362e3afbc9158de extends Template
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
        return $this->loadTemplate([0 => ":forms_elements:row.html.twig", 1 => "@TrinityForms/elements/row.html.twig"], "@TrinityForms/elements/text.html.twig", 2);
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
        echo "\t";
        $context["getval"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 5), "get", [0 => ("field" . twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 5))], "method", false, false, false, 5);
        // line 6
        echo "\t\t";
        if ((array_key_exists("edit", $context) ||  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 6)))) {
            // line 7
            echo "\t\t\t";
            if (twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "floatingLabels", [], "any", false, false, false, 7)) {
                echo "<div class=\"form-floating\">";
            }
            // line 8
            echo "\t\t";
        }
        // line 9
        echo "\t\t\t<input class=\"form-control\" id=\"frm-lbl-";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 9), "html", null, true);
        echo "\" name=\"form[";
        if ( !(null === ($context["Form"] ?? null))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 9), "html", null, true);
        }
        echo "][";
        if ( !(null === ($context["Question"] ?? null))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 9), "html", null, true);
        }
        echo "]\" type=\"text\" ";
        if (array_key_exists("edit", $context)) {
            echo " disabled=\"disabled\" ";
        }
        echo " placeholder=\"";
        if (array_key_exists("edit", $context)) {
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 9)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 9)) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tekst veld", [], "forms"))), "html", null, true);
        } elseif ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 9))) {
            echo twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 9);
        }
        echo "\" ";
        if ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "required", [], "any", false, false, false, 9) && (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "hidden", [], "any", false, false, false, 9), false)))) {
            echo "required=\"true\"";
        }
        echo " value=\"";
        (( !twig_test_empty(($context["getval"] ?? null))) ? (print (twig_escape_filter($this->env, ($context["getval"] ?? null), "html", null, true))) : (print ("")));
        echo "\" />
\t\t\t";
        // line 10
        if ((twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "floatingLabels", [], "any", false, false, false, 10) &&  !twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "hiddenLabel", [], "any", false, false, false, 10))) {
            // line 11
            echo "\t\t\t\t<label for=\"frm-lbl-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 11), "html", null, true);
            echo "\">
\t\t\t\t\t";
            // line 12
            if (array_key_exists("edit", $context)) {
                // line 13
                echo "\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 13)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 13)) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tekst veld", [], "forms"))), "html", null, true);
                echo "
\t\t\t\t\t";
            } elseif ( !twig_test_empty(twig_get_attribute($this->env, $this->source,             // line 14
($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 14))) {
                // line 15
                echo "\t\t\t\t\t\t";
                echo twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 15);
                echo "
\t\t\t\t\t";
            }
            // line 17
            echo "\t\t\t\t</label>
\t\t\t";
        }
        // line 19
        echo "\t";
        if ((array_key_exists("edit", $context) ||  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 19)))) {
            // line 20
            echo "\t\t";
            if (twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "floatingLabels", [], "any", false, false, false, 20)) {
                echo "</div>";
            }
            // line 21
            echo "\t";
        }
    }

    public function getTemplateName()
    {
        return "@TrinityForms/elements/text.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 21,  121 => 20,  118 => 19,  114 => 17,  108 => 15,  106 => 14,  101 => 13,  99 => 12,  94 => 11,  92 => 10,  63 => 9,  60 => 8,  55 => 7,  52 => 6,  49 => 5,  45 => 4,  35 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityForms/elements/text.html.twig", "/var/www/html/src/Trinity/FormsBundle/Resources/views/elements/text.html.twig");
    }
}
