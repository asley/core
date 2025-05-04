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

/* reports/attendance.twig.html */
class __TwigTemplate_be03ab87c68abd68b9adb9f1c0330d1e extends Template
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
        // line 15
        yield ((($context["stylesheet"] ?? null)) ? (Twig\Extension\CoreExtension::include($this->env, $context, ($context["stylesheet"] ?? null))) : (""));
        // line 17
        yield "<style>
    .attendance {
        font-size: 8pt ;
        text-align: center;
        line-height: 1.4;
    }
</style>

";
        // line 25
        if (($context["reportingCycle"] ?? null)) {
            // line 26
            yield "    <table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"4\" nobr=\"true\">
        <tr>
            ";
            // line 28
            $context["width"] = (100 / CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", false, false, false, 28));
            // line 29
            yield "            ";
            $context["count"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "includePresent", [], "any", false, false, false, 29) == "Y")) ? (3) : (2));
            // line 30
            yield "
            ";
            // line 31
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, ((CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", true, true, false, 31)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", false, false, false, 31), 1)) : (1))));
            foreach ($context['_seq'] as $context["_key"] => $context["cycleNum"]) {
                // line 32
                yield "                ";
                $context["cycleName"] = (($__internal_compile_0 = CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycles", [], "any", false, false, false, 32)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["cycleNum"]] ?? null) : null);
                // line 33
                yield "                <td class=\"header bg-primary border\" style=\"width:";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["width"] ?? null), "html", null, true);
                yield "%; line-height: 1.9; text-align: center;\" colspan=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["count"] ?? null), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["cycleName"] ?? null), "html", null, true);
                yield " Attendance</td>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cycleNum'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 35
            yield "        </tr>
        <tr>
            ";
            // line 37
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, ((CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", true, true, false, 37)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", false, false, false, 37), 1)) : (1))));
            foreach ($context['_seq'] as $context["_key"] => $context["cycleNum"]) {
                // line 38
                yield "                ";
                if ((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "includePresent", [], "any", false, false, false, 38) == "Y")) {
                    // line 39
                    yield "                <td class=\"border-bottom border-left attendance\" style=\"width:";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["width"] ?? null) / ($context["count"] ?? null)), "html", null, true);
                    yield "%\"><div class=\"subheader\">Present</div>
                    ";
                    // line 40
                    (($context["cycleNum"]) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attendance"] ?? null), $context["cycleNum"], [], "array", false, true, false, 40), "present", [], "any", true, true, false, 40)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attendance"] ?? null), $context["cycleNum"], [], "array", false, true, false, 40), "present", [], "any", false, false, false, 40), 0)) : (0)), "html", null, true)) : (yield ""));
                    yield "</td>
                ";
                }
                // line 42
                yield "                <td class=\"border-bottom attendance ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "includePresent", [], "any", false, false, false, 42) != "Y")) ? ("border-left") : (""));
                yield "\" style=\"width:";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["width"] ?? null) / ($context["count"] ?? null)), "html", null, true);
                yield "%\"><div class=\"subheader\">Absent</div>
                    ";
                // line 43
                (($context["cycleNum"]) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attendance"] ?? null), $context["cycleNum"], [], "array", false, true, false, 43), "absent", [], "any", true, true, false, 43)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attendance"] ?? null), $context["cycleNum"], [], "array", false, true, false, 43), "absent", [], "any", false, false, false, 43), 0)) : (0)), "html", null, true)) : (yield ""));
                yield "</td>
                <td class=\"border-bottom border-right attendance\" style=\"width:";
                // line 44
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["width"] ?? null) / ($context["count"] ?? null)), "html", null, true);
                yield "%\"><div class=\"subheader\">Late</div>
                    ";
                // line 45
                (($context["cycleNum"]) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attendance"] ?? null), $context["cycleNum"], [], "array", false, true, false, 45), "late", [], "any", true, true, false, 45)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attendance"] ?? null), $context["cycleNum"], [], "array", false, true, false, 45), "late", [], "any", false, false, false, 45), 0)) : (0)), "html", null, true)) : (yield ""));
                yield "
                </td>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cycleNum'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            yield "        </tr> 
    </table>
";
        }
        // line 52
        yield "<br/>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reports/attendance.twig.html";
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
        return array (  134 => 52,  129 => 48,  120 => 45,  116 => 44,  112 => 43,  105 => 42,  100 => 40,  95 => 39,  92 => 38,  88 => 37,  84 => 35,  71 => 33,  68 => 32,  64 => 31,  61 => 30,  58 => 29,  56 => 28,  52 => 26,  50 => 25,  40 => 17,  38 => 15,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Attendance
category: Student Data
types: Body
sources:
    student: Student
    attendance: AttendanceByCycle
    reportingCycle: ReportingCycle
config:
    includePresent:
        label: Include Present?
        type: yesno
        default: N
-->#}
{{- stylesheet ? include(stylesheet) -}}

<style>
    .attendance {
        font-size: 8pt ;
        text-align: center;
        line-height: 1.4;
    }
</style>

{% if reportingCycle %}
    <table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"4\" nobr=\"true\">
        <tr>
            {% set width = 100 / reportingCycle.cycleTotal %}
            {% set count = config.includePresent == 'Y' ? 3 : 2 %}

            {% for cycleNum in range(1, reportingCycle.cycleTotal|default(1)) %}
                {% set cycleName = reportingCycle.cycles[cycleNum] %}
                <td class=\"header bg-primary border\" style=\"width:{{ width }}%; line-height: 1.9; text-align: center;\" colspan=\"{{ count }}\">{{ cycleName }} Attendance</td>
            {% endfor %}
        </tr>
        <tr>
            {% for cycleNum in range(1, reportingCycle.cycleTotal|default(1)) %}
                {% if config.includePresent == 'Y' %}
                <td class=\"border-bottom border-left attendance\" style=\"width:{{ width / count }}%\"><div class=\"subheader\">Present</div>
                    {{ cycleNum? attendance[cycleNum].present|default(0) }}</td>
                {% endif %}
                <td class=\"border-bottom attendance {{ config.includePresent != 'Y' ? 'border-left' : '' }}\" style=\"width:{{ width / count }}%\"><div class=\"subheader\">Absent</div>
                    {{ cycleNum? attendance[cycleNum].absent|default(0) }}</td>
                <td class=\"border-bottom border-right attendance\" style=\"width:{{ width / count }}%\"><div class=\"subheader\">Late</div>
                    {{ cycleNum? attendance[cycleNum].late|default(0) }}
                </td>
            {% endfor %}
        </tr> 
    </table>
{% endif -%}

<br/>
", "reports/attendance.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/reports/attendance.twig.html");
    }
}
