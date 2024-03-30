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

/* @TrinityNeutral/backend/projects/edit-project.html.twig */
class __TwigTemplate_749d8f25c913a36d982fc9b9ff107f80 extends Template
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
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@TrinityNeutral/backend/projects/edit-project.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Project wijzigen", [], "cms"), "html", null, true);
    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "
<link rel=\"stylesheet\" href=\"/neutraleco/css/neutral-backend.css\">

\t<ul class=\"nav nav-tabs\" role=\"tablist\">
\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t<button class=\"nav-link";
        // line 12
        if ( !($context["tabComment"] ?? null)) {
            echo " active";
        }
        echo "\" id=\"tab1\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-content1\" type=\"button\" role=\"tab\" aria-controls=\"tab-content1\" aria-selected=\"true\">
\t\t\t\t";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wijzigen", [], "cms"), "html", null, true);
        echo "
\t\t\t</button>
\t\t</li>
\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t<button class=\"nav-link";
        // line 17
        if (($context["tabComment"] ?? null)) {
            echo " active";
        }
        echo "\" id=\"tab2\" data-bs-toggle=\"tab\" data-bs-target=\"#tab-content2\" type=\"button\" role=\"tab\" aria-controls=\"tab-content2\" aria-selected=\"true\">
\t\t\t\t";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reacties", [], "cms"), "html", null, true);
        echo "
\t\t\t</button>
\t\t</li>
\t</ul>

  <div class=\"tab-content\">
\t\t<div class=\"tab-pane fade";
        // line 24
        if ( !($context["tabComment"] ?? null)) {
            echo " show active";
        }
        echo "\" aria-labelledby=\"tab-content1\" id=\"tab-content1\" role=\"tabpanel\">
\t\t\t<script defer src=\"/neutraleco/js/website.js\"></script>
\t\t\t";
        // line 26
        $this->loadTemplate("@TrinityNeutral/front/projects/add-project.html.twig", "@TrinityNeutral/backend/projects/edit-project.html.twig", 26)->display(twig_array_merge($context, ["project" =>         // line 27
($context["project"] ?? null), "config" =>         // line 28
($context["config"] ?? null), "Settings" =>         // line 29
($context["Settings"] ?? null), "form" =>         // line 30
($context["form"] ?? null), "projectEntity" =>         // line 31
($context["projectEntity"] ?? null), "maxFileSize" =>         // line 32
($context["maxFileSize"] ?? null), "maxMediaFileSize" =>         // line 33
($context["maxMediaFileSize"] ?? null), "isBackend" => true]));
        // line 36
        echo "\t\t</div>
\t\t<div class=\"tab-pane fade";
        // line 37
        if (($context["tabComment"] ?? null)) {
            echo " show active";
        }
        echo "\" aria-labelledby=\"tab-content21\" id=\"tab-content2\" role=\"tabpanel\">
\t\t\t";
        // line 38
        $this->loadTemplate("@TrinityNeutral/front/projects/comment.html.twig", "@TrinityNeutral/backend/projects/edit-project.html.twig", 38)->display(twig_array_merge($context, ["project" =>         // line 39
($context["project"] ?? null), "config" =>         // line 40
($context["config"] ?? null), "Settings" =>         // line 41
($context["Settings"] ?? null), "form" =>         // line 42
($context["form"] ?? null), "projectEntity" =>         // line 43
($context["projectEntity"] ?? null), "maxFileSize" =>         // line 44
($context["maxFileSize"] ?? null), "maxMediaFileSize" =>         // line 45
($context["maxMediaFileSize"] ?? null), "isBackend" => true, "form" =>         // line 47
($context["formComment"] ?? null), "comments" =>         // line 48
($context["comments"] ?? null), "user" =>         // line 49
($context["user"] ?? null)]));
        // line 51
        echo "\t\t</div>
\t</div>

\t<div class=\"btn-bar\">
\t\t<div class=\"right\">
\t\t\t";
        // line 56
        $context["projectName"] = twig_replace_filter(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "name", [], "any", false, false, false, 56), ["'" => "\\'"]);
        // line 57
        echo "\t\t\t";
        if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "status", [], "any", false, false, false, 57), [0 => 1, 1 => 2, 2 => 3])) {
            // line 58
            echo "\t\t\t\t<a class=\"btn btn-flat\" href=\"#\" onclick=\"cpop.confirm( 'Weet u zeker of u het volgende project wilt afkeuren? <b>";
            echo twig_escape_filter($this->env, ($context["projectName"] ?? null), "html", null, true);
            echo "</b>', function(){
\t\t\t\t\twindow.location = '";
            // line 59
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_neutral_project_decline", ["id" => twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 59)]), "html", null, true);
            echo "';
\t\t\t\t\t} ); return false;\" title=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Project afkeuren", [], "cms"), "html", null, true);
            echo "\"><i class=\"fa fa-times\"></i> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Project afkeuren", [], "cms"), "html", null, true);
            echo "</a>
\t\t\t";
        }
        // line 62
        echo "\t\t\t";
        if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "status", [], "any", false, false, false, 62), [0 => 1, 1 => 2, 2 => 3])) {
            // line 63
            echo "\t\t\t\t<a class=\"btn btn-green\" href=\"#\" onclick=\"cpop.confirm( 'Wilt u het volgende project goedkeuren? <b>";
            echo twig_escape_filter($this->env, ($context["projectName"] ?? null), "html", null, true);
            echo "</b>', function(){
\t\t\t\t\tdocument.getElementsByClassName('neutral-loader')[0].style.display = 'block';cpop.close(); window.location = '";
            // line 64
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_neutral_project_approve", ["id" => twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 64)]), "html", null, true);
            echo "';
\t\t\t\t\t} ); return false;\" title=\"";
            // line 65
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Project goedkeuren", [], "cms"), "html", null, true);
            echo "\"><i class=\"fa fa-check\"></i> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Project goedkeuren", [], "cms"), "html", null, true);
            echo "</a>
\t\t\t";
        }
        // line 67
        echo "\t\t\t";
        if (twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "getNeedsApproval", [], "method", false, false, false, 67)) {
            // line 68
            echo "\t\t\t\t<a class=\"btn btn-green\" href=\"#\" onclick=\"cpop.confirm( 'Wilt u van het volgende project de aanpassingen goedkeuren? <b>";
            echo twig_escape_filter($this->env, ($context["projectName"] ?? null), "html", null, true);
            echo "</b>', function(){
\t\t\t\t\tdocument.getElementsByClassName('neutral-loader')[0].style.display = 'block';cpop.close(); window.location = '";
            // line 69
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_neutral_project_approve", ["id" => twig_get_attribute($this->env, $this->source, ($context["projectEntity"] ?? null), "id", [], "any", false, false, false, 69)]), "html", null, true);
            echo "';
\t\t\t\t\t} ); return false;\" title=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Project aanpassingen goedkeuren", [], "cms"), "html", null, true);
            echo "\"><i class=\"fa fa-check\"></i> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Project aanpassingen goedkeuren", [], "cms"), "html", null, true);
            echo "</a>
\t\t\t";
        }
        // line 72
        echo "\t\t</div>
\t</div>
\t<style>
\t\t.neutral-loader{
\t\t\ttop: 0px;
\t\t\tleft: 0px;
\t\t\tposition: fixed;
\t\t\theight: 100%;
\t\t\twidth: 100%;
\t\t\tz-index: 26;
\t\t\tbackground-color: rgba(0,0,0,0.5);
\t\t}
\t\t.neutral-loader .fa-spin{
\t\t\tposition: absolute;
\t\t\ttop: 50%;
\t\t\tleft: 50%;
\t\t\tcolor: #fff;
\t\t\tfont-size: 30px;
\t\t\tmargin-left:-27px;
\t\t\tmargin-top:-20px;
\t\t}
\t</style>
\t<div style=\"display:none;\" class=\"neutral-loader\"><i class=\"fa fa-circle-notch fa-spin\"></i></div>
";
    }

    public function getTemplateName()
    {
        return "@TrinityNeutral/backend/projects/edit-project.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  196 => 72,  189 => 70,  185 => 69,  180 => 68,  177 => 67,  170 => 65,  166 => 64,  161 => 63,  158 => 62,  151 => 60,  147 => 59,  142 => 58,  139 => 57,  137 => 56,  130 => 51,  128 => 49,  127 => 48,  126 => 47,  125 => 45,  124 => 44,  123 => 43,  122 => 42,  121 => 41,  120 => 40,  119 => 39,  118 => 38,  112 => 37,  109 => 36,  107 => 33,  106 => 32,  105 => 31,  104 => 30,  103 => 29,  102 => 28,  101 => 27,  100 => 26,  93 => 24,  84 => 18,  78 => 17,  71 => 13,  65 => 12,  58 => 7,  54 => 6,  47 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityNeutral/backend/projects/edit-project.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/NeutralBundle/Resources/views/backend/projects/edit-project.html.twig");
    }
}
