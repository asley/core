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

/* ui/pagination.twig.html */
class __TwigTemplate_766c437a6220779ef58f25f65f7dd4da extends Template
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
<div class=\"flex flex-wrap sm:flex-no-wrap items-center justify-between mt-4\">

    ";
        // line 13
        if (($context["filterOptions"] ?? null)) {
            // line 14
            yield "    <div class=\"relative mb-2\">
        <div class=\"absolute caret z-10 mt-3 right-0 mr-5 pointer-events-none\"></div>
        ";
            // line 16
            yield ($context["filterOptions"] ?? null);
            yield "
    </div>
    ";
        }
        // line 19
        yield "    
    <div class=\"flex items-center h-full\">

        ";
        // line 22
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getTotalCount", [], "any", false, false, false, 22) > 0)) {
            // line 23
            yield "        <div class=\"text-xs\">
            ";
            // line 24
            ((($context["searchText"] ?? null)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($this->env->getFunction('__')->getCallable()("Search") . " "), "html", null, true)) : (yield ""));
            yield "

            ";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "isSubset", [], "any", false, false, false, 26)) ? ($this->env->getFunction('__')->getCallable()("Results")) : ($this->env->getFunction('__')->getCallable()("Records"))), "html", null, true);
            yield "

            ";
            // line 28
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "count", [], "any", false, false, false, 28) > 0)) {
                // line 29
                yield "                ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getPageFrom", [], "any", false, false, false, 29), "html", null, true);
                yield "-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getPageTo", [], "any", false, false, false, 29), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("of"), "html", null, true);
                yield "
            ";
            }
            // line 30
            yield " 
            
            ";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getResultCount", [], "any", false, false, false, 32)), "html", null, true);
            yield "
        </div>
        ";
        }
        // line 35
        yield "
    </div>
        
    ";
        // line 38
        $context["buttonStyle"] = "border -ml-px px-2 py-1 font-bold leading-loose";
        // line 39
        yield "        
    ";
        // line 40
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getResultCount", [], "any", false, false, false, 40) > CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getPageSize", [], "any", false, false, false, 40)) || ($context["filterOptions"] ?? null))) {
            // line 41
            yield "    <div class=\"pagination mb-2\">
        <button type=\"button\" class=\"paginate rounded-l text-gray-600 bg-gray-200 border-gray-500 ";
            // line 42
            yield (( !CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "isFirstPage", [], "any", false, false, false, 42)) ? ("hover:bg-gray-400") : (""));
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonStyle"] ?? null), "html", null, true);
            yield "\" data-page=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getPrevPageNumber", [], "any", false, false, false, 42), "html", null, true);
            yield "\" ";
            yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "isFirstPage", [], "any", false, false, false, 42)) ? ("disabled") : (""));
            yield ">
            ";
            // line 43
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Prev"), "html", null, true);
            yield "
        </button>";
            // line 46
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getPaginatedRange", [], "any", false, false, false, 46));
            foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
                // line 47
                if (($context["page"] == "...")) {
                    // line 48
                    yield "<button type=\"button\" class=\" ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonStyle"] ?? null), "html", null, true);
                    yield "\" disabled>...</button>";
                } else {
                    // line 50
                    yield "<button type=\"button\" class=\"paginate ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonStyle"] ?? null), "html", null, true);
                    yield " ";
                    yield ((($context["page"] == CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getPage", [], "any", false, false, false, 50))) ? ("bg-blue-500 border-blue-700 text-white relative z-10") : ("text-gray-600 hover:bg-gray-400 border-gray-500"));
                    yield "\" data-page=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                    yield "\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["page"], "html", null, true);
                    yield "</button>";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            yield "<button type=\"button\" class=\"paginate rounded-r text-gray-600 border-gray-500 ";
            yield (( !CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "isLastPage", [], "any", false, false, false, 54)) ? ("hover:bg-gray-400") : (""));
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonStyle"] ?? null), "html", null, true);
            yield "\" data-page=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getNextPageNumber", [], "any", false, false, false, 54), "html", null, true);
            yield "\" ";
            yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "isLastPage", [], "any", false, false, false, 54)) ? ("disabled") : (""));
            yield ">
        ";
            // line 55
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Next"), "html", null, true);
            yield "
        </button>
    </div>
    ";
        }
        // line 59
        yield "
</div>

";
        // line 62
        if (($context["url"] ?? null)) {
            // line 63
            yield "
<script>
\$('button.paginate').on('click', function() {
    console.log(this);

    window.location = '";
            // line 68
            yield ($context["url"] ?? null);
            yield "&page=' + \$(this).data('page');
});
</script>

";
        }
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ui/pagination.twig.html";
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
        return array (  184 => 68,  177 => 63,  175 => 62,  170 => 59,  163 => 55,  152 => 54,  137 => 50,  132 => 48,  130 => 47,  126 => 46,  122 => 43,  112 => 42,  109 => 41,  107 => 40,  104 => 39,  102 => 38,  97 => 35,  91 => 32,  87 => 30,  77 => 29,  75 => 28,  70 => 26,  65 => 24,  62 => 23,  60 => 22,  55 => 19,  49 => 16,  45 => 14,  43 => 13,  38 => 10,);
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

<div class=\"flex flex-wrap sm:flex-no-wrap items-center justify-between mt-4\">

    {% if filterOptions %}
    <div class=\"relative mb-2\">
        <div class=\"absolute caret z-10 mt-3 right-0 mr-5 pointer-events-none\"></div>
        {{ filterOptions|raw }}
    </div>
    {% endif %}
    
    <div class=\"flex items-center h-full\">

        {% if dataSet.getTotalCount > 0 %}
        <div class=\"text-xs\">
            {{ searchText ? __('Search') ~ \" \" }}

            {{ dataSet.isSubset ? __('Results') : __('Records') }}

            {% if dataSet.count > 0 %}
                {{ dataSet.getPageFrom }}-{{ dataSet.getPageTo }} {{ __('of') }}
            {% endif %} 
            
            {{ dataSet.getResultCount|number_format }}
        </div>
        {% endif %}

    </div>
        
    {% set buttonStyle = 'border -ml-px px-2 py-1 font-bold leading-loose' %}
        
    {% if dataSet.getResultCount > dataSet.getPageSize or filterOptions %}
    <div class=\"pagination mb-2\">
        <button type=\"button\" class=\"paginate rounded-l text-gray-600 bg-gray-200 border-gray-500 {{ not dataSet.isFirstPage ? 'hover:bg-gray-400'}} {{ buttonStyle }}\" data-page=\"{{ dataSet.getPrevPageNumber }}\" {{ dataSet.isFirstPage ? 'disabled'}}>
            {{ __('Prev') }}
        </button>

        {%- for page in dataSet.getPaginatedRange -%}
            {%- if page == '...' -%}
                <button type=\"button\" class=\" {{ buttonStyle }}\" disabled>...</button>
            {%- else -%}
                <button type=\"button\" class=\"paginate {{ buttonStyle }} {{ page == dataSet.getPage ? 'bg-blue-500 border-blue-700 text-white relative z-10' : 'text-gray-600 hover:bg-gray-400 border-gray-500' }}\" data-page=\"{{ page }}\">{{ page }}</button>
            {%- endif -%}
        {%- endfor -%}

        <button type=\"button\" class=\"paginate rounded-r text-gray-600 border-gray-500 {{ not dataSet.isLastPage ? 'hover:bg-gray-400'}} {{ buttonStyle }}\" data-page=\"{{ dataSet.getNextPageNumber }}\" {{ dataSet.isLastPage ? 'disabled'}}>
        {{ __('Next') }}
        </button>
    </div>
    {% endif %}

</div>

{% if url %}

<script>
\$('button.paginate').on('click', function() {
    console.log(this);

    window.location = '{{ url|raw }}&page=' + \$(this).data('page');
});
</script>

{% endif %}
", "ui/pagination.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/ui/pagination.twig.html");
    }
}
