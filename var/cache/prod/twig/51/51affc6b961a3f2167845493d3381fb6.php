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

/* elements/breadcrumbs.html.twig */
class __TwigTemplate_631c24a3b9c58baba0c0ce054c8f1d70 extends Template
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
        // line 1
        if (twig_length_filter($this->env, $this->extensions['WhiteOctober\BreadcrumbsBundle\Twig\Extension\BreadcrumbsExtension']->getBreadcrumbs())) {
            // line 2
            ob_start(function () { return ''; });
            // line 3
            echo "<div class=\"breadcrumbs\">
            ";
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["b"]) {
                // line 5
                echo "
                    ";
                // line 6
                if ((twig_get_attribute($this->env, $this->source, $context["b"], "url", [], "any", false, false, false, 6) &&  !twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 6))) {
                    // line 7
                    echo "                        <a class=\"breadcrumb\" href=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["b"], "url", [], "any", false, false, false, 7), "html", null, true);
                    echo "\" itemprop=\"item\"";
                    if ((array_key_exists("linkRel", $context) && twig_length_filter($this->env, ($context["linkRel"] ?? null)))) {
                        echo " rel=\"";
                        echo twig_escape_filter($this->env, ($context["linkRel"] ?? null), "html", null, true);
                        echo "\"";
                    }
                    echo ">
                    ";
                } else {
                    // line 9
                    echo "                        <a class=\"breadcrumb\">
                    ";
                }
                // line 11
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["b"], "text", [], "any", false, false, false, 11), twig_get_attribute($this->env, $this->source, $context["b"], "translationParameters", [], "any", false, false, false, 11), ($context["translation_domain"] ?? null), ($context["locale"] ?? null)), "html", null, true);
                echo "</a>
                    ";
                // line 12
                if ((twig_get_attribute($this->env, $this->source, $context["b"], "url", [], "any", false, false, false, 12) &&  !twig_get_attribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 12))) {
                    // line 13
                    echo "                        </a>
                    ";
                } else {
                    // line 15
                    echo "                        </a>
                    ";
                }
                // line 17
                echo "            ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['b'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo "        </div>";
            $___internal_parse_0_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 2
            echo twig_spaceless($___internal_parse_0_);
        }
    }

    public function getTemplateName()
    {
        return "elements/breadcrumbs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 2,  110 => 18,  96 => 17,  92 => 15,  88 => 13,  86 => 12,  82 => 11,  78 => 9,  66 => 7,  64 => 6,  61 => 5,  44 => 4,  41 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "elements/breadcrumbs.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/templates/elements/breadcrumbs.html.twig");
    }
}
