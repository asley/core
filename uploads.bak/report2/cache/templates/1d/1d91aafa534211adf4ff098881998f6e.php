<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* ui/personalDocuments.twig.html */
class __TwigTemplate_e3fec58d18bdc1850e2d169ce9236114 extends Template
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
        // line 10
        yield "
";
        // line 11
        if (($context["documents"] ?? null)) {
            // line 12
            yield "    ";
            if ( !($context["noTitle"] ?? null)) {
                // line 13
                yield "    <h4>
        ";
                // line 14
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Personal Documents"), "html", null, true);
                yield "
    </h4>
    ";
            }
            // line 17
            yield "
    ";
            // line 18
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["documents"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["document"]) {
                // line 19
                yield "        ";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["document"], "documentNumber", [], "any", false, false, false, 19) != "N/A")) {
                    // line 20
                    yield "
        ";
                    // line 21
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["document"], "filePath", [], "any", false, false, false, 21)) {
                        // line 22
                        yield "        <a href=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
                        yield "/";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["document"], "filePath", [], "any", false, false, false, 22), "html", null, true);
                        yield "\" target=\"_blank\" class=\"flex flex-wrap justify-start items-center rounded bg-gray-100 hover:bg-blue-50 border hover:border-blue-500 text-gray-800 hover:text-blue-700 cursor-pointer font-sans my-2 p-4 \">
        ";
                    } else {
                        // line 24
                        yield "        <a class=\"flex flex-wrap justify-start items-center rounded bg-gray-100 border text-gray-800 font-sans my-2 p-4 \">
        ";
                    }
                    // line 26
                    yield "
            <div class=\"w-full sm:w-2/5 xl:w-1/3 flex mb-4 sm:mb-0 flex items-center\">

                ";
                    // line 29
                    yield $this->env->getFunction('icon')->getCallable()("large", Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["document"], "document", [], "any", false, false, false, 29)), "size-8 fill-current");
                    yield "

                <div class=\"ml-4\">
                    <div class=\"text-sm font-medium\">
                        ";
                    // line 33
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["document"], "name", [], "any", false, false, false, 33)), "html", null, true);
                    yield "
                    </div>
                    ";
                    // line 35
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["document"], "documentNumber", [], "any", false, false, false, 35) || CoreExtension::getAttribute($this->env, $this->source, $context["document"], "documentName", [], "any", false, false, false, 35))) {
                        // line 36
                        yield "                    <span class=\"text-xs text-gray-600\">
                        ";
                        // line 37
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["document"], "documentNumber", [], "any", false, false, false, 37), "html", null, true);
                        yield " ";
                        ((CoreExtension::getAttribute($this->env, $this->source, $context["document"], "documentName", [], "any", false, false, false, 37)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((" | " . CoreExtension::getAttribute($this->env, $this->source, $context["document"], "documentName", [], "any", false, false, false, 37)), "html", null, true)) : (yield ""));
                        yield "
                    </span>
                    ";
                    }
                    // line 40
                    yield "                </div>

            </div>

            ";
                    // line 44
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(json_decode(CoreExtension::getAttribute($this->env, $this->source, $context["document"], "fields", [], "any", false, false, false, 44)));
                    foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                        // line 45
                        yield "                ";
                        if (((($context["field"] != "documentNumber") && ($context["field"] != "documentName")) && ($context["field"] != "filePath"))) {
                            // line 46
                            yield "                <div class=\"w-1/4 sm:w-1/6 xl:w-1/5 text-gray-700\">
                    <div class=\"text-xs font-medium\">
                        ";
                            // line 48
                            if (($context["field"] == "dateIssue")) {
                                // line 49
                                yield "                            ";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Issued"), "html", null, true);
                                yield "
                        ";
                            } elseif ((                            // line 50
$context["field"] == "dateExpiry")) {
                                // line 51
                                yield "                            ";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Expiry"), "html", null, true);
                                yield "
                        ";
                            } elseif ((                            // line 52
$context["field"] == "country")) {
                                // line 53
                                yield "                            ";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Country"), "html", null, true);
                                yield "
                        ";
                            } elseif ((                            // line 54
$context["field"] == "documentType")) {
                                // line 55
                                yield "                            ";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Type"), "html", null, true);
                                yield "
                        ";
                            }
                            // line 57
                            yield "                    </div>
                    <span class=\"text-xs text-gray-600\">
                        ";
                            // line 59
                            if ((($context["field"] == "dateIssue") || ($context["field"] == "dateExpiry"))) {
                                // line 60
                                yield "                            ";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::default($this->env->getFunction('formatUsing')->getCallable()("date", (($__internal_compile_0 = $context["document"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["field"]] ?? null) : null)), $this->env->getFunction('__')->getCallable()("N/A")), "html", null, true);
                                yield "
                        ";
                            } else {
                                // line 62
                                yield "                            ";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["document"], $context["field"], [], "array", true, true, false, 62)) ? (Twig\Extension\CoreExtension::default((($__internal_compile_1 = $context["document"]) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[$context["field"]] ?? null) : null), $this->env->getFunction('__')->getCallable()("N/A"))) : ($this->env->getFunction('__')->getCallable()("N/A"))), "html", null, true);
                                yield "
                        ";
                            }
                            // line 64
                            yield "                    </span>
                </div>
                ";
                        }
                        // line 67
                        yield "            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 68
                    yield "            <div class=\"flex-grow\"></div>

            ";
                    // line 70
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["document"], "filePath", [], "any", false, false, false, 70)) {
                        // line 71
                        yield "            <div class=\"text-xs font-medium\">
                <img alt=\"";
                        // line 72
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Scanned Copy"), "html", null, true);
                        yield "\" title=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("View"), "html", null, true);
                        yield " ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["document"], "document", [], "any", false, false, false, 72)), "html", null, true);
                        yield "\" src=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
                        yield "/themes/";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonThemeName"] ?? null), "html", null, true);
                        yield "/img/zoom.png\" class=\"ml-1\" width=\"25\" height=\"25\">
            </div>
            ";
                    }
                    // line 75
                    yield "
        </a>

        ";
                }
                // line 79
                yield "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['document'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ui/personalDocuments.twig.html";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  216 => 79,  210 => 75,  196 => 72,  193 => 71,  191 => 70,  187 => 68,  181 => 67,  176 => 64,  170 => 62,  164 => 60,  162 => 59,  158 => 57,  152 => 55,  150 => 54,  145 => 53,  143 => 52,  138 => 51,  136 => 50,  131 => 49,  129 => 48,  125 => 46,  122 => 45,  118 => 44,  112 => 40,  104 => 37,  101 => 36,  99 => 35,  94 => 33,  87 => 29,  82 => 26,  78 => 24,  70 => 22,  68 => 21,  65 => 20,  62 => 19,  58 => 18,  55 => 17,  49 => 14,  46 => 13,  43 => 12,  41 => 11,  38 => 10,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
Gibbon: the flexible, open school platform
Founded by Ross Parker at ICHK Secondary. Built by Ross Parker, Sandra Kuipers and the Gibbon community (https://gibbonedu.org/about/)
Copyright © 2010, Gibbon Foundation
Gibbon™, Gibbon Education Ltd. (Hong Kong)

This is a Gibbon template file, written in HTML and Twig syntax.
For info about editing, see: https://twig.symfony.com/doc/2.x/
-->#}

{% if documents %}
    {% if not noTitle %}
    <h4>
        {{ __('Personal Documents') }}
    </h4>
    {% endif %}

    {% for document in documents %}
        {% if document.documentNumber != 'N/A' %}

        {% if document.filePath %}
        <a href=\"{{ absoluteURL }}/{{ document.filePath }}\" target=\"_blank\" class=\"flex flex-wrap justify-start items-center rounded bg-gray-100 hover:bg-blue-50 border hover:border-blue-500 text-gray-800 hover:text-blue-700 cursor-pointer font-sans my-2 p-4 \">
        {% else %}
        <a class=\"flex flex-wrap justify-start items-center rounded bg-gray-100 border text-gray-800 font-sans my-2 p-4 \">
        {% endif %}

            <div class=\"w-full sm:w-2/5 xl:w-1/3 flex mb-4 sm:mb-0 flex items-center\">

                {{ icon('large', document.document|lower, 'size-8 fill-current') }}

                <div class=\"ml-4\">
                    <div class=\"text-sm font-medium\">
                        {{ __(document.name) }}
                    </div>
                    {% if document.documentNumber or document.documentName %}
                    <span class=\"text-xs text-gray-600\">
                        {{ document.documentNumber }} {{ document.documentName ? \" | \" ~ document.documentName }}
                    </span>
                    {% endif %}
                </div>

            </div>

            {% for field in document.fields|jsonDecode %}
                {% if field != 'documentNumber' and field != 'documentName' and field != 'filePath' %}
                <div class=\"w-1/4 sm:w-1/6 xl:w-1/5 text-gray-700\">
                    <div class=\"text-xs font-medium\">
                        {% if field == 'dateIssue' %}
                            {{ __('Issued') }}
                        {% elseif field == 'dateExpiry' %}
                            {{ __('Expiry') }}
                        {% elseif field == 'country' %}
                            {{ __('Country') }}
                        {% elseif field == 'documentType' %}
                            {{ __('Type') }}
                        {% endif %}
                    </div>
                    <span class=\"text-xs text-gray-600\">
                        {% if field == 'dateIssue' or field == 'dateExpiry' %}
                            {{ formatUsing('date', document[field])|default(__('N/A')) }}
                        {% else %}
                            {{ document[field]|default(__('N/A')) }}
                        {% endif %}
                    </span>
                </div>
                {% endif %}
            {% endfor %}
            <div class=\"flex-grow\"></div>

            {% if document.filePath %}
            <div class=\"text-xs font-medium\">
                <img alt=\"{{ __('Scanned Copy') }}\" title=\"{{ __('View') }} {{ __(document.document) }}\" src=\"{{ absoluteURL }}/themes/{{ gibbonThemeName }}/img/zoom.png\" class=\"ml-1\" width=\"25\" height=\"25\">
            </div>
            {% endif %}

        </a>

        {% endif %}
    {% endfor %}
{% endif %}
", "ui/personalDocuments.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/ui/personalDocuments.twig.html");
    }
}
