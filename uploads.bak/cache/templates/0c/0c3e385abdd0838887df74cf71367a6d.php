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

/* components/dataTable.twig.html */
class __TwigTemplate_8c5ddf0ccb560adde5d221a4f0c81f74 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'table' => [$this, 'block_table'],
            'header' => [$this, 'block_header'],
            'blankslate' => [$this, 'block_blankslate'],
            'tableInner' => [$this, 'block_tableInner'],
            'actions' => [$this, 'block_actions'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        yield "
";
        // line 11
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getTitle", [], "any", false, false, false, 11)) {
            // line 12
            yield "    ";
            yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        }
        // line 16
        yield "
";
        // line 17
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getDescription", [], "any", false, false, false, 17)) {
            // line 18
            yield "    <p>";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getDescription", [], "any", false, false, false, 18);
            yield "</p>
";
        }
        // line 20
        yield "
";
        // line 21
        yield from $this->unwrap()->yieldBlock('table', $context, $blocks);
        // line 139
        yield "


";
        return; yield '';
    }

    // line 12
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 13
        yield "    <h2>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getTitle", [], "any", false, false, false, 13), "html", null, true);
        yield "</h2>
    ";
        return; yield '';
    }

    // line 21
    public function block_table($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 22
        yield "
    <header class=\"relative\">
        ";
        // line 24
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        // line 35
        yield "    </header>

    <div id=\"";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getID", [], "any", false, false, false, 37), "html", null, true);
        yield "\" class=\"dataTable ";
        yield (( !($context["preventOverflow"] ?? null)) ? ("overflow-x-auto overflow-y-visible") : (""));
        yield "\">

   
    ";
        // line 40
        if ((( !($context["rows"] ?? null) &&  !($context["isFiltered"] ?? null)) && (CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getResultCount", [], "any", false, false, false, 40) == 0))) {
            // line 41
            yield "    <div class=\"h-32 rounded-sm border bg-gray-100 shadow-inner overflow-hidden\">
        ";
            // line 42
            yield from $this->unwrap()->yieldBlock('blankslate', $context, $blocks);
            // line 45
            yield "    </div>
    ";
        } else {
            // line 47
            yield "
    ";
            // line 48
            yield from $this->unwrap()->yieldBlock('tableInner', $context, $blocks);
            // line 129
            yield "    ";
        }
        // line 130
        yield "
    </div>

    <footer>
    ";
        // line 134
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        // line 136
        yield "    </footer>

";
        return; yield '';
    }

    // line 24
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        yield "    
            ";
        // line 26
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getHeader", [], "any", false, false, false, 26)) {
            // line 27
            yield "            <div class=\"linkTop mt-0 flex justify-end gap-2 mb-2 h-10 py-px\">
                ";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getHeader", [], "any", false, false, false, 28));
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 29
                yield "                    ";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["action"], "getOutput", [], "any", false, false, false, 29);
                yield "
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            yield "            </div>
            ";
        }
        // line 33
        yield "            
        ";
        return; yield '';
    }

    // line 42
    public function block_blankslate($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 43
        yield "        ";
        yield Twig\Extension\CoreExtension::include($this->env, $context, "components/blankSlate.twig.html");
        yield "
        ";
        return; yield '';
    }

    // line 48
    public function block_tableInner($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 49
        yield "
        <table class=\"";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["class"] ?? null), "html", null, true);
        yield " w-full mb-2 relative\" cellspacing=0 ";
        if (($context["draggable"] ?? null)) {
            yield "data-draggable=\"true\" hx-post=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["draggable"] ?? null), "url", [], "any", false, false, false, 50), "html", null, true);
            yield "\" hx-trigger=\"end\" hx-swap=\"none\" hx-include=\"this\" hx-vals=\"";
            ((( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["draggable"] ?? null), "data", [], "any", false, false, false, 50)) && (CoreExtension::getAttribute($this->env, $this->source, ($context["draggable"] ?? null), "data", [], "any", false, false, false, 50) != "[]"))) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["draggable"] ?? null), "data", [], "any", false, false, false, 50), "html", null, true)) : (yield ""));
            yield "\"";
        }
        yield ">
            <thead class=\"sticky top-0 z-20\">
            ";
        // line 52
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["headers"] ?? null));
        foreach ($context['_seq'] as $context["rowIndex"] => $context["headerRow"]) {
            // line 53
            yield "
                <tr class=\"head text-xs\">
                ";
            // line 55
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["columns"] ?? null));
            foreach ($context['_seq'] as $context["columnIndex"] => $context["column"]) {
                // line 56
                yield "                    ";
                $context["th"] = (($__internal_compile_0 = $context["headerRow"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["columnIndex"]] ?? null) : null);
                // line 57
                yield "                    ";
                if (($context["th"] ?? null)) {
                    // line 58
                    yield "                    <th ";
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["th"] ?? null), "getAttributeString", [], "any", false, false, false, 58);
                    yield " style=\"width: ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "getWidth", [], "any", false, false, false, 58), "html", null, true);
                    yield "; ";
                    ((($context["rowIndex"] > 0)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((("top: " . (2.83 * $context["rowIndex"])) . "rem"), "html", null, true)) : (yield ""));
                    yield "\">
                        ";
                    // line 59
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["th"] ?? null), "getOutput", [], "any", false, false, false, 59);
                    yield "

                        ";
                    // line 61
                    if (CoreExtension::getAttribute($this->env, $this->source, ($context["th"] ?? null), "getData", ["description"], "method", false, false, false, 61)) {
                        // line 62
                        yield "                            <br/><small><i>";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["th"] ?? null), "getData", ["description"], "method", false, false, false, 62), "html", null, true);
                        yield "</i></small>
                        ";
                    }
                    // line 64
                    yield "                    </th>
                    ";
                }
                // line 66
                yield "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['columnIndex'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            yield "                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['rowIndex'], $context['headerRow'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        yield "            </thead>

            <tbody>
            ";
        // line 72
        if (( !($context["rows"] ?? null) && ($context["isFiltered"] ?? null))) {
            // line 73
            yield "                <tr class=\"h-48 bg-gray-100 shadow-inner\">
                    <td class=\"p-0\" colspan=\"";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["columns"] ?? null)), "html", null, true);
            yield "\">
                    ";
            // line 75
            yield from             $this->unwrap()->yieldBlock("blankslate", $context, $blocks);
            yield "
                    </td>
                </tr>
            ";
        }
        // line 79
        yield "
            ";
        // line 80
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["rowIndex"] => $context["rowData"]) {
            // line 81
            yield "                ";
            $context["row"] = CoreExtension::getAttribute($this->env, $this->source, $context["rowData"], "row", [], "any", false, false, false, 81);
            // line 82
            yield "
                ";
            // line 83
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["row"] ?? null), "getPrepended", [], "any", false, false, false, 83);
            yield "

                <tr ";
            // line 85
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["row"] ?? null), "getAttributeString", [], "any", false, false, false, 85);
            yield ">

                    ";
            // line 87
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["columns"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["columnIndex"] => $context["column"]) {
                // line 88
                yield "                        ";
                $context["cell"] = (($__internal_compile_1 = CoreExtension::getAttribute($this->env, $this->source, $context["rowData"], "cells", [], "any", false, false, false, 88)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[$context["columnIndex"]] ?? null) : null);
                // line 89
                yield "                        
                        <td ";
                // line 90
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["cell"] ?? null), "getAttributeString", [], "any", false, false, false, 90);
                yield " style=\"width: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "getWidth", [], "any", false, false, false, 90), "html", null, true);
                yield ";\">
                            ";
                // line 91
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["cell"] ?? null), "getPrepended", [], "any", false, false, false, 91);
                yield "

                            ";
                // line 93
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["column"], "getID", [], "any", false, false, false, 93) == "actions")) {
                    yield " 
                                ";
                    // line 94
                    yield from $this->unwrap()->yieldBlock('actions', $context, $blocks);
                    // line 114
                    yield "
                            ";
                } else {
                    // line 116
                    yield "                                ";
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["column"], "getOutput", [CoreExtension::getAttribute($this->env, $this->source, $context["rowData"], "data", [], "any", false, false, false, 116)], "method", false, false, false, 116);
                    yield "
                            ";
                }
                // line 118
                yield "
                            ";
                // line 119
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["cell"] ?? null), "getAppended", [], "any", false, false, false, 119);
                yield "
                        </td>
                    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['columnIndex'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 122
            yield "                </tr>

                ";
            // line 124
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["row"] ?? null), "getAppended", [], "any", false, false, false, 124);
            yield "
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['rowIndex'], $context['rowData'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 126
        yield "            </tbody>
        </table>
    ";
        return; yield '';
    }

    // line 94
    public function block_actions($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 95
        yield "                                <nav class=\"relative \" x-data=\"{ open: false }\" x-on:keydown.escape.prevent.stop=\"open = false\" @click.outside=\"open = false\">
                                    ";
        // line 96
        CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "getOutput", [CoreExtension::getAttribute($this->env, $this->source, ($context["rowData"] ?? null), "data", [], "any", false, false, false, 96)], "method", false, false, false, 96);
        // line 97
        yield "                                    ";
        $context["actions"] = CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "getActions", [], "any", false, false, false, 97);
        // line 98
        yield "
                                    <div  ";
        // line 99
        yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["actions"] ?? null)) > 1)) ? ("x-cloak=\"mobile\" :class=\"{'block': open, 'hidden sm:flex': !open}\"") : (""));
        yield " class=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "getClass", [], "method", false, false, false, 99), "html", null, true);
        yield " ";
        yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["actions"] ?? null)) == 1)) ? ("justify-center sm:justify-start") : ("justify-start sm:flex absolute sm:static top-0 right-0 p-4 -mr-1 -mt-5 rounded-lg ring ring-2 ring-inset ring-blue-500 sm:ring-0 shadow sm:shadow-none bg-white sm:bg-transparent sm:m-0 sm:p-0"));
        yield " flex  gap-4 sm:gap-2\" >
                                        ";
        // line 100
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["actions"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["actionName"] => $context["action"]) {
            // line 101
            yield "                                            ";
            CoreExtension::getAttribute($this->env, $this->source, $context["action"], "displayLabel", [CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 101)], "method", false, false, false, 101);
            // line 102
            yield "                                            ";
            yield CoreExtension::getAttribute($this->env, $this->source, $context["action"], "getOutput", [CoreExtension::getAttribute($this->env, $this->source, ($context["rowData"] ?? null), "data", [], "any", false, false, false, 102), CoreExtension::getAttribute($this->env, $this->source, ($context["column"] ?? null), "getParams", [], "any", false, false, false, 102)], "method", false, false, false, 102);
            yield "
                                        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['actionName'], $context['action'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 104
        yield "                                    </div>

                                    ";
        // line 106
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["actions"] ?? null)) > 1)) {
            // line 107
            yield "                                    <button type=\"button\" @click=\"open = true\" class=\"block sm:hidden rounded-md mx-auto my-1 p-1 shadow-sm bg-white border border-gray-400 hover:bg-gray-100 text-gray-600 hover:text-gray-900 font-sans font-bold leading-none\" >
                                        ";
            // line 108
            yield $this->env->getFunction('icon')->getCallable()("basic", "ellipsis-horizontal", "pointer-events-none block size-7 sm:size-6");
            yield "
                                    </button>
                                    ";
        }
        // line 111
        yield "                                </nav>

                                ";
        return; yield '';
    }

    // line 134
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield "    ";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "components/dataTable.twig.html";
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
        return array (  485 => 134,  478 => 111,  472 => 108,  469 => 107,  467 => 106,  463 => 104,  446 => 102,  443 => 101,  426 => 100,  418 => 99,  415 => 98,  412 => 97,  410 => 96,  407 => 95,  403 => 94,  396 => 126,  388 => 124,  384 => 122,  367 => 119,  364 => 118,  358 => 116,  354 => 114,  352 => 94,  348 => 93,  343 => 91,  337 => 90,  334 => 89,  331 => 88,  314 => 87,  309 => 85,  304 => 83,  301 => 82,  298 => 81,  294 => 80,  291 => 79,  284 => 75,  280 => 74,  277 => 73,  275 => 72,  270 => 69,  263 => 67,  257 => 66,  253 => 64,  247 => 62,  245 => 61,  240 => 59,  231 => 58,  228 => 57,  225 => 56,  221 => 55,  217 => 53,  213 => 52,  200 => 50,  197 => 49,  193 => 48,  185 => 43,  181 => 42,  175 => 33,  171 => 31,  162 => 29,  158 => 28,  155 => 27,  153 => 26,  150 => 25,  146 => 24,  139 => 136,  137 => 134,  131 => 130,  128 => 129,  126 => 48,  123 => 47,  119 => 45,  117 => 42,  114 => 41,  112 => 40,  104 => 37,  100 => 35,  98 => 24,  94 => 22,  90 => 21,  82 => 13,  78 => 12,  70 => 139,  68 => 21,  65 => 20,  59 => 18,  57 => 17,  54 => 16,  50 => 12,  48 => 11,  45 => 10,);
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

{% if table.getTitle %}
    {% block title %}
    <h2>{{ table.getTitle }}</h2>
    {% endblock title %}
{% endif %}

{% if table.getDescription %}
    <p>{{ table.getDescription|raw }}</p>
{% endif %}

{% block table %}

    <header class=\"relative\">
        {% block header %}
    
            {% if table.getHeader %}
            <div class=\"linkTop mt-0 flex justify-end gap-2 mb-2 h-10 py-px\">
                {% for action in table.getHeader %}
                    {{ action.getOutput|raw }}
                {% endfor %}
            </div>
            {% endif %}
            
        {% endblock header %}
    </header>

    <div id=\"{{ table.getID }}\" class=\"dataTable {{ not preventOverflow ? 'overflow-x-auto overflow-y-visible' : '' }}\">

   
    {% if not rows and not isFiltered and dataSet.getResultCount == 0 %}
    <div class=\"h-32 rounded-sm border bg-gray-100 shadow-inner overflow-hidden\">
        {% block blankslate %}
        {{ include('components/blankSlate.twig.html') }}
        {% endblock blankslate %}
    </div>
    {% else %}

    {% block tableInner %}

        <table class=\"{{ class }} w-full mb-2 relative\" cellspacing=0 {% if draggable %}data-draggable=\"true\" hx-post=\"{{ draggable.url }}\" hx-trigger=\"end\" hx-swap=\"none\" hx-include=\"this\" hx-vals=\"{{ draggable.data is not empty and draggable.data != '[]' ? draggable.data : '' }}\"{% endif %}>
            <thead class=\"sticky top-0 z-20\">
            {% for rowIndex, headerRow in headers %}

                <tr class=\"head text-xs\">
                {% for columnIndex, column in columns %}
                    {% set th = headerRow[columnIndex] %}
                    {% if th %}
                    <th {{ th.getAttributeString|raw }} style=\"width: {{ column.getWidth }}; {{ rowIndex > 0 ? 'top: '~(2.83 * rowIndex)~'rem' }}\">
                        {{ th.getOutput|raw }}

                        {% if th.getData('description') %}
                            <br/><small><i>{{ th.getData('description') }}</i></small>
                        {% endif %}
                    </th>
                    {% endif %}
                {% endfor %}
                </tr>
            {% endfor %}
            </thead>

            <tbody>
            {% if not rows and isFiltered %}
                <tr class=\"h-48 bg-gray-100 shadow-inner\">
                    <td class=\"p-0\" colspan=\"{{ columns|length }}\">
                    {{ block('blankslate') }}
                    </td>
                </tr>
            {% endif %}

            {% for rowIndex, rowData in rows %}
                {% set row = rowData.row %}

                {{ row.getPrepended|raw }}

                <tr {{ row.getAttributeString|raw }}>

                    {% for columnIndex, column in columns %}
                        {% set cell = rowData.cells[columnIndex] %}
                        
                        <td {{ cell.getAttributeString|raw }} style=\"width: {{ column.getWidth }};\">
                            {{ cell.getPrepended|raw }}

                            {% if column.getID == \"actions\" %} 
                                {% block actions %}
                                <nav class=\"relative \" x-data=\"{ open: false }\" x-on:keydown.escape.prevent.stop=\"open = false\" @click.outside=\"open = false\">
                                    {% do column.getOutput(rowData.data) %}
                                    {% set actions = column.getActions %}

                                    <div  {{ actions|length > 1 ? 'x-cloak=\"mobile\" :class=\"{\\'block\\': open, \\'hidden sm:flex\\': !open}\"' }} class=\"{{ column.getClass() }} {{ actions|length == 1 ? 'justify-center sm:justify-start' : 'justify-start sm:flex absolute sm:static top-0 right-0 p-4 -mr-1 -mt-5 rounded-lg ring ring-2 ring-inset ring-blue-500 sm:ring-0 shadow sm:shadow-none bg-white sm:bg-transparent sm:m-0 sm:p-0' }} flex  gap-4 sm:gap-2\" >
                                        {% for actionName, action in actions %}
                                            {% do action.displayLabel(loop.first) %}
                                            {{ action.getOutput(rowData.data, column.getParams)|raw }}
                                        {% endfor %}
                                    </div>

                                    {% if actions|length > 1 %}
                                    <button type=\"button\" @click=\"open = true\" class=\"block sm:hidden rounded-md mx-auto my-1 p-1 shadow-sm bg-white border border-gray-400 hover:bg-gray-100 text-gray-600 hover:text-gray-900 font-sans font-bold leading-none\" >
                                        {{ icon('basic', 'ellipsis-horizontal', 'pointer-events-none block size-7 sm:size-6' ) }}
                                    </button>
                                    {% endif %}
                                </nav>

                                {% endblock actions %}

                            {% else %}
                                {{ column.getOutput(rowData.data)|raw }}
                            {% endif %}

                            {{ cell.getAppended|raw }}
                        </td>
                    {% endfor %}
                </tr>

                {{ row.getAppended|raw }}
            {% endfor %}
            </tbody>
        </table>
    {% endblock tableInner %}
    {% endif %}

    </div>

    <footer>
    {% block footer %}
    {% endblock footer %}
    </footer>

{% endblock table %}



", "components/dataTable.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/components/dataTable.twig.html");
    }
}
