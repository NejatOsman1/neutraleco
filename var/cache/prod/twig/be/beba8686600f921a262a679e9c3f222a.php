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

/* @Cms/users/index.html.twig */
class __TwigTemplate_cc6e962d265122d7316b831200c9ebba extends Template
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
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@Cms/users/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gebruikers", [], "cms"), "html", null, true);
        echo " <small class=\"pull-right\"><a class=\"btn btn-primary\" href=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit");
        echo "?id=0\"><span class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></span> ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("btn.add_user", [], "cms"), "html", null, true);
        echo "</a></small>";
    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "<ul class=\"nav nav-tabs\" role=\"tablist\">
  <li class=\"nav-item\" role=\"presentation\">
    <button class=\"nav-link active\" id=\"tab1\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-content1\" type=\"button\" role=\"tab\" aria-controls=\"tab-content1\" aria-selected=\"true\">
      ";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Beheerders", [], "cms"), "html", null, true);
        echo "
    </button>
  </li>
  <li class=\"nav-item\" role=\"presentation\">
    <button class=\"nav-link\" id=\"tab2\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-content2\" type=\"button\" role=\"tab\" aria-controls=\"tab-content2\" aria-selected=\"false\">
      ";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gebruikers", [], "cms"), "html", null, true);
        echo "
    </button>
  </li>
  ";
        // line 23
        echo "  ";
        // line 30
        echo "  ";
        // line 35
        echo "  ";
        if ((($context["ipblocks"] ?? null) && $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN"))) {
            // line 36
            echo "  <li class=\"nav-item\" role=\"presentation\">
    <button class=\"nav-link\" id=\"tab5\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-content5\" type=\"button\" role=\"tab\" aria-controls=\"tab-content5\" aria-selected=\"false\">
      ";
            // line 38
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Geweigerd", [], "cms"), "html", null, true);
            echo " <span class=\"badge bg-secondary\">";
            echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["ipblocks"] ?? null)), "html", null, true);
            echo "</span></a>
    </button>
  </li>
  ";
        }
        // line 42
        echo "</ul>

    ";
        // line 57
        echo "
    <div class=\"tab-content\">
      <div class=\"tab-pane fade show active\" aria-labelledby=\"tab-content1\" id=\"tab-content1\" role=\"tabpanel\">

        <div class=\"btn-bar\">
            <div class=\"left\"></div>
            <div class=\"right\">
                <a href=\"";
        // line 64
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit", ["role" => "admin"]);
        echo "\" class=\"btn right waves-effect waves-light\">
                <i class=\"fa fa-plus\"></i>";
        // line 65
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Beheerder toevoegen", [], "cms"), "html", null, true);
        echo "</a>
            </div>
        </div>

      \t<form method=\"get\" id=\"admin-filter-form\" onsubmit=\"filterList('admin', 1); return false;\">

            <input type=\"hidden\" id=\"admin-filter_sort\" name=\"filter[sort]\" value=\"p.id\" />
            <input type=\"hidden\" id=\"admin-filter_order\" name=\"filter[order]\" value=\"desc\" />

            <button style=\"position:absolute;top:0;left:-9999px;\" type=\"submit\">";
        // line 74
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zoeken", [], "cms"), "html", null, true);
        echo "</button>
            <div class=\"card\">
                <div class=\"card-content\" style=\"padding-bottom: 10px;\">
                    <div class=\"filter-row row\" style=\"margin:0;\">
                        <div class=\"col s12 m10\">
                            <div class=\"mb-3\">
                                <label class=\"form-label\">";
        // line 80
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zoeken op titel", [], "cms"), "html", null, true);
        echo "</label>
                                <input class=\"form-control\" type=\"text\" name=\"filter[q]\" style=\"width:100%;\" value=\"";
        // line 81
        ((array_key_exists("q", $context)) ? (print (twig_escape_filter($this->env, ($context["q"] ?? null), "html", null, true))) : (print ("")));
        echo "\" />
                            </div>
                        </div>
                        <div class=\"col s12 m12 l2\">
                            <div class=\"mb-3\">
                                <label class=\"form-label\">";
        // line 86
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Status", [], "cms"), "html", null, true);
        echo "</label>
                                <select class=\"form-select\" name=\"filter[status]\" onchange=\"\$('#filter-form').submit();\">
                                    <option ";
        // line 88
        echo ((( !array_key_exists("status", $context) || (($context["status"] ?? null) == ""))) ? ("selected") : (""));
        echo " value=\"\"></option>
                                    <option ";
        // line 89
        echo (((array_key_exists("status", $context) && (($context["status"] ?? null) == "1"))) ? ("selected") : (""));
        echo " value=\"1\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Actief", [], "cms"), "html", null, true);
        echo "</option>
                                    <option ";
        // line 90
        echo (((array_key_exists("status", $context) && (($context["status"] ?? null) == "0"))) ? ("selected") : (""));
        echo " value=\"0\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Inactief", [], "cms"), "html", null, true);
        echo "</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class=\"card\">
        \t<div class=\"card-content\">
                    <div id=\"admin-filter-loader\"><div class=\"lds-ring\"><div></div><div></div><div></div><div></div></div></div>

          <div class=\"card-title\">
            <div class=\"card-titles\">
              <h6>";
        // line 104
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Beheerders", [], "cms"), "html", null, true);
        echo "</h6>
            </div>
            <div class=\"card-actions\">
              <select class=\"form-control form-select w-auto\" name=\"per_page\" id=\"admin-per_page\" onchange=\"filterList('admin', 1);\">
                <option value=\"10\">";
        // line 108
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("10 per pagina", [], "cms"), "html", null, true);
        echo "</option>
                <option value=\"20\" selected=\"selected\">";
        // line 109
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("20 per pagina", [], "cms"), "html", null, true);
        echo "</option>
                <option value=\"50\">";
        // line 110
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("50 per pagina", [], "cms"), "html", null, true);
        echo "</option>
                <option value=\"100\">";
        // line 111
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("100 per pagina", [], "cms"), "html", null, true);
        echo "</option>
              </select>
            </div>
          </div>
            <div class=\"table-wrapper\">
            <div class=\"table-responsive\">
        \t\t\t<table class=\"table table-hover\">
        \t\t\t\t<thead>
        \t\t\t\t\t<tr>
        \t\t\t\t\t\t";
        // line 121
        echo "        \t\t\t\t\t\t<th>";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Naam", [], "cms"), "html", null, true);
        echo "</th>
        \t\t\t\t\t\t<!-- <th style=\"width:250px;\">E-mailadres</th> -->
        \t\t\t\t\t\t<th style=\"width:300px;\">";
        // line 123
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Rollen", [], "cms"), "html", null, true);
        echo "</th>
        \t\t\t\t\t\t";
        // line 125
        echo "        \t\t\t\t\t\t<th class=\"text-center\" style=\"width:60px;\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Actief", [], "cms"), "html", null, true);
        echo "</th>
        \t\t\t\t\t\t<th class=\"text-center\" style=\"width:60px;\">";
        // line 126
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("2FA", [], "cms"), "html", null, true);
        echo "</th>
        \t\t\t\t\t\t<th class=\"text-center\" style=\"width:120px;\">";
        // line 127
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Kan verlopen", [], "cms"), "html", null, true);
        echo "</th>
        \t\t\t\t\t\t<th class=\"text-center\" style=\"width:135px;\">";
        // line 128
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verloopt op", [], "cms"), "html", null, true);
        echo "</th>
                                  <th class=\"text-center\" style=\"width:150px;\">";
        // line 129
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wachtwoord verloopt", [], "cms"), "html", null, true);
        echo "</th>
                                  ";
        // line 131
        echo "                                  <th class=\"right-align actions\" style=\"width:70px;\"></th>
        \t\t\t\t\t</tr>
        \t\t\t\t</thead>
        \t\t\t\t<tbody id=\"admin-filter-results\">
        \t\t\t\t</tbody>
        \t\t\t</table>
              </div>
            </div>

              <div class=\"pagination-wrapper\" data-type=\"admin\">
                <ul id=\"admin-pagination\" class=\"pagination\"></ul>
              </div>
            </div>
          </div>
      </div>

      <div class=\"tab-pane fade\" aria-labelledby=\"tab-content2\" id=\"tab-content2\" role=\"tabpanel\">

        <div class=\"btn-bar\">
            <div class=\"left\"></div>
            <div class=\"right\">
                <a href=\"";
        // line 152
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit", ["role" => "user"]);
        echo "\" class=\"btn right waves-effect waves-light\">
                <i class=\"fa fa-plus\"></i>";
        // line 153
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gebruiker toevoegen", [], "cms"), "html", null, true);
        echo "</a>
            </div>
        </div>

          <form method=\"get\" id=\"user-filter-form\" onsubmit=\"filterList('user', 1); return false;\">

              <input type=\"hidden\" id=\"user-filter_sort\" name=\"filter[sort]\" value=\"p.id\" />
              <input type=\"hidden\" id=\"user-filter_order\" name=\"filter[order]\" value=\"desc\" />

              <button style=\"position:absolute;top:0;left:-9999px;\" type=\"submit\">";
        // line 162
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zoeken", [], "cms"), "html", null, true);
        echo "</button>
              <div class=\"card\">
                  <div class=\"card-content\" style=\"padding-bottom: 10px;\">
                      <div class=\"filter-row row\" style=\"margin:0;\">
                          <div class=\"col s12 m10\">
                              <div class=\"mb-3\">
                                  <label class=\"form-label\">";
        // line 168
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zoeken op titel", [], "cms"), "html", null, true);
        echo "</label>
                                  <input class=\"form-control\" type=\"text\" name=\"filter[q]\" style=\"width:100%;\" value=\"";
        // line 169
        ((array_key_exists("q", $context)) ? (print (twig_escape_filter($this->env, ($context["q"] ?? null), "html", null, true))) : (print ("")));
        echo "\" />
                              </div>
                          </div>
                          <div class=\"col s12 m12 l2\">
                              <div class=\"mb-3\">
                                  <label class=\"form-label\">";
        // line 174
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Status", [], "cms"), "html", null, true);
        echo "</label>
                                  <select class=\"form-select\" name=\"filter[status]\" onchange=\"\$('#filter-form').submit();\">
                                      <option ";
        // line 176
        echo ((( !array_key_exists("status", $context) || (($context["status"] ?? null) == ""))) ? ("selected") : (""));
        echo " value=\"\"></option>
                                      <option ";
        // line 177
        echo (((array_key_exists("status", $context) && (($context["status"] ?? null) == "1"))) ? ("selected") : (""));
        echo " value=\"1\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Actief", [], "cms"), "html", null, true);
        echo "</option>
                                      <option ";
        // line 178
        echo (((array_key_exists("status", $context) && (($context["status"] ?? null) == "0"))) ? ("selected") : (""));
        echo " value=\"0\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Inactief", [], "cms"), "html", null, true);
        echo "</option>
                                  </select>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </form>
          <div class=\"card\">
              <div class=\"card-content\">
                  <div id=\"user-filter-loader\"><div class=\"lds-ring\"><div></div><div></div><div></div><div></div></div></div>

                  <div class=\"card-title\">
                    <div class=\"card-titles\">
                      <h6>";
        // line 192
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gebruikers", [], "cms"), "html", null, true);
        echo "</h6>
                    </div>
                    <div class=\"card-actions\">
                      <select class=\"form-control form-select w-auto\" name=\"per_page\" id=\"user-per_page\" onchange=\"filterList('user', 1);\">
                          <option value=\"10\">";
        // line 196
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("10 per pagina", [], "cms"), "html", null, true);
        echo "</option>
                          <option value=\"20\" selected>";
        // line 197
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("20 per pagina", [], "cms"), "html", null, true);
        echo "</option>
                          <option value=\"50\">";
        // line 198
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("50 per pagina", [], "cms"), "html", null, true);
        echo "</option>
                          <option value=\"100\">";
        // line 199
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
                                ";
        // line 210
        echo "                                ";
        // line 211
        echo "                                <th>";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Naam", [], "cms"), "html", null, true);
        echo "</th>
                                <!-- <th style=\"width:250px;\">E-mailadres</th> -->
                                <th style=\"width:300px;\">";
        // line 213
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Rollen", [], "cms"), "html", null, true);
        echo "</th>
                                ";
        // line 215
        echo "                                <th class=\"text-center\" style=\"width:60px;\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Actief", [], "cms"), "html", null, true);
        echo "</th>
        \t\t\t\t\t\t<th class=\"text-center\" style=\"width:60px;\">";
        // line 216
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("2FA", [], "cms"), "html", null, true);
        echo "</th>
                                <th class=\"text-center\" style=\"width:120px;\">";
        // line 217
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Kan verlopen", [], "cms"), "html", null, true);
        echo "</th>
                                <th class=\"text-center\" style=\"width:135px;\">";
        // line 218
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verloopt op", [], "cms"), "html", null, true);
        echo "</th>
                                <th class=\"text-center\" style=\"width:150px;\">";
        // line 219
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wachtwoord verloopt", [], "cms"), "html", null, true);
        echo "</th>
                                ";
        // line 221
        echo "                                <th class=\"right-align actions\" style=\"width:70px;\"></th>
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

      ";
        // line 321
        echo "
      ";
        // line 395
        echo "
    ";
        // line 444
        echo "
      ";
        // line 445
        if ((($context["ipblocks"] ?? null) && $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN"))) {
            // line 446
            echo "          <div class=\"tab-pane fade\" aria-labelledby=\"tab-content5\" id=\"tab-content5\" role=\"tabpanel\">
              <div class=\"card\">
                  <div class=\"card-content\">
                      <div class=\"card-title\">
                        <h6>";
            // line 450
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Geweigerde logins", [], "cms"), "html", null, true);
            echo "</h6>
                      </div>

                      <div class=\"table-responsive\">
                      <table class=\"table table-hover\">
                          <thead>
                              <tr>
                                  <td style=\"width:200px;\">";
            // line 457
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("IP-adres", [], "cms"), "html", null, true);
            echo "</td>
                                      <td style=\"width:100px;\">";
            // line 458
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Land", [], "cms"), "html", null, true);
            echo "</td>
                                  <td style=\"width:200px;\">";
            // line 459
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gebruikersnaam", [], "cms"), "html", null, true);
            echo "</td>
                                  <td style=\"width:100px;\">";
            // line 460
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pogingen", [], "cms"), "html", null, true);
            echo "</td>
                                  <td style=\"width:220px;\">";
            // line 461
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cooldown datum", [], "cms"), "html", null, true);
            echo "</td>
                                  <td style=\"width:250px;\">&nbsp;</td>
                              </tr>
                          </thead>
                          <tbody>
                              ";
            // line 466
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["ipblocks"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["ipcheck"]) {
                // line 467
                echo "                                  <tr>
                                      <td>";
                // line 468
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ipcheck"], "ip", [], "any", false, false, false, 468), "html", null, true);
                echo "</td>
                                        <td>";
                // line 469
                (((twig_get_attribute($this->env, $this->source, $context["ipcheck"], "country", [], "any", true, true, false, 469) &&  !(null === twig_get_attribute($this->env, $this->source, $context["ipcheck"], "country", [], "any", false, false, false, 469)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ipcheck"], "country", [], "any", false, false, false, 469), "html", null, true))) : (print ("n.v.t.")));
                echo "</td>
                                      <td>";
                // line 470
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ipcheck"], "userAttempt", [], "any", false, false, false, 470), "html", null, true);
                echo "</td>
                                      <td>";
                // line 471
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ipcheck"], "loginAttempts", [], "any", false, false, false, 471), "html", null, true);
                echo "</td>
                                      <td>";
                // line 472
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["ipcheck"], "loginLastAttempt", [], "any", false, false, false, 472), "d-m-Y H:i:s"), "html", null, true);
                echo "</td>
                                      <td class=\"right-align\">
                                        <div class=\"actions\">
                                          <a href=\"";
                // line 475
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_deleteip", ["ip" => twig_get_attribute($this->env, $this->source, $context["ipcheck"], "ip", [], "any", false, false, false, 475)]), "html", null, true);
                echo "\" onclick=\"if(confirm('";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u deze login pogingen herstellen?", [], "cms"), "html", null, true);
                echo "')){return true;}else{return false;}\" title=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Herstellen", [], "cms"), "html", null, true);
                echo "\"  data-bs-toggle=\"tooltip\" data-bs-placement=\"top\"><i class=\"fa fa-sync-alt\"></i></a>
                                          <a href=\"";
                // line 476
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_blockip", ["ip" => twig_get_attribute($this->env, $this->source, $context["ipcheck"], "ip", [], "any", false, false, false, 476)]), "html", null, true);
                echo "\" onclick=\"if(confirm('";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u deze login pogingen blokkeren?", [], "cms"), "html", null, true);
                echo "')){return true;}else{return false;}\" title=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Blokkeren", [], "cms"), "html", null, true);
                echo "\"  data-bs-toggle=\"tooltip\" data-bs-placement=\"top\"><i class=\"fa fa-ban\"></i></a>
                                        </div>
                                      </td>
                                  </tr>
                              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ipcheck'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 481
            echo "                          </tbody>
                      </table>
                      </div>
                  </div>
              </div>
          </div>
      ";
        }
        // line 488
        echo "    </div>

    <script>
      var current_page = 1;
      var filterUrl = '";
        // line 492
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_filter");
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
        // line 506
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit");
        echo "/' + p.id + '\">' + p.name + '<br/><small>' + p.username + '</small></td>');
                      tr.append('<td data-url=\"";
        // line 507
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit");
        echo "/' + p.id + '\">' + p.roles.join(', ') + '</td>');
                      // tr.append('<td class=\"text-center\" data-url=\"";
        // line 508
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit");
        echo "/' + p.id + '\">' + p.lastLogin + '</td>');
                      tr.append('<td class=\"text-center\" data-url=\"";
        // line 509
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit");
        echo "/' + p.id + '\">' + (p.enabled && p.isExpired != true ? '<i class=\"fa fa-check-circle text-green\"></i>' : '<i class=\"fa fa-times-circle\"></i>') + '</td>');
                      tr.append('<td class=\"text-center\" data-url=\"";
        // line 510
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit");
        echo "/' + p.id + '\">' + (p.twoFactor ? '<i class=\"fa fa-check-circle text-green\"></i>' : '<i class=\"fa fa-times-circle text-gray\"></i>') + '</td>');
                      tr.append('<td class=\"text-center\" data-url=\"";
        // line 511
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit");
        echo "/' + p.id + '\">' + (p.expires ? (p.isExpired ? '<i class=\"fa fa-check-circle text-red\"></i>' : '<i class=\"fa fa-check-circle text-orange\"></i>') : '<i class=\"fa fa-times-circle text-gray\"</i>') + '</td>');
                      tr.append('<td class=\"text-center\" data-url=\"";
        // line 512
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit");
        echo "/' + p.id + '\">' + (p.expired) + '</td>');

                      if(p.passwordExpireEnabled == false)
                      {
                          tr.append('<td class=\"text-center\" data-url=\"";
        // line 516
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit");
        echo "/' + p.id + '\"><i class=\"fa fa-times-circle text-gray\"></i></td>');
                      } else if (p.passwordExpireEnabled && p.isPasswordExpired == false) {
                          tr.append('<td class=\"text-center\" data-url=\"";
        // line 518
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit");
        echo "/' + p.id + '\"><i class=\"fa fa-check-circle text-green\"></i></td>')
                      } else
                      {
                          tr.append('<td class=\"text-center\" data-url=\"";
        // line 521
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit");
        echo "/' + p.id + '\"><i class=\"fa fa-times-circle text-red\"></i></td>')
                      }

                      // tr.append('<td class=\"text-center\" data-url=\"";
        // line 524
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_edit");
        echo "/' + p.id + '\">' + p.passwordExpired + '</td>');

                      if ('";
        // line 526
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN"), "html", null, true);
        echo "' != '1' && '";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 526), "denyUserRemoval", [], "any", false, false, false, 526), "html", null, true);
        echo "' == '1' && p.isAdmin) {
                          tr.append('<td class=\"right-align actions\"><i class=\"far fa-trash-alt\"></i></td>')
                      } else {
                          tr.append('<td class=\"right-align actions\">\\
                              ";
        // line 530
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ALLOWED_TO_SWITCH")) {
            echo "<a href=\"' + (p.isAdmin ? '";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin");
            echo "' : '";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("homepage");
            echo "') + '?_switch_user=' + p.username + '\" class=\"fa fa-key\" style=\"color: #f3d900;\"></a>";
        }
        echo "\\
  \t\t\t\t\t\t<a href=\"#\" onclick=\"cpop.confirm( \\'";
        // line 531
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u volgende gebruiker verwijderen?", [], "cms"), "html", null, true);
        echo " <b>' + p.name + '</b>. \\', function(){\\
  \t\t\t\t\t\t\twindow.location = \\'";
        // line 532
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users_delete");
        echo "/' + p.id + '\\';\\
  \t\t\t\t\t\t} ); return false;\" title=\"";
        // line 533
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms"), "html", null, true);
        echo "\"><i class=\"far fa-trash-alt\"></i></a>\\
                          </td>');
                      }

                      \$('#' + what + '-filter-results').append(tr);
                  });
              }else{
                  \$('#' + what + '-filter-results').append('<tr><td colspan=\"9\" class=\"text-center\"><em>";
        // line 540
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
        // line 603
        if (($context["hasWebshop"] ?? null)) {
            // line 604
            echo "              filterList('webshop_users', 1);
          ";
        }
        // line 606
        echo "          */
      });
    </script>
";
    }

    public function getTemplateName()
    {
        return "@Cms/users/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  722 => 606,  718 => 604,  716 => 603,  650 => 540,  640 => 533,  636 => 532,  632 => 531,  622 => 530,  613 => 526,  608 => 524,  602 => 521,  596 => 518,  591 => 516,  584 => 512,  580 => 511,  576 => 510,  572 => 509,  568 => 508,  564 => 507,  560 => 506,  543 => 492,  537 => 488,  528 => 481,  513 => 476,  505 => 475,  499 => 472,  495 => 471,  491 => 470,  487 => 469,  483 => 468,  480 => 467,  476 => 466,  468 => 461,  464 => 460,  460 => 459,  456 => 458,  452 => 457,  442 => 450,  436 => 446,  434 => 445,  431 => 444,  428 => 395,  425 => 321,  407 => 221,  403 => 219,  399 => 218,  395 => 217,  391 => 216,  386 => 215,  382 => 213,  376 => 211,  374 => 210,  361 => 199,  357 => 198,  353 => 197,  349 => 196,  342 => 192,  323 => 178,  317 => 177,  313 => 176,  308 => 174,  300 => 169,  296 => 168,  287 => 162,  275 => 153,  271 => 152,  248 => 131,  244 => 129,  240 => 128,  236 => 127,  232 => 126,  227 => 125,  223 => 123,  217 => 121,  205 => 111,  201 => 110,  197 => 109,  193 => 108,  186 => 104,  167 => 90,  161 => 89,  157 => 88,  152 => 86,  144 => 81,  140 => 80,  131 => 74,  119 => 65,  115 => 64,  106 => 57,  102 => 42,  93 => 38,  89 => 36,  86 => 35,  84 => 30,  82 => 23,  76 => 15,  68 => 10,  63 => 7,  59 => 6,  47 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/users/index.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/users/index.html.twig");
    }
}
