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
class __TwigTemplate_c763ff8d5a98cb0e0a61a58b6ae8418bc35dcd7bf53a21339c55cbb88dd67e29 extends Template
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
<meta name=\"generator\" content=\"";
        // line 3
        echo twig_escape_filter($this->env, ($context["trinity"] ?? null), "html", null, true);
        echo " v";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\" />

";
        // line 5
        $context["foundOgImage"] = false;
        // line 6
        $context["parsedBundleTags"] = [];
        // line 7
        if ((array_key_exists("bundle_metatags", $context) &&  !twig_test_empty(($context["bundle_metatags"] ?? null)))) {
            // line 8
            echo "\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["bundle_metatags"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Metatag"]) {
                // line 9
                echo "\t\t";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 9))) {
                    // line 10
                    echo "\t\t";
                    $context["parsedBundleTags"] = twig_array_merge(($context["parsedBundleTags"] ?? null), [0 => twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 10)]);
                    // line 11
                    echo "\t\t";
                    $context["val"] = twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 11);
                    // line 12
                    echo "\t\t";
                    if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 12), "valueType", [], "any", false, false, false, 12), "image"))) {
                        // line 13
                        echo "\t\t\t";
                        $context["foundOgImage"] = true;
                        // line 14
                        echo "\t\t\t<meta ";
                        (( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 14), "keyType", [], "any", false, false, false, 14))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 14), "keyType", [], "any", false, false, false, 14), "html", null, true))) : (print ("name")));
                        echo "=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 14), "getKey", [], "method", false, false, false, 14), "html", null, true);
                        echo "\" content=\"";
                        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 14), "getSchemeAndHttpHost", [], "method", false, false, false, 14) . ($context["val"] ?? null)), "html", null, true);
                        echo "\" />
\t\t";
                    } else {
                        // line 16
                        echo "\t\t\t<meta ";
                        (( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 16), "keyType", [], "any", false, false, false, 16))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 16), "keyType", [], "any", false, false, false, 16), "html", null, true))) : (print ("name")));
                        echo "=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 16), "getKey", [], "method", false, false, false, 16), "html", null, true);
                        echo "\" content=\"";
                        echo twig_striptags(($context["val"] ?? null));
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
        if ((array_key_exists("metatags", $context) &&  !twig_test_empty(($context["metatags"] ?? null)))) {
            // line 23
            echo "\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["metatags"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Metatag"]) {
                // line 24
                echo "\t\t";
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 24)) && !twig_in_filter($context["Metatag"], ($context["parsedBundleTags"] ?? null)))) {
                    // line 25
                    echo "\t\t\t";
                    $context["val"] = twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 25);
                    // line 26
                    echo "\t\t\t";
                    if ((((array_key_exists("customMetadata", $context) &&  !(null === ($context["customMetadata"] ?? null))) && twig_get_attribute($this->env, $this->source, ($context["customMetadata"] ?? null), twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 26), [], "array", true, true, false, 26)) &&  !twig_test_empty((($__internal_compile_0 = ($context["customMetadata"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 26)] ?? null) : null)))) {
                        // line 27
                        echo "\t\t\t\t";
                        $context["val"] = (($__internal_compile_1 = ($context["customMetadata"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 27)] ?? null) : null);
                        // line 28
                        echo "\t\t\t";
                    }
                    echo "\t
\t\t\t";
                    // line 29
                    if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["Metatag"], "valueType", [], "any", false, false, false, 29), "image"))) {
                        // line 30
                        echo "\t\t\t\t";
                        $context["foundOgImage"] = true;
                        // line 31
                        echo "\t\t\t\t<meta ";
                        (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "keyType", [], "any", false, false, false, 31))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "keyType", [], "any", false, false, false, 31), "html", null, true))) : (print ("name")));
                        echo "=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 31), "html", null, true);
                        echo "\" content=\"";
                        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 31), "getSchemeAndHttpHost", [], "method", false, false, false, 31) . ($context["val"] ?? null)), "html", null, true);
                        echo "\" />
\t\t\t";
                    } else {
                        // line 33
                        echo "\t\t\t\t<meta ";
                        (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "keyType", [], "any", false, false, false, 33))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "keyType", [], "any", false, false, false, 33), "html", null, true))) : (print ("name")));
                        echo "=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 33), "html", null, true);
                        echo "\" content=\"";
                        echo twig_striptags(($context["val"] ?? null));
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
            $context['_seq'] = twig_ensure_traversable(($context["metatags"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Metatag"]) {
                // line 38
                echo "            ";
                if (((((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["Metatag"], "key", [], "any", false, false, false, 38), "og:url")) && twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 38))) && !twig_in_filter($context["Metatag"], ($context["parsedBundleTags"] ?? null))) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "slugkey", [], "any", false, false, false, 38)))) {
                    // line 39
                    echo "                <meta ";
                    (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "keyType", [], "any", false, false, false, 39))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "keyType", [], "any", false, false, false, 39), "html", null, true))) : (print ("name")));
                    echo "=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 39), "html", null, true);
                    echo "\" content=\"";
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "slugkey", [], "any", false, false, false, 39));
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
            $context['_seq'] = twig_ensure_traversable(($context["metatags"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Metatag"]) {
                // line 43
                echo "            ";
                if ((((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["Metatag"], "key", [], "any", false, false, false, 43), "og:type")) && twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 43))) && !twig_in_filter($context["Metatag"], ($context["parsedBundleTags"] ?? null)))) {
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
        if (((0 === twig_compare(($context["foundOgImage"] ?? null), false)) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 49)))) {
            // line 50
            echo "\t<meta property=\"og:image\" content=\"";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 50), "getSchemeAndHttpHost", [], "method", false, false, false, 50) . "/") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Page"] ?? null), "image", [], "any", false, false, false, 50), "getWebPath", [], "method", false, false, false, 50)), "html", null, true);
            echo "\" />
";
        }
        // line 52
        echo "
";
        // line 53
        if ((array_key_exists("systemMetatags", $context) &&  !twig_test_empty(($context["systemMetatags"] ?? null)))) {
            // line 54
            echo "\t<!-- systemMetatags -->
\t";
            // line 55
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["systemMetatags"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Metatag"]) {
                // line 56
                echo "            ";
                if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 56)) && !twig_in_filter($context["Metatag"], ($context["parsedBundleTags"] ?? null)))) {
                    // line 57
                    echo "                ";
                    if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 57), "link:icon"))) {
                        // line 58
                        echo "                    ";
                        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getFaviconLocation", [], "method", false, false, false, 58))) {
                            // line 59
                            echo "\t\t\t\t\t\t";
                            if ((is_string($__internal_compile_2 = twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getFaviconLocation", [], "method", false, false, false, 59)) && is_string($__internal_compile_3 = "/") && ('' === $__internal_compile_3 || 0 === strpos($__internal_compile_2, $__internal_compile_3)))) {
                                // line 60
                                echo "\t\t\t\t\t\t\t<link rel=\"icon\" type=\"image/x-icon\" href=\"";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getFaviconLocation", [], "method", false, false, false, 60), "html", null, true);
                                echo "\" />
\t\t\t\t\t\t";
                            } else {
                                // line 62
                                echo "\t\t\t\t\t\t\t<link rel=\"icon\" type=\"image/x-icon\" href=\"/";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getFaviconLocation", [], "method", false, false, false, 62), "html", null, true);
                                echo "\" />
\t\t\t\t\t\t";
                            }
                            // line 64
                            echo "                    ";
                        } else {
                            // line 65
                            echo "\t\t\t\t\t\t";
                            if ((is_string($__internal_compile_4 = twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 65)) && is_string($__internal_compile_5 = "/") && ('' === $__internal_compile_5 || 0 === strpos($__internal_compile_4, $__internal_compile_5)))) {
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
                    } elseif ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 71), "Cache-Control"))) {
                        // line 72
                        echo "\t\t\t<meta http-equiv=\"Cache-Control\" content=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 72);
                        echo "\" />
\t\t";
                    } elseif ((0 === twig_compare(twig_get_attribute($this->env, $this->source,                     // line 73
$context["Metatag"], "getKey", [], "method", false, false, false, 73), "link:apple-touch-icon"))) {
                        // line 74
                        echo "                    ";
                        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getAppleTouchIcon", [], "method", false, false, false, 74))) {
                            // line 75
                            echo "                        <link rel=\"apple-touch-icon\" href=\"/";
                            echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getAppleTouchIcon", [], "method", false, false, false, 75);
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
                    } elseif ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 79), "author"))) {
                        // line 80
                        echo "                    ";
                        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getAuthor", [], "method", false, false, false, 80))) {
                            // line 81
                            echo "                        <meta name=\"author\" content=\"";
                            echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getAuthor", [], "method", false, false, false, 81);
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
                    } elseif ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 85), "og:site_name"))) {
                        // line 86
                        echo "                    ";
                        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getOgSiteName", [], "method", false, false, false, 86))) {
                            // line 87
                            echo "                        <meta property=\"og:site_name\" content=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getOgSiteName", [], "method", false, false, false, 87), "html", null, true);
                            echo "\" />
                    ";
                        }
                        // line 89
                        echo "\t\t";
                    } elseif ((0 === twig_compare(twig_get_attribute($this->env, $this->source, $context["Metatag"], "getKey", [], "method", false, false, false, 89), "charset"))) {
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
        return array (  367 => 98,  363 => 96,  357 => 95,  354 => 94,  344 => 92,  338 => 90,  335 => 89,  329 => 87,  326 => 86,  323 => 85,  317 => 83,  315 => 82,  310 => 81,  307 => 80,  304 => 79,  298 => 77,  292 => 75,  289 => 74,  287 => 73,  282 => 72,  279 => 71,  276 => 70,  270 => 68,  264 => 66,  261 => 65,  258 => 64,  252 => 62,  246 => 60,  243 => 59,  240 => 58,  237 => 57,  234 => 56,  230 => 55,  227 => 54,  225 => 53,  222 => 52,  216 => 50,  214 => 49,  211 => 48,  204 => 46,  196 => 44,  193 => 43,  188 => 42,  182 => 41,  172 => 39,  169 => 38,  164 => 37,  158 => 36,  155 => 35,  145 => 33,  135 => 31,  132 => 30,  130 => 29,  125 => 28,  122 => 27,  119 => 26,  116 => 25,  113 => 24,  108 => 23,  106 => 22,  103 => 21,  96 => 19,  93 => 18,  83 => 16,  73 => 14,  70 => 13,  67 => 12,  64 => 11,  61 => 10,  58 => 9,  53 => 8,  51 => 7,  49 => 6,  47 => 5,  40 => 3,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/page/metadata.html.twig", "/var/www/html/src/CmsBundle/Resources/views/page/metadata.html.twig");
    }
}
