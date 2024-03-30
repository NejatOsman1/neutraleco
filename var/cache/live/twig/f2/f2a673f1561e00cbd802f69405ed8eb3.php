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
class __TwigTemplate_ee1b438a01434d4da32d188179c7826e extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "elements/breadcrumbs.html.twig"));

        // line 1
        if (twig_length_filter($this->env, $this->extensions['WhiteOctober\BreadcrumbsBundle\Twig\Extension\BreadcrumbsExtension']->getBreadcrumbs())) {
            // line 2
            ob_start();
            // line 3
            echo "<div class=\"breadcrumbs\">
            ";
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["breadcrumbs"]) || array_key_exists("breadcrumbs", $context) ? $context["breadcrumbs"] : (function () { throw new RuntimeError('Variable "breadcrumbs" does not exist.', 4, $this->source); })()));
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
                    if ((array_key_exists("linkRel", $context) && twig_length_filter($this->env, (isset($context["linkRel"]) || array_key_exists("linkRel", $context) ? $context["linkRel"] : (function () { throw new RuntimeError('Variable "linkRel" does not exist.', 7, $this->source); })())))) {
                        echo " rel=\"";
                        echo twig_escape_filter($this->env, (isset($context["linkRel"]) || array_key_exists("linkRel", $context) ? $context["linkRel"] : (function () { throw new RuntimeError('Variable "linkRel" does not exist.', 7, $this->source); })()), "html", null, true);
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
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["b"], "text", [], "any", false, false, false, 11), twig_get_attribute($this->env, $this->source, $context["b"], "translationParameters", [], "any", false, false, false, 11), (isset($context["translation_domain"]) || array_key_exists("translation_domain", $context) ? $context["translation_domain"] : (function () { throw new RuntimeError('Variable "translation_domain" does not exist.', 11, $this->source); })()), (isset($context["locale"]) || array_key_exists("locale", $context) ? $context["locale"] : (function () { throw new RuntimeError('Variable "locale" does not exist.', 11, $this->source); })())), "html", null, true);
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
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

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
        return array (  116 => 2,  113 => 18,  99 => 17,  95 => 15,  91 => 13,  89 => 12,  85 => 11,  81 => 9,  69 => 7,  67 => 6,  64 => 5,  47 => 4,  44 => 3,  42 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% if wo_breadcrumbs()|length %}
    {%- apply spaceless -%}
        <div class=\"breadcrumbs\">
            {% for b in breadcrumbs %}

                    {% if b.url and not loop.last %}
                        <a class=\"breadcrumb\" href=\"{{ b.url }}\" itemprop=\"item\"{% if linkRel is defined and linkRel|length %} rel=\"{{ linkRel }}\"{% endif %}>
                    {% else %}
                        <a class=\"breadcrumb\">
                    {% endif %}
                            {{- b.text | trans(b.translationParameters, translation_domain, locale) -}}</a>
                    {% if b.url and not loop.last %}
                        </a>
                    {% else %}
                        </a>
                    {% endif %}
            {% endfor %}
        </div>
    {%- endapply -%}
{% endif %}", "elements/breadcrumbs.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/templates/elements/breadcrumbs.html.twig");
    }
}
