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

/* override/cms/register.html.twig */
class __TwigTemplate_c4f43f845cb36ed751068c456a3481f5 extends Template
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
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme(($context["form"] ?? null), [0 => "@Cms/form.html.twig"], true);
        // line 2
        echo "
<section class=\"webshop-frontend-profile\">
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2\">

";
        // line 8
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
        echo "

";
        // line 10
        if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 10), "valid", [], "any", false, false, false, 10)) {
            // line 11
            echo "\t";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
            echo "
";
        }
        // line 13
        echo "
\t<section class=\"login-register\">
\t\t<div class=\"container\">
\t\t  <div class=\"login-box\">
\t\t\t";
        // line 17
        if (($context["done"] ?? null)) {
            // line 18
            echo "\t\t\t\t";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Je bent succesvol geregistreerd, je wordt doorgestuurd.", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 18), "locale", [], "any", false, false, false, 18)), "html", null, true);
            echo "
\t\t\t\t<meta http-equiv=\"refresh\" content=\"1; url=";
            // line 19
            echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
            echo "\" />
\t\t\t";
        } else {
            // line 21
            echo "\t\t\t\t<div class=\"card\">
\t\t\t\t  <div class=\"card-body\">
\t\t\t\t\t<div class=\"register-form\">
\t\t\t\t\t\t";
            // line 24
            if ( !twig_test_empty(($context["message"] ?? null))) {
                // line 25
                echo "\t\t\t\t\t\t\t<div class=\"alert alert-warning\" role=\"alert\">
\t\t\t\t\t\t\t\t";
                // line 26
                echo ($context["message"] ?? null);
                echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            }
            // line 29
            echo "
\t\t\t\t\t\t";
            // line 30
            if (($context["done"] ?? null)) {
                // line 31
                echo "
\t\t\t\t\t\t";
            } else {
                // line 33
                echo "\t\t\t\t\t\t\t<h4>
\t\t\t\t\t\t\t\t";
                // line 34
                echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Registreren", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 34), "locale", [], "any", false, false, false, 34));
                echo "
\t\t\t\t\t\t\t</h4>

\t\t\t\t\t\t\t\t";
                // line 37
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "email", [], "any", false, false, false, 37), 'row');
                echo "

\t\t\t\t\t\t\t\t<div class=\"form-floating\">
\t\t\t\t\t\t\t\t\t";
                // line 40
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 40), "first", [], "any", false, false, false, 40), 'widget');
                echo "
\t\t\t\t\t\t\t\t\t";
                // line 41
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 41), "first", [], "any", false, false, false, 41), 'label');
                echo "
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"form-floating\">
\t\t\t\t\t\t\t\t\t";
                // line 45
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 45), "second", [], "any", false, false, false, 45), 'widget');
                echo "
\t\t\t\t\t\t\t\t\t";
                // line 46
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 46), "second", [], "any", false, false, false, 46), 'label');
                echo "
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t";
                // line 49
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 49), "first", [], "any", false, false, false, 49), 'errors');
                echo "

\t\t\t\t\t\t\t";
                // line 51
                if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasGoogleRecaptcha", [], "method", false, false, false, 51)) {
                    // line 52
                    echo "\t\t\t\t\t\t\t<div class=\"recaptcha\">
\t\t\t\t\t\t\t  ";
                    // line 53
                    echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getGoogleRecaptchaWidget", [], "method", false, false, false, 53);
                    echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                }
                // line 56
                echo "\t\t\t\t\t\t";
            }
            // line 57
            echo "
\t\t\t\t\t\t<div style=\"display:none;\">
\t\t\t\t\t\t\t<input type=\"HIDDEN\" name=\"form[firstname]\" value=\"*\" />
\t\t\t\t\t\t\t<input type=\"HIDDEN\" name=\"enable_profile\" value=\"1\" />
\t\t\t\t\t\t\t<input type=\"HIDDEN\" name=\"action\" value=\"add_simple_profile\" />
\t\t\t\t\t\t\t<input type=\"HIDDEN\" name=\"redirect\" value=\"mod_my_account_profile\" />
\t\t\t\t\t\t\t<input type=\"HIDDEN\" name=\"skip_confirmation_mail\" value=\"1\" />
\t\t\t\t\t\t\t";
            // line 64
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "_token", [], "any", false, false, false, 64), 'row');
            echo "
\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-gradient mt-3\">";
            // line 67
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Registreren", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 67), "locale", [], "any", false, false, false, 67)), "html", null, true);
            echo " <i class=\"fa fa-arrow-right\"></i></button>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"or\">
\t\t\t\t\t\t  <span>";
            // line 71
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("of"), "html", null, true);
            echo "</span>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"login-form\">
\t\t\t\t\t\t  <a href=\"/mijn-account\" class=\"btn\">
\t\t\t\t\t\t\t <i class=\"fa fa-arrow-left\"></i> ";
            // line 76
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Terug naar inloggen"), "html", null, true);
            echo "
\t\t\t\t\t\t  </a>
\t\t\t\t\t\t</div>
\t\t\t\t  </div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 82
        echo "\t\t</div>
\t</div>
</section>
\t\t\t</div>
\t\t</div>
\t</div>
</section>";
    }

    public function getTemplateName()
    {
        return "override/cms/register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  197 => 82,  188 => 76,  180 => 71,  173 => 67,  167 => 64,  158 => 57,  155 => 56,  149 => 53,  146 => 52,  144 => 51,  139 => 49,  133 => 46,  129 => 45,  122 => 41,  118 => 40,  112 => 37,  106 => 34,  103 => 33,  99 => 31,  97 => 30,  94 => 29,  88 => 26,  85 => 25,  83 => 24,  78 => 21,  73 => 19,  68 => 18,  66 => 17,  60 => 13,  54 => 11,  52 => 10,  47 => 8,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "override/cms/register.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/templates/override/cms/register.html.twig");
    }
}
