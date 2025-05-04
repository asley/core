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

/* reports/courseCriteriaByCycle_copy24.twig.html */
class __TwigTemplate_40a08479eea2fabc6b72b3b4647f483f extends Template
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
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["courseCriteriaByCycle"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["course"]) {
            // line 13
            yield "
";
            // line 14
            if ( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 14)) {
                // line 15
                yield "    <table cellspacing=\"0\" cellpadding=\"4\"><tr><td style=\"font-size: 1px;\">&nbsp;</td></tr></table>
";
            }
            // line 17
            yield "
<table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"10\" nobr=\"true\">
    <tr>
        <td class=\"header bg-primary border-top border-bottom border-left\" style=\"width:50%;\" rowspan=\"2\">";
            // line 21
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "courseName", [], "any", false, false, false, 21), "html", null, true);
            yield "
        </td>
        <td class=\"subheader bg-primary border-top border-bottom border-right\" style=\"width:50%;text-align:right;\" colspan=\"";
            // line 23
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", false, false, false, 23), "html", null, true);
            yield "\">
            ";
            // line 24
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "teachers", [], "any", false, false, false, 24));
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
            foreach ($context['_seq'] as $context["_key"] => $context["teacher"]) {
                // line 25
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["teacher"], "fullName", [], "any", false, false, false, 25), "html", null, true);
                // line 26
                yield (( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 26)) ? (",") : (""));
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['teacher'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            yield "        </td>
    </tr>

    <tr>
        ";
            // line 32
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, ((CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", true, true, false, 32)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", false, false, false, 32), 1)) : (1))));
            foreach ($context['_seq'] as $context["_key"] => $context["cycleNum"]) {
                // line 33
                yield "            ";
                $context["cycleName"] = (($__internal_compile_0 = CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycles", [], "any", false, false, false, 33)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["cycleNum"]] ?? null) : null);
                // line 34
                yield "            <td class=\"border\" >";
                // line 35
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["cycleName"] ?? null), "html", null, true);
                // line 36
                yield "</td>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cycleNum'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            yield "    </tr>";
            // line 40
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", false, false, false, 40));
            foreach ($context['_seq'] as $context["_key"] => $context["criteria"]) {
                // line 41
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "valueType", [], "any", false, false, false, 41) != "Comment")) {
                    // line 42
                    yield "        <tr>
            <td class=\"border\" >";
                    // line 44
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "criteriaName", [], "any", false, false, false, 44), "html", null, true);
                    yield "
            </td>
            ";
                    // line 46
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(range(1, ((CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", true, true, false, 46)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", false, false, false, 46), 1)) : (1))));
                    foreach ($context['_seq'] as $context["_key"] => $context["cycleNum"]) {
                        // line 47
                        yield "                ";
                        $context["cycleName"] = (($__internal_compile_1 = CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycles", [], "any", false, false, false, 47)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[$context["cycleNum"]] ?? null) : null);
                        // line 48
                        yield "                <td class=\"border\" >";
                        // line 49
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 49), ($context["cycleName"] ?? null), [], "array", false, true, false, 49), "descriptor", [], "any", true, true, false, 49) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 49), ($context["cycleName"] ?? null), [], "array", false, true, false, 49), "descriptor", [], "any", false, false, false, 49)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 49), ($context["cycleName"] ?? null), [], "array", false, true, false, 49), "descriptor", [], "any", false, false, false, 49)) : (CoreExtension::getAttribute($this->env, $this->source, (($__internal_compile_2 = CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, false, false, 49)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[($context["cycleName"] ?? null)] ?? null) : null), "value", [], "any", false, false, false, 49))), "html", null, true);
                        yield "
                </td>
            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cycleNum'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 52
                    yield "        </tr>
        ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['criteria'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 56
            if (CoreExtension::getAttribute($this->env, $this->source, $context["course"], "hasComments", [], "any", false, false, false, 56)) {
                // line 57
                yield "    <tr>
        <td class=\"border w-full\" colspan=\"";
                // line 58
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", false, false, false, 58) + 1), "html", null, true);
                yield "\">
            <table style=\"width: 100%; padding: 0;\" class=\"w-full\" cellspacing=\"0\" cellpadding=\"0\">";
                // line 60
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::merge(Twig\Extension\CoreExtension::merge([], ((CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perGroup", [], "any", true, true, false, 60)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perGroup", [], "any", false, false, false, 60), [])) : ([]))), ((CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", true, true, false, 60)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", false, false, false, 60), [])) : ([]))));
                foreach ($context['_seq'] as $context["_key"] => $context["criteria"]) {
                    // line 61
                    $context["nextComment"] = false;
                    // line 62
                    yield "            
                ";
                    // line 63
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "valueType", [], "any", false, false, false, 63) == "Comment")) {
                        // line 64
                        yield "                    ";
                        if (($context["nextComment"] ?? null)) {
                            // line 65
                            yield "                    <tr><td style=\"font-size: 1px;\">&nbsp;</td></tr>
                    ";
                        }
                        // line 67
                        yield "                    <tr>
                        <td class=\"w-full header\" style=\"line-height:1.8;\">";
                        // line 69
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "criteriaName", [], "any", false, false, false, 69), "html", null, true);
                        // line 70
                        yield "</td>
                    </tr>
                    <tr>
                        <td class=\"w-full\" style=\"font-size: 9pt\" >";
                        // line 74
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "comment", [], "any", false, false, false, 74), "html", null, true);
                        // line 75
                        yield "</td>
                    </tr>
                    ";
                        // line 77
                        $context["nextComment"] = true;
                        // line 78
                        yield "                ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['criteria'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 81
                yield "</table>
        </td>
    </tr>
    ";
            }
            // line 85
            yield "</table>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['course'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 87
        yield "<br/>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reports/courseCriteriaByCycle_copy24.twig.html";
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
        return array (  254 => 87,  239 => 85,  233 => 81,  226 => 78,  224 => 77,  220 => 75,  218 => 74,  213 => 70,  211 => 69,  208 => 67,  204 => 65,  201 => 64,  199 => 63,  196 => 62,  194 => 61,  190 => 60,  186 => 58,  183 => 57,  181 => 56,  173 => 52,  164 => 49,  162 => 48,  159 => 47,  155 => 46,  150 => 44,  147 => 42,  145 => 41,  141 => 40,  139 => 38,  132 => 36,  130 => 35,  128 => 34,  125 => 33,  121 => 32,  115 => 28,  99 => 26,  97 => 25,  80 => 24,  76 => 23,  71 => 21,  66 => 17,  62 => 15,  60 => 14,  57 => 13,  40 => 12,  38 => 10,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Report - Chhs 2024 Template
category: Reporting Cycle
types: Body
sources:
    student: Student
    reportingCycle: ReportingCycle
    courseCriteriaByCycle: CourseCriteriaByCycle
-->#}
{{- stylesheet ? include(stylesheet) -}}

{% for course in courseCriteriaByCycle %}

{% if not loop.first %}
    <table cellspacing=\"0\" cellpadding=\"4\"><tr><td style=\"font-size: 1px;\">&nbsp;</td></tr></table>
{% endif %}

<table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"10\" nobr=\"true\">
    <tr>
        <td class=\"header bg-primary border-top border-bottom border-left\" style=\"width:50%;\" rowspan=\"2\">
            {{- course.courseName }}
        </td>
        <td class=\"subheader bg-primary border-top border-bottom border-right\" style=\"width:50%;text-align:right;\" colspan=\"{{ reportingCycle.cycleTotal }}\">
            {% for teacher in course.teachers %}
                {{- teacher.fullName -}}
                {{ not loop.last ? ',' }}
            {% endfor %}
        </td>
    </tr>

    <tr>
        {% for cycleNum in range(1, reportingCycle.cycleTotal|default(1)) %}
            {% set cycleName = reportingCycle.cycles[cycleNum] %}
            <td class=\"border\" >
                {{- cycleName -}}
            </td>
        {% endfor %}
    </tr>
    
    {%- for criteria in course.perStudent -%}
        {% if criteria.valueType != 'Comment' %}
        <tr>
            <td class=\"border\" >
                {{- criteria.criteriaName }}
            </td>
            {% for cycleNum in range(1, reportingCycle.cycleTotal|default(1)) %}
                {% set cycleName = reportingCycle.cycles[cycleNum] %}
                <td class=\"border\" >
                    {{- criteria.values[cycleName].descriptor ?? criteria.values[cycleName].value }}
                </td>
            {% endfor %}
        </tr>
        {% endif %}
    {%- endfor -%}

    {% if course.hasComments %}
    <tr>
        <td class=\"border w-full\" colspan=\"{{ reportingCycle.cycleTotal + 1 }}\">
            <table style=\"width: 100%; padding: 0;\" class=\"w-full\" cellspacing=\"0\" cellpadding=\"0\">
            {%- for criteria in []|merge(course.perGroup|default([]))|merge(course.perStudent|default([])) -%}
            {% set nextComment = false %}
            
                {% if criteria.valueType == 'Comment' %}
                    {% if nextComment %}
                    <tr><td style=\"font-size: 1px;\">&nbsp;</td></tr>
                    {% endif %}
                    <tr>
                        <td class=\"w-full header\" style=\"line-height:1.8;\">
                            {{- criteria.criteriaName -}}
                        </td>
                    </tr>
                    <tr>
                        <td class=\"w-full\" style=\"font-size: 9pt\" >
                            {{- criteria.comment -}}
                        </td>
                    </tr>
                    {% set nextComment = true %}
                {% endif %}
            
            {%- endfor -%}
        </table>
        </td>
    </tr>
    {% endif %}
</table>
{% endfor %}
<br/>
", "reports/courseCriteriaByCycle_copy24.twig.html", "/Applications/MAMP/htdocs/chhs/uploads/reports/templates/reports/courseCriteriaByCycle_copy24.twig.html");
    }
}
