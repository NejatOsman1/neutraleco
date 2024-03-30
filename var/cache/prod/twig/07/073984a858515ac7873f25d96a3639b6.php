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

/* @TrinityNeutral/front/projects/add-project.html.twig */
class __TwigTemplate_45e1fc5520ea59049e7e6a3f5b2a0af4 extends Template
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
<script>
\t";
        // line 4
        if (twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 4))) {
            // line 5
            echo "\t\tvar upload_url = '";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("trinity_mod_neutral_upload");
            echo "';
\t";
        } else {
            // line 7
            echo "\t\tvar upload_url = '";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("trinity_mod_neutral_upload", ["projectId" => twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 7)]), "html", null, true);
            echo "';
\t";
        }
        // line 9
        echo "\tvar entity_id = '";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 9), "html", null, true);
        echo "';
\tvar maxFileSize = ";
        // line 10
        echo twig_escape_filter($this->env, ($context["maxFileSize"] ?? null), "html", null, true);
        echo ";
\tvar maxMediaFileSize = ";
        // line 11
        echo twig_escape_filter($this->env, ($context["maxMediaFileSize"] ?? null), "html", null, true);
        echo ";
\tvar msg_idle = '";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Upload afbeelding", [], "cms"), "html", null, true);
        echo "';
\tvar msg_hover = '";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Laat los om toe te voegen.", [], "cms"), "html", null, true);
        echo "';
\tvar msg_uploading = '";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bezig met uploaden...", [], "cms"), "html", null, true);
        echo "';
\tvar msg_done_idle = '";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uploaden voltooid!", [], "cms"), "html", null, true);
        echo "';
\tvar lbl_delete = '";
        // line 16
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms"), "html", null, true);
        echo "';
\tvar lbl_confirm = '";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Weer je zeker dat je deze afbeelding wilt verwijderen?", [], "cms"), "html", null, true);
        echo "';
\tvar err_maxfiles = '";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Je mag maximaal %maxfiles% bestanden tegelijk uploaden", [], "cms"), "html", null, true);
        echo "';
\tvar err_filesize = '";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestand is te groot. Maximaal toegestaan: %maxMediaFileSize% KB", [], "cms"), "html", null, true);
        echo "';
\tvar err_fileext = '";
        // line 20
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Een of meerdere bestanden hebben een ongeldige extensie.", [], "cms"), "html", null, true);
        echo "';
\tvar file_type = '";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestandstype", [], "cms"), "html", null, true);
        echo "';
\tvar text1 =  '";
        // line 22
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("is niet toegestaan.\\n\\nToegestane bestanden:", [], "cms");
        echo "';
</script>
<style>
\t.download{ display:block; }
\t#preview-certificate_file .media-preview-wrap:before{
\t\tfont-size: 75px;
\t\ttop: 25%;
\t\tposition: relative;
\t}
\t.upload-multiple-image{
\t\tdisplay: inline-flex !important;
\t\tmin-height: 0px;
\t\theight: 155px;
\t\twidth: 155px;
\t\tmargin: 0 10px 50px 0;
\t\tvertical-align: top;
\t\tposition:relative;
\t}
\t.upload-multiple-image a.delete {
\t\tfont-size: 0;
\t\tposition: absolute;
\t\ttop: 50%;
\t\tleft: 50%;
\t\ttransform: translateY(-50%);
\t\tz-index: 9;
\t\ttext-align: center;
\t}
\t.upload-multiple-image a.delete i {
\t\tfont-size: 16px;
\t\tcolor: #fff;
\t\tbackground: #f61938;
\t\twidth: 40px;
\t\theight: 40px;
\t\tline-height: 40px;
\t\tborder-radius: 100%;
\t\tmargin: 0;
\t}
\t.upload-multiple-image a.delete:hover i {
\t\tbackground: #000;
\t\tcolor: #fff;
\t}
\t
\t.upload-multiple-image a.edit {
\t\tleft: -20px;
\t\tposition: relative;
\t}
\t
\t.upload-multiple-image a.download{
\t\tposition: absolute;
\t\tbottom: -32px;
\t\tleft: 0px;
\t}
</style>

<section class=\"webshop-frontend-profile\">
  <div class=\"container\">
    <div class=\"row\">
\t\t\t<div class=\"col-12\">
\t\t\t\t<section class=\"login-register\">
\t\t\t\t\t<div class=\"container\">
\t\t\t\t\t\t<div class=\"add-project\">
\t\t\t\t\t\t\t";
        // line 83
        if (twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 83)) {
            // line 84
            echo "\t\t\t\t\t\t\t\t";
            $this->env->getRuntime("Symfony\\Component\\Form\\FormRenderer")->setTheme(($context["form"] ?? null), [0 => "@Cms/form.html.twig"], true);
            // line 85
            echo "
\t\t\t\t\t\t\t\t";
            // line 86
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
            echo "

\t\t\t\t\t\t\t\t";
            // line 88
            if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 88), "valid", [], "any", false, false, false, 88)) {
                // line 89
                echo "\t\t\t\t\t\t\t\t\t";
                echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
                echo "
\t\t\t\t\t\t\t\t";
            }
            // line 91
            echo "
\t\t\t\t\t\t\t\t";
            // line 92
            $context["displayBlocks"] = "display:block;";
            // line 93
            echo "\t\t\t\t\t\t\t\t";
            if ( !array_key_exists("isBackend", $context)) {
                // line 94
                echo "\t\t\t\t\t\t\t\t\t";
                $context["displayBlocks"] = "display:none;";
                // line 95
                echo "\t\t\t\t\t\t\t\t";
            }
            // line 96
            echo "
\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"action\" value=\"project\" />
\t\t\t\t\t\t\t\t<div style=\"display:none;\">
\t\t\t\t\t\t\t\t\t<input type=\"file\" name=\"file[]\" id=\"upload_button_certificate_file\" multiple=\"\" value=\"";
            // line 99
            if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 99)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "certificatefile", [], "any", false, false, false, 99)))) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "certificatefile", [], "any", false, false, false, 99), "id", [], "any", false, false, false, 99), "html", null, true);
            }
            echo "\" />
\t\t\t\t\t\t\t\t\t<input type=\"file\" name=\"file[]\" id=\"upload_button_logo\" multiple=\"\" />
\t\t\t\t\t\t\t\t\t<input type=\"file\" name=\"file[]\" id=\"upload_button_header\" multiple=\"\" />
\t\t\t\t\t\t\t\t\t<input type=\"file\" name=\"file[]\" id=\"upload_button_fotosummary\" multiple=\"\" />
\t\t\t\t\t\t\t\t\t<input type=\"file\" name=\"file[]\" id=\"upload_button_fotocontactus\" multiple=\"\" />
\t\t\t\t\t\t\t\t\t<input type=\"file\" name=\"file[]\" id=\"upload_button_fotoaboutus\" multiple=\"\" />
\t\t\t\t\t\t\t\t\t<input type=\"file\" name=\"file[]\" id=\"upload_button_gallery-1\" multiple=\"\" />
\t\t\t\t\t\t\t\t\t<input type=\"file\" name=\"file[]\" id=\"upload_button_gallery-2\" multiple=\"\" />
\t\t\t\t\t\t\t\t\t<input type=\"file\" name=\"file[]\" id=\"upload_button_gallery-3\" multiple=\"\" />
\t\t\t\t\t\t\t\t\t<input type=\"file\" name=\"file[]\" id=\"upload_button_gallery-4\" multiple=\"\" />
\t\t\t\t\t\t\t\t\t<input type=\"file\" name=\"file[]\" id=\"upload_button_gallery-5\" multiple=\"\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"card step-one\">
\t\t\t\t\t\t\t\t\t<div class=\"card-body project-card\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 114
            if (twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 114))) {
                // line 115
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<h3>";
                echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Project aanmelden", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 115), "locale", [], "any", false, false, false, 115));
                echo "</h3>
\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 117
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "status", [], "any", false, false, false, 117), [0 => 5, 1 => 6])) {
                    // line 118
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<h3>";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Project bekijken", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 118), "locale", [], "any", false, false, false, 118));
                    echo "</h3>
\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 120
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<h3>";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Project wijzigen", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 120), "locale", [], "any", false, false, false, 120));
                    echo "</h3>
\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 122
                echo "\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 123
            echo "\t\t\t\t\t\t\t\t\t\t\t<small>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Vul hieronder de vereiste projectgegevens in", [], "webshop", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 123), "locale", [], "any", false, false, false, 123)), "html", null, true);
            echo "</small>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
            // line 125
            if ( !array_key_exists("isBackend", $context)) {
                // line 126
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"progressbar\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress\" style=\"width: 20%;\"></div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 130
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 131
            if ((array_key_exists("isBackend", $context) && ($context["isBackend"] ?? null))) {
                // line 132
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 137
            echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 139
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "name", [], "any", false, false, false, 139), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 144
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sub_title", [], "any", false, false, false, 144), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 149
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "type", [], "any", false, false, false, 149), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 154
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "type_different", [], "any", false, false, false, 154), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 159
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "summary", [], "any", false, false, false, 159), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 164
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "description", [], "any", false, false, false, 164), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
            // line 168
            if ( !array_key_exists("isBackend", $context)) {
                // line 169
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"card-footer\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"cancel btn btn-gray float-left\"><i class=\"fa fa-arrow-left\"></i> ";
                // line 172
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Annuleren", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 172), "locale", [], "any", false, false, false, 172)), "html", null, true);
                echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"next btn btn-gradient float-right\">";
                // line 173
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Volgende", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 173), "locale", [], "any", false, false, false, 173)), "html", null, true);
                echo " <i class=\"fa fa-arrow-right\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 178
            echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div style=\"";
            // line 181
            echo twig_escape_filter($this->env, ($context["displayBlocks"] ?? null), "html", null, true);
            echo "\" class=\"card step-two\">
\t\t\t\t\t\t\t\t";
            // line 183
            echo "\t\t\t\t\t\t\t\t\t<div class=\"card-body project-card\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 185
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Project informatie", [], "webshop", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 185), "locale", [], "any", false, false, false, 185)), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t<small>";
            // line 186
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Vul hieronder de vereiste projectgegevens in", [], "webshop", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 186), "locale", [], "any", false, false, false, 186)), "html", null, true);
            echo "</small>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
            // line 188
            if ( !array_key_exists("isBackend", $context)) {
                // line 189
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"progressbar\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress\" style=\"width: 40%;\"></div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 193
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<b>";
            // line 196
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Certificering", [], "webshop", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 196), "locale", [], "any", false, false, false, 196)), "html", null, true);
            echo "</b>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 197
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "certificate", [], "any", false, false, false, 197), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<b>";
            // line 204
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Labels", [], "webshop", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 204), "locale", [], "any", false, false, false, 204)), "html", null, true);
            echo "</b>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 205
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "labels", [], "any", false, false, false, 205), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 212
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "date_start", [], "any", false, false, false, 212), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 219
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "date_end", [], "any", false, false, false, 219), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 226
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "location", [], "any", false, false, false, 226), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 233
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "qty_co2_credits", [], "any", false, false, false, 233), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 240
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "price_per_credit", [], "any", false, false, false, 240), 'row');
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-wrapper\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 247
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "status", [], "any", false, false, false, 247), [0 => 1, 1 => 2, 2 => 3, 3 => 4])) {
                // line 248
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-box\" id=\"dropzone-certificate_file\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-upload\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-msg\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"dropzone-btn\" type=\"button\">";
                // line 251
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Upload", [], "cms"), "html", null, true);
                echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"preview-container\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div id=\"preview-certificate_file\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 254
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 254)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "certificatefile", [], "any", false, false, false, 254)))) {
                    // line 255
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context["classname"] = "";
                    // line 256
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context["ext"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "certificatefile", [], "any", false, false, false, 256), "extension", [], "any", false, false, false, 256);
                    // line 257
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ((($context["ext"] ?? null) == "pdf")) {
                        $context["classname"] = "fas fa-file-pdf";
                    }
                    // line 258
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ((($context["ext"] ?? null) == "zip")) {
                        $context["classname"] = "fas fa-file-archive";
                    }
                    // line 259
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (((($context["ext"] ?? null) == "ppt") || (($context["ext"] ?? null) == "pptx"))) {
                        $context["classname"] = "fas fa-file-powerpoint";
                    }
                    // line 260
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ((($context["ext"] ?? null) == "docx")) {
                        $context["classname"] = "fas fa-file-word";
                    }
                    // line 261
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ((($context["ext"] ?? null) == "xlsx")) {
                        $context["classname"] = "fas fa-file-excel";
                    }
                    // line 262
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"item preview-element\" data-mediaid=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "certificatefile", [], "any", false, false, false, 262), "id", [], "any", false, false, false, 262), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-preview-wrap ";
                    // line 263
                    echo twig_escape_filter($this->env, ($context["classname"] ?? null), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 264
                    if (twig_test_empty(($context["classname"] ?? null))) {
                        // line 265
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"media-preview\" src=\"/uploads/images/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "certificatefile", [], "any", false, false, false, 265), "path", [], "any", false, false, false, 265), "html", null, true);
                        echo "\" alt=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 267
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-preview-buttons\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"edit\"><i class=\"fa fa-edit\"></i> ";
                    // line 269
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wijzigen", [], "cms"), "html", null, true);
                    echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 273
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"images-certificate_file\" name=\"imageslist[certificate_file]\" value=\"";
                // line 276
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 276)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "certificatefile", [], "any", false, false, false, 276)))) {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "certificatefile", [], "any", false, false, false, 276), "id", [], "any", false, false, false, 276), "html", null, true);
                }
                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 278
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 278)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "certificatefile", [], "any", false, false, false, 278)))) {
                    // line 279
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context["classname"] = "";
                    // line 280
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context["ext"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "certificatefile", [], "any", false, false, false, 280), "extension", [], "any", false, false, false, 280);
                    // line 281
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ((($context["ext"] ?? null) == "pdf")) {
                        $context["classname"] = "fas fa-file-pdf";
                    }
                    // line 282
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ((($context["ext"] ?? null) == "zip")) {
                        $context["classname"] = "fas fa-file-archive";
                    }
                    // line 283
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (((($context["ext"] ?? null) == "ppt") || (($context["ext"] ?? null) == "pptx"))) {
                        $context["classname"] = "fas fa-file-powerpoint";
                    }
                    // line 284
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ((($context["ext"] ?? null) == "docx")) {
                        $context["classname"] = "fas fa-file-word";
                    }
                    // line 285
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ((($context["ext"] ?? null) == "xlsx")) {
                        $context["classname"] = "fas fa-file-excel";
                    }
                    // line 286
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-multiple-image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-preview-wrap ";
                    // line 287
                    echo twig_escape_filter($this->env, ($context["classname"] ?? null), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"media-preview\" src=\"/uploads/images/";
                    // line 288
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "certificatefile", [], "any", false, false, false, 288), "path", [], "any", false, false, false, 288), "html", null, true);
                    echo "\" alt=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 292
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Geen certificaat beschikbaar.", [], "cms"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 294
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 295
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 295)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "certificatefile", [], "any", false, false, false, 295)))) {
                // line 296
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"download\" target=\"_blank\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_neutral_project_file_download", ["fileid" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "certificatefile", [], "any", false, false, false, 296), "id", [], "any", false, false, false, 296)]), "html", null, true);
                echo "\"><i class=\"fa fa-download\"></i> ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Download", [], "cms"), "html", null, true);
                echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 298
            echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-content\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 301
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Upload certificaat", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 301), "locale", [], "any", false, false, false, 301)), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
            // line 305
            if ( !array_key_exists("isBackend", $context)) {
                // line 306
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"card-footer\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"previous btn btn-gray float-left\"><i class=\"fa fa-arrow-left\"></i>";
                // line 309
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Vorige", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 309), "locale", [], "any", false, false, false, 309)), "html", null, true);
                echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"next btn btn-gradient float-right\">";
                // line 310
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Volgende", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 310), "locale", [], "any", false, false, false, 310)), "html", null, true);
                echo " <i class=\"fa fa-arrow-right\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 315
            echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div style=\"";
            // line 318
            echo twig_escape_filter($this->env, ($context["displayBlocks"] ?? null), "html", null, true);
            echo "\" class=\"card step-three\">
\t\t\t\t\t\t\t\t";
            // line 320
            echo "\t\t\t\t\t\t\t\t\t<div class=\"card-body project-card\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 322
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Project afbeeldingen", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 322), "locale", [], "any", false, false, false, 322)), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t<small>";
            // line 323
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Upload hieronder afbeeldingen van het project. Dit kan ook later indien de afbeeldingen nog niet beschikbaar zijn.", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 323), "locale", [], "any", false, false, false, 323)), "html", null, true);
            echo "</small>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
            // line 325
            if ( !array_key_exists("isBackend", $context)) {
                // line 326
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"progressbar\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress\" style=\"width: 60%;\"></div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 330
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-wrapper\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 333
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "status", [], "any", false, false, false, 333), [0 => 1, 1 => 2, 2 => 3, 3 => 4])) {
                // line 334
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-box\" id=\"dropzone-logo\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-upload\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-msg\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"dropzone-btn\" type=\"button\">";
                // line 337
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Upload", [], "cms"), "html", null, true);
                echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"preview-container\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div id=\"preview-logo\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 340
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 340)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "logo", [], "any", false, false, false, 340)))) {
                    // line 341
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"item preview-element\" data-mediaid=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "logo", [], "any", false, false, false, 341), "id", [], "any", false, false, false, 341), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-preview-wrap\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"media-preview\" src=\"/uploads/images/";
                    // line 343
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "logo", [], "any", false, false, false, 343), "path", [], "any", false, false, false, 343), "html", null, true);
                    echo "\" alt=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-preview-buttons\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a><i class=\"fa fa-edit\"></i> ";
                    // line 346
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wijzigen", [], "cms"), "html", null, true);
                    echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 350
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"images-logo\" name=\"imageslist[logo]\" value=\"";
                // line 353
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 353)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "logo", [], "any", false, false, false, 353)))) {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "logo", [], "any", false, false, false, 353), "id", [], "any", false, false, false, 353), "html", null, true);
                }
                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 355
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 355)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "logo", [], "any", false, false, false, 355)))) {
                    // line 356
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-multiple-image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-preview-wrap\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"media-preview\" src=\"/uploads/images/";
                    // line 358
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "logo", [], "any", false, false, false, 358), "path", [], "any", false, false, false, 358), "html", null, true);
                    echo "\" alt=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 362
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Geen foto beschikbaar.", [], "cms"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 364
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 365
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 365)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "logo", [], "any", false, false, false, 365)))) {
                // line 366
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"download\" target=\"_blank\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_neutral_project_file_download", ["fileid" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "logo", [], "any", false, false, false, 366), "id", [], "any", false, false, false, 366)]), "html", null, true);
                echo "\"><i class=\"fa fa-download\"></i> ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Download", [], "cms"), "html", null, true);
                echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 368
            echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-content\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 370
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Projectlogo", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 370), "locale", [], "any", false, false, false, 370)), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 372
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("De aangeraden minimale afmeting voor deze afbeelding bedraagt", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 372), "locale", [], "any", false, false, false, 372)), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>1000 x 1000 pixels</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-wrapper\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 380
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "status", [], "any", false, false, false, 380), [0 => 1, 1 => 2, 2 => 3, 3 => 4])) {
                // line 381
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-box\" id=\"dropzone-header\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-upload\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-msg\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"dropzone-btn\" type=\"button\">";
                // line 384
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Upload", [], "cms"), "html", null, true);
                echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"preview-container\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div id=\"preview-header\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 387
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 387)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "header", [], "any", false, false, false, 387)))) {
                    // line 388
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"item preview-element\" data-mediaid=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "header", [], "any", false, false, false, 388), "id", [], "any", false, false, false, 388), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-preview-wrap\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"media-preview\" src=\"/uploads/images/";
                    // line 390
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "header", [], "any", false, false, false, 390), "path", [], "any", false, false, false, 390), "html", null, true);
                    echo "\" alt=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-preview-buttons\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a><i class=\"fa fa-edit\"></i> ";
                    // line 393
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wijzigen", [], "cms"), "html", null, true);
                    echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 397
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"images-header\" name=\"imageslist[header]\" value=\"";
                // line 400
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 400)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "header", [], "any", false, false, false, 400)))) {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "header", [], "any", false, false, false, 400), "id", [], "any", false, false, false, 400), "html", null, true);
                }
                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 402
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 402)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "header", [], "any", false, false, false, 402)))) {
                    // line 403
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-multiple-image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-preview-wrap\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"media-preview\" src=\"/uploads/images/";
                    // line 405
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "header", [], "any", false, false, false, 405), "path", [], "any", false, false, false, 405), "html", null, true);
                    echo "\" alt=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 409
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Geen foto beschikbaar.", [], "cms"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 411
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 412
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 412)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "header", [], "any", false, false, false, 412)))) {
                // line 413
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"download\" target=\"_blank\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_neutral_project_file_download", ["fileid" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "header", [], "any", false, false, false, 413), "id", [], "any", false, false, false, 413)]), "html", null, true);
                echo "\"><i class=\"fa fa-download\"></i> ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Download", [], "cms"), "html", null, true);
                echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 415
            echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-content\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 417
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Projectheader", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 417), "locale", [], "any", false, false, false, 417)), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 419
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("De aangeraden minimale afmeting voor deze afbeelding bedraagt", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 419), "locale", [], "any", false, false, false, 419)), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>3840 x 1200 pixels</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-wrapper\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 427
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "status", [], "any", false, false, false, 427), [0 => 1, 1 => 2, 2 => 3, 3 => 4])) {
                // line 428
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-box\" id=\"dropzone-fotosummary\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-upload\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-msg\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"dropzone-btn\" type=\"button\">";
                // line 431
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Upload", [], "cms"), "html", null, true);
                echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"preview-container\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div id=\"preview-fotosummary\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 434
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 434)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotosummary", [], "any", false, false, false, 434)))) {
                    // line 435
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"item preview-element\" data-mediaid=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotosummary", [], "any", false, false, false, 435), "id", [], "any", false, false, false, 435), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-preview-wrap\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"media-preview\" src=\"/uploads/images/";
                    // line 437
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotosummary", [], "any", false, false, false, 437), "path", [], "any", false, false, false, 437), "html", null, true);
                    echo "\" alt=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-preview-buttons\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a><i class=\"fa fa-edit\"></i> ";
                    // line 440
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wijzigen", [], "cms"), "html", null, true);
                    echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 444
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"images-fotosummary\" name=\"imageslist[fotosummary]\" value=\"";
                // line 447
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 447)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotosummary", [], "any", false, false, false, 447)))) {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotosummary", [], "any", false, false, false, 447), "id", [], "any", false, false, false, 447), "html", null, true);
                }
                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 449
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 449)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotosummary", [], "any", false, false, false, 449)))) {
                    // line 450
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-multiple-image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-preview-wrap\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"media-preview\" src=\"/uploads/images/";
                    // line 452
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotosummary", [], "any", false, false, false, 452), "path", [], "any", false, false, false, 452), "html", null, true);
                    echo "\" alt=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 456
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Geen foto beschikbaar.", [], "cms"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 458
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 459
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 459)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotosummary", [], "any", false, false, false, 459)))) {
                // line 460
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"download\" target=\"_blank\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_neutral_project_file_download", ["fileid" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotosummary", [], "any", false, false, false, 460), "id", [], "any", false, false, false, 460)]), "html", null, true);
                echo "\"><i class=\"fa fa-download\"></i> ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Download", [], "cms"), "html", null, true);
                echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 462
            echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-content\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 464
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Foto naast de projectsamenvatting", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 464), "locale", [], "any", false, false, false, 464)), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 466
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("De aangeraden minimale afmeting voor deze afbeelding bedraagt", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 466), "locale", [], "any", false, false, false, 466)), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>1000 x 1000 pixels</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-wrapper\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 474
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "status", [], "any", false, false, false, 474), [0 => 1, 1 => 2, 2 => 3, 3 => 4])) {
                // line 475
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-box\" id=\"dropzone-fotocontactus\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-upload\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-msg\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"dropzone-btn\" type=\"button\">";
                // line 478
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Upload", [], "cms"), "html", null, true);
                echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"preview-container\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div id=\"preview-fotocontactus\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 481
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 481)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotocontactus", [], "any", false, false, false, 481)))) {
                    // line 482
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"item preview-element\" data-mediaid=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotocontactus", [], "any", false, false, false, 482), "id", [], "any", false, false, false, 482), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-preview-wrap\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"media-preview\" src=\"/uploads/images/";
                    // line 484
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotocontactus", [], "any", false, false, false, 484), "path", [], "any", false, false, false, 484), "html", null, true);
                    echo "\" alt=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-preview-buttons\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a><i class=\"fa fa-edit\"></i> ";
                    // line 487
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wijzigen", [], "cms"), "html", null, true);
                    echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 491
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"images-fotocontactus\" name=\"imageslist[fotocontactus]\" value=\"";
                // line 494
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 494)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotocontactus", [], "any", false, false, false, 494)))) {
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotocontactus", [], "any", false, false, false, 494), "id", [], "any", false, false, false, 494), "html", null, true);
                }
                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 496
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 496)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotocontactus", [], "any", false, false, false, 496)))) {
                    // line 497
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-multiple-image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-preview-wrap\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"media-preview\" src=\"/uploads/images/";
                    // line 499
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotocontactus", [], "any", false, false, false, 499), "path", [], "any", false, false, false, 499), "html", null, true);
                    echo "\" alt=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 503
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Geen foto beschikbaar.", [], "cms"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 505
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 506
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 506)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotocontactus", [], "any", false, false, false, 506)))) {
                // line 507
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"download\" target=\"_blank\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_neutral_project_file_download", ["fileid" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotocontactus", [], "any", false, false, false, 507), "id", [], "any", false, false, false, 507)]), "html", null, true);
                echo "\"><i class=\"fa fa-download\"></i> ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Download", [], "cms"), "html", null, true);
                echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 509
            echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-content\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 511
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Achtergrondfoto bij neem contact met ons op", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 511), "locale", [], "any", false, false, false, 511)), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 513
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("De aangeraden minimale afmeting voor deze afbeelding bedraagt", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 513), "locale", [], "any", false, false, false, 513)), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>1920 x 400 pixels</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>\t
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<style>
\t\t\t\t\t\t\t\t\t\t\t\t.upload-wrapper#images-gallery-wrapper #preview-gallery{ margin:0px; }
\t\t\t\t\t\t\t\t\t\t\t\t.upload-wrapper#images-gallery-wrapper #preview-gallery .item.preview-element{ flex: 100%; }
\t\t\t\t\t\t\t\t\t\t\t\t.dropzone-box{ display:inline-flex !important;min-height:0px;height:155px;width:155px;margin:0 10px 15px 0;vertical-align: top; }
\t\t\t\t\t\t\t\t\t\t\t</style>

\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-wrapper\"  id=\"images-gallery-wrapper\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 527
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Galerij foto's", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 527), "locale", [], "any", false, false, false, 527)), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"mb-3\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 529
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("De galerij toont tot maximaal 5 afbeeldingen. De aangeraden minimale afmeting voor deze afbeelding bedraagt", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 529), "locale", [], "any", false, false, false, 529)), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>1200 x 1200 pixels</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 532
            $context["fotoCount"] = 1;
            // line 533
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 533)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "fotogallery", [], "any", false, false, false, 533)))) {
                // line 534
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "getFotoGalleryCollection", [], "method", false, false, false, 534));
                foreach ($context['_seq'] as $context["_key"] => $context["foto"]) {
                    // line 535
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "status", [], "any", false, false, false, 535), [0 => 1, 1 => 2, 2 => 3, 3 => 4])) {
                        // line 536
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-multiple-image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"delete\" onclick=\"deleteMedia(this,'";
                        // line 537
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["foto"], "id", [], "any", false, false, false, 537), "html", null, true);
                        echo "','gallery-";
                        echo twig_escape_filter($this->env, ($context["fotoCount"] ?? null), "html", null, true);
                        echo "');\"><i class=\"far fa-trash-alt\"></i> ";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms"), "html", null, true);
                        echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-box\" id=\"dropzone-gallery-";
                        // line 538
                        echo twig_escape_filter($this->env, ($context["fotoCount"] ?? null), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-upload\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-msg\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"dropzone-btn\" type=\"button\">";
                        // line 541
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Upload", [], "cms"), "html", null, true);
                        echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"preview-container\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div id=\"preview-gallery-";
                        // line 543
                        echo twig_escape_filter($this->env, ($context["fotoCount"] ?? null), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"item preview-element\" data-mediaid=\"";
                        // line 544
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["foto"], "id", [], "any", false, false, false, 544), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-preview-wrap\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"media-preview\" src=\"/uploads/images/";
                        // line 546
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["foto"], "path", [], "any", false, false, false, 546), "html", null, true);
                        echo "\" alt=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-preview-buttons\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"edit\"><i class=\"fa fa-edit\"></i> ";
                        // line 550
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wijzigen", [], "cms"), "html", null, true);
                        echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"images-gallery-";
                        // line 555
                        echo twig_escape_filter($this->env, ($context["fotoCount"] ?? null), "html", null, true);
                        echo "\" name=\"imageslist[gallery][]\" value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["foto"], "id", [], "any", false, false, false, 555), "html", null, true);
                        echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"download\" target=\"_blank\" href=\"";
                        // line 557
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_neutral_project_file_download", ["fileid" => twig_get_attribute($this->env, $this->source, $context["foto"], "id", [], "any", false, false, false, 557)]), "html", null, true);
                        echo "\"><i class=\"fa fa-download\"></i> ";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Download", [], "cms"), "html", null, true);
                        echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 560
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-multiple-image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-preview-wrap\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"media-preview\" src=\"/uploads/images/";
                        // line 562
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["foto"], "path", [], "any", false, false, false, 562), "html", null, true);
                        echo "\" alt=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"download\" target=\"_blank\" href=\"";
                        // line 564
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_neutral_project_file_download", ["fileid" => twig_get_attribute($this->env, $this->source, $context["foto"], "id", [], "any", false, false, false, 564)]), "html", null, true);
                        echo "\"><i class=\"fa fa-download\"></i> ";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Download", [], "cms"), "html", null, true);
                        echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 567
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context["fotoCount"] = (($context["fotoCount"] ?? null) + 1);
                    // line 568
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['foto'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 569
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 570
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "status", [], "any", false, false, false, 570), [0 => 1, 1 => 2, 2 => 3, 3 => 4])) {
                // line 571
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 572
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ((($context["fotoCount"] ?? null) < 6)) {
                        // line 573
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"upload-multiple-image\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-box\" id=\"dropzone-gallery-";
                        // line 574
                        echo twig_escape_filter($this->env, ($context["fotoCount"] ?? null), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-upload\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-msg\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"dropzone-btn\" type=\"button\">";
                        // line 577
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Upload", [], "cms"), "html", null, true);
                        echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"preview-container\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div id=\"preview-gallery-";
                        // line 579
                        echo twig_escape_filter($this->env, ($context["fotoCount"] ?? null), "html", null, true);
                        echo "\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"images-gallery-";
                        // line 581
                        echo twig_escape_filter($this->env, ($context["fotoCount"] ?? null), "html", null, true);
                        echo "\" name=\"imageslist[gallery][]\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 584
                        $context["fotoCount"] = (($context["fotoCount"] ?? null) + 1);
                        // line 585
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 586
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 587
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 588
            echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"card-footer\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-sm-12 col-md-12\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 594
            if ( !array_key_exists("isBackend", $context)) {
                // line 595
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"previous btn btn-gray float-left\"><i class=\"fa fa-arrow-left\"></i>";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Vorige", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 595), "locale", [], "any", false, false, false, 595)), "html", null, true);
                echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 597
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "status", [], "any", false, false, false, 597), [0 => 1, 1 => 2, 2 => 3, 3 => 4])) {
                // line 598
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"save btn btn-gradient float-right\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 599
                if (twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 599))) {
                    // line 600
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Project indienen", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 600), "locale", [], "any", false, false, false, 600)), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 602
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Project opslaan", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 602), "locale", [], "any", false, false, false, 602));
                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 603
                echo "&nbsp;<i class=\"fa fa-arrow-right\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 606
            echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
            // line 611
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "_token", [], "any", false, false, false, 611), 'row');
            echo "
\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
            // line 613
            if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasGoogleRecaptcha", [], "method", false, false, false, 613)) {
                // line 614
                echo "\t\t\t\t\t\t\t\t<div class=\"recaptcha\">
\t\t\t\t\t\t\t\t  ";
                // line 615
                echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getGoogleRecaptchaWidget", [], "method", false, false, false, 615);
                echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
            }
            // line 618
            echo "\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t";
            // line 619
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
            echo "


\t\t\t\t\t\t\t";
        }
        // line 623
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</section>
\t\t\t</div>
\t\t</div>
\t</div>
</section>
<script defer src=\"/bundles/cms/js/form_validation.js\"></script>
<script defer src=\"/bundles/cms/js/utils.js\"></script>
";
        // line 632
        if ( !array_key_exists("isBackend", $context)) {
            // line 633
            echo "<script defer type=\"text/javascript\" src=\"https://code.jquery.com/jquery-migrate-3.1.0.min.js\"></script>
";
        }
        // line 635
        echo "<script defer type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/js/jquery.filedrop.js"), "html", null, true);
        echo "\"></script>

";
        // line 637
        if ( !array_key_exists("isBackend", $context)) {
            // line 638
            echo "\t<script defer type=\"text/javascript\" src=\"/bundles/cms/ckeditor/ckeditor.js\"></script>
";
        }
        // line 640
        echo "<script defer type=\"text/javascript\" src=\"/bundles/cms/ckeditor/trinity.js\"></script>";
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/front/projects/add-project.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1360 => 640,  1356 => 638,  1354 => 637,  1348 => 635,  1344 => 633,  1342 => 632,  1331 => 623,  1324 => 619,  1321 => 618,  1315 => 615,  1312 => 614,  1310 => 613,  1305 => 611,  1298 => 606,  1293 => 603,  1287 => 602,  1281 => 600,  1279 => 599,  1276 => 598,  1273 => 597,  1267 => 595,  1265 => 594,  1257 => 588,  1254 => 587,  1248 => 586,  1245 => 585,  1243 => 584,  1237 => 581,  1232 => 579,  1227 => 577,  1221 => 574,  1218 => 573,  1215 => 572,  1210 => 571,  1207 => 570,  1204 => 569,  1198 => 568,  1195 => 567,  1187 => 564,  1182 => 562,  1178 => 560,  1170 => 557,  1163 => 555,  1155 => 550,  1148 => 546,  1143 => 544,  1139 => 543,  1134 => 541,  1128 => 538,  1120 => 537,  1117 => 536,  1114 => 535,  1109 => 534,  1106 => 533,  1104 => 532,  1098 => 529,  1093 => 527,  1076 => 513,  1071 => 511,  1067 => 509,  1059 => 507,  1056 => 506,  1053 => 505,  1047 => 503,  1040 => 499,  1036 => 497,  1033 => 496,  1026 => 494,  1021 => 491,  1014 => 487,  1008 => 484,  1002 => 482,  1000 => 481,  994 => 478,  989 => 475,  987 => 474,  976 => 466,  971 => 464,  967 => 462,  959 => 460,  956 => 459,  953 => 458,  947 => 456,  940 => 452,  936 => 450,  933 => 449,  926 => 447,  921 => 444,  914 => 440,  908 => 437,  902 => 435,  900 => 434,  894 => 431,  889 => 428,  887 => 427,  876 => 419,  871 => 417,  867 => 415,  859 => 413,  856 => 412,  853 => 411,  847 => 409,  840 => 405,  836 => 403,  833 => 402,  826 => 400,  821 => 397,  814 => 393,  808 => 390,  802 => 388,  800 => 387,  794 => 384,  789 => 381,  787 => 380,  776 => 372,  771 => 370,  767 => 368,  759 => 366,  756 => 365,  753 => 364,  747 => 362,  740 => 358,  736 => 356,  733 => 355,  726 => 353,  721 => 350,  714 => 346,  708 => 343,  702 => 341,  700 => 340,  694 => 337,  689 => 334,  687 => 333,  682 => 330,  676 => 326,  674 => 325,  669 => 323,  665 => 322,  661 => 320,  657 => 318,  652 => 315,  644 => 310,  640 => 309,  635 => 306,  633 => 305,  626 => 301,  621 => 298,  613 => 296,  610 => 295,  607 => 294,  601 => 292,  594 => 288,  590 => 287,  587 => 286,  582 => 285,  577 => 284,  572 => 283,  567 => 282,  562 => 281,  559 => 280,  556 => 279,  553 => 278,  546 => 276,  541 => 273,  534 => 269,  530 => 267,  524 => 265,  522 => 264,  518 => 263,  513 => 262,  508 => 261,  503 => 260,  498 => 259,  493 => 258,  488 => 257,  485 => 256,  482 => 255,  480 => 254,  474 => 251,  469 => 248,  467 => 247,  457 => 240,  447 => 233,  437 => 226,  427 => 219,  417 => 212,  407 => 205,  403 => 204,  393 => 197,  389 => 196,  384 => 193,  378 => 189,  376 => 188,  371 => 186,  367 => 185,  363 => 183,  359 => 181,  354 => 178,  346 => 173,  342 => 172,  337 => 169,  335 => 168,  328 => 164,  320 => 159,  312 => 154,  304 => 149,  296 => 144,  288 => 139,  284 => 137,  277 => 132,  275 => 131,  272 => 130,  266 => 126,  264 => 125,  258 => 123,  255 => 122,  249 => 120,  243 => 118,  240 => 117,  234 => 115,  232 => 114,  212 => 99,  207 => 96,  204 => 95,  201 => 94,  198 => 93,  196 => 92,  193 => 91,  187 => 89,  185 => 88,  180 => 86,  177 => 85,  174 => 84,  172 => 83,  108 => 22,  104 => 21,  100 => 20,  96 => 19,  92 => 18,  88 => 17,  84 => 16,  80 => 15,  76 => 14,  72 => 13,  68 => 12,  64 => 11,  60 => 10,  55 => 9,  49 => 7,  43 => 5,  41 => 4,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/front/projects/add-project.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/NeutralBundle/Resources/views/front/projects/add-project.html.twig");
    }
}
