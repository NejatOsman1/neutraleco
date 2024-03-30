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

/* @Cms/page/link.html.twig */
class __TwigTemplate_7529c3e331a68167c92108aeed43ba4d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "
";
        // line 4
        $this->displayBlock('body', $context, $blocks);
    }

    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 5
        echo "\t";
        $context["blocks_composer"] = (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 5), "get", [0 => "blocks"], "method", false, false, false, 5) == 1);
        // line 6
        echo "\t";
        if ( !(null === ($context["post"] ?? null))) {
            // line 7
            echo "\t\t";
            if (($context["blocks_composer"] ?? null)) {
                // line 8
                echo "\t\t\t";
                // line 9
                echo "\t\t\t<script>
\t\t\tlinkBundle('";
                // line 10
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["activeRoute"] ?? null), "bundleName", [], "any", false, false, false, 10), "html", null, true);
                echo "', '";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["activeRoute"] ?? null), "name", [], "any", false, false, false, 10), "html", null, true);
                echo "', '";
                echo ($context["poststring"] ?? null);
                echo "');
\t\t\t</script>
\t\t";
            } else {
                // line 13
                echo "\t\t\t";
                // line 14
                echo "\t\t\t<script>
\t\t\tif(typeof activeEditor != 'undefined'){
\t\t\t\tif(typeof Trinity != 'undefined'){
\t\t\t\t\tTrinity.ckWrite('[";
                // line 17
                echo twig_escape_filter($this->env, twig_replace_filter(twig_lower_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["activeRoute"] ?? null), "bundleName", [], "any", false, false, false, 17)), ["qinox" => "trinity"]), "html", null, true);
                echo "_show:show(";
                echo ($context["poststring"] ?? null);
                echo ")]');
\t\t\t\t}else{
\t\t\t\t\tactiveEditor.insertText('[";
                // line 19
                echo twig_escape_filter($this->env, twig_replace_filter(twig_lower_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["activeRoute"] ?? null), "bundleName", [], "any", false, false, false, 19)), ["qinox" => "trinity"]), "html", null, true);
                echo "_show:show(";
                echo ($context["poststring"] ?? null);
                echo ")]');
\t\t\t\t}
\t\t\t\tsetTimeout(function(){
\t\t\t\t\tcpop.close();
\t\t\t\t}, 200);
\t\t\t}else{
\t\t\t\tif(typeof Trinity != 'undefined' && selectedEditorIndex <= 0){
\t\t\t\t\tTrinity.ckWrite('[";
                // line 26
                echo twig_escape_filter($this->env, twig_replace_filter(twig_lower_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["activeRoute"] ?? null), "bundleName", [], "any", false, false, false, 26)), ["qinox" => "trinity"]), "html", null, true);
                echo "_show:show(";
                echo ($context["poststring"] ?? null);
                echo ")]');
\t\t\t\t}else{
\t\t\t\t\teditor[selectedEditorIndex].insertText('[";
                // line 28
                echo twig_escape_filter($this->env, twig_replace_filter(twig_lower_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["activeRoute"] ?? null), "bundleName", [], "any", false, false, false, 28)), ["qinox" => "trinity"]), "html", null, true);
                echo "_show:show(";
                echo ($context["poststring"] ?? null);
                echo ")]');
\t\t\t\t}
\t\t\t\tsetTimeout(function(){
\t\t\t\t\tcpop.close();
\t\t\t\t}, 200);
\t\t\t}
\t\t\t</script>
\t\t";
            }
            // line 36
            echo "\t";
        }
        // line 37
        echo "
\t<div class=\"bundle-link-content\">
\t\t";
        // line 39
        if ( !(null === ($context["activeRoute"] ?? null))) {
            // line 40
            echo "\t\t\t<h3 class=\"popup-title\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Configureer de extensie", [], "cms"), "html", null, true);
            echo "</h3>

\t\t\t<input type=\"hidden\" name=\"bundlename\" value=\"";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["activeRoute"] ?? null), "bundleName", [], "any", false, false, false, 42), "html", null, true);
            echo "\" />

\t\t\t";
            // line 45
            echo "\t\t\t";
            $this->loadTemplate(((((twig_get_attribute($this->env, $this->source, ($context["activeRoute"] ?? null), "bundleName", [], "any", false, false, false, 45) == "admin")) ? ("@Cms") : (("@" . twig_replace_filter(twig_get_attribute($this->env, $this->source, ($context["activeRoute"] ?? null), "bundleName", [], "any", false, false, false, 45), ["Bundle" => ""])))) . "/link.html.twig"), "@Cms/page/link.html.twig", 45)->display($context);
            // line 46
            echo "
\t\t\t<div id=\"popup_footer\">
\t\t\t\t<button onclick=\"cpop.reset().loadAjax('";
            // line 48
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_link");
            echo ((($context["blocks_composer"] ?? null)) ? ("?blocks=1") : (""));
            echo "');\" type=\"button\" class=\"cp_btn btn\">&larr; ";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Vorige", [], "cms"), "html", null, true);
            echo "</button>
\t\t\t\t<button type=\"submit\" class=\"btn green darken-1\">";
            // line 49
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Koppelen", [], "cms"), "html", null, true);
            echo "</button>
\t\t\t\t<div class=\"left\"><button type=\"button\" onclick=\"cpop.close()\" class=\"btn-flat\">";
            // line 50
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sluiten", [], "cms");
            echo "</button></div>
\t\t\t</div>
\t\t";
        } else {
            // line 53
            echo "\t\t\t<h3 class=\"popup-title\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Extensie koppelen", [], "cms"), "html", null, true);
            echo "</h3>

\t\t\t<ul class=\"list-group\">
\t\t\t\t<a class=\"list-group-item list-group-item-action\" href=\"javascript:cpop.reset().loadAjax('";
            // line 56
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_link", ["plugin" => "trinity"]);
            echo ((($context["blocks_composer"] ?? null)) ? ("?blocks=1") : (""));
            echo "');\"><i class=\"material-icons left\">settings_applications</i>";
            echo twig_escape_filter($this->env, ($context["trinity"] ?? null), "html", null, true);
            echo "</a>
\t\t\t\t";
            // line 57
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["routes"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["route"]) {
                // line 58
                echo "\t\t\t\t\t";
                if ((twig_get_attribute($this->env, $this->source, $context["route"], "name", [], "any", false, false, false, 58) != "API")) {
                    // line 59
                    echo "\t\t\t\t\t\t<a class=\"list-group-item list-group-item-action\" href=\"javascript:cpop.reset().loadAjax('";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_page_link", ["plugin" => twig_trim_filter(twig_get_attribute($this->env, $this->source, $context["route"], "name", [], "any", false, false, false, 59))]), "html", null, true);
                    echo ((($context["blocks_composer"] ?? null)) ? ("?blocks=1") : (""));
                    echo "');\">
\t\t\t\t\t\t";
                    // line 60
                    if (twig_in_filter("fa-", twig_get_attribute($this->env, $this->source, $context["route"], "icon", [], "any", false, false, false, 60))) {
                        // line 61
                        echo "\t\t\t              ";
                        // line 62
                        echo "\t\t\t              <i class=\"";
                        ((twig_get_attribute($this->env, $this->source, $context["route"], "icon", [], "any", false, false, false, 62)) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["route"], "icon", [], "any", false, false, false, 62), "html", null, true))) : (print ("")));
                        echo " fa-fw left\" style=\"font-size: 19px;\"></i>
\t\t\t            ";
                    } else {
                        // line 64
                        echo "\t\t\t              ";
                        // line 65
                        echo "\t\t\t              <i class=\"material-icons left\">";
                        (((twig_get_attribute($this->env, $this->source, $context["route"], "icon", [], "any", false, false, false, 65) == "star_rate")) ? (print ("star")) : (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["route"], "icon", [], "any", false, false, false, 65), "html", null, true))));
                        echo "</i>
\t\t\t            ";
                    }
                    // line 67
                    echo "\t\t\t\t\t\t";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["route"], "name", [], "any", false, false, false, 67), "html", null, true);
                    echo "</a>
\t\t\t\t\t";
                }
                // line 69
                echo "\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['route'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            echo "\t\t\t</ul>

\t\t\t<div id=\"popup_footer\">
\t\t\t\t<div class=\"left\">
\t\t\t\t\t<button type=\"button\" onclick=\"cpop.close()\" class=\"btn-flat\">";
            // line 74
            echo $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sluiten", [], "cms");
            echo "</button>
\t\t\t\t</div>
\t\t\t\t";
            // line 77
            echo "\t\t\t</div>
\t\t";
        }
        // line 79
        echo "\t</div>
";
    }

    public function getTemplateName()
    {
        return "@Cms/page/link.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  234 => 79,  230 => 77,  225 => 74,  219 => 70,  213 => 69,  207 => 67,  201 => 65,  199 => 64,  193 => 62,  191 => 61,  189 => 60,  183 => 59,  180 => 58,  176 => 57,  169 => 56,  162 => 53,  156 => 50,  152 => 49,  145 => 48,  141 => 46,  138 => 45,  133 => 42,  127 => 40,  125 => 39,  121 => 37,  118 => 36,  105 => 28,  98 => 26,  86 => 19,  79 => 17,  74 => 14,  72 => 13,  62 => 10,  59 => 9,  57 => 8,  54 => 7,  51 => 6,  48 => 5,  41 => 4,  38 => 3,);
    }

    public function getSourceContext()
    {
        return new Source("", "@Cms/page/link.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/CmsBundle/Resources/views/page/link.html.twig");
    }
}
