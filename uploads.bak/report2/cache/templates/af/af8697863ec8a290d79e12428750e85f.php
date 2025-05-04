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

/* ui/writingSidebar.twig.html */
class __TwigTemplate_6f722dd0d058c368a7bdd3704326b101 extends Template
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
        if (($context["students"] ?? null)) {
            // line 12
            yield "<div class=\"mt-4 rounded border bg-gray-100 border-gray-400\">

    <div class=\"p-2 border-b border-gray-400 bg-gray-300 text-gray-700 text-xs font-bold\">
        ";
            // line 15
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Students"), "html", null, true);
            yield " 

        <div class=\"flex-1 mt-1\">
            ";
            // line 18
            yield Twig\Extension\CoreExtension::include($this->env, $context, "ui/writingProgress.twig.html");
            yield "
        </div>
    </div>

    ";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["students"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["student"]) {
                // line 23
                yield "        ";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["student"], "progress", [], "any", false, false, false, 23) == "Complete")) {
                    // line 24
                    yield "            ";
                    $context["progressClass"] = "success";
                    // line 25
                    yield "        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["student"], "progress", [], "any", false, false, false, 25) == "In Progress")) {
                    // line 26
                    yield "            ";
                    $context["progressClass"] = "bg-gray-200 text-gray-700";
                    // line 27
                    yield "        ";
                } else {
                    // line 28
                    yield "            ";
                    $context["progressClass"] = "text-gray-700";
                    // line 29
                    yield "        ";
                }
                // line 30
                yield "
        ";
                // line 31
                $context["activeClass"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["student"], "gibbonPersonID", [], "any", false, false, false, 31) == ($context["gibbonPersonIDStudent"] ?? null))) ? ("font-bold") : (""));
                // line 32
                yield "
        <a class=\"block flex justify-between items-center px-2 py-1 border-gray-400 leading-normal  hover:bg-blue-200 hover:text-blue-800 ";
                // line 33
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["progressClass"] ?? null), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["activeClass"] ?? null), "html", null, true);
                yield " ";
                yield (( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 33)) ? ("border-b") : (""));
                yield "\" href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
                yield "/index.php?q=/modules/Reports/reporting_write_byStudent.php&gibbonPersonIDStudent=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["student"], "gibbonPersonID", [], "any", false, false, false, 33), "html", null, true);
                yield "&";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(($context["params"] ?? null)), "html", null, true);
                yield "\" >

            <div class=\"text-xs\">
                ";
                // line 36
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["student"], "surname", [], "any", false, false, false, 36), "html", null, true);
                yield ", ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["student"], "preferredName", [], "any", false, false, false, 36), "html", null, true);
                yield "

                ";
                // line 38
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["student"], "status", [], "any", false, false, false, 38) != "Full")) {
                    // line 39
                    yield "                    <span class=\"tag error ml-2 text-xxs\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["student"], "status", [], "any", false, false, false, 39), "html", null, true);
                    yield "</span>
                ";
                }
                // line 41
                yield "
                ";
                // line 42
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["student"], "role", [], "any", false, false, false, 42) == "Student - Left")) {
                    // line 43
                    yield "                    <span class=\"tag error ml-2 text-xxs\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Left"), "html", null, true);
                    yield "</span>
                ";
                }
                // line 45
                yield "            </div>

            ";
                // line 47
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["student"], "progress", [], "any", false, false, false, 47) == "Complete")) {
                    // line 48
                    yield "                <img class=\"w-3 h-3\" title=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["student"], "progress", [], "any", false, false, false, 48)), "html", null, true);
                    yield "\" src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
                    yield "/themes/";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonThemeName"] ?? null), "html", null, true);
                    yield "/img/iconTick.png\" >
            ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 49
$context["student"], "progress", [], "any", false, false, false, 49) == "In Progress")) {
                    // line 50
                    yield "                <img class=\"w-3 h-3\" title=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["student"], "progress", [], "any", false, false, false, 50)), "html", null, true);
                    yield "\" src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
                    yield "/themes/";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonThemeName"] ?? null), "html", null, true);
                    yield "/img/config.png\" >
            ";
                }
                // line 52
                yield "        </a>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['student'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            yield "</div>

";
            // line 56
            $context["params"] = Twig\Extension\CoreExtension::merge(($context["params"] ?? null), ["allStudents" => (((CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "allStudents", [], "any", false, false, false, 56) == "Y")) ? ("N") : ("Y"))]);
            // line 57
            $context["redirectTo"] = (( !Twig\Extension\CoreExtension::testEmpty(($context["gibbonPersonIDStudent"] ?? null))) ? ("reporting_write_byStudent.php") : ("reporting_write.php"));
            // line 58
            yield "
<a class=\"button mt-2 w-full inline-block\" href=\"";
            // line 59
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
            yield "/index.php?q=/modules/Reports/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["redirectTo"] ?? null), "html", null, true);
            yield "&gibbonPersonIDStudent=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonPersonIDStudent"] ?? null), "html", null, true);
            yield "&";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(($context["params"] ?? null)), "html", null, true);
            yield "\">
    ";
            // line 60
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "allStudents", [], "any", false, false, false, 60) == "Y")) ? ($this->env->getFunction('__')->getCallable()("Show Left Students")) : ($this->env->getFunction('__')->getCallable()("Hide Left Students"))), "html", null, true);
            yield "
</a>


";
        }
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ui/writingSidebar.twig.html";
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
        return array (  212 => 60,  202 => 59,  199 => 58,  197 => 57,  195 => 56,  191 => 54,  176 => 52,  166 => 50,  164 => 49,  155 => 48,  153 => 47,  149 => 45,  143 => 43,  141 => 42,  138 => 41,  132 => 39,  130 => 38,  123 => 36,  107 => 33,  104 => 32,  102 => 31,  99 => 30,  96 => 29,  93 => 28,  90 => 27,  87 => 26,  84 => 25,  81 => 24,  78 => 23,  61 => 22,  54 => 18,  48 => 15,  43 => 12,  41 => 11,  38 => 10,);
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

{% if students %}
<div class=\"mt-4 rounded border bg-gray-100 border-gray-400\">

    <div class=\"p-2 border-b border-gray-400 bg-gray-300 text-gray-700 text-xs font-bold\">
        {{ __('Students') }} 

        <div class=\"flex-1 mt-1\">
            {{ include('ui/writingProgress.twig.html') }}
        </div>
    </div>

    {% for student in students %}
        {% if student.progress == 'Complete' %}
            {% set progressClass = 'success' %}
        {% elseif student.progress == 'In Progress' %}
            {% set progressClass = 'bg-gray-200 text-gray-700' %}
        {% else %}
            {% set progressClass = 'text-gray-700' %}
        {% endif %}

        {% set activeClass = student.gibbonPersonID == gibbonPersonIDStudent ? 'font-bold' : '' %}

        <a class=\"block flex justify-between items-center px-2 py-1 border-gray-400 leading-normal  hover:bg-blue-200 hover:text-blue-800 {{ progressClass }} {{ activeClass }} {{ not loop.last ? 'border-b' }}\" href=\"{{ absoluteURL }}/index.php?q=/modules/Reports/reporting_write_byStudent.php&gibbonPersonIDStudent={{ student.gibbonPersonID }}&{{ params|url_encode }}\" >

            <div class=\"text-xs\">
                {{ student.surname }}, {{ student.preferredName }}

                {% if student.status != 'Full' %}
                    <span class=\"tag error ml-2 text-xxs\">{{ student.status }}</span>
                {% endif %}

                {% if student.role == 'Student - Left' %}
                    <span class=\"tag error ml-2 text-xxs\">{{ __('Left') }}</span>
                {% endif %}
            </div>

            {% if student.progress == 'Complete' %}
                <img class=\"w-3 h-3\" title=\"{{ __(student.progress) }}\" src=\"{{ absoluteURL }}/themes/{{ gibbonThemeName }}/img/iconTick.png\" >
            {% elseif student.progress == 'In Progress' %}
                <img class=\"w-3 h-3\" title=\"{{ __(student.progress) }}\" src=\"{{ absoluteURL }}/themes/{{ gibbonThemeName }}/img/config.png\" >
            {% endif %}
        </a>
    {% endfor %}
</div>

{% set params = params|merge({'allStudents': (params.allStudents == 'Y' ? 'N' : 'Y') }) %}
{% set redirectTo = gibbonPersonIDStudent is not empty ? 'reporting_write_byStudent.php' : 'reporting_write.php' %}

<a class=\"button mt-2 w-full inline-block\" href=\"{{ absoluteURL }}/index.php?q=/modules/Reports/{{ redirectTo }}&gibbonPersonIDStudent={{ gibbonPersonIDStudent }}&{{ params|url_encode }}\">
    {{ params.allStudents == 'Y' ? __('Show Left Students') : __('Hide Left Students') }}
</a>


{% endif %}
", "ui/writingSidebar.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/ui/writingSidebar.twig.html");
    }
}
