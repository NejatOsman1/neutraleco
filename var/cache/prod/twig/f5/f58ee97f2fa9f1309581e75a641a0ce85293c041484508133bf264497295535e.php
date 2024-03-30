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

/* /neutraleco/nav.html.twig */
class __TwigTemplate_aee57472db0e81e0e9b5afb36a11b193c0812ee7b9cc4c5f7e8777a740b77ba4 extends Template
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
        echo "<section class=\"navbar\">
  <div class=\"container\">

    <div class=\"logo float-left\">
      <a href=\"";
        // line 5
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("homepage");
        echo "\">
        ";
        // line 6
        if (array_key_exists("Settings", $context)) {
            // line 7
            echo "          <img src=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "logo", [], "any", false, false, false, 7), "html", null, true);
            echo "\">
        ";
        }
        // line 9
        echo "      </a>
    </div>

    <div class=\"float-right nav-container\">
      <div class=\"nav-main\">
        <ul class=\"nav\">
          ";
        // line 19
        echo "
          ";
        // line 20
        echo $this->extensions['App\CmsBundle\Twig\Extension\PageNavigation']->custom_navigation("menu", "", false);
        echo "

          <li class=\"has-children d-none d-xl-inline-block user-btn\">
            ";
        // line 23
        if (twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 23)) {
            // line 24
            echo "              <a href=\"/mijn-account\">
                Mijn account
                ";
            // line 27
            echo "              </a>

              <ul>
                ";
            // line 30
            echo $this->extensions['App\CmsBundle\Twig\Extension\PageNavigation']->custom_navigation("my-account", "", false);
            echo "
              </ul>
            ";
        } else {
            // line 33
            echo "              <a href=\"/mijn-account\">
                Inloggen
              </a>
            ";
        }
        // line 37
        echo "          </li>
        </ul>

        ";
        // line 43
        echo "      </div>

      <div class=\"nav-mobile d-xl-none\">
        <div class=\"nav-buttons\">
          ";
        // line 47
        if (twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 47)) {
            // line 48
            echo "            <a class=\"dropdown-toggle\" id=\"account-dropdown\" data-bs-toggle=\"dropdown\" data-bs-auto-close=\"outside\" aria-expanded=\"false\">
              <i class=\"far fa-user\"></i>
            </a>
            <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"account-dropdown\">
              ";
            // line 52
            echo $this->extensions['App\CmsBundle\Twig\Extension\PageNavigation']->custom_navigation("my-account", "", false);
            echo "
            </ul>
          ";
        } else {
            // line 55
            echo "            <a href=\"/mijn-account\">
              <i class=\"far fa-user\"></i>
            </a>
          ";
        }
        // line 59
        echo "        </div>

        <div class=\"nav-toggle\">
          <div class=\"bars\">
            <div class=\"bar\">
              <span></span>
            </div>
            <div class=\"bar\">
              <span></span>
            </div>
            <div class=\"bar\">
              <span></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function (r) {
\tif (xhr.readyState !== 4) return;
\tif (xhr.status >= 200 && xhr.status < 300) {
    let users = document.querySelectorAll('.user-login');
    let guests = document.querySelectorAll('.user-guest');
\t\tif(JSON.parse(xhr.response).logged_in){
      for(let i = 0; i < guests.length; i++){
        guests[i].classList.add('hidden');
      }
      for(let i = 0; i < users.length; i++){
        users[i].classList.remove('hidden');
      }
    }else{
      for(let i = 0; i < guests.length; i++){
        guests[i].classList.remove('hidden');
      }
      for(let i = 0; i < users.length; i++){
        users[i].classList.add('hidden');
      }
    }
\t}
};

xhr.open('GET', '";
        // line 104
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("nav_account");
        echo "');
xhr.send();
</script>
";
    }

    public function getTemplateName()
    {
        return "/neutraleco/nav.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 104,  126 => 59,  120 => 55,  114 => 52,  108 => 48,  106 => 47,  100 => 43,  95 => 37,  89 => 33,  83 => 30,  78 => 27,  74 => 24,  72 => 23,  66 => 20,  63 => 19,  55 => 9,  49 => 7,  47 => 6,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/neutraleco/nav.html.twig", "/var/www/html/templates/neutraleco/nav.html.twig");
    }
}
