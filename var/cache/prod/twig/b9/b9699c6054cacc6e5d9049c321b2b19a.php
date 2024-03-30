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

/* @TrinityForms/default/form.html.twig */
class __TwigTemplate_2f069e1842f22ebad8a59097c9b3a657 extends Template
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
<div class=\"plugin-forms\">
\t";
        // line 4
        if (($context["saved"] ?? null)) {
            // line 5
            echo "\t\t<div class=\"message\">
\t\t\t<div class=\"alert alert-success\" role=\"alert\">
\t\t\t\t";
            // line 7
            if ((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "message", [], "any", true, true, false, 7) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "message", [], "any", false, false, false, 7)))) {
                // line 8
                echo "\t\t\t\t\t";
                echo twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "message", [], "any", false, false, false, 8);
                echo "
\t\t\t\t";
            } else {
                // line 10
                echo "\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Het formulier is succesvol verzonden.", [], "forms"), "html", null, true);
                echo "
\t\t\t\t";
            }
            // line 12
            echo "\t\t\t</div>
\t\t</div>
\t";
        } elseif (        // line 14
($context["error"] ?? null)) {
            // line 15
            echo "\t\t<div class=\"alert alert-danger\">
\t\t\t";
            // line 16
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(($context["error"] ?? null), [], "forms");
            echo "
\t\t</div>
\t";
        }
        // line 19
        echo "\t";
        if ((($context["saved"] ?? null) && ($context["hide_send"] ?? null))) {
            // line 20
            echo "
\t";
        } else {
            // line 22
            echo "
       ";
            // line 23
            if (($context["inline_error"] ?? null)) {
                // line 24
                echo "               <div class=\"alert alert-danger\">
                       ";
                // line 25
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(($context["inline_error"] ?? null), [], "forms"), "html", null, true);
                echo "
               </div>
       ";
            }
            // line 28
            echo "                <form method=\"post\" enctype=\"multipart/form-data\" style=\"display: none; width: 0px; height: 0px;\">
\t\t\t<input type=\"hidden\" name=\"manual_upload\" value=\"1\">
\t\t\t<input type=\"file\" name=\"file[]\" id=\"upload_button\" multiple>
\t\t\t<button type=\"submit\">";
            // line 31
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uploaden", [], "forms");
            echo "</button>
\t\t</form>
\t\t<form id=\"forms-bundle-form\" method=\"post\" enctype=\"multipart/form-data\">
\t\t\t<div class=\"contains-form\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"field-pot\" style=\"\">
\t\t\t\t\t\t<div class=\"form-question\">
\t\t\t\t\t\t\t<input id=\"frm-lbl-3\" name=\"form-check\" type=\"text\" value=\"\">
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t";
            // line 41
            $context["firstField"] = true;
            // line 42
            echo "\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["questions"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["Question"]) {
                // line 43
                echo "\t\t\t\t\t\t";
                if (((twig_get_attribute($this->env, $this->source, $context["Question"], "position", [], "any", false, false, false, 43) == 0) && (($context["firstField"] ?? null) != true))) {
                    // line 44
                    echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t";
                }
                // line 47
                echo "\t\t\t\t\t\t<div class=\"col-md-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Question"], "width", [], "any", false, false, false, 47), "html", null, true);
                echo "\" style=\"";
                if ((twig_get_attribute($this->env, $this->source, $context["Question"], "hidden", [], "any", false, false, false, 47) &&  !twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "show_hidden", [], "any", true, true, false, 47))) {
                    echo "display: none;";
                }
                echo "\">
\t\t\t\t\t\t\t<div class=\"form-question ";
                // line 48
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Question"], "classes", [], "any", false, false, false, 48), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t";
                // line 49
                $this->loadTemplate([0 => ((":forms_elements:" . twig_get_attribute($this->env, $this->source, $context["Question"], "getType", [], "any", false, false, false, 49)) . ".html.twig"), 1 => (("@TrinityForms/elements/" . twig_get_attribute($this->env, $this->source, $context["Question"], "getType", [], "any", false, false, false, 49)) . ".html.twig")], "@TrinityForms/default/form.html.twig", 49)->display($context);
                // line 50
                echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
 \t\t\t\t\t\t";
                // line 52
                $context["firstField"] = false;
                // line 53
                echo "\t\t\t\t\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Question'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            echo "                                        ";
            if (twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "hasGoogleRecaptcha", [], "method", false, false, false, 54)) {
                // line 55
                echo "                                            <div class=\"col-md-12\">
                                                <div style=\"padding-bottom: 10px;\">
                                                    ";
                // line 57
                echo twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "getGoogleRecaptchaWidget", [], "method", false, false, false, 57);
                echo "
                                                </div>
                                            </div>
                                        ";
            }
            // line 61
            echo "\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"form-footer\">
\t\t\t\t";
            // line 65
            if ((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "show_clear", [], "any", true, true, false, 65) && ((null === twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "hideClearButton", [], "any", false, false, false, 65)) || (twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "hideClearButton", [], "any", false, false, false, 65) == 0)))) {
                // line 66
                echo "\t\t\t\t\t<button type=\"reset\" class=\"btn\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Leegmaken", [], "forms"), "html", null, true);
                echo "</button>
\t\t\t\t";
            }
            // line 68
            echo "\t\t\t\t<button type=\"submit\" class=\"btn primary forms-bundle\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Versturen", [], "forms"), "html", null, true);
            echo "</button>
\t\t\t</div>
                        <input type=\"hidden\" name=\"form-bundle-submit\" value=\"";
            // line 70
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 70), "html", null, true);
            echo "\" />
\t\t</form>

<style>
.field-pot{
\tdisplay: none;
}
</style>

";
        }
        // line 80
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@TrinityForms/default/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  225 => 80,  212 => 70,  206 => 68,  200 => 66,  198 => 65,  192 => 61,  185 => 57,  181 => 55,  178 => 54,  164 => 53,  162 => 52,  158 => 50,  156 => 49,  152 => 48,  143 => 47,  138 => 44,  135 => 43,  117 => 42,  115 => 41,  102 => 31,  97 => 28,  91 => 25,  88 => 24,  86 => 23,  83 => 22,  79 => 20,  76 => 19,  70 => 16,  67 => 15,  65 => 14,  61 => 12,  55 => 10,  49 => 8,  47 => 7,  43 => 5,  41 => 4,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityForms/default/form.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/FormsBundle/Resources/views/default/form.html.twig");
    }
}
