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

/* ui/writingQueue.twig.html */
class __TwigTemplate_5f56b376179c3432bd54fe30850b42ef extends Template
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
        $macros["queue"] = $this->macros["queue"] = $this;
        // line 12
        yield "
<div class=\"flex -mx-2\">
    <div class=\"w-1/3 mx-2\">
        <h4>
            ";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("To Do"), "html", null, true);
        yield "
            <span class=\"ml-1 text-xs text-gray-500 font-normal\">";
        // line 17
        (( !Twig\Extension\CoreExtension::testEmpty((($__internal_compile_0 = ($context["progress"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["Incomplete"] ?? null) : null))) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (($__internal_compile_1 = ($context["progress"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["Incomplete"] ?? null) : null)), "html", null, true)) : (yield ""));
        yield "</span>
        </h4>

        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((($__internal_compile_2 = ($context["progress"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["Incomplete"] ?? null) : null));
        foreach ($context['_seq'] as $context["_key"] => $context["student"]) {
            // line 21
            yield "            ";
            yield CoreExtension::callMacro($macros["queue"], "macro_studentLink", [$context["student"], ($context["params"] ?? null)], 21, $context, $this->getSourceContext());
            yield "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['student'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        yield "    </div>

    <div class=\"w-1/3 mx-2\"\">
        <h4>
            <!-- <img class=\"inline-block -mt-1 mr-1 w-4 h-4\" src=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/themes/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonThemeName"] ?? null), "html", null, true);
        yield "/img/config.png\" > -->
            ";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("In Progress"), "html", null, true);
        yield "
            <span class=\"ml-1 text-xs text-gray-500 font-normal\">";
        // line 29
        (( !Twig\Extension\CoreExtension::testEmpty((($__internal_compile_3 = ($context["progress"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["In Progress"] ?? null) : null))) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (($__internal_compile_4 = ($context["progress"] ?? null)) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["In Progress"] ?? null) : null)), "html", null, true)) : (yield ""));
        yield "</span>
        </h4>

        ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((($__internal_compile_5 = ($context["progress"] ?? null)) && is_array($__internal_compile_5) || $__internal_compile_5 instanceof ArrayAccess ? ($__internal_compile_5["In Progress"] ?? null) : null));
        foreach ($context['_seq'] as $context["_key"] => $context["student"]) {
            // line 33
            yield "            ";
            yield CoreExtension::callMacro($macros["queue"], "macro_studentLink", [$context["student"], ($context["params"] ?? null)], 33, $context, $this->getSourceContext());
            yield "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['student'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        yield "    </div>

    <div class=\"w-1/3 mx-2\"\">
        <h4>
            <!-- <img class=\"inline-block -mt-1 mr-1 w-4 h-4\" src=\"";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/themes/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonThemeName"] ?? null), "html", null, true);
        yield "/img/iconTick.png\" > -->
            ";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Complete"), "html", null, true);
        yield "
            <span class=\"ml-1 text-xs text-gray-500 font-normal\">";
        // line 41
        (( !Twig\Extension\CoreExtension::testEmpty((($__internal_compile_6 = ($context["progress"] ?? null)) && is_array($__internal_compile_6) || $__internal_compile_6 instanceof ArrayAccess ? ($__internal_compile_6["Complete"] ?? null) : null))) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (($__internal_compile_7 = ($context["progress"] ?? null)) && is_array($__internal_compile_7) || $__internal_compile_7 instanceof ArrayAccess ? ($__internal_compile_7["Complete"] ?? null) : null)), "html", null, true)) : (yield ""));
        yield "</span>
        </h4>

        ";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((($__internal_compile_8 = ($context["progress"] ?? null)) && is_array($__internal_compile_8) || $__internal_compile_8 instanceof ArrayAccess ? ($__internal_compile_8["Complete"] ?? null) : null));
        foreach ($context['_seq'] as $context["_key"] => $context["student"]) {
            // line 45
            yield "            ";
            yield CoreExtension::callMacro($macros["queue"], "macro_studentLink", [$context["student"], ($context["params"] ?? null)], 45, $context, $this->getSourceContext());
            yield "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['student'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        yield "    </div>
</div>

";
        return; yield '';
    }

    // line 50
    public function macro_studentLink($__student__ = null, $__params__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "student" => $__student__,
            "params" => $__params__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 51
            yield "    <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
            yield "/index.php?q=/modules/Reports/reporting_write_byStudent.php&gibbonPersonIDStudent=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "gibbonPersonID", [], "any", false, false, false, 51), "html", null, true);
            yield "&";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(($context["params"] ?? null)), "html", null, true);
            yield "\" class=\"flex items-center rounded border bg-gray-100 border-gray-400 p-2 mb-2 text-gray-800 hover:bg-blue-200 hover:border-blue-700 hover:text-blue-800 hover:shadow\">

        <div class=\"rounded-full w-8 h-8 overflow-hidden shadow-inner\">
            <img class=\"w-full\" src=\"";
            // line 54
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "image_240", [], "any", false, false, false, 54), "html", null, true);
            yield "\">
        </div>
        <div class=\"text-xs ml-2 mt-px\">
            ";
            // line 57
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "surname", [], "any", false, false, false, 57), "html", null, true);
            yield ", ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "preferredName", [], "any", false, false, false, 57), "html", null, true);
            yield "

            ";
            // line 59
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "status", [], "any", false, false, false, 59) != "Full")) {
                // line 60
                yield "                <span class=\"tag error ml-2 text-xxs\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "status", [], "any", false, false, false, 60), "html", null, true);
                yield "</span>
            ";
            }
            // line 62
            yield "
            ";
            // line 63
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "role", [], "any", false, false, false, 63) == "Student - Left")) {
                // line 64
                yield "                <span class=\"tag error ml-2 text-xxs\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Left"), "html", null, true);
                yield "</span>
            ";
            }
            // line 66
            yield "        </div>
    </a>
";
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ui/writingQueue.twig.html";
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
        return array (  206 => 66,  200 => 64,  198 => 63,  195 => 62,  189 => 60,  187 => 59,  180 => 57,  174 => 54,  163 => 51,  150 => 50,  142 => 47,  133 => 45,  129 => 44,  123 => 41,  119 => 40,  113 => 39,  107 => 35,  98 => 33,  94 => 32,  88 => 29,  84 => 28,  78 => 27,  72 => 23,  63 => 21,  59 => 20,  53 => 17,  49 => 16,  43 => 12,  41 => 11,  38 => 10,);
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

{% import _self as queue  %}

<div class=\"flex -mx-2\">
    <div class=\"w-1/3 mx-2\">
        <h4>
            {{ __('To Do') }}
            <span class=\"ml-1 text-xs text-gray-500 font-normal\">{{ progress['Incomplete'] is not empty? progress['Incomplete']|length }}</span>
        </h4>

        {% for student in progress['Incomplete'] %}
            {{ queue.studentLink(student, params) }}
        {% endfor %}
    </div>

    <div class=\"w-1/3 mx-2\"\">
        <h4>
            <!-- <img class=\"inline-block -mt-1 mr-1 w-4 h-4\" src=\"{{ absoluteURL }}/themes/{{ gibbonThemeName }}/img/config.png\" > -->
            {{ __('In Progress') }}
            <span class=\"ml-1 text-xs text-gray-500 font-normal\">{{ progress['In Progress'] is not empty ? progress['In Progress']|length }}</span>
        </h4>

        {% for student in progress['In Progress'] %}
            {{ queue.studentLink(student, params) }}
        {% endfor %}
    </div>

    <div class=\"w-1/3 mx-2\"\">
        <h4>
            <!-- <img class=\"inline-block -mt-1 mr-1 w-4 h-4\" src=\"{{ absoluteURL }}/themes/{{ gibbonThemeName }}/img/iconTick.png\" > -->
            {{ __('Complete') }}
            <span class=\"ml-1 text-xs text-gray-500 font-normal\">{{ progress['Complete'] is not empty ? progress['Complete']|length }}</span>
        </h4>

        {% for student in progress['Complete'] %}
            {{ queue.studentLink(student, params) }}
        {% endfor %}
    </div>
</div>

{% macro studentLink(student, params) %}
    <a href=\"{{ absoluteURL }}/index.php?q=/modules/Reports/reporting_write_byStudent.php&gibbonPersonIDStudent={{ student.gibbonPersonID }}&{{ params|url_encode }}\" class=\"flex items-center rounded border bg-gray-100 border-gray-400 p-2 mb-2 text-gray-800 hover:bg-blue-200 hover:border-blue-700 hover:text-blue-800 hover:shadow\">

        <div class=\"rounded-full w-8 h-8 overflow-hidden shadow-inner\">
            <img class=\"w-full\" src=\"{{ student.image_240 }}\">
        </div>
        <div class=\"text-xs ml-2 mt-px\">
            {{ student.surname }}, {{ student.preferredName }}

            {% if student.status != 'Full' %}
                <span class=\"tag error ml-2 text-xxs\">{{ student.status }}</span>
            {% endif %}

            {% if student.role == 'Student - Left' %}
                <span class=\"tag error ml-2 text-xxs\">{{ __('Left') }}</span>
            {% endif %}
        </div>
    </a>
{% endmacro studentLink %}
", "ui/writingQueue.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/ui/writingQueue.twig.html");
    }
}
