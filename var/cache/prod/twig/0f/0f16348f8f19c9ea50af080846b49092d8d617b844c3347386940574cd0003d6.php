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

/* layouts/login.html.twig */
class __TwigTemplate_2e979d7b7780858645895de0e6400374c3c8d4b8cee39db9fee001fd9e1d5f47 extends Template
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
        echo "<section class=\"empty login-register-wrapper\">
  <div class=\"container\">
    <div class=\"row\">
      <div class=\"col-sm-12\">
        <div class=\"block\">
          <div class=\"text-wrwapper\">
            <section class=\"webshop-frontend-profile\">
              <div class=\"container\">
                <div class=\"row\">
                  <div class=\"col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2\">
                    <section class=\"login-register\">
                      <div class=\"container\">
                        <div class=\"login-box\">
                        <div class=\"card\">
                          <div class=\"card-body\">
                            <div class=\"login-form\">
                              <h4>";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Inloggen"), "html", null, true);
        echo "</h4>
                                <form action=\"";
        // line 18
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_login_check");
        echo "?_failure_path=";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 18), "attributes", [], "any", false, false, false, 18), "get", [0 => "_route"], "method", false, false, false, 18));
        echo "&_target_path=";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 18), "attributes", [], "any", false, false, false, 18), "get", [0 => "_route"], "method", false, false, false, 18));
        echo "\" method=\"post\">

                                  ";
        // line 20
        if ((array_key_exists("error", $context) &&  !twig_test_empty(($context["error"] ?? null)))) {
            // line 21
            echo "                                  <div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "messageKey", [], "any", false, false, false, 21), twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "messageData", [], "any", false, false, false, 21), "security"), "html", null, true);
            echo "</div>
                                  ";
        }
        // line 23
        echo "
                                  ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "session", [], "any", false, false, false, 24), "flashBag", [], "any", false, false, false, 24), "all", [], "method", false, false, false, 24));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 25
            echo "                                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 26
                echo "                                      <div class=\"alert alert-danger\">";
                echo $context["message"];
                echo "</div>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            echo "                                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['label'], $context['messages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "
                                  ";
        // line 30
        if ((array_key_exists("hasLoginInvalidRoles", $context) &&  !twig_test_empty(($context["hasLoginInvalidRoles"] ?? null)))) {
            // line 31
            echo "                                  <div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("U bent ingelogd maar hebt niet de juiste rechten om deze pagina te kunnen bekijken."), "html", null, true);
            echo "</div>
                                  ";
        }
        // line 33
        echo "
                                  <div class=\"form-group\">
                                    <div class=\"form-floating\">
                                      <input type=\"text\" class=\"form-control\" id=\"_username\" name=\"_username\" placeholder=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gebruikersnaam", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 36), "locale", [], "any", false, false, false, 36)), "html", null, true);
        echo "\" autocomplete=\"off\">
                                      <label for=\"_username\">";
        // line 37
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gebruikersnaam", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 37), "locale", [], "any", false, false, false, 37)), "html", null, true);
        echo "</label>
                                    </div>
                                    ";
        // line 40
        echo "                                  </div>

                                  <div class=\"form-group\">
                                    <div class=\"form-floating\">
                                      <input type=\"password\" class=\"form-control\" id=\"_password\" name=\"_password\" placeholder=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wachtwoord"), "html", null, true);
        echo "\" autocomplete=\"off\">
                                      <label for=\"_password\">";
        // line 45
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wachtwoord"), "html", null, true);
        echo "</label>
                                    </div>
                                    ";
        // line 48
        echo "                                  </div>

                                  <small class=\"d-block mb-2\">
                                    <a href=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("pages_wachtwoord_vergeten", ["url" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 51), "attributes", [], "any", false, false, false, 51), "get", [0 => "_route"], "method", false, false, false, 51)]), "html", null, true);
        echo "\">Wachtwoord vergeten?</a>
                                  </small>

                                  ";
        // line 60
        echo "
                                <input type=\"hidden\" name=\"_target_path\" value=\"";
        // line 61
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 61), "attributes", [], "any", false, false, false, 61), "get", [0 => "_route"], "method", false, false, false, 61), "html", null, true);
        echo "\"/>
                                <input type=\"hidden\" name=\"_failure_path\" value=\"";
        // line 62
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 62), "attributes", [], "any", false, false, false, 62), "get", [0 => "_route"], "method", false, false, false, 62), "html", null, true);
        echo "\"/>

                              <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        echo "\">

                              <button type=\"submit\" name=\"login\" class=\"btn btn-gradient\">
                                ";
        // line 67
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Inloggen"), "html", null, true);
        echo " <i class=\"fa fa-arrow-right\"></i>
                              </button>
                              </form>
                            </div>

                            <div class=\"or\">
                              <span>";
        // line 73
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("of"), "html", null, true);
        echo "</span>
                            </div>

                            <div class=\"register-form\">
                              <p>";
        // line 77
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Maak een account aan"), "html", null, true);
        echo "</p>
                              <a href=\"/registreren\" class=\"btn\">
                                ";
        // line 79
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Registreren"), "html", null, true);
        echo " <i class=\"fa fa-arrow-right\"></i>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "layouts/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 79,  188 => 77,  181 => 73,  172 => 67,  166 => 64,  161 => 62,  157 => 61,  154 => 60,  148 => 51,  143 => 48,  138 => 45,  134 => 44,  128 => 40,  123 => 37,  119 => 36,  114 => 33,  108 => 31,  106 => 30,  103 => 29,  97 => 28,  88 => 26,  83 => 25,  79 => 24,  76 => 23,  70 => 21,  68 => 20,  59 => 18,  55 => 17,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "layouts/login.html.twig", "/var/www/html/templates/layouts/login.html.twig");
    }
}
