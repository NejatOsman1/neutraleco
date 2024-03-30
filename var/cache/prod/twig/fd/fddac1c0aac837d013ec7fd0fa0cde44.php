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

/* @Cms/interface_light.html.twig */
class __TwigTemplate_02b558ef769b6342aca7bcbcf45a608a extends Template
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
            'body' => [$this, 'block_body'],
            'javascript' => [$this, 'block_javascript'],
            'scripts' => [$this, 'block_scripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        echo "
<!DOCTYPE html>
<html>
\t<head>
\t\t<title>";
        // line 6
        echo twig_escape_filter($this->env, ($context["trinity"] ?? null), "html", null, true);
        echo "</title>

\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
\t\t<meta name=\"robots\" content=\"noindex,nofollow\"/>

\t\t";
        // line 12
        echo "\t\t<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x\" crossorigin=\"anonymous\">

\t\t<link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.15.4/css/all.css\">
\t\t<link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i\">
\t\t<link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/css/login.css"), "html", null, true);
        echo "\">
\t\t<link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/jquery.toast.min.css"), "html", null, true);
        echo "\">

    ";
        // line 19
        if (((array_key_exists("Settings", $context) &&  !twig_test_empty(($context["Settings"] ?? null))) && twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasGoogleRecaptcha", [], "any", false, false, false, 19))) {
            // line 20
            echo "        <script src='https://www.google.com/recaptcha/api.js'></script>
    ";
        }
        // line 22
        echo "
\t\t";
        // line 23
        $this->displayBlock('stylesheet', $context, $blocks);
        // line 24
        echo "\t</head>

\t<body>
\t";
        // line 27
        $context["hasError"] = false;
        // line 28
        echo "
\t\t";
        // line 29
        $this->displayBlock('body', $context, $blocks);
        // line 30
        echo "
\t  <!-- alert start: only show when user failed login -->

\t  <!--
\t  <div class=\"alert alert-primary\" role=\"alert\">
\t    Problemen met inloggen? Klik <a href=\"#\" class=\"alert-link\">hier</a> om uw wachtwoord te resetten.
\t  </div>
\t  -->

\t  <!-- alert end -->

\t\t<script src=\"https://code.jquery.com/jquery-3.4.0.min.js\" charset=\"utf-8\"></script>
\t  ";
        // line 43
        echo "\t  <script src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/jquery.toast.min.js"), "html", null, true);
        echo "\" charset=\"utf-8\"></script>


\t\t";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, false, false, 46), "flashBag", [], "any", false, false, false, 46), "all", [], "method", false, false, false, 46));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 47
            echo "\t\t\t";
            $context["hasError"] = true;
            // line 48
            echo "\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 49
                echo "\t\t\t\t<script>
\t\t\t\t\t\$(function(){
\t\t\t\t\t\t\$.toast({
\t\t\t\t\t\t\ttext: '";
                // line 52
                echo $context["message"];
                echo "',
\t\t\t\t\t\t\tshowHideTransition : 'slide',
\t\t\t\t\t\t\thideAfter : 7500,
\t\t\t\t\t\t\tposition : 'top-right'
\t\t\t\t\t\t});
\t\t\t\t\t});
\t\t\t\t</script>
\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['label'], $context['messages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "
\t  ";
        // line 62
        $this->displayBlock('javascript', $context, $blocks);
        // line 63
        echo "\t  ";
        $this->displayBlock('scripts', $context, $blocks);
        // line 64
        echo "\t</body>
</html>
";
    }

    // line 23
    public function block_stylesheet($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 29
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 62
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 63
    public function block_scripts($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "@Cms/interface_light.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 63,  177 => 62,  171 => 29,  165 => 23,  159 => 64,  156 => 63,  154 => 62,  151 => 61,  145 => 60,  131 => 52,  126 => 49,  121 => 48,  118 => 47,  114 => 46,  107 => 43,  93 => 30,  91 => 29,  88 => 28,  86 => 27,  81 => 24,  79 => 23,  76 => 22,  72 => 20,  70 => 19,  65 => 17,  61 => 16,  55 => 12,  47 => 6,  41 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/interface_light.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/interface_light.html.twig");
    }
}
