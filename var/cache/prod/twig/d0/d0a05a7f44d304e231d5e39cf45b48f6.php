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

/* @TrinityNeutral/users/edit.html.twig */
class __TwigTemplate_af838be49d2678cedf4dec6a9670f354 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@Cms/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@TrinityNeutral/users/edit.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "\t";
        $context["pass_length"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Minimaal 8 tekens.", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 4), "locale", [], "any", false, false, false, 4));
        // line 5
        echo "\t";
        $context["pass_number"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Minimaal één cijfer.", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 5), "locale", [], "any", false, false, false, 5));
        // line 6
        echo "\t";
        $context["pass_letter"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Minimaal één kleine letter.", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 6), "locale", [], "any", false, false, false, 6));
        // line 7
        echo "\t";
        $context["pass_capital"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Minimaal één hoofdletter.", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 7), "locale", [], "any", false, false, false, 7));
        // line 8
        echo "\t";
        $context["pass_chars"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Minimaal één van de volgende tekens:", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 8), "locale", [], "any", false, false, false, 8));
        // line 9
        echo "
\t<style>
\tform .passtip{
\t\tdisplay: none;
\t\tfont-size: 12px;
\t\tmargin: 5px 10px 10px 10px;
\t}

\tform .passtip.show{
\t\tdisplay: block;
\t}

\tform .passtip .hint {
\t    display: block;
\t    color: #a0a0a0;
\t    height: 17px;
\t}

\tform .passtip .hint::before {
\t    content: \"\\f111\";
\t    font-family: \"Font Awesome 5 Free\";
\t    font-weight: 500;
\t    margin-right: 5px;
\t}

\tform .passtip .hint.valid {
\t    color: green;
\t}

\tform .passtip .hint.valid::before {
\t    content: \"\\f058\";
\t}

\tform .passloader {
\t    position: absolute;
\t    top: 0;
\t    left: 0;
\t    right: 0;
\t    background: red;
\t    height: 5px;
\t    width: 0;
\t    border-radius: 0 0 4px 4px;
\t}

\tform .passloader.bad {
\t    background-color: red;
\t}

\tform .passloader.medium {
\t    background-color: orange;
\t}

\tform .passloader.good {
\t    background-color: green;
\t}
\t</style>

\t<style>
\t#form_dateofbirth + label {
\t    position: absolute;
\t    top: -26px;
\t    font-size: .8rem;
\t}
\t</style>

\t<script>
\tvar canSubmit = true;
\tvar submitMessage = '';
\t</script>
\t<form action=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_neutral_users_edit", ["id" => twig_get_attribute($this->env, $this->source, ($context["User"] ?? null), "id", [], "any", false, false, false, 78)]), "html", null, true);
        echo "\" method=\"POST\">

\t\t";
        // line 80
        if ((twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 80) != ($context["User"] ?? null))) {
            // line 81
            echo "\t\t\t<ul class=\"nav nav-tabs\" role=\"tablist\">
\t\t\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t<button class=\"nav-link active\" id=\"tab1\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-content1\" type=\"button\" role=\"tab\" aria-controls=\"tab-content1\" aria-selected=\"true\">
\t\t\t\t\t\t";
            // line 84
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Inloggegevens", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t</button>
\t\t\t\t</li>
\t\t\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t<button class=\"nav-link\" id=\"tab2\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-content2\" type=\"button\" role=\"tab\" aria-controls=\"tab-content2\" aria-selected=\"false\">
\t\t\t\t\t\t";
            // line 89
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Persoonsgegevens", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t</button>
\t\t\t\t</li>
\t\t\t</ul>
\t\t";
        }
        // line 94
        echo "
\t\t";
        // line 95
        if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 95), "valid", [], "any", false, false, false, 95)) {
            // line 96
            echo "\t\t\t<div class=\"panel error padd\">
\t\t\t\t";
            // line 97
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
            echo "
\t\t\t</div>
\t\t";
        }
        // line 100
        echo "
\t\t";
        // line 101
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "_token", [], "any", false, false, false, 101), 'row');
        echo "

\t\t<div class=\"tab-content\">
\t\t\t<div class=\"tab-pane fade show active\" aria-labelledby=\"tab-content1\" id=\"tab-content1\" role=\"tabpanel\">
\t\t\t\t<div id=\"basic\" class=\"t-content\">
\t\t\t\t";
        // line 106
        if ((twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 106) != ($context["User"] ?? null))) {
            // line 107
            echo "\t\t\t\t<div class=\"card\">
\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t<h6>";
            // line 111
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Inloggegevens", [], "cms"), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">";
            // line 116
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "firstname", [], "any", false, false, false, 116), 'row');
            echo "</div>
\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">";
            // line 117
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lastname", [], "any", false, false, false, 117), 'row');
            echo "</div>
\t\t\t\t\t\t\t<div class=\"col-12\">";
            // line 118
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "admin_locale", [], "any", false, false, false, 118), 'row');
            echo "</div>
\t\t\t\t\t\t\t<!--<div class=\"col-12\">";
            // line 119
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lockin_uri", [], "any", false, false, false, 119), 'row');
            echo "</div>-->

\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\" style=\"position: relative;\">
\t\t\t\t\t\t\t\t";
            // line 122
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "username", [], "any", false, false, false, 122), 'row');
            echo "
\t\t\t\t\t\t\t\t<span id=\"username-conflict\" style=\"color:red;font-weight:bold;position: absolute;top: 30px;right: 10px;font-size: 11px;text-transform: uppercase;\"></span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\" style=\"position: relative;\">
\t\t\t\t\t\t\t\t";
            // line 126
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "email", [], "any", false, false, false, 126), 'row');
            echo "
\t\t\t\t\t\t\t\t<span id=\"email-conflict\" style=\"color:red;font-weight:bold;position: absolute;top: 30px;right: 10px;font-size: 11px;text-transform: uppercase;\"></span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t\t";
            // line 130
            if (twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", true, true, false, 130)) {
                // line 131
                echo "\t\t\t\t\t\t\t<div id=\"newpass\" style=\"display:none;\"></div>
\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t<div style=\"position:relative;\">
\t\t\t\t\t\t\t\t<div class=\"indicator\"><span class=\"weak\"></span><span class=\"medium\"></span><span class=\"strong\"></span><div class=\"msg\"></div></div>
\t\t\t\t\t\t\t\t<i class=\"fa fa-eye\" style=\"position:absolute;top: 23px;right: -10px;cursor:pointer;padding: 10px;font-size: 18px;z-index: 100;\" onclick=\"cpop.loadHtml('<strong>Wachtwoord:</strong><div>' + \$('#newpass').html() + '</div>');\"></i>
\t\t\t\t\t\t\t\t";
                // line 136
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 136), "first", [], "any", false, false, false, 136), 'row');
                echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<a href=\"#\" onclick=\"return generatePassword();\">";
                // line 138
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wachtwoord genereren", [], "cms"), "html", null, true);
                echo "</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t<div class=\"indicator\"><span class=\"weak\"></span><span class=\"medium\"></span><span class=\"strong\"></span><div class=\"msg\"></div></div>
\t\t\t\t\t\t\t\t\t";
                // line 142
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 142), "second", [], "any", false, false, false, 142), 'row');
                echo "
\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"sendpassword\" name=\"sendpassword\" value=\"1\" />
\t\t\t\t\t\t\t\t\t<label for=\"sendpassword\">";
                // line 144
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Inloggegevens versturen", [], "cms"), "html", null, true);
                echo "</label>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                // line 146
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 146), "first", [], "any", false, false, false, 146), "vars", [], "any", false, false, false, 146), "errors", [], "any", false, false, false, 146));
                foreach ($context['_seq'] as $context["_key"] => $context["errorItem"]) {
                    // line 147
                    echo "\t\t\t\t\t\t\t\t<label class=\"control-label has-error\" for=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 147), "vars", [], "any", false, false, false, 147), "id", [], "any", false, false, false, 147), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["errorItem"], "message", [], "any", false, false, false, 147), "html", null, true);
                    echo "</label>
\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['errorItem'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 149
                echo "\t\t\t\t\t\t";
            }
            // line 150
            echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-12 col-lg-6\">
\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 160
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gebruikersinstellingen", [], "cms"), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
            // line 163
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "enabled", [], "any", false, false, false, 163), 'row');
            echo "
\t\t\t\t\t\t\t\t";
            // line 164
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "totpEnabled", [], "any", false, false, false, 164), 'row');
            echo "
\t\t\t\t\t\t\t\t";
            // line 165
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "deny_user_name_change", [], "any", false, false, false, 165), 'row');
            echo "
\t\t\t\t\t\t\t\t";
            // line 166
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "deny_user_removal", [], "any", false, false, false, 166), 'row');
            echo "
\t\t\t\t\t\t\t\t";
            // line 167
            if (($context["is_b2b"] ?? null)) {
                // line 168
                echo "\t\t\t\t\t\t\t\t";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "b2b", [], "any", false, false, false, 168), 'row');
                echo "
\t\t\t\t\t\t\t\t";
            }
            // line 170
            echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-12 col-lg-6\">
\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 178
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verloopdata", [], "cms"), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t";
            // line 182
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "expire", [], "any", false, false, false, 182), 'row');
            echo "
\t\t\t\t\t\t\t\t<div id=\"expire-settings\" style=\"display:";
            // line 183
            echo ((twig_get_attribute($this->env, $this->source, ($context["User"] ?? null), "expire", [], "any", false, false, false, 183)) ? ("block") : ("none"));
            echo ";\">
\t\t\t\t\t\t\t\t\t";
            // line 184
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "expire_date", [], "any", false, false, false, 184), 'row');
            echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
            // line 186
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "expire_password_enable", [], "any", false, false, false, 186), 'row');
            echo "
\t\t\t\t\t\t\t\t<div id=\"expire-password\" style=\"display:";
            // line 187
            echo ((twig_get_attribute($this->env, $this->source, ($context["User"] ?? null), "expirepasswordenable", [], "any", false, false, false, 187)) ? ("block") : ("none"));
            echo ";\">
\t\t\t\t\t\t\t\t\t";
            // line 188
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "expire_password_date", [], "any", false, false, false, 188), 'row');
            echo "
\t\t\t\t\t\t\t\t\t";
            // line 189
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "expire_password_period", [], "any", false, false, false, 189), 'row');
            echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t";
        } else {
            // line 197
            echo "
\t\t\t\t<div class=\"card\">
\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t  <div class=\"card-titles\">
\t\t\t\t\t\t\t<h6>";
            // line 202
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Profiel bewerken", [], "cms"), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t  </div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<p>Het is niet mogelijk om je eigen profiel via het Gebruikersoverzicht te bewerken, klik op de knop hieronder om je gegevens aan te passen.</p>

\t\t\t\t\t\t<a href=\"/admin/profile\" class=\"btn\">";
            // line 208
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Profiel bewerken", [], "cms"), "html", null, true);
            echo "</a>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t";
        }
        // line 213
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"tab-pane fade\" aria-labelledby=\"tab-content2\" id=\"tab-content2\" role=\"tabpanel\">
\t\t\t\t<div id=\"personal\" class=\"t-content\">
\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t  <div class=\"card-content\">
\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t  <div class=\"card-titles\">
\t\t\t\t\t\t\t\t<h6>";
        // line 221
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Persoonsgegevens", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t  </div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t  <div class=\"col-12 col-md-9\">";
        // line 225
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "street", [], "any", false, false, false, 225), 'row');
        echo "</div>
\t\t\t\t\t\t\t  <div class=\"col-12 col-md-3\">";
        // line 226
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "number", [], "any", false, false, false, 226), 'row');
        echo "</div>
\t\t\t\t\t\t\t  <div class=\"col-12 col-md-4\">";
        // line 227
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "postalcode", [], "any", false, false, false, 227), 'row');
        echo "</div>
\t\t\t\t\t\t\t  <div class=\"col-12 col-md-8\">";
        // line 228
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "city", [], "any", false, false, false, 228), 'row');
        echo "</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t  </div>
\t\t\t\t\t</div>


\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-12 col-lg-6\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 240
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Postadres", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"card-actions\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 243
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "has_postal_address", [], "any", false, false, false, 243), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div style=\"display:none;\" class=\"row postal\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 249
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "postal_street", [], "any", false, false, false, 249), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 254
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "postal_streetnumber", [], "any", false, false, false, 254), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 259
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "postal_postcode", [], "any", false, false, false, 259), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-floating input_cont\">
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 264
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "postal_city", [], "any", false, false, false, 264), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"col-12 col-lg-6\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 277
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Factuuradres", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"card-actions\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 280
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "company_has_invoice_address", [], "any", false, false, false, 280), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div style=\"display:none;\" class=\"row invoice\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 286
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "company_invoice_street", [], "any", false, false, false, 286), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 290
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "company_invoice_streetnumber", [], "any", false, false, false, 290), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 294
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "company_invoice_postcode", [], "any", false, false, false, 294), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-8\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 298
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "company_invoice_city", [], "any", false, false, false, 298), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t<h6>";
        // line 310
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Contactgegevens", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        // line 313
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "phone", [], "any", false, false, false, 313), 'row');
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t<h6>";
        // line 320
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Meer informatie", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 324
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "website", [], "any", false, false, false, 324), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 325
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "company", [], "any", false, false, false, 325), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">";
        // line 326
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "companyEmail", [], "any", false, false, false, 326), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">";
        // line 327
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "companyPhone", [], "any", false, false, false, 327), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">";
        // line 328
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "companyKvk", [], "any", false, false, false, 328), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">";
        // line 329
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "companyTaxNo", [], "any", false, false, false, 329), 'row');
        echo "</div>

\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t";
        // line 332
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "company_description", [], "any", false, false, false, 332), 'row');
        echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>

\t\t<script>
\t\t\t\$('#form_expire').click(function(){
\t\t\t\tif(\$('#form_expire').prop('checked') == true){
\t\t\t\t\t\$('#expire-settings').show();
\t\t\t\t}else{
\t\t\t\t\t\$('#expire-settings').hide();
\t\t\t\t}
\t\t\t});
\t\t\t\$('#form_expire_password_enable').click(function(){
\t\t\t\tif(\$('#form_expire_password_enable').prop('checked') == true){
\t\t\t\t\t\$('#expire-password').show();
\t\t\t\t}else{
\t\t\t\t\t\$('#expire-password').hide();
\t\t\t\t}
\t\t\t});
\t\t\tif(\$(\"#form_company_has_invoice_address\").length > 0){
\t\t\t\t\$(\"#form_company_has_invoice_address\").click(function(){
\t\t\t\t\t\$(\".invoice\").toggle().toggleClass(\"active\");
\t\t\t\t\tif(\$(\".invoice\").hasClass(\"active\")){
\t\t\t\t\t\t\$(\".invoice input[type=text]\").attr(\"required\",\"required\");
\t\t\t\t\t}else{
\t\t\t\t\t\t\$(\".invoice input[type=text]\").removeAttr(\"required\");
\t\t\t\t\t}
\t\t\t\t});
\t\t\t\tif(\$(\"#form_company_has_invoice_address\").prop(\"checked\")){
\t\t\t\t\t\$(\".invoice\").toggle().toggleClass(\"active\");
\t\t\t\t\t\$(\".invoice input[type=text]\").attr(\"required\",\"required\");
\t\t\t\t}
\t\t\t}

\t\t\tif(\$(\"#form_has_postal_address\").length > 0){
\t\t\t\t\$(\"#form_has_postal_address\").click(function(){
\t\t\t\t\t\$(\".postal\").toggle().toggleClass(\"active\");
\t\t\t\t\tif(\$(\".postal\").hasClass(\"active\")){
\t\t\t\t\t\t\$(\".postal input[type=text]\").attr(\"required\",\"required\");
\t\t\t\t\t}else{
\t\t\t\t\t\t\$(\".postal input[type=text]\").removeAttr(\"required\");
\t\t\t\t\t}
\t\t\t\t});
\t\t\t\tif(\$(\"#form_has_postal_address\").prop(\"checked\")){
\t\t\t\t\t\$(\".postal\").toggle().toggleClass(\"active\");
\t\t\t\t\t\$(\".postal input[type=text]\").attr(\"required\",\"required\");
\t\t\t\t}
\t\t\t}
\t\t</script>
\t\t";
        // line 386
        if ((twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 386) != ($context["User"] ?? null))) {
            // line 387
            echo "\t\t\t<div class=\"btn-bar\">
\t\t\t\t<div class=\"right\">
\t\t\t\t\t<a href=\"";
            // line 389
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_neutral_users");
            echo "\" class=\"btn-flat right waves-effect waves-light\"><i class=\"fa fa-times\"></i> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Annuleren", [], "cms"), "html", null, true);
            echo "</a>
\t\t\t\t\t<button type=\"submit\" class=\"btn right waves-effect waves-light\"><i class=\"fa fa-save\"></i> ";
            // line 390
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Opslaan", [], "cms"), "html", null, true);
            echo "</button>
\t\t\t\t</div>
\t\t\t</div>
\t\t";
        }
        // line 394
        echo "\t</form>

\t<script src=\"/bundles/cms/js/utils.js\"></script>
\t<script type=\"text/javascript\">
\t\tfunction generatePassword(){

\t\t\tvar e = [],
\t\t\tt = 4,
\t\t\ta = [\"a\", \"b\", \"c\", \"d\", \"e\", \"f\", \"g\", \"h\", \"i\", \"j\", \"k\", \"l\", \"m\", \"n\", \"o\", \"p\", \"q\", \"r\", \"s\", \"t\", \"u\", \"v\", \"w\", \"x\", \"y\", \"z\"],
\t\t\tl = [\"A\", \"B\", \"C\", \"D\", \"E\", \"F\", \"G\", \"H\", \"I\", \"J\", \"K\", \"L\", \"M\", \"N\", \"O\", \"P\", \"Q\", \"R\", \"S\", \"T\", \"U\", \"V\", \"W\", \"X\", \"Y\", \"Z\"],
\t\t\to = [\"0\", \"1\", \"2\", \"3\", \"4\", \"5\", \"6\", \"7\", \"8\", \"9\"],
\t\t\tu = [\"-\", \"=\", \"!\", \"@\"];

\t\t\tfor (var h = 0; h < t; h++) {
\t\t\t\tvar d = a[Math.floor(Math.random() * a.length)];
\t\t\t\te.push(d)
\t\t\t}

\t\t\te.push(u[Math.floor(Math.random() * u.length)])

\t\t\tfor (var h = 0; h < t; h++) {
\t\t\t\tvar d = l[Math.floor(Math.random() * l.length)];
\t\t\t\te.push(d)
\t\t\t}

\t\t\te.push(o[Math.floor(Math.random() * o.length)])

\t\t\tvar randomstring = e.join(\"\");

\t\t\t\$('#form_plainPassword_first,#form_plainPassword_second').val(randomstring);
\t\t\t\$('#newpass').html(randomstring);
\t\t\tverifyPasswordFormat(\$('#form_plainPassword_first'));
\t\t\treturn false;
\t\t}
\t\tvar usernameTimer;
\t\tvar emailTimer;
\t\t\$(function(){
\t\t\t\$('#form_role').change(function(){
\t\t\t\tif(this.value == 'ROLE_ADMIN' || this.value == 'ROLE_EDITOR'){
\t\t\t\t\t\$('#card-permissions').show();
\t\t\t\t\t\$('#card-ecomm-permissions').show();
\t\t\t\t}else{
\t\t\t\t\t\$('#card-permissions').hide();
\t\t\t\t\t\$('#card-ecomm-permissions').hide();
\t\t\t\t}
\t\t\t});
\t\t});
\t</script>
";
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/users/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  680 => 394,  673 => 390,  667 => 389,  663 => 387,  661 => 386,  604 => 332,  598 => 329,  594 => 328,  590 => 327,  586 => 326,  582 => 325,  578 => 324,  571 => 320,  561 => 313,  555 => 310,  540 => 298,  533 => 294,  526 => 290,  519 => 286,  510 => 280,  504 => 277,  488 => 264,  480 => 259,  472 => 254,  464 => 249,  455 => 243,  449 => 240,  434 => 228,  430 => 227,  426 => 226,  422 => 225,  415 => 221,  405 => 213,  397 => 208,  388 => 202,  381 => 197,  370 => 189,  366 => 188,  362 => 187,  358 => 186,  353 => 184,  349 => 183,  345 => 182,  338 => 178,  328 => 170,  322 => 168,  320 => 167,  316 => 166,  312 => 165,  308 => 164,  304 => 163,  298 => 160,  286 => 150,  283 => 149,  272 => 147,  268 => 146,  263 => 144,  258 => 142,  251 => 138,  246 => 136,  239 => 131,  237 => 130,  230 => 126,  223 => 122,  217 => 119,  213 => 118,  209 => 117,  205 => 116,  197 => 111,  191 => 107,  189 => 106,  181 => 101,  178 => 100,  172 => 97,  169 => 96,  167 => 95,  164 => 94,  156 => 89,  148 => 84,  143 => 81,  141 => 80,  136 => 78,  65 => 9,  62 => 8,  59 => 7,  56 => 6,  53 => 5,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/users/edit.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/NeutralBundle/Resources/views/users/edit.html.twig");
    }
}
