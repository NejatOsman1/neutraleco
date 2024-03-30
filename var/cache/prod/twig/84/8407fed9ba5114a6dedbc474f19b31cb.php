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

/* @TrinityForms/elements/row.html.twig */
class __TwigTemplate_a7d032ce3a2d28f4b86661e7ec7435c5 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'field' => [$this, 'block_field'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        $context["editableFields"] = twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getType", [], "any", false, false, false, 2), [0 => "upload", 1 => "email", 2 => "email_check", 3 => "date", 4 => "text", 5 => "textarea", 6 => "dropzone"]);
        // line 3
        echo "
";
        // line 4
        if ( !array_key_exists("loadForm", $context)) {
            // line 5
            echo "    <div class=\"fields-parent\">
        <div class=\"field-child\">
        ";
        }
        // line 8
        echo "
        <div id=\"q-";
        // line 9
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 9)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 9)) : (($context["random"] ?? null))), "html", null, true);
        echo "\" data-id=\"";
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 9)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 9)) : (($context["random"] ?? null))), "html", null, true);
        echo "\" class=\"";
        if ((array_key_exists("loop", $context) && (twig_get_attribute($this->env, $this->source, ($context["loop"] ?? null), "index0", [], "any", false, false, false, 9) % 2))) {
            echo "two-last ";
        }
        echo " ";
        if (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "hidden", [], "any", false, false, false, 9)) {
            echo "qhidden";
        }
        echo " ";
        if ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "required", [], "any", false, false, false, 9) && (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "hidden", [], "any", false, false, false, 9) == false))) {
            echo "required";
        }
        echo " form-block child-sortable form-group card type-";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getType", [], "any", false, false, false, 9), "html", null, true);
        echo "\">
            ";
        // line 10
        if (array_key_exists("edit", $context)) {
            // line 11
            echo "                <input type=\"hidden\" name=\"pos[";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 11)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 11)) : (($context["random"] ?? null))), "html", null, true);
            echo "]\" class=\"row-pos\" value=\"";
            (((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "position", [], "any", true, true, false, 11) &&  !(null === twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "position", [], "any", false, false, false, 11)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "position", [], "any", false, false, false, 11), "html", null, true))) : (print (0)));
            echo "\" />
                <input type=\"hidden\" name=\"width[";
            // line 12
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 12)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 12)) : (($context["random"] ?? null))), "html", null, true);
            echo "]\" class=\"row-width\" value=\"";
            (((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "width", [], "any", true, true, false, 12) &&  !(null === twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "width", [], "any", false, false, false, 12)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "width", [], "any", false, false, false, 12), "html", null, true))) : (print (100)));
            echo "\" />
            ";
        }
        // line 14
        echo "            ";
        if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getType", [], "any", false, false, false, 14), [0 => "checkbox", 1 => "radio", 2 => "select", 3 => "upload", 4 => "email", 5 => "email_check", 6 => "date", 7 => "text", 8 => "textarea", 9 => "canvas"])) {
            // line 15
            echo "                ";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getTitle", [], "any", false, false, false, 15))) {
                // line 16
                echo "\t\t\t\t\t ";
                if (( !array_key_exists("edit", $context) &&  !twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "hiddenLabel", [], "any", false, false, false, 16))) {
                    // line 17
                    echo "\t\t\t\t\t\t<div class=\"field-label\" ";
                    if (array_key_exists("edit", $context)) {
                        echo "contenteditable=\"true\"";
                    }
                    echo " data-type=\"title\" style=\"outline:none;margin-left: 20px;line-height: 28px;min-width: 100px;display: inline-block;\">
\t\t\t\t\t\t  ";
                    // line 18
                    echo twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getTitle", [], "any", false, false, false, 18);
                    echo "
\t\t\t\t\t\t  ";
                    // line 19
                    if ((( !array_key_exists("edit", $context) && twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "required", [], "any", false, false, false, 19)) && (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "hidden", [], "any", false, false, false, 19) == false))) {
                        echo "<span class=\"req\">*</span>";
                    }
                    // line 20
                    echo "\t\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 22
                echo "\t\t\t\t\t ";
                if (array_key_exists("edit", $context)) {
                    // line 23
                    echo "\t\t\t\t\t\t<div class=\"field-control\">
\t\t\t\t\t\t\t<input ";
                    // line 24
                    if (array_key_exists("edit", $context)) {
                        echo "title=\"";
                        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Titel is verplicht", [], "forms"), "html", null, true);
                        echo "\"";
                    }
                    echo " placeholder=\"";
                    echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Titel", [], "forms"), "html", null, true);
                    echo "\" type=\"text\" class=\"title validate\" name=\"title[]\" data-type=\"title\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "title", [], "any", false, false, false, 24);
                    echo "\" ";
                    if (array_key_exists("edit", $context)) {
                        echo "required=\"required\"";
                    }
                    echo " />
\t\t\t\t\t\t\t";
                    // line 25
                    if ((( !array_key_exists("edit", $context) && twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "required", [], "any", false, false, false, 25)) && (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "hidden", [], "any", false, false, false, 25) == false))) {
                        echo "<span class=\"req\">*</span>";
                    }
                    // line 26
                    echo "\t\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 28
                echo "                ";
            } else {
                // line 29
                echo "                    <div class=\"field-label\" ";
                if (array_key_exists("edit", $context)) {
                    echo "contenteditable=\"true\"";
                }
                echo " data-type=\"title\" style=\"outline:none;margin-left: 20px;line-height: 28px;min-width: 100px;display: inline-block;\"></div>
                ";
            }
            // line 31
            echo "                ";
            if (array_key_exists("edit", $context)) {
                // line 32
                echo "                    <div class=\"info\">
                        <span class=\"qid\">(";
                // line 33
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getTypeLabel", [], "any", false, false, false, 33), "html", null, true);
                echo ", ID: ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 33), "html", null, true);
                echo "<span class=\"req\">, ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("VERPLICHT", [], "forms"), "html", null, true);
                echo "</span>)</span>
                    </div>
                ";
            }
            // line 36
            echo "                ";
            // line 39
            echo "            ";
        } elseif (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getType", [], "any", false, false, false, 39), [0 => "dropzone"])) {
            // line 40
            echo "                ";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getTitle", [], "any", false, false, false, 40))) {
                // line 41
                echo "                    <div class=\"field-label\" data-type=\"title\" style=\"outline:none;margin-left: 20px;line-height: 28px;min-width: 100px;display: inline-block;\"><span style=\"color:gray;\">Dropzone</span>";
                if ((( !array_key_exists("edit", $context) && twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "required", [], "any", false, false, false, 41)) && (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "hidden", [], "any", false, false, false, 41) == false))) {
                    echo "<span class=\"req\">*</span>";
                }
                echo "</div>
                ";
            }
            // line 43
            echo "                ";
            if (array_key_exists("edit", $context)) {
                // line 44
                echo "                    <div class=\"info\">
                        <span class=\"qid\">(";
                // line 45
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getTypeLabel", [], "any", false, false, false, 45), "html", null, true);
                echo ", ID: ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 45), "html", null, true);
                echo "<span class=\"req\">, ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("VERPLICHT", [], "forms"), "html", null, true);
                echo "</span>)</span>
                    </div>
                ";
            }
            // line 48
            echo "            ";
        } elseif (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getType", [], "any", false, false, false, 48), [0 => "newsletter"])) {
            // line 49
            echo "                ";
            if (array_key_exists("edit", $context)) {
                // line 50
                echo "                    <div class=\"info\">
                        <span class=\"qid\">(";
                // line 51
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getTypeLabel", [], "any", false, false, false, 51), "html", null, true);
                echo ", ID: ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 51), "html", null, true);
                echo "<span class=\"req\">, ";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("VERPLICHT", [], "forms"), "html", null, true);
                echo "</span>)</span>
                    </div>
                ";
            }
            // line 54
            echo "            ";
        }
        // line 55
        echo "            ";
        // line 56
        echo "                ";
        if (array_key_exists("edit", $context)) {
            // line 57
            echo "                    <div class=\"edit\" style=\"right:auto;left: 16px;top: 24px;\">
                        <span class=\"drag\"><i class=\"material-icons\" style=\"font-size: 20px;\">drag_handle</i></span>
                    </div>
                ";
        }
        // line 61
        echo "
                ";
        // line 62
        $this->displayBlock('field', $context, $blocks);
        // line 63
        echo "                ";
        if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getType", [], "any", false, false, false, 63), [0 => "select", 1 => "upload", 2 => "email", 3 => "email_check", 4 => "email_check", 5 => "text", 6 => "date", 7 => "textarea"])) {
            // line 64
            echo "                    ";
            if (((twig_striptags(twig_trim_filter(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getSubTitle", [], "any", false, false, false, 64))) != $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Toelichting", [], "forms")) &&  !array_key_exists("edit", $context))) {
                echo "<div class=\"sublabel form-text text-muted\" data-type=\"subtitle\" style=\"outline:none;\">";
                echo twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getSubTitle", [], "any", false, false, false, 64);
                echo "</div>";
            }
            // line 65
            echo "
                    ";
            // line 69
            echo "                ";
        }
        // line 70
        echo "                ";
        // line 71
        echo "                ";
        if (array_key_exists("edit", $context)) {
            // line 72
            echo "                    ";
            // line 77
            echo "                    ";
            // line 78
            echo "                    <input type=\"hidden\" class=\"id\" name=\"id[]\" value=\"";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 78)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 78)) : (($context["random"] ?? null))), "html", null, true);
            echo "\" />
                    <input type=\"hidden\" class=\"type\" name=\"type[]\" value=\"";
            // line 79
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "type", [], "any", false, false, false, 79), "html", null, true);
            echo "\" />
                    <input type=\"hidden\" class=\"title\" name=\"title[";
            // line 80
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 80)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 80)) : (($context["random"] ?? null))), "html", null, true);
            echo "]\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "title", [], "any", false, false, false, 80), "html", null, true);
            echo "\" />
                    ";
            // line 82
            echo "                    <input type=\"hidden\" class=\"classes\" name=\"classes[";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 82)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 82)) : (($context["random"] ?? null))), "html", null, true);
            echo "]\" value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "classes", [], "any", false, false, false, 82), "html", null, true);
            echo "\" />
                    ";
            // line 84
            echo "                    ";
            // line 85
            echo "                    <div id=\"additional";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 85)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 85)) : (($context["random"] ?? null))), "html", null, true);
            echo "\" class=\"modal\">
                        <div class=\"modal-dialog\">
                            <div class=\"modal-content\">
                                <div class=\"modal-body\">
                                    <div style=\"display:";
            // line 89
            echo ((($context["editableFields"] ?? null)) ? ("block") : ("none"));
            echo ";\">
                                        <p>
                                            <label class=\"form-label\" for=\"placeholder_";
            // line 91
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 91)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 91)) : (($context["random"] ?? null))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Placeholder", [], "forms"), "html", null, true);
            echo "</label>
                                            <input class=\"form-control\" onkeyup=\"\$('#frm-lbl-";
            // line 92
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 92)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 92)) : (($context["random"] ?? null))), "html", null, true);
            echo "').prop('placeholder', this.value);\" style=\"margin:0;\" id=\"placeholder_";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 92)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 92)) : (($context["random"] ?? null))), "html", null, true);
            echo "\" type=\"text\" name=\"placeholder[]\" value=\"";
            echo ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 92)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "placeholder", [], "any", false, false, false, 92)) : (""));
            echo "\">
                                        </p>
                                    </div>
                                    <div>
                                        <p>
                                            <label class=\"form-label\" for=\"subtitle_";
            // line 97
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 97)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 97)) : (($context["random"] ?? null))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Toelichting", [], "forms"), "html", null, true);
            echo "</label>
                                            <input class=\"form-control\" style=\"margin:0;\" id=\"subtitle_";
            // line 98
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 98)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 98)) : (($context["random"] ?? null))), "html", null, true);
            echo "\" type=\"text\" name=\"subtitle[]\" value=\"";
            echo (((twig_striptags(twig_trim_filter(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "subtitle", [], "any", false, false, false, 98))) != $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Toelichting", [], "forms"))) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "subtitle", [], "any", false, false, false, 98)) : (""));
            echo "\">
                                        </p>
                                    </div>
                                </div>
                                <div class=\"modal-footer\">
                                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">";
            // line 103
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Sluiten", [], "forms"), "html", null, true);
            echo "</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
            // line 109
            echo "                    <input style=\"display:none;\" type=\"checkbox\" ";
            echo (((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "required", [], "any", false, false, false, 109) && (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "hidden", [], "any", false, false, false, 109) == false))) ? ("checked=\"checked\"") : (""));
            echo " name=\"required[]\" id=\"require_";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 109)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 109)) : (($context["random"] ?? null))), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 109)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 109)) : (($context["random"] ?? null))), "html", null, true);
            echo "\" />
                    <input style=\"display:none;\" type=\"checkbox\" ";
            // line 110
            echo ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "hidden", [], "any", false, false, false, 110)) ? ("checked=\"checked\"") : (""));
            echo " name=\"hidden[]\" id=\"hidden_";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 110)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 110)) : (($context["random"] ?? null))), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 110)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 110)) : (($context["random"] ?? null))), "html", null, true);
            echo "\" />
                    <input style=\"display:none;\" type=\"checkbox\" ";
            // line 111
            echo ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "hiddenLabel", [], "any", false, false, false, 111)) ? ("checked=\"checked\"") : (""));
            echo " name=\"hidden_label[]\" id=\"hidden_label_";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 111)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 111)) : (($context["random"] ?? null))), "html", null, true);
            echo "\" value=\"";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 111)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 111)) : (($context["random"] ?? null))), "html", null, true);
            echo "\" />
\t\t\t\t\t";
            // line 113
            echo "                    <div class=\"edit\" style=\"top: 20px;right: 17px;\">
                        <a class=\"more\" style=\"font-size: 20px;\" data-horizontal-offset=\"-380\" data-vertical-offset=\"-200\" data-jq-dropdown=\"#jq-dropdown-";
            // line 114
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 114)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 114)) : (($context["random"] ?? null))), "html", null, true);
            echo "\" href=\"#\"><i style=\"color:black;\" class=\"material-icons\">more_horiz</i></a>
                    </div>
                    ";
            // line 116
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getType", [], "any", false, false, false, 116), [0 => "select", 1 => "checkbox", 2 => "radio"])) {
                // line 117
                echo "                        <div id=\"options";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 117)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 117)) : (($context["random"] ?? null))), "html", null, true);
                echo "\" class=\"modal modal-fixed-footer\">
                            <div class=\"modal-dialog\">
                                <div class=\"modal-content\">
                                    <div class=\"modal-body\">
                                        <h4>";
                // line 121
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Keuze opties", [], "forms"), "html", null, true);
                echo "</h4>
                                        ";
                // line 122
                $this->loadTemplate("@TrinityForms/elements/valueEditor.html.twig", "@TrinityForms/elements/row.html.twig", 122)->display(twig_array_merge($context, ["Question" => ($context["Question"] ?? null)]));
                // line 123
                echo "                                    </div>
                                    <div class=\"modal-footer\">
                                        <a href=\"#!\" class=\"add-child-value btn btn-flat\"><i class=\"fa fa-plus\"></i> ";
                // line 125
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Optie toevoegen", [], "forms"), "html", null, true);
                echo "</a>
                                        <button type=\"button\" class=\"btn btn-green\" data-bs-dismiss=\"modal\"><i class=\"fa fa-check\"></i> ";
                // line 126
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Opslaan", [], "forms"), "html", null, true);
                echo "</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ";
            }
            // line 132
            echo "
                ";
        }
        // line 134
        echo "            ";
        // line 135
        echo "            ";
        // line 138
        echo "        </div>
        ";
        // line 139
        if (array_key_exists("edit", $context)) {
            // line 140
            echo "            <div id=\"jq-dropdown-";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 140)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 140)) : (($context["random"] ?? null))), "html", null, true);
            echo "\" class=\"jq-dropdown jq-dropdown-tip jq-dropdown-anchor-right\">
                <ul class=\"jq-dropdown-menu\">
                    ";
            // line 142
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getType", [], "any", false, false, false, 142), [0 => "select", 1 => "checkbox", 2 => "radio"])) {
                // line 143
                echo "                        <li><a href=\"#\" onclick=\"\$('#options";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 143)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 143)) : (($context["random"] ?? null))), "html", null, true);
                echo "').modal('show');return false;\"><i style=\"font-size:15px;line-height: 17px;\" class=\"material-icons left\">edit</i>";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Keuze opties bewerken", [], "forms"), "html", null, true);
                echo "</a></li>
                    ";
            }
            // line 145
            echo "                    ";
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "getType", [], "any", false, false, false, 145), [0 => "select", 1 => "upload", 2 => "email", 3 => "email_check", 4 => "text", 5 => "date", 6 => "textarea", 7 => "checkbox", 8 => "radio", 9 => "canvas", 10 => "dropzone"])) {
                // line 146
                echo "                    \t<li>
\t\t\t\t\t\t\t<a href=\"#\" data-toggle=\"true\" onclick=\"if (\$(this).find('i').html() == 'check_box') {
                                \$(this).find('i').html('check_box_outline_blank');
                                \$('#q-";
                // line 149
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 149)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 149)) : (($context["random"] ?? null))), "html", null, true);
                echo "').removeClass('required');
                                \$('#require_";
                // line 150
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 150)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 150)) : (($context["random"] ?? null))), "html", null, true);
                echo "').prop('checked', false);
                            } else {
                                \$(this).find('i').html('check_box');
                                \$('#q-";
                // line 153
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 153)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 153)) : (($context["random"] ?? null))), "html", null, true);
                echo "').addClass('required');
                                \$('#require_";
                // line 154
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 154)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 154)) : (($context["random"] ?? null))), "html", null, true);
                echo "').prop('checked', true);
                            }
                            ;
                            return false;\"><i style=\"font-size:15px;line-height: 17px;\" class=\"material-icons left\">";
                // line 157
                echo (((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "required", [], "any", false, false, false, 157) && (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "hidden", [], "any", false, false, false, 157) == false))) ? ("check_box") : ("check_box_outline_blank"));
                echo "</i>";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verplichte invoer", [], "forms"), "html", null, true);
                echo "</a></li>
\t\t\t\t\t\t<li><a href=\"#\" data-toggle=\"true\" onclick=\"if (\$(this).find('i').html() == 'check_box') {
\t\t\t\t\t\t\t\t\t\$(this).find('i').html('check_box_outline_blank');
\t\t\t\t\t\t\t\t\t\$('#q-";
                // line 160
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 160)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 160)) : (($context["random"] ?? null))), "html", null, true);
                echo "').removeClass('qhidden');\$('#hidden_";
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 160)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 160)) : (($context["random"] ?? null))), "html", null, true);
                echo "').prop('checked', false);} else {
\t\t\t\t\t\t\t\t\t\$(this).find('i').html('check_box');
\t\t\t\t\t\t\t\t\t\$('#q-";
                // line 162
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 162)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 162)) : (($context["random"] ?? null))), "html", null, true);
                echo "').addClass('qhidden');
\t\t\t\t\t\t\t\t\t\$('#hidden_";
                // line 163
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 163)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 163)) : (($context["random"] ?? null))), "html", null, true);
                echo "').prop('checked', true);
\t\t\t\t\t\t\t\t}
\t\t\t\t\t\t\t\t;
\t\t\t\t\t\t\t\treturn false;\"><i style=\"font-size:15px;line-height: 17px;\" class=\"material-icons left\">";
                // line 166
                echo ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "hiddenLabel", [], "any", false, false, false, 166)) ? ("check_box") : ("check_box_outline_blank"));
                echo "</i>";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verborgen", [], "forms"), "html", null, true);
                echo "</a></li>
\t\t\t\t\t\t<li><a href=\"#\" data-toggle=\"true\" onclick=\"if (\$(this).find('i').html() == 'check_box') {
\t\t\t\t\t\t\t\t\$(this).find('i').html('check_box_outline_blank');
\t\t\t\t\t\t\t\t\$('#q-";
                // line 169
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 169)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 169)) : (($context["random"] ?? null))), "html", null, true);
                echo " .field-control').removeClass('qhidden');
\t\t\t\t\t\t\t\t\$('#hidden_label_";
                // line 170
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 170)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 170)) : (($context["random"] ?? null))), "html", null, true);
                echo "').prop('checked', false);
\t\t\t\t\t\t\t\t} else {
\t\t\t\t\t\t\t\t\$(this).find('i').html('check_box');
\t\t\t\t\t\t\t\t\$('#q-";
                // line 173
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 173)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 173)) : (($context["random"] ?? null))), "html", null, true);
                echo " .field-control').addClass('qhidden');
\t\t\t\t\t\t\t\t\$('#hidden_label_";
                // line 174
                echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 174)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 174)) : (($context["random"] ?? null))), "html", null, true);
                echo "').prop('checked', true);
\t\t\t\t\t\t\t};
\t\t\t\t\t\t\treturn false;\"><i style=\"font-size:15px;line-height: 17px;\" class=\"material-icons left\">";
                // line 176
                echo ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "hiddenLabel", [], "any", false, false, false, 176)) ? ("check_box") : ("check_box_outline_blank"));
                echo "</i>";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Verberg label", [], "forms"), "html", null, true);
                echo "</a></li>
\t\t\t\t\t\t<li class=\"jq-dropdown-divider\"></li>
                        ";
                // line 183
                echo "                        ";
                // line 185
                echo "                    ";
            }
            // line 186
            echo "                    ";
            // line 187
            echo "                    <li><a href=\"#\" onclick=\"\$('#additional";
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 187)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 187)) : (($context["random"] ?? null))), "html", null, true);
            echo "').modal('show'); return false;\"><i style=\"font-size:15px;line-height: 17px;\" class=\"material-icons left\">settings</i>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Opties", [], "forms"), "html", null, true);
            echo "</a></li>
                    ";
            // line 189
            echo "                    <li class=\"jq-dropdown-divider\"></li>
                    <li><a href=\"#5\" onclick=\"deleteQuestion(";
            // line 190
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 190)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 190)) : (($context["random"] ?? null))), "html", null, true);
            echo ");\" class=\"red-text delete\"><i style=\"font-size:15px;line-height: 17px;\" class=\"material-icons left\">clear</i>";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Vraag verwijderen", [], "forms"), "html", null, true);
            echo "</a></li>
                    <li><a data-disabled=\"true\" class=\"grey-text\"><i style=\"font-size:15px;line-height: 17px;\" class=\"material-icons left\">info_outline</i>";
            // line 191
            echo twig_escape_filter($this->env, (($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("Vraag ID:", [], "forms") . " ") . twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 191)), "html", null, true);
            echo "</a></li>
                </ul>
            </div>
        ";
        }
        // line 195
        echo "        ";
        if ( !array_key_exists("loadForm", $context)) {
            // line 196
            echo "        </div>
    </div>
";
        }
        // line 199
        if (array_key_exists("edit", $context)) {
            // line 200
            echo "    <script>
        \$('#jq-dropdown-";
            // line 201
            echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 201)) ? (twig_get_attribute($this->env, $this->source, ($context["Question"] ?? null), "id", [], "any", false, false, false, 201)) : (($context["random"] ?? null))), "html", null, true);
            echo "').on('show', function (event, dropdownData) {
            \$('body').addClass('jq-dd');
        }).on('hide', function (event, dropdownData) {
            \$('body').removeClass('jq-dd');
        });

        CKEDITOR.disableAutoInline = true;
    </script>
";
        }
    }

    // line 62
    public function block_field($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "@TrinityForms/elements/row.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  587 => 62,  573 => 201,  570 => 200,  568 => 199,  563 => 196,  560 => 195,  553 => 191,  547 => 190,  544 => 189,  537 => 187,  535 => 186,  532 => 185,  530 => 183,  523 => 176,  518 => 174,  514 => 173,  508 => 170,  504 => 169,  496 => 166,  490 => 163,  486 => 162,  479 => 160,  471 => 157,  465 => 154,  461 => 153,  455 => 150,  451 => 149,  446 => 146,  443 => 145,  435 => 143,  433 => 142,  427 => 140,  425 => 139,  422 => 138,  420 => 135,  418 => 134,  414 => 132,  405 => 126,  401 => 125,  397 => 123,  395 => 122,  391 => 121,  383 => 117,  381 => 116,  376 => 114,  373 => 113,  365 => 111,  357 => 110,  348 => 109,  340 => 103,  330 => 98,  324 => 97,  312 => 92,  306 => 91,  301 => 89,  293 => 85,  291 => 84,  284 => 82,  278 => 80,  274 => 79,  269 => 78,  267 => 77,  265 => 72,  262 => 71,  260 => 70,  257 => 69,  254 => 65,  247 => 64,  244 => 63,  242 => 62,  239 => 61,  233 => 57,  230 => 56,  228 => 55,  225 => 54,  215 => 51,  212 => 50,  209 => 49,  206 => 48,  196 => 45,  193 => 44,  190 => 43,  182 => 41,  179 => 40,  176 => 39,  174 => 36,  164 => 33,  161 => 32,  158 => 31,  150 => 29,  147 => 28,  143 => 26,  139 => 25,  123 => 24,  120 => 23,  117 => 22,  113 => 20,  109 => 19,  105 => 18,  98 => 17,  95 => 16,  92 => 15,  89 => 14,  82 => 12,  75 => 11,  73 => 10,  53 => 9,  50 => 8,  45 => 5,  43 => 4,  40 => 3,  38 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@TrinityForms/elements/row.html.twig", "/var/www/vhosts/neutral.eco/httpdocs/src/Trinity/FormsBundle/Resources/views/elements/row.html.twig");
    }
}
