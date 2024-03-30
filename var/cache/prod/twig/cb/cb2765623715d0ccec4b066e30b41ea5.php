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

/* @Cms/page/selector.html.twig */
class __TwigTemplate_2dbd2ddbd631ff9b6ac3769dacd510c7 extends Template
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
        return $this->loadTemplate((("@Cms/interface_" . (((false && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 1), "get", [0 => "CKEditor"], "method", false, false, false, 1))) ? ("clear") : ("empty"))) . ".html.twig"), "@Cms/page/selector.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "\t<style type=\"text/css\" media=\"screen\">
\t\t.selector-options li,
\t\tli.page-entry,
\t\tol.sortable li{
\t\t\tmargin: 0;
\t\t\tpadding: 0;
\t\t}

\t\t.selector-options li,
\t\tli.page-entry .page-entry-content{
\t\t\tbackground: #eee;
\t\t    padding: 7px 12px;
\t\t    border-radius: 5px;
\t\t    margin: 5px 0;
\t\t    ursor: pointer;
\t\t}

\t\t.sortable ol {
\t\t    padding: 0 0 0 30px;
\t\t}

\t\t.selector-options li a,
\t\tol.sortable li span a,
\t\tol.sortable li span a {
\t\t    color: #444;
\t\t}
\t</style>

\t";
        // line 33
        $context["ck"] = "";
        // line 34
        echo "\t";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 34), "get", [0 => "CKEditor"], "method", false, false, false, 34)) {
            // line 35
            echo "\t\t";
            $context["ck"] = ((((((("&CKEditor=" . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 35), "get", [0 => "CKEditor"], "method", false, false, false, 35)) . "&CKEditorFuncNum=") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 35), "get", [0 => "CKEditorFuncNum"], "method", false, false, false, 35)) . "&langCode=") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 35), "get", [0 => "langCode"], "method", false, false, false, 35)) . "&ref=") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 35), "get", [0 => "ref"], "method", false, false, false, 35));
            // line 36
            echo "\t";
        }
        // line 37
        echo "
\t";
        // line 38
        if ( !array_key_exists("type", $context)) {
            // line 39
            echo "\t\t<h3 class=\"popup-title\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wat wilt u koppelen?", [], "cms"), "html", null, true);
            echo "</h3>

\t\t<div class=\"row\">
\t\t\t<a href=\"";
            // line 42
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_selector", ["type" => "page"]);
            echo "?x=0";
            echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 42), "get", [0 => "composer"], "method", false, false, false, 42)) ? ("&composer=1") : (""));
            echo twig_escape_filter($this->env, ($context["ck"] ?? null), "html", null, true);
            echo "\" class=\"first-choice popup-pad large col s12 m3 center-align\">
\t\t\t\t<div class=\"card\">
\t\t\t\t\t<div class=\"card-content text-center\">
\t\t\t\t\t\t<i class=\"fa fa-file-alt\" style=\"display: block;font-size: 30px;margin-bottom: 14px;\"></i>
\t\t\t\t\t\t";
            // line 46
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</a>

\t\t\t";
            // line 51
            if (twig_in_filter("BlogBundle", ($context["installed"] ?? null))) {
                // line 52
                echo "\t\t\t\t<a href=\"";
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_selector");
                echo "?x=0";
                echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 52), "get", [0 => "composer"], "method", false, false, false, 52)) ? ("&composer=1") : (""));
                echo twig_escape_filter($this->env, ($context["ck"] ?? null), "html", null, true);
                echo "\" class=\"first-choice popup-pad large col s12 m3 center-align\">
\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t<div class=\"card-content text-center\">
\t\t\t\t\t\t\t<i class=\"fa fa-newspaper\" style=\"display: block;font-size: 30px;margin-bottom: 14px;\"></i>
\t\t\t\t\t\t\t";
                // line 56
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Blog", [], "cms"), "html", null, true);
                echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</a>
\t\t\t";
            }
            // line 61
            echo "
\t\t\t";
            // line 62
            if (twig_in_filter("WebshopBundle", ($context["installed"] ?? null))) {
                // line 63
                echo "\t\t\t\t<a href=\"";
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_webshop_selector");
                echo "?x=0";
                echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 63), "get", [0 => "composer"], "method", false, false, false, 63)) ? ("&composer=1") : (""));
                echo twig_escape_filter($this->env, ($context["ck"] ?? null), "html", null, true);
                echo "\" class=\"first-choice popup-pad large col s12 m3 center-align\">
\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t<div class=\"card-content text-center\">
\t\t\t\t\t\t\t<i class=\"fa fa-shopping-basket\" style=\"display: block;font-size: 30px;margin-bottom: 14px;\"></i>
\t\t\t\t\t\t\t";
                // line 67
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Webshop", [], "cms"), "html", null, true);
                echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</a>
\t\t\t";
            }
            // line 72
            echo "
\t\t\t<a href=\"";
            // line 73
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media", ["parentid" => 0, "type" => 1, "inline" => 1]), "html", null, true);
            echo "?x=0&amp;btn=1";
            echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 73), "get", [0 => "composer"], "method", false, false, false, 73)) ? ("&composer=1") : (""));
            echo twig_escape_filter($this->env, ($context["ck"] ?? null), "html", null, true);
            echo "\" class=\"first-choice popup-pad large col s12 m3 center-align\">
\t\t\t\t<div class=\"card\">
\t\t\t\t\t<div class=\"card-content text-center\">
\t\t\t\t\t\t<i class=\"fa fa-images\" style=\"display: block;font-size: 30px;margin-bottom: 14px;\"></i>
\t\t\t\t\t\t";
            // line 77
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</a>
\t\t</div>

\t\t";
            // line 83
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 83), "get", [0 => "CKEditor"], "method", false, false, false, 83)) {
                // line 84
                echo "\t\t";
            } else {
                // line 85
                echo "\t\t\t<h6>";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Link details", [], "cms"), "html", null, true);
                echo "</h6>

\t\t\t";
                // line 87
                $context["url"] = "";
                // line 88
                echo "\t\t\t";
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 88), "get", [0 => "url"], "method", false, false, false, 88)) {
                    // line 89
                    echo "\t\t\t\t";
                    $context["url"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 89), "get", [0 => "url"], "method", false, false, false, 89);
                    // line 90
                    echo "\t\t\t";
                } else {
                    // line 91
                    echo "\t\t\t\t";
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 91), "get", [0 => "pageid"], "method", false, false, false, 91)) {
                        // line 92
                        echo "\t\t\t\t\t";
                        $context["url"] = ("page:" . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 92), "get", [0 => "pageid"], "method", false, false, false, 92));
                        // line 93
                        echo "\t\t\t\t";
                    }
                    // line 94
                    echo "\t\t\t\t";
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 94), "get", [0 => "mediaid"], "method", false, false, false, 94)) {
                        // line 95
                        echo "\t\t\t\t\t";
                        $context["url"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 95), "get", [0 => "file"], "method", false, false, false, 95);
                        // line 96
                        echo "\t\t\t\t";
                    }
                    // line 97
                    echo "\t\t\t";
                }
                // line 98
                echo "
\t\t\t";
                // line 99
                $context["target"] = "";
                // line 100
                echo "\t\t\t";
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 100), "get", [0 => "target"], "method", false, false, false, 100)) {
                    // line 101
                    echo "\t\t\t\t";
                    $context["target"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 101), "get", [0 => "target"], "method", false, false, false, 101);
                    // line 102
                    echo "\t\t\t";
                }
                // line 103
                echo "
\t\t\t";
                // line 104
                $context["class"] = "";
                // line 105
                echo "\t\t\t";
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 105), "get", [0 => "class"], "method", false, false, false, 105)) {
                    // line 106
                    echo "\t\t\t\t";
                    $context["class"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 106), "get", [0 => "class"], "method", false, false, false, 106);
                    // line 107
                    echo "\t\t\t";
                }
                // line 108
                echo "
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"input-field col s12 m6\">
\t\t\t\t\t<label for=\"lc_btn_label\">";
                // line 111
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Titel", [], "cms"), "html", null, true);
                echo "</label>
\t\t\t\t\t<input id=\"lc_btn_label\" type=\"text\" value=\"";
                // line 112
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 112), "get", [0 => "label"], "method", false, false, false, 112), "html", null, true);
                echo "\" />
\t\t\t\t</div>

\t\t\t\t<div class=\"input-field col s12 m6\">
\t\t\t\t\t<label for=\"lc_btn_url\">";
                // line 116
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("URL", [], "cms"), "html", null, true);
                echo "</label>
\t\t\t\t\t<input id=\"lc_btn_url\" type=\"text\" value=\"";
                // line 117
                echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
                echo "\" />
\t\t\t\t</div>

\t\t\t\t<div class=\"input-field col s12 m6\">
\t\t\t\t\t<label for=\"lc_btn_class\">";
                // line 121
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("CSS class", [], "cms"), "html", null, true);
                echo "</label>
\t\t\t\t\t<input id=\"lc_btn_class\" type=\"text\" value=\"";
                // line 122
                echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
                echo "\" />
\t\t\t\t</div>

\t\t\t\t<div class=\"input-field col s12 m6\">
\t\t\t\t\t<label>";
                // line 126
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Doel", [], "cms"), "html", null, true);
                echo "</label>
\t\t\t\t\t<select id=\"lc_btn_target\" class=\"form-select\">
\t\t\t\t\t\t<option ";
                // line 128
                echo (((($context["target"] ?? null) == "")) ? ("selected=\"selected\"") : (""));
                echo " value=\"\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zelfde pagina", [], "cms"), "html", null, true);
                echo "</option>
\t\t\t\t\t\t<option ";
                // line 129
                echo (((($context["target"] ?? null) == "_blank")) ? ("selected=\"selected\"") : (""));
                echo " value=\"_blank\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuwe pagina", [], "cms"), "html", null, true);
                echo "</option>
\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div id=\"popup_footer\">
\t\t\t\t<div class=\"left\">
\t\t\t\t\t<button type=\"button\" onclick=\"cpop.close();\" class=\"btn-flat\">";
                // line 136
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sluiten", [], "cms"), "html", null, true);
                echo "</button>
\t\t\t\t</div>
\t\t\t\t<button type=\"button\" onclick=\"delButton();\" class=\"btn red\">";
                // line 138
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms"), "html", null, true);
                echo "</button>
\t\t\t\t<button type=\"button\" onclick=\"setLink();\" class=\"btn\">";
                // line 139
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Koppelen", [], "cms"), "html", null, true);
                echo "</button>
\t\t\t</div>
\t\t";
            }
            // line 142
            echo "\t";
        } else {
            // line 143
            echo "

\t\t";
            // line 145
            $context["selector"] = true;
            // line 146
            echo "\t\t";
            $context["depth"] = 0;
            // line 147
            echo "\t\t";
            $context["isModal"] = true;
            // line 148
            echo "
\t\t<div id=\"pages\" class=\"t-content\">
\t\t\t";
            // line 150
            if ( !twig_test_empty(($context["pages"] ?? null))) {
                // line 151
                echo "\t\t\t\t<ol class=\"sortable\" ";
                echo (((array_key_exists("selector", $context) && (($context["selector"] ?? null) == true))) ? ("style=\"list-style: none; padding: 0;\"") : (""));
                echo ">
\t\t\t\t\t";
                // line 152
                $this->loadTemplate("@Cms/includes/menu-links.html.twig", "@Cms/page/selector.html.twig", 152)->display(twig_to_array(["pages" => ($context["pages"] ?? null), "ActivePage" => ($context["ActivePage"] ?? null), "modal" => true, "selector" => true]));
                // line 153
                echo "\t\t\t\t</ol>
\t\t\t";
            }
            // line 155
            echo "\t\t</div>

\t\t<script>
\t\t";
            // line 158
            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 158), "get", [0 => "composer"], "method", false, false, false, 158)) {
                // line 159
                echo "\t\t\t\$('.page-entry-content').off('click').on('click', function(e){
\t\t\t\tvar pageid = \$(this).data('pageid');
\t\t\t\tvar label = \$(this).data('label');
\t\t\t\tvar slugKey = \$(this).data('slug');
\t\t\t\tcpop.reset().large().loadAjax('";
                // line 163
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_selector");
                echo "?composer=1&pageid=' + pageid + '&label=' + encodeURIComponent(label));
\t\t\t});
\t\t";
            } else {
                // line 166
                echo "\t\t\t\$('.page-entry-content span.label').off('click').on('click', function(e){
\t\t\t\tlet pdiv       = \$(this).closest('.page-entry-content ');

\t\t\t\tvar slugKey    = pdiv.data('slug');
\t\t\t\tvar simpleslug = pdiv.data('simpleslug');
\t\t\t\tvar pageid     = pdiv.data('pageid');
\t\t\t\tvar label      = pdiv.data('label');
\t\t\t\tvar url        = pdiv.data('url');

\t\t\t\tvar isCkeditor = false;
\t\t\t\t";
                // line 176
                if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 176), "query", [], "any", false, false, false, 176), "get", [0 => "CKEditor"], "method", false, false, false, 176)) {
                    // line 177
                    echo "\t\t\t\t\tisCkeditor = true;
\t\t\t\t";
                }
                // line 179
                echo "
\t\t\t\tif(typeof pageSelectHandler == 'function' && !isCkeditor){
\t\t\t\t\tpageSelectHandler(pageid, label, url, slugKey, simpleslug, '";
                // line 181
                echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 181), "query", [], "any", false, true, false, 181), "get", [0 => "key"], "method", true, true, false, 181) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 181), "query", [], "any", false, true, false, 181), "get", [0 => "key"], "method", false, false, false, 181)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 181), "query", [], "any", false, true, false, 181), "get", [0 => "key"], "method", false, false, false, 181)) : (""));
                echo "');
\t\t\t\t}else{
\t\t\t\t\t/*if(typeof Trinity != 'undefined'){
\t\t\t\t\t\tTrinity.ckLink('[page:' + pageid + '#' + simpleslug + ']');
\t\t\t\t\t}else{*/
\t\t\t\t\t\t// CKEDITOR.tools.callFunction(";
                // line 186
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 186), "query", [], "any", false, false, false, 186), "get", [0 => "CKEditorFuncNum"], "method", false, false, false, 186), "html", null, true);
                echo ", '/path/to/your/image');
\t\t\t\t\t\t// window.CKEDITOR.tools.callFunction( callBack, 'path' );
\t\t\t\t\t\twindow.CKEDITOR.tools.callFunction( ";
                // line 188
                echo (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 188), "query", [], "any", false, true, false, 188), "get", [0 => "ref"], "method", true, true, false, 188) &&  !(null === twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 188), "query", [], "any", false, true, false, 188), "get", [0 => "ref"], "method", false, false, false, 188)))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 188), "query", [], "any", false, true, false, 188), "get", [0 => "ref"], "method", false, false, false, 188)) : ("''"));
                echo ", '[page:' + pageid + '#' + simpleslug + ']' );
\t\t\t\t\t\t// window.CKEDITOR.tools.callFunction(";
                // line 189
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 189), "query", [], "any", false, false, false, 189), "get", [0 => "CKEditorFuncNum"], "method", false, false, false, 189), "html", null, true);
                echo ", '[page:' + pageid + '#' + simpleslug + ']');
\t\t\t\t\t// }
\t\t\t\t\tcpop.close();
\t\t\t\t}
\t\t\t});
\t\t";
            }
            // line 195
            echo "\t\t</script>

\t";
        }
    }

    public function getTemplateName()
    {
        return "@Cms/page/selector.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  433 => 195,  424 => 189,  420 => 188,  415 => 186,  407 => 181,  403 => 179,  399 => 177,  397 => 176,  385 => 166,  379 => 163,  373 => 159,  371 => 158,  366 => 155,  362 => 153,  360 => 152,  355 => 151,  353 => 150,  349 => 148,  346 => 147,  343 => 146,  341 => 145,  337 => 143,  334 => 142,  328 => 139,  324 => 138,  319 => 136,  307 => 129,  301 => 128,  296 => 126,  289 => 122,  285 => 121,  278 => 117,  274 => 116,  267 => 112,  263 => 111,  258 => 108,  255 => 107,  252 => 106,  249 => 105,  247 => 104,  244 => 103,  241 => 102,  238 => 101,  235 => 100,  233 => 99,  230 => 98,  227 => 97,  224 => 96,  221 => 95,  218 => 94,  215 => 93,  212 => 92,  209 => 91,  206 => 90,  203 => 89,  200 => 88,  198 => 87,  192 => 85,  189 => 84,  187 => 83,  178 => 77,  168 => 73,  165 => 72,  157 => 67,  146 => 63,  144 => 62,  141 => 61,  133 => 56,  122 => 52,  120 => 51,  112 => 46,  102 => 42,  95 => 39,  93 => 38,  90 => 37,  87 => 36,  84 => 35,  81 => 34,  79 => 33,  49 => 5,  45 => 4,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/page/selector.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/page/selector.html.twig");
    }
}
