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

/* @Cms/interface.html.twig */
class __TwigTemplate_c19ddac377bfb21cc72f52b82be3bb0d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'stylesheet' => [$this, 'block_stylesheet'],
            'breadcrumbs' => [$this, 'block_breadcrumbs'],
            'catselect' => [$this, 'block_catselect'],
            'body' => [$this, 'block_body'],
            'javascript' => [$this, 'block_javascript'],
            'scripts' => [$this, 'block_scripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Cms/interface.html.twig"));

        // line 1
        $context["r"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1, $this->source); })()), "request", [], "any", false, false, false, 1), "attributes", [], "any", false, false, false, 1), "get", [0 => "_route"], "method", false, false, false, 1);
        // line 3
        echo "
<!DOCTYPE html>
<html>
\t\t<head>
\t\t\t\t<title>";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["trinity"]) || array_key_exists("trinity", $context) ? $context["trinity"] : (function () { throw new RuntimeError('Variable "trinity" does not exist.', 7, $this->source); })()), "html", null, true);
        echo "</title>

\t\t\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
\t\t\t\t<meta name=\"robots\" content=\"noindex,nofollow\"/>

\t\t\t\t";
        // line 24
        echo "
\t\t\t\t";
        // line 25
        if (file_exists("trinity.css")) {
            // line 26
            echo "\t\t\t\t\t\t<link rel=\"stylesheet\" href=\"/trinity.css\">
\t\t\t\t";
        }
        // line 28
        echo "
\t\t\t\t";
        // line 29
        if (array_key_exists("ck_mediadir_id", $context)) {
            // line 30
            echo "\t\t\t\t\t\t";
            $context["ck_mediadir_id"] = (isset($context["ck_mediadir_id"]) || array_key_exists("ck_mediadir_id", $context) ? $context["ck_mediadir_id"] : (function () { throw new RuntimeError('Variable "ck_mediadir_id" does not exist.', 30, $this->source); })());
            // line 31
            echo "\t\t\t\t";
        } else {
            // line 32
            echo "\t\t\t\t\t\t";
            $context["ck_mediadir_id"] = 0;
            // line 33
            echo "\t\t\t\t";
        }
        // line 34
        echo "
\t\t\t\t<script type=\"text/javascript\">
\t\t\t\t\tvar jsonUrl         = '";
        // line 36
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_adminjson");
        echo "/';
\t\t\t\t\tvar ckAdminJsonUrl  = '";
        // line 37
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_adminjson");
        echo "';
\t\t\t\t\tvar ckAdminPageUrl  = '";
        // line 38
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_selector");
        echo "';
\t\t\t\t\tvar ckMediaUrl      = '";
        // line 39
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media", ["parentid" => (isset($context["ck_mediadir_id"]) || array_key_exists("ck_mediadir_id", $context) ? $context["ck_mediadir_id"] : (function () { throw new RuntimeError('Variable "ck_mediadir_id" does not exist.', 39, $this->source); })()), "type" => "image", "inline" => true]);
        echo "';
\t\t\t\t\tvar ckAdminMediaUrl = '";
        // line 40
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media", ["parentid" => (isset($context["ck_mediadir_id"]) || array_key_exists("ck_mediadir_id", $context) ? $context["ck_mediadir_id"] : (function () { throw new RuntimeError('Variable "ck_mediadir_id" does not exist.', 40, $this->source); })()), "type" => "image", "inline" => true]);
        echo "';
\t\t\t\t\tvar ckDropUploadUrl = '";
        // line 41
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media", ["parentid" => (isset($context["ck_mediadir_id"]) || array_key_exists("ck_mediadir_id", $context) ? $context["ck_mediadir_id"] : (function () { throw new RuntimeError('Variable "ck_mediadir_id" does not exist.', 41, $this->source); })()), "type" => "image", "inline" => true]);
        echo "';
\t\t\t\t\tvar baseUrl         = '";
        // line 42
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
        echo "';

\t\t\t\t\tvar selectedEditorIndex = 0;
\t\t\t\t\tvar editor = [];
\t\t\t\t\tvar cpop;

\t\t\t\t\tvar cpop_message_today = \"";
        // line 48
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Vandaag", [], "cms");
        echo "\";
\t\t\t\t\tvar cpop_message_close = \"";
        // line 49
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("OK", [], "cms");
        echo "\";
\t\t\t\t\tvar cpop_message_busyloading = \"";
        // line 50
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bezig met laden ...", [], "cms");
        echo "\";
\t\t\t\t\tvar cpop_message_imagenotloading = \"";
        // line 51
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("De afbeelding kon niet worden geladen.", [], "cms");
        echo "\";
\t\t\t\t\tvar cpop_message_timeout = \"";
        // line 52
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Timeout na", [], "cms");
        echo "\";
\t\t\t\t\tvar cpop_message_done = \"";
        // line 53
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("OK", [], "cms");
        echo "\";
\t\t\t\t\tvar cpop_message_yes = \"";
        // line 54
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Ja", [], "cms");
        echo "\";
\t\t\t\t\tvar cpop_message_clear = \"";
        // line 55
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wissen", [], "cms");
        echo "\";
\t\t\t\t\tvar cpop_message_cancel = \"";
        // line 56
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sluiten", [], "cms");
        echo "\";
\t\t\t\t\tvar cpop_message_empty = \"";
        // line 57
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Leegmaken", [], "cms");
        echo "\";
\t\t\t\t\tvar cpop_message_save = \"";
        // line 58
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Opslaan", [], "cms");
        echo "\";
\t\t\t\t\tvar cpop_message_alert_notcsv = \"";
        // line 59
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Het bestand kon niet toegevoegd worden. Controleer of deze van het type CSV is.", [], "cms");
        echo "\";

\t\t\t\t\tvar misc_chars = \"";
        // line 61
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tekens", [], "cms");
        echo "\";
\t\t\t\t</script>

\t\t\t\t";
        // line 64
        $this->displayBlock('stylesheet', $context, $blocks);
        // line 65
        echo "
\t\t\t\t<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css\">
\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/simplebar.css\">

\t\t\t\t<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css\">
\t\t\t\t<link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.15.3/css/all.css\">
\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/materialize/fonts/material/material-icons.css\">
\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/flag-css/css/flag-icon.min.css\">
\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/jquery-dropdown/jquery.dropdown.min.css\">
\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css\">

\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/css/v3.css?t=";
        // line 76
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Ymd"), "html", null, true);
        echo "\">
\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/css/testing.css?t=";
        // line 77
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Ymd"), "html", null, true);
        echo "\">

\t\t\t\t<script src=\"/bundles/cms/js/jquery-2.2.4.min.js\"></script>
\t\t\t\t";
        // line 81
        echo "\t\t\t\t<script defer src=\"/bundles/cms/simplebar.js\"></script>
\t\t\t\t<script src=\"/bundles/cms/ckeditor/ckeditor.js\"></script>
\t\t\t\t<script src=\"/bundles/cms/js/jquery.cpop_bootstrap.js\"></script>
\t\t\t\t<script src=\"/bundles/cms/jquery-match-height/dist/jquery.matchHeight-min.js\"></script>
\t\t\t\t<script src=\"/bundles/cms/js.cookie.min.js\"></script>
\t\t\t\t<script src=\"/bundles/cms/list.min.js\"></script>

\t\t\t\t";
        // line 89
        echo "\t\t\t\t";
        // line 90
        echo "\t\t\t\t<script type=\"text/javascript\" src=\"https://cdn.jsdelivr.net/npm/toastify-js\"></script>
\t\t</head>

\t\t<body class=\"";
        // line 93
        echo (((twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 93, $this->source); })()), "user", [], "any", false, false, false, 93) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 93, $this->source); })()), "user", [], "any", false, false, false, 93), "dark", [], "any", false, false, false, 93))) ? ("dark") : (""));
        echo " ";
        echo ((twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 93, $this->source); })()), "test", [], "any", false, false, false, 93)) ? ("test-mode-on") : (""));
        echo "\">

\t\t";
        // line 96
        echo "
\t\t<div class=\"top-bar-bg\"></div>

\t\t<div class=\"top-bar\">
\t\t\t<div class=\"top-bar-buttons\">
\t      <div class=\"buttons-wrapper fixed\">
\t\t\t\t</div>
\t\t\t</div>
    </div>

\t  <div class=\"upload-progress-overlay screen-overlay\" id=\"upload-overlay\">
\t    <div class=\"vtable\">
\t      <div class=\"valign\">
\t        <div class=\"loading\"></div>
\t        <span>";
        // line 110
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bezig met uploaden..", [], "cms"), "html", null, true);
        echo "</span>

\t        <div class=\"progress-wrapper\" style=\"height: 17px;padding: 3px;border: solid 1px white;width: 20%;margin: 30px auto;border-radius: 10px;\">
\t          <div class=\"progress-bar\" style=\"background: white;height: 9px;border-radius: 10px;width: 0%;\"></div>
\t        </div>

\t        <div class=\"upload-error\"></div>
\t      </div>
\t    </div>
\t  </div>

\t  <div class=\"trinity-loader-overlay screen-overlay\" id=\"uiloader\">
\t    <div class=\"vtable\">
\t      <div class=\"valign\">
\t        <div class=\"loading\"></div>
\t        <span>";
        // line 125
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bezig met laden..", [], "cms"), "html", null, true);
        echo "</span>
\t      </div>
\t    </div>
\t  </div>

\t  ";
        // line 130
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 130, $this->source); })()), "session", [], "any", false, false, false, 130), "flashBag", [], "any", false, false, false, 130), "all", [], "method", false, false, false, 130));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 131
            echo "\t    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 132
                echo "\t      <script>
\t\t\tToastify({
\t\t\t\ttext: '<div class=\"d-flex align-items-center\">";
                // line 134
                echo twig_escape_filter($this->env, $context["label"], "html", null, true);
                echo " ";
                echo $context["message"];
                echo "</div>',
\t\t\t\tduration: 30000,
\t\t\t\tescapeMarkup: false,
\t\t\t\tclose: false,
\t\t\t\tgravity: \"bottom\",
\t\t\t\tposition: \"right\",
\t\t\t\tstopOnFocus: true,
\t\t\t\tonClick: function(){}
\t\t\t}).showToast();
\t\t\t</script>
\t    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 145
            echo "\t  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['label'], $context['messages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 146
        echo "
\t  <div class=\"cache-clear-overlay screen-overlay\">
\t    <div class=\"vtable\">
\t      <div class=\"valign\">
\t        <div class=\"loading\"></div>
\t        <span>";
        // line 151
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cache wordt opgeschoond..", [], "cms"), "html", null, true);
        echo "</span>
\t      </div>
\t    </div>
\t  </div>

\t\t<div class=\"top-bar-btns-wrapper\">
\t\t\t<div class=\"buttons-left\">
\t\t\t\t<ul class=\"top-bar-btns\">
\t\t\t\t\t";
        // line 159
        $context["foundCurrent"] = false;
        // line 160
        echo "
\t\t\t\t\t";
        // line 161
        $context["hasFoundMultisite"] = false;
        // line 162
        echo "\t\t\t\t\t";
        if (( !twig_test_empty((isset($context["multisite"]) || array_key_exists("multisite", $context) ? $context["multisite"] : (function () { throw new RuntimeError('Variable "multisite" does not exist.', 162, $this->source); })())) && (twig_length_filter($this->env, (isset($context["multisite"]) || array_key_exists("multisite", $context) ? $context["multisite"] : (function () { throw new RuntimeError('Variable "multisite" does not exist.', 162, $this->source); })())) > 1))) {
            // line 163
            echo "
\t\t\t\t\t\t";
            // line 164
            $context["num"] = 0;
            // line 165
            echo "
\t\t\t\t\t\t";
            // line 166
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["multisite"]) || array_key_exists("multisite", $context) ? $context["multisite"] : (function () { throw new RuntimeError('Variable "multisite" does not exist.', 166, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["C"]) {
                // line 167
                echo "\t\t\t\t\t\t\t";
                if ((twig_get_attribute($this->env, $this->source, $context["C"], "language", [], "any", false, false, false, 167) == (isset($context["language"]) || array_key_exists("language", $context) ? $context["language"] : (function () { throw new RuntimeError('Variable "language" does not exist.', 167, $this->source); })()))) {
                    // line 168
                    echo "\t\t\t\t\t\t\t\t";
                    if ((twig_in_filter($context["C"], twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 168, $this->source); })()), "user", [], "any", false, false, false, 168), "sites", [], "any", false, false, false, 168)) || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 168, $this->source); })()), "user", [], "any", false, false, false, 168), "sites", [], "any", false, false, false, 168), "count", [], "any", false, false, false, 168) == 0))) {
                        // line 169
                        echo "\t\t\t\t\t\t\t\t\t";
                        $context["num"] = ((isset($context["num"]) || array_key_exists("num", $context) ? $context["num"] : (function () { throw new RuntimeError('Variable "num" does not exist.', 169, $this->source); })()) + 1);
                        // line 170
                        echo "\t\t\t\t\t\t\t\t";
                    }
                    // line 171
                    echo "\t\t\t\t\t\t\t";
                }
                // line 172
                echo "\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['C'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 173
            echo "
\t\t\t\t\t\t";
            // line 174
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["multisite_other"]) || array_key_exists("multisite_other", $context) ? $context["multisite_other"] : (function () { throw new RuntimeError('Variable "multisite_other" does not exist.', 174, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["C"]) {
                // line 175
                echo "\t\t\t\t\t\t\t";
                if ((twig_in_filter($context["C"], twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 175, $this->source); })()), "user", [], "any", false, false, false, 175), "sites", [], "any", false, false, false, 175)) || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 175, $this->source); })()), "user", [], "any", false, false, false, 175), "sites", [], "any", false, false, false, 175), "count", [], "any", false, false, false, 175) == 0))) {
                    // line 176
                    echo "\t\t\t\t\t\t\t\t";
                    $context["num"] = ((isset($context["num"]) || array_key_exists("num", $context) ? $context["num"] : (function () { throw new RuntimeError('Variable "num" does not exist.', 176, $this->source); })()) + 1);
                    // line 177
                    echo "\t\t\t\t\t\t\t";
                }
                // line 178
                echo "\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['C'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 179
            echo "
\t\t\t\t\t\t";
            // line 180
            if (((isset($context["num"]) || array_key_exists("num", $context) ? $context["num"] : (function () { throw new RuntimeError('Variable "num" does not exist.', 180, $this->source); })()) > 1)) {
                // line 181
                echo "\t\t\t\t\t\t\t";
                $context["hasFoundMultisite"] = true;
                // line 182
                echo "\t\t\t\t\t\t";
            }
            // line 183
            echo "
\t\t\t\t\t\t";
            // line 184
            if ((isset($context["hasFoundMultisite"]) || array_key_exists("hasFoundMultisite", $context) ? $context["hasFoundMultisite"] : (function () { throw new RuntimeError('Variable "hasFoundMultisite" does not exist.', 184, $this->source); })())) {
                // line 185
                echo "\t\t\t\t\t\t  <li id=\"language-dropdown\" class=\"language-dropdown-wrapper\">
\t\t\t\t\t\t      <span class=\"dropdown-toggle\" id=\"dropdownMultisites\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
\t\t\t\t\t\t        <i class=\"fa fa-link\"></i>
\t\t\t\t\t\t        <span class=\"label\">
\t\t\t\t\t\t          ";
                // line 189
                if ((isset($context["hasFoundMultisite"]) || array_key_exists("hasFoundMultisite", $context) ? $context["hasFoundMultisite"] : (function () { throw new RuntimeError('Variable "hasFoundMultisite" does not exist.', 189, $this->source); })())) {
                    // line 190
                    echo "\t\t\t\t\t\t            ";
                    if (( !twig_test_empty((isset($context["multisite"]) || array_key_exists("multisite", $context) ? $context["multisite"] : (function () { throw new RuntimeError('Variable "multisite" does not exist.', 190, $this->source); })())) && (twig_length_filter($this->env, (isset($context["multisite"]) || array_key_exists("multisite", $context) ? $context["multisite"] : (function () { throw new RuntimeError('Variable "multisite" does not exist.', 190, $this->source); })())) > 1))) {
                        // line 191
                        echo "\t\t\t\t\t\t              <span class=\"labels\">
\t\t\t\t\t\t                <b>";
                        // line 192
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 192, $this->source); })()), "label", [], "any", false, false, false, 192), "html", null, true);
                        echo "</b>
\t\t\t\t\t\t                <small>";
                        // line 193
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 193, $this->source); })()), "Host", [], "any", false, false, false, 193), "html", null, true);
                        echo "</small>
\t\t\t\t\t\t              </span>
\t\t\t\t\t\t              <i class=\"fa fa-angle-down\"></i>
\t\t\t\t\t\t            ";
                    }
                    // line 197
                    echo "\t\t\t\t\t\t          ";
                } else {
                    // line 198
                    echo "\t\t\t\t\t\t            ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 198, $this->source); })()), "label", [], "any", false, false, false, 198), "html", null, true);
                    echo "
\t\t\t\t\t\t          ";
                }
                // line 200
                echo "\t\t\t\t\t\t        </span>
\t\t\t\t\t\t      </span>

\t\t\t\t\t\t      <div  class=\"dropdown-menu\" aria-labelledby=\"dropdownMultisites\">
\t\t\t\t\t\t        ";
                // line 204
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["multisite"]) || array_key_exists("multisite", $context) ? $context["multisite"] : (function () { throw new RuntimeError('Variable "multisite" does not exist.', 204, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["C"]) {
                    // line 205
                    echo "\t\t\t\t\t\t          ";
                    if ((twig_get_attribute($this->env, $this->source, $context["C"], "language", [], "any", false, false, false, 205) == (isset($context["language"]) || array_key_exists("language", $context) ? $context["language"] : (function () { throw new RuntimeError('Variable "language" does not exist.', 205, $this->source); })()))) {
                        // line 206
                        echo "\t\t\t\t\t\t            ";
                        if ((twig_in_filter($context["C"], twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 206, $this->source); })()), "user", [], "any", false, false, false, 206), "sites", [], "any", false, false, false, 206)) || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 206, $this->source); })()), "user", [], "any", false, false, false, 206), "sites", [], "any", false, false, false, 206), "count", [], "any", false, false, false, 206) == 0))) {
                            // line 207
                            echo "\t\t\t\t\t\t              <a class=\"dropdown-item\" onclick=\"showUiLoader('";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "label", [], "any", false, false, false, 207), "html", null, true);
                            echo " wordt geladen')\" href=\"";
                            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 207, $this->source); })()), "request", [], "any", false, false, false, 207), "attributes", [], "any", false, false, false, 207), "get", [0 => "_route"], "method", false, false, false, 207), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 207, $this->source); })()), "request", [], "any", false, false, false, 207), "attributes", [], "any", false, false, false, 207), "get", [0 => "_route_params"], "method", false, false, false, 207)), "html", null, true);
                            echo "?msite=";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "id", [], "any", false, false, false, 207), "html", null, true);
                            echo "\">
\t\t\t\t\t\t                <b class=\"d-block\">";
                            // line 208
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "label", [], "any", false, false, false, 208), "html", null, true);
                            echo "</b>
\t\t\t\t\t\t                ";
                            // line 209
                            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["C"], "host", [], "any", false, false, false, 209))) {
                                // line 210
                                echo "\t\t\t\t\t\t                <small>
\t\t\t\t\t\t                  ";
                                // line 211
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "host", [], "any", false, false, false, 211), "html", null, true);
                                echo "
\t\t\t\t\t\t                </small>
\t\t\t\t\t\t                ";
                            }
                            // line 214
                            echo "\t\t\t\t\t\t              </a>
\t\t\t\t\t\t            ";
                        }
                        // line 216
                        echo "\t\t\t\t\t\t          ";
                    }
                    // line 217
                    echo "\t\t\t\t\t\t        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['C'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 218
                echo "
\t\t\t\t\t\t        ";
                // line 219
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["multisite_other"]) || array_key_exists("multisite_other", $context) ? $context["multisite_other"] : (function () { throw new RuntimeError('Variable "multisite_other" does not exist.', 219, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["C"]) {
                    // line 220
                    echo "\t\t\t\t\t\t          ";
                    if ((twig_in_filter($context["C"], twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 220, $this->source); })()), "user", [], "any", false, false, false, 220), "sites", [], "any", false, false, false, 220)) || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 220, $this->source); })()), "user", [], "any", false, false, false, 220), "sites", [], "any", false, false, false, 220), "count", [], "any", false, false, false, 220) == 0))) {
                        // line 221
                        echo "\t\t\t\t\t\t            <a class=\"list-group-item list-group-item-action\" onclick=\"showUiLoader('";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "label", [], "any", false, false, false, 221), "html", null, true);
                        echo " wordt geladen')\" href=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 221, $this->source); })()), "request", [], "any", false, false, false, 221), "attributes", [], "any", false, false, false, 221), "get", [0 => "_route"], "method", false, false, false, 221), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 221, $this->source); })()), "request", [], "any", false, false, false, 221), "attributes", [], "any", false, false, false, 221), "get", [0 => "_route_params"], "method", false, false, false, 221)), "html", null, true);
                        echo "?msite=";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "id", [], "any", false, false, false, 221), "html", null, true);
                        echo "&mlang=";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["C"], "language", [], "any", false, false, false, 221), "id", [], "any", false, false, false, 221), "html", null, true);
                        echo "\">
\t\t\t\t\t\t              <b class=\"d-block\">";
                        // line 222
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "label", [], "any", false, false, false, 222), "html", null, true);
                        echo "</b>
\t\t\t\t\t\t              ";
                        // line 223
                        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["C"], "host", [], "any", false, false, false, 223))) {
                            // line 224
                            echo "\t\t\t\t\t\t              <small>
\t\t\t\t\t\t                <i class=\"fa fa-link\"></i>
\t\t\t\t\t\t                ";
                            // line 226
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "host", [], "any", false, false, false, 226), "html", null, true);
                            echo "
\t\t\t\t\t\t              </small>
\t\t\t\t\t\t              ";
                        }
                        // line 229
                        echo "\t\t\t\t\t\t            </a>
\t\t\t\t\t\t          ";
                    }
                    // line 231
                    echo "\t\t\t\t\t\t        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['C'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 232
                echo "\t\t\t\t\t\t      </div>
\t\t\t\t\t\t  </li>
\t\t\t\t\t\t";
            }
            // line 235
            echo "\t\t\t\t\t";
        }
        // line 236
        echo "
\t\t\t\t\t";
        // line 237
        if ((twig_length_filter($this->env, (isset($context["languages"]) || array_key_exists("languages", $context) ? $context["languages"] : (function () { throw new RuntimeError('Variable "languages" does not exist.', 237, $this->source); })())) > 1)) {
            // line 238
            echo "\t\t\t\t\t\t<li id=\"langSelector\">
\t\t\t\t\t\t\t";
            // line 239
            if ((((twig_length_filter($this->env, (isset($context["languages"]) || array_key_exists("languages", $context) ? $context["languages"] : (function () { throw new RuntimeError('Variable "languages" does not exist.', 239, $this->source); })())) > 1) && (twig_length_filter($this->env, (isset($context["languages_available"]) || array_key_exists("languages_available", $context) ? $context["languages_available"] : (function () { throw new RuntimeError('Variable "languages_available" does not exist.', 239, $this->source); })())) > 1)) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 239, $this->source); })()), "user", [], "any", false, false, false, 239), "languages", [], "any", false, false, false, 239)) != 1))) {
                // line 240
                echo "\t\t\t\t\t\t\t\t\t<span class=\"dropdown-toggle\" id=\"dropdownLanguages\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
\t\t\t\t\t\t\t\t\t\t<div class=\"current-flag flag-icon flag-icon-";
                // line 241
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["language"]) || array_key_exists("language", $context) ? $context["language"] : (function () { throw new RuntimeError('Variable "language" does not exist.', 241, $this->source); })()), "locale", [], "any", false, false, false, 241), "html", null, true);
                echo "\" data-info=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["language"]) || array_key_exists("language", $context) ? $context["language"] : (function () { throw new RuntimeError('Variable "language" does not exist.', 241, $this->source); })()), "label", [], "any", false, false, false, 241), "html", null, true);
                echo "\"></div>
\t\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t\t<ul id=\"langSelect\" class=\"dropdown-menu\" aria-labelledby=\"dropdownLanguages\">
\t\t\t\t\t\t\t\t\t\t";
                // line 245
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["languages_available"]) || array_key_exists("languages_available", $context) ? $context["languages_available"] : (function () { throw new RuntimeError('Variable "languages_available" does not exist.', 245, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["Language"]) {
                    // line 246
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                    $context["isCurrent"] = false;
                    // line 247
                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                    if (((twig_in_filter($context["Language"], twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 247, $this->source); })()), "user", [], "any", false, false, false, 247), "languages", [], "any", false, false, false, 247)) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 247, $this->source); })()), "user", [], "any", false, false, false, 247), "languages", [], "any", false, false, false, 247)) > 1)) || (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                     // line 248
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 248, $this->source); })()), "user", [], "any", false, false, false, 248), "languages", [], "any", false, false, false, 248)) == 0))) {
                        // line 249
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"dropdown-item\" onclick=\"showUiLoader('";
                        // line 250
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Language"], "label", [], "any", false, false, false, 250), "html", null, true);
                        echo " wordt geladen')\" href=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_switch_language", ["locale" => twig_get_attribute($this->env, $this->source, $context["Language"], "locale", [], "any", false, false, false, 250), "url" => twig_urlencode_filter($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 250, $this->source); })()), "request", [], "any", false, false, false, 250), "attributes", [], "any", false, false, false, 250), "get", [0 => "_route"], "method", false, false, false, 250), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 250, $this->source); })()), "request", [], "any", false, false, false, 250), "attributes", [], "any", false, false, false, 250), "get", [0 => "_route_params"], "method", false, false, false, 250))), "msite" => ((twig_get_attribute($this->env, $this->source, ($context["siteToLang"] ?? null), twig_get_attribute($this->env, $this->source, $context["Language"], "id", [], "any", false, false, false, 250), [], "array", true, true, false, 250)) ? (twig_get_attribute($this->env, $this->source, (isset($context["siteToLang"]) || array_key_exists("siteToLang", $context) ? $context["siteToLang"] : (function () { throw new RuntimeError('Variable "siteToLang" does not exist.', 250, $this->source); })()), twig_get_attribute($this->env, $this->source, $context["Language"], "id", [], "any", false, false, false, 250), [], "array", false, false, false, 250)) : (0))]), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"flag-icon flag-icon-";
                        // line 251
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Language"], "locale", [], "any", false, false, false, 251), "html", null, true);
                        echo "\"></span>";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Language"], "label", [], "any", false, false, false, 251), "html", null, true);
                        (((isset($context["isCurrent"]) || array_key_exists("isCurrent", $context) ? $context["isCurrent"] : (function () { throw new RuntimeError('Variable "isCurrent" does not exist.', 251, $this->source); })())) ? (print (twig_escape_filter($this->env, ((" <strong class=\"grey lighten-2 right\">" . $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("huidig domein", [], "cms")) . "</strong>"), "html", null, true))) : (print ("")));
                        echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 254
                    echo "\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Language'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 255
                echo "\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t";
            }
            // line 257
            echo "\t\t\t\t\t\t</li>
\t\t\t\t\t";
        }
        // line 259
        echo "
\t\t\t\t\t";
        // line 260
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
            // line 261
            echo "\t\t\t\t\t\t<li class=\"clear-cache\">
\t\t\t\t\t\t\t<a class=\"dropdown-toggle\" title=\"";
            // line 262
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cache wissen", [], "cms"), "html", null, true);
            echo "\" id=\"dropdownMenuButton1\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-sync-alt\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton1\">
\t\t\t\t\t\t\t\t<li><a class=\"dropdown-item\" onclick=\"return cache_clear();\">";
            // line 266
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cache wissen", [], "cms"), "html", null, true);
            echo "</a></li>
\t\t\t\t\t\t\t\t<li><a class=\"dropdown-item\" onclick=\"return php_cache_clear();\">";
            // line 267
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("PHP cache wissen", [], "cms"), "html", null, true);
            echo "</a></li>
\t\t\t\t\t\t\t\t";
            // line 271
            echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
        } else {
            // line 274
            echo "\t\t\t\t\t\t<li class=\"clear-cache\">
\t\t\t\t\t\t\t<a class=\"dropdown-toggle\" onclick=\"return cache_clear();\" title=\"";
            // line 275
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cache wissen", [], "cms"), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-sync-alt\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
        }
        // line 280
        echo "
\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"//";
        // line 282
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 282, $this->source); })()), "host", [], "any", false, false, false, 282), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Website bekijken", [], "cms"), "html", null, true);
        echo "\" target=\"blank\" data-bs-toggle=\"tooltip\" data-bs-placement=\"bottom\" data-bs-html=\"true\">
\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-external-link-alt\"></i>
\t\t\t\t\t\t\t";
        // line 285
        echo "\t\t\t\t\t\t</a>
\t\t\t\t\t</li>

\t\t\t\t\t";
        // line 288
        if (twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 288, $this->source); })()), "test", [], "any", false, false, false, 288)) {
            // line 289
            echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"";
            // line 290
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_settings");
            echo "\" title=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("<h6 class='mt-3'>Test modus aan</h6><p>Alle e-mails worden naar <i>systeem admin e-mailadres</i> verstuurd.<p><p>Ga naar <i>Configuratie</i> om de status te wijzigen.</p>", [], "cms");
            echo "\" data-bs-toggle=\"tooltip\" data-bs-placement=\"bottom\" data-bs-html=\"true\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-exclamation-triangle\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
        }
        // line 295
        echo "\t\t\t\t</ul>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"buttons-right\">
\t\t\t\t<ul class=\"top-bar-btns\">
\t\t\t\t\t<li class=\"site-types\">
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t";
        // line 302
        if ( !twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 302, $this->source); })()), "isCatalog", [], "any", false, false, false, 302)) {
            // line 303
            echo "\t\t\t\t\t\t\t\t<li class=\"active\">
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 304
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Website beheren", [], "cms"), "html", null, true);
            echo "\" data-bs-toggle=\"tooltip\" data-bs-placement=\"bottom\" data-bs-html=\"true\">
\t\t\t\t\t\t\t\t\t\t<?xml version=\"1.0\" encoding=\"utf-8\"?>
\t\t\t\t\t\t\t\t\t\t<svg version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"
\t\t\t\t\t\t\t\t\t\t\t viewBox=\"0 0 89 90.12\" style=\"enable-background:new 0 0 89 90.12;\" xml:space=\"preserve\">
\t\t\t\t\t\t\t\t\t\t<g>
\t\t\t\t\t\t\t\t\t\t\t<path d=\"M44.7,90.03L44.7,90.03c-1.6,0-2.8-1.3-2.8-2.8v-47.9c0-1.6,1.3-2.8,2.8-2.8l0,0c1.6,0,2.8,1.3,2.8,2.8v47.8
\t\t\t\t\t\t\t\t\t\t\t\tC47.5,88.73,46.2,90.03,44.7,90.03z\"/>
\t\t\t\t\t\t\t\t\t\t\t<path d=\"M86.2,71.83L86.2,71.83c-1.6,0-2.8-1.3-2.8-2.8v-47.9c0-1.6,1.3-2.8,2.8-2.8l0,0c1.6,0,2.8,1.3,2.8,2.8v47.8
\t\t\t\t\t\t\t\t\t\t\t\tC89,70.53,87.7,71.83,86.2,71.83z\"/>
\t\t\t\t\t\t\t\t\t\t\t<path d=\"M88.7,68.03L88.7,68.03c0.7,1.4,0.1,3.1-1.4,3.8l-41.5,18c-1.4,0.7-3.1,0.1-3.8-1.4l0,0
\t\t\t\t\t\t\t\t\t\t\t\tc-0.7-1.4-0.1-3.1,1.4-3.8l41.5-18C86.4,66.03,88.1,66.63,88.7,68.03z\"/>
\t\t\t\t\t\t\t\t\t\t\t<path d=\"M88.7,19.93L88.7,19.93c0.7,1.4,0.1,3.1-1.4,3.8l-41.5,18c-1.4,0.7-3.1,0.1-3.8-1.4l0,0
\t\t\t\t\t\t\t\t\t\t\t\tc-0.7-1.4-0.1-3.1,1.4-3.8l41.5-18C86.4,17.93,88.1,18.53,88.7,19.93z\"/>
\t\t\t\t\t\t\t\t\t\t\t<path d=\"M2.8,71.83L2.8,71.83c1.6,0,2.8-1.3,2.8-2.8v-47.9c0-1.6-1.3-2.8-2.8-2.8l0,0c-1.6,0-2.8,1.3-2.8,2.8v47.8
\t\t\t\t\t\t\t\t\t\t\t\tC0,70.53,1.3,71.83,2.8,71.83z\"/>
\t\t\t\t\t\t\t\t\t\t\t<path d=\"M0.3,68.03L0.3,68.03c-0.7,1.4-0.1,3.1,1.4,3.8l41.5,18c1.4,0.7,3.1,0.1,3.8-1.4l0,0c0.7-1.4,0.1-3.1-1.4-3.8
\t\t\t\t\t\t\t\t\t\t\t\tL4,66.63C2.6,66.03,0.9,66.63,0.3,68.03z\"/>
\t\t\t\t\t\t\t\t\t\t\t<path d=\"M0.3,19.93L0.3,19.93c-0.7,1.4-0.1,3.1,1.4,3.8l41.5,18c1.4,0.7,3.1,0.1,3.8-1.4l0,0c0.7-1.4,0.1-3.1-1.4-3.8
\t\t\t\t\t\t\t\t\t\t\t\tL4,18.53C2.6,17.93,0.9,18.53,0.3,19.93z\"/>
\t\t\t\t\t\t\t\t\t\t\t<path d=\"M42.1,1.63L42.1,1.63c-0.7,1.4-0.1,3.1,1.4,3.8l23,9.9c1.4,0.7,3.1,0.1,3.8-1.4l0,0c0.7-1.4,0.1-3.1-1.4-3.8
\t\t\t\t\t\t\t\t\t\t\t\tl-23-9.8C44.5-0.37,42.8,0.23,42.1,1.63z\"/>
\t\t\t\t\t\t\t\t\t\t\t<path d=\"M46.9,1.63L46.9,1.63c0.7,1.4,0.1,3.1-1.4,3.8L4,23.43c-1.4,0.6-3.1,0-3.7-1.4l0,0c-0.7-1.4-0.1-3.1,1.4-3.8
\t\t\t\t\t\t\t\t\t\t\t\tl41.5-18C44.5-0.37,46.2,0.23,46.9,1.63z\"/>
\t\t\t\t\t\t\t\t\t\t</g>
\t\t\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            // line 331
            if ((array_key_exists("installed", $context) && twig_in_filter("WebshopBundle", (isset($context["installed"]) || array_key_exists("installed", $context) ? $context["installed"] : (function () { throw new RuntimeError('Variable "installed" does not exist.', 331, $this->source); })())))) {
                // line 332
                echo "\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 333
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_webshop");
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Webshop beheren", [], "cms"), "html", null, true);
                echo "\" data-bs-toggle=\"tooltip\" data-bs-placement=\"bottom\" data-bs-html=\"true\">
\t\t\t\t\t\t\t\t\t\t\t<?xml version=\"1.0\" encoding=\"utf-8\"?>
\t\t\t\t\t\t\t\t\t\t\t<svg version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"
\t\t\t\t\t\t\t\t\t\t\t\t viewBox=\"0 0 89 90.1\" style=\"enable-background:new 0 0 89 90.1;\" xml:space=\"preserve\">
\t\t\t\t\t\t\t\t\t\t\t<g>
\t\t\t\t\t\t\t\t\t\t\t\t<path d=\"M85.2,9.7H27.9c-1.9,0-3.5,1.6-3.5,3.5s1.6,3.5,3.5,3.5h53.8V42l-51.8,7.5l-13.3-42c-1-4.3-5.1-7.3-9.7-7.3h-3
\t\t\t\t\t\t\t\t\t\t\t\t\tC2,0.2,0.4,1.7,0.4,3.7S2,7.2,3.9,7.2h3c1.4,0,2.7,0.9,3,2c0,0.1,0,0.2,0.1,0.3l13,41.1l-3.8,0.6h-0.1c-5.7,1-9.4,4.8-9.4,9.8
\t\t\t\t\t\t\t\t\t\t\t\t\tc0,5.4,4.4,9.9,9.9,9.9h56c1.9,0,3.5-1.6,3.5-3.5s-1.6-3.5-3.5-3.5h-56c-1.6,0-2.9-1.3-2.9-2.9c0-2.1,2.6-2.7,3.4-2.9l65.5-9.5
\t\t\t\t\t\t\t\t\t\t\t\t\tc1.7-0.3,3-1.7,3-3.5V13.2C88.7,11.3,87.1,9.7,85.2,9.7z\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<path d=\"M27.9,76.6c-3.7,0-6.7,3-6.7,6.7s3,6.7,6.7,6.7s6.7-3,6.7-6.7S31.6,76.6,27.9,76.6z\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<path d=\"M69.3,76.6c-3.7,0-6.7,3-6.7,6.7s3,6.7,6.7,6.7s6.7-3,6.7-6.7S73,76.6,69.3,76.6z\"/>
\t\t\t\t\t\t\t\t\t\t\t</g>
\t\t\t\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t";
            }
            // line 349
            echo "\t\t\t\t\t\t\t";
        }
        // line 350
        echo "\t\t\t\t\t\t\t";
        if ((array_key_exists("installed", $context) && twig_in_filter("BekokeuringBundle", (isset($context["installed"]) || array_key_exists("installed", $context) ? $context["installed"] : (function () { throw new RuntimeError('Variable "installed" does not exist.', 350, $this->source); })())))) {
            // line 351
            echo "\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
            // line 352
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_bekokeuring");
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Keuring beheren", [], "cms"), "html", null, true);
            echo "\" data-bs-toggle=\"tooltip\" data-bs-placement=\"bottom\" data-bs-html=\"true\">
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-vial\"></i>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
        }
        // line 357
        echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</li>

\t\t\t\t\t";
        // line 360
        if ((array_key_exists("installed", $context) && twig_in_filter("TicketsBundle", (isset($context["installed"]) || array_key_exists("installed", $context) ? $context["installed"] : (function () { throw new RuntimeError('Variable "installed" does not exist.', 360, $this->source); })())))) {
            // line 361
            echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"";
            // line 362
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_tickets");
            echo "\">
\t\t\t\t\t\t\t\t<i class=\"far fa-fw fa-calendar-alt\"></i>
\t\t\t\t\t\t\t\t";
            // line 365
            echo "\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
        }
        // line 368
        echo "
\t\t\t\t\t<li>
\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"";
        // line 370
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_profile");
        echo "\"  title=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Profiel", [], "cms"), "html", null, true);
        echo "\" data-bs-toggle=\"tooltip\" data-bs-placement=\"bottom\" data-bs-html=\"true\">
\t\t\t\t\t\t\t<span class=\"d-flex align-items-center\">
\t\t\t\t\t\t\t\t<span class=\"avatar\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-user\"></i>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t<span class=\"username\">
\t\t\t\t\t\t\t<span class=\"name\">";
        // line 376
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 376, $this->source); })()), "user", [], "any", false, false, false, 376), "name", [], "any", false, false, false, 376))) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 376, $this->source); })()), "user", [], "any", false, false, false, 376), "name", [], "any", false, false, false, 376), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Profiel", [], "cms"), "html", null, true);
        }
        echo "</span>
\t\t\t\t\t\t\t\t\t";
        // line 377
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 377, $this->source); })()), "user", [], "any", false, false, false, 377), "email", [], "any", false, false, false, 377))) {
            echo "<span class=\"sub\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 377, $this->source); })()), "user", [], "any", false, false, false, 377), "email", [], "any", false, false, false, 377), "html", null, true);
            echo "</span>";
        }
        // line 378
        echo "\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>

\t\t\t\t\t";
        // line 383
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_PREVIOUS_ADMIN")) {
            // line 384
            echo "\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"?_switch_user=_exit\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-fw orange-text fa-ban\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
        }
        // line 390
        echo "
\t\t\t\t\t<li>
\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"";
        // line 392
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\LogoutUrlExtension']->getLogoutPath("admin_secured_area"), "html", null, true);
        echo "\"  title=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uitloggen", [], "cms"), "html", null, true);
        echo "\" data-bs-toggle=\"tooltip\" data-bs-placement=\"bottom\" data-bs-html=\"true\">
\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-power-off\"></i>
\t\t\t\t\t\t\t";
        // line 395
        echo "\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>

\t\t<div class=\"side-bar-wrapper\">
\t\t\t<div class=\"logobox\">
\t\t\t\t<div class=\"logobox-content\">
\t\t\t\t\t";
        // line 404
        if (file_exists("trinity.svg")) {
            // line 405
            echo "\t\t\t\t\t\t<a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
            echo "\" class=\"logo-icon\" title=\"Easify v";
            echo twig_escape_filter($this->env, (isset($context["version"]) || array_key_exists("version", $context) ? $context["version"] : (function () { throw new RuntimeError('Variable "version" does not exist.', 405, $this->source); })()), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("trinity.svg"), "html", null, true);
            echo "\"/></a>
\t\t\t\t\t";
        } else {
            // line 407
            echo "\t\t\t\t\t\t<a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
            echo "\" class=\"logo-icon\" title=\"Easify v";
            echo twig_escape_filter($this->env, (isset($context["version"]) || array_key_exists("version", $context) ? $context["version"] : (function () { throw new RuntimeError('Variable "version" does not exist.', 407, $this->source); })()), "html", null, true);
            echo "\"><img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/images/logo_icon.svg"), "html", null, true);
            echo "\"/></a>
\t\t\t\t\t";
        }
        // line 409
        echo "\t\t\t\t\t<span class=\"logo-name\">
\t\t\t\t\t\tEasify
\t\t\t\t\t\t<span class=\"logo-tagline\">A Symfony CMS</span>
\t\t\t\t\t</span>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"side-bar\">
\t\t\t\t<div class=\"side-bar-scroll\" data-simplebar>
\t\t\t\t\t<div class=\"side-bar-inner\">
\t\t\t\t\t\t";
        // line 419
        $this->loadTemplate("@Cms/menu/main.html.twig", "@Cms/interface.html.twig", 419)->display(twig_array_merge($context, ["Settings" =>         // line 420
(isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 420, $this->source); })())]));
        // line 422
        echo "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>

\t  <div class=\"trinity-wrapper\">
\t\t\t<div class=\"toggle-mobile d-lg-none\">
\t\t\t\t<span class=\"side-bar-toggle\">
\t\t\t\t\t<i class=\"fa fa-fw fa-bars\"></i>
\t\t\t\t</span>
\t\t\t</div>

\t\t\t<div class=\"container\">
\t\t\t\t";
        // line 439
        echo "
\t\t\t\t<div class=\"breadcrumb-wrapper\">
\t\t\t\t\t";
        // line 441
        $this->displayBlock('breadcrumbs', $context, $blocks);
        // line 454
        echo "\t\t\t\t</div>

\t\t    <div class=\"main-wrapper\">
\t\t      <main>
\t\t        <div class=\"catselect\">
\t\t          ";
        // line 459
        $this->displayBlock('catselect', $context, $blocks);
        // line 460
        echo "\t\t        </div>
\t\t        ";
        // line 461
        $this->displayBlock('body', $context, $blocks);
        // line 462
        echo "\t\t      </main>
\t\t\t\t</div>
\t\t\t</div>
\t  </div>

\t  <script>
\t    \$( window ).on( \"scroll load\", function() {
\t      var scroll = \$( window ).scrollTop();
\t      if ( scroll >= 71 ) {
\t        \$( \"body\" ).addClass( \"sticky\" );
\t      } else {
\t        \$( \"body\" ).removeClass( \"sticky\" );
\t      }

\t      var scroll = \$( window ).scrollTop();
\t      if ( scroll >= 60 ) {
\t        \$( \"body\" ).addClass( \"sticky-page-bar\" );
\t      } else {
\t        \$( \"body\" ).removeClass( \"sticky-page-bar\" );
\t      }

\t\t\t\t\$('.simplebar-scroll-content').on('scroll', function() {
\t\t\t\t    \$('.side-bar-wrapper').toggleClass('scrolled-sidebar', \$(this).scrollTop() > 1);
\t\t\t\t});
\t    } );
\t  </script>

\t  ";
        // line 490
        echo "\t  <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/jquery-ui-1.11.4.custom/jquery-ui.js"), "html", null, true);
        echo "\"></script>

\t  ";
        // line 493
        echo "\t  <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/nestedSortable/jquery.mjs.nestedSortable.js"), "html", null, true);
        echo "\"></script>

\t  ";
        // line 496
        echo "\t  <script src=\"https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js\"></script>
\t  <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css\" />
\t  <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css\" />

\t  <script type=\"text/javascript\" src=\"";
        // line 500
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/js/script.js"), "html", null, true);
        echo "?t=";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Ymd"), "html", null, true);
        echo "\"></script>
\t  <script type=\"text/javascript\" src=\"";
        // line 501
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/responsive_waterfall/responsive_waterfall.js"), "html", null, true);
        echo "\"></script>
\t  <script type=\"text/javascript\" src=\"";
        // line 502
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/jquery-dropdown/jquery.dropdown.js"), "html", null, true);
        echo "\"></script>

\t  <script type=\"text/javascript\">
\t    // \$( document ).ready( function() {
\t    //   \$( '.modal' ).modal();
\t    //   \$( '.tooltipped' ).tooltip( { delay: 50 } );
\t    // } );

\t    jQuery( '.hamburger' ).click( function( e ) {
\t      jQuery( this ).toggleClass( 'is-active' );
\t      jQuery( document.body ).toggleClass( 'menu' );
\t    } );

\t    jQuery( '#profile-image img' ).on( 'click', function( e ) {
\t      jQuery( '#profile-image ul.nav' ).show();
\t    } );

\t    jQuery( document.body ).on( 'click', function( e ) {
\t      if ( e.target != \$( '#profile-image img' )[ 0 ] ) {
\t        jQuery( '#profile-image ul.nav' ).hide();
\t      }
\t    } );

\t    jQuery( '.treetoggle a' ).click( function( e ) {
\t      jQuery( document.body ).toggleClass( 'treeview' );
\t    } );

\t    if ( \$( '.tabs' ).length > 0 ) {
\t      \$( '.tabs li:not(.no-tab)' ).click( function() {
\t        \$( '.tabs li, .tc' ).removeClass( 'active' );
\t        var index = \$( this ).addClass( 'active' ).index();
\t        \$( '.tc' ).eq( index ).addClass( 'active' );
\t      } );
\t    }

\t    // SPOTLIGHT

\t    var typeTimer = null;

\t    var spotlightOpen = false;

\t    // Key codes
\t    var enter = 13;
\t    var escape = 27;
\t    var p = 80;
\t    var f = 70;
\t    var d = 68;
\t    var up = 38;
\t    var down = 40;
\t    var spacebar = 32;

\t    var firstUrl = null;

\t    \$( document.body ).keydown( function( event ) {
\t      if ( event.which == spacebar && ( event.ctrlKey ) ) {
\t        event.preventDefault();
\t        if ( spotlightOpen ) {
\t          closeSpotlight();
\t        } else {
\t          openSpotlight();
\t        }
\t      }
\t      if ( event.which == d && ( event.ctrlKey ) ) {
\t        event.preventDefault();
\t        switchDarkMode();
\t      }
\t    } ).keyup( function( event ) {
\t      if ( event.which == escape ) {
\t        closeSpotlight();
\t      }
\t      if ( event.which == enter && spotlightOpen ) {
\t        event.preventDefault();
\t        if ( \$( '.sl-results a.default' ).length > 0 ) {
\t          window.location = \$( '.sl-results a.default' ).attr( 'href' );
\t        }
\t      }
\t      if ( event.which == up && spotlightOpen ) {
\t        event.preventDefault();
\t        \$( '.sl-window input' )[ 0 ].blur();
\t        if ( \$( '.sl-results a.default' ).prev( 'a' ).length > 0 ) {
\t          \$( '.sl-results a.default' ).removeClass( 'default' ).prev( 'a' ).addClass( 'default' );
\t        }
\t      }
\t      if ( event.which == down && spotlightOpen ) {
\t        event.preventDefault();
\t        \$( '.sl-window input' )[ 0 ].blur();
\t        if ( \$( '.sl-results a.default' ).next( 'a' ).length > 0 ) {
\t          \$( '.sl-results a.default' ).removeClass( 'default' ).next( 'a' ).addClass( 'default' );
\t        }
\t      }
\t    } );

\t    \$( '.sl-backdrop' ).click( function() {
\t      closeSpotlight();
\t    } );

\t    function openSpotlight() {
\t      \$( document.body ).addClass( 'spotlight' );
\t      \$( '.sl-results' ).html( '' ).hide();
\t      firstUrl = null;
\t      var prevQ = '';
\t      \$( '.sl-window input' ).val( '' ).off( 'keyup' ).on( 'keyup', function() {
\t        var q = \$( this ).val();
\t        var q_el = \$( this );
\t        if ( prevQ != q ) {
\t          firstUrl = null;
\t          \$( '.sl-results' ).html( '' ).hide();
\t          prevQ = q;
\t          if ( typeTimer != null )
\t            clearTimeout( typeTimer );
\t          typeTimer = setTimeout( function() {
\t            if ( q == '' ) {
\t              \$( '.sl-results' ).html( '' ).hide();
\t            } else {
\t              var nr = 0;
\t              q_el.parent().append( \$( '<div class=\"spinner\"></div>' ) );
\t              \$.getJSON( '";
        // line 618
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("spotlight_search");
        echo "/' + q ).done( function( res ) {
\t                \$.each( res, function( group, results ) {
\t                  \$( '.sl-results' ).append( \$( '<span>' + group + '</span>' ) );
\t                  \$.each( results, function( url, label ) {
\t                    \$( '.sl-results' ).append( \$( '<a href=\"' + url + '\">' + label + '</span>' ) );
\t                    if ( firstUrl == null )
\t                      firstUrl = url;
\t                    nr++;
\t                  } );
\t                } );

\t                if ( nr == 0 ) {
\t                  \$( '.sl-results' ).append( \$( '<em>";
        // line 630
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Geen resultaten gevonden.", [], "cms");
        echo "</em>' ) );
\t                }

\t                \$( '.sl-results' ).show();
\t                \$( '.sl-results a' ).first().addClass( 'default' )
\t                \$( '.sl-window .spinner' ).remove();
\t              } );
\t            }
\t          }, 250 );
\t        }
\t      } );
\t      \$( '.sl-window input' )[ 0 ].focus();
\t      spotlightOpen = true;
\t    }

\t    function closeSpotlight() {
\t      \$( '.sl-window input' ).val( '' );
\t      \$( '.sl-results' ).html( '' ).hide();
\t      \$( document.body ).removeClass( 'spotlight' );
\t      spotlightOpen = false;
\t    }

\t    if ( \$( window ).width() <= 1300 && \$( window ).width() >= 900 ) {
\t      \$( 'body' ).addClass( 'nav-collapse' );
\t    }
\t    \$( window ).resize( function() {
\t      if ( \$( window ).width() <= 1300 && \$( window ).width() >= 900 ) {
\t        \$( 'body' ).addClass( 'nav-collapse' );
\t      } else {
\t        \$( 'body' ).removeClass( 'nav-collapse' );
\t      }
\t    } );

\t    function switchDarkMode() {
\t      if ( \$( 'body' ).hasClass( 'dark' ) ) {
\t        var checked = 0;
\t      } else {
\t        var checked = 1;
\t      }
\t      \$( 'body' ).toggleClass( 'dark' );
\t      \$.ajax( '";
        // line 670
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_profile_dark");
        echo "/' + checked );
\t    }

\t    function cache_clear( extended ) {
\t      if ( typeof extended == 'undefined' ) {
\t        extended = false;
\t        }
\t      \$( '.cache-clear-overlay' ).show();

\t\t\t\tvar toggleCacheUrl = jsonUrl+'page/pagecacheall';
\t\t\t\t\$.getJSON(toggleCacheUrl, function(response){
\t\t\t\t\tconsole.log(toggleCacheUrl);
\t\t\t\t\tconsole.log(response);
\t\t\t\t});

\t      window.location = '/bundles/cms/cache.php?extended=' + extended + '&url=";
        // line 685
        echo twig_escape_filter($this->env, twig_urlencode_filter($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page")), "html", null, true);
        echo "';

\t      return false;
\t    }

\t\tfunction php_cache_clear( extended ) {
\t      if ( typeof extended == 'undefined' ) {
\t        extended = false;
\t        }
\t      \$( '.cache-clear-overlay' ).show();

\t      window.location = '/bundles/cms/opcache.php?url=";
        // line 696
        echo twig_escape_filter($this->env, twig_urlencode_filter($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page")), "html", null, true);
        echo "';

\t      return false;
\t    }

\t    ";
        // line 701
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 701, $this->source); })()), "request", [], "any", false, false, false, 701), "query", [], "any", false, false, false, 701), "get", [0 => "clear"], "method", false, false, false, 701) == "cache")) {
            // line 702
            echo "\t      cache_clear( false );
\t    ";
        }
        // line 704
        echo "
\t    function openinbrowser_button() {
\t      ";
        // line 706
        if ((array_key_exists("Page", $context) &&  !(null === twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 706, $this->source); })()), "id", [], "any", false, false, false, 706)))) {
            // line 707
            echo "\t        if ( \$( '#view-live' ).length ) {
\t          \$.ajax( '";
            // line 708
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_ajax_pageid", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 708, $this->source); })()), "id", [], "any", false, false, false, 708)]), "html", null, true);
            echo "' ).done( function( r ) {
\t            if ( r.status === true ) {
\t              \$( '#view-live' ).prop( 'href', r.url ).show();
\t            }
\t          } );
\t        }
\t      ";
        }
        // line 715
        echo "\t    }

\t    openinbrowser_button();
\t  </script>

\t  <script>
\t    \$( function() {
\t      \$( \".toggle-fold\" ).click( function() {
\t        \$( \"body\" ).toggleClass( \"folded\" );
\t      } );

\t      \$( \".toggle-blocks\" ).click( function() {
\t        \$( \"body\" ).toggleClass( \"show-blocks\" );
\t      } );

\t      \$( \".block-select\" ).click( function() {
\t        \$( \"body\" ).removeClass( \"show-blocks\" );
\t      } );

\t      \$( \"#langSelector\" ).click( function() {
\t        \$( \"body\" ).toggleClass( \"language-dropdown\" );
\t      } );

\t      \$( \".tools > li.toggle-tool-nav > span\" ).click( function() {
\t        \$( \"body\" ).toggleClass( \"tools-dropdown\" );
\t      } );

\t      \$( \".tools .toggle-list-view\" ).click( function() {
\t        \$( \"body\" ).toggleClass( \"blocks-list-view\" );
\t        \$( \"body\" ).removeClass( \"tools-dropdown\" );
\t      } );

\t      \$( \".toggle-pagetree\" ).click( function() {
\t        \$( \"body\" ).toggleClass( \"treebox-sidebar\" );
\t      } );

\t      \$( \".blocks-wrapper .block-select .large-preview\" ).hover( function() {
\t        \$( this ).closest( \".block-select\" ).toggleClass( \"show-preview\" );
\t      } );

\t      \$( \".toggle-mobile-nav\" ).click( function() {
\t        \$( \"body\" ).toggleClass( \"side-bar-open\" );
\t        \$( \"body\" ).removeClass( \"btn-bar-open\" );
\t      } );

\t      \$( \".btn-bar .btn-bar-toggle\" ).click( function() {
\t        \$( \"body\" ).toggleClass( \"btn-bar-open\" );
\t      } );
\t    } );
\t  </script>

\t  <script>
\t    \$( window ).load( function() {
\t      if ( !\$( \"body\" ).hasClass( \"page-overview\" ) ) {
\t        if ( ( \$( window ).innerWidth() > 992 ) && ( \$( window ).innerWidth() < 1400 ) ) {
\t          \$( \"body\" ).addClass( 'folded' );
\t        } else {
\t          \$( \"body\" ).removeClass( 'folded' );
\t        }

\t        \$( window ).resize( function() {
\t          if ( ( \$( window ).innerWidth() > 992 ) && ( \$( window ).innerWidth() < 1400 ) ) {
\t            \$( \"body\" ).addClass( 'folded' );
\t          } else {
\t            \$( \"body\" ).removeClass( 'folded' );
\t          }
\t        } );
\t      }
\t    } );

\t    \$( window ).load( function() {
\t      if ( \$( \"body\" ).hasClass( \"page-overview\" ) ) {
\t        if ( ( \$( window ).innerWidth() > 992 ) ) {
\t          \$( \"body\" ).addClass( 'folded' );
\t        } else {
\t          \$( \"body\" ).removeClass( 'folded' );
\t        }

\t        \$( window ).resize( function() {
\t          if ( ( \$( window ).innerWidth() > 992 ) ) {
\t            \$( \"body\" ).addClass( 'folded' );
\t          } else {
\t            \$( \"body\" ).removeClass( 'folded' );
\t          }
\t        } );
\t      }
\t    } );
\t  </script>

\t  ";
        // line 804
        $this->displayBlock('javascript', $context, $blocks);
        // line 805
        echo "\t  ";
        $this->displayBlock('scripts', $context, $blocks);
        // line 806
        echo "\t  <link rel=\"stylesheet\" type=\"text/css\" href=\"/bundles/cms/ckeditor/materialize.css\">

\t  <script>
\t    \$( function() {
\t      if ( \$( '.btn-bar' ).length == 0 ) {
\t        \$( 'body' ).append( \$( '<div class=\"btn-bar\"></div>' ) );
\t      }
\t      if ( \$( '.btn-bar > .left' ).length == 0 ) {
\t        \$( '.btn-bar' ).append( \$( '<div class=\"left\"></div>' ) );
\t      }

\t      // \$(\".btn-bar\").prependTo(\"body\");

\t      // workaround google chrome: https://support.google.com/chrome/thread/3363391?msgid=3613215
\t      \$( '.datepicker' ).on( 'mousedown', function( e ) {
\t        e.preventDefault();
\t      } );
\t    } );

\t    \$( window ).load( function() {
\t      // Animate loader off screen
\t      \$( \"#uiloader\" ).fadeOut( \"slow\", function() {
\t        \$( \"#uiloader\" ).remove();
\t      } );
\t    } );

\t    \$( '.btn-bar ' ).append( \$( '<div class=\"btn-bar-toggle\"></div>' ) );
\t  </script>

\t  <!-- sticky side-bar header -->
\t  <script>
\t    var \$buttonsContainer = document.getElementById( \"buttons-wrapper\" );

\t    \$( \".simplebar-scroll-content\" ).scroll( function() {
\t      var scroll = \$( this ).scrollTop();
\t      if ( scroll >= \$buttonsContainer.offsetTop ) {
\t        \$( \"body\" ).addClass( \"sticky-buttons\" );
\t      } else {
\t        \$( \"body\" ).removeClass( \"sticky-buttons\" );
\t      }
\t    } );

\t    \$( \"#buttons-wrapper\" ).css( \"height\", \$( \".buttons\" ).outerHeight() );
\t  </script>

\t  <!-- Responsive table wrapper -->
\t  <script>
\t    \$( function() {
\t      \$( 'table.responsive-table' ).wrap( \"<div class='table-wrapper'></div>\" );
\t      \$( 'table.responsive-table' ).removeClass( 'responsive-table' );
\t    } );
\t  </script>

\t  <!-- Hide tooltip on click -->
\t  <script>
\t    \$( document ).ready( function() {
\t      \$( '.tooltipped' ).click( function() {
\t        \$( '.tooltipped' ).tooltip( \"hide\" );
\t      } );
\t    } );
\t  </script>

\t  <link rel=\"stylesheet\" type=\"text/css\" href=\"/bundles/cms/datetimepicker/build/jquery.datetimepicker.min.css\">
\t  <script src=\"/bundles/cms/datetimepicker/build/jquery.datetimepicker.full.js\"></script>

\t  <script>
\t    \$( function() {
\t      jQuery.datetimepicker.setLocale( 'nl' );
\t      if ( \$( '.trinity_datetime' ).length > 0 ) {
\t        \$( '.trinity_datetime' ).datetimepicker( { format: 'Y-m-d H:i' } );
\t      }
\t      if ( \$( '.trinity_time' ).length > 0 ) {
\t        \$( '.trinity_time' ).datetimepicker( { datepicker: false } );
\t      }
\t      if ( \$( '.trinity_date' ).length > 0 ) {
\t        \$( '.trinity_date' ).datetimepicker( { timepicker: false, format: 'Y-m-d' } );
\t      }
\t      if ( \$( '.trinity_datetime_inline' ).length > 0 ) {
\t        \$( '.trinity_datetime_inline' ).datetimepicker( { format: 'Y-m-d H:i', inline: true } );
\t      }
\t      if ( \$( '.trinity_time_inline' ).length > 0 ) {
\t        \$( '.trinity_time_inline' ).datetimepicker( { datepicker: false, inline: true } );
\t      }
\t      if ( \$( '.trinity_date_inline' ).length > 0 ) {
\t        \$( '.trinity_date_inline' ).datetimepicker( { timepicker: false, format: 'Y-m-d', inline: true } );
\t      }

\t      if ( \$( '.trinity_range_start' ).length > 0 && \$( '.trinity_range_end' ).length > 0 ) {
\t        \$( '.trinity_range_start' ).datetimepicker( {
\t          format: 'Y-m-d',
\t          onShow: function( ct ) {
\t            this.setOptions( {
\t              maxDate: \$( '.trinity_range_end' ).val()
\t                ? \$( '.trinity_range_end' ).val()
\t                : false
\t            } )
\t          },
\t          onSelectDate: function( ct, \$i ) {
\t            if ( typeof \$i.data( 'select' ) != 'undefined' ) {
\t              window[ \$i.data( 'select' ) ]();
\t            }
\t          },
\t          onSelectTime: function( ct, \$i ) {
\t            if ( typeof \$i.data( 'time' ) != 'undefined' ) {
\t              window[ \$i.data( 'time' ) ]();
\t            }
\t          },
\t          onShow: function( ct, \$i ) {
\t            if ( typeof \$i.data( 'show' ) != 'undefined' ) {
\t              window[ \$i.data( 'show' ) ]();
\t            }
\t          },
\t          onClose: function( ct, \$i ) {
\t            if ( typeof \$i.data( 'close' ) != 'undefined' ) {
\t              window[ \$i.data( 'close' ) ]();
\t            }
\t          },
\t          timepicker: false
\t        } );
\t        \$( '.trinity_range_end' ).datetimepicker( {
\t          format: 'Y-m-d',
\t          onShow: function( ct ) {
\t            this.setOptions( {
\t              minDate: \$( '.trinity_range_start' ).val()
\t                ? \$( '.trinity_range_start' ).val()
\t                : false
\t            } )
\t          },
\t          onSelectDate: function( ct, \$i ) {
\t            if ( typeof \$i.data( 'select' ) != 'undefined' ) {
\t              window[ \$i.data( 'select' ) ]();
\t            }
\t          },
\t          onSelectTime: function( ct, \$i ) {
\t            if ( typeof \$i.data( 'time' ) != 'undefined' ) {
\t              window[ \$i.data( 'time' ) ]();
\t            }
\t          },
\t          onShow: function( ct, \$i ) {
\t            if ( typeof \$i.data( 'show' ) != 'undefined' ) {
\t              window[ \$i.data( 'show' ) ]();
\t            }
\t          },
\t          onClose: function( ct, \$i ) {
\t            if ( typeof \$i.data( 'close' ) != 'undefined' ) {
\t              window[ \$i.data( 'close' ) ]();
\t            }
\t          },
\t          timepicker: false
\t        } );
\t      }
\t    } );

\t    function showUiLoader( lbl ) {
\t      \$( 'body' ).append( \$( '<div class=\"trinity-loader-overlay\" id=\"uiloader\">\\
\t\t\t\t\t\t<div class=\"vtable\">\\
\t\t\t\t\t\t\t<div class=\"valign\">\\
\t\t\t\t\t\t\t\t<div class=\"loading\"></div>\\
\t\t\t\t\t\t\t\t<span>' + lbl + '</span>\\
\t\t\t\t\t\t\t</div>\\
\t\t\t\t\t\t</div>\\
\t\t\t\t\t</div>' ) );
\t    }
\t  </script>

\t  <script>
\t    function activateVideo( el, env, url ) {
\t      var nel = \$( '<div>Ongeldige video</div>' );
\t      if ( env == 'youtube' ) {
\t        nel = \$( '<div class=\"embed-container\"><iframe id=\"ytplayer\" type=\"text/html\" width=\"720\" height=\"405\" src=\"' + url + '\" frameborder=\"0\" allowfullscreen></iframe></div>' );
\t      } else if ( env == 'vimeo' ) {
\t        nel = \$( '<div class=\"embed-container\"><iframe width=\"720\" height=\"405\" src=\"' + url + '\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>' );
\t      }

\t      var ps = \$( el ).closest( '.video-preset' );
\t      ps.replaceWith( nel );
\t    }
\t  </script>

\t\t<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4\" crossorigin=\"anonymous\"></script>
\t\t";
        // line 987
        echo "\t\t<script>
\t\t\tvar tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle=\"tooltip\"]'))
\t\t\tvar tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
\t\t\treturn new bootstrap.Tooltip(tooltipTriggerEl)
\t\t\t})
\t\t</script>
\t\t<script>
\t\t\tjQuery( '.side-bar-toggle' ).click( function( e ) {
\t\t\t\tjQuery( document.body ).toggleClass( 'folded' );
\t\t\t} );
\t\t</script>

\t\t";
        // line 1011
        echo "\t</body>
</html>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 64
    public function block_stylesheet($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheet"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 441
    public function block_breadcrumbs($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "breadcrumbs"));

        // line 442
        echo "\t\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t\t<div class=\"dropdown-toggle\" id=\"dropdownBreadcrumbs\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
\t\t\t\t\t\t\t\t<div class=\"title\">
\t\t\t\t\t\t\t\t\t\t";
        // line 445
        echo $this->extensions['WhiteOctober\BreadcrumbsBundle\Twig\Extension\BreadcrumbsExtension']->renderBreadcrumbs();
        echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t  <ul class=\"dropdown-menu\" aria-labelledby=\"dropdownBreadcrumbs\">
\t\t\t\t\t\t\t\t<li><h6 class=\"dropdown-header\">";
        // line 449
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Terug naar..", [], "cms"), "html", null, true);
        echo "</h6></li>
\t\t\t\t\t\t\t\t<div class=\"list\">";
        // line 450
        echo $this->extensions['WhiteOctober\BreadcrumbsBundle\Twig\Extension\BreadcrumbsExtension']->renderBreadcrumbs();
        echo "</div>
\t\t\t\t\t\t  </ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 459
    public function block_catselect($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "catselect"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 461
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 804
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascript"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 805
    public function block_scripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "scripts"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "@Cms/interface.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1617 => 805,  1605 => 804,  1593 => 461,  1581 => 459,  1570 => 450,  1566 => 449,  1559 => 445,  1554 => 442,  1547 => 441,  1535 => 64,  1526 => 1011,  1512 => 987,  1330 => 806,  1327 => 805,  1325 => 804,  1234 => 715,  1224 => 708,  1221 => 707,  1219 => 706,  1215 => 704,  1211 => 702,  1209 => 701,  1201 => 696,  1187 => 685,  1169 => 670,  1126 => 630,  1111 => 618,  992 => 502,  988 => 501,  982 => 500,  976 => 496,  970 => 493,  964 => 490,  935 => 462,  933 => 461,  930 => 460,  928 => 459,  921 => 454,  919 => 441,  915 => 439,  900 => 422,  898 => 420,  897 => 419,  885 => 409,  875 => 407,  865 => 405,  863 => 404,  852 => 395,  845 => 392,  841 => 390,  833 => 384,  831 => 383,  824 => 378,  818 => 377,  810 => 376,  799 => 370,  795 => 368,  790 => 365,  785 => 362,  782 => 361,  780 => 360,  775 => 357,  765 => 352,  762 => 351,  759 => 350,  756 => 349,  735 => 333,  732 => 332,  730 => 331,  698 => 304,  695 => 303,  693 => 302,  684 => 295,  674 => 290,  671 => 289,  669 => 288,  664 => 285,  657 => 282,  653 => 280,  645 => 275,  642 => 274,  637 => 271,  633 => 267,  629 => 266,  622 => 262,  619 => 261,  617 => 260,  614 => 259,  610 => 257,  606 => 255,  600 => 254,  591 => 251,  585 => 250,  582 => 249,  580 => 248,  578 => 247,  575 => 246,  571 => 245,  562 => 241,  559 => 240,  557 => 239,  554 => 238,  552 => 237,  549 => 236,  546 => 235,  541 => 232,  535 => 231,  531 => 229,  525 => 226,  521 => 224,  519 => 223,  515 => 222,  504 => 221,  501 => 220,  497 => 219,  494 => 218,  488 => 217,  485 => 216,  481 => 214,  475 => 211,  472 => 210,  470 => 209,  466 => 208,  457 => 207,  454 => 206,  451 => 205,  447 => 204,  441 => 200,  435 => 198,  432 => 197,  425 => 193,  421 => 192,  418 => 191,  415 => 190,  413 => 189,  407 => 185,  405 => 184,  402 => 183,  399 => 182,  396 => 181,  394 => 180,  391 => 179,  385 => 178,  382 => 177,  379 => 176,  376 => 175,  372 => 174,  369 => 173,  363 => 172,  360 => 171,  357 => 170,  354 => 169,  351 => 168,  348 => 167,  344 => 166,  341 => 165,  339 => 164,  336 => 163,  333 => 162,  331 => 161,  328 => 160,  326 => 159,  315 => 151,  308 => 146,  302 => 145,  283 => 134,  279 => 132,  274 => 131,  270 => 130,  262 => 125,  244 => 110,  228 => 96,  221 => 93,  216 => 90,  214 => 89,  205 => 81,  199 => 77,  195 => 76,  182 => 65,  180 => 64,  174 => 61,  169 => 59,  165 => 58,  161 => 57,  157 => 56,  153 => 55,  149 => 54,  145 => 53,  141 => 52,  137 => 51,  133 => 50,  129 => 49,  125 => 48,  116 => 42,  112 => 41,  108 => 40,  104 => 39,  100 => 38,  96 => 37,  92 => 36,  88 => 34,  85 => 33,  82 => 32,  79 => 31,  76 => 30,  74 => 29,  71 => 28,  67 => 26,  65 => 25,  62 => 24,  54 => 7,  48 => 3,  46 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% set r = app.request.attributes.get('_route') %}
{% trans_default_domain 'cms' %}

<!DOCTYPE html>
<html>
\t\t<head>
\t\t\t\t<title>{{trinity}}</title>

\t\t\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
\t\t\t\t<meta name=\"robots\" content=\"noindex,nofollow\"/>

\t\t\t\t{#
\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/css/interface.css\">
\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/css/jquery.cpop.css\">
\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/css/select2.css\">
\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/css/mobile.css\">

\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/materialize/css/materialize.min.css\">
\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/css/style.css?t={{'now'|date('Ymd')}}\">
\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/css/custom.css?t={{'now'|date('Ymd')}}\">
\t\t\t\t<link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/icon?family=Material+Icons\">
\t\t\t\t<link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i|Roboto:400,400i,700,700i\">
\t\t\t\t#}

\t\t\t\t{% if file_exists('trinity.css') %}
\t\t\t\t\t\t<link rel=\"stylesheet\" href=\"/trinity.css\">
\t\t\t\t{% endif %}

\t\t\t\t{% if ck_mediadir_id is defined %}
\t\t\t\t\t\t{% set ck_mediadir_id = ck_mediadir_id %}
\t\t\t\t{% else %}
\t\t\t\t\t\t{% set ck_mediadir_id = 0 %}
\t\t\t\t{% endif %}

\t\t\t\t<script type=\"text/javascript\">
\t\t\t\t\tvar jsonUrl         = '{{path('_adminjson')}}/';
\t\t\t\t\tvar ckAdminJsonUrl  = '{{path('_adminjson')}}';
\t\t\t\t\tvar ckAdminPageUrl  = '{{path('admin_page_selector')}}';
\t\t\t\t\tvar ckMediaUrl      = '{{path('admin_media', {parentid: ck_mediadir_id, type: 'image', inline: true})|raw}}';
\t\t\t\t\tvar ckAdminMediaUrl = '{{path('admin_media', {parentid: ck_mediadir_id, type: 'image', inline: true})|raw}}';
\t\t\t\t\tvar ckDropUploadUrl = '{{path('admin_media', {parentid: ck_mediadir_id, type: 'image', inline: true})|raw}}';
\t\t\t\t\tvar baseUrl         = '{{path('admin')}}';

\t\t\t\t\tvar selectedEditorIndex = 0;
\t\t\t\t\tvar editor = [];
\t\t\t\t\tvar cpop;

\t\t\t\t\tvar cpop_message_today = \"{{ 'Vandaag' | trans | raw }}\";
\t\t\t\t\tvar cpop_message_close = \"{{ 'OK' | trans | raw }}\";
\t\t\t\t\tvar cpop_message_busyloading = \"{{ 'Bezig met laden ...' | trans | raw }}\";
\t\t\t\t\tvar cpop_message_imagenotloading = \"{{ 'De afbeelding kon niet worden geladen.' | trans | raw }}\";
\t\t\t\t\tvar cpop_message_timeout = \"{{ 'Timeout na' | trans | raw }}\";
\t\t\t\t\tvar cpop_message_done = \"{{ 'OK' | trans | raw }}\";
\t\t\t\t\tvar cpop_message_yes = \"{{ 'Ja' | trans | raw }}\";
\t\t\t\t\tvar cpop_message_clear = \"{{ 'Wissen' | trans | raw }}\";
\t\t\t\t\tvar cpop_message_cancel = \"{{ 'Sluiten' | trans | raw }}\";
\t\t\t\t\tvar cpop_message_empty = \"{{ 'Leegmaken' | trans | raw }}\";
\t\t\t\t\tvar cpop_message_save = \"{{ 'Opslaan' | trans | raw }}\";
\t\t\t\t\tvar cpop_message_alert_notcsv = \"{{ 'Het bestand kon niet toegevoegd worden. Controleer of deze van het type CSV is.' | trans | raw }}\";

\t\t\t\t\tvar misc_chars = \"{{ 'tekens' | trans | raw }}\";
\t\t\t\t</script>

\t\t\t\t{% block stylesheet %}{% endblock %}

\t\t\t\t<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css\">
\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/simplebar.css\">

\t\t\t\t<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css\">
\t\t\t\t<link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.15.3/css/all.css\">
\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/materialize/fonts/material/material-icons.css\">
\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/flag-css/css/flag-icon.min.css\">
\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/jquery-dropdown/jquery.dropdown.min.css\">
\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css\">

\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/css/v3.css?t={{'now'|date('Ymd')}}\">
\t\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/css/testing.css?t={{'now'|date('Ymd')}}\">

\t\t\t\t<script src=\"/bundles/cms/js/jquery-2.2.4.min.js\"></script>
\t\t\t\t{# <script src=\"/bundles/cms/materialize/js/materialize.min.js\"></script> #}
\t\t\t\t<script defer src=\"/bundles/cms/simplebar.js\"></script>
\t\t\t\t<script src=\"/bundles/cms/ckeditor/ckeditor.js\"></script>
\t\t\t\t<script src=\"/bundles/cms/js/jquery.cpop_bootstrap.js\"></script>
\t\t\t\t<script src=\"/bundles/cms/jquery-match-height/dist/jquery.matchHeight-min.js\"></script>
\t\t\t\t<script src=\"/bundles/cms/js.cookie.min.js\"></script>
\t\t\t\t<script src=\"/bundles/cms/list.min.js\"></script>

\t\t\t\t{# TOAST :: JS #}
\t\t\t\t{# <script src=\"/bundles/cms/js/Toast.min.js\"></script> #}
\t\t\t\t<script type=\"text/javascript\" src=\"https://cdn.jsdelivr.net/npm/toastify-js\"></script>
\t\t</head>

\t\t<body class=\"{{app.user and app.user.dark ? 'dark' : ''}} {{Settings.test ? 'test-mode-on' : ''}}\">

\t\t{# <div class=\"body-bg\" style=\"{% block bgimage %}background-image:url('{{Settings.getBackground}}'); background-repeat: no-repeat; background-size: cover; background-position: top center; background-attachment: fixed;{% endblock %}\"></div> #}

\t\t<div class=\"top-bar-bg\"></div>

\t\t<div class=\"top-bar\">
\t\t\t<div class=\"top-bar-buttons\">
\t      <div class=\"buttons-wrapper fixed\">
\t\t\t\t</div>
\t\t\t</div>
    </div>

\t  <div class=\"upload-progress-overlay screen-overlay\" id=\"upload-overlay\">
\t    <div class=\"vtable\">
\t      <div class=\"valign\">
\t        <div class=\"loading\"></div>
\t        <span>{{ 'Bezig met uploaden..' | trans }}</span>

\t        <div class=\"progress-wrapper\" style=\"height: 17px;padding: 3px;border: solid 1px white;width: 20%;margin: 30px auto;border-radius: 10px;\">
\t          <div class=\"progress-bar\" style=\"background: white;height: 9px;border-radius: 10px;width: 0%;\"></div>
\t        </div>

\t        <div class=\"upload-error\"></div>
\t      </div>
\t    </div>
\t  </div>

\t  <div class=\"trinity-loader-overlay screen-overlay\" id=\"uiloader\">
\t    <div class=\"vtable\">
\t      <div class=\"valign\">
\t        <div class=\"loading\"></div>
\t        <span>{{ 'Bezig met laden..' | trans }}</span>
\t      </div>
\t    </div>
\t  </div>

\t  {% for label, messages in app.session.flashBag.all() %}
\t    {% for message in messages %}
\t      <script>
\t\t\tToastify({
\t\t\t\ttext: '<div class=\"d-flex align-items-center\">{{ label }} {{ message|raw }}</div>',
\t\t\t\tduration: 30000,
\t\t\t\tescapeMarkup: false,
\t\t\t\tclose: false,
\t\t\t\tgravity: \"bottom\",
\t\t\t\tposition: \"right\",
\t\t\t\tstopOnFocus: true,
\t\t\t\tonClick: function(){}
\t\t\t}).showToast();
\t\t\t</script>
\t    {% endfor %}
\t  {% endfor %}

\t  <div class=\"cache-clear-overlay screen-overlay\">
\t    <div class=\"vtable\">
\t      <div class=\"valign\">
\t        <div class=\"loading\"></div>
\t        <span>{{ 'Cache wordt opgeschoond..' | trans }}</span>
\t      </div>
\t    </div>
\t  </div>

\t\t<div class=\"top-bar-btns-wrapper\">
\t\t\t<div class=\"buttons-left\">
\t\t\t\t<ul class=\"top-bar-btns\">
\t\t\t\t\t{% set foundCurrent = false %}

\t\t\t\t\t{% set hasFoundMultisite = false %}
\t\t\t\t\t{% if multisite is not empty and(multisite | length) > 1 %}

\t\t\t\t\t\t{% set num = 0 %}

\t\t\t\t\t\t{% for C in multisite %}
\t\t\t\t\t\t\t{% if C.language == language %}
\t\t\t\t\t\t\t\t{% if C in app.user.sites or app.user.sites.count == 0 %}
\t\t\t\t\t\t\t\t\t{% set num = (num + 1) %}
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t{% endfor %}

\t\t\t\t\t\t{% for C in multisite_other %}
\t\t\t\t\t\t\t{% if C in app.user.sites or app.user.sites.count == 0 %}
\t\t\t\t\t\t\t\t{% set num = (num + 1) %}
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t{% endfor %}

\t\t\t\t\t\t{% if num > 1 %}
\t\t\t\t\t\t\t{% set hasFoundMultisite = true %}
\t\t\t\t\t\t{% endif %}

\t\t\t\t\t\t{% if hasFoundMultisite %}
\t\t\t\t\t\t  <li id=\"language-dropdown\" class=\"language-dropdown-wrapper\">
\t\t\t\t\t\t      <span class=\"dropdown-toggle\" id=\"dropdownMultisites\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
\t\t\t\t\t\t        <i class=\"fa fa-link\"></i>
\t\t\t\t\t\t        <span class=\"label\">
\t\t\t\t\t\t          {% if hasFoundMultisite %}
\t\t\t\t\t\t            {% if multisite is not empty and(multisite | length) > 1 %}
\t\t\t\t\t\t              <span class=\"labels\">
\t\t\t\t\t\t                <b>{{Settings.label}}</b>
\t\t\t\t\t\t                <small>{{Settings.Host}}</small>
\t\t\t\t\t\t              </span>
\t\t\t\t\t\t              <i class=\"fa fa-angle-down\"></i>
\t\t\t\t\t\t            {% endif %}
\t\t\t\t\t\t          {% else %}
\t\t\t\t\t\t            {{Settings.label}}
\t\t\t\t\t\t          {% endif %}
\t\t\t\t\t\t        </span>
\t\t\t\t\t\t      </span>

\t\t\t\t\t\t      <div  class=\"dropdown-menu\" aria-labelledby=\"dropdownMultisites\">
\t\t\t\t\t\t        {% for C in multisite %}
\t\t\t\t\t\t          {% if C.language == language %}
\t\t\t\t\t\t            {% if C in app.user.sites or app.user.sites.count == 0 %}
\t\t\t\t\t\t              <a class=\"dropdown-item\" onclick=\"showUiLoader('{{C.label}} wordt geladen')\" href=\"{{ path(app.request.attributes.get('_route'), app.request.attributes.get('_route_params')) }}?msite={{C.id}}\">
\t\t\t\t\t\t                <b class=\"d-block\">{{C.label}}</b>
\t\t\t\t\t\t                {% if C.host is not empty %}
\t\t\t\t\t\t                <small>
\t\t\t\t\t\t                  {{C.host}}
\t\t\t\t\t\t                </small>
\t\t\t\t\t\t                {% endif %}
\t\t\t\t\t\t              </a>
\t\t\t\t\t\t            {% endif %}
\t\t\t\t\t\t          {% endif %}
\t\t\t\t\t\t        {% endfor %}

\t\t\t\t\t\t        {% for C in multisite_other %}
\t\t\t\t\t\t          {% if C in app.user.sites or app.user.sites.count == 0 %}
\t\t\t\t\t\t            <a class=\"list-group-item list-group-item-action\" onclick=\"showUiLoader('{{C.label}} wordt geladen')\" href=\"{{ path(app.request.attributes.get('_route'), app.request.attributes.get('_route_params')) }}?msite={{C.id}}&mlang={{C.language.id}}\">
\t\t\t\t\t\t              <b class=\"d-block\">{{C.label}}</b>
\t\t\t\t\t\t              {% if C.host is not empty %}
\t\t\t\t\t\t              <small>
\t\t\t\t\t\t                <i class=\"fa fa-link\"></i>
\t\t\t\t\t\t                {{C.host}}
\t\t\t\t\t\t              </small>
\t\t\t\t\t\t              {% endif %}
\t\t\t\t\t\t            </a>
\t\t\t\t\t\t          {% endif %}
\t\t\t\t\t\t        {% endfor %}
\t\t\t\t\t\t      </div>
\t\t\t\t\t\t  </li>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t{% endif %}

\t\t\t\t\t{% if languages | length > 1 %}
\t\t\t\t\t\t<li id=\"langSelector\">
\t\t\t\t\t\t\t{% if (languages | length) > 1 and (languages_available | length) > 1 and (app.user.languages|length) != 1 %}
\t\t\t\t\t\t\t\t\t<span class=\"dropdown-toggle\" id=\"dropdownLanguages\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
\t\t\t\t\t\t\t\t\t\t<div class=\"current-flag flag-icon flag-icon-{{language.locale}}\" data-info=\"{{language.label}}\"></div>
\t\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t\t<ul id=\"langSelect\" class=\"dropdown-menu\" aria-labelledby=\"dropdownLanguages\">
\t\t\t\t\t\t\t\t\t\t{% for Language in languages_available %}
\t\t\t\t\t\t\t\t\t\t\t{% set isCurrent = false %}
\t\t\t\t\t\t\t\t\t\t\t{% if (Language in app.user.languages and(app.user.languages | length) > 1)
\t\t\t\t\t\t\t\t\t\t\tor(app.user.languages | length) == 0 %}
\t\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"dropdown-item\" onclick=\"showUiLoader('{{Language.label}} wordt geladen')\" href=\"{{path('admin_switch_language', {locale: Language.locale, url: path(app.request.attributes.get('_route'), app.request.attributes.get('_route_params'))|url_encode, msite: (siteToLang[Language.id] is defined ? siteToLang[Language.id] : 0)})}}\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"flag-icon flag-icon-{{Language.locale}}\"></span>{{Language.label}}{{isCurrent ? ' <strong class=\"grey lighten-2 right\">' ~ ('huidig domein'|trans) ~ '</strong>' : ''}}</a>
\t\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</li>
\t\t\t\t\t{% endif %}

\t\t\t\t\t{% if is_granted( 'ROLE_SUPER_ADMIN' ) %}
\t\t\t\t\t\t<li class=\"clear-cache\">
\t\t\t\t\t\t\t<a class=\"dropdown-toggle\" title=\"{{'Cache wissen'|trans}}\" id=\"dropdownMenuButton1\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-sync-alt\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton1\">
\t\t\t\t\t\t\t\t<li><a class=\"dropdown-item\" onclick=\"return cache_clear();\">{{'Cache wissen'|trans}}</a></li>
\t\t\t\t\t\t\t\t<li><a class=\"dropdown-item\" onclick=\"return php_cache_clear();\">{{'PHP cache wissen'|trans}}</a></li>
\t\t\t\t\t\t\t\t{# {% if installed is defined and 'WebshopBundle' in installed %}
\t\t\t\t\t\t\t\t\t<li><a class=\"dropdown-item\" href=\"#\">{{'Wis webshop cache'|trans}}</a></li>
\t\t\t\t\t\t\t\t{% endif %} #}
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>
\t\t\t\t\t{% else %}
\t\t\t\t\t\t<li class=\"clear-cache\">
\t\t\t\t\t\t\t<a class=\"dropdown-toggle\" onclick=\"return cache_clear();\" title=\"{{'Cache wissen'|trans}}\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-sync-alt\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t{% endif %}

\t\t\t\t\t<li>
\t\t\t\t\t\t<a href=\"//{{Settings.host}}\" title=\"{{'Website bekijken'|trans}}\" target=\"blank\" data-bs-toggle=\"tooltip\" data-bs-placement=\"bottom\" data-bs-html=\"true\">
\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-external-link-alt\"></i>
\t\t\t\t\t\t\t{# {{'Website bekijken'|trans}} #}
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>

\t\t\t\t\t{% if Settings.test %}
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a href=\"{{path('admin_settings')}}\" title=\"{{ '<h6 class=\\'mt-3\\'>Test modus aan</h6><p>Alle e-mails worden naar <i>systeem admin e-mailadres</i> verstuurd.<p><p>Ga naar <i>Configuratie</i> om de status te wijzigen.</p>' | trans | raw }}\" data-bs-toggle=\"tooltip\" data-bs-placement=\"bottom\" data-bs-html=\"true\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-exclamation-triangle\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t{% endif %}
\t\t\t\t</ul>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"buttons-right\">
\t\t\t\t<ul class=\"top-bar-btns\">
\t\t\t\t\t<li class=\"site-types\">
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t{% if not Settings.isCatalog %}
\t\t\t\t\t\t\t\t<li class=\"active\">
\t\t\t\t\t\t\t\t\t<a href=\"{{path('admin')}}\" title=\"{{'Website beheren'|trans}}\" data-bs-toggle=\"tooltip\" data-bs-placement=\"bottom\" data-bs-html=\"true\">
\t\t\t\t\t\t\t\t\t\t<?xml version=\"1.0\" encoding=\"utf-8\"?>
\t\t\t\t\t\t\t\t\t\t<svg version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"
\t\t\t\t\t\t\t\t\t\t\t viewBox=\"0 0 89 90.12\" style=\"enable-background:new 0 0 89 90.12;\" xml:space=\"preserve\">
\t\t\t\t\t\t\t\t\t\t<g>
\t\t\t\t\t\t\t\t\t\t\t<path d=\"M44.7,90.03L44.7,90.03c-1.6,0-2.8-1.3-2.8-2.8v-47.9c0-1.6,1.3-2.8,2.8-2.8l0,0c1.6,0,2.8,1.3,2.8,2.8v47.8
\t\t\t\t\t\t\t\t\t\t\t\tC47.5,88.73,46.2,90.03,44.7,90.03z\"/>
\t\t\t\t\t\t\t\t\t\t\t<path d=\"M86.2,71.83L86.2,71.83c-1.6,0-2.8-1.3-2.8-2.8v-47.9c0-1.6,1.3-2.8,2.8-2.8l0,0c1.6,0,2.8,1.3,2.8,2.8v47.8
\t\t\t\t\t\t\t\t\t\t\t\tC89,70.53,87.7,71.83,86.2,71.83z\"/>
\t\t\t\t\t\t\t\t\t\t\t<path d=\"M88.7,68.03L88.7,68.03c0.7,1.4,0.1,3.1-1.4,3.8l-41.5,18c-1.4,0.7-3.1,0.1-3.8-1.4l0,0
\t\t\t\t\t\t\t\t\t\t\t\tc-0.7-1.4-0.1-3.1,1.4-3.8l41.5-18C86.4,66.03,88.1,66.63,88.7,68.03z\"/>
\t\t\t\t\t\t\t\t\t\t\t<path d=\"M88.7,19.93L88.7,19.93c0.7,1.4,0.1,3.1-1.4,3.8l-41.5,18c-1.4,0.7-3.1,0.1-3.8-1.4l0,0
\t\t\t\t\t\t\t\t\t\t\t\tc-0.7-1.4-0.1-3.1,1.4-3.8l41.5-18C86.4,17.93,88.1,18.53,88.7,19.93z\"/>
\t\t\t\t\t\t\t\t\t\t\t<path d=\"M2.8,71.83L2.8,71.83c1.6,0,2.8-1.3,2.8-2.8v-47.9c0-1.6-1.3-2.8-2.8-2.8l0,0c-1.6,0-2.8,1.3-2.8,2.8v47.8
\t\t\t\t\t\t\t\t\t\t\t\tC0,70.53,1.3,71.83,2.8,71.83z\"/>
\t\t\t\t\t\t\t\t\t\t\t<path d=\"M0.3,68.03L0.3,68.03c-0.7,1.4-0.1,3.1,1.4,3.8l41.5,18c1.4,0.7,3.1,0.1,3.8-1.4l0,0c0.7-1.4,0.1-3.1-1.4-3.8
\t\t\t\t\t\t\t\t\t\t\t\tL4,66.63C2.6,66.03,0.9,66.63,0.3,68.03z\"/>
\t\t\t\t\t\t\t\t\t\t\t<path d=\"M0.3,19.93L0.3,19.93c-0.7,1.4-0.1,3.1,1.4,3.8l41.5,18c1.4,0.7,3.1,0.1,3.8-1.4l0,0c0.7-1.4,0.1-3.1-1.4-3.8
\t\t\t\t\t\t\t\t\t\t\t\tL4,18.53C2.6,17.93,0.9,18.53,0.3,19.93z\"/>
\t\t\t\t\t\t\t\t\t\t\t<path d=\"M42.1,1.63L42.1,1.63c-0.7,1.4-0.1,3.1,1.4,3.8l23,9.9c1.4,0.7,3.1,0.1,3.8-1.4l0,0c0.7-1.4,0.1-3.1-1.4-3.8
\t\t\t\t\t\t\t\t\t\t\t\tl-23-9.8C44.5-0.37,42.8,0.23,42.1,1.63z\"/>
\t\t\t\t\t\t\t\t\t\t\t<path d=\"M46.9,1.63L46.9,1.63c0.7,1.4,0.1,3.1-1.4,3.8L4,23.43c-1.4,0.6-3.1,0-3.7-1.4l0,0c-0.7-1.4-0.1-3.1,1.4-3.8
\t\t\t\t\t\t\t\t\t\t\t\tl41.5-18C44.5-0.37,46.2,0.23,46.9,1.63z\"/>
\t\t\t\t\t\t\t\t\t\t</g>
\t\t\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t{% if installed is defined and 'WebshopBundle' in installed %}
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"{{path('admin_mod_webshop')}}\" title=\"{{'Webshop beheren'|trans}}\" data-bs-toggle=\"tooltip\" data-bs-placement=\"bottom\" data-bs-html=\"true\">
\t\t\t\t\t\t\t\t\t\t\t<?xml version=\"1.0\" encoding=\"utf-8\"?>
\t\t\t\t\t\t\t\t\t\t\t<svg version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\"
\t\t\t\t\t\t\t\t\t\t\t\t viewBox=\"0 0 89 90.1\" style=\"enable-background:new 0 0 89 90.1;\" xml:space=\"preserve\">
\t\t\t\t\t\t\t\t\t\t\t<g>
\t\t\t\t\t\t\t\t\t\t\t\t<path d=\"M85.2,9.7H27.9c-1.9,0-3.5,1.6-3.5,3.5s1.6,3.5,3.5,3.5h53.8V42l-51.8,7.5l-13.3-42c-1-4.3-5.1-7.3-9.7-7.3h-3
\t\t\t\t\t\t\t\t\t\t\t\t\tC2,0.2,0.4,1.7,0.4,3.7S2,7.2,3.9,7.2h3c1.4,0,2.7,0.9,3,2c0,0.1,0,0.2,0.1,0.3l13,41.1l-3.8,0.6h-0.1c-5.7,1-9.4,4.8-9.4,9.8
\t\t\t\t\t\t\t\t\t\t\t\t\tc0,5.4,4.4,9.9,9.9,9.9h56c1.9,0,3.5-1.6,3.5-3.5s-1.6-3.5-3.5-3.5h-56c-1.6,0-2.9-1.3-2.9-2.9c0-2.1,2.6-2.7,3.4-2.9l65.5-9.5
\t\t\t\t\t\t\t\t\t\t\t\t\tc1.7-0.3,3-1.7,3-3.5V13.2C88.7,11.3,87.1,9.7,85.2,9.7z\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<path d=\"M27.9,76.6c-3.7,0-6.7,3-6.7,6.7s3,6.7,6.7,6.7s6.7-3,6.7-6.7S31.6,76.6,27.9,76.6z\"/>
\t\t\t\t\t\t\t\t\t\t\t\t<path d=\"M69.3,76.6c-3.7,0-6.7,3-6.7,6.7s3,6.7,6.7,6.7s6.7-3,6.7-6.7S73,76.6,69.3,76.6z\"/>
\t\t\t\t\t\t\t\t\t\t\t</g>
\t\t\t\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t{% if installed is defined and 'BekokeuringBundle' in installed %}
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"{{path('admin_mod_bekokeuring')}}\" title=\"{{'Keuring beheren'|trans}}\" data-bs-toggle=\"tooltip\" data-bs-placement=\"bottom\" data-bs-html=\"true\">
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-vial\"></i>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</ul>
\t\t\t\t\t</li>

\t\t\t\t\t{% if installed is defined and 'TicketsBundle' in installed %}
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"{{path('admin_mod_tickets')}}\">
\t\t\t\t\t\t\t\t<i class=\"far fa-fw fa-calendar-alt\"></i>
\t\t\t\t\t\t\t\t{# {{'Ticketverkoop'|trans}} #}
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t{% endif %}

\t\t\t\t\t<li>
\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"{{path('admin_profile')}}\"  title=\"{{'Profiel'|trans}}\" data-bs-toggle=\"tooltip\" data-bs-placement=\"bottom\" data-bs-html=\"true\">
\t\t\t\t\t\t\t<span class=\"d-flex align-items-center\">
\t\t\t\t\t\t\t\t<span class=\"avatar\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-user\"></i>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t<span class=\"username\">
\t\t\t\t\t\t\t<span class=\"name\">{% if app.user.name is not empty %}{{app.user.name}}{% else %}{{'Profiel'|trans}}{% endif %}</span>
\t\t\t\t\t\t\t\t\t{% if app.user.email is not empty %}<span class=\"sub\">{{app.user.email}}</span>{% endif %}
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>

\t\t\t\t\t{% if is_granted( 'ROLE_PREVIOUS_ADMIN' ) %}
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"?_switch_user=_exit\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-fw orange-text fa-ban\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t{% endif %}

\t\t\t\t\t<li>
\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"{{logout_path('admin_secured_area')}}\"  title=\"{{'Uitloggen'|trans}}\" data-bs-toggle=\"tooltip\" data-bs-placement=\"bottom\" data-bs-html=\"true\">
\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-power-off\"></i>
\t\t\t\t\t\t\t{# {{'Uitloggen'|trans}} #}
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>

\t\t<div class=\"side-bar-wrapper\">
\t\t\t<div class=\"logobox\">
\t\t\t\t<div class=\"logobox-content\">
\t\t\t\t\t{% if file_exists( 'trinity.svg' ) %}
\t\t\t\t\t\t<a href=\"{{path('admin')}}\" class=\"logo-icon\" title=\"Easify v{{version}}\"><img src=\"{{asset('trinity.svg')}}\"/></a>
\t\t\t\t\t{% else %}
\t\t\t\t\t\t<a href=\"{{path('admin')}}\" class=\"logo-icon\" title=\"Easify v{{version}}\"><img src=\"{{asset('bundles/cms/images/logo_icon.svg')}}\"/></a>
\t\t\t\t\t{% endif %}
\t\t\t\t\t<span class=\"logo-name\">
\t\t\t\t\t\tEasify
\t\t\t\t\t\t<span class=\"logo-tagline\">A Symfony CMS</span>
\t\t\t\t\t</span>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"side-bar\">
\t\t\t\t<div class=\"side-bar-scroll\" data-simplebar>
\t\t\t\t\t<div class=\"side-bar-inner\">
\t\t\t\t\t\t{% include '@Cms/menu/main.html.twig' with {
\t\t\t\t\t\t\t'Settings' : Settings
\t\t\t\t\t\t} %}
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>

\t  <div class=\"trinity-wrapper\">
\t\t\t<div class=\"toggle-mobile d-lg-none\">
\t\t\t\t<span class=\"side-bar-toggle\">
\t\t\t\t\t<i class=\"fa fa-fw fa-bars\"></i>
\t\t\t\t</span>
\t\t\t</div>

\t\t\t<div class=\"container\">
\t\t\t\t{# <div class=\"alert alert-warning fade show alert-dismissible d-lg-none mt-3\" role=\"alert\">
\t\t\t\t\t<b>Let op!</b> De huidige resolutie wordt beperkt ondersteund. Sommige functies kunnen mogelijk niet naar behoren functioneren.
\t\t\t\t\t<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
\t\t\t\t</div> #}

\t\t\t\t<div class=\"breadcrumb-wrapper\">
\t\t\t\t\t{% block breadcrumbs %}
\t\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t\t<div class=\"dropdown-toggle\" id=\"dropdownBreadcrumbs\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
\t\t\t\t\t\t\t\t<div class=\"title\">
\t\t\t\t\t\t\t\t\t\t{{ wo_render_breadcrumbs() }}
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t  <ul class=\"dropdown-menu\" aria-labelledby=\"dropdownBreadcrumbs\">
\t\t\t\t\t\t\t\t<li><h6 class=\"dropdown-header\">{{ 'Terug naar..' | trans }}</h6></li>
\t\t\t\t\t\t\t\t<div class=\"list\">{{ wo_render_breadcrumbs() }}</div>
\t\t\t\t\t\t  </ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t{% endblock %}
\t\t\t\t</div>

\t\t    <div class=\"main-wrapper\">
\t\t      <main>
\t\t        <div class=\"catselect\">
\t\t          {% block catselect %}{% endblock %}
\t\t        </div>
\t\t        {% block body %}{% endblock %}
\t\t      </main>
\t\t\t\t</div>
\t\t\t</div>
\t  </div>

\t  <script>
\t    \$( window ).on( \"scroll load\", function() {
\t      var scroll = \$( window ).scrollTop();
\t      if ( scroll >= 71 ) {
\t        \$( \"body\" ).addClass( \"sticky\" );
\t      } else {
\t        \$( \"body\" ).removeClass( \"sticky\" );
\t      }

\t      var scroll = \$( window ).scrollTop();
\t      if ( scroll >= 60 ) {
\t        \$( \"body\" ).addClass( \"sticky-page-bar\" );
\t      } else {
\t        \$( \"body\" ).removeClass( \"sticky-page-bar\" );
\t      }

\t\t\t\t\$('.simplebar-scroll-content').on('scroll', function() {
\t\t\t\t    \$('.side-bar-wrapper').toggleClass('scrolled-sidebar', \$(this).scrollTop() > 1);
\t\t\t\t});
\t    } );
\t  </script>

\t  {# JQUERY (UI) #}
\t  <script type=\"text/javascript\" src=\"{{asset('bundles/cms/jquery-ui-1.11.4.custom/jquery-ui.js')}}\"></script>

\t  {# NESTED SORTABLES #}
\t  <script type=\"text/javascript\" src=\"{{asset('bundles/cms/nestedSortable/jquery.mjs.nestedSortable.js')}}\"></script>

\t  {# SELECT2 #}
\t  <script src=\"https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js\"></script>
\t  <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css\" />
\t  <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css\" />

\t  <script type=\"text/javascript\" src=\"{{asset('bundles/cms/js/script.js')}}?t={{'now'|date('Ymd')}}\"></script>
\t  <script type=\"text/javascript\" src=\"{{asset('bundles/cms/responsive_waterfall/responsive_waterfall.js')}}\"></script>
\t  <script type=\"text/javascript\" src=\"{{asset('bundles/cms/jquery-dropdown/jquery.dropdown.js')}}\"></script>

\t  <script type=\"text/javascript\">
\t    // \$( document ).ready( function() {
\t    //   \$( '.modal' ).modal();
\t    //   \$( '.tooltipped' ).tooltip( { delay: 50 } );
\t    // } );

\t    jQuery( '.hamburger' ).click( function( e ) {
\t      jQuery( this ).toggleClass( 'is-active' );
\t      jQuery( document.body ).toggleClass( 'menu' );
\t    } );

\t    jQuery( '#profile-image img' ).on( 'click', function( e ) {
\t      jQuery( '#profile-image ul.nav' ).show();
\t    } );

\t    jQuery( document.body ).on( 'click', function( e ) {
\t      if ( e.target != \$( '#profile-image img' )[ 0 ] ) {
\t        jQuery( '#profile-image ul.nav' ).hide();
\t      }
\t    } );

\t    jQuery( '.treetoggle a' ).click( function( e ) {
\t      jQuery( document.body ).toggleClass( 'treeview' );
\t    } );

\t    if ( \$( '.tabs' ).length > 0 ) {
\t      \$( '.tabs li:not(.no-tab)' ).click( function() {
\t        \$( '.tabs li, .tc' ).removeClass( 'active' );
\t        var index = \$( this ).addClass( 'active' ).index();
\t        \$( '.tc' ).eq( index ).addClass( 'active' );
\t      } );
\t    }

\t    // SPOTLIGHT

\t    var typeTimer = null;

\t    var spotlightOpen = false;

\t    // Key codes
\t    var enter = 13;
\t    var escape = 27;
\t    var p = 80;
\t    var f = 70;
\t    var d = 68;
\t    var up = 38;
\t    var down = 40;
\t    var spacebar = 32;

\t    var firstUrl = null;

\t    \$( document.body ).keydown( function( event ) {
\t      if ( event.which == spacebar && ( event.ctrlKey ) ) {
\t        event.preventDefault();
\t        if ( spotlightOpen ) {
\t          closeSpotlight();
\t        } else {
\t          openSpotlight();
\t        }
\t      }
\t      if ( event.which == d && ( event.ctrlKey ) ) {
\t        event.preventDefault();
\t        switchDarkMode();
\t      }
\t    } ).keyup( function( event ) {
\t      if ( event.which == escape ) {
\t        closeSpotlight();
\t      }
\t      if ( event.which == enter && spotlightOpen ) {
\t        event.preventDefault();
\t        if ( \$( '.sl-results a.default' ).length > 0 ) {
\t          window.location = \$( '.sl-results a.default' ).attr( 'href' );
\t        }
\t      }
\t      if ( event.which == up && spotlightOpen ) {
\t        event.preventDefault();
\t        \$( '.sl-window input' )[ 0 ].blur();
\t        if ( \$( '.sl-results a.default' ).prev( 'a' ).length > 0 ) {
\t          \$( '.sl-results a.default' ).removeClass( 'default' ).prev( 'a' ).addClass( 'default' );
\t        }
\t      }
\t      if ( event.which == down && spotlightOpen ) {
\t        event.preventDefault();
\t        \$( '.sl-window input' )[ 0 ].blur();
\t        if ( \$( '.sl-results a.default' ).next( 'a' ).length > 0 ) {
\t          \$( '.sl-results a.default' ).removeClass( 'default' ).next( 'a' ).addClass( 'default' );
\t        }
\t      }
\t    } );

\t    \$( '.sl-backdrop' ).click( function() {
\t      closeSpotlight();
\t    } );

\t    function openSpotlight() {
\t      \$( document.body ).addClass( 'spotlight' );
\t      \$( '.sl-results' ).html( '' ).hide();
\t      firstUrl = null;
\t      var prevQ = '';
\t      \$( '.sl-window input' ).val( '' ).off( 'keyup' ).on( 'keyup', function() {
\t        var q = \$( this ).val();
\t        var q_el = \$( this );
\t        if ( prevQ != q ) {
\t          firstUrl = null;
\t          \$( '.sl-results' ).html( '' ).hide();
\t          prevQ = q;
\t          if ( typeTimer != null )
\t            clearTimeout( typeTimer );
\t          typeTimer = setTimeout( function() {
\t            if ( q == '' ) {
\t              \$( '.sl-results' ).html( '' ).hide();
\t            } else {
\t              var nr = 0;
\t              q_el.parent().append( \$( '<div class=\"spinner\"></div>' ) );
\t              \$.getJSON( '{{path('spotlight_search')}}/' + q ).done( function( res ) {
\t                \$.each( res, function( group, results ) {
\t                  \$( '.sl-results' ).append( \$( '<span>' + group + '</span>' ) );
\t                  \$.each( results, function( url, label ) {
\t                    \$( '.sl-results' ).append( \$( '<a href=\"' + url + '\">' + label + '</span>' ) );
\t                    if ( firstUrl == null )
\t                      firstUrl = url;
\t                    nr++;
\t                  } );
\t                } );

\t                if ( nr == 0 ) {
\t                  \$( '.sl-results' ).append( \$( '<em>{{ 'Geen resultaten gevonden.' | trans({}) | raw }}</em>' ) );
\t                }

\t                \$( '.sl-results' ).show();
\t                \$( '.sl-results a' ).first().addClass( 'default' )
\t                \$( '.sl-window .spinner' ).remove();
\t              } );
\t            }
\t          }, 250 );
\t        }
\t      } );
\t      \$( '.sl-window input' )[ 0 ].focus();
\t      spotlightOpen = true;
\t    }

\t    function closeSpotlight() {
\t      \$( '.sl-window input' ).val( '' );
\t      \$( '.sl-results' ).html( '' ).hide();
\t      \$( document.body ).removeClass( 'spotlight' );
\t      spotlightOpen = false;
\t    }

\t    if ( \$( window ).width() <= 1300 && \$( window ).width() >= 900 ) {
\t      \$( 'body' ).addClass( 'nav-collapse' );
\t    }
\t    \$( window ).resize( function() {
\t      if ( \$( window ).width() <= 1300 && \$( window ).width() >= 900 ) {
\t        \$( 'body' ).addClass( 'nav-collapse' );
\t      } else {
\t        \$( 'body' ).removeClass( 'nav-collapse' );
\t      }
\t    } );

\t    function switchDarkMode() {
\t      if ( \$( 'body' ).hasClass( 'dark' ) ) {
\t        var checked = 0;
\t      } else {
\t        var checked = 1;
\t      }
\t      \$( 'body' ).toggleClass( 'dark' );
\t      \$.ajax( '{{path('admin_profile_dark')}}/' + checked );
\t    }

\t    function cache_clear( extended ) {
\t      if ( typeof extended == 'undefined' ) {
\t        extended = false;
\t        }
\t      \$( '.cache-clear-overlay' ).show();

\t\t\t\tvar toggleCacheUrl = jsonUrl+'page/pagecacheall';
\t\t\t\t\$.getJSON(toggleCacheUrl, function(response){
\t\t\t\t\tconsole.log(toggleCacheUrl);
\t\t\t\t\tconsole.log(response);
\t\t\t\t});

\t      window.location = '/bundles/cms/cache.php?extended=' + extended + '&url={{path('admin_page')|url_encode}}';

\t      return false;
\t    }

\t\tfunction php_cache_clear( extended ) {
\t      if ( typeof extended == 'undefined' ) {
\t        extended = false;
\t        }
\t      \$( '.cache-clear-overlay' ).show();

\t      window.location = '/bundles/cms/opcache.php?url={{path('admin_page')|url_encode}}';

\t      return false;
\t    }

\t    {% if app.request.query.get('clear') == 'cache' %}
\t      cache_clear( false );
\t    {% endif %}

\t    function openinbrowser_button() {
\t      {% if Page is defined and Page.id is not null %}
\t        if ( \$( '#view-live' ).length ) {
\t          \$.ajax( '{{path('admin_page_ajax_pageid', {'id': Page.id})}}' ).done( function( r ) {
\t            if ( r.status === true ) {
\t              \$( '#view-live' ).prop( 'href', r.url ).show();
\t            }
\t          } );
\t        }
\t      {% endif %}
\t    }

\t    openinbrowser_button();
\t  </script>

\t  <script>
\t    \$( function() {
\t      \$( \".toggle-fold\" ).click( function() {
\t        \$( \"body\" ).toggleClass( \"folded\" );
\t      } );

\t      \$( \".toggle-blocks\" ).click( function() {
\t        \$( \"body\" ).toggleClass( \"show-blocks\" );
\t      } );

\t      \$( \".block-select\" ).click( function() {
\t        \$( \"body\" ).removeClass( \"show-blocks\" );
\t      } );

\t      \$( \"#langSelector\" ).click( function() {
\t        \$( \"body\" ).toggleClass( \"language-dropdown\" );
\t      } );

\t      \$( \".tools > li.toggle-tool-nav > span\" ).click( function() {
\t        \$( \"body\" ).toggleClass( \"tools-dropdown\" );
\t      } );

\t      \$( \".tools .toggle-list-view\" ).click( function() {
\t        \$( \"body\" ).toggleClass( \"blocks-list-view\" );
\t        \$( \"body\" ).removeClass( \"tools-dropdown\" );
\t      } );

\t      \$( \".toggle-pagetree\" ).click( function() {
\t        \$( \"body\" ).toggleClass( \"treebox-sidebar\" );
\t      } );

\t      \$( \".blocks-wrapper .block-select .large-preview\" ).hover( function() {
\t        \$( this ).closest( \".block-select\" ).toggleClass( \"show-preview\" );
\t      } );

\t      \$( \".toggle-mobile-nav\" ).click( function() {
\t        \$( \"body\" ).toggleClass( \"side-bar-open\" );
\t        \$( \"body\" ).removeClass( \"btn-bar-open\" );
\t      } );

\t      \$( \".btn-bar .btn-bar-toggle\" ).click( function() {
\t        \$( \"body\" ).toggleClass( \"btn-bar-open\" );
\t      } );
\t    } );
\t  </script>

\t  <script>
\t    \$( window ).load( function() {
\t      if ( !\$( \"body\" ).hasClass( \"page-overview\" ) ) {
\t        if ( ( \$( window ).innerWidth() > 992 ) && ( \$( window ).innerWidth() < 1400 ) ) {
\t          \$( \"body\" ).addClass( 'folded' );
\t        } else {
\t          \$( \"body\" ).removeClass( 'folded' );
\t        }

\t        \$( window ).resize( function() {
\t          if ( ( \$( window ).innerWidth() > 992 ) && ( \$( window ).innerWidth() < 1400 ) ) {
\t            \$( \"body\" ).addClass( 'folded' );
\t          } else {
\t            \$( \"body\" ).removeClass( 'folded' );
\t          }
\t        } );
\t      }
\t    } );

\t    \$( window ).load( function() {
\t      if ( \$( \"body\" ).hasClass( \"page-overview\" ) ) {
\t        if ( ( \$( window ).innerWidth() > 992 ) ) {
\t          \$( \"body\" ).addClass( 'folded' );
\t        } else {
\t          \$( \"body\" ).removeClass( 'folded' );
\t        }

\t        \$( window ).resize( function() {
\t          if ( ( \$( window ).innerWidth() > 992 ) ) {
\t            \$( \"body\" ).addClass( 'folded' );
\t          } else {
\t            \$( \"body\" ).removeClass( 'folded' );
\t          }
\t        } );
\t      }
\t    } );
\t  </script>

\t  {% block javascript %}{% endblock %}
\t  {% block scripts %}{% endblock %}
\t  <link rel=\"stylesheet\" type=\"text/css\" href=\"/bundles/cms/ckeditor/materialize.css\">

\t  <script>
\t    \$( function() {
\t      if ( \$( '.btn-bar' ).length == 0 ) {
\t        \$( 'body' ).append( \$( '<div class=\"btn-bar\"></div>' ) );
\t      }
\t      if ( \$( '.btn-bar > .left' ).length == 0 ) {
\t        \$( '.btn-bar' ).append( \$( '<div class=\"left\"></div>' ) );
\t      }

\t      // \$(\".btn-bar\").prependTo(\"body\");

\t      // workaround google chrome: https://support.google.com/chrome/thread/3363391?msgid=3613215
\t      \$( '.datepicker' ).on( 'mousedown', function( e ) {
\t        e.preventDefault();
\t      } );
\t    } );

\t    \$( window ).load( function() {
\t      // Animate loader off screen
\t      \$( \"#uiloader\" ).fadeOut( \"slow\", function() {
\t        \$( \"#uiloader\" ).remove();
\t      } );
\t    } );

\t    \$( '.btn-bar ' ).append( \$( '<div class=\"btn-bar-toggle\"></div>' ) );
\t  </script>

\t  <!-- sticky side-bar header -->
\t  <script>
\t    var \$buttonsContainer = document.getElementById( \"buttons-wrapper\" );

\t    \$( \".simplebar-scroll-content\" ).scroll( function() {
\t      var scroll = \$( this ).scrollTop();
\t      if ( scroll >= \$buttonsContainer.offsetTop ) {
\t        \$( \"body\" ).addClass( \"sticky-buttons\" );
\t      } else {
\t        \$( \"body\" ).removeClass( \"sticky-buttons\" );
\t      }
\t    } );

\t    \$( \"#buttons-wrapper\" ).css( \"height\", \$( \".buttons\" ).outerHeight() );
\t  </script>

\t  <!-- Responsive table wrapper -->
\t  <script>
\t    \$( function() {
\t      \$( 'table.responsive-table' ).wrap( \"<div class='table-wrapper'></div>\" );
\t      \$( 'table.responsive-table' ).removeClass( 'responsive-table' );
\t    } );
\t  </script>

\t  <!-- Hide tooltip on click -->
\t  <script>
\t    \$( document ).ready( function() {
\t      \$( '.tooltipped' ).click( function() {
\t        \$( '.tooltipped' ).tooltip( \"hide\" );
\t      } );
\t    } );
\t  </script>

\t  <link rel=\"stylesheet\" type=\"text/css\" href=\"/bundles/cms/datetimepicker/build/jquery.datetimepicker.min.css\">
\t  <script src=\"/bundles/cms/datetimepicker/build/jquery.datetimepicker.full.js\"></script>

\t  <script>
\t    \$( function() {
\t      jQuery.datetimepicker.setLocale( 'nl' );
\t      if ( \$( '.trinity_datetime' ).length > 0 ) {
\t        \$( '.trinity_datetime' ).datetimepicker( { format: 'Y-m-d H:i' } );
\t      }
\t      if ( \$( '.trinity_time' ).length > 0 ) {
\t        \$( '.trinity_time' ).datetimepicker( { datepicker: false } );
\t      }
\t      if ( \$( '.trinity_date' ).length > 0 ) {
\t        \$( '.trinity_date' ).datetimepicker( { timepicker: false, format: 'Y-m-d' } );
\t      }
\t      if ( \$( '.trinity_datetime_inline' ).length > 0 ) {
\t        \$( '.trinity_datetime_inline' ).datetimepicker( { format: 'Y-m-d H:i', inline: true } );
\t      }
\t      if ( \$( '.trinity_time_inline' ).length > 0 ) {
\t        \$( '.trinity_time_inline' ).datetimepicker( { datepicker: false, inline: true } );
\t      }
\t      if ( \$( '.trinity_date_inline' ).length > 0 ) {
\t        \$( '.trinity_date_inline' ).datetimepicker( { timepicker: false, format: 'Y-m-d', inline: true } );
\t      }

\t      if ( \$( '.trinity_range_start' ).length > 0 && \$( '.trinity_range_end' ).length > 0 ) {
\t        \$( '.trinity_range_start' ).datetimepicker( {
\t          format: 'Y-m-d',
\t          onShow: function( ct ) {
\t            this.setOptions( {
\t              maxDate: \$( '.trinity_range_end' ).val()
\t                ? \$( '.trinity_range_end' ).val()
\t                : false
\t            } )
\t          },
\t          onSelectDate: function( ct, \$i ) {
\t            if ( typeof \$i.data( 'select' ) != 'undefined' ) {
\t              window[ \$i.data( 'select' ) ]();
\t            }
\t          },
\t          onSelectTime: function( ct, \$i ) {
\t            if ( typeof \$i.data( 'time' ) != 'undefined' ) {
\t              window[ \$i.data( 'time' ) ]();
\t            }
\t          },
\t          onShow: function( ct, \$i ) {
\t            if ( typeof \$i.data( 'show' ) != 'undefined' ) {
\t              window[ \$i.data( 'show' ) ]();
\t            }
\t          },
\t          onClose: function( ct, \$i ) {
\t            if ( typeof \$i.data( 'close' ) != 'undefined' ) {
\t              window[ \$i.data( 'close' ) ]();
\t            }
\t          },
\t          timepicker: false
\t        } );
\t        \$( '.trinity_range_end' ).datetimepicker( {
\t          format: 'Y-m-d',
\t          onShow: function( ct ) {
\t            this.setOptions( {
\t              minDate: \$( '.trinity_range_start' ).val()
\t                ? \$( '.trinity_range_start' ).val()
\t                : false
\t            } )
\t          },
\t          onSelectDate: function( ct, \$i ) {
\t            if ( typeof \$i.data( 'select' ) != 'undefined' ) {
\t              window[ \$i.data( 'select' ) ]();
\t            }
\t          },
\t          onSelectTime: function( ct, \$i ) {
\t            if ( typeof \$i.data( 'time' ) != 'undefined' ) {
\t              window[ \$i.data( 'time' ) ]();
\t            }
\t          },
\t          onShow: function( ct, \$i ) {
\t            if ( typeof \$i.data( 'show' ) != 'undefined' ) {
\t              window[ \$i.data( 'show' ) ]();
\t            }
\t          },
\t          onClose: function( ct, \$i ) {
\t            if ( typeof \$i.data( 'close' ) != 'undefined' ) {
\t              window[ \$i.data( 'close' ) ]();
\t            }
\t          },
\t          timepicker: false
\t        } );
\t      }
\t    } );

\t    function showUiLoader( lbl ) {
\t      \$( 'body' ).append( \$( '<div class=\"trinity-loader-overlay\" id=\"uiloader\">\\
\t\t\t\t\t\t<div class=\"vtable\">\\
\t\t\t\t\t\t\t<div class=\"valign\">\\
\t\t\t\t\t\t\t\t<div class=\"loading\"></div>\\
\t\t\t\t\t\t\t\t<span>' + lbl + '</span>\\
\t\t\t\t\t\t\t</div>\\
\t\t\t\t\t\t</div>\\
\t\t\t\t\t</div>' ) );
\t    }
\t  </script>

\t  <script>
\t    function activateVideo( el, env, url ) {
\t      var nel = \$( '<div>Ongeldige video</div>' );
\t      if ( env == 'youtube' ) {
\t        nel = \$( '<div class=\"embed-container\"><iframe id=\"ytplayer\" type=\"text/html\" width=\"720\" height=\"405\" src=\"' + url + '\" frameborder=\"0\" allowfullscreen></iframe></div>' );
\t      } else if ( env == 'vimeo' ) {
\t        nel = \$( '<div class=\"embed-container\"><iframe width=\"720\" height=\"405\" src=\"' + url + '\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>' );
\t      }

\t      var ps = \$( el ).closest( '.video-preset' );
\t      ps.replaceWith( nel );
\t    }
\t  </script>

\t\t<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js\" integrity=\"sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4\" crossorigin=\"anonymous\"></script>
\t\t{# <script src=\"https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js\" charset=\"utf-8\"></script> #}
\t\t<script>
\t\t\tvar tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle=\"tooltip\"]'))
\t\t\tvar tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
\t\t\treturn new bootstrap.Tooltip(tooltipTriggerEl)
\t\t\t})
\t\t</script>
\t\t<script>
\t\t\tjQuery( '.side-bar-toggle' ).click( function( e ) {
\t\t\t\tjQuery( document.body ).toggleClass( 'folded' );
\t\t\t} );
\t\t</script>

\t\t{#
\t\t<script src=\"/bundles/cms/sticky-sidebar/jquery.sticky-sidebar.js\"></script>
\t\t<script type=\"text/javascript\">
\t    \$( function() {
\t\t\t\t\$('.system-sidebar').stickySidebar({
\t\t\t\t    topSpacing: 90,
\t\t\t\t    bottomSpacing: 0,
\t        \tinnerWrapperSelector: '.system-sidebar-inner'
\t\t\t\t});
\t\t\t});
\t\t</script>
\t\t#}
\t</body>
</html>
", "@Cms/interface.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/interface.html.twig");
    }
}
