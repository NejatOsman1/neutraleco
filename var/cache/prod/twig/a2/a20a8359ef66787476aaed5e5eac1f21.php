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

/* emails/notify.html.twig */
class __TwigTemplate_838a7bec8de6e52b2335b4ff75c1ef88 extends Template
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
        echo "<!DOCTYPE html>
<html lang=\"nl\" dir=\"ltr\">

<head>
  <style>
    body {
      font-size: 14px;
      line-height: 25px;
      padding: 0;
      margin: 0;
    }

    a {
      color: #000000;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      margin-top: 0;
      line-height: normal;
    }
  </style>
</head>

<body bgcolor=\"#f3f5f8\">
  <center>
    <div style=\"padding: 15px 0;\">
      <!-- <font face=\"arial\" size=\"2\">
        <a href=\"#\" style=\"text-decoration: none; color: #aaa;\">Open deze e-mail in de browser</a>
      </font> -->
    </div>

    <table width=\"600\" bgcolor=\"#ffffff\" cellspacing=\"0\" cellpadding=\"0\" style=\"box-shadow: 0 30px 50px rgba(0,0,0,0.05); border-radius: 3px; overflow: hidden;\">
      <tr>
        <td>
          ";
        // line 45
        if (array_key_exists("Settings", $context)) {
            // line 46
            echo "          <img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\HttpFoundationExtension']->generateAbsoluteUrl($this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getMailheader(($context["Settings"] ?? null))), "html", null, true);
            echo "\" alt=\"\">
          ";
        } else {
            // line 48
            echo "          <img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\HttpFoundationExtension']->generateAbsoluteUrl($this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getMailheader()), "html", null, true);
            echo "\" alt=\"\">
          ";
        }
        // line 50
        echo "        </td>
      </tr>

      <tr>
        <td>
          <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">
            <tr>
              <td colspan=\"3\" height=\"30\"></td>
            </tr>
            <tr>
              <td width=\"50\"></td>
              <td>
                <font face=\"arial\">
                  ";
        // line 63
        ((array_key_exists("label", $context)) ? (print (twig_escape_filter($this->env, (("" . ($context["label"] ?? null)) . ""), "html", null, true))) : (print ("")));
        echo "
                  ";
        // line 64
        echo ((array_key_exists("message", $context)) ? (($context["message"] ?? null)) : ("Bericht"));
        echo "
                  <br />
                </font>
              </td>
              <td width=\"50\"></td>
            </tr>
            <tr>
              <td colspan=\"3\" height=\"30\"></td>
            </tr>
          </table>


            <table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-top: 1px solid #eee\">
              <tr>
                <td colspan=\"3\" height=\"30\"></td>
              </tr>
              <tr>
                <td width=\"50\"></td>
                <td>
                  <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">
                    <tr>
                      <td>
                        <font face=\"arial\" size=\"2\">
                          ";
        // line 87
        echo $this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getMailfooter();
        echo "
                        </font>
                      </td>
                      <td align=\"right\" style=\"text-align: right;\">
                        ";
        // line 91
        if ($this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getPhone()) {
            echo "<a href=\"tel:";
            echo $this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getPhone(true);
            echo "\"><img src=\"https://beyonit.nl/mail/order/outlined/icon_phone.png\" alt=\"\" height=\"20\"></a>&nbsp;";
        }
        // line 92
        echo "                        ";
        if ($this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getFacebookUrl()) {
            echo "<a href=\"";
            echo $this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getFacebookUrl();
            echo "\"><img src=\"https://beyonit.nl/mail/order/outlined/icon_facebook.png\" alt=\"\" height=\"20\"></a>&nbsp;";
        }
        // line 93
        echo "                        ";
        if ($this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getTwitterUrl()) {
            echo "<a href=\"";
            echo $this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getTwitterUrl();
            echo "\"><img src=\"https://beyonit.nl/mail/order/outlined/icon_twitter.png\" alt=\"\" height=\"20\"></a>&nbsp;";
        }
        // line 94
        echo "                        ";
        if ($this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getInstagramUrl()) {
            echo "<a href=\"";
            echo $this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getInstagramUrl();
            echo "\"><img src=\"https://beyonit.nl/mail/order/outlined/icon_instagram.png\" alt=\"\" height=\"20\"></a>&nbsp;";
        }
        // line 95
        echo "                        ";
        if ($this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getYoutubeUrl()) {
            echo "<a href=\"";
            echo $this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getYoutubeUrl();
            echo "\"><img src=\"https://beyonit.nl/mail/order/outlined/icon_youtube.png\" alt=\"\" height=\"20\"></a>";
        }
        // line 96
        echo "                      </td>
                    </tr>
                  </table>
                </td>
                <td width=\"50\"></td>
              </tr>
              <tr>
                <td colspan=\"3\" height=\"30\"></td>
              </tr>
            </table>
        </td>
      </tr>
    </table>


    <div style=\"padding: 15px 0;\">
      <font face=\"arial\" size=\"2\" color=\"#aaa\">
        ";
        // line 113
        if (array_key_exists("Settings", $context)) {
            // line 114
            echo "        ";
            echo $this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getSitename(($context["Settings"] ?? null));
            echo " &copy; ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
            echo "
        ";
        } else {
            // line 116
            echo "        ";
            echo $this->extensions['App\CmsBundle\Twig\Extension\PageInfo']->getSitename();
            echo " &copy; ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
            echo "
        ";
        }
        // line 118
        echo "      </font>
    </div>
  </center>
</body>

</html>
";
    }

    public function getTemplateName()
    {
        return "emails/notify.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 118,  212 => 116,  204 => 114,  202 => 113,  183 => 96,  176 => 95,  169 => 94,  162 => 93,  155 => 92,  149 => 91,  142 => 87,  116 => 64,  112 => 63,  97 => 50,  91 => 48,  85 => 46,  83 => 45,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "emails/notify.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/emails/notify.html.twig");
    }
}
