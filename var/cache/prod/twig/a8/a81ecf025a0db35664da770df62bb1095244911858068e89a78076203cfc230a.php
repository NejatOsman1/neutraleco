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

/* @Cms/ajax.html.twig */
class __TwigTemplate_620bff6a1614c480c7bf5cc69a8b906f9bf8687d441a392467e267f42876e6b7 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'plain_body' => [$this, 'block_plain_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo $this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getPageBlocks($this->env, ($context["Page"] ?? null), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 1), "locale", [], "any", false, false, false, 1), "");
        echo "
";
        // line 2
        $this->displayBlock('plain_body', $context, $blocks);
    }

    public function block_plain_body($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "@Cms/ajax.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/ajax.html.twig", "/var/www/html/src/CmsBundle/Resources/views/ajax.html.twig");
    }
}
