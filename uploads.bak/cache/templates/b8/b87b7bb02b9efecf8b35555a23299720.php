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

/* finder.twig.html */
class __TwigTemplate_f6e5989acf82dec930472c4ecf8e1484 extends Template
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
        // line 12
        yield "
<style>
    #fastFinder input[type=\"search\"] {
        background-color: rgba(255,255,255,0.2) !important;
        border-radius: .25rem 0 0 .25rem !important;
        border: 1px transparent !important;
    }

    #fastFinder select {
        background-color: rgba(255,255,255,0.2) !important;
        border: 1px transparent !important;
        border-radius: 0 .25rem .25rem 0 !important;
        margin-left: 1px !important;
    }

    #fastFinder input[type=\"search\"]:focus,
    #fastFinder select:focus {
        border: 1px white !important;
        box-shadow: none !important;
    }

</style>

<div id=\"fastFinder\" class=\"sm:relative  sm:max-w-md m-0 p-0\"
    x-data=\"{ finderOpen: false, finderSearch: '' }\"
    x-on:keydown.escape.prevent.stop=\"finderOpen = false\"
    @click.outside=\"finderOpen = false\"
    >

    <div class=\"relative flex\">
        <button type=\"button\" @click=\"finderSearch=''\" class=\"absolute top-0 left-0 mt-2.5 ml-2.5\">
            ";
        // line 43
        yield $this->env->getFunction('icon')->getCallable()("basic", "search", "size-5 text-white opacity-50");
        yield "
        </button>

        <input class=\"form-control flex-1 text-white placeholder:text-white placeholder:text-opacity-60 text-sm pl-10 h-10\" 
            type=\"search\" autocomplete=\"off\" 
            name=\"search\" placeholder=\"";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Search"), "html", null, true);
        yield "\" 
            hx-post=\"index_fastFinder_ajax.php\" 
            hx-trigger=\"input changed delay:500ms, search\" 
            hx-target=\"#search-results\" 
            hx-include=\"[name='searchType']\"
            hx-indicator=\".htmx-indicator\"
            @click=\"finderOpen = true\"
            x-model=\"finderSearch\"
        >

        ";
        // line 58
        if ((($context["roleCategory"] ?? null) == "Staff")) {
            // line 59
            yield "        <select name=\"searchType\" class=\"w-20 h-10 text-white text-sm font-bold hidden sm:block\"
            hx-post=\"index_fastFinder_ajax.php\" 
            hx-target=\"#search-results\" 
            hx-include=\"[name='search']\"
            hx-indicator=\".htmx-indicator\"
            >
            <option value=\"all\">";
            // line 65
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("All"), "html", null, true);
            yield "</option>
            <option value=\"students\">";
            // line 66
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Student"), "html", null, true);
            yield "</option>
            <option value=\"staff\">";
            // line 67
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Staff"), "html", null, true);
            yield "</option>
            <option value=\"classes\">";
            // line 68
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Class"), "html", null, true);
            yield "</option>
            <option value=\"departments\">";
            // line 69
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Department"), "html", null, true);
            yield "</option>
            <option value=\"facilities\">";
            // line 70
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Facility"), "html", null, true);
            yield "</option>
            <option value=\"actions\">";
            // line 71
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Action"), "html", null, true);
            yield "</option>
        </select>
        ";
        } else {
            // line 74
            yield "        <input name=\"searchType\" type=\"hidden\" value=\"all\">
        ";
        }
        // line 76
        yield "        
    </div>

    <div id=\"search-wrap\" 
        x-show=\"finderOpen\"
        class=\"absolute top-0 left-0 mt-10 w-full origin-top-right rounded-sm bg-white shadow-lg focus:outline-none\" role=\"menu\" aria-orientation=\"vertical\" aria-labelledby=\"menu-button\" tabindex=\"-1\" style=\"display:none; z-index: 45;\">

        <div class=\"htmx-indicator absolute top-0 left-0 h-10 w-full block px-4 py-2 text-sm italic text-gray-800 pointer-events-none\"> 
            ";
        // line 84
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Searching..."), "html", null, true);
        yield " 
        </div>

        <div id=\"search-results\" class=\"py-1\" role=\"none\">
            <span class=\"block px-4 py-2 text-sm text-gray-800\" @click=\"finderOpen = false\">
                ";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Start typing a name ..."), "html", null, true);
        yield "
            </span>
        </div>
    </div>
</div>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "finder.twig.html";
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
        return array (  154 => 89,  146 => 84,  136 => 76,  132 => 74,  126 => 71,  122 => 70,  118 => 69,  114 => 68,  110 => 67,  106 => 66,  102 => 65,  94 => 59,  92 => 58,  79 => 48,  71 => 43,  38 => 12,);
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

Fast Finder
-->#}

<style>
    #fastFinder input[type=\"search\"] {
        background-color: rgba(255,255,255,0.2) !important;
        border-radius: .25rem 0 0 .25rem !important;
        border: 1px transparent !important;
    }

    #fastFinder select {
        background-color: rgba(255,255,255,0.2) !important;
        border: 1px transparent !important;
        border-radius: 0 .25rem .25rem 0 !important;
        margin-left: 1px !important;
    }

    #fastFinder input[type=\"search\"]:focus,
    #fastFinder select:focus {
        border: 1px white !important;
        box-shadow: none !important;
    }

</style>

<div id=\"fastFinder\" class=\"sm:relative  sm:max-w-md m-0 p-0\"
    x-data=\"{ finderOpen: false, finderSearch: '' }\"
    x-on:keydown.escape.prevent.stop=\"finderOpen = false\"
    @click.outside=\"finderOpen = false\"
    >

    <div class=\"relative flex\">
        <button type=\"button\" @click=\"finderSearch=''\" class=\"absolute top-0 left-0 mt-2.5 ml-2.5\">
            {{ icon('basic', 'search', 'size-5 text-white opacity-50') }}
        </button>

        <input class=\"form-control flex-1 text-white placeholder:text-white placeholder:text-opacity-60 text-sm pl-10 h-10\" 
            type=\"search\" autocomplete=\"off\" 
            name=\"search\" placeholder=\"{{ __('Search') }}\" 
            hx-post=\"index_fastFinder_ajax.php\" 
            hx-trigger=\"input changed delay:500ms, search\" 
            hx-target=\"#search-results\" 
            hx-include=\"[name='searchType']\"
            hx-indicator=\".htmx-indicator\"
            @click=\"finderOpen = true\"
            x-model=\"finderSearch\"
        >

        {% if roleCategory == 'Staff' %}
        <select name=\"searchType\" class=\"w-20 h-10 text-white text-sm font-bold hidden sm:block\"
            hx-post=\"index_fastFinder_ajax.php\" 
            hx-target=\"#search-results\" 
            hx-include=\"[name='search']\"
            hx-indicator=\".htmx-indicator\"
            >
            <option value=\"all\">{{ __('All') }}</option>
            <option value=\"students\">{{ __('Student') }}</option>
            <option value=\"staff\">{{ __('Staff') }}</option>
            <option value=\"classes\">{{ __('Class') }}</option>
            <option value=\"departments\">{{ __('Department') }}</option>
            <option value=\"facilities\">{{ __('Facility') }}</option>
            <option value=\"actions\">{{ __('Action') }}</option>
        </select>
        {% else %}
        <input name=\"searchType\" type=\"hidden\" value=\"all\">
        {% endif %}
        
    </div>

    <div id=\"search-wrap\" 
        x-show=\"finderOpen\"
        class=\"absolute top-0 left-0 mt-10 w-full origin-top-right rounded-sm bg-white shadow-lg focus:outline-none\" role=\"menu\" aria-orientation=\"vertical\" aria-labelledby=\"menu-button\" tabindex=\"-1\" style=\"display:none; z-index: 45;\">

        <div class=\"htmx-indicator absolute top-0 left-0 h-10 w-full block px-4 py-2 text-sm italic text-gray-800 pointer-events-none\"> 
            {{ __('Searching...') }} 
        </div>

        <div id=\"search-results\" class=\"py-1\" role=\"none\">
            <span class=\"block px-4 py-2 text-sm text-gray-800\" @click=\"finderOpen = false\">
                {{ __('Start typing a name ...') }}
            </span>
        </div>
    </div>
</div>
", "finder.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/finder.twig.html");
    }
}
