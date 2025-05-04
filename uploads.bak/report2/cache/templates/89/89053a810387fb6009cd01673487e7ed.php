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

/* components/paginatedTable.twig.html */
class __TwigTemplate_2e5ab6cb6f10d8db67144768ac777312 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'table' => [$this, 'block_table'],
            'header' => [$this, 'block_header'],
            'footer' => [$this, 'block_footer'],
            'filters' => [$this, 'block_filters'],
            'pageCount' => [$this, 'block_pageCount'],
            'pagination' => [$this, 'block_pagination'],
            'bulkActions' => [$this, 'block_bulkActions'],
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
        $this->parent = $this->loadTemplate("components/dataTable.twig.html", "components/paginatedTable.twig.html", 11);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 13
    public function block_table($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 14
        yield "    <div class=\"relative\">
        <div id=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getID", [], "any", false, false, false, 15), "html", null, true);
        yield "\">
            <div class=\"dataTable\" data-results=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getResultCount", [], "any", false, false, false, 16), "html", null, true);
        yield "\">
                ";
        // line 17
        yield from $this->yieldParentBlock("table", $context, $blocks);
        yield "
            </div>
        </div>

        ";
        // line 21
        yield from         $this->unwrap()->yieldBlock("bulkActions", $context, $blocks);
        yield "
    </div>

    <script>
    \$(function(){
        \$('#";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getID", [], "any", false, false, false, 26), "html", null, true);
        yield "').gibbonDataTable( '";
        yield ($context["path"] ?? null);
        yield "', ";
        yield ($context["jsonData"] ?? null);
        yield ", '";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["identifier"] ?? null), "html", null, true);
        yield "');
    });
    </script>
";
        return; yield '';
    }

    // line 32
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        yield "    <div class=\"flex items-end justify-between\" style=\"min-height:50px;\">
        <div class=\"flex items-end pb-2 ";
        // line 34
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getTotalCount", [], "any", false, false, false, 34) > 0)) ? ("h-10") : (""));
        yield "\">
            ";
        // line 35
        yield from         $this->unwrap()->yieldBlock("pageCount", $context, $blocks);
        yield "
        </div>

        ";
        // line 38
        yield from $this->yieldParentBlock("header", $context, $blocks);
        yield "
    </div>

    ";
        // line 41
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getTotalCount", [], "any", false, false, false, 41) > 0) &&  !($context["hidePagination"] ?? null))) {
            // line 42
            yield "    <div class=\"flex flex-wrap sm:flex-no-wrap items-stretch justify-between\">
        <div class=\"flex items-stretch h-full\">
            ";
            // line 44
            if ((($context["pageSize"] ?? null) && (CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getResultCount", [], "any", false, false, false, 44) > 20))) {
                // line 45
                yield "            <div class=\"relative inline-flex -mr-1 mb-2\">
                <div class=\"absolute caret z-10 mt-3 right-0 mr-5 pointer-events-none\"></div>
                ";
                // line 47
                yield ($context["pageSize"] ?? null);
                yield "
            </div>
            ";
            }
            // line 50
            yield "
            ";
            // line 51
            if (($context["filterOptions"] ?? null)) {
                // line 52
                yield "            <div class=\"relative inline-flex mb-2\">
                <div class=\"absolute caret z-10 mt-3 right-0 mr-5 pointer-events-none\"></div>
                ";
                // line 54
                yield ($context["filterOptions"] ?? null);
                yield "
            </div>
            ";
            }
            // line 57
            yield "            
            ";
            // line 58
            if ((($context["filterCriteria"] ?? null) && ($context["filterOptions"] ?? null))) {
                // line 59
                yield "            <nav class=\"inline-flex cursor-default mb-2\">
                ";
                // line 60
                yield from                 $this->unwrap()->yieldBlock("filters", $context, $blocks);
                yield "
            </nav>
            ";
            }
            // line 63
            yield "        </div>

        ";
            // line 65
            if (($context["listOptions"] ?? null)) {
                // line 66
                yield "            ";
                yield Twig\Extension\CoreExtension::include($this->env, $context, "components/listOptions.twig.html");
                yield "
        ";
            }
            // line 68
            yield "
        ";
            // line 69
            yield from             $this->unwrap()->yieldBlock("pagination", $context, $blocks);
            yield "
    </div>
    ";
        }
        return; yield '';
    }

    // line 75
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 76
        yield "    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getResultCount", [], "any", false, false, false, 76) > CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getPageSize", [], "any", false, false, false, 76))) {
            // line 77
            yield "    <div class=\"flex items-start justify-between\">

        <div class=\"flex items-start mt-2 ";
            // line 79
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getTotalCount", [], "any", false, false, false, 79) > 0)) ? ("h-10") : (""));
            yield "\">
            ";
            // line 80
            yield from             $this->unwrap()->yieldBlock("pageCount", $context, $blocks);
            yield "
        </div>

        <div class=\"flex flex-col sm:flex-row sm:items-end justify-end mt-2\">
            ";
            // line 84
            yield from             $this->unwrap()->yieldBlock("pagination", $context, $blocks);
            yield "
        </div>
    </div>
    ";
        }
        // line 88
        yield "    
";
        return; yield '';
    }

    // line 92
    public function block_filters($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 93
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["filterCriteria"] ?? null));
        foreach ($context['_seq'] as $context["name"] => $context["label"]) {
            // line 94
            yield "        <button type=\"button\" class=\"filter inline-flex items-center -mx-px py-2 px-3 text-xxs border-0 ring-1 ring-inset ring-blue-700 bg-blue-500 hover:bg-blue-600 z-10 text-white font-semibold\" data-filter=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["name"], "html", null, true);
            yield "\">
            ";
            // line 95
            yield $context["label"];
            yield "
        </button>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['label'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 98
        yield "    
    <button type=\"button\" class=\"filter inline-flex items-center px-1.5 rounded-r-md text-xxs bg-white border-0 ring-1 ring-inset ring-gray-400 text-gray-600 hover:bg-gray-200 font-semibold clear\">
        <span class=\"sr-only\">
            ";
        // line 101
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Clear"), "html", null, true);
        yield "
        </span>
        ";
        // line 103
        yield $this->env->getFunction('icon')->getCallable()("basic", "x-mark", "size-5");
        yield "
    </button>

";
        return; yield '';
    }

    // line 109
    public function block_pageCount($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 110
        yield "    ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getTotalCount", [], "any", false, false, false, 110) > 0)) {
            // line 111
            yield "    <div class=\"text-xs text-gray-700\">
        ";
            // line 112
            ((($context["searchText"] ?? null)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($this->env->getFunction('__')->getCallable()("Search") . " "), "html", null, true)) : (yield ""));
            yield "

        ";
            // line 114
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "isSubset", [], "any", false, false, false, 114)) ? ($this->env->getFunction('__')->getCallable()("Results")) : ($this->env->getFunction('__')->getCallable()("Records"))), "html", null, true);
            yield "

        ";
            // line 116
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "count", [], "any", false, false, false, 116) > 0)) {
                // line 117
                yield "            <span class=\"font-medium\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getPageFrom", [], "any", false, false, false, 117), "html", null, true);
                yield "</span>
            ";
                // line 118
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("to"), "html", null, true);
                yield "
            <span class=\"font-medium\">";
                // line 119
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getPageTo", [], "any", false, false, false, 119), "html", null, true);
                yield "</span> ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("of"), "html", null, true);
                yield "
        ";
            }
            // line 120
            yield " 
        
        <span class=\"font-medium\">";
            // line 122
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getResultCount", [], "any", false, false, false, 122)), "html", null, true);
            yield "</span>
    </div>
    ";
        }
        return; yield '';
    }

    // line 128
    public function block_pagination($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 129
        yield "    
    ";
        // line 130
        $context["buttonStyle"] = " relative inline-flex items-center text-sm sm:text-xs font-semibold ring-1 focus:outline-offset-0";
        // line 131
        yield "    
    ";
        // line 132
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getResultCount", [], "any", false, false, false, 132) > CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getPageSize", [], "any", false, false, false, 132)) || ($context["filterOptions"] ?? null))) {
            // line 133
            yield "    <nav class=\"pagination isolate mb-2 inline-flex rounded-md\" aria-label=\"Pagination\">
        <button type=\"button\" class=\"paginate px-1.5 rounded-l-md bg-white text-gray-600 ring-gray-400  ";
            // line 134
            yield (( !CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "isFirstPage", [], "any", false, false, false, 134)) ? ("cursor-pointer hover:bg-gray-200") : (""));
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonStyle"] ?? null), "html", null, true);
            yield "\" data-page=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getPrevPageNumber", [], "any", false, false, false, 134), "html", null, true);
            yield "\" ";
            yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "isFirstPage", [], "any", false, false, false, 134)) ? ("disabled") : (""));
            yield ">
            <span class=\"sr-only\">
                ";
            // line 136
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Prev"), "html", null, true);
            yield "
            </span>
            ";
            // line 138
            yield $this->env->getFunction('icon')->getCallable()("basic", "chevron-left", "size-5");
            yield "
        </button>";
            // line 141
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getPaginatedRange", [], "any", false, false, false, 141));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 142
                if (($context["page"] == "...")) {
                    // line 143
                    yield "<button type=\"button\" class=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonStyle"] ?? null), "html", null, true);
                    yield " hidden bg-white text-gray-600 sm:inline-flex px-4 sm:px-3 py-2 ring-gray-400\" disabled>...</button>";
                } else {
                    // line 145
                    yield "<button type=\"button\" class=\"paginate ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonStyle"] ?? null), "html", null, true);
                    yield " px-4 sm:px-3 py-2 ";
                    yield ((($context["page"] == CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getPage", [], "any", false, false, false, 145))) ? ("z-20 bg-blue-500 hover:bg-blue-600 ring-blue-700 text-white relative") : ("z-10 hidden sm:inline-flex bg-white text-gray-600 cursor-pointer hover:bg-gray-200 ring-gray-400"));
                    yield "\" data-page=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                    yield "\" ";
                    yield ((($context["page"] == CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getPage", [], "any", false, false, false, 145))) ? ("aria-current=\"page\"") : (""));
                    yield ">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                    yield "</button>";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 149
            yield "<button type=\"button\" class=\"paginate px-1.5 rounded-r-md bg-white text-gray-600 ring-gray-400  ";
            yield (( !CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "isLastPage", [], "any", false, false, false, 149)) ? ("cursor-pointer hover:bg-gray-200") : (""));
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonStyle"] ?? null), "html", null, true);
            yield "\" data-page=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getNextPageNumber", [], "any", false, false, false, 149), "html", null, true);
            yield "\" ";
            yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "isLastPage", [], "any", false, false, false, 149)) ? ("disabled") : (""));
            yield ">
            <span class=\"sr-only\">
                ";
            // line 151
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Next"), "html", null, true);
            yield "
            </span>
            ";
            // line 153
            yield $this->env->getFunction('icon')->getCallable()("basic", "chevron-right", "size-5");
            yield "
        </button>
    </nav>
    ";
        }
        // line 157
        yield "    
";
        return; yield '';
    }

    // line 161
    public function block_bulkActions($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 162
        yield "    ";
        if (($context["bulkActions"] ?? null)) {
            // line 163
            yield "    <div class=\"bulkActionPanel hidden absolute top-0 right-0 w-full flex items-center justify-between p-1 pt-2 bg-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
            yield "-600 rounded-t-md z-20\">
        <div class=\"bulkActionCount flex-grow text-white text-sm text-right pr-3\">
            <span>0</span> ";
            // line 165
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Selected"), "html", null, true);
            yield "
        </div>
        
        ";
            // line 168
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["bulkActions"] ?? null), "getOutput", [], "any", false, false, false, 168);
            yield "

        <script>
            ";
            // line 171
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["bulkActions"] ?? null), "getValidationOutput", [], "any", false, false, false, 171);
            yield "
        </script>
    </div>
    ";
        }
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "components/paginatedTable.twig.html";
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
        return array (  440 => 171,  434 => 168,  428 => 165,  422 => 163,  419 => 162,  415 => 161,  409 => 157,  402 => 153,  397 => 151,  385 => 149,  368 => 145,  363 => 143,  361 => 142,  357 => 141,  353 => 138,  348 => 136,  337 => 134,  334 => 133,  332 => 132,  329 => 131,  327 => 130,  324 => 129,  320 => 128,  311 => 122,  307 => 120,  300 => 119,  296 => 118,  291 => 117,  289 => 116,  284 => 114,  279 => 112,  276 => 111,  273 => 110,  269 => 109,  260 => 103,  255 => 101,  250 => 98,  241 => 95,  236 => 94,  231 => 93,  227 => 92,  221 => 88,  214 => 84,  207 => 80,  203 => 79,  199 => 77,  196 => 76,  192 => 75,  183 => 69,  180 => 68,  174 => 66,  172 => 65,  168 => 63,  162 => 60,  159 => 59,  157 => 58,  154 => 57,  148 => 54,  144 => 52,  142 => 51,  139 => 50,  133 => 47,  129 => 45,  127 => 44,  123 => 42,  121 => 41,  115 => 38,  109 => 35,  105 => 34,  102 => 33,  98 => 32,  83 => 26,  75 => 21,  68 => 17,  64 => 16,  60 => 15,  57 => 14,  53 => 13,  42 => 11,);
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

{% block table %}
    <div class=\"relative\">
        <div id=\"{{ table.getID }}\">
            <div class=\"dataTable\" data-results=\"{{ dataSet.getResultCount }}\">
                {{ parent() }}
            </div>
        </div>

        {{ block('bulkActions') }}
    </div>

    <script>
    \$(function(){
        \$('#{{ table.getID }}').gibbonDataTable( '{{ path|raw }}', {{ jsonData|raw }}, '{{ identifier }}');
    });
    </script>
{% endblock table %}


{% block header %}
    <div class=\"flex items-end justify-between\" style=\"min-height:50px;\">
        <div class=\"flex items-end pb-2 {{ dataSet.getTotalCount > 0 ? 'h-10' : '' }}\">
            {{ block('pageCount') }}
        </div>

        {{ parent() }}
    </div>

    {% if dataSet.getTotalCount > 0 and not hidePagination %}
    <div class=\"flex flex-wrap sm:flex-no-wrap items-stretch justify-between\">
        <div class=\"flex items-stretch h-full\">
            {% if pageSize and dataSet.getResultCount > 20 %}
            <div class=\"relative inline-flex -mr-1 mb-2\">
                <div class=\"absolute caret z-10 mt-3 right-0 mr-5 pointer-events-none\"></div>
                {{ pageSize|raw }}
            </div>
            {% endif %}

            {% if filterOptions %}
            <div class=\"relative inline-flex mb-2\">
                <div class=\"absolute caret z-10 mt-3 right-0 mr-5 pointer-events-none\"></div>
                {{ filterOptions|raw }}
            </div>
            {% endif %}
            
            {% if filterCriteria and filterOptions %}
            <nav class=\"inline-flex cursor-default mb-2\">
                {{ block('filters') }}
            </nav>
            {% endif %}
        </div>

        {% if listOptions %}
            {{ include('components/listOptions.twig.html') }}
        {% endif %}

        {{ block('pagination') }}
    </div>
    {% endif %}
{% endblock header %}


{% block footer %}
    {% if dataSet.getResultCount > dataSet.getPageSize %}
    <div class=\"flex items-start justify-between\">

        <div class=\"flex items-start mt-2 {{ dataSet.getTotalCount > 0 ? 'h-10' : '' }}\">
            {{ block('pageCount') }}
        </div>

        <div class=\"flex flex-col sm:flex-row sm:items-end justify-end mt-2\">
            {{ block('pagination') }}
        </div>
    </div>
    {% endif %}
    
{% endblock footer %}


{% block filters %}
    {% for name, label in filterCriteria %}
        <button type=\"button\" class=\"filter inline-flex items-center -mx-px py-2 px-3 text-xxs border-0 ring-1 ring-inset ring-blue-700 bg-blue-500 hover:bg-blue-600 z-10 text-white font-semibold\" data-filter=\"{{ name }}\">
            {{ label|raw }}
        </button>
    {% endfor %}
    
    <button type=\"button\" class=\"filter inline-flex items-center px-1.5 rounded-r-md text-xxs bg-white border-0 ring-1 ring-inset ring-gray-400 text-gray-600 hover:bg-gray-200 font-semibold clear\">
        <span class=\"sr-only\">
            {{ __('Clear') }}
        </span>
        {{ icon('basic', 'x-mark', 'size-5' ) }}
    </button>

{% endblock filters %}


{% block pageCount %}
    {% if dataSet.getTotalCount > 0 %}
    <div class=\"text-xs text-gray-700\">
        {{ searchText ? __('Search') ~ \" \" }}

        {{ dataSet.isSubset ? __('Results') : __('Records') }}

        {% if dataSet.count > 0 %}
            <span class=\"font-medium\">{{ dataSet.getPageFrom }}</span>
            {{ __('to') }}
            <span class=\"font-medium\">{{ dataSet.getPageTo }}</span> {{ __('of') }}
        {% endif %} 
        
        <span class=\"font-medium\">{{ dataSet.getResultCount|number_format }}</span>
    </div>
    {% endif %}
{% endblock pageCount %}


{% block pagination %}
    
    {% set buttonStyle = ' relative inline-flex items-center text-sm sm:text-xs font-semibold ring-1 focus:outline-offset-0' %}
    
    {% if dataSet.getResultCount > dataSet.getPageSize or filterOptions %}
    <nav class=\"pagination isolate mb-2 inline-flex rounded-md\" aria-label=\"Pagination\">
        <button type=\"button\" class=\"paginate px-1.5 rounded-l-md bg-white text-gray-600 ring-gray-400  {{ not dataSet.isFirstPage ? 'cursor-pointer hover:bg-gray-200'}} {{ buttonStyle }}\" data-page=\"{{ dataSet.getPrevPageNumber }}\" {{ dataSet.isFirstPage ? 'disabled'}}>
            <span class=\"sr-only\">
                {{ __('Prev') }}
            </span>
            {{ icon('basic', 'chevron-left', 'size-5' ) }}
        </button>

        {%- for page in dataSet.getPaginatedRange -%}
            {%- if page == '...' -%}
                <button type=\"button\" class=\"{{ buttonStyle }} hidden bg-white text-gray-600 sm:inline-flex px-4 sm:px-3 py-2 ring-gray-400\" disabled>...</button>
            {%- else -%}
                <button type=\"button\" class=\"paginate {{ buttonStyle }} px-4 sm:px-3 py-2 {{ page == dataSet.getPage ? 'z-20 bg-blue-500 hover:bg-blue-600 ring-blue-700 text-white relative' : 'z-10 hidden sm:inline-flex bg-white text-gray-600 cursor-pointer hover:bg-gray-200 ring-gray-400' }}\" data-page=\"{{ page }}\" {{ page == dataSet.getPage ? 'aria-current=\"page\"' }}>{{ page }}</button>
            {%- endif -%}
        {%- endfor -%}

        <button type=\"button\" class=\"paginate px-1.5 rounded-r-md bg-white text-gray-600 ring-gray-400  {{ not dataSet.isLastPage ? 'cursor-pointer hover:bg-gray-200'}} {{ buttonStyle }}\" data-page=\"{{ dataSet.getNextPageNumber }}\" {{ dataSet.isLastPage ? 'disabled'}}>
            <span class=\"sr-only\">
                {{ __('Next') }}
            </span>
            {{ icon('basic', 'chevron-right', 'size-5' ) }}
        </button>
    </nav>
    {% endif %}
    
{% endblock pagination %}


{% block bulkActions %}
    {% if bulkActions %}
    <div class=\"bulkActionPanel hidden absolute top-0 right-0 w-full flex items-center justify-between p-1 pt-2 bg-{{ themeColour }}-600 rounded-t-md z-20\">
        <div class=\"bulkActionCount flex-grow text-white text-sm text-right pr-3\">
            <span>0</span> {{ __('Selected') }}
        </div>
        
        {{ bulkActions.getOutput|raw }}

        <script>
            {{ bulkActions.getValidationOutput|raw }}
        </script>
    </div>
    {% endif %}
{% endblock bulkActions %}

", "components/paginatedTable.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/components/paginatedTable.twig.html");
    }
}
