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
class __TwigTemplate_37391836e052536fa52ca28286fc50e9 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "/neutraleco/footer.html.twig"));

        // line 1
        echo "<div class=\"footer-wrapper\">
  <section class=\"footer\">
    <div class=\"container\">
      <div class=\"row\">

        <div class=\"col-sm-12 col-md-6 col-lg-3\">
          ";
        // line 7
        echo twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 7, $this->source); })()), "footerBlock1", [], "any", false, false, false, 7);
        echo "
        </div>

        <div class=\"col-sm-12 col-md-6 col-lg-3\">
          ";
        // line 11
        echo twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 11, $this->source); })()), "footerBlock2", [], "any", false, false, false, 11);
        echo "
        </div>

        <div class=\"col-sm-12 col-md-6 col-lg-3\">
          ";
        // line 15
        echo twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 15, $this->source); })()), "footerBlock3", [], "any", false, false, false, 15);
        echo "
        </div>

        <div class=\"col-sm-12 col-md-6 col-lg-3\">
          ";
        // line 19
        echo twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 19, $this->source); })()), "footerBlock4", [], "any", false, false, false, 19);
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
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 29, $this->source); })()), "label", [], "any", false, false, false, 29), "html", null, true);
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
        echo twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 35, $this->source); })()), "footerBlock5", [], "any", false, false, false, 35);
        echo "</span>
          ";
        // line 76
        echo "        </div>
      </div>
    </div>
  </section>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

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
        return array (  98 => 76,  94 => 35,  87 => 31,  82 => 29,  69 => 19,  62 => 15,  55 => 11,  48 => 7,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"footer-wrapper\">
  <section class=\"footer\">
    <div class=\"container\">
      <div class=\"row\">

        <div class=\"col-sm-12 col-md-6 col-lg-3\">
          {{Settings.footerBlock1|raw}}
        </div>

        <div class=\"col-sm-12 col-md-6 col-lg-3\">
          {{Settings.footerBlock2|raw}}
        </div>

        <div class=\"col-sm-12 col-md-6 col-lg-3\">
          {{Settings.footerBlock3|raw}}
        </div>

        <div class=\"col-sm-12 col-md-6 col-lg-3\">
          {{Settings.footerBlock4|raw}}
        </div>
      </div>
    </div>
  </section>

  <section class=\"subfooter\">
    <div class=\"container\">
      <div class=\"row\">
        <div class=\"col-12 col-md-6 text-center text-md-start\">
          {{Settings.label}}
          &copy;
          {{ \"now\"|date(\"Y\") }}
        </div>

        <div class=\"col-12 col-md-6 text-center text-md-end\">
          <span class=\"d-inline-block my-2 my-md-0\">{{Settings.footerBlock5|raw}}</span>
          {# <span class=\"d-block d-lg-inline-block\">
            <a href=\"https://beyonit.nl\" target=\"blank\" class=\"poweredby\">
              <span class=\"d-inline-block\"><span class=\"d-none d-lg-inline-block\">-</span>
                Powered by</span>
              <span class=\"d-inline-block\">
                <svg version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" x=\"0px\" y=\"0px\" viewbox=\"0 0 807.8 221.3\" style=\"enable-background:new 0 0 807.8 221.3;\" xml:space=\"preserve\">
                  <g>
                    <path class=\"beyonit-grey\" d=\"M188,37.8l-9.9,3.7c-5.7,2.1-7.9,6.8-5.7,12.5l1,2.8c2.1,5.7,6.8,7.9,12.5,5.7l9.9-3.7
            \t\t    c5.7-2.1,7.9-6.8,5.7-12.5l-1-2.8C198.4,37.9,193.7,35.7,188,37.8z\"/>
                    <g>
                      <path class=\"beyonit-grey\" d=\"M0,57.2c0-4.3,3.5-8,8-8h68.9c21.7,0,44.1,9.4,44.1,34.5c0,8.7-3,15.4-11.5,22.4
                \t\t\tc11.5,6.1,16.3,16.7,16.3,28.1c0,24.1-21.2,36.4-44.9,36.4H8c-4.5,0-8-3.6-8-8V57.2z M31.9,72.2v24.3h45.3
                \t\t\tc7.1,0,11.8-4.3,11.8-12.1s-4.7-12.1-11.8-12.1H31.9V72.2z M31.9,118.7v29.1h48.4c9,0,13.5-5.9,13.5-14.6
                \t\t\tc0-8.7-4.5-14.6-13.5-14.6L31.9,118.7L31.9,118.7z\"/>
                      <path class=\"beyonit-grey\" d=\"M166,133.2c1.2,13.9,7.5,20,21.7,20c7.3,0,13.7-2.1,16.7-5.7c2.3-2.8,5.4-4.5,9.7-4.5h12.7
                \t\t\tc2.9,0,5.2,2.3,5.2,5.2c0,18-18.6,24.3-46.3,24.3c-30.9,0-49.4-16.7-49.4-48.1c0-31.2,18.7-48.2,49.4-48.2
                \t\t\tc30.9,0,49.4,16.5,49.4,47v4.9c0,3-2.3,5.2-5.2,5.2L166,133.2L166,133.2z M165.9,115.4h39.4c-0.5-13-6.8-20-19.6-20
                \t\t\tC173.1,95.4,166.6,102.4,165.9,115.4z\"/>
                      <path class=\"beyonit-grey\" d=\"M293,163.4c-17.9,0-30.9-8.3-40.6-39.6l-12.7-40.9c-0.9-2.6,1.2-5,4-5h17.7c3.1,0,6.6,2.4,7.6,5.7l11.1,35.9
                \t\t\tc5.7,18.2,11.1,23.4,18.6,23.4l16.8-59.3c0.9-3.3,4-5.7,7.1-5.7h17.9c2.8,0,4.7,2.4,4,5L322.3,162c-7.8,27.6-18.2,39-38.2,39
                \t\t\tc-6.9,0-16.5-0.7-22-1.7c-3-0.5-5.2-2.6-5.2-5.2v-9.4c0-2.9,2.3-5.2,5.2-5.2h3.1c3.8,0,7.1,1.4,11.1,1.4
                \t\t\tC284.5,180.9,289.9,175,293,163.4z\"/>
                      <path class=\"beyonit-grey\" d=\"M452.3,124.2c0,31.9-18.4,48.2-51.2,48.2s-51.2-16.3-51.2-48.2s18.4-48.1,51.2-48.1
                \t\t\tC433.9,76.2,452.3,92.3,452.3,124.2z M423,124.2c0-20.5-7.1-28.8-21.9-28.8c-14.7,0-21.9,8.3-21.9,28.8s7.1,29,21.9,29
                \t\t\tS423,144.7,423,124.2z\"/>
                      <path class=\"beyonit-grey\" d=\"M536.1,116.9c0-14.4-6.6-20.3-16.1-20.3c-8.5,0-16.5,5.9-22.7,12.1v56.7c0,2.9-2.3,5.2-5.2,5.2h-18.9
                \t\t\tc-2.9,0-5.2-2.3-5.2-5.2V83.1c0-2.9,2.3-5.2,5.2-5.2H492c2.9,0,5.2,2.3,5.2,5.2v5.4c8-6.8,16.7-12.3,29.7-12.3
                \t\t\tc22.6,0,38.5,12,38.5,40.8v48.6c0,2.9-2.3,5.2-5.2,5.2h-18.9c-2.9,0-5.2-2.3-5.2-5.2V116.9z\"/>
                    </g>
                    <path class=\"beyonit-pink\" d=\"M697.1,0C636,0,586.5,49.5,586.5,110.7c0,61.1,49.5,110.7,110.7,110.7c61.1,0,110.7-49.5,110.7-110.7
                \t\tC807.8,49.5,758.2,0,697.1,0z M669.3,165.4c0,2.9-2.3,5.2-5.2,5.2h-18.9c-2.9,0-5.2-2.3-5.2-5.2V85c0-2.9,2.3-5.2,5.2-5.2h18.9
                \t\tc2.9,0,5.2,2.3,5.2,5.2V165.4z M669.6,61.8c0,6.1-3.6,9.7-9.7,9.7h-10.6c-6.1,0-9.7-3.6-9.7-9.7v-2.9c0-6.1,3.6-9.7,9.7-9.7h10.6
                \t\tc6.1,0,9.7,3.6,9.7,9.7V61.8z M754.6,165.4c0,2.6-2.3,4.7-5.2,5.2c-5.2,1-14.7,1.7-22.6,1.7c-24.3,0-36.4-12.1-36.4-38.2V54.3
                \t\tc0-3,2.3-5.2,5.2-5.2h18.9c2.9,0,5.2,2.3,5.2,5.2v28.3h23.6c2.9,0,5.2,2.3,5.2,5.2v10.1c0,2.9-2.3,5.2-5.2,5.2h-23.6v31.1
                \t\tc0,11.8,6.1,18,14.9,18c4.5,0,7.8-1,11.6-1h3.1c2.9,0,5.2,2.3,5.2,5.2L754.6,165.4L754.6,165.4z\"/>
                  </g>
                </svg>
\t\t\t  </span>
            </a>
          </span> #}
        </div>
      </div>
    </div>
  </section>
</div>
", "/neutraleco/footer.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/templates/neutraleco/footer.html.twig");
    }
}
