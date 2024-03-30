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

/* @TrinityNeutral/front/projects/form-popup.html.twig */
class __TwigTemplate_1468bd4a38a895694880c693f975082f8b218356d1d1ddfc5a545e412a74c42f extends Template
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
        echo " <div id=\"form-modal\" class=\"modal\" tabindex=\"-1\" data-attr-email=\"";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "user", [], "any", false, false, false, 1), "getEmail", [], "any", false, false, false, 1), "html", null, true);
        echo "\">
  <div class=\"modal-dialog modal-dialog-centered modal-dialog-scrollable\">

    <div class=\"modal-content\">
      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>

      <div class=\"modal-body\">
        <div class=\"intro text-center\">
          <h5><i class=\"far fa-envelope\"></i> Contact opnemen</h5>
          <p>Interesse in het kopen van CO2 credits van dit project?<br/>
\t\t\tNeem dan via onderstaand formulier contact op met de
\t\t\tprojecteigenaar, of bel via <a href=\"tel:";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "user", [], "any", false, false, false, 12), "getPhone", [], "method", false, false, false, 12), "html", null, true);
        echo "\"><i class=\"fa fa-phone-alt\"></i> ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["project"] ?? null), "user", [], "any", false, false, false, 12), "getPhone", [], "method", false, false, false, 12), "html", null, true);
        echo "</a>
\t\t  </p>
        </div>

    \t\t<div class=\"form\"></div>

    \t\t<div style=\"display:none;\" class=\"success\">
          <div class=\"intro text-center\">
      \t\t\t<h5>Bedankt!</h5>
      \t\t\t<p>Bedankt voor je interesse, er is een bevestigingsmail naar de projecteigenaar verstuurd. De projecteigenaar zal je aanvraag zo spoedig mogelijk in behandeling nemen.</p>
          </div>
          <div class=\"text-center\">
    \t\t\t  <button type=\"button\" class=\"btn btn-primary\" data-bs-dismiss=\"modal\" aria-label=\"Close\">Venster sluiten <i class=\"fa fa-arrow-right\"></i></button>
          </div>
    \t\t</div>
      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/front/projects/form-popup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 12,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/front/projects/form-popup.html.twig", "/var/www/html/src/Trinity/NeutralBundle/Resources/views/front/projects/form-popup.html.twig");
    }
}
