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

/* @TrinityNeutral/front/projects/view-projects.html.twig */
class __TwigTemplate_ecc9538cbf44afce7b84b8c45fa59a4760fbf5b7d07651628aaaaa16a7e909e1 extends Template
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
        echo "<section class=\"projects projects-overview\">
\t<div class=\"projects-overview-header\">
\t\t<div class=\"container\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t<div class=\"projects-overview-titles\">
\t\t\t\t\t\t<div class=\"left\">
\t\t\t\t\t\t\t<h2>";
        // line 8
        echo "Projectoverzicht";
        echo "</h2>
\t\t\t\t\t\t\t<p>";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bekijk hier alle initiatieven op een rij"), "html", null, true);
        echo "</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"right d-none d-lg-block\">
\t\t\t\t\t\t\t";
        // line 12
        if (twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 12)) {
            // line 13
            echo "\t\t\t\t\t\t \t\t<a href=\"/mijn-account/projecten\" class=\"btn me-3\">Mijn projecten <i class=\"fa fa-arrow-right d-none d-lg-inline-block\"></i></a>
\t\t\t\t\t\t\t";
        }
        // line 15
        echo "\t\t\t\t\t\t\t<a href=\"/mijn-account/projecten/aanmelden\" class=\"btn btn-gradient\">Project aanmelden <i class=\"fa fa-arrow-right\"></i></a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"filters mt-4\">
\t\t\t\t\t\t";
        // line 20
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
        echo "

\t\t\t\t\t\t\t";
        // line 22
        if ( !twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 22), "valid", [], "any", false, false, false, 22)) {
            // line 23
            echo "\t\t\t\t\t\t\t\t";
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
            echo "
\t\t\t\t\t\t\t";
        }
        // line 25
        echo "\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t<div class=\"form-group col-12 col-lg-4\">
\t\t\t\t\t\t\t\t\t<div class=\"form-floating mb-2 mb-lg-0\">
\t\t\t\t\t\t\t\t\t\t";
        // line 28
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "project_type", [], "any", false, false, false, 28), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group col-12 col-lg-4\">
\t\t\t\t\t\t\t\t\t<div class=\"form-floating mb-2 mb-lg-0\">
\t\t\t\t\t\t\t\t\t\t";
        // line 33
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "project_location", [], "any", false, false, false, 33), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group col-12 col-lg-4\">
\t\t\t\t\t\t\t\t\t<div class=\"form-floating mb-2 mb-lg-0\">
\t\t\t\t\t\t\t\t\t\t";
        // line 38
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "project_status", [], "any", false, false, false, 38), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div style=\"display:none;\">
\t\t\t\t\t\t\t\t";
        // line 43
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "_token", [], "any", false, false, false, 43), 'row');
        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        // line 45
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>

\t<div class=\"projects projects-cards\">
\t\t<div class=\"container\">
\t\t\t<div class=\"row projects-overview\">
\t\t\t\t";
        // line 55
        $this->loadTemplate("@TrinityNeutral/front/projects/view-projects-ext.html.twig", "@TrinityNeutral/front/projects/view-projects.html.twig", 55)->display(twig_array_merge($context, ["projects" =>         // line 56
($context["projects"] ?? null)]));
        // line 58
        echo "\t\t\t</div>

\t\t\t<div class=\"loader d-none\">
\t\t\t\t<i class=\"fa fa-spin fa-circle-notch\"></i>
\t\t\t</div>
\t\t</div>
\t</div>
</section>
";
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/front/projects/view-projects.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 58,  130 => 56,  129 => 55,  116 => 45,  111 => 43,  103 => 38,  95 => 33,  87 => 28,  82 => 25,  76 => 23,  74 => 22,  69 => 20,  62 => 15,  58 => 13,  56 => 12,  50 => 9,  46 => 8,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/front/projects/view-projects.html.twig", "/var/www/html/src/Trinity/NeutralBundle/Resources/views/front/projects/view-projects.html.twig");
    }
}
