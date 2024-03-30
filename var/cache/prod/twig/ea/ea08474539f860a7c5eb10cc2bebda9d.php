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

/* @Cms/page/composer_blocks.html.twig */
class __TwigTemplate_af69a1042cf85fc95d3e25623706032c extends Template
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
        // line 2
        echo "
<script>
\t// Temp for testing
\t\$('body').addClass('treeview');
</script>

<div id=\"page-wrapper\" class=\"treebox\">
\t<div class=\"treebox-content\">
\t\t<ul class=\"nav nav-tabs\" id=\"treebox-tabs\" role=\"tablist\">
\t\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t\t<button class=\"nav-link active\" data-bs-toggle=\"tab\" data-bs-target=\"#treebox-blocks\" type=\"button\" role=\"tab\" aria-controls=\"treebox-blocks\" aria-selected=\"false\">Secties</button>
\t\t\t</li>
\t\t\t<li class=\"nav-item\" role=\"presentation\">
\t\t\t\t<button class=\"nav-link \" data-bs-toggle=\"tab\" data-bs-target=\"#treebox-overview\" type=\"button\" role=\"tab\" aria-controls=\"home\" aria-selected=\"true\">Pagina's</button>
\t\t\t</li>
\t\t</ul>

\t\t<div class=\"tab-content\" id=\"treebox-tabs-content\">
\t\t\t<div class=\"tab-pane \" id=\"treebox-overview\" role=\"tabpanel\" aria-labelledby=\"treebox-overview\">
\t\t\t\t<div class=\"treebox-scroll\" data-simplebar>
\t\t\t\t\t";
        // line 22
        if ( !twig_test_empty(($context["pages"] ?? null))) {
            // line 23
            echo "\t\t\t\t\t<ol>
\t\t\t\t\t\t";
            // line 24
            $this->loadTemplate("@Cms/includes/menu-links.html.twig", "@Cms/page/composer_blocks.html.twig", 24)->display(twig_to_array(["pages" => ($context["pages"] ?? null), "ActivePage" => ($context["ActivePage"] ?? null), "modal" => true, "allowLinks" => true, "depth" => 1]));
            // line 25
            echo "\t\t\t\t\t</ol>
\t\t\t\t\t";
        }
        // line 27
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"tab-pane show active\" id=\"treebox-blocks\" role=\"tabpanel\" aria-labelledby=\"treebox-blocks\">
\t\t\t\t<div class=\"blocks-wrapper\">
\t\t\t\t\t<div class=\"categories\" data-simplebar>
\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t<li><span class=\"title\">";
        // line 33
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Categorieën", [], "cms");
        echo "</span></li>
\t\t\t\t\t\t";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["block_sections"] ?? null));
        foreach ($context['_seq'] as $context["category"] => $context["tpl_blocks"]) {
            // line 35
            echo "\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"{category == 'Framework' ? 'active' : ''}}\">";
            // line 36
            echo twig_escape_filter($this->env, $context["category"], "html", null, true);
            echo "</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['category'], $context['tpl_blocks'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"blocks\">
\t\t\t\t\t\t<div class=\"scroll-area\" data-simplebar>
\t\t\t\t\t\t\t<ul id=\"wrapper-select\">
\t\t\t\t\t\t\t\t";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["block_sections"] ?? null));
        foreach ($context['_seq'] as $context["category"] => $context["tpl_blocks"]) {
            // line 45
            echo "\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["tpl_blocks"]);
            foreach ($context['_seq'] as $context["key"] => $context["entry"]) {
                // line 46
                echo "\t\t\t\t\t\t";
                if (((twig_in_filter($context["key"], ($context["usedBlocks"] ?? null)) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN"))) {
                    // line 47
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context["action"] = (("selectSection('" . $context["key"]) . "', true, true);");
                    // line 48
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context["icon"] = (("bundles/cms/blocks/" . twig_get_attribute($this->env, $this->source, $context["entry"], "key", [], "any", false, false, false, 48)) . ".png");
                    // line 49
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    $context["icon_large"] = (("bundles/cms/blocks/large/" . twig_get_attribute($this->env, $this->source, $context["entry"], "key", [], "any", false, false, false, 49)) . ".png");
                    // line 50
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    if (file_exists(($context["icon"] ?? null))) {
                    } else {
                        $context["icon"] = null;
                    }
                    // line 51
                    echo "\t\t\t\t\t\t\t\t\t\t";
                    if (file_exists(($context["icon_large"] ?? null))) {
                    } else {
                        $context["icon_large"] = null;
                    }
                    // line 52
                    echo "\t\t\t\t\t\t\t\t\t\t<li data-key=\"";
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                    echo "\" class=\"";
                    echo ((($context["category"] == "v2")) ? ("cat-v2") : ("cat-v1"));
                    echo "\" style=\"";
                    echo ((($context["category"] == "v2")) ? ("display:none;") : (""));
                    echo "\">
\t\t\t\t\t\t\t\t\t\t\t<div onclick=\"";
                    // line 53
                    echo twig_escape_filter($this->env, ($context["action"] ?? null), "html", null, true);
                    echo "\$('#block-modal').modal('close');return false;\" class=\"block-select\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"thumbnail-wrapper\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"thumbnail\" style=\"";
                    // line 55
                    ((($context["icon"] ?? null)) ? (print (twig_escape_filter($this->env, (("background-image:url(/" . ($context["icon"] ?? null)) . ");"), "html", null, true))) : (print ("")));
                    echo " background-size: contain; background-color: #DEE5F0;\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 56
                    if (($context["icon_large"] ?? null)) {
                        // line 57
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"large-preview\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"far fa-eye\"></i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 61
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"label\">";
                    // line 62
                    echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, $context["entry"], "label", [], "any", false, false, false, 62), [], "blocks");
                    echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 64
                    if (($context["icon_large"] ?? null)) {
                        // line 65
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"large-preview-wrapper\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"preview-image-wrapper\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"/";
                        // line 67
                        echo twig_escape_filter($this->env, ($context["icon_large"] ?? null), "html", null, true);
                        echo "\" alt=\"\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 71
                    echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
                }
                // line 74
                echo "\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['entry'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 75
            echo "\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['category'], $context['tpl_blocks'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        echo "\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"blocks-search\">
\t\t\t\t\t\t\t<i class=\"fa fa-search\"></i>

\t\t\t\t\t\t\t<form action=\"\">
\t\t\t\t\t\t\t\t<input type=\"Zoeken\" autocomplete=\"off\" id=\"wrap-q\" onkeyup=\"searchSections(this.value);\" placeholder=\"";
        // line 83
        echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Zoeken", [], "cms");
        echo "\">
\t\t\t\t\t\t\t\t<i id=\"wrap-q-clr\" class=\"fa fa-times-circle\" onclick=\"\$('#wrap-q').val('');searchSections('');\" style=\"display: none;\"></i>
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>

<script>
function searchSections(val){
\tif(val.length > 0){
\t\t\$('#wrap-q-clr').show();
\t\tval = val.toLowerCase();
\t\tval = val.split(' ');
\t\t\$.each(\$('#wrapper-select li'), function(ind, el){
\t\t\tvar label = \$(el).find('span.label').html().toLowerCase();

\t\t\tvar found = true;
\t\t\t\$.each(val, function(i, v){
\t\t\t\tif((label.indexOf(v) !== -1)){
\t\t\t\t\t//
\t\t\t\t}else{
\t\t\t\t\tfound = false;
\t\t\t\t}
\t\t\t});
\t\t\tif(!found){
\t\t\t\t\$(el).hide();
\t\t\t}else{
\t\t\t\t\$(el).show();
\t\t\t}
\t\t});
\t}else{
\t\t\$('#wrap-q-clr').hide();
\t\t\$('#wrapper-select li').show();
\t}
}

\$(function(){
\t\$('#wrapper-select li').draggable({
\t\tappendTo: 'body',
\t\tconnectToSortable: \"#block-container\",
\t\trevert: \"invalid\",
\t\thelper: function(el){

\t\t\t\$('#block-container').css('min-height', '100px');

\t\t\tvar width = \$('#wrapper-select li:first span.thumbnail').width();
\t\t\tvar height = \$('#wrapper-select li:first span.thumbnail').height();
\t\t\tvar bg = \$(el.currentTarget).find('span.thumbnail').css('background').replace(/[\"']/g, \"'\");
\t\t\tmyNewBlock = \$('<div class=\"new-block\" data-key=\"' + \$(el.currentTarget).data('key') + '\" style=\"box-shadow: 0 2px 5px rgba(0,0,0,0.2);background:' + bg + '\t;color:white;font-weight:bold;z-index:10000000000000;width:' + width + 'px;height:' + height + 'px;text-align:center;line-height:' + height + 'px;\"></div>');
\t\t\treturn myNewBlock;
\t\t}
\t});

\t/*\$( \"#block-container\" ).droppable({
\t\t// accept: \".new-block\"
\t});*/

\t\$( \"body\" ).addClass( \"page-overview\" );
});
</script>
";
    }

    public function getTemplateName()
    {
        return "@Cms/page/composer_blocks.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  211 => 83,  202 => 76,  196 => 75,  190 => 74,  185 => 71,  178 => 67,  174 => 65,  172 => 64,  167 => 62,  164 => 61,  158 => 57,  156 => 56,  152 => 55,  147 => 53,  138 => 52,  132 => 51,  126 => 50,  123 => 49,  120 => 48,  117 => 47,  114 => 46,  109 => 45,  105 => 44,  98 => 39,  89 => 36,  86 => 35,  82 => 34,  78 => 33,  70 => 27,  66 => 25,  64 => 24,  61 => 23,  59 => 22,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/page/composer_blocks.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/page/composer_blocks.html.twig");
    }
}
