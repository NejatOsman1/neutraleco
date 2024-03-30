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

/* @TrinityForms/elements/email.html.twig */
class __TwigTemplate_74a2e268143d1d536cc6e653ff2660e4b52489de4ffb4b117de9a360c526c579 extends Template
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
        return $this->loadTemplate([0 => ":forms_elements:row.html.twig", 1 => "@TrinityForms/elements/row.html.twig"], "@TrinityForms/elements/email.html.twig", 2);
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
        echo "
\t";
        // line 7
        if ((array_key_exists("edit", $context) ||  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 7)))) {
            // line 8
            echo "\t\t";
            if (twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "floatingLabels", [], "any", false, false, false, 8)) {
                // line 9
                echo "\t\t\t<div class=\"form-floating\">
\t\t";
            }
            // line 11
            echo "\t";
        }
        // line 12
        echo "\t\t<input class=\"form-control\" id=\"frm-lbl-";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 12), "html", null, true);
        echo "\" ";
        if ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "required", [], "any", false, false, false, 12) && (0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "hidden", [], "any", false, false, false, 12), false)))) {
            echo "required=\"true\"";
        }
        echo " name=\"form[";
        if ( !(null === ($context["Form"] ?? null))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 12), "html", null, true);
        }
        echo "][";
        if ( !(null === ($context["Question"] ?? null))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 12), "html", null, true);
        }
        echo "]\" type=\"email\" ";
        if (array_key_exists("edit", $context)) {
            echo "disabled=\"disabled\" placeholder=\"";
            ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 12)) ? (print (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 12))) : (print (twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("E-mailadres veld", [], "forms"), "html", null, true))));
            echo "\"";
        } elseif ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 12))) {
            echo "placeholder=\"";
            echo twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 12);
            echo "\"";
        }
        echo " value=\"";
        (( !twig_test_empty(($context["getval"] ?? null))) ? (print (twig_escape_filter($this->env, ($context["getval"] ?? null), "html", null, true))) : (print ("")));
        echo "\" />

\t";
        // line 14
        if ((twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "floatingLabels", [], "any", false, false, false, 14) &&  !twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "hiddenLabel", [], "any", false, false, false, 14))) {
            // line 15
            echo "\t\t<label for=\"frm-lbl-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 15), "html", null, true);
            echo "\">
\t\t";
            // line 16
            if (array_key_exists("edit", $context)) {
                // line 17
                echo "\t\t\t";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 17)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 17)) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("E-mailadres veld", [], "forms"))), "html", null, true);
                echo "
\t\t";
            } elseif ( !twig_test_empty(twig_get_attribute($this->env, $this->source,             // line 18
($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 18))) {
                // line 19
                echo "\t\t\t";
                echo twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 19);
                echo "
\t\t";
            }
            // line 21
            echo "\t\t</label>
\t";
        }
        // line 23
        echo "\t";
        if ((array_key_exists("edit", $context) ||  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 23)))) {
            // line 24
            echo "\t\t";
            if (twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "floatingLabels", [], "any", false, false, false, 24)) {
                // line 25
                echo "\t\t\t</div>
\t\t";
            }
            // line 27
            echo "\t";
        }
    }

    public function getTemplateName()
    {
        return "@TrinityForms/elements/email.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 27,  129 => 25,  126 => 24,  123 => 23,  119 => 21,  113 => 19,  111 => 18,  106 => 17,  104 => 16,  99 => 15,  97 => 14,  67 => 12,  64 => 11,  60 => 9,  57 => 8,  55 => 7,  52 => 6,  49 => 5,  45 => 4,  35 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityForms/elements/email.html.twig", "/var/www/html/src/Trinity/FormsBundle/Resources/views/elements/email.html.twig");
    }
}
