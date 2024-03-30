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

/* @Cms/users/edit.html.twig */
class __TwigTemplate_f62ce5a647658e8bc75442d2b310683a extends Template
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
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@Cms/users/edit.html.twig", 1);
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
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit", ["id" => twig_get_attribute($this->env, $this->source, ($context["User"] ?? null), "id", [], "any", false, false, false, 78)]), "html", null, true);
        echo "\" method=\"POST\">

\t";
        // line 80
        if ((twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 80) != ($context["User"] ?? null))) {
            // line 81
            echo "\t\t<ul class=\"nav nav-tabs\" role=\"tablist\">
\t\t  <li class=\"nav-item\" role=\"presentation\">
\t\t    <button class=\"nav-link active\" id=\"tab1\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-content1\" type=\"button\" role=\"tab\" aria-controls=\"tab-content1\" aria-selected=\"true\">
\t\t      ";
            // line 84
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Inloggegevens", [], "cms"), "html", null, true);
            echo "
\t\t    </button>
\t\t  </li>
\t\t  <li class=\"nav-item\" role=\"presentation\">
\t\t    <button class=\"nav-link\" id=\"tab2\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-content2\" type=\"button\" role=\"tab\" aria-controls=\"tab-content2\" aria-selected=\"false\">
\t\t      ";
            // line 89
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Persoonsgegevens", [], "cms"), "html", null, true);
            echo "
\t\t    </button>
\t\t  </li>
\t\t</ul>
\t";
        }
        // line 94
        echo "
\t\t\t";
        // line 95
        if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 95), "valid", [], "any", false, false, false, 95)) {
            // line 96
            echo "\t\t\t\t<div class=\"alert alert-warning\">
\t\t\t\t\t";
            // line 97
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
            echo "
\t\t\t\t</div>
\t\t\t";
        }
        // line 100
        echo "\t\t\t";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "_token", [], "any", false, false, false, 100), 'row');
        echo "

\t\t\t<div class=\"tab-content\">
\t\t\t\t<div class=\"tab-pane fade show active\" aria-labelledby=\"tab-content1\" id=\"tab-content1\" role=\"tabpanel\">
\t\t\t\t\t<div id=\"basic\" class=\"t-content\">
\t\t\t\t\t";
        // line 105
        if ((twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 105) != ($context["User"] ?? null))) {
            // line 106
            echo "\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t<h6>";
            // line 110
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Inloggegevens", [], "cms"), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-12 col-md-6\">";
            // line 115
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "firstname", [], "any", false, false, false, 115), 'row');
            echo "</div>
\t\t\t\t\t\t<div class=\"col-12 col-md-6\">";
            // line 116
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lastname", [], "any", false, false, false, 116), 'row');
            echo "</div>
\t\t\t\t\t\t<div class=\"col-12\">";
            // line 117
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "admin_locale", [], "any", false, false, false, 117), 'row');
            echo "</div>
\t\t\t\t\t\t<div class=\"col-12\">";
            // line 118
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "role", [], "any", false, false, false, 118), 'row');
            echo "</div>
\t\t\t\t\t\t";
            // line 120
            echo "\t\t\t\t\t\t<div class=\"col-12\">";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lockin_uri", [], "any", false, false, false, 120), 'row');
            echo "</div>
\t\t\t\t\t";
            // line 122
            echo "\t\t\t\t\t<div class=\"col-12 col-md-6\" style=\"position: relative;\">
\t\t\t\t\t\t";
            // line 123
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "username", [], "any", false, false, false, 123), 'row');
            echo "
\t\t\t\t\t\t<span id=\"username-conflict\" style=\"color:red;font-weight:bold;position: absolute;top: 30px;right: 10px;font-size: 11px;text-transform: uppercase;\"></span>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-12 col-md-6\" style=\"position: relative;\">
\t\t\t\t\t\t";
            // line 127
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "email", [], "any", false, false, false, 127), 'row');
            echo "
\t\t\t\t\t\t<span id=\"email-conflict\" style=\"color:red;font-weight:bold;position: absolute;top: 30px;right: 10px;font-size: 11px;text-transform: uppercase;\"></span>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t";
            // line 131
            if (twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", true, true, false, 131)) {
                // line 132
                echo "\t\t\t\t\t<div id=\"newpass\" style=\"display:none;\"></div>
\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t<div style=\"position:relative;\">
\t\t\t\t\t<div class=\"indicator\"><span class=\"weak\"></span><span class=\"medium\"></span><span class=\"strong\"></span><div class=\"msg\"></div></div>
\t\t\t\t\t<i class=\"fa fa-eye\" style=\"position:absolute;top: 24px;right: 0;cursor:pointer;padding: 10px;font-size: 18px;z-index: 100;\" onclick=\"cpop.loadHtml('<strong>Wachtwoord:</strong><div>' + \$('#newpass').html() + '</div>');\"></i>
\t\t\t\t\t";
                // line 137
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 137), "first", [], "any", false, false, false, 137), 'row');
                echo "
\t\t\t\t\t</div>
\t\t\t\t\t<a href=\"#\" onclick=\"return generatePassword();\">";
                // line 139
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wachtwoord genereren", [], "cms"), "html", null, true);
                echo "</a>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t<div class=\"indicator\"><span class=\"weak\"></span><span class=\"medium\"></span><span class=\"strong\"></span><div class=\"msg\"></div></div>
\t\t\t\t\t";
                // line 143
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 143), "second", [], "any", false, false, false, 143), 'row');
                echo "
\t\t\t\t\t<div class=\"form-check\">
\t\t\t\t\t\t<input class=\"form-check-input\" type=\"checkbox\" id=\"sendpassword\" name=\"sendpassword\" value=\"1\" />
\t\t\t\t\t\t<label class=\"form-check-label\" for=\"sendpassword\">";
                // line 146
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Inloggegevens versturen", [], "cms"), "html", null, true);
                echo "</label>
\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t";
                // line 149
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 149), "first", [], "any", false, false, false, 149), "vars", [], "any", false, false, false, 149), "errors", [], "any", false, false, false, 149));
                foreach ($context['_seq'] as $context["_key"] => $context["errorItem"]) {
                    // line 150
                    echo "\t\t\t\t\t<label class=\"control-label has-error\" for=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "plainPassword", [], "any", false, false, false, 150), "vars", [], "any", false, false, false, 150), "id", [], "any", false, false, false, 150), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["errorItem"], "message", [], "any", false, false, false, 150), "html", null, true);
                    echo "</label>
\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['errorItem'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 152
                echo "\t\t\t";
            }
            // line 153
            echo "\t\t\t</div>
\t\t\t</div>
\t\t\t</div>
\t\t\t\t\t\t\t";
            // line 157
            echo "\t\t\t\t\t\t\t<div class=\"card\" id=\"card-sites\" style=\"";
            echo (((twig_length_filter($this->env, ($context["available_sites"] ?? null)) > 1)) ? ("") : ("display:none;"));
            echo "\">
\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 161
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Toegang tot websites", [], "cms"), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t";
            // line 166
            echo "\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["available_sites"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["label"]) {
                // line 167
                echo "\t\t\t\t\t\t\t\t<div class=\"form-check mb-2\">
\t\t\t\t\t\t\t\t\t<input class=\"form-check-input\" ";
                // line 168
                echo ((twig_in_filter($context["key"], ($context["active_sites"] ?? null))) ? ("checked=\"\"") : (""));
                echo " type=\"checkbox\" id=\"";
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "\" name=\"sites[]\">
\t\t\t\t\t\t\t\t\t<label for=\"";
                // line 169
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "\" class=\"form-check-label\">
\t\t\t\t\t\t\t\t\t\t";
                // line 170
                echo twig_escape_filter($this->env, $context["label"], "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t<span style=\"font-size:11px;font-weight:bold;display:block;color:#179bde;\">";
                // line 171
                echo twig_escape_filter($this->env, twig_join_filter((($__internal_compile_0 = ($context["available_sites_langs"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["key"]] ?? null) : null), ", "), "html", null, true);
                echo "</span>
\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['label'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 175
            echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
            // line 178
            echo "
\t\t\t\t\t\t\t<div class=\"card\" id=\"card-permissions\" style=\"display:";
            // line 179
            echo (((twig_get_attribute($this->env, $this->source, ($context["User"] ?? null), "hasRole", [0 => "ROLE_ADMIN"], "method", false, false, false, 179) || twig_get_attribute($this->env, $this->source, ($context["User"] ?? null), "hasRole", [0 => "ROLE_EDITOR"], "method", false, false, false, 179))) ? ("block") : ("none"));
            echo ";\">
\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t<h6>";
            // line 183
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("CMS rechten", [], "cms"), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t";
            // line 188
            echo "\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["permissions"] ?? null));
            foreach ($context['_seq'] as $context["p"] => $context["lbl"]) {
                // line 189
                echo "\t\t\t\t\t\t\t";
                $context["bit"] = twig_constant(("App\\CmsBundle\\Entity\\User::" . $context["p"]));
                // line 190
                echo "\t\t\t\t\t\t\t";
                $context["checked"] = (((((twig_get_attribute($this->env, $this->source, ($context["User"] ?? null), "permissions", [], "any", false, false, false, 190) & ($context["bit"] ?? null)) > 0) || (twig_get_attribute($this->env, $this->source, ($context["User"] ?? null), "permissions", [], "any", false, false, false, 190) == 0))) ? ("checked") : (""));
                // line 191
                echo "\t\t\t\t\t\t\t<div class=\"form-check\" style=\"display:inline-block;width: 33%;\">
\t\t\t\t\t\t\t\t<input ";
                // line 192
                echo twig_escape_filter($this->env, ($context["checked"] ?? null), "html", null, true);
                echo " type=\"checkbox\" id=\"";
                echo twig_escape_filter($this->env, $context["p"], "html", null, true);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, $context["p"], "html", null, true);
                echo "\" name=\"permissions[]\" class=\"form-check-input\" />
\t\t\t\t\t\t\t\t<label class=\"form-check-label\" for=\"";
                // line 193
                echo twig_escape_filter($this->env, $context["p"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["lbl"], "html", null, true);
                echo "</label>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['p'], $context['lbl'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 196
            echo "\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t";
            // line 199
            if (((array_key_exists("installed", $context) && twig_in_filter("WebshopBundle", ($context["installed"] ?? null))) && twig_get_attribute($this->env, $this->source, ($context["permissions"] ?? null), "ALLOW_WEBSHOP", [], "array", true, true, false, 199))) {
                // line 200
                echo "\t\t\t\t\t\t\t\t\t<div class=\"card\" id=\"card-ecomm-permissions\" style=\"display:";
                echo (((twig_get_attribute($this->env, $this->source, ($context["User"] ?? null), "hasRole", [0 => "ROLE_ADMIN"], "method", false, false, false, 200) || twig_get_attribute($this->env, $this->source, ($context["User"] ?? null), "hasRole", [0 => "ROLE_EDITOR"], "method", false, false, false, 200))) ? ("block") : ("none"));
                echo ";\">
\t\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
                // line 203
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Webshop rechten", [], "cms"), "html", null, true);
                echo "</h6>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                // line 205
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["ecomm_permissions"] ?? null));
                foreach ($context['_seq'] as $context["p"] => $context["lbl"]) {
                    // line 206
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context["bit"] = twig_constant(("App\\CmsBundle\\Entity\\User::" . $context["p"]));
                    // line 207
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context["checked"] = (((((twig_get_attribute($this->env, $this->source, ($context["User"] ?? null), "ecommPermissions", [], "any", false, false, false, 207) & ($context["bit"] ?? null)) > 0) || (twig_get_attribute($this->env, $this->source, ($context["User"] ?? null), "ecommPermissions", [], "any", false, false, false, 207) == 0))) ? ("checked") : (""));
                    // line 208
                    echo "\t\t\t\t\t\t\t\t\t<div class=\"form-check\" style=\"display:inline-block;width: 33%;\">
\t\t\t\t\t\t\t\t\t\t<input ";
                    // line 209
                    echo twig_escape_filter($this->env, ($context["checked"] ?? null), "html", null, true);
                    echo " type=\"checkbox\" id=\"";
                    echo twig_escape_filter($this->env, $context["p"], "html", null, true);
                    echo "\" value=\"";
                    echo twig_escape_filter($this->env, $context["p"], "html", null, true);
                    echo "\" name=\"ecomm_permissions[]\" class=\"form-check-input\" />
\t\t\t\t\t\t\t\t\t\t<label class=\"form-check-label\" for=\"";
                    // line 210
                    echo twig_escape_filter($this->env, $context["p"], "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $context["lbl"], "html", null, true);
                    echo "</label>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['p'], $context['lbl'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 213
                echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
            }
            // line 216
            echo "
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 221
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gebruikersinstellingen", [], "cms"), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t";
            // line 225
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "enabled", [], "any", false, false, false, 225), 'row');
            echo "
\t\t\t\t\t\t\t\t\t";
            // line 226
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "totpEnabled", [], "any", false, false, false, 226), 'row');
            echo "
\t\t\t\t\t\t\t\t\t";
            // line 227
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "deny_user_name_change", [], "any", false, false, false, 227), 'row');
            echo "
\t\t\t\t\t\t\t\t\t";
            // line 228
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "deny_user_removal", [], "any", false, false, false, 228), 'row');
            echo "
\t\t\t\t\t\t\t\t\t";
            // line 229
            if (($context["is_b2b"] ?? null)) {
                // line 230
                echo "\t\t\t\t\t\t\t\t\t";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "b2b", [], "any", false, false, false, 230), 'row');
                echo "
\t\t\t\t\t\t\t\t\t";
            }
            // line 232
            echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 239
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verloopdata", [], "cms"), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t";
            // line 243
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "expire", [], "any", false, false, false, 243), 'row');
            echo "
\t\t\t\t\t\t\t\t\t<div id=\"expire-settings\" style=\"display:";
            // line 244
            echo ((twig_get_attribute($this->env, $this->source, ($context["User"] ?? null), "expire", [], "any", false, false, false, 244)) ? ("block") : ("none"));
            echo ";\">
\t\t\t\t\t\t\t\t\t\t";
            // line 245
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "expire_date", [], "any", false, false, false, 245), 'row');
            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
            // line 247
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "expire_password_enable", [], "any", false, false, false, 247), 'row');
            echo "
\t\t\t\t\t\t\t\t\t<div id=\"expire-password\" style=\"display:";
            // line 248
            echo ((twig_get_attribute($this->env, $this->source, ($context["User"] ?? null), "expirepasswordenable", [], "any", false, false, false, 248)) ? ("block") : ("none"));
            echo ";\">
\t\t\t\t\t\t\t\t\t\t";
            // line 249
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "expire_password_date", [], "any", false, false, false, 249), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t";
            // line 250
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "expire_password_period", [], "any", false, false, false, 250), 'row');
            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t";
        } else {
            // line 256
            echo "
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t        <div class=\"card-title\">
\t\t\t\t\t          <div class=\"card-titles\">
\t\t\t\t\t            <h6>";
            // line 261
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Profiel bewerken", [], "cms"), "html", null, true);
            echo "</h6>
\t\t\t\t\t          </div>
\t\t\t\t\t        </div>

\t\t\t\t\t\t\t\t\t<p>Het is niet mogelijk om je eigen profiel via het Gebruikersoverzicht te bewerken, klik op de knop hieronder om je gegevens aan te passen.</p>

\t\t\t\t\t\t\t\t\t<a href=\"/admin/profile\" class=\"btn\">";
            // line 267
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Profiel bewerken", [], "cms"), "html", null, true);
            echo "</a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t";
        }
        // line 272
        echo "\t\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t<div class=\"tab-pane fade\" aria-labelledby=\"tab-content2\" id=\"tab-content2\" role=\"tabpanel\">
\t\t\t\t  <div id=\"personal\" class=\"t-content\">
\t\t\t\t    <div class=\"card\">
\t\t\t\t      <div class=\"card-content\">
\t\t\t\t        <div class=\"card-title\">
\t\t\t\t          <div class=\"card-titles\">
\t\t\t\t            <h6>";
        // line 280
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Persoonsgegevens", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t          </div>
\t\t\t\t        </div>
\t\t\t\t        <div class=\"row\">
\t\t\t\t          <div class=\"col-12\">";
        // line 284
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "gender", [], "any", false, false, false, 284), 'row');
        echo "</div>
\t\t\t\t          <div class=\"col-12 col-md-10\">";
        // line 285
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "street", [], "any", false, false, false, 285), 'row');
        echo "</div>
\t\t\t\t          <div class=\"col-12 col-md-2\">";
        // line 286
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "number", [], "any", false, false, false, 286), 'row');
        echo "</div>
\t\t\t\t          <div class=\"col-12 col-md-4\">";
        // line 287
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "postalcode", [], "any", false, false, false, 287), 'row');
        echo "</div>
\t\t\t\t          <div class=\"col-12 col-md-8\">";
        // line 288
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "city", [], "any", false, false, false, 288), 'row');
        echo "</div>
\t\t\t\t          ";
        // line 290
        echo "\t\t\t\t          <div class=\"col-12 col-md-12\">";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "country", [], "any", false, false, false, 290), 'row');
        echo "</div>
\t\t\t\t          <div class=\"col-12 col-md-6\">";
        // line 291
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "dateofbirth", [], "any", false, false, false, 291), 'row');
        echo "</div>
\t\t\t\t          <div class=\"col-12 col-md-6\">";
        // line 292
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "phone", [], "any", false, false, false, 292), 'row');
        echo "</div>
\t\t\t\t        </div>
\t\t\t\t      </div>
\t\t\t\t    </div>
\t\t\t\t    <div class=\"card\">
\t\t\t\t      <div class=\"card-content\">
\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 300
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bedrijfsgegevens", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t        <div class=\"row\">
\t\t\t\t          ";
        // line 305
        echo "\t\t\t\t          <div class=\"col-12\">";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "company", [], "any", false, false, false, 305), 'row');
        echo "</div>
\t\t\t\t          ";
        // line 308
        echo "\t\t\t\t          <div class=\"col-12 col-md-12\">";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "companyKvk", [], "any", false, false, false, 308), 'row');
        echo "</div>
\t\t\t\t          ";
        // line 310
        echo "\t\t\t\t        </div>
\t\t\t\t      </div>
\t\t\t\t    </div>
\t\t\t\t  </div>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<script>
\t\t\t\$('#form_expire').click(function(){
\t\t\t\tif(\$('#form_expire').prop('checked') == true){
\t\t\t\t\t\$('#expire-settings').show();
\t\t\t\t}else{
\t\t\t\t\t\$('#expire-settings').hide();
\t\t\t\t}
\t\t\t});
\t\t\t\$('#form_expire_password_enable').click(function(){
\t\t\tif(\$('#form_expire_password_enable').prop('checked') == true){
\t\t\t\$('#expire-password').show();
\t\t\t}else{
\t\t\t\$('#expire-password').hide();
\t\t\t}
\t\t\t});
\t\t\t</script>
\t\t\t\t";
        // line 333
        if ((twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 333) != ($context["User"] ?? null))) {
            // line 334
            echo "\t\t<div class=\"btn-bar\">
\t\t\t<div class=\"right\">
\t\t\t\t<a href=\"";
            // line 336
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users");
            echo "\" class=\"btn-flat right waves-effect waves-light\"><i class=\"fa fa-times\"></i> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Annuleren", [], "cms"), "html", null, true);
            echo "</a>
\t\t\t\t<button type=\"submit\" class=\"btn right waves-effect waves-light\"><i class=\"fa fa-save\"></i> ";
            // line 337
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Opslaan", [], "cms"), "html", null, true);
            echo "</button>
\t\t\t</div>
\t\t</div>
\t";
        }
        // line 341
        echo "\t</form>

\t<script src=\"/bundles/cms/js/utils.js\"></script>
\t<script type=\"text/javascript\">
\tfunction generatePassword(){

\t\tvar e = [],
\t\tt = 4,
\t\ta = [\"a\", \"b\", \"c\", \"d\", \"e\", \"f\", \"g\", \"h\", \"i\", \"j\", \"k\", \"l\", \"m\", \"n\", \"o\", \"p\", \"q\", \"r\", \"s\", \"t\", \"u\", \"v\", \"w\", \"x\", \"y\", \"z\"],
\t\tl = [\"A\", \"B\", \"C\", \"D\", \"E\", \"F\", \"G\", \"H\", \"I\", \"J\", \"K\", \"L\", \"M\", \"N\", \"O\", \"P\", \"Q\", \"R\", \"S\", \"T\", \"U\", \"V\", \"W\", \"X\", \"Y\", \"Z\"],
\t\to = [\"0\", \"1\", \"2\", \"3\", \"4\", \"5\", \"6\", \"7\", \"8\", \"9\"],
\t\tu = [\"-\", \"=\", \"!\", \"@\"];

\t\tfor (var h = 0; h < t; h++) {
\t\t    var d = a[Math.floor(Math.random() * a.length)];
\t\t    e.push(d)
\t\t}

\t\te.push(u[Math.floor(Math.random() * u.length)])

\t\tfor (var h = 0; h < t; h++) {
\t\t    var d = l[Math.floor(Math.random() * l.length)];
\t\t    e.push(d)
\t\t}

\t\te.push(o[Math.floor(Math.random() * o.length)])

\t\tvar randomstring = e.join(\"\");

\t\t\$('#form_plainPassword_first,#form_plainPassword_second').val(randomstring);
\t\t\$('#newpass').html(randomstring);
\t\tverifyPasswordFormat(\$('#form_plainPassword_first'));
\t\treturn false;
\t}
\tvar usernameTimer;
\tvar emailTimer;
\t\$(function(){
\t\t\$('#form_role').change(function(){
\t\t\tif(this.value == 'ROLE_ADMIN' || this.value == 'ROLE_EDITOR'){
\t\t\t\t\$('#card-permissions').show();
\t\t\t\t\$('#card-ecomm-permissions').show();
\t\t\t}else{
\t\t\t\t\$('#card-permissions').hide();
\t\t\t\t\$('#card-ecomm-permissions').hide();
\t\t\t}
\t\t});
\t\t\t});

\t\tif(\$('.alert.alert-warning *').length == 0){
\t\t\t\$('.alert.alert-warning').remove();
\t\t}
\t</script>
";
    }

    public function getTemplateName()
    {
        return "@Cms/users/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  686 => 341,  679 => 337,  673 => 336,  669 => 334,  667 => 333,  642 => 310,  637 => 308,  632 => 305,  625 => 300,  614 => 292,  610 => 291,  605 => 290,  601 => 288,  597 => 287,  593 => 286,  589 => 285,  585 => 284,  578 => 280,  568 => 272,  560 => 267,  551 => 261,  544 => 256,  535 => 250,  531 => 249,  527 => 248,  523 => 247,  518 => 245,  514 => 244,  510 => 243,  503 => 239,  494 => 232,  488 => 230,  486 => 229,  482 => 228,  478 => 227,  474 => 226,  470 => 225,  463 => 221,  456 => 216,  451 => 213,  440 => 210,  432 => 209,  429 => 208,  426 => 207,  423 => 206,  419 => 205,  414 => 203,  407 => 200,  405 => 199,  400 => 196,  389 => 193,  381 => 192,  378 => 191,  375 => 190,  372 => 189,  367 => 188,  360 => 183,  353 => 179,  350 => 178,  346 => 175,  336 => 171,  332 => 170,  328 => 169,  320 => 168,  317 => 167,  312 => 166,  305 => 161,  297 => 157,  292 => 153,  289 => 152,  278 => 150,  274 => 149,  268 => 146,  262 => 143,  255 => 139,  250 => 137,  243 => 132,  241 => 131,  234 => 127,  227 => 123,  224 => 122,  219 => 120,  215 => 118,  211 => 117,  207 => 116,  203 => 115,  195 => 110,  189 => 106,  187 => 105,  178 => 100,  172 => 97,  169 => 96,  167 => 95,  164 => 94,  156 => 89,  148 => 84,  143 => 81,  141 => 80,  136 => 78,  65 => 9,  62 => 8,  59 => 7,  56 => 6,  53 => 5,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/users/edit.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/users/edit.html.twig");
    }
}
