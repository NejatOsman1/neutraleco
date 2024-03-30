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

/* @TrinityNeutral/front/projects/add-project-transaction.html.twig */
class __TwigTemplate_d72ae341bcc239d9e01dcb569ad361ef extends Template
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
        echo " ";
        // line 2
        echo "
<section class=\"webshop-frontend-profile\">
  <div class=\"container\">
    <div class=\"row\">
\t\t\t<div class=\"col-12\">
\t\t\t\t<section class=\"login-register\">
\t\t\t\t\t<div class=\"container\">
\t\t\t\t\t\t<div class=\"add-transaction\">
\t\t\t\t\t\t\t<div class=\"card step-one\">
\t\t\t\t\t\t\t\t<div class=\"card-body transaction-card\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<h3>";
        // line 13
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Transactie toevoegen", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 13), "locale", [], "any", false, false, false, 13));
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "name", [], "any", false, false, false, 13), "html", null, true);
        echo "</h3>
\t\t\t\t\t\t\t\t\t\t<small>";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Vul hieronder de vereiste transactiegegevens in", [], "webshop", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 14), "locale", [], "any", false, false, false, 14)), "html", null, true);
        echo "</small>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t";
        // line 17
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme(($context["form"] ?? null), [0 => "@Cms/form.html.twig"], true);
        // line 18
        echo "
\t\t\t\t\t\t\t\t\t";
        // line 19
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
        echo "

\t\t\t\t\t\t\t\t\t";
        // line 21
        if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 21), "valid", [], "any", false, false, false, 21)) {
            // line 22
            echo "\t\t\t\t\t\t\t\t\t\t";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
            echo "
\t\t\t\t\t\t\t\t\t";
        }
        // line 24
        echo "\t\t\t\t\t\t\t\t\t";
        $this->loadTemplate("@TrinityNeutral/messages.html.twig", "@TrinityNeutral/front/projects/add-project-transaction.html.twig", 24)->display($context);
        // line 25
        echo "
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t<table class=\"w-100\">
\t\t\t\t\t\t\t\t\t\t  <tr>
\t\t\t\t\t\t\t\t\t\t\t<td><b>";
        // line 29
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Totale credits", [], "cms"), "html", null, true);
        echo "</b></td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"text-end\"><span class=\"co2credits\">";
        // line 30
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "getQtyCo2Credits", [], "any", false, false, false, 30), "html", null, true);
        echo "</span></td>
\t\t\t\t\t\t\t\t\t\t  </tr>
\t\t\t\t\t\t\t\t\t\t  <tr>
\t\t\t\t\t\t\t\t\t\t\t<td><b>";
        // line 33
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gebruikte credits", [], "cms"), "html", null, true);
        echo "</b></td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"text-end\"><span class=\"usedCo2Credits\">";
        // line 34
        echo twig_escape_filter($this->env, ($context["totalUsedCredits"] ?? null), "html", null, true);
        echo "</span></td>
\t\t\t\t\t\t\t\t\t\t  </tr>
\t\t\t\t\t\t\t\t\t\t  <tr>
\t\t\t\t\t\t\t\t\t\t\t<td><b>";
        // line 37
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nog te verbruiken credits", [], "cms"), "html", null, true);
        echo "</b></td>
\t\t\t\t\t\t\t\t\t\t\t<td class=\"text-end\"><span class=\"availableCredits\">";
        // line 38
        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "getQtyCo2Credits", [], "any", false, false, false, 38) - ($context["totalUsedCredits"] ?? null)), "html", null, true);
        echo "</span></td>
\t\t\t\t\t\t\t\t\t\t  </tr>
\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t";
        // line 44
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "name", [], "any", false, false, false, 44), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t";
        // line 47
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "company", [], "any", false, false, false, 47), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t";
        // line 50
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "email", [], "any", false, false, false, 50), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t";
        // line 53
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "credits", [], "any", false, false, false, 53), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t

\t\t\t\t\t\t\t\t\t";
        // line 57
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasGoogleRecaptcha", [], "method", false, false, false, 57)) {
            // line 58
            echo "\t\t\t\t\t\t\t\t\t<div class=\"recaptcha\">
\t\t\t\t\t\t\t\t\t  ";
            // line 59
            echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getGoogleRecaptchaWidget", [], "method", false, false, false, 59);
            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
        }
        // line 62
        echo "
\t\t\t\t\t\t\t\t\t<div class=\"card-footer\">
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"javascript:history.go(-1)\" class=\"cancel btn btn-gray float-left\"><i class=\"fa fa-arrow-left\"></i> ";
        // line 66
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sluiten", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 66), "locale", [], "any", false, false, false, 66)), "html", null, true);
        echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"save btn btn-gradient float-right\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 68
        if (twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["transactionEntity"] ?? null), "id", [], "any", false, false, false, 68))) {
            // line 69
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Transactie toevoegen", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 69), "locale", [], "any", false, false, false, 69)), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        } else {
            // line 71
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Transactie opslaan", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 71), "locale", [], "any", false, false, false, 71));
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 72
        echo "&nbsp;<i class=\"fa fa-arrow-right\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
        // line 77
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "_token", [], "any", false, false, false, 77), 'row');
        echo "

\t\t\t\t\t\t\t\t\t";
        // line 79
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<script defer src=\"/bundles/cms/js/form_validation.js\"></script>
<script defer src=\"/bundles/cms/js/utils.js\"></script>
";
        // line 91
        if ( !array_key_exists("isBackend", $context)) {
            // line 92
            echo "<script defer type=\"text/javascript\" src=\"https://code.jquery.com/jquery-migrate-3.1.0.min.js\"></script>
";
        }
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/front/projects/add-project-transaction.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  214 => 92,  212 => 91,  197 => 79,  192 => 77,  185 => 72,  179 => 71,  173 => 69,  171 => 68,  166 => 66,  160 => 62,  154 => 59,  151 => 58,  149 => 57,  142 => 53,  136 => 50,  130 => 47,  124 => 44,  115 => 38,  111 => 37,  105 => 34,  101 => 33,  95 => 30,  91 => 29,  85 => 25,  82 => 24,  76 => 22,  74 => 21,  69 => 19,  66 => 18,  64 => 17,  58 => 14,  52 => 13,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/front/projects/add-project-transaction.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/NeutralBundle/Resources/views/front/projects/add-project-transaction.html.twig");
    }
}
