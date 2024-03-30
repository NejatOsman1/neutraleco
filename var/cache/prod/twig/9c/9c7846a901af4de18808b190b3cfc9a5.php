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

/* @TrinityBlog/default/blog.html.twig */
class __TwigTemplate_0bddbe3efb220efa400528b6103f6e5e extends Template
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
";
        // line 3
        if (file_exists("../templates/override/blog/blog.html.twig")) {
            // line 4
            echo "    ";
            $this->loadTemplate("override/blog/blog.html.twig", "@TrinityBlog/default/blog.html.twig", 4)->display($context);
        } else {
            // line 6
            echo "  ";
            // line 7
            echo "  ";
            if ((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "uri", [], "any", true, true, false, 7) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "uri", [], "any", false, false, false, 7)))) {
                // line 8
                echo "    ";
                $context["baseUrl_detail"] = ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("homepage") . twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "uri", [], "any", false, false, false, 8));
                // line 9
                echo "  ";
            } else {
                // line 10
                echo "    ";
                $context["baseUrl_detail"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 10), "attributes", [], "any", false, false, false, 10), "get", [0 => "_route"], "method", false, false, false, 10));
                // line 11
                echo "  ";
            }
            // line 12
            echo "  ";
            if ((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "uri_overview", [], "any", true, true, false, 12) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "uri_overview", [], "any", false, false, false, 12)))) {
                // line 13
                echo "    ";
                $context["baseUrl"] = ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("homepage") . twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "uri_overview", [], "any", false, false, false, 13));
                // line 14
                echo "  ";
            } else {
                // line 15
                echo "    ";
                $context["baseUrl"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 15), "attributes", [], "any", false, false, false, 15), "get", [0 => "_route"], "method", false, false, false, 15));
                // line 16
                echo "  ";
            }
            // line 17
            echo "
  <div class=\"blog\">
    <div class=\"row\">
      ";
            // line 20
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["entries"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Entry"]) {
                // line 21
                echo "        ";
                if ((twig_get_attribute($this->env, $this->source, $context["Entry"], "isexternal", [], "any", false, false, false, 21) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Entry"], "externalurl", [], "any", false, false, false, 21)))) {
                    // line 22
                    echo "          ";
                    $context["detailUrl"] = twig_get_attribute($this->env, $this->source, $context["Entry"], "externalurl", [], "any", false, false, false, 22);
                    // line 23
                    echo "        ";
                } else {
                    // line 24
                    echo "          ";
                    $context["detailUrl"] = ((((($context["baseUrl_detail"] ?? null) . "/") . twig_get_attribute($this->env, $this->source, $context["Entry"], "id", [], "any", false, false, false, 24)) . "/") . twig_get_attribute($this->env, $this->source, $context["Entry"], "getDefaultSlug", [], "any", false, false, false, 24));
                    // line 25
                    echo "        ";
                }
                // line 26
                echo "        ";
                $context["shareUrl"] = (((($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 26), "attributes", [], "any", false, false, false, 26), "get", [0 => "_route"], "method", false, false, false, 26)) . "/") . twig_get_attribute($this->env, $this->source, $context["Entry"], "id", [], "any", false, false, false, 26)) . "/") . twig_get_attribute($this->env, $this->source, $context["Entry"], "getDefaultSlug", [], "any", false, false, false, 26));
                // line 27
                echo "        ";
                if ((twig_get_attribute($this->env, $this->source, $context["Entry"], "slug", [], "any", false, false, false, 27) && (twig_get_attribute($this->env, $this->source, $context["Entry"], "isexternal", [], "any", false, false, false, 27) == false))) {
                    // line 28
                    echo "          ";
                    $context["detailUrl"] = ((($context["baseUrl_detail"] ?? null) . "/") . twig_get_attribute($this->env, $this->source, $context["Entry"], "getSlug", [], "any", false, false, false, 28));
                    // line 29
                    echo "          ";
                    $context["shareUrl"] = (($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 29), "attributes", [], "any", false, false, false, 29), "get", [0 => "_route"], "method", false, false, false, 29)) . "/") . twig_get_attribute($this->env, $this->source, $context["Entry"], "getSlug", [], "any", false, false, false, 29));
                    // line 30
                    echo "        ";
                }
                // line 31
                echo "        <div class=\"col-12 col-md-6 col-lg-4\">
          <div class=\"item ";
                // line 32
                echo (((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "minimal", [], "array", true, true, false, 32) && ((($__internal_compile_0 = ($context["config"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["minimal"] ?? null) : null) == "1"))) ? ("minimal") : ("card"));
                echo "\">
            <a href=\"";
                // line 33
                echo twig_escape_filter($this->env, ($context["detailUrl"] ?? null), "html", null, true);
                echo "\" ";
                if ((twig_get_attribute($this->env, $this->source, $context["Entry"], "isexternal", [], "any", false, false, false, 33) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Entry"], "externalurl", [], "any", false, false, false, 33)))) {
                    echo "target=\"_blank\"";
                }
                echo ">
              <div class=\"heightfix\">
                ";
                // line 35
                if (( !twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "minimal", [], "array", true, true, false, 35) || ((($__internal_compile_1 = ($context["config"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["minimal"] ?? null) : null) == "0"))) {
                    // line 36
                    echo "                  <div class=\"thumb\">
                    <div class=\"lcp image\">
                      ";
                    // line 38
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 38), "first", [], "any", false, false, false, 38)) {
                        // line 39
                        echo "                        ";
                        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 39), "first", [], "any", false, false, false, 39), "hasBlurred", [], "any", false, false, false, 39)) {
                            // line 40
                            echo "                          <picture>
                            ";
                            // line 41
                            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 41), "first", [], "any", false, false, false, 41), "hasWebp", [], "method", false, false, false, 41)) {
                                // line 42
                                echo "                              <source srcset=\"/";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 42), "first", [], "any", false, false, false, 42), "getBlurredWebpPath", [0 => "small"], "method", false, false, false, 42), "html", null, true);
                                echo "\" type=\"image/webp\">
                            ";
                            }
                            // line 44
                            echo "                            <source srcset=\"/";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 44), "first", [], "any", false, false, false, 44), "getBlurredWebPath", [0 => "small"], "method", false, false, false, 44), "html", null, true);
                            echo "\" type=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 44), "first", [], "any", false, false, false, 44), "mime", [], "any", false, false, false, 44), "html", null, true);
                            echo "\">
                            <img class=\"lq\" alt=\"";
                            // line 45
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 45), "first", [], "any", false, false, false, 45), "description_alt", [], "any", false, false, false, 45), "html", null, true);
                            echo "\" src=\"/";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 45), "first", [], "any", false, false, false, 45), "getBlurredWebPath", [0 => "small"], "method", false, false, false, 45), "html", null, true);
                            echo "\" type=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 45), "first", [], "any", false, false, false, 45), "mime", [], "any", false, false, false, 45), "html", null, true);
                            echo "\" loading=\"lazy\" width=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 45), "first", [], "any", false, false, false, 45), "width", [], "any", false, false, false, 45), "html", null, true);
                            echo "\" height=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 45), "first", [], "any", false, false, false, 45), "height", [], "any", false, false, false, 45), "html", null, true);
                            echo "\">
                          </picture>
                        ";
                        }
                        // line 48
                        echo "                        <picture>
                          ";
                        // line 49
                        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 49), "first", [], "any", false, false, false, 49), "hasWebp", [], "method", false, false, false, 49)) {
                            // line 50
                            echo "                            <source srcset=\"/";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 50), "first", [], "any", false, false, false, 50), "getWebpPath", [0 => "medium"], "method", false, false, false, 50), "html", null, true);
                            echo "\" type=\"image/webp\">
                          ";
                        }
                        // line 52
                        echo "                          <source srcset=\"/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 52), "first", [], "any", false, false, false, 52), "getWebPath", [0 => "medium"], "method", false, false, false, 52), "html", null, true);
                        echo "\" type=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 52), "first", [], "any", false, false, false, 52), "mime", [], "any", false, false, false, 52), "html", null, true);
                        echo "\">
                        <img class=\"hq\" alt=\"";
                        // line 53
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 53), "first", [], "any", false, false, false, 53), "description_alt", [], "any", false, false, false, 53), "html", null, true);
                        echo "\" src=\"/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 53), "first", [], "any", false, false, false, 53), "getWebPath", [0 => "medium"], "method", false, false, false, 53), "html", null, true);
                        echo "\" type=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 53), "first", [], "any", false, false, false, 53), "mime", [], "any", false, false, false, 53), "html", null, true);
                        echo "\" loading=\"lazy\" width=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 53), "first", [], "any", false, false, false, 53), "width", [], "any", false, false, false, 53), "html", null, true);
                        echo "\" height=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 53), "first", [], "any", false, false, false, 53), "height", [], "any", false, false, false, 53), "html", null, true);
                        echo "\" onload=\"this.style.opacity=1";
                        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "media", [], "any", false, false, false, 53), "first", [], "any", false, false, false, 53), "hasBlurred", [], "any", false, false, false, 53)) {
                            echo ";this.closest('.lcp').getElementsByClassName('lq')[0].style.opacity=0;";
                        }
                        echo "\" style=\"opacity: 0;\">
                        </picture>

                      ";
                    } elseif (twig_get_attribute($this->env, $this->source,                     // line 56
$context["Entry"], "image", [], "any", false, false, false, 56)) {
                        // line 57
                        echo "
                        ";
                        // line 58
                        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 58), "hasBlurred", [], "any", false, false, false, 58)) {
                            // line 59
                            echo "                          <picture>
                            ";
                            // line 60
                            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 60), "hasWebp", [], "method", false, false, false, 60)) {
                                // line 61
                                echo "                              <source srcset=\"/";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 61), "getBlurredWebpPath", [], "any", false, false, false, 61), "html", null, true);
                                echo "\" type=\"image/webp\">
                            ";
                            }
                            // line 63
                            echo "                            <source srcset=\"/";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 63), "getBlurredWebPath", [], "any", false, false, false, 63), "html", null, true);
                            echo "\" type=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 63), "mime", [], "any", false, false, false, 63), "html", null, true);
                            echo "\">
                            <img class=\"lq\" alt=\"";
                            // line 64
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 64), "description_alt", [], "any", false, false, false, 64), "html", null, true);
                            echo "\" src=\"/";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 64), "getBlurredWebPath", [], "any", false, false, false, 64), "html", null, true);
                            echo "\" type=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 64), "mime", [], "any", false, false, false, 64), "html", null, true);
                            echo "\" loading=\"lazy\" width=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 64), "width", [], "any", false, false, false, 64), "html", null, true);
                            echo "\" height=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 64), "height", [], "any", false, false, false, 64), "html", null, true);
                            echo "\">
                          </picture>
                        ";
                        }
                        // line 67
                        echo "                        <picture>
                          ";
                        // line 68
                        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 68), "hasWebp", [], "method", false, false, false, 68)) {
                            // line 69
                            echo "                            <source srcset=\"/";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 69), "getWebpPath", [], "any", false, false, false, 69), "html", null, true);
                            echo "\" type=\"image/webp\">
                          ";
                        }
                        // line 71
                        echo "                          <source srcset=\"/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 71), "getWebPath", [], "any", false, false, false, 71), "html", null, true);
                        echo "\" type=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 71), "mime", [], "any", false, false, false, 71), "html", null, true);
                        echo "\">
                        <img class=\"hq\" alt=\"";
                        // line 72
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 72), "description_alt", [], "any", false, false, false, 72), "html", null, true);
                        echo "\" src=\"/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 72), "getWebPath", [], "any", false, false, false, 72), "html", null, true);
                        echo "\" type=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 72), "mime", [], "any", false, false, false, 72), "html", null, true);
                        echo "\" loading=\"lazy\" width=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 72), "width", [], "any", false, false, false, 72), "html", null, true);
                        echo "\" height=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 72), "height", [], "any", false, false, false, 72), "html", null, true);
                        echo "\" onload=\"this.style.opacity=1";
                        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Entry"], "image", [], "any", false, false, false, 72), "hasBlurred", [], "any", false, false, false, 72)) {
                            echo ";this.closest('.lcp').getElementsByClassName('lq')[0].style.opacity=0;";
                        }
                        echo "\" style=\"opacity: 0;\">
                        </picture>
                      ";
                    }
                    // line 75
                    echo "                    </div>
                  </div>
                  <div class=\"content\">
                    <h3>
                      ";
                    // line 79
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Entry"], "label", [], "any", false, false, false, 79), "html", null, true);
                    echo "
                    </h3>
                    ";
                    // line 81
                    if ( !twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "nodate", [], "array", true, true, false, 81)) {
                        // line 82
                        echo "                      <span class=\"date\">
                        ";
                        // line 83
                        echo twig_escape_filter($this->env, $this->extensions['App\Trinity\BlogBundle\Twig\Extension\Timeago']->timeagoFilter(twig_get_attribute($this->env, $this->source, $context["Entry"], "datePublish", [], "any", false, false, false, 83)), "html", null, true);
                        echo "
                      </span>
                    ";
                    }
                    // line 86
                    echo "                  </div>
                ";
                } else {
                    // line 88
                    echo "                  <div>
                    ";
                    // line 89
                    if ( !twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "nodate", [], "array", true, true, false, 89)) {
                        // line 90
                        echo "                      <div class=\"date\">";
                        echo twig_escape_filter($this->env, $this->extensions['App\Trinity\BlogBundle\Twig\Extension\Timeago']->timeagoFilter(twig_get_attribute($this->env, $this->source, $context["Entry"], "datePublish", [], "any", false, false, false, 90)), "html", null, true);
                        echo "</div>
                    ";
                    }
                    // line 92
                    echo "                    <a href=\"";
                    echo twig_escape_filter($this->env, ($context["detailUrl"] ?? null), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Entry"], "label", [], "any", false, false, false, 92), "html", null, true);
                    echo "</a>
                  </div>
                ";
                }
                // line 95
                echo "              </div>
            </a>

            ";
                // line 152
                echo "          </div>
        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Entry'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 155
            echo "    </div>

    ";
            // line 157
            if ((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "show_all", [], "array", true, true, false, 157) &&  !twig_test_empty((($__internal_compile_2 = ($context["config"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["show_all"] ?? null) : null)))) {
                // line 158
                echo "    <div class=\"more-news text-center\">
      <a href=\"";
                // line 159
                echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
                echo "\" class=\"btn\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Alle berichten tonen", [], "blog"), "html", null, true);
                echo "</a>
    </div>
    ";
            }
            // line 162
            echo "
  ";
            // line 163
            if ((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "pagination", [], "array", true, true, false, 163) &&  !twig_test_empty((($__internal_compile_3 = ($context["config"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["pagination"] ?? null) : null)))) {
                // line 164
                echo "    ";
                $this->loadTemplate("@Cms/pagination_bootstrap.html.twig", "@TrinityBlog/default/blog.html.twig", 164)->display(twig_to_array(["currentPage" =>                 // line 165
($context["page"] ?? null), "lastPage" =>                 // line 166
($context["pages"] ?? null), "showAlwaysFirstAndLast" => true]));
                // line 169
                echo "  ";
            }
            // line 170
            echo "</div>
";
        }
    }

    public function getTemplateName()
    {
        return "@TrinityBlog/default/blog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  376 => 170,  373 => 169,  371 => 166,  370 => 165,  368 => 164,  366 => 163,  363 => 162,  355 => 159,  352 => 158,  350 => 157,  346 => 155,  338 => 152,  333 => 95,  324 => 92,  318 => 90,  316 => 89,  313 => 88,  309 => 86,  303 => 83,  300 => 82,  298 => 81,  293 => 79,  287 => 75,  269 => 72,  262 => 71,  256 => 69,  254 => 68,  251 => 67,  237 => 64,  230 => 63,  224 => 61,  222 => 60,  219 => 59,  217 => 58,  214 => 57,  212 => 56,  194 => 53,  187 => 52,  181 => 50,  179 => 49,  176 => 48,  162 => 45,  155 => 44,  149 => 42,  147 => 41,  144 => 40,  141 => 39,  139 => 38,  135 => 36,  133 => 35,  124 => 33,  120 => 32,  117 => 31,  114 => 30,  111 => 29,  108 => 28,  105 => 27,  102 => 26,  99 => 25,  96 => 24,  93 => 23,  90 => 22,  87 => 21,  83 => 20,  78 => 17,  75 => 16,  72 => 15,  69 => 14,  66 => 13,  63 => 12,  60 => 11,  57 => 10,  54 => 9,  51 => 8,  48 => 7,  46 => 6,  42 => 4,  40 => 3,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityBlog/default/blog.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/BlogBundle/Resources/views/default/blog.html.twig");
    }
}
