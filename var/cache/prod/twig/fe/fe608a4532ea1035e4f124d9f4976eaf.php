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

/* @TrinityForms/elements/textarea.html.twig */
class __TwigTemplate_6ae8339a99a662684342dc8047f623a5 extends Template
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
        return $this->loadTemplate([0 => ":forms_elements:row.html.twig", 1 => "@TrinityForms/elements/row.html.twig"], "@TrinityForms/elements/textarea.html.twig", 2);
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
                // line 8
                echo "\t\t\t\t<div class=\"form-floating\">
\t\t\t";
            }
            // line 10
            echo "\t\t";
        }
        // line 11
        echo "\t\t<textarea class=\"form-control\" id=\"frm-lbl-";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 11), "html", null, true);
        echo "\" name=\"form[";
        if ( !(null === ($context["Form"] ?? null))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 11), "html", null, true);
        }
        echo "][";
        if ( !(null === ($context["Question"] ?? null))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 11), "html", null, true);
        }
        echo "]\" type=\"text\" ";
        if (array_key_exists("edit", $context)) {
            echo " disabled=\"disabled\" ";
        }
        echo " placeholder=\"";
        if (array_key_exists("edit", $context)) {
            echo " ";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 11)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 11)) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tekst veld", [], "forms"))), "html", null, true);
            echo " ";
        } elseif ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 11))) {
            echo " ";
            echo twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 11);
            echo " ";
        }
        echo "\" ";
        if ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "required", [], "any", false, false, false, 11) && (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "hidden", [], "any", false, false, false, 11) == false))) {
            echo "required=\"true\"";
        }
        echo " value=\"";
        (( !twig_test_empty(($context["getval"] ?? null))) ? (print (twig_escape_filter($this->env, ($context["getval"] ?? null), "html", null, true))) : (print ("")));
        echo "\" ></textarea>

\t\t";
        // line 13
        if ((twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "floatingLabels", [], "any", false, false, false, 13) &&  !twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "hiddenLabel", [], "any", false, false, false, 13))) {
            // line 14
            echo "\t\t\t<label for=\"frm-lbl-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 14), "html", null, true);
            echo "\">
\t\t\t\t";
            // line 15
            if (array_key_exists("edit", $context)) {
                // line 16
                echo "\t\t\t\t\t";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 16)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 16)) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tekst blok", [], "forms"))), "html", null, true);
                echo "
\t\t\t\t";
            } elseif ( !twig_test_empty(twig_get_attribute($this->env, $this->source,             // line 17
($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 17))) {
                // line 18
                echo "\t\t\t\t\t";
                echo twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 18);
                echo "
\t\t\t\t";
            }
            // line 20
            echo "\t\t\t</label>
\t\t";
        }
        // line 22
        echo "
\t";
        // line 23
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
        return "@TrinityForms/elements/textarea.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 27,  133 => 25,  130 => 24,  128 => 23,  125 => 22,  121 => 20,  115 => 18,  113 => 17,  108 => 16,  106 => 15,  101 => 14,  99 => 13,  65 => 11,  62 => 10,  58 => 8,  55 => 7,  52 => 6,  49 => 5,  45 => 4,  35 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityForms/elements/textarea.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/FormsBundle/Resources/views/elements/textarea.html.twig");
    }
}
