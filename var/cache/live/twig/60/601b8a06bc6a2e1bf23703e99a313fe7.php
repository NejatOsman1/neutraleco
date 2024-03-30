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
class __TwigTemplate_f067c29e373f23125b7a10ffd2200834 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "/neutraleco/nav.html.twig"));

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
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["Settings"]) || array_key_exists("Settings", $context) ? $context["Settings"] : (function () { throw new RuntimeError('Variable "Settings" does not exist.', 7, $this->source); })()), "logo", [], "any", false, false, false, 7), "html", null, true);
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
        if (twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 23, $this->source); })()), "user", [], "any", false, false, false, 23)) {
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
        if (twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 47, $this->source); })()), "user", [], "any", false, false, false, 47)) {
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
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

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
        return array (  176 => 104,  129 => 59,  123 => 55,  117 => 52,  111 => 48,  109 => 47,  103 => 43,  98 => 37,  92 => 33,  86 => 30,  81 => 27,  77 => 24,  75 => 23,  69 => 20,  66 => 19,  58 => 9,  52 => 7,  50 => 6,  46 => 5,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<section class=\"navbar\">
  <div class=\"container\">

    <div class=\"logo float-left\">
      <a href=\"{{ path('homepage') }}\">
        {% if Settings is defined %}
          <img src=\"{{Settings.logo}}\">
        {% endif %}
      </a>
    </div>

    <div class=\"float-right nav-container\">
      <div class=\"nav-main\">
        <ul class=\"nav\">
          {# <li><a href=\"/\">Home</a></li>
          <li><a href=\"#\">Carbon tracking</a></li>
          <li><a href=\"/projecten\">Projecten</a></li>
          <li><a href=\"#\">Over ons</a></li> #}

          {{ custom_navigation('menu', '', false) }}

          <li class=\"has-children d-none d-xl-inline-block user-btn\">
            {% if app.user %}
              <a href=\"/mijn-account\">
                Mijn account
                {# <span class=\"togglesub\"><i></i></span> #}
              </a>

              <ul>
                {{ custom_navigation('my-account', '', false) }}
              </ul>
            {% else %}
              <a href=\"/mijn-account\">
                Inloggen
              </a>
            {% endif %}
          </li>
        </ul>

        {# <ul class=\"nav\">
          <li class=\"contact\"><a href=\"#\"><i class=\"fa fa-phone-alt\"></i> Contact</a></li>
        </ul> #}
      </div>

      <div class=\"nav-mobile d-xl-none\">
        <div class=\"nav-buttons\">
          {% if app.user %}
            <a class=\"dropdown-toggle\" id=\"account-dropdown\" data-bs-toggle=\"dropdown\" data-bs-auto-close=\"outside\" aria-expanded=\"false\">
              <i class=\"far fa-user\"></i>
            </a>
            <ul class=\"dropdown-menu dropdown-menu-end\" aria-labelledby=\"account-dropdown\">
              {{ custom_navigation('my-account', '', false) }}
            </ul>
          {% else %}
            <a href=\"/mijn-account\">
              <i class=\"far fa-user\"></i>
            </a>
          {% endif %}
        </div>

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

xhr.open('GET', '{{path('nav_account')}}');
xhr.send();
</script>
", "/neutraleco/nav.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/templates/neutraleco/nav.html.twig");
    }
}
