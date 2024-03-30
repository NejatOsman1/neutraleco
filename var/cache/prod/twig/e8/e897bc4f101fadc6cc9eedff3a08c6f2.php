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

/* @Cms/login/lostpassword.html.twig */
class __TwigTemplate_e3738a008b28fb555e6c5427a3339632 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
            'bgimage' => [$this, 'block_bgimage'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@Cms/interface_light.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@Cms/interface_light.html.twig", "@Cms/login/lostpassword.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "    <div class=\"login-page ";
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasBackground", [], "any", false, false, false, 5)) {
            echo "has-bg";
        }
        echo "\">
      ";
        // line 6
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasBackground", [], "any", false, false, false, 6)) {
            echo "<div class=\"login-bg\" style=\"";
            $this->displayBlock('bgimage', $context, $blocks);
            echo "\"></div>";
        }
        // line 7
        echo "
      <div class=\"logobox\">
        <img src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/images/logo.svg"), "html", null, true);
        echo "\"/>
      </div>

      <div class=\"vtable\">
        <div class=\"vcell\">
          <div class=\"window\">

            <form id=\"login-form\" action=\"";
        // line 16
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_lostpassword");
        echo "\"=\"admin_lostpassword\" )=\")\" }}\"\"=\"}}\"\"\" method=\"post\">
\t\t\t\t\t\t\t<div class=\"row mb-3\">
\t\t\t\t\t\t\t\t<h3>";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wachtwoord vergeten", [], "login"), "html", null, true);
        echo "</h3>
\t\t\t\t\t\t\t</div>

              ";
        // line 21
        if (($context["unknownUser"] ?? null)) {
            // line 22
            echo "                <div class=\"alert alert-danger\">
                  <i class=\"fa fa-info-circle\"></i>
                  ";
            // line 24
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Als het e-mailadres bij ons bekend is, wordt er binnen enkele ogenblikken een e-mail verstuurd.", [], "login"), "html", null, true);
            echo "
                </div>
              ";
        } else {
            // line 27
            echo "                ";
            if (($context["changed"] ?? null)) {
                // line 28
                echo "                  <div class=\"alert alert-success\">
                    <i class=\"fa fa-info-circle\"></i>
                    ";
                // line 30
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Als het e-mailadres bij ons bekend is, wordt er binnen enkele ogenblikken een e-mail verstuurd.", [], "login"), "html", null, true);
                echo "
                  </div>
                ";
            }
            // line 33
            echo "              ";
        }
        // line 34
        echo "              <div class=\"row mb-2\">
                <div class=\"col-12\">
\t                <div class=\"field\">
\t                  <input class=\"form-control form-control-lg\" autocomplete=\"off\" type=\"text\" name=\"_username\" value=\"\" placeholder=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("E-mailadres", [], "login", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 37), "locale", [], "any", false, false, false, 37)), "html", null, true);
        echo "\">
                    <i class=\"far fa-envelope-open\"></i>
\t                </div>
                </div>
              </div>

              <div class=\"row my-3 align-items-center\">
                <div class=\"col-12\">
\t                <div class=\"field\">
\t                  <input class=\"btn btn-lg w-100\" type=\"submit\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wachtwoord aanvragen", [], "login", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 46), "locale", [], "any", false, false, false, 46)), "html", null, true);
        echo "\">
\t                </div>
                </div>
              </div>

              <div class=\"row\">
                <div class=\"col-12\">
                  <small>
                    <a href=\"";
        // line 54
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_login");
        echo "\" class=\"lost-password\"><i class=\"fa fa-arrow-left\"></i> ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Terug naar inloggen", [], "login"), "html", null, true);
        echo "</a>
                  </small>
                </div>
              </div>
            </form>

            <div class=\"footer\">
              <span class=\"powered-by\">
                <a href=\"";
        // line 62
        echo twig_escape_filter($this->env, ($context["trinity_url"] ?? null), "html", null, true);
        echo "\" target=\"blank\">";
        echo twig_escape_filter($this->env, ($context["trinity"] ?? null), "html", null, true);
        echo "
                  <span>v";
        // line 63
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "</span></a>
              </span>
              <span>
                <a href=\"";
        // line 66
        echo twig_escape_filter($this->env, ($context["company_url"] ?? null), "html", null, true);
        echo "\" target=\"blank\">";
        echo twig_escape_filter($this->env, ($context["company"] ?? null), "html", null, true);
        echo "
                  &copy;
                  ";
        // line 68
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo "</a>
              </span>
            </div>
          </div>
        </div>
      </div>
\t\t</div>
  ";
    }

    // line 6
    public function block_bgimage($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "background-image:url('";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getBackground", [], "any", false, false, false, 6), "html", null, true);
        echo "'); background-repeat: no-repeat; background-size: cover; background-position: center center;";
    }

    public function getTemplateName()
    {
        return "@Cms/login/lostpassword.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  189 => 6,  177 => 68,  170 => 66,  164 => 63,  158 => 62,  145 => 54,  134 => 46,  122 => 37,  117 => 34,  114 => 33,  108 => 30,  104 => 28,  101 => 27,  95 => 24,  91 => 22,  89 => 21,  83 => 18,  78 => 16,  68 => 9,  64 => 7,  58 => 6,  51 => 5,  47 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/login/lostpassword.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/login/lostpassword.html.twig");
    }
}
