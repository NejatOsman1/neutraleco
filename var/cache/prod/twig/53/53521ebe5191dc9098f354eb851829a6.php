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

/* @Cms/settings/index.html.twig */
class __TwigTemplate_8eef61f51f1832a53c8948dc84d13b96 extends Template
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
        $this->parent = $this->loadTemplate("@Cms/base.html.twig", "@Cms/settings/index.html.twig", 1);
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
        echo "\t";
        // line 8
        echo "
\t";
        // line 9
        $context["cdn_js"] = ["jQuery (v3.5.1)" => "//code.jquery.com/jquery-3.5.1.min.js", "Popper (v1.14.7)" => "//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js", "Bootstrap (v4.5.2)" => "//stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js", "Bootstrap (v5.1.3)" => "//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js", "Toastr (v2.1.4)" => "//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js", "Slick slider (v1.8.1)" => "//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js", "Swiper slider bundle (v6.2.0)" => "//cdn.jsdelivr.net/npm/swiper@6.2.0/swiper-bundle.min.js", "Featherlight (v1.7.14)" => "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js", "Chart.js (v2.7.1)" => "//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js", "Moments" => "//momentjs.com/downloads/moment.js", "Moments (with locales)" => "//momentjs.com/downloads/moment-with-locales.js", "MatchHeight (v0.7.2)" => "//cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js", "Lightgallery (v2.6.1)" => "//cdnjs.cloudflare.com/ajax/libs/lightgallery/2.6.1/lightgallery.min.js", "Lightgallery Thumbnail (v2.6.1)" => "//cdnjs.cloudflare.com/ajax/libs/lightgallery/2.6.1/plugins/thumbnail/lg-thumbnail.min.js", "Lightgallery Zoom (v2.6.1)" => "//cdnjs.cloudflare.com/ajax/libs/lightgallery/2.6.1/plugins/zoom/lg-zoom.min.js", "ScrollMagic (v2.0.7)" => "//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js", "ScrollMagic (GSAP)" => "//cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js", "ScrollMagic (PLUGIN: GSAP ANIMATION)" => "//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js", "ScrollMagic (PLUGIN: DEBUG) (v2.0.7)" => "//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js", "SimpleParallax (v5.5.1)" => "//cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"];
        // line 31
        echo "
\t";
        // line 32
        $context["cdn_css"] = ["Bootstrap (v4.5.2)" => "//stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css", "Bootstrap (v5.1.3)" => "//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css", "Toastr (v2.1.4)" => "//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css", "Slick slider (v1.8.1)" => "//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css", "Slick theme (v1.8.1)" => "//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css", "Swiper slider bundle (v6.2.0)" => "//cdn.jsdelivr.net/npm/swiper@6.2.0/swiper-bundle.min.css", "Featherlight (v1.7.14)" => "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css", "Lightgallery (v2.6.1)" => "//cdnjs.cloudflare.com/ajax/libs/lightgallery/2.6.1/css/lightgallery.min.css", "Lightgallery Zoom (v2.6.1)" => "//cdnjs.cloudflare.com/ajax/libs/lightgallery/2.6.1/css/lg-video.min.css", "Lightgallery Thumbnail (v2.6.1)" => "//cdnjs.cloudflare.com/ajax/libs/lightgallery/2.6.1/css/lg-thumbnail.min.css"];
        // line 44
        echo "
\t";
        // line 45
        $context["cdn_font"] = ["Font Awesome (v5.15.4)" => "//use.fontawesome.com/releases/v5.15.4/css/all.css"];
        // line 48
        echo "
\t";
        // line 50
        echo "
\t";
        // line 51
        $context["cdn_js_old"] = ["jQuery (v3.3.1)" => "//code.jquery.com/jquery-3.3.1.min.js", "jQuery Migrate (v3.1.0)" => "//code.jquery.com/jquery-migrate-3.1.0.min.js", "jQuery (v3.1.1)" => "//code.jquery.com/jquery-3.1.1.min.js", "Popper (v1.12.3)" => "//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js", "Bootstrap (v4.3.1)" => "//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js", "Bootstrap (v3.3.7)" => "//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js", "Bootstrap (v4.0.0-beta.2)" => "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js", "Swiper slider (v4.5.1)" => "//cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.js", "Lightgallery (v1.7.2)" => "//cdn.jsdelivr.net/npm/lightgallery@1.7.2/dist/js/lightgallery.min.js", "Lightgallery Bundle (v1.7.2)" => "//cdn.jsdelivr.net/npm/lightgallery@1.7.2/dist/js/lightgallery-all.min.js", "Lightgallery Thumbnail (v1.7.2)" => "//cdn.jsdelivr.net/npm/lightgallery@1.7.2/modules/lg-thumbnail.min.js", "Lightgallery Zoom (v1.7.2)" => "//cdn.jsdelivr.net/npm/lightgallery@1.7.2/modules/lg-zoom.min.js"];
        // line 65
        echo "
\t";
        // line 66
        $context["cdn_css_old"] = ["Bootstrap (v4.3.1)" => "//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css", "Bootstrap (v3.3.7)" => "//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css", "Bootstrap (v4.0.0-beta.2)" => "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css", "Swiper slider (v4.5.1)" => "//cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css", "Lightgallery (v1.7.2)" => "//cdn.jsdelivr.net/npm/lightgallery@1.7.2/dist/css/lightgallery.min.css"];
        // line 73
        echo "
\t";
        // line 74
        $context["cdn_font_old"] = ["Font Awesome (v4.7.0)" => "//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css", "Font Awesome (v5.0.6)" => "//use.fontawesome.com/releases/v5.0.6/css/all.css", "Font Awesome (v5.7.2)" => "//use.fontawesome.com/releases/v5.7.2/css/all.css", "Font Awesome (v5.11.2)" => "//use.fontawesome.com/releases/v5.11.2/css/all.css", "Font Awesome (v5.13.1)" => "//use.fontawesome.com/releases/v5.13.1/css/all.css"];
        // line 81
        echo "
\t<form method=\"post\" enctype=\"multipart/form-data\">
\t\t";
        // line 84
        echo "\t\t<input type=\"hidden\" name=\"manual_upload\" value=\"1\" />
\t\t<input type=\"file\" name=\"media[]\" id=\"upload_button\" />
\t\t<button type=\"submit\">";
        // line 86
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uploaden", [], "cms"), "html", null, true);
        echo "</button>
\t</form>

\t";
        // line 89
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
        echo "
\t";
        // line 90
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "

\t<script>
\tvar activeZone = null;
\t</script>

\t";
        // line 96
        $context["active"] = "basic";
        // line 97
        echo "\t";
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 97), "get", [0 => "active"], "method", false, false, false, 97)) {
            // line 98
            echo "\t\t";
            $context["active"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 98), "get", [0 => "active"], "method", false, false, false, 98);
            // line 99
            echo "\t";
        }
        // line 100
        echo "
\t\t<div class=\"system-row\">
\t\t\t<div class=\"system-sidebar d-none d-lg-flex\" data-simplebar>
\t\t\t\t<div class=\"system-sidebar-inner\">
\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t<div class=\"card-title\">
\t    \t\t\t\t\t<div class=\"card-titles\">";
        // line 107
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Menu", [], "cms"), "html", null, true);
        echo "</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<ul class=\"nav nav-tabs content-tabs\" role=\"tablist\">
\t\t\t\t\t\t  <li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t\t    <button onclick=\"topFunction()\" class=\"nav-link ";
        // line 113
        echo (((($context["active"] ?? null) == "basic")) ? ("active") : (""));
        echo "\" id=\"tab1\" aria-controls=\"content1\" data-bs-target=\"#content1\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-cog fa-fw\"></i> ";
        // line 114
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Algemeen", [], "cms"), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t  </li>
\t\t\t\t\t\t  <li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t\t    <button onclick=\"topFunction()\" class=\"nav-link ";
        // line 118
        echo (((($context["active"] ?? null) == "company")) ? ("active") : (""));
        echo "\" id=\"tab2\" aria-controls=\"content2\" data-bs-target=\"#content2\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t<i class=\"far fa-building fa-fw\"></i> ";
        // line 119
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bedrijf", [], "cms"), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t  </li>
\t\t\t\t\t\t\t";
        // line 122
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
            // line 123
            echo "\t\t\t\t\t\t  <li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t\t    <button onclick=\"topFunction()\" class=\"nav-link\" id=\"tab3\" aria-controls=\"content3\" data-bs-target=\"#content3\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-cog fa-fw\"></i> ";
            // line 125
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Systeem", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t  </li>
\t\t\t\t\t\t  <li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t\t    <button onclick=\"topFunction()\" class=\"nav-link\" id=\"tab4\" aria-controls=\"content4\" data-bs-target=\"#content4\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-shopping-cart fa-fw\"></i> ";
            // line 130
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Betaalmethodes", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t  </li>
\t\t\t\t\t\t\t";
        }
        // line 134
        echo "\t\t\t\t\t\t  <li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t\t    <button onclick=\"topFunction()\" class=\"nav-link\" id=\"tab5\" aria-controls=\"content5\" data-bs-target=\"#content5\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-chart-pie fa-fw\"></i> ";
        // line 136
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Analytics", [], "cms"), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t  </li>
\t\t\t\t\t\t  <li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t\t    <button onclick=\"topFunction()\" class=\"nav-link\" id=\"tab6\" aria-controls=\"content6\" data-bs-target=\"#content6\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-code fa-fw\"></i> ";
        // line 141
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Header", [], "cms"), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t  </li>
\t\t\t\t\t\t  <li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t\t    <button onclick=\"topFunction()\" class=\"nav-link\" id=\"tab7\" aria-controls=\"content7\" data-bs-target=\"#content7\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-code fa-fw\"></i> ";
        // line 146
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Footer", [], "cms"), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t  </li>
\t\t\t\t\t\t  <li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t\t    <button onclick=\"topFunction()\" class=\"nav-link\" id=\"tab8\" aria-controls=\"content8\" data-bs-target=\"#content8\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t<i class=\"far fa-image fa-fw\"></i> ";
        // line 151
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media", [], "cms"), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t  </li>
\t\t\t\t\t\t  <li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t\t    <button onclick=\"topFunction()\" class=\"nav-link\" id=\"tab9\" aria-controls=\"content9\" data-bs-target=\"#content9\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-user-check fa-fw\"></i> ";
        // line 156
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("reCAPTCHA", [], "cms"), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t  </li>
\t\t\t\t\t\t  ";
        // line 159
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
            // line 160
            echo "\t\t\t\t\t\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t\t\t\t<button onclick=\"topFunction()\" class=\"nav-link\" id=\"tabgpt\" aria-controls=\"contentgpt\" data-bs-target=\"#contentgpt\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t<i class=\"fas fa-microchip fa-fw\"></i> ";
            // line 162
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("EasifyGPT instellingen", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
        }
        // line 166
        echo "\t\t\t\t\t\t\t";
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
            // line 167
            echo "\t\t\t\t\t\t\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t\t\t\t\t<button onclick=\"topFunction()\" class=\"nav-link\" id=\"tab10\" aria-controls=\"content10\" data-bs-target=\"#content10\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-mobile-alt fa-fw\"></i> ";
            // line 169
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Mobiele applicaties", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
        }
        // line 173
        echo "\t\t\t\t\t\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t\t\t\t<button onclick=\"topFunction()\" class=\"nav-link\" id=\"tab11\" aria-controls=\"content11\" data-bs-target=\"#content11\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-exclamation-triangle fa-fw\"></i> ";
        // line 175
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Foutpagina's", [], "cms"), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
        // line 178
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
            // line 179
            echo "\t\t\t\t\t\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t\t\t\t<button onclick=\"topFunction()\" class=\"nav-link\" id=\"tab12\" aria-controls=\"content12\" data-bs-target=\"#content12\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-fill-drip fa-fw\"></i> ";
            // line 181
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Systeem kleuren", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
        }
        // line 185
        echo "\t\t\t\t\t\t\t";
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
            // line 186
            echo "\t\t\t\t\t\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t\t\t\t<button onclick=\"topFunction()\" class=\"nav-link\" id=\"tab13\" aria-controls=\"content13\" data-bs-target=\"#content13\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-location-arrow fa-fw\"></i> ";
            // line 188
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Postcode API", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
        }
        // line 192
        echo "\t\t\t\t\t\t\t";
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
            // line 193
            echo "\t\t\t\t\t\t\t<li class=\"nav-item\" role=\"presentation\" >
\t\t\t\t\t\t\t\t<button onclick=\"topFunction()\" class=\"nav-link\" id=\"tab14\" aria-controls=\"content14\" data-bs-target=\"#content14\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-location-arrow fa-fw\"></i> ";
            // line 195
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Lef API", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li class=\"nav-item\" role=\"presentation\" >
\t\t\t\t\t\t\t\t<button onclick=\"topFunction()\" class=\"nav-link\" id=\"tab16\" aria-controls=\"content16\" data-bs-target=\"#content16\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-location-arrow fa-fw\"></i> ";
            // line 200
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Santander API", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
        }
        // line 204
        echo "\t\t\t\t\t\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t\t\t\t<button onclick=\"topFunction()\" class=\"nav-link\" id=\"tab-ooo-config\" aria-controls=\"ooo-config\" data-bs-target=\"#ooo-config\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-plane-departure fa-fw\"></i> ";
        // line 206
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("'Out of office'-melding", [], "cms"), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
        // line 209
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN") == true)) {
            // line 210
            echo "\t\t\t\t\t\t\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t\t\t\t\t<button onclick=\"topFunction()\" class=\"nav-link\" id=\"tab15\" aria-controls=\"content15\" data-bs-target=\"#content15\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-arrow-circle-up fa-fw\"></i> ";
            // line 212
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("UptimeRobot API", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t\t\t\t\t\t\t<button onclick=\"topFunction()\" class=\"nav-link\" id=\"tab-hummessenger\" aria-controls=\"hummessenger\" data-bs-target=\"#hummessenger\" data-bs-toggle=\"tab\"  type=\"button\" role=\"tab\" aria-selected=\"false\">
\t\t\t\t\t\t\t\t\t\t<i class=\"fa fa-plane-departure fa-fw\"></i> ";
            // line 217
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Hummessenger API", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
        }
        // line 221
        echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>

\t\t\t<select class=\"form-select d-lg-none mb-3\" id=\"tab_selector\">
\t\t\t\t<option value=\"0\" selected>";
        // line 227
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Algemeen", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t<option value=\"1\">";
        // line 228
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bedrijf", [], "cms"), "html", null, true);
        echo "</option>

\t\t\t\t";
        // line 230
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
            // line 231
            echo "\t\t\t\t<option value=\"2\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Systeem", [], "cms"), "html", null, true);
            echo "</option>
\t\t\t\t<option value=\"3\">";
            // line 232
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Betaalmethodes", [], "cms"), "html", null, true);
            echo "</option>
\t\t\t\t";
        }
        // line 234
        echo "
\t\t\t\t<option value=\"4\">";
        // line 235
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Analytics", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t<option value=\"5\">";
        // line 236
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Header", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t<option value=\"6\">";
        // line 237
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Footer", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t<option value=\"7\">";
        // line 238
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Media", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t<option value=\"8\">";
        // line 239
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("reCAPTCHA", [], "cms"), "html", null, true);
        echo "</option>

\t\t\t\t";
        // line 241
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
            // line 242
            echo "\t\t\t\t<option value=\"9\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Mobile App ID's", [], "cms"), "html", null, true);
            echo "</option>
\t\t\t\t";
        }
        // line 244
        echo "
\t\t\t\t<option value=\"10\">";
        // line 245
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Foutpagina's", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t<option value=\"11\">";
        // line 246
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Systeem kleuren", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t<option value=\"12\">";
        // line 247
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Postcode API", [], "cms"), "html", null, true);
        echo "</option>
\t\t\t\t";
        // line 248
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
            // line 249
            echo "\t\t\t\t<option value=\"13\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Hummessenger API", [], "cms"), "html", null, true);
            echo "</option>
\t\t\t\t";
        }
        // line 251
        echo "\t\t\t</select>

\t\t\t<script>
\t\t\t\t\$(document).ready(function() {
\t\t\t\t\t\$('#tab_selector').on('change', function (e) {
\t\t\t\t\t\t\$('.content-tabs li button').eq(\$(this).val()).tab('show');
\t\t\t\t\t});
\t\t\t\t});
\t\t\t</script>

\t\t\t<div class=\"system-content\">
\t\t\t\t<div class=\"tab-content\">

\t\t\t\t  <div class=\"tab-pane ";
        // line 264
        echo (((($context["active"] ?? null) == "basic")) ? ("show active") : (""));
        echo "\" id=\"content1\" role=\"tabpanel\" aria-labelledby=\"tab1\">
\t\t\t\t\t\t<div id=\"basic\" class=\"t-content\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 270
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Algemeen", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t<p>";
        // line 271
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Algemene website gegevens en instellingen", [], "cms"), "html", null, true);
        echo "</p>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 277
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "label", [], "any", false, false, false, 277), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 280
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "tagline", [], "any", false, false, false, 280), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 283
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "default_template", [], "any", false, false, false, 283), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 289
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Domein en indexeren", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 292
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "host", [], "any", false, false, false, 292), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 295
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "robots", [], "any", false, false, false, 295), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-gray\" onclick=\"\$('#form_host').val('";
        // line 298
        echo twig_escape_filter($this->env, twig_replace_filter(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 298), "getHttpHost", [], "method", false, false, false, 298), ["www." => ""]), "html", null, true);
        echo "');\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Huidig domein", [], "cms"), "html", null, true);
        echo "</button>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 301
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "force_https", [], "any", false, false, false, 301), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 311
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Contactgegevens", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t<p>";
        // line 312
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Contactinformatie voor onder andere e-mails", [], "cms"), "html", null, true);
        echo "</p>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 318
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "systemEmail", [], "any", false, false, false, 318), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 321
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "systemEmailFrom", [], "any", false, false, false, 321), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 324
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "adminEmail", [], "any", false, false, false, 324), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 327
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "adminEmailFrom", [], "any", false, false, false, 327), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 337
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("afbeeldingen", [], "cms")), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t<p>";
        // line 338
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sleep afbeeldingen naar de aangegeven velden om deze in te stellen of klik op het veld om te uploaden", [], "cms"), "html", null, true);
        echo "</p>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"row g-2\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 settings-image\">
\t\t\t\t\t\t\t\t\t\t\t<b>";
        // line 344
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Logo", [], "cms"), "html", null, true);
        echo "</b>
\t\t\t\t\t\t\t\t\t\t\t<div style=\"position: relative;\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"delete_logo\" name=\"delete[logo]\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"link_logo\" name=\"link[logo]\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzones\" onclick=\"activeZone = \$(this);\" data-name=\"logo\" style=\"";
        // line 348
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasLogo", [], "any", false, false, false, 348)) {
            echo "background-image:url('";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getLogo", [], "any", false, false, false, 348), "html", null, true);
            echo "');";
        }
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-loader\"><span>";
        // line 349
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uploaden...", [], "cms"), "html", null, true);
        echo "</span></div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<button style=\"";
        // line 351
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasLogo", [], "any", false, false, false, 351)) {
        } else {
            echo "display:none;";
        }
        echo "\" type=\"button\" id=\"logo_del_btn\" onclick=\"deleteAsset('logo', this);\" class=\"btn btn-small red darken-1 del_btn\"><i class=\"far fa-trash-alt\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 settings-image\">
\t\t\t\t\t\t\t\t\t\t\t<b>";
        // line 357
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Logo (alternatief)", [], "cms"), "html", null, true);
        echo "</b>
\t\t\t\t\t\t\t\t\t\t\t<div style=\"position: relative;\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"delete_logo_alt\" name=\"delete[logo_alt]\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"link_logo_alt\" name=\"link[logo_alt]\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzones\" onclick=\"activeZone = \$(this);\" data-name=\"logo_alt\" style=\"";
        // line 361
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasLogoAlt", [], "any", false, false, false, 361)) {
            echo "background-image:url('";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getLogoAlt", [], "any", false, false, false, 361), "html", null, true);
            echo "');";
        }
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-loader\"><span>";
        // line 362
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uploaden...", [], "cms"), "html", null, true);
        echo "</span></div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<button style=\"";
        // line 364
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasLogoAlt", [], "any", false, false, false, 364)) {
        } else {
            echo "display:none;";
        }
        echo "\" type=\"button\" id=\"logo_alt_del_btn\" onclick=\"deleteAsset('logo_alt', this);\" class=\"btn btn-small red darken-1 del_btn\"><i class=\"far fa-trash-alt\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 settings-image\">
\t\t\t\t\t\t\t\t\t\t\t<b>";
        // line 370
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Achtergrond", [], "cms"), "html", null, true);
        echo "</b>
\t\t\t\t\t\t\t\t\t\t\t<div style=\"position: relative;\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"delete_background\" name=\"delete[background]\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"link_background\" name=\"link[background]\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzones\" onclick=\"activeZone = \$(this);\" data-name=\"background\" style=\"";
        // line 374
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasBackground", [], "any", false, false, false, 374)) {
            echo "background-image:url('";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getBackground", [], "any", false, false, false, 374), "html", null, true);
            echo "');";
        }
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-loader\"><span>";
        // line 375
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uploaden...", [], "cms"), "html", null, true);
        echo "</span></div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<button style=\"";
        // line 377
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasBackground", [], "any", false, false, false, 377)) {
        } else {
            echo "display:none;";
        }
        echo "\" type=\"button\" id=\"background_del_btn\" onclick=\"deleteAsset('background', this);\" class=\"btn btn-small red darken-1 del_btn\"><i class=\"far fa-trash-alt\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 settings-image\">
\t\t\t\t\t\t\t\t\t\t\t<b>";
        // line 383
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("E-mail header", [], "cms"), "html", null, true);
        echo "</b>
\t\t\t\t\t\t\t\t\t\t\t<div style=\"position: relative;\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"delete_mail_header\" name=\"delete[mail_header]\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"link_mail_header\" name=\"link[mail_header]\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzones\" onclick=\"activeZone = \$(this);\" data-name=\"mail_header\" style=\"";
        // line 387
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasMailHeader", [], "any", false, false, false, 387)) {
            echo "background-image:url('";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getMailHeader", [], "any", false, false, false, 387), "html", null, true);
            echo "');";
        }
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-loader\"><span>";
        // line 388
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uploaden...", [], "cms"), "html", null, true);
        echo "</span></div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<button style=\"";
        // line 390
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasMailHeader", [], "any", false, false, false, 390)) {
        } else {
            echo "display:none;";
        }
        echo "\" type=\"button\" id=\"mail_header_del_btn\" onclick=\"deleteAsset('mail_header', this);\" class=\"btn btn-small red darken-1 del_btn\"><i class=\"far fa-trash-alt\"></i></button>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t<div class=\"tab-pane\" id=\"content12\" role=\"tabpanel\" aria-labelledby=\"tab12\" style=\"";
        // line 399
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN") == false)) {
            echo "display:none;";
        }
        echo "\">
\t\t\t\t\t<div id=\"color_swap\" class=\"t-content\">
\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t<span class=\"card-title\"><h6>";
        // line 403
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Kleuren wisselen", [], "cms"), "html", null, true);
        echo "</h6></span>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t\t\t<table style=\"margin-bottom: 20px;\">
\t\t\t\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<th>Van</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t<th>Naar</th>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t\t\t\t<tbody id=\"color_swap_data\">
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 414
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "colorSwap", [], "any", false, false, false, 414));
        foreach ($context['_seq'] as $context["k"] => $context["v"]) {
            // line 415
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td><input type=\"text\" class=\"form-control\" name=\"color_swap_from[]\" placeholder=\"#000000\" value=\"";
            // line 416
            echo twig_escape_filter($this->env, $context["k"], "html", null, true);
            echo "\" /></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td><input type=\"text\" class=\"form-control\" name=\"color_swap_to[]\" placeholder=\"#000000\" value=\"";
            // line 417
            echo twig_escape_filter($this->env, $context["v"], "html", null, true);
            echo "\" /></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 420
        echo "\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td><input type=\"text\" class=\"form-control\" name=\"color_swap_from[]\" placeholder=\"#000000\" /></td>
\t\t\t\t\t\t\t\t\t\t\t\t\t<td><input type=\"text\" class=\"form-control\" name=\"color_swap_to[]\" placeholder=\"#000000\" /></td>
\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-gray\" onclick=\"addColorSwap()\">Rij toevoegen</button>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<script>
\t\t\t\tfunction addColorSwap(){
\t\t\t\t\tlet r = \$('<tr>\\
\t\t\t\t\t<td><input type=\"text\" class=\"form-control\" name=\"color_swap_from[]\" placeholder=\"#000000\" /></td>\\
\t\t\t\t\t<td><input type=\"text\" class=\"form-control\" name=\"color_swap_to[]\" placeholder=\"#000000\" /></td>\\
\t\t\t\t\t</tr>');
\t\t\t\t\t\$('#color_swap_data').append(r);
\t\t\t\t}

\t\t\t\tfunction deleteAsset(asset, el){
\t\t\t\t\tcpop.confirm('";
        // line 444
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Weet u zeker dat u deze afbeelding wilt verwijderen?", [], "cms"), "html", null, true);
        echo "', function(){
\t\t\t\t\t\t\$('#delete_' + asset).val(1);
\t\t\t\t\t\t\$(el).parent().find('.dropzones').css('background-image', '');
\t\t\t\t\t\t\$(el).remove();
\t\t\t\t\t\tcpop.close();
\t\t\t\t\t});
\t\t\t\t}
\t\t\t\t</script>
\t\t\t\t  <div class=\"tab-pane ";
        // line 452
        echo (((($context["active"] ?? null) == "company")) ? ("show active") : (""));
        echo "\" id=\"content2\" role=\"tabpanel\" aria-labelledby=\"tab2\">
\t\t\t\t\t\t<div id=\"company\" class=\"t-content\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 458
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Bedrijfsgegevens", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 463
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "company", [], "any", false, false, false, 463), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 466
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "phone", [], "any", false, false, false, 466), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 469
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "address", [], "any", false, false, false, 469), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 472
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "postalcode", [], "any", false, false, false, 472), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 475
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "place", [], "any", false, false, false, 475), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 478
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "state", [], "any", false, false, false, 478), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 481
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "country", [], "any", false, false, false, 481), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 484
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "kvk", [], "any", false, false, false, 484), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 487
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "kvk_location", [], "any", false, false, false, 487), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 490
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "iban", [], "any", false, false, false, 490), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 493
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "bic", [], "any", false, false, false, 493), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 496
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "taxNo", [], "any", false, false, false, 496), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 499
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "invoice_period", [], "any", false, false, false, 499), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 508
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Social Media", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-6\">";
        // line 512
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "twitter", [], "any", false, false, false, 512), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-6\">";
        // line 513
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "facebook", [], "any", false, false, false, 513), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-6\">";
        // line 514
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "youtube", [], "any", false, false, false, 514), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-6\">";
        // line 515
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "instagram", [], "any", false, false, false, 515), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 516
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "linkedin", [], "any", false, false, false, 516), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\$(function(){
\t\t\t\t\t\t\t\t\$('#form_cookiebar').click(function(){
\t\t\t\t\t\t\t\t\tif(this.checked){
\t\t\t\t\t\t\t\t\t\t\$('.cookiebar-data').show();
\t\t\t\t\t\t\t\t\t}else{
\t\t\t\t\t\t\t\t\t\t\$('.cookiebar-data').hide();
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t});

\t\t\t\t\t\t\t\t\$('#form_cookiebar_button').click(function(){
\t\t\t\t\t\t\t\t\tif(this.checked){
\t\t\t\t\t\t\t\t\t\t\$('#cookiebar-button-data').show();
\t\t\t\t\t\t\t\t\t}else{
\t\t\t\t\t\t\t\t\t\t\$('#cookiebar-button-data').hide();
\t\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t});

\t\t\t\t\t\t\t\t\$('button.page-select').click(function(e){
\t\t\t\t\t\t\t\t\te.preventDefault();
\t\t\t\t\t\t\t\t\tcpop.reset().loadAjax('";
        // line 541
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_selector", ["type" => "page"]);
        echo "' + '?key=' + \$(this).data('key') );
\t\t\t\t\t\t\t\t});
\t\t\t\t\t\t\t});

\t\t\t\t\t\t\tfunction pageSelectHandler(pageid, label, url, slugKey, simpleslug, key){
\t\t\t\t\t\t\t\t\$('#' + key).val(url);
\t\t\t\t\t\t\t\tcpop.close();
\t\t\t\t\t\t\t}
\t\t\t\t\t\t</script>
\t\t\t\t\t</div>
\t\t\t\t  <div class=\"tab-pane\" id=\"content9\" role=\"tabpanel\" aria-labelledby=\"tab9\">
\t\t\t\t\t\t<div id=\"recaptcha\" class=\"t-content\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 557
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Google reCAPTCHA", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"card-actions\">
\t\t\t\t\t\t\t\t\t\t\t<span>";
        // line 560
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasGoogleRecaptcha", [], "any", false, false, false, 560)) ? ((("<span class=\"green-text\">" . $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Ingeschakeld", [], "cms")) . "</span>")) : ((("<span class=\"red-text\">" . $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uitgeschakeld", [], "cms")) . "</span>")));
        echo "</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-4\">";
        // line 564
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "google_recaptcha_mode", [], "any", false, false, false, 564), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-6\">";
        // line 565
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "google_recaptcha_sitekey", [], "any", false, false, false, 565), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-6\">";
        // line 566
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "google_recaptcha_secret", [], "any", false, false, false, 566), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 569
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "google_recaptcha_text", [], "any", false, false, false, 569), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"row\" id=\"recaptcha_treshold\" style=\"margin-bottom: 30px;\">
\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t";
        // line 573
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "captcha_treshold", [], "any", false, false, false, 573), 'row');
        echo "
\t\t\t\t\t\t\t\t<label for=\"captcha_treshold\">";
        // line 574
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Treshold voor de score van reCAPTCHA, score moet gelijk/hoger zijn dan de ingestelde treshold.", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"center-align\">
\t\t\t\t\t\t\t\t\t\t<a class=\"btn btn-gray\" target=\"_blank\" href=\"https://www.google.com/recaptcha/admin\">";
        // line 578
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Klik hier om reCAPTCHA sleutels te beheren", [], "cms"), "html", null, true);
        echo "</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t  <div class=\"tab-pane\" id=\"content10\" role=\"tabpanel\" aria-labelledby=\"tab10\">
\t\t\t\t\t\t<div id=\"mobile\" class=\"t-content\" style=\"";
        // line 585
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN") == false)) {
            echo "display:none;";
        }
        echo "\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 589
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Mobiele applicaties", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 592
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "app_label", [], "any", false, false, false, 592), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-6\">";
        // line 593
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "ios_app_id", [], "any", false, false, false, 593), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-6\">";
        // line 594
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "android_app_id", [], "any", false, false, false, 594), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<span class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 598
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("App icon", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 m12 settings-image\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"delete_app_icon\" name=\"delete[app_icon]\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"link_app_icon\" name=\"link[app_icon]\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzones\" onclick=\"activeZone = \$(this);\" data-name=\"app_icon\" style=\"";
        // line 604
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasAppIcon", [], "any", false, false, false, 604)) {
            echo "background-image:url('";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getAppIcon", [], "any", false, false, false, 604), "html", null, true);
            echo "');";
        }
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-loader\"><span>";
        // line 605
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uploaden...", [], "cms"), "html", null, true);
        echo "</span></div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<button style=\"";
        // line 607
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasAppIcon", [], "any", false, false, false, 607)) {
        } else {
            echo "display:none;";
        }
        echo "\" type=\"button\" id=\"app_icon_del_btn\" onclick=\"deleteAsset('app_icon', this);\" class=\"btn btn-icon red darken-1 del_btn\"><i class=\"far fa-trash-alt\"></i></button>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t  <div class=\"tab-pane\" id=\"content3\" role=\"tabpanel\" aria-labelledby=\"tab3\">
\t\t\t\t\t\t<div id=\"system\" class=\"t-content\" style=\"";
        // line 615
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN") == false)) {
            echo "display:none;";
        }
        echo "\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 619
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Registratie opties", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\">";
        // line 622
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "allow_registration", [], "any", false, false, false, 622), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\">";
        // line 623
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "moderate_registration", [], "any", false, false, false, 623), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\">";
        // line 624
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "birthday_fields", [], "any", false, false, false, 624), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 631
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Systeemopties", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t\t<div class=\"row mb-3\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\" style=\"";
        // line 635
        if ((!twig_in_filter("WebshopBundle", ($context["installed"] ?? null)) || ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN") == false))) {
            echo "display:none;";
        }
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 636
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "is_catalog", [], "any", false, false, false, 636), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 640
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "maintenance", [], "any", false, false, false, 640), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t<div style=\"display:none;\">
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 645
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "inlineEdit", [], "any", false, false, false, 645), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t";
        // line 648
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "custom_navigation", [], "any", false, false, false, 648), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 651
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "cache_cdn", [], "any", false, false, false, 651), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 654
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "snow", [], "any", false, false, false, 654), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 657
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "calendar", [], "any", false, false, false, 657), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 660
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "ignore_cms_blocks", [], "any", false, false, false, 660), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 666
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "base_uri", [], "any", false, false, false, 666), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 669
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "override_key", [], "any", false, false, false, 669), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 674
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "maintenance_message", [], "any", false, false, false, 674), 'row', ["attr" => ["class" => "page-header inline-ckeditor"]]);
        echo "
\t\t\t\t\t\t\t\t\t\t</div>


\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 settings-image\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 679
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Achtergrond", [], "cms"), "html", null, true);
        echo "
\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"delete_service_background\" name=\"delete[service_background]\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" id=\"link_service_background\" name=\"link[service_background]\" value=\"\" />
\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzones\" onclick=\"activeZone = \$(this);\" data-name=\"service_background\" style=\"";
        // line 682
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasServiceBackground", [], "any", false, false, false, 682)) {
            echo "background-image:url('";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getServiceBackground", [], "any", false, false, false, 682), "html", null, true);
            echo "');";
        }
        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropzone-loader\"><span>";
        // line 683
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Uploaden...", [], "cms"), "html", null, true);
        echo "</span></div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<button style=\"";
        // line 685
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "hasServiceBackground", [], "any", false, false, false, 685)) {
        } else {
            echo "display:none;";
        }
        echo "\" type=\"button\" id=\"service_background_del_btn\" onclick=\"deleteAsset('service_background', this);\" class=\"btn btn-icon red darken-1 del_btn\"><i class=\"far fa-trash-alt\"></i></button>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 695
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Plug-ins", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"card-actions\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"btn btn-gray\" onclick=\"\$('.legacy-assets').toggle();return false;\">";
        // line 698
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Legacy tonen/verbergen", [], "cms"), "html", null, true);
        echo "</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 703
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Scripts", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"field-collection\" id=\"form_layout_include_js\">
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 705
        $context["n"] = 0;
        // line 706
        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cdn_js"] ?? null));
        foreach ($context['_seq'] as $context["k"] => $context["v"]) {
            // line 707
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" ";
            // line 708
            echo ((twig_in_filter($context["v"], twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "layoutIncludeJs", [], "any", false, false, false, 708))) ? ("checked") : (""));
            echo " value=\"";
            echo twig_escape_filter($this->env, $context["v"], "html", null, true);
            echo "\" name=\"extension[layout_include_js][]\" id=\"form_layout_include_js_";
            echo twig_escape_filter($this->env, ($context["n"] ?? null), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"form_layout_include_js_";
            // line 709
            echo twig_escape_filter($this->env, ($context["n"] ?? null), "html", null, true);
            echo "\">JS: ";
            echo twig_escape_filter($this->env, $context["k"], "html", null, true);
            echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 711
            $context["n"] = (($context["n"] ?? null) + 1);
            // line 712
            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 713
        echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 716
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Styles", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"field-collection\" id=\"form_layout_include_css\">
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 718
        $context["n"] = 0;
        // line 719
        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cdn_css"] ?? null));
        foreach ($context['_seq'] as $context["k"] => $context["v"]) {
            // line 720
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" ";
            // line 721
            echo ((twig_in_filter($context["v"], twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "layoutIncludeCss", [], "any", false, false, false, 721))) ? ("checked") : (""));
            echo " value=\"";
            echo twig_escape_filter($this->env, $context["v"], "html", null, true);
            echo "\" name=\"extension[layout_include_css][]\" id=\"form_layout_include_css_";
            echo twig_escape_filter($this->env, ($context["n"] ?? null), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"form_layout_include_css_";
            // line 722
            echo twig_escape_filter($this->env, ($context["n"] ?? null), "html", null, true);
            echo "\">CSS: ";
            echo twig_escape_filter($this->env, $context["k"], "html", null, true);
            echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 724
            $context["n"] = (($context["n"] ?? null) + 1);
            // line 725
            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 726
        echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 729
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Fonts", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"field-collection\" id=\"form_layout_include_font\">
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 731
        $context["n"] = 0;
        // line 732
        echo "\t\t\t\t\t\t\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cdn_font"] ?? null));
        foreach ($context['_seq'] as $context["k"] => $context["v"]) {
            // line 733
            echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" ";
            // line 734
            echo ((twig_in_filter($context["v"], twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "layoutIncludeFont", [], "any", false, false, false, 734))) ? ("checked") : (""));
            echo " value=\"";
            echo twig_escape_filter($this->env, $context["v"], "html", null, true);
            echo "\" name=\"extension[layout_include_font][]\" id=\"form_layout_include_font_";
            echo twig_escape_filter($this->env, ($context["n"] ?? null), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"form_layout_include_font_";
            // line 735
            echo twig_escape_filter($this->env, ($context["n"] ?? null), "html", null, true);
            echo "\">FONT: ";
            echo twig_escape_filter($this->env, $context["k"], "html", null, true);
            echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 737
            $context["n"] = (($context["n"] ?? null) + 1);
            // line 738
            echo "\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 739
        echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row legacy-assets\" style=\"margin: 15px 0 0 0;display:none;\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t<h4 style=\"margin-top: 0;\">";
        // line 744
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Legacy", [], "cms"), "html", null, true);
        echo "</h4>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"field-collection\" style=\"margin:0;\">
\t\t\t\t\t\t\t\t\t\t\t\t<div style=\"background:#f5f5f5;padding:10px 15px;border-radius:5px;margin-top:10px;margin-left:-15px;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 747
        $context["n"] = 0;
        // line 748
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cdn_js_old"] ?? null));
        foreach ($context['_seq'] as $context["k"] => $context["v"]) {
            // line 749
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" ";
            // line 750
            echo ((twig_in_filter($context["v"], twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "layoutIncludeJs", [], "any", false, false, false, 750))) ? ("checked") : (""));
            echo " value=\"";
            echo twig_escape_filter($this->env, $context["v"], "html", null, true);
            echo "\" name=\"extension[layout_include_js][]\" id=\"form_layout_include_js_old_";
            echo twig_escape_filter($this->env, ($context["n"] ?? null), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"form_layout_include_js_old_";
            // line 751
            echo twig_escape_filter($this->env, ($context["n"] ?? null), "html", null, true);
            echo "\">JS: ";
            echo twig_escape_filter($this->env, $context["k"], "html", null, true);
            echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 753
            $context["n"] = (($context["n"] ?? null) + 1);
            // line 754
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 755
        echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t<h4 style=\"margin-top: 0;\">&nbsp;</h4>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"field-collection\" style=\"margin:0;\">
\t\t\t\t\t\t\t\t\t\t\t\t<div style=\"background:#f5f5f5;padding:10px 15px;border-radius:5px;margin-top:10px;margin-left:-15px;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 762
        $context["n"] = 0;
        // line 763
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cdn_css_old"] ?? null));
        foreach ($context['_seq'] as $context["k"] => $context["v"]) {
            // line 764
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" ";
            // line 765
            echo ((twig_in_filter($context["v"], twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "layoutIncludeCss", [], "any", false, false, false, 765))) ? ("checked") : (""));
            echo " value=\"";
            echo twig_escape_filter($this->env, $context["v"], "html", null, true);
            echo "\" name=\"extension[layout_include_css][]\" id=\"form_layout_include_css_old_";
            echo twig_escape_filter($this->env, ($context["n"] ?? null), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"form_layout_include_css_old_";
            // line 766
            echo twig_escape_filter($this->env, ($context["n"] ?? null), "html", null, true);
            echo "\">CSS: ";
            echo twig_escape_filter($this->env, $context["k"], "html", null, true);
            echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 768
            $context["n"] = (($context["n"] ?? null) + 1);
            // line 769
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 770
        echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\">
\t\t\t\t\t\t\t\t\t\t\t<h4 style=\"margin-top: 0;\">&nbsp;</h4>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"field-collection\" style=\"margin:0;\">
\t\t\t\t\t\t\t\t\t\t\t\t<div style=\"background:#f5f5f5;padding:10px 15px;border-radius:5px;margin-top:10px;margin-left:-15px;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 777
        $context["n"] = 0;
        // line 778
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cdn_font_old"] ?? null));
        foreach ($context['_seq'] as $context["k"] => $context["v"]) {
            // line 779
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" ";
            // line 780
            echo ((twig_in_filter($context["v"], twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "layoutIncludeFont", [], "any", false, false, false, 780))) ? ("checked") : (""));
            echo " value=\"";
            echo twig_escape_filter($this->env, $context["v"], "html", null, true);
            echo "\" name=\"extension[layout_include_font][]\" id=\"form_layout_include_font_old_";
            echo twig_escape_filter($this->env, ($context["n"] ?? null), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<label for=\"form_layout_include_font_old_";
            // line 781
            echo twig_escape_filter($this->env, ($context["n"] ?? null), "html", null, true);
            echo "\">FONT: ";
            echo twig_escape_filter($this->env, $context["k"], "html", null, true);
            echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 783
            $context["n"] = (($context["n"] ?? null) + 1);
            // line 784
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['k'], $context['v'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 785
        echo "\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\" style=\"margin: 15px 0 0 0;\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\" >
\t\t\t\t\t\t\t\t\t\t\t";
        // line 791
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "author", [], "any", false, false, false, 791), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\" >
\t\t\t\t\t\t\t\t\t\t\t";
        // line 794
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "og_site_name", [], "any", false, false, false, 794), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\" >
\t\t\t\t\t\t\t\t\t\t\t";
        // line 797
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "favicon_location", [], "any", false, false, false, 797), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\" >
\t\t\t\t\t\t\t\t\t\t\t";
        // line 800
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "apple_touch_icon", [], "any", false, false, false, 800), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\">";
        // line 808
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Toegang beperken", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-6\">";
        // line 810
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "restrict_access", [], "any", false, false, false, 810), 'row', ["attr" => ["class" => ""]]);
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-6\">";
        // line 811
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "restrict_access_deny", [], "any", false, false, false, 811), 'row', ["attr" => ["class" => ""]]);
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 814
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "restrict_access_type", [], "any", false, false, false, 814), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t  <div class=\"tab-pane\" id=\"content4\" role=\"tabpanel\" aria-labelledby=\"tab4\">
\t\t\t\t\t\t<div id=\"ideal\" class=\"t-content\" style=\"";
        // line 821
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN") == false)) {
            echo "display:none;";
        }
        echo "\">
\t\t\t\t\t\t\t<div class=\"card ";
        // line 822
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "payEnabled", [], "any", false, false, false, 822)) ? ("") : ("inactive"));
        echo "\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<span class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 826
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pay.nl (sponsored)", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t<span class=\"card-actions\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"switch\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"form-check\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-check-input\" ";
        // line 831
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "payEnabled", [], "any", false, false, false, 831)) ? ("checked=\"checked\"") : (""));
        echo " class=\"spo\" onclick=\"switchPaymentOption(this)\" name=\"pay_enabled\" id=\"pay_enabled\" type=\"checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"form-check-label\" for=\"pay_enabled\">";
        // line 832
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Ingeschakeld", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t<div class=\"row ";
        // line 837
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "payEnabled", [], "any", false, false, false, 837)) ? ("") : ("hidden"));
        echo "\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 838
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "pay_live", [], "any", false, false, false, 838), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 839
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "pay_service_id", [], "any", false, false, false, 839), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 840
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "pay_api_test", [], "any", false, false, false, 840), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 841
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "pay_api_live", [], "any", false, false, false, 841), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t<a target=\"_blank\" href=\"";
        // line 845
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_settings_pay", ["method" => "pay"]);
        echo "\" class=\"btn btn-gray\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Test betaling", [], "cms"), "html", null, true);
        echo "</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"card ";
        // line 850
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "mollieEnabled", [], "any", false, false, false, 850)) ? ("") : ("inactive"));
        echo "\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 854
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Mollie", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"card-actions\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"switch form-check\">
\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-check-input\" ";
        // line 858
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "mollieEnabled", [], "any", false, false, false, 858)) ? ("checked=\"checked\"") : (""));
        echo " class=\"spo\" onclick=\"switchPaymentOption(this)\" name=\"mollie_enabled\" id=\"mollie_enabled\" type=\"checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"form-check-label\" for=\"mollie_enabled\">";
        // line 859
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Ingeschakeld", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row ";
        // line 863
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "mollieEnabled", [], "any", false, false, false, 863)) ? ("") : ("hidden"));
        echo "\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 864
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "mollie_live", [], "any", false, false, false, 864), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 865
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "mollie_api_test", [], "any", false, false, false, 865), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 866
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "mollie_api_live", [], "any", false, false, false, 866), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 867
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "mollie_subscription", [], "any", false, false, false, 867), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\" style=\"padding-top: 10px;\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t<a target=\"_blank\" href=\"";
        // line 871
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_settings_pay", ["method" => "mollie"]);
        echo "\" class=\"btn btn-gray\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Test betaling", [], "cms"), "html", null, true);
        echo "</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"card ";
        // line 876
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "buckarooEnabled", [], "any", false, false, false, 876)) ? ("") : ("inactive"));
        echo "\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<span class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 880
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Buckaroo", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t<span class=\"card-actions\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"switch form-check\">
\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-check-input\" ";
        // line 884
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "buckarooEnabled", [], "any", false, false, false, 884)) ? ("checked=\"checked\"") : (""));
        echo " class=\"spo\" onclick=\"switchPaymentOption(this)\" name=\"buckaroo_enabled\" id=\"buckaroo_enabled\" type=\"checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"form-check-label\" for=\"buckaroo_enabled\">";
        // line 885
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Ingeschakeld", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t<div class=\"row ";
        // line 889
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "buckarooEnabled", [], "any", false, false, false, 889)) ? ("") : ("hidden"));
        echo "\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 890
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "buckaroo_live", [], "any", false, false, false, 890), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 891
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "buckaroo_website_key", [], "any", false, false, false, 891), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 892
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "buckaroo_secret", [], "any", false, false, false, 892), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t<a target=\"_blank\" href=\"";
        // line 896
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_settings_pay", ["method" => "buckaroo"]);
        echo "\" class=\"btn btn-gray\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Test betaling", [], "cms"), "html", null, true);
        echo "</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"card ";
        // line 901
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "omnikassaEnabled", [], "any", false, false, false, 901)) ? ("") : ("inactive"));
        echo "\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<span class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 905
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("OmniKassa", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t<div class=\"switch form-check\">
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-check-input\" ";
        // line 908
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "omnikassaEnabled", [], "any", false, false, false, 908)) ? ("checked=\"checked\"") : (""));
        echo " class=\"spo\" onclick=\"switchPaymentOption(this)\" name=\"omnikassa_enabled\" id=\"omnikassa_enabled\" type=\"checkbox\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"form-check-label\" for=\"omnikassa_enabled\">";
        // line 909
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Ingeschakeld", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t<div class=\"row ";
        // line 912
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "omnikassaEnabled", [], "any", false, false, false, 912)) ? ("") : ("hidden"));
        echo "\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 913
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "omnikassa_live", [], "any", false, false, false, 913), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 914
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "omnikassa_sign", [], "any", false, false, false, 914), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 915
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "omnikassa_refresh", [], "any", false, false, false, 915), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 916
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "omnikassa_sign_test", [], "any", false, false, false, 916), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 917
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "omnikassa_refresh_test", [], "any", false, false, false, 917), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t<a target=\"_blank\" href=\"";
        // line 921
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_settings_pay", ["method" => "omnikassa"]);
        echo "\" class=\"btn btn-gray\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Test betaling", [], "cms"), "html", null, true);
        echo "</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"card ";
        // line 926
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "multisafepayEnabled", [], "any", false, false, false, 926)) ? ("") : ("inactive"));
        echo "\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<span class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 930
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("MultiSafePay", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t<span class=\"card-actions\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"switch form-check\">
\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-check-input\" ";
        // line 934
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "multisafepayEnabled", [], "any", false, false, false, 934)) ? ("checked=\"checked\"") : (""));
        echo " class=\"spo\" onclick=\"switchPaymentOption(this)\" name=\"multisafepay_enabled\" id=\"multisafepay_enabled\" type=\"checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"form-check-label\" for=\"multisafepay_enabled\">";
        // line 935
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Ingeschakeld", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t<div class=\"row ";
        // line 939
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "multisafepayEnabled", [], "any", false, false, false, 939)) ? ("") : ("hidden"));
        echo "\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 940
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "multisafepay_live", [], "any", false, false, false, 940), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 941
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "multisafepay_api", [], "any", false, false, false, 941), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 942
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "multisafepay_api_test", [], "any", false, false, false, 942), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t<a target=\"_blank\" href=\"";
        // line 946
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_settings_pay", ["method" => "multisafepay"]);
        echo "\" class=\"btn btn-gray\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Test betaling", [], "cms"), "html", null, true);
        echo "</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"card ";
        // line 951
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowEnabled", [], "any", false, false, false, 951)) ? ("") : ("inactive"));
        echo "\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<span class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 955
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sisow", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t<span class=\"card-actions\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"switch form-check\">
\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-check-input\" ";
        // line 959
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowEnabled", [], "any", false, false, false, 959)) ? ("checked=\"checked\"") : (""));
        echo " class=\"spo\" onclick=\"switchPaymentOption(this)\" name=\"sisow_enabled\" id=\"sisow_enabled\" type=\"checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"form-check-label\" for=\"sisow_enabled\">";
        // line 960
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Ingeschakeld", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t<div class=\"row ";
        // line 964
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowEnabled", [], "any", false, false, false, 964)) ? ("") : ("hidden"));
        echo "\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 965
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sisow_live", [], "any", false, false, false, 965), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 966
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sisow_merchant_id", [], "any", false, false, false, 966), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 967
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sisow_merchant_key", [], "any", false, false, false, 967), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 968
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "sisow_shop_id", [], "any", false, false, false, 968), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t<strong>";
        // line 970
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Beschikbare methodes", [], "cms"), "html", null, true);
        echo "</strong>

\t\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 973
        if (twig_in_filter("ideal", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 973))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[ideal]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>iDEAL</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 974
        if (twig_in_filter("idealqr", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 974))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[idealqr]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>iDEAL QR</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 975
        if (twig_in_filter("overboeking", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 975))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[overboeking]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>Overboeking vooraf</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 976
        if (twig_in_filter("ebill", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 976))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[ebill]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>Ebill</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 977
        if (twig_in_filter("bunq", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 977))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[bunq]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>bunq</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 978
        if (twig_in_filter("creditcard", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 978))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[creditcard]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>Creditcard</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 979
        if (twig_in_filter("maestro", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 979))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[maestro]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>Maestro</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 980
        if (twig_in_filter("vpay", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 980))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[vpay]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>V PAY</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 981
        if (twig_in_filter("sofort", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 981))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[sofort]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>SOFORT Banking</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 982
        if (twig_in_filter("giropay", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 982))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[giropay]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>Giropay</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 983
        if (twig_in_filter("eps", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 983))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[eps]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>EPS</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 984
        if (twig_in_filter("mistercash", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 984))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[mistercash]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>Bancontact</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 985
        if (twig_in_filter("belfius", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 985))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[belfius]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>Belfius Pay Button</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 986
        if (twig_in_filter("homepay", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 986))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[homepay]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>ING Home’Pay</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 987
        if (twig_in_filter("kbc", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 987))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[kbc]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>KBC</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 988
        if (twig_in_filter("cbc", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 988))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[cbc]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>CBC</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 989
        if (twig_in_filter("paypalec", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 989))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[paypalec]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>PayPal</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 990
        if (twig_in_filter("afterpay", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 990))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[afterpay]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>Afterpay</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 991
        if (twig_in_filter("billink", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 991))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[billink]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>Billink achteraf betalen</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 992
        if (twig_in_filter("capayable", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 992))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[capayable]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>Capayable gespreid betalen</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 993
        if (twig_in_filter("focum", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 993))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[focum]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>Focum AchterafBetalen</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 994
        if (twig_in_filter("klarna", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 994))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[klarna]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>Klarna Factuur</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 995
        if (twig_in_filter("vvv", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 995))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[vvv]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>VVV Giftcard</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l4\"><div class=\"switch\"><label><input class=\"spo\" ";
        // line 996
        if (twig_in_filter("webshop", twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "sisowOptions", [], "any", false, false, false, 996))) {
            echo "checked=\"checked\"";
        }
        echo " name=\"sisow_options[webshop]\" id=\"options_xx\" type=\"checkbox\"> <span class=\"lever\"></span>Webshop Giftcard</label></div></div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\" style=\"padding-top: 10px;\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t<a target=\"_blank\" href=\"";
        // line 1002
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_settings_pay", ["method" => "sisow"]);
        echo "\" class=\"btn btn-gray\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Test betaling", [], "cms"), "html", null, true);
        echo "</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"card ";
        // line 1007
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "payproEnabled", [], "any", false, false, false, 1007)) ? ("") : ("inactive"));
        echo "\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<span class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 1011
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("PayPro", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t<span class=\"card-actions\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"switch form-check\">
\t\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-check-input\" ";
        // line 1015
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "payproEnabled", [], "any", false, false, false, 1015)) ? ("checked=\"checked\"") : (""));
        echo " class=\"spo\" onclick=\"switchPaymentOption(this)\" name=\"paypro_enabled\" id=\"paypro_enabled\" type=\"checkbox\">
\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"form-check-check\" for=\"paypro_enabled\">";
        // line 1016
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Ingeschakeld", [], "cms"), "html", null, true);
        echo "</label>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t<div class=\"row ";
        // line 1020
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "payproEnabled", [], "any", false, false, false, 1020)) ? ("") : ("hidden"));
        echo "\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 1021
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "paypro_live", [], "any", false, false, false, 1021), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 1022
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "paypro_key", [], "any", false, false, false, 1022), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 1023
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "paypro_subscription", [], "any", false, false, false, 1023), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\" style=\"padding-top: 10px;\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t<a target=\"_blank\" href=\"";
        // line 1027
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_settings_pay", ["method" => "paypro"]);
        echo "\" class=\"btn btn-gray\">";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Test betaling", [], "cms"), "html", null, true);
        echo "</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t  <div class=\"tab-pane\" id=\"content5\" role=\"tabpanel\" aria-labelledby=\"tab5\">
\t\t\t\t\t\t<div id=\"analytics\" class=\"t-content\" style=\"\">
\t\t\t\t\t\t\t<div style=\"display:none;\" class=\"card\" style=\"";
        // line 1036
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN") == false)) {
            echo "display:none;";
        }
        echo "\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 1039
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Piwik/Matomo Analytics", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">";
        // line 1042
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "piwik_url", [], "any", false, false, false, 1042), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-4\">";
        // line 1043
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "piwik_api_hash", [], "any", false, false, false, 1043), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 m2\">";
        // line 1044
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "piwik_site_id", [], "any", false, false, false, 1044), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 1045
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "piwik_container_hashs", [], "any", false, false, false, 1045), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 1052
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Google Analytics", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l3\">";
        // line 1055
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "google_g", [], "any", false, false, false, 1055), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l3\">";
        // line 1056
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "google_ua", [], "any", false, false, false, 1056), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l3\">";
        // line 1057
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "google_cc", [], "any", false, false, false, 1057), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6 l3\">";
        // line 1058
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "google_gtm", [], "any", false, false, false, 1058), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 1065
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Meta Analytics", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">";
        // line 1068
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "face_domain_key", [], "any", false, false, false, 1068), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-6\">";
        // line 1069
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "facebook_pixel", [], "any", false, false, false, 1069), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-md-12\">";
        // line 1070
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "meta_api_token", [], "any", false, false, false, 1070), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 1077
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Cookiebar configuratie", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 1080
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "cookiebar", [], "any", false, false, false, 1080), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"row cookiebar-data\" style=\"display: ";
        // line 1083
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "cookiebar", [], "any", false, false, false, 1083)) ? ("block") : ("none"));
        echo ";\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 1084
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "cookiebar_button", [], "any", false, false, false, 1084), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"cookiebar-data\" style=\"display: ";
        // line 1089
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "cookiebar", [], "any", false, false, false, 1089)) ? ("block") : ("none"));
        echo ";\">
\t\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 1093
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Pagina's toewijzen", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t<div class=\"row cookiepages\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"d-flex align-items-end\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"field\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 1100
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "avg_cookie", [], "any", false, false, false, 1100), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-gray page-select\" data-key=\"form_avg_cookie\"><i class=\"fa fa-search\"></i>";
        // line 1102
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Selecteer pagina", [], "cms"), "html", null, true);
        echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"d-flex align-items-end\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"field\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 1108
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "avg_disclaimer", [], "any", false, false, false, 1108), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-gray page-select\" data-key=\"form_avg_disclaimer\"><i class=\"fa fa-search\"></i>";
        // line 1110
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Selecteer pagina", [], "cms"), "html", null, true);
        echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"d-flex align-items-end\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"field\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 1116
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "avg_privacy", [], "any", false, false, false, 1116), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-gray page-select\" data-key=\"form_avg_privacy\"><i class=\"fa fa-search\"></i>";
        // line 1118
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Selecteer pagina", [], "cms"), "html", null, true);
        echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t";
        // line 1137
        echo "\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"card\" id=\"cookiebar-button-data\" style=\"display: ";
        // line 1141
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "cookiebarButton", [], "any", false, false, false, 1141)) ? ("block") : ("none"));
        echo ";\">
\t\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t\t<div class=\"card-title\">";
        // line 1143
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Reset-knop configuratie", [], "cms"), "html", null, true);
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-6\">";
        // line 1145
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "cookiebar_button_position", [], "any", false, false, false, 1145), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col-6\">";
        // line 1146
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "cookiebar_button_offset", [], "any", false, false, false, 1146), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<script type=\"text/javascript\">
\t\t\t\t\t\tfunction switchPaymentOption(chk){

\t\t\t\t\t\t\t\$('.spo:not(#' + chk.id + ')').prop('checked', false).closest('.card').addClass('inactive').find('.row').addClass('hidden');

\t\t\t\t\t\t\tif(chk.checked){
\t\t\t\t\t\t\t\t\$(chk).closest('.card').removeClass('inactive').find('.row').removeClass('hidden');
\t\t\t\t\t\t\t}else{
\t\t\t\t\t\t\t\t\$(chk).closest('.card').addClass('inactive').find('.row').addClass('hidden');
\t\t\t\t\t\t\t}
\t\t\t\t\t\t}
\t\t\t\t\t\t</script>
\t\t\t\t\t</div>
\t\t\t\t  <div class=\"tab-pane\" id=\"content6\" role=\"tabpanel\" aria-labelledby=\"tab6\">
\t\t\t\t\t\t<div id=\"header\" class=\"t-content\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<span class=\"card-titles\">
\t\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 1171
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Header", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t<div class=\"card-actions\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1174
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "header_bar", [], "any", false, false, false, 1174), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</span>

\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 1179
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "header_bar_left", [], "any", false, false, false, 1179), 'row', ["attr" => ["class" => "page-header materialize-textarea inline-ckeditor"]]);
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 1180
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "header_bar_right", [], "any", false, false, false, 1180), 'row', ["attr" => ["class" => "page-header materialize-textarea inline-ckeditor"]]);
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t  <div class=\"tab-pane\" id=\"content7\" role=\"tabpanel\" aria-labelledby=\"tab7\">
\t\t\t\t\t\t<div id=\"footer\" class=\"t-content\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 1191
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Footer", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
        // line 1193
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "footer_block_1", [], "any", false, false, false, 1193), 'row', ["attr" => ["class" => "page-footer materialize-textarea inline-ckeditor"]]);
        echo "
\t\t\t\t\t\t\t\t\t";
        // line 1194
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "footer_block_2", [], "any", false, false, false, 1194), 'row', ["attr" => ["class" => "page-footer materialize-textarea inline-ckeditor"]]);
        echo "
\t\t\t\t\t\t\t\t\t";
        // line 1195
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "footer_block_3", [], "any", false, false, false, 1195), 'row', ["attr" => ["class" => "page-footer materialize-textarea inline-ckeditor"]]);
        echo "
\t\t\t\t\t\t\t\t\t";
        // line 1196
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "footer_block_4", [], "any", false, false, false, 1196), 'row', ["attr" => ["class" => "page-footer materialize-textarea inline-ckeditor"]]);
        echo "
\t\t\t\t\t\t\t\t\t";
        // line 1197
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "footer_block_5", [], "any", false, false, false, 1197), 'row', ["attr" => ["class" => "page-footer materialize-textarea inline-ckeditor"]]);
        echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t  <div class=\"tab-pane\" id=\"content11\" role=\"tabpanel\" aria-labelledby=\"tab11\">
\t\t\t\t\t\t<div id=\"errors\" class=\"t-content\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 1207
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Foutpagina's", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 1210
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "errorNotFound", [], "any", false, false, false, 1210), 'row', ["attr" => ["class" => "materialize-textarea inline-ckeditor"]]);
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 1211
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "errorNoAccess", [], "any", false, false, false, 1211), 'row', ["attr" => ["class" => "materialize-textarea inline-ckeditor"]]);
        echo "</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">";
        // line 1212
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "errorSystem", [], "any", false, false, false, 1212), 'row', ["attr" => ["class" => "materialize-textarea inline-ckeditor"]]);
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"tab-pane\" id=\"ooo-config\" role=\"tabpanel\" aria-labelledby=\"tab-ooo-config\">
\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t<h6>";
        // line 1223
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("'Out of office'-melding", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t<div class=\"card-actions\">
\t\t\t\t\t\t\t\t\t\t<div style=\"float:right;\">";
        // line 1225
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "outOfOfficeEnabled", [], "any", false, false, false, 1225), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div id=\"ooo-details\" style=\"display:";
        // line 1228
        echo ((twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "outOfOfficeEnabled", [], "any", false, false, false, 1228)) ? ("block") : ("none"));
        echo ";\">
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1231
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "outOfOfficeStart", [], "any", false, false, false, 1231), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1234
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "outOfOfficeEnd", [], "any", false, false, false, 1234), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1238
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "outOfOfficeMessage", [], "any", false, false, false, 1238), 'row', ["attr" => ["class" => "ooo-msg inline-ckeditor"]]);
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>



\t\t\t\t\t<div class=\"tab-pane\" id=\"content13\" role=\"tabpanel\" aria-labelledby=\"tab13\" style=\"";
        // line 1247
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN") == false)) {
            echo "display:none;";
        }
        echo "\">
\t\t\t\t\t\t<div id=\"zipcodechecker\" class=\"t-content\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\"><h6>";
        // line 1251
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("API Postcode", [], "cms"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("(Gratis, 1000 verzoeken per dag)", [], "cms"), "html", null, true);
        echo "</h6></span>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t\t\t\t<div>Maak een gratis token aan op: <a href=\"https://www.api-postcode.nl\" target=\"_blank\">api-postcode.nl</a></div>
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1255
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "api_postcode_token", [], "any", false, false, false, 1255), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\"><h6>";
        // line 1262
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Post-NL API", [], "cms"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("(Abonnement)", [], "cms"), "html", null, true);
        echo "</h6></span>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1265
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "postnl_checker", [], "any", false, false, false, 1265), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1270
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "postnl_key", [], "any", false, false, false, 1270), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1275
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "postnl_secret_key", [], "any", false, false, false, 1275), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t<div class=\"tab-pane\" id=\"contentgpt\" role=\"tabpanel\" aria-labelledby=\"tabgpt\" style=\"";
        // line 1283
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN") == false)) {
            echo "display:none;";
        }
        echo "\">
\t\t\t\t\t\t<div id=\"zipcodechecker\" class=\"t-content\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\"><h6>";
        // line 1287
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("OpenAI API key", [], "cms"), "html", null, true);
        echo "</h6></span>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1290
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "openai_key", [], "any", false, false, false, 1290), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\"><h6>";
        // line 1297
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Instellingen", [], "cms"), "html", null, true);
        echo "</h6></span>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1300
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "openai_model", [], "any", false, false, false, 1300), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1303
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "openai_temp", [], "any", false, false, false, 1303), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>\t

\t\t\t\t  <div class=\"tab-pane\" id=\"content14\" role=\"tabpanel\" aria-labelledby=\"tab14\">
\t\t\t\t\t\t<div class=\"card\" style=\"";
        // line 1312
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN") == false)) {
            echo "display:none;";
        }
        echo "\">
\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t<span class=\"card-title\">
\t\t\t\t\t\t\t\t\t<h6>";
        // line 1315
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Lef API", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1319
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lef_api_active", [], "any", false, false, false, 1319), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1324
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lef_api_live", [], "any", false, false, false, 1324), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1329
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lef_api_test_url", [], "any", false, false, false, 1329), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1334
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lef_api_live_url", [], "any", false, false, false, 1334), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1339
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lef_user_name", [], "any", false, false, false, 1339), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1344
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lef_password", [], "any", false, false, false, 1344), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1349
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lef_occasion_request", [], "any", false, false, false, 1349), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1354
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lef_finance_occasion_request", [], "any", false, false, false, 1354), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1359
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lef_forms_request", [], "any", false, false, false, 1359), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1364
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lef_privatelease_request", [], "any", false, false, false, 1364), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1369
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lef_offer_request", [], "any", false, false, false, 1369), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1374
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "lef_testdrive_request", [], "any", false, false, false, 1374), 'row');
        echo "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t <div class=\"tab-pane\" id=\"content16\" role=\"tabpanel\" aria-labelledby=\"tab16\">
\t\t\t\t\t\t<div class=\"card\" style=\"";
        // line 1382
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN") == false)) {
            echo "display:none;";
        }
        echo "\">
\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t<span class=\"card-title\">";
        // line 1384
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Santander leen API", [], "cms"), "html", null, true);
        echo "</span>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col s12\">";
        // line 1386
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "santander_loan_active", [], "any", false, false, false, 1386), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col s12\">";
        // line 1389
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "santander_is_live", [], "any", false, false, false, 1389), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col s12\">";
        // line 1392
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "santander_loan_api_test", [], "any", false, false, false, 1392), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col s12\">";
        // line 1395
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "santander_loan_api_live", [], "any", false, false, false, 1395), 'row');
        echo "</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t  <div class=\"tab-pane\" id=\"content15\" role=\"tabpanel\" aria-labelledby=\"tab15\" style=\"";
        // line 1401
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN") == false)) {
            echo "display:none;";
        }
        echo "\">
\t\t\t\t\t\t<div id=\"uptimerobot\">
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 1406
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("UptimeRobot API", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col s12\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1410
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "uptime_robot_key", [], "any", false, false, false, 1410), 'row', ["label" => "API key"]);
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<div class=\"tab-pane\" id=\"hummessenger\" role=\"tabpanel\" aria-labelledby=\"tab-hummessenger\">
\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t<h6>";
        // line 1422
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Hummessenger API", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div id=\"ooo-details\">
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t";
        // line 1427
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "Hummessenger_api_enabled", [], "any", false, false, false, 1427), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1432
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "Hummessenger_api_url", [], "any", false, false, false, 1432), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-6\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1435
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "Hummessenger_api_key", [], "any", false, false, false, 1435), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t
\t\t\t\t  <div class=\"tab-pane\" id=\"content8\" role=\"tabpanel\" aria-labelledby=\"tab8\">
\t\t\t\t\t\t<div id=\"media\" class=\"t-content\">
\t\t\t\t\t\t\t<div class=\"card\" style=\"";
        // line 1445
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN") == false)) {
            echo "display:none;";
        }
        echo "\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 1448
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("TinyPNG", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 1452
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "tinypng_api", [], "any", false, false, false, 1452), 'row');
        echo "
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
        // line 1454
        if ((($context["Tinify"] ?? null) && (twig_get_attribute($this->env, $this->source, ($context["Tinify"] ?? null), "status", [], "any", false, false, false, 1454) == "OK"))) {
            // line 1455
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t\t\t\t\t\t\tActies uitgevoerd deze maand: <strong>";
            // line 1456
            (((twig_get_attribute($this->env, $this->source, ($context["Tinify"] ?? null), "count", [], "any", true, true, false, 1456) &&  !(null === twig_get_attribute($this->env, $this->source, ($context["Tinify"] ?? null), "count", [], "any", false, false, false, 1456)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Tinify"] ?? null), "count", [], "any", false, false, false, 1456), "html", null, true))) : (print ("Onbekend")));
            echo "</strong>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
        }
        // line 1459
        echo "\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<h6>";
        // line 1465
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Afbeelding formaten", [], "cms"), "html", null, true);
        echo "</h6>
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t";
        // line 1467
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "mediaDimensions", [], "any", false, false, false, 1467));
        foreach ($context['_seq'] as $context["key"] => $context["dimension"]) {
            // line 1468
            echo "\t\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-lg-4\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 1470
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getDimensionLabel", [0 => $context["key"]], "method", false, false, false, 1470), [], "cms"), "html", null, true);
            echo "<br/>
\t\t\t\t\t\t\t\t\t\t\t<span class=\"grey-text\" style=\"font-size: 12px;\">";
            // line 1471
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Maximum grootte (px)", [], "cms"), "html", null, true);
            echo "</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-lg-4\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 1474
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sleutel:", [], "cms"), "html", null, true);
            echo "<br/>
\t\t\t\t\t\t\t\t\t\t\t<span class=\"grey-text\" style=\"font-size: 12px;\">";
            // line 1475
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col-12 col-lg-4\">
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control\" style=\"margin:0;\" name=\"dimensions[";
            // line 1478
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "]\" id=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\" type=\"text\" value=\"";
            echo twig_escape_filter($this->env, $context["dimension"], "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t\t\t";
            // line 1480
            echo "\t\t\t\t\t\t\t\t\t\t\t<hr class=\"d-lg-none\">
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['dimension'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1484
        echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        // line 1486
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) {
            // line 1487
            echo "\t\t\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t\t\t\t\t<span class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 1490
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Max Media upload size", [], "cms"), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t<input style=\"margin:0;\" class=\"form-control\" id=\"maxuploadsize\" name=\"maxmediauploadsize\" type=\"text\" value=\"";
            // line 1492
            if ( !(null === twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getMaxMediaSize", [], "method", false, false, false, 1492))) {
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "getMaxMediaSize", [], "any", false, false, false, 1492), "html", null, true);
            } else {
                echo "2M";
            }
            echo "\" />
\t\t\t\t\t\t\t\t\t<label for=\"maxuploadsize\">";
            // line 1493
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Maximale grote van geuploaded afbeeldingen (in Kilo 'K' of Mega 'M') notatie (aan elkaar). Bij incorrecte waardes wordt gedefault naar 2M.", [], "cms"), "html", null, true);
            echo "</label>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        }
        // line 1497
        echo "\t\t\t\t\t\t</div>
\t\t</div>
\t\t</div>

\t\t<div class=\"btn-bar\">
\t\t\t<div class=\"left\">
\t\t\t</div>
\t\t\t<div class=\"right\">

\t\t\t\t\t";
        // line 1506
        if (twig_get_attribute($this->env, $this->source, ($context["Settings"] ?? null), "test", [], "any", false, false, false, 1506)) {
            // line 1507
            echo "\t\t\t\t\t\t<a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_settings", ["testmode" => 0]);
            echo "\" class=\"btn red\">
\t\t\t\t\t\t\t<i class=\"fa fa-fw fa-check-circle\"></i>
\t\t\t\t\t\t\t";
            // line 1509
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Test modus", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t\t</a>
\t\t\t\t\t";
        } else {
            // line 1512
            echo "\t\t\t\t\t\t<a href=\"";
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_settings", ["testmode" => 1]);
            echo "\" class=\"btn green\">
\t\t\t\t\t\t\t<i class=\"far fa-fw fa-circle\"></i>
\t\t\t\t\t\t\t";
            // line 1514
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Test modus", [], "cms"), "html", null, true);
            echo "
\t\t\t\t\t\t</a>
\t\t\t\t\t";
        }
        // line 1517
        echo "\t\t\t\t<button type=\"submit\" class=\"btn right waves-effect waves-light\"><i class=\"fa fa-save\"></i> ";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Opslaan", [], "cms"), "html", null, true);
        echo "</button>
\t\t\t</div>
\t\t</div>
\t</div>
\t";
        // line 1521
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        echo "

\t<script type=\"text/javascript\" src=\"";
        // line 1523
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/js/jquery.filedrop.js"), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\">
\tfunction topFunction() {
\t  document.body.scrollTop = 0; // For Safari
\t  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
\t}

\tvar totalUploadSize = 0;
\tvar fileDrop = [];

\t\$.each(\$('.inline-ckeditor'), function(ind, area){
\t\teditor[ind] = CKEDITOR.replace( area, {
\t\t\twidth: \"100%\",
\t\t\theight: \"250px\"
\t\t} );

\t\t// Bundle selection popup
\t\teditor[ind].addCommand(\"bundleSelect\", { // create named command
\t\t\texec: function(edt) {
\t\t\t\tselectedEditorIndex = ind;
\t\t\t\tcpop.reset().loadAjax('";
        // line 1543
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_link");
        echo "');
\t\t\t}
\t\t});
\t\teditor[ind].ui.addButton('bundleSelect', { // add new button and bind our command
\t\t\tlabel: \"Bundle selection\",
\t\t\tcommand: 'bundleSelect',
\t\t\ttoolbar: 'document',
\t\t\ticon: '";
        // line 1550
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("bundles/cms/ck_ext.png"), "html", null, true);
        echo "'
\t\t});
\t\teditor[ind].on('instanceReady',function(){
\t\t\t\$('.cke_button__inlinesave').remove();
\t\t});
\t});

    var allowedDocTypes = ['application/csv', 'application/doc', 'application/excel', 'application/ms-doc', 'application/mspowerpoint', 'application/msword', 'application/octet-stream', 'application/pdf', 'application/powerpoint', 'application/rtf', 'application/vnd.apple.keynote', 'application/vnd.apple.numbers', 'application/vnd.apple.pages', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/x-excel', 'application/x-iwork-keynote-sffkey', 'application/x-iwork-numbers-sffnumbers', 'application/x-msexcel', 'application/x-mspowerpoint', 'application/x-rar-compressed', 'application/zip', 'audio/basic', 'audio/mpeg', 'audio/ogg', 'audio/vnd.rn-realaudio', 'audio/vorbis', 'audio/wav', 'audio/x-midi', 'audio/x-pn-realaudio', 'audio/x-wav', 'text/asp', 'text/css', 'text/csv', 'text/html', 'text/pascal', 'text/php', 'text/plain', 'text/richtext', 'text/sgml', 'text/uri-list', 'text/webviewhtml', 'text/x-asm', 'text/x-c', 'text/x-java-source', 'text/x-pascal', 'text/x-script.csh', 'text/x-script.elisp', 'text/x-script.perl', 'text/x-script.perl-module', 'text/x-script.phyton', 'text/x-script.sh', 'text/x-server-parsed-html', 'text/x-setext', 'text/x-sgml', 'text/x-uuencode', 'video/avi', 'video/mp4', 'video/mpeg', 'video/msvideo', 'video/quicktime', 'video/x-msvideo'];
        var allowedMediaTypes = ['image/bmp', 'image/gif', 'image/jpeg', 'image/png', 'image/svg+xml', 'image/tiff'];

        var allowedTypes = \$.merge( \$.merge([], allowedMediaTypes), allowedDocTypes)

\t\$().ready(function(){
\t\t\$('.dropzones').each(function(ind, dropzone){
\t\t\tvar fd = \$(dropzone).filedrop({
\t\t\t    fallback_id: 'upload_button',   // an identifier of a standard file input element, becomes the target of \"click\" events on the dropzone
\t\t\t    url: '";
        // line 1566
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_settings");
        echo "',              // upload handler, handles each file separately, can also be a function taking the file and returning a url
\t\t\t    paramname: \$(dropzone).data('name'),          // POST parameter name used on serverside to reference file, can also be a function taking the filename and returning the paramname
\t\t\t    withCredentials: true,          // make a cross-origin request with cookies
\t\t\t    data: {
\t\t\t    },
\t\t\t    error: function(err, file) {
\t\t\t        switch(err) {
\t\t\t            case 'BrowserNotSupported':
\t\t\t            \t\$('#upload-overlay').hide();
\t\t\t                alert('";
        // line 1575
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("browser does not support HTML5 drag and drop", [], "cms"), "html", null, true);
        echo "')
\t\t\t                break;
\t\t\t            case 'TooManyFiles':
\t\t\t            \t\$('#upload-overlay').hide();
\t\t\t                // user uploaded more than 'maxfiles'
\t\t\t                break;
\t\t\t            case 'FileTooLarge':
\t\t\t            \t\$('#upload-overlay').hide();
\t\t\t                // program encountered a file whose size is greater than 'maxfilesize'
\t\t\t                // FileTooLarge also has access to the file which was too large
\t\t\t                // use file.name to reference the filename of the culprit file
\t\t\t                break;
\t\t\t            case 'FileTypeNotAllowed':
\t\t\t            \t\$('#upload-overlay').hide();
\t\t\t                // The file type is not in the specified list 'allowedfiletypes'
\t\t\t                break;
\t\t\t            case 'FileExtensionNotAllowed':
\t\t\t            \t\$('#upload-overlay').hide();
\t\t\t                // The file extension is not in the specified list 'allowedfileextensions'
\t\t\t                break;
\t\t\t            default:
\t\t\t                break;
\t\t\t        }
\t\t\t    },
\t\t\t    allowedfiletypes: allowedTypes,
                            allowedmediafiletypes: allowedMediaTypes,
\t\t\t    allowedfileextensions: [], // file extensions allowed. Empty array means no restrictions
\t\t\t    maxfiles: 2,
\t\t\t    maxfilesize: ";
        // line 1603
        echo twig_escape_filter($this->env, ($context["maxFileSize"] ?? null), "html", null, true);
        echo ",    // max file size in MBs
                            maxmediafilesize: ";
        // line 1604
        echo twig_escape_filter($this->env, ($context["maxMediaFileSize"] ?? null), "html", null, true);
        echo ", // max images file size in KB's
\t\t\t    dragOver: function() {
\t\t\t    \tactiveZone = \$(this);
\t\t\t        \$(this).addClass('hover');
\t\t\t    },
\t\t\t    dragLeave: function() {
\t\t\t    \tactiveZone = null;
\t\t\t        \$(this).removeClass('hover');
\t\t\t    },
\t\t\t    docOver: function() {
\t\t\t    },
\t\t\t    docLeave: function() {
\t\t\t    },
\t\t\t    drop: function(x,y,z) {
\t\t\t        \$('#upload-overlay').show();
\t\t\t        \$('#upload-overlay .progress-bar').css('width', '0%');
\t\t\t    },
\t\t\t    uploadStarted: function(i, file, len){
\t\t\t    \t\$('#upload-overlay').show();
\t\t\t        // console.info('Start upload.');
\t\t\t        // \$(\$('.file-upload-preview').get(i)).find('i.fa').attr('class', 'fa fa-fw fa-upload');
\t\t\t        // activeZone.find('.dropzone-loader').show();

\t\t\t    },
\t\t\t    uploadFinished: function(i, file, response, time) {
\t\t\t    \t// \$('div[data-name=\"' + response.type + '\"]').html('').append(\$('<img src=\"' + response.image + '\" />'));
\t\t\t    \tconsole.log( response.type, \$('div[data-name=\"' + response.type + '\"]') );
\t\t\t    \t\$('div[data-name=\"' + response.type + '\"]').html('').css('background-image', 'url(' + response.image + ')');
\t\t\t    \t\$('#link_' + response.type).val(response.id);
\t\t\t    \tactiveZone.removeClass('hover');
\t\t\t    \t\$('#' + response.type + '_del_btn').show();
\t\t\t        // console.info('Start finished.', file);
\t\t\t        // \$(\$('.file-upload-preview').get(i)).find('i.fa').attr('class', 'fa fa-fw fa-check');
\t\t\t        // \$(\$('.file-upload-preview').get(i)).find('div.progress-bar').addClass('finished');
\t\t\t        // response is the data you got back from server in JSON format.
\t\t\t        // activeZone.find('.dropzone-loader').hide();
\t\t\t    },
\t\t\t    progressUpdated: function(i, file, progress) {
\t\t\t        // console.info('File progress:', progress, file);
\t\t\t        // \$(\$('.file-upload-preview').get(i)).find('div.progress').css('width', progress + '%');
\t\t\t        // this function is used for large files and updates intermittently
\t\t\t        // progress is the integer value of file being uploaded percentage to completion
\t\t\t    },
\t\t\t    globalProgressUpdated: function(progress) {
\t\t\t        \$('#upload-overlay .progress-bar').css('width', progress + '%');
\t\t\t    },
\t\t\t    speedUpdated: function(i, file, speed) {
\t\t\t        // console.info('Speed changed:', speed, file);
\t\t\t        // \$('.file-upload-totals').find('span.size').html(humanFileSize(totalUploadSize, 1));
\t\t\t        // speed in kb/s
\t\t\t    },
\t\t\t    rename: function(name) {
\t\t\t        // console.info('Rename:', name);
\t\t\t        // name in string format
\t\t\t        // must return alternate name as string
\t\t\t    },
\t\t\t    beforeEach: function(file) {
\t\t\t        // console.info('Before file', file);
\t\t\t        /*var fileInfo = \$('<div class=\"file-upload-preview\"> \\
\t\t\t\t\t\t<span class=\"label\"><i class=\"fa fa-fw fa-clock-o\"></i>' + file.name + '</span> \\
\t\t\t\t\t\t<div class=\"right\"> \\
\t\t\t\t\t\t\t<span class=\"modified\">' + day + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec + '</span> \\
\t\t\t\t\t\t\t<span class=\"size\">' + humanFileSize(file.size, 1) + '</span> \\
\t\t\t\t\t\t\t<span class=\"progress\">0 %</span> \\
\t\t\t\t\t\t\t<a href=\"#\" class=\"delete\"></a> \\
\t\t\t\t\t\t</div> \\
\t\t\t\t\t\t<div class=\"progress-bar\"><div class=\"progress\" style=\"width:0%;\"></div></div> \\
\t\t\t\t\t</div>');
\t\t\t        \$('#modal .modal-content .files').append(fileInfo);
\t\t\t        totalUploadSize += file.size;
\t\t\t        \$('.file-upload-totals').find('span.size').html(humanFileSize(totalUploadSize, 1));*/
\t\t\t        // file is a file object
\t\t\t        // return false to cancel upload
\t\t\t    },
\t\t\t    beforeSend: function(file, i, done) {
\t\t\t        done(); // Start upload
\t\t\t        activeZone.removeClass('hover');
\t\t\t        activeZone.addClass('running');
\t\t\t    },
\t\t\t    afterAll: function() {
\t\t\t        \$('#upload-overlay').hide();
\t\t\t        \$('#upload-overlay .progress-bar').css('width', '0%');
\t\t\t        activeZone.removeClass('hover');
\t\t\t        activeZone.removeClass('running');
\t\t\t        activeZone.find('.del_btn').show();
\t\t\t        // activeZone.find('.dropzone-loader').hide();
\t\t\t    }
\t\t\t});
\t\t\tfileDrop.push(fd);
\t\t});

\t\tconsole.log( fileDrop );

\t\t//Run once on start
\t\ttoggleRecaptchaTreshold(\$('#form_google_recaptcha_mode').val());

\t\t\$('#recaptcha_treshold').find(\".input-field\").addClass(\"range-field\").removeClass(\"input-field\");

\t\t\$( \"#form_google_recaptcha_mode\" ).change(function() {
\t\t\ttoggleRecaptchaTreshold(\$(this).val());
\t\t});
\t});

\tfunction closeModal(){
        \$('#shade,#modal').removeClass('show');
\t}

\tfunction toggleRecaptchaTreshold(value){
\t\tif(value == \"3_invisible\"){
\t\t\t\$('#recaptcha_treshold').css(\"display\", \"block\");
\t\t} else {
\t\t\t\$('#recaptcha_treshold').css(\"display\", \"none\");
\t\t}
\t}

\tfunction humanFileSize(size, dec = 2) {
\t    var i = Math.floor( Math.log(size) / Math.log(1024) );
\t    return ( size / Math.pow(1024, i) ).toFixed(dec) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i];
\t};

\t\$( \"body\" ).addClass( \"page-overview\" );

\t\$(function(){
\t\t\$('#form_outOfOfficeEnabled').click(function(){
\t\t\tif(this.checked){
\t\t\t\t\$('#ooo-details').show();
\t\t\t}else{
\t\t\t\t\$('#ooo-details').hide();
\t\t\t}
\t\t});
\t});
    </script>

";
    }

    public function getTemplateName()
    {
        return "@Cms/settings/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  3093 => 1604,  3089 => 1603,  3058 => 1575,  3046 => 1566,  3027 => 1550,  3017 => 1543,  2994 => 1523,  2989 => 1521,  2981 => 1517,  2975 => 1514,  2969 => 1512,  2963 => 1509,  2957 => 1507,  2955 => 1506,  2944 => 1497,  2937 => 1493,  2929 => 1492,  2924 => 1490,  2919 => 1487,  2917 => 1486,  2913 => 1484,  2904 => 1480,  2896 => 1478,  2890 => 1475,  2886 => 1474,  2880 => 1471,  2876 => 1470,  2872 => 1468,  2868 => 1467,  2863 => 1465,  2855 => 1459,  2849 => 1456,  2846 => 1455,  2844 => 1454,  2839 => 1452,  2832 => 1448,  2824 => 1445,  2811 => 1435,  2805 => 1432,  2797 => 1427,  2789 => 1422,  2774 => 1410,  2767 => 1406,  2757 => 1401,  2748 => 1395,  2742 => 1392,  2736 => 1389,  2730 => 1386,  2725 => 1384,  2718 => 1382,  2707 => 1374,  2699 => 1369,  2691 => 1364,  2683 => 1359,  2675 => 1354,  2667 => 1349,  2659 => 1344,  2651 => 1339,  2643 => 1334,  2635 => 1329,  2627 => 1324,  2619 => 1319,  2612 => 1315,  2604 => 1312,  2592 => 1303,  2586 => 1300,  2580 => 1297,  2570 => 1290,  2564 => 1287,  2555 => 1283,  2544 => 1275,  2536 => 1270,  2528 => 1265,  2520 => 1262,  2510 => 1255,  2501 => 1251,  2492 => 1247,  2480 => 1238,  2473 => 1234,  2467 => 1231,  2461 => 1228,  2455 => 1225,  2450 => 1223,  2436 => 1212,  2432 => 1211,  2428 => 1210,  2422 => 1207,  2409 => 1197,  2405 => 1196,  2401 => 1195,  2397 => 1194,  2393 => 1193,  2388 => 1191,  2374 => 1180,  2370 => 1179,  2362 => 1174,  2356 => 1171,  2328 => 1146,  2324 => 1145,  2319 => 1143,  2314 => 1141,  2308 => 1137,  2301 => 1118,  2296 => 1116,  2287 => 1110,  2282 => 1108,  2273 => 1102,  2268 => 1100,  2258 => 1093,  2251 => 1089,  2243 => 1084,  2239 => 1083,  2233 => 1080,  2227 => 1077,  2217 => 1070,  2213 => 1069,  2209 => 1068,  2203 => 1065,  2193 => 1058,  2189 => 1057,  2185 => 1056,  2181 => 1055,  2175 => 1052,  2165 => 1045,  2161 => 1044,  2157 => 1043,  2153 => 1042,  2147 => 1039,  2139 => 1036,  2125 => 1027,  2118 => 1023,  2114 => 1022,  2110 => 1021,  2106 => 1020,  2099 => 1016,  2095 => 1015,  2088 => 1011,  2081 => 1007,  2071 => 1002,  2060 => 996,  2054 => 995,  2048 => 994,  2042 => 993,  2036 => 992,  2030 => 991,  2024 => 990,  2018 => 989,  2012 => 988,  2006 => 987,  2000 => 986,  1994 => 985,  1988 => 984,  1982 => 983,  1976 => 982,  1970 => 981,  1964 => 980,  1958 => 979,  1952 => 978,  1946 => 977,  1940 => 976,  1934 => 975,  1928 => 974,  1922 => 973,  1916 => 970,  1911 => 968,  1907 => 967,  1903 => 966,  1899 => 965,  1895 => 964,  1888 => 960,  1884 => 959,  1877 => 955,  1870 => 951,  1860 => 946,  1853 => 942,  1849 => 941,  1845 => 940,  1841 => 939,  1834 => 935,  1830 => 934,  1823 => 930,  1816 => 926,  1806 => 921,  1799 => 917,  1795 => 916,  1791 => 915,  1787 => 914,  1783 => 913,  1779 => 912,  1773 => 909,  1769 => 908,  1763 => 905,  1756 => 901,  1746 => 896,  1739 => 892,  1735 => 891,  1731 => 890,  1727 => 889,  1720 => 885,  1716 => 884,  1709 => 880,  1702 => 876,  1692 => 871,  1685 => 867,  1681 => 866,  1677 => 865,  1673 => 864,  1669 => 863,  1662 => 859,  1658 => 858,  1651 => 854,  1644 => 850,  1634 => 845,  1627 => 841,  1623 => 840,  1619 => 839,  1615 => 838,  1611 => 837,  1603 => 832,  1599 => 831,  1591 => 826,  1584 => 822,  1578 => 821,  1568 => 814,  1562 => 811,  1558 => 810,  1553 => 808,  1542 => 800,  1536 => 797,  1530 => 794,  1524 => 791,  1516 => 785,  1510 => 784,  1508 => 783,  1501 => 781,  1493 => 780,  1490 => 779,  1485 => 778,  1483 => 777,  1474 => 770,  1468 => 769,  1466 => 768,  1459 => 766,  1451 => 765,  1448 => 764,  1443 => 763,  1441 => 762,  1432 => 755,  1426 => 754,  1424 => 753,  1417 => 751,  1409 => 750,  1406 => 749,  1401 => 748,  1399 => 747,  1393 => 744,  1386 => 739,  1380 => 738,  1378 => 737,  1371 => 735,  1363 => 734,  1360 => 733,  1355 => 732,  1353 => 731,  1348 => 729,  1343 => 726,  1337 => 725,  1335 => 724,  1328 => 722,  1320 => 721,  1317 => 720,  1312 => 719,  1310 => 718,  1305 => 716,  1300 => 713,  1294 => 712,  1292 => 711,  1285 => 709,  1277 => 708,  1274 => 707,  1269 => 706,  1267 => 705,  1262 => 703,  1254 => 698,  1248 => 695,  1232 => 685,  1227 => 683,  1219 => 682,  1213 => 679,  1205 => 674,  1197 => 669,  1191 => 666,  1182 => 660,  1176 => 657,  1170 => 654,  1164 => 651,  1158 => 648,  1152 => 645,  1144 => 640,  1137 => 636,  1131 => 635,  1124 => 631,  1114 => 624,  1110 => 623,  1106 => 622,  1100 => 619,  1091 => 615,  1077 => 607,  1072 => 605,  1064 => 604,  1055 => 598,  1048 => 594,  1044 => 593,  1040 => 592,  1034 => 589,  1025 => 585,  1015 => 578,  1008 => 574,  1004 => 573,  997 => 569,  991 => 566,  987 => 565,  983 => 564,  976 => 560,  970 => 557,  951 => 541,  923 => 516,  919 => 515,  915 => 514,  911 => 513,  907 => 512,  900 => 508,  888 => 499,  882 => 496,  876 => 493,  870 => 490,  864 => 487,  858 => 484,  852 => 481,  846 => 478,  840 => 475,  834 => 472,  828 => 469,  822 => 466,  816 => 463,  808 => 458,  799 => 452,  788 => 444,  762 => 420,  753 => 417,  749 => 416,  746 => 415,  742 => 414,  728 => 403,  719 => 399,  704 => 390,  699 => 388,  691 => 387,  684 => 383,  672 => 377,  667 => 375,  659 => 374,  652 => 370,  640 => 364,  635 => 362,  627 => 361,  620 => 357,  608 => 351,  603 => 349,  595 => 348,  588 => 344,  579 => 338,  575 => 337,  562 => 327,  556 => 324,  550 => 321,  544 => 318,  535 => 312,  531 => 311,  518 => 301,  510 => 298,  504 => 295,  498 => 292,  492 => 289,  483 => 283,  477 => 280,  471 => 277,  462 => 271,  458 => 270,  449 => 264,  434 => 251,  428 => 249,  426 => 248,  422 => 247,  418 => 246,  414 => 245,  411 => 244,  405 => 242,  403 => 241,  398 => 239,  394 => 238,  390 => 237,  386 => 236,  382 => 235,  379 => 234,  374 => 232,  369 => 231,  367 => 230,  362 => 228,  358 => 227,  350 => 221,  343 => 217,  335 => 212,  331 => 210,  329 => 209,  323 => 206,  319 => 204,  312 => 200,  304 => 195,  300 => 193,  297 => 192,  290 => 188,  286 => 186,  283 => 185,  276 => 181,  272 => 179,  270 => 178,  264 => 175,  260 => 173,  253 => 169,  249 => 167,  246 => 166,  239 => 162,  235 => 160,  233 => 159,  227 => 156,  219 => 151,  211 => 146,  203 => 141,  195 => 136,  191 => 134,  184 => 130,  176 => 125,  172 => 123,  170 => 122,  164 => 119,  160 => 118,  153 => 114,  149 => 113,  140 => 107,  131 => 100,  128 => 99,  125 => 98,  122 => 97,  120 => 96,  111 => 90,  107 => 89,  101 => 86,  97 => 84,  93 => 81,  91 => 74,  88 => 73,  86 => 66,  83 => 65,  81 => 51,  78 => 50,  75 => 48,  73 => 45,  70 => 44,  68 => 32,  65 => 31,  63 => 9,  60 => 8,  58 => 7,  54 => 6,  47 => 4,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/settings/index.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/settings/index.html.twig");
    }
}
