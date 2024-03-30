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

/* /neutraleco/footer.html.twig */
class __TwigTemplate_8f82b57aa650b637b7930aca1b6f8c6a extends Template
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
        echo "<div class=\"footer-wrapper\">
  <section class=\"footer\">
    <div class=\"container\">
      <div class=\"row\">

        <div class=\"col-sm-12 col-md-6 col-lg-3\">
          ";
        // line 7
        echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "footerBlock1", [], "any", false, false, false, 7);
        echo "
        </div>

        <div class=\"col-sm-12 col-md-6 col-lg-3\">
          ";
        // line 11
        echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "footerBlock2", [], "any", false, false, false, 11);
        echo "
        </div>

        <div class=\"col-sm-12 col-md-6 col-lg-3\">
          ";
        // line 15
        echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "footerBlock3", [], "any", false, false, false, 15);
        echo "
        </div>

        <div class=\"col-sm-12 col-md-6 col-lg-3\">
          ";
        // line 19
        echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "footerBlock4", [], "any", false, false, false, 19);
        echo "
        </div>
      </div>
    </div>
  </section>

  <section class=\"subfooter\">
    <div class=\"container\">
      <div class=\"row\">
        <div class=\"col-12 col-md-6 text-center text-md-start\">
          ";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "label", [], "any", false, false, false, 29), "html", null, true);
        echo "
          &copy;
          ";
        // line 31
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo "
        </div>

        <div class=\"col-12 col-md-6 text-center text-md-end\">
          <span class=\"d-inline-block my-2 my-md-0\">";
        // line 35
        echo twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "footerBlock5", [], "any", false, false, false, 35);
        echo "</span>
          ";
        // line 76
        echo "        </div>
      </div>
    </div>
  </section>
</div>
";
    }

    public function getTemplateName()
    {
        return "/neutraleco/footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 76,  91 => 35,  84 => 31,  79 => 29,  66 => 19,  59 => 15,  52 => 11,  45 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/neutraleco/footer.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/templates/neutraleco/footer.html.twig");
    }
}
