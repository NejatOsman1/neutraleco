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

/* @Cms/page/edit.html.twig */
class __TwigTemplate_1b020a9dd5e90a0dbada4a141d041e7e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'pagetitle' => [$this, 'block_pagetitle'],
            'treetoggle' => [$this, 'block_treetoggle'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 2
        return "@Cms/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        $context["wrapperClasses"] = ["" => "Standaard", "bg_primary" => "Primair", "bg_secondary" => "Secundair", "bg_tertiary" => "Tertiair", "bg_dark" => "Donker", "bg_gray" => "Grijs", "bg_light" => "Licht"];
        // line 14
        $context["wrapperTextColor"] = ["" => "Standaard", "text_dark" => "Donker", "text_light" => "Licht"];
        // line 2
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@Cms/page/edit.html.twig", 2);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 20
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 21
        echo "\t";
        if ((($context["id"] ?? null) > 0)) {
            // line 22
            echo "\t\t";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina aanpassen", [], "cms"), "html", null, true);
            echo "
\t";
        } else {
            // line 24
            echo "\t\t";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina toevoegen", [], "cms"), "html", null, true);
            echo "
\t";
        }
    }

    // line 28
    public function block_treetoggle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "<li class=\"treetoggle\" title=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina overicht", [], "cms"), "html", null, true);
        echo "\"><a href=\"#!\"><i class=\"material-icons\">menu</i></a></li>";
    }

    // line 30
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 31
        echo "<style>
\t.bulk-checkbox{
\t\tdisplay: none;
\t\tborder-radius: 5px;
\t\tbackground: #179bde1c;
\t\tposition: absolute;
\t\ttop: 0;
\t\theight: 50px;
\t\tline-height: 50px;
\t\twidth: 50px;
\t\ttext-align: center;
\t\tleft: -56px;
\t}
\tol.sortable{
\t\ttransition: margin-left .2s;
\t\tmargin-left: 0;
\t}
\t.bulk-edit ol.sortable{
\t\tmargin-left: 56px;
\t}
\t.bulk-edit .bulk-checkbox{
\t\tdisplay: block;
\t}

\t.bulk-edit-checked{
\t\t/**/
\t}

\t.bulk-options {
\t    position: fixed;
\t    bottom: -100px;
\t    transition: bottom .2s;
\t    left: 280px;
\t    right: 0;
\t    text-align: center;
\t    z-index: 1000000;
\t    background: #fff;
\t    padding: 10px;
\t    box-shadow: 0 0 4px rgba(0,0,0,0.05);
\t}

\t.bulk-edit.bulk-edit-checked .bulk-options{
\t\tbottom: 0px;
\t}
\t</style>

\t<!-- MiniColors -->
\t<script src=\"/bundles/cms/jquery-minicolors-master/jquery.minicolors.js\"></script>
\t<link rel=\"stylesheet\" href=\"/bundles/cms/jquery-minicolors-master/jquery.minicolors.css\">


\t<script>
\tvar myNewBlock;
\tvar between = false;
\tvar mediaField = null;

\tlet wrapperClasses = ";
        // line 87
        echo json_encode(($context["wrapperClasses"] ?? null));
        echo ";
\tlet wrapperTextColor = ";
        // line 88
        echo json_encode(($context["wrapperTextColor"] ?? null));
        echo ";
\t</script>

\t<div class=\"page-save-overlay\">
\t\t<div class=\"vtable\">
\t\t\t<div class=\"valign\">
\t\t\t\t<div class=\"loading\"></div>
\t\t\t\t<span>";
        // line 95
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bezig met opslaan..", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t</div>
\t\t</div>
\t</div>

<div class=\"btn-bar\">
\t<div class=\"left\">
\t\t\t";
        // line 103
        echo "
\t\t\t";
        // line 105
        echo "\t</div>


\t<div class=\"right\">
\t\t<div class=\"btns\">
\t\t\t<button type=\"button\" onclick=\"\$('#inline_save').val('1');\$('#page-edit-form').submit();\" class=\"btn btn-flat\"><i class=\"fa fa-check\"></i> ";
        // line 110
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Toepassen", [], "cms"), "html", null, true);
        echo "</button>
\t\t\t<a class=\"btn\" onclick=\"\$('#page-edit-form').submit();return false;\" href=\"#\"><i class=\"fa fa-save\"></i> ";
        // line 111
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Opslaan en sluiten", [], "cms"), "html", null, true);
        echo "</a>
\t\t</div>
\t</div>
</div>

\t<ul class=\"nav nav-tabs nav-pills content-tabs d-none d-lg-flex\" id=\"myTab\" role=\"tablist\">
\t  <li class=\"nav-item\" role=\"presentation\">
\t    <button class=\"nav-link ";
        // line 118
        echo (((($context["id"] ?? null) > 0)) ? ("active") : (""));
        echo "\" id=\"inhoud-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#inhoud-tab-content\" type=\"button\" role=\"tab\" aria-controls=\"inhoud-tab-content\" aria-selected=\"false\">
\t\t\t\t";
        // line 119
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Inhoud", [], "cms"), "html", null, true);
        echo "
\t\t\t</button>
\t  </li>
\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t<button class=\"nav-link ";
        // line 123
        echo (((($context["id"] ?? null) > 0)) ? ("") : ("active"));
        echo "\" id=\"info-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#info-tab-content\" type=\"button\" role=\"tab\" aria-controls=\"home-tab-content\" aria-selected=\"true\">
\t\t\t\t";
        // line 124
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina informatie", [], "cms"), "html", null, true);
        echo "
\t\t\t</button>
\t\t</li>
\t  <li class=\"nav-item hide-external\" role=\"presentation\">
\t    <button class=\"nav-link\" id=\"metadata-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#metadata-tab-content\" type=\"button\" role=\"tab\" aria-controls=\"metadata-tab-content\" aria-selected=\"false\">
\t\t\t\t";
        // line 129
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Metadata / SEO", [], "cms"), "html", null, true);
        echo "
\t\t\t</button>
\t  </li>
\t  <li class=\"nav-item hide-not-inline\" role=\"presentation\">
\t    <button class=\"nav-link\" id=\"media-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#media-tab-content\" type=\"button\" role=\"tab\" aria-controls=\"media-tab-content\" aria-selected=\"false\">
\t\t\t\t";
        // line 134
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media", [], "cms"), "html", null, true);
        echo "
\t\t\t</button>
\t  </li>
\t  <li class=\"nav-item hide-not-inline\" role=\"presentation\">
\t    <button class=\"nav-link\" id=\"meldingen-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#meldingen-tab-content\" type=\"button\" role=\"tab\" aria-controls=\"meldingen-tab-content\" aria-selected=\"false\">
\t\t\t\t";
        // line 139
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Meldingen", [], "cms"), "html", null, true);
        echo "
\t\t\t</button>
\t  </li>
\t  <li class=\"nav-item\" role=\"presentation\">
\t    <button class=\"nav-link\" id=\"toegang-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#toegang-tab-content\" type=\"button\" role=\"tab\" aria-controls=\"toegang-tab-content\" aria-selected=\"false\">
\t\t\t\t";
        // line 144
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Toegang", [], "cms"), "html", null, true);
        echo "
\t\t\t</button>
\t  </li>

\t\t<li class=\"btns\">
\t\t\t";
        // line 149
        if ((twig_length_filter($this->env, ($context["languages"] ?? null)) > 1)) {
            // line 150
            echo "\t\t\t\t<div class=\"current-flag flag-icon flag-icon-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["language"] ?? null), "locale", [], "any", false, false, false, 150), "html", null, true);
            echo "\"></div>
\t\t\t";
        }
        // line 152
        echo "
\t\t\t";
        // line 156
        echo "\t\t\t<a title=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Alle secties inklappen/uitklappen", [], "cms"), "html", null, true);
        echo "\" id=\"retract_all\"><i class=\"fa fa-bars\"></i></a>
\t\t\t";
        // line 157
        if (twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "slugkey", [], "any", false, false, false, 157)) {
            // line 158
            echo "\t\t\t\t<a id=\"view-live\" title=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina tonen in nieuw tabblad", [], "cms"), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, (($context["host"] ?? null) . $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "slugkey", [], "any", false, false, false, 158))), "html", null, true);
            echo "\" target=\"_blank\"><i class=\"fa fa-external-link-alt\"></i></a>
\t\t\t";
        } else {
            // line 160
            echo "\t\t\t\t<a id=\"view-live\" class=\"disabled\" title=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina tonen in nieuw tabblad", [], "cms"), "html", null, true);
            echo "\" target=\"_blank\"><i class=\"fa fa-external-link-alt\"></i></a>
\t\t\t";
        }
        // line 162
        echo "\t\t</li>
\t</ul>

\t<select class=\"form-select d-lg-none mb-3\" id=\"tab_selector\">
\t\t<option value=\"0\">";
        // line 166
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina informatie", [], "cms"), "html", null, true);
        echo "</option>
\t\t<option value=\"1\" selected>";
        // line 167
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Inhoud", [], "cms"), "html", null, true);
        echo "</option>
\t\t<option value=\"2\">";
        // line 168
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Metadata / SEO", [], "cms"), "html", null, true);
        echo "</option>
\t\t<option value=\"3\">";
        // line 169
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media", [], "cms"), "html", null, true);
        echo "</option>
\t\t<option value=\"4\">";
        // line 170
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Meldingen", [], "cms"), "html", null, true);
        echo "</option>
\t\t<option value=\"5\">";
        // line 171
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Toegang", [], "cms"), "html", null, true);
        echo "</option>
\t</select>

\t<script>
\t\t\$(document).ready(function() {
\t\t\t\$('#tab_selector').on('change', function (e) {
\t\t\t\t\t\$('.content-tabs li button').eq(\$(this).val()).tab('show');
\t\t\t});
\t\t});
\t</script>

\t<form method=\"post\" enctype=\"multipart/form-data\">
\t\t";
        // line 184
        echo "\t\t<input type=\"hidden\" name=\"manual_upload\" value=\"1\" />
\t\t<input type=\"file\" name=\"media[]\" id=\"upload_button\" />
\t\t<button type=\"submit\">";
        // line 186
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uploaden", [], "cms"), "html", null, true);
        echo "</button>
\t</form>

\t<form method=\"post\" id=\"page-edit-form\">
\t    ";
        // line 190
        if (($context["saved"] ?? null)) {
            // line 191
            echo "\t    \t<div class=\"panel padd\">
\t\t    \t<div class=\"saved-bar\">
\t\t    \t\t";
            // line 193
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("De pagina gegevens zijn opgeslagen.", [], "cms"), "html", null, true);
            echo "
\t\t    \t</div>
\t    \t</div>
\t    ";
        }
        // line 197
        echo "
\t    <input type=\"hidden\" id=\"inline_save\" name=\"inline_save\" value=\"0\" />
\t\t    <input type=\"hidden\" id=\"template_save\" name=\"template_save\" value=\"0\" />

    \t";
        // line 201
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors', ["class" => "class"]);
        echo "

    \t";
        // line 203
        if ((twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "getStatic", [], "any", false, false, false, 203) == false)) {
            // line 204
            echo "\t\t\t\t<div class=\"tab-content\">
\t\t\t\t  <div class=\"tab-pane ";
            // line 205
            echo (((($context["id"] ?? null) > 0)) ? ("") : ("show active"));
            echo "\" id=\"info-tab-content\" role=\"tabpanel\" aria-labelledby=\"info-tab\">
\t\t\t\t\t\t\t<div id=\"page\" class=\"t-content\">
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-lg-6\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 211
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina informatie", [], "cms"), "html", null, true);
            echo "</h6>

\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 213
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "label", [], "any", false, false, false, 213), 'row');
            echo "

\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 215
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "page_type", [], "any", false, false, false, 215), 'row');
            echo "

\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"hide-not-external\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 218
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "custom_url", [], "any", false, false, false, 218), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 221
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "target", [], "any", false, false, false, 221), 'row');
            echo "

\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 223
            if ((($context["ParentPage"] ?? null) != null)) {
                // line 224
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-field \">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"form_label\" class=\"required\">";
                // line 225
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bovenliggende pagina", [], "cms"), "html", null, true);
                echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"controls\">
                              <input type=\"text\" class=\"form-control\" readonly=\"readonly\" value=\"";
                // line 227
                echo twig_escape_filter($this->env, ($context["parentpath"] ?? null), "html", null, true);
                echo "\" />
                            </div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 231
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"hide-not-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 233
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "subtitle", [], "any", false, false, false, 233), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 234
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "layout", [], "any", false, false, false, 234), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"hide-not-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 238
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "tpl_inject", [], "any", false, false, false, 238), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-lg-6\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t\t\t\t<h6>Pagina opties</h6>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 248
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "enabled", [], "any", false, false, false, 248), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 249
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "show_in_sitemap", [], "any", false, false, false, 249), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 250
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "visible", [], "any", false, false, false, 250), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 251
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "option_hide_in_submenu", [], "any", false, false, false, 251), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t</p>

\t\t\t\t\t\t\t\t\t\t\t\t<h6>Extra opties</h6>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 256
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "option_title", [], "any", false, false, false, 256), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 257
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "option_subtitle", [], "any", false, false, false, 257), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 258
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "option_subnavigation", [], "any", false, false, false, 258), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 259
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "option_breadcrumbs", [], "any", false, false, false, 259), 'row');
            echo "

\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 261
            if (($context["allowCache"] ?? null)) {
                // line 262
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
                    // line 263
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "cache", [], "any", false, false, false, 263), 'row');
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 264
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "critical", [], "any", false, false, false, 264), 'row');
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 266
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 267
            echo "\t\t\t\t\t\t\t\t\t\t\t\t</p>

\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 269
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "classes", [], "any", false, false, false, 269), 'row');
            echo "

\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 271
            if ((twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "dateEdit", [], "any", false, false, false, 271) || twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "dateAdd", [], "any", false, false, false, 271))) {
                // line 272
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"page-info-header alert alert-info\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<table>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 274
                if (twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "dateAdd", [], "any", false, false, false, 274)) {
                    echo "<tr><td><span style=\"font-weight: bold;\">";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Toegevoegd", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 274), "locale", [], "any", false, false, false, 274));
                    echo ":</span></td><td style=\"padding: 5px;\">";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "dateAdd", [], "any", false, false, false, 274), "d-m-Y H:i:s"), "html", null, true);
                    echo "</td></tr>";
                }
                // line 275
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "dateEdit", [], "any", false, false, false, 275)) {
                    echo "<tr><td><span style=\"font-weight: bold;\">";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Laatst gewijzigd", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 275), "locale", [], "any", false, false, false, 275));
                    echo ":</span></td><td style=\"padding: 5px;\">";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "dateEdit", [], "any", false, false, false, 275), "d-m-Y H:i:s"), "html", null, true);
                    echo "</td></tr>";
                }
                // line 276
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 279
            echo "

\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t  <div class=\"tab-pane ";
            // line 287
            echo (((($context["id"] ?? null) > 0)) ? ("show active") : (""));
            echo "\" id=\"inhoud-tab-content\" role=\"tabpanel\" aria-labelledby=\"inhoud-tab\">
\t\t\t\t\t\t<div id=\"contents\" class=\"hide-not-inline t-content\" style=\"display:none;\">
\t\t\t\t\t\t\t<ul class=\"collapsible-editors\" data-collapsible=\"accordion\">
\t\t\t\t\t\t\t\t";
            // line 290
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["pageContents"] ?? null));
            foreach ($context['_seq'] as $context["name"] => $context["PageContent"]) {
                // line 291
                echo "\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<div class=\"collapsible-header ";
                // line 292
                echo (((twig_length_filter($this->env, ($context["pageContents"] ?? null)) <= 1)) ? ("active") : (""));
                echo "\">";
                echo twig_escape_filter($this->env, (($__internal_compile_0 = ($context["pageSections"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["name"]] ?? null) : null), "html", null, true);
                echo "</div>
\t\t\t\t\t\t\t\t\t<div class=\"collapsible-body content-container editor-content\">
\t\t\t\t\t\t\t\t\t\t";
                // line 294
                if ($context["PageContent"]) {
                    // line 295
                    echo "\t\t\t\t\t\t\t\t\t\t<textarea class=\"pc\" name=\"content[edit][";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["PageContent"], "id", [], "any", false, false, false, 295), "html", null, true);
                    echo "]\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["PageContent"], "content", [], "any", false, false, false, 295), "html", null, true);
                    echo "</textarea>
\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 297
                    echo "\t\t\t\t\t\t\t\t\t\t<textarea class=\"pc\" name=\"content[new][";
                    echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                    echo "]\"></textarea>
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 299
                echo "\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" style=\"display:none;\" checked=\"checked\" id=\"";
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "_enabled\" name=\"enabled[";
                echo twig_escape_filter($this->env, $context["name"], "html", null, true);
                echo "]\" value=\"1\">
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['PageContent'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 303
            echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t<div id=\"blocks\">
\t\t\t\t\t\t\t\t\t";
            // line 308
            $this->loadTemplate("@Cms/page/composer.html.twig", "@Cms/page/edit.html.twig", 308)->display(twig_array_merge($context, ($context["block_sections"] ?? null)));
            // line 309
            echo "\t\t\t\t\t\t\t\t\t<span class=\"btn d-lg-none toggle-blocks\">
\t\t\t\t\t\t\t\t\t  <i class=\"fa fa-plus\"></i> ";
            // line 310
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie toevoegen", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t  <div class=\"tab-pane\" id=\"metadata-tab-content\" role=\"tabpanel\" aria-labelledby=\"metadata-tab\">
\t\t\t\t\t\t\t<div id=\"meta\" class=\"hide-external t-content\">

\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 323
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina specifiek", [], "cms"), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"hide-not-inline\">";
            // line 324
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "title", [], "any", false, false, false, 324), 'row');
            echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 325
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "slug", [], "any", false, false, false, 325), 'row');
            echo "
\t\t\t\t\t\t\t<div class=\"hide-not-inline\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span><i class=\"fas fa-exclamation-triangle\" style=\"color: orange; padding-right: 5px;\"></i>";
            // line 327
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Het URI veld hoeft niet ingevuld te worden. Wanneer dit niet gedaan is, genereerd het systeem een browser vriendelijke URI aan de hand van het 'Weergave titel' veld.", [], "cms"), "html", null, true);
            echo "</span>

\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 329
            $context["seoDescription"] = "";
            // line 330
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 331
            $context["foundMeta"] = false;
            // line 332
            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
            if (($context["pageMetatags"] ?? null)) {
                // line 333
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["foundMeta"] = true;
                // line 334
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["pageMetatags"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["Metatag"]) {
                    // line 335
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-field \">
\t\t\t\t\t                        ";
                    // line 336
                    $context["information"] = "";
                    // line 337
                    echo "\t\t\t\t\t                        ";
                    $context["information_url"] = "";
                    // line 338
                    echo "
\t\t\t\t\t                        ";
                    // line 339
                    if (twig_in_filter("og:type", twig_get_attribute($this->env, $this->source, $context["Metatag"], "key", [], "any", false, false, false, 339))) {
                        // line 340
                        echo "\t\t\t\t\t                            ";
                        $context["information"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wat voor soort pagina is dit? Voorbeelden hiervan zijn: website, article, book en profile. Klik op de link knop hiernaast voor uitleg over alle mogelijkheden.", [], "cms");
                        // line 341
                        echo "\t\t\t\t\t                            ";
                        $context["information_url"] = "https://ogp.me/#types";
                        // line 342
                        echo "\t\t\t\t\t                        ";
                    } elseif (twig_in_filter("og:url", twig_get_attribute($this->env, $this->source, $context["Metatag"], "key", [], "any", false, false, false, 342))) {
                        // line 343
                        echo "\t\t\t\t\t                            ";
                        $context["information"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Dit veld is optioneel voor het opgeven van een eigen url. Dit veld moet inclusief http(s) en domeinnaam zijn, bijvoorbeeld: 'https://www.beyonit.nl/contact'. Als dit veld niet is ingevuld, wordt automatisch de pagina url gebruikt.", [], "cms");
                        // line 344
                        echo "\t\t\t\t\t                        ";
                    }
                    // line 345
                    echo "
\t\t\t\t\t                        <label for=\"form-label\" class=\"required\">";
                    // line 346
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "label", [], "any", false, false, false, 346), "html", null, true);
                    echo "
\t\t\t\t\t                            <span style=\"float: right\">
\t\t\t\t\t                            ";
                    // line 348
                    if (($context["information_url"] ?? null)) {
                        echo "<a href=\"";
                        echo twig_escape_filter($this->env, ($context["information_url"] ?? null), "html", null, true);
                        echo "\"target=\"_blank\"><i style=\"padding: 5px; color:black;\" class=\"fas fa-external-link-alt\" title=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Externe informatie", [], "cms"), "html", null, true);
                        echo "\"></i></a>";
                    }
                    // line 349
                    echo "\t\t\t\t\t                            ";
                    if (($context["information"] ?? null)) {
                        echo "<i style=\"padding: 5px; color:black;\" class=\"fas fa-info\" title=\"";
                        echo ($context["information"] ?? null);
                        echo "\"></i>";
                    }
                    // line 350
                    echo "\t\t\t\t\t                            </span>
\t\t\t\t\t                        </label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 353
                    if ((twig_get_attribute($this->env, $this->source, $context["Metatag"], "key", [], "any", false, false, false, 353) == "description")) {
                        // line 354
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        $context["seoDescription"] = twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 354);
                        // line 355
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<textarea class=\"form-control fld-seo-";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "key", [], "any", false, false, false, 355), "html", null, true);
                        echo "\" placeholder=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "placeholder", [], "any", false, false, false, 355), "html", null, true);
                        echo "\" name=\"metadata[";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "id", [], "any", false, false, false, 355), "html", null, true);
                        echo "]\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 355), "html", null, true);
                        echo "</textarea>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } elseif (twig_in_filter(":description", twig_get_attribute($this->env, $this->source,                     // line 356
$context["Metatag"], "key", [], "any", false, false, false, 356))) {
                        // line 357
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        $context["meta_value"] = twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 357);
                        // line 358
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if ((($context["seoDescription"] ?? null) && twig_test_empty(($context["meta_value"] ?? null)))) {
                            // line 359
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["meta_value"] = ($context["seoDescription"] ?? null);
                            // line 360
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 361
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<textarea class=\"form-control fld-seo-";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "key", [], "any", false, false, false, 361), "html", null, true);
                        echo "\" placeholder=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "placeholder", [], "any", false, false, false, 361), "html", null, true);
                        echo "\" name=\"metadata[";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "id", [], "any", false, false, false, 361), "html", null, true);
                        echo "]\">";
                        echo twig_escape_filter($this->env, ($context["meta_value"] ?? null), "html", null, true);
                        echo "</textarea>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } elseif ((twig_get_attribute($this->env, $this->source,                     // line 362
$context["Metatag"], "valueType", [], "any", false, false, false, 362) == "image")) {
                        // line 363
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 364
                        $context["hasMedia"] =  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 364));
                        // line 365
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a id=\"meta-imageselect-";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "id", [], "any", false, false, false, 365), "html", null, true);
                        echo "\" href=\"#\" onclick=\"mediaField = '";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "id", [], "any", false, false, false, 365), "html", null, true);
                        echo "';addSeoMedia(this);\" style=\"";
                        echo ((($context["hasMedia"] ?? null)) ? ("display:none;") : (""));
                        echo "\" class=\"btn btn-gray\">";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Selecteer een afbeelding", [], "cms"), "html", null, true);
                        echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div style=\"width: 100px;max-height: 100px;text-align:center;margin: 30px;\" class=\"settings-image\" id=\"meta-image-";
                        // line 366
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "id", [], "any", false, false, false, 366), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 367
                        if (($context["hasMedia"] ?? null)) {
                            // line 368
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 368), "html", null, true);
                            echo "\" style=\"max-width: 100%;max-height: 100%;\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button style=\"\" type=\"button\" onclick=\"deleteMetaImage(";
                            // line 369
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "id", [], "any", false, false, false, 369), "html", null, true);
                            echo ");\" class=\"btn red darken-1 del_btn\"><i class=\"far fa-trash-alt\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 371
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input id=\"meta-field-";
                        // line 372
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "id", [], "any", false, false, false, 372), "html", null, true);
                        echo "\" class=\"form-control fld-seo-";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "key", [], "any", false, false, false, 372), "html", null, true);
                        echo "\" type=\"hidden\" placeholder=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "placeholder", [], "any", false, false, false, 372), "html", null, true);
                        echo "\" name=\"metadata[";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "id", [], "any", false, false, false, 372), "html", null, true);
                        echo "]\" value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 372), "html", null, true);
                        echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } elseif ( !twig_test_empty(twig_get_attribute($this->env, $this->source,                     // line 373
$context["Metatag"], "valueOptions", [], "any", false, false, false, 373))) {
                        // line 374
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"metadata[";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "id", [], "any", false, false, false, 374), "html", null, true);
                        echo "]\" class=\"form-select fld-seo-";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "key", [], "any", false, false, false, 374), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"\">- ";
                        // line 375
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("n.v.t.", [], "cms"), "html", null, true);
                        echo " -</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 376
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["Metatag"], "valueOptions", [], "any", false, false, false, 376));
                        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                            // line 377
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option ";
                            echo (((twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 377) == $context["option"])) ? ("selected") : (""));
                            echo " value=\"";
                            echo twig_escape_filter($this->env, $context["option"], "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $context["option"], "html", null, true);
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 379
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 381
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        $context["meta_value"] = twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 381);
                        // line 382
                        echo "\t\t\t\t\t                                                                                                ";
                        if ((twig_test_empty(($context["meta_value"] ?? null)) && twig_in_filter("og:type", twig_get_attribute($this->env, $this->source, $context["Metatag"], "key", [], "any", false, false, false, 382)))) {
                            // line 383
                            echo "\t\t\t\t\t                                                                                                    ";
                            $context["meta_value"] = "website";
                            // line 384
                            echo "\t\t\t\t\t                                                                                                ";
                        }
                        // line 385
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        if ((twig_test_empty(($context["meta_value"] ?? null)) && twig_in_filter(":title", twig_get_attribute($this->env, $this->source, $context["Metatag"], "key", [], "any", false, false, false, 385)))) {
                            // line 386
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["meta_value"] = twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "title", [], "any", false, false, false, 386);
                            // line 387
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 388
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control fld-seo-";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "key", [], "any", false, false, false, 388), "html", null, true);
                        echo "\" type=\"text\" placeholder=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "placeholder", [], "any", false, false, false, 388), "html", null, true);
                        echo "\" name=\"metadata[";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "id", [], "any", false, false, false, 388), "html", null, true);
                        echo "]\" value=\"";
                        echo twig_escape_filter($this->env, ($context["meta_value"] ?? null), "html", null, true);
                        echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 390
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Metatag'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 393
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 394
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 395
            if ((($context["foundMeta"] ?? null) == false)) {
                // line 396
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"center-align\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 397
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Er zijn nog geen metadata geconfigureerd", [], "cms"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 400
            echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 408
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("SEO voorbeeld", [], "cms"), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t\t<div id=\"seo-preview\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"seo-preview-title\"><span class=\"title-part\">";
            // line 410
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "title", [], "any", false, false, false, 410), "html", null, true);
            echo "</span> - ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "label", [], "any", false, false, false, 410), "html", null, true);
            echo "</span>
\t\t\t\t\t\t\t\t<span class=\"seo-preview-url\">";
            // line 411
            echo twig_escape_filter($this->env, (($context["host"] ?? null) . twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "baseUri", [], "any", false, false, false, 411)), "html", null, true);
            echo "<span class=\"slug-part\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "url", [], "any", false, false, false, 411), "html", null, true);
            echo "</span></span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"seo-preview-body\">";
            // line 412
            echo twig_escape_filter($this->env, ($context["seoDescription"] ?? null), "html", null, true);
            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 415
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "robots", [], "any", false, false, false, 415), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t  <div class=\"tab-pane\" id=\"media-tab-content\" role=\"tabpanel\" aria-labelledby=\"media-tab\">
\t\t\t\t\t\t\t<div id=\"images\" class=\"hide-not-inline t-content\">
\t\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t\t<h6>Pagina header-afbeelding</h6>
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 429
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sleep een afbeelding naar het vlak hieronder (of klik er op) om deze als header-achtergrond voor deze pagina in te stellen.", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"page-image settings-image\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"page-image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"delete_image\" name=\"delete[image]\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"link_image\" name=\"link[image]\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzones\" data-name=\"image\" style=\"cursor:pointer;";
            // line 437
            if (twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "hasImage", [], "any", false, false, false, 437)) {
                echo "background-image:url('/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "getImage", [], "any", false, false, false, 437), "getWebPath", [], "any", false, false, false, 437), "html", null, true);
                echo "');";
            }
            echo "\"><div class=\"dropzone-loader\"><span>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uploaden...", [], "cms"), "html", null, true);
            echo "</span></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<button style=\"";
            // line 438
            if (twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "hasImage", [], "any", false, false, false, 438)) {
            } else {
                echo "display:none;";
            }
            echo "\" type=\"button\" id=\"image_del_btn\" onclick=\"deleteAsset('image', this);\" class=\"btn red darken-1 del_btn\"><i class=\"fa fa-trash-alt\" style=\"margin: 0 5px;\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" onclick=\"selectPageImage()\" class=\"btn\"><i class=\"far fa-image\"></i> ";
            // line 439
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Selecteer een afbeelding uit de media bibliotheek", [], "cms"), "html", null, true);
            echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 443
            echo "\t\t\t\t\t\t\t\t\t\t\t";
            // line 444
            echo "\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t  <div class=\"tab-pane\" id=\"meldingen-tab-content\" role=\"tabpanel\" aria-labelledby=\"meldingen-tab\">
\t\t\t\t\t\t\t<div id=\"notify\" class=\"hide-not-inline t-content\" style=\"";
            // line 450
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 450), "username", [], "any", false, false, false, 450) != "admin")) {
                echo "display:none;";
            }
            echo "\">
\t\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 453
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Meldingen", [], "cms"), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t\t";
            // line 454
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "notify_type", [], "any", false, false, false, 454), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t";
            // line 455
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "notify_change", [], "any", false, false, false, 455), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t";
            // line 456
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "notify_create_child", [], "any", false, false, false, 456), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t";
            // line 457
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "notify_change_child", [], "any", false, false, false, 457), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t";
            // line 458
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "notify_email", [], "any", false, false, false, 458), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t";
            // line 459
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "notify_telegram_bot", [], "any", false, false, false, 459), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t";
            // line 460
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "notify_telegram_bot_chat_id", [], "any", false, false, false, 460), 'row');
            echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t  <div class=\"tab-pane\" id=\"toegang-tab-content\" role=\"tabpanel\" aria-labelledby=\"toegang-tab\">
\t\t\t\t\t\t\t<div id=\"access\" class=\"t-content\">
\t\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 469
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Toegang", [], "cms"), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 470
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "access", [], "any", false, false, false, 470), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t";
            // line 471
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "access_roles", [], "any", false, false, false, 471), 'row');
            echo "

\t\t\t\t\t\t\t\t\t\t\t<div style=\"border-top:solid 1px #ccc;margin-top:15px;padding-top:15px;\">
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 474
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "access_free", [], "any", false, false, false, 474), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 475
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "access_alt_home", [], "any", false, false, false, 475), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 476
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "access_allow_login", [], "any", false, false, false, 476), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 477
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "access_visible_menu", [], "any", false, false, false, 477), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 478
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "access_pwd", [], "any", false, false, false, 478), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 479
            if (($context["is_b2b"] ?? null)) {
                // line 480
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "access_b2b", [], "any", false, false, false, 480), 'row');
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 482
            echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<script>
\t\t\t\t\tfunction deleteAsset(asset, el){
\t\t\t\t\t\tcpop.confirm('";
            // line 492
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Weet u zeker dat u deze afbeelding wilt verwijderen?", [], "cms"), "html", null, true);
            echo "', function(){
\t\t\t\t\t\t\t\$('#delete_' + asset).val(1);
\t\t\t\t\t\t\t\$(el).parent().find('.dropzones').css('background-image', '');
\t\t\t\t\t\t\t\$(el).hide();
\t\t\t\t\t\t\tcpop.close();
\t\t\t\t\t\t});
\t\t\t\t\t}
\t\t\t\t</script>
\t    ";
        }
        // line 501
        echo "    </form>

\t";
        // line 503
        $this->loadTemplate("@Cms/page/composer_blocks.html.twig", "@Cms/page/edit.html.twig", 503)->display(twig_array_merge($context, ($context["block_sections"] ?? null)));
        // line 504
        echo "
\t";
        // line 505
        if ((null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 505), "query", [], "any", false, false, false, 505), "get", [0 => "CKEditor"], "method", false, false, false, 505))) {
            // line 506
            echo "\t\t";
            // line 507
            echo "\t\t<script src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/ckeditor/ckeditor.js"), "html", null, true);
            echo "\"></script>
\t";
        }
        // line 509
        echo "
    <script type=\"text/javascript\">

    var cmApplet = null;
    var editor = [];
    var ifrm = null;

    var htmlHeader = '<html><head><link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 516
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" /></head><body>';
    var htmlFooter = '</body></html>';

\t/*\$('.collapsible-editors').collapsible({
\t\tonOpen: function(el) {
\t\t\tselectedEditorIndex = \$(el).index();
\t\t}
\t});*/

    \$('.content-container textarea.pc').each(function(ind, area){
    \tif(ind == 0){
    \t\teditor[ind] = CKEDITOR.replace( area, {
\t\t\t\twidth: \"100%\",
\t\t        height: \"450px\"
\t\t\t} );
    \t}else{
    \t\teditor[ind] = CKEDITOR.replace( area, {
\t\t\t\twidth: \"100%\",
\t\t        height: \"200px\"
\t\t\t} );
    \t}

\t\t// Bundle selection popup
\t\teditor[ind].addCommand(\"bundleSelect\", { // create named command
\t\t\texec: function(edt) {
\t\t\t\tcpop.reset().loadAjax('";
        // line 541
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_link");
        echo "');
\t\t\t}
\t\t});
\t\teditor[ind].ui.addButton('bundleSelect', { // add new button and bind our command
\t\t\tlabel: \"";
        // line 545
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bundle selection", [], "cms"), "html", null, true);
        echo "\",
\t\t\tcommand: 'bundleSelect',
\t\t\ttoolbar: 'document',
\t\t\ticon: '";
        // line 548
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/ck_ext.png"), "html", null, true);
        echo "'
\t\t});
\t\teditor[ind].on('instanceReady',function(){
\t\t\t\$('.cke_button__inlinesave').remove();
\t\t});

    });

\t\$(function(){
\t\t\$( '.tab-bar a:not(.no-tab)' ).click( function( e ){
\t\t\te.preventDefault();
\t\t\t\$( '.tab-bar a,.tab-content' ).removeClass( 'active' );
\t\t\twindow.location.hash = \$( this ).attr( 'id' ).replace( 't-', '' );
\t\t\t\$(window).hashchange();
\t\t} );

\t\t\$('#form_label').blur(function(){
\t\t\tif(\$('#form_title').val() == '' )
\t\t\t\t\$('#form_title').val(\$('#form_label').val());
\t\t});

\t    \$('#page-edit-form').submit(function(event){
\t        if(!this.checkValidity())
\t        {
\t            event.preventDefault();

\t            var form = \$(this);

\t            form.find(':input:visible[required=\"required\"]').each(function(){
\t\t\t\t\t    if(!this.validity.valid)
\t\t\t\t\t    {
\t\t\t\t\t        \$(this).focus();
\t\t\t\t\t        // break
\t\t\t\t\t        return false;
\t\t\t\t\t    }
\t\t\t\t\t});

\t            // Find hidden fields
\t\t\t\tform.find(':input:hidden[required=\"required\"]').each(function(){
\t\t\t\t\t// Check validity
\t\t\t\t\tif(!this.validity.valid){
\t\t\t\t\t\t// Check if they are part of a tab content
\t\t\t\t\t\tif(\$(this).closest('.t-content').length){
\t\t\t\t\t\t\tvar ct = \$(this).closest('.t-content');
\t\t\t\t\t\t\tvar tab_id = ct.prop('id');
\t\t\t\t\t\t\t// Trigger linked tab
\t\t\t\t\t\t\t// \$('#page-edit-tabs').tabs('select_tab', tab_id);
\t\t\t\t\t\t\t\$('.nav-tabs a[href=\"#' + tab_id + '\"]').tab('show');
\t\t\t\t\t\t\tsetTimeout(function(){
\t\t\t\t\t\t\t\t// Set focus on empty required field
\t\t\t\t\t\t\t\t\$(this).focus();
\t\t\t\t\t\t\t}.bind(this), 200);
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t});
\t        }else{
\t        \t\$('.page-save-overlay').show();
\t        \treturn true;
\t        }
\t    });
\t} );
    </script>

\t<script type=\"text/javascript\">
\t\t\$().ready(function(){
\t\t\t\$(\".tag-selector\").select2({ tags: true })
\t\t});
\t</script>

\t<script type=\"text/javascript\" src=\"";
        // line 617
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/js/jquery.filedrop.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\">
\t\tvar totalUploadSize = 0;
\t\tvar fileDrop = [];
\t\tvar activeZone = \$('.dropzones');

\t    var allowedDocTypes = ['application/csv', 'application/doc', 'application/excel', 'application/ms-doc', 'application/mspowerpoint', 'application/msword', 'application/octet-stream', 'application/pdf', 'application/powerpoint', 'application/rtf', 'application/vnd.apple.keynote', 'application/vnd.apple.numbers', 'application/vnd.apple.pages', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/x-excel', 'application/x-iwork-keynote-sffkey', 'application/x-iwork-numbers-sffnumbers', 'application/x-msexcel', 'application/x-mspowerpoint', 'application/x-rar-compressed', 'application/zip', 'audio/basic', 'audio/mpeg', 'audio/ogg', 'audio/vnd.rn-realaudio', 'audio/vorbis', 'audio/wav', 'audio/x-midi', 'audio/x-pn-realaudio', 'audio/x-wav', 'text/asp', 'text/css', 'text/csv', 'text/html', 'text/pascal', 'text/php', 'text/plain', 'text/richtext', 'text/sgml', 'text/uri-list', 'text/webviewhtml', 'text/x-asm', 'text/x-c', 'text/x-java-source', 'text/x-pascal', 'text/x-script.csh', 'text/x-script.elisp', 'text/x-script.perl', 'text/x-script.perl-module', 'text/x-script.phyton', 'text/x-script.sh', 'text/x-server-parsed-html', 'text/x-setext', 'text/x-sgml', 'text/x-uuencode', 'video/avi', 'video/mp4', 'video/mpeg', 'video/msvideo', 'video/quicktime', 'video/x-msvideo'];
\t    var allowedMediaTypes = ['image/bmp', 'image/gif', 'image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff'];

\t    var allowedTypes = \$.merge( \$.merge([], allowedMediaTypes), allowedDocTypes)

\t\t\$().ready(function(){
\t\t\t\$('.dropzones').each(function(ind, dropzone){
\t\t\t\tvar fd = \$(dropzone).filedrop({
\t\t\t\t    fallback_id: 'upload_button',   // an identifier of a standard file input element, becomes the target of \"click\" events on the dropzone
\t\t\t\t    url: '";
        // line 632
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_edit", ["id" => twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "id", [], "any", false, false, false, 632)]), "html", null, true);
        echo "',              // upload handler, handles each file separately, can also be a function taking the file and returning a url
\t\t\t\t    paramname: \$(dropzone).data('name'),          // POST parameter name used on serverside to reference file, can also be a function taking the filename and returning the paramname
\t\t\t\t    withCredentials: true,          // make a cross-origin request with cookies
\t\t\t\t    data: {
\t\t\t\t    },
\t\t\t\t    error: function(err, file) {
\t\t\t\t        switch(err) {
\t\t\t\t            case 'BrowserNotSupported':
\t\t\t\t            \t\$('#upload-overlay').hide();
\t\t\t\t                alert('";
        // line 641
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("browser does not support HTML5 drag and drop", [], "cms"), "html", null, true);
        echo "')
\t\t\t\t                break;
\t\t\t\t            case 'TooManyFiles':
\t\t\t\t            \t\$('#upload-overlay').hide();
\t\t\t\t                // user uploaded more than 'maxfiles'
\t\t\t\t                break;
\t\t\t\t            case 'FileTooLarge':
\t\t\t\t            \t\$('#upload-overlay').hide();
\t\t\t\t            \tcpop.loadHtml(\"";
        // line 649
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestand is te groot. Maximaal toegestaan: %maxFileSize% MB", ["%maxFileSize%" => ($context["maxFileSize"] ?? null)], "cms");
        echo "\");
\t\t\t\t                // program encountered a file whose size is greater than 'maxfilesize'
\t\t\t\t                // FileTooLarge also has access to the file which was too large
\t\t\t\t                // use file.name to reference the filename of the culprit file
\t\t\t\t                break;
\t\t\t\t            case 'FileTypeNotAllowed':
\t\t\t\t            \t\$('#upload-overlay').hide();
\t\t\t\t\t            cpop.loadHtml(\"";
        // line 656
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestandstype", [], "cms"), "html", null, true);
        echo "\" + '\\'' + file.type + '\\'' + \"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("is niet toegestaan.<br/><br/><strong>Toegestane bestanden:", [], "cms"), "html", null, true);
        echo "\" + '</strong><ul><li>' + allowedTypes.join('</li><li>') + '</li></ul>');
\t\t\t\t                // The file type is not in the specified list 'allowedfiletypes'
\t\t\t\t                break;
\t\t\t\t            case 'FileExtensionNotAllowed':
\t\t\t\t            \t\$('#upload-overlay').hide();
\t\t\t\t                // The file extension is not in the specified list 'allowedfileextensions'
\t\t\t\t                break;
\t\t\t\t            default:
\t\t\t\t                break;
\t\t\t\t        }
\t\t\t\t    },
\t\t\t\t    allowedfiletypes: allowedTypes,
\t\t\t\t    allowedfileextensions: [], // file extensions allowed. Empty array means no restrictions
\t\t\t\t    maxfiles: 10,
\t\t\t\t    maxfilesize: ";
        // line 670
        echo twig_escape_filter($this->env, ($context["maxFileSize"] ?? null), "html", null, true);
        echo ",    // max file size in MBs
\t\t\t\t    drop: function(x,y,z) {
\t\t\t\t        \$('#upload-overlay').show();
\t\t\t\t        \$('#upload-overlay .progress-bar').css('width', '0%');
\t\t\t\t    },
\t\t\t\t    globalProgressUpdated: function(progress) {
\t\t\t\t        \$('#upload-overlay .progress-bar').css('width', progress + '%');
\t\t\t\t    },
\t\t\t\t    dragOver: function() {
\t\t\t\t    \tactiveZone = \$(this);
\t\t\t\t        \$(this).addClass('hover');
\t\t\t\t    },
\t\t\t\t    dragLeave: function() {
\t\t\t\t    \tactiveZone = null;
\t\t\t\t        \$(this).removeClass('hover');
\t\t\t\t    },
\t\t\t\t    uploadStarted: function(i, file, len){
\t\t\t\t        \$('#upload-overlay').show();
\t\t\t\t        // console.info('Start upload.');
\t\t\t\t        // \$(\$('.file-upload-preview').get(i)).find('i.fa').attr('class', 'fa fa-fw fa-upload');
\t\t\t\t        console.log( activeZone );
\t\t\t\t        // activeZone.find('.dropzone-loader').show();

\t\t\t\t    },
\t\t\t\t    uploadFinished: function(i, file, response, time) {
\t\t\t\t    \t\$('div[data-name=\"' + response.type + '\"]').html('').css('background-image', 'url(' + response.image + ')');
\t\t\t\t    \tactiveZone.removeClass('hover');
\t\t\t\t    \t\$('#delete_' + response.type).val('');
\t\t\t\t    \t\$('#link_' + response.type).val(response.id);
\t\t\t\t    \t\$('#' + response.type + '_del_btn').show();
\t\t\t\t    \t// activeZone.find('.dropzone-loader').hide();
\t\t\t\t    },
\t\t\t\t    beforeSend: function(file, i, done) {
\t\t\t\t        done(); // Start upload
\t\t\t\t        \$(this).removeClass('hover');
\t\t\t\t        \$(this).addClass('running');
\t\t\t\t    },
\t\t\t\t    afterAll: function() {
\t\t\t\t        \$(this).removeClass('hover');
\t\t\t\t        \$(this).removeClass('running');
\t\t\t\t        // activeZone.find('.dropzone-loader').hide();
\t\t\t\t        \$('#upload-overlay').hide();
\t\t\t\t        \$('#upload-overlay .progress-bar').css('width', '0%');
\t\t\t\t    }
\t\t\t\t});
\t\t\t\tfileDrop.push(fd);
\t\t\t});
\t\t});
\t</script>

\t<script type=\"text/javascript\">
\t\$().ready(function(){
\t\t\$('textarea').trigger('autoresize');
\t});
\t/*\$('.languages img').click(function(){
\t\t\$('.languages img').css('opacity', 0.3);
\t\t\$(this).css('opacity', 1);
\t\t\$('.lang-content').hide();
\t\t\$('#lc-' + \$(this).data('locale')).show();
\t});*/

\t";
        // line 731
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "pageType", [], "any", false, false, false, 731))) {
            // line 732
            echo "\t\t\$('.hide-not-inline').hide();
\t";
        }
        // line 734
        echo "
\t";
        // line 735
        if ((twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "pageType", [], "any", false, false, false, 735) != "external")) {
            // line 736
            echo "\t\t\$('.hide-not-external').hide();
\t";
        }
        // line 738
        echo "
\t\$('#form_page_type').change(function(){
\t\tif(this.value == ''){
\t\t\t\$('.hide-not-inline').show();
\t\t\t\$('.hide-not-external').hide();
\t\t\t\$('.hide-external').show();
\t\t}else if(this.value == 'external'){
\t\t\t\$('.hide-not-inline').hide();
\t\t\t\$('.hide-not-external').show();
\t\t\t\$('.hide-external').hide();
\t\t}else if(this.value == 'child'){
\t\t\t\$('.hide-not-inline').hide();
\t\t\t\$('.hide-not-external').hide();
\t\t\t\$('.hide-external').show();
\t\t}

\t\t\$('.tabs').tabs();
\t});

\tvar linkMedia = false;
\tvar seoMedia = false;
\tvar callerEl = null;
\tfunction addSeoMedia(el){
\t\tcallerEl = \$(el);
\t\tseoMedia = true;
\t\tcpop.large().loadAjax('";
        // line 763
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media", ["parentid" => ($context["pageMediaDirId"] ?? null), "type" => "image", "inline" => 1, "composer" => 1]), "html", null, true);
        echo "');
\t\treturn false;
\t}
\tfunction selectPageImage(){
\t\tlinkMedia = true;
\t\tcpop.large().loadAjax('";
        // line 768
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media", ["parentid" => ($context["pageMediaDirId"] ?? null), "type" => "image", "inline" => 1, "composer" => 1]), "html", null, true);
        echo "');
\t\treturn false;
\t}
\tfunction deleteMetaImage(id){
\t\t\$('#meta-field-' + id).val('');
\t\t\$('#meta-image-' + id).html('');
\t\t\$('#meta-imageselect-' + id).show();
\t}

\t</script>

\t<script>
\t\t\$('body').addClass('folded'); // Compensate sidebar width because of additional sidebars
\t</script>
";
    }

    public function getTemplateName()
    {
        return "@Cms/page/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1428 => 768,  1420 => 763,  1393 => 738,  1389 => 736,  1387 => 735,  1384 => 734,  1380 => 732,  1378 => 731,  1314 => 670,  1295 => 656,  1285 => 649,  1274 => 641,  1262 => 632,  1244 => 617,  1172 => 548,  1166 => 545,  1159 => 541,  1131 => 516,  1122 => 509,  1116 => 507,  1114 => 506,  1112 => 505,  1109 => 504,  1107 => 503,  1103 => 501,  1091 => 492,  1079 => 482,  1073 => 480,  1071 => 479,  1067 => 478,  1063 => 477,  1059 => 476,  1055 => 475,  1051 => 474,  1045 => 471,  1041 => 470,  1037 => 469,  1025 => 460,  1021 => 459,  1017 => 458,  1013 => 457,  1009 => 456,  1005 => 455,  1001 => 454,  997 => 453,  989 => 450,  981 => 444,  979 => 443,  973 => 439,  966 => 438,  956 => 437,  945 => 429,  928 => 415,  922 => 412,  916 => 411,  910 => 410,  905 => 408,  895 => 400,  889 => 397,  886 => 396,  884 => 395,  881 => 394,  878 => 393,  870 => 390,  858 => 388,  855 => 387,  852 => 386,  849 => 385,  846 => 384,  843 => 383,  840 => 382,  837 => 381,  833 => 379,  820 => 377,  816 => 376,  812 => 375,  805 => 374,  803 => 373,  791 => 372,  788 => 371,  783 => 369,  778 => 368,  776 => 367,  772 => 366,  761 => 365,  759 => 364,  756 => 363,  754 => 362,  743 => 361,  740 => 360,  737 => 359,  734 => 358,  731 => 357,  729 => 356,  718 => 355,  715 => 354,  713 => 353,  708 => 350,  701 => 349,  693 => 348,  688 => 346,  685 => 345,  682 => 344,  679 => 343,  676 => 342,  673 => 341,  670 => 340,  668 => 339,  665 => 338,  662 => 337,  660 => 336,  657 => 335,  652 => 334,  649 => 333,  646 => 332,  644 => 331,  641 => 330,  639 => 329,  634 => 327,  629 => 325,  625 => 324,  621 => 323,  605 => 310,  602 => 309,  600 => 308,  593 => 303,  580 => 299,  574 => 297,  566 => 295,  564 => 294,  557 => 292,  554 => 291,  550 => 290,  544 => 287,  534 => 279,  529 => 276,  520 => 275,  512 => 274,  508 => 272,  506 => 271,  501 => 269,  497 => 267,  494 => 266,  489 => 264,  484 => 263,  481 => 262,  479 => 261,  474 => 259,  470 => 258,  466 => 257,  462 => 256,  454 => 251,  450 => 250,  446 => 249,  442 => 248,  429 => 238,  422 => 234,  418 => 233,  414 => 231,  407 => 227,  402 => 225,  399 => 224,  397 => 223,  392 => 221,  386 => 218,  380 => 215,  375 => 213,  370 => 211,  361 => 205,  358 => 204,  356 => 203,  351 => 201,  345 => 197,  338 => 193,  334 => 191,  332 => 190,  325 => 186,  321 => 184,  306 => 171,  302 => 170,  298 => 169,  294 => 168,  290 => 167,  286 => 166,  280 => 162,  274 => 160,  266 => 158,  264 => 157,  259 => 156,  256 => 152,  250 => 150,  248 => 149,  240 => 144,  232 => 139,  224 => 134,  216 => 129,  208 => 124,  204 => 123,  197 => 119,  193 => 118,  183 => 111,  179 => 110,  172 => 105,  169 => 103,  159 => 95,  149 => 88,  145 => 87,  87 => 31,  83 => 30,  74 => 28,  66 => 24,  60 => 22,  57 => 21,  53 => 20,  48 => 2,  46 => 14,  44 => 4,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/page/edit.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/page/edit.html.twig");
    }
}
