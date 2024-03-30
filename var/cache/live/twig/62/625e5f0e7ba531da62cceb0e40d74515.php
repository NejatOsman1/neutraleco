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
class __TwigTemplate_6558b4f4764b225d0d775ffed0343984 extends Template
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
        return $this->loadTemplate(((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 2, $this->source); })()), "request", [], "any", false, false, false, 2), "xmlHttpRequest", [], "any", false, false, false, 2)) ? ("@Cms/ajax.html.twig") : ([0 => (("layouts/" . twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 2, $this->source); })()), "layout", [], "any", false, false, false, 2)) . ".html.twig"), 1 => (("layouts/" . twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 2, $this->source); })()), "defaultTemplate", [], "any", false, false, false, 2)) . ".html.twig"), 2 => "layouts/default.html.twig"])), "@Cms/page/page.html.twig", 2);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Cms/page/page.html.twig"));

        // line 4
        if ((twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "CricitalCss", [], "any", true, true, false, 4) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 4, $this->source); })()), "CricitalCss", [], "any", false, false, false, 4)))) {
            // line 5
            $context["deferStylesheets"] = true;
        } else {
            // line 7
            $context["deferStylesheets"] = false;
        }
        // line 2
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 11
    public function block_metadata($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "metadata"));

        $this->loadTemplate("@Cms/page/metadata.html.twig", "@Cms/page/page.html.twig", 11)->display(twig_array_merge($context, ["metatags" => (isset($context["metatags"]) || array_key_exists("metatags", $context) ? $context["metatags"] : (function () { throw new RuntimeError('Variable "metatags" does not exist.', 11, $this->source); })()), "bundle_metatags" => (isset($context["bundle_metatags"]) || array_key_exists("bundle_metatags", $context) ? $context["bundle_metatags"] : (function () { throw new RuntimeError('Variable "bundle_metatags" does not exist.', 11, $this->source); })())]));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 13
    public function block_sitetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "sitetitle"));

        echo twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 13, $this->source); })()), "getLabel", [], "any", false, false, false, 13);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 15
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        // line 16
        echo "\t";
        (((array_key_exists("customTitle", $context) &&  !twig_test_empty((isset($context["customTitle"]) || array_key_exists("customTitle", $context) ? $context["customTitle"] : (function () { throw new RuntimeError('Variable "customTitle" does not exist.', 16, $this->source); })())))) ? (print (twig_escape_filter($this->env, (isset($context["customTitle"]) || array_key_exists("customTitle", $context) ? $context["customTitle"] : (function () { throw new RuntimeError('Variable "customTitle" does not exist.', 16, $this->source); })()), "html", null, true))) : (print ("")));
        echo "
\t";
        // line 17
        echo twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 17, $this->source); })()), "getTitle", [], "any", false, false, false, 17);
        echo "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 20
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "pagetitle"));

        // line 21
        echo "\t";
        if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 21, $this->source); })()), "getInlineEdit", [], "any", false, false, false, 21)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 21, $this->source); })()), "session", [], "any", false, false, false, 21), "get", [0 => "live_edit"], "method", false, false, false, 21) == true))) {
            // line 22
            echo "\t\t<h1 id=\"title-";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 22, $this->source); })()), "getId", [], "any", false, false, false, 22), "html", null, true);
            echo "\" class=\"front-editor\" contenteditable=\"true\">";
            echo twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 22, $this->source); })()), "getTitle", [], "any", false, false, false, 22);
            echo "</h1>
\t";
        } else {
            // line 24
            echo "\t\t<h1>";
            echo twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 24, $this->source); })()), "getTitle", [], "any", false, false, false, 24);
            echo "</h1>
\t";
        }
        // line 26
        echo "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 29
    public function block_plain_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "plain_body"));

        // line 30
        echo "\t";
        if ((array_key_exists("exception", $context) && (twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 30, $this->source); })()), "mode", [], "any", false, false, false, 30) == "dev"))) {
            // line 31
            echo "\t\t";
            echo twig_escape_filter($this->env, twig_var_dump($this->env, $context, ...[0 => (isset($context["exception"]) || array_key_exists("exception", $context) ? $context["exception"] : (function () { throw new RuntimeError('Variable "exception" does not exist.', 31, $this->source); })())]), "html", null, true);
            echo "
\t";
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
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 40
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

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
            if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 46, $this->source); })()), "getInlineEdit", [], "any", false, false, false, 46)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 46, $this->source); })()), "session", [], "any", false, false, false, 46), "get", [0 => "live_edit"], "method", false, false, false, 46) == true))) {
                // line 47
                echo "\t\t\t<div id=\"";
                echo twig_escape_filter($this->env, (( !twig_test_empty((isset($context["content"]) || array_key_exists("content", $context) ? $context["content"] : (function () { throw new RuntimeError('Variable "content" does not exist.', 47, $this->source); })()))) ? (("contentid-" . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["content"]) || array_key_exists("content", $context) ? $context["content"] : (function () { throw new RuntimeError('Variable "content" does not exist.', 47, $this->source); })()), "default", [], "array", false, false, false, 47), "id", [], "any", false, false, false, 47))) : (("pageid-" . twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 47, $this->source); })()), "id", [], "any", false, false, false, 47)))), "html", null, true);
                echo "\" id=\"main-front-editor\" class=\"front-editor\" contenteditable=\"true\">";
                echo (( !twig_test_empty((isset($context["content"]) || array_key_exists("content", $context) ? $context["content"] : (function () { throw new RuntimeError('Variable "content" does not exist.', 47, $this->source); })()))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["content"]) || array_key_exists("content", $context) ? $context["content"] : (function () { throw new RuntimeError('Variable "content" does not exist.', 47, $this->source); })()), "default", [], "array", false, false, false, 47), "content", [], "any", false, false, false, 47)) : (""));
                echo "</div>
\t\t";
            } else {
                // line 49
                echo "\t\t\t";
                echo (( !twig_test_empty((isset($context["content"]) || array_key_exists("content", $context) ? $context["content"] : (function () { throw new RuntimeError('Variable "content" does not exist.', 49, $this->source); })()))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["content"]) || array_key_exists("content", $context) ? $context["content"] : (function () { throw new RuntimeError('Variable "content" does not exist.', 49, $this->source); })()), "default", [], "array", false, false, false, 49), "content", [], "any", false, false, false, 49)) : (""));
                echo "
\t\t";
            }
            // line 51
            echo "\t";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 54
    public function block_pageimage($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "pageimage"));

        if (twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 54, $this->source); })()), "hasImage", [], "any", false, false, false, 54)) {
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 54, $this->source); })()), "getImage", [], "any", false, false, false, 54), "getWebPath", [], "any", false, false, false, 54)), "html", null, true);
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 57
    public function block_head_lang($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "head_lang"));

        echo (((array_key_exists("Settings", $context) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 57, $this->source); })()), "language", [], "any", false, false, false, 57)))) ? ((("lang=\"" . (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 57, $this->source); })()), "language", [], "any", false, false, false, 57), "locale", [], "any", false, false, false, 57) == "gb")) ? ("en") : (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 57, $this->source); })()), "language", [], "any", false, false, false, 57), "locale", [], "any", false, false, false, 57)))) . "\"")) : (""));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 59
    public function block_admin_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_header"));

        // line 60
        echo "\t";
        if (array_key_exists("exception", $context)) {
            // line 61
            echo "\t\t<meta name=\"robots\" content=\"noindex,nofollow\" />
\t";
        } else {
            // line 63
            echo "\t\t<meta name=\"robots\" content=\"";
            echo twig_escape_filter($this->env, (((array_key_exists("Page", $context) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 63, $this->source); })()), "robots", [], "any", false, false, false, 63)))) ? (twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 63, $this->source); })()), "robots", [], "any", false, false, false, 63)) : ((((array_key_exists("Settings", $context) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 63, $this->source); })()), "robots", [], "any", false, false, false, 63)))) ? (twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 63, $this->source); })()), "robots", [], "any", false, false, false, 63)) : ("noindex,nofollow")))), "html", null, true);
            echo "\" />
\t";
        }
        // line 65
        echo "
\t";
        // line 66
        $context["customMetadata"] = $this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getPageBlocksMeta($this->env, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 66, $this->source); })()));
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
        $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) || array_key_exists("languages", $context) ? $context["languages"] : (function () { throw new RuntimeError('Variable "languages" does not exist.', 70, $this->source); })()));
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
                    if ((twig_get_attribute($this->env, $this->source, $context["LanguageSettings"], "host", [], "any", false, false, false, 73) && (twig_get_attribute($this->env, $this->source, $context["LanguageSettings"], "host", [], "any", false, false, false, 73) == twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 73, $this->source); })()), "host", [], "any", false, false, false, 73)))) {
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
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 81, $this->source); })()), "getInlineEdit", [], "any", false, false, false, 81))) {
            // line 82
            echo "\t\t";
            if ((isset($context["deferStylesheets"]) || array_key_exists("deferStylesheets", $context) ? $context["deferStylesheets"] : (function () { throw new RuntimeError('Variable "deferStylesheets" does not exist.', 82, $this->source); })())) {
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
        if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 88, $this->source); })()), "getInlineEdit", [], "any", false, false, false, 88)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 88, $this->source); })()), "session", [], "any", false, false, false, 88), "get", [0 => "live_edit"], "method", false, false, false, 88) == true))) {
            // line 89
            echo "\t\t";
            if ((isset($context["deferStylesheets"]) || array_key_exists("deferStylesheets", $context) ? $context["deferStylesheets"] : (function () { throw new RuntimeError('Variable "deferStylesheets" does not exist.', 89, $this->source); })())) {
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
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 188, $this->source); })()), "getLayoutIncludeCss", [0 => true], "method", false, false, false, 188));
        foreach ($context['_seq'] as $context["_key"] => $context["incl"]) {
            // line 189
            echo "\t\t";
            if ((isset($context["deferStylesheets"]) || array_key_exists("deferStylesheets", $context) ? $context["deferStylesheets"] : (function () { throw new RuntimeError('Variable "deferStylesheets" does not exist.', 189, $this->source); })())) {
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
            $context['_seq'] = twig_ensure_traversable((isset($context["extraPageCss"]) || array_key_exists("extraPageCss", $context) ? $context["extraPageCss"] : (function () { throw new RuntimeError('Variable "extraPageCss" does not exist.', 197, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["incl"]) {
                // line 198
                echo "\t\t";
                if ((isset($context["deferStylesheets"]) || array_key_exists("deferStylesheets", $context) ? $context["deferStylesheets"] : (function () { throw new RuntimeError('Variable "deferStylesheets" does not exist.', 198, $this->source); })())) {
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
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 206, $this->source); })()), "getLayoutIncludeFont", [0 => true], "method", false, false, false, 206));
        foreach ($context['_seq'] as $context["_key"] => $context["incl"]) {
            // line 207
            echo "\t\t";
            if ((isset($context["deferStylesheets"]) || array_key_exists("deferStylesheets", $context) ? $context["deferStylesheets"] : (function () { throw new RuntimeError('Variable "deferStylesheets" does not exist.', 207, $this->source); })())) {
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
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 214, $this->source); })()), "getLayoutIncludeJs", [0 => true], "method", false, false, false, 214));
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
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 220, $this->source); })()), "getLayoutIncludeJs", [0 => true], "method", false, false, false, 220));
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
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 226, $this->source); })()), "getLayoutIncludeJs", [0 => true], "method", false, false, false, 226));
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
        if (twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 232, $this->source); })()), "cookiebar", [], "any", false, false, false, 232)) {
            // line 233
            echo "\t\t<script defer src=\"/bundles/cms/js/avg.min.js\"></script>
\t";
        }
        // line 235
        echo "
    ";
        // line 236
        if (twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 236, $this->source); })()), "hasGoogleRecaptcha", [], "any", false, false, false, 236)) {
            // line 237
            echo "    \t<script>
    \t\tvar googleRecaptchaMode = '";
            // line 238
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 238, $this->source); })()), "googleRecaptchaMode", [], "any", false, false, false, 238), "html", null, true);
            echo "';
    \t\tvar googleRecaptchaSitekey = '";
            // line 239
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 239, $this->source); })()), "googleRecaptchaSitekey", [], "any", false, false, false, 239), "html", null, true);
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
            $context['_seq'] = twig_ensure_traversable((isset($context["extraPageJs"]) || array_key_exists("extraPageJs", $context) ? $context["extraPageJs"] : (function () { throw new RuntimeError('Variable "extraPageJs" does not exist.', 246, $this->source); })()));
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
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 251, $this->source); })()), "googleCc", [], "any", false, false, false, 251))) {
            // line 252
            echo "\t\t<meta name=\"google-site-verification\" content=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 252, $this->source); })()), "googleCc", [], "any", false, false, false, 252), "html", null, true);
            echo "\">
\t";
        }
        // line 254
        echo "
        ";
        // line 255
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 255, $this->source); })()), "faceDomainKey", [], "any", false, false, false, 255))) {
            // line 256
            echo "            <meta name=\"facebook-domain-verification\" content=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 256, $this->source); })()), "faceDomainKey", [], "any", false, false, false, 256), "html", null, true);
            echo "\" />
        ";
        }
        // line 258
        echo "
\t";
        // line 259
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 259, $this->source); })()), "iosAppId", [], "any", false, false, false, 259))) {
            // line 260
            echo "\t\t<meta name=\"apple-itunes-app\" content=\"app-id=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 260, $this->source); })()), "iosAppId", [], "any", false, false, false, 260), "html", null, true);
            echo "\">
\t";
        }
        // line 262
        echo "
\t";
        // line 263
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 263, $this->source); })()), "androidAppId", [], "any", false, false, false, 263))) {
            // line 264
            echo "\t\t<meta name=\"google-play-app\" content=\"app-id=";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 264, $this->source); })()), "androidAppId", [], "any", false, false, false, 264), "html", null, true);
            echo "\">
\t\t";
            // line 265
            if ((isset($context["deferStylesheets"]) || array_key_exists("deferStylesheets", $context) ? $context["deferStylesheets"] : (function () { throw new RuntimeError('Variable "deferStylesheets" does not exist.', 265, $this->source); })())) {
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
        if (twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 273, $this->source); })()), "cookiebar", [], "any", false, false, false, 273)) {
            // line 274
            echo "    ";
        } else {
            // line 275
            echo "\t\t";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 275, $this->source); })()), "googleGtm", [], "any", false, false, false, 275))) {
                // line 276
                echo "\t\t\t<!-- Google Tag Manager -->
\t\t\t<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
\t\t\tnew Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
\t\t\tj=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
\t\t\t'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
\t\t\t})(window,document,'script','dataLayer','";
                // line 281
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 281, $this->source); })()), "googleGtm", [], "any", false, false, false, 281), "html", null, true);
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
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 286, $this->source); })()), "facebookpixel", [], "any", false, false, false, 286))) {
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
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 296, $this->source); })()), "facebookpixel", [], "any", false, false, false, 296), "html", null, true);
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
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 305, $this->source); })()), "company", [], "any", false, false, false, 305), "html", null, true);
        echo "\",
\t\t\t\"address\": {
\t\t\t\t\"@type\": \"PostalAddress\",
\t\t\t\t\"streetAddress\": \"";
        // line 308
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 308, $this->source); })()), "address", [], "any", false, false, false, 308), "html", null, true);
        echo "\",
\t\t\t\t\"addressLocality\": \"";
        // line 309
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 309, $this->source); })()), "place", [], "any", false, false, false, 309), "html", null, true);
        echo "\",
\t\t\t\t";
        // line 310
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 310, $this->source); })()), "state", [], "any", false, false, false, 310))) {
            // line 311
            echo "\t\t\t\t\"addressRegion\": \"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 311, $this->source); })()), "state", [], "any", false, false, false, 311), "html", null, true);
            echo "\",
\t\t\t\t";
        }
        // line 313
        echo "\t\t\t\t\"postalCode\": \"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 313, $this->source); })()), "postalcode", [], "any", false, false, false, 313), "html", null, true);
        echo "\"
\t\t\t},
\t\t\t\"telephone\": \"";
        // line 315
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 315, $this->source); })()), "phone", [], "any", false, false, false, 315), "html", null, true);
        echo "\",
\t\t\t\"email\": \"mailto:";
        // line 316
        echo twig_escape_filter($this->env, twig_trim_filter(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 316, $this->source); })()), "systemEmail", [], "any", false, false, false, 316)), "html", null, true);
        echo "\"
\t\t}
\t\t</script>

\t\t";
        // line 320
        if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 320, $this->source); })()), "getInlineEdit", [], "any", false, false, false, 320)) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 320, $this->source); })()), "session", [], "any", false, false, false, 320), "get", [0 => "live_edit"], "method", false, false, false, 320) == true))) {
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
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 337, $this->source); })()), "androidAppId", [], "any", false, false, false, 337))) {
            // line 338
            echo "\t\t<script>
\t\t\tvar smartBannerMsgTitle = '";
            // line 339
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 339, $this->source); })()), "appLabel", [], "any", false, false, false, 339), "html", null, true);
            echo "';
\t\t\tvar smartBannerMsgAuthor = '";
            // line 340
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 340, $this->source); })()), "company", [], "any", false, false, false, 340), "html", null, true);
            echo "';
\t\t\tvar smartBannerMsgButton = '";
            // line 341
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("BEKIJKEN", [], "", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 341, $this->source); })()), "request", [], "any", false, false, false, 341), "locale", [], "any", false, false, false, 341)), "html", null, true);
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
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 346, $this->source); })()), "getAppIcon", [], "any", false, false, false, 346), "html", null, true);
            echo "';
\t\t</script>
\t\t<script defer src=\"";
            // line 348
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/android-app-banner/banner.js"), "html", null, true);
            echo "\"></script>
\t";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 352
    public function block_admin_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_footer"));

        // line 353
        echo "    ";
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_PREVIOUS_ADMIN")) {
            // line 354
            echo "    \t";
            if (twig_in_filter("admin", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 354, $this->source); })()), "request", [], "any", false, false, false, 354), "attributes", [], "any", false, false, false, 354), "get", [0 => "_route"], "method", false, false, false, 354))) {
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
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 357, $this->source); })()), "request", [], "any", false, false, false, 357), "attributes", [], "any", false, false, false, 357), "get", [0 => "_route"], "method", false, false, false, 357), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 357, $this->source); })()), "request", [], "any", false, false, false, 357), "attributes", [], "any", false, false, false, 357), "get", [0 => "_route_params"], "method", false, false, false, 357)), "html", null, true);
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
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN") && twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 360, $this->source); })()), "getInlineEdit", [], "any", false, false, false, 360))) {
            // line 361
            echo "\t\t<div id=\"admin-sidebar\">
\t\t\t<div class=\"admin-logo\" style=\"background-image:url('";
            // line 362
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 362, $this->source); })()), "getLogo", [], "any", false, false, false, 362), "html", null, true);
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
            if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 367, $this->source); })()), "session", [], "any", false, false, false, 367), "get", [0 => "live_edit"], "method", false, false, false, 367) == true)) {
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
            $context['_seq'] = twig_ensure_traversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 374, $this->source); })()));
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
            if (twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 381, $this->source); })()), "getMaintenance", [], "any", false, false, false, 381)) {
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
            echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 386, $this->source); })()), "request", [], "any", false, false, false, 386), "query", [], "any", false, false, false, 386), "get", [0 => "rev"], "method", false, false, false, 386) && preg_match("/^\\d+\$/", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 386, $this->source); })()), "request", [], "any", false, false, false, 386), "query", [], "any", false, false, false, 386), "get", [0 => "rev"], "method", false, false, false, 386)))) ? ((($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Versie", [], "cms") . " ") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 386, $this->source); })()), "request", [], "any", false, false, false, 386), "query", [], "any", false, false, false, 386), "get", [0 => "rev"], "method", false, false, false, 386))) : ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina versies", [], "cms"))), "html", null, true);
            echo "</a>
\t\t\t\t\t<ul>
\t\t\t\t\t\t";
            // line 388
            $context["initial"] = false;
            // line 389
            echo "\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 389, $this->source); })()), "content", [], "any", false, false, false, 389), 0, 10));
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
                    if ((twig_get_attribute($this->env, $this->source, $context["Content"], "published", [], "any", false, false, false, 395) && ((isset($context["initial"]) || array_key_exists("initial", $context) ? $context["initial"] : (function () { throw new RuntimeError('Variable "initial" does not exist.', 395, $this->source); })()) == false))) {
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
                    if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 404, $this->source); })()), "request", [], "any", false, false, false, 404), "query", [], "any", false, false, false, 404), "get", [0 => "rev"], "method", false, false, false, 404) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 404, $this->source); })()), "request", [], "any", false, false, false, 404), "query", [], "any", false, false, false, 404), "get", [0 => "rev"], "method", false, false, false, 404) == twig_get_attribute($this->env, $this->source, $context["Content"], "revision", [], "any", false, false, false, 404)))) {
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
                    echo twig_escape_filter($this->env, (isset($context["style"]) || array_key_exists("style", $context) ? $context["style"] : (function () { throw new RuntimeError('Variable "style" does not exist.', 408, $this->source); })()), "html", null, true);
                    echo "\"><a href=\"";
                    echo twig_escape_filter($this->env, (isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 408, $this->source); })()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, (isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 408, $this->source); })()), "html", null, true);
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
        if (twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 422, $this->source); })()), "test", [], "any", false, false, false, 422)) {
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
        if (twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 428, $this->source); })()), "cookiebar", [], "any", false, false, false, 428)) {
            // line 429
            echo "\t\t<script>
\t\t\tvar avg_settings = {
\t\t\t\t'gtmCode': '";
            // line 431
            echo (( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 431, $this->source); })()), "googleGtm", [], "any", false, false, false, 431))) ? (twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 431, $this->source); })()), "googleGtm", [], "any", false, false, false, 431)) : (""));
            echo "',
\t\t\t\t'gaCode': '";
            // line 432
            (( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 432, $this->source); })()), "googleUa", [], "any", false, false, false, 432))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 432, $this->source); })()), "googleUa", [], "any", false, false, false, 432), "html", null, true))) : (print ("")));
            echo "',
\t\t\t\t'gCode': '";
            // line 433
            (( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 433, $this->source); })()), "googleG", [], "any", false, false, false, 433))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 433, $this->source); })()), "googleG", [], "any", false, false, false, 433), "html", null, true))) : (print ("")));
            echo "',
\t\t\t\t'lbl_info' : '";
            // line 434
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wij gebruiken cookies om uw gebruikservaring te optimaliseren.", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 434, $this->source); })()), "request", [], "any", false, false, false, 434), "locale", [], "any", false, false, false, 434)), "html", null, true);
            echo "',
\t\t\t\t'lbl_settings_info' : '";
            // line 435
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wij gebruiken cookies om uw gebruikservaring te optimaliseren, het webverkeer te analyseren en gerichte advertenties te kunnen tonen via derde partijen.", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 435, $this->source); })()), "request", [], "any", false, false, false, 435), "locale", [], "any", false, false, false, 435)), "html", null, true);
            echo "</p><p class=\"lbl-info-more\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Als u akkoord gaat met ons gebruik van cookies, klikt u op \"Alle cookies toestaan\". Geef hieronder aan welke opties u wilt toestaan tijdens het gebruik van deze website.", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 435, $this->source); })()), "request", [], "any", false, false, false, 435), "locale", [], "any", false, false, false, 435)), "html", null, true);
            echo "',

\t\t\t\t'lbl_essential' : '";
            // line 437
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Essentieel", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 437, $this->source); })()), "request", [], "any", false, false, false, 437), "locale", [], "any", false, false, false, 437)), "html", null, true);
            echo "',
\t\t\t\t'lbl_preferences' : '";
            // line 438
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Voorkeuren", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 438, $this->source); })()), "request", [], "any", false, false, false, 438), "locale", [], "any", false, false, false, 438)), "html", null, true);
            echo "',
\t\t\t\t'lbl_statistics' : '";
            // line 439
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Statistieken", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 439, $this->source); })()), "request", [], "any", false, false, false, 439), "locale", [], "any", false, false, false, 439)), "html", null, true);
            echo "',
\t\t\t\t'lbl_marketing' : '";
            // line 440
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Marketing", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 440, $this->source); })()), "request", [], "any", false, false, false, 440), "locale", [], "any", false, false, false, 440)), "html", null, true);
            echo "',

\t\t\t\t'lbl_tooltip_essential' : '";
            // line 442
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Noodzakelijke cookies helpen een website bruikbaarder te maken, door basisfuncties als paginanavigatie en toegang tot beveiligde gedeelten van de website mogelijk te maken. Zonder deze cookies kan de website niet naar behoren werken.", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 442, $this->source); })()), "request", [], "any", false, false, false, 442), "locale", [], "any", false, false, false, 442)), "html", null, true);
            echo "',
\t\t\t\t'lbl_tooltip_preferences' : '";
            // line 443
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Voorkeurscookies zorgen ervoor dat een website informatie kan onthouden die van invloed is op het gedrag en de vormgeving van de website, zoals de taal van uw voorkeur of de regio waar u woont.", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 443, $this->source); })()), "request", [], "any", false, false, false, 443), "locale", [], "any", false, false, false, 443)), "html", null, true);
            echo "',
\t\t\t\t'lbl_tooltip_statistics' : '";
            // line 444
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Statistische cookies helpen eigenaren van websites begrijpen hoe bezoekers hun website gebruiken, door anoniem gegevens te verzamelen en te rapporteren.", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 444, $this->source); })()), "request", [], "any", false, false, false, 444), "locale", [], "any", false, false, false, 444)), "html", null, true);
            echo "',
\t\t\t\t'lbl_tooltip_marketing' : '";
            // line 445
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Marketingcookies worden gebruikt om bezoekers te volgen wanneer ze verschillende websites bezoeken. Hun doel is advertenties weergeven die zijn toegesneden op en relevant zijn voor de individuele gebruiker.", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 445, $this->source); })()), "request", [], "any", false, false, false, 445), "locale", [], "any", false, false, false, 445)), "html", null, true);
            echo "',

\t\t\t\t'lbl_back' : '";
            // line 447
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Terug", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 447, $this->source); })()), "request", [], "any", false, false, false, 447), "locale", [], "any", false, false, false, 447)), "html", null, true);
            echo "',
\t\t\t\t'lbl_settings' : '";
            // line 448
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Instellingen", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 448, $this->source); })()), "request", [], "any", false, false, false, 448), "locale", [], "any", false, false, false, 448)), "html", null, true);
            echo "',
\t\t\t\t'lbl_accept' : '";
            // line 449
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Alle cookies toestaan", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 449, $this->source); })()), "request", [], "any", false, false, false, 449), "locale", [], "any", false, false, false, 449)), "html", null, true);
            echo "',
\t\t\t\t'lbl_save' : '";
            // line 450
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Accepteren en sluiten", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 450, $this->source); })()), "request", [], "any", false, false, false, 450), "locale", [], "any", false, false, false, 450)), "html", null, true);
            echo "',
\t\t\t\t'lbl_btn_reset' : '";
            // line 451
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cookie instellingen", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 451, $this->source); })()), "request", [], "any", false, false, false, 451), "locale", [], "any", false, false, false, 451)), "html", null, true);
            echo "',

\t\t\t\t'link_cookie' : ";
            // line 453
            echo (( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 453, $this->source); })()), "avgCookie", [], "any", false, false, false, 453))) ? ((("'" . twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 453, $this->source); })()), "avgCookie", [], "any", false, false, false, 453)) . "'")) : ("null"));
            echo ",
\t\t\t\t'link_privacy' : ";
            // line 454
            echo (( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 454, $this->source); })()), "avgPrivacy", [], "any", false, false, false, 454))) ? ((("'" . twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 454, $this->source); })()), "avgPrivacy", [], "any", false, false, false, 454)) . "'")) : ("null"));
            echo ",
\t\t\t\t'link_disclaimer' : ";
            // line 455
            echo (( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 455, $this->source); })()), "avgDisclaimer", [], "any", false, false, false, 455))) ? ((("'" . twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 455, $this->source); })()), "avgDisclaimer", [], "any", false, false, false, 455)) . "'")) : ("null"));
            echo ",

\t\t\t\t'lbl_cookie_btn' : '";
            // line 457
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cookie informatie", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 457, $this->source); })()), "request", [], "any", false, false, false, 457), "locale", [], "any", false, false, false, 457)), "html", null, true);
            echo "',
\t\t\t\t'lbl_privacy_btn' : '";
            // line 458
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Privacy statement", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 458, $this->source); })()), "request", [], "any", false, false, false, 458), "locale", [], "any", false, false, false, 458)), "html", null, true);
            echo "',
\t\t\t\t'lbl_disclaimer_btn' : '";
            // line 459
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Disclaimer", [], "cookiebar", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 459, $this->source); })()), "request", [], "any", false, false, false, 459), "locale", [], "any", false, false, false, 459)), "html", null, true);
            echo "',

\t\t\t\t'reset_btn' : ";
            // line 461
            echo ((twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 461, $this->source); })()), "cookiebarButton", [], "any", false, false, false, 461)) ? ("true") : ("false"));
            echo ",
\t\t\t\t'reset_btn_position' : '";
            // line 462
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 462, $this->source); })()), "cookiebarButtonPosition", [], "any", false, false, false, 462), "html", null, true);
            echo "',
\t\t\t\t'reset_btn_offset_right' : '";
            // line 463
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 463, $this->source); })()), "cookiebarButtonOffset", [], "any", false, false, false, 463), "html", null, true);
            echo "',
\t\t\t};
\t\t</script>
\t";
        } else {
            // line 467
            echo "\t\t";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 467, $this->source); })()), "googleUa", [], "any", false, false, false, 467))) {
                // line 468
                echo "\t\t\t<!-- Google Analytics -->
\t\t\t<script>
\t\t\t(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
\t\t\t\t(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
\t\t\t\tm=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
\t\t\t\t})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

\t\t\t\tga('create', '";
                // line 475
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 475, $this->source); })()), "googleUa", [], "any", false, false, false, 475), "html", null, true);
                echo "', 'auto');
\t\t\t\tga('send', 'pageview');
\t\t\t</script>
\t\t\t<!-- End Google Analytics -->
\t\t";
            }
            // line 480
            echo "\t\t";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 480, $this->source); })()), "googleGtm", [], "any", false, false, false, 480))) {
                // line 481
                echo "\t\t\t<!-- Google Tag Manager (noscript) -->
\t\t\t<noscript><iframe data-src=\"https://www.googletagmanager.com/ns.html?id=";
                // line 482
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 482, $this->source); })()), "googleGtm", [], "any", false, false, false, 482), "html", null, true);
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
        if (twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 488, $this->source); })()), "tplInject", [], "any", false, false, false, 488)) {
            // line 489
            echo "\t\t";
            echo twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 489, $this->source); })()), "tplInject", [], "any", false, false, false, 489);
            echo "
\t";
        }
        // line 491
        echo "
\t";
        // line 492
        if (((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 492, $this->source); })()), "request", [], "any", false, false, false, 492), "get", [0 => "timer"], "method", false, false, false, 492) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 492, $this->source); })()), "request", [], "any", false, false, false, 492), "get", [0 => "timer"], "method", false, false, false, 492) == 2)) && array_key_exists("timer_result", $context))) {
            // line 493
            echo "\t\t<div class=\"easify_timer\" style=\"padding: 50px;\">
\t\t\t<strong>TIMER:</strong>

\t\t\t";
            // line 496
            echo (isset($context["timer_result"]) || array_key_exists("timer_result", $context) ? $context["timer_result"] : (function () { throw new RuntimeError('Variable "timer_result" does not exist.', 496, $this->source); })());
            echo "
\t\t</div>
\t";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 501
    public function block_footer1($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer1"));

        echo twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 501, $this->source); })()), "footerBlock1", [], "any", false, false, false, 501);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 502
    public function block_footer2($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer2"));

        echo twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 502, $this->source); })()), "footerBlock2", [], "any", false, false, false, 502);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 503
    public function block_footer3($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer3"));

        echo twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 503, $this->source); })()), "footerBlock3", [], "any", false, false, false, 503);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 504
    public function block_footer4($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer4"));

        echo twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 504, $this->source); })()), "footerBlock4", [], "any", false, false, false, 504);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 505
    public function block_footer5($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer5"));

        echo twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 505, $this->source); })()), "footerBlock5", [], "any", false, false, false, 505);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

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
        return array (  1404 => 505,  1391 => 504,  1378 => 503,  1365 => 502,  1352 => 501,  1341 => 496,  1336 => 493,  1334 => 492,  1331 => 491,  1325 => 489,  1323 => 488,  1320 => 487,  1317 => 486,  1310 => 482,  1307 => 481,  1304 => 480,  1296 => 475,  1287 => 468,  1284 => 467,  1277 => 463,  1273 => 462,  1269 => 461,  1264 => 459,  1260 => 458,  1256 => 457,  1251 => 455,  1247 => 454,  1243 => 453,  1238 => 451,  1234 => 450,  1230 => 449,  1226 => 448,  1222 => 447,  1217 => 445,  1213 => 444,  1209 => 443,  1205 => 442,  1200 => 440,  1196 => 439,  1192 => 438,  1188 => 437,  1181 => 435,  1177 => 434,  1173 => 433,  1169 => 432,  1165 => 431,  1161 => 429,  1159 => 428,  1156 => 427,  1148 => 424,  1145 => 423,  1143 => 422,  1140 => 421,  1136 => 419,  1130 => 415,  1126 => 414,  1121 => 411,  1115 => 410,  1104 => 408,  1101 => 407,  1098 => 406,  1095 => 405,  1093 => 404,  1090 => 403,  1087 => 402,  1084 => 401,  1081 => 400,  1078 => 399,  1075 => 398,  1072 => 397,  1069 => 396,  1067 => 395,  1064 => 394,  1061 => 393,  1058 => 392,  1055 => 391,  1052 => 390,  1047 => 389,  1045 => 388,  1039 => 386,  1033 => 383,  1030 => 382,  1028 => 381,  1024 => 379,  1018 => 378,  1006 => 376,  1003 => 375,  999 => 374,  993 => 372,  985 => 370,  977 => 368,  975 => 367,  970 => 365,  964 => 362,  961 => 361,  958 => 360,  955 => 359,  947 => 357,  939 => 355,  936 => 354,  933 => 353,  926 => 352,  916 => 348,  911 => 346,  907 => 345,  903 => 344,  899 => 343,  895 => 342,  891 => 341,  887 => 340,  883 => 339,  880 => 338,  878 => 337,  875 => 336,  870 => 334,  865 => 332,  861 => 331,  857 => 330,  853 => 329,  846 => 325,  842 => 324,  838 => 323,  834 => 321,  832 => 320,  825 => 316,  821 => 315,  815 => 313,  809 => 311,  807 => 310,  803 => 309,  799 => 308,  793 => 305,  786 => 300,  779 => 296,  768 => 287,  766 => 286,  763 => 285,  760 => 284,  754 => 281,  747 => 276,  744 => 275,  741 => 274,  739 => 273,  735 => 271,  732 => 270,  726 => 268,  720 => 266,  718 => 265,  713 => 264,  711 => 263,  708 => 262,  702 => 260,  700 => 259,  697 => 258,  691 => 256,  689 => 255,  686 => 254,  680 => 252,  678 => 251,  675 => 250,  672 => 249,  663 => 247,  658 => 246,  656 => 245,  651 => 242,  645 => 239,  641 => 238,  638 => 237,  636 => 236,  633 => 235,  629 => 233,  627 => 232,  624 => 231,  618 => 230,  612 => 228,  609 => 227,  605 => 226,  602 => 225,  596 => 224,  590 => 222,  587 => 221,  583 => 220,  580 => 219,  574 => 218,  568 => 216,  565 => 215,  561 => 214,  558 => 213,  552 => 212,  546 => 210,  540 => 208,  537 => 207,  533 => 206,  530 => 205,  527 => 204,  521 => 203,  515 => 201,  509 => 199,  506 => 198,  501 => 197,  499 => 196,  496 => 195,  490 => 194,  484 => 192,  478 => 190,  475 => 189,  470 => 188,  376 => 96,  369 => 93,  362 => 90,  359 => 89,  356 => 88,  353 => 87,  349 => 85,  345 => 83,  342 => 82,  340 => 81,  337 => 80,  331 => 79,  328 => 78,  322 => 77,  314 => 75,  312 => 74,  309 => 73,  304 => 72,  301 => 71,  297 => 70,  294 => 69,  292 => 68,  289 => 67,  287 => 66,  284 => 65,  278 => 63,  274 => 61,  271 => 60,  264 => 59,  251 => 57,  236 => 54,  228 => 51,  222 => 49,  214 => 47,  211 => 46,  208 => 45,  205 => 44,  202 => 43,  199 => 42,  196 => 41,  189 => 40,  181 => 37,  178 => 36,  175 => 35,  172 => 34,  169 => 33,  163 => 31,  160 => 30,  153 => 29,  145 => 26,  139 => 24,  131 => 22,  128 => 21,  121 => 20,  112 => 17,  107 => 16,  100 => 15,  87 => 13,  74 => 11,  67 => 2,  64 => 7,  61 => 5,  59 => 4,  49 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("
{% extends (app.request.xmlHttpRequest ? '@Cms/ajax.html.twig' : ['layouts/' ~ Page.layout ~ '.html.twig', 'layouts/' ~ Settings.defaultTemplate ~ '.html.twig', 'layouts/default.html.twig']) %}

{% if Page.CricitalCss is defined and Page.CricitalCss is not empty %}
\t{% set deferStylesheets = true %}
{% else %}
\t{% set deferStylesheets = false %}
{% endif %}

{% trans_default_domain 'cms' %}
{% block metadata %}{% include \"@Cms/page/metadata.html.twig\" with {'metatags': metatags, 'bundle_metatags': bundle_metatags} %}{% endblock %}

{% block sitetitle %}{{Settings.getLabel|raw}}{% endblock %}

{% block title %}
\t{{customTitle is defined and customTitle is not empty ? customTitle : ''}}
\t{{Page.getTitle|raw}}
{% endblock %}

{% block pagetitle %}
\t{% if is_granted('ROLE_ADMIN') and Settings.getInlineEdit and app.session.get('live_edit') == true %}
\t\t<h1 id=\"title-{{Page.getId}}\" class=\"front-editor\" contenteditable=\"true\">{{Page.getTitle|raw}}</h1>
\t{% else %}
\t\t<h1>{{Page.getTitle|raw}}</h1>
\t{% endif %}

{% endblock %}

{% block plain_body %}
\t{% if exception is defined and Page.mode == \"dev\" %}
\t\t{{dump(exception)}}
\t{% endif %}
\t{% if loginform is defined %}
\t\t{% include ['layouts/login.html.twig', '@Cms/page/login.html.twig'] %}
\t{% elseif pwdform is defined %}
\t\t{% include ['layouts/password.html.twig', '@Cms/page/password.html.twig'] %}
\t{% endif %}
{% endblock %}

{% block body %}
\t{% if loginform is defined %}
\t\t{% include ['layouts/login.html.twig', '@Cms/page/login.html.twig'] %}
\t{% elseif pwdform is defined %}
\t\t{% include ['layouts/password.html.twig', '@Cms/page/password.html.twig'] %}
\t{% else %}
\t\t{% if is_granted('ROLE_ADMIN') and Settings.getInlineEdit and app.session.get('live_edit') == true %}
\t\t\t<div id=\"{{content is not empty ? 'contentid-' ~ content['default'].id : 'pageid-' ~ Page.id}}\" id=\"main-front-editor\" class=\"front-editor\" contenteditable=\"true\">{{content is not empty ? content['default'].content|raw : ''}}</div>
\t\t{% else %}
\t\t\t{{content is not empty ? content['default'].content|raw : ''}}
\t\t{% endif %}
\t{% endif %}
{% endblock %}

{% block pageimage %}{% if Page.hasImage %}{{asset(Page.getImage.getWebPath)}}{% endif %}{% endblock %}

{# {% block head_lang %}{{(Settings is defined and Settings.language is not empty ? 'lang=\"' ~ Settings.language.localeFull ~ '\"' : '')|raw}}{% endblock %} #}
{% block head_lang %}{{(Settings is defined and Settings.language is not empty ? 'lang=\"' ~ (Settings.language.locale == 'gb' ? 'en' : Settings.language.locale) ~ '\"' : '')|raw}}{% endblock %}

{% block admin_header %}
\t{% if exception is defined %}
\t\t<meta name=\"robots\" content=\"noindex,nofollow\" />
\t{% else %}
\t\t<meta name=\"robots\" content=\"{{(Page is defined and Page.robots is not empty ? Page.robots : (Settings is defined and Settings.robots is not empty ? Settings.robots : 'noindex,nofollow'))}}\" />
\t{% endif %}

\t{% set customMetadata = pageblocks_meta(Page) %}

\t{% include \"@Cms/page/metadata.html.twig\" %}

\t{% for Language in languages %}
\t\t{% if Language.settings %}
\t\t\t{% for LanguageSettings in Language.settings %}
\t\t\t\t{% if LanguageSettings.host and LanguageSettings.host == Settings.host %}
\t\t\t\t\t{# <link rel=\"alternate\" href=\"{{ (LanguageSettings.forceHttps ? 'https' : 'http') ~ '://' ~ LanguageSettings.host ~ LanguageSettings.baseUri }}\" hreflang=\"{{Language.localeFull|replace({'_' : '-'})}}\" /> #}
\t\t\t\t\t<link rel=\"alternate\" href=\"{{ (LanguageSettings.forceHttps ? 'https' : 'http') ~ '://' ~ LanguageSettings.host ~ LanguageSettings.baseUri }}\" hreflang=\"{{Language.locale == 'gb' ? 'en' : Language.locale}}\" />
\t\t\t\t{% endif %}
\t\t\t{% endfor %}
\t\t{% endif %}
\t{% endfor %}

\t{% if is_granted('ROLE_ADMIN') and Settings.getInlineEdit %}
\t\t{% if deferStylesheets %}
\t\t\t<link rel=\"preload\" href=\"/bundles/cms/css/frontinject.css\" as=\"style\" onload=\"this.onload=null;this.rel='stylesheet';\">
\t\t{% else %}
\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/css/frontinject.css\">
\t\t{% endif %}
\t{% endif %}
\t{% if is_granted('ROLE_ADMIN') and Settings.getInlineEdit and app.session.get('live_edit') == true %}
\t\t{% if deferStylesheets %}
\t\t\t<link rel=\"preload\" href=\"{{asset('bundles/cms/css/font-awesome.min.css')}}\" as=\"style\" onload=\"this.onload=null;this.rel='stylesheet';\" />
\t\t\t<link rel=\"preload\" href=\"/bundles/cms/css/jquery.cpop.css\" as=\"style\" onload=\"this.onload=null;this.rel='stylesheet';\" />
\t\t{% else %}
\t\t\t<link rel=\"stylesheet\" href=\"{{asset('bundles/cms/css/font-awesome.min.css')}}\">
\t\t\t<link rel=\"stylesheet\" href=\"/bundles/cms/css/jquery.cpop.css\">
\t\t{% endif %}
\t\t<style type=\"text/css\">
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
\t{% endif %}
\t{% for incl in Settings.getLayoutIncludeCss(true) %}
\t\t{% if deferStylesheets %}
\t\t\t<link rel=\"preload\" href=\"{{incl}}?v=12\" as=\"style\" onload=\"this.onload=null;this.rel='stylesheet';\">
\t\t{% else %}
\t\t\t<link rel=\"stylesheet\" href=\"{{incl}}?v=12\">
\t\t{% endif %}
\t{% endfor %}

\t{% if extraPageCss is defined %}
\t{% for incl in extraPageCss %}
\t\t{% if deferStylesheets %}
\t\t\t<link rel=\"preload\" href=\"{{incl}}?v=12\" as=\"style\" onload=\"this.onload=null; this.rel='stylesheet'\">
\t\t{% else %}
\t\t\t<link rel=\"stylesheet\" href=\"{{incl}}?v=12\">
\t\t{% endif %}
\t{% endfor %}
\t{% endif %}

\t{% for incl in Settings.getLayoutIncludeFont(true) %}
\t\t{% if deferStylesheets %}
\t\t\t<link rel=\"preload\" href=\"{{incl}}?v=12\" as=\"style\" onload=\"this.onload=null;this.rel='stylesheet';\">
\t\t{% else %}
\t\t\t<link rel=\"stylesheet\" href=\"{{incl}}?v=12\">
\t\t{% endif %}
\t{% endfor %}

\t{% for incl in Settings.getLayoutIncludeJs(true) %}
\t\t{% if incl matches '/jquery-\\\\d.*\\.min\\.js/' %}
\t\t<script defer type=\"text/javascript\" src=\"{{incl}}?v=12\"></script>
\t\t{% endif %}
\t{% endfor %}

\t{% for incl in Settings.getLayoutIncludeJs(true) %}
\t\t{% if incl matches '{popper}' %}
\t\t\t<script defer type=\"text/javascript\" src=\"{{incl}}?v=12\"></script>
\t\t{% endif %}
\t{% endfor %}

\t{% for incl in Settings.getLayoutIncludeJs(true) %}
\t\t{% if not (incl matches '/jquery-\\\\d.*\\.min\\.js/') and not (incl matches '{popper}') %}
\t\t\t<script defer type=\"text/javascript\" src=\"{{incl}}?v=12\"></script>
\t\t{% endif %}
\t{% endfor %}

\t{% if Settings.cookiebar %}
\t\t<script defer src=\"/bundles/cms/js/avg.min.js\"></script>
\t{% endif %}

    {% if Settings.hasGoogleRecaptcha %}
    \t<script>
    \t\tvar googleRecaptchaMode = '{{ Settings.googleRecaptchaMode }}';
    \t\tvar googleRecaptchaSitekey = '{{ Settings.googleRecaptchaSitekey }}';
    \t</script>
    {% endif %}

\t<script defer src=\"/bundles/cms/js/frontend_common.js\"></script>

    {% if extraPageJs is defined %}
\t{% for incl in extraPageJs %}
\t\t<script defer type=\"text/javascript\" src=\"{{incl}}\"></script>
\t{% endfor %}
\t{% endif %}

\t{% if Settings.googleCc is not empty %}
\t\t<meta name=\"google-site-verification\" content=\"{{Settings.googleCc}}\">
\t{% endif %}

        {% if Settings.faceDomainKey is not empty %}
            <meta name=\"facebook-domain-verification\" content=\"{{ Settings.faceDomainKey }}\" />
        {% endif %}

\t{% if Settings.iosAppId is not empty %}
\t\t<meta name=\"apple-itunes-app\" content=\"app-id={{Settings.iosAppId}}\">
\t{% endif %}

\t{% if Settings.androidAppId is not empty %}
\t\t<meta name=\"google-play-app\" content=\"app-id={{Settings.androidAppId}}\">
\t\t{% if deferStylesheets %}
\t\t\t<link rel=\"preload\" href=\"{{asset('bundles/cms/android-app-banner/banner.css')}}\" as=\"style\" onload=\"this.onload=null;this.rel='stylesheet';\" />
\t\t{% else %}
\t\t\t<link rel=\"stylesheet\" href=\"{{asset('bundles/cms/android-app-banner/banner.css')}}\" />
\t\t{% endif %}
\t{% endif %}


    {% if Settings.cookiebar %}
    {% else %}
\t\t{% if Settings.googleGtm is not empty %}
\t\t\t<!-- Google Tag Manager -->
\t\t\t<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
\t\t\tnew Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
\t\t\tj=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
\t\t\t'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
\t\t\t})(window,document,'script','dataLayer','{{Settings.googleGtm}}');</script>
\t\t\t<!-- End Google Tag Manager -->
\t\t{% endif %}
\t{% endif %}

\t{% if Settings.facebookpixel is not empty %}
\t\t<script>
\t\t!function(f,b,e,v,n,t,s)
\t\t{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
\t\tn.callMethod.apply(n,arguments):n.queue.push(arguments)};
\t\tif(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
\t\tn.queue=[];t=b.createElement(e);t.async=!0;
\t\tt.src=v;s=b.getElementsByTagName(e)[0];
\t\ts.parentNode.insertBefore(t,s)}(window, document,'script',
\t\t'https://connect.facebook.net/en_US/fbevents.js');
\t\tfbq('init', '{{Settings.facebookpixel}}');
\t\tfbq('track', 'PageView');
\t\t</script>
\t{% endif %}

\t\t<script type=\"application/ld+json\">
\t\t{
\t\t\t\"@context\": \"http://schema.org/\",
\t\t\t\"@type\": \"Organization\",
\t\t\t\"name\": \"{{Settings.company}}\",
\t\t\t\"address\": {
\t\t\t\t\"@type\": \"PostalAddress\",
\t\t\t\t\"streetAddress\": \"{{Settings.address}}\",
\t\t\t\t\"addressLocality\": \"{{Settings.place}}\",
\t\t\t\t{% if Settings.state is not empty %}
\t\t\t\t\"addressRegion\": \"{{Settings.state}}\",
\t\t\t\t{% endif %}
\t\t\t\t\"postalCode\": \"{{Settings.postalcode}}\"
\t\t\t},
\t\t\t\"telephone\": \"{{Settings.phone}}\",
\t\t\t\"email\": \"mailto:{{Settings.systemEmail|trim}}\"
\t\t}
\t\t</script>

\t\t{% if is_granted('ROLE_ADMIN') and Settings.getInlineEdit and app.session.get('live_edit') == true %}
\t\t\t<script type=\"text/javascript\">
\t\t\t\tvar frontendEdit = true;
\t\t\t\tvar ckAdminJsonUrl = '{{path('_adminjson')}}';
\t\t\t\tvar ckAdminPageUrl = '{{path('admin_page_selector')}}';
\t\t\t\tvar ckAdminMediaUrl = '{{path('admin_media', {type: 'image'})}}';
\t\t\t\tvar ckDropUploadUrl = '';
\t\t\t</script>

\t\t\t<script defer src=\"{{asset('bundles/cms/ckeditor/ckeditor.js')}}\"></script>
\t\t\t<script defer src=\"{{asset('bundles/cms/jquery-match-height/dist/jquery.matchHeight-min.js')}}\"></script>
\t\t\t<script defer src=\"{{asset('bundles/cms/jquery-ui-1.11.4.custom/jquery-ui.js')}}\"></script>
\t\t\t<script defer src=\"{{ asset('bundles/cms/js/jquery.cpop.js') }}\"></script>

\t\t\t<script defer src=\" {{ asset('bundles/cms/js/frontend.js') }}\"></script>
\t\t{% endif %}

\t\t{% if Settings.androidAppId is not empty %}
\t\t<script>
\t\t\tvar smartBannerMsgTitle = '{{Settings.appLabel}}';
\t\t\tvar smartBannerMsgAuthor = '{{Settings.company}}';
\t\t\tvar smartBannerMsgButton = '{{ 'BEKIJKEN' | trans({}, '', app.request.locale) }}';
\t\t\tvar smartBannerMsgIos = '{{ 'In de App Store' | trans }}';
\t\t\tvar smartBannerMsgAndroid = '{{ 'In Google Play' | trans }}';
\t\t\tvar smartBannerMsgWindows = '{{ 'In Windows store' | trans }}';
\t\t\tvar smartBannerMsgPrice = '{{ 'GRATIS' | trans }}';
\t\t\tvar smartBannerMsgIcon = '{{Settings.getAppIcon}}';
\t\t</script>
\t\t<script defer src=\"{{asset('bundles/cms/android-app-banner/banner.js')}}\"></script>
\t{% endif %}
{% endblock %}

{% block admin_footer %}
    {% if is_granted('ROLE_PREVIOUS_ADMIN') %}
    \t{% if 'admin' in app.request.attributes.get('_route') %}
    \t\t<a style=\"position:fixed;bottom:30px;right: 30px;z-index: 1000;\" class=\"btn\" href=\"{{path('admin_users')}}?_switch_user=_exit\"><i class=\"fa fa-lock\"></i> {{ 'Exit impersonation' | trans }}</a>
    \t{% else %}
    \t\t<a style=\"position:fixed;bottom:30px;right: 30px;z-index: 1000;\" class=\"btn\" href=\"{{path(app.request.attributes.get('_route'), app.request.attributes.get('_route_params'))}}?_switch_user=_exit\"><i class=\"fa fa-lock\"></i> {{ 'Exit impersonation' | trans }}</a>
    \t{% endif %}
    {% endif %}
\t{% if is_granted('ROLE_ADMIN') and Settings.getInlineEdit %}
\t\t<div id=\"admin-sidebar\">
\t\t\t<div class=\"admin-logo\" style=\"background-image:url('{{Settings.getLogo}}');\"></div>
\t\t\t<ul>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"{{path('admin')}}\">Admin</a>
\t\t\t\t</li>
\t\t\t\t{% if app.session.get('live_edit') == true %}
\t\t\t\t\t<li><a style=\"background: #4F805D;\" href=\"?live_edit=0\">{{ 'Live bewerken:' | trans }} <span class=\"value\">{{ 'AAN' | trans }}</span></a></li>
\t\t\t\t{% else %}
\t\t\t\t\t<li><a href=\"?live_edit=1\">{{ 'Live bewerken:' | trans }} <span class=\"value\">{{ 'UIT' | trans }}</span></a></li>
\t\t\t\t{% endif %}
\t\t\t\t<li><a>{{ 'Gebruiker wisselen' | trans }}</a>
\t\t\t\t\t<ul>
\t\t\t\t\t\t{% for User in users %}
\t\t\t\t\t\t\t{% if User.id > 1 %}
\t\t\t\t\t\t\t\t<li><a href=\"?_switch_user={{User.username}}\">{{User.getName}}<span>{{User.username}} | <span class=\"orange-text\">{{User.roles|join(', ')}}</span></span></a></li>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t{% if Settings.getMaintenance %}
\t\t\t\t\t<li>
\t\t\t\t\t\t<a style=\"background:#A46A1F;\">{{ 'Maintainance mode is actief' | trans }}</a>
\t\t\t\t\t</li>
\t\t\t\t{% endif %}
\t\t\t\t<li><a>{{(app.request.query.get(\"rev\") and app.request.query.get(\"rev\") matches '/^\\\\d+\$/' ? ('Versie' | trans) ~ ' ' ~ app.request.query.get(\"rev\") : ('Pagina versies' | trans))}}</a>
\t\t\t\t\t<ul>
\t\t\t\t\t\t{% set initial = false %}
\t\t\t\t\t\t{% for Content in Page.content[0:10] %}
\t\t\t\t\t\t\t{% if Content.name == 'default' %}
\t\t\t\t\t\t\t{% set url = '?rev=' ~ Content.revision %}
\t\t\t\t\t\t\t{% set label = (Content.revision == 0 ? ('Initiële versie' | trans) : ('Versie' | trans) ~ ' ' ~ Content.revision ) %}
\t\t\t\t\t\t\t{% set style = '' %}

\t\t\t\t\t\t\t{% if Content.published and initial == false %}
\t\t\t\t\t\t\t\t{% set initial = true %}
\t\t\t\t\t\t\t\t{% set label = ('Actuele versie' | trans) %}
\t\t\t\t\t\t\t\t{% set style = 'green darken-1' %}
\t\t\t\t\t\t\t{% elseif Content.published == false %}
\t\t\t\t\t\t\t\t{% set label = ('Versie' | trans) ~ ' ' ~ Content.revision ~ ' ' ~ ('(Niet gepubliceerd)' | trans ) %}
\t\t\t\t\t\t\t\t{% set style = 'orange darken-2' %}
\t\t\t\t\t\t\t{% endif %}

\t\t\t\t\t\t\t{% if app.request.query.get(\"rev\") and app.request.query.get(\"rev\") == Content.revision %}
\t\t\t\t\t\t\t\t{% set style = 'grey darken-2' %}
\t\t\t\t\t\t\t{% endif %}

\t\t\t\t\t\t\t<li class=\"{{style}}\"><a href=\"{{url}}\">{{label}}<span>{{Content.created|date('d-m-Y H:i')}}</span></a></li>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t</ul>
\t\t\t\t</li>
\t\t\t\t<li style=\"float:right;display: none;\" id=\"fe-buttons\">
\t\t\t\t\t<button id=\"fe-restore\" type=\"button\">{{ 'Restore' | trans }}</button>
\t\t\t\t\t<button id=\"fe-save\" type=\"button\">{{ 'Save' | trans }}</button>
\t\t\t\t</li>
\t\t\t</ul>
\t\t\t{# <a class=\"pull\">&raquo;</a> #}
\t\t</div>
\t{% endif %}

\t{% if Settings.test %}
\t\t<div class=\"test-mode-badge-wrapper\">
\t\t\t<div class=\"test-mode-badge\" title=\"{{ 'Test mode staat aan, configureer in website instellingen.' | trans }}\"><i class=\"fa fa-exclamation-triangle\"></i> {{ 'TEST MODE' | trans }}</div>
\t\t</div>
\t{% endif %}

\t{% if Settings.cookiebar %}
\t\t<script>
\t\t\tvar avg_settings = {
\t\t\t\t'gtmCode': '{{Settings.googleGtm is not empty ? Settings.googleGtm|raw : ''}}',
\t\t\t\t'gaCode': '{{Settings.googleUa is not empty ? Settings.googleUa : ''}}',
\t\t\t\t'gCode': '{{Settings.googleG is not empty ? Settings.googleG : ''}}',
\t\t\t\t'lbl_info' : '{{'Wij gebruiken cookies om uw gebruikservaring te optimaliseren.'|trans({},'cookiebar', app.request.locale)}}',
\t\t\t\t'lbl_settings_info' : '{{'Wij gebruiken cookies om uw gebruikservaring te optimaliseren, het webverkeer te analyseren en gerichte advertenties te kunnen tonen via derde partijen.'|trans({},'cookiebar', app.request.locale)}}</p><p class=\"lbl-info-more\">{{'Als u akkoord gaat met ons gebruik van cookies, klikt u op \"Alle cookies toestaan\". Geef hieronder aan welke opties u wilt toestaan tijdens het gebruik van deze website.'|trans({},'cookiebar', app.request.locale)}}',

\t\t\t\t'lbl_essential' : '{{'Essentieel'|trans({},'cookiebar', app.request.locale)}}',
\t\t\t\t'lbl_preferences' : '{{'Voorkeuren'|trans({},'cookiebar', app.request.locale)}}',
\t\t\t\t'lbl_statistics' : '{{'Statistieken'|trans({},'cookiebar', app.request.locale)}}',
\t\t\t\t'lbl_marketing' : '{{'Marketing'|trans({},'cookiebar', app.request.locale)}}',

\t\t\t\t'lbl_tooltip_essential' : '{{'Noodzakelijke cookies helpen een website bruikbaarder te maken, door basisfuncties als paginanavigatie en toegang tot beveiligde gedeelten van de website mogelijk te maken. Zonder deze cookies kan de website niet naar behoren werken.'|trans({},'cookiebar', app.request.locale)}}',
\t\t\t\t'lbl_tooltip_preferences' : '{{'Voorkeurscookies zorgen ervoor dat een website informatie kan onthouden die van invloed is op het gedrag en de vormgeving van de website, zoals de taal van uw voorkeur of de regio waar u woont.'|trans({},'cookiebar', app.request.locale)}}',
\t\t\t\t'lbl_tooltip_statistics' : '{{'Statistische cookies helpen eigenaren van websites begrijpen hoe bezoekers hun website gebruiken, door anoniem gegevens te verzamelen en te rapporteren.'|trans({},'cookiebar', app.request.locale)}}',
\t\t\t\t'lbl_tooltip_marketing' : '{{'Marketingcookies worden gebruikt om bezoekers te volgen wanneer ze verschillende websites bezoeken. Hun doel is advertenties weergeven die zijn toegesneden op en relevant zijn voor de individuele gebruiker.'|trans({},'cookiebar', app.request.locale)}}',

\t\t\t\t'lbl_back' : '{{'Terug'|trans({},'cookiebar', app.request.locale)}}',
\t\t\t\t'lbl_settings' : '{{'Instellingen'|trans({},'cookiebar', app.request.locale)}}',
\t\t\t\t'lbl_accept' : '{{'Alle cookies toestaan'|trans({},'cookiebar', app.request.locale)}}',
\t\t\t\t'lbl_save' : '{{'Accepteren en sluiten'|trans({},'cookiebar', app.request.locale)}}',
\t\t\t\t'lbl_btn_reset' : '{{'Cookie instellingen'|trans({},'cookiebar', app.request.locale)}}',

\t\t\t\t'link_cookie' : {{(Settings.avgCookie is not empty ? '\\'' ~ Settings.avgCookie ~ '\\'' : 'null')|raw}},
\t\t\t\t'link_privacy' : {{(Settings.avgPrivacy is not empty ? '\\'' ~ Settings.avgPrivacy ~ '\\'' : 'null')|raw}},
\t\t\t\t'link_disclaimer' : {{(Settings.avgDisclaimer is not empty ? '\\'' ~ Settings.avgDisclaimer ~ '\\'' : 'null')|raw}},

\t\t\t\t'lbl_cookie_btn' : '{{'Cookie informatie'|trans({}, 'cookiebar', app.request.locale)}}',
\t\t\t\t'lbl_privacy_btn' : '{{'Privacy statement'|trans({}, 'cookiebar', app.request.locale)}}',
\t\t\t\t'lbl_disclaimer_btn' : '{{'Disclaimer'|trans({}, 'cookiebar', app.request.locale)}}',

\t\t\t\t'reset_btn' : {{Settings.cookiebarButton ? 'true' : 'false'}},
\t\t\t\t'reset_btn_position' : '{{Settings.cookiebarButtonPosition}}',
\t\t\t\t'reset_btn_offset_right' : '{{Settings.cookiebarButtonOffset}}',
\t\t\t};
\t\t</script>
\t{% else %}
\t\t{% if Settings.googleUa is not empty %}
\t\t\t<!-- Google Analytics -->
\t\t\t<script>
\t\t\t(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
\t\t\t\t(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
\t\t\t\tm=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
\t\t\t\t})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

\t\t\t\tga('create', '{{Settings.googleUa}}', 'auto');
\t\t\t\tga('send', 'pageview');
\t\t\t</script>
\t\t\t<!-- End Google Analytics -->
\t\t{% endif %}
\t\t{% if Settings.googleGtm is not empty %}
\t\t\t<!-- Google Tag Manager (noscript) -->
\t\t\t<noscript><iframe data-src=\"https://www.googletagmanager.com/ns.html?id={{Settings.googleGtm}}\"
\t\t\theight=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
\t\t\t<!-- End Google Tag Manager (noscript) -->
\t\t{% endif %}
\t{% endif %}

\t{% if Page.tplInject %}
\t\t{{Page.tplInject|raw}}
\t{% endif %}

\t{% if app.request.get('timer') and app.request.get('timer') == 2 and timer_result is defined %}
\t\t<div class=\"easify_timer\" style=\"padding: 50px;\">
\t\t\t<strong>TIMER:</strong>

\t\t\t{{timer_result|raw}}
\t\t</div>
\t{% endif %}
{% endblock %}

{% block footer1 %}{{Settings.footerBlock1|raw}}{% endblock %}
{% block footer2 %}{{Settings.footerBlock2|raw}}{% endblock %}
{% block footer3 %}{{Settings.footerBlock3|raw}}{% endblock %}
{% block footer4 %}{{Settings.footerBlock4|raw}}{% endblock %}
{% block footer5 %}{{Settings.footerBlock5|raw}}{% endblock %}
", "@Cms/page/page.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/page/page.html.twig");
    }
}
