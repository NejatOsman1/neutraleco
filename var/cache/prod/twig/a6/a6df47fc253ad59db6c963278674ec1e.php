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

/* @TrinityForms/forms/edit.html.twig */
class __TwigTemplate_524ae6062ff66f7e31a730cc8443c56f extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'pagetitle' => [$this, 'block_pagetitle'],
            'body' => [$this, 'block_body'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'scripts' => [$this, 'block_scripts'],
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
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@TrinityForms/forms/edit.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Forms", [], "cms"), "html", null, true);
    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "
<div class=\"page-save-overlay\">
\t<div class=\"vtable\">
\t\t<div class=\"valign\">
\t\t\t<div class=\"loading\"></div>
\t\t\t<span>";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bezig met opslaan..", [], "cms"), "html", null, true);
        echo "</span>
\t\t</div>
\t</div>
</div>
<style>
\tform .invalid_input:after, form .valid_input:after {
\t\ttop: 28px;
\t}
\tform .invalid_input:after {
\t\tcontent: \"\\f071\";
\t\tcolor: #f61938;
\t\tfont-family: \"Font Awesome 5 Free\";
\t\tfont-size: 1rem;
\t\tfont-weight: 900;
\t\tfont-style: normal;
\t\tfont-variant: normal;
\t\tposition: absolute;
\t\tz-index: 2;
\t\ttop: 50%;
\t\tright: 10px;
\t\tanimation: confirm 0.5s;
\t\ttransform: scale(1) translateY(-50%);
\t\ttransform-origin: top;
\t\tpointer-events: none;
\t}
\tform .field-control{  
\t\twidth:calc(100% - 185px);
\t\tdisplay: inline-block;
\t\tmargin-left: 20px;
\t\tposition:relative;
\t}
\tform .field-control > input{
\t\tborder:0px;
\t\toutline:none;
\t\tline-height: 28px;
\t\twidth:100%;
\t}
</style>

";
        // line 49
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
        echo "
<link rel=\"stylesheet\" href=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/trinityforms/admin/css/editor.css"), "html", null, true);
        echo "\">

<ul class=\"nav nav-tabs nav-pills content-tabs d-none d-lg-flex\" id=\"myTab\" role=\"tablist\">
  <li class=\"nav-item\" role=\"presentation\">
\t\t<button class=\"nav-link ";
        // line 54
        echo ((($context["id"] ?? null)) ? ("") : ("active"));
        echo "\" id=\"general-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#general-tab-content\" type=\"button\" role=\"tab\" aria-controls=\"general-tab-content\" aria-selected=\"";
        echo ((($context["id"] ?? null)) ? ("false") : ("true"));
        echo "\">
      ";
        // line 55
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Algemeen", [], "cms"), "html", null, true);
        echo "
    </button>
  </li>
  <li class=\"nav-item\" role=\"presentation\">
\t\t<button class=\"nav-link ";
        // line 59
        echo ((($context["id"] ?? null)) ? ("active") : (""));
        echo "\" id=\"editor-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#editor-tab-content\" type=\"button\" role=\"tab\" aria-controls=\"editor-tab-content\" aria-selected=\"";
        echo ((($context["id"] ?? null)) ? ("true") : ("false"));
        echo "\">
      ";
        // line 60
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Formulier", [], "cms"), "html", null, true);
        echo "
    </button>
  </li>
  <li class=\"nav-item\" role=\"presentation\">
\t\t<button class=\"nav-link\" id=\"mailinternal-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#mailinternal-tab-content\" type=\"button\" role=\"tab\" aria-controls=\"mailinternal-tab-content\" aria-selected=\"false\">
      ";
        // line 65
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("E-mail intern", [], "cms"), "html", null, true);
        echo "
    </button>
  </li>
  <li class=\"nav-item\" role=\"presentation\">
\t\t<button class=\"nav-link\" id=\"mailexternal-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#mailexternal-tab-content\" type=\"button\" role=\"tab\" aria-controls=\"mailexternal-tab-content\" aria-selected=\"false\">
      ";
        // line 70
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("E-mail extern", [], "cms"), "html", null, true);
        echo "
    </button>
  </li>
  <li class=\"nav-item\" role=\"presentation\">
\t\t<button class=\"nav-link\" id=\"replies-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#replies-tab-content\" type=\"button\" role=\"tab\" aria-controls=\"replies-tab-content\" aria-selected=\"false\">
      ";
        // line 75
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reacties", [], "cms"), "html", null, true);
        echo "
    </button>
  </li>
  <li class=\"nav-item\" role=\"presentation\" style=\"display:none;\">
\t\t<button class=\"nav-link\" id=\"seo-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#seo-tab-content\" type=\"button\" role=\"tab\" aria-controls=\"seo-tab-content\" aria-selected=\"false\">
      ";
        // line 80
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("SEO", [], "cms"), "html", null, true);
        echo "
    </button>
  </li>
</ul>

<div class=\"tab-content\">
\t<div class=\"tab-pane fade ";
        // line 86
        echo ((($context["id"] ?? null)) ? ("") : ("show active"));
        echo "\" id=\"general-tab-content\" role=\"tabpanel\" aria-labelledby=\"general-tab\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-sm-12\">
\t\t\t\t<div class=\"card\">
\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t";
        // line 91
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
\t\t\t\t\t\t";
        // line 92
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t";
        // line 96
        if (((((($context["new"] ?? null) &&  !twig_test_empty(($context["multisite_all"] ?? null))) && (twig_length_filter($this->env, ($context["multisite_all"] ?? null)) > 1)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "User", [], "any", false, false, false, 96), "checkPermissions", [0 => "ALLOW_SITE_SWITCHING"], "method", false, false, false, 96)) && ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 96), "sites", [], "any", false, false, false, 96), "count", [], "any", false, false, false, 96) == 0) || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 96), "sites", [], "any", false, false, false, 96), "count", [], "any", false, false, false, 96) > 1)))) {
            // line 97
            echo "\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t<span class=\"card-title\">";
            // line 99
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Multi-site", [], "cms"), "html", null, true);
            echo "</span>
\t\t\t\t\t\t\t";
            // line 100
            if (( !twig_test_empty(($context["multisite_all"] ?? null)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "User", [], "any", false, false, false, 100), "checkPermissions", [0 => "ALLOW_SITE_SWITCHING"], "method", false, false, false, 100))) {
                // line 101
                echo "\t\t\t\t\t\t\t\t<div style=\"margin-bottom:10px;\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u deze post dupliceren naar andere website(s)?", [], "cms"), "html", null, true);
                echo "</div>
\t\t\t\t\t\t\t\t";
                // line 102
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["multisite_all"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["C"]) {
                    // line 103
                    echo "\t\t\t\t\t\t\t\t\t";
                    if ((twig_in_filter($context["C"], twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 103), "sites", [], "any", false, false, false, 103)) || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 103), "sites", [], "any", false, false, false, 103), "count", [], "any", false, false, false, 103) == 0))) {
                        // line 104
                        echo "\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t<input ";
                        // line 105
                        echo ((($context["C"] == ($context["Settings"] ?? null))) ? ("disabled") : (""));
                        echo " type=\"checkbox\" name=\"clone[]\" value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "id", [], "any", false, false, false, 105), "html", null, true);
                        echo "\" id=\"clone-";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "id", [], "any", false, false, false, 105), "html", null, true);
                        echo "\" />
\t\t\t\t\t\t\t\t\t\t\t<label for=\"clone-";
                        // line 106
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "id", [], "any", false, false, false, 106), "html", null, true);
                        echo "\"><strong style=\"color:#34adea;\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "label", [], "any", false, false, false, 106), "html", null, true);
                        echo "</strong> | ";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["C"], "language", [], "any", false, false, false, 106), "label", [], "any", false, false, false, 106), "html", null, true);
                        echo "</label>
\t\t\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 109
                    echo "\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['C'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 110
                echo "\t\t\t\t\t\t\t";
            }
            // line 111
            echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
        }
        // line 114
        echo "\t\t\t</div>
\t\t</div>
\t</div>

\t<div class=\"tab-pane fade ";
        // line 118
        echo ((($context["id"] ?? null)) ? ("show active") : (""));
        echo "\" id=\"editor-tab-content\" role=\"tabpanel\" aria-labelledby=\"editor-tab\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-sm-12 col-md-3\">
\t\t\t\t<div class=\"toolbox\">
\t\t\t\t\t<span data-type=\"plain\" draggable=\"true\" class=\"btn-flat\" style=\"width:100%;\"><i class=\"material-icons left\">format_align_left</i>";
        // line 122
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Vrije tekst", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t\t\t<span data-type=\"h1\" draggable=\"true\" class=\"btn-flat\" style=\"width:100%;\"><i class=\"material-icons left\">format_bold</i>";
        // line 123
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Titel (h1)", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t\t\t<span data-type=\"h2\" draggable=\"true\" class=\"btn-flat\" style=\"width:100%;\"><i class=\"material-icons left\">format_bold</i>";
        // line 124
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Titel (h2)", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t\t\t<span data-type=\"h3\" draggable=\"true\" class=\"btn-flat\" style=\"width:100%;\"><i class=\"material-icons left\">format_bold</i>";
        // line 125
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Titel (h3)", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t\t\t<span data-type=\"upload\" draggable=\"true\" class=\"btn-flat\" style=\"width:100%;\"><i class=\"material-icons left\">attachment</i>";
        // line 126
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Upload", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t\t\t<span data-type=\"text\" draggable=\"true\" class=\"btn-flat\" style=\"width:100%;\"><i class=\"material-icons left\">short_text</i>";
        // line 127
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tekst", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t\t\t<span data-type=\"date\" draggable=\"true\" class=\"btn-flat\" style=\"width:100%;\"><i class=\"material-icons left\">short_text</i>";
        // line 128
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Datum", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t\t\t<span data-type=\"email\" draggable=\"true\" class=\"btn-flat\" style=\"width:100%;\"><i class=\"material-icons left\">email</i>";
        // line 129
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("E-mailadres", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t\t\t<span data-type=\"email_check\" draggable=\"true\" class=\"btn-flat\" style=\"width:100%;\"><i class=\"material-icons left\">email</i>";
        // line 130
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("E-mailadres (controle)", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t\t\t<span data-type=\"textarea\" draggable=\"true\" class=\"btn-flat\" style=\"width:100%;\"><i class=\"material-icons left\">format_align_justify</i>";
        // line 131
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tekst blok", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t\t\t<span data-type=\"select\" draggable=\"true\" class=\"btn-flat\" style=\"width:100%;\"><i class=\"material-icons left\">arrow_drop_down</i>";
        // line 132
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Dropdown", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t\t\t<span data-type=\"checkbox\" draggable=\"true\" class=\"btn-flat\" style=\"width:100%;\"><i class=\"material-icons left\">check_box</i>";
        // line 133
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Meerkeuze", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t\t\t<span data-type=\"radio\" draggable=\"true\" class=\"btn-flat\" style=\"width:100%;\"><i class=\"material-icons left\">radio_button_checked</i>";
        // line 134
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Radio", [], "cms"), "html", null, true);
        echo "</span>
          <span data-type=\"canvas\" draggable=\"true\" class=\"btn-flat\" style=\"width:100%;\"><i class=\"material-icons left\">touch_app</i>";
        // line 135
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Canvas", [], "cms"), "html", null, true);
        echo "</span>
          <span data-type=\"dropzone\" draggable=\"true\" class=\"btn-flat\" style=\"width:100%;\"><i class=\"material-icons left\">attachment</i>";
        // line 136
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Dropzone", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t\t\t";
        // line 137
        if ((( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "ActiveCampaignListid", [], "any", false, false, false, 137)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "ActiveCampaignKey", [], "any", false, false, false, 137))) && (twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "ActiveCampaign", [], "any", false, false, false, 137) == true))) {
            // line 138
            echo "\t\t\t\t\t<span data-type=\"newsletter\" draggable=\"true\" class=\"btn-flat\" style=\"width:100%; height: auto;\"><i class=\"material-icons left\">assignment_turned_in</i>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuwsbrief", [], "cms"), "html", null, true);
            echo "</span>
\t\t\t\t\t";
        }
        // line 140
        echo "\t\t\t\t\t";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "MailerListid", [], "any", false, false, false, 140))) {
            // line 141
            echo "\t\t\t\t\t\t<span data-type=\"mailer\" draggable=\"true\" class=\"btn-flat\" style=\"width:100%; height: auto;\"><i class=\"material-icons left\">assignment_turned_in</i>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Hummessenger Niewsbrief", [], "cms"), "html", null, true);
            echo "</span>
\t\t\t\t\t";
        }
        // line 143
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-sm-12 col-md-9 form-editor\">
\t\t\t\t<div class=\"fields-parent\">
\t\t\t\t\t";
        // line 147
        $context["firstField"] = true;
        // line 148
        echo "\t\t\t\t\t";
        $context["loadForm"] = true;
        // line 149
        echo "\t\t\t\t\t";
        if ( !twig_test_empty(($context["questions"] ?? null))) {
            // line 150
            echo "\t\t\t\t\t\t";
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
            foreach ($context['_seq'] as $context["i"] => $context["Question"]) {
                // line 151
                echo "\t\t\t\t\t\t\t";
                if (((twig_get_attribute($this->env, $this->source, $context["Question"], "position", [], "any", false, false, false, 151) == 0) && (($context["firstField"] ?? null) != true))) {
                    // line 152
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"fields-parent\">
\t\t\t\t\t\t\t";
                }
                // line 155
                echo "\t\t\t\t\t\t\t<div class=\"field-child\" style=\"width:";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["Question"], "width", [], "any", false, false, false, 155) / 12) * 100), "html", null, true);
                echo "%;\">
\t\t\t\t\t\t\t\t";
                // line 156
                $this->loadTemplate((("@TrinityForms/elements/" . twig_get_attribute($this->env, $this->source, $context["Question"], "getType", [], "any", false, false, false, 156)) . ".html.twig"), "@TrinityForms/forms/edit.html.twig", 156)->display($context);
                // line 157
                echo "\t\t\t\t\t\t\t\t";
                // line 158
                echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                // line 159
                $context["firstField"] = false;
                // line 160
                echo "\t\t\t\t\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['i'], $context['Question'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 161
            echo "\t\t\t\t\t";
        } else {
            // line 162
            echo "\t\t\t\t\t\t<span class=\"form-is-empty\" style=\"padding: 20px;     display: block;     text-align: center;     font-weight: bold;     font-size: 16px;     color: #00000054;\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sleep formulier elementen van de linker zijde naar dit blok.", [], "cms"), "html", null, true);
            echo "</span>
\t\t\t\t\t";
        }
        // line 164
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>

\t<div class=\"tab-pane fade\" id=\"mailinternal-tab-content\" role=\"tabpanel\" aria-labelledby=\"mailinternal-tab\">
\t\t<div class=\"row\" id=\"mailinternal\">
\t\t\t<div class=\"col-sm-12 col-md-8 col-lg-8\">
\t\t\t\t<div class=\"card\">
\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t<div class=\"mb-3\">
\t\t\t\t\t\t\t<textarea class=\"c-ckeditor form-control\" id=\"ck_internal\" name=\"mail[internal][content]\">";
        // line 175
        (((twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "internal", [], "any", true, true, false, 175) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "internal", [], "any", false, true, false, 175), "content", [], "any", true, true, false, 175))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "internal", [], "any", false, false, false, 175), "content", [], "any", false, false, false, 175), "html", null, true))) : (print ("")));
        echo "</textarea>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t\t<label class=\"form-label\" for=\"receiver\">";
        // line 179
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Ontvanger(s)", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t\t\t\t<input class=\"form-control\" id=\"receiver\" name=\"mail[internal][receiver]\" type=\"text\" value=\"";
        // line 180
        (((twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "internal", [], "any", true, true, false, 180) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "internal", [], "any", false, true, false, 180), "receiver", [], "any", true, true, false, 180))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "internal", [], "any", false, false, false, 180), "receiver", [], "any", false, false, false, 180), "html", null, true))) : (print ("")));
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t\t<label class=\"form-label\" for=\"receiver\">";
        // line 183
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Naam van verstuurder (optioneel)", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t\t\t\t<input class=\"form-control\" id=\"receiver\" name=\"mail[internal][sendername]\" type=\"text\" value=\"";
        // line 184
        (((twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "internal", [], "any", true, true, false, 184) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "internal", [], "any", false, true, false, 184), "sendername", [], "any", true, true, false, 184))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "internal", [], "any", false, false, false, 184), "sendername", [], "any", false, false, false, 184), "html", null, true))) : (print ("")));
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t\t<label class=\"form-label\" for=\"subject\">";
        // line 187
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Onderwerp", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t\t\t\t<input class=\"form-control\" id=\"subject\" name=\"mail[internal][subject]\" type=\"text\" value=\"";
        // line 188
        (((twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "internal", [], "any", true, true, false, 188) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "internal", [], "any", false, true, false, 188), "subject", [], "any", true, true, false, 188))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "internal", [], "any", false, false, false, 188), "subject", [], "any", false, false, false, 188), "html", null, true))) : (print ("")));
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t\t<label class=\"form-label\">";
        // line 191
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("E-mail template", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t\t\t\t<select class=\"form-select\" name=\"mail[internal][template]\">
\t\t\t\t\t\t\t\t\t";
        // line 193
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["templates"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["tpl"]) {
            // line 194
            echo "\t\t\t\t\t\t\t\t\t\t<option ";
            echo (((twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "internal", [], "any", true, true, false, 194) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "internal", [], "any", false, false, false, 194), "template", [], "any", false, false, false, 194) == $context["tpl"]))) ? ("selected=\"selected\"") : (""));
            echo " value=\"";
            echo twig_escape_filter($this->env, $context["tpl"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["tpl"], "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tpl'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 196
        echo "\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-sm-12 col-md-4 col-lg-4 tags-container\">
\t\t\t\t<div class=\"card\">
\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t";
        // line 206
        echo "\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["questions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["question"]) {
            // line 207
            echo "\t\t\t\t\t\t\t<a href=\"#\" style=\"display: block;height:auto;line-height: 25px;margin-bottom: 10px;\" onclick=\"CKEDITOR.instances.ck_internal.insertHtml('[";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 207), "html", null, true);
            echo "#";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["question"], "getTitle", [], "any", false, false, false, 207), "html", null, true);
            echo "]');\" class=\"btn-flat\" style=\"width:100%;\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["question"], "getTitle", [], "any", false, false, false, 207), "html", null, true);
            echo "</a>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['question'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 209
        echo "\t\t\t\t\t\t<a href=\"#\" style=\"display: block;height:auto;line-height: 25px;\" onclick=\"CKEDITOR.instances.ck_internal.insertHtml('[FORM_RESULTS]');\" class=\"btn-flat red-text\" style=\"width:100%;\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Formulier resultaten", [], "cms"), "html", null, true);
        echo "</a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t";
        // line 215
        echo "\t</div>

\t<div class=\"tab-pane fade\" id=\"mailexternal-tab-content\" role=\"tabpanel\" aria-labelledby=\"mailexternal-tab\">
\t\t<div class=\"row\" id=\"mailexternal\">
\t\t\t<div class=\"col-sm-12 col-md-8 col-lg-8\">
\t\t\t\t<div class=\"card\">
\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t<div class=\"mb-3\">
\t\t\t\t\t\t\t<textarea class=\"c-ckeditor form-control\" id=\"ck_external\" name=\"mail[external][content]\">";
        // line 223
        (((twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "external", [], "any", true, true, false, 223) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "external", [], "any", false, true, false, 223), "content", [], "any", true, true, false, 223))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "external", [], "any", false, false, false, 223), "content", [], "any", false, false, false, 223), "html", null, true))) : (print ("")));
        echo "</textarea>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t<div class=\"col-sm-8\">
\t\t\t\t\t\t\t\t<label class=\"form-label\" for=\"subject\">";
        // line 228
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Onderwerp", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t\t\t\t<input class=\"form-control\" id=\"subject\" name=\"mail[external][subject]\" type=\"text\" value=\"";
        // line 229
        (((twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "external", [], "any", true, true, false, 229) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "external", [], "any", false, true, false, 229), "subject", [], "any", true, true, false, 229))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "external", [], "any", false, false, false, 229), "subject", [], "any", false, false, false, 229), "html", null, true))) : (print ("")));
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t\t\t<label class=\"form-label\">";
        // line 232
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("E-mail template", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t\t\t\t<select class=\"form-select\" name=\"mail[external][template]\">
\t\t\t\t\t\t\t\t\t";
        // line 234
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["templates"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["tpl"]) {
            // line 235
            echo "\t\t\t\t\t\t\t\t\t\t<option ";
            echo (((twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "external", [], "any", true, true, false, 235) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "external", [], "any", false, false, false, 235), "template", [], "any", false, false, false, 235) == $context["tpl"]))) ? ("selected=\"selected\"") : (""));
            echo " value=\"";
            echo twig_escape_filter($this->env, $context["tpl"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["tpl"], "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tpl'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 237
        echo "\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<label class=\"form-label\" for=\"from_email\">";
        // line 241
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Afzender e-mail", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t\t\t\t<input class=\"form-control\" id=\"from_email\" name=\"mail[external][from_email]\" type=\"text\" value=\"";
        // line 242
        echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "external", [], "any", true, true, false, 242) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "external", [], "any", false, true, false, 242), "from_email", [], "any", true, true, false, 242))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "external", [], "any", false, false, false, 242), "from_email", [], "any", false, false, false, 242)) : (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "systemEmail", [], "any", false, false, false, 242))), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"col-sm-6\">
\t\t\t\t\t\t\t\t<label class=\"form-label\" for=\"from_name\">";
        // line 245
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Afzender naam", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t\t\t\t<input class=\"form-control\" id=\"from_name\" name=\"mail[external][from_name]\" type=\"text\" value=\"";
        // line 246
        echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "external", [], "any", true, true, false, 246) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "external", [], "any", false, true, false, 246), "from_name", [], "any", true, true, false, 246))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["mails"] ?? null), "external", [], "any", false, false, false, 246), "from_name", [], "any", false, false, false, 246)) : (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "systemEmailFrom", [], "any", false, false, false, 246))), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-sm-12 col-md-4 col-lg-4 tags-container\">
\t\t\t\t<div class=\"card\">
\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t";
        // line 257
        echo "\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["questions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["question"]) {
            // line 258
            echo "\t\t\t\t\t\t\t<a href=\"#\" style=\"display: block;height:auto;line-height: 25px;margin-bottom: 10px;\" onclick=\"CKEDITOR.instances.ck_external.insertHtml('[";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 258), "html", null, true);
            echo "#";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["question"], "getTitle", [], "any", false, false, false, 258), "html", null, true);
            echo "]');\" class=\"btn-flat\" style=\"width:100%;\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["question"], "getTitle", [], "any", false, false, false, 258), "html", null, true);
            echo "</a>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['question'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 260
        echo "\t\t\t\t\t\t<a href=\"#\" style=\"display: block;height:auto;line-height: 25px;\" onclick=\"CKEDITOR.instances.ck_external.insertHtml('[FORM_RESULTS]');\" class=\"btn-flat red-text\" style=\"width:100%;\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Formulier resultaten", [], "cms"), "html", null, true);
        echo "</a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t";
        // line 266
        echo "\t</div>

\t<div class=\"tab-pane fade\" id=\"seo-tab-content\" role=\"tabpanel\" aria-labelledby=\"seo-tab\" style=\"display:none;\">
\t\t<div class=\"card\">
\t\t\t<div class=\"card-content\">

\t\t\t";
        // line 272
        $context["foundMeta"] = false;
        // line 273
        echo "\t\t\t";
        if (($context["metatags"] ?? null)) {
            // line 274
            echo "\t\t\t\t";
            $context["foundMeta"] = true;
            // line 275
            echo "\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["metatags"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Metatag"]) {
                // line 276
                echo "\t\t\t\t\t<div class=\"mb-3\">
\t\t\t\t\t\t\t<label class=\"form-label\" for=\"form_label\" class=\"required\">";
                // line 277
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 277), "label", [], "any", false, false, false, 277), "html", null, true);
                echo "</label>
\t\t\t\t\t\t<div class=\"controls\">
\t\t\t\t\t\t\t";
                // line 279
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 279), "key", [], "any", false, false, false, 279) == "description")) {
                    // line 280
                    echo "\t\t\t\t\t\t\t\t";
                    $context["seoDescription"] = twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 280);
                    // line 281
                    echo "\t\t\t\t\t\t\t\t\t<textarea class=\"form-control fld-seo-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 281), "key", [], "any", false, false, false, 281), "html", null, true);
                    echo "\" placeholder=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 281), "placeholder", [], "any", false, false, false, 281), "html", null, true);
                    echo "\" name=\"metadata[";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 281), "id", [], "any", false, false, false, 281), "html", null, true);
                    echo "]\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 281), "html", null, true);
                    echo "</textarea>
\t\t\t\t\t\t\t";
                } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                 // line 282
$context["Metatag"], "metatag", [], "any", false, false, false, 282), "valueType", [], "any", false, false, false, 282) == "image")) {
                    // line 283
                    echo "
\t\t\t\t\t\t\t\t";
                    // line 284
                    $context["hasMedia"] =  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 284));
                    // line 285
                    echo "\t\t\t\t\t\t\t\t<a id=\"meta-imageselect-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 285), "id", [], "any", false, false, false, 285), "html", null, true);
                    echo "\" href=\"#\" onclick=\"mediaField = '";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 285), "id", [], "any", false, false, false, 285), "html", null, true);
                    echo "';addMedia(this);\" style=\"";
                    echo ((($context["hasMedia"] ?? null)) ? ("display:none;") : (""));
                    echo "\" class=\"btn\">";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Selecteer een afbeelding", [], "cms"), "html", null, true);
                    echo "</a>
\t\t\t\t\t\t\t\t<div style=\"width: 100px;max-height: 100px;text-align:center;margin: 30px;\" class=\"settings-image\" id=\"meta-image-";
                    // line 286
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 286), "id", [], "any", false, false, false, 286), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t";
                    // line 287
                    if (($context["hasMedia"] ?? null)) {
                        // line 288
                        echo "\t\t\t\t\t\t\t\t\t\t<img src=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 288), "html", null, true);
                        echo "\" style=\"max-width: 100%;max-height: 100%;\" />
\t\t\t\t\t\t\t\t\t\t<button style=\"\" type=\"button\" onclick=\"deleteMetaImage(";
                        // line 289
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 289), "id", [], "any", false, false, false, 289), "html", null, true);
                        echo ");\" class=\"btn red darken-1 del_btn\"><i class=\"material-icons\">delete</i></button>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 291
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<input  id=\"meta-field-";
                    // line 292
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 292), "id", [], "any", false, false, false, 292), "html", null, true);
                    echo "\" class=\"form-control fld-seo-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 292), "key", [], "any", false, false, false, 292), "html", null, true);
                    echo "\" type=\"hidden\" placeholder=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 292), "placeholder", [], "any", false, false, false, 292), "html", null, true);
                    echo "\" name=\"metadata[";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 292), "id", [], "any", false, false, false, 292), "html", null, true);
                    echo "]\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 292), "html", null, true);
                    echo "\" />

\t\t\t\t\t\t\t\t";
                } elseif ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                 // line 294
$context["Metatag"], "metatag", [], "any", false, false, false, 294), "valueOptions", [], "any", false, false, false, 294))) {
                    // line 295
                    echo "\t\t\t\t\t\t\t\t\t<select name=\"metadata[";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 295), "id", [], "any", false, false, false, 295), "html", null, true);
                    echo "]\" class=\"form-select fld-seo-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 295), "key", [], "any", false, false, false, 295), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t<option value=\"\">- ";
                    // line 296
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("n.v.t.", [], "cms"), "html", null, true);
                    echo " -</option>
\t\t\t\t\t\t\t\t\t\t";
                    // line 297
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 297), "valueOptions", [], "any", false, false, false, 297));
                    foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                        // line 298
                        echo "\t\t\t\t\t\t\t\t\t\t\t<option ";
                        echo (((twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 298) == $context["option"])) ? ("selected") : (""));
                        echo " value=\"";
                        echo twig_escape_filter($this->env, $context["option"], "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $context["option"], "html", null, true);
                        echo "</option>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 300
                    echo "\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 302
                    echo "\t\t\t\t\t\t\t\t\t<input class=\"form-control fld-seo-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 302), "key", [], "any", false, false, false, 302), "html", null, true);
                    echo "\" type=\"text\" placeholder=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 302), "placeholder", [], "any", false, false, false, 302), "html", null, true);
                    echo "\" name=\"metadata[";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 302), "id", [], "any", false, false, false, 302), "html", null, true);
                    echo "]\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 302), "html", null, true);
                    echo "\" />
\t\t\t\t\t\t\t\t";
                }
                // line 304
                echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Metatag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 307
            echo "\t\t\t\t";
        }
        // line 308
        echo "
\t\t\t\t";
        // line 309
        if ((($context["foundMeta"] ?? null) == false)) {
            // line 310
            echo "\t\t\t\t\t<div class=\"center-align\">
\t\t\t\t\t\t";
            // line 311
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Er zijn nog geen metadata geconfigureerd.", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t</div>
\t\t\t\t";
        }
        // line 314
        echo "
\t\t\t</div>
\t\t</div>
\t</div>

\t<div class=\"tab-pane fade\" id=\"replies-tab-content\" role=\"tabpanel\" aria-labelledby=\"replies-tab\">
\t\t";
        // line 336
        echo "
\t    <div class=\"card\">
\t        <div class=\"card-content\">
\t            <div id=\"filter-loader\"><div class=\"lds-ring\"><div></div><div></div><div></div><div></div></div></div>
\t            <div class=\"card-titles\">
\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t<h6>";
        // line 342
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Formulier reacties", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t";
        // line 343
        if ((twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", true, true, false, 343) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 343)))) {
            // line 344
            echo "\t\t\t\t\t\t\t\t\t\t<a class=\"btn\" href=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers_export", ["id" => twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 344)]), "html", null, true);
            echo "\" class=\"float-end\">Exporteren</a>
\t\t\t\t\t\t\t\t\t";
        }
        // line 346
        echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"table-responsive\">
\t\t            <table class=\"table\" id=\"qsort\">
\t\t                <thead>
\t\t                    <tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<th style=\"width: 200px;\">";
        // line 352
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Datum", [], "cms"), "html", null, true);
        echo "</th>
\t                        <th style=\"width: 200px;\">";
        // line 353
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("IP-adres", [], "cms"), "html", null, true);
        echo "</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t<th>";
        // line 354
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Naam", [], "cms"), "html", null, true);
        echo "</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t<th style=\"width: 350px;\">";
        // line 355
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("E-mailadres", [], "cms"), "html", null, true);
        echo "</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t<th style=\"width: 150px;\">";
        // line 356
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Telefoonnummer", [], "cms"), "html", null, true);
        echo "</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 357
        if (($context["hasNewsletter"] ?? null)) {
            // line 358
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th class=\"center-align\" style=\"width: 100px;\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuwsbrief", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 360
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<th style=\"width: 50px;\"></th>
\t\t                    </tr>
\t\t                </thead>
\t\t                <tbody id=\"filter-results\"></tbody>
\t\t            </table>
\t\t\t\t\t\t\t</div>

\t            ";
        // line 367
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 367))) {
            // line 368
            echo "\t            <div class=\"pagination-wrapper d-flex justify-content-between\">
\t                <ul id=\"pagination\" class=\"pagination left\"></ul>

\t                <select class=\"form-select w-auto\" name=\"per_page\" id=\"per_page\" onchange=\"filterList(1);\">
\t                    <option value=\"10\">";
            // line 372
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("10 per pagina", [], "cms"), "html", null, true);
            echo "</option>
\t                    <option value=\"20\" selected>";
            // line 373
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("20 per pagina", [], "cms"), "html", null, true);
            echo "</option>
\t                    <option value=\"50\">";
            // line 374
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("50 per pagina", [], "cms"), "html", null, true);
            echo "</option>
\t                    <option value=\"100\">";
            // line 375
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("100 per pagina", [], "cms"), "html", null, true);
            echo "</option>
\t                </select>
\t            </div>
\t            ";
        }
        // line 379
        echo "\t        </div>
\t    </div>

\t    ";
        // line 382
        if ( !(null === twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 382))) {
            // line 383
            echo "\t\t\t<script>
\t\t\t\tvar current_page = 1;
\t\t\t\tvar filterUrl = '";
            // line 385
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers_filter", ["formid" => twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 385)]), "html", null, true);
            echo "';
\t\t\t\tfunction filterList(p){
\t\t\t\t\tcurrent_page = p;
\t\t\t\t\t\$('#filter-loader').show();
\t\t\t\t\tvar query = '/' + current_page + '?' + \$('#filter-form').serialize() + '&pp=' + \$('#per_page').val();;
\t\t\t\t\t\$.ajax(filterUrl + query).done(function(response){

\t\t\t\t\t\t\$('#filter-results').html('');
\t\t\t\t\t\tif(response.count){
\t\t\t\t\t\t\t\$.each(response.results, function(ind, p){
\t\t\t\t\t\t\t\tvar tr = \$('<tr>');

\t\t\t\t\t\t\t\ttr.append('<td data-url=\"";
            // line 397
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers", ["id" => twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 397)]), "html", null, true);
            echo "/' + p.id + '\">' + p.date + '</td>');
\t\t\t\t\t\t\t\t\t\t\ttr.append('<td data-url=\"";
            // line 398
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers", ["id" => twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 398)]), "html", null, true);
            echo "/' + p.id + '\">' + (p.ip == 'null' ? '----' : p.ip) + '</td>');
\t\t\t\t\t\t\t\ttr.append('<td data-url=\"";
            // line 399
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers", ["id" => twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 399)]), "html", null, true);
            echo "/' + p.id + '\">' + p.name + '</td>');
\t\t\t\t\t\t\t\ttr.append('<td data-url=\"";
            // line 400
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers", ["id" => twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 400)]), "html", null, true);
            echo "/' + p.id + '\">' + p.email + '</td>');
\t\t\t\t\t\t\t\ttr.append('<td data-url=\"";
            // line 401
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers", ["id" => twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 401)]), "html", null, true);
            echo "/' + p.id + '\">' + p.phone + '</td>');
\t\t\t\t\t\t\t\t";
            // line 402
            if (($context["hasNewsletter"] ?? null)) {
                // line 403
                echo "\t\t\t\t\t\t\t\t\ttr.append('<td class=\"center-align\" data-url=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers", ["id" => twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "id", [], "any", false, false, false, 403)]), "html", null, true);
                echo "/' + p.id + '\">' + p.nieuwsbrief + '</td>');
\t\t\t\t\t\t\t\t";
            }
            // line 405
            echo "\t\t\t\t\t\t\t\ttr.append('<td class=\"action\"><a href=\"#\" onclick=\"cpop.confirm( \\'";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u deze reactie verwijderen?", [], "cms"), "html", null, true);
            echo "\\', function(){ window.location = \\'";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_answers_delete");
            echo "/' + p.id + '\\'; } ); return false;\"><i class=\"far fa-trash-alt\"></i></a></td>');

\t\t\t\t\t\t\t\t\$('#filter-results').append(tr);
\t\t\t\t\t\t\t});
\t\t\t\t\t\t}else{
\t\t\t\t\t\t\t\$('#filter-results').append('<tr><td colspan=\"5\" class=\"center-align\"><em>";
            // line 410
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Geen resultaten gevonden.", [], "cms"), "html", null, true);
            echo "</em></td></tr>');
\t\t\t\t\t\t}

\t\t\t\t\t\t\$('td[data-url]').css('cursor', 'pointer').click(function(){
\t\t\t\t\t\t\t// window.location = \$(this).data('url');
\t\t\t\t\t\t\tcpop.reset().loadAjax(\$(this).data('url'));
\t\t\t\t\t\t});

\t\t\t\t\t\t\$('#pagination').html('');



\t\t\t\t\t\tif (response.page > 1) {
\t\t\t\t\t\t\t\$('#pagination').append(\$('<li class=\"page-item\"><a class=\"page-link\" href=\"javascript:prevPage();\"><i class=\"fa fa-chevron-left\"></i></a></li>'));
\t\t\t\t\t\t}else{
\t\t\t\t\t\t\t\$('#pagination').append(\$('<li class=\"page-item disabled\"><a class=\"page-link\" href=\"#!\"><i class=\"fa fa-chevron-left\"></i></a></li>'));
\t\t\t\t\t\t}

\t\t\t\t\t\t\$.each(paginationParser(parseInt(response.page), parseInt(response.pages)), function(x, i){
\t\t\t\t\t\t\tif(i == '...'){
\t\t\t\t\t\t\t\t\$('#pagination').append(\$('<span class=\"sep-dots\">...</span>'));
\t\t\t\t\t\t\t}else{
\t\t\t\t\t\t\t\t\$('#pagination').append(\$('<li class=\"page-item' + (response.page == i ? ' active' : '') + '\"><a class=\"page-link\" href=\"javascript:filterList(' + i + ');\">' + i + '</a></li>'));
\t\t\t\t\t\t\t}
\t\t\t\t\t\t});

\t\t\t\t\t\tif (response.page < response.pages) {
\t\t\t\t\t\t\t\$('#pagination').append(\$('<li class=\"page-item\"><a class=\"page-link\" href=\"javascript:nextPage();\"><i class=\"fa fa-chevron-right\"></i></a></li>'));
\t\t\t\t\t\t}else{
\t\t\t\t\t\t\t\$('#pagination').append(\$('<li class=\"page-item disabled\"><a class=\"page-link\" href=\"#!\"><i class=\"fa fa-chevron-right\"></i></a></li>'));
\t\t\t\t\t\t}

\t\t\t\t\t\t\$('#filter-loader').hide();
\t\t\t\t\t});
\t\t\t\t}

\t\t\t\tfunction nextPage(){
\t\t\t\t\tfilterList(current_page + 1);
\t\t\t\t}

\t\t\t\tfunction prevPage(){
\t\t\t\t\tfilterList(current_page - 1);
\t\t\t\t}

\t\t\t\t\$(function(){
\t\t\t\t\tfilterList(1);
\t\t\t\t});
\t\t\t</script>
\t    ";
        }
        // line 459
        echo "\t</div>
\t</div>

<input type=\"hidden\" id=\"inline_save\" name=\"inline_save\" value=\"0\" />
<input type=\"hidden\" name=\"delete\" />

<div class=\"btn-bar\">
\t<div class=\"right\">
\t  <button type=\"button\" onclick=\"\$('#inline_save').val('1');\$('form').submit();\" class=\"btn btn-flat\"><i class=\"fa fa-save\"></i> ";
        // line 467
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Toepassen", [], "cms"), "html", null, true);
        echo "</button>
\t  <button type=\"button\" onclick=\"\$('form').submit();\" class=\"btn\"><i class=\"fa fa-check\"></i> ";
        // line 468
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Opslaan en sluiten", [], "cms"), "html", null, true);
        echo "</button>
\t</div>
</div>

";
        // line 472
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        echo "

<!-- Modal Structure -->
<div id=\"modal1\" class=\"modal\">
\t<div class=\"modal-dialog\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<h5 class=\"modal-title\">";
        // line 479
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Veld opties", [], "cms"), "html", null, true);
        echo "</h5>
\t\t\t\t<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-sm-4\">
\t\t\t\t\t\t<input id=\"option_classes\" type=\"text\">
\t\t\t\t\t\t<label for=\"option_classes\">";
        // line 486
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("CSS classes", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"modal-footer\">
\t\t\t\t<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">";
        // line 491
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Toepassen", [], "cms"), "html", null, true);
        echo "</button>
\t\t\t</div>
\t\t</div>
\t</div>
</div>



<div id=\"delete-question\" class=\"modal modal-fixed-footer\">
\t<div class=\"modal-dialog\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-body\">
\t\t\t\t<h4>";
        // line 503
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Vraag verwijderen", [], "cms"), "html", null, true);
        echo "</h4>
\t\t\t\t";
        // line 504
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Weet u zeker dat u de vraag wilt verwijderen?", [], "cms"), "html", null, true);
        echo "
\t\t\t\t<input type=\"hidden\" name=\"question_id\" />
\t\t\t</div>
\t\t\t<div class=\"modal-footer\">
\t\t\t\t<a href=\"#!\" class=\"do-remove waves-effect waves-green btn green darken-1\">";
        // line 508
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Ja, verwijderen", [], "cms"), "html", null, true);
        echo "</a>
\t\t\t\t<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">";
        // line 509
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sluiten", [], "cms"), "html", null, true);
        echo "</button>
\t\t\t</div>
\t\t</div>
\t</div>
</div>

";
    }

    // line 516
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 517
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/bundles/trinityforms/admin/css/editor.css"), "html", null, true);
        echo "\">
";
    }

    // line 519
    public function block_scripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 520
        echo "<script>
var path = '";
        // line 521
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_forms_addrow", ["id" => 1, "type" => ""]), "html", null, true);
        echo "/';
</script>
";
        // line 524
        echo "<script>
var formeditor_newoption = '";
        // line 525
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuwe optie", [], "cms");
        echo "';
var formeditor_block = '";
        // line 526
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Blokkeren", [], "cms");
        echo "';
var formeditor_standard = '";
        // line 527
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Standard", [], "cms");
        echo "';
var formeditor_email = '";
        // line 528
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("E-mailadres keuze", [], "cms");
        echo "';
</script>
<script type=\"text/javascript\" src=\"";
        // line 530
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/bundles/trinityforms/admin/js/editor.js"), "html", null, true);
        echo "\"></script>
<script>
var field = null;
// \$('#modal1').modal('open');
/*
\$('#modal1').modal({
\tready: function(modal, trigger) {
\t\tfield = trigger.parent().parent();
\t\tconsole.log( field );
\t\t\$('#option_classes').val(field.find('input.classes').val());
\t},
\tcomplete: function() {
\t\tconsole.log( field );
\t}
});
*/

// \$('#modal1').modal('show');


\$(function(){
\t\$('#modal1').on('shown.bs.modal', function (e) {
\t\tconsole.log(e);
\t\t// field = trigger.parent().parent();
\t\t// console.log( field );
\t\t// \$('#option_classes').val(field.find('input.classes').val());
\t});
\t\$('#modal1').on('hide.bs.modal', function (e) {
\t\t// Close action
\t});
});



var myToolBar = [
\t{
\t\tname: 'document',
\t\titems: [
\t\t\t'Bold',
\t\t\t'Italic',
\t\t\t'Underline',
\t\t\t'Subscript',
\t\t\t'Superscript',
\t\t\t'RemoveFormat',
\t\t\t'BulletedList',
\t\t\t'Outdent',
\t\t\t'Indent',
\t\t\t'Blockquote',
\t\t\t'JustifyLeft',
\t\t\t'JustifyCenter',
\t\t\t'JustifyRight',
\t\t\t'JustifyBlock',
\t\t\t'Link',
\t\t\t'Unlink',
\t\t\t'Image',
\t\t\t'FontSize',
\t\t\t'TextColor',
\t\t\t'Sourcedialog'
\t\t]
\t},
\t'/',
\t{ name: 'styles', items: [ 'Format', 'Styles' ] },
];
var custom_config = {};
custom_config.toolbar = myToolBar;
\$.each(\$('.c-ckeditor'), function(ind, el){
\tCKEDITOR.replace(el, custom_config);
});
function addEmail(){
\tvar el = \$('<div class=\"row\">\\
\t\t\t<div class=\"col-sm-12\">\\
\t\t\t\t\t<div class=\"card\">\\
\t\t\t\t\t\t\t<div class=\"card-content\">\\
\t\t\t\t\t\t\t\t\t<textarea class=\"c-ckeditor form-control\"></textarea>\\
\t\t\t\t\t\t\t</div>\\
\t\t\t\t\t</div>\\
\t\t\t</div>\\
\t</div>');
\tel.insertBefore('#new-email-wrapper');
\t\$.each(el.find('.c-ckeditor'), function(ind, el){
\t\tconsole.log( el );
\t\tCKEDITOR.replace(el, custom_config);
\t});
}

\$(document).ready(function(){
\t\$('.do-remove').click(function(){
\t\tvar id = \$('#delete-question input[name=\"question_id\"]').val();
\t\t\$('#q-' + id).parent().remove();
\t\t\$('#delete-question').modal('hide');
\t\tcheckSortSizes();
\t});
    // \"fix\" item dragging in firefox (tested with 60.1)
    var dragItems = document.querySelectorAll('[draggable=true]');

    for (var i = 0; i < dragItems.length; i++)
    {
        addEventListener.call(dragItems[i], 'dragstart', function (event) {
            // store the ID of the element, and collect it on the drop later on
            event.dataTransfer.setData('Text', this.id);
        })
    }

\tfunction toggleActiveCampaignFields(){
\t\tif(\$('#form_active_campaign:checked').length > 0){
\t\t\t// Enabled
\t\t\t\$('#form_active_campaign_key').parent().show();
\t\t\t\$('#form_active_campaign_listid').parent().show();
\t\t}else{
\t\t\t// Disabled
\t\t\t\$('#form_active_campaign_key').parent().hide();
\t\t\t\$('#form_active_campaign_listid').parent().hide();
\t\t}
\t}
\t\$('#form_active_campaign').click(function(){
\t\ttoggleActiveCampaignFields();
\t});

\ttoggleActiveCampaignFields();
});
</script>

<script>
var callerEl = null;
function addMedia(el){
\tcallerEl = \$(el);
\tcpop.reset().loadAjax('";
        // line 656
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_popup", ["parentid" => null]);
        echo "');
\treturn false;
}
function clickedPopupMedia(mediaid, filepath, label, width){
\t\$('#meta-field-' + mediaField).val(filepath);
\t\$('#meta-image-' + mediaField).html('<img src=\"' + filepath + '\" style=\"max-width: 100%;max-height: 100%;\" /><button style=\"\" type=\"button\" onclick=\"deleteMetaImage(' + mediaField + ');\" class=\"btn red darken-1 del_btn\"><i class=\"material-icons\">delete</i></button>');
\t\$('#meta-imageselect-' + mediaField).hide();
\tcpop.close();
}
function deleteMetaImage(id){
\t\$('#meta-field-' + id).val('');
\t\$('#meta-image-' + id).html('');
\t\$('#meta-imageselect-' + id).show();
}
</script>
";
    }

    public function getTemplateName()
    {
        return "@TrinityForms/forms/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1290 => 656,  1161 => 530,  1156 => 528,  1152 => 527,  1148 => 526,  1144 => 525,  1141 => 524,  1136 => 521,  1133 => 520,  1129 => 519,  1122 => 517,  1118 => 516,  1107 => 509,  1103 => 508,  1096 => 504,  1092 => 503,  1077 => 491,  1069 => 486,  1059 => 479,  1049 => 472,  1042 => 468,  1038 => 467,  1028 => 459,  976 => 410,  965 => 405,  959 => 403,  957 => 402,  953 => 401,  949 => 400,  945 => 399,  941 => 398,  937 => 397,  922 => 385,  918 => 383,  916 => 382,  911 => 379,  904 => 375,  900 => 374,  896 => 373,  892 => 372,  886 => 368,  884 => 367,  875 => 360,  869 => 358,  867 => 357,  863 => 356,  859 => 355,  855 => 354,  851 => 353,  847 => 352,  839 => 346,  833 => 344,  831 => 343,  827 => 342,  819 => 336,  811 => 314,  805 => 311,  802 => 310,  800 => 309,  797 => 308,  794 => 307,  786 => 304,  774 => 302,  770 => 300,  757 => 298,  753 => 297,  749 => 296,  742 => 295,  740 => 294,  727 => 292,  724 => 291,  719 => 289,  714 => 288,  712 => 287,  708 => 286,  697 => 285,  695 => 284,  692 => 283,  690 => 282,  679 => 281,  676 => 280,  674 => 279,  669 => 277,  666 => 276,  661 => 275,  658 => 274,  655 => 273,  653 => 272,  645 => 266,  636 => 260,  623 => 258,  618 => 257,  605 => 246,  601 => 245,  595 => 242,  591 => 241,  585 => 237,  572 => 235,  568 => 234,  563 => 232,  557 => 229,  553 => 228,  545 => 223,  535 => 215,  526 => 209,  513 => 207,  508 => 206,  497 => 196,  484 => 194,  480 => 193,  475 => 191,  469 => 188,  465 => 187,  459 => 184,  455 => 183,  449 => 180,  445 => 179,  438 => 175,  425 => 164,  419 => 162,  416 => 161,  402 => 160,  400 => 159,  397 => 158,  395 => 157,  393 => 156,  388 => 155,  383 => 152,  380 => 151,  362 => 150,  359 => 149,  356 => 148,  354 => 147,  348 => 143,  342 => 141,  339 => 140,  333 => 138,  331 => 137,  327 => 136,  323 => 135,  319 => 134,  315 => 133,  311 => 132,  307 => 131,  303 => 130,  299 => 129,  295 => 128,  291 => 127,  287 => 126,  283 => 125,  279 => 124,  275 => 123,  271 => 122,  264 => 118,  258 => 114,  253 => 111,  250 => 110,  244 => 109,  234 => 106,  226 => 105,  223 => 104,  220 => 103,  216 => 102,  211 => 101,  209 => 100,  205 => 99,  201 => 97,  199 => 96,  192 => 92,  188 => 91,  180 => 86,  171 => 80,  163 => 75,  155 => 70,  147 => 65,  139 => 60,  133 => 59,  126 => 55,  120 => 54,  113 => 50,  109 => 49,  67 => 10,  60 => 5,  56 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityForms/forms/edit.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/FormsBundle/Resources/views/forms/edit.html.twig");
    }
}
