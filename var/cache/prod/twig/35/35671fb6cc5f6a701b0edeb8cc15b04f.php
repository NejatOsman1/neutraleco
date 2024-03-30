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

/* @Cms/page/page.html.twig */
class __TwigTemplate_2d774d9ebbba1921c84605d8d37d7b58 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'metadata' => [$this, 'block_metadata'],
            'sitetitle' => [$this, 'block_sitetitle'],
            'title' => [$this, 'block_title'],
            'pagetitle' => [$this, 'block_pagetitle'],
            'plain_body' => [$this, 'block_plain_body'],
            'body' => [$this, 'block_body'],
            'pageimage' => [$this, 'block_pageimage'],
            'head_lang' => [$this, 'block_head_lang'],
            'admin_header' => [$this, 'block_admin_header'],
            'admin_footer' => [$this, 'block_admin_footer'],
            'footer1' => [$this, 'block_footer1'],
            'footer2' => [$this, 'block_footer2'],
            'footer3' => [$this, 'block_footer3'],
            'footer4' => [$this, 'block_footer4'],
            'footer5' => [$this, 'block_footer5'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 2
        return $this->loadTemplate(((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 2), "xmlHttpRequest", [], "any", false, false, false, 2)) ? ("@Cms/ajax.html.twig") : ([0 => (("layouts/" . twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "layout", [], "any", false, false, false, 2)) . ".html.twig"), 1 => (("layouts/" . twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "defaultTemplate", [], "any", false, false, false, 2)) . ".html.twig"), 2 => "layouts/default.html.twig"])), "@Cms/page/page.html.twig", 2);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        if ((twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "CricitalCss", [], "any", true, true, false, 4) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "CricitalCss", [], "any", false, false, false, 4)))) {
            // line 5
            $context["deferStylesheets"] = true;
        } else {
            // line 7
            $context["deferStylesheets"] = false;
        }
        // line 2
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 11
    public function block_metadata($context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->loadTemplate("@Cms/page/metadata.html.twig", "@Cms/page/page.html.twig", 11)->display(twig_array_merge($context, ["metatags" => ($context["metatags"] ?? null), "bundle_metatags" => ($context["bundle_metatags"] ?? null)]));
    }

    // line 13
    public function block_sitetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getLabel", [], "any", false, false, false, 13);
    }

    // line 15
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 16
        echo "\t";
        (((array_key_exists("customTitle", $context) &&  !twig_test_empty(($context["customTitle"] ?? null)))) ? (print (twig_escape_filter($this->env, ($context["customTitle"] ?? null), "html", null, true))) : (print ("")));
        echo "
\t";
        // line 17
        echo twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "getTitle", [], "any", false, false, false, 17);
        echo "
";
    }

    // line 20
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 21
        echo "\t";
        if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getInlineEdit", [], "any", false, false, false, 21)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, false, false, 21), "get", [0 => "live_edit"], "method", false, false, false, 21) == true))) {
            // line 22
            echo "\t\t<h1 id=\"title-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "getId", [], "any", false, false, false, 22), "html", null, true);
            echo "\" class=\"front-editor\" contenteditable=\"true\">";
            echo twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "getTitle", [], "any", false, false, false, 22);
            echo "</h1>
\t";
        } else {
            // line 24
            echo "\t\t<h1>";
            echo twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "getTitle", [], "any", false, false, false, 24);
            echo "</h1>
\t";
        }
        // line 26
        echo "
";
    }

    // line 29
    public function block_plain_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 30
        echo "\t";
        if ((array_key_exists("exception", $context) && (twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "mode", [], "any", false, false, false, 30) == "dev"))) {
            // line 31
            echo "\t\t";
            // line 32
            echo "\t";
        }
        // line 33
        echo "\t";
        if (array_key_exists("loginform", $context)) {
            // line 34
            echo "\t\t";
            $this->loadTemplate([0 => "layouts/login.html.twig", 1 => "@Cms/page/login.html.twig"], "@Cms/page/page.html.twig", 34)->display($context);
            // line 35
            echo "\t";
        } elseif (array_key_exists("pwdform", $context)) {
            // line 36
            echo "\t\t";
            $this->loadTemplate([0 => "layouts/password.html.twig", 1 => "@Cms/page/password.html.twig"], "@Cms/page/page.html.twig", 36)->display($context);
            // line 37
            echo "\t";
        }
    }

    // line 40
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 41
        echo "\t";
        if (array_key_exists("loginform", $context)) {
            // line 42
            echo "\t\t";
            $this->loadTemplate([0 => "layouts/login.html.twig", 1 => "@Cms/page/login.html.twig"], "@Cms/page/page.html.twig", 42)->display($context);
            // line 43
            echo "\t";
        } elseif (array_key_exists("pwdform", $context)) {
            // line 44
            echo "\t\t";
            $this->loadTemplate([0 => "layouts/password.html.twig", 1 => "@Cms/page/password.html.twig"], "@Cms/page/page.html.twig", 44)->display($context);
            // line 45
            echo "\t";
        } else {
            // line 46
            echo "\t\t";
            if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getInlineEdit", [], "any", false, false, false, 46)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, false, false, 46), "get", [0 => "live_edit"], "method", false, false, false, 46) == true))) {
                // line 47
                echo "\t\t\t<div id=\"";
                echo twig_escape_filter($this->env, (( !twig_test_empty(($context["content"] ?? null))) ? (("contentid-" . twig_get_attribute($this->env, $this->source, (($__internal_compile_0 = ($context["content"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["default"] ?? null) : null), "id", [], "any", false, false, false, 47))) : (("pageid-" . twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "id", [], "any", false, false, false, 47)))), "html", null, true);
                echo "\" id=\"main-front-editor\" class=\"front-editor\" contenteditable=\"true\">";
                echo (( !twig_test_empty(($context["content"] ?? null))) ? (twig_get_attribute($this->env, $this->source, (($__internal_compile_1 = ($context["content"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["default"] ?? null) : null), "content", [], "any", false, false, false, 47)) : (""));
                echo "</div>
\t\t";
            } else {
                // line 49
                echo "\t\t\t";
                echo (( !twig_test_empty(($context["content"] ?? null))) ? (twig_get_attribute($this->env, $this->source, (($__internal_compile_2 = ($context["content"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["default"] ?? null) : null), "content", [], "any", false, false, false, 49)) : (""));
                echo "
\t\t";
            }
            // line 51
            echo "\t";
        }
    }

    // line 54
    public function block_pageimage($context, array $blocks = [])
    {
        $macros = $this->macros;
        if (twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "hasImage", [], "any", false, false, false, 54)) {
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "getImage", [], "any", false, false, false, 54), "getWebPath", [], "any", false, false, false, 54)), "html", null, true);
        }
    }

    // line 57
    public function block_head_lang($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo (((array_key_exists("Settings", $context) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "language", [], "any", false, false, false, 57)))) ? ((("lang=\"" . (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "language", [], "any", false, false, false, 57), "locale", [], "any", false, false, false, 57) == "gb")) ? ("en") : (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "language", [], "any", false, false, false, 57), "locale", [], "any", false, false, false, 57)))) . "\"")) : (""));
    }

    // line 59
    public function block_admin_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 60
        echo "\t";
        if (array_key_exists("exception", $context)) {
            // line 61
            echo "\t\t<meta name=\"robots\" content=\"noindex,nofollow\" />
\t";
        } else {
            // line 63
            echo "\t\t<meta name=\"robots\" content=\"";
            echo twig_escape_filter($this->env, (((array_key_exists("Page", $context) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "robots", [], "any", false, false, false, 63)))) ? (twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "robots", [], "any", false, false, false, 63)) : ((((array_key_exists("Settings", $context) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "robots", [], "any", false, false, false, 63)))) ? (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "robots", [], "any", false, false, false, 63)) : ("noindex,nofollow")))), "html", null, true);
            echo "\" />
\t";
        }
        // line 65
        echo "
\t";
        // line 66
        $context["customMetadata"] = $this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getPageBlocksMeta($this->env, ($context["Page"] ?? null));
        // line 67
        echo "
\t";
        // line 68
        $this->loadTemplate("@Cms/page/metadata.html.twig", "@Cms/page/page.html.twig", 68)->display($context);
        // line 69
        echo "
\t";
        // line 70
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["Language"]) {
            // line 71
            echo "\t\t";
            if (twig_get_attribute($this->env, $this->source, $context["Language"], "settings", [], "any", false, false, false, 71)) {
                // line 72
                echo "\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["Language"], "settings", [], "any", false, false, false, 72));
                foreach ($context['_seq'] as $context["_key"] => $context["LanguageSettings"]) {
                    // line 73
                    echo "\t\t\t\t";
                    if ((twig_get_attribute($this->env, $this->source, $context["LanguageSettings"], "host", [], "any", false, false, false, 73) && (twig_get_attribute($this->env, $this->source, $context["LanguageSettings"], "host", [], "any", false, false, false, 73) == twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "host", [], "any", false, false, false, 73)))) {
                        // line 74
                        echo "\t\t\t\t\t";
                        // line 75
                        echo "\t\t\t\t\t<link rel=\"alternate\" href=\"";
                        echo twig_escape_filter($this->env, (((((twig_get_attribute($this->env, $this->source, $context["LanguageSettings"], "forceHttps", [], "any", false, false, false, 75)) ? ("https") : ("http")) . "://") . twig_get_attribute($this->env, $this->source, $context["LanguageSettings"], "host", [], "any", false, false, false, 75)) . twig_get_attribute($this->env, $this->source, $context["LanguageSettings"], "baseUri", [], "any", false, false, false, 75)), "html", null, true);
                        echo "\" hreflang=\"";
                        (((twig_get_attribute($this->env, $this->source, $context["Language"], "locale", [], "any", false, false, false, 75) == "gb")) ? (print ("en")) : (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Language"], "locale", [], "any", false, false, false, 75), "html", null, true))));
                        echo "\" />
\t\t\t\t";
                    }
                    // line 77
                    echo "\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['LanguageSettings'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 78
                echo "\t\t";
            }
            // line 79
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "
\t";
        // line 81
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getInlineEdit", [], "any", false, false, false, 81))) {
            // line 82
            echo "\t\t";
            if (($context["deferStylesheets"] ?? null)) {
                // line 83
                echo "\t\t\t<link rel=\"preload\" href=\"/bundles/cms/css/frontinject.css\" as=\"style\" onload=\"this.onload=null;this.rel='stylesheet';\">
\t\t";
            } else {
                // line 85
                echo "\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/css/frontinject.css\">
\t\t";
            }
            // line 87
            echo "\t";
        }
        // line 88
        echo "\t";
        if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getInlineEdit", [], "any", false, false, false, 88)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, false, false, 88), "get", [0 => "live_edit"], "method", false, false, false, 88) == true))) {
            // line 89
            echo "\t\t";
            if (($context["deferStylesheets"] ?? null)) {
                // line 90
                echo "\t\t\t<link rel=\"preload\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/css/font-awesome.min.css"), "html", null, true);
                echo "\" as=\"style\" onload=\"this.onload=null;this.rel='stylesheet';\" />
\t\t\t<link rel=\"preload\" href=\"/bundles/cms/css/jquery.cpop.css\" as=\"style\" onload=\"this.onload=null;this.rel='stylesheet';\" />
\t\t";
            } else {
                // line 93
                echo "\t\t\t<link rel=\"stylesheet\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/css/font-awesome.min.css"), "html", null, true);
                echo "\">
\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/css/jquery.cpop.css\">
\t\t";
            }
            // line 96
            echo "\t\t<style type=\"text/css\">
\t\t.front-editor{
\t\t\toutline: none !important;
\t\t\tborder: dashed 1px #ccc;
\t\t\tmargin: -1px;
\t\t}

\t\t.cke_chrome {
\t\t    box-shadow: none !important;
\t\t}

\t\t.cke_wordcount {
\t\t    display: none !important;
\t\t}

\t\t.cke_float .cke_top {
\t\t    background: #f3f3f3 !important;
\t\t    border: solid 1px #ccc !important;
\t\t    box-shadow: none !important;
\t\t    border-radius: 2px !important;
\t\t}

\t\t.save-overlay{
\t\t\tposition: fixed;
\t\t\ttop: 0;
\t\t\tleft: 0;
\t\t\tright: 0;
\t\t\tbottom: 0;
\t\t\tz-index: 10000;
\t\t\tbackground: #ffffffab;
\t\t}

\t\t.inline-save-btn{
\t\t\tposition: fixed;
\t\t\tbottom: 40px;
\t\t\tright: 50px;
\t\t}

\t\t.lds-ring {
\t\t\tdisplay: inline-block;
\t\t\tposition: relative;
\t\t\twidth: 120px;
\t\t\theight: 120px;
\t\t\tposition: absolute;
\t\t\ttop: 50%;
\t\t\tleft: 50%;
\t\t\tmargin-left: -60px;
\t\t\tmargin-top: -60px;
\t\t}
\t\t.lds-ring span {
\t\t\tposition: absolute;
\t\t\ttop: 45px;
\t\t\tleft: 30px;
\t\t\tright: 30px;
\t\t\ttext-align: center;
\t\t\tfont-size: 12px;
\t\t\tline-height: 16px;
\t\t\tcolor: #3594e8;
\t\t\tfont-weight: bold;
\t\t}
\t\t.lds-ring div {
\t\t\tbox-sizing: border-box;
\t\t\tdisplay: block;
\t\t\tposition: absolute;
\t\t\twidth: 104px;
\t\t\theight: 104px;
\t\t\tmargin: 8px;
\t\t\tborder: 8px solid #3594e8;
\t\t\tborder-radius: 50%;
\t\t\tanimation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
\t\t\tborder-color: #3594e8 transparent transparent transparent;
\t\t}
\t\t.lds-ring div:nth-child(1) {
\t\t\tanimation-delay: -0.45s;
\t\t}
\t\t.lds-ring div:nth-child(2) {
\t\t\tanimation-delay: -0.3s;
\t\t}
\t\t.lds-ring div:nth-child(3) {
\t\t\tanimation-delay: -0.15s;
\t\t}
\t\t@keyframes lds-ring {
\t\t\t0% {
\t\t\t\ttransform: rotate(0deg);
\t\t\t}
\t\t\t100% {
\t\t\t\ttransform: rotate(360deg);
\t\t\t}
\t\t}

\t\t</style>
\t";
        }
        // line 188
        echo "\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getLayoutIncludeCss", [0 => true], "method", false, false, false, 188));
        foreach ($context['_seq'] as $context["_key"] => $context["incl"]) {
            // line 189
            echo "\t\t";
            if (($context["deferStylesheets"] ?? null)) {
                // line 190
                echo "\t\t\t<link rel=\"preload\" href=\"";
                echo twig_escape_filter($this->env, $context["incl"], "html", null, true);
                echo "?v=12\" as=\"style\" onload=\"this.onload=null;this.rel='stylesheet';\">
\t\t";
            } else {
                // line 192
                echo "\t\t\t<link rel=\"stylesheet\" href=\"";
                echo twig_escape_filter($this->env, $context["incl"], "html", null, true);
                echo "?v=12\">
\t\t";
            }
            // line 194
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['incl'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 195
        echo "
\t";
        // line 196
        if (array_key_exists("extraPageCss", $context)) {
            // line 197
            echo "\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["extraPageCss"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["incl"]) {
                // line 198
                echo "\t\t";
                if (($context["deferStylesheets"] ?? null)) {
                    // line 199
                    echo "\t\t\t<link rel=\"preload\" href=\"";
                    echo twig_escape_filter($this->env, $context["incl"], "html", null, true);
                    echo "?v=12\" as=\"style\" onload=\"this.onload=null; this.rel='stylesheet'\">
\t\t";
                } else {
                    // line 201
                    echo "\t\t\t<link rel=\"stylesheet\" href=\"";
                    echo twig_escape_filter($this->env, $context["incl"], "html", null, true);
                    echo "?v=12\">
\t\t";
                }
                // line 203
                echo "\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['incl'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 204
            echo "\t";
        }
        // line 205
        echo "
\t";
        // line 206
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getLayoutIncludeFont", [0 => true], "method", false, false, false, 206));
        foreach ($context['_seq'] as $context["_key"] => $context["incl"]) {
            // line 207
            echo "\t\t";
            if (($context["deferStylesheets"] ?? null)) {
                // line 208
                echo "\t\t\t<link rel=\"preload\" href=\"";
                echo twig_escape_filter($this->env, $context["incl"], "html", null, true);
                echo "?v=12\" as=\"style\" onload=\"this.onload=null;this.rel='stylesheet';\">
\t\t";
            } else {
                // line 210
                echo "\t\t\t<link rel=\"stylesheet\" href=\"";
                echo twig_escape_filter($this->env, $context["incl"], "html", null, true);
                echo "?v=12\">
\t\t";
            }
            // line 212
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['incl'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 213
        echo "
\t";
        // line 214
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getLayoutIncludeJs", [0 => true], "method", false, false, false, 214));
        foreach ($context['_seq'] as $context["_key"] => $context["incl"]) {
            // line 215
            echo "\t\t";
            if (preg_match("/jquery-\\d.*.min.js/", $context["incl"])) {
                // line 216
                echo "\t\t<script defer type=\"text/javascript\" src=\"";
                echo twig_escape_filter($this->env, $context["incl"], "html", null, true);
                echo "?v=12\"></script>
\t\t";
            }
            // line 218
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['incl'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 219
        echo "
\t";
        // line 220
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getLayoutIncludeJs", [0 => true], "method", false, false, false, 220));
        foreach ($context['_seq'] as $context["_key"] => $context["incl"]) {
            // line 221
            echo "\t\t";
            if (preg_match("{popper}", $context["incl"])) {
                // line 222
                echo "\t\t\t<script defer type=\"text/javascript\" src=\"";
                echo twig_escape_filter($this->env, $context["incl"], "html", null, true);
                echo "?v=12\"></script>
\t\t";
            }
            // line 224
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['incl'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 225
        echo "
\t";
        // line 226
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getLayoutIncludeJs", [0 => true], "method", false, false, false, 226));
        foreach ($context['_seq'] as $context["_key"] => $context["incl"]) {
            // line 227
            echo "\t\t";
            if (( !preg_match("/jquery-\\d.*.min.js/", $context["incl"]) &&  !preg_match("{popper}", $context["incl"]))) {
                // line 228
                echo "\t\t\t<script defer type=\"text/javascript\" src=\"";
                echo twig_escape_filter($this->env, $context["incl"], "html", null, true);
                echo "?v=12\"></script>
\t\t";
            }
            // line 230
            echo "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['incl'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 231
        echo "
\t";
        // line 232
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "cookiebar", [], "any", false, false, false, 232)) {
            // line 233
            echo "\t\t<script defer src=\"/bundles/cms/js/avg.min.js\"></script>
\t";
        }
        // line 235
        echo "
    ";
        // line 236
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasGoogleRecaptcha", [], "any", false, false, false, 236)) {
            // line 237
            echo "    \t<script>
    \t\tvar googleRecaptchaMode = '";
            // line 238
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "googleRecaptchaMode", [], "any", false, false, false, 238), "html", null, true);
            echo "';
    \t\tvar googleRecaptchaSitekey = '";
            // line 239
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "googleRecaptchaSitekey", [], "any", false, false, false, 239), "html", null, true);
            echo "';
    \t</script>
    ";
        }
        // line 242
        echo "
\t<script defer src=\"/bundles/cms/js/frontend_common.js\"></script>

    ";
        // line 245
        if (array_key_exists("extraPageJs", $context)) {
            // line 246
            echo "\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["extraPageJs"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["incl"]) {
                // line 247
                echo "\t\t<script defer type=\"text/javascript\" src=\"";
                echo twig_escape_filter($this->env, $context["incl"], "html", null, true);
                echo "\"></script>
\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['incl'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 249
            echo "\t";
        }
        // line 250
        echo "
\t";
        // line 251
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "googleCc", [], "any", false, false, false, 251))) {
            // line 252
            echo "\t\t<meta name=\"google-site-verification\" content=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "googleCc", [], "any", false, false, false, 252), "html", null, true);
            echo "\">
\t";
        }
        // line 254
        echo "
        ";
        // line 255
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "faceDomainKey", [], "any", false, false, false, 255))) {
            // line 256
            echo "            <meta name=\"facebook-domain-verification\" content=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "faceDomainKey", [], "any", false, false, false, 256), "html", null, true);
            echo "\" />
        ";
        }
        // line 258
        echo "
\t";
        // line 259
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "iosAppId", [], "any", false, false, false, 259))) {
            // line 260
            echo "\t\t<meta name=\"apple-itunes-app\" content=\"app-id=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "iosAppId", [], "any", false, false, false, 260), "html", null, true);
            echo "\">
\t";
        }
        // line 262
        echo "
\t";
        // line 263
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "androidAppId", [], "any", false, false, false, 263))) {
            // line 264
            echo "\t\t<meta name=\"google-play-app\" content=\"app-id=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "androidAppId", [], "any", false, false, false, 264), "html", null, true);
            echo "\">
\t\t";
            // line 265
            if (($context["deferStylesheets"] ?? null)) {
                // line 266
                echo "\t\t\t<link rel=\"preload\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/android-app-banner/banner.css"), "html", null, true);
                echo "\" as=\"style\" onload=\"this.onload=null;this.rel='stylesheet';\" />
\t\t";
            } else {
                // line 268
                echo "\t\t\t<link rel=\"stylesheet\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/android-app-banner/banner.css"), "html", null, true);
                echo "\" />
\t\t";
            }
            // line 270
            echo "\t";
        }
        // line 271
        echo "

    ";
        // line 273
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "cookiebar", [], "any", false, false, false, 273)) {
            // line 274
            echo "    ";
        } else {
            // line 275
            echo "\t\t";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "googleGtm", [], "any", false, false, false, 275))) {
                // line 276
                echo "\t\t\t<!-- Google Tag Manager -->
\t\t\t<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
\t\t\tnew Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
\t\t\tj=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
\t\t\t'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
\t\t\t})(window,document,'script','dataLayer','";
                // line 281
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "googleGtm", [], "any", false, false, false, 281), "html", null, true);
                echo "');</script>
\t\t\t<!-- End Google Tag Manager -->
\t\t";
            }
            // line 284
            echo "\t";
        }
        // line 285
        echo "
\t";
        // line 286
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "facebookpixel", [], "any", false, false, false, 286))) {
            // line 287
            echo "\t\t<script>
\t\t!function(f,b,e,v,n,t,s)
\t\t{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
\t\tn.callMethod.apply(n,arguments):n.queue.push(arguments)};
\t\tif(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
\t\tn.queue=[];t=b.createElement(e);t.async=!0;
\t\tt.src=v;s=b.getElementsByTagName(e)[0];
\t\ts.parentNode.insertBefore(t,s)}(window, document,'script',
\t\t'https://connect.facebook.net/en_US/fbevents.js');
\t\tfbq('init', '";
            // line 296
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "facebookpixel", [], "any", false, false, false, 296), "html", null, true);
            echo "');
\t\tfbq('track', 'PageView');
\t\t</script>
\t";
        }
        // line 300
        echo "
\t\t<script type=\"application/ld+json\">
\t\t{
\t\t\t\"@context\": \"http://schema.org/\",
\t\t\t\"@type\": \"Organization\",
\t\t\t\"name\": \"";
        // line 305
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "company", [], "any", false, false, false, 305), "html", null, true);
        echo "\",
\t\t\t\"address\": {
\t\t\t\t\"@type\": \"PostalAddress\",
\t\t\t\t\"streetAddress\": \"";
        // line 308
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "address", [], "any", false, false, false, 308), "html", null, true);
        echo "\",
\t\t\t\t\"addressLocality\": \"";
        // line 309
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "place", [], "any", false, false, false, 309), "html", null, true);
        echo "\",
\t\t\t\t";
        // line 310
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "state", [], "any", false, false, false, 310))) {
            // line 311
            echo "\t\t\t\t\"addressRegion\": \"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "state", [], "any", false, false, false, 311), "html", null, true);
            echo "\",
\t\t\t\t";
        }
        // line 313
        echo "\t\t\t\t\"postalCode\": \"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "postalcode", [], "any", false, false, false, 313), "html", null, true);
        echo "\"
\t\t\t},
\t\t\t\"telephone\": \"";
        // line 315
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "phone", [], "any", false, false, false, 315), "html", null, true);
        echo "\",
\t\t\t\"email\": \"mailto:";
        // line 316
        echo twig_escape_filter($this->env, twig_trim_filter(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "systemEmail", [], "any", false, false, false, 316)), "html", null, true);
        echo "\"
\t\t}
\t\t</script>

\t\t";
        // line 320
        if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getInlineEdit", [], "any", false, false, false, 320)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, false, false, 320), "get", [0 => "live_edit"], "method", false, false, false, 320) == true))) {
            // line 321
            echo "\t\t\t<script type=\"text/javascript\">
\t\t\t\tvar frontendEdit = true;
\t\t\t\tvar ckAdminJsonUrl = '";
            // line 323
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("_adminjson");
            echo "';
\t\t\t\tvar ckAdminPageUrl = '";
            // line 324
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_selector");
            echo "';
\t\t\t\tvar ckAdminMediaUrl = '";
            // line 325
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media", ["type" => "image"]);
            echo "';
\t\t\t\tvar ckDropUploadUrl = '';
\t\t\t</script>

\t\t\t<script defer src=\"";
            // line 329
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/ckeditor/ckeditor.js"), "html", null, true);
            echo "\"></script>
\t\t\t<script defer src=\"";
            // line 330
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/jquery-match-height/dist/jquery.matchHeight-min.js"), "html", null, true);
            echo "\"></script>
\t\t\t<script defer src=\"";
            // line 331
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/jquery-ui-1.11.4.custom/jquery-ui.js"), "html", null, true);
            echo "\"></script>
\t\t\t<script defer src=\"";
            // line 332
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/js/jquery.cpop.js"), "html", null, true);
            echo "\"></script>

\t\t\t<script defer src=\" ";
            // line 334
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/js/frontend.js"), "html", null, true);
            echo "\"></script>
\t\t";
        }
        // line 336
        echo "
\t\t";
        // line 337
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "androidAppId", [], "any", false, false, false, 337))) {
            // line 338
            echo "\t\t<script>
\t\t\tvar smartBannerMsgTitle = '";
            // line 339
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "appLabel", [], "any", false, false, false, 339), "html", null, true);
            echo "';
\t\t\tvar smartBannerMsgAuthor = '";
            // line 340
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "company", [], "any", false, false, false, 340), "html", null, true);
            echo "';
\t\t\tvar smartBannerMsgButton = '";
            // line 341
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("BEKIJKEN", [], "", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 341), "locale", [], "any", false, false, false, 341)), "html", null, true);
            echo "';
\t\t\tvar smartBannerMsgIos = '";
            // line 342
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("In de App Store", [], "cms"), "html", null, true);
            echo "';
\t\t\tvar smartBannerMsgAndroid = '";
            // line 343
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("In Google Play", [], "cms"), "html", null, true);
            echo "';
\t\t\tvar smartBannerMsgWindows = '";
            // line 344
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("In Windows store", [], "cms"), "html", null, true);
            echo "';
\t\t\tvar smartBannerMsgPrice = '";
            // line 345
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("GRATIS", [], "cms"), "html", null, true);
            echo "';
\t\t\tvar smartBannerMsgIcon = '";
            // line 346
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getAppIcon", [], "any", false, false, false, 346), "html", null, true);
            echo "';
\t\t</script>
\t\t<script defer src=\"";
            // line 348
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/android-app-banner/banner.js"), "html", null, true);
            echo "\"></script>
\t";
        }
    }

    // line 352
    public function block_admin_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 353
        echo "    ";
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_PREVIOUS_ADMIN")) {
            // line 354
            echo "    \t";
            if (twig_in_filter("admin", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 354), "attributes", [], "any", false, false, false, 354), "get", [0 => "_route"], "method", false, false, false, 354))) {
                // line 355
                echo "    \t\t<a style=\"position:fixed;bottom:30px;right: 30px;z-index: 1000;\" class=\"btn\" href=\"";
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users");
                echo "?_switch_user=_exit\"><i class=\"fa fa-lock\"></i> ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Exit impersonation", [], "cms"), "html", null, true);
                echo "</a>
    \t";
            } else {
                // line 357
                echo "    \t\t<a style=\"position:fixed;bottom:30px;right: 30px;z-index: 1000;\" class=\"btn\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 357), "attributes", [], "any", false, false, false, 357), "get", [0 => "_route"], "method", false, false, false, 357), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 357), "attributes", [], "any", false, false, false, 357), "get", [0 => "_route_params"], "method", false, false, false, 357)), "html", null, true);
                echo "?_switch_user=_exit\"><i class=\"fa fa-lock\"></i> ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Exit impersonation", [], "cms"), "html", null, true);
                echo "</a>
    \t";
            }
            // line 359
            echo "    ";
        }
        // line 360
        echo "\t";
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getInlineEdit", [], "any", false, false, false, 360))) {
            // line 361
            echo "\t\t<div id=\"admin-sidebar\">
\t\t\t<div class=\"admin-logo\" style=\"background-image:url('";
            // line 362
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getLogo", [], "any", false, false, false, 362), "html", null, true);
            echo "');\"></div>
\t\t\t<ul>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"";
            // line 365
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
            echo "\">Admin</a>
\t\t\t\t</li>
\t\t\t\t";
            // line 367
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, false, false, 367), "get", [0 => "live_edit"], "method", false, false, false, 367) == true)) {
                // line 368
                echo "\t\t\t\t\t<li><a style=\"background: #4F805D;\" href=\"?live_edit=0\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Live bewerken:", [], "cms"), "html", null, true);
                echo " <span class=\"value\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("AAN", [], "cms"), "html", null, true);
                echo "</span></a></li>
\t\t\t\t";
            } else {
                // line 370
                echo "\t\t\t\t\t<li><a href=\"?live_edit=1\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Live bewerken:", [], "cms"), "html", null, true);
                echo " <span class=\"value\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("UIT", [], "cms"), "html", null, true);
                echo "</span></a></li>
\t\t\t\t";
            }
            // line 372
            echo "\t\t\t\t<li><a>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gebruiker wisselen", [], "cms"), "html", null, true);
            echo "</a>
\t\t\t\t\t<ul>
\t\t\t\t\t\t";
            // line 374
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["User"]) {
                // line 375
                echo "\t\t\t\t\t\t\t";
                if ((twig_get_attribute($this->env, $this->source, $context["User"], "id", [], "any", false, false, false, 375) > 1)) {
                    // line 376
                    echo "\t\t\t\t\t\t\t\t<li><a href=\"?_switch_user=";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["User"], "username", [], "any", false, false, false, 376), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["User"], "getName", [], "any", false, false, false, 376), "html", null, true);
                    echo "<span>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["User"], "username", [], "any", false, false, false, 376), "html", null, true);
                    echo " | <span class=\"orange-text\">";
                    echo twig_escape_filter($this->env, twig_join_filter(twig_get_attribute($this->env, $this->source, $context["User"], "roles", [], "any", false, false, false, 376), ", "), "html", null, true);
                    echo "</span></span></a></li>
\t\t\t\t\t\t\t";
                }
                // line 378
                echo "\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['User'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 379
            echo "\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t";
            // line 381
            if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getMaintenance", [], "any", false, false, false, 381)) {
                // line 382
                echo "\t\t\t\t\t<li>
\t\t\t\t\t\t<a style=\"background:#A46A1F;\">";
                // line 383
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Maintainance mode is actief", [], "cms"), "html", null, true);
                echo "</a>
\t\t\t\t\t</li>
\t\t\t\t";
            }
            // line 386
            echo "\t\t\t\t<li><a>";
            echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 386), "query", [], "any", false, false, false, 386), "get", [0 => "rev"], "method", false, false, false, 386) && preg_match("/^\\d+\$/", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 386), "query", [], "any", false, false, false, 386), "get", [0 => "rev"], "method", false, false, false, 386)))) ? ((($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Versie", [], "cms") . " ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 386), "query", [], "any", false, false, false, 386), "get", [0 => "rev"], "method", false, false, false, 386))) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina versies", [], "cms"))), "html", null, true);
            echo "</a>
\t\t\t\t\t<ul>
\t\t\t\t\t\t";
            // line 388
            $context["initial"] = false;
            // line 389
            echo "\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "content", [], "any", false, false, false, 389), 0, 10));
            foreach ($context['_seq'] as $context["_key"] => $context["Content"]) {
                // line 390
                echo "\t\t\t\t\t\t\t";
                if ((twig_get_attribute($this->env, $this->source, $context["Content"], "name", [], "any", false, false, false, 390) == "default")) {
                    // line 391
                    echo "\t\t\t\t\t\t\t";
                    $context["url"] = ("?rev=" . twig_get_attribute($this->env, $this->source, $context["Content"], "revision", [], "any", false, false, false, 391));
                    // line 392
                    echo "\t\t\t\t\t\t\t";
                    $context["label"] = (((twig_get_attribute($this->env, $this->source, $context["Content"], "revision", [], "any", false, false, false, 392) == 0)) ? ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Initiële versie", [], "cms")) : ((($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Versie", [], "cms") . " ") . twig_get_attribute($this->env, $this->source, $context["Content"], "revision", [], "any", false, false, false, 392))));
                    // line 393
                    echo "\t\t\t\t\t\t\t";
                    $context["style"] = "";
                    // line 394
                    echo "
\t\t\t\t\t\t\t";
                    // line 395
                    if ((twig_get_attribute($this->env, $this->source, $context["Content"], "published", [], "any", false, false, false, 395) && (($context["initial"] ?? null) == false))) {
                        // line 396
                        echo "\t\t\t\t\t\t\t\t";
                        $context["initial"] = true;
                        // line 397
                        echo "\t\t\t\t\t\t\t\t";
                        $context["label"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Actuele versie", [], "cms");
                        // line 398
                        echo "\t\t\t\t\t\t\t\t";
                        $context["style"] = "green darken-1";
                        // line 399
                        echo "\t\t\t\t\t\t\t";
                    } elseif ((twig_get_attribute($this->env, $this->source, $context["Content"], "published", [], "any", false, false, false, 399) == false)) {
                        // line 400
                        echo "\t\t\t\t\t\t\t\t";
                        $context["label"] = (((($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Versie", [], "cms") . " ") . twig_get_attribute($this->env, $this->source, $context["Content"], "revision", [], "any", false, false, false, 400)) . " ") . $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("(Niet gepubliceerd)", [], "cms"));
                        // line 401
                        echo "\t\t\t\t\t\t\t\t";
                        $context["style"] = "orange darken-2";
                        // line 402
                        echo "\t\t\t\t\t\t\t";
                    }
                    // line 403
                    echo "
\t\t\t\t\t\t\t";
                    // line 404
                    if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 404), "query", [], "any", false, false, false, 404), "get", [0 => "rev"], "method", false, false, false, 404) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 404), "query", [], "any", false, false, false, 404), "get", [0 => "rev"], "method", false, false, false, 404) == twig_get_attribute($this->env, $this->source, $context["Content"], "revision", [], "any", false, false, false, 404)))) {
                        // line 405
                        echo "\t\t\t\t\t\t\t\t";
                        $context["style"] = "grey darken-2";
                        // line 406
                        echo "\t\t\t\t\t\t\t";
                    }
                    // line 407
                    echo "
\t\t\t\t\t\t\t<li class=\"";
                    // line 408
                    echo twig_escape_filter($this->env, ($context["style"] ?? null), "html", null, true);
                    echo "\"><a href=\"";
                    echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
                    echo "<span>";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Content"], "created", [], "any", false, false, false, 408), "d-m-Y H:i"), "html", null, true);
                    echo "</span></a></li>
\t\t\t\t\t\t\t";
                }
                // line 410
                echo "\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Content'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 411
            echo "\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t<li style=\"float:right;display: none;\" id=\"fe-buttons\">
\t\t\t\t\t<button id=\"fe-restore\" type=\"button\">";
            // line 414
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Restore", [], "cms"), "html", null, true);
            echo "</button>
\t\t\t\t\t<button id=\"fe-save\" type=\"button\">";
            // line 415
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Save", [], "cms"), "html", null, true);
            echo "</button>
\t\t\t\t</li>
\t\t\t</ul>
\t\t\t";
            // line 419
            echo "\t\t</div>
\t";
        }
        // line 421
        echo "
\t";
        // line 422
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "test", [], "any", false, false, false, 422)) {
            // line 423
            echo "\t\t<div class=\"test-mode-badge-wrapper\">
\t\t\t<div class=\"test-mode-badge\" title=\"";
            // line 424
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Test mode staat aan, configureer in website instellingen.", [], "cms"), "html", null, true);
            echo "\"><i class=\"fa fa-exclamation-triangle\"></i> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("TEST MODE", [], "cms"), "html", null, true);
            echo "</div>
\t\t</div>
\t";
        }
        // line 427
        echo "
\t";
        // line 428
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "cookiebar", [], "any", false, false, false, 428)) {
            // line 429
            echo "\t\t<script>
\t\t\tvar avg_settings = {
\t\t\t\t'gtmCode': '";
            // line 431
            echo (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "googleGtm", [], "any", false, false, false, 431))) ? (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "googleGtm", [], "any", false, false, false, 431)) : (""));
            echo "',
\t\t\t\t'gaCode': '";
            // line 432
            (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "googleUa", [], "any", false, false, false, 432))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "googleUa", [], "any", false, false, false, 432), "html", null, true))) : (print ("")));
            echo "',
\t\t\t\t'gCode': '";
            // line 433
            (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "googleG", [], "any", false, false, false, 433))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "googleG", [], "any", false, false, false, 433), "html", null, true))) : (print ("")));
            echo "',
\t\t\t\t'lbl_info' : '";
            // line 434
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wij gebruiken cookies om uw gebruikservaring te optimaliseren.", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 434), "locale", [], "any", false, false, false, 434)), "html", null, true);
            echo "',
\t\t\t\t'lbl_settings_info' : '";
            // line 435
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wij gebruiken cookies om uw gebruikservaring te optimaliseren, het webverkeer te analyseren en gerichte advertenties te kunnen tonen via derde partijen.", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 435), "locale", [], "any", false, false, false, 435)), "html", null, true);
            echo "</p><p class=\"lbl-info-more\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Als u akkoord gaat met ons gebruik van cookies, klikt u op \"Alle cookies toestaan\". Geef hieronder aan welke opties u wilt toestaan tijdens het gebruik van deze website.", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 435), "locale", [], "any", false, false, false, 435)), "html", null, true);
            echo "',

\t\t\t\t'lbl_essential' : '";
            // line 437
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Essentieel", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 437), "locale", [], "any", false, false, false, 437)), "html", null, true);
            echo "',
\t\t\t\t'lbl_preferences' : '";
            // line 438
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Voorkeuren", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 438), "locale", [], "any", false, false, false, 438)), "html", null, true);
            echo "',
\t\t\t\t'lbl_statistics' : '";
            // line 439
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Statistieken", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 439), "locale", [], "any", false, false, false, 439)), "html", null, true);
            echo "',
\t\t\t\t'lbl_marketing' : '";
            // line 440
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Marketing", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 440), "locale", [], "any", false, false, false, 440)), "html", null, true);
            echo "',

\t\t\t\t'lbl_tooltip_essential' : '";
            // line 442
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Noodzakelijke cookies helpen een website bruikbaarder te maken, door basisfuncties als paginanavigatie en toegang tot beveiligde gedeelten van de website mogelijk te maken. Zonder deze cookies kan de website niet naar behoren werken.", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 442), "locale", [], "any", false, false, false, 442)), "html", null, true);
            echo "',
\t\t\t\t'lbl_tooltip_preferences' : '";
            // line 443
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Voorkeurscookies zorgen ervoor dat een website informatie kan onthouden die van invloed is op het gedrag en de vormgeving van de website, zoals de taal van uw voorkeur of de regio waar u woont.", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 443), "locale", [], "any", false, false, false, 443)), "html", null, true);
            echo "',
\t\t\t\t'lbl_tooltip_statistics' : '";
            // line 444
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Statistische cookies helpen eigenaren van websites begrijpen hoe bezoekers hun website gebruiken, door anoniem gegevens te verzamelen en te rapporteren.", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 444), "locale", [], "any", false, false, false, 444)), "html", null, true);
            echo "',
\t\t\t\t'lbl_tooltip_marketing' : '";
            // line 445
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Marketingcookies worden gebruikt om bezoekers te volgen wanneer ze verschillende websites bezoeken. Hun doel is advertenties weergeven die zijn toegesneden op en relevant zijn voor de individuele gebruiker.", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 445), "locale", [], "any", false, false, false, 445)), "html", null, true);
            echo "',

\t\t\t\t'lbl_back' : '";
            // line 447
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Terug", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 447), "locale", [], "any", false, false, false, 447)), "html", null, true);
            echo "',
\t\t\t\t'lbl_settings' : '";
            // line 448
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Instellingen", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 448), "locale", [], "any", false, false, false, 448)), "html", null, true);
            echo "',
\t\t\t\t'lbl_accept' : '";
            // line 449
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Alle cookies toestaan", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 449), "locale", [], "any", false, false, false, 449)), "html", null, true);
            echo "',
\t\t\t\t'lbl_save' : '";
            // line 450
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Accepteren en sluiten", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 450), "locale", [], "any", false, false, false, 450)), "html", null, true);
            echo "',
\t\t\t\t'lbl_btn_reset' : '";
            // line 451
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cookie instellingen", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 451), "locale", [], "any", false, false, false, 451)), "html", null, true);
            echo "',

\t\t\t\t'link_cookie' : ";
            // line 453
            echo (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "avgCookie", [], "any", false, false, false, 453))) ? ((("'" . twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "avgCookie", [], "any", false, false, false, 453)) . "'")) : ("null"));
            echo ",
\t\t\t\t'link_privacy' : ";
            // line 454
            echo (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "avgPrivacy", [], "any", false, false, false, 454))) ? ((("'" . twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "avgPrivacy", [], "any", false, false, false, 454)) . "'")) : ("null"));
            echo ",
\t\t\t\t'link_disclaimer' : ";
            // line 455
            echo (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "avgDisclaimer", [], "any", false, false, false, 455))) ? ((("'" . twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "avgDisclaimer", [], "any", false, false, false, 455)) . "'")) : ("null"));
            echo ",

\t\t\t\t'lbl_cookie_btn' : '";
            // line 457
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cookie informatie", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 457), "locale", [], "any", false, false, false, 457)), "html", null, true);
            echo "',
\t\t\t\t'lbl_privacy_btn' : '";
            // line 458
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Privacy statement", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 458), "locale", [], "any", false, false, false, 458)), "html", null, true);
            echo "',
\t\t\t\t'lbl_disclaimer_btn' : '";
            // line 459
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Disclaimer", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 459), "locale", [], "any", false, false, false, 459)), "html", null, true);
            echo "',

\t\t\t\t'reset_btn' : ";
            // line 461
            echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "cookiebarButton", [], "any", false, false, false, 461)) ? ("true") : ("false"));
            echo ",
\t\t\t\t'reset_btn_position' : '";
            // line 462
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "cookiebarButtonPosition", [], "any", false, false, false, 462), "html", null, true);
            echo "',
\t\t\t\t'reset_btn_offset_right' : '";
            // line 463
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "cookiebarButtonOffset", [], "any", false, false, false, 463), "html", null, true);
            echo "',
\t\t\t};
\t\t</script>
\t";
        } else {
            // line 467
            echo "\t\t";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "googleUa", [], "any", false, false, false, 467))) {
                // line 468
                echo "\t\t\t<!-- Google Analytics -->
\t\t\t<script>
\t\t\t(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
\t\t\t\t(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
\t\t\t\tm=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
\t\t\t\t})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

\t\t\t\tga('create', '";
                // line 475
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "googleUa", [], "any", false, false, false, 475), "html", null, true);
                echo "', 'auto');
\t\t\t\tga('send', 'pageview');
\t\t\t</script>
\t\t\t<!-- End Google Analytics -->
\t\t";
            }
            // line 480
            echo "\t\t";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "googleGtm", [], "any", false, false, false, 480))) {
                // line 481
                echo "\t\t\t<!-- Google Tag Manager (noscript) -->
\t\t\t<noscript><iframe data-src=\"https://www.googletagmanager.com/ns.html?id=";
                // line 482
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "googleGtm", [], "any", false, false, false, 482), "html", null, true);
                echo "\"
\t\t\theight=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
\t\t\t<!-- End Google Tag Manager (noscript) -->
\t\t";
            }
            // line 486
            echo "\t";
        }
        // line 487
        echo "
\t";
        // line 488
        if (twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "tplInject", [], "any", false, false, false, 488)) {
            // line 489
            echo "\t\t";
            echo twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "tplInject", [], "any", false, false, false, 489);
            echo "
\t";
        }
        // line 491
        echo "
\t";
        // line 492
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 492), "get", [0 => "timer"], "method", false, false, false, 492) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 492), "get", [0 => "timer"], "method", false, false, false, 492) == 2)) && array_key_exists("timer_result", $context))) {
            // line 493
            echo "\t\t<div class=\"easify_timer\" style=\"padding: 50px;\">
\t\t\t<strong>TIMER:</strong>

\t\t\t";
            // line 496
            echo ($context["timer_result"] ?? null);
            echo "
\t\t</div>
\t";
        }
    }

    // line 501
    public function block_footer1($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "footerBlock1", [], "any", false, false, false, 501);
    }

    // line 502
    public function block_footer2($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "footerBlock2", [], "any", false, false, false, 502);
    }

    // line 503
    public function block_footer3($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "footerBlock3", [], "any", false, false, false, 503);
    }

    // line 504
    public function block_footer4($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "footerBlock4", [], "any", false, false, false, 504);
    }

    // line 505
    public function block_footer5($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "footerBlock5", [], "any", false, false, false, 505);
    }

    public function getTemplateName()
    {
        return "@Cms/page/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1313 => 505,  1306 => 504,  1299 => 503,  1292 => 502,  1285 => 501,  1277 => 496,  1272 => 493,  1270 => 492,  1267 => 491,  1261 => 489,  1259 => 488,  1256 => 487,  1253 => 486,  1246 => 482,  1243 => 481,  1240 => 480,  1232 => 475,  1223 => 468,  1220 => 467,  1213 => 463,  1209 => 462,  1205 => 461,  1200 => 459,  1196 => 458,  1192 => 457,  1187 => 455,  1183 => 454,  1179 => 453,  1174 => 451,  1170 => 450,  1166 => 449,  1162 => 448,  1158 => 447,  1153 => 445,  1149 => 444,  1145 => 443,  1141 => 442,  1136 => 440,  1132 => 439,  1128 => 438,  1124 => 437,  1117 => 435,  1113 => 434,  1109 => 433,  1105 => 432,  1101 => 431,  1097 => 429,  1095 => 428,  1092 => 427,  1084 => 424,  1081 => 423,  1079 => 422,  1076 => 421,  1072 => 419,  1066 => 415,  1062 => 414,  1057 => 411,  1051 => 410,  1040 => 408,  1037 => 407,  1034 => 406,  1031 => 405,  1029 => 404,  1026 => 403,  1023 => 402,  1020 => 401,  1017 => 400,  1014 => 399,  1011 => 398,  1008 => 397,  1005 => 396,  1003 => 395,  1000 => 394,  997 => 393,  994 => 392,  991 => 391,  988 => 390,  983 => 389,  981 => 388,  975 => 386,  969 => 383,  966 => 382,  964 => 381,  960 => 379,  954 => 378,  942 => 376,  939 => 375,  935 => 374,  929 => 372,  921 => 370,  913 => 368,  911 => 367,  906 => 365,  900 => 362,  897 => 361,  894 => 360,  891 => 359,  883 => 357,  875 => 355,  872 => 354,  869 => 353,  865 => 352,  858 => 348,  853 => 346,  849 => 345,  845 => 344,  841 => 343,  837 => 342,  833 => 341,  829 => 340,  825 => 339,  822 => 338,  820 => 337,  817 => 336,  812 => 334,  807 => 332,  803 => 331,  799 => 330,  795 => 329,  788 => 325,  784 => 324,  780 => 323,  776 => 321,  774 => 320,  767 => 316,  763 => 315,  757 => 313,  751 => 311,  749 => 310,  745 => 309,  741 => 308,  735 => 305,  728 => 300,  721 => 296,  710 => 287,  708 => 286,  705 => 285,  702 => 284,  696 => 281,  689 => 276,  686 => 275,  683 => 274,  681 => 273,  677 => 271,  674 => 270,  668 => 268,  662 => 266,  660 => 265,  655 => 264,  653 => 263,  650 => 262,  644 => 260,  642 => 259,  639 => 258,  633 => 256,  631 => 255,  628 => 254,  622 => 252,  620 => 251,  617 => 250,  614 => 249,  605 => 247,  600 => 246,  598 => 245,  593 => 242,  587 => 239,  583 => 238,  580 => 237,  578 => 236,  575 => 235,  571 => 233,  569 => 232,  566 => 231,  560 => 230,  554 => 228,  551 => 227,  547 => 226,  544 => 225,  538 => 224,  532 => 222,  529 => 221,  525 => 220,  522 => 219,  516 => 218,  510 => 216,  507 => 215,  503 => 214,  500 => 213,  494 => 212,  488 => 210,  482 => 208,  479 => 207,  475 => 206,  472 => 205,  469 => 204,  463 => 203,  457 => 201,  451 => 199,  448 => 198,  443 => 197,  441 => 196,  438 => 195,  432 => 194,  426 => 192,  420 => 190,  417 => 189,  412 => 188,  318 => 96,  311 => 93,  304 => 90,  301 => 89,  298 => 88,  295 => 87,  291 => 85,  287 => 83,  284 => 82,  282 => 81,  279 => 80,  273 => 79,  270 => 78,  264 => 77,  256 => 75,  254 => 74,  251 => 73,  246 => 72,  243 => 71,  239 => 70,  236 => 69,  234 => 68,  231 => 67,  229 => 66,  226 => 65,  220 => 63,  216 => 61,  213 => 60,  209 => 59,  202 => 57,  193 => 54,  188 => 51,  182 => 49,  174 => 47,  171 => 46,  168 => 45,  165 => 44,  162 => 43,  159 => 42,  156 => 41,  152 => 40,  147 => 37,  144 => 36,  141 => 35,  138 => 34,  135 => 33,  132 => 32,  130 => 31,  127 => 30,  123 => 29,  118 => 26,  112 => 24,  104 => 22,  101 => 21,  97 => 20,  91 => 17,  86 => 16,  82 => 15,  75 => 13,  68 => 11,  64 => 2,  61 => 7,  58 => 5,  56 => 4,  49 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/page/page.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/page/page.html.twig");
    }
}
