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

/* @Cms/navigation/edit.html.twig */
class __TwigTemplate_1d9a5266c874bc2ce3528d8ed02bbed8 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
        $macros["_self"] = $this->macros["_self"] = $this;
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@Cms/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@Cms/navigation/edit.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 106
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 107
        echo "\t";
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["Form"] ?? null), 'form_start');
        echo "
\t";
        // line 108
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["Form"] ?? null), 'errors');
        echo "

  <div class=\"row\">
    <div class=\"col-12 col-md-4\">
      <div class=\"card\">
        <div class=\"card-body\">
          <div class=\"card-title\">
            <h6>";
        // line 115
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Navigatie opties", [], "cms"), "html", null, true);
        echo "</h6>
          </div>

          ";
        // line 118
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "short", [], "any", false, false, false, 118), 'row');
        echo "
          ";
        // line 119
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "label", [], "any", false, false, false, 119), 'row');
        echo "

          <span>";
        // line 121
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "sub_pages", [], "any", false, false, false, 121), 'row');
        echo "</span>
          <span style=\"";
        // line 122
        echo (((array_key_exists("installed", $context) && twig_in_filter("WebshopBundle", ($context["installed"] ?? null)))) ? ("") : ("display: none;"));
        echo "\">";
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["Form"] ?? null), "sub_webshop_cats", [], "any", false, false, false, 122), 'row');
        echo "</span>
        </div>
      </div>
    </div>
    <div class=\"col-12 col-md-8\">
    \t<div class=\"card\">
    \t\t<div class=\"card-body\">
          <div class=\"card-title\">
            <h6>";
        // line 130
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina's", [], "cms"), "html", null, true);
        echo "</h6>

            <div class=\"card-actions\">
              <button class=\"btn modal-trigger\" data-bs-toggle=\"modal\" data-bs-target=\"#modal1\" type=\"button\"><i class=\"fa fa-plus\"></i> ";
        // line 133
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Optie toevoegen", [], "cms");
        echo "</button>
            </div>
          </div>

    \t\t\t<ol class=\"nav-sortable\" id=\"menu-editor\">
    \t\t\t\t";
        // line 138
        echo twig_call_macro($macros["_self"], "macro_parse_navigation", [($context["rootItems"] ?? null), 0, ($context["doctrine"] ?? null), ($context["slugCheck"] ?? null), ($context["itemNotExists"] ?? null), ($context["cms_pages"] ?? null), ($context["cms_pages_reference"] ?? null), ($context["webshop_categories"] ?? null)], 138, $context, $this->getSourceContext());
        echo "
    \t\t\t</ol>
    \t\t</div>
    \t</div>
    </div>
  </div>

\t<input type=\"hidden\" id=\"pagesort\" name=\"pagesort\" value=\"\" />

\t<div class=\"btn-bar\">
\t\t<div class=\"right\">
\t\t\t<button type=\"submit\" class=\"btn right waves-effect waves-light\"><i class=\"fa fa-save\"></i> ";
        // line 149
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Opslaan", [], "cms"), "html", null, true);
        echo "</button>
\t\t</div>
\t</div>

  <!-- Modal Structure -->
  <div id=\"modal1\" class=\"modal fade\" tabindex=\"-1\" aria-labelledby=\"\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-wide modal-dialog-centered modal-dialog-scrollable\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\">";
        // line 158
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Koppelen", [], "cms");
        echo "</h5>
          <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
        </div>
        <div class=\"modal-body\">
          <div class=\"row\">
            <div class=\"col-12 col-md-3\">
              <h6>";
        // line 164
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Categorieën", [], "cms"), "html", null, true);
        echo "</h6>
              <ul class=\"nav-editor-menu\">
                <li data-trigger=\"cms\" class=\"active\">";
        // line 166
        echo twig_escape_filter($this->env, ($context["trinity"] ?? null), "html", null, true);
        echo "</li>
                ";
        // line 167
        if ( !twig_test_empty(($context["webshop_categories"] ?? null))) {
            // line 168
            echo "                  <li data-trigger=\"webshop\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Webshop", [], "cms"), "html", null, true);
            echo "</li>
                ";
        }
        // line 170
        echo "                ";
        if ( !twig_test_empty(($context["anchors"] ?? null))) {
            // line 171
            echo "                  <li data-trigger=\"anchor\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Link doelen", [], "cms"), "html", null, true);
            echo "</li>
                ";
        }
        // line 173
        echo "                  <li data-trigger=\"custom_links\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Custom link", [], "cms"), "html", null, true);
        echo "</li>
              </ul>
            </div>
            <div class=\"col-12 col-md-9\">
              <h6>";
        // line 177
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina's", [], "cms"), "html", null, true);
        echo "</h6>
              <div id=\"options-cms\" class=\"options-all\">
                <ul class=\"nav-editor-options\">
                  ";
        // line 180
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cms_pages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 181
            echo "                    <li data-id=\"10000";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 181), "html", null, true);
            echo "\" data-slug=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "slug", [], "any", false, false, false, 181), "html", null, true);
            echo "\" data-label=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "label", [], "any", false, false, false, 181), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "getFullUrl", [], "method", false, false, false, 181), "html", null, true);
            echo "\">
                      <div class=\"label\">";
            // line 182
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["page"], "label", [], "any", false, false, false, 182), "html", null, true);
            echo "</div>
                    </li>
                    ";
            // line 184
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["page"], "pages", [], "any", false, false, false, 184));
            foreach ($context['_seq'] as $context["_key"] => $context["sub_page"]) {
                // line 185
                echo "                      <li data-id=\"10000";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sub_page"], "id", [], "any", false, false, false, 185), "html", null, true);
                echo "\" style=\"margin-left: 30px;\" data-slug=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sub_page"], "slug", [], "any", false, false, false, 185), "html", null, true);
                echo "\" data-label=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sub_page"], "label", [], "any", false, false, false, 185), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sub_page"], "getFullUrl", [], "method", false, false, false, 185), "html", null, true);
                echo "\">
                        <div class=\"label\">";
                // line 186
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sub_page"], "label", [], "any", false, false, false, 186), "html", null, true);
                echo "</div>
                      </li>
                      ";
                // line 188
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["sub_page"], "pages", [], "any", false, false, false, 188));
                foreach ($context['_seq'] as $context["_key"] => $context["sub_sub_page"]) {
                    // line 189
                    echo "                        <li data-id=\"10000";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sub_sub_page"], "id", [], "any", false, false, false, 189), "html", null, true);
                    echo "\" style=\"margin-left: 60px;\" data-slug=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sub_sub_page"], "slug", [], "any", false, false, false, 189), "html", null, true);
                    echo "\" data-label=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sub_sub_page"], "label", [], "any", false, false, false, 189), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sub_sub_page"], "getFullUrl", [], "method", false, false, false, 189), "html", null, true);
                    echo "\">
                          <div class=\"label\">";
                    // line 190
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sub_sub_page"], "label", [], "any", false, false, false, 190), "html", null, true);
                    echo "</div>
                        </li>
                        ";
                    // line 192
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["sub_sub_page"], "pages", [], "any", false, false, false, 192));
                    foreach ($context['_seq'] as $context["_key"] => $context["sub_sub_sub_page"]) {
                        // line 193
                        echo "                          <li data-id=\"10000";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sub_sub_sub_page"], "id", [], "any", false, false, false, 193), "html", null, true);
                        echo "\" style=\"margin-left: 90px;\" data-slug=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sub_sub_sub_page"], "slug", [], "any", false, false, false, 193), "html", null, true);
                        echo "\" data-label=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sub_sub_sub_page"], "label", [], "any", false, false, false, 193), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sub_sub_sub_page"], "getFullUrl", [], "method", false, false, false, 193), "html", null, true);
                        echo "\">
                            <div class=\"label\">";
                        // line 194
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["sub_sub_sub_page"], "label", [], "any", false, false, false, 194), "html", null, true);
                        echo "</div>
                          </li>
                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_sub_sub_page'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 197
                    echo "                      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_sub_page'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 198
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sub_page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 199
            echo "                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 200
        echo "                </ul>
              </div>
              ";
        // line 202
        if ( !twig_test_empty(($context["webshop_categories"] ?? null))) {
            // line 203
            echo "                <div id=\"options-webshop\" class=\"options-all\" style=\"display:none;\">
                  <ul class=\"nav-editor-options\">
                    ";
            // line 205
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["webshop_categories"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 206
                echo "                      <li data-id=\"20000";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "id", [], "any", false, false, false, 206), "html", null, true);
                echo "\" data-slug=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "slug", [], "any", false, false, false, 206), "html", null, true);
                echo "\" data-label=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "label", [], "any", false, false, false, 206), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "label", [], "any", false, false, false, 206), "html", null, true);
                echo "</li>
                      ";
                // line 207
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["cat"], "children", [], "any", false, false, false, 207));
                foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                    // line 208
                    echo "                        <li data-id=\"20000";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "id", [], "any", false, false, false, 208), "html", null, true);
                    echo "\" style=\"margin-left: 30px;\" data-slug=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "slug", [], "any", false, false, false, 208), "html", null, true);
                    echo "\" data-label=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "label", [], "any", false, false, false, 208), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "label", [], "any", false, false, false, 208), "html", null, true);
                    echo "</li>
                        ";
                    // line 209
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["cat"], "children", [], "any", false, false, false, 209));
                    foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                        // line 210
                        echo "                          <li data-id=\"20000";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "id", [], "any", false, false, false, 210), "html", null, true);
                        echo "\" style=\"margin-left: 60px;\" data-slug=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "slug", [], "any", false, false, false, 210), "html", null, true);
                        echo "\" data-label=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "label", [], "any", false, false, false, 210), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["cat"], "label", [], "any", false, false, false, 210), "html", null, true);
                        echo "</li>
                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 212
                    echo "                      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 213
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 214
            echo "                  </ul>
                </div>
              ";
        }
        // line 217
        echo "              ";
        if ( !twig_test_empty(($context["anchors"] ?? null))) {
            // line 218
            echo "                <div id=\"options-anchor\" class=\"options-all\" style=\"display:none;\">
                  <ul class=\"nav-editor-options\">
                    ";
            // line 220
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["anchors"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["anchor"]) {
                // line 221
                echo "                      <li data-id=\"30000";
                echo twig_escape_filter($this->env, $context["anchor"], "html", null, true);
                echo "\" data-slug=\"";
                echo twig_escape_filter($this->env, $context["anchor"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["anchor"], "html", null, true);
                echo "</li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['anchor'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 223
            echo "                  </ul>
                </div>
              ";
        }
        // line 226
        echo "              <div id=\"options-custom_links\" class=\"options-all\" style=\"display:none;\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"input-group mb-3\">
\t\t\t\t\t\t<input id=\"40000_title\" data-id=\"40000_title\" class=\"form-control\" type=\"text\" value=\"\" name=\"title\" placeholder=\"";
        // line 229
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Titel", [], "cms"), "html", null, true);
        echo "\" />
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"input-group mb-3\">
\t\t\t\t\t\t<input id=\"40000_link\" data-id=\"40000_link\" class=\"form-control\" type=\"text\" value=\"\" name=\"link\" placeholder=\"";
        // line 234
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Link", [], "cms"), "html", null, true);
        echo "\" />
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"input-group mb-3\">
\t\t\t\t\t\t<input type=\"checkbox\" data-id=\"40000_anchor\" id=\"40000_anchor\" name=\"link\" />
\t\t\t\t\t\t<label style=\"padding-left:5px;\" for=\"40000_anchor\">";
        // line 240
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Openen in een nieuwe tab", [], "cms"), "html", null, true);
        echo "</label><br>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<a class=\"btn btn-primary add-custom-link\">";
        // line 243
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Toevoegen", [], "cms"), "html", null, true);
        echo "</a>
              </div>
            </div>
          </div>
        </div>
        <div class=\"modal-footer\">
          <button type=\"button\" class=\"btn\" data-bs-dismiss=\"modal\">";
        // line 249
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Venster sluiten", [], "cms"), "html", null, true);
        echo "</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
\t\tmyInput.focus()
    })
  </script>

<script>
\$(document).ready(function(){

\t  var activeType = 'cms';
\t  
\t  \$('.modal-body .add-custom-link').click(function(){
\t\t\tif(\$(\"#40000_link\").val() == \"\"){
\t\t\t\talert(\"Kan custom link niet toevoegen. Link mag niet leeg zijn.\");
\t\t\t\treturn;
\t\t\t}
\t\t\tif(\$(\"#40000_title\").val() == \"\"){
\t\t\t\talert(\"Kan custom link niet toevoegen. Titel mag niet leeg zijn.\");
\t\t\t\treturn;
\t\t\t}
\t\t\tvar type = 'custom_page';
\t\t\tactiveType = 'custom_link'
\t\t\tvar type_pleural = 'page';
\t\t\tvar linkSlug = \"40000_link\";
\t\t\tvar titleSlug = \"40000_title\";
\t\t\tvar newTabSlug = \"40000_anchor\";
\t\t\tvar title = \$(\"#40000_title\").val();
\t\t\tvar link = \$(\"#40000_link\").val();
\t\t\tvar newTab = (\$(\"#40000_anchor\").prop(\"checked\") == true ? 1 : 0);
\t\t\tvar id = link;
\t\t\t
\t\t\tvar li = \$('<li class=\"page-entry\" id=\"' + activeType + '_' +id + '\">\\
\t\t\t\t<div class=\"page-entry-content\" data-slug=\"' + link + '\" data-link=\"'+link+'\" data-newtab=\"'+newTab+'\" data-type=\"' + type + '\" data-simpleslug=\"' + linkSlug + '\" data-label=\"' + title + '\" data-id=\"' + id + '\">\\
\t\t\t\t\t<span class=\"left nav-disclose\"></span>\\
\t\t\t\t\t<span class=\"label\">\\
\t\t\t\t\t\t<span class=\"label-content\">\\
\t\t\t\t\t\t\t<input type=\"text\" name=\"new_labels[' + link + ']\" value=\"' + title + '\" />\\
\t\t\t\t\t\t\t<span class=\"path\">'+link+'</span>\\
\t\t\t\t\t\t</span>\\
\t\t\t\t\t</span>\\
\t\t\t\t\t<span class=\"actions\">\\
\t\t\t\t\t\t<span><input checked type=\"checkbox\" name=\"clickable[' + id + ']\" value=\"1\" id=\"clickable_' + id + '\" /><label for=\"clickable_' + id + '\">&nbsp;";
        // line 299
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Klikbaar", [], "cms");
        echo "</label></span>\\
\t\t\t\t\t\t<a href=\"#\" onclick=\"deleteItem(this); return false;\" class=\"do-delete red-text\" alt=\"";
        // line 300
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms"), "html", null, true);
        echo "\"><i class=\"far fa-trash-alt\"></i></a>\\
\t\t\t\t\t</span>\\
\t\t\t\t</div>\\
\t\t\t</li>');
\t\t  \$('#menu-editor').append(li);
\t\t  \$('.modal-footer .btn').click();
\t\t  initSorting();
\t  });

\t  \$('.nav-editor-menu li').click(function(){
\t\t  \$('.nav-editor-options > div, .nav-editor-menu li').removeClass('active');
\t\t  \$(this).addClass('active');
\t\t  activeType = \$(this).data('trigger');
\t\t  \$('.options-all').hide();
\t\t  \$('#options-' + \$(this).data('trigger')).show();
\t  });

\t  \$('.nav-editor-options li').click(function(){
\t\t  var label = \$(this).data('label');
\t\t  var id = \$(this).data('id');
\t\t  var slug = \$(this).data('slug');

\t\t  \tvar num_prefix = '10000';
\t\t\tvar type = 'page';
\t\t\tvar type_pleural = 'page';
\t\t\tif(activeType == 'webshop'){
\t\t\t\tnum_prefix = '20000';
\t\t\t\ttype = 'category';
\t\t\t\ttype_pleural = 'category';
\t\t\t}
\t\t\tif(activeType == 'anchor'){
\t\t\t\tnum_prefix = '30000';
\t\t\t\ttype = 'anchor';
\t\t\t\ttype_pleural = 'anchor';
\t\t\t}

\t\t\tif(typeof label == 'undefined'){
\t\t\t\tlabel = slug;
\t\t\t}



\t\t  var li = \$('<li class=\"page-entry\" id=\"' + activeType + '_' +id + '\">\\
\t\t\t\t<div class=\"page-entry-content\" data-slug=\"' + slug + '\" data-type=\"' + type + '\" data-simpleslug=\"' + slug + '\" data-label=\"' + label + '\" data-id=\"' + id + '\">\\
\t\t\t\t\t<span class=\"left nav-disclose\"></span>\\
\t\t\t\t\t<span class=\"label\"><input type=\"text\" name=\"new_labels[' + slug + ']\" value=\"' + label + '\" /></span>\\
\t\t\t\t\t<span class=\"actions\">\\
\t\t\t\t\t\t<span><input checked type=\"checkbox\" name=\"clickable[' + id + ']\" value=\"1\" id=\"clickable_' + id + '\" /><label for=\"clickable_' + id + '\">&nbsp;";
        // line 347
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Klikbaar", [], "cms");
        echo "</label></span>\\
\t\t\t\t\t\t<a href=\"#\" onclick=\"deleteItem(this); return false;\" class=\"do-delete red-text\" alt=\"";
        // line 348
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms"), "html", null, true);
        echo "\"><i class=\"far fa-trash-alt\"></i></a>\\
\t\t\t\t\t</span>\\
\t\t\t\t</div>\\
\t\t\t</li>');
\t\t  \$('#menu-editor').append(li);
\t\t  ";
        // line 354
        echo "
\t\t  \$(this).hide();

\t\t  initSorting();
\t  });

\t  initSorting();
});

var ns;

function deleteItem(el){
\t\$(el).closest('li').remove();
\t\$('#pagesort').val(JSON.stringify(ns.nestedSortable('toArray')));
}

function initSorting(){
\tif(\$('ol.nav-sortable').length){
\t\tns = \$('ol.nav-sortable').nestedSortable({
\t\t\tforcePlaceholderSize: true,
\t\t\thandle: 'div',
\t\t\thelper:\t'clone',
\t\t\titems: 'li',
\t\t\topacity: .6,
\t\t\tplaceholder: 'placeholder',
\t\t\trevert: 250,
\t\t\ttabSize: 25,
\t\t\ttolerance: 'pointer',
\t\t\ttoleranceElement: '> div',
\t\t\tmaxLevels: 4,
\t\t\tisTree: true,
\t\t\texpandOnHover: 700,
\t\t\tstartCollapsed: true,
\t\t\trelocate: function(){
\t\t\t\t\$('#pagesort').val(JSON.stringify(ns.nestedSortable('toArray')));
\t\t\t}
\t\t});

\t\t\$('#pagesort').val(JSON.stringify(ns.nestedSortable('toArray')));
\t}

\t\$('.nav-disclose').css('cursor','pointer').off('click').on('click', function() {
\t\tvar thisLi = \$(this).closest('li');
\t\tthisLi.toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
\t\tvar opened = [];
\t\t\$.each(\$('.mjs-nestedSortable-expanded'), function(ind, el){
\t\t\topened.push(el.id);
\t\t});
\t});
}
</script>

\t";
        // line 406
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["Form"] ?? null), 'form_end');
        echo "
";
    }

    // line 4
    public function macro_parse_navigation($__items__ = null, $__depth__ = null, $__doctrine__ = null, $__slugCheck__ = null, $__itemNotExists__ = null, $__cms_pages__ = null, $__cms_pages_reference__ = null, $__webshop_categories__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "items" => $__items__,
            "depth" => $__depth__,
            "doctrine" => $__doctrine__,
            "slugCheck" => $__slugCheck__,
            "itemNotExists" => $__itemNotExists__,
            "cms_pages" => $__cms_pages__,
            "cms_pages_reference" => $__cms_pages_reference__,
            "webshop_categories" => $__webshop_categories__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 5
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 6
                echo "\t\t";
                if ($context["item"]) {
                    // line 7
                    echo "\t\t\t";
                    $context["slug"] = twig_get_attribute($this->env, $this->source, $context["item"], "slug", [], "any", false, false, false, 7);
                    // line 8
                    echo "\t\t\t";
                    $context["slugKey"] = twig_get_attribute($this->env, $this->source, $context["item"], "slug", [], "any", false, false, false, 8);
                    // line 9
                    echo "\t\t\t";
                    $context["itemObj"] = twig_get_attribute($this->env, $this->source, $context["item"], "getObject", [0 => ($context["doctrine"] ?? null)], "method", false, false, false, 9);
                    // line 10
                    echo "\t\t\t";
                    $context["itemDoesNotExist"] = twig_in_filter(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 10), ($context["itemNotExists"] ?? null));
                    // line 11
                    echo "\t\t\t";
                    if (((($context["itemObj"] ?? null) || (twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 11) == "anchor")) || (twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 11) == "custom_page"))) {
                        // line 12
                        echo "\t\t\t\t";
                        if (((twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 12) != "anchor") && (twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 12) != "custom_page"))) {
                            // line 13
                            echo "\t\t\t\t\t";
                            $context["slug"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "getObject", [0 => ($context["doctrine"] ?? null)], "method", false, false, false, 13), "slug", [], "any", false, false, false, 13);
                            // line 14
                            echo "\t\t\t\t\t";
                            $context["slugKey"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "getObject", [0 => ($context["doctrine"] ?? null)], "method", false, false, false, 14), "slugKey", [], "any", false, false, false, 14);
                            // line 15
                            echo "\t\t\t\t";
                        }
                        // line 16
                        echo "
\t\t\t\t";
                        // line 17
                        $context["num_prefix"] = "10000";
                        // line 18
                        echo "\t\t\t\t";
                        if ((twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 18) == "category")) {
                            // line 19
                            echo "\t\t\t\t\t";
                            $context["num_prefix"] = "20000";
                            // line 20
                            echo "\t\t\t\t";
                        } elseif ((twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 20) == "archive")) {
                            // line 21
                            echo "\t\t\t\t\t";
                            $context["num_prefix"] = "30000";
                            // line 22
                            echo "\t\t\t\t";
                        } elseif ((twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 22) == "custom_page")) {
                            // line 23
                            echo "\t\t\t\t\t";
                            $context["num_prefix"] = "40000";
                            // line 24
                            echo "\t\t\t\t";
                        }
                        // line 25
                        echo "\t\t\t\t
\t\t\t\t";
                        // line 26
                        $context["placeholder"] = ((twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 26) . "_") . twig_get_attribute($this->env, $this->source, $context["item"], "targetid", [], "any", false, false, false, 26));
                        // line 27
                        echo "\t\t\t\t";
                        if ( !(null === twig_get_attribute($this->env, $this->source, $context["item"], "targetid", [], "any", false, false, false, 27))) {
                            // line 28
                            echo "\t\t\t\t\t";
                            if ((twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 28) == "page")) {
                                // line 29
                                echo "\t\t\t\t\t\t";
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable(($context["cms_pages_reference"] ?? null));
                                foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                                    // line 30
                                    echo "\t\t\t\t\t\t\t";
                                    if ((twig_get_attribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 30) == twig_get_attribute($this->env, $this->source, $context["item"], "targetid", [], "any", false, false, false, 30))) {
                                        // line 31
                                        echo "\t\t\t\t\t\t\t\t";
                                        $context["placeholder"] = twig_get_attribute($this->env, $this->source, $context["page"], "label", [], "any", false, false, false, 31);
                                        // line 32
                                        echo "\t\t\t\t\t\t\t";
                                    }
                                    // line 33
                                    echo "\t\t\t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 34
                                echo "\t\t\t\t\t";
                            } elseif ((twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 34) == "category")) {
                                // line 35
                                echo "\t\t\t\t\t\t";
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable(($context["webshop_categories"] ?? null));
                                foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                                    // line 36
                                    echo "\t\t\t\t\t\t\t";
                                    if ((twig_get_attribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 36) == twig_get_attribute($this->env, $this->source, $context["item"], "targetid", [], "any", false, false, false, 36))) {
                                        // line 37
                                        echo "\t\t\t\t\t\t\t\t";
                                        $context["placeholder"] = twig_get_attribute($this->env, $this->source, $context["category"], "label", [], "any", false, false, false, 37);
                                        // line 38
                                        echo "\t\t\t\t\t\t\t";
                                    }
                                    // line 39
                                    echo "\t\t\t\t\t\t";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 40
                                echo "\t\t\t\t\t";
                            }
                            // line 41
                            echo "\t\t\t\t";
                        }
                        echo "\t\t\t\t

\t\t\t\t<li class=\"page-entry\" id=\"";
                        // line 43
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 43), "html", null, true);
                        echo "_";
                        echo twig_escape_filter($this->env, ($context["num_prefix"] ?? null), "html", null, true);
                        echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 43) == "anchor")) ? (twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 43)) : (twig_get_attribute($this->env, $this->source, $context["item"], "targetId", [], "any", false, false, false, 43))), "html", null, true);
                        echo "\">
\t\t\t\t\t<div class=\"page-entry-content\" data-slug=\"";
                        // line 44
                        echo twig_escape_filter($this->env, ($context["slugKey"] ?? null), "html", null, true);
                        echo "\" data-newtab=\"";
                        echo (((twig_get_attribute($this->env, $this->source, $context["item"], "newtab", [], "any", false, false, false, 44) == 0)) ? ("0") : (1));
                        echo "\" data-type=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 44), "html", null, true);
                        echo "\" data-simpleslug=\"";
                        echo twig_escape_filter($this->env, ($context["slug"] ?? null), "html", null, true);
                        echo "\" data-label=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "label", [], "any", false, false, false, 44), "html", null, true);
                        echo "\" data-id=\"";
                        echo twig_escape_filter($this->env, ($context["num_prefix"] ?? null), "html", null, true);
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "targetId", [], "any", false, false, false, 44), "html", null, true);
                        echo "\">
\t\t\t\t\t\t<span class=\"left nav-disclose\"></span>
\t\t\t\t\t\t<span class=\"label\">
              <span class=\"label-content\">
  \t\t\t\t\t\t\t<input placeholder=\"";
                        // line 48
                        echo twig_escape_filter($this->env, ($context["placeholder"] ?? null), "html", null, true);
                        echo "\" type=\"text\" name=\"labels[";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 48), "html", null, true);
                        echo "]\" value=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "label", [], "any", false, false, false, 48), "html", null, true);
                        echo "\" />
  \t\t\t\t\t\t\t";
                        // line 49
                        if ((($context["itemDoesNotExist"] ?? null) || (((($context["itemObj"] ?? null) == null) && (twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 49) != "anchor")) && (twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 49) != "custom_page")))) {
                            echo "<span style=\"background-color: red; color:black; padding: 5px;\">";
                            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("De gelinkte pagina bestaat niet meer!", [], "cms"), "html", null, true);
                            echo "</span>";
                        }
                        // line 50
                        echo "
                <span class=\"path\">
                    ";
                        // line 52
                        if ((twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 52) == "page")) {
                            // line 53
                            echo "                        ";
                            $context["pagetype"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 53), "locale", [], "any", false, false, false, 53));
                            // line 54
                            echo "                    ";
                        } elseif ((twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 54) == "category")) {
                            // line 55
                            echo "                        ";
                            $context["pagetype"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Category", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 55), "locale", [], "any", false, false, false, 55));
                            // line 56
                            echo "                    ";
                        } elseif ((twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 56) == "custom_page")) {
                            // line 57
                            echo "                        ";
                            $context["pagetype"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Custom page", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 57), "locale", [], "any", false, false, false, 57));
                            // line 58
                            echo "                    ";
                        } else {
                            // line 59
                            echo "                        ";
                            $context["pagetype"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Onbekend", [], "cms", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 59), "locale", [], "any", false, false, false, 59));
                            // line 60
                            echo "                    ";
                        }
                        // line 61
                        echo "                    ";
                        if ((twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 61) == "custom_page")) {
                            // line 62
                            echo "\t\t\t\t\t\t";
                            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "slug", [], "any", false, false, false, 62), "html", null, true);
                            echo "
                    ";
                        }
                        // line 64
                        echo "                    ";
                        if ((twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 64) == "page")) {
                            // line 65
                            echo "                        ";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable(($context["cms_pages"] ?? null));
                            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                                // line 66
                                echo "                            ";
                                if (( !(null === twig_get_attribute($this->env, $this->source, $context["item"], "targetid", [], "any", false, false, false, 66)) && (twig_get_attribute($this->env, $this->source, $context["page"], "id", [], "any", false, false, false, 66) == twig_get_attribute($this->env, $this->source, $context["item"], "targetid", [], "any", false, false, false, 66)))) {
                                    // line 67
                                    echo "                                ";
                                    echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, $context["page"], "getFullUrl", [], "any", false, false, false, 67) . " (") . ($context["pagetype"] ?? null)) . ")"), "html", null, true);
                                    echo "
                            ";
                                }
                                // line 69
                                echo "                        ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 70
                            echo "                    ";
                        } elseif ((twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 70) == "category")) {
                            // line 71
                            echo "                                ";
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable(($context["webshop_categories"] ?? null));
                            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                                // line 72
                                echo "                            ";
                                if ((( !(null === twig_get_attribute($this->env, $this->source, $context["item"], "targetid", [], "any", false, false, false, 72)) && (twig_get_attribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 72) == twig_get_attribute($this->env, $this->source, $context["item"], "targetid", [], "any", false, false, false, 72))) && twig_get_attribute($this->env, $this->source, $context["category"], "getFullUrl", [], "any", true, true, false, 72))) {
                                    // line 73
                                    echo "                                ";
                                    echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, $context["category"], "getFullUrl", [], "any", false, false, false, 73) . " (") . ($context["pagetype"] ?? null)) . ")"), "html", null, true);
                                    echo "
                            ";
                                } elseif (( !(null === twig_get_attribute($this->env, $this->source,                                 // line 74
$context["item"], "targetid", [], "any", false, false, false, 74)) && (twig_get_attribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 74) == twig_get_attribute($this->env, $this->source, $context["item"], "targetid", [], "any", false, false, false, 74)))) {
                                    // line 75
                                    echo "                                ";
                                    echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, $context["category"], "label", [], "any", false, false, false, 75) . " (") . ($context["pagetype"] ?? null)) . ")"), "html", null, true);
                                    echo "
                            ";
                                }
                                // line 77
                                echo "                        ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 78
                            echo "                    ";
                        }
                        // line 79
                        echo "                </span>
              </span>
\t\t\t\t\t\t</span>

\t\t\t\t\t\t<span class=\"actions\">
\t\t\t\t\t\t\t";
                        // line 84
                        if ((( !twig_test_empty(($context["placeholder"] ?? null)) && (($context["placeholder"] ?? null) != twig_get_attribute($this->env, $this->source, $context["item"], "label", [], "any", false, false, false, 84))) && (twig_get_attribute($this->env, $this->source, $context["item"], "type", [], "any", false, false, false, 84) != "custom_page"))) {
                            // line 85
                            echo "\t\t\t\t\t\t\t\t<a title=\"";
                            echo twig_escape_filter($this->env, ($context["placeholder"] ?? null), "html", null, true);
                            echo "\" onclick=\"cpop.loadHtml('";
                            echo twig_escape_filter($this->env, ($context["placeholder"] ?? null), "html", null, true);
                            echo "');\" class=\"orange-text\"><i class=\"fa fa-exclamation-circle\"></i></a>
\t\t\t\t\t\t\t";
                        }
                        // line 87
                        echo "\t\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t\t<input ";
                        // line 88
                        echo ((twig_get_attribute($this->env, $this->source, $context["item"], "locked", [], "any", false, false, false, 88)) ? ("") : ("checked=\"checked\""));
                        echo " type=\"checkbox\" name=\"clickable[";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 88), "html", null, true);
                        echo "]\" value=\"1\" id=\"clickable_";
                        echo twig_escape_filter($this->env, ($context["num_prefix"] ?? null), "html", null, true);
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 88), "html", null, true);
                        echo "\" />
                <label for=\"clickable_";
                        // line 89
                        echo twig_escape_filter($this->env, ($context["num_prefix"] ?? null), "html", null, true);
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 89), "html", null, true);
                        echo "\">&nbsp;";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Klikbaar", [], "cms"), "html", null, true);
                        echo "</label>
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t <a href=\"#\" onclick=\"deleteItem(this); return false;\" class=\"do-delete red-text\" alt=\"";
                        // line 91
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verwijderen", [], "cms"), "html", null, true);
                        echo "\"><i class=\"far fa-trash-alt\"></i></a>
\t\t\t\t\t\t</span>
\t\t\t\t\t</div>

\t\t\t\t\t";
                        // line 95
                        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "children", [], "any", false, false, false, 95), "count", [], "any", false, false, false, 95)) {
                            // line 96
                            echo "\t\t\t\t\t\t<ol>
\t\t\t\t\t\t\t";
                            // line 97
                            echo twig_call_macro($macros["_self"], "macro_parse_navigation", [twig_get_attribute($this->env, $this->source, $context["item"], "children", [], "any", false, false, false, 97), (($context["depth"] ?? null) + 1), ($context["doctrine"] ?? null), ($context["slugCheck"] ?? null), ($context["itemNotExists"] ?? null), ($context["cms_pages"] ?? null), ($context["cms_pages_reference"] ?? null), ($context["webshop_categories"] ?? null)], 97, $context, $this->getSourceContext());
                            echo "
\t\t\t\t\t\t</ol>
\t\t\t\t\t";
                        }
                        // line 100
                        echo "\t\t\t\t</li>
\t\t\t";
                    }
                    // line 102
                    echo "\t\t";
                }
                // line 103
                echo "\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "@Cms/navigation/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  950 => 103,  947 => 102,  943 => 100,  937 => 97,  934 => 96,  932 => 95,  925 => 91,  917 => 89,  908 => 88,  905 => 87,  897 => 85,  895 => 84,  888 => 79,  885 => 78,  879 => 77,  873 => 75,  871 => 74,  866 => 73,  863 => 72,  858 => 71,  855 => 70,  849 => 69,  843 => 67,  840 => 66,  835 => 65,  832 => 64,  826 => 62,  823 => 61,  820 => 60,  817 => 59,  814 => 58,  811 => 57,  808 => 56,  805 => 55,  802 => 54,  799 => 53,  797 => 52,  793 => 50,  787 => 49,  779 => 48,  761 => 44,  754 => 43,  748 => 41,  745 => 40,  739 => 39,  736 => 38,  733 => 37,  730 => 36,  725 => 35,  722 => 34,  716 => 33,  713 => 32,  710 => 31,  707 => 30,  702 => 29,  699 => 28,  696 => 27,  694 => 26,  691 => 25,  688 => 24,  685 => 23,  682 => 22,  679 => 21,  676 => 20,  673 => 19,  670 => 18,  668 => 17,  665 => 16,  662 => 15,  659 => 14,  656 => 13,  653 => 12,  650 => 11,  647 => 10,  644 => 9,  641 => 8,  638 => 7,  635 => 6,  630 => 5,  610 => 4,  604 => 406,  550 => 354,  542 => 348,  538 => 347,  488 => 300,  484 => 299,  431 => 249,  422 => 243,  416 => 240,  407 => 234,  399 => 229,  394 => 226,  389 => 223,  376 => 221,  372 => 220,  368 => 218,  365 => 217,  360 => 214,  354 => 213,  348 => 212,  333 => 210,  329 => 209,  318 => 208,  314 => 207,  303 => 206,  299 => 205,  295 => 203,  293 => 202,  289 => 200,  283 => 199,  277 => 198,  271 => 197,  262 => 194,  251 => 193,  247 => 192,  242 => 190,  231 => 189,  227 => 188,  222 => 186,  211 => 185,  207 => 184,  202 => 182,  191 => 181,  187 => 180,  181 => 177,  173 => 173,  167 => 171,  164 => 170,  158 => 168,  156 => 167,  152 => 166,  147 => 164,  138 => 158,  126 => 149,  112 => 138,  104 => 133,  98 => 130,  85 => 122,  81 => 121,  76 => 119,  72 => 118,  66 => 115,  56 => 108,  51 => 107,  47 => 106,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/navigation/edit.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/navigation/edit.html.twig");
    }
}
