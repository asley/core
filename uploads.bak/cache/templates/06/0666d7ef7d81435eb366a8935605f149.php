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

/* components/detailsTable.twig.html */
class __TwigTemplate_1264d601e75fbfbe45ecfd66175d3d79 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'table' => [$this, 'block_table'],
            'header' => [$this, 'block_header'],
            'blankslate' => [$this, 'block_blankslate'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 11
        return "components/dataTable.twig.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("components/dataTable.twig.html", "components/detailsTable.twig.html", 11);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 13
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield "    
";
        return; yield '';
    }

    // line 17
    public function block_table($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 18
        yield "
    <header class=\"relative w-full flex justify-between items-end\">
        ";
        // line 20
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        // line 34
        yield "    </header>

    ";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
        yield "

    ";
        // line 38
        if (Twig\Extension\CoreExtension::testEmpty(($context["rows"] ?? null))) {
            // line 39
            yield "        <div class=\"h-48 rounded-sm border bg-gray-100 shadow-inner overflow-hidden\">
            ";
            // line 40
            yield from $this->unwrap()->yieldBlock('blankslate', $context, $blocks);
            // line 43
            yield "        </div>
    ";
        } else {
            // line 45
            yield "    
        ";
            // line 46
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["rows"] ?? null));
            foreach ($context['_seq'] as $context["rowIndex"] => $context["rowData"]) {
                // line 47
                yield "        
            ";
                // line 48
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["groups"] ?? null));
                foreach ($context['_seq'] as $context["heading"] => $context["headingColumns"]) {
                    // line 49
                    yield "                ";
                    if ($context["heading"]) {
                        // line 50
                        yield "                    <h4>";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()($context["heading"]), "html", null, true);
                        yield "</h4>
                ";
                    }
                    // line 52
                    yield "
                <div class=\"sm:grid ";
                    // line 53
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("gridClass", $context)) ? (Twig\Extension\CoreExtension::default(($context["gridClass"] ?? null), "grid-cols-3")) : ("grid-cols-3")), "html", null, true);
                    yield " rounded border bg-gray-100 text-xs text-gray-700\">
            
                ";
                    // line 55
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable($context["headingColumns"]);
                    foreach ($context['_seq'] as $context["columnIndex"] => $context["column"]) {
                        // line 56
                        yield "
                    <div class=\"p-2 border-b -mb-px ";
                        // line 57
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "getClass", [], "any", false, false, false, 57), "html", null, true);
                        yield "\" 
                        style=\"";
                        // line 58
                        (((CoreExtension::getAttribute($this->env, $this->source, $context["column"], "getWidth", [], "any", false, false, false, 58) != "auto")) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("width: " . CoreExtension::getAttribute($this->env, $this->source, $context["column"], "getWidth", [], "any", false, false, false, 58)), "html", null, true)) : (yield ""));
                        yield "\" >
                        <span class=\"block text-sm font-bold mb-1\">";
                        // line 59
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["column"], "getLabel", [], "any", false, false, false, 59);
                        yield "</span>
                        <span class=\"block text-gray-700 overflow-x-auto\">";
                        // line 60
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["column"], "getOutput", [$context["rowData"]], "method", false, false, false, 60);
                        yield "</span>
                    </div>

                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['columnIndex'], $context['column'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 64
                    yield "                </div>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['heading'], $context['headingColumns'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 66
                yield "

        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['rowIndex'], $context['rowData'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 69
            yield "
    ";
        }
        // line 71
        yield "
";
        return; yield '';
    }

    // line 20
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 21
        yield "            ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getTitle", [], "any", false, false, false, 21)) {
            // line 22
            yield "                <h2>";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getTitle", [], "any", false, false, false, 22);
            yield "</h2>
            ";
        }
        // line 24
        yield "
            ";
        // line 25
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getHeader", [], "any", false, false, false, 25)) {
            // line 26
            yield "            <div class=\"linkTop flex-1 flex justify-end items-end gap-2 mb-2 h-10 py-px\">
                ";
            // line 27
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getHeader", [], "any", false, false, false, 27));
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 28
                yield "                    ";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["action"], "getOutput", [], "any", false, false, false, 28);
                yield "
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            yield "            </div>
            ";
        }
        // line 32
        yield "            
        ";
        return; yield '';
    }

    // line 40
    public function block_blankslate($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 41
        yield "            ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "components/blankSlate.twig.html");
        yield "
            ";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "components/detailsTable.twig.html";
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
        return array (  222 => 41,  218 => 40,  212 => 32,  208 => 30,  199 => 28,  195 => 27,  192 => 26,  190 => 25,  187 => 24,  181 => 22,  178 => 21,  174 => 20,  168 => 71,  164 => 69,  156 => 66,  149 => 64,  139 => 60,  135 => 59,  131 => 58,  127 => 57,  124 => 56,  120 => 55,  115 => 53,  112 => 52,  106 => 50,  103 => 49,  99 => 48,  96 => 47,  92 => 46,  89 => 45,  85 => 43,  83 => 40,  80 => 39,  78 => 38,  73 => 36,  69 => 34,  67 => 20,  63 => 18,  59 => 17,  50 => 13,  39 => 11,);
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

{% extends \"components/dataTable.twig.html\" %}

{% block title %}
    
{% endblock title %}

{% block table %}

    <header class=\"relative w-full flex justify-between items-end\">
        {% block header %}
            {% if table.getTitle %}
                <h2>{{ table.getTitle|raw }}</h2>
            {% endif %}

            {% if table.getHeader %}
            <div class=\"linkTop flex-1 flex justify-end items-end gap-2 mb-2 h-10 py-px\">
                {% for action in table.getHeader %}
                    {{ action.getOutput|raw }}
                {% endfor %}
            </div>
            {% endif %}
            
        {% endblock header %}
    </header>

    {{ title }}

    {% if rows is empty %}
        <div class=\"h-48 rounded-sm border bg-gray-100 shadow-inner overflow-hidden\">
            {% block blankslate %}
            {{ include('components/blankSlate.twig.html') }}
            {% endblock blankslate %}
        </div>
    {% else %}
    
        {% for rowIndex, rowData in rows %}
        
            {% for heading, headingColumns in groups %}
                {% if heading %}
                    <h4>{{ __(heading) }}</h4>
                {% endif %}

                <div class=\"sm:grid {{ gridClass|default('grid-cols-3') }} rounded border bg-gray-100 text-xs text-gray-700\">
            
                {% for columnIndex, column in headingColumns %}

                    <div class=\"p-2 border-b -mb-px {{ column.getClass }}\" 
                        style=\"{{ column.getWidth != 'auto' ? 'width: ' ~ column.getWidth }}\" >
                        <span class=\"block text-sm font-bold mb-1\">{{ column.getLabel | raw }}</span>
                        <span class=\"block text-gray-700 overflow-x-auto\">{{ column.getOutput(rowData) | raw }}</span>
                    </div>

                {% endfor %}
                </div>
            {% endfor %}


        {% endfor %}

    {% endif %}

{% endblock table %}

", "components/detailsTable.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/components/detailsTable.twig.html");
    }
}
