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

/* @TrinityNeutral/front/projects/projects.html.twig */
class __TwigTemplate_ba1e1577bd946d51f01f6984583f6ed6 extends Template
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
        $this->loadTemplate("@TrinityNeutral/messages.html.twig", "@TrinityNeutral/front/projects/projects.html.twig", 1)->display($context);
        // line 2
        echo "<div class=\"profile-titlebar\">
  <div class=\"title\">
    <h1>
      ";
        // line 5
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Mijn projecten", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 5), "locale", [], "any", false, false, false, 5));
        echo "
    </h1>
  </div>
  <div class=\"buttons\">
\t \t<a href=\"";
        // line 9
        echo twig_escape_filter($this->env, ($context["createProjectLink"] ?? null), "html", null, true);
        echo "\" class=\"btn btn-gradient\">
\t\t\tProject aanmelden <i class=\"fa fa-arrow-right d-none d-lg-inline-block\"></i>
\t\t</a>
  </div>
</div>

<div class=\"row\">
  <div class=\"col-12 col-xl-8\">
\t\t<div class=\"row projects-overview\">
\t\t\t";
        // line 18
        if ((twig_length_filter($this->env, ($context["projects"] ?? null)) > 0)) {
            // line 19
            echo "\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["projects"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
                // line 20
                echo "\t\t\t\t\t<div data-id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 20), "html", null, true);
                echo "\" class=\"col-12 col-lg-6\">
\t\t\t\t\t\t<div class=\"card card-project\">
\t\t\t\t\t\t\t<div class=\"card-image\">
\t\t\t\t\t\t\t\t<div class=\"card-image-tools\">
\t\t\t\t\t\t\t\t\t<div class=\"left\">
\t\t\t\t\t\t\t\t\t\t";
                // line 25
                if (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "getcomments", [], "method", false, false, false, 25)) > 0) && twig_in_filter(twig_get_attribute($this->env, $this->source, $context["project"], "status", [], "any", false, false, false, 25), [0 => 1, 1 => 2, 2 => 3]))) {
                    // line 26
                    echo "\t\t\t\t\t\t\t\t\t\t<a class=\"comment-modal\" data-project-id=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 26), "html", null, true);
                    echo "\" href=\"#\" title=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Feedback"), "html", null, true);
                    echo "\" data-bs-toggle=\"modal\" data-bs-target=\"#form-modal\"><i class=\"far fa-comment\"></i></a>
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 28
                echo "\t\t\t\t\t\t\t\t\t\t";
                if (((twig_get_attribute($this->env, $this->source, $context["project"], "getStatus", [], "any", false, false, false, 28) == 4) || (twig_get_attribute($this->env, $this->source, $context["project"], "getStatus", [], "any", false, false, false, 28) == 6))) {
                    // line 29
                    echo "\t\t\t\t\t\t\t\t\t\t<a class=\"project-transactions-modal\" data-project-status=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "getStatus", [], "any", false, false, false, 29), "html", null, true);
                    echo "\" data-project-id=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 29), "html", null, true);
                    echo "\" href=\"#\" title=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Transacties"), "html", null, true);
                    echo "\" data-bs-toggle=\"modal\" data-bs-target=\"#project-transactions-modal\"><i class=\"fa fa-euro-sign\"></i></a>
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 31
                echo "\t\t\t\t\t\t\t\t\t\t";
                if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "getBuyInCredits", [], "method", false, false, false, 31)) > 0)) {
                    // line 32
                    echo "\t\t\t\t\t\t\t\t\t\t<a class=\"project-buyincredits-modal\" data-project-status=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "getStatus", [], "any", false, false, false, 32), "html", null, true);
                    echo "\" data-project-id=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 32), "html", null, true);
                    echo "\" href=\"#\" title=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Contact aanvragen"), "html", null, true);
                    echo "\" data-bs-toggle=\"modal\" data-bs-target=\"#project-buyincredits-modal\"><i class=\"fa fa-window-maximize\"></i></a>
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 34
                echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"right\">
\t\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 36
                echo twig_escape_filter($this->env, ($context["projectsLink"] ?? null), "html", null, true);
                echo "wijzigen/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 36), "html", null, true);
                echo "\" title=\"";
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["project"], "status", [], "any", false, false, false, 36), [0 => 5, 1 => 6])) {
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bekijken"), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wijzigen"), "html", null, true);
                }
                echo "\"><i class=\"fa ";
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["project"], "status", [], "any", false, false, false, 36), [0 => 5, 1 => 6])) {
                    echo "fa-fw fa-eye";
                } else {
                    echo "fa-edit";
                }
                echo "\"></i></a>
\t\t\t\t\t\t\t\t\t\t";
                // line 37
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["project"], "status", [], "any", false, false, false, 37), [0 => 1, 1 => 2, 2 => 3])) {
                    // line 38
                    echo "\t\t\t\t\t\t\t\t\t\t<a class=\"delete\" href=\"#\" onclick=\"cpop.confirm( 'Wilt u het volgende project verwijderen? <b>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "name", [], "any", false, false, false, 38), "html", null, true);
                    echo "</b>', function(){
\t\t\t\t\t\t\t\t\t\t\twindow.location = '";
                    // line 39
                    echo twig_escape_filter($this->env, ($context["projectsLink"] ?? null), "html", null, true);
                    echo "verwijderen/";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 39), "html", null, true);
                    echo "';
\t\t\t\t\t\t\t\t\t\t} ); return false;\" title=\"";
                    // line 40
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen"), "html", null, true);
                    echo "\"><i class=\"far fa-trash-alt\"></i></a>
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 42
                echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t";
                // line 45
                if (twig_get_attribute($this->env, $this->source, $context["project"], "header", [], "any", false, false, false, 45)) {
                    // line 46
                    echo "\t\t\t\t\t\t\t\t\t<div class=\"image\" style=\"background: url('";
                    echo twig_escape_filter($this->env, ($context["imgUrlPath"] ?? null), "html", null, true);
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["project"], "header", [], "any", false, false, false, 46), "getpath", [], "any", false, false, false, 46), "html", null, true);
                    echo "') no-repeat center; background-size: cover;\"></div>
\t\t\t\t\t\t\t\t";
                }
                // line 48
                echo "
\t\t\t\t\t\t\t\t<div class=\"card-image-labels\">
\t\t\t\t\t\t\t\t\t<div class=\"status-wrapper\">
\t\t\t\t\t\t\t\t\t\t<div class=\"status";
                // line 51
                if ((twig_get_attribute($this->env, $this->source, $context["project"], "status", [], "any", false, false, false, 51) == 6)) {
                    echo " sold-out";
                }
                if ((twig_get_attribute($this->env, $this->source, $context["project"], "status", [], "any", false, false, false, 51) == 5)) {
                    echo " rejected";
                }
                if ((twig_get_attribute($this->env, $this->source, $context["project"], "status", [], "any", false, false, false, 51) == 4)) {
                    echo " active";
                }
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t";
                // line 52
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "project_status", [], "any", false, false, false, 52), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                // line 55
                if ((twig_get_attribute($this->env, $this->source, $context["project"], "project_labels", [], "any", true, true, false, 55) && (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "project_labels", [], "any", false, false, false, 55)) > 0))) {
                    // line 56
                    echo "\t\t\t\t\t\t\t\t\t\t<div class=\"label-wrapper\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 57
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["project"], "project_labels", [], "any", false, false, false, 57));
                    foreach ($context['_seq'] as $context["_key"] => $context["label"]) {
                        // line 58
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"label\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 59
                        echo twig_escape_filter($this->env, $context["label"], "html", null, true);
                        echo "
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['label'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 62
                    echo "\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                }
                // line 64
                echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t<h3>";
                // line 68
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "name", [], "any", false, false, false, 68), "html", null, true);
                echo "</h3>
\t\t\t\t\t\t\t\t<p>";
                // line 69
                echo twig_striptags(twig_get_attribute($this->env, $this->source, $context["project"], "summary", [], "any", false, false, false, 69));
                echo "</p>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"card-data\">
\t\t\t\t\t\t\t\t<table>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td><b>";
                // line 75
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Capaciteit beschikbaar"), "html", null, true);
                echo "</b></td>
\t\t\t\t\t\t\t\t\t\t<td>";
                // line 76
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "getC02CapacityAvailableByTotalCredits", [0 => twig_get_attribute($this->env, $this->source, $context["project"], "totalUsedCredits", [], "any", false, false, false, 76)], "method", false, false, false, 76), "html", null, true);
                echo "%</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td colspan=\"2\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"progressbar\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress\" style=\"width: ";
                // line 81
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "getC02CapacityByTotalCredits", [0 => twig_get_attribute($this->env, $this->source, $context["project"], "totalUsedCredits", [], "any", false, false, false, 81)], "method", false, false, false, 81), "html", null, true);
                echo "%;\"></div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                // line 87
                if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["project"], "getcomments", [], "method", false, false, false, 87)) > 0)) {
                    // line 88
                    echo "\t\t\t\t\t\t\t\t<div class=\"d-none project-comments\">
\t\t\t\t\t\t\t\t\t";
                    // line 89
                    $this->loadTemplate("@TrinityNeutral/front/projects/comment-ext.html.twig", "@TrinityNeutral/front/projects/projects.html.twig", 89)->display(twig_array_merge($context, ["comments" => twig_reverse_filter($this->env, twig_sort_filter($this->env, twig_get_attribute($this->env, $this->source,                     // line 90
$context["project"], "getComments", [], "method", false, false, false, 90))), "user" =>                     // line 91
($context["user"] ?? null)]));
                    // line 93
                    echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
                }
                // line 95
                echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['project'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 98
            echo "\t\t\t";
        } else {
            // line 99
            echo "\t\t\t\t<div class=\"col-12 col-lg-6\">
\t\t\t\t\t<div class=\"card card-add\">
\t\t\t\t\t\t<a href=\"";
            // line 101
            echo twig_escape_filter($this->env, ($context["createProjectLink"] ?? null), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-plus\"></i>
\t\t\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t\t\t";
            // line 105
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Project toevoegen"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 112
        echo "\t\t</div>
  </div>
  <div class=\"col-12 col-xl-4 d-none d-xl-inline-block\">
    <div class=\"card card-sidebar\">
      <div class=\"card-body\">
        <h3>";
        // line 117
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Mijn account", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 117), "locale", [], "any", false, false, false, 117));
        echo "</h3>
\t\t\t\t";
        // line 118
        echo $this->extensions['App\CmsBundle\Twig\Extension\PageNavigation']->custom_navigation("my-account", "bootstrap-5");
        echo "
      </div>
    </div>
  </div>
</div>
<script defer src=\"/bundles/cms/js/jquery.cpop_bootstrap.js\"></script>

<div id=\"form-modal\" class=\"modal modal\" tabindex=\"-1\">
\t<div class=\"modal-dialog modal-dialog-centered modal-dialog-scrollable\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<div class=\"modal-title text-center\">
\t\t\t\t\t<h3>
\t\t\t\t\t\t<i class=\"far fa-comment\"></i> ";
        // line 131
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Feedback Neutral.eco"), "html", null, true);
        echo "
\t\t\t\t\t</h3>

\t\t\t\t\t<p>
\t\t\t\t\t\tDit project heeft feedback ontvangen,<br/>
\t\t\t\t\t\tzie onderstaande bericht(en).
\t\t\t\t\t</p>
\t\t\t\t</div>

\t\t\t\t<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
\t\t\t</div>

\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"content-comments\">
\t\t\t\t\t";
        // line 145
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reacties laden"), "html", null, true);
        echo "
\t\t\t\t</div>
\t\t\t\t";
        // line 155
        echo "\t\t\t</div>

\t\t\t<div class=\"modal-footer\">
\t\t\t\t<button class=\"close btn\" data-bs-dismiss=\"modal\" aria-label=\"Close\"><i class=\"fa fa-arrow-left\"></i>";
        // line 158
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Terug"), "html", null, true);
        echo "</button>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<div id=\"project-transactions-modal\" class=\"modal modal\" tabindex=\"-1\">
\t<div class=\"modal-dialog modal-dialog-centered modal-dialog-scrollable\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<div class=\"modal-title text-center\">
\t\t\t\t\t<h3>
\t\t\t\t\t\t<i class=\"fa fa-exchange-alt\"></i> ";
        // line 169
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Transacties"), "html", null, true);
        echo "
\t\t\t\t\t</h3>

\t\t\t\t\t<p>
\t\t\t\t\t\tHieronder een overzicht van alle transacties van dit project.
\t\t\t\t\t</p>
\t\t\t\t</div>
\t\t\t\t<div class=\"text-center mt-4\">
\t\t\t\t\t<a href=\"#\" id=\"add-transaction\" data-id=\"\" class=\"btn btn-big btn-green\">";
        // line 177
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Transactie toevoegen"), "html", null, true);
        echo " <i class=\"fa fa-arrow-right\"></i></a>
\t\t\t\t</div>
\t\t\t\t<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
\t\t\t</div>

\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"content-project-transactions\">
\t\t\t\t\t<div class=\"loader\">
\t\t\t\t\t\t<i class=\"fa fa-spin fa-circle-notch\"></i><br/>
\t\t\t\t\t\t";
        // line 186
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Transacties laden"), "html", null, true);
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t";
        // line 194
        echo "\t\t</div>
\t</div>
</div>
<div id=\"project-buyincredits-modal\" class=\"modal modal\" tabindex=\"-1\">
\t<div class=\"modal-dialog modal-dialog-centered modal-dialog-scrollable\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<div class=\"modal-title text-center\">
\t\t\t\t\t<h3>
\t\t\t\t\t\t<i class=\"fa fa-exchange-alt\"></i> ";
        // line 203
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Contact aanvragen"), "html", null, true);
        echo "
\t\t\t\t\t</h3>

\t\t\t\t\t<p>
\t\t\t\t\t\tHieronder een overzicht van alle contact aanvragen van dit project.
\t\t\t\t\t</p>
\t\t\t\t</div>
\t\t\t\t<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
\t\t\t</div>

\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"content-project-buyincredits\">
\t\t\t\t\t<div class=\"loader\">
\t\t\t\t\t\t<i class=\"fa fa-spin fa-circle-notch\"></i><br/>
\t\t\t\t\t\t";
        // line 217
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Contact aanvragen laden"), "html", null, true);
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t";
        // line 225
        echo "\t\t</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/front/projects/projects.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  458 => 225,  450 => 217,  433 => 203,  422 => 194,  414 => 186,  402 => 177,  391 => 169,  377 => 158,  372 => 155,  367 => 145,  350 => 131,  334 => 118,  330 => 117,  323 => 112,  313 => 105,  306 => 101,  302 => 99,  299 => 98,  283 => 95,  279 => 93,  277 => 91,  276 => 90,  275 => 89,  272 => 88,  270 => 87,  261 => 81,  253 => 76,  249 => 75,  240 => 69,  236 => 68,  230 => 64,  226 => 62,  217 => 59,  214 => 58,  210 => 57,  207 => 56,  205 => 55,  199 => 52,  187 => 51,  182 => 48,  175 => 46,  173 => 45,  168 => 42,  163 => 40,  157 => 39,  152 => 38,  150 => 37,  132 => 36,  128 => 34,  118 => 32,  115 => 31,  105 => 29,  102 => 28,  94 => 26,  92 => 25,  83 => 20,  65 => 19,  63 => 18,  51 => 9,  44 => 5,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/front/projects/projects.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/NeutralBundle/Resources/views/front/projects/projects.html.twig");
    }
}
