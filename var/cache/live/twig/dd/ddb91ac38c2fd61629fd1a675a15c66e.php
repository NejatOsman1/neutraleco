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

/* @Cms/page/metadata.html.twig */
class __TwigTemplate_e580c3ec3bfc32967b9ffb91cf2e152d extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Cms/page/metadata.html.twig"));

        // line 2
        echo "
<meta name=\"generator\" content=\"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["trinity"]) || array_key_exists("trinity", $context) ? $context["trinity"] : (function () { throw new RuntimeError('Variable "trinity" does not exist.', 3, $this->source); })()), "html", null, true);
        echo " v";
        echo twig_escape_filter($this->env, (isset($context["version"]) || array_key_exists("version", $context) ? $context["version"] : (function () { throw new RuntimeError('Variable "version" does not exist.', 3, $this->source); })()), "html", null, true);
        echo "\" />

";
        // line 5
        $context["foundOgImage"] = false;
        // line 6
        $context["parsedBundleTags"] = [];
        // line 7
        if ((array_key_exists("bundle_metatags", $context) &&  !twig_test_empty((isset($context["bundle_metatags"]) || array_key_exists("bundle_metatags", $context) ? $context["bundle_metatags"] : (function () { throw new RuntimeError('Variable "bundle_metatags" does not exist.', 7, $this->source); })())))) {
            // line 8
            echo "\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["bundle_metatags"]) || array_key_exists("bundle_metatags", $context) ? $context["bundle_metatags"] : (function () { throw new RuntimeError('Variable "bundle_metatags" does not exist.', 8, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["Metatag"]) {
                // line 9
                echo "\t\t";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 9))) {
                    // line 10
                    echo "\t\t";
                    $context["parsedBundleTags"] = twig_array_merge((isset($context["parsedBundleTags"]) || array_key_exists("parsedBundleTags", $context) ? $context["parsedBundleTags"] : (function () { throw new RuntimeError('Variable "parsedBundleTags" does not exist.', 10, $this->source); })()), [0 => twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 10)]);
                    // line 11
                    echo "\t\t";
                    $context["val"] = twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 11);
                    // line 12
                    echo "\t\t";
                    if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 12), "valueType", [], "any", false, false, false, 12) == "image")) {
                        // line 13
                        echo "\t\t\t";
                        $context["foundOgImage"] = true;
                        // line 14
                        echo "\t\t\t<meta ";
                        (( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 14), "keyType", [], "any", false, false, false, 14))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 14), "keyType", [], "any", false, false, false, 14), "html", null, true))) : (print ("name")));
                        echo "=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 14), "getKey", [], "method", false, false, false, 14), "html", null, true);
                        echo "\" content=\"";
                        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "request", [], "any", false, false, false, 14), "getSchemeAndHttpHost", [], "method", false, false, false, 14) . (isset($context["val"]) || array_key_exists("val", $context) ? $context["val"] : (function () { throw new RuntimeError('Variable "val" does not exist.', 14, $this->source); })())), "html", null, true);
                        echo "\" />
\t\t";
                    } else {
                        // line 16
                        echo "\t\t\t<meta ";
                        (( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 16), "keyType", [], "any", false, false, false, 16))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 16), "keyType", [], "any", false, false, false, 16), "html", null, true))) : (print ("name")));
                        echo "=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 16), "getKey", [], "method", false, false, false, 16), "html", null, true);
                        echo "\" content=\"";
                        echo twig_striptags((isset($context["val"]) || array_key_exists("val", $context) ? $context["val"] : (function () { throw new RuntimeError('Variable "val" does not exist.', 16, $this->source); })()));
                        echo "\" />
\t\t";
                    }
                    // line 18
                    echo "\t\t";
                }
                // line 19
                echo "\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Metatag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 21
        echo "
";
        // line 22
        if ((array_key_exists("metatags", $context) &&  !twig_test_empty((isset($context["metatags"]) || array_key_exists("metatags", $context) ? $context["metatags"] : (function () { throw new RuntimeError('Variable "metatags" does not exist.', 22, $this->source); })())))) {
            // line 23
            echo "\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["metatags"]) || array_key_exists("metatags", $context) ? $context["metatags"] : (function () { throw new RuntimeError('Variable "metatags" does not exist.', 23, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["Metatag"]) {
                // line 24
                echo "\t\t";
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 24)) && !twig_in_filter($context["Metatag"], (isset($context["parsedBundleTags"]) || array_key_exists("parsedBundleTags", $context) ? $context["parsedBundleTags"] : (function () { throw new RuntimeError('Variable "parsedBundleTags" does not exist.', 24, $this->source); })())))) {
                    // line 25
                    echo "\t\t\t";
                    $context["val"] = twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 25);
                    // line 26
                    echo "\t\t\t";
                    if ((((array_key_exists("customMetadata", $context) &&  !(null === (isset($context["customMetadata"]) || array_key_exists("customMetadata", $context) ? $context["customMetadata"] : (function () { throw new RuntimeError('Variable "customMetadata" does not exist.', 26, $this->source); })()))) && twig_get_attribute($this->env, $this->source, ($context["customMetadata"] ?? null), twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 26), [], "array", true, true, false, 26)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["customMetadata"]) || array_key_exists("customMetadata", $context) ? $context["customMetadata"] : (function () { throw new RuntimeError('Variable "customMetadata" does not exist.', 26, $this->source); })()), twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 26), [], "array", false, false, false, 26)))) {
                        // line 27
                        echo "\t\t\t\t";
                        $context["val"] = twig_get_attribute($this->env, $this->source, (isset($context["customMetadata"]) || array_key_exists("customMetadata", $context) ? $context["customMetadata"] : (function () { throw new RuntimeError('Variable "customMetadata" does not exist.', 27, $this->source); })()), twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 27), [], "array", false, false, false, 27);
                        // line 28
                        echo "\t\t\t";
                    }
                    echo "\t
\t\t\t";
                    // line 29
                    if ((twig_get_attribute($this->env, $this->source, $context["Metatag"], "valueType", [], "any", false, false, false, 29) == "image")) {
                        // line 30
                        echo "\t\t\t\t";
                        $context["foundOgImage"] = true;
                        // line 31
                        echo "\t\t\t\t<meta ";
                        (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "keyType", [], "any", false, false, false, 31))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "keyType", [], "any", false, false, false, 31), "html", null, true))) : (print ("name")));
                        echo "=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 31), "html", null, true);
                        echo "\" content=\"";
                        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 31, $this->source); })()), "request", [], "any", false, false, false, 31), "getSchemeAndHttpHost", [], "method", false, false, false, 31) . (isset($context["val"]) || array_key_exists("val", $context) ? $context["val"] : (function () { throw new RuntimeError('Variable "val" does not exist.', 31, $this->source); })())), "html", null, true);
                        echo "\" />
\t\t\t";
                    } else {
                        // line 33
                        echo "\t\t\t\t<meta ";
                        (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "keyType", [], "any", false, false, false, 33))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "keyType", [], "any", false, false, false, 33), "html", null, true))) : (print ("name")));
                        echo "=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 33), "html", null, true);
                        echo "\" content=\"";
                        echo twig_striptags((isset($context["val"]) || array_key_exists("val", $context) ? $context["val"] : (function () { throw new RuntimeError('Variable "val" does not exist.', 33, $this->source); })()));
                        echo "\" />
\t\t\t";
                    }
                    // line 35
                    echo "\t\t";
                }
                // line 36
                echo "\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Metatag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["metatags"]) || array_key_exists("metatags", $context) ? $context["metatags"] : (function () { throw new RuntimeError('Variable "metatags" does not exist.', 37, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["Metatag"]) {
                // line 38
                echo "            ";
                if (((((twig_get_attribute($this->env, $this->source, $context["Metatag"], "key", [], "any", false, false, false, 38) == "og:url") && twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 38))) && !twig_in_filter($context["Metatag"], (isset($context["parsedBundleTags"]) || array_key_exists("parsedBundleTags", $context) ? $context["parsedBundleTags"] : (function () { throw new RuntimeError('Variable "parsedBundleTags" does not exist.', 38, $this->source); })()))) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 38, $this->source); })()), "slugkey", [], "any", false, false, false, 38)))) {
                    // line 39
                    echo "                <meta ";
                    (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "keyType", [], "any", false, false, false, 39))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "keyType", [], "any", false, false, false, 39), "html", null, true))) : (print ("name")));
                    echo "=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 39), "html", null, true);
                    echo "\" content=\"";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 39, $this->source); })()), "slugkey", [], "any", false, false, false, 39));
                    echo "\" />
            ";
                }
                // line 41
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Metatag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["metatags"]) || array_key_exists("metatags", $context) ? $context["metatags"] : (function () { throw new RuntimeError('Variable "metatags" does not exist.', 42, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["Metatag"]) {
                // line 43
                echo "            ";
                if ((((twig_get_attribute($this->env, $this->source, $context["Metatag"], "key", [], "any", false, false, false, 43) == "og:type") && twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 43))) && !twig_in_filter($context["Metatag"], (isset($context["parsedBundleTags"]) || array_key_exists("parsedBundleTags", $context) ? $context["parsedBundleTags"] : (function () { throw new RuntimeError('Variable "parsedBundleTags" does not exist.', 43, $this->source); })())))) {
                    // line 44
                    echo "                <meta ";
                    (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "keyType", [], "any", false, false, false, 44))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "keyType", [], "any", false, false, false, 44), "html", null, true))) : (print ("name")));
                    echo "=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 44), "html", null, true);
                    echo "\" content=\"website\" />
            ";
                }
                // line 46
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Metatag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 48
        echo "
";
        // line 49
        if ((((isset($context["foundOgImage"]) || array_key_exists("foundOgImage", $context) ? $context["foundOgImage"] : (function () { throw new RuntimeError('Variable "foundOgImage" does not exist.', 49, $this->source); })()) == false) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 49, $this->source); })()), "image", [], "any", false, false, false, 49)))) {
            // line 50
            echo "\t<meta property=\"og:image\" content=\"";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 50, $this->source); })()), "request", [], "any", false, false, false, 50), "getSchemeAndHttpHost", [], "method", false, false, false, 50) . "/") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["Page"]) || array_key_exists("Page", $context) ? $context["Page"] : (function () { throw new RuntimeError('Variable "Page" does not exist.', 50, $this->source); })()), "image", [], "any", false, false, false, 50), "getWebPath", [], "method", false, false, false, 50)), "html", null, true);
            echo "\" />
";
        }
        // line 52
        echo "
";
        // line 53
        if ((array_key_exists("systemMetatags", $context) &&  !twig_test_empty((isset($context["systemMetatags"]) || array_key_exists("systemMetatags", $context) ? $context["systemMetatags"] : (function () { throw new RuntimeError('Variable "systemMetatags" does not exist.', 53, $this->source); })())))) {
            // line 54
            echo "\t<!-- systemMetatags -->
\t";
            // line 55
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["systemMetatags"]) || array_key_exists("systemMetatags", $context) ? $context["systemMetatags"] : (function () { throw new RuntimeError('Variable "systemMetatags" does not exist.', 55, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["Metatag"]) {
                // line 56
                echo "            ";
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 56)) && !twig_in_filter($context["Metatag"], (isset($context["parsedBundleTags"]) || array_key_exists("parsedBundleTags", $context) ? $context["parsedBundleTags"] : (function () { throw new RuntimeError('Variable "parsedBundleTags" does not exist.', 56, $this->source); })())))) {
                    // line 57
                    echo "                ";
                    if ((twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 57) == "link:icon")) {
                        // line 58
                        echo "                    ";
                        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 58, $this->source); })()), "getFaviconLocation", [], "method", false, false, false, 58))) {
                            // line 59
                            echo "\t\t\t\t\t\t";
                            if ((is_string($__internal_compile_0 = twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 59, $this->source); })()), "getFaviconLocation", [], "method", false, false, false, 59)) && is_string($__internal_compile_1 = "/") && ('' === $__internal_compile_1 || 0 === strpos($__internal_compile_0, $__internal_compile_1)))) {
                                // line 60
                                echo "\t\t\t\t\t\t\t<link rel=\"icon\" type=\"image/x-icon\" href=\"";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 60, $this->source); })()), "getFaviconLocation", [], "method", false, false, false, 60), "html", null, true);
                                echo "\" />
\t\t\t\t\t\t";
                            } else {
                                // line 62
                                echo "\t\t\t\t\t\t\t<link rel=\"icon\" type=\"image/x-icon\" href=\"/";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 62, $this->source); })()), "getFaviconLocation", [], "method", false, false, false, 62), "html", null, true);
                                echo "\" />
\t\t\t\t\t\t";
                            }
                            // line 64
                            echo "                    ";
                        } else {
                            // line 65
                            echo "\t\t\t\t\t\t";
                            if ((is_string($__internal_compile_2 = twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 65)) && is_string($__internal_compile_3 = "/") && ('' === $__internal_compile_3 || 0 === strpos($__internal_compile_2, $__internal_compile_3)))) {
                                // line 66
                                echo "\t\t\t\t\t\t\t<link rel=\"icon\" type=\"image/x-icon\" href=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 66);
                                echo "\" />
\t\t\t\t\t\t";
                            } else {
                                // line 68
                                echo "\t\t\t\t\t\t\t<link rel=\"icon\" type=\"image/x-icon\" href=\"/";
                                echo twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 68);
                                echo "\" />
\t\t\t\t\t\t";
                            }
                            // line 70
                            echo "                    ";
                        }
                        // line 71
                        echo "\t\t";
                    } elseif ((twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 71) == "Cache-Control")) {
                        // line 72
                        echo "\t\t\t<meta http-equiv=\"Cache-Control\" content=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 72);
                        echo "\" />
\t\t";
                    } elseif ((twig_get_attribute($this->env, $this->source,                     // line 73
$context["Metatag"], "getKey", [], "method", false, false, false, 73) == "link:apple-touch-icon")) {
                        // line 74
                        echo "                    ";
                        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 74, $this->source); })()), "getAppleTouchIcon", [], "method", false, false, false, 74))) {
                            // line 75
                            echo "                        <link rel=\"apple-touch-icon\" href=\"/";
                            echo twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 75, $this->source); })()), "getAppleTouchIcon", [], "method", false, false, false, 75);
                            echo "\" />
                    ";
                        } else {
                            // line 77
                            echo "\t\t\t<link rel=\"apple-touch-icon\" href=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 77);
                            echo "\" />
                    ";
                        }
                        // line 79
                        echo "                ";
                    } elseif ((twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 79) == "author")) {
                        // line 80
                        echo "                    ";
                        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 80, $this->source); })()), "getAuthor", [], "method", false, false, false, 80))) {
                            // line 81
                            echo "                        <meta name=\"author\" content=\"";
                            echo twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 81, $this->source); })()), "getAuthor", [], "method", false, false, false, 81);
                            echo "\">
                    ";
                        } elseif ( !twig_test_empty(twig_get_attribute($this->env, $this->source,                         // line 82
$context["Metatag"], "keyType", [], "any", false, false, false, 82))) {
                            // line 83
                            echo "                        <meta name=\"author\" content=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 83);
                            echo "\">
                    ";
                        }
                        // line 85
                        echo "                ";
                    } elseif ((twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 85) == "og:site_name")) {
                        // line 86
                        echo "                    ";
                        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 86, $this->source); })()), "getOgSiteName", [], "method", false, false, false, 86))) {
                            // line 87
                            echo "                        <meta property=\"og:site_name\" content=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 87, $this->source); })()), "getOgSiteName", [], "method", false, false, false, 87), "html", null, true);
                            echo "\" />
                    ";
                        }
                        // line 89
                        echo "\t\t";
                    } elseif ((twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 89) == "charset")) {
                        // line 90
                        echo "\t\t\t<meta charset=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 90);
                        echo "\" />
\t\t";
                    } else {
                        // line 92
                        echo "\t\t\t<meta ";
                        (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "keyType", [], "any", false, false, false, 92))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "keyType", [], "any", false, false, false, 92), "html", null, true))) : (print ("name")));
                        echo "=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 92), "html", null, true);
                        echo "\" content=\"";
                        echo twig_striptags(twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 92));
                        echo "\" />
\t\t";
                    }
                    // line 94
                    echo "            ";
                }
                // line 95
                echo "\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Metatag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 96
            echo "\t<!-- / systemMetatags -->
";
        } else {
            // line 98
            echo "\t<!-- ! systemMetatags -->
";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "@Cms/page/metadata.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  370 => 98,  366 => 96,  360 => 95,  357 => 94,  347 => 92,  341 => 90,  338 => 89,  332 => 87,  329 => 86,  326 => 85,  320 => 83,  318 => 82,  313 => 81,  310 => 80,  307 => 79,  301 => 77,  295 => 75,  292 => 74,  290 => 73,  285 => 72,  282 => 71,  279 => 70,  273 => 68,  267 => 66,  264 => 65,  261 => 64,  255 => 62,  249 => 60,  246 => 59,  243 => 58,  240 => 57,  237 => 56,  233 => 55,  230 => 54,  228 => 53,  225 => 52,  219 => 50,  217 => 49,  214 => 48,  207 => 46,  199 => 44,  196 => 43,  191 => 42,  185 => 41,  175 => 39,  172 => 38,  167 => 37,  161 => 36,  158 => 35,  148 => 33,  138 => 31,  135 => 30,  133 => 29,  128 => 28,  125 => 27,  122 => 26,  119 => 25,  116 => 24,  111 => 23,  109 => 22,  106 => 21,  99 => 19,  96 => 18,  86 => 16,  76 => 14,  73 => 13,  70 => 12,  67 => 11,  64 => 10,  61 => 9,  56 => 8,  54 => 7,  52 => 6,  50 => 5,  43 => 3,  40 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{% trans_default_domain 'cms' %}

<meta name=\"generator\" content=\"{{trinity}} v{{version}}\" />

{% set foundOgImage = false %}
{% set parsedBundleTags = [] %}
{% if bundle_metatags is defined and bundle_metatags is not empty %}
\t{% for Metatag in bundle_metatags %}
\t\t{% if Metatag.value is not empty %}
\t\t{% set parsedBundleTags = parsedBundleTags|merge([Metatag.metatag]) %}
\t\t{% set val = Metatag.value %}
\t\t{% if Metatag.metatag.valueType == 'image' %}
\t\t\t{% set foundOgImage = true %}
\t\t\t<meta {{Metatag.metatag.keyType is not empty ? Metatag.metatag.keyType : 'name'}}=\"{{Metatag.metatag.getKey()}}\" content=\"{{app.request.getSchemeAndHttpHost() ~ val|raw}}\" />
\t\t{% else %}
\t\t\t<meta {{Metatag.metatag.keyType is not empty ? Metatag.metatag.keyType : 'name'}}=\"{{Metatag.metatag.getKey()}}\" content=\"{{val|striptags|raw}}\" />
\t\t{% endif %}
\t\t{% endif %}
\t{% endfor %}
{% endif %}

{% if metatags is defined and metatags is not empty %}
\t{% for Metatag in metatags %}
\t\t{% if Metatag.value is not empty and Metatag not in parsedBundleTags %}
\t\t\t{% set val = Metatag.value %}
\t\t\t{% if customMetadata is defined and customMetadata is not null and customMetadata[Metatag.getKey()] is defined and customMetadata[Metatag.getKey()] is not empty %}
\t\t\t\t{% set val = customMetadata[Metatag.getKey()] %}
\t\t\t{% endif %}\t
\t\t\t{% if Metatag.valueType == 'image' %}
\t\t\t\t{% set foundOgImage = true %}
\t\t\t\t<meta {{Metatag.keyType is not empty ? Metatag.keyType : 'name'}}=\"{{Metatag.getKey()}}\" content=\"{{app.request.getSchemeAndHttpHost() ~ val|raw}}\" />
\t\t\t{% else %}
\t\t\t\t<meta {{Metatag.keyType is not empty ? Metatag.keyType : 'name'}}=\"{{Metatag.getKey()}}\" content=\"{{val|striptags|raw}}\" />
\t\t\t{% endif %}
\t\t{% endif %}
\t{% endfor %}
        {% for Metatag in metatags %}
            {% if Metatag.key == 'og:url' and Metatag.value is empty and Metatag not in parsedBundleTags and Page.slugkey is not empty %}
                <meta {{Metatag.keyType is not empty ? Metatag.keyType : 'name'}}=\"{{Metatag.getKey()}}\" content=\"{{url(Page.slugkey)}}\" />
            {% endif %}
        {% endfor %}
        {% for Metatag in metatags %}
            {% if Metatag.key == 'og:type' and Metatag.value is empty and Metatag not in parsedBundleTags %}
                <meta {{Metatag.keyType is not empty ? Metatag.keyType : 'name'}}=\"{{Metatag.getKey()}}\" content=\"website\" />
            {% endif %}
        {% endfor %}
{% endif %}

{% if foundOgImage == false and Page.image is not empty %}
\t<meta property=\"og:image\" content=\"{{app.request.getSchemeAndHttpHost() ~ '/' ~ Page.image.getWebPath()}}\" />
{% endif %}

{% if systemMetatags is defined and systemMetatags is not empty %}
\t<!-- systemMetatags -->
\t{% for Metatag in systemMetatags %}
            {% if Metatag.value is not empty and Metatag not in parsedBundleTags %}
                {% if Metatag.getKey() == 'link:icon' %}
                    {% if Settings.getFaviconLocation() is not empty %}
\t\t\t\t\t\t{% if Settings.getFaviconLocation() starts with '/' %}
\t\t\t\t\t\t\t<link rel=\"icon\" type=\"image/x-icon\" href=\"{{ Settings.getFaviconLocation()}}\" />
\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t<link rel=\"icon\" type=\"image/x-icon\" href=\"/{{ Settings.getFaviconLocation()}}\" />
\t\t\t\t\t\t{% endif %}
                    {% else %}
\t\t\t\t\t\t{% if Metatag.value starts with '/' %}
\t\t\t\t\t\t\t<link rel=\"icon\" type=\"image/x-icon\" href=\"{{Metatag.value|raw}}\" />
\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t<link rel=\"icon\" type=\"image/x-icon\" href=\"/{{Metatag.value|raw}}\" />
\t\t\t\t\t\t{% endif %}
                    {% endif %}
\t\t{% elseif Metatag.getKey() == 'Cache-Control' %}
\t\t\t<meta http-equiv=\"Cache-Control\" content=\"{{Metatag.value|raw}}\" />
\t\t{% elseif Metatag.getKey() == 'link:apple-touch-icon' %}
                    {% if Settings.getAppleTouchIcon() is not empty %}
                        <link rel=\"apple-touch-icon\" href=\"/{{Settings.getAppleTouchIcon()|raw}}\" />
                    {% else %}
\t\t\t<link rel=\"apple-touch-icon\" href=\"{{Metatag.value|raw}}\" />
                    {% endif %}
                {% elseif Metatag.getKey() == 'author' %}
                    {% if Settings.getAuthor() is not empty %}
                        <meta name=\"author\" content=\"{{Settings.getAuthor()|raw}}\">
                    {% elseif Metatag.keyType is not empty %}
                        <meta name=\"author\" content=\"{{Metatag.value|raw}}\">
                    {% endif %}
                {% elseif Metatag.getKey() == 'og:site_name' %}
                    {% if Settings.getOgSiteName() is not empty %}
                        <meta property=\"og:site_name\" content=\"{{ Settings.getOgSiteName() }}\" />
                    {% endif %}
\t\t{% elseif Metatag.getKey() == 'charset' %}
\t\t\t<meta charset=\"{{Metatag.value|raw}}\" />
\t\t{% else %}
\t\t\t<meta {{Metatag.keyType is not empty ? Metatag.keyType : 'name'}}=\"{{Metatag.getKey()}}\" content=\"{{Metatag.value|striptags|raw}}\" />
\t\t{% endif %}
            {% endif %}
\t{% endfor %}
\t<!-- / systemMetatags -->
{% else %}
\t<!-- ! systemMetatags -->
{% endif %}
", "@Cms/page/metadata.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/page/metadata.html.twig");
    }
}
