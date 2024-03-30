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

/* @TrinityNeutral/front/projects/thanks.html.twig */
class __TwigTemplate_1b61a0ba629ec5e8e5391091467c2883 extends Template
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
        echo "<section class=\"webshop-frontend-profile\">
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div class=\"col-12\">
\t\t\t\t<section class=\"login-register\">
\t\t\t\t\t<div class=\"container\">
\t\t\t\t\t\t<div class=\"add-project\">
\t\t\t\t\t\t\t<div class=\"card step-one\">
\t\t\t\t\t\t\t\t<div class=\"card-body project-card\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<h3>";
        // line 11
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gefeliciteerd!", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 11), "locale", [], "any", false, false, false, 11));
        echo "</h3>
\t\t\t\t\t\t\t\t\t\t<small>";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gefeliciteerd met uw nieuwe project. Er is zojuist een e-mail gestuurd met de vervolgstappen.", [], "webshop", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 12), "locale", [], "any", false, false, false, 12)), "html", null, true);
        echo "</small>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"buttons mt-4\">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
        // line 15
        echo twig_escape_filter($this->env, ($context["projectsLink"] ?? null), "html", null, true);
        echo "\" class=\"btn btn-gradient\" >Ga naar projecten<i class=\"fa fa-arrow-right\"></i></a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</section>
\t\t\t</div>
\t\t</div>
\t</div>
</section>";
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/front/projects/thanks.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 15,  53 => 12,  49 => 11,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/front/projects/thanks.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/NeutralBundle/Resources/views/front/projects/thanks.html.twig");
    }
}
