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

/* @Cms/widgets/register.html.twig */
class __TwigTemplate_584471c87f9280fb00e2c90ccd90abc2 extends Template
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

";
        // line 4
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getPostNlChecker", [], "method", false, false, false, 4)) {
            // line 5
            echo "\t<script defer src=\"/bundles/cms/js/postnl.js\"></script>
\t<style>
\t\tselect.disabled{
\t\t\tbackground: #e9ecef;
\t\t\tpointer-events: none;
\t\t\ttouch-action: none;
\t\t}
\t</style>
";
        } elseif (twig_get_attribute($this->env, $this->source,         // line 13
($context["Settings"] ?? null), "apiPostcodeToken", [], "method", false, false, false, 13)) {
            // line 14
            echo "\t<script>
\t\tlet pcapitoken = '";
            // line 15
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "apiPostcodeToken", [], "any", false, false, false, 15), "html", null, true);
            echo "';
\t</script>
\t<script defer src=\"/bundles/cms/js/pc-api.js\"></script>
\t<style>
\t\tselect.disabled{
\t\t\tbackground: #e9ecef;
\t\t\tpointer-events: none;
\t\t\ttouch-action: none;
\t\t}
\t</style>
";
        }
        // line 26
        echo "
";
        // line 27
        if (((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "enabled", [], "any", true, true, false, 27) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "enabled", [], "any", false, false, false, 27))) && twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "allowRegistration", [], "any", false, false, false, 27))) {
            // line 28
            echo "\t";
            if (((array_key_exists("overridekey", $context) &&  !twig_test_empty(($context["overridekey"] ?? null))) && file_exists((("../templates/override/" . ($context["overridekey"] ?? null)) . "/cms/register.html.twig")))) {
                // line 29
                echo "\t\t";
                $this->loadTemplate((("override/" . ($context["overridekey"] ?? null)) . "/cms/register.html.twig"), "@Cms/widgets/register.html.twig", 29)->display($context);
                // line 30
                echo "\t";
            } elseif (file_exists("../templates/override/cms/register.html.twig")) {
                // line 31
                echo "\t\t";
                $this->loadTemplate("override/cms/register.html.twig", "@Cms/widgets/register.html.twig", 31)->display($context);
                // line 32
                echo "\t";
            } else {
                // line 33
                echo "\t\t<section class=\"webshop-frontend-profile\">
\t\t\t<div class=\"container\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2\">

\t\t\t\t\t";
                // line 38
                $context["pass_length"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Minimaal 8 tekens.", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 38), "locale", [], "any", false, false, false, 38));
                // line 39
                echo "\t\t\t\t\t";
                $context["pass_number"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Minimaal één cijfer.", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 39), "locale", [], "any", false, false, false, 39));
                // line 40
                echo "\t\t\t\t\t";
                $context["pass_letter"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Minimaal één kleine letter.", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 40), "locale", [], "any", false, false, false, 40));
                // line 41
                echo "\t\t\t\t\t";
                $context["pass_capital"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Minimaal één hoofdletter.", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 41), "locale", [], "any", false, false, false, 41));
                // line 42
                echo "\t\t\t\t\t";
                $context["pass_chars"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Minimaal één van de volgende tekens:", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 42), "locale", [], "any", false, false, false, 42));
                // line 43
                echo "
\t\t\t\t\t";
                // line 44
                if (twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 44)) {
                    // line 45
                    echo "\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Je bent succesvol geregistreerd, je wordt doorgestuurd.", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 45), "locale", [], "any", false, false, false, 45)), "html", null, true);
                    echo "
\t\t\t\t\t\t<meta http-equiv=\"refresh\" content=\"1; url=";
                    // line 46
                    echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
                    echo "\" />
\t\t\t\t\t";
                } else {
                    // line 48
                    echo "\t\t\t\t\t\t";
                    $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme(($context["form"] ?? null), [0 => "@Cms/form.html.twig"], true);
                    // line 49
                    echo "
\t\t\t\t\t\t";
                    // line 50
                    echo                     $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
                    echo "

\t\t\t\t\t\t";
                    // line 52
                    if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 52), "valid", [], "any", false, false, false, 52)) {
                        // line 53
                        echo "\t\t\t\t\t\t\t";
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
                        echo "
\t\t\t\t\t\t";
                    }
                    // line 55
                    echo "\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-header\">
\t\t\t\t\t\t\t\t\t";
                    // line 57
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Registreren", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 57), "locale", [], "any", false, false, false, 57));
                    echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"card-body company-card\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\"><h6>";
                    // line 60
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Type gebruiker", [], "webshop", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 60), "locale", [], "any", false, false, false, 60)), "html", null, true);
                    echo "</h6></div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t<div class=\"row mb-3\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-check form-check-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input checked onclick=\"disableCompany()\" class=\"form-check-input\" type=\"radio\" id=\"opt-consumer\" name=\"type-order\" value=\"consumer\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"form-check-label\" for=\"opt-consumer\">Particulier</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-check form-check-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input onclick=\"enableCompany()\" class=\"form-check-input\" type=\"radio\" id=\"opt-company\" name=\"type-order\" value=\"company\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"form-check-label\" for=\"opt-company\">Zakelijk</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    // line 76
                    echo "\t\t\t\t\t\t\t\t\t<div id=\"company-form\" style=\"display:none;\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-title\"><h6>";
                    // line 77
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bedrijfsgegevens", [], "webshop", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 77), "locale", [], "any", false, false, false, 77)), "html", null, true);
                    echo "</h6></div>
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row mb-3\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 82
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "company", [], "any", false, false, false, 82), 'row');
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 85
                    if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "companyKvk", [], "any", true, true, false, 85)) {
                        // line 86
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 88
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "companyKvk", [], "any", false, false, false, 88), 'row');
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 92
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "companyTaxNo", [], "any", true, true, false, 92)) {
                        // line 93
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 95
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "companyTaxNo", [], "any", false, false, false, 95), 'row');
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 99
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "companyEmail", [], "any", true, true, false, 99)) {
                        // line 100
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 102
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "companyEmail", [], "any", false, false, false, 102), 'row');
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 106
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "companyPhone", [], "any", true, true, false, 106)) {
                        // line 107
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 109
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "companyPhone", [], "any", false, false, false, 109), 'row');
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 113
                    echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                    // line 117
                    echo "\t\t\t\t\t\t\t";
                    if ( !twig_test_empty(($context["message"] ?? null))) {
                        // line 118
                        echo "\t\t\t\t\t\t\t\t<div class=\"alert alert-warning\" role=\"alert\">
\t\t\t\t\t\t\t\t\t";
                        // line 119
                        echo ($context["message"] ?? null);
                        echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                    }
                    // line 122
                    echo "
\t\t\t\t\t\t\t";
                    // line 123
                    if (($context["done"] ?? null)) {
                        // line 124
                        echo "\t\t\t\t\t\t\t";
                    } else {
                        // line 125
                        echo "
\t\t\t\t\t\t\t<div class=\"row mb-3\">
\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t<h6>";
                        // line 128
                        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Persoonsgegevens", [], "webshop", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 128), "locale", [], "any", false, false, false, 128));
                        echo "</h6>
\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t";
                        // line 131
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "gender", [], "any", false, false, false, 131), 'row');
                        echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-6\">
\t\t\t\t\t\t\t\t\t";
                        // line 134
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "firstname", [], "any", false, false, false, 134), 'row');
                        echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-6\">
\t\t\t\t\t\t\t\t\t";
                        // line 137
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lastname", [], "any", false, false, false, 137), 'row');
                        echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t";
                        // line 140
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "phone", [], "any", false, false, false, 140), 'row');
                        echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t";
                        // line 143
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "email", [], "any", false, false, false, 143), 'row');
                        echo "
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t";
                        // line 146
                        if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "website", [], "any", true, true, false, 146)) {
                            // line 147
                            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t";
                            // line 148
                            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "website", [], "any", false, false, false, 148), 'row');
                            echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                        }
                        // line 151
                        echo "
\t\t\t\t\t\t\t\t";
                        // line 152
                        if ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "birthdayFields", [], "any", true, true, false, 152) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "birthdayFields", [], "any", false, false, false, 152)))) {
                            // line 153
                            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t";
                            // line 154
                            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "dateOfBirth", [], "any", false, false, false, 154), 'row');
                            echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                        }
                        // line 157
                        echo "\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"row mb-3\">
\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t<h6>";
                        // line 161
                        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Adresgegevens", [], "webshop", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 161), "locale", [], "any", false, false, false, 161));
                        echo "</h6>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t";
                        // line 164
                        if ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "postNlChecker", [], "any", false, false, false, 164) ||  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "apiPostcodeToken", [], "any", false, false, false, 164)))) {
                            // line 165
                            echo "\t\t\t\t\t\t\t\t\t";
                            // line 166
                            echo "
\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-7\">
\t\t\t\t\t\t\t\t\t\t";
                            // line 168
                            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "postalcode", [], "any", false, false, false, 168), 'row');
                            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-3\">
\t\t\t\t\t\t\t\t\t\t";
                            // line 171
                            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "number", [], "any", false, false, false, 171), 'row');
                            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-2\">
\t\t\t\t\t\t\t\t\t\t";
                            // line 174
                            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "number_add", [], "any", false, false, false, 174), 'row');
                            echo "
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"custom-control form-check mb-2\">
\t\t\t\t\t\t\t\t\t\t<input class=\"form-check-input\" onclick=\"toggleAddressValidation(this)\" type=\"checkbox\" name=\"invoice_address_manual\" value=\"1\" id=\"check-address-manual\" />
\t\t\t\t\t\t\t\t\t\t<label class=\"form-check-label\" for=\"check-address-manual\">";
                            // line 179
                            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Adres handmatig invoeren", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 179), "locale", [], "any", false, false, false, 179));
                            echo "</label>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t";
                            // line 183
                            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "street", [], "any", false, false, false, 183), 'row', ["attr" => ["readonly" => true, "class" => "disabled"]]);
                            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t";
                            // line 186
                            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "city", [], "any", false, false, false, 186), 'row', ["attr" => ["readonly" => true, "class" => "disabled"]]);
                            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t";
                            // line 189
                            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "country", [], "any", false, false, false, 189), 'row', ["attr" => ["readonly" => true, "class" => "disabled"]]);
                            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                        } else {
                            // line 192
                            echo "\t\t\t\t\t\t\t\t\t";
                            // line 193
                            echo "
\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-9\">
\t\t\t\t\t\t\t\t\t\t";
                            // line 195
                            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "street", [], "any", false, false, false, 195), 'row');
                            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-3\">
\t\t\t\t\t\t\t\t\t\t";
                            // line 198
                            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "number", [], "any", false, false, false, 198), 'row');
                            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t";
                            // line 201
                            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "postalcode", [], "any", false, false, false, 201), 'row');
                            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-8\">
\t\t\t\t\t\t\t\t\t\t";
                            // line 204
                            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "city", [], "any", false, false, false, 204), 'row');
                            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t";
                            // line 207
                            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "country", [], "any", false, false, false, 207), 'row');
                            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                        }
                        // line 210
                        echo "\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"row mb-3\">
\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t<h6>";
                        // line 214
                        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Inloggegevens", [], "webshop", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 214), "locale", [], "any", false, false, false, 214));
                        echo "</h6>
\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-6\">
\t\t\t\t\t\t\t\t\t<div class=\"form-floating\">
\t\t\t\t\t\t\t\t\t\t";
                        // line 218
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 218), "first", [], "any", false, false, false, 218), 'widget');
                        echo "
\t\t\t\t\t\t\t\t\t\t";
                        // line 219
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 219), "first", [], "any", false, false, false, 219), 'label');
                        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-6\">
\t\t\t\t\t\t\t\t\t<div class=\"form-floating\">
\t\t\t\t\t\t\t\t\t\t";
                        // line 224
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 224), "second", [], "any", false, false, false, 224), 'widget');
                        echo "
\t\t\t\t\t\t\t\t\t\t";
                        // line 225
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 225), "second", [], "any", false, false, false, 225), 'label');
                        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                        // line 227
                        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 227), "first", [], "any", false, false, false, 227), 'errors');
                        echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t";
                        // line 230
                        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasGoogleRecaptcha", [], "method", false, false, false, 230)) {
                            // line 231
                            echo "\t\t\t\t\t<div class=\"recaptcha\">
\t\t\t\t\t";
                            // line 232
                            echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getGoogleRecaptchaWidget", [], "method", false, false, false, 232);
                            echo "
\t\t\t\t\t</div>
\t\t\t\t\t";
                        }
                        // line 235
                        echo "


\t\t\t\t\t\t\t\t\t";
                        // line 268
                        echo "
\t\t\t\t\t\t\t\t\t";
                        // line 291
                        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"card-footer\">
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary float-right\">";
                        // line 295
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Registratie voltooien", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 295), "locale", [], "any", false, false, false, 295)), "html", null, true);
                        echo "</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t";
                        // line 301
                        echo                         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
                        echo "
\t\t\t\t\t\t";
                    }
                    // line 303
                    echo "\t\t\t\t\t";
                }
                // line 304
                echo "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</section>
\t";
            }
        } else {
            // line 310
            echo "\t<div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Het registreren van een nieuw account is op dit moment niet beschikbaar.", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 310), "locale", [], "any", false, false, false, 310)), "html", null, true);
            echo "</div>
";
        }
        // line 312
        echo "
<script defer src=\"/bundles/cms/js/utils.js\"></script>
<script defer src=\"/bundles/cms/js/form_validation.js\"></script>

<script>
function disableCompany(){
\t\$('#company-form').hide();
\t\$('#form_company').removeClass('validate');
\t\$('#form_company').prop('required', false);
}

function enableCompany(){
\t\$('#company-form').show();
\t\$('#form_company').addClass('validate');
\t\$('#form_company').prop('required', true);
}
</script>";
    }

    public function getTemplateName()
    {
        return "@Cms/widgets/register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  535 => 312,  529 => 310,  521 => 304,  518 => 303,  513 => 301,  504 => 295,  498 => 291,  495 => 268,  490 => 235,  484 => 232,  481 => 231,  479 => 230,  473 => 227,  468 => 225,  464 => 224,  456 => 219,  452 => 218,  445 => 214,  439 => 210,  433 => 207,  427 => 204,  421 => 201,  415 => 198,  409 => 195,  405 => 193,  403 => 192,  397 => 189,  391 => 186,  385 => 183,  378 => 179,  370 => 174,  364 => 171,  358 => 168,  354 => 166,  352 => 165,  350 => 164,  344 => 161,  338 => 157,  332 => 154,  329 => 153,  327 => 152,  324 => 151,  318 => 148,  315 => 147,  313 => 146,  307 => 143,  301 => 140,  295 => 137,  289 => 134,  283 => 131,  277 => 128,  272 => 125,  269 => 124,  267 => 123,  264 => 122,  258 => 119,  255 => 118,  252 => 117,  247 => 113,  240 => 109,  236 => 107,  233 => 106,  226 => 102,  222 => 100,  219 => 99,  212 => 95,  208 => 93,  205 => 92,  198 => 88,  194 => 86,  192 => 85,  186 => 82,  178 => 77,  175 => 76,  157 => 60,  151 => 57,  147 => 55,  141 => 53,  139 => 52,  134 => 50,  131 => 49,  128 => 48,  123 => 46,  118 => 45,  116 => 44,  113 => 43,  110 => 42,  107 => 41,  104 => 40,  101 => 39,  99 => 38,  92 => 33,  89 => 32,  86 => 31,  83 => 30,  80 => 29,  77 => 28,  75 => 27,  72 => 26,  58 => 15,  55 => 14,  53 => 13,  43 => 5,  41 => 4,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/widgets/register.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/widgets/register.html.twig");
    }
}
