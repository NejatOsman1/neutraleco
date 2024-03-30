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

/* @Cms/page/composer.html.twig */
class __TwigTemplate_7e2fdb22f5176df2639ba0d79125573b extends Template
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
        echo "<!-- Trinity framework class -->
<script>
var ckeditorlanguage = '";
        // line 4
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 4), "get", [0 => "locale"], "method", false, false, false, 4), "html", null, true);
        echo "';
</script>
";
        // line 7
        echo "<script src=\"/bundles/cms/ckeditor/trinity.js\"></script>

<script src=\"/bundles/cms/codemirror-5.60.0/lib/codemirror.js\"></script>
<link rel=\"stylesheet\" href=\"/bundles/cms/codemirror-5.60.0/lib/codemirror.css\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"/bundles/cms/select2/dist/css/select2.min.css\">
<script src=\"/bundles/cms/codemirror-5.60.0/mode/css/css.js\"></script>
<script src=\"/bundles/cms/codemirror-5.60.0/mode/javascript/javascript.js\"></script>
<script src=\"/bundles/cms/codemirror-5.60.0/mode/xml/xml.js\"></script>
<script src=\"/bundles/cms/codemirror-5.60.0/mode/htmlmixed/htmlmixed.js\"></script>
<script src=\"/bundles/cms/select2/dist/js/select2.min.js\"></script>
<script src=\"/bundles/cms/select2/dist/js/select2.ext.js\"></script>

<script>
Trinity.adminBundleLink = '";
        // line 20
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_link");
        echo "';
Trinity.adminPageLink = '";
        // line 21
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_selector");
        echo "';
Trinity.adminMediaLink = '";
        // line 22
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media", ["parentid" => ($context["pageMediaDirId"] ?? null), "type" => "image", "inline" => true]);
        echo "';
var composerMediaLink = '";
        // line 23
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media", ["parentid" => ($context["pageMediaDirId"] ?? null), "type" => "image", "inline" => true, "composer" => true]);
        echo "';
var composerMediaEdit = '";
        // line 24
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_edit");
        echo "';
</script>

<script type=\"text/javascript\">
var activeEditor = null;
var fileDrop = [];
var inlineDropzones = [];
var active_blocks = ";
        // line 31
        echo json_encode(($context["all_block_sections"] ?? null));
        echo ";
var admin_page_link = '";
        // line 32
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_link");
        echo "';
var admin_media_popup = '";
        // line 33
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_popup", ["parentid" => twig_get_attribute($this->env, $this->source, ($context["mediaParent"] ?? null), "id", [], "any", false, false, false, 33)]), "html", null, true);
        echo "';
var admin_page_composer_uploadhandler = '";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_composer_uploadhandler", ["pageid" => twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "id", [], "any", false, false, false, 34)]), "html", null, true);
        echo "';
var ext_icon = '";
        // line 35
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/ck_ext.png"), "html", null, true);
        echo "';
var maxFileSize = ";
        // line 36
        echo twig_escape_filter($this->env, ($context["maxFileSize"] ?? null), "html", null, true);
        echo ";

</script>

<style>
\t.sortable-placeholder{
\t\tfloat: left;
\t}

\t/* Center video */
\t.embed-container{
\t\tmargin-bottom: 20px;
\t}

\t.embed-container iframe {
\t    margin: 0 auto;
\t    display: block;
\t}

\t.option-tiles{
\t\t/**/
\t}

\t.option-tiles .tile{
\t\tdisplay: block;
\t\tpadding: 30px 0;
\t\tborder: solid 3px #00000008;
\t\tborder-radius: 6px;
\t\ttransition: .1s all;
\t\topacity: .5;
\t}

\t.option-tiles .tile i{
\t\tfont-size: 50px;
\t\tdisplay: block;
\t\tmargin-bottom: 10px;
\t}

\t.option-tiles .tile:hover{
\t\tborder-color: #34adea;
\t\tbackground: #34adea11;
\t\topacity: 1;
\t}

\t.option-tiles .tile.active{
\t\tborder-color: #34adea;
\t\tbackground: #34adea11;
\t\topacity: 1;
\t}

\t.CodeMirror {
\t    border: solid 1px #ccc;
\t}
\t.select2-container{ width:100% !important; }
</style>

<div id=\"new-section-notifier\" style=\"";
        // line 92
        if ((twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "blocks", [], "any", false, false, false, 92) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "blocks", [], "any", false, false, false, 92), "count", [], "any", false, false, false, 92))) {
            echo "display:none;";
        }
        echo "\">
\t";
        // line 93
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Klik op een blok hiernaast of sleep een blok hierheen om te beginnen.", [], "cms"), "html", null, true);
        echo "
</div>

<div id=\"block-container\">
\t";
        // line 97
        if ((twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "blocks", [], "any", false, false, false, 97) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "blocks", [], "any", false, false, false, 97), "count", [], "any", false, false, false, 97))) {
            // line 98
            echo "\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "blocks", [], "any", false, false, false, 98));
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
            foreach ($context['_seq'] as $context["pi"] => $context["pageBlock"]) {
                // line 99
                echo "
\t\t\t";
                // line 100
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "blocks", [], "any", false, false, false, 100), "count", [], "any", false, false, false, 100)) {
                    // line 101
                    echo "
\t\t\t\t";
                    // line 102
                    $context["wrapperTitle"] = [];
                    // line 103
                    echo "\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["pageBlock"], "blocks", [], "any", false, false, false, 103));
                    foreach ($context['_seq'] as $context["_key"] => $context["b"]) {
                        // line 104
                        echo "\t\t\t\t\t";
                        if ((twig_get_attribute($this->env, $this->source, $context["b"], "contentType", [], "any", false, false, false, 104) == "bundle")) {
                            // line 105
                            echo "                        ";
                            $context["bundlelabel"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["b"], "bundleLabel", [], "any", false, false, false, 105), [], "cms");
                            // line 106
                            echo "\t\t\t\t\t\t";
                            if (!twig_in_filter(($context["bundlelabel"] ?? null), ($context["wrapperTitle"] ?? null))) {
                                echo " ";
                                $context["wrapperTitle"] = twig_array_merge(($context["wrapperTitle"] ?? null), [0 => ($context["bundlelabel"] ?? null)]);
                                echo " ";
                            }
                            // line 107
                            echo "\t\t\t\t\t";
                        } elseif (twig_get_attribute($this->env, $this->source, $context["b"], "media", [], "any", false, false, false, 107)) {
                            // line 108
                            echo "                        ";
                            $context["bundlelabel"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media", [], "cms");
                            // line 109
                            echo "\t\t\t\t\t\t";
                            if (!twig_in_filter(($context["bundlelabel"] ?? null), ($context["wrapperTitle"] ?? null))) {
                                echo " ";
                                $context["wrapperTitle"] = twig_array_merge(($context["wrapperTitle"] ?? null), [0 => ($context["bundlelabel"] ?? null)]);
                                echo " ";
                            }
                            // line 110
                            echo "\t\t\t\t\t";
                        } else {
                            // line 111
                            echo "                        ";
                            $context["textlabel"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tekst", [], "cms");
                            // line 112
                            echo "\t\t\t\t\t\t";
                            if (!twig_in_filter(($context["textlabel"] ?? null), ($context["wrapperTitle"] ?? null))) {
                                echo " ";
                                $context["wrapperTitle"] = twig_array_merge(($context["wrapperTitle"] ?? null), [0 => ($context["textlabel"] ?? null)]);
                                echo " ";
                            }
                            // line 113
                            echo "\t\t\t\t\t";
                        }
                        // line 114
                        echo "\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['b'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 115
                    echo "
\t\t\t\t";
                    // line 116
                    $context["section"] = null;
                    // line 117
                    echo "\t\t\t\t";
                    if ((twig_get_attribute($this->env, $this->source, $context["pageBlock"], "templateKey", [], "any", false, false, false, 117) && twig_in_filter(twig_get_attribute($this->env, $this->source, $context["pageBlock"], "templateKey", [], "any", false, false, false, 117), twig_get_array_keys_filter(($context["all_block_sections"] ?? null))))) {
                        // line 118
                        echo "\t\t\t\t\t";
                        $context["section"] = (($__internal_compile_0 = ($context["all_block_sections"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, $context["pageBlock"], "templateKey", [], "any", false, false, false, 118)] ?? null) : null);
                        // line 119
                        echo "\t\t\t\t";
                    }
                    // line 120
                    echo "
\t\t\t\t";
                    // line 121
                    $context["allowMove"] = false;
                    // line 122
                    echo "\t\t\t\t";
                    if (($context["section"] ?? null)) {
                        // line 123
                        echo "\t\t\t\t\t<div class=\"root-block ";
                        echo ((twig_get_attribute($this->env, $this->source, $context["pageBlock"], "enabled", [], "any", false, false, false, 123)) ? ("visible") : ("invisible"));
                        echo " block card\" data-divider=\"";
                        echo (((($context["section"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["section"] ?? null), "divider", [], "any", true, true, false, 123))) ? ("1") : ("0"));
                        echo "\" data-id=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 123), "html", null, true);
                        echo "\" data-key=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["section"] ?? null), "key", [], "any", false, false, false, 123), "html", null, true);
                        echo "\">

\t\t\t\t\t\t<div class=\"add-section-between\">
\t\t\t\t\t\t\t<button type=\"button\" class=\"btn-flat wrap-paste tooltipped\" data-position=\"top\"  data-tooltip=\"";
                        // line 126
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Blok plakken", [], "cms"), "html", null, true);
                        echo "\" style=\"display:none;\" onclick=\"pasteBlock(this);\"><i class=\"far fa-clipboard\"></i></button>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"block_wrappers_attr[";
                        // line 130
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 130), "html", null, true);
                        echo "][key]\" value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "templateKey", [], "any", false, false, false, 130), "html", null, true);
                        echo "\" />
\t\t\t\t\t\t\t";
                        // line 131
                        $context["allowMove"] = (twig_get_attribute($this->env, $this->source, ($context["section"] ?? null), "allowMove", [], "any", false, false, false, 131) && (twig_get_attribute($this->env, $this->source, ($context["section"] ?? null), "allowMove", [], "any", false, false, false, 131) == true));
                        // line 132
                        echo "\t\t\t\t\t\t\t<div class=\"wrapper-actions\">
\t\t\t\t\t\t\t\t<a class=\"left wrapper-retract\"><i class=\"fa fa-angle-up\"></i></a>
\t\t\t\t\t\t\t\t<a class=\"left wrapper-expand\"><i class=\"fa fa-angle-down\"></i></a>
\t\t\t\t\t\t\t\t<span class=\"title left\">
\t\t\t\t\t\t\t\t\t";
                        // line 136
                        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, ($context["section"] ?? null), "label", [], "any", false, false, false, 136), [], "blocks");
                        echo "
\t\t\t\t\t\t\t\t\t";
                        // line 137
                        if ((twig_get_attribute($this->env, $this->source, ($context["section"] ?? null), "key", [], "any", false, false, false, 137) == "framework_empty")) {
                            // line 138
                            echo "\t\t\t\t\t\t\t\t\t\t<span style=\"color:#2093e8;\">";
                            (( !twig_test_empty(($context["wrapperTitle"] ?? null))) ? (print (twig_escape_filter($this->env, (" - " . twig_join_filter(($context["wrapperTitle"] ?? null), " + ")), "html", null, true))) : (print ("")));
                            echo "</span>
\t\t\t\t\t\t\t\t\t";
                        }
                        // line 140
                        echo "\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t<div class=\"actions\">
\t\t\t\t\t\t\t\t\t<div class=\"actions-inner\">
\t\t\t\t\t\t\t\t\t\t<a onclick=\"cpop.fixed(false).confirm('";
                        // line 144
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u dit blok verwijderen?", [], "cms"), "html", null, true);
                        echo "', function(){ deleteWrapper(this); cpop.close(); }.bind(this), '";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms"), "html", null, true);
                        echo "');\" class=\"right wrapper-delete\" data-bs-placement=\"top\" data-bs-toggle=\"tooltip\" title=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie verwijderen", [], "cms"), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"far fa-trash-alt\"></i>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t<a onclick=\"cloneWrapper(this);return false;\" class=\"right wrapper-clone\" data-bs-placement=\"top\" data-bs-toggle=\"tooltip\" title=\"";
                        // line 147
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie kopiëren", [], "cms"), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"far fa-clone\"></i>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t<a class=\"right\" data-bs-placement=\"top\" data-bs-toggle=\"tooltip\" title=\"";
                        // line 150
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zichtbaarheid", [], "cms"), "html", null, true);
                        echo "\" onclick=\"toggleVisibility(this);return false;\"><input type=\"checkbox\" name=\"block_wrappers_enabled[";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 150), "html", null, true);
                        echo "]\" value=\"1\" ";
                        echo ((twig_get_attribute($this->env, $this->source, $context["pageBlock"], "enabled", [], "any", false, false, false, 150)) ? ("checked") : (""));
                        echo ">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-eye visibility fa-fw\" style=\"display:";
                        // line 151
                        echo ((twig_get_attribute($this->env, $this->source, $context["pageBlock"], "enabled", [], "any", false, false, false, 151)) ? ("") : ("none"));
                        echo ";\"></i>
\t\t\t\t\t\t\t\t\t\t\t<i class=\"far fa-eye-slash visibility_off fa-fw\" style=\"display:";
                        // line 152
                        echo ((twig_get_attribute($this->env, $this->source, $context["pageBlock"], "enabled", [], "any", false, false, false, 152)) ? ("none") : (""));
                        echo ";\"></i>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t<a class=\"right\" data-modifier=\"heading\" data-bs-placement=\"top\" data-bs-toggle=\"tooltip\" title=\"";
                        // line 154
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie introtekst", [], "cms"), "html", null, true);
                        echo "\" onclick=\"toggleWrapperTextFields(this);return false;\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-heading\"></i>
\t\t\t\t\t\t\t\t\t\t\t";
                        // line 157
                        echo "\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t<a class=\"right\" data-bs-placement=\"top\" data-bs-toggle=\"tooltip\" title=\"";
                        // line 158
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verdeling van blokken", [], "cms"), "html", null, true);
                        echo "\" onclick=\"setGrid(this);return false;\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-th-large\"></i>
\t\t\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t\t\t";
                        // line 170
                        echo "
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"wrapper-grid\" name=\"wrapper-grid[";
                        // line 171
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 171), "html", null, true);
                        echo "]\" value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "gridSize", [], "any", false, false, false, 171), "html", null, true);
                        echo "\" />

\t\t\t\t\t\t\t\t\t\t<a class=\"right tooltipped\" data-modifier=\"settings\" data-bs-placement=\"top\" data-bs-toggle=\"tooltip\" title=\"";
                        // line 173
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie instellingen", [], "cms"), "html", null, true);
                        echo "\" onclick=\"toggleWrapperConfig(this);return false;\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-cog\"></i>
\t\t\t\t\t\t\t\t\t\t\t";
                        // line 176
                        echo "\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"card-content\" id=\"";
                        // line 182
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "cssId", [], "any", false, false, false, 182), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"block_wrappers[]\" value=\"";
                        // line 183
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 183), "html", null, true);
                        echo "\" />

\t\t\t\t\t\t\t";
                        // line 185
                        $context["selectClass"] = (((twig_get_attribute($this->env, $this->source, $context["pageBlock"], "selectClass", [], "any", true, true, false, 185) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["pageBlock"], "selectClass", [], "any", false, false, false, 185)))) ? (twig_get_attribute($this->env, $this->source, $context["pageBlock"], "selectClass", [], "any", false, false, false, 185)) : (""));
                        // line 186
                        echo "\t\t\t\t\t\t\t";
                        $context["selectTextColor"] = (((twig_get_attribute($this->env, $this->source, $context["pageBlock"], "selectTextColor", [], "any", true, true, false, 186) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["pageBlock"], "selectTextColor", [], "any", false, false, false, 186)))) ? (twig_get_attribute($this->env, $this->source, $context["pageBlock"], "selectTextColor", [], "any", false, false, false, 186)) : (""));
                        // line 187
                        echo "
\t\t\t\t\t\t\t<div class=\"wrapper-config\" style=\"display: none;\">
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t<h6>";
                        // line 191
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie classes", [], "cms"), "html", null, true);
                        echo "</h6>
\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t\t\t\t<div data-bs-placement=\"top\" data-bs-toggle=\"tooltip\" title=\"";
                        // line 193
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie ID", [], "cms"), "html", null, true);
                        echo "\" class=\"input-group-text\"><i class=\"fa fa-fw fa-hashtag\"></i></div>
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" id=\"section-config-id\" type=\"text\" name=\"wrapper-config[";
                        // line 194
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 194), "html", null, true);
                        echo "][cssId]\" value=\"";
                        (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["pageBlock"], "cssId", [], "any", false, false, false, 194))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "cssId", [], "any", false, false, false, 194), "html", null, true))) : (print ("")));
                        echo "\" placeholder=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie ID", [], "cms"), "html", null, true);
                        echo "\" />
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"select2-container w-100 input-group\">
\t\t\t\t\t\t\t\t\t\t\t";
                        // line 198
                        $context["items"] = [];
                        // line 199
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        $context["dbItems"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "cssClass", [], "any", false, false, false, 199), " ");
                        // line 200
                        echo "\t\t\t\t\t\t\t\t\t\t\t<div data-bs-placement=\"top\" data-bs-toggle=\"tooltip\" title=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie class", [], "cms"), "html", null, true);
                        echo "\" class=\"input-group-text\"><i class=\"fa fa-fw fa-code\"></i></div>
\t\t\t\t\t\t\t\t\t\t\t<select multiple class=\"tag-selector multiple form-select\" name=\"wrapper-config[";
                        // line 201
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 201), "html", null, true);
                        echo "][cssClass][]\" placeholder=\"Anchor link class\"  tabindex=\"-1\" aria-hidden=\"true\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 202
                        if ( !twig_test_empty(($context["allBlockCssClasses"] ?? null))) {
                            // line 203
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable(($context["allBlockCssClasses"] ?? null));
                            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                                // line 204
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context["arrItems"] = twig_split_filter($this->env, (($__internal_compile_1 = $context["item"]) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["css_class"] ?? null) : null), " ");
                                // line 205
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable(($context["arrItems"] ?? null));
                                foreach ($context['_seq'] as $context["_key"] => $context["cssClass"]) {
                                    // line 206
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if (( !twig_test_empty($context["cssClass"]) && !twig_in_filter($context["cssClass"], ($context["items"] ?? null)))) {
                                        // line 207
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        $context["items"] = twig_array_merge(($context["items"] ?? null), [0 => $context["cssClass"]]);
                                        // line 208
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                                        echo twig_escape_filter($this->env, $context["cssClass"], "html", null, true);
                                        echo "\"";
                                        if (twig_in_filter($context["cssClass"], ($context["dbItems"] ?? null))) {
                                            echo " selected";
                                        }
                                        echo ">";
                                        echo twig_escape_filter($this->env, $context["cssClass"], "html", null, true);
                                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 210
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cssClass'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 211
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 212
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 213
                        echo "\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t<!--
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" id=\"section-config-class\" type=\"text\" name=\"wrapper-config[";
                        // line 215
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 215), "html", null, true);
                        echo "][cssClass]\" value=\"";
                        (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["pageBlock"], "cssClass", [], "any", false, false, false, 215))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "cssClass", [], "any", false, false, false, 215), "html", null, true))) : (print ("")));
                        echo "\" placeholder=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie Class", [], "cms"), "html", null, true);
                        echo "\" />-->
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t\t\t\t<div data-bs-placement=\"top\" data-bs-toggle=\"tooltip\" title=\"";
                        // line 219
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie anchor link class", [], "cms"), "html", null, true);
                        echo "\" class=\"input-group-text\"><i class=\"fa fa-fw fa-anchor\"></i></div>
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" id=\"section-config-anchor\" type=\"text\" name=\"wrapper-config[";
                        // line 220
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 220), "html", null, true);
                        echo "][anchor]\" value=\"";
                        (((twig_get_attribute($this->env, $this->source, $context["pageBlock"], "anchor", [], "any", true, true, false, 220) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["pageBlock"], "anchor", [], "any", false, false, false, 220)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "anchor", [], "any", false, false, false, 220), "html", null, true))) : (print ("")));
                        echo "\" placeholder=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Anchor link class", [], "cms"), "html", null, true);
                        echo "\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t

\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t<h6>";
                        // line 226
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie opties", [], "cms"), "html", null, true);
                        echo "</h6>
\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t\t\t\t<div data-bs-placement=\"top\" data-bs-toggle=\"tooltip\" title=\"";
                        // line 228
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie achtergrondkleur", [], "cms"), "html", null, true);
                        echo "\" class=\"input-group-text\"><i class=\"fa fa-fw fa-fill-drip\"></i></div>
\t\t\t\t\t\t\t\t\t\t\t<select class=\"form-select\" name=\"wrapper-config[";
                        // line 229
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 229), "html", null, true);
                        echo "][selectClass]\" id=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 230
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(($context["wrapperClasses"] ?? null));
                        foreach ($context['_seq'] as $context["key"] => $context["label"]) {
                            // line 231
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<option ";
                            echo (((($context["selectClass"] ?? null) == $context["key"])) ? ("selected") : (""));
                            echo " value=\"";
                            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $context["label"], "html", null, true);
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['key'], $context['label'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 233
                        echo "\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t\t\t\t<div data-bs-placement=\"top\" data-bs-toggle=\"tooltip\" title=\"";
                        // line 237
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie tekstkleur", [], "cms"), "html", null, true);
                        echo "\" class=\"input-group-text\"><i class=\"fa fa-fw fa-font\"></i></div>
\t\t\t\t\t\t\t\t\t\t\t<select class=\"form-select\" name=\"wrapper-config[";
                        // line 238
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 238), "html", null, true);
                        echo "][selectTextColor]\" id=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 239
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(($context["wrapperTextColor"] ?? null));
                        foreach ($context['_seq'] as $context["key"] => $context["label"]) {
                            // line 240
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<option ";
                            echo (((($context["selectTextColor"] ?? null) == $context["key"])) ? ("selected") : (""));
                            echo " value=\"";
                            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                            echo "\">";
                            echo twig_escape_filter($this->env, $context["label"], "html", null, true);
                            echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['key'], $context['label'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 242
                        echo "\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<h6>";
                        // line 247
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie padding", [], "cms"), "html", null, true);
                        echo "</h6>

\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-4\"></div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-4\"><input class=\"padding-field form-control centered\" type=\"text\" placeholder=\"Boven\" name=\"wrapper-config[";
                        // line 251
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 251), "html", null, true);
                        echo "][paddingTop]\" value=\"";
                        (((twig_get_attribute($this->env, $this->source, $context["pageBlock"], "paddingTop", [], "any", true, true, false, 251) &&  !(null === twig_get_attribute($this->env, $this->source, $context["pageBlock"], "paddingTop", [], "any", false, false, false, 251)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "paddingTop", [], "any", false, false, false, 251), "html", null, true))) : (print ("")));
                        echo "\"></div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-4\"></div>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-4\"><input disabled class=\"padding-field form-control centered\" type=\"text\" placeholder=\"Links\" name=\"wrapper-config[";
                        // line 256
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 256), "html", null, true);
                        echo "][paddingLeft]\" value=\"";
                        (((twig_get_attribute($this->env, $this->source, $context["pageBlock"], "paddingLeft", [], "any", true, true, false, 256) &&  !(null === twig_get_attribute($this->env, $this->source, $context["pageBlock"], "paddingLeft", [], "any", false, false, false, 256)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "paddingLeft", [], "any", false, false, false, 256), "html", null, true))) : (print ("")));
                        echo "\"></div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-4\"><a onclick=\"resetPaddingFields();\" style=\"cursor:pointer;\" class=\"btn btn-flat centered\"><i class=\"fa fa-undo-alt\"></i> Reset</a></div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-4\"><input disabled class=\"padding-field form-control centered\" type=\"text\" placeholder=\"Rechts\" name=\"wrapper-config[";
                        // line 258
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 258), "html", null, true);
                        echo "][paddingRight]\" value=\"";
                        (((twig_get_attribute($this->env, $this->source, $context["pageBlock"], "paddingRight", [], "any", true, true, false, 258) &&  !(null === twig_get_attribute($this->env, $this->source, $context["pageBlock"], "paddingRight", [], "any", false, false, false, 258)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "paddingRight", [], "any", false, false, false, 258), "html", null, true))) : (print ("")));
                        echo "\"></div>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-4\"></div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-4\"><input class=\"padding-field form-control centered\" type=\"text\" placeholder=\"Onder\" name=\"wrapper-config[";
                        // line 263
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 263), "html", null, true);
                        echo "][paddingBottom]\" value=\"";
                        (((twig_get_attribute($this->env, $this->source, $context["pageBlock"], "paddingBottom", [], "any", true, true, false, 263) &&  !(null === twig_get_attribute($this->env, $this->source, $context["pageBlock"], "paddingBottom", [], "any", false, false, false, 263)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "paddingBottom", [], "any", false, false, false, 263), "html", null, true))) : (print ("")));
                        echo "\"></div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-4\"></div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                        // line 268
                        echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t";
                        // line 282
                        echo "
\t\t\t\t\t\t\t<div class=\"wrapper-text-fields\" style=\"display:";
                        // line 283
                        echo ((( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["pageBlock"], "label", [], "any", false, false, false, 283)) ||  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["pageBlock"], "intro", [], "any", false, false, false, 283)))) ? ("block") : ("none"));
                        echo ";\">
\t\t\t\t\t\t\t\t<h2 data-editor=\"";
                        // line 284
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 284), "html", null, true);
                        echo "_wrp_fld_label\" class=\"ckeditor4-inline ck-limited\" contenteditable=\"true\">";
                        (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["pageBlock"], "label", [], "any", false, false, false, 284))) ? (print (twig_get_attribute($this->env, $this->source, $context["pageBlock"], "label", [], "any", false, false, false, 284))) : (print (twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Titel", [], "cms"), "html", null, true))));
                        echo "</h2>
\t\t\t\t\t\t\t\t<input id=\"";
                        // line 285
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 285), "html", null, true);
                        echo "_wrp_fld_label\" class=\"inline-editor main-label\" type=\"hidden\" name=\"wrapper_fields[";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 285), "html", null, true);
                        echo "][label]\" value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["pageBlock"], "label", [], "any", false, false, false, 285);
                        echo "\" /><br />

\t\t\t\t\t\t\t\t<div></div>

\t\t\t\t\t\t\t\t<div data-editor=\"";
                        // line 289
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 289), "html", null, true);
                        echo "_wrp_fld_intro\" class=\"ckeditor4-inline ck-limited\" contenteditable=\"true\">";
                        (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["pageBlock"], "intro", [], "any", false, false, false, 289))) ? (print (twig_get_attribute($this->env, $this->source, $context["pageBlock"], "intro", [], "any", false, false, false, 289))) : (print (twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Introductie tekst", [], "cms"), "html", null, true))));
                        echo "</div>
\t\t\t\t\t\t\t\t<input id=\"";
                        // line 290
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 290), "html", null, true);
                        echo "_wrp_fld_intro\" class=\"inline-editor sub-label ck-limited\" type=\"hidden\" name=\"wrapper_fields[";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 290), "html", null, true);
                        echo "][intro]\" value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["pageBlock"], "intro", [], "any", false, false, false, 290);
                        echo "\" /><br />
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t";
                        // line 293
                        $context["leftOver"] = 12;
                        // line 294
                        echo "
\t\t\t\t\t\t\t";
                        // line 295
                        $context["containmentLabelsFound"] = [];
                        // line 296
                        echo "\t\t\t\t\t\t\t";
                        $context["containmentBlocks"] = [];
                        // line 297
                        echo "
\t\t\t\t\t\t\t<ul class=\"content-container ";
                        // line 298
                        echo ((($context["allowMove"] ?? null)) ? ("sortables connectedSortable") : (""));
                        echo "\">

\t\t\t\t\t\t\t\t";
                        // line 300
                        $context["w"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "blocks", [], "any", false, false, false, 300), "count", [], "any", false, false, false, 300)) ? ((100 / twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "blocks", [], "any", false, false, false, 300), "count", [], "any", false, false, false, 300))) : ("100"));
                        // line 301
                        echo "
\t\t\t\t\t\t\t\t";
                        // line 302
                        $context["break"] = false;
                        // line 303
                        echo "\t\t\t\t\t\t\t\t";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["pageBlock"], "blocks", [], "any", false, false, false, 303));
                        foreach ($context['_seq'] as $context["_key"] => $context["childBlock"]) {
                            // line 304
                            echo "\t\t\t\t\t\t\t\t\t";
                            if (twig_get_attribute($this->env, $this->source, $context["childBlock"], "contained", [], "any", false, false, false, 304)) {
                                // line 305
                                echo "\t\t\t\t\t\t\t\t\t\t";
                                if (!twig_in_filter(twig_get_attribute($this->env, $this->source, $context["childBlock"], "contained", [], "any", false, false, false, 305), ($context["containmentLabelsFound"] ?? null))) {
                                    // line 306
                                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                                    $context["containmentLabelsFound"] = twig_array_merge(($context["containmentLabelsFound"] ?? null), [0 => twig_get_attribute($this->env, $this->source, $context["childBlock"], "contained", [], "any", false, false, false, 306)]);
                                    // line 307
                                    echo "\t\t\t\t\t\t\t\t\t\t";
                                } else {
                                    // line 308
                                    echo "\t\t\t\t\t\t\t\t\t\t\t";
                                    $context["containmentBlocks"] = twig_array_merge(($context["containmentBlocks"] ?? null), [0 => $context["childBlock"]]);
                                    // line 309
                                    echo "\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 310
                                echo "\t\t\t\t\t\t\t\t\t";
                            }
                            // line 311
                            echo "\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['childBlock'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 312
                        echo "
\t\t\t\t\t\t\t\t";
                        // line 313
                        $context["break"] = false;
                        // line 314
                        echo "\t\t\t\t\t\t\t\t";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["pageBlock"], "blocks", [], "any", false, false, false, 314));
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
                        foreach ($context['_seq'] as $context["_key"] => $context["childBlock"]) {
                            // line 315
                            echo "\t\t\t\t\t\t\t\t\t";
                            if ( !($context["break"] ?? null)) {
                                // line 316
                                echo "\t\t\t\t\t\t\t\t\t";
                                $context["section_block"] = null;
                                // line 317
                                echo "\t\t\t\t\t\t\t\t\t";
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["section"] ?? null), "blocks", [], "any", false, false, false, 317));
                                foreach ($context['_seq'] as $context["_key"] => $context["tmp"]) {
                                    // line 318
                                    echo "\t\t\t\t\t\t\t\t\t\t";
                                    if ((twig_get_attribute($this->env, $this->source, $context["tmp"], "key", [], "any", false, false, false, 318) == twig_get_attribute($this->env, $this->source, $context["childBlock"], "templateKey", [], "any", false, false, false, 318))) {
                                        // line 319
                                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                                        $context["section_block"] = $context["tmp"];
                                        // line 320
                                        echo "
\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 321
                                        $context["size"] = twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "size", [], "any", false, false, false, 321);
                                        // line 322
                                        echo "
\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 323
                                        if ((($context["size"] ?? null) < ($context["leftOver"] ?? null))) {
                                            // line 324
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                                            $context["leftOver"] = (($context["leftOver"] ?? null) - ($context["size"] ?? null));
                                            // line 325
                                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                                        } else {
                                            // line 326
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                                            $context["size"] = ($context["leftOver"] ?? null);
                                            // line 327
                                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 328
                                        echo "
\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 329
                                        $context["w"] = ((($context["size"] ?? null) / 12) * 100);
                                        // line 330
                                        echo "\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 331
                                    echo "\t\t\t\t\t\t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tmp'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 332
                                echo "
\t\t\t\t\t\t\t\t\t";
                                // line 333
                                if ((twig_get_attribute($this->env, $this->source, $context["pageBlock"], "gridSize", [], "any", false, false, false, 333) > 0)) {
                                    // line 334
                                    echo "\t\t\t\t\t\t\t\t\t\t";
                                    $context["w"] = (100 / twig_get_attribute($this->env, $this->source, $context["pageBlock"], "gridSize", [], "any", false, false, false, 334));
                                    // line 335
                                    echo "\t\t\t\t\t\t\t\t\t";
                                }
                                // line 336
                                echo "
\t\t\t\t\t\t\t\t\t";
                                // line 337
                                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 337), "width", [], "any", true, true, false, 337) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 337), "width", [], "any", false, false, false, 337)))) {
                                    // line 338
                                    echo "\t\t\t\t\t\t\t\t\t\t";
                                    $context["size"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 338), "width", [], "any", false, false, false, 338);
                                    // line 339
                                    echo "\t\t\t\t\t\t\t\t\t\t";
                                    $context["w"] = ((($context["size"] ?? null) / 12) * 100);
                                    // line 340
                                    echo "\t\t\t\t\t\t\t\t\t";
                                }
                                // line 341
                                echo "
\t\t\t\t\t\t\t\t\t";
                                // line 342
                                $context["off"] = 0;
                                // line 343
                                echo "\t\t\t\t\t\t\t\t\t";
                                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 343), "offset", [], "any", true, true, false, 343) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 343), "offset", [], "any", false, false, false, 343)))) {
                                    // line 344
                                    echo "\t\t\t\t\t\t\t\t\t\t";
                                    $context["size"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 344), "offset", [], "any", false, false, false, 344);
                                    // line 345
                                    echo "\t\t\t\t\t\t\t\t\t\t";
                                    $context["off"] = ((($context["size"] ?? null) / 12) * 100);
                                    // line 346
                                    echo "\t\t\t\t\t\t\t\t\t";
                                }
                                // line 347
                                echo "
\t\t\t\t\t\t\t\t\t";
                                // line 348
                                $context["contained"] = false;
                                // line 349
                                echo "\t\t\t\t\t\t\t\t\t";
                                if (twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "contained", [], "any", true, true, false, 349)) {
                                    // line 350
                                    echo "\t\t\t\t\t\t\t\t\t\t";
                                    $context["contained"] = twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "contained", [], "any", false, false, false, 350);
                                    // line 351
                                    echo "\t\t\t\t\t\t\t\t\t";
                                }
                                // line 352
                                echo "
\t\t\t\t\t\t\t\t\t";
                                // line 353
                                $context["bundleRequired"] = false;
                                // line 354
                                echo "\t\t\t\t\t\t\t\t\t";
                                $context["dataRequired"] = false;
                                // line 355
                                echo "
\t\t\t\t\t\t\t\t\t";
                                // line 356
                                if (((($context["section_block"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "required", [], "any", true, true, false, 356)) && twig_in_filter("Bundle", twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "required", [], "any", false, false, false, 356)))) {
                                    // line 357
                                    echo "\t\t\t\t\t\t\t\t\t\t";
                                    $context["bundleRequired"] = twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "required", [], "any", false, false, false, 357);
                                    // line 358
                                    echo "\t\t\t\t\t\t\t\t\t";
                                } elseif (((twig_get_attribute($this->env, $this->source, $context["childBlock"], "data", [], "any", true, true, false, 358) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "data", [], "any", false, true, false, 358), "type", [], "any", true, true, false, 358)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "data", [], "any", false, false, false, 358), "type", [], "any", false, false, false, 358)))) {
                                    // line 359
                                    echo "\t\t\t\t\t\t\t\t\t\t";
                                    $context["dataRequired"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "data", [], "any", false, false, false, 359), "type", [], "any", false, false, false, 359);
                                    // line 360
                                    echo "\t\t\t\t\t\t\t\t\t";
                                } elseif ((($context["section_block"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "required", [], "any", true, true, false, 360))) {
                                    // line 361
                                    echo "\t\t\t\t\t\t\t\t\t\t";
                                    $context["dataRequired"] = twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "required", [], "any", false, false, false, 361);
                                    // line 362
                                    echo "\t\t\t\t\t\t\t\t\t";
                                }
                                // line 363
                                echo "
\t\t\t\t\t\t\t\t\t";
                                // line 364
                                $context["blockDividerSupport"] = (($context["section"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["section"] ?? null), "divider", [], "any", true, true, false, 364));
                                // line 365
                                echo "
\t\t\t\t\t\t\t\t\t";
                                // line 366
                                $context["mediaDrop"] = twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "mediaDrop", [], "any", true, true, false, 366);
                                // line 367
                                echo "
\t\t\t\t\t\t\t\t\t";
                                // line 368
                                if ((null === ($context["section_block"] ?? null))) {
                                    // line 369
                                    echo "\t\t\t\t\t\t\t\t\t\t";
                                    // line 370
                                    echo "\t\t\t\t\t\t\t\t\t";
                                } else {
                                    // line 371
                                    echo "\t\t\t\t\t\t\t\t\t\t<li id=\"";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 371), "html", null, true);
                                    echo "\" class=\"col content-block ui-state-default ";
                                    if (($context["contained"] ?? null)) {
                                        echo "contained";
                                    }
                                    echo " ";
                                    if (($context["mediaDrop"] ?? null)) {
                                        echo "media-drop";
                                    }
                                    echo "\" style=\"float: left;margin-left:";
                                    echo twig_escape_filter($this->env, ($context["off"] ?? null), "html", null, true);
                                    echo "%;width:";
                                    echo twig_escape_filter($this->env, ($context["w"] ?? null), "html", null, true);
                                    echo "%;\" data-gridsize=\"";
                                    echo twig_escape_filter($this->env, twig_round(((12 / 100) * ($context["w"] ?? null))), "html", null, true);
                                    echo "\" data-width=\"";
                                    echo twig_escape_filter($this->env, ($context["w"] ?? null), "html", null, true);
                                    echo "%\" data-blockid=\"";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 371), "html", null, true);
                                    echo "\" data-key=\"";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "key", [], "any", false, false, false, 371), "html", null, true);
                                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 372
                                    if (($context["blockDividerSupport"] ?? null)) {
                                        // line 373
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"divider\" style=\"overflow:visible;\"></span>
\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 375
                                    echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-content content-block-wrapper ";
                                    // line 376
                                    if ((((($context["dataRequired"] ?? null) == "media") && (($context["dataRequired"] ?? null) == "medias")) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["childBlock"], "content", [], "any", false, false, false, 376)))) {
                                        echo "float-actions";
                                    }
                                    echo "\">

\t\t\t\t\t\t\t\t\t\t\t\t\t<div  class=\"block-actions right-align\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 379
                                    if (($context["allowMove"] ?? null)) {
                                        echo "<span class=\"left btn-handle\"><i class=\"fa fa-arrows-alt\"></i></span>";
                                    }
                                    // line 380
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"";
                                    // line 381
                                    ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 381), "class", [], "any", true, true, false, 381)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 381), "class", [], "any", false, false, false, 381), "html", null, true))) : (print ("")));
                                    echo "\" class=\"hidden-field cfg_class\" name=\"block_config[";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 381), "html", null, true);
                                    echo "][class]\" placeholder=\"class\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"";
                                    // line 382
                                    ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 382), "style", [], "any", true, true, false, 382)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 382), "style", [], "any", false, false, false, 382), "html", null, true))) : (print ("")));
                                    echo "\" class=\"hidden-field cfg_style\" name=\"block_config[";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 382), "html", null, true);
                                    echo "][style]\" placeholder=\"style\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"";
                                    // line 383
                                    ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 383), "link", [], "any", true, true, false, 383)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 383), "link", [], "any", false, false, false, 383), "html", null, true))) : (print ("")));
                                    echo "\" class=\"hidden-field cfg_link\" name=\"block_config[";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 383), "html", null, true);
                                    echo "][link]\" placeholder=\"link\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"";
                                    // line 384
                                    ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 384), "target", [], "any", true, true, false, 384)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 384), "target", [], "any", false, false, false, 384), "html", null, true))) : (print ("")));
                                    echo "\" class=\"hidden-field cfg_target\" name=\"block_config[";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 384), "html", null, true);
                                    echo "][target]\" placeholder=\"target\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"";
                                    // line 385
                                    ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 385), "width", [], "any", true, true, false, 385)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 385), "width", [], "any", false, false, false, 385), "html", null, true))) : (print ("")));
                                    echo "\" class=\"hidden-field cfg_width\" name=\"block_config[";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 385), "html", null, true);
                                    echo "][width]\" placeholder=\"width\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"";
                                    // line 386
                                    ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 386), "offset", [], "any", true, true, false, 386)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 386), "offset", [], "any", false, false, false, 386), "html", null, true))) : (print ("")));
                                    echo "\" class=\"hidden-field cfg_offset\" name=\"block_config[";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 386), "html", null, true);
                                    echo "][offset]\" placeholder=\"offset\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"";
                                    // line 387
                                    ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 387), "id", [], "any", true, true, false, 387)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 387), "id", [], "any", false, false, false, 387), "html", null, true))) : (print ("")));
                                    echo "\" class=\"hidden-field cfg_id\" name=\"block_config[";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 387), "html", null, true);
                                    echo "][id]\" placeholder=\"id\" />

\t\t\t\t                    \t\t\t\t\t<div class=\"right-actions\">
\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t<a onclick=\"blockSettings(this);\" class=\" tooltipped\" data-position=\"top\"  data-tooltip=\"";
                                    // line 390
                                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Blok instellingen", [], "cms"), "html", null, true);
                                    echo "\"><i class=\"fa fa-fw fa-cog\"></i></a>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 392
                                    $context["showBlockEdit"] = true;
                                    // line 393
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if ((( !(null === twig_get_attribute($this->env, $this->source, $context["childBlock"], "media", [], "any", false, false, false, 393)) || twig_test_empty(twig_get_attribute($this->env, $this->source, $context["childBlock"], "contentType", [], "any", false, false, false, 393))) || (twig_get_attribute($this->env, $this->source, $context["childBlock"], "contentType", [], "any", false, false, false, 393) == "bundle"))) {
                                        // line 394
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        $context["showBlockEdit"] = false;
                                        // line 395
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 396
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 397
                                    if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "fields", [], "any", false, false, false, 397))) {
                                        // line 398
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 399
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        $context["showBlockEdit"] = true;
                                        // line 400
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 401
                                    echo "
\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t";
                                    // line 403
                                    echo "\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t";
                                    if ((twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "multiple", [], "any", true, true, false, 403) && (twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "multiple", [], "any", false, false, false, 403) == true))) {
                                        // line 404
                                        echo "\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t\t<a onclick=\"addStaticBlock(this);\" class=\"tooltipped\" data-position=\"top\"  data-tooltip=\"";
                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Blok toevoegen", [], "cms"), "html", null, true);
                                        echo "\"><i class=\"fa fa-plus\"></i></a>
\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t\t<a onclick=\"delStaticBlock(this);\" class=\"static-block-delete\"><i class=\"far fa-trash-alt\"></i></a>
\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t";
                                    } else {
                                        // line 407
                                        echo "\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t\t";
                                        if (twig_in_filter("_empty", twig_get_attribute($this->env, $this->source, ($context["section"] ?? null), "key", [], "any", false, false, false, 407))) {
                                            // line 408
                                            echo "\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"delContent(this);\" class=\"btn-clear\"><i class=\"fa fa-eraser\"></i></a>
\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"delBlock(this);\"><i class=\"far fa-trash-alt\"></i></a>
\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 411
                                        echo "\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 412
                                    echo "\t\t\t\t                    \t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field\" name=\"block[";
                                    // line 415
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 415), "html", null, true);
                                    echo "][]\" value=\"";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 415), "html", null, true);
                                    echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field\" name=\"block_attr[";
                                    // line 416
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 416), "html", null, true);
                                    echo "][key]\" value=\"";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "templateKey", [], "any", false, false, false, 416), "html", null, true);
                                    echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field\" name=\"block_req[";
                                    // line 417
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 417), "html", null, true);
                                    echo "]\" value=\"";
                                    echo twig_escape_filter($this->env, ($context["dataRequired"] ?? null), "html", null, true);
                                    echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t<textarea style=\"display:none;\" class=\"block_data\" name=\"block_data[";
                                    // line 418
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 418), "html", null, true);
                                    echo "]\">";
                                    echo ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "data", [], "any", true, true, false, 418)) ? (json_encode(twig_get_attribute($this->env, $this->source, $context["childBlock"], "data", [], "any", false, false, false, 418))) : ("[]"));
                                    echo "</textarea>

\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 420
                                    if (($context["contained"] ?? null)) {
                                        // line 421
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field\" name=\"block_contained[";
                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 421), "html", null, true);
                                        echo "]\" value=\"";
                                        echo twig_escape_filter($this->env, ($context["contained"] ?? null), "html", null, true);
                                        echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 423
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 424
                                    if ((($context["dataRequired"] ?? null) == "medias")) {
                                        // line 425
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["childBlock"], "content", [], "any", false, false, false, 425)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["childBlock"], "media", [], "any", false, false, false, 425)))) {
                                            // line 426
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            $context["ct"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "content", [], "any", false, false, false, 426), ",");
                                            // line 427
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            $context["cnt"] = (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "altMedia", [], "any", false, false, false, 427), "count", [], "any", false, false, false, 427) + 1);
                                            // line 428
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            if ((($context["cnt"] ?? null) > 1)) {
                                                // line 429
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                $context["wdt"] = (100 / ($context["cnt"] ?? null));
                                                // line 430
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                if ((($context["wdt"] ?? null) < 50)) {
                                                    // line 431
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    $context["wdt"] = 50;
                                                    // line 432
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                }
                                                // line 433
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 434
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-image block-ct clearfix\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"mm-wrap\" style=\"";
                                            // line 435
                                            ((array_key_exists("wdt", $context)) ? (print (twig_escape_filter($this->env, (("float:left;width:" . ($context["wdt"] ?? null)) . "%;"), "html", null, true))) : (print ("")));
                                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"mm-actions\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" onclick=\"removeMM(this);return false;\"><i class=\"far fa-trash-alt\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img style=\"max-width:";
                                            // line 439
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "media", [], "any", false, false, false, 439), "width", [], "any", false, false, false, 439), "html", null, true);
                                            echo "px;margin:0 auto;\" src=\"/";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "media", [], "any", false, false, false, 439), "getWebPath", [], "any", false, false, false, 439), "html", null, true);
                                            echo "\" alt=\"";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "media", [], "any", false, false, false, 439), "label", [], "any", false, false, false, 439), "html", null, true);
                                            echo "\" data-mediaid=\"";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "media", [], "any", false, false, false, 439), "id", [], "any", false, false, false, 439), "html", null, true);
                                            echo "\" data-filepath=\"/";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "media", [], "any", false, false, false, 439), "getWebPath", [], "any", false, false, false, 439), "html", null, true);
                                            echo "\" data-label=\"";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "media", [], "any", false, false, false, 439), "label", [], "any", false, false, false, 439), "html", null, true);
                                            echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            // line 441
                                            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["childBlock"], "altMedia", [], "any", false, false, false, 441))) {
                                                // line 442
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                $context['_parent'] = $context;
                                                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["childBlock"], "altMedia", [], "any", false, false, false, 442));
                                                foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                                                    // line 443
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"mm-wrap\" style=\"";
                                                    ((array_key_exists("wdt", $context)) ? (print (twig_escape_filter($this->env, (("float:left;width:" . ($context["wdt"] ?? null)) . "%;"), "html", null, true))) : (print ("")));
                                                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"mm-actions\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" onclick=\"removeMM(this);return false;\"><i class=\"far fa-trash-alt\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img style=\"max-width:";
                                                    // line 447
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["m"], "media", [], "any", false, false, false, 447), "width", [], "any", false, false, false, 447), "html", null, true);
                                                    echo "px;margin:0 auto;\" src=\"/";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["m"], "media", [], "any", false, false, false, 447), "getWebPath", [], "any", false, false, false, 447), "html", null, true);
                                                    echo "\" alt=\"";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["m"], "media", [], "any", false, false, false, 447), "label", [], "any", false, false, false, 447), "html", null, true);
                                                    echo "\" data-mediaid=\"";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["m"], "media", [], "any", false, false, false, 447), "id", [], "any", false, false, false, 447), "html", null, true);
                                                    echo "\" data-filepath=\"/";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["m"], "media", [], "any", false, false, false, 447), "getWebPath", [], "any", false, false, false, 447), "html", null, true);
                                                    echo "\" data-label=\"";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["m"], "media", [], "any", false, false, false, 447), "label", [], "any", false, false, false, 447), "html", null, true);
                                                    echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                }
                                                $_parent = $context['_parent'];
                                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
                                                $context = array_intersect_key($context, $_parent) + $_parent;
                                                // line 450
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 451
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field media-id block-ct\" placeholder=\"media data\" name=\"block_content[";
                                            // line 452
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 452), "html", null, true);
                                            echo "][]\" value=\"";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "content", [], "any", false, false, false, 452), "html", null, true);
                                            echo "\" />

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"center-align media-selector\" style=\"margin: 10px 0;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"addMedia(this, true);\" class=\"btn\"><i class=\"left fa fa-image\"></i>";
                                            // line 455
                                            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Afbeelding(en) toevoegen", [], "cms"), "html", null, true);
                                            echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 458
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    } elseif (((($context["dataRequired"] ?? null) == "media") ||  !(null === twig_get_attribute($this->env, $this->source, $context["childBlock"], "media", [], "any", false, false, false, 458)))) {
                                        // line 459
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["childBlock"], "content", [], "any", false, false, false, 459)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["childBlock"], "media", [], "any", false, false, false, 459)))) {
                                            // line 460
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            $context["ct"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "content", [], "any", false, false, false, 460), ",");
                                            // line 461
                                            echo "\t\t\t\t                      \t\t\t\t\t\t<div class=\"card-image-wrapper\">
\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t\t<div class=\"card-image block-ct\"><img style=\"max-width:";
                                            // line 462
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "media", [], "any", false, false, false, 462), "width", [], "any", false, false, false, 462), "html", null, true);
                                            echo "px;margin:0 auto;\" src=\"/";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "media", [], "any", false, false, false, 462), "getWebPath", [], "any", false, false, false, 462), "html", null, true);
                                            echo "\" alt=\"";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "media", [], "any", false, false, false, 462), "label", [], "any", false, false, false, 462), "html", null, true);
                                            echo "\" data-mediaid=\"";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "media", [], "any", false, false, false, 462), "id", [], "any", false, false, false, 462), "html", null, true);
                                            echo "\" data-filepath=\"/";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "media", [], "any", false, false, false, 462), "getWebPath", [], "any", false, false, false, 462), "html", null, true);
                                            echo "\" data-label=\"";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "media", [], "any", false, false, false, 462), "label", [], "any", false, false, false, 462), "html", null, true);
                                            echo "\" /></div>
\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field media-id block-ct\" placeholder=\"media data\" name=\"block_content[";
                                            // line 463
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 463), "html", null, true);
                                            echo "][]\" value=\"";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "content", [], "any", false, false, false, 463), "html", null, true);
                                            echo "\" />

\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t\t<div class=\"media-selector\">
\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"addMedia(this);\"><i class=\"left fa fa-edit\"></i></a>
\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t                      \t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 470
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    } else {
                                        // line 471
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        if ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "contentType", [], "any", false, false, false, 471) == "text")) {
                                            // line 472
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div data-editor=\"editor-";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 472), "html", null, true);
                                            echo "\" class=\"ckeditor4 form-control\" contenteditable=\"true\">";
                                            echo twig_get_attribute($this->env, $this->source, $context["childBlock"], "content", [], "any", false, false, false, 472);
                                            echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<textarea name=\"block_content[";
                                            // line 473
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 473), "html", null, true);
                                            echo "][]\" class=\"inline-editor\" id=\"editor-";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 473), "html", null, true);
                                            echo "\">";
                                            echo twig_get_attribute($this->env, $this->source, $context["childBlock"], "content", [], "any", false, false, false, 473);
                                            echo "</textarea>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        } elseif ((twig_get_attribute($this->env, $this->source,                                         // line 474
$context["childBlock"], "contentType", [], "any", false, false, false, 474) == "source")) {
                                            // line 475
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<textarea name=\"block_content[";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 475), "html", null, true);
                                            echo "][]\" class=\"source-editor\" id=\"editor-";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 475), "html", null, true);
                                            echo "\">";
                                            echo twig_get_attribute($this->env, $this->source, $context["childBlock"], "content", [], "any", false, false, false, 475);
                                            echo "</textarea>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"block_type[";
                                            // line 476
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 476), "html", null, true);
                                            echo "][]\" value=\"source\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        } elseif ((twig_get_attribute($this->env, $this->source,                                         // line 477
$context["childBlock"], "contentType", [], "any", false, false, false, 477) == "bundle")) {
                                            // line 478
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"block-ct\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"block_bundle[";
                                            // line 479
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 479), "html", null, true);
                                            echo "][bundle]\" class=\"hidden-field bundle-bundle\" value=\"";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "bundle", [], "any", false, false, false, 479), "html", null, true);
                                            echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"block_bundle[";
                                            // line 480
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 480), "html", null, true);
                                            echo "][label]\" class=\"hidden-field bundle-label\" value=\"";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "bundleLabel", [], "any", false, false, false, 480), "html", null, true);
                                            echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"block_bundle[";
                                            // line 481
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 481), "html", null, true);
                                            echo "][data]\" class=\"hidden-field bundle-data\" value=\"";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "bundleData", [], "any", false, false, false, 481), "html", null, true);
                                            echo "\" id=\"";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 481), "html", null, true);
                                            echo "_data\" />

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h3>";
                                            // line 483
                                            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Extensie:", [], "cms"), "html", null, true);
                                            echo " ";
                                            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["childBlock"], "bundleLabel", [], "any", false, false, false, 483), [], "cms"), "html", null, true);
                                            echo "</h3>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"linked-bundle-config\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            // line 486
                                            $context["templateList"] = [0 => (("Trinity" . twig_get_attribute($this->env, $this->source, $context["childBlock"], "bundleLabel", [], "any", false, false, false, 486)) . "Bundle::link_preview.html.twig")];
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            // line 487
                                            if ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "bundle", [], "any", true, true, false, 487) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["childBlock"], "bundle", [], "any", false, false, false, 487)))) {
                                                // line 488
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                $context["testValue"] = (twig_get_attribute($this->env, $this->source, $context["childBlock"], "bundle", [], "any", false, false, false, 488) . "::link_preview.html.twig");
                                                // line 489
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                if (!twig_in_filter(($context["testValue"] ?? null), ($context["templateList"] ?? null))) {
                                                    // line 490
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    $context["templateList"] = twig_array_merge(($context["templateList"] ?? null), ($context["templateList"] ?? null));
                                                    // line 491
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                }
                                                // line 492
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 493
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            $__internal_compile_2 = null;
                                            try {
                                                $__internal_compile_2 =                                                 $this->loadTemplate(($context["templateList"] ?? null), "@Cms/page/composer.html.twig", 493);
                                            } catch (LoaderError $e) {
                                                // ignore missing template
                                            }
                                            if ($__internal_compile_2) {
                                                $__internal_compile_2->display(twig_array_merge($context, ["config" => json_decode(twig_get_attribute($this->env, $this->source, $context["childBlock"], "bundleData", [], "any", false, false, false, 493))]));
                                            }
                                            // line 494
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        } elseif ((                                        // line 496
($context["dataRequired"] ?? null) == "medias")) {
                                            // line 497
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"block_content[";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 497), "html", null, true);
                                            echo "][]\" class=\"media-data hidden-field\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        } elseif ((                                        // line 498
($context["dataRequired"] ?? null) == "media")) {
                                            // line 499
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"block_content[";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 499), "html", null, true);
                                            echo "][]\" class=\"media-data hidden-field\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        } elseif ((                                        // line 500
($context["dataRequired"] ?? null) == "video")) {
                                            // line 501
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"block_content[";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 501), "html", null, true);
                                            echo "][]\" class=\"video-data hidden-field\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 503
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 504
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 505
                                    if ((((twig_get_attribute($this->env, $this->source, $context["childBlock"], "data", [], "any", true, true, false, 505) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["childBlock"], "data", [], "any", false, false, false, 505))) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "data", [], "any", false, true, false, 505), "type", [], "any", true, true, false, 505)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "data", [], "any", false, false, false, 505), "type", [], "any", false, false, false, 505) == "video"))) {
                                        // line 506
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        echo twig_get_attribute($this->env, $this->source, $context["childBlock"], "video", [0 => true, 1 => true], "method", false, false, false, 506);
                                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 508
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if ((($context["section_block"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "fields", [], "any", false, false, false, 508))) {
                                        // line 509
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        $context['_parent'] = $context;
                                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "fields", [], "any", false, false, false, 509));
                                        foreach ($context['_seq'] as $context["fi"] => $context["field"]) {
                                            // line 510
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"fields-row ";
                                            echo ((($context["fi"] == 0)) ? ("first") : (""));
                                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-label\">";
                                            // line 511
                                            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["field"], "label", [], "any", false, false, false, 511), [], "blocks"), "html", null, true);
                                            echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"blocks-display-form\" id=\"view_";
                                            // line 512
                                            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 512) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 512)), "html", null, true);
                                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            // line 513
                                            if ((twig_get_attribute($this->env, $this->source, $context["field"], "type", [], "any", false, false, false, 513) == "page")) {
                                                // line 514
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 514), twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 514), [], "array", true, true, false, 514) &&  !twig_test_empty((($__internal_compile_3 = twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 514)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 514)] ?? null) : null)))) ? ((($__internal_compile_4 = twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 514)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 514)] ?? null) : null)) : ("<span class=\"grey-text\">n.v.t.</span>"));
                                                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            } elseif ((twig_get_attribute($this->env, $this->source,                                             // line 515
$context["field"], "type", [], "any", false, false, false, 515) == "checkbox")) {
                                                // line 516
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 516), twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 516), [], "array", true, true, false, 516) && (($__internal_compile_5 = twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 516)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 516)] ?? null) : null))) ? ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Ja", [], "cms")) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nee", [], "cms")));
                                                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            } else {
                                                // line 518
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 518), twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 518), [], "array", true, true, false, 518) &&  !twig_test_empty((($__internal_compile_6 = twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 518)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 518)] ?? null) : null)))) ? ((($__internal_compile_7 = twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 518)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 518)] ?? null) : null)) : ("<span class=\"grey-text\">n.v.t.</span>"));
                                                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 520
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"blocks-edit-form\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            // line 522
                                            if ((twig_get_attribute($this->env, $this->source, $context["field"], "type", [], "any", false, false, false, 522) == "text")) {
                                                // line 523
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" data-type=\"";
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "type", [], "any", false, false, false, 523), "html", null, true);
                                                echo "\" id=\"";
                                                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 523) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 523)), "html", null, true);
                                                echo "\" data-linkkey=\"";
                                                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 523) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 523)), "html", null, true);
                                                echo "\" data-key=\"";
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 523), "html", null, true);
                                                echo "\" data-label=\"";
                                                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["field"], "label", [], "any", false, false, false, 523), [], "blocks"), "html", null, true);
                                                echo "\" type=\"text\" value=\"";
                                                ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 523), twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 523), [], "array", true, true, false, 523)) ? (print (twig_escape_filter($this->env, (($__internal_compile_8 = twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 523)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 523)] ?? null) : null), "html", null, true))) : (print ("")));
                                                echo "\" class=\"template-fields\" name=\"block_config[";
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 523), "html", null, true);
                                                echo "][";
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 523), "html", null, true);
                                                echo "]\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            } elseif ((twig_get_attribute($this->env, $this->source,                                             // line 524
$context["field"], "type", [], "any", false, false, false, 524) == "page")) {
                                                // line 525
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" onclick=\"linkSelector(this);\" class=\"btn\">Selecteer een pagina</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"pagelabel\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input data-type=\"";
                                                // line 528
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "type", [], "any", false, false, false, 528), "html", null, true);
                                                echo "\" id=\"";
                                                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 528) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 528)), "html", null, true);
                                                echo "\" data-linkkey=\"";
                                                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 528) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 528)), "html", null, true);
                                                echo "\" data-key=\"";
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 528), "html", null, true);
                                                echo "\" data-label=\"";
                                                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["field"], "label", [], "any", false, false, false, 528), [], "blocks"), "html", null, true);
                                                echo "\" type=\"hidden\" value=\"";
                                                ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 528), twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 528), [], "array", true, true, false, 528)) ? (print (twig_escape_filter($this->env, (($__internal_compile_9 = twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 528)) && is_array($__internal_compile_9) || $__internal_compile_9 instanceof ArrayAccess ? ($__internal_compile_9[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 528)] ?? null) : null), "html", null, true))) : (print ("")));
                                                echo "\" class=\"template-fields pageid\" name=\"block_config[";
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 528), "html", null, true);
                                                echo "][";
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 528), "html", null, true);
                                                echo "]\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            } elseif ((twig_get_attribute($this->env, $this->source,                                             // line 530
$context["field"], "type", [], "any", false, false, false, 530) == "textarea")) {
                                                // line 531
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div data-editor=\"";
                                                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 531) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 531)), "html", null, true);
                                                echo "\" id=\"inline-editor-";
                                                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 531) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 531)), "html", null, true);
                                                echo "\" class=\"ckeditor4 form-control\" contenteditable=\"true\">";
                                                echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 531), twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 531), [], "array", true, true, false, 531)) ? ((($__internal_compile_10 = twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 531)) && is_array($__internal_compile_10) || $__internal_compile_10 instanceof ArrayAccess ? ($__internal_compile_10[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 531)] ?? null) : null)) : (""));
                                                echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<textarea class=\"form-control\" data-type=\"";
                                                // line 532
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "type", [], "any", false, false, false, 532), "html", null, true);
                                                echo "\" id=\"";
                                                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 532) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 532)), "html", null, true);
                                                echo "\" data-linkkey=\"";
                                                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 532) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 532)), "html", null, true);
                                                echo "\" data-key=\"";
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 532), "html", null, true);
                                                echo "\" data-label=\"";
                                                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["field"], "label", [], "any", false, false, false, 532), [], "blocks"), "html", null, true);
                                                echo "\" class=\"inline-editor template-fields\" name=\"block_config[";
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 532), "html", null, true);
                                                echo "][";
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 532), "html", null, true);
                                                echo "]\">";
                                                echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 532), twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 532), [], "array", true, true, false, 532)) ? ((($__internal_compile_11 = twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 532)) && is_array($__internal_compile_11) || $__internal_compile_11 instanceof ArrayAccess ? ($__internal_compile_11[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 532)] ?? null) : null)) : (""));
                                                echo "</textarea>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            } elseif ((twig_get_attribute($this->env, $this->source,                                             // line 533
$context["field"], "type", [], "any", false, false, false, 533) == "checkbox")) {
                                                // line 534
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-check-input\" id=\"";
                                                // line 535
                                                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 535) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 535)), "html", null, true);
                                                echo "\" type=\"checkbox\" name=\"block_config[";
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 535), "html", null, true);
                                                echo "][";
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 535), "html", null, true);
                                                echo "]\" ";
                                                echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 535), twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 535), [], "array", true, true, false, 535)) ? ("checked=\"checked\"") : (""));
                                                echo " />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"";
                                                // line 536
                                                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 536) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 536)), "html", null, true);
                                                echo "\">&nbsp;</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            } elseif ((twig_get_attribute($this->env, $this->source,                                             // line 538
$context["field"], "type", [], "any", false, false, false, 538) == "select")) {
                                                // line 539
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"select\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                // line 540
                                                if ((twig_get_attribute($this->env, $this->source, $context["field"], "choices", [], "any", true, true, false, 540) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["field"], "choices", [], "any", false, false, false, 540)))) {
                                                    // line 541
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"block_config[";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 541), "html", null, true);
                                                    echo "][";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 541), "html", null, true);
                                                    echo "]\" id=\"";
                                                    echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 541) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 541)), "html", null, true);
                                                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    // line 542
                                                    $context['_parent'] = $context;
                                                    $context['_seq'] = twig_ensure_traversable($this->extensions['App\CmsBundle\Twig\Extension\Helpers']->objectFilter(twig_get_attribute($this->env, $this->source, $context["field"], "choices", [], "any", false, false, false, 542)));
                                                    foreach ($context['_seq'] as $context["key"] => $context["val"]) {
                                                        // line 543
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option ";
                                                        echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 543), twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 543), [], "array", true, true, false, 543) && ((($__internal_compile_12 = twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 543)) && is_array($__internal_compile_12) || $__internal_compile_12 instanceof ArrayAccess ? ($__internal_compile_12[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 543)] ?? null) : null) == $context["key"]))) ? ("selected=\"selected\"") : (""));
                                                        echo " value=\"";
                                                        echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                                                        echo "\">";
                                                        echo $context["val"];
                                                        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    }
                                                    $_parent = $context['_parent'];
                                                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
                                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                                    // line 545
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                } else {
                                                    // line 547
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"error\">";
                                                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("GEEN KEUZES BESCHIKBAAR IN BLOCK CONFIG", [], "cms"), "html", null, true);
                                                    echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                }
                                                // line 549
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 551
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        $_parent = $context['_parent'];
                                        unset($context['_seq'], $context['_iterated'], $context['fi'], $context['field'], $context['_parent'], $context['loop']);
                                        $context = array_intersect_key($context, $_parent) + $_parent;
                                        // line 554
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 555
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"inline-actionss center-align\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"";
                                    // line 557
                                    if ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "contentType", [], "any", false, false, false, 557) != "bundle")) {
                                        echo "display:none;";
                                    }
                                    echo "\" class=\"btn btn-edit tooltipped\" onclick=\"editBundle(this);\" data-tooltip=\"";
                                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Extensie configureren", [], "cms"), "html", null, true);
                                    echo "\"><i class=\"far fa-check-square\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"";
                                    // line 558
                                    if ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "contentType", [], "any", false, false, false, 558) != "bundle")) {
                                        echo "display:none;";
                                    }
                                    echo "\" class=\"btn btn-clear red tooltipped\" onclick=\"delContent(this);\" data-tooltip=\"";
                                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Blok leegmaken", [], "cms"), "html", null, true);
                                    echo "\"><i class=\"far fa-trash-alt\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 559
                                    if (($context["bundleRequired"] ?? null)) {
                                        // line 560
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" ";
                                        if ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "contentType", [], "any", false, false, false, 560) == "bundle")) {
                                            echo "style=\"display:none;\"";
                                        }
                                        echo " class=\"btn btn-bundle\" onclick=\"addSpecificBundle(this, '";
                                        echo twig_escape_filter($this->env, ($context["bundleRequired"] ?? null), "html", null, true);
                                        echo "');\"><i class=\"left fa fa-paperclip\"></i>";
                                        echo twig_escape_filter($this->env, ($context["bundleRequired"] ?? null), "html", null, true);
                                        echo " ";
                                        echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Koppelen", [], "cms")), "html", null, true);
                                        echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    } else {
                                        // line 562
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        if (($context["dataRequired"] ?? null)) {
                                            // line 563
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            if ((($context["dataRequired"] ?? null) == "medias")) {
                                                // line 564
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"";
                                                echo ((((twig_get_attribute($this->env, $this->source, $context["childBlock"], "contentType", [], "any", false, false, false, 564) == "") || (twig_get_attribute($this->env, $this->source, $context["childBlock"], "content", [], "any", false, false, false, 564) == ""))) ? ("") : ("display:none;"));
                                                echo "\" class=\"btn btn-image\" onclick=\"addMedia(this, true);\"><i class=\"fa fa-image fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            } elseif ((                                            // line 565
($context["dataRequired"] ?? null) == "media")) {
                                                // line 566
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"";
                                                echo (((((twig_get_attribute($this->env, $this->source, $context["childBlock"], "contentType", [], "any", false, false, false, 566) == "") || (twig_get_attribute($this->env, $this->source, $context["childBlock"], "content", [], "any", false, false, false, 566) == "")) || twig_test_empty(twig_get_attribute($this->env, $this->source, $context["childBlock"], "media", [], "any", false, false, false, 566)))) ? ("") : ("display:none;"));
                                                echo "\" class=\"btn btn-image tooltipped\" onclick=\"addMedia(this);\" data-tooltip=\"";
                                                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media koppelen", [], "cms"), "html", null, true);
                                                echo "\"><i class=\"fa fa-image fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            } elseif ((                                            // line 567
($context["dataRequired"] ?? null) == "video")) {
                                                // line 568
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"";
                                                echo ((((twig_get_attribute($this->env, $this->source, $context["childBlock"], "contentType", [], "any", false, false, false, 568) == "") || (twig_get_attribute($this->env, $this->source, $context["childBlock"], "content", [], "any", false, false, false, 568) == ""))) ? ("") : ("display:none;"));
                                                echo "\" class=\"btn btn-video tooltipped\" onclick=\"addVideo(this);\" data-tooltip=\"";
                                                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Video koppelen", [], "cms"), "html", null, true);
                                                echo "\"><i class=\"far fa-play-circle fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            } elseif ((                                            // line 569
($context["dataRequired"] ?? null) == "text")) {
                                                // line 570
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"";
                                                echo ((((twig_get_attribute($this->env, $this->source, $context["childBlock"], "contentType", [], "any", false, false, false, 570) == "") || (twig_get_attribute($this->env, $this->source, $context["childBlock"], "content", [], "any", false, false, false, 570) == ""))) ? ("") : ("display:none;"));
                                                echo "\" class=\"btn btn-text tooltipped\" onclick=\"addText(this);\" data-bs-toggle=\"tooltip\" title=\"";
                                                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tekst koppelen", [], "cms"), "html", null, true);
                                                echo "\"><i class=\"fa fa-align-left fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 572
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        } else {
                                            // line 573
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            if (((twig_get_attribute($this->env, $this->source, $context["childBlock"], "contentType", [], "any", false, false, false, 573) == "") && ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "data", [], "any", true, true, false, 573) && twig_test_empty(twig_get_attribute($this->env, $this->source, $context["childBlock"], "data", [], "any", false, false, false, 573))) ||  !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "data", [], "any", false, true, false, 573), "type", [], "any", true, true, false, 573)))) {
                                                // line 574
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-text tooltipped\" onclick=\"addText(this);\" data-bs-toggle=\"tooltip\" title=\"";
                                                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tekst koppelen", [], "cms"), "html", null, true);
                                                echo "\"><i class=\"fa fa-align-left fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-image tooltipped\" onclick=\"addMedia(this);\" data-tooltip=\"";
                                                // line 575
                                                echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media koppelen", [], "cms");
                                                echo "\"><i class=\"fa fa-image fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-video tooltipped\" onclick=\"addVideo(this);\" data-tooltip=\"";
                                                // line 576
                                                echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Video koppelen", [], "cms");
                                                echo "\"><i class=\"far fa-play-circle fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-bundle tooltipped\" onclick=\"addBundle(this);\" data-tooltip=\"";
                                                // line 577
                                                echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Extensie koppelen", [], "cms");
                                                echo "\"><i class=\"fa fa-cube fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-source tooltipped\" onclick=\"addSource(this);\" data-tooltip=\"";
                                                // line 578
                                                echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("HTML koppelen", [], "cms");
                                                echo "\"><i class=\"fa fa-code fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            } else {
                                                // line 580
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"display:none;\" class=\"btn btn-text tooltipped\" onclick=\"addText(this);\" data-bs-toggle=\"tooltip\" title=\"";
                                                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tekst koppelen", [], "cms"), "html", null, true);
                                                echo "\"><i class=\"fa fa-align-left fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"display:none;\" class=\"btn btn-image tooltipped\" onclick=\"addMedia(this);\" data-tooltip=\"";
                                                // line 581
                                                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media koppelen", [], "cms"), "html", null, true);
                                                echo "\"><i class=\"fa fa-image fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"display:none;\" class=\"btn btn-video tooltipped\" onclick=\"addVideo(this);\" data-tooltip=\"";
                                                // line 582
                                                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Video koppelen", [], "cms"), "html", null, true);
                                                echo "\"><i class=\"far fa-play-circle fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"display:none;\" class=\"btn btn-bundle tooltipped\" onclick=\"addBundle(this);\" data-tooltip=\"";
                                                // line 583
                                                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Extensie koppelen", [], "cms"), "html", null, true);
                                                echo "\"><i class=\"fa fa-cube fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"display:none;\" class=\"btn btn-source tooltipped\" onclick=\"addSource(this);\" data-tooltip=\"";
                                                // line 584
                                                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("HTML koppelen", [], "cms"), "html", null, true);
                                                echo "\"><i class=\"fa fa-code fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 586
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 587
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 588
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 591
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    if (twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "buttons", [], "any", true, true, false, 591)) {
                                        // line 592
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"block-buttons\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"button-wrapper\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        // line 595
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, true, false, 595), "buttons", [], "any", true, true, false, 595)) {
                                            // line 596
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            $context['_parent'] = $context;
                                            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["childBlock"], "config", [], "any", false, false, false, 596), "buttons", [], "any", false, false, false, 596));
                                            foreach ($context['_seq'] as $context["index"] => $context["btn"]) {
                                                // line 597
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"editButton(this, '";
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 597), "html", null, true);
                                                echo "');\" data-url=\"";
                                                ((twig_get_attribute($this->env, $this->source, $context["btn"], "url", [], "any", true, true, false, 597)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["btn"], "url", [], "any", false, false, false, 597), "html", null, true))) : (print ("")));
                                                echo "\" data-class=\"";
                                                ((twig_get_attribute($this->env, $this->source, $context["btn"], "class", [], "any", true, true, false, 597)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["btn"], "class", [], "any", false, false, false, 597), "html", null, true))) : (print ("")));
                                                echo "\" data-label=\"";
                                                ((twig_get_attribute($this->env, $this->source, $context["btn"], "label", [], "any", true, true, false, 597)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["btn"], "label", [], "any", false, false, false, 597), "html", null, true))) : (print ("")));
                                                echo "\" data-target=\"";
                                                ((twig_get_attribute($this->env, $this->source, $context["btn"], "target", [], "any", true, true, false, 597)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["btn"], "target", [], "any", false, false, false, 597), "html", null, true))) : (print ("")));
                                                echo "\" class=\"btn custom-block-btn\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                // line 598
                                                echo twig_get_attribute($this->env, $this->source, $context["btn"], "label", [], "any", false, false, false, 598);
                                                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field\" name=\"block_config[";
                                                // line 599
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 599), "html", null, true);
                                                echo "][buttons][";
                                                echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                                                echo "][label]\" value=\"";
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["btn"], "label", [], "any", false, false, false, 599), "html", null, true);
                                                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field\" name=\"block_config[";
                                                // line 600
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 600), "html", null, true);
                                                echo "][buttons][";
                                                echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                                                echo "][url]\" value=\"";
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["btn"], "url", [], "any", false, false, false, 600), "html", null, true);
                                                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field\" name=\"block_config[";
                                                // line 601
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 601), "html", null, true);
                                                echo "][buttons][";
                                                echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                                                echo "][class]\" value=\"";
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["btn"], "class", [], "any", false, false, false, 601), "html", null, true);
                                                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field\" name=\"block_config[";
                                                // line 602
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 602), "html", null, true);
                                                echo "][buttons][";
                                                echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                                                echo "][target]\" value=\"";
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["btn"], "target", [], "any", false, false, false, 602), "html", null, true);
                                                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            $_parent = $context['_parent'];
                                            unset($context['_seq'], $context['_iterated'], $context['index'], $context['btn'], $context['_parent'], $context['loop']);
                                            $context = array_intersect_key($context, $_parent) + $_parent;
                                            // line 605
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                        }
                                        // line 606
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"add-new-block-btn btn-flat\" type=\"button\" onclick=\"addButton(this, ";
                                        // line 607
                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["childBlock"], "id", [], "any", false, false, false, 607), "html", null, true);
                                        echo ");\"><i class=\"left fa fa-plus\"></i> ";
                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Knop toevoegen", [], "cms"), "html", null, true);
                                        echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 610
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 614
                                    if (twig_get_attribute($this->env, $this->source, $context["childBlock"], "contained", [], "any", false, false, false, 614)) {
                                        // line 615
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                                        $context['_parent'] = $context;
                                        $context['_seq'] = twig_ensure_traversable(($context["containmentBlocks"] ?? null));
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
                                        foreach ($context['_seq'] as $context["_key"] => $context["cBlock"]) {
                                            // line 616
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card\" data-blockid=\"";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 616), "html", null, true);
                                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-content content-block-wrapper ";
                                            // line 617
                                            if ((((($context["dataRequired"] ?? null) == "medias") || (($context["dataRequired"] ?? null) == "media")) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["cBlock"], "content", [], "any", false, false, false, 617)))) {
                                                echo "float-actions";
                                            }
                                            echo "\">

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div  class=\"block-actions right-align\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            // line 620
                                            if (($context["allowMove"] ?? null)) {
                                                echo "<span class=\"left btn-handle\"><i class=\"fa fa-arrows-alt\"></i></span>";
                                            }
                                            // line 621
                                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"";
                                            // line 622
                                            ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, true, false, 622), "class", [], "any", true, true, false, 622)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, false, false, 622), "class", [], "any", false, false, false, 622), "html", null, true))) : (print ("")));
                                            echo "\" class=\"hidden-field cfg_class\" name=\"block_config[";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 622), "html", null, true);
                                            echo "][class]\" placeholder=\"class\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"";
                                            // line 623
                                            ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, true, false, 623), "style", [], "any", true, true, false, 623)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, false, false, 623), "style", [], "any", false, false, false, 623), "html", null, true))) : (print ("")));
                                            echo "\" class=\"hidden-field cfg_style\" name=\"block_config[";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 623), "html", null, true);
                                            echo "][style]\" placeholder=\"style\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"";
                                            // line 624
                                            ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, true, false, 624), "link", [], "any", true, true, false, 624)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, false, false, 624), "link", [], "any", false, false, false, 624), "html", null, true))) : (print ("")));
                                            echo "\" class=\"hidden-field cfg_link\" name=\"block_config[";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 624), "html", null, true);
                                            echo "][link]\" placeholder=\"link\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"";
                                            // line 625
                                            ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, true, false, 625), "target", [], "any", true, true, false, 625)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, false, false, 625), "target", [], "any", false, false, false, 625), "html", null, true))) : (print ("")));
                                            echo "\" class=\"hidden-field cfg_target\" name=\"block_config[";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 625), "html", null, true);
                                            echo "][target]\" placeholder=\"target\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"";
                                            // line 626
                                            ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, true, false, 626), "width", [], "any", true, true, false, 626)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, false, false, 626), "width", [], "any", false, false, false, 626), "html", null, true))) : (print ("")));
                                            echo "\" class=\"hidden-field cfg_width\" name=\"block_config[";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 626), "html", null, true);
                                            echo "][width]\" placeholder=\"width\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"";
                                            // line 627
                                            ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, true, false, 627), "offset", [], "any", true, true, false, 627)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, false, false, 627), "offset", [], "any", false, false, false, 627), "html", null, true))) : (print ("")));
                                            echo "\" class=\"hidden-field cfg_offset\" name=\"block_config[";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 627), "html", null, true);
                                            echo "][offset]\" placeholder=\"offset\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" value=\"";
                                            // line 628
                                            ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, true, false, 628), "id", [], "any", true, true, false, 628)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, false, false, 628), "id", [], "any", false, false, false, 628), "html", null, true))) : (print ("")));
                                            echo "\" class=\"hidden-field cfg_id\" name=\"block_config[";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 628), "html", null, true);
                                            echo "][id]\" placeholder=\"id\" />

\t\t\t\t\t\t                    \t\t\t\t\t<div class=\"right-actions\">
\t\t\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t<a onclick=\"blockSettings(this);\" class=\" tooltipped\" data-position=\"top\"  data-tooltip=\"";
                                            // line 631
                                            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Blok instellingen", [], "cms"), "html", null, true);
                                            echo "\"><i class=\"fa fa-fw fa-cog\"></i></a>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            // line 633
                                            $context["showBlockEdit"] = true;
                                            // line 634
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            if ((( !(null === twig_get_attribute($this->env, $this->source, $context["cBlock"], "media", [], "any", false, false, false, 634)) || twig_test_empty(twig_get_attribute($this->env, $this->source, $context["cBlock"], "contentType", [], "any", false, false, false, 634))) || (twig_get_attribute($this->env, $this->source, $context["cBlock"], "contentType", [], "any", false, false, false, 634) == "bundle"))) {
                                                // line 635
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                $context["showBlockEdit"] = false;
                                                // line 636
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 637
                                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            // line 638
                                            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "fields", [], "any", false, false, false, 638))) {
                                                // line 639
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                // line 640
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                $context["showBlockEdit"] = true;
                                                // line 641
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 642
                                            echo "
\t\t\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t";
                                            // line 644
                                            echo "\t\t\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t";
                                            if ((twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "multiple", [], "any", true, true, false, 644) && (twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "multiple", [], "any", false, false, false, 644) == true))) {
                                                // line 645
                                                echo "\t\t\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t\t<a onclick=\"addStaticBlock(this);\" class=\"tooltipped\" data-position=\"top\"  data-tooltip=\"";
                                                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Blok toevoegen", [], "cms"), "html", null, true);
                                                echo "\"><i class=\"fa fa-plus\"></i></a>
\t\t\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t\t<a onclick=\"delStaticBlock(this);\" class=\"static-block-delete\"><i class=\"far fa-trash-alt\"></i></a>
\t\t\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t";
                                            } else {
                                                // line 648
                                                echo "\t\t\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t\t";
                                                if (twig_in_filter("_empty", twig_get_attribute($this->env, $this->source, ($context["section"] ?? null), "key", [], "any", false, false, false, 648))) {
                                                    // line 649
                                                    echo "\t\t\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"delContent(this);\" class=\"btn-clear\"><i class=\"fa fa-eraser\"></i></a>
\t\t\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"delBlock(this);\"><i class=\"far fa-trash-alt\"></i></a>
\t\t\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t\t";
                                                }
                                                // line 652
                                                echo "\t\t\t\t\t\t\t  \t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 653
                                            echo "\t\t\t\t\t\t                    \t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field\" name=\"block[";
                                            // line 656
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["pageBlock"], "id", [], "any", false, false, false, 656), "html", null, true);
                                            echo "][]\" value=\"";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 656), "html", null, true);
                                            echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field\" name=\"block_attr[";
                                            // line 657
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 657), "html", null, true);
                                            echo "][key]\" value=\"";
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "templateKey", [], "any", false, false, false, 657), "html", null, true);
                                            echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field\" name=\"block_req[";
                                            // line 658
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 658), "html", null, true);
                                            echo "]\" value=\"";
                                            echo twig_escape_filter($this->env, ($context["dataRequired"] ?? null), "html", null, true);
                                            echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<textarea style=\"display:none;\" class=\"block_data\" name=\"block_data[";
                                            // line 659
                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 659), "html", null, true);
                                            echo "]\">";
                                            echo json_encode(twig_get_attribute($this->env, $this->source, $context["cBlock"], "data", [], "any", false, false, false, 659));
                                            echo "</textarea>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            // line 661
                                            if (($context["contained"] ?? null)) {
                                                // line 662
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field\" name=\"block_contained[";
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 662), "html", null, true);
                                                echo "]\" value=\"";
                                                echo twig_escape_filter($this->env, ($context["contained"] ?? null), "html", null, true);
                                                echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 664
                                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            // line 665
                                            if ((($context["dataRequired"] ?? null) == "medias")) {
                                                // line 666
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["cBlock"], "content", [], "any", false, false, false, 666)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["cBlock"], "media", [], "any", false, false, false, 666)))) {
                                                    // line 667
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    $context["ct"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "content", [], "any", false, false, false, 667), ",");
                                                    // line 668
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-image block-ct\"><img style=\"max-width:";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "media", [], "any", false, false, false, 668), "width", [], "any", false, false, false, 668), "html", null, true);
                                                    echo "px;margin:0 auto;\" src=\"/";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "media", [], "any", false, false, false, 668), "getWebPath", [], "any", false, false, false, 668), "html", null, true);
                                                    echo "\" alt=\"";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "media", [], "any", false, false, false, 668), "label", [], "any", false, false, false, 668), "html", null, true);
                                                    echo "\" data-mediaid=\"";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "media", [], "any", false, false, false, 668), "id", [], "any", false, false, false, 668), "html", null, true);
                                                    echo "\" data-filepath=\"/";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "media", [], "any", false, false, false, 668), "getWebPath", [], "any", false, false, false, 668), "html", null, true);
                                                    echo "\" data-label=\"";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "media", [], "any", false, false, false, 668), "label", [], "any", false, false, false, 668), "html", null, true);
                                                    echo "\" /></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field media-id block-ct\" placeholder=\"";
                                                    // line 669
                                                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("media data", [], "cms"), "html", null, true);
                                                    echo "\" name=\"block_content[";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 669), "html", null, true);
                                                    echo "][]\" value=\"";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "content", [], "any", false, false, false, 669), "html", null, true);
                                                    echo "\" />

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"center-align media-selector\" style=\"margin: 10px 0;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"addMedia(this);\" class=\"btn btn-small\"><i class=\"left fa fa-edit\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                }
                                                // line 675
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            } elseif ((($context["dataRequired"] ?? null) == "media")) {
                                                // line 676
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["cBlock"], "content", [], "any", false, false, false, 676)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["cBlock"], "media", [], "any", false, false, false, 676)))) {
                                                    // line 677
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    $context["ct"] = twig_split_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "content", [], "any", false, false, false, 677), ",");
                                                    // line 678
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-image block-ct\"><img style=\"max-width:";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "media", [], "any", false, false, false, 678), "width", [], "any", false, false, false, 678), "html", null, true);
                                                    echo "px;margin:0 auto;\" src=\"/";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "media", [], "any", false, false, false, 678), "getWebPath", [], "any", false, false, false, 678), "html", null, true);
                                                    echo "\" alt=\"";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "media", [], "any", false, false, false, 678), "label", [], "any", false, false, false, 678), "html", null, true);
                                                    echo "\" data-mediaid=\"";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "media", [], "any", false, false, false, 678), "id", [], "any", false, false, false, 678), "html", null, true);
                                                    echo "\" data-filepath=\"/";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "media", [], "any", false, false, false, 678), "getWebPath", [], "any", false, false, false, 678), "html", null, true);
                                                    echo "\" data-label=\"";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "media", [], "any", false, false, false, 678), "label", [], "any", false, false, false, 678), "html", null, true);
                                                    echo "\" /></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field media-id block-ct\" placeholder=\"";
                                                    // line 679
                                                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("media data", [], "cms"), "html", null, true);
                                                    echo "\" name=\"block_content[";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 679), "html", null, true);
                                                    echo "][]\" value=\"";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "content", [], "any", false, false, false, 679), "html", null, true);
                                                    echo "\" />

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"center-align media-selector\" style=\"margin: 10px 0;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"addMedia(this);\" class=\"btn btn-small\"><i class=\"left fa fa-edit\"></i></a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                }
                                                // line 685
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            } else {
                                                // line 686
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                if ((twig_get_attribute($this->env, $this->source, $context["cBlock"], "contentType", [], "any", false, false, false, 686) == "text")) {
                                                    // line 687
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div data-editor=\"editor-";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 687), "html", null, true);
                                                    echo "\" class=\"ckeditor4 form-control\" contenteditable=\"true\">";
                                                    echo twig_get_attribute($this->env, $this->source, $context["cBlock"], "content", [], "any", false, false, false, 687);
                                                    echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<textarea name=\"block_content[";
                                                    // line 688
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 688), "html", null, true);
                                                    echo "][]\" class=\"inline-editor\" id=\"editor-";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 688), "html", null, true);
                                                    echo "\">";
                                                    echo twig_get_attribute($this->env, $this->source, $context["cBlock"], "content", [], "any", false, false, false, 688);
                                                    echo "</textarea>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                } elseif ((twig_get_attribute($this->env, $this->source,                                                 // line 689
$context["cBlock"], "contentType", [], "any", false, false, false, 689) == "bundle")) {
                                                    // line 690
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"block-ct\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"block_bundle[";
                                                    // line 691
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 691), "html", null, true);
                                                    echo "][bundle]\" class=\"hidden-field bundle-bundle\" value=\"";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "bundle", [], "any", false, false, false, 691), "html", null, true);
                                                    echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"block_bundle[";
                                                    // line 692
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 692), "html", null, true);
                                                    echo "][label]\" class=\"hidden-field bundle-label\" value=\"";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "bundleLabel", [], "any", false, false, false, 692), "html", null, true);
                                                    echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"block_bundle[";
                                                    // line 693
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 693), "html", null, true);
                                                    echo "][data]\" class=\"hidden-field bundle-data\" value=\"";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "bundleData", [], "any", false, false, false, 693), "html", null, true);
                                                    echo "\" id=\"";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 693), "html", null, true);
                                                    echo "_data\" />

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h3>Extensie: ";
                                                    // line 695
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "bundleLabel", [], "any", false, false, false, 695), "html", null, true);
                                                    echo "</h3>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"linked-bundle-config\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    // line 698
                                                    $context["templateList"] = [0 => (("Trinity" . twig_get_attribute($this->env, $this->source, $context["childBlock"], "bundleLabel", [], "any", false, false, false, 698)) . "Bundle::link_preview.html.twig")];
                                                    // line 699
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    if ((twig_get_attribute($this->env, $this->source, $context["childBlock"], "bundle", [], "any", true, true, false, 699) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["childBlock"], "bundle", [], "any", false, false, false, 699)))) {
                                                        // line 700
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                        $context["testValue"] = (twig_get_attribute($this->env, $this->source, $context["childBlock"], "bundle", [], "any", false, false, false, 700) . "::link_preview.html.twig");
                                                        // line 701
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                        if (!twig_in_filter(($context["testValue"] ?? null), ($context["templateList"] ?? null))) {
                                                            // line 702
                                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                            $context["templateList"] = twig_array_merge(($context["templateList"] ?? null), ($context["templateList"] ?? null));
                                                            // line 703
                                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                        }
                                                        // line 704
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    }
                                                    // line 705
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    $__internal_compile_13 = null;
                                                    try {
                                                        $__internal_compile_13 =                                                         $this->loadTemplate(($context["templateList"] ?? null), "@Cms/page/composer.html.twig", 705);
                                                    } catch (LoaderError $e) {
                                                        // ignore missing template
                                                    }
                                                    if ($__internal_compile_13) {
                                                        $__internal_compile_13->display(twig_array_merge($context, ["config" => json_decode(twig_get_attribute($this->env, $this->source, $context["childBlock"], "bundleData", [], "any", false, false, false, 705))]));
                                                    }
                                                    // line 706
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                } elseif ((                                                // line 708
($context["dataRequired"] ?? null) == "medias")) {
                                                    // line 709
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"block_content[";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 709), "html", null, true);
                                                    echo "][]\" class=\"media-data hidden-field\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                } elseif ((                                                // line 710
($context["dataRequired"] ?? null) == "media")) {
                                                    // line 711
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"block_content[";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 711), "html", null, true);
                                                    echo "][]\" class=\"media-data hidden-field\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                } elseif ((                                                // line 712
($context["dataRequired"] ?? null) == "video")) {
                                                    // line 713
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"block_content[";
                                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 713), "html", null, true);
                                                    echo "][]\" class=\"video-data hidden-field\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                }
                                                // line 715
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 716
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            if ((($context["section_block"] ?? null) && twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "fields", [], "any", false, false, false, 716))) {
                                                // line 717
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                $context['_parent'] = $context;
                                                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "fields", [], "any", false, false, false, 717));
                                                foreach ($context['_seq'] as $context["fi"] => $context["field"]) {
                                                    // line 718
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"fields-row ";
                                                    echo ((($context["fi"] == 0)) ? ("first") : (""));
                                                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"field-label\">";
                                                    // line 719
                                                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["field"], "label", [], "any", false, false, false, 719), [], "blocks"), "html", null, true);
                                                    echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"blocks-display-form\" id=\"view_";
                                                    // line 720
                                                    echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 720) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 720)), "html", null, true);
                                                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    // line 721
                                                    if ((twig_get_attribute($this->env, $this->source, $context["field"], "type", [], "any", false, false, false, 721) == "page")) {
                                                        // line 722
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, true, false, 722), twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 722), [], "array", true, true, false, 722) &&  !twig_test_empty((($__internal_compile_14 = twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, false, false, 722)) && is_array($__internal_compile_14) || $__internal_compile_14 instanceof ArrayAccess ? ($__internal_compile_14[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 722)] ?? null) : null)))) ? (print ((($__internal_compile_15 = twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, false, false, 722)) && is_array($__internal_compile_15) || $__internal_compile_15 instanceof ArrayAccess ? ($__internal_compile_15[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 722)] ?? null) : null))) : (print (twig_escape_filter($this->env, (("<span class=\"grey-text\">" . $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("n.v.t.", [], "cms")) . "</span>"), "html", null, true))));
                                                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    } elseif ((twig_get_attribute($this->env, $this->source,                                                     // line 723
$context["field"], "type", [], "any", false, false, false, 723) == "checkbox")) {
                                                        // line 724
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                        echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, true, false, 724), twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 724), [], "array", true, true, false, 724) && (($__internal_compile_16 = twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, false, false, 724)) && is_array($__internal_compile_16) || $__internal_compile_16 instanceof ArrayAccess ? ($__internal_compile_16[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 724)] ?? null) : null))) ? ("Ja") : ("Nee"));
                                                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    } else {
                                                        // line 726
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                        (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, true, false, 726), twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 726), [], "array", true, true, false, 726) &&  !twig_test_empty((($__internal_compile_17 = twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, false, false, 726)) && is_array($__internal_compile_17) || $__internal_compile_17 instanceof ArrayAccess ? ($__internal_compile_17[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 726)] ?? null) : null)))) ? (print ((($__internal_compile_18 = twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, false, false, 726)) && is_array($__internal_compile_18) || $__internal_compile_18 instanceof ArrayAccess ? ($__internal_compile_18[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 726)] ?? null) : null))) : (print (twig_escape_filter($this->env, (("<span class=\"grey-text\">" . $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("n.v.t.", [], "cms")) . "</span>"), "html", null, true))));
                                                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    }
                                                    // line 728
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"blocks-edit-form\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    // line 730
                                                    if ((twig_get_attribute($this->env, $this->source, $context["field"], "type", [], "any", false, false, false, 730) == "text")) {
                                                        // line 731
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input data-type=\"";
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "type", [], "any", false, false, false, 731), "html", null, true);
                                                        echo "\" id=\"";
                                                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 731) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 731)), "html", null, true);
                                                        echo "\" data-linkkey=\"";
                                                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 731) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 731)), "html", null, true);
                                                        echo "\" data-key=\"";
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 731), "html", null, true);
                                                        echo "\" data-label=\"";
                                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["field"], "label", [], "any", false, false, false, 731), [], "blocks"), "html", null, true);
                                                        echo "\" type=\"text\" value=\"";
                                                        ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, true, false, 731), twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 731), [], "array", true, true, false, 731)) ? (print (twig_escape_filter($this->env, (($__internal_compile_19 = twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, false, false, 731)) && is_array($__internal_compile_19) || $__internal_compile_19 instanceof ArrayAccess ? ($__internal_compile_19[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 731)] ?? null) : null), "html", null, true))) : (print ("")));
                                                        echo "\" class=\"hidden-field template-fields\" name=\"block_config[";
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 731), "html", null, true);
                                                        echo "][";
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 731), "html", null, true);
                                                        echo "]\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    } elseif ((twig_get_attribute($this->env, $this->source,                                                     // line 732
$context["field"], "type", [], "any", false, false, false, 732) == "page")) {
                                                        // line 733
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" onclick=\"linkSelector(this);\" class=\"btn\">";
                                                        // line 734
                                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Selecteer een pagina", [], "cms"), "html", null, true);
                                                        echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"pagelabel\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input data-type=\"";
                                                        // line 736
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "type", [], "any", false, false, false, 736), "html", null, true);
                                                        echo "\" id=\"";
                                                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 736) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 736)), "html", null, true);
                                                        echo "\" data-linkkey=\"";
                                                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 736) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 736)), "html", null, true);
                                                        echo "\" data-key=\"";
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 736), "html", null, true);
                                                        echo "\" data-label=\"";
                                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["field"], "label", [], "any", false, false, false, 736), [], "blocks"), "html", null, true);
                                                        echo "\" type=\"hidden\" value=\"";
                                                        ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, true, false, 736), twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 736), [], "array", true, true, false, 736)) ? (print (twig_escape_filter($this->env, (($__internal_compile_20 = twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, false, false, 736)) && is_array($__internal_compile_20) || $__internal_compile_20 instanceof ArrayAccess ? ($__internal_compile_20[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 736)] ?? null) : null), "html", null, true))) : (print ("")));
                                                        echo "\" class=\"hidden-field template-fields pageid\" name=\"block_config[";
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 736), "html", null, true);
                                                        echo "][";
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 736), "html", null, true);
                                                        echo "]\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    } elseif ((twig_get_attribute($this->env, $this->source,                                                     // line 738
$context["field"], "type", [], "any", false, false, false, 738) == "textarea")) {
                                                        // line 739
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div data-editor=\"";
                                                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 739) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 739)), "html", null, true);
                                                        echo "\" id=\"inline-editor-";
                                                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 739) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 739)), "html", null, true);
                                                        echo "\" class=\"ckeditor4 form-control\" contenteditable=\"true\">";
                                                        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, true, false, 739), twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 739), [], "array", true, true, false, 739)) ? ((($__internal_compile_21 = twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, false, false, 739)) && is_array($__internal_compile_21) || $__internal_compile_21 instanceof ArrayAccess ? ($__internal_compile_21[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 739)] ?? null) : null)) : (""));
                                                        echo "</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<textarea data-type=\"";
                                                        // line 740
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "type", [], "any", false, false, false, 740), "html", null, true);
                                                        echo "\" id=\"";
                                                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 740) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 740)), "html", null, true);
                                                        echo "\" data-linkkey=\"";
                                                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 740) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 740)), "html", null, true);
                                                        echo "\" data-key=\"";
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 740), "html", null, true);
                                                        echo "\" data-label=\"";
                                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["field"], "label", [], "any", false, false, false, 740), [], "blocks"), "html", null, true);
                                                        echo "\" class=\"inline-editor template-fields\" name=\"block_config[";
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 740), "html", null, true);
                                                        echo "][";
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 740), "html", null, true);
                                                        echo "]\">";
                                                        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, true, false, 740), twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 740), [], "array", true, true, false, 740)) ? ((($__internal_compile_22 = twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, false, false, 740)) && is_array($__internal_compile_22) || $__internal_compile_22 instanceof ArrayAccess ? ($__internal_compile_22[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 740)] ?? null) : null)) : (""));
                                                        echo "</textarea>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    } elseif ((twig_get_attribute($this->env, $this->source,                                                     // line 741
$context["field"], "type", [], "any", false, false, false, 741) == "checkbox")) {
                                                        // line 742
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input id=\"";
                                                        // line 743
                                                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 743) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 743)), "html", null, true);
                                                        echo "\" type=\"checkbox\" name=\"block_config[";
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 743), "html", null, true);
                                                        echo "][";
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 743), "html", null, true);
                                                        echo "]\" ";
                                                        echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, true, false, 743), twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 743), [], "array", true, true, false, 743)) ? ("checked=\"checked\"") : (""));
                                                        echo " />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"";
                                                        // line 744
                                                        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 744) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 744)), "html", null, true);
                                                        echo "\">&nbsp;</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    } elseif ((twig_get_attribute($this->env, $this->source,                                                     // line 746
$context["field"], "type", [], "any", false, false, false, 746) == "select")) {
                                                        // line 747
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"select\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                        // line 748
                                                        if ((twig_get_attribute($this->env, $this->source, $context["field"], "choices", [], "any", true, true, false, 748) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["field"], "choices", [], "any", false, false, false, 748)))) {
                                                            // line 749
                                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"block_config[";
                                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 749), "html", null, true);
                                                            echo "][";
                                                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 749), "html", null, true);
                                                            echo "]\" id=\"";
                                                            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 749) . "_") . twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 749)), "html", null, true);
                                                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                            // line 750
                                                            $context['_parent'] = $context;
                                                            $context['_seq'] = twig_ensure_traversable($this->extensions['App\CmsBundle\Twig\Extension\Helpers']->objectFilter(twig_get_attribute($this->env, $this->source, $context["field"], "choices", [], "any", false, false, false, 750)));
                                                            foreach ($context['_seq'] as $context["key"] => $context["val"]) {
                                                                // line 751
                                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option ";
                                                                echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, true, false, 751), twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 751), [], "array", true, true, false, 751) && ((($__internal_compile_23 = twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, false, false, 751)) && is_array($__internal_compile_23) || $__internal_compile_23 instanceof ArrayAccess ? ($__internal_compile_23[twig_get_attribute($this->env, $this->source, $context["field"], "key", [], "any", false, false, false, 751)] ?? null) : null) == $context["key"]))) ? ("selected=\"selected\"") : (""));
                                                                echo " value=\"";
                                                                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                                                                echo "\">";
                                                                echo $context["val"];
                                                                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                            }
                                                            $_parent = $context['_parent'];
                                                            unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
                                                            $context = array_intersect_key($context, $_parent) + $_parent;
                                                            // line 753
                                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                        } else {
                                                            // line 755
                                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"error\">";
                                                            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("NO CHOICES AVAILABLE IN BLOCK CONFIG", [], "cms"), "html", null, true);
                                                            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                        }
                                                        // line 757
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    }
                                                    // line 759
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                }
                                                $_parent = $context['_parent'];
                                                unset($context['_seq'], $context['_iterated'], $context['fi'], $context['field'], $context['_parent'], $context['loop']);
                                                $context = array_intersect_key($context, $_parent) + $_parent;
                                                // line 762
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 763
                                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"inline-actionss center-align\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            // line 765
                                            if ((twig_get_attribute($this->env, $this->source, $context["cBlock"], "contentType", [], "any", false, false, false, 765) == "bundle")) {
                                                // line 766
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"\" class=\"btn btn-edit tooltipped\" onclick=\"editBundle(this);\" data-position=\"top\"  data-tooltip=\"";
                                                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Extensie configureren", [], "cms"), "html", null, true);
                                                echo "\"><i class=\"far fa-check-square\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 768
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            if (($context["bundleRequired"] ?? null)) {
                                                // line 769
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-bundle\" onclick=\"addSpecificBundle(this, '";
                                                echo twig_escape_filter($this->env, ($context["bundleRequired"] ?? null), "html", null, true);
                                                echo "');\"><i class=\"left fa fa-paperclip\"></i>";
                                                echo twig_escape_filter($this->env, ($context["bundleRequired"] ?? null), "html", null, true);
                                                echo " ";
                                                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Koppelen", [], "cms")), "html", null, true);
                                                echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            } else {
                                                // line 771
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                if (($context["dataRequired"] ?? null)) {
                                                    // line 772
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    if ((($context["dataRequired"] ?? null) == "medias")) {
                                                        // line 773
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"";
                                                        echo (((twig_get_attribute($this->env, $this->source, $context["cBlock"], "contentType", [], "any", false, false, false, 773) == "")) ? ("") : ("display:none;"));
                                                        echo "\" class=\"btn btn-image tooltipped\" onclick=\"addMedia(this);\" data-position=\"top\"  data-tooltip=\"";
                                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media koppelen", [], "cms"), "html", null, true);
                                                        echo "\"><i class=\"fa fa-image fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    } elseif ((                                                    // line 774
($context["dataRequired"] ?? null) == "media")) {
                                                        // line 775
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"";
                                                        echo ((((twig_get_attribute($this->env, $this->source, $context["cBlock"], "contentType", [], "any", false, false, false, 775) == "") || twig_test_empty(twig_get_attribute($this->env, $this->source, $context["cBlock"], "media", [], "any", false, false, false, 775)))) ? ("") : ("display:none;"));
                                                        echo "\" class=\"btn btn-image tooltipped\" onclick=\"addMedia(this);\" data-position=\"top\"  data-tooltip=\"";
                                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media koppelen", [], "cms"), "html", null, true);
                                                        echo "\"><i class=\"fa fa-image fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    } elseif ((                                                    // line 776
($context["dataRequired"] ?? null) == "video")) {
                                                        // line 777
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"";
                                                        echo (((twig_get_attribute($this->env, $this->source, $context["cBlock"], "contentType", [], "any", false, false, false, 777) == "")) ? ("") : ("display:none;"));
                                                        echo "\" class=\"btn btn-video tooltipped\" onclick=\"addVideo(this);\" data-position=\"top\"  data-tooltip=\"";
                                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Video koppelen", [], "cms"), "html", null, true);
                                                        echo "\"><i class=\"fa fa-play-circle fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    } elseif ((                                                    // line 778
($context["dataRequired"] ?? null) == "text")) {
                                                        // line 779
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"";
                                                        echo (((twig_get_attribute($this->env, $this->source, $context["cBlock"], "contentType", [], "any", false, false, false, 779) == "")) ? ("") : ("display:none;"));
                                                        echo "\" class=\"btn btn-text tooltipped\" onclick=\"addText(this);\" data-position=\"top\"  data-bs-toggle=\"tooltip\" title=\"";
                                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tekst koppelen", [], "cms"), "html", null, true);
                                                        echo "\"><i class=\"fa fa-align-left fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    }
                                                    // line 780
                                                    echo "r
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                } else {
                                                    // line 782
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    if ((twig_get_attribute($this->env, $this->source, $context["cBlock"], "contentType", [], "any", false, false, false, 782) == "")) {
                                                        // line 783
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-text tooltipped\" onclick=\"addText(this);\" data-position=\"top\"  data-bs-toggle=\"tooltip\" title=\"";
                                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tekst koppelen", [], "cms"), "html", null, true);
                                                        echo "\"><i class=\"fa fa-align-left fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-bundle tooltipped\" onclick=\"addBundle(this);\" data-position=\"top\"  data-tooltip=\"";
                                                        // line 784
                                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Extensie koppelen", [], "cms"), "html", null, true);
                                                        echo "\"><i class=\"fa fa-cube fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-image tooltipped\" onclick=\"addMedia(this);\" data-position=\"top\"  data-tooltip=\"";
                                                        // line 785
                                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media koppelen", [], "cms"), "html", null, true);
                                                        echo "\"><i class=\"fa fa-image fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-video tooltipped\" onclick=\"addVideo(this);\" data-position=\"top\"  data-tooltip=\"";
                                                        // line 786
                                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Video koppelen", [], "cms"), "html", null, true);
                                                        echo "\"><i class=\"far fa-play-circle fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-source tooltipped\" onclick=\"addSource(this);\" data-position=\"top\"  data-tooltip=\"";
                                                        // line 787
                                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("HTML koppelen", [], "cms"), "html", null, true);
                                                        echo "\"><i class=\"far fa-code fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    } else {
                                                        // line 789
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"display:none;\" class=\"btn btn-text tooltipped\" onclick=\"addText(this);\" data-position=\"top\"  data-bs-toggle=\"tooltip\" title=\"";
                                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tekst koppelen", [], "cms"), "html", null, true);
                                                        echo "\"><i class=\"fa fa-align-left fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"display:none;\" class=\"btn btn-bundle tooltipped\" onclick=\"addBundle(this);\" data-position=\"top\"  data-tooltip=\"";
                                                        // line 790
                                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Extensie koppelen", [], "cms"), "html", null, true);
                                                        echo "\"><i class=\"fa fa-cube fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"display:none;\" class=\"btn btn-image tooltipped\" onclick=\"addMedia(this);\" data-position=\"top\"  data-tooltip=\"";
                                                        // line 791
                                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media koppelen", [], "cms"), "html", null, true);
                                                        echo "\"><i class=\"fa fa-image fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"display:none;\" class=\"btn btn-video tooltipped\" onclick=\"addVideo(this);\" data-position=\"top\"  data-tooltip=\"";
                                                        // line 792
                                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Video koppelen", [], "cms"), "html", null, true);
                                                        echo "\"><i class=\"far fa-play-circle fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" style=\"display:none;\" class=\"btn btn-source tooltipped\" onclick=\"addSource(this);\" data-position=\"top\"  data-tooltip=\"";
                                                        // line 793
                                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("HTML koppelen", [], "cms"), "html", null, true);
                                                        echo "\"><i class=\"far fa-code fa-fw\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    }
                                                    // line 795
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                }
                                                // line 796
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 797
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            // line 800
                                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            if (twig_get_attribute($this->env, $this->source, ($context["section_block"] ?? null), "buttons", [], "any", true, true, false, 800)) {
                                                // line 801
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"block-buttons center-align\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"button-wrapper\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                // line 804
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, true, false, 804), "buttons", [], "any", true, true, false, 804)) {
                                                    // line 805
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    $context['_parent'] = $context;
                                                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cBlock"], "config", [], "any", false, false, false, 805), "buttons", [], "any", false, false, false, 805));
                                                    foreach ($context['_seq'] as $context["index"] => $context["btn"]) {
                                                        // line 806
                                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a onclick=\"editButton(this, '";
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 806), "html", null, true);
                                                        echo "');\" data-url=\"";
                                                        ((twig_get_attribute($this->env, $this->source, $context["btn"], "url", [], "any", true, true, false, 806)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["btn"], "url", [], "any", false, false, false, 806), "html", null, true))) : (print ("")));
                                                        echo "\" data-class=\"";
                                                        ((twig_get_attribute($this->env, $this->source, $context["btn"], "class", [], "any", true, true, false, 806)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["btn"], "class", [], "any", false, false, false, 806), "html", null, true))) : (print ("")));
                                                        echo "\" data-label=\"";
                                                        ((twig_get_attribute($this->env, $this->source, $context["btn"], "label", [], "any", true, true, false, 806)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["btn"], "label", [], "any", false, false, false, 806), "html", null, true))) : (print ("")));
                                                        echo "\" data-target=\"";
                                                        ((twig_get_attribute($this->env, $this->source, $context["btn"], "target", [], "any", true, true, false, 806)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["btn"], "target", [], "any", false, false, false, 806), "html", null, true))) : (print ("")));
                                                        echo "\" class=\"btn custom-block-btn\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                        // line 807
                                                        echo twig_get_attribute($this->env, $this->source, $context["btn"], "label", [], "any", false, false, false, 807);
                                                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field\" name=\"block_config[";
                                                        // line 808
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 808), "html", null, true);
                                                        echo "][buttons][";
                                                        echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                                                        echo "][label]\" value=\"";
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["btn"], "label", [], "any", false, false, false, 808), "html", null, true);
                                                        echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field\" name=\"block_config[";
                                                        // line 809
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 809), "html", null, true);
                                                        echo "][buttons][";
                                                        echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                                                        echo "][url]\" value=\"";
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["btn"], "url", [], "any", false, false, false, 809), "html", null, true);
                                                        echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field\" name=\"block_config[";
                                                        // line 810
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 810), "html", null, true);
                                                        echo "][buttons][";
                                                        echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                                                        echo "][class]\" value=\"";
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["btn"], "class", [], "any", false, false, false, 810), "html", null, true);
                                                        echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" class=\"hidden-field\" name=\"block_config[";
                                                        // line 811
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 811), "html", null, true);
                                                        echo "][buttons][";
                                                        echo twig_escape_filter($this->env, $context["index"], "html", null, true);
                                                        echo "][target]\" value=\"";
                                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["btn"], "target", [], "any", false, false, false, 811), "html", null, true);
                                                        echo "\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                    }
                                                    $_parent = $context['_parent'];
                                                    unset($context['_seq'], $context['_iterated'], $context['index'], $context['btn'], $context['_parent'], $context['loop']);
                                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                                    // line 814
                                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                                }
                                                // line 815
                                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"add-new-block-btn btn-flat\" type=\"button\" onclick=\"addButton(this, ";
                                                // line 816
                                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cBlock"], "id", [], "any", false, false, false, 816), "html", null, true);
                                                echo ");\"><i class=\"left fa fa-plus\"></i>";
                                                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Knop toevoegen", [], "cms"), "html", null, true);
                                                echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                            }
                                            // line 819
                                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t";
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
                                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cBlock'], $context['_parent'], $context['loop']);
                                        $context = array_intersect_key($context, $_parent) + $_parent;
                                        // line 824
                                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 825
                                    echo "
\t\t\t\t\t\t\t\t\t\t\t";
                                    // line 826
                                    if (($context["contained"] ?? null)) {
                                        // line 827
                                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"containment-actions center-align\"><button type=\"button\" class=\"btn-flat\" onclick=\"addContainmentBlock(this);\"><i class=\"left fa fa-plus\"></i> ";
                                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Blok toevoegen", [], "cms"), "html", null, true);
                                        echo "</button></div>
\t\t\t\t\t\t\t\t\t\t\t";
                                    }
                                    // line 829
                                    echo "\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t";
                                    // line 830
                                    if (twig_get_attribute($this->env, $this->source, $context["childBlock"], "contained", [], "any", false, false, false, 830)) {
                                        $context["break"] = true;
                                    }
                                    // line 831
                                    echo "\t\t\t\t\t\t\t\t\t";
                                }
                                // line 832
                                echo "\t\t\t\t\t\t\t\t\t";
                            }
                            // line 833
                            echo "\t\t\t\t\t\t\t\t";
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
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['childBlock'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 834
                        echo "
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
                    }
                    // line 839
                    echo "\t\t\t";
                }
                // line 840
                echo "\t\t";
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
            unset($context['_seq'], $context['_iterated'], $context['pi'], $context['pageBlock'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 841
            echo "\t";
        }
        // line 842
        echo "</div>

<div id=\"block-settings\" class=\"modal\">
\t<div class=\"modal-dialog\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<div class=\"modal-title\">
\t\t\t\t\t<h5>";
        // line 849
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Blok instellingen", [], "cms"), "html", null, true);
        echo "</h5>
\t\t\t\t</div>
\t\t\t\t<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
\t\t\t</div>
\t\t\t<div class=\"modal-body row\">
\t\t\t\t<div class=\"input-field col-4\">
\t\t\t\t\t<label for=\"cfg_class\">";
        // line 855
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("CSS class", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t<input id=\"cfg_class\" type=\"text\" />
\t\t\t\t</div>
\t\t\t\t<div class=\"input-field col-4\">
\t\t\t\t\t<label for=\"cfg_style\">";
        // line 859
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("CSS style (inline)", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t<input id=\"cfg_style\" type=\"text\" />
\t\t\t\t</div>
\t\t\t\t<div class=\"input-field col-4\">
\t\t\t\t\t<label for=\"cfg_id\">";
        // line 863
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("ID", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t<input id=\"cfg_id\" type=\"text\" />
\t\t\t\t</div>
\t\t\t\t<div class=\"input-field col-8\">
\t\t\t\t\t<label for=\"cfg_link\">";
        // line 867
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Link / URL", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t<input id=\"cfg_link\" type=\"text\" />
\t\t\t\t</div>
\t\t\t\t<div class=\"input-field col-4\">
\t\t\t\t\t<label>";
        // line 871
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Link doel", [], "cms");
        echo "</label>
\t\t\t\t\t<select class=\"form-select\" id=\"cfg_target\">
\t\t\t\t\t\t<option value=\"\" selected>";
        // line 873
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zelfde pagina", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t\t\t<option value=\"_blank\">";
        // line 874
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuwe pagina", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t\t<div class=\"input-field col-6\">
\t\t\t\t\t<label for=\"cfg_width\">";
        // line 878
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Breedte (1 - 12)", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t<input id=\"cfg_width\" type=\"text\" />
\t\t\t\t</div>
\t\t\t\t<div class=\"input-field col-6\">
\t\t\t\t\t<label for=\"cfg_offset\">";
        // line 882
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Afstand (1 - 12)", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t<input id=\"cfg_offset\" type=\"text\" />
\t\t\t\t</div>
\t\t\t\t<div id=\"custom-fields\"></div>
\t\t\t</div>
\t\t\t<div class=\"modal-footer d-flex justify-content-between\">
\t\t\t\t<button type=\"button\" class=\"btn-flat\" data-bs-dismiss=\"modal\" aria-label=\"Close\">Sluiten</button>
\t\t\t\t<a href=\"#!\"onclick=\"return blockSettings_close()\" class=\"waves-effect waves-green btn\">";
        // line 889
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Toepassen", [], "cms");
        echo "</a>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<script>

\tvar togglevisibility = \"";
        // line 896
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zichtbaarheid", [], "cms");
        echo "\";
\tvar heading = \"";
        // line 897
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie introtekst", [], "cms");
        echo "\";
\tvar wrapperconfig = \"";
        // line 898
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie IDs en classes", [], "cms");
        echo "\";
\tvar wrapperclone = \"";
        // line 899
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie kopiëren", [], "cms");
        echo "\";
\tvar wrapperdelete = \"";
        // line 900
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie verwijderen", [], "cms");
        echo "\";

    var composervideourl = \"";
        // line 902
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Video URL", [], "cms");
        echo "\";
    var composerextensionconfig = \"";
        // line 903
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Extensie configureren", [], "cms");
        echo "\";
    var composerblockempty = \"";
        // line 904
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Blok leegmaken", [], "cms");
        echo "\";
    var composertextconnect = \"";
        // line 905
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Tekst koppelen", [], "cms");
        echo "\";
    var composermediaconnect = \"";
        // line 906
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media koppelen", [], "cms");
        echo "\";
    var composervideoconnect = \"";
        // line 907
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Video koppelen", [], "cms");
        echo "\";
    var composerextensionconnect = \"";
        // line 908
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Extensie koppelen", [], "cms");
        echo "\";
    var composersourceconnect = \"";
        // line 909
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("HTML koppelen", [], "cms");
        echo "\";
    var composerconnect = \"";
        // line 910
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Koppelen", [], "cms")), "html", null, true);
        echo "\";
    var composeraddbutton = \"";
        // line 911
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Knop toevoegen", [], "cms");
        echo "\";
    var composeraddblock = \"";
        // line 912
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Blok toevoegen", [], "cms");
        echo "\";
    var composerblocksettings = \"";
        // line 913
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Blok instellingen", [], "cms");
        echo "\";
    var composerblockpaste = \"";
        // line 914
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Blok plakken", [], "cms");
        echo "\";
    var composersectionpaste = \"";
        // line 915
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sectie plakken", [], "cms");
        echo "\";
    var composerdelete = \"";
        // line 916
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms");
        echo "\";
    var composerspacing = \"";
        // line 917
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Ruimte verdeling", [], "cms");
        echo "\";
    var composerconnecttarget = \"";
        // line 918
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Link doel (anchor)", [], "cms");
        echo "\";
    var composercssid = \"";
        // line 919
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("CSS ID", [], "cms");
        echo "\";
    var composercssclass = \"";
        // line 920
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("CSS class", [], "cms");
        echo "\";
    var composerbackgroundcolor = \"";
        // line 921
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Achtergrond kleur", [], "cms");
        echo "\";
    var composerconnectblock = \"";
        // line 922
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Link naar dit blok", [], "cms");
        echo "\";
    var composertitle = \"";
        // line 923
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Titel", [], "cms");
        echo "\";
    var composerintroductiontext = \"";
        // line 924
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Introductie tekst", [], "cms");
        echo "\";
    var composeraddimages = \"";
        // line 925
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Afbeelding(en) toevoegen", [], "cms");
        echo "\";
    var composerdropzonenotsupported = \"";
        // line 926
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("browser does not support HTML5 drag and drop", [], "cms");
        echo "\";
    var composerdropzonetoolarge = \"";
        // line 927
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestand is te groot. Maximaal toegestaan:", [], "cms");
        echo "\";
    var composerdropzonenotallowedfirst = \"";
        // line 928
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestandstype", [], "cms");
        echo "\";
    var composerdropzonenotallowedlast = \"";
        // line 929
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("is niet toegestaan.<br/><br/><strong>Toegestane bestanden:</strong>", [], "cms");
        echo "\";
    var composerdeleteblock = \"";
        // line 930
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u dit blok verwijderen?", [], "cms");
        echo "\";
var composeryoutube = \"";
        // line 931
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Plak in het onderstaande veld de volledige URL naar de YouTube-video. Dit is de URL die in de browser URL balk getoond wordt met de video code erachter.", [], "cms");
        echo "\";
var composeryoutube_example = \"";
        // line 932
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Voorbeelden:", [], "cms");
        echo "\";
var composervimeo = \"";
        // line 933
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Plak in het onderstaande veld de volledige URL naar de Vimeo-video. Dit is de URL die in de browser URL balk getoond wordt met de video code erachter.", [], "cms");
        echo "\";
var composervimeo_example = \"";
        // line 934
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Voorbeeld:", [], "cms");
        echo "\";
var composerselectvideo = \"";
        // line 935
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Selecteren uit bibliotheek", [], "cms");
        echo "\";
var selectWhatNeedTobeLinked = \"";
        // line 936
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Selecteer wat er gekoppeld moet worden", [], "cms");
        echo "\";
</script>

";
        // line 940
        if ((array_key_exists("blockTranslationList", $context) &&  !twig_test_empty(($context["blockTranslationList"] ?? null)))) {
            // line 941
            echo "<script>
\tvar block_trans = ";
            // line 942
            echo json_encode(($context["blockTranslationList"] ?? null));
            echo ";
</script>
";
        } else {
            // line 945
            echo "<script>
\tvar block_trans = [];
</script>
";
        }
        // line 949
        echo "
<script type=\"text/javascript\" src=\"";
        // line 950
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/js/composer.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@Cms/page/composer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  2975 => 950,  2972 => 949,  2966 => 945,  2960 => 942,  2957 => 941,  2955 => 940,  2949 => 936,  2945 => 935,  2941 => 934,  2937 => 933,  2933 => 932,  2929 => 931,  2925 => 930,  2921 => 929,  2917 => 928,  2913 => 927,  2909 => 926,  2905 => 925,  2901 => 924,  2897 => 923,  2893 => 922,  2889 => 921,  2885 => 920,  2881 => 919,  2877 => 918,  2873 => 917,  2869 => 916,  2865 => 915,  2861 => 914,  2857 => 913,  2853 => 912,  2849 => 911,  2845 => 910,  2841 => 909,  2837 => 908,  2833 => 907,  2829 => 906,  2825 => 905,  2821 => 904,  2817 => 903,  2813 => 902,  2808 => 900,  2804 => 899,  2800 => 898,  2796 => 897,  2792 => 896,  2782 => 889,  2772 => 882,  2765 => 878,  2758 => 874,  2754 => 873,  2749 => 871,  2742 => 867,  2735 => 863,  2728 => 859,  2721 => 855,  2712 => 849,  2703 => 842,  2700 => 841,  2686 => 840,  2683 => 839,  2676 => 834,  2662 => 833,  2659 => 832,  2656 => 831,  2652 => 830,  2649 => 829,  2643 => 827,  2641 => 826,  2638 => 825,  2635 => 824,  2617 => 819,  2609 => 816,  2606 => 815,  2603 => 814,  2590 => 811,  2582 => 810,  2574 => 809,  2566 => 808,  2562 => 807,  2549 => 806,  2544 => 805,  2541 => 804,  2537 => 801,  2534 => 800,  2530 => 797,  2527 => 796,  2524 => 795,  2519 => 793,  2515 => 792,  2511 => 791,  2507 => 790,  2502 => 789,  2497 => 787,  2493 => 786,  2489 => 785,  2485 => 784,  2480 => 783,  2477 => 782,  2473 => 780,  2465 => 779,  2463 => 778,  2456 => 777,  2454 => 776,  2447 => 775,  2445 => 774,  2438 => 773,  2435 => 772,  2432 => 771,  2422 => 769,  2419 => 768,  2413 => 766,  2411 => 765,  2407 => 763,  2404 => 762,  2396 => 759,  2392 => 757,  2386 => 755,  2382 => 753,  2369 => 751,  2365 => 750,  2356 => 749,  2354 => 748,  2351 => 747,  2349 => 746,  2344 => 744,  2334 => 743,  2331 => 742,  2329 => 741,  2311 => 740,  2302 => 739,  2300 => 738,  2281 => 736,  2276 => 734,  2273 => 733,  2271 => 732,  2252 => 731,  2250 => 730,  2246 => 728,  2240 => 726,  2234 => 724,  2232 => 723,  2227 => 722,  2225 => 721,  2221 => 720,  2217 => 719,  2212 => 718,  2207 => 717,  2204 => 716,  2201 => 715,  2195 => 713,  2193 => 712,  2188 => 711,  2186 => 710,  2181 => 709,  2179 => 708,  2175 => 706,  2164 => 705,  2161 => 704,  2158 => 703,  2155 => 702,  2152 => 701,  2149 => 700,  2146 => 699,  2144 => 698,  2138 => 695,  2129 => 693,  2123 => 692,  2117 => 691,  2114 => 690,  2112 => 689,  2104 => 688,  2097 => 687,  2094 => 686,  2091 => 685,  2078 => 679,  2063 => 678,  2060 => 677,  2057 => 676,  2054 => 675,  2041 => 669,  2026 => 668,  2023 => 667,  2020 => 666,  2018 => 665,  2015 => 664,  2007 => 662,  2005 => 661,  1998 => 659,  1992 => 658,  1986 => 657,  1980 => 656,  1975 => 653,  1972 => 652,  1967 => 649,  1964 => 648,  1957 => 645,  1954 => 644,  1951 => 642,  1948 => 641,  1945 => 640,  1943 => 639,  1941 => 638,  1938 => 637,  1935 => 636,  1932 => 635,  1929 => 634,  1927 => 633,  1922 => 631,  1914 => 628,  1908 => 627,  1902 => 626,  1896 => 625,  1890 => 624,  1884 => 623,  1878 => 622,  1875 => 621,  1871 => 620,  1863 => 617,  1858 => 616,  1840 => 615,  1838 => 614,  1832 => 610,  1824 => 607,  1821 => 606,  1818 => 605,  1805 => 602,  1797 => 601,  1789 => 600,  1781 => 599,  1777 => 598,  1764 => 597,  1759 => 596,  1756 => 595,  1752 => 592,  1749 => 591,  1745 => 588,  1742 => 587,  1739 => 586,  1734 => 584,  1730 => 583,  1726 => 582,  1722 => 581,  1717 => 580,  1712 => 578,  1708 => 577,  1704 => 576,  1700 => 575,  1695 => 574,  1692 => 573,  1689 => 572,  1681 => 570,  1679 => 569,  1672 => 568,  1670 => 567,  1663 => 566,  1661 => 565,  1656 => 564,  1653 => 563,  1650 => 562,  1636 => 560,  1634 => 559,  1626 => 558,  1618 => 557,  1614 => 555,  1611 => 554,  1603 => 551,  1599 => 549,  1593 => 547,  1589 => 545,  1576 => 543,  1572 => 542,  1563 => 541,  1561 => 540,  1558 => 539,  1556 => 538,  1551 => 536,  1541 => 535,  1538 => 534,  1536 => 533,  1518 => 532,  1509 => 531,  1507 => 530,  1488 => 528,  1483 => 525,  1481 => 524,  1462 => 523,  1460 => 522,  1456 => 520,  1450 => 518,  1444 => 516,  1442 => 515,  1437 => 514,  1435 => 513,  1431 => 512,  1427 => 511,  1422 => 510,  1417 => 509,  1414 => 508,  1408 => 506,  1406 => 505,  1403 => 504,  1400 => 503,  1394 => 501,  1392 => 500,  1387 => 499,  1385 => 498,  1380 => 497,  1378 => 496,  1374 => 494,  1363 => 493,  1360 => 492,  1357 => 491,  1354 => 490,  1351 => 489,  1348 => 488,  1346 => 487,  1342 => 486,  1334 => 483,  1325 => 481,  1319 => 480,  1313 => 479,  1310 => 478,  1308 => 477,  1304 => 476,  1295 => 475,  1293 => 474,  1285 => 473,  1278 => 472,  1275 => 471,  1272 => 470,  1260 => 463,  1246 => 462,  1243 => 461,  1240 => 460,  1237 => 459,  1234 => 458,  1228 => 455,  1220 => 452,  1217 => 451,  1214 => 450,  1195 => 447,  1187 => 443,  1182 => 442,  1180 => 441,  1165 => 439,  1158 => 435,  1155 => 434,  1152 => 433,  1149 => 432,  1146 => 431,  1143 => 430,  1140 => 429,  1137 => 428,  1134 => 427,  1131 => 426,  1128 => 425,  1126 => 424,  1123 => 423,  1115 => 421,  1113 => 420,  1106 => 418,  1100 => 417,  1094 => 416,  1088 => 415,  1083 => 412,  1080 => 411,  1075 => 408,  1072 => 407,  1065 => 404,  1062 => 403,  1059 => 401,  1056 => 400,  1053 => 399,  1051 => 398,  1049 => 397,  1046 => 396,  1043 => 395,  1040 => 394,  1037 => 393,  1035 => 392,  1030 => 390,  1022 => 387,  1016 => 386,  1010 => 385,  1004 => 384,  998 => 383,  992 => 382,  986 => 381,  983 => 380,  979 => 379,  971 => 376,  968 => 375,  964 => 373,  962 => 372,  937 => 371,  934 => 370,  932 => 369,  930 => 368,  927 => 367,  925 => 366,  922 => 365,  920 => 364,  917 => 363,  914 => 362,  911 => 361,  908 => 360,  905 => 359,  902 => 358,  899 => 357,  897 => 356,  894 => 355,  891 => 354,  889 => 353,  886 => 352,  883 => 351,  880 => 350,  877 => 349,  875 => 348,  872 => 347,  869 => 346,  866 => 345,  863 => 344,  860 => 343,  858 => 342,  855 => 341,  852 => 340,  849 => 339,  846 => 338,  844 => 337,  841 => 336,  838 => 335,  835 => 334,  833 => 333,  830 => 332,  824 => 331,  821 => 330,  819 => 329,  816 => 328,  813 => 327,  810 => 326,  807 => 325,  804 => 324,  802 => 323,  799 => 322,  797 => 321,  794 => 320,  791 => 319,  788 => 318,  783 => 317,  780 => 316,  777 => 315,  759 => 314,  757 => 313,  754 => 312,  748 => 311,  745 => 310,  742 => 309,  739 => 308,  736 => 307,  733 => 306,  730 => 305,  727 => 304,  722 => 303,  720 => 302,  717 => 301,  715 => 300,  710 => 298,  707 => 297,  704 => 296,  702 => 295,  699 => 294,  697 => 293,  687 => 290,  681 => 289,  670 => 285,  664 => 284,  660 => 283,  657 => 282,  652 => 268,  643 => 263,  633 => 258,  626 => 256,  616 => 251,  609 => 247,  602 => 242,  589 => 240,  585 => 239,  581 => 238,  577 => 237,  571 => 233,  558 => 231,  554 => 230,  550 => 229,  546 => 228,  541 => 226,  528 => 220,  524 => 219,  513 => 215,  509 => 213,  506 => 212,  500 => 211,  494 => 210,  482 => 208,  479 => 207,  476 => 206,  471 => 205,  468 => 204,  463 => 203,  461 => 202,  457 => 201,  452 => 200,  449 => 199,  447 => 198,  436 => 194,  432 => 193,  427 => 191,  421 => 187,  418 => 186,  416 => 185,  411 => 183,  407 => 182,  399 => 176,  394 => 173,  387 => 171,  384 => 170,  377 => 158,  374 => 157,  369 => 154,  364 => 152,  360 => 151,  352 => 150,  346 => 147,  336 => 144,  330 => 140,  324 => 138,  322 => 137,  318 => 136,  312 => 132,  310 => 131,  304 => 130,  297 => 126,  284 => 123,  281 => 122,  279 => 121,  276 => 120,  273 => 119,  270 => 118,  267 => 117,  265 => 116,  262 => 115,  256 => 114,  253 => 113,  246 => 112,  243 => 111,  240 => 110,  233 => 109,  230 => 108,  227 => 107,  220 => 106,  217 => 105,  214 => 104,  209 => 103,  207 => 102,  204 => 101,  202 => 100,  199 => 99,  181 => 98,  179 => 97,  172 => 93,  166 => 92,  107 => 36,  103 => 35,  99 => 34,  95 => 33,  91 => 32,  87 => 31,  77 => 24,  73 => 23,  69 => 22,  65 => 21,  61 => 20,  46 => 7,  41 => 4,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/page/composer.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/page/composer.html.twig");
    }
}
