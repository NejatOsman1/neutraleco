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

/* @Cms/cron_task/index.html.twig */
class __TwigTemplate_4331188cbc66cd7b5345371679275041 extends Template
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
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@Cms/cron_task/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Settings", [], "cms"), "html", null, true);
    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "\t<div class=\"card\">
\t\t<div class=\"card-content\">
\t\t\t<div class=\"card-title\">
\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t<h6>";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cronjobs", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        // line 14
        if (($context["cronTasks"] ?? null)) {
            // line 15
            echo "\t\t\t<div class=\"table-responsive\">
\t\t\t\t<table class=\"table table-hover\">
\t\t\t\t\t<thead>
\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t<th>";
            // line 19
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Omschrijving", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t<th style=\"width:35px;padding:7px 0px;\" class=\"text-center\">";
            // line 20
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("M", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t<th style=\"width:35px;padding:7px 0px;\" class=\"text-center\">";
            // line 21
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("U", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t<th style=\"width:35px;padding:7px 0px;\" class=\"text-center\">";
            // line 22
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("D", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t<th style=\"width:35px;padding:7px 0px;\" class=\"text-center\">";
            // line 23
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("M", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t<th style=\"width:35px;padding:7px 0px;\" class=\"text-center\">";
            // line 24
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("W", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t<th style=\"width:350px;\">";
            // line 25
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wordt uitgevoerd", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t<th style=\"width:100px;\" class=\"text-center\">";
            // line 26
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijder", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t<th style=\"width:100px;\" class=\"text-center\">";
            // line 27
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Eenmalig", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t<th style=\"width:80px;\" class=\"text-center\">";
            // line 28
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Status", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t<th style=\"width:80px;\" class=\"text-center\">";
            // line 29
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Draaiend", [], "cms"), "html", null, true);
            echo "</th>
\t\t\t\t\t\t\t<th class=\"right-align\" style=\"width:120px;\"></th>
\t\t\t\t\t\t</tr>
\t\t\t\t\t</thead>
\t\t\t\t\t<tbody>
\t\t\t\t\t\t";
            // line 34
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["cronTasks"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["CronTask"]) {
                // line 35
                echo "\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td class=\"";
                // line 36
                echo ((twig_get_attribute($this->env, $this->source, $context["CronTask"], "statusTask", [], "any", false, false, false, 36)) ? ("") : ("grey-text text-lighten-1"));
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["CronTask"], "name", [], "any", false, false, false, 36));
                echo "</td>
\t\t\t\t\t\t\t\t<td class=\"";
                // line 37
                echo ((twig_get_attribute($this->env, $this->source, $context["CronTask"], "statusTask", [], "any", false, false, false, 37)) ? ("") : ("grey-text text-lighten-1"));
                echo " text-center\" style=\"font-size:12px;padding:7px 0px;\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["CronTask"], "minutes", [], "any", false, false, false, 37));
                echo "</td>
\t\t\t\t\t\t\t\t<td class=\"";
                // line 38
                echo ((twig_get_attribute($this->env, $this->source, $context["CronTask"], "statusTask", [], "any", false, false, false, 38)) ? ("") : ("grey-text text-lighten-1"));
                echo " text-center\" style=\"font-size:12px;padding:7px 0px;\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["CronTask"], "hours", [], "any", false, false, false, 38));
                echo "</td>
\t\t\t\t\t\t\t\t<td class=\"";
                // line 39
                echo ((twig_get_attribute($this->env, $this->source, $context["CronTask"], "statusTask", [], "any", false, false, false, 39)) ? ("") : ("grey-text text-lighten-1"));
                echo " text-center\" style=\"font-size:12px;padding:7px 0px;\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["CronTask"], "days", [], "any", false, false, false, 39));
                echo "</td>
\t\t\t\t\t\t\t\t<td class=\"";
                // line 40
                echo ((twig_get_attribute($this->env, $this->source, $context["CronTask"], "statusTask", [], "any", false, false, false, 40)) ? ("") : ("grey-text text-lighten-1"));
                echo " text-center\" style=\"font-size:12px;padding:7px 0px;\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["CronTask"], "months", [], "any", false, false, false, 40));
                echo "</td>
\t\t\t\t\t\t\t\t<td class=\"";
                // line 41
                echo ((twig_get_attribute($this->env, $this->source, $context["CronTask"], "statusTask", [], "any", false, false, false, 41)) ? ("") : ("grey-text text-lighten-1"));
                echo " text-center\" style=\"font-size:12px;padding:7px 0px;\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["CronTask"], "weeks", [], "any", false, false, false, 41));
                echo "</td>
\t\t\t\t\t\t\t\t<td class=\"";
                // line 42
                echo ((twig_get_attribute($this->env, $this->source, $context["CronTask"], "statusTask", [], "any", false, false, false, 42)) ? ("") : ("grey-text text-lighten-1"));
                echo "\">
\t\t\t\t\t\t\t\t\t";
                // line 43
                if (twig_get_attribute($this->env, $this->source, $context["CronTask"], "statusTask", [], "any", false, false, false, 43)) {
                    // line 44
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["CronTask"], "naturalString", [], "any", false, false, false, 44), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t<div class=\"small\" style=\"font-size:11px;font-weight:bold;margin-top:4px;\">
\t\t\t\t\t\t\t\t\t\t\t";
                    // line 46
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["CronTask"], "getNextRun", [], "any", false, false, false, 46), "d-m-Y H:i:s"), "html", null, true);
                    echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 49
                    echo "\t\t\t\t\t\t\t\t\t";
                }
                // line 50
                echo "\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t<td class=\"";
                // line 51
                echo ((twig_get_attribute($this->env, $this->source, $context["CronTask"], "statusTask", [], "any", false, false, false, 51)) ? ("") : ("grey-text text-lighten-1"));
                echo " text-center\">
\t\t\t\t\t\t\t\t\t";
                // line 52
                if (twig_get_attribute($this->env, $this->source, $context["CronTask"], "deleteAfterRun", [], "any", false, false, false, 52)) {
                    // line 53
                    echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cron_delete_after_run", ["id" => twig_get_attribute($this->env, $this->source, $context["CronTask"], "id", [], "any", false, false, false, 53)]), "html", null, true);
                    echo "\"><i class=\"fa fa-check\"></i></a>
\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 55
                    echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cron_delete_after_run", ["id" => twig_get_attribute($this->env, $this->source, $context["CronTask"], "id", [], "any", false, false, false, 55)]), "html", null, true);
                    echo "\"><i class=\"fa fa-times\"></i></a>
\t\t\t\t\t\t\t\t\t";
                }
                // line 57
                echo "\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t<td class=\"";
                // line 58
                echo ((twig_get_attribute($this->env, $this->source, $context["CronTask"], "statusTask", [], "any", false, false, false, 58)) ? ("") : ("grey-text text-lighten-1"));
                echo " text-center\">
\t\t\t\t\t\t\t\t\t";
                // line 59
                if (twig_get_attribute($this->env, $this->source, $context["CronTask"], "singleRun", [], "any", false, false, false, 59)) {
                    // line 60
                    echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cron_singlerun", ["id" => twig_get_attribute($this->env, $this->source, $context["CronTask"], "id", [], "any", false, false, false, 60)]), "html", null, true);
                    echo "\"><i class=\"fa fa-check\"></i></a>
\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 62
                    echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cron_singlerun", ["id" => twig_get_attribute($this->env, $this->source, $context["CronTask"], "id", [], "any", false, false, false, 62)]), "html", null, true);
                    echo "\"><i class=\"fa fa-times\"></i></a>
\t\t\t\t\t\t\t\t\t";
                }
                // line 64
                echo "\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t<td class=\"";
                // line 65
                echo ((twig_get_attribute($this->env, $this->source, $context["CronTask"], "statusTask", [], "any", false, false, false, 65)) ? ("") : ("grey-text text-lighten-1"));
                echo " text-center\">
\t\t\t\t\t\t\t\t\t";
                // line 66
                if (twig_get_attribute($this->env, $this->source, $context["CronTask"], "statusTask", [], "any", false, false, false, 66)) {
                    // line 67
                    echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cron_status", ["id" => twig_get_attribute($this->env, $this->source, $context["CronTask"], "id", [], "any", false, false, false, 67)]), "html", null, true);
                    echo "\"><i class=\"fa fa-check\"></i></a>
\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 69
                    echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cron_status", ["id" => twig_get_attribute($this->env, $this->source, $context["CronTask"], "id", [], "any", false, false, false, 69)]), "html", null, true);
                    echo "\"><i class=\"fa fa-times\"></i></a>
\t\t\t\t\t\t\t\t\t";
                }
                // line 71
                echo "\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t<td class=\"";
                // line 72
                echo ((twig_get_attribute($this->env, $this->source, $context["CronTask"], "running", [], "any", false, false, false, 72)) ? ("") : ("grey-text text-lighten-1"));
                echo " text-center\">
\t\t\t\t\t\t\t\t\t";
                // line 73
                if (twig_get_attribute($this->env, $this->source, $context["CronTask"], "running", [], "any", false, false, false, 73)) {
                    // line 74
                    echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cron_status", ["id" => twig_get_attribute($this->env, $this->source, $context["CronTask"], "id", [], "any", false, false, false, 74)]), "html", null, true);
                    echo "\"><i class=\"fa fa-check\"></i></a>
\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 76
                    echo "\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cron_status", ["id" => twig_get_attribute($this->env, $this->source, $context["CronTask"], "id", [], "any", false, false, false, 76)]), "html", null, true);
                    echo "\"><i class=\"fa fa-times\"></i></a>
\t\t\t\t\t\t\t\t\t";
                }
                // line 78
                echo "\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t<td class=\"";
                // line 79
                echo ((twig_get_attribute($this->env, $this->source, $context["CronTask"], "statusTask", [], "any", false, false, false, 79)) ? ("") : ("grey-text text-lighten-1"));
                echo " right-align actions\">
\t\t\t\t\t\t\t\t\t<a href=\"";
                // line 80
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cron_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["CronTask"], "id", [], "any", false, false, false, 80)]), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wijzigen", [], "cms"), "html", null, true);
                echo "\"><i class=\"fa fa-edit\"></i></a>
\t\t\t\t\t\t\t\t\t<a href=\"#\" onclick=\"cpop.confirm( '";
                // line 81
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u de volgende cronjob verwijderen?", [], "cms"), "html", null, true);
                echo " <b>";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["CronTask"], "name", [], "any", false, false, false, 81));
                echo "</b>', function(){
\t\t\t\t\t\t\t\t\t\twindow.location = '";
                // line 82
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cron_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["CronTask"], "id", [], "any", false, false, false, 82)]), "html", null, true);
                echo "';
\t\t\t\t\t\t\t\t\t} ); return false;\" title=\"";
                // line 83
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms"), "html", null, true);
                echo "\"><i class=\"far fa-trash-alt\"></i></a>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['CronTask'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 87
            echo "\t\t\t\t\t</tbody>
\t\t\t\t</table>
\t\t\t</div>
\t\t\t";
        } else {
            // line 91
            echo "\t\t\t\t<div class=\"no-data\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Er zijn nog geen gegevens beschikbaar", [], "cms"), "html", null, true);
            echo "</div>
\t\t\t";
        }
        // line 93
        echo "\t    </div>
    </div>
\t";
        // line 123
        echo "
\t<div class=\"btn-bar\">
\t\t<div class=\"right\">
\t\t\t<a href=\"";
        // line 126
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_cron_edit");
        echo "\" class=\"btn waves-effect waves-dark\"><i class=\"fa fa-plus left\"></i>";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Toevoegen", [], "cms"), "html", null, true);
        echo "</a>
\t\t</div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "@Cms/cron_task/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  328 => 126,  323 => 123,  319 => 93,  313 => 91,  307 => 87,  297 => 83,  293 => 82,  287 => 81,  281 => 80,  277 => 79,  274 => 78,  268 => 76,  262 => 74,  260 => 73,  256 => 72,  253 => 71,  247 => 69,  241 => 67,  239 => 66,  235 => 65,  232 => 64,  226 => 62,  220 => 60,  218 => 59,  214 => 58,  211 => 57,  205 => 55,  199 => 53,  197 => 52,  193 => 51,  190 => 50,  187 => 49,  181 => 46,  175 => 44,  173 => 43,  169 => 42,  163 => 41,  157 => 40,  151 => 39,  145 => 38,  139 => 37,  133 => 36,  130 => 35,  126 => 34,  118 => 29,  114 => 28,  110 => 27,  106 => 26,  102 => 25,  98 => 24,  94 => 23,  90 => 22,  86 => 21,  82 => 20,  78 => 19,  72 => 15,  70 => 14,  64 => 11,  58 => 7,  54 => 6,  47 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/cron_task/index.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/cron_task/index.html.twig");
    }
}
