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

/* reports/courseCriteriaByCycle_Average.twig.html */
class __TwigTemplate_16bf618dbd787ebc9879c6418cced845 extends Template
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
        yield ((($context["stylesheet"] ?? null)) ? (Twig\Extension\CoreExtension::include($this->env, $context, ($context["stylesheet"] ?? null))) : (""));
        // line 12
        $context["overallTotalGrades"] = 0;
        // line 13
        $context["overallGradeCount"] = 0;
        // line 14
        yield "
";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["courseCriteriaByCycle"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["course"]) {
            // line 17
            yield "    ";
            $context["courseTotalGrades"] = 0;
            // line 18
            yield "    ";
            $context["courseGradeCount"] = 0;
            // line 19
            yield "
    ";
            // line 21
            yield "    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, ((CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", true, true, false, 21)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", false, false, false, 21), 1)) : (1))));
            foreach ($context['_seq'] as $context["_key"] => $context["cycleNum"]) {
                // line 22
                yield "        ";
                $context["cycleName"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycles", [], "any", false, true, false, 22), $context["cycleNum"], [], "array", true, true, false, 22)) ? (Twig\Extension\CoreExtension::default((($__internal_compile_0 = CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycles", [], "any", false, true, false, 22)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["cycleNum"]] ?? null) : null), "")) : (""));
                // line 23
                yield "        
        ";
                // line 25
                yield "        ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", false, false, false, 25));
                foreach ($context['_seq'] as $context["_key"] => $context["criteria"]) {
                    // line 26
                    yield "            ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "valueType", [], "any", false, false, false, 26) != "Comment")) {
                        // line 27
                        yield "                ";
                        // line 28
                        yield "                ";
                        $context["rawGrade"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 28), ($context["cycleName"] ?? null), [], "array", false, true, false, 28), "value", [], "any", true, true, false, 28)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 28), ($context["cycleName"] ?? null), [], "array", false, true, false, 28), "value", [], "any", false, false, false, 28), "0")) : ("0"));
                        // line 29
                        yield "                ";
                        $context["sanitizedGrade"] = Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::replace(($context["rawGrade"] ?? null), ["%" => ""]));
                        // line 30
                        yield "                
                ";
                        // line 32
                        yield "                ";
                        if (CoreExtension::matches("/^-?\\d+(\\.\\d+)?\$/", ($context["sanitizedGrade"] ?? null))) {
                            // line 33
                            yield "                    ";
                            $context["grade"] = (($context["sanitizedGrade"] ?? null) + 0);
                            // line 34
                            yield "                    ";
                            $context["courseTotalGrades"] = (($context["courseTotalGrades"] ?? null) + ($context["grade"] ?? null));
                            // line 35
                            yield "                    ";
                            $context["courseGradeCount"] = (($context["courseGradeCount"] ?? null) + 1);
                            // line 36
                            yield "                ";
                        }
                        // line 37
                        yield "            ";
                    }
                    // line 38
                    yield "        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['criteria'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 39
                yield "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cycleNum'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            yield "
    ";
            // line 42
            yield "    ";
            $context["overallTotalGrades"] = (($context["overallTotalGrades"] ?? null) + ($context["courseTotalGrades"] ?? null));
            // line 43
            yield "    ";
            $context["overallGradeCount"] = (($context["overallGradeCount"] ?? null) + ($context["courseGradeCount"] ?? null));
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['course'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        yield "
";
        // line 47
        $context["overallAverage"] = (((($context["overallGradeCount"] ?? null) > 0)) ? (Twig\Extension\CoreExtension::round((($context["overallTotalGrades"] ?? null) / ($context["overallGradeCount"] ?? null)), 2)) : ("N/A"));
        // line 48
        yield "
";
        // line 50
        yield "<table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"4\" nobr=\"true\">
    <tr>
        <td colspan=\"2\" class=\"header bg-primary border\">
            Overall Average
        </td>
        <td class=\"border bg-secondary\">
            ";
        // line 56
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["overallAverage"] ?? null), "html", null, true);
        yield "
        </td>
    </tr>
</table>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reports/courseCriteriaByCycle_Average.twig.html";
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
        return array (  149 => 56,  141 => 50,  138 => 48,  136 => 47,  133 => 45,  126 => 43,  123 => 42,  120 => 40,  114 => 39,  108 => 38,  105 => 37,  102 => 36,  99 => 35,  96 => 34,  93 => 33,  90 => 32,  87 => 30,  84 => 29,  81 => 28,  79 => 27,  76 => 26,  71 => 25,  68 => 23,  65 => 22,  60 => 21,  57 => 19,  54 => 18,  51 => 17,  47 => 16,  44 => 14,  42 => 13,  40 => 12,  38 => 10,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Average
category: Average Template
types: Body
sources:
    student: Student
    reportingCycle: ReportingCycle
    courseCriteriaByCycle: CourseCriteriaByCycle
-->#}
{{- stylesheet ? include(stylesheet) -}}

{% set overallTotalGrades = 0 %}
{% set overallGradeCount = 0 %}

{# Iterate over courses #}
{% for course in courseCriteriaByCycle %}
    {% set courseTotalGrades = 0 %}
    {% set courseGradeCount = 0 %}

    {# Iterate over cycles #}
    {% for cycleNum in range(1, reportingCycle.cycleTotal|default(1)) %}
        {% set cycleName = reportingCycle.cycles[cycleNum]|default('') %}
        
        {# Check each criteria #}
        {% for criteria in course.perStudent %}
            {% if criteria.valueType != 'Comment' %}
                {# Extract and sanitize the grade value #}
                {% set rawGrade = criteria.values[cycleName].value|default('0') %}
                {% set sanitizedGrade = rawGrade|replace({'%': ''})|trim %}
                
                {# Check if sanitized grade is numeric #}
                {% if sanitizedGrade matches '/^-?\\\\d+(\\\\.\\\\d+)?\$/' %}
                    {% set grade = sanitizedGrade + 0 %}
                    {% set courseTotalGrades = courseTotalGrades + grade %}
                    {% set courseGradeCount = courseGradeCount + 1 %}
                {% endif %}
            {% endif %}
        {% endfor %}
    {% endfor %}

    {# Update overall totals #}
    {% set overallTotalGrades = overallTotalGrades + courseTotalGrades %}
    {% set overallGradeCount = overallGradeCount + courseGradeCount %}
{% endfor %}

{# Calculate the overall average grade #}
{% set overallAverage = overallGradeCount > 0 ? (overallTotalGrades / overallGradeCount)|round(2) : 'N/A' %}

{# Display the results in a table #}
<table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"4\" nobr=\"true\">
    <tr>
        <td colspan=\"2\" class=\"header bg-primary border\">
            Overall Average
        </td>
        <td class=\"border bg-secondary\">
            {{ overallAverage }}
        </td>
    </tr>
</table>
", "reports/courseCriteriaByCycle_Average.twig.html", "/Applications/MAMP/htdocs/chhs/uploads/reports/templates/reports/courseCriteriaByCycle_Average.twig.html");
    }
}
