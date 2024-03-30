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

/* @Cms/page/index.html.twig */
class __TwigTemplate_589b30789521616ea61cc5bbc55b4076 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Cms/page/index.html.twig"));

        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@Cms/page/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "pagetitle"));

        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina's", [], "cms"), "html", null, true);
        echo " <small class=\"pull-right\"><a class=\"btn btn-primary\" href=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_edit");
        echo "/0\"><span class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></span> ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina toevoegen", [], "cms"), "html", null, true);
        echo "</a></small>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 7
        echo "\t<div class=\"page-save-overlay screen-overlay\" id=\"page-save-overlay\">
\t\t<div class=\"vtable\">
\t\t\t<div class=\"valign\">
\t\t\t\t<div class=\"loading\"></div>
\t\t\t\t<span>";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bezig met verwijderen..", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t</div>
\t\t</div>
\t</div>

\t<div class=\"page-save-overlay screen-overlay\" id=\"page-import-overlay\">
\t\t<div class=\"vtable\">
\t\t\t<div class=\"valign\">
\t\t\t\t<div class=\"loading\"></div>
\t\t\t\t<span>";
        // line 20
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bezig met importeren..", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t</div>
\t\t</div>
\t</div>

\t";
        // line 25
        if ( !twig_test_empty((isset($context["pages"]) || array_key_exists("pages", $context) ? $context["pages"] : (function () { throw new RuntimeError('Variable "pages" does not exist.', 25, $this->source); })()))) {
            // line 26
            echo "\t\t<div class=\"btn-bar\">
\t\t\t<div class=\"left\">
\t\t\t</div>

\t\t\t<div class=\"right\">
\t\t\t\t<ul class=\"single-buttons d-none d-lg-block\">
\t\t\t\t  <li class=\"dropdown\">
\t\t\t\t\t\t<a class=\"dropdown-toggle\" id=\"buttons-dropdown\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
\t\t\t\t      <i class=\"fa fa-ellipsis-v\"></i>
\t\t\t\t    </a>
\t\t\t\t    <ul class=\"dropdown-menu\" aria-labelledby=\"buttons-dropdown\">
\t\t\t\t      <li>
\t\t\t\t\t\t\t\t<span class=\"dropdown-item\" onclick=\"enableBulkEdit(this);\">
\t\t\t\t\t        <i class=\"fa fa-fw fa-list-ul\"></i>
\t\t\t\t\t        Bulk bewerken
\t\t\t\t\t\t\t\t</span>
\t\t\t\t      </li>

\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<form method=\"post\">
\t\t\t\t\t\t\t\t\t<a class=\"dropdown-item modal-trigger\" data-bs-toggle=\"modal\" data-bs-target=\"#bulk-add\">
\t\t\t\t\t\t\t\t\t\t<i class=\"far fa-fw fa-copy\"></i> Bulk toevoegen
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<form method=\"post\" action=\"";
            // line 53
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_import");
            echo "\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t<div class=\"file-field input-field dropdown-item\" data-tooltip=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina importeren", [], "cms"), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-file-import\"></i>
\t\t\t\t\t\t\t\t\t\t";
            // line 56
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina importeren", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t\t<input type=\"file\" name=\"file\" id=\"page_file\">
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t</li>
\t\t\t\t    </ul>
\t\t\t\t  </li>
\t\t\t\t</ul>

\t\t\t\t<ul class=\"single-buttons d-lg-none\">
\t\t\t\t\t<li>
\t\t\t\t\t\t<span class=\"\" onclick=\"enableBulkEdit(this);\">
\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-list-ul\"></i>
\t\t\t\t\t\t\tBulk bewerken
\t\t\t\t\t\t</span>
\t\t\t\t\t</li>

\t\t\t\t\t<li>
\t\t\t\t\t\t<form method=\"post\">
\t\t\t\t\t\t\t<a class=\"modal-trigger\" data-bs-toggle=\"modal\" data-bs-target=\"#bulk-add\">
\t\t\t\t\t\t\t\t<i class=\"far fa-fw fa-copy\"></i> Bulk toevoegen
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</form>
\t\t\t\t\t</li>

\t\t\t\t\t<li>
\t\t\t\t\t\t<form method=\"post\" action=\"";
            // line 82
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_import");
            echo "\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t<div class=\"file-field input-field\" data-tooltip=\"";
            // line 83
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina importeren", [], "cms"), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-file-import\"></i>
\t\t\t\t\t\t\t\t";
            // line 85
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina importeren", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t<input type=\"file\" name=\"file\" id=\"page_file\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</form>
\t\t\t\t\t</li>
\t\t\t\t</ul>

\t\t\t\t<form method=\"post\">
\t\t\t\t\t<input type=\"hidden\" id=\"pagesort\" name=\"pagesort\" value=\"\" />
\t\t\t\t\t<a href=\"";
            // line 94
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_edit");
            echo "/0\" class=\"btn\"><i class=\"fa fa-plus\"></i> ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuwe pagina", [], "cms"), "html", null, true);
            echo "</a>
\t\t\t\t\t<button style=\"display:none;\" id=\"saveSort\" type=\"submit\" class=\"btn green\"><i class=\"fa fa-check\"></i> ";
            // line 95
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Volgorde opslaan", [], "cms"), "html", null, true);
            echo "</button>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t";
        }
        // line 100
        echo "
\t<div class=\"bulk-options\">
\t\t<div class=\"bulk-actions\">
\t\t\t<form method=\"post\" id=\"bulk-form\">
\t\t\t\t<input type=\"hidden\" name=\"bulk-ids\" id=\"bulk-ids\" />
\t\t\t\t<input type=\"hidden\" name=\"bulk-action\" id=\"bulk-action\" />
\t\t\t\t<button type=\"button\" onclick=\"\$('#bulk-action').val('visible-on');\$('#bulk-form').submit();\" class=\"btn green\"><i class=\"fa fa-fw fa-eye\"></i> Zichtbaar</button>
\t\t\t\t<button type=\"button\" onclick=\"\$('#bulk-action').val('visible-off');\$('#bulk-form').submit();\" class=\"btn red\"><i class=\"far fa-fw fa-eye-slash\"></i> Onzichtbaar</button>
\t\t\t\t<button type=\"button\" onclick=\"\$('#bulk-action').val('enabled-on');\$('#bulk-form').submit();\" class=\"btn green\"><i class=\"fa fa-fw fa-check-circle\"></i> Inschakelen</button>
\t\t\t\t<button type=\"button\" onclick=\"\$('#bulk-action').val('enabled-off');\$('#bulk-form').submit();\" class=\"btn red\"><i class=\"far fa-fw fa-circle\"></i> Uitschakelen</button>
\t\t\t\t";
        // line 110
        if ((isset($context["allowCache"]) || array_key_exists("allowCache", $context) ? $context["allowCache"] : (function () { throw new RuntimeError('Variable "allowCache" does not exist.', 110, $this->source); })())) {
            // line 111
            echo "\t\t\t\t\t";
            if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
                // line 112
                echo "\t\t\t\t\t\t<button type=\"button\" onclick=\"\$('#bulk-action').val('pagecache-on');\$('#bulk-form').submit();\" class=\"btn green\"><i class=\"fa fa-check-square\"></i> Pagina cache</button>
\t\t\t\t\t\t<button type=\"button\" onclick=\"\$('#bulk-action').val('pagecache-off');\$('#bulk-form').submit();\" class=\"btn red\"><i class=\"fa fa-square\"></i> Pagina cache</button>
\t\t\t\t\t\t<button type=\"button\" onclick=\"\$('#bulk-action').val('pagecritical-on');\$('#bulk-form').submit();\" class=\"btn green\"><i class=\"fa fa-check-square\"></i> Critical css</button>
\t\t\t\t\t\t<button type=\"button\" onclick=\"\$('#bulk-action').val('pagecritical-off');\$('#bulk-form').submit();\" class=\"btn red\"><i class=\"fa fa-square\"></i> Critical css</button>
\t\t\t\t\t";
            }
            // line 117
            echo "\t\t\t\t";
        }
        // line 118
        echo "\t\t\t</form>
\t\t</div>
\t</div>

\t<div class=\"page-content\" id=\"import-dropzone\">
\t\t<div class=\"message\"></div>
\t\t";
        // line 124
        if ( !twig_test_empty((isset($context["pages"]) || array_key_exists("pages", $context) ? $context["pages"] : (function () { throw new RuntimeError('Variable "pages" does not exist.', 124, $this->source); })()))) {
            // line 125
            echo "\t\t\t<div class=\"alertbox\"></div>
\t\t\t<ol class=\"sortable\">
\t\t\t\t";
            // line 127
            $this->loadTemplate("@Cms/includes/menu-links.html.twig", "@Cms/page/index.html.twig", 127)->display(twig_to_array(["pages" => (isset($context["pages"]) || array_key_exists("pages", $context) ? $context["pages"] : (function () { throw new RuntimeError('Variable "pages" does not exist.', 127, $this->source); })()), "host" => (isset($context["host"]) || array_key_exists("host", $context) ? $context["host"] : (function () { throw new RuntimeError('Variable "host" does not exist.', 127, $this->source); })()), "ActivePage" => (isset($context["ActivePage"]) || array_key_exists("ActivePage", $context) ? $context["ActivePage"] : (function () { throw new RuntimeError('Variable "ActivePage" does not exist.', 127, $this->source); })()), "depth" => 1, "allowCache" => (isset($context["allowCache"]) || array_key_exists("allowCache", $context) ? $context["allowCache"] : (function () { throw new RuntimeError('Variable "allowCache" does not exist.', 127, $this->source); })()), "pageIndex" => true]));
            // line 128
            echo "\t\t\t</ol>
\t\t";
        } else {
            // line 130
            echo "\t\t\t";
            if ((twig_test_empty((isset($context["languages"]) || array_key_exists("languages", $context) ? $context["languages"] : (function () { throw new RuntimeError('Variable "languages" does not exist.', 130, $this->source); })())) || (twig_length_filter($this->env, (isset($context["languages"]) || array_key_exists("languages", $context) ? $context["languages"] : (function () { throw new RuntimeError('Variable "languages" does not exist.', 130, $this->source); })())) <= 1))) {
                // line 131
                echo "\t\t\t\t<div class=\"text-center\">
\t\t\t\t\t<h5>";
                // line 132
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Er zijn nog geen pagina's actief", [], "cms"), "html", null, true);
                echo "</h5>
          <a class=\"btn modal-trigger\" data-bs-toggle=\"modal\" data-bs-target=\"#bulk-add\">Bulk toevoegen</a>
\t\t\t\t\t<button type=\"button\" onclick=\"window.location= '";
                // line 134
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_edit");
                echo "'\" class=\"btn\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuwe pagina aanmaken", [], "cms"), "html", null, true);
                echo "</button>
\t\t\t\t</div>
\t\t\t";
            } else {
                // line 137
                echo "\t\t\t\t<div class=\"text-center\">
\t\t\t\t\t<h5>";
                // line 138
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Er zijn nog geen pagina's actief", [], "cms"), "html", null, true);
                echo "</h5>
\t\t\t\t\t<p>";
                // line 139
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Indien er andere websites of talen aanwezig zijn kunnen deze gekopieerd worden.", [], "cms"), "html", null, true);
                echo "</p>

\t\t\t\t\t";
                // line 148
                echo "
\t\t\t\t\t";
                // line 150
                echo "
\t\t\t\t\t<div class=\"d-flex justify-content-center\">
\t\t\t\t\t\t";
                // line 153
                echo "\t\t\t\t\t\t<select style=\"width: 300px;\" name=\"language\" id=\"langcopy\" class=\"form-select\">
\t\t\t\t\t\t\t";
                // line 154
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["multisite"]) || array_key_exists("multisite", $context) ? $context["multisite"] : (function () { throw new RuntimeError('Variable "multisite" does not exist.', 154, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                    // line 155
                    echo "\t\t\t\t\t\t\t\t";
                    if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["m"], "pages", [], "any", false, false, false, 155))) {
                        // line 156
                        echo "\t\t\t\t\t\t\t\t";
                        $context["lbl"] = (((twig_length_filter($this->env, (isset($context["multisite"]) || array_key_exists("multisite", $context) ? $context["multisite"] : (function () { throw new RuntimeError('Variable "multisite" does not exist.', 156, $this->source); })())) > 1)) ? ((((twig_get_attribute($this->env, $this->source, $context["m"], "label", [], "any", false, false, false, 156) . " (") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["m"], "Language", [], "any", false, false, false, 156), "label", [], "any", false, false, false, 156)) . ")")) : (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["m"], "Language", [], "any", false, false, false, 156), "label", [], "any", false, false, false, 156)));
                        // line 157
                        echo "\t\t\t\t\t\t\t\t<option value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["m"], "id", [], "any", false, false, false, 157), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, (isset($context["lbl"]) || array_key_exists("lbl", $context) ? $context["lbl"] : (function () { throw new RuntimeError('Variable "lbl" does not exist.', 157, $this->source); })()), "html", null, true);
                        echo "</option>
\t\t\t\t\t\t\t\t";
                    }
                    // line 159
                    echo "\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 160
                echo "\t\t\t\t\t\t</select>
\t\t\t\t\t\t";
                // line 162
                echo "\t\t\t\t\t\t<button class=\"btn btn-gray\" style=\"flex: none; margin-left: 10px;\" type=\"button\" onclick=\"window.location = '";
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_copy");
                echo "/' + \$('#langcopy').val();\">";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina's kopiëren", [], "cms"), "html", null, true);
                echo "</button>
\t\t\t\t\t</div>

\t\t\t\t\t<hr>

\t\t\t\t\t<a class=\"btn btn-gray modal-trigger\" data-bs-toggle=\"modal\" data-bs-target=\"#bulk-add\">
\t\t\t\t\t\t<i class=\"fa fa-plus\"></i>
\t\t\t\t\t\tBulk toevoegen
\t\t\t\t\t</a>
          <button type=\"button\" onclick=\"window.location= '";
                // line 171
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_edit");
                echo "'\" class=\"btn btn-gray\">
\t\t\t\t\t\t<i class=\"far fa-file-alt\"></i>
\t\t\t\t\t\t";
                // line 173
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuwe pagina's aanmaken", [], "cms"), "html", null, true);
                echo "
\t\t\t\t\t</button>

\t\t\t\t\t<form class=\"d-inline-block\" style=\"vertical-align: middle; font-size: 0;\" method=\"post\" action=\"";
                // line 176
                echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_import");
                echo "\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t<div class=\"file-field input-field\">
\t\t\t\t\t\t\t<div class=\"btn btn-gray\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-file-upload\"></i>
\t\t\t\t\t\t\t\t";
                // line 180
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Importeren", [], "cms"), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t<input type=\"file\" name=\"file\" id=\"page_file\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</form>
\t\t\t\t</div>
\t\t\t";
            }
            // line 187
            echo "
\t\t\t<div class=\"btn-bar\">
\t\t\t\t<div class=\"left\">
\t\t\t\t</div>
\t\t\t\t<div class=\"right\">
\t\t\t\t</div>
\t\t\t</div>
\t\t";
        }
        // line 195
        echo "\t</div>

\t<!-- Modal -->
\t<div class=\"modal fade\" id=\"bulk-add\" tabindex=\"-1\" aria-hidden=\"true\">
\t  <div class=\"modal-dialog modal-dialog-centered modal-dialog-scrollable\">
\t    <div class=\"modal-content\">
\t\t\t\t<form method=\"post\">
\t\t      <div class=\"modal-header\">
\t\t        <h5 class=\"modal-title\" id=\"exampleModalLabel\">Pagina's bulk toevoegen</h5>
\t\t        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
\t\t      </div>
\t\t      <div class=\"modal-body\">
\t\t\t\t\t\t<p>Voeg in het onderstaande veld pagina titels toe om deze bulk toe te voegen (gebruik een tab om een sub-niveau te definieren):</p>
\t\t\t\t\t\t<textarea name=\"bulk\" id=\"bulk-area\" class=\"w-100\"></textarea>
\t\t\t\t\t\t<label for=\"bulk-area\"></label>
\t\t      </div>
\t\t      <div class=\"modal-footer d-flex justify-content-between\">
\t\t\t\t\t\t<a href=\"#!\" class=\"btn btn-flat\" data-bs-dismiss=\"modal\">Sluiten</a>
\t\t\t\t\t\t<button type=\"submit\" class=\"btn\">Doorvoeren</button>
\t\t      </div>
\t\t\t\t</form>
\t    </div>
\t  </div>
\t</div>

\t<script>
\t\$('#page_file').on(\"change\", function(){
\t\t\$(this).closest('form').submit();
\t});
\t</script>

\t<script type=\"text/javascript\" src=\"";
        // line 226
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/js/jquery.filedrop.js"), "html", null, true);
        echo "\"></script>
\t<script>
\tfunction deleteNotify(){
\t\t\$('#page-save-overlay').show();
\t}

\tvar totalUploadSize = 0;
\tvar fileDrop;
\tvar dropped = 0;
\tvar success = false;
\tvar allowedTypes = ['application/zip', 'application/x-zip-compressed'];

\t\$(document).delegate('#bulk-area', 'keydown', function(e) {
\t\tvar keyCode = e.keyCode || e.which;

\t\tif (keyCode == 9) {
\t\t\te.preventDefault();
\t\t\tvar start = this.selectionStart;
\t\t\tvar end = this.selectionEnd;

\t\t\t// set textarea value to: text before caret + tab + text after caret
\t\t\t\$(this).val(\$(this).val().substring(0, start)
\t\t\t+ \"\\t\"
\t\t\t+ \$(this).val().substring(end));

\t\t\t// put caret at right position again
\t\t\tthis.selectionStart =
\t\t\tthis.selectionEnd = start + 1;
\t\t}
\t});

\t\$().ready(function(){
\t\tvar msg_idle = '';
\t\tvar msg_hover = '";
        // line 259
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Laat los om te uploaden.", [], "cms"), "html", null, true);
        echo "';
\t\tvar msg_uploading = '";
        // line 260
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bezig met uploaden...", [], "cms"), "html", null, true);
        echo "';
\t\tvar msg_done_idle = '";
        // line 261
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uploaden voltooid!", [], "cms"), "html", null, true);
        echo "';

\t\tfileDrop = \$('#import-dropzone').filedrop({
\t\t    fallback_id: 'upload_button',
\t\t    url: '";
        // line 265
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_import");
        echo "',
\t\t    paramname: 'file',
\t\t    withCredentials: true,
\t\t    data: {},
\t\t    error: function(err, file) {
\t\t        switch(err) {
\t\t            case 'BrowserNotSupported':
\t\t                alert('";
        // line 272
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("browser does not support HTML5 drag and drop", [], "cms"), "html", null, true);
        echo "')
\t\t                break;
\t\t            case 'TooManyFiles':
\t\t                break;
\t\t            case 'FileTooLarge':
\t\t            \tcpop.loadHtml('";
        // line 277
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestand is te groot. Maximaal toegestaan: %maxFileSize% MB", ["%maxFileSize%" => (isset($context["maxFileSize"]) || array_key_exists("maxFileSize", $context) ? $context["maxFileSize"] : (function () { throw new RuntimeError('Variable "maxFileSize" does not exist.', 277, $this->source); })())], "cms");
        echo "');
\t\t                break;
\t\t            case 'FileTypeNotAllowed':
\t\t            \tconsole.log(file);
\t\t\t            cpop.loadHtml('";
        // line 281
        echo twig_escape_filter($this->env, ($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestandstype", [], "cms") . "'"), "html", null, true);
        echo "' + file.type + '";
        echo twig_escape_filter($this->env, ("'is niet toegestaan.<br/><br/><strong>Toegestane bestanden:</strong>" . $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("", [], "cms")), "html", null, true);
        echo "<ul><li>' + allowedTypes.join('</li><li>') + '</li></ul>');
\t\t                break;
\t\t            case 'FileExtensionNotAllowed':
\t\t                break;
\t\t            default:
\t\t                break;
\t\t        }
\t\t    },
\t\t    allowedfiletypes: ['application/zip'],
\t\t    allowedfileextensions: [],
\t\t    maxfiles: 1,
\t\t    maxfilesize: ";
        // line 292
        echo twig_escape_filter($this->env, (isset($context["maxFileSize"]) || array_key_exists("maxFileSize", $context) ? $context["maxFileSize"] : (function () { throw new RuntimeError('Variable "maxFileSize" does not exist.', 292, $this->source); })()), "html", null, true);
        echo ",
\t\t    dragOver: function() {
\t\t        \$('#import-dropzone').addClass('hover').find('.message').html(msg_hover);
\t\t    },
\t\t    dragLeave: function() {
\t\t        \$('#import-dropzone').removeClass('hover').find('.message').html(msg_idle)
\t\t    },
\t\t    docOver: function() {},
\t\t    docLeave: function() {},
\t\t    drop: function() { },
\t\t    uploadStarted: function(i, file, len){
\t\t    \t\$('#upload-overlay').show();
\t\t    \t\$('#page-import-overlay').show();
\t\t    },
\t\t    uploadFinished: function(i, file, response, time) {
\t\t    \tsuccess = response.success;
\t\t    },
\t\t    progressUpdated: function(i, file, progress) {},
\t\t    globalProgressUpdated: function(progress) {},
\t\t    speedUpdated: function(i, file, speed) {},
\t\t    rename: function(name) {},
\t\t    beforeEach: function(file) {},
\t\t    beforeSend: function(file, i, done) {
\t\t        done(); // Start upload
\t\t        \$('#import-dropzone').removeClass('hover').find('.message').html(msg_uploading)
\t\t    },
\t\t    afterAll: function() {

\t\t        // \$('#page-import-overlay').hide();
\t\t        if(success){
\t\t\t        window.location = '";
        // line 322
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page", ["clear" => "cache"]);
        echo "';
\t\t\t    }else{
\t\t\t    \twindow.location = '";
        // line 324
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page");
        echo "';
\t\t\t    }
\t\t    }
\t\t}).find('.message').html(msg_idle);
\t});

\tfunction enableBulkEdit(btn){
\t\t\$(btn).toggleClass('green');
\t\t\$('body').toggleClass('bulk-edit');
\t\tvalidateCheckboxes();
\t}

\tfunction validateCheckboxes(){
\t\tif(\$('.bulk-check:checked').length > 0){
\t\t\t\$('body').addClass('bulk-edit-checked');
\t\t\tvar ids = [];
\t\t\t\$.each(\$('.bulk-check:checked'), function(i, chk){
\t\t\t\tids.push(\$(chk).val());
\t\t\t});
\t\t\t\$('#bulk-ids').val(ids.join(','));
\t\t}else{
\t\t\t\$('body').removeClass('bulk-edit-checked');
\t\t}
\t}

\t\$(function(){
\t\t\$('.bulk-check').click(function(){
\t\t\tvalidateCheckboxes();
\t\t});
\t});
\t</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "@Cms/page/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  539 => 324,  534 => 322,  501 => 292,  485 => 281,  478 => 277,  470 => 272,  460 => 265,  453 => 261,  449 => 260,  445 => 259,  409 => 226,  376 => 195,  366 => 187,  356 => 180,  349 => 176,  343 => 173,  338 => 171,  323 => 162,  320 => 160,  314 => 159,  306 => 157,  303 => 156,  300 => 155,  296 => 154,  293 => 153,  289 => 150,  286 => 148,  281 => 139,  277 => 138,  274 => 137,  266 => 134,  261 => 132,  258 => 131,  255 => 130,  251 => 128,  249 => 127,  245 => 125,  243 => 124,  235 => 118,  232 => 117,  225 => 112,  222 => 111,  220 => 110,  208 => 100,  200 => 95,  194 => 94,  182 => 85,  177 => 83,  173 => 82,  144 => 56,  139 => 54,  135 => 53,  106 => 26,  104 => 25,  96 => 20,  84 => 11,  78 => 7,  71 => 6,  53 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends '@Cms/base.html.twig' %}
{% trans_default_domain 'cms' %}

{% block pagetitle %}{{ \"Pagina's\" | trans}} <small class=\"pull-right\"><a class=\"btn btn-primary\" href=\"{{ path('admin_page_edit') }}/0\"><span class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></span> {{ 'Pagina toevoegen' | trans }}</a></small>{% endblock %}

{% block body %}
\t<div class=\"page-save-overlay screen-overlay\" id=\"page-save-overlay\">
\t\t<div class=\"vtable\">
\t\t\t<div class=\"valign\">
\t\t\t\t<div class=\"loading\"></div>
\t\t\t\t<span>{{ 'Bezig met verwijderen..' | trans }}</span>
\t\t\t</div>
\t\t</div>
\t</div>

\t<div class=\"page-save-overlay screen-overlay\" id=\"page-import-overlay\">
\t\t<div class=\"vtable\">
\t\t\t<div class=\"valign\">
\t\t\t\t<div class=\"loading\"></div>
\t\t\t\t<span>{{ 'Bezig met importeren..' | trans }}</span>
\t\t\t</div>
\t\t</div>
\t</div>

\t{% if pages is not empty %}
\t\t<div class=\"btn-bar\">
\t\t\t<div class=\"left\">
\t\t\t</div>

\t\t\t<div class=\"right\">
\t\t\t\t<ul class=\"single-buttons d-none d-lg-block\">
\t\t\t\t  <li class=\"dropdown\">
\t\t\t\t\t\t<a class=\"dropdown-toggle\" id=\"buttons-dropdown\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
\t\t\t\t      <i class=\"fa fa-ellipsis-v\"></i>
\t\t\t\t    </a>
\t\t\t\t    <ul class=\"dropdown-menu\" aria-labelledby=\"buttons-dropdown\">
\t\t\t\t      <li>
\t\t\t\t\t\t\t\t<span class=\"dropdown-item\" onclick=\"enableBulkEdit(this);\">
\t\t\t\t\t        <i class=\"fa fa-fw fa-list-ul\"></i>
\t\t\t\t\t        Bulk bewerken
\t\t\t\t\t\t\t\t</span>
\t\t\t\t      </li>

\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<form method=\"post\">
\t\t\t\t\t\t\t\t\t<a class=\"dropdown-item modal-trigger\" data-bs-toggle=\"modal\" data-bs-target=\"#bulk-add\">
\t\t\t\t\t\t\t\t\t\t<i class=\"far fa-fw fa-copy\"></i> Bulk toevoegen
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t</li>

\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<form method=\"post\" action=\"{{path('admin_page_import')}}\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t<div class=\"file-field input-field dropdown-item\" data-tooltip=\"{{ 'Pagina importeren' | trans }}\">
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-file-import\"></i>
\t\t\t\t\t\t\t\t\t\t{{ 'Pagina importeren' | trans }}
\t\t\t\t\t\t\t\t\t\t<input type=\"file\" name=\"file\" id=\"page_file\">
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t</li>
\t\t\t\t    </ul>
\t\t\t\t  </li>
\t\t\t\t</ul>

\t\t\t\t<ul class=\"single-buttons d-lg-none\">
\t\t\t\t\t<li>
\t\t\t\t\t\t<span class=\"\" onclick=\"enableBulkEdit(this);\">
\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-list-ul\"></i>
\t\t\t\t\t\t\tBulk bewerken
\t\t\t\t\t\t</span>
\t\t\t\t\t</li>

\t\t\t\t\t<li>
\t\t\t\t\t\t<form method=\"post\">
\t\t\t\t\t\t\t<a class=\"modal-trigger\" data-bs-toggle=\"modal\" data-bs-target=\"#bulk-add\">
\t\t\t\t\t\t\t\t<i class=\"far fa-fw fa-copy\"></i> Bulk toevoegen
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</form>
\t\t\t\t\t</li>

\t\t\t\t\t<li>
\t\t\t\t\t\t<form method=\"post\" action=\"{{path('admin_page_import')}}\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t\t<div class=\"file-field input-field\" data-tooltip=\"{{ 'Pagina importeren' | trans }}\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-file-import\"></i>
\t\t\t\t\t\t\t\t{{ 'Pagina importeren' | trans }}
\t\t\t\t\t\t\t\t<input type=\"file\" name=\"file\" id=\"page_file\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</form>
\t\t\t\t\t</li>
\t\t\t\t</ul>

\t\t\t\t<form method=\"post\">
\t\t\t\t\t<input type=\"hidden\" id=\"pagesort\" name=\"pagesort\" value=\"\" />
\t\t\t\t\t<a href=\"{{ path('admin_page_edit') }}/0\" class=\"btn\"><i class=\"fa fa-plus\"></i> {{'Nieuwe pagina'|trans}}</a>
\t\t\t\t\t<button style=\"display:none;\" id=\"saveSort\" type=\"submit\" class=\"btn green\"><i class=\"fa fa-check\"></i> {{'Volgorde opslaan'|trans}}</button>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t{% endif %}

\t<div class=\"bulk-options\">
\t\t<div class=\"bulk-actions\">
\t\t\t<form method=\"post\" id=\"bulk-form\">
\t\t\t\t<input type=\"hidden\" name=\"bulk-ids\" id=\"bulk-ids\" />
\t\t\t\t<input type=\"hidden\" name=\"bulk-action\" id=\"bulk-action\" />
\t\t\t\t<button type=\"button\" onclick=\"\$('#bulk-action').val('visible-on');\$('#bulk-form').submit();\" class=\"btn green\"><i class=\"fa fa-fw fa-eye\"></i> Zichtbaar</button>
\t\t\t\t<button type=\"button\" onclick=\"\$('#bulk-action').val('visible-off');\$('#bulk-form').submit();\" class=\"btn red\"><i class=\"far fa-fw fa-eye-slash\"></i> Onzichtbaar</button>
\t\t\t\t<button type=\"button\" onclick=\"\$('#bulk-action').val('enabled-on');\$('#bulk-form').submit();\" class=\"btn green\"><i class=\"fa fa-fw fa-check-circle\"></i> Inschakelen</button>
\t\t\t\t<button type=\"button\" onclick=\"\$('#bulk-action').val('enabled-off');\$('#bulk-form').submit();\" class=\"btn red\"><i class=\"far fa-fw fa-circle\"></i> Uitschakelen</button>
\t\t\t\t{% if allowCache %}
\t\t\t\t\t{% if is_granted('ROLE_SUPER_ADMIN') %}
\t\t\t\t\t\t<button type=\"button\" onclick=\"\$('#bulk-action').val('pagecache-on');\$('#bulk-form').submit();\" class=\"btn green\"><i class=\"fa fa-check-square\"></i> Pagina cache</button>
\t\t\t\t\t\t<button type=\"button\" onclick=\"\$('#bulk-action').val('pagecache-off');\$('#bulk-form').submit();\" class=\"btn red\"><i class=\"fa fa-square\"></i> Pagina cache</button>
\t\t\t\t\t\t<button type=\"button\" onclick=\"\$('#bulk-action').val('pagecritical-on');\$('#bulk-form').submit();\" class=\"btn green\"><i class=\"fa fa-check-square\"></i> Critical css</button>
\t\t\t\t\t\t<button type=\"button\" onclick=\"\$('#bulk-action').val('pagecritical-off');\$('#bulk-form').submit();\" class=\"btn red\"><i class=\"fa fa-square\"></i> Critical css</button>
\t\t\t\t\t{% endif %}
\t\t\t\t{% endif %}
\t\t\t</form>
\t\t</div>
\t</div>

\t<div class=\"page-content\" id=\"import-dropzone\">
\t\t<div class=\"message\"></div>
\t\t{% if pages is not empty %}
\t\t\t<div class=\"alertbox\"></div>
\t\t\t<ol class=\"sortable\">
\t\t\t\t{% include \"@Cms/includes/menu-links.html.twig\" with {'pages':pages, 'host':host, 'ActivePage':ActivePage, 'depth': 1, 'allowCache': allowCache, 'pageIndex': true} only %}
\t\t\t</ol>
\t\t{% else %}
\t\t\t{% if languages is empty or (languages|length) <= 1 %}
\t\t\t\t<div class=\"text-center\">
\t\t\t\t\t<h5>{{'Er zijn nog geen pagina\\'s actief'|trans}}</h5>
          <a class=\"btn modal-trigger\" data-bs-toggle=\"modal\" data-bs-target=\"#bulk-add\">Bulk toevoegen</a>
\t\t\t\t\t<button type=\"button\" onclick=\"window.location= '{{path('admin_page_edit')}}'\" class=\"btn\">{{'Nieuwe pagina aanmaken'|trans}}</button>
\t\t\t\t</div>
\t\t\t{% else %}
\t\t\t\t<div class=\"text-center\">
\t\t\t\t\t<h5>{{'Er zijn nog geen pagina\\'s actief'|trans}}</h5>
\t\t\t\t\t<p>{{'Indien er andere websites of talen aanwezig zijn kunnen deze gekopieerd worden.'|trans}}</p>

\t\t\t\t\t{# <select name=\"language\" id=\"langcopy\">
\t\t\t\t\t\t{% for Language in languages %}
\t\t\t\t\t\t\t{% if Language.pages is not empty %}
\t\t\t\t\t\t\t<option value=\"{{Language.locale}}\">{{Language.label}}</option>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t</select> #}

\t\t\t\t\t{# {{dump(multisite)}} #}

\t\t\t\t\t<div class=\"d-flex justify-content-center\">
\t\t\t\t\t\t{# {% if multisite %} #}
\t\t\t\t\t\t<select style=\"width: 300px;\" name=\"language\" id=\"langcopy\" class=\"form-select\">
\t\t\t\t\t\t\t{% for m in multisite %}
\t\t\t\t\t\t\t\t{% if m.pages is not empty %}
\t\t\t\t\t\t\t\t{% set lbl = (multisite|length) > 1 ? m.label ~ ' (' ~ m.Language.label ~ ')' : m.Language.label %}
\t\t\t\t\t\t\t\t<option value=\"{{m.id}}\">{{lbl}}</option>
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t</select>
\t\t\t\t\t\t{# {% endif %} #}
\t\t\t\t\t\t<button class=\"btn btn-gray\" style=\"flex: none; margin-left: 10px;\" type=\"button\" onclick=\"window.location = '{{path('admin_page_copy')}}/' + \$('#langcopy').val();\">{{'Pagina\\'s kopiëren'|trans}}</button>
\t\t\t\t\t</div>

\t\t\t\t\t<hr>

\t\t\t\t\t<a class=\"btn btn-gray modal-trigger\" data-bs-toggle=\"modal\" data-bs-target=\"#bulk-add\">
\t\t\t\t\t\t<i class=\"fa fa-plus\"></i>
\t\t\t\t\t\tBulk toevoegen
\t\t\t\t\t</a>
          <button type=\"button\" onclick=\"window.location= '{{path('admin_page_edit')}}'\" class=\"btn btn-gray\">
\t\t\t\t\t\t<i class=\"far fa-file-alt\"></i>
\t\t\t\t\t\t{{'Nieuwe pagina\\'s aanmaken'|trans}}
\t\t\t\t\t</button>

\t\t\t\t\t<form class=\"d-inline-block\" style=\"vertical-align: middle; font-size: 0;\" method=\"post\" action=\"{{path('admin_page_import')}}\" enctype=\"multipart/form-data\">
\t\t\t\t\t\t<div class=\"file-field input-field\">
\t\t\t\t\t\t\t<div class=\"btn btn-gray\">
\t\t\t\t\t\t\t\t<i class=\"fa fa-file-upload\"></i>
\t\t\t\t\t\t\t\t{{'Importeren'|trans}}
\t\t\t\t\t\t\t\t<input type=\"file\" name=\"file\" id=\"page_file\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</form>
\t\t\t\t</div>
\t\t\t{% endif %}

\t\t\t<div class=\"btn-bar\">
\t\t\t\t<div class=\"left\">
\t\t\t\t</div>
\t\t\t\t<div class=\"right\">
\t\t\t\t</div>
\t\t\t</div>
\t\t{% endif %}
\t</div>

\t<!-- Modal -->
\t<div class=\"modal fade\" id=\"bulk-add\" tabindex=\"-1\" aria-hidden=\"true\">
\t  <div class=\"modal-dialog modal-dialog-centered modal-dialog-scrollable\">
\t    <div class=\"modal-content\">
\t\t\t\t<form method=\"post\">
\t\t      <div class=\"modal-header\">
\t\t        <h5 class=\"modal-title\" id=\"exampleModalLabel\">Pagina's bulk toevoegen</h5>
\t\t        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
\t\t      </div>
\t\t      <div class=\"modal-body\">
\t\t\t\t\t\t<p>Voeg in het onderstaande veld pagina titels toe om deze bulk toe te voegen (gebruik een tab om een sub-niveau te definieren):</p>
\t\t\t\t\t\t<textarea name=\"bulk\" id=\"bulk-area\" class=\"w-100\"></textarea>
\t\t\t\t\t\t<label for=\"bulk-area\"></label>
\t\t      </div>
\t\t      <div class=\"modal-footer d-flex justify-content-between\">
\t\t\t\t\t\t<a href=\"#!\" class=\"btn btn-flat\" data-bs-dismiss=\"modal\">Sluiten</a>
\t\t\t\t\t\t<button type=\"submit\" class=\"btn\">Doorvoeren</button>
\t\t      </div>
\t\t\t\t</form>
\t    </div>
\t  </div>
\t</div>

\t<script>
\t\$('#page_file').on(\"change\", function(){
\t\t\$(this).closest('form').submit();
\t});
\t</script>

\t<script type=\"text/javascript\" src=\"{{asset('bundles/cms/js/jquery.filedrop.js')}}\"></script>
\t<script>
\tfunction deleteNotify(){
\t\t\$('#page-save-overlay').show();
\t}

\tvar totalUploadSize = 0;
\tvar fileDrop;
\tvar dropped = 0;
\tvar success = false;
\tvar allowedTypes = ['application/zip', 'application/x-zip-compressed'];

\t\$(document).delegate('#bulk-area', 'keydown', function(e) {
\t\tvar keyCode = e.keyCode || e.which;

\t\tif (keyCode == 9) {
\t\t\te.preventDefault();
\t\t\tvar start = this.selectionStart;
\t\t\tvar end = this.selectionEnd;

\t\t\t// set textarea value to: text before caret + tab + text after caret
\t\t\t\$(this).val(\$(this).val().substring(0, start)
\t\t\t+ \"\\t\"
\t\t\t+ \$(this).val().substring(end));

\t\t\t// put caret at right position again
\t\t\tthis.selectionStart =
\t\t\tthis.selectionEnd = start + 1;
\t\t}
\t});

\t\$().ready(function(){
\t\tvar msg_idle = '';
\t\tvar msg_hover = '{{\"Laat los om te uploaden.\"|trans}}';
\t\tvar msg_uploading = '{{\"Bezig met uploaden...\"|trans}}';
\t\tvar msg_done_idle = '{{\"Uploaden voltooid!\"|trans}}';

\t\tfileDrop = \$('#import-dropzone').filedrop({
\t\t    fallback_id: 'upload_button',
\t\t    url: '{{path('admin_page_import')}}',
\t\t    paramname: 'file',
\t\t    withCredentials: true,
\t\t    data: {},
\t\t    error: function(err, file) {
\t\t        switch(err) {
\t\t            case 'BrowserNotSupported':
\t\t                alert('{{ 'browser does not support HTML5 drag and drop' | trans }}')
\t\t                break;
\t\t            case 'TooManyFiles':
\t\t                break;
\t\t            case 'FileTooLarge':
\t\t            \tcpop.loadHtml('{{ 'Bestand is te groot. Maximaal toegestaan: %maxFileSize% MB' | trans({'%maxFileSize%': maxFileSize}) | raw }}');
\t\t                break;
\t\t            case 'FileTypeNotAllowed':
\t\t            \tconsole.log(file);
\t\t\t            cpop.loadHtml('{{ 'Bestandstype' | trans ~ '\\''}}' + file.type + '{{'\\'is niet toegestaan.<br/><br/><strong>Toegestane bestanden:</strong>' ~ ''|trans({}) | raw}}<ul><li>' + allowedTypes.join('</li><li>') + '</li></ul>');
\t\t                break;
\t\t            case 'FileExtensionNotAllowed':
\t\t                break;
\t\t            default:
\t\t                break;
\t\t        }
\t\t    },
\t\t    allowedfiletypes: ['application/zip'],
\t\t    allowedfileextensions: [],
\t\t    maxfiles: 1,
\t\t    maxfilesize: {{maxFileSize}},
\t\t    dragOver: function() {
\t\t        \$('#import-dropzone').addClass('hover').find('.message').html(msg_hover);
\t\t    },
\t\t    dragLeave: function() {
\t\t        \$('#import-dropzone').removeClass('hover').find('.message').html(msg_idle)
\t\t    },
\t\t    docOver: function() {},
\t\t    docLeave: function() {},
\t\t    drop: function() { },
\t\t    uploadStarted: function(i, file, len){
\t\t    \t\$('#upload-overlay').show();
\t\t    \t\$('#page-import-overlay').show();
\t\t    },
\t\t    uploadFinished: function(i, file, response, time) {
\t\t    \tsuccess = response.success;
\t\t    },
\t\t    progressUpdated: function(i, file, progress) {},
\t\t    globalProgressUpdated: function(progress) {},
\t\t    speedUpdated: function(i, file, speed) {},
\t\t    rename: function(name) {},
\t\t    beforeEach: function(file) {},
\t\t    beforeSend: function(file, i, done) {
\t\t        done(); // Start upload
\t\t        \$('#import-dropzone').removeClass('hover').find('.message').html(msg_uploading)
\t\t    },
\t\t    afterAll: function() {

\t\t        // \$('#page-import-overlay').hide();
\t\t        if(success){
\t\t\t        window.location = '{{path('admin_page', {'clear' : 'cache'})}}';
\t\t\t    }else{
\t\t\t    \twindow.location = '{{path('admin_page')}}';
\t\t\t    }
\t\t    }
\t\t}).find('.message').html(msg_idle);
\t});

\tfunction enableBulkEdit(btn){
\t\t\$(btn).toggleClass('green');
\t\t\$('body').toggleClass('bulk-edit');
\t\tvalidateCheckboxes();
\t}

\tfunction validateCheckboxes(){
\t\tif(\$('.bulk-check:checked').length > 0){
\t\t\t\$('body').addClass('bulk-edit-checked');
\t\t\tvar ids = [];
\t\t\t\$.each(\$('.bulk-check:checked'), function(i, chk){
\t\t\t\tids.push(\$(chk).val());
\t\t\t});
\t\t\t\$('#bulk-ids').val(ids.join(','));
\t\t}else{
\t\t\t\$('body').removeClass('bulk-edit-checked');
\t\t}
\t}

\t\$(function(){
\t\t\$('.bulk-check').click(function(){
\t\t\tvalidateCheckboxes();
\t\t});
\t});
\t</script>
{% endblock %}
", "@Cms/page/index.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/page/index.html.twig");
    }
}
