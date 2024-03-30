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

/* @Cms/sitemaps/sitemap.xml.twig */
class __TwigTemplate_0e696f2f2135cfe83b9b965666b6e6be extends Template
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
        echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<!-- <?xml-stylesheet type=\"text/xsl\" href=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("sitemap.xsl"), "html", null, true);
        echo "\"?> -->
<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">
";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["urls"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["url"]) {
            // line 5
            echo "    <url>";
            // line 6
            echo "        <loc>https://";
            if ((twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["url"], "loc", [], "any", false, false, false, 6), ["hostname" => ""]) == twig_get_attribute($this->env, $this->source, $context["url"], "loc", [], "any", false, false, false, 6))) {
                echo twig_escape_filter($this->env, ($context["hostname"] ?? null), "html", null, true);
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["url"], "loc", [], "any", false, false, false, 6), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["url"], "loc", [], "any", false, false, false, 6), "html", null, true);
            }
            echo "</loc>
";
            // line 7
            if (twig_get_attribute($this->env, $this->source, $context["url"], "lastmod", [], "any", true, true, false, 7)) {
                // line 8
                echo "        <lastmod>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["url"], "lastmod", [], "any", false, false, false, 8), "html", null, true);
                echo "</lastmod>
";
            }
            // line 10
            if (twig_get_attribute($this->env, $this->source, $context["url"], "changefreq", [], "any", true, true, false, 10)) {
                // line 11
                echo "        <changefreq>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["url"], "changefreq", [], "any", false, false, false, 11), "html", null, true);
                echo "</changefreq>
";
            }
            // line 13
            if (twig_get_attribute($this->env, $this->source, $context["url"], "priority", [], "any", true, true, false, 13)) {
                // line 14
                echo "        <priority>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["url"], "priority", [], "any", false, false, false, 14), "html", null, true);
                echo "</priority>
";
            }
            // line 16
            echo "    </url>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['url'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "</urlset>";
    }

    public function getTemplateName()
    {
        return "@Cms/sitemaps/sitemap.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 18,  85 => 16,  79 => 14,  77 => 13,  71 => 11,  69 => 10,  63 => 8,  61 => 7,  51 => 6,  49 => 5,  45 => 4,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/sitemaps/sitemap.xml.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/sitemaps/sitemap.xml.twig");
    }
}
