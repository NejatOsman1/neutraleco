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

/* @TrinityBlog/default/entry.html.twig */
class __TwigTemplate_bc7763457fca24b14d2239ad6d34076a extends Template
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
        // line 4
        $context["shareUrl"] = (((($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 4), "attributes", [], "any", false, false, false, 4), "get", [0 => "_route"], "method", false, false, false, 4)) . "/") . twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "id", [], "any", false, false, false, 4)) . "/") . twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "getDefaultSlug", [], "any", false, false, false, 4));
        // line 5
        if (twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "slug", [], "any", false, false, false, 5)) {
            // line 6
            echo "\t";
            $context["shareUrl"] = (($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 6), "attributes", [], "any", false, false, false, 6), "get", [0 => "_route"], "method", false, false, false, 6)) . "/") . twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "getSlug", [], "any", false, false, false, 6));
        }
        // line 8
        echo "
";
        // line 28
        echo "
<script type=\"application/ld+json\">
{
\t\"@context\": \"https://schema.org\",
\t\"@type\": \"NewsArticle\",
\t\"author\": \"";
        // line 33
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "company", [], "any", false, false, false, 33), "html", null, true);
        echo "\",
\t\"publisher\": {
\t\t\"@type\": \"Organization\",
\t\t";
        // line 36
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "media", [], "any", false, false, false, 36), "first", [], "any", false, false, false, 36))) {
            // line 37
            echo "\t\t\"logo\": {
\t\t\t\"@type\": \"ImageObject\",
\t\t\t\"url\": \"https://";
            // line 39
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "host", [], "any", false, false, false, 39) . "/") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "media", [], "any", false, false, false, 39), "first", [], "any", false, false, false, 39), "webPath", [], "method", false, false, false, 39)), "html", null, true);
            echo "\"
\t\t},
\t\t";
        }
        // line 42
        echo "\t\t\"name\": \"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "company", [], "any", false, false, false, 42), "html", null, true);
        echo "\"
\t},
\t\"mainEntityOfPage\": {
\t\t\"@type\": \"WebPage\",
\t\t\"@id\": \"https://";
        // line 46
        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "host", [], "any", false, false, false, 46) . $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 46), "attributes", [], "any", false, false, false, 46), "get", [0 => "_route"], "method", false, false, false, 46), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 46), "attributes", [], "any", false, false, false, 46), "get", [0 => "_route_params"], "method", false, false, false, 46))), "html", null, true);
        echo "\"
\t},
\t";
        // line 48
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "media", [], "any", false, false, false, 48), "first", [], "any", false, false, false, 48))) {
            // line 49
            echo "\t\"image\": {
\t\t\"@type\": \"ImageObject\",
\t\t\"url\": \"https://";
            // line 51
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "host", [], "any", false, false, false, 51) . "/") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "media", [], "any", false, false, false, 51), "first", [], "any", false, false, false, 51), "webPath", [], "method", false, false, false, 51)), "html", null, true);
            echo "\"
\t},
\t";
        }
        // line 54
        echo "\t\"headline\": \"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "label", [], "any", false, false, false, 54), "html", null, true);
        echo "\",
\t\"datePublished\": \"";
        // line 55
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "datePublish", [], "any", false, false, false, 55), "Y-m-d H:i:s"), "html", null, true);
        echo "\",
\t\"dateModified\": \"";
        // line 56
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "dateEdit", [], "any", false, false, false, 56), "Y-m-d H:i:s"), "html", null, true);
        echo "\"
}
</script>


";
        // line 61
        if (file_exists("../templates/override/blog/entry.html.twig")) {
            // line 62
            echo "  ";
            $this->loadTemplate("override/blog/entry.html.twig", "@TrinityBlog/default/entry.html.twig", 62)->display($context);
        } else {
            // line 65
            echo "
\t";
            // line 77
            echo "
\t";
            // line 79
            echo "\t";
            if ((twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "media", [], "any", false, false, false, 79) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "media", [], "any", false, false, false, 79), "count", [], "any", false, false, false, 79) > 0))) {
                // line 80
                echo "\t\t<link rel=\"image_src\" href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 80), "getSchemeAndHttpHost", [], "method", false, false, false, 80), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "media", [], "any", false, false, false, 80), "first", [], "any", false, false, false, 80), "getWebPath", [], "any", false, false, false, 80), "html", null, true);
                echo "\"/>
\t";
            } elseif (twig_get_attribute($this->env, $this->source,             // line 81
($context["Entry"] ?? null), "image", [], "any", false, false, false, 81)) {
                // line 82
                echo "\t\t<link rel=\"image_src\" href=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 82), "getSchemeAndHttpHost", [], "method", false, false, false, 82), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 82), "getWebPath", [], "any", false, false, false, 82), "html", null, true);
                echo "\"/>
\t";
            }
            // line 84
            echo "
\t<div class=\"blog v3 blog-entry\">
\t\t";
            // line 86
            if ((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "uri", [], "any", true, true, false, 86) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "uri", [], "any", false, false, false, 86)))) {
                // line 87
                echo "\t\t\t";
                $context["baseUrl_detail"] = ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("homepage") . twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "uri", [], "any", false, false, false, 87));
                // line 88
                echo "\t\t";
            } else {
                // line 89
                echo "\t\t\t";
                $context["baseUrl_detail"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 89), "attributes", [], "any", false, false, false, 89), "get", [0 => "_route"], "method", false, false, false, 89));
                // line 90
                echo "\t\t";
            }
            // line 91
            echo "\t\t";
            if ((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "uri_overview", [], "any", true, true, false, 91) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "uri_overview", [], "any", false, false, false, 91)))) {
                // line 92
                echo "\t\t\t";
                $context["baseUrl"] = ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("homepage") . twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "uri_overview", [], "any", false, false, false, 92));
                // line 93
                echo "\t\t";
            } else {
                // line 94
                echo "\t\t\t";
                $context["baseUrl"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 94), "attributes", [], "any", false, false, false, 94), "get", [0 => "_route"], "method", false, false, false, 94));
                // line 95
                echo "\t\t";
            }
            // line 96
            echo "
\t\t";
            // line 97
            if (($context["error"] ?? null)) {
                // line 98
                echo "\t\t\t<div class=\"message error\">
\t\t\t\t";
                // line 99
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(($context["error"] ?? null), [], "blog"), "html", null, true);
                echo "
\t\t\t</div>
\t\t";
            } else {
                // line 102
                echo "\t\t\t";
                if (($context["inline_error"] ?? null)) {
                    // line 103
                    echo "\t\t\t\t<div class=\"message error\">
\t\t\t\t\t";
                    // line 104
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(($context["inline_error"] ?? null), [], "blog"), "html", null, true);
                    echo "
\t\t\t\t</div>
\t\t\t";
                }
                // line 107
                echo "
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t<div class=\"col-12 col-lg-8 col-xl-6 offset-lg-3\">
\t\t\t\t\t\t\t<div class=\"entry\">
\t\t\t\t\t\t\t\t<h1>";
                // line 113
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "label", [], "any", false, false, false, 113), "html", null, true);
                echo "</h1>
\t\t\t\t\t\t\t\t<div class=\"summary\">
\t\t\t\t\t\t\t\t\t";
                // line 115
                if ( !twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "nodate", [], "array", true, true, false, 115)) {
                    // line 116
                    echo "\t\t\t\t\t\t\t\t\t<small class=\"date\"><i class=\"fa fa-clock\"></i> ";
                    echo twig_escape_filter($this->env, $this->extensions['App\Trinity\BlogBundle\Twig\Extension\Timeago']->timeagoFilter(twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "datePublish", [], "any", false, false, false, 116)), "html", null, true);
                    echo "</small>
\t\t\t\t\t\t\t\t\t";
                }
                // line 118
                echo "\t\t\t\t\t\t\t\t\t";
                if ((twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "user", [], "any", false, false, false, 118) &&  !twig_test_empty(twig_trim_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "user", [], "any", false, false, false, 118), "getName", [], "any", false, false, false, 118))))) {
                    // line 119
                    echo "\t\t\t\t\t\t\t\t\t\t<small class=\"author\"><i class=\"fa fa-user\"></i>
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 120
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "user", [], "any", false, false, false, 120), "getName", [], "any", false, false, false, 120), "html", null, true);
                    echo "</small>
\t\t\t\t\t\t\t\t\t";
                }
                // line 122
                echo "\t\t\t\t\t\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "allow_replies", [], "array", true, true, false, 122)) {
                    // line 123
                    echo "
\t\t\t\t\t\t\t\t\t<small class=\"reply-count\">
\t\t\t\t\t\t\t\t\t\t<a href=\"#replies\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-comment\"></i> ";
                    // line 126
                    if (twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "countReplies", [], "any", false, false, false, 126)) {
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "countReplies", [], "any", false, false, false, 126), "html", null, true);
                    } else {
                        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nog geen reacties", [], "blog");
                    }
                    // line 127
                    echo "\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</small>
\t\t\t\t\t\t\t\t\t";
                }
                // line 130
                echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t
\t\t\t\t<div class=\"col-12 col-lg-3\">
\t\t\t\t\t";
                // line 139
                echo "\t\t\t\t\t";
                if ((array_key_exists("Anchors", $context) &&  !twig_test_empty(($context["Anchors"] ?? null)))) {
                    // line 140
                    echo "\t\t\t\t\t<div class=\"blog-nav sticky-top\">
\t\t\t\t\t\t<div class=\"blog-nav-container\">
\t\t\t\t\t\t\t<h3>In dit artikel</h3>
\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t";
                    // line 144
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["Anchors"] ?? null));
                    foreach ($context['_seq'] as $context["key"] => $context["anchor"]) {
                        // line 145
                        echo "\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t<a class=\"anchor\" href=\"#anchor-";
                        // line 146
                        echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $context["anchor"], "html", null, true);
                        echo "</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['key'], $context['anchor'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 149
                    echo "\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t<h3>Artikelen in categorie</h3>
\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t";
                    // line 152
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "category", [], "any", false, false, false, 152), "first", [], "any", false, false, false, 152), "entry", [], "any", false, false, false, 152));
                    foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                        // line 153
                        echo "\t\t\t\t\t\t\t\t";
                        if ((twig_get_attribute($this->env, $this->source, $context["cat"], "isexternal", [], "any", false, false, false, 153) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["cat"], "externalurl", [], "any", false, false, false, 153)))) {
                            // line 154
                            echo "\t\t\t\t\t\t\t\t";
                            $context["detailUrl"] = twig_get_attribute($this->env, $this->source, $context["cat"], "externalurl", [], "any", false, false, false, 154);
                            // line 155
                            echo "\t\t\t\t\t\t\t\t";
                        } else {
                            // line 156
                            echo "\t\t\t\t\t\t\t\t";
                            $context["detailUrl"] = ((((($context["baseUrl_detail"] ?? null) . "/") . twig_get_attribute($this->env, $this->source, $context["cat"], "id", [], "any", false, false, false, 156)) . "/") . twig_get_attribute($this->env, $this->source, $context["cat"], "getDefaultSlug", [], "any", false, false, false, 156));
                            // line 157
                            echo "\t\t\t\t\t\t\t\t";
                        }
                        // line 158
                        echo "\t\t\t\t\t\t\t\t";
                        $context["shareUrl"] = (((($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 158), "attributes", [], "any", false, false, false, 158), "get", [0 => "_route"], "method", false, false, false, 158)) . "/") . twig_get_attribute($this->env, $this->source, $context["cat"], "id", [], "any", false, false, false, 158)) . "/") . twig_get_attribute($this->env, $this->source, $context["cat"], "getDefaultSlug", [], "any", false, false, false, 158));
                        // line 159
                        echo "\t\t\t\t\t\t\t\t";
                        if ((twig_get_attribute($this->env, $this->source, $context["cat"], "slug", [], "any", false, false, false, 159) && (twig_get_attribute($this->env, $this->source, $context["cat"], "isexternal", [], "any", false, false, false, 159) == false))) {
                            // line 160
                            echo "\t\t\t\t\t\t\t\t";
                            $context["detailUrl"] = ((($context["baseUrl_detail"] ?? null) . "/") . twig_get_attribute($this->env, $this->source, $context["cat"], "getSlug", [], "any", false, false, false, 160));
                            // line 161
                            echo "\t\t\t\t\t\t\t\t";
                            $context["shareUrl"] = (($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 161), "attributes", [], "any", false, false, false, 161), "get", [0 => "_route"], "method", false, false, false, 161)) . "/") . twig_get_attribute($this->env, $this->source, $context["cat"], "getSlug", [], "any", false, false, false, 161));
                            // line 162
                            echo "\t\t\t\t\t\t\t\t";
                        }
                        // line 163
                        echo "\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"";
                        // line 164
                        echo twig_escape_filter($this->env, ($context["detailUrl"] ?? null), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "label", [], "any", false, false, false, 164), "html", null, true);
                        echo "</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 167
                    echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 171
                echo "\t\t\t\t</div>

\t\t\t\t<div class=\"col-12 col-lg-8 col-xl-6\">
\t\t\t\t\t<div class=\"intro\">
\t\t\t\t\t\t";
                // line 175
                echo twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "intro", [], "any", false, false, false, 175);
                echo "
\t\t\t\t\t</div>

\t\t\t\t\t";
                // line 178
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "media", [], "any", false, false, false, 178))) {
                    // line 179
                    echo "\t\t\t\t\t\t<div class=\"outline\">
\t\t\t\t\t\t\t<div class=\"swiper-content\" id=\"blog_image\">
\t\t\t\t\t\t\t\t<div class=\"swiper-container swiper-blog-gallery\">
\t\t\t\t\t\t\t\t\t<div class=\"swiper-wrapper\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 183
                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "media", [], "any", false, false, false, 183), "first", [], "any", false, false, false, 183)) {
                        // line 184
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "media", [], "any", false, false, false, 184));
                        foreach ($context['_seq'] as $context["_key"] => $context["img"]) {
                            // line 185
                            echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"/";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["img"], "getWebpPath", [0 => ""], "method", false, false, false, 185), "html", null, true);
                            echo "\" class=\"swiper-slide\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"lcp\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 187
                            if (twig_get_attribute($this->env, $this->source, $context["img"], "hasBlurred", [], "any", false, false, false, 187)) {
                                // line 188
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<picture>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                // line 189
                                if (twig_get_attribute($this->env, $this->source, $context["img"], "hasWebp", [], "method", false, false, false, 189)) {
                                    // line 190
                                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<source srcset=\"/";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["img"], "getBlurredWebpPath", [0 => "medium"], "method", false, false, false, 190), "html", null, true);
                                    echo "\" type=\"image/webp\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                                }
                                // line 192
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<source srcset=\"/";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["img"], "getBlurredWebPath", [0 => "medium"], "method", false, false, false, 192), "html", null, true);
                                echo "\" type=\"";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["img"], "mime", [], "any", false, false, false, 192), "html", null, true);
                                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"lq\" alt=\"";
                                // line 193
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["img"], "description_alt", [], "any", false, false, false, 193), "html", null, true);
                                echo "\" src=\"/";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["img"], "getBlurredWebPath", [0 => "medium"], "method", false, false, false, 193), "html", null, true);
                                echo "\" type=\"";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["img"], "mime", [], "any", false, false, false, 193), "html", null, true);
                                echo "\" loading=\"lazy\" width=\"";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["img"], "width", [], "any", false, false, false, 193), "html", null, true);
                                echo "\" height=\"";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["img"], "height", [], "any", false, false, false, 193), "html", null, true);
                                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</picture>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 196
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<picture>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 197
                            if (twig_get_attribute($this->env, $this->source, $context["img"], "hasWebp", [], "method", false, false, false, 197)) {
                                // line 198
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<source srcset=\"/";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["img"], "getWebpPath", [0 => "full"], "method", false, false, false, 198), "html", null, true);
                                echo "\" type=\"image/webp\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 200
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<source srcset=\"/";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["img"], "getWebPath", [0 => "full"], "method", false, false, false, 200), "html", null, true);
                            echo "\" type=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["img"], "mime", [], "any", false, false, false, 200), "html", null, true);
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"hq\" alt=\"";
                            // line 201
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["img"], "description_alt", [], "any", false, false, false, 201), "html", null, true);
                            echo "\" src=\"/";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["img"], "getWebPath", [0 => "full"], "method", false, false, false, 201), "html", null, true);
                            echo "\" type=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["img"], "mime", [], "any", false, false, false, 201), "html", null, true);
                            echo "\" loading=\"lazy\" width=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["img"], "width", [], "any", false, false, false, 201), "html", null, true);
                            echo "\" height=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["img"], "height", [], "any", false, false, false, 201), "html", null, true);
                            echo "\" onload=\"this.style.opacity=1\" style=\"opacity: 0;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t</picture>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['img'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 206
                        echo "\t\t\t\t\t\t\t\t\t\t";
                    } elseif ( !(null === twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 206))) {
                        // line 207
                        echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["img"] ?? null), "getWebpPath", [0 => ""], "method", false, false, false, 207), "html", null, true);
                        echo "\" class=\"swiper-slide\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"lcp\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 209
                        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 209), "hasBlurred", [], "any", false, false, false, 209)) {
                            // line 210
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<picture>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 211
                            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 211), "hasWebp", [], "method", false, false, false, 211)) {
                                // line 212
                                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<source srcset=\"/";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 212), "getBlurredWebpPath", [0 => "medium"], "method", false, false, false, 212), "html", null, true);
                                echo "\" type=\"image/webp\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            }
                            // line 214
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<source srcset=\"/";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 214), "getBlurredWebPath", [0 => "medium"], "method", false, false, false, 214), "html", null, true);
                            echo "\" type=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 214), "mime", [], "any", false, false, false, 214), "html", null, true);
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"lq\" alt=\"";
                            // line 215
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 215), "description_alt", [], "any", false, false, false, 215), "html", null, true);
                            echo "\" src=\"/";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 215), "getBlurredWebPath", [0 => "medium"], "method", false, false, false, 215), "html", null, true);
                            echo "\" type=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 215), "mime", [], "any", false, false, false, 215), "html", null, true);
                            echo "\" loading=\"lazy\" width=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 215), "width", [], "any", false, false, false, 215), "html", null, true);
                            echo "\" height=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 215), "height", [], "any", false, false, false, 215), "html", null, true);
                            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</picture>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 218
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<picture>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 219
                        if (twig_get_attribute($this->env, $this->source, ($context["img"] ?? null), "hasWebp", [], "method", false, false, false, 219)) {
                            // line 220
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<source srcset=\"/";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 220), "getWebpPath", [0 => "full"], "method", false, false, false, 220), "html", null, true);
                            echo "\" type=\"image/webp\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 222
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<source srcset=\"/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 222), "getWebPath", [0 => "full"], "method", false, false, false, 222), "html", null, true);
                        echo "\" type=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 222), "mime", [], "any", false, false, false, 222), "html", null, true);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"hq\" alt=\"";
                        // line 223
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 223), "description_alt", [], "any", false, false, false, 223), "html", null, true);
                        echo "\" src=\"/";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 223), "getWebPath", [0 => "full"], "method", false, false, false, 223), "html", null, true);
                        echo "\" type=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 223), "mime", [], "any", false, false, false, 223), "html", null, true);
                        echo "\" loading=\"lazy\" width=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 223), "width", [], "any", false, false, false, 223), "html", null, true);
                        echo "\" height=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "image", [], "any", false, false, false, 223), "height", [], "any", false, false, false, 223), "html", null, true);
                        echo "\" onload=\"this.style.opacity=1\" style=\"opacity: 0;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t</picture>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 228
                    echo "\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"swiper-pagination\"></div>
\t\t\t\t\t\t\t\t\t<div class=\"swiper-button-prev\"></div>
\t\t\t\t\t\t\t\t\t<div class=\"swiper-button-next\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 237
                echo "
\t\t\t\t\t
\t\t\t\t\t<div class=\"body\">
\t\t\t\t\t\t";
                // line 240
                echo twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "body", [], "any", false, false, false, 240);
                echo "
\t\t\t\t\t</div>

\t\t\t\t\t<br/>

\t\t\t\t\t<div class=\"d-flex justify-content-between align-items-center\">
\t\t\t\t\t\t<a href=\"javascript:history.back()\" class=\"btn btn-bordered\"><i class=\"fa fa-arrow-left\"></i> ";
                // line 246
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Terug", [], "blog"), "html", null, true);
                echo "</a>

\t\t\t\t\t\t";
                // line 248
                if ((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "sharing", [], "array", true, true, false, 248) &&  !twig_test_empty((($__internal_compile_0 = ($context["config"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["sharing"] ?? null) : null)))) {
                    // line 249
                    echo "\t\t\t\t\t\t\t<div class=\"share\">
\t\t\t\t\t\t\t\t<span class=\"label\">";
                    // line 250
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Delen", [], "blog"), "html", null, true);
                    echo "</span>

\t\t\t\t\t\t\t\t";
                    // line 253
                    echo "\t\t\t\t\t\t\t\t<a class=\"resp-sharing-button__link\" href=\"https://facebook.com/sharer/sharer.php?u=";
                    echo twig_escape_filter($this->env, ($context["shareUrl"] ?? null), "html", null, true);
                    echo "\" target=\"_blank\" title=\"Facebook\" aria-label=\"\">
\t\t\t\t\t\t\t\t\t<div class=\"resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small\">
\t\t\t\t\t\t\t\t\t\t<div aria-hidden=\"true\" class=\"resp-sharing-button__icon resp-sharing-button__icon--solid\">
\t\t\t\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" viewbox=\"0 0 24 24\"><path d=\"M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z\"/></svg>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t";
                    // line 262
                    echo "\t\t\t\t\t\t\t\t<a class=\"resp-sharing-button__link\" href=\"https://twitter.com/intent/tweet/?text=";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "label", [], "any", false, false, false, 262), "html", null, true);
                    echo "&amp;url=";
                    echo twig_escape_filter($this->env, ($context["shareUrl"] ?? null), "html", null, true);
                    echo "\" target=\"_blank\" title=\"Twitter\" aria-label=\"\">
\t\t\t\t\t\t\t\t\t<div class=\"resp-sharing-button resp-sharing-button--twitter resp-sharing-button--small\">
\t\t\t\t\t\t\t\t\t\t<div aria-hidden=\"true\" class=\"resp-sharing-button__icon resp-sharing-button__icon--solid\">
\t\t\t\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" viewbox=\"0 0 24 24\"><path
\t\t\t\t\t\t\t\t\t\t\t\td=\"M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z\"/></svg>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t";
                    // line 272
                    echo "\t\t\t\t\t\t\t\t<a class=\"resp-sharing-button__link\" href=\"mailto:?subject=";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "label", [], "any", false, false, false, 272), "html", null, true);
                    echo "&amp;body=";
                    echo twig_escape_filter($this->env, ($context["shareUrl"] ?? null), "html", null, true);
                    echo "\" target=\"_self\" title=\"E-Mail\" aria-label=\"\">
\t\t\t\t\t\t\t\t\t<div class=\"resp-sharing-button resp-sharing-button--email resp-sharing-button--small\">
\t\t\t\t\t\t\t\t\t\t<div aria-hidden=\"true\" class=\"resp-sharing-button__icon resp-sharing-button__icon--solid\">
\t\t\t\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" viewbox=\"0 0 24 24\"><path
\t\t\t\t\t\t\t\t\t\t\t\td=\"M22 4H2C.9 4 0 4.9 0 6v12c0 1.1.9 2 2 2h20c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zM7.25 14.43l-3.5 2c-.08.05-.17.07-.25.07-.17 0-.34-.1-.43-.25-.14-.24-.06-.55.18-.68l3.5-2c.24-.14.55-.06.68.18.14.24.06.55-.18.68zm4.75.07c-.1 0-.2-.03-.27-.08l-8.5-5.5c-.23-.15-.3-.46-.15-.7.15-.22.46-.3.7-.14L12 13.4l8.23-5.32c.23-.15.54-.08.7.15.14.23.07.54-.16.7l-8.5 5.5c-.08.04-.17.07-.27.07zm8.93 1.75c-.1.16-.26.25-.43.25-.08 0-.17-.02-.25-.07l-3.5-2c-.24-.13-.32-.44-.18-.68s.44-.32.68-.18l3.5 2c.24.13.32.44.18.68z\"/></svg>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t";
                    // line 282
                    echo "\t\t\t\t\t\t\t\t<a class=\"resp-sharing-button__link\" href=\"whatsapp://send?text=";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "label", [], "any", false, false, false, 282), "html", null, true);
                    echo "%20";
                    echo twig_escape_filter($this->env, ($context["shareUrl"] ?? null), "html", null, true);
                    echo "\" target=\"_blank\" title=\"WhatsApp\" aria-label=\"\">
\t\t\t\t\t\t\t\t\t<div class=\"resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--small\">
\t\t\t\t\t\t\t\t\t\t<div aria-hidden=\"true\" class=\"resp-sharing-button__icon resp-sharing-button__icon--solid\">
\t\t\t\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" viewbox=\"0 0 24 24\"><path
\t\t\t\t\t\t\t\t\t\t\t\td=\"M20.1 3.9C17.9 1.7 15 .5 12 .5 5.8.5.7 5.6.7 11.9c0 2 .5 3.9 1.5 5.6L.6 23.4l6-1.6c1.6.9 3.5 1.3 5.4 1.3 6.3 0 11.4-5.1 11.4-11.4-.1-2.8-1.2-5.7-3.3-7.8zM12 21.4c-1.7 0-3.3-.5-4.8-1.3l-.4-.2-3.5 1 1-3.4L4 17c-1-1.5-1.4-3.2-1.4-5.1 0-5.2 4.2-9.4 9.4-9.4 2.5 0 4.9 1 6.7 2.8 1.8 1.8 2.8 4.2 2.8 6.7-.1 5.2-4.3 9.4-9.5 9.4zm5.1-7.1c-.3-.1-1.7-.9-1.9-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.1-.2.2-.3.2-.6.1s-1.2-.5-2.3-1.4c-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6s.3-.3.4-.5c.2-.1.3-.3.4-.5.1-.2 0-.4 0-.5C10 9 9.3 7.6 9 7c-.1-.4-.4-.3-.5-.3h-.6s-.4.1-.7.3c-.3.3-1 1-1 2.4s1 2.8 1.1 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.3-.3-.4-.6-.5z\"/></svg>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t";
                    // line 292
                    echo "\t\t\t\t\t\t\t\t<a class=\"resp-sharing-button__link\" href=\"https://telegram.me/share/url?text=";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "label", [], "any", false, false, false, 292), "html", null, true);
                    echo "&amp;url=";
                    echo twig_escape_filter($this->env, ($context["shareUrl"] ?? null), "html", null, true);
                    echo "\" target=\"_blank\" title=\"Telegram\" aria-label=\"\">
\t\t\t\t\t\t\t\t\t<div class=\"resp-sharing-button resp-sharing-button--telegram resp-sharing-button--small\">
\t\t\t\t\t\t\t\t\t\t<div aria-hidden=\"true\" class=\"resp-sharing-button__icon resp-sharing-button__icon--solid\">
\t\t\t\t\t\t\t\t\t\t\t<svg xmlns=\"http://www.w3.org/2000/svg\" viewbox=\"0 0 24 24\"><path
\t\t\t\t\t\t\t\t\t\t\t\td=\"M.707 8.475C.275 8.64 0 9.508 0 9.508s.284.867.718 1.03l5.09 1.897 1.986 6.38a1.102 1.102 0 0 0 1.75.527l2.96-2.41a.405.405 0 0 1 .494-.013l5.34 3.87a1.1 1.1 0 0 0 1.046.135 1.1 1.1 0 0 0 .682-.803l3.91-18.795A1.102 1.102 0 0 0 22.5.075L.706 8.475z\"/></svg>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                }
                // line 302
                echo "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t";
                // line 308
                if ((twig_in_filter("WebshopBundle", ($context["installed"] ?? null)) && ($context["products"] ?? null))) {
                    // line 309
                    echo "\t\t\t\t\t\t<script type=\"text/javascript\">
\t\t\t\t\t\tvar baseUrl = '";
                    // line 310
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("homepage");
                    echo "';
\t\t\t\t\t\tvar cart_url = '";
                    // line 311
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cart");
                    echo "';
\t\t\t\t\t\tvar products_url = '";
                    // line 312
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("products");
                    echo "';
\t\t\t\t\t\tvar doNotReload = false;
\t\t\t\t\t\t</script>

\t\t\t\t\t\t<div class=\"blog-products\">
\t\t\t\t\t\t\t<h5>";
                    // line 317
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gerelateerde producten", [], "blog"), "html", null, true);
                    echo "</h5>

\t\t\t\t\t\t\t<div class=\"webshop-bundle webshop-widget\">
\t\t\t\t\t\t    <div class=\"swiper-content\">
\t\t\t\t\t  \t\t  <div class=\"swiper-container swiper-products\">
\t\t\t\t    \t\t\t  <div class=\"swiper-wrapper\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 323
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["Product"]) {
                        // line 324
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        $context["OriginalProduct"] = $context["Product"];
                        // line 325
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        $context["Category"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Product"], "category", [], "any", false, false, false, 325), "first", [], "any", false, false, false, 325);
                        // line 326
                        echo "\t\t\t\t\t\t\t\t\t\t\t";
                        if ((twig_get_attribute($this->env, $this->source, $context["Product"], "type", [], "any", false, false, false, 326) == 1)) {
                            // line 327
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
                            $context["Product"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Product"], "linkedProducts", [], "any", false, false, false, 327), "first", [], "any", false, false, false, 327);
                            // line 328
                            echo "\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 329
                        echo "\t\t\t\t    \t\t\t\t  <div class=\"swiper-slide\">
\t\t\t\t\t    \t\t\t\t\t<div class=\"product\">
\t\t\t\t\t    \t\t\t\t\t  ";
                        // line 331
                        $this->loadTemplate("@TrinityWebshop/elements/productCard.html.twig", "@TrinityBlog/default/entry.html.twig", 331)->display(twig_array_merge($context, ["config" => ["allow_cart" => true, "show_image" => true, "allow_list" => false, "show_price" => true]]));
                        // line 332
                        echo "\t\t\t\t\t    \t\t\t\t\t</div>
\t\t\t\t    \t\t\t\t  </div>
\t\t\t\t\t\t\t\t\t\t\t";
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Product'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 335
                    echo "\t\t\t\t    \t\t\t  </div>

\t\t\t\t\t          <div class=\"swiper-pagination d-md-none\"></div>
\t\t\t\t\t          <div class=\"swiper-button-prev d-none d-md-block\"></div>
\t\t\t\t\t          <div class=\"swiper-button-next d-none d-md-block\"></div>
\t\t\t\t\t        </div>
\t\t\t\t\t\t\t  </div>
\t\t\t\t\t    </div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 345
                echo "
\t\t\t\t\t";
                // line 376
                echo "\t\t\t\t</div>

\t\t\t\t<div class=\"col-12 col-lg-6 offset-lg-3\">
\t\t\t\t\t";
                // line 379
                $macros["__internal_parse_0"] = $this->macros["__internal_parse_0"] = $this;
                // line 380
                echo "
\t\t\t\t\t<div class=\"blog-replies-wrapper\">
\t\t\t\t\t\t";
                // line 382
                if (twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "allow_replies", [], "array", true, true, false, 382)) {
                    // line 383
                    echo "\t\t\t\t\t\t\t<a name=\"replies\"></a>
\t\t\t\t\t\t\t<div class=\"card blog-replies\">
\t\t\t\t\t\t\t\t<div class=\"card-header\">
\t\t\t\t\t\t\t\t\t";
                    // line 386
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reacties", [], "blog"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t(";
                    // line 387
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "countReplies", [], "any", false, false, false, 387), "html", null, true);
                    echo ")
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t";
                    // line 390
                    if (($context["replies"] ?? null)) {
                        // line 391
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_call_macro($macros["__internal_parse_0"], "macro_parseReplies", [($context["replies"] ?? null), 0], 391, $context, $this->getSourceContext());
                        echo "
\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 393
                        echo "\t\t\t\t\t\t\t\t\t\t";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Vul het formulier hieronder in om als eerste te reageren op dit artikel.", [], "blog"), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 395
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"card blog-reply-form\">
\t\t\t\t\t\t\t\t<div class=\"card-header\">
\t\t\t\t\t\t\t\t\t";
                    // line 400
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reageren op het artikel", [], "blog"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t";
                    // line 403
                    echo                     $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["Form"] ?? null), 'form_start', ["attr" => ["id" => "blog-entry-form"]]);
                    echo "
\t\t\t\t\t\t\t\t\t";
                    // line 404
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["Form"] ?? null), 'errors');
                    echo "

\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"replyto\" id=\"replyto\" value=\"\"/>

\t\t\t\t\t\t\t\t\t<div id=\"quote-preview\"></div>

\t\t\t\t\t\t\t\t\t";
                    // line 410
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "firstname", [], "any", false, false, false, 410), 'row', ["label" => false, "attr" => ["placeholder" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Voornaam", [], "blog")]]);
                    echo "
\t\t\t\t\t\t\t\t\t";
                    // line 411
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "lastname", [], "any", false, false, false, 411), 'row', ["label" => false, "attr" => ["placeholder" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Achternaam", [], "blog")]]);
                    echo "
\t\t\t\t\t\t\t\t\t";
                    // line 412
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "email", [], "any", false, false, false, 412), 'row', ["label" => false, "attr" => ["placeholder" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("E-mailadres", [], "blog")]]);
                    echo "
\t\t\t\t\t\t\t\t\t";
                    // line 413
                    echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "comment", [], "any", false, false, false, 413), 'row', ["label" => false, "attr" => ["placeholder" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reactie", [], "blog"), "class" => "reply-editor"]]);
                    echo "

\t\t\t\t\t\t\t\t\t<div class=\"form-check\">
\t\t\t\t\t\t\t\t\t\t<input checked=\"checked\" type=\"checkbox\" id=\"replies-notification\" name=\"optin[reply]\" value=\"1\" class=\"form-check-input\" />
\t\t\t\t\t\t\t\t\t\t<label class=\"form-check-label\" for=\"replies-notification\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 418
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Ik wil een e-mail ontvangen wanneer iemand op mij reageert.", [], "blog");
                    echo "
\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"form-check\">
\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" name=\"optin[new]\" id=\"replies-new-message\" value=\"1\" class=\"form-check-input\" />
\t\t\t\t\t\t\t\t\t\t<label class=\"form-check-label\" for=\"replies-new-message\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 425
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Ik wil een e-mail ontvangen wanneer een nieuw bericht wordt geplaatst.", [], "blog");
                    echo "
\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<br>

\t\t\t\t\t\t\t\t\t";
                    // line 431
                    echo twig_get_attribute($this->env, $this->source, ($context["settings"] ?? null), "getGoogleRecaptchaWidget", [], "method", false, false, false, 431);
                    echo "

\t\t\t\t\t\t\t\t\t<button class=\"btn\" id=\"blog-reply-submit\" type=\"submit\">";
                    // line 433
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Plaats reactie", [], "blog"), "html", null, true);
                    echo "</button>

\t\t\t\t\t\t\t\t\t";
                    // line 435
                    echo                     $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["Form"] ?? null), 'form_end');
                    echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                }
                // line 439
                echo "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t";
            }
            // line 444
            echo "
\t";
            // line 445
            if ((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "related", [], "array", true, true, false, 445) &&  !twig_test_empty((($__internal_compile_1 = ($context["config"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["related"] ?? null) : null)))) {
                // line 446
                echo "\t\t";
                $context["relationCount"] = 0;
                // line 447
                echo "\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["related"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["SubEntry"]) {
                    // line 448
                    echo "\t\t\t";
                    if (($context["SubEntry"] != ($context["Entry"] ?? null))) {
                        // line 449
                        echo "\t\t\t\t";
                        $context["relationCount"] = 1;
                        // line 450
                        echo "\t\t\t";
                    }
                    // line 451
                    echo "\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['SubEntry'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 452
                echo "
\t\t<div class=\"blog blog-category mb-4\">
\t\t\t<div class=\"introblock\">
\t\t\t\t<div class=\"introtitle\">";
                // line 455
                echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Artikelen in categorie", [], "blog");
                echo "</div>
\t\t\t\t<div class=\"introtext\">";
                // line 456
                echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bekijk meer gerelateerde berichten", [], "blog");
                echo "</div>
\t\t\t</div>

\t\t\t<div class=\"swiper-content\">
\t\t\t\t<div class=\"swiper-container swiper-blog\">
\t\t\t\t\t<div class=\"swiper-wrapper\">
\t\t\t\t\t\t";
                // line 462
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "category", [], "any", false, false, false, 462), "first", [], "any", false, false, false, 462), "entry", [], "any", false, false, false, 462));
                foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                    // line 463
                    echo "\t\t\t\t\t\t";
                    if ((twig_get_attribute($this->env, $this->source, $context["cat"], "isexternal", [], "any", false, false, false, 463) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["cat"], "externalurl", [], "any", false, false, false, 463)))) {
                        // line 464
                        echo "\t\t\t\t\t\t";
                        $context["detailUrl"] = twig_get_attribute($this->env, $this->source, $context["cat"], "externalurl", [], "any", false, false, false, 464);
                        // line 465
                        echo "\t\t\t\t\t\t";
                    } else {
                        // line 466
                        echo "\t\t\t\t\t\t";
                        $context["detailUrl"] = ((((($context["baseUrl_detail"] ?? null) . "/") . twig_get_attribute($this->env, $this->source, $context["cat"], "id", [], "any", false, false, false, 466)) . "/") . twig_get_attribute($this->env, $this->source, $context["cat"], "getDefaultSlug", [], "any", false, false, false, 466));
                        // line 467
                        echo "\t\t\t\t\t\t";
                    }
                    // line 468
                    echo "\t\t\t\t\t\t";
                    $context["shareUrl"] = (((($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 468), "attributes", [], "any", false, false, false, 468), "get", [0 => "_route"], "method", false, false, false, 468)) . "/") . twig_get_attribute($this->env, $this->source, $context["cat"], "id", [], "any", false, false, false, 468)) . "/") . twig_get_attribute($this->env, $this->source, $context["cat"], "getDefaultSlug", [], "any", false, false, false, 468));
                    // line 469
                    echo "\t\t\t\t\t\t";
                    if ((twig_get_attribute($this->env, $this->source, $context["cat"], "slug", [], "any", false, false, false, 469) && (twig_get_attribute($this->env, $this->source, $context["cat"], "isexternal", [], "any", false, false, false, 469) == false))) {
                        // line 470
                        echo "\t\t\t\t\t\t";
                        $context["detailUrl"] = ((($context["baseUrl_detail"] ?? null) . "/") . twig_get_attribute($this->env, $this->source, $context["cat"], "getSlug", [], "any", false, false, false, 470));
                        // line 471
                        echo "\t\t\t\t\t\t";
                        $context["shareUrl"] = (($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getUrl(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 471), "attributes", [], "any", false, false, false, 471), "get", [0 => "_route"], "method", false, false, false, 471)) . "/") . twig_get_attribute($this->env, $this->source, $context["cat"], "getSlug", [], "any", false, false, false, 471));
                        // line 472
                        echo "\t\t\t\t\t\t";
                    }
                    echo "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"swiper-slide\">
\t\t\t\t\t\t\t\t<div class=\"item card\">

\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 476
                    echo twig_escape_filter($this->env, ($context["detailUrl"] ?? null), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t<div class=\"heightfix\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 478
                    if (( !twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "minimal", [], "array", true, true, false, 478) || ((($__internal_compile_2 = ($context["config"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["minimal"] ?? null) : null) == "0"))) {
                        // line 479
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"thumb\">

\t\t                          <div class=\"lcp image\">
\t\t                            <picture>
\t\t                              ";
                        // line 483
                        if ((twig_get_attribute($this->env, $this->source, $context["cat"], "media", [], "any", false, false, false, 483) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "media", [], "any", false, false, false, 483), "count", [], "any", false, false, false, 483) > 0))) {
                            // line 484
                            echo "\t\t                                ";
                            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "media", [], "any", false, false, false, 484), "first", [], "any", false, false, false, 484), "hasWebp", [], "method", false, false, false, 484)) {
                                // line 485
                                echo "\t\t                                  <source srcset=\"/";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "media", [], "any", false, false, false, 485), "first", [], "any", false, false, false, 485), "getWebpPath", [], "any", false, false, false, 485), "html", null, true);
                                echo "\" type=\"image/webp\">
\t\t                                ";
                            }
                            // line 487
                            echo "\t\t                                <source srcset=\"/";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "media", [], "any", false, false, false, 487), "first", [], "any", false, false, false, 487), "getWebPath", [], "any", false, false, false, 487), "html", null, true);
                            echo "\" type=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "media", [], "any", false, false, false, 487), "first", [], "any", false, false, false, 487), "mime", [], "any", false, false, false, 487), "html", null, true);
                            echo "\">
\t\t                                <img class=\"hq\" alt=\"";
                            // line 488
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "media", [], "any", false, false, false, 488), "first", [], "any", false, false, false, 488), "description_alt", [], "any", false, false, false, 488), "html", null, true);
                            echo "\" src=\"/";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "media", [], "any", false, false, false, 488), "first", [], "any", false, false, false, 488), "getWebPath", [], "any", false, false, false, 488), "html", null, true);
                            echo "\" type=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "media", [], "any", false, false, false, 488), "first", [], "any", false, false, false, 488), "mime", [], "any", false, false, false, 488), "html", null, true);
                            echo "\" loading=\"lazy\" width=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "media", [], "any", false, false, false, 488), "first", [], "any", false, false, false, 488), "width", [], "any", false, false, false, 488), "html", null, true);
                            echo "\" height=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "media", [], "any", false, false, false, 488), "first", [], "any", false, false, false, 488), "height", [], "any", false, false, false, 488), "html", null, true);
                            echo "\"  onload=\"this.style.opacity=1\" style=\"opacity: 0;\">
\t\t                              ";
                        } elseif (twig_get_attribute($this->env, $this->source,                         // line 489
$context["cat"], "image", [], "any", false, false, false, 489)) {
                            // line 490
                            echo "\t\t                                ";
                            if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "media", [], "any", false, false, false, 490), "first", [], "any", false, false, false, 490), "hasWebp", [], "method", false, false, false, 490)) {
                                // line 491
                                echo "\t\t                                  <source srcset=\"/";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "image", [], "any", false, false, false, 491), "getWebpPath", [], "any", false, false, false, 491), "html", null, true);
                                echo "\" type=\"image/webp\">
\t\t                                ";
                            }
                            // line 493
                            echo "\t\t                                <source srcset=\"/";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "image", [], "any", false, false, false, 493), "getWebPath", [], "any", false, false, false, 493), "html", null, true);
                            echo "\" type=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "image", [], "any", false, false, false, 493), "mime", [], "any", false, false, false, 493), "html", null, true);
                            echo "\">
\t\t                                <img class=\"hq\" alt=\"";
                            // line 494
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "image", [], "any", false, false, false, 494), "description_alt", [], "any", false, false, false, 494), "html", null, true);
                            echo "\" src=\"/";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "image", [], "any", false, false, false, 494), "getWebPath", [], "any", false, false, false, 494), "html", null, true);
                            echo "\" type=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "image", [], "any", false, false, false, 494), "mime", [], "any", false, false, false, 494), "html", null, true);
                            echo "\" loading=\"lazy\" width=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "image", [], "any", false, false, false, 494), "width", [], "any", false, false, false, 494), "html", null, true);
                            echo "\" height=\"";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["cat"], "image", [], "any", false, false, false, 494), "height", [], "any", false, false, false, 494), "html", null, true);
                            echo "\"  onload=\"this.style.opacity=1\" style=\"opacity: 0;\">
\t\t                              ";
                        }
                        // line 496
                        echo "\t\t                            </picture>
\t\t                          </div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"content\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<h3>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 501
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "label", [], "any", false, false, false, 501), "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t</h3>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 503
                        if ( !twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "nodate", [], "array", true, true, false, 503)) {
                            // line 504
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"date\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 505
                            echo twig_escape_filter($this->env, $this->extensions['App\Trinity\BlogBundle\Twig\Extension\Timeago']->timeagoFilter(twig_get_attribute($this->env, $this->source, $context["cat"], "datePublish", [], "any", false, false, false, 505)), "html", null, true);
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 508
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 510
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 511
                        if ( !twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "nodate", [], "array", true, true, false, 511)) {
                            // line 512
                            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"date\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                            // line 513
                            echo twig_escape_filter($this->env, $this->extensions['App\Trinity\BlogBundle\Twig\Extension\Timeago']->timeagoFilter(twig_get_attribute($this->env, $this->source, $context["cat"], "datePublish", [], "any", false, false, false, 513)), "html", null, true);
                            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        }
                        // line 516
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                        echo twig_escape_filter($this->env, ($context["detailUrl"] ?? null), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "label", [], "any", false, false, false, 516), "html", null, true);
                        echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 519
                    echo "\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 524
                echo "\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"swiper-pagination\"></div>
\t\t\t\t\t<div class=\"swiper-button-prev\"></div>
\t\t\t\t\t<div class=\"swiper-button-next\"></div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>

\t\t";
                // line 533
                if ((($context["relationCount"] ?? null) > 0)) {
                    // line 534
                    echo "\t\t\t";
                    $context["counter"] = 0;
                    // line 535
                    echo "\t\t\t\t<div class=\"blog blog-related\">
\t\t\t\t\t<div class=\"introblock\">
\t\t\t\t\t\t<div class=\"introtitle\">";
                    // line 537
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Meer nieuws", [], "blog");
                    echo "</div>
\t\t\t\t\t\t<div class=\"introtext\">";
                    // line 538
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bekijk meer gerelateerde berichten", [], "blog");
                    echo "</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"swiper-content\">
\t\t\t\t\t\t<div class=\"swiper-container swiper-blog\">
\t\t\t\t\t\t\t";
                    // line 543
                    if ((twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "uri", [], "array", true, true, false, 543) &&  !twig_test_empty((($__internal_compile_3 = ($context["config"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["uri"] ?? null) : null)))) {
                        // line 544
                        echo "\t\t\t\t\t\t\t";
                        $context["baseUrl"] = ($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("homepage") . (($__internal_compile_4 = ($context["config"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["uri"] ?? null) : null));
                        // line 545
                        echo "\t\t\t\t\t\t\t";
                    } else {
                        // line 546
                        echo "\t\t\t\t\t\t\t\t";
                        $context["baseUrl"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 546), "attributes", [], "any", false, false, false, 546), "get", [0 => "_route"], "method", false, false, false, 546));
                        // line 547
                        echo "\t\t\t\t\t\t\t";
                    }
                    // line 548
                    echo "
\t\t\t\t\t\t\t<div class=\"swiper-wrapper\">
\t\t\t\t\t\t\t\t";
                    // line 550
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["related"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["SubEntry"]) {
                        // line 551
                        echo "\t\t\t\t\t\t\t\t\t";
                        if (((((($context["SubEntry"] != ($context["Entry"] ?? null)) && (($context["counter"] ?? null) < 6)) && (twig_get_attribute($this->env, $this->source, $context["SubEntry"], "concept", [], "any", false, false, false, 551) == 0)) && (twig_date_converter($this->env) > twig_get_attribute($this->env, $this->source, $context["SubEntry"], "datePublish", [], "any", false, false, false, 551))) && (twig_date_converter($this->env) < twig_get_attribute($this->env, $this->source, $context["SubEntry"], "datePublishEnd", [], "any", false, false, false, 551)))) {
                            // line 552
                            echo "\t\t\t\t\t\t\t\t\t";
                            $context["counter"] = (($context["counter"] ?? null) + 1);
                            // line 553
                            echo "\t\t\t\t\t\t\t\t\t";
                            $context["detailUrl"] = ((((($context["baseUrl"] ?? null) . "/") . twig_get_attribute($this->env, $this->source, $context["SubEntry"], "id", [], "any", false, false, false, 553)) . "/") . twig_get_attribute($this->env, $this->source, $context["SubEntry"], "getDefaultSlug", [], "any", false, false, false, 553));
                            // line 554
                            echo "\t\t\t\t\t\t\t\t\t";
                            if (twig_get_attribute($this->env, $this->source, $context["SubEntry"], "slug", [], "any", false, false, false, 554)) {
                                // line 555
                                echo "\t\t\t\t\t\t\t\t\t\t";
                                $context["detailUrl"] = ((($context["baseUrl"] ?? null) . "/") . twig_get_attribute($this->env, $this->source, $context["SubEntry"], "getSlug", [], "any", false, false, false, 555));
                                // line 556
                                echo "\t\t\t\t\t\t\t\t\t";
                            }
                            // line 557
                            echo "\t\t\t\t\t\t\t\t\t<div class=\"swiper-slide\">
\t\t\t\t\t\t\t\t\t\t<div class=\"item card\">

\t\t                  <a href=\"";
                            // line 560
                            echo twig_escape_filter($this->env, ($context["detailUrl"] ?? null), "html", null, true);
                            echo "\">
\t\t                    <div class=\"heightfix\">
\t\t                      ";
                            // line 562
                            if (( !twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "minimal", [], "array", true, true, false, 562) || ((($__internal_compile_5 = ($context["config"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5["minimal"] ?? null) : null) == "0"))) {
                                // line 563
                                echo "\t\t                        <div class=\"thumb\">

\t\t                          <div class=\"lcp image\">
\t\t                            <picture>
\t\t                              ";
                                // line 567
                                if ((twig_get_attribute($this->env, $this->source, $context["SubEntry"], "media", [], "any", false, false, false, 567) && (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "media", [], "any", false, false, false, 567), "count", [], "any", false, false, false, 567) > 0))) {
                                    // line 568
                                    echo "\t\t                                ";
                                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "media", [], "any", false, false, false, 568), "first", [], "any", false, false, false, 568), "hasWebp", [], "method", false, false, false, 568)) {
                                        // line 569
                                        echo "\t\t                                  <source srcset=\"/";
                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "media", [], "any", false, false, false, 569), "first", [], "any", false, false, false, 569), "getWebpPath", [], "any", false, false, false, 569), "html", null, true);
                                        echo "\" type=\"image/webp\">
\t\t                                ";
                                    }
                                    // line 571
                                    echo "\t\t                                <source srcset=\"/";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "media", [], "any", false, false, false, 571), "first", [], "any", false, false, false, 571), "getWebPath", [], "any", false, false, false, 571), "html", null, true);
                                    echo "\" type=\"";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "media", [], "any", false, false, false, 571), "first", [], "any", false, false, false, 571), "mime", [], "any", false, false, false, 571), "html", null, true);
                                    echo "\">
\t\t                                <img class=\"hq\" alt=\"";
                                    // line 572
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "media", [], "any", false, false, false, 572), "first", [], "any", false, false, false, 572), "description_alt", [], "any", false, false, false, 572), "html", null, true);
                                    echo "\" src=\"/";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "media", [], "any", false, false, false, 572), "first", [], "any", false, false, false, 572), "getWebPath", [], "any", false, false, false, 572), "html", null, true);
                                    echo "\" type=\"";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "media", [], "any", false, false, false, 572), "first", [], "any", false, false, false, 572), "mime", [], "any", false, false, false, 572), "html", null, true);
                                    echo "\" loading=\"lazy\" width=\"";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "media", [], "any", false, false, false, 572), "first", [], "any", false, false, false, 572), "width", [], "any", false, false, false, 572), "html", null, true);
                                    echo "\" height=\"";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "media", [], "any", false, false, false, 572), "first", [], "any", false, false, false, 572), "height", [], "any", false, false, false, 572), "html", null, true);
                                    echo "\"  onload=\"this.style.opacity=1\" style=\"opacity: 0;\">
\t\t                              ";
                                } elseif (twig_get_attribute($this->env, $this->source,                                 // line 573
$context["SubEntry"], "image", [], "any", false, false, false, 573)) {
                                    // line 574
                                    echo "\t\t                                ";
                                    if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "media", [], "any", false, false, false, 574), "first", [], "any", false, false, false, 574), "hasWebp", [], "method", false, false, false, 574)) {
                                        // line 575
                                        echo "\t\t                                  <source srcset=\"/";
                                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "image", [], "any", false, false, false, 575), "getWebpPath", [], "any", false, false, false, 575), "html", null, true);
                                        echo "\" type=\"image/webp\">
\t\t                                ";
                                    }
                                    // line 577
                                    echo "\t\t                                <source srcset=\"/";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "image", [], "any", false, false, false, 577), "getWebPath", [], "any", false, false, false, 577), "html", null, true);
                                    echo "\" type=\"";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "image", [], "any", false, false, false, 577), "mime", [], "any", false, false, false, 577), "html", null, true);
                                    echo "\">
\t\t                                <img class=\"hq\" alt=\"";
                                    // line 578
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "image", [], "any", false, false, false, 578), "description_alt", [], "any", false, false, false, 578), "html", null, true);
                                    echo "\" src=\"/";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "image", [], "any", false, false, false, 578), "getWebPath", [], "any", false, false, false, 578), "html", null, true);
                                    echo "\" type=\"";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "image", [], "any", false, false, false, 578), "mime", [], "any", false, false, false, 578), "html", null, true);
                                    echo "\" loading=\"lazy\" width=\"";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "image", [], "any", false, false, false, 578), "width", [], "any", false, false, false, 578), "html", null, true);
                                    echo "\" height=\"";
                                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "image", [], "any", false, false, false, 578), "height", [], "any", false, false, false, 578), "html", null, true);
                                    echo "\"  onload=\"this.style.opacity=1\" style=\"opacity: 0;\">
\t\t                              ";
                                }
                                // line 580
                                echo "\t\t                            </picture>
\t\t                          </div>
\t\t                        </div>
\t\t                        <div class=\"content\">
\t\t                          <h3>
\t\t                            ";
                                // line 585
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "label", [], "any", false, false, false, 585), "html", null, true);
                                echo "
\t\t                          </h3>
\t\t                          ";
                                // line 587
                                if ( !twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "nodate", [], "array", true, true, false, 587)) {
                                    // line 588
                                    echo "\t\t                            <span class=\"date\">
\t\t                              ";
                                    // line 589
                                    echo twig_escape_filter($this->env, $this->extensions['App\Trinity\BlogBundle\Twig\Extension\Timeago']->timeagoFilter(twig_get_attribute($this->env, $this->source, $context["SubEntry"], "datePublish", [], "any", false, false, false, 589)), "html", null, true);
                                    echo "
\t\t                            </span>
\t\t                          ";
                                }
                                // line 592
                                echo "\t\t                        </div>
\t\t                      ";
                            } else {
                                // line 594
                                echo "\t\t                        <div>
\t\t                          ";
                                // line 595
                                if ( !twig_get_attribute($this->env, $this->source, ($context["config"] ?? null), "nodate", [], "array", true, true, false, 595)) {
                                    // line 596
                                    echo "\t\t                            <div class=\"date\">";
                                    echo twig_escape_filter($this->env, $this->extensions['App\Trinity\BlogBundle\Twig\Extension\Timeago']->timeagoFilter(twig_get_attribute($this->env, $this->source, $context["SubEntry"], "datePublish", [], "any", false, false, false, 596)), "html", null, true);
                                    echo "</div>
\t\t                          ";
                                }
                                // line 598
                                echo "\t\t                          <a href=\"";
                                echo twig_escape_filter($this->env, ($context["detailUrl"] ?? null), "html", null, true);
                                echo "\">";
                                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["SubEntry"], "label", [], "any", false, false, false, 598), "html", null, true);
                                echo "</a>
\t\t                        </div>
\t\t                      ";
                            }
                            // line 601
                            echo "\t\t                    </div>
\t\t                  </a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                        }
                        // line 606
                        echo "\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['SubEntry'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 607
                    echo "\t\t\t\t\t\t\t</div>

\t\t          <div class=\"swiper-pagination\"></div>
\t\t          <div class=\"swiper-button-prev\"></div>
\t\t          <div class=\"swiper-button-next\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t";
                }
                // line 616
                echo "\t";
            }
        }
        // line 618
        echo "
<script>

</script>";
    }

    // line 346
    public function macro_parseReplies($__replies__ = null, $__depth__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "replies" => $__replies__,
            "depth" => $__depth__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 347
            echo "\t\t\t\t\t\t";
            $macros["self"] = $this;
            // line 348
            echo "\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["replies"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["Reply"]) {
                // line 349
                echo "\t\t\t\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["Reply"], "approved", [], "any", false, false, false, 349)) {
                    // line 350
                    echo "\t\t\t\t\t\t\t\t<div class=\"reply reply-depth-";
                    echo twig_escape_filter($this->env, ($context["depth"] ?? null), "html", null, true);
                    echo " ";
                    echo ((((($context["depth"] ?? null) == 0) && (twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 350) == 1))) ? ("first") : (""));
                    echo "\">
\t\t\t\t\t\t\t\t\t<div class=\"reply-wrapper\">
\t\t\t\t\t\t\t\t\t\t<div class=\"data\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"name\">";
                    // line 353
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Reply"], "firstname", [], "any", false, false, false, 353), "html", null, true);
                    echo "</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"date\">";
                    // line 354
                    echo twig_escape_filter($this->env, $this->extensions['App\Trinity\BlogBundle\Twig\Extension\Timeago']->timeagoFilter(twig_get_attribute($this->env, $this->source, $context["Reply"], "date", [], "any", false, false, false, 354)), "html", null, true);
                    echo "</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"comment\" id=\"comment-";
                    // line 356
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Reply"], "id", [], "any", false, false, false, 356), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"comment-content\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 358
                    echo twig_get_attribute($this->env, $this->source, $context["Reply"], "comment", [], "any", false, false, false, 358);
                    echo "
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"actions\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"action-reply btn btn-bordered btn-small\" data-target=\"";
                    // line 363
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Reply"], "id", [], "any", false, false, false, 363), "html", null, true);
                    echo "\" data-name=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Reply"], "firstname", [], "any", false, false, false, 363), "html", null, true);
                    echo "\" data-date=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Reply"], "date", [], "any", false, false, false, 363), "format", [0 => "Y-m-d H:i:s"], "method", false, false, false, 363), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-reply\"></i> ";
                    // line 364
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reageren", [], "blog");
                    echo "</a>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"action-quote btn btn-bordered btn-small\" data-target=\"";
                    // line 365
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Reply"], "id", [], "any", false, false, false, 365), "html", null, true);
                    echo "\" data-name=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Reply"], "firstname", [], "any", false, false, false, 365), "html", null, true);
                    echo "\" data-date=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Reply"], "date", [], "any", false, false, false, 365), "format", [0 => "Y-m-d H:i:s"], "method", false, false, false, 365), "html", null, true);
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-quote-right\"></i> ";
                    // line 366
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Citeren", [], "blog");
                    echo "</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"child-replies\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 370
                    echo twig_call_macro($macros["self"], "macro_parseReplies", [twig_get_attribute($this->env, $this->source, $context["Reply"], "replies", [], "any", false, false, false, 370), (($context["depth"] ?? null) + 1)], 370, $context, $this->getSourceContext());
                    echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                }
                // line 374
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Reply'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 375
            echo "\t\t\t\t\t";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "@TrinityBlog/default/entry.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1458 => 375,  1444 => 374,  1437 => 370,  1430 => 366,  1422 => 365,  1418 => 364,  1410 => 363,  1402 => 358,  1397 => 356,  1392 => 354,  1388 => 353,  1379 => 350,  1376 => 349,  1358 => 348,  1355 => 347,  1341 => 346,  1334 => 618,  1330 => 616,  1319 => 607,  1313 => 606,  1306 => 601,  1297 => 598,  1291 => 596,  1289 => 595,  1286 => 594,  1282 => 592,  1276 => 589,  1273 => 588,  1271 => 587,  1266 => 585,  1259 => 580,  1246 => 578,  1239 => 577,  1233 => 575,  1230 => 574,  1228 => 573,  1216 => 572,  1209 => 571,  1203 => 569,  1200 => 568,  1198 => 567,  1192 => 563,  1190 => 562,  1185 => 560,  1180 => 557,  1177 => 556,  1174 => 555,  1171 => 554,  1168 => 553,  1165 => 552,  1162 => 551,  1158 => 550,  1154 => 548,  1151 => 547,  1148 => 546,  1145 => 545,  1142 => 544,  1140 => 543,  1132 => 538,  1128 => 537,  1124 => 535,  1121 => 534,  1119 => 533,  1108 => 524,  1098 => 519,  1089 => 516,  1083 => 513,  1080 => 512,  1078 => 511,  1075 => 510,  1071 => 508,  1065 => 505,  1062 => 504,  1060 => 503,  1055 => 501,  1048 => 496,  1035 => 494,  1028 => 493,  1022 => 491,  1019 => 490,  1017 => 489,  1005 => 488,  998 => 487,  992 => 485,  989 => 484,  987 => 483,  981 => 479,  979 => 478,  974 => 476,  966 => 472,  963 => 471,  960 => 470,  957 => 469,  954 => 468,  951 => 467,  948 => 466,  945 => 465,  942 => 464,  939 => 463,  935 => 462,  926 => 456,  922 => 455,  917 => 452,  911 => 451,  908 => 450,  905 => 449,  902 => 448,  897 => 447,  894 => 446,  892 => 445,  889 => 444,  882 => 439,  875 => 435,  870 => 433,  865 => 431,  856 => 425,  846 => 418,  838 => 413,  834 => 412,  830 => 411,  826 => 410,  817 => 404,  813 => 403,  807 => 400,  800 => 395,  794 => 393,  788 => 391,  786 => 390,  780 => 387,  776 => 386,  771 => 383,  769 => 382,  765 => 380,  763 => 379,  758 => 376,  755 => 345,  743 => 335,  727 => 332,  725 => 331,  721 => 329,  718 => 328,  715 => 327,  712 => 326,  709 => 325,  706 => 324,  689 => 323,  680 => 317,  672 => 312,  668 => 311,  664 => 310,  661 => 309,  659 => 308,  651 => 302,  635 => 292,  620 => 282,  605 => 272,  590 => 262,  578 => 253,  573 => 250,  570 => 249,  568 => 248,  563 => 246,  554 => 240,  549 => 237,  538 => 228,  522 => 223,  515 => 222,  509 => 220,  507 => 219,  504 => 218,  490 => 215,  483 => 214,  477 => 212,  475 => 211,  472 => 210,  470 => 209,  464 => 207,  461 => 206,  442 => 201,  435 => 200,  429 => 198,  427 => 197,  424 => 196,  410 => 193,  403 => 192,  397 => 190,  395 => 189,  392 => 188,  390 => 187,  384 => 185,  379 => 184,  377 => 183,  371 => 179,  369 => 178,  363 => 175,  357 => 171,  351 => 167,  340 => 164,  337 => 163,  334 => 162,  331 => 161,  328 => 160,  325 => 159,  322 => 158,  319 => 157,  316 => 156,  313 => 155,  310 => 154,  307 => 153,  303 => 152,  298 => 149,  287 => 146,  284 => 145,  280 => 144,  274 => 140,  271 => 139,  261 => 130,  256 => 127,  250 => 126,  245 => 123,  242 => 122,  237 => 120,  234 => 119,  231 => 118,  225 => 116,  223 => 115,  218 => 113,  210 => 107,  204 => 104,  201 => 103,  198 => 102,  192 => 99,  189 => 98,  187 => 97,  184 => 96,  181 => 95,  178 => 94,  175 => 93,  172 => 92,  169 => 91,  166 => 90,  163 => 89,  160 => 88,  157 => 87,  155 => 86,  151 => 84,  143 => 82,  141 => 81,  134 => 80,  131 => 79,  128 => 77,  125 => 65,  121 => 62,  119 => 61,  111 => 56,  107 => 55,  102 => 54,  96 => 51,  92 => 49,  90 => 48,  85 => 46,  77 => 42,  71 => 39,  67 => 37,  65 => 36,  59 => 33,  52 => 28,  49 => 8,  45 => 6,  43 => 5,  41 => 4,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityBlog/default/entry.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/BlogBundle/Resources/views/default/entry.html.twig");
    }
}
