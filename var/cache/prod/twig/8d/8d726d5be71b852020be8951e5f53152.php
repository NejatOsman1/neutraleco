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

/* @TrinityNeutral/users/index.html.twig */
class __TwigTemplate_455d7ba56e9fa92fc84a6c5f8b679725 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'pagetitle' => [$this, 'block_pagetitle'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@Cms/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@TrinityNeutral/users/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gebruikers", [], "cms"), "html", null, true);
        echo " <small class=\"pull-right\"><a class=\"btn btn-primary\" href=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_neutral_users_edit");
        echo "?id=0\"><span class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></span> ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("btn.add_user", [], "cms"), "html", null, true);
        echo "</a></small>";
    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "
          <div class=\"card\">
              <div class=\"card-content\">
                  <div id=\"user-filter-loader\"><div class=\"lds-ring\"><div></div><div></div><div></div><div></div></div></div>

                  <div class=\"card-title\">
                    <div class=\"card-titles\">
                      <h6>";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gebruikers", [], "cms"), "html", null, true);
        echo "</h6>
                    </div>
                    <div class=\"card-actions\">
\t\t\t\t\t\t\t\t\t\t  <form method=\"get\" id=\"user-filter-form\" class=\"d-flex\" onsubmit=\"filterList('user', 1); return false;\">
\t\t\t\t\t\t\t\t\t\t\t  ";
        // line 19
        echo "\t\t\t\t\t\t\t\t\t\t\t  <input class=\"form-control\" type=\"text\" name=\"filter[q]\" placeholder=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zoeken op naam", [], "cms"), "html", null, true);
        echo "\" value=\"";
        ((array_key_exists("q", $context)) ? (print (twig_escape_filter($this->env, ($context["q"] ?? null), "html", null, true))) : (print ("")));
        echo "\" />

\t\t\t\t\t\t\t\t\t\t\t  ";
        // line 22
        echo "\t\t\t\t\t\t\t\t\t\t\t  <select class=\"form-select\" name=\"filter[status]\" onchange=\"\$('#filter-form').submit();\">
\t\t\t\t\t\t\t\t\t\t\t\t  <option ";
        // line 23
        echo ((( !array_key_exists("status", $context) || (($context["status"] ?? null) == ""))) ? ("selected") : (""));
        echo " value=\"\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Status", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t  <option ";
        // line 24
        echo (((array_key_exists("status", $context) && (($context["status"] ?? null) == "1"))) ? ("selected") : (""));
        echo " value=\"1\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Actief", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t  <option ";
        // line 25
        echo (((array_key_exists("status", $context) && (($context["status"] ?? null) == "0"))) ? ("selected") : (""));
        echo " value=\"0\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Inactief", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t\t\t\t\t\t\t\t  </select>
\t\t\t\t\t\t\t\t\t\t  </form>

                      <select class=\"form-control form-select w-auto\" name=\"per_page\" id=\"user-per_page\" onchange=\"filterList('user', 1);\">
                          <option value=\"10\">";
        // line 30
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("10 per pagina", [], "cms"), "html", null, true);
        echo "</option>
                          <option value=\"20\" selected>";
        // line 31
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("20 per pagina", [], "cms"), "html", null, true);
        echo "</option>
                          <option value=\"50\">";
        // line 32
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("50 per pagina", [], "cms"), "html", null, true);
        echo "</option>
                          <option value=\"100\">";
        // line 33
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("100 per pagina", [], "cms"), "html", null, true);
        echo "</option>
                      </select>
                    </div>
                  </div>

                  <div class=\"table-wrapper\">
                  <div class=\"table-responsive\">
                    <table class=\"table table-hover\">
                        <thead>
                            <tr>
                                <th>";
        // line 43
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Naam", [], "cms"), "html", null, true);
        echo "</th>
                                <!-- <th style=\"width:250px;\">E-mailadres</th> -->
                                <!-- <th style=\"width:300px;\">";
        // line 45
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Rollen", [], "cms"), "html", null, true);
        echo "</th>-->
                                <th class=\"text-center\" style=\"width:60px;\">";
        // line 46
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Actief", [], "cms"), "html", null, true);
        echo "</th>
        \t\t\t\t\t\t<!--<th class=\"text-center\" style=\"width:60px;\">";
        // line 47
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("2FA", [], "cms"), "html", null, true);
        echo "</th>-->
                                <!--<th class=\"text-center\" style=\"width:120px;\">";
        // line 48
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Kan verlopen", [], "cms"), "html", null, true);
        echo "</th>-->
                                <!--<th class=\"text-center\" style=\"width:135px;\">";
        // line 49
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verloopt op", [], "cms"), "html", null, true);
        echo "</th>-->
                                <th class=\"text-center\" style=\"width:150px;\">";
        // line 50
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wachtwoord verloopt", [], "cms"), "html", null, true);
        echo "</th>
                                <th class=\"right-align actions\" style=\"width:70px;\"></th>
                            </tr>
                        </thead>
                        <tbody id=\"user-filter-results\">
                        </tbody>
                    </table>
                    </div>
                  </div>

                      <div class=\"pagination-wrapper\" data-type=\"user\">
                          <ul id=\"user-pagination\" class=\"pagination left\"></ul>
                      </div>
              </div>
          </div>
      </div>
    </div>

    <script>
      var current_page = 1;
      var filterUrl = '";
        // line 70
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_neutral_users_filter");
        echo "';
      function filterList(what, p){
          current_page = p;
          \$('#' + what + '-filter-loader').show();
          var query = '/' + current_page + '?role=' + what + '&' + \$('#' + what + '-filter-form').serialize() + '&pp=' + \$('#' + what + '-per_page').val();;
          \$.ajax(filterUrl + query).done(function(response){

              \$('#' + what + '-filter-results').html('');
              if(response.count){
                  \$.each(response.results, function(ind, p){
                      var tr = \$('<tr>');
                      if(!p.enabled){
                          tr.css('opacity', 0.5);
                      }
                      tr.append('<td data-url=\"";
        // line 84
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_neutral_users_edit");
        echo "/' + p.id + '\">' + p.name + '<br/><small>' + p.username + '</small></td>');
                      //tr.append('<td data-url=\"";
        // line 85
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_neutral_users_edit");
        echo "/' + p.id + '\">' + p.roles.join(', ') + '</td>');
                      // tr.append('<td class=\"text-center\" data-url=\"";
        // line 86
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_neutral_users_edit");
        echo "/' + p.id + '\">' + p.lastLogin + '</td>');
                      tr.append('<td class=\"text-center\" data-url=\"";
        // line 87
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_neutral_users_edit");
        echo "/' + p.id + '\">' + (p.enabled && p.isExpired != true ? '<i class=\"fa fa-check-circle text-green\"></i>' : '<i class=\"fa fa-times-circle\"></i>') + '</td>');
                      //tr.append('<td class=\"text-center\" data-url=\"";
        // line 88
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_neutral_users_edit");
        echo "/' + p.id + '\">' + (p.twoFactor ? '<i class=\"fa fa-check-circle text-green\"></i>' : '<i class=\"fa fa-times-circle text-gray\"></i>') + '</td>');
                      //tr.append('<td class=\"text-center\" data-url=\"";
        // line 89
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_neutral_users_edit");
        echo "/' + p.id + '\">' + (p.expires ? (p.isExpired ? '<i class=\"fa fa-check-circle text-red\"></i>' : '<i class=\"fa fa-check-circle text-orange\"></i>') : '<i class=\"fa fa-times-circle text-gray\"</i>') + '</td>');
                      //tr.append('<td class=\"text-center\" data-url=\"";
        // line 90
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_neutral_users_edit");
        echo "/' + p.id + '\">' + (p.expired) + '</td>');

                      if(p.passwordExpireEnabled == false)
                      {
                          tr.append('<td class=\"text-center\" data-url=\"";
        // line 94
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_neutral_users_edit");
        echo "/' + p.id + '\"><i class=\"fa fa-times-circle text-gray\"></i></td>');
                      } else if (p.passwordExpireEnabled && p.isPasswordExpired == false) {
                          tr.append('<td class=\"text-center\" data-url=\"";
        // line 96
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_neutral_users_edit");
        echo "/' + p.id + '\"><i class=\"fa fa-check-circle text-green\"></i></td>')
                      } else
                      {
                          tr.append('<td class=\"text-center\" data-url=\"";
        // line 99
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_neutral_users_edit");
        echo "/' + p.id + '\"><i class=\"fa fa-times-circle text-red\"></i></td>')
                      }

                      // tr.append('<td class=\"text-center\" data-url=\"";
        // line 102
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_neutral_users_edit");
        echo "/' + p.id + '\">' + p.passwordExpired + '</td>');

                      if ('";
        // line 104
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN"), "html", null, true);
        echo "' != '1' && '";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 104), "denyUserRemoval", [], "any", false, false, false, 104), "html", null, true);
        echo "' == '1' && p.isAdmin) {
                          tr.append('<td class=\"right-align actions\"><i class=\"far fa-trash-alt\"></i></td>')
                      } else {
                          tr.append('<td class=\"right-align actions\">\\
  \t\t\t\t\t\t<a href=\"#\" onclick=\"cpop.confirm( \\'";
        // line 108
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u volgende gebruiker verwijderen?", [], "cms"), "html", null, true);
        echo " <b>' + p.name + '</b>. \\', function(){\\
  \t\t\t\t\t\t\twindow.location = \\'";
        // line 109
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_neutral_users_delete");
        echo "/' + p.id + '\\';\\
  \t\t\t\t\t\t} ); return false;\" title=\"";
        // line 110
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms"), "html", null, true);
        echo "\"><i class=\"far fa-trash-alt\"></i></a>\\
                          </td>');
                      }

                      \$('#' + what + '-filter-results').append(tr);
                  });
              }else{
                  \$('#' + what + '-filter-results').append('<tr><td colspan=\"9\" class=\"text-center\"><em>";
        // line 117
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Geen resultaten gevonden", [], "cms"), "html", null, true);
        echo "</em></td></tr>');
              }

              \$('td[data-url]').css('cursor', 'pointer').click(function(){
                  window.location = \$(this).data('url');
              });

              \$('#' + what + '-pagination').html('');



              if (response.page > 1) {
                  \$('#' + what + '-pagination').append(\$('<li class=\"page-item\"><a class=\"page-link\" href=\"#\" aria-label=\"Previous\" onclick=\"return prevPage(this);\"><span aria-hidden=\"true\">&laquo;</span></a></li>'));
              }else{
                  \$('#' + what + '-pagination').append(\$('<li class=\"page-item disabled\"><a class=\"page-link\" href=\"#\" aria-label=\"Previous\" tabindex=\"-1\" aria-disabled=\"true\"><span aria-hidden=\"true\">&laquo;</span></a></li>'));
              }

              \$.each(paginationParser(parseInt(response.page), parseInt(response.pages)), function(x, i){
                  if(i == '...'){
                      \$('#' + what + '-pagination').append(\$('<li class=\"waves-effect' + (response.page == i ? ' active' : '') + '\">...</li>'));
                  }else{
                      \$('#' + what + '-pagination').append(\$('<li class=\"page-item' + (response.page == i ? ' active' : '') + '\"><a class=\"page-link\" href=\"#\" onclick=\"return selectPage(this, ' + i + ');\">' + i + '</a></li>'));
                  }
              });

              if (response.page < response.pages) {
                  \$('#' + what + '-pagination').append(\$('<li class=\"page-item\"><a class=\"page-link\" href=\"#\" aria-label=\"Next\" onclick=\"return nextPage(this);\"><span aria-hidden=\"true\">&raquo;</span></a></li>'));
              }else{
                  \$('#' + what + '-pagination').append(\$('<li class=\"page-item disabled\"><a class=\"page-link\" href=\"#\" aria-label=\"Next\" tabindex=\"-1\" aria-disabled=\"true\"><span aria-hidden=\"true\">&raquo;</span></a></li>'));
              }

              \$('#' + what + '-filter-loader').hide();
          });
      }

      function selectPage(el, n){
          var type = \$(el).closest('.pagination-wrapper').data('type');
          console.log( type );
          filterList(type, n);
          return false;
      }

      function nextPage(el){
          var type = \$(el).closest('.pagination-wrapper').data('type');
          console.log( type );
          filterList(type, current_page + 1);
          return false;
      }

      function prevPage(el){
          var type = \$(el).closest('.pagination-wrapper').data('type');
          console.log( type );
          filterList(type, current_page - 1);
          return false;
      }

      \$(function(){
          filterList('admin', 1);
          filterList('user', 1);
          /*
          filterList('other', 1);
          */
          /*
          ";
        // line 180
        if (($context["hasWebshop"] ?? null)) {
            // line 181
            echo "              filterList('webshop_users', 1);
          ";
        }
        // line 183
        echo "          */
      });
    </script>
";
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/users/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  354 => 183,  350 => 181,  348 => 180,  282 => 117,  272 => 110,  268 => 109,  264 => 108,  255 => 104,  250 => 102,  244 => 99,  238 => 96,  233 => 94,  226 => 90,  222 => 89,  218 => 88,  214 => 87,  210 => 86,  206 => 85,  202 => 84,  185 => 70,  162 => 50,  158 => 49,  154 => 48,  150 => 47,  146 => 46,  142 => 45,  137 => 43,  124 => 33,  120 => 32,  116 => 31,  112 => 30,  102 => 25,  96 => 24,  90 => 23,  87 => 22,  79 => 19,  72 => 14,  63 => 7,  59 => 6,  47 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/users/index.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/NeutralBundle/Resources/views/users/index.html.twig");
    }
}
