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

/* @Cms/pagination_bootstrap.html.twig */
class __TwigTemplate_deb9d0e702d1261b9410f28e33e16b04 extends Template
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
        ob_start(function () { return ''; });
        // line 4
        echo "    ";
        if ((($context["lastPage"] ?? null) > 1)) {
            // line 5
            echo "
        ";
            // line 7
            echo "        ";
            $context["extremePagesLimit"] = 3;
            // line 8
            echo "
        ";
            // line 10
            echo "        ";
            $context["nearbyPagesLimit"] = 2;
            // line 11
            echo "
        ";
            // line 12
            if ( !array_key_exists("currentFilters", $context)) {
                $context["currentFilters"] = [];
            }
            // line 13
            echo "        ";
            if ( !array_key_exists("paginationPath", $context)) {
                $context["paginationPath"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 13), "attributes", [], "any", false, false, false, 13), "get", [0 => "_route"], "method", false, false, false, 13);
            }
            // line 14
            echo "        ";
            if ( !array_key_exists("showAlwaysFirstAndLast", $context)) {
                $context["showAlwaysFirstAndLast"] = true;
            }
            // line 15
            echo "
        <div class=\"pagination-wrapper\">
        <ul id=\"pagination\" class=\"pagination\">
            ";
            // line 18
            if ((($context["currentPage"] ?? null) > 1)) {
                // line 19
                echo "                <li class=\"page-item\"><a class=\"page-link\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(($context["paginationPath"] ?? null), twig_array_merge(($context["currentFilters"] ?? null), ["page" => (($context["currentPage"] ?? null) - 1)])), "html", null, true);
                echo "\" data-page=\"";
                echo twig_escape_filter($this->env, (($context["currentPage"] ?? null) - 1), "html", null, true);
                echo "\"><i class=\"fa fa-chevron-left\"></i></a></li>

                ";
                // line 21
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, ($context["extremePagesLimit"] ?? null)));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 22
                    echo "                    ";
                    if (($context["i"] < (($context["currentPage"] ?? null) - ($context["nearbyPagesLimit"] ?? null)))) {
                        // line 23
                        echo "                    <li class=\"page-item\"><a class=\"page-link\" href=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(($context["paginationPath"] ?? null), twig_array_merge(($context["currentFilters"] ?? null), ["page" => $context["i"]])), "html", null, true);
                        echo "\" data-page=\"";
                        echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                        echo "</a></li>
                    ";
                    }
                    // line 25
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 26
                echo "
                ";
                // line 27
                if (((($context["extremePagesLimit"] ?? null) + 1) < (($context["currentPage"] ?? null) - ($context["nearbyPagesLimit"] ?? null)))) {
                    // line 28
                    echo "                    <span class=\"sep-dots\">...</span>
                ";
                }
                // line 30
                echo "
                ";
                // line 31
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range((($context["currentPage"] ?? null) - ($context["nearbyPagesLimit"] ?? null)), (($context["currentPage"] ?? null) - 1)));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 32
                    echo "                    ";
                    if (($context["i"] > 0)) {
                        // line 33
                        echo "                    <li class=\"page-item\"><a class=\"page-link\" href=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(($context["paginationPath"] ?? null), twig_array_merge(($context["currentFilters"] ?? null), ["page" => $context["i"]])), "html", null, true);
                        echo "\" data-page=\"";
                        echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                        echo "</a></li>
                    ";
                    }
                    // line 35
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 36
                echo "            ";
            } elseif (($context["showAlwaysFirstAndLast"] ?? null)) {
                // line 37
                echo "                <li class=\"page-item disabled\"><a class=\"page-link\" href=\"#\"><i class=\"fa fa-chevron-left\"></i></a></li>
            ";
            }
            // line 39
            echo "
            <li class=\"page-item active\"><a class=\"page-link\" href=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(($context["paginationPath"] ?? null), twig_array_merge(($context["currentFilters"] ?? null), ["page" => ($context["currentPage"] ?? null)])), "html", null, true);
            echo "\" data-page=\"";
            echo twig_escape_filter($this->env, ($context["currentPage"] ?? null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, ($context["currentPage"] ?? null), "html", null, true);
            echo "</a></li>

            ";
            // line 42
            if ((($context["currentPage"] ?? null) < ($context["lastPage"] ?? null))) {
                // line 43
                echo "                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range((($context["currentPage"] ?? null) + 1), (($context["currentPage"] ?? null) + ($context["nearbyPagesLimit"] ?? null))));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 44
                    echo "                ";
                    if (($context["i"] <= ($context["lastPage"] ?? null))) {
                        // line 45
                        echo "                    <li class=\"page-item\"><a class=\"page-link\" href=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(($context["paginationPath"] ?? null), twig_array_merge(($context["currentFilters"] ?? null), ["page" => $context["i"]])), "html", null, true);
                        echo "\" data-page=\"";
                        echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                        echo "</a></li>
                ";
                    }
                    // line 47
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 48
                echo "
                ";
                // line 49
                if (((($context["lastPage"] ?? null) - ($context["extremePagesLimit"] ?? null)) > (($context["currentPage"] ?? null) + ($context["nearbyPagesLimit"] ?? null)))) {
                    // line 50
                    echo "                    <span class=\"sep-dots\">...</span>
                ";
                }
                // line 52
                echo "
                ";
                // line 53
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(((($context["lastPage"] ?? null) - ($context["extremePagesLimit"] ?? null)) + 1), ($context["lastPage"] ?? null)));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 54
                    echo "                    ";
                    if (($context["i"] > (($context["currentPage"] ?? null) + ($context["nearbyPagesLimit"] ?? null)))) {
                        // line 55
                        echo "                    <li class=\"page-item\"><a class=\"page-link\" href=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(($context["paginationPath"] ?? null), twig_array_merge(($context["currentFilters"] ?? null), ["page" => $context["i"]])), "html", null, true);
                        echo "\" data-page=\"";
                        echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                        echo "</a></li>
                    ";
                    }
                    // line 57
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 58
                echo "
                <li class=\"page-item\"><a class=\"page-link\" href=\"";
                // line 59
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(($context["paginationPath"] ?? null), twig_array_merge(($context["currentFilters"] ?? null), ["page" => (($context["currentPage"] ?? null) + 1)])), "html", null, true);
                echo "\" data-page=\"";
                echo twig_escape_filter($this->env, (($context["currentPage"] ?? null) + 1), "html", null, true);
                echo "\"><i class=\"fa fa-chevron-right\"></i></a></li>
            ";
            } elseif (            // line 60
($context["showAlwaysFirstAndLast"] ?? null)) {
                // line 61
                echo "                <li class=\"page-item disabled\"><a class=\"page-link\" href=\"#\"><i class=\"fa fa-chevron-right\"></i></a></li>
            ";
            }
            // line 63
            echo "        </ul>
        ";
            // line 64
            if ((array_key_exists("total_count", $context) &&  !twig_test_empty(($context["total_count"] ?? null)))) {
                // line 65
                echo "            <span class=\"total_count\">";
                echo twig_escape_filter($this->env, ($context["total_count"] ?? null), "html", null, true);
                echo "</span>
        ";
            }
            // line 67
            echo "        </div>
    ";
        }
        $___internal_parse_0_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 3
        echo twig_spaceless($___internal_parse_0_);
    }

    public function getTemplateName()
    {
        return "@Cms/pagination_bootstrap.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  258 => 3,  253 => 67,  247 => 65,  245 => 64,  242 => 63,  238 => 61,  236 => 60,  230 => 59,  227 => 58,  221 => 57,  211 => 55,  208 => 54,  204 => 53,  201 => 52,  197 => 50,  195 => 49,  192 => 48,  186 => 47,  176 => 45,  173 => 44,  168 => 43,  166 => 42,  157 => 40,  154 => 39,  150 => 37,  147 => 36,  141 => 35,  131 => 33,  128 => 32,  124 => 31,  121 => 30,  117 => 28,  115 => 27,  112 => 26,  106 => 25,  96 => 23,  93 => 22,  89 => 21,  81 => 19,  79 => 18,  74 => 15,  69 => 14,  64 => 13,  60 => 12,  57 => 11,  54 => 10,  51 => 8,  48 => 7,  45 => 5,  42 => 4,  40 => 3,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/pagination_bootstrap.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/pagination_bootstrap.html.twig");
    }
}
