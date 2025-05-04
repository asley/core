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

/* reports/courseCriteriaByCycle_chhs_Backup.twig.html */
class __TwigTemplate_6190e8dc0b42eb71f331b0f138a9a4d6 extends Template
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
        foreach ($context['_seq'] as $context["_key"] => $context["course"]) {
            // line 13
            yield "
<table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"4\" nobr=\"true\">
    <tr>
        <td colspan=\"";
            // line 16
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", false, false, false, 16)) + 1), "html", null, true);
            yield "\" class=\"header bg-primary border\">
            ";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "courseName", [], "any", false, false, false, 17), "html", null, true);
            yield "
        </td>
        <td style=\"text-align: right;\">
            ";
            // line 20
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "teachers", [], "any", false, false, false, 20));
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
                // line 21
                yield "                ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["teacher"], "fullName", [], "any", false, false, false, 21), "html", null, true);
                yield (( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 21)) ? (", ") : (""));
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
            // line 23
            yield "        </td>
    </tr>
    
    <tr>
        <td class=\"subheader border\">Cycle</td>
        ";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", false, false, false, 28));
            foreach ($context['_seq'] as $context["_key"] => $context["criteria"]) {
                // line 29
                yield "            ";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "valueType", [], "any", false, false, false, 29) != "Comment")) {
                    // line 30
                    yield "                <td class=\"subheader border\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "criteriaName", [], "any", false, false, false, 30), "html", null, true);
                    yield "</td>
            ";
                }
                // line 32
                yield "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['criteria'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            yield "    </tr>

    ";
            // line 35
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, ((CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", true, true, false, 35)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", false, false, false, 35), 1)) : (1))));
            foreach ($context['_seq'] as $context["_key"] => $context["cycleNum"]) {
                // line 36
                yield "    <tr class=\"cycle-row\">
        ";
                // line 37
                $context["cycleName"] = (($__internal_compile_0 = CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycles", [], "any", false, false, false, 37)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["cycleNum"]] ?? null) : null);
                // line 38
                yield "        <td class=\"border\">Cycle ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["cycleNum"], "html", null, true);
                yield "</td>
        ";
                // line 39
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", false, false, false, 39));
                foreach ($context['_seq'] as $context["_key"] => $context["criteria"]) {
                    // line 40
                    yield "            ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "valueType", [], "any", false, false, false, 40) != "Comment")) {
                        // line 41
                        yield "                <td class=\"border\">
                    ";
                        // line 42
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 42), ($context["cycleName"] ?? null), [], "array", false, true, false, 42), "descriptor", [], "any", true, true, false, 42) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 42), ($context["cycleName"] ?? null), [], "array", false, true, false, 42), "descriptor", [], "any", false, false, false, 42)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 42), ($context["cycleName"] ?? null), [], "array", false, true, false, 42), "descriptor", [], "any", false, false, false, 42)) : (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 42), ($context["cycleName"] ?? null), [], "array", false, true, false, 42), "value", [], "any", true, true, false, 42)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 42), ($context["cycleName"] ?? null), [], "array", false, true, false, 42), "value", [], "any", false, false, false, 42), "N/A")) : ("N/A")))), "html", null, true);
                        yield "
                </td>
            ";
                    }
                    // line 45
                    yield "        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['criteria'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 46
                yield "    </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cycleNum'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            yield "
    ";
            // line 49
            if (CoreExtension::getAttribute($this->env, $this->source, $context["course"], "hasComments", [], "any", false, false, false, 49)) {
                // line 50
                yield "    <tr>
        <td colspan=\"";
                // line 51
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", false, false, false, 51)) + 1), "html", null, true);
                yield "\" class=\"border bg-secondary\" style=\"font-size: 90%; text-align: left;\">
            ";
                // line 52
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", false, false, false, 52));
                foreach ($context['_seq'] as $context["_key"] => $context["criteria"]) {
                    // line 53
                    yield "                ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "valueType", [], "any", false, false, false, 53) == "Comment")) {
                        // line 54
                        yield "                    ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 54), ($context["cycleName"] ?? null), [], "array", false, true, false, 54), "descriptor", [], "any", true, true, false, 54) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 54), ($context["cycleName"] ?? null), [], "array", false, true, false, 54), "descriptor", [], "any", false, false, false, 54)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 54), ($context["cycleName"] ?? null), [], "array", false, true, false, 54), "descriptor", [], "any", false, false, false, 54)) : (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 54), ($context["cycleName"] ?? null), [], "array", false, true, false, 54), "value", [], "any", true, true, false, 54)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 54), ($context["cycleName"] ?? null), [], "array", false, true, false, 54), "value", [], "any", false, false, false, 54), "No comments available.")) : ("No comments available.")))), "html", null, true);
                        yield "
                ";
                    }
                    // line 56
                    yield "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['criteria'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 57
                yield "        </td>
    </tr>
    ";
            }
            // line 60
            yield "</table>

<div class=\"course-divider\"></div> <!-- Divider between courses -->

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['course'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reports/courseCriteriaByCycle_chhs_Backup.twig.html";
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
        return array (  203 => 60,  198 => 57,  192 => 56,  186 => 54,  183 => 53,  179 => 52,  175 => 51,  172 => 50,  170 => 49,  167 => 48,  160 => 46,  154 => 45,  148 => 42,  145 => 41,  142 => 40,  138 => 39,  133 => 38,  131 => 37,  128 => 36,  124 => 35,  120 => 33,  114 => 32,  108 => 30,  105 => 29,  101 => 28,  94 => 23,  76 => 21,  59 => 20,  53 => 17,  49 => 16,  44 => 13,  40 => 12,  38 => 10,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Asley Smith CHHS
category: Cycle Template
types: Body
sources:
    student: Student
    reportingCycle: ReportingCycle
    courseCriteriaByCycle: CourseCriteriaByCycle
-->#}
{{- stylesheet ? include(stylesheet) -}}

{% for course in courseCriteriaByCycle %}

<table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"4\" nobr=\"true\">
    <tr>
        <td colspan=\"{{ course.perStudent | length + 1 }}\" class=\"header bg-primary border\">
            {{ course.courseName }}
        </td>
        <td style=\"text-align: right;\">
            {% for teacher in course.teachers %}
                {{ teacher.fullName }}{{ not loop.last ? ', ' : '' }}
            {% endfor %}
        </td>
    </tr>
    
    <tr>
        <td class=\"subheader border\">Cycle</td>
        {% for criteria in course.perStudent %}
            {% if criteria.valueType != 'Comment' %}
                <td class=\"subheader border\">{{ criteria.criteriaName }}</td>
            {% endif %}
        {% endfor %}
    </tr>

    {% for cycleNum in range(1, reportingCycle.cycleTotal|default(1)) %}
    <tr class=\"cycle-row\">
        {% set cycleName = reportingCycle.cycles[cycleNum] %}
        <td class=\"border\">Cycle {{ cycleNum }}</td>
        {% for criteria in course.perStudent %}
            {% if criteria.valueType != 'Comment' %}
                <td class=\"border\">
                    {{ criteria.values[cycleName].descriptor ?? criteria.values[cycleName].value | default('N/A') }}
                </td>
            {% endif %}
        {% endfor %}
    </tr>
    {% endfor %}

    {% if course.hasComments %}
    <tr>
        <td colspan=\"{{ course.perStudent | length + 1 }}\" class=\"border bg-secondary\" style=\"font-size: 90%; text-align: left;\">
            {% for criteria in course.perStudent %}
                {% if criteria.valueType == 'Comment' %}
                    {{ criteria.values[cycleName].descriptor ?? criteria.values[cycleName].value | default('No comments available.') }}
                {% endif %}
            {% endfor %}
        </td>
    </tr>
    {% endif %}
</table>

<div class=\"course-divider\"></div> <!-- Divider between courses -->

{% endfor %}
", "reports/courseCriteriaByCycle_chhs_Backup.twig.html", "/Applications/MAMP/htdocs/chhs/uploads/reports/templates/reports/courseCriteriaByCycle_chhs_Backup.twig.html");
    }
}
