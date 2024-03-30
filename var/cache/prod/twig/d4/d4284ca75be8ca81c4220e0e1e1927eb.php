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

/* @TrinityBlog/entry/edit.html.twig */
class __TwigTemplate_df1761cbaf4eafa8d35e65c0641b117b extends Template
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
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@TrinityBlog/entry/edit.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_pagetitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Nieuws", [], "cms"), "html", null, true);
    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "
<ul class=\"nav nav-tabs\" role=\"tablist\">
  <li class=\"nav-item\" role=\"presentation\">
    <button class=\"nav-link active\" id=\"blog-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#blog-content\" type=\"button\" role=\"tab\" aria-controls=\"blog-content\" aria-selected=\"true\">
      ";
        // line 11
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bericht", [], "cms"), "html", null, true);
        echo "
    </button>
  </li>
  ";
        // line 14
        if (twig_in_filter("WebshopBundle", ($context["installed"] ?? null))) {
            // line 15
            echo "    <li class=\"nav-item\" role=\"presentation\">
      <button class=\"nav-link\" id=\"products-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#products-content\" type=\"button\" role=\"tab\" aria-controls=\"products-content\" aria-selected=\"false\">
        ";
            // line 17
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gerelateerde producten", [], "cms"), "html", null, true);
            echo "
      </button>
    </li>
  ";
        }
        // line 21
        echo "
  <li class=\"nav-item\" role=\"presentation\">
    <button class=\"nav-link\" id=\"seo-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#seo-content\" type=\"button\" role=\"tab\" aria-controls=\"seo-content\" aria-selected=\"false\">
      ";
        // line 24
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("SEO", [], "cms"), "html", null, true);
        echo "
    </button>
  </li>

  ";
        // line 28
        if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "openaikey", [], "any", false, false, false, 28)) && $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN"))) {
            // line 29
            echo "  <li class=\"nav-item\" role=\"presentation\">
    <button class=\"nav-link\" id=\"gpt-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#gpt-content\" type=\"button\" role=\"tab\" aria-controls=\"gpt-content\" aria-selected=\"false\">
      ";
            // line 31
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("EasifyGPT", [], "cms"), "html", null, true);
            echo "
    </button>
  </li>
  ";
        }
        // line 35
        echo "
  ";
        // line 36
        if (($context["new"] ?? null)) {
            // line 37
            echo "  ";
        } else {
            // line 38
            echo "  <li class=\"btns\">
    <a id=\"view-live\" class=\"tab right\" title=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina tonen in nieuw tabblad", [], "cms"), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, ($context["detailUrl"] ?? null), "html", null, true);
            echo "\" target=\"_blank\"><i class=\"fa fa-external-link-alt\"></i></a>
  </li>
  ";
        }
        // line 42
        echo "</ul>

";
        // line 44
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start', ["multipart" => true, "attr" => ["id" => "page-blog-edit-form"]]);
        echo "


<div class=\"btn-bar\">
    <div class=\"left\">
    </div>
    <div class=\"right\">
      <a href=\"#\" class=\"btn btn-flat\" onClick=\"history.back()\"><i class=\"fa fa-arrow-left\"></i> ";
        // line 51
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Terug", [], "cms"), "html", null, true);
        echo "</a>
      ";
        // line 53
        echo "      <button type=\"submit\" class=\"btn\"><i class=\"fa fa-save\"></i>";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Opslaan", [], "cms"), "html", null, true);
        echo "</button>
    </div>
</div>

<div class=\"tab-content\">
  <div class=\"tab-pane  show active\" id=\"blog-content\" role=\"tabpanel\" aria-labelledby=\"blog-tab\">
    <div id=\"blog\" class=\"t-content\">

      ";
        // line 61
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "

      <div class=\"row\">

        <div class=\"col-12 col-md-8\">
          <div class=\"card\">
            <div class=\"card-content\">
              <div class=\"card-title\">
                <div class=\"card-titles\">
                  ";
        // line 70
        if (($context["new"] ?? null)) {
            // line 71
            echo "                    <h6>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bericht toevoegen", [], "cms"), "html", null, true);
            echo "</h6>
                  ";
        } else {
            // line 73
            echo "                    <h6>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bericht wijzigen", [], "cms"), "html", null, true);
            echo "</h6>
                  ";
        }
        // line 75
        echo "                </div>
              </div>
              ";
        // line 77
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "label", [], "any", false, false, false, 77), 'row');
        echo "
              ";
        // line 78
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "subtitle", [], "any", false, false, false, 78), 'row');
        echo "

              <div id=\"external_content\" ";
        // line 80
        if ((twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "isexternal", [], "any", false, false, false, 80) == false)) {
            echo "class=\"d-none\"";
        }
        echo ">
                ";
        // line 81
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "external_url", [], "any", false, false, false, 81), 'row');
        echo "
              </div>

              <div id=\"normal_content\" ";
        // line 84
        if (twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "isexternal", [], "any", false, false, false, 84)) {
            echo "class=\"d-none\"";
        }
        echo ">
                ";
        // line 85
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "intro", [], "any", false, false, false, 85), 'row');
        echo "

                ";
        // line 87
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "body", [], "any", false, false, false, 87), 'row');
        echo "
              </div>
            </div>
          </div>
        </div>

        <div class=\"col-12 col-md-4\">
          <div class=\"card\">
            <div class=\"card-content\">
              <div class=\"card-title\">
                <div class=\"card-titles\">
                  <h6>";
        // line 98
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Publicatie", [], "cms"), "html", null, true);
        echo "</h6>
                </div>
              </div>
              ";
        // line 101
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "is_external", [], "any", false, false, false, 101), 'row');
        echo "
              ";
        // line 102
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "concept", [], "any", false, false, false, 102), 'row');
        echo "
              ";
        // line 103
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "datePublish", [], "any", false, false, false, 103), 'row');
        echo "
              ";
        // line 104
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "datePublishEnd", [], "any", false, false, false, 104), 'row');
        echo "
            </div>
          </div>

          <div class=\"card\">
            <div class=\"card-content cat-block\">
              <div class=\"card-titles\">
                <h6 class=\"card-title\">";
        // line 111
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Categorieën", [], "cms"), "html", null, true);
        echo "</h6>
              </div>
              ";
        // line 113
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "Category", [], "any", false, false, false, 113), 'label');
        echo "
              ";
        // line 114
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "Category", [], "any", false, false, false, 114), 'row', ["label" => false]);
        echo "
            </div>
          </div>

          ";
        // line 118
        if (((((($context["new"] ?? null) &&  !twig_test_empty(($context["multisite_all"] ?? null))) && (twig_length_filter($this->env, ($context["multisite_all"] ?? null)) > 1)) && twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "User", [], "any", false, false, false, 118), "checkPermissions", [0 => "ALLOW_SITE_SWITCHING"], "method", false, false, false, 118)) && ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 118), "sites", [], "any", false, false, false, 118), "count", [], "any", false, false, false, 118) == 0) || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 118), "sites", [], "any", false, false, false, 118), "count", [], "any", false, false, false, 118) > 1)))) {
            // line 119
            echo "            <div class=\"card\">
              <div class=\"card-content\">
                <div class=\"card-titles\">
                  <h6 class=\"card-title\">";
            // line 122
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Multi-site", [], "cms"), "html", null, true);
            echo "</h6>
                </div>
                <p>";
            // line 124
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u deze post dupliceren naar andere website(s)?", [], "cms"), "html", null, true);
            echo "</p>
                ";
            // line 125
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["multisite_all"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["C"]) {
                // line 126
                echo "                  ";
                if ((twig_in_filter($context["C"], twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 126), "sites", [], "any", false, false, false, 126)) || (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 126), "sites", [], "any", false, false, false, 126), "count", [], "any", false, false, false, 126) == 0))) {
                    // line 127
                    echo "                    <div class=\"form-check\">
                      <input ";
                    // line 128
                    echo ((($context["C"] == ($context["Settings"] ?? null))) ? ("disabled") : (""));
                    echo " type=\"checkbox\" name=\"clone[]\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "id", [], "any", false, false, false, 128), "html", null, true);
                    echo "\" id=\"clone-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "id", [], "any", false, false, false, 128), "html", null, true);
                    echo "\"  class=\"form-check-input\" />
                      <label for=\"clone-";
                    // line 129
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "id", [], "any", false, false, false, 129), "html", null, true);
                    echo "\"><strong style=\"color:#34adea;\" class=\"form-check-label\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "label", [], "any", false, false, false, 129), "html", null, true);
                    echo "</strong> | ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["C"], "language", [], "any", false, false, false, 129), "label", [], "any", false, false, false, 129), "html", null, true);
                    echo "</label>
                    </div>
                  ";
                }
                // line 132
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['C'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 133
            echo "              </div>
            </div>
          ";
        } elseif (((        // line 135
($context["new"] ?? null) &&  !twig_test_empty(($context["languages"] ?? null))) && (twig_length_filter($this->env, ($context["languages"] ?? null)) > 1))) {
            // line 136
            echo "            <div class=\"card\">
              <div class=\"card-content\">
                <div class=\"card-titles\">
                  <h6 class=\"card-title\">";
            // line 139
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Andere talen", [], "cms"), "html", null, true);
            echo "</h6>
                </div>
                <p>
                  ";
            // line 142
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Wilt u dit bericht dupliceren naar andere talen?", [], "cms"), "html", null, true);
            echo "
                </p>
                ";
            // line 144
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["C"]) {
                // line 145
                echo "                  <div class=\"form-check-wrapper\">
                    <input class=\"form-check-input\" ";
                // line 146
                echo ((($context["C"] == twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "language", [], "any", false, false, false, 146))) ? ("disabled") : (""));
                echo " type=\"checkbox\" name=\"clonelang[]\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "id", [], "any", false, false, false, 146), "html", null, true);
                echo "\" id=\"clonelang-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "id", [], "any", false, false, false, 146), "html", null, true);
                echo "\" />
                    <label class=\"form-check-label\" for=\"clonelang-";
                // line 147
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "id", [], "any", false, false, false, 147), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["C"], "label", [], "any", false, false, false, 147), "html", null, true);
                echo "</label>
                  </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['C'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 150
            echo "              </div>
            </div>
          ";
        }
        // line 153
        echo "
          <input type=\"hidden\" id=\"new_media\" name=\"new_media\" value=\"\" />

          <div class=\"card\">
              <div class=\"card-content\">
                  <div class=\"card-titles\">
                    <h6 class=\"card-title\">";
        // line 159
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media", [], "cms"), "html", null, true);
        echo "</h6>
                  </div>
                  <p>";
        // line 161
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("De eerste afbeelding wordt gebruikt als thumbnail en/of headerafbeelding", [], "cms"), "html", null, true);
        echo "</p>
                  <div class=\"sortable\" id=\"preview\">
                    ";
        // line 163
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "media", [], "any", false, false, false, 163))) {
            // line 164
            echo "                      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "media", [], "any", false, false, false, 164));
            foreach ($context['_seq'] as $context["_key"] => $context["Media"]) {
                // line 165
                echo "                        <div class=\"image-field\">
                          <img src=\"/";
                // line 166
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "getWebpath", [], "method", false, false, false, 166), "html", null, true);
                echo "\" alt=\"\">
                          <div class=\"btns\">
                            <input type=\"text\" name=\"media_sort[]\" value=\"";
                // line 168
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Media"], "id", [], "any", false, false, false, 168), "html", null, true);
                echo "\" style=\"display:none\">
                            <a href=\"";
                // line 169
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_entry_media_delete", ["id" => twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "id", [], "any", false, false, false, 169), "mediaid" => twig_get_attribute($this->env, $this->source, $context["Media"], "id", [], "any", false, false, false, 169)]), "html", null, true);
                echo "\" class=\"remove confirm btn btn-icon red\" data-msg=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Weet u zeker dat u dit bestand wilt verwijderen?", [], "cms"), "html", null, true);
                echo "\"><i class=\"far fa-trash-alt\"></i></a>
                          </div>
                        </div>
                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Media'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 173
            echo "                    ";
        }
        // line 174
        echo "                  </div>

                  <div style=\"display:none;\" id=\"dropzone\"><span class=\"message\"></span></div>

                  <a href=\"#\" onclick=\"\$('#dropzone').click();return false;\" class=\"btn-flat hide\"><i class=\"fas fa-file-upload\"></i>";
        // line 178
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestand uploaden", [], "cms"), "html", null, true);
        echo "</a>

              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class=\"tab-pane \" id=\"seo-content\" role=\"tabpanel\" aria-labelledby=\"seo-tab\">
    <div id=\"seo\" class=\"t-content\">
        <div class=\"card\">
            <div class=\"card-content\">
                <div class=\"row\">
                    <div class=\"col s12 m4 l6\">
                        <span class=\"card-title\">
                          <h6>";
        // line 193
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Metadata / SEO", [], "cms"), "html", null, true);
        echo "</h6>
                        </span>
                        ";
        // line 195
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "seo_title", [], "any", false, false, false, 195), 'row');
        echo "
                        ";
        // line 196
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "slug", [], "any", false, false, false, 196), 'row');
        echo "
                        <span style=\"position:absolute;bottom: -10px;left: 0;right: 0;display:block;font-size: 12px;color: red;\" id=\"slug-conflict\"></span>
                        ";
        // line 198
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "seo_keywords", [], "any", false, false, false, 198), 'row');
        echo "
                        ";
        // line 199
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "seo_description", [], "any", false, false, false, 199), 'row');
        echo "
                    </div>
                    <div class=\"col s12 m8 l6\">
                        <span class=\"card-title\">
                          <h6>";
        // line 203
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("SEO voorbeeld", [], "cms"), "html", null, true);
        echo "</h6>
                        </span>
                        <div id=\"seo-preview\">
                            <span class=\"seo-preview-title\"><span class=\"title-part\">";
        // line 206
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "seoTitle", [], "any", false, false, false, 206), "html", null, true);
        echo "</span> - ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "label", [], "any", false, false, false, 206), "html", null, true);
        echo "</span>
                            <span class=\"seo-preview-url\">";
        // line 207
        echo twig_escape_filter($this->env, ($context["host"] ?? null), "html", null, true);
        echo "<span class=\"slug-part\">/";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "slug", [], "any", false, false, false, 207), "html", null, true);
        echo "</span></span>
                            <span class=\"seo-preview-body\">";
        // line 208
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "seoDescription", [], "any", false, false, false, 208), "html", null, true);
        echo "</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      <div class=\"card\">
        <div class=\"card-content\">

          ";
        // line 218
        $context["foundMeta"] = false;
        // line 219
        echo "          ";
        if (($context["metatags"] ?? null)) {
            // line 220
            echo "            ";
            $context["foundMeta"] = true;
            // line 221
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["metatags"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Metatag"]) {
                // line 222
                echo "              <div class=\"mb-1\">
                <label for=\"form_label\" class=\"form-label required\">";
                // line 223
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 223), "label", [], "any", false, false, false, 223), "html", null, true);
                echo "</label>
                <div class=\"controls\">
                  ";
                // line 225
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 225), "key", [], "any", false, false, false, 225) == "description")) {
                    // line 226
                    echo "                    ";
                    $context["seoDescription"] = twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 226);
                    // line 227
                    echo "                    <textarea class=\"form-control fld-seo-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 227), "key", [], "any", false, false, false, 227), "html", null, true);
                    echo "\" placeholder=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 227), "placeholder", [], "any", false, false, false, 227), "html", null, true);
                    echo "\" name=\"metadata[";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 227), "id", [], "any", false, false, false, 227), "html", null, true);
                    echo "]\">";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 227), "html", null, true);
                    echo "</textarea>
                  ";
                } elseif (twig_in_filter(":description", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                 // line 228
$context["Metatag"], "metatag", [], "any", false, false, false, 228), "key", [], "any", false, false, false, 228))) {
                    // line 229
                    echo "                    ";
                    $context["meta_value"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 229), "value", [], "any", false, false, false, 229);
                    // line 230
                    echo "                    ";
                    if ((twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "seoDescription", [], "any", false, false, false, 230) && twig_test_empty(($context["meta_value"] ?? null)))) {
                        // line 231
                        echo "                      ";
                        $context["meta_value"] = twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "seoDescription", [], "any", false, false, false, 231);
                        // line 232
                        echo "                    ";
                    }
                    // line 233
                    echo "                    <textarea class=\"form-control fld-seo-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 233), "key", [], "any", false, false, false, 233), "html", null, true);
                    echo "\" placeholder=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 233), "placeholder", [], "any", false, false, false, 233), "html", null, true);
                    echo "\" name=\"metadata[";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 233), "id", [], "any", false, false, false, 233), "html", null, true);
                    echo "]\">";
                    echo twig_escape_filter($this->env, ($context["meta_value"] ?? null), "html", null, true);
                    echo "</textarea>
                  ";
                } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                 // line 234
$context["Metatag"], "metatag", [], "any", false, false, false, 234), "valueType", [], "any", false, false, false, 234) == "image")) {
                    // line 235
                    echo "
                    ";
                    // line 236
                    $context["hasMedia"] =  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 236));
                    // line 237
                    echo "                    <a id=\"meta-imageselect-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 237), "id", [], "any", false, false, false, 237), "html", null, true);
                    echo "\" href=\"#\" onclick=\"mediaField = '";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 237), "id", [], "any", false, false, false, 237), "html", null, true);
                    echo "';addMedia(this);\" style=\"";
                    echo ((($context["hasMedia"] ?? null)) ? ("display:none;") : (""));
                    echo "\" class=\"btn btn-bordered\">";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Selecteer een afbeelding", [], "cms"), "html", null, true);
                    echo "</a>
                    <div class=\"settings-image\" id=\"meta-image-";
                    // line 238
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 238), "id", [], "any", false, false, false, 238), "html", null, true);
                    echo "\">
                      ";
                    // line 239
                    if (($context["hasMedia"] ?? null)) {
                        // line 240
                        echo "                        <img src=\"";
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 240), "html", null, true);
                        echo "\" />
                        <div class=\"btns\">
                          <button style=\"\" type=\"button\" onclick=\"deleteMetaImage(";
                        // line 242
                        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 242), "id", [], "any", false, false, false, 242), "html", null, true);
                        echo ");\" class=\"btn btn-icon red\"><i class=\"far fa-trash-alt\"></i></button>
                        </div>
                      ";
                    }
                    // line 245
                    echo "                    </div>
                    <input id=\"meta-field-";
                    // line 246
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 246), "id", [], "any", false, false, false, 246), "html", null, true);
                    echo "\" class=\"form-control fld-seo-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 246), "key", [], "any", false, false, false, 246), "html", null, true);
                    echo "\" type=\"hidden\" placeholder=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 246), "placeholder", [], "any", false, false, false, 246), "html", null, true);
                    echo "\" name=\"metadata[";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 246), "id", [], "any", false, false, false, 246), "html", null, true);
                    echo "]\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 246), "html", null, true);
                    echo "\" />
                  ";
                } elseif ( !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,                 // line 247
$context["Metatag"], "metatag", [], "any", false, false, false, 247), "valueOptions", [], "any", false, false, false, 247))) {
                    // line 248
                    echo "                    <select name=\"form-select metadata[";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 248), "id", [], "any", false, false, false, 248), "html", null, true);
                    echo "]\" class=\"fld-seo-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 248), "key", [], "any", false, false, false, 248), "html", null, true);
                    echo "\">
                      <option value=\"\">";
                    // line 249
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("- n.v.t. -", [], "cms");
                    echo "</option>
                      ";
                    // line 250
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 250), "valueOptions", [], "any", false, false, false, 250));
                    foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                        // line 251
                        echo "                        <option ";
                        echo (((twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 251) == $context["option"])) ? ("selected") : (""));
                        echo " value=\"";
                        echo twig_escape_filter($this->env, $context["option"], "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $context["option"], "html", null, true);
                        echo "</option>
                      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 253
                    echo "                    </select>
                  ";
                } else {
                    // line 255
                    echo "                    ";
                    $context["meta_value"] = twig_get_attribute($this->env, $this->source, $context["Metatag"], "value", [], "any", false, false, false, 255);
                    // line 256
                    echo "                    ";
                    if ((twig_test_empty(($context["meta_value"] ?? null)) && twig_in_filter(":title", twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 256), "key", [], "any", false, false, false, 256)))) {
                        // line 257
                        echo "                      ";
                        $context["meta_value"] = twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "seoTitle", [], "any", false, false, false, 257);
                        // line 258
                        echo "                    ";
                    }
                    // line 259
                    echo "                    <input class=\"form-control frfld-seo-";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 259), "key", [], "any", false, false, false, 259), "html", null, true);
                    echo "\" type=\"text\" placeholder=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 259), "placeholder", [], "any", false, false, false, 259), "html", null, true);
                    echo "\" name=\"metadata[";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Metatag"], "metatag", [], "any", false, false, false, 259), "id", [], "any", false, false, false, 259), "html", null, true);
                    echo "]\" value=\"";
                    echo twig_escape_filter($this->env, ($context["meta_value"] ?? null), "html", null, true);
                    echo "\" />
                  ";
                }
                // line 261
                echo "                </div>
              </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Metatag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 264
            echo "          ";
        }
        // line 265
        echo "
          ";
        // line 266
        if ((($context["foundMeta"] ?? null) == false)) {
            // line 267
            echo "            <div class=\"center-align\">
              ";
            // line 268
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Er zijn nog geen metadata geconfigureerd.", [], "cms"), "html", null, true);
            echo "
            </div>
          ";
        }
        // line 271
        echo "
        </div>
      </div>
    </div>
  </div>

  ";
        // line 277
        if (( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "openaikey", [], "any", false, false, false, 277)) && $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN"))) {
            // line 278
            echo "  <div class=\"tab-pane \" id=\"gpt-content\" role=\"tabpanel\" aria-labelledby=\"gpt-tab\">
    <div class=\"gpt\">
      <div class=\"card\">
        <div class=\"card-content\">
          <div id=\"gpt-container\" class=\"col-12\">
              <span class=\"card-title\">
                <h6>";
            // line 284
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("EasifyGPT Blog", [], "cms"), "html", null, true);
            echo "</h6>
              </span>
              <div class=\"mb-3\">
                <label for=\"gpt-type\" class=\"form-label\">";
            // line 287
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Content maken voor", [], "cms"), "html", null, true);
            echo "</label>
                <select id=\"gpt-type\" class=\"form-select\">
                  <option value=\"body\">";
            // line 289
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Body tekst", [], "cms"), "html", null, true);
            echo "</option>
                  <option value=\"intro\">";
            // line 290
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Intro tekst", [], "cms"), "html", null, true);
            echo "</option>
                  <option value=\"title\">";
            // line 291
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Titel", [], "cms"), "html", null, true);
            echo "</option>
                </select>
              </div>
              <div class=\"mb-3\">
                <a class=\"btn w-100 text-center\" style=\"padding-top: 10px; display: block;\" id=\"gpt-btn\"><i class=\"fas fa-microchip\"></i> ";
            // line 295
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Genereer content", [], "cms"), "html", null, true);
            echo "</a>
              </div>
          </div>
          <div id=\"gpt-loader\" class=\"col-12 row text-center d-none\">
            <div class=\"col-12 mx-auto\">
               <h3>EasifyGPT is voor je bezig</h3>
               <p>Dit kan even duren, pak lekker een bakje koffie!</p>
            </div>
            <div class=\"col-12 mx-auto mt-4\">
              <span><i class=\"fas fa-spinner fa-spin fa-5x\"></i></span>
            </div>
          </div>
        </div>
      </div>
    <div>
  </div>
  ";
        }
        // line 312
        echo "
  ";
        // line 313
        if (twig_in_filter("WebshopBundle", ($context["installed"] ?? null))) {
            // line 314
            echo "    <div class=\"tab-pane \" id=\"products-content\" role=\"tabpanel\" aria-labelledby=\"products-tab\">
      <div id=\"producten\" class=\"t-content\">
          <div class=\"card\">
              <div class=\"card-content\">
                  <div class=\"card-title\">
                    <div class=\"card-titles\">
                      <h6>";
            // line 320
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Gerelateerde producten", [], "cms"), "html", null, true);
            echo "</h6>
                      <p>";
            // line 321
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Producten kunnen aan een nieuwsbericht gekoppeld worden zodat deze bij het bericht getoond worden. U kunt dit leeglaten om geen producten te tonen.", [], "cms"), "html", null, true);
            echo "</p>
                    </div>
                  </div>

                  <input type=\"hidden\" id=\"sort-linked-table-products\" name=\"sort[linked-table-products]\" value=\"\" />
                  <table class=\"linked-table sorted_table table\">
                    <thead>
                      <tr>
                        <th>";
            // line 329
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Product", [], "cms");
            echo "</th>
                        <th style=\"width: 150px;\">";
            // line 330
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Artikel nr.", [], "cms");
            echo "</th>
                        <th style=\"width: 150px;\">";
            // line 331
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("SKU", [], "cms");
            echo "</th>
                        <th style=\"width: 140px;\" class=\"right-align\">";
            // line 332
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Stukprijs", [], "cms");
            echo "</th>
                        <th style=\"width: 100px;\">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody id=\"linked-table-products\">
                      ";
            // line 337
            if ( !twig_test_empty(($context["products"] ?? null))) {
                // line 338
                echo "                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["Link"]) {
                    // line 339
                    echo "                          <tr id=\"conf_link_prod_";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Link"], "id", [], "any", false, false, false, 339), "html", null, true);
                    echo "\" data-id=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Link"], "id", [], "any", false, false, false, 339), "html", null, true);
                    echo "\">
                            <td >
                              <div class=\"form-check\">
                                <input type=\"checkbox\" name=\"conf_link[]\" value=\"";
                    // line 342
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Link"], "id", [], "any", false, false, false, 342), "html", null, true);
                    echo "\" checked=\"checked\" class=\"form-check-input\" />
                                <div class=\"form-check-label\">";
                    // line 343
                    echo twig_escape_filter($this->env, ((( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["Link"], "brand", [], "any", false, false, false, 343))) ? (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["Link"], "brand", [], "any", false, false, false, 343), "label", [], "any", false, false, false, 343)) : ("")) . twig_get_attribute($this->env, $this->source, $context["Link"], "label", [], "any", false, false, false, 343)), "html", null, true);
                    echo "</div>
                              </div>
                            </td>
                            <td>";
                    // line 346
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Link"], "number", [], "any", false, false, false, 346), "html", null, true);
                    echo "</td>
                            <td>";
                    // line 347
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["Link"], "sku", [], "any", false, false, false, 347), "html", null, true);
                    echo "</td>
                            <td class=\"right-align\">";
                    // line 348
                    echo twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["WebshopSettings"] ?? null), "currency", [], "any", false, false, false, 348), "format", [0 => twig_get_attribute($this->env, $this->source, $context["Link"], "priceIncl", [], "any", false, false, false, 348)], "method", false, false, false, 348);
                    echo "</td>
                            <td class=\"right-align actions\">
                              <a target=\"_blank\" href=\"";
                    // line 350
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_webshop_products_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["Link"], "id", [], "any", false, false, false, 350)]), "html", null, true);
                    echo "\"><i class=\"fa fa-edit\"></i></a>
                              <a href=\"#\" onclick=\"\$(this).parent().parent().remove();return false;\"><i class=\"far fa-trash-alt\"></i></a>
                            </td>
                          </tr>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Link'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 355
                echo "                      ";
            }
            // line 356
            echo "                    </tbody>
                  </table>

                  <div id=\"customproducts-count\"></div>

                  ";
            // line 392
            echo "                  <div style=\"margin-top:20px;\">
                      ";
            // line 394
            echo "                      <button id=\"add-product-btn\" type=\"button\" class=\"right btn btn-bordered btn-icon\" onclick=\"cpop.reset().loadAjax('";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_webshop_products_search", ["target" => "linked-table", "link" => "conf_link"]), "html", null, true);
            echo "')\"><i class=\"fa fa-plus\"></i></button>
                      <div style=\"clear:both;\"></div>
                  </div>

              <div id=\"modal-products\" class=\"modal product-selector modal-fixed-footer\">
                  <div class=\"modal-content\">
                    ";
            // line 428
            echo "                  </div>
                  <div class=\"modal-footer\">
                      <input type=\"text\" class=\"left\" onkeyup=\"filter(this.value, '#modal-products-results')\" style=\"width:50%;\" placeholder=\"";
            // line 430
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Producten filteren", [], "cms"), "html", null, true);
            echo "\" />
                      <a href=\"#!\" class=\"modal-action modal-close waves-effect waves-green btn-flat \">";
            // line 431
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sluiten", [], "cms"), "html", null, true);
            echo "</a>
                  </div>
              </div>

              ";
            // line 446
            echo "              </div>
          </div>
      </div>
    </div>
  ";
        }
        // line 451
        echo "</div>

";
        // line 453
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        echo "

<form method=\"post\" enctype=\"multipart/form-data\">
\t<input type=\"hidden\" id=\"mediadirid\" name=\"mediadirid\" value=\"";
        // line 456
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Mediadir"] ?? null), "id", [], "any", false, false, false, 456), "html", null, true);
        echo "\" />
\t<input type=\"hidden\" name=\"manual_upload\" value=\"1\" />
\t<input type=\"file\" name=\"media[]\" id=\"upload_button\" />
\t<button type=\"submit\">";
        // line 459
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uploaden", [], "cms"), "html", null, true);
        echo "</button>
</form>

    </div>

\t<script src=\"";
        // line 464
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/ckeditor/ckeditor.js"), "html", null, true);
        echo "\"></script>
\t<script>


  \$(function(){
    //Onclick on the gpt-btn
    \$('#gpt-btn').click(function(e){
      e.preventDefault();

      \$('#gpt-container').addClass('d-none');
      \$('#gpt-loader').removeClass('d-none');
      //Do the ajax call
      \$.ajax({
        url: \"/admin/blog/ajax/openai/";
        // line 477
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "id", [], "any", false, false, false, 477), "html", null, true);
        echo "/\" + \$('#gpt-type').val(),
        type: 'GET',
        success: function(data) {
          if(\$('#gpt-type').val() == 'body'){
            CKEDITOR.instances['form_body'].setData(data.text);
          } else if(\$('#gpt-type').val() == 'title') {
            \$('#form_label').val(data.text);
          } else if(\$('#gpt-type').val() == 'intro') {
            CKEDITOR.instances['form_intro'].setData(data.text);
          }

          \$('#gpt-container').removeClass('d-none');
          \$('#gpt-loader').addClass('d-none');
        }
      });
    });
  });



\tvar editor = [];
        \$(function(){




      \$.each(\$('.ckeditor'), function(ind, area){
            if (area.id == \"form_body\") {
                var ckeditor_height = \"550px\";
            } else {
                var ckeditor_height = \"250px\";
            }
    \t\teditor[ind] = CKEDITOR.replace( area, {
  \t\t\t\twidth: \"100%\",
          height: ckeditor_height
\t\t\t} );

\t\t\t// Bundle selection popup
\t\t\teditor[ind].addCommand(\"bundleSelect\", { // create named command
\t\t\t\texec: function(edt) {
\t\t\t\t\tcpop.reset().loadAjax('";
        // line 517
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_link");
        echo "');
\t\t\t\t}
\t\t\t});
\t\t\teditor[ind].ui.addButton('bundleSelect', { // add new button and bind our command
\t\t\t\tlabel: \"Bundle selection\",
\t\t\t\tcommand: 'bundleSelect',
\t\t\t\ttoolbar: 'document',
\t\t\t\ticon: '";
        // line 524
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/ck_ext.png"), "html", null, true);
        echo "'
\t\t\t});
\t\t\teditor[ind].on('instanceReady',function(){
\t\t\t\t\$('.cke_button__inlinesave').remove();
\t\t\t});
});
";
        // line 530
        if ((null === twig_get_attribute($this->env, $this->source, ($context["Entry"] ?? null), "id", [], "any", false, false, false, 530))) {
            // line 531
            echo "  \$('#form_label').on('keyup', function() {
  \$('#form_seo_title').val(\$('#form_label').val()).trigger(\"keyup\");
  //\$('#form_slug').val(\$('#form_label').val().toLowerCase().replace(/ /g, \"-\").replace(/[^a-z0-9-_~]/g, \"\").replace(/-+/g, \"-\"));
  \$('.slug-part').html('/' + \$('#form_label').val().toLowerCase().replace(/ /g, \"-\").replace(/[^a-z0-9-_~]/g, \"\").replace(/-+/g, \"-\"));
\t    });
";
        }
        // line 537
        echo "
            var maxWords = 80;
            var maxChars = 300;

            var formEl = \$('#form_intro').parent().parent();
            formEl.css('position', 'relative');
            var ckCounter = \$('<div class=\"counter\" style=\"position: absolute; top: 0; right: 0; color: green; font-size: 12px; border: solid 1px #ccc; padding: 2px 5px; border-radius: 4px;\">";
        // line 543
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Woorden:", [], "cms"), "html", null, true);
        echo " <span class=\"words\">0</span>, ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("tekens:", [], "cms"), "html", null, true);
        echo " <span class=\"chars\">0</span></div>');
            formEl.append(ckCounter);

            // console.log(CKEDITOR.instances.form_intro);
            CKEDITOR.on(\"instanceReady\", function(event){
                var editor = event.editor;
                if(editor.name == 'form_intro'){

                    editor.on( 'key', function( evt ){
                        doCount(editor);
                    }, editor.element.\$ );

                    editor.on( 'paste', function( evt ){
                        doCount(editor);
                    }, editor.element.\$ );

                    doCount(editor);
                }
            });

            function doCount(editor){
                var plainEditorContent = editor.getData();
                plainEditorContent = plainEditorContent.replace(/<[^>]*>/g,\" \");
                plainEditorContent = plainEditorContent.replace(/\\s+/g, ' ');
                plainEditorContent = plainEditorContent.trim();
                var chars = plainEditorContent.length
                var words = plainEditorContent.split(\" \").length

                if(chars > maxChars){
                    formEl.find('.counter').css('color', 'red');
                }else{
                    formEl.find('.counter').css('color', 'green');
                }

                formEl.find('.words').html(words);
                formEl.find('.chars').html(chars);
            }

        });
\t</script>

  <script>
    \$(document).ready(function() {

      \$('#form_is_external').change(function() {
          if(this.checked) {
            \$('#external_content').removeClass('d-none');
            \$('#normal_content').addClass('d-none');
          } else {
            \$('#external_content').addClass('d-none');
            \$('#normal_content').removeClass('d-none');
          }
      });
  });
  </script>

\t<script type=\"text/javascript\" src=\"";
        // line 599
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/js/jquery.filedrop.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\">

        var totalUploadSize = 0;
        var fileDrop;
        var dropped = 0;

        var allowedDocTypes = ['text/plain', 'text/richtext', 'application/msword', 'application/excel', 'application/vnd.ms-excel', 'application/x-excel', 'application/x-msexcel', 'application/pdf', 'application/mspowerpoint', 'application/powerpoint', 'application/vnd.ms-powerpoint', 'application/x-mspowerpoint', 'application/x-iwork-keynote-sffkey', 'application/x-iwork-numbers-sffnumbers', 'application/vnd.apple.keynote', 'application/vnd.apple.pages', 'application/vnd.apple.numbers', 'text/html', 'text/css', 'text/php', 'text/asp', 'text/x-c', 'text/x-script.csh', 'text/x-script.elisp', 'text/x-setext', 'text/webviewhtml', 'text/x-java-source', 'text/x-pascal', 'text/pascal', 'text/x-script.perl', 'text/x-script.perl-module', 'text/x-script.phyton', 'text/x-asm', 'text/sgml', 'text/x-sgml', 'text/x-script.sh', 'text/x-server-parsed-html', 'text/uri-list', 'text/x-uuencode', 'video/msvideo', 'video/avi', 'video/x-msvideo', 'video/mpeg', 'video/mp4', 'video/quicktime', 'audio/basic', 'audio/x-midi', 'audio/mpeg', 'audio/vorbis', 'audio/ogg', 'audio/x-pn-realaudio', 'audio/vnd.rn-realaudio', 'audio/wav', 'audio/x-wav', 'application/x-rar-compressed', 'application/octet-stream', 'application/zip', 'application/csv', 'text/csv'];
        var allowedMediaTypes = ['image/bmp', 'image/gif', 'image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff'];

        var allowedTypes = \$.merge( \$.merge([], allowedMediaTypes), allowedDocTypes)

        \$().ready(function(){
            var msg_idle = '";
        // line 612
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sleep hier bestanden naar toe om deze te uploaden.", [], "cms"), "html", null, true);
        echo "';
            var msg_hover = '";
        // line 613
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Laat los om toe te voegen.", [], "cms"), "html", null, true);
        echo "';
            var msg_uploading = '";
        // line 614
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bezig met uploaden...", [], "cms"), "html", null, true);
        echo "';
            var msg_done_idle = '";
        // line 615
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uploaden voltooid!", [], "cms"), "html", null, true);
        echo "';

            fileDrop = \$('#dropzone').filedrop({
                fallback_id: 'upload_button',   // an identifier of a standard file input element, becomes the target of \"click\" events on the dropzone
                url: '";
        // line 619
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_mod_blog_entry_media_handler");
        echo "',\t\t\t  // upload handler, handles each file separately, can also be a function taking the file and returning a url
                paramname: 'media[]',\t\t  // POST parameter name used on serverside to reference file, can also be a function taking the filename and returning the paramname
                withCredentials: true,\t\t  // make a cross-origin request with cookies
                data: { entryid: '";
        // line 622
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "' },
                error: function(err, file) {
                    switch(err) {
                        case 'BrowserNotSupported':
                            \$('#upload-overlay').hide();
                            alert('";
        // line 627
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("browser does not support HTML5 drag and drop", [], "cms"), "html", null, true);
        echo "')
                            break;
                        case 'TooManyFiles':
                            \$('#upload-overlay').hide();
                            break;
                        case 'FileTooLarge':
                            \$('#upload-overlay').hide();
                            cpop.loadHtml(\"";
        // line 634
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestand is te groot. Maximaal toegestaan:<br />Media bestanden: %maxMediaFileSize% KB<br />Alle overige bestanden: %maxFileSize% MB", ["%maxMediaFileSize%" => ($context["maxMediaFileSize"] ?? null), "%maxFileSize%" => ($context["maxFileSize"] ?? null)], "cms");
        echo "\");
                            break;
                        case 'FileTypeNotAllowed':
                            \$('#upload-overlay').hide();
                            cpop.loadHtml(\" ";
        // line 638
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bestandstype", [], "cms"), "html", null, true);
        echo "\" + '\\'' + file.type + '\\'' + \"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("is niet toegestaan.<br/><br/><strong>Toegestane bestanden:", [], "cms"), "html", null, true);
        echo "\" + '</strong><ul><li>' + allowedTypes.join('</li><li>') + '</li></ul>');
                            break;
                        case 'FileExtensionNotAllowed':
                            \$('#upload-overlay').hide();
                            break;
                        default:
                            break;
                    }
                },
                allowedfiletypes: allowedTypes,   // filetypes allowed by Content-Type.  Empty array means no restrictions
                allowedmediafiletypes: allowedMediaTypes,
                allowedfileextensions: [], // file extensions allowed. Empty array means no restrictions
                maxfiles: 10,
                maxfilesize: ";
        // line 651
        echo twig_escape_filter($this->env, ($context["maxFileSize"] ?? null), "html", null, true);
        echo ",\t// max file size in MBs
                maxmediafilesize: ";
        // line 652
        echo twig_escape_filter($this->env, ($context["maxMediaFileSize"] ?? null), "html", null, true);
        echo ", // max images file size in KB's
                dragOver: function() {
                    \$('#dropzone').addClass('hover').find('.message').html(msg_hover);
                },
                dragLeave: function() {
                    \$('#dropzone').removeClass('hover').find('.message').html(msg_idle)
                },
                docOver: function() { },
                docLeave: function() { },
                drop: function() {
                    \$('#upload-overlay').show();
                },
                uploadStarted: function(i, file, len){
                    \$('#upload-overlay').show();
                },
                uploadFinished: function(i, file, response, time) {
                    \$('#new_media').val(\$('#new_media').val() + ',' + response[0].id);
                    var imgUrl = '/uploads/images/' + response[0].path;
                    \$('#preview').append(\$('<div class=\"item\">\\
                          <img src=\"' + imgUrl + '\" alt=\"\">\\
                          <input type=\"text\" name=\"media_sort[]\" value=\"' + response[0].id + '\" style=\"display:none\">\\
                        </div>'));
                },
                progressUpdated: function(i, file, progress) { },
                globalProgressUpdated: function(progress) {
                    \$('#upload-overlay .progress-bar').css('width', progress + '%');
                },
                speedUpdated: function(i, file, speed) { },
                rename: function(name) { },
                beforeEach: function(file) { },
                beforeSend: function(file, i, done) {
                    if(dropped <= 0){ \$('.totals').hide(); }
                    done(); // Start upload
                    \$('#dropzone').removeClass('hover').find('.message').html(msg_uploading)
                },
                afterAll: function() {
                    \$('#upload-overlay').hide();
                    \$('#upload-overlay .progress-bar').css('width', '0%');
                    \$('#dropzone').removeClass('hover').find('.message').html(msg_done_idle)
                }
            }).find('.message').html(msg_idle);
        });

        function closeModal(){
            \$('#shade,#modal').removeClass('show');
        }

        function humanFileSize(size, dec = 2) {
            var i = Math.floor( Math.log(size) / Math.log(1024) );
            return ( size / Math.pow(1024, i) ).toFixed(dec) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i];
        };

        \$( function() {
            \$( \".sortable\" ).sortable();
        } );

        function addProduct(el){
            var tr = \$(el).parent().parent();
            var id = tr.data('id');
            tr.hide();

            \$('#del-related-product_' + id).show();
            \$('#del-related-product_' + id).find('input[type=\"checkbox\"]').prop('checked', true);

            return false;
        }

        function deleteProduct(el){
            var tr = \$(el).parent().parent();
            var id = tr.data('id');
            tr.hide();

            \$('#add-product_' + id).show();
            tr.find('input[type=\"checkbox\"]').prop('checked', false);

            return false;
        }

var callerEl = null;
function addMedia(el){
\tcallerEl = \$(el);
\tcpop.reset().loadAjax('";
        // line 733
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_popup", ["parentid" => null]);
        echo "');
\treturn false;
}
function clickedPopupMedia(mediaid, filepath, label, width){
\t\$('#meta-field-' + mediaField).val(filepath);
\t\$('#meta-image-' + mediaField).html('<img src=\"' + filepath + '\" style=\"max-width: 100%;max-height: 100%;\" /><button style=\"\" type=\"button\" onclick=\"deleteMetaImage(' + mediaField + ');\" class=\"btn btn-icon\"><i class=\"far fa-trash-alt\"></i></button>');
\t\$('#meta-imageselect-' + mediaField).hide();
\tcpop.close();
}
function deleteMetaImage(id){
\t\$('#meta-field-' + id).val('');
\t\$('#meta-image-' + id).html('');
\t\$('#meta-imageselect-' + id).show();
}
\t</script>

  <style type=\"text/css\" media=\"screen\">
    #form_Category{
      margin: 0;
    }

    .cat-block label.required {
        display: none;
    }
  </style>

  <script>
  \$(function(){
    if(\$('.linked-table').length > 0){
      \$('.linked-table').sortable({
        items: 'tbody > tr',
        placeholder: 'placeholder',
        stop: function( event, ui ) {
          \$('#sort-linked-table-products').val(\$('.linked-table').sortable('serialize'));
        },
        create: function( event, ui ) {
          \$('#sort-linked-table-products').val(\$('.linked-table').sortable('serialize'));
        }
      });
    }
  });
  </script>
";
    }

    public function getTemplateName()
    {
        return "@TrinityBlog/entry/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1268 => 733,  1184 => 652,  1180 => 651,  1162 => 638,  1155 => 634,  1145 => 627,  1137 => 622,  1131 => 619,  1124 => 615,  1120 => 614,  1116 => 613,  1112 => 612,  1096 => 599,  1035 => 543,  1027 => 537,  1019 => 531,  1017 => 530,  1008 => 524,  998 => 517,  955 => 477,  939 => 464,  931 => 459,  925 => 456,  919 => 453,  915 => 451,  908 => 446,  901 => 431,  897 => 430,  893 => 428,  883 => 394,  880 => 392,  873 => 356,  870 => 355,  859 => 350,  854 => 348,  850 => 347,  846 => 346,  840 => 343,  836 => 342,  827 => 339,  822 => 338,  820 => 337,  812 => 332,  808 => 331,  804 => 330,  800 => 329,  789 => 321,  785 => 320,  777 => 314,  775 => 313,  772 => 312,  752 => 295,  745 => 291,  741 => 290,  737 => 289,  732 => 287,  726 => 284,  718 => 278,  716 => 277,  708 => 271,  702 => 268,  699 => 267,  697 => 266,  694 => 265,  691 => 264,  683 => 261,  671 => 259,  668 => 258,  665 => 257,  662 => 256,  659 => 255,  655 => 253,  642 => 251,  638 => 250,  634 => 249,  627 => 248,  625 => 247,  613 => 246,  610 => 245,  604 => 242,  598 => 240,  596 => 239,  592 => 238,  581 => 237,  579 => 236,  576 => 235,  574 => 234,  563 => 233,  560 => 232,  557 => 231,  554 => 230,  551 => 229,  549 => 228,  538 => 227,  535 => 226,  533 => 225,  528 => 223,  525 => 222,  520 => 221,  517 => 220,  514 => 219,  512 => 218,  499 => 208,  493 => 207,  487 => 206,  481 => 203,  474 => 199,  470 => 198,  465 => 196,  461 => 195,  456 => 193,  438 => 178,  432 => 174,  429 => 173,  417 => 169,  413 => 168,  408 => 166,  405 => 165,  400 => 164,  398 => 163,  393 => 161,  388 => 159,  380 => 153,  375 => 150,  364 => 147,  356 => 146,  353 => 145,  349 => 144,  344 => 142,  338 => 139,  333 => 136,  331 => 135,  327 => 133,  321 => 132,  311 => 129,  303 => 128,  300 => 127,  297 => 126,  293 => 125,  289 => 124,  284 => 122,  279 => 119,  277 => 118,  270 => 114,  266 => 113,  261 => 111,  251 => 104,  247 => 103,  243 => 102,  239 => 101,  233 => 98,  219 => 87,  214 => 85,  208 => 84,  202 => 81,  196 => 80,  191 => 78,  187 => 77,  183 => 75,  177 => 73,  171 => 71,  169 => 70,  157 => 61,  145 => 53,  141 => 51,  131 => 44,  127 => 42,  119 => 39,  116 => 38,  113 => 37,  111 => 36,  108 => 35,  101 => 31,  97 => 29,  95 => 28,  88 => 24,  83 => 21,  76 => 17,  72 => 15,  70 => 14,  64 => 11,  58 => 7,  54 => 6,  47 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityBlog/entry/edit.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/BlogBundle/Resources/views/entry/edit.html.twig");
    }
}
