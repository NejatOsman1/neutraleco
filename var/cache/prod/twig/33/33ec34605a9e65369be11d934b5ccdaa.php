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

/* @TrinityNeutral/front/projects/comment.html.twig */
class __TwigTemplate_13a0e6b6f3dcc8e992f56cddbb4086f0 extends Template
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
        echo "<div class=\"card comment\">
\t";
        // line 2
        if (($context["isBackend"] ?? null)) {
            // line 3
            echo "\t\t";
            $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme(($context["form"] ?? null), [0 => "@Cms/form.html.twig"], true);
            // line 4
            echo "\t";
        }
        // line 5
        echo "\t
\t";
        // line 6
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
        echo "

\t";
        // line 8
        if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 8), "valid", [], "any", false, false, false, 8)) {
            // line 9
            echo "\t\t";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
            echo "
\t";
        }
        // line 11
        echo "\t<input type=\"hidden\" name=\"action\" value=\"comment\" />
\t<div class=\"card-body comment-card\">
\t\t<div class=\"card-title\">
\t\t\t<h3>";
        // line 14
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reacties", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 14), "locale", [], "any", false, false, false, 14));
        echo "</h3>
\t\t</div>
\t\t<div class=\"comments\">
\t\t\t";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["comments"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 18
            echo "\t\t\t\t<div class=\"comment";
            if ((($context["user"] ?? null) == twig_get_attribute($this->env, $this->source, $context["comment"], "user", [], "any", false, false, false, 18))) {
                echo " left";
            } else {
                echo " right";
            }
            echo "\">
\t\t\t\t\t";
            // line 19
            $context["dateTime"] = twig_date_converter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "datecreated", [], "any", false, false, false, 19));
            // line 20
            echo "\t\t\t\t\t<div class=\"name\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["comment"], "name", [], "any", false, false, false, 20), "html", null, true);
            echo "</div>
\t\t\t\t\t<div class=\"date\">";
            // line 21
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateTime"] ?? null), "d"), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateTime"] ?? null), "m"), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateTime"] ?? null), "Y"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateTime"] ?? null), "h"), "html", null, true);
            echo ":";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateTime"] ?? null), "i"), "html", null, true);
            echo ":";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, ($context["dateTime"] ?? null), "s"), "html", null, true);
            echo "</div>
\t\t\t\t\t<div class=\"content\">";
            // line 22
            echo twig_get_attribute($this->env, $this->source, $context["comment"], "content", [], "any", false, false, false, 22);
            echo "</div>
\t\t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "\t\t</div>
\t\t<hr \\>
\t\t<div class=\"form-group\"";
        // line 27
        if (!twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "status", [], "any", false, false, false, 27), [0 => 1, 1 => 2, 2 => 3, 3 => 4, 4 => 6])) {
            echo " style=\"display:none;\"";
        }
        echo ">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t";
        // line 30
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "content", [], "any", false, false, false, 30), 'row');
        echo "
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>

\t\t<div class=\"card-footer\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t";
        // line 38
        if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "status", [], "any", false, false, false, 38), [0 => 1, 1 => 2, 2 => 3, 3 => 4])) {
            // line 39
            echo "\t\t\t\t\t<button type=\"submit\" class=\"save btn btn-gradient float-right\">
\t\t\t\t\t\t";
            // line 40
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reactie toevoegen", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 40), "locale", [], "any", false, false, false, 40));
            echo "
\t\t\t\t\t</button>
\t\t\t\t\t";
        }
        // line 43
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<script>
\t\$(\"#form_content\").val(\"\");
\t\$(function(){\t
\t\t\$(\".card.comment button\").click(function(evt){
\t\t\tlet isValid = true;
\t\t\tlet card = \$(this).closest(\".card\");
\t\t\tcard.find('textarea.validate').each(function(ind, el){
\t\t\t\tlet value = \$('.cke_wysiwyg_frame').eq(0).contents().find('.cke_editable').html();
\t\t\t\tcleanText = value.replace(/<\\/?[^>]+(>|\$)/g, \"\");
\t\t\t
\t\t\t\tif(cleanText != ''){
\t\t\t\t\t\$(this).parent().addClass('valid_input').removeClass('invalid_input');
\t\t\t\t}else{
\t\t\t\t\t\$(this).parent().addClass('invalid_input').removeClass('valid_input');
\t\t\t\t\tisValid = false;
\t\t\t\t}
\t\t\t});
\t\t\t
\t\t\tif(!isValid){
\t\t\t\tevt.preventDefault();
\t\t\t\t\$('.cke_wysiwyg_frame').eq(0).contents().find('.cke_editable').focus();
\t\t\t\treturn false;
\t\t\t}
\t\t});
\t});
</script>

";
        // line 75
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasGoogleRecaptcha", [], "method", false, false, false, 75)) {
            // line 76
            echo "<div class=\"recaptcha\">
  ";
            // line 77
            echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getGoogleRecaptchaWidget", [], "method", false, false, false, 77);
            echo "
</div>
";
        }
        // line 80
        echo "
";
        // line 81
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/front/projects/comment.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  200 => 81,  197 => 80,  191 => 77,  188 => 76,  186 => 75,  152 => 43,  146 => 40,  143 => 39,  141 => 38,  130 => 30,  122 => 27,  118 => 25,  109 => 22,  95 => 21,  90 => 20,  88 => 19,  79 => 18,  75 => 17,  69 => 14,  64 => 11,  58 => 9,  56 => 8,  51 => 6,  48 => 5,  45 => 4,  42 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/front/projects/comment.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/NeutralBundle/Resources/views/front/projects/comment.html.twig");
    }
}
