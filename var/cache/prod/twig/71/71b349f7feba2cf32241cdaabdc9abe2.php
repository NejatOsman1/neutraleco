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

/* @TrinityNeutral/front/account/profile.html.twig */
class __TwigTemplate_c097d8c728877916882afecdbbce2d31 extends Template
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
        echo "<div class=\"profile-titlebar\">
  <div class=\"title\">
    <h1>
      ";
        // line 4
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Mijn gegevens", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 4), "locale", [], "any", false, false, false, 4));
        echo "
    </h1>
  </div>
  <div class=\"buttons\">
    ";
        // line 11
        echo "  </div>
</div>

<div class=\"row\">
  <div class=\"col-12 col-xl-8\">
      <div class=\"card register\">
        <div class=\"card-body\">
\t\t\t";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "warning"], "method", false, false, false, 18));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 19
            echo "      \t\t\t<div class=\"alert alert-warning\" role=\"alert\">
      \t\t\t\t";
            // line 20
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
      \t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "error"], "method", false, false, false, 23));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 24
            echo "      \t\t\t<div class=\"alert alert-warning\" role=\"alert\">
      \t\t\t\t";
            // line 25
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
      \t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [0 => "success"], "method", false, false, false, 28));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 29
            echo "\t\t\t\t<div class=\"alert alert-success\">
\t\t\t\t\t";
            // line 30
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
\t\t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "\t\t\t
\t\t\t";
        // line 34
        $context["pass_length"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Minimaal 8 tekens.", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 34), "locale", [], "any", false, false, false, 34));
        // line 35
        echo "\t\t\t";
        $context["pass_number"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Minimaal één cijfer.", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 35), "locale", [], "any", false, false, false, 35));
        // line 36
        echo "\t\t\t";
        $context["pass_letter"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Minimaal één kleine letter.", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 36), "locale", [], "any", false, false, false, 36));
        // line 37
        echo "\t\t\t";
        $context["pass_capital"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Minimaal één hoofdletter.", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 37), "locale", [], "any", false, false, false, 37));
        // line 38
        echo "\t\t\t";
        $context["pass_chars"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Minimaal één van de volgende tekens:", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 38), "locale", [], "any", false, false, false, 38));
        // line 39
        echo "\t\t\t
      \t\t";
        // line 44
        echo "\t\t\t\t";
        $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme(($context["form"] ?? null), [0 => "@Cms/form.html.twig"], true);
        // line 45
        echo "\t\t\t\t
\t\t\t\t";
        // line 46
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
        echo "
      \t\t\t<div class=\"col-12\">
      \t\t\t  <h4>";
        // line 48
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Persoonsgegevens", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 48), "locale", [], "any", false, false, false, 48));
        echo "</h4>
      \t\t\t</div>

      \t\t\t<div class=\"row mb-3\">
      \t\t\t\t<div class=\"col-12 col-sm-12 col-md-6\">
      \t\t\t\t\t";
        // line 53
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "firstname", [], "any", false, false, false, 53), 'row');
        echo "
      \t\t\t\t</div>
      \t\t\t\t<div class=\"col-12 col-sm-12 col-md-6\">
      \t\t\t\t\t";
        // line 56
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lastname", [], "any", false, false, false, 56), 'row');
        echo "
      \t\t\t\t</div>
      \t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
      \t\t\t\t\t";
        // line 59
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "phone", [], "any", false, false, false, 59), 'row');
        echo "
      \t\t\t\t</div>
      \t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
      \t\t\t\t\t";
        // line 62
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "email", [], "any", false, false, false, 62), 'row');
        echo "
      \t\t\t\t</div>
      \t\t\t</div>

      \t\t\t<div class=\"row mb-3\">
      \t\t\t\t<div class=\"col-12\">
      \t\t\t\t\t<h4>";
        // line 68
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bedrijfsgegevens", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 68), "locale", [], "any", false, false, false, 68));
        echo "</h4>
      \t\t\t\t</div>

      \t\t\t\t";
        // line 71
        if ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "postNlChecker", [], "any", false, false, false, 71) ||  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "apiPostcodeToken", [], "any", false, false, false, 71)))) {
            // line 72
            echo "      \t\t\t\t\t";
            // line 73
            echo "
      \t\t\t\t\t<div class=\"col-12\">
      \t\t\t\t\t\t";
            // line 75
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "company", [], "any", false, false, false, 75), 'row');
            echo "
      \t\t\t\t\t</div>
      \t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-7\">
      \t\t\t\t\t\t";
            // line 78
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "postalcode", [], "any", false, false, false, 78), 'row');
            echo "
      \t\t\t\t\t</div>
      \t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-3\">
      \t\t\t\t\t\t";
            // line 81
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "number", [], "any", false, false, false, 81), 'row');
            echo "
      \t\t\t\t\t</div>
      \t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-2\">
      \t\t\t\t\t\t";
            // line 84
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "number_add", [], "any", false, false, false, 84), 'row');
            echo "
      \t\t\t\t\t</div>

      \t\t\t\t\t<div class=\"custom-control form-check mb-2\">
      \t\t\t\t\t\t<input class=\"form-check-input\" onclick=\"toggleAddressValidation(this)\" type=\"checkbox\" name=\"invoice_address_manual\" value=\"1\" id=\"check-address-manual\" />
      \t\t\t\t\t\t<label class=\"form-check-label\" for=\"check-address-manual\">";
            // line 89
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Adres handmatig invoeren", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 89), "locale", [], "any", false, false, false, 89));
            echo "</label>
      \t\t\t\t\t</div>

      \t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
      \t\t\t\t\t\t";
            // line 93
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "street", [], "any", false, false, false, 93), 'row', ["attr" => ["readonly" => true, "class" => "disabled"]]);
            echo "
      \t\t\t\t\t</div>
      \t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
      \t\t\t\t\t\t";
            // line 96
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "city", [], "any", false, false, false, 96), 'row', ["attr" => ["readonly" => true, "class" => "disabled"]]);
            echo "
      \t\t\t\t\t</div>
      \t\t\t\t";
        } else {
            // line 99
            echo "      \t\t\t\t\t";
            // line 100
            echo "      \t\t\t\t\t<div class=\"col-12 col-sm-12\">
      \t\t\t\t\t\t";
            // line 101
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "company", [], "any", false, false, false, 101), 'row');
            echo "
      \t\t\t\t\t</div>
      \t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-9\">
      \t\t\t\t\t\t";
            // line 104
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "street", [], "any", false, false, false, 104), 'row');
            echo "
      \t\t\t\t\t</div>
      \t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-3\">
      \t\t\t\t\t\t";
            // line 107
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "number", [], "any", false, false, false, 107), 'row');
            echo "
      \t\t\t\t\t</div>
      \t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-4\">
      \t\t\t\t\t\t";
            // line 110
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "postalcode", [], "any", false, false, false, 110), 'row');
            echo "
      \t\t\t\t\t</div>
      \t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-8\">
      \t\t\t\t\t\t";
            // line 113
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "city", [], "any", false, false, false, 113), 'row');
            echo "
      \t\t\t\t\t</div>
      \t\t\t\t";
        }
        // line 116
        echo "      \t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"row mb-3\">
\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t<h4>";
        // line 120
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Postadres", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 120), "locale", [], "any", false, false, false, 120));
        echo "</h4>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t";
        // line 124
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "has_postal_address", [], "any", false, false, false, 124), 'row');
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div style=\"display:none;\" class=\"row mb-3 postal\">
\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-9\">
\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t";
        // line 131
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "postal_street", [], "any", false, false, false, 131), 'row');
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-3\">
\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t";
        // line 136
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "postal_streetnumber", [], "any", false, false, false, 136), 'row');
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-4\">
\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t";
        // line 141
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "postal_postcode", [], "any", false, false, false, 141), 'row');
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-8\">
\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t";
        // line 146
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "postal_city", [], "any", false, false, false, 146), 'row');
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div class=\"row mb-3\">
\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t<h4>";
        // line 153
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Factuuradres", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 153), "locale", [], "any", false, false, false, 153));
        echo "</h4>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t";
        // line 157
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "company_has_invoice_address", [], "any", false, false, false, 157), 'row');
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t
\t\t\t\t<div style=\"display:none;\" class=\"row mb-3 invoice\">
\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-9\">
\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t";
        // line 165
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "company_invoice_street", [], "any", false, false, false, 165), 'row');
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-3\">
\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t";
        // line 171
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "company_invoice_streetnumber", [], "any", false, false, false, 171), 'row');
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-4\">
\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t";
        // line 177
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "company_invoice_postcode", [], "any", false, false, false, 177), 'row');
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t\t
\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-8\">
\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t";
        // line 183
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "company_invoice_city", [], "any", false, false, false, 183), 'row');
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t\t
      \t\t\t<div class=\"row mb-3\">
\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t";
        // line 191
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "companyPhone", [], "any", false, false, false, 191), 'row');
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t";
        // line 196
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "companyEmail", [], "any", false, false, false, 196), 'row');
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t";
        // line 201
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "companyKvk", [], "any", false, false, false, 201), 'row');
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t";
        // line 206
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "companyTaxNo", [], "any", false, false, false, 206), 'row');
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t";
        // line 211
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "website", [], "any", false, false, false, 211), 'row');
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
      \t\t\t</div>\t\t\t\t\t

      \t\t\t<div class=\"row mb-3\">
      \t\t\t\t<div class=\"col-12\">
      \t\t\t\t\t<h4>";
        // line 218
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wachtwoord wijzigen", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 218), "locale", [], "any", false, false, false, 218));
        echo "</h4>
      \t\t\t\t</div>
\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t<div class=\"form-floating\"><div class=\"form-check\"><input type=\"checkbox\" id=\"form_edit_password\" placeholder=\"Wachtwoord wijzigen\" class=\"validate form-check-input\">
\t\t\t\t\t\t\t<label class=\"form-check-label\" for=\"form_edit_password\">";
        // line 223
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wachtwoord wijzigen"), "html", null, true);
        echo "</label></div>        </div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"password_toggle row\" style=\"display:none;\">
\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-6\">
\t\t\t\t\t\t\t<div class=\"form-floating\">
\t\t\t\t\t\t\t\t";
        // line 229
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 229), "first", [], "any", false, false, false, 229), 'widget');
        echo "
\t\t\t\t\t\t\t\t";
        // line 230
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 230), "first", [], "any", false, false, false, 230), 'label');
        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-6\">
\t\t\t\t\t\t\t<div class=\"form-floating\">
\t\t\t\t\t\t\t\t";
        // line 235
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 235), "second", [], "any", false, false, false, 235), 'widget');
        echo "
\t\t\t\t\t\t\t\t";
        // line 236
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 236), "second", [], "any", false, false, false, 236), 'label');
        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        // line 238
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 238), "first", [], "any", false, false, false, 238), 'errors');
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
      \t\t\t</div>
\t\t\t\t
      \t\t\t<div style=\"display:none;\">
      \t\t\t\t";
        // line 244
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "_token", [], "any", false, false, false, 244), 'row');
        echo "
      \t\t\t</div>
\t\t\t\t
      \t\t\t";
        // line 247
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasGoogleRecaptcha", [], "method", false, false, false, 247)) {
            // line 248
            echo "\t\t\t\t\t<div class=\"recaptcha\">
\t\t\t\t\t  ";
            // line 249
            echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getGoogleRecaptchaWidget", [], "method", false, false, false, 249);
            echo "
\t\t\t\t\t</div>
      \t\t\t";
        }
        // line 252
        echo "
\t\t\t\t<button type=\"submit\" class=\"btn btn-gradient float-right\"><i class=\"fa fa-save\"></i> ";
        // line 253
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Opslaan", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 253), "locale", [], "any", false, false, false, 253)), "html", null, true);
        echo "</button>
\t\t\t\t
\t\t\t\t";
        // line 255
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        echo "
        \t";
        // line 257
        echo "        </div>
    \t</div>
  </div>
  <div class=\"col-12 col-xl-4 d-none d-xl-inline-block\">
    <div class=\"card card-sidebar\">
      <div class=\"card-body\">
        <h3>";
        // line 263
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Mijn account", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 263), "locale", [], "any", false, false, false, 263));
        echo "</h3>
\t\t\t\t";
        // line 264
        echo $this->extensions['App\CmsBundle\Twig\Extension\PageNavigation']->custom_navigation("my-account", "bootstrap-5");
        echo "
      </div>
    </div>
  </div>
</div>

<script defer src=\"/bundles/cms/js/utils.js\"></script>";
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/front/account/profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  511 => 264,  507 => 263,  499 => 257,  495 => 255,  490 => 253,  487 => 252,  481 => 249,  478 => 248,  476 => 247,  470 => 244,  461 => 238,  456 => 236,  452 => 235,  444 => 230,  440 => 229,  431 => 223,  423 => 218,  413 => 211,  405 => 206,  397 => 201,  389 => 196,  381 => 191,  370 => 183,  361 => 177,  352 => 171,  343 => 165,  332 => 157,  325 => 153,  315 => 146,  307 => 141,  299 => 136,  291 => 131,  281 => 124,  274 => 120,  268 => 116,  262 => 113,  256 => 110,  250 => 107,  244 => 104,  238 => 101,  235 => 100,  233 => 99,  227 => 96,  221 => 93,  214 => 89,  206 => 84,  200 => 81,  194 => 78,  188 => 75,  184 => 73,  182 => 72,  180 => 71,  174 => 68,  165 => 62,  159 => 59,  153 => 56,  147 => 53,  139 => 48,  134 => 46,  131 => 45,  128 => 44,  125 => 39,  122 => 38,  119 => 37,  116 => 36,  113 => 35,  111 => 34,  108 => 33,  99 => 30,  96 => 29,  91 => 28,  82 => 25,  79 => 24,  74 => 23,  65 => 20,  62 => 19,  58 => 18,  49 => 11,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/front/account/profile.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/NeutralBundle/Resources/views/front/account/profile.html.twig");
    }
}
