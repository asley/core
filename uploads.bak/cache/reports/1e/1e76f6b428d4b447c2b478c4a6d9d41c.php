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

/* reports/attendance_copy2.twig.html */
class __TwigTemplate_0c36ad4699c02f869d3fb02b401728d7 extends Template
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
        // line 14
        yield ((($context["stylesheet"] ?? null)) ? (Twig\Extension\CoreExtension::include($this->env, $context, ($context["stylesheet"] ?? null))) : (""));
        // line 16
        yield "<style>
    @page {
        size: legal portrait;
        margin: 0.5in;
    }
    body {
        font-family: Arial, sans-serif;
        font-size: 8pt; /* Smaller font size */
    }
    table {
        width: 60%; /* Smaller table width */
        margin: auto; /* Center align the table */
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #000;
        text-align: center;
        padding: 3px; /* Reduced padding */
        line-height: 1.2; /* Reduced line height */
    }
    .header {
        background-color: #d9d9d9;
        font-weight: bold;
    }
    .subheader {
        background-color: #f0f0f0;
        font-style: italic;
    }
</style>

";
        // line 46
        if ((($context["reportingCycle"] ?? null) && ($context["attendance"] ?? null))) {
            // line 47
            yield "    ";
            $context["cycleNum"] = 1;
            // line 48
            yield "    ";
            $context["cycleName"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycles", [], "any", false, true, false, 48), ($context["cycleNum"] ?? null), [], "array", true, true, false, 48)) ? (Twig\Extension\CoreExtension::default((($__internal_compile_0 = CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycles", [], "any", false, true, false, 48)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[($context["cycleNum"] ?? null)] ?? null) : null), ("Cycle " . ($context["cycleNum"] ?? null)))) : (("Cycle " . ($context["cycleNum"] ?? null))));
            // line 49
            yield "
    <table cellspacing=\"0\" cellpadding=\"2\" nobr=\"true\">
        <thead>
            <tr>
                <th class=\"header\" colspan=\"4\">";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["cycleName"] ?? null), "html", null, true);
            yield " Attendance Summary</th>
            </tr>
            <tr>
                ";
            // line 56
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "includePresent", [], "any", false, false, false, 56) == "Y")) {
                // line 57
                yield "                <th class=\"subheader\">Present</th>
                ";
            }
            // line 59
            yield "                <th class=\"subheader\">Absent</th>
                <th class=\"subheader\">Late</th>
                <th class=\"subheader\">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                ";
            // line 66
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "includePresent", [], "any", false, false, false, 66) == "Y")) {
                // line 67
                yield "                <td>
                    ";
                // line 68
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attendance"] ?? null), ($context["cycleNum"] ?? null), [], "array", false, true, false, 68), "present", [], "any", true, true, false, 68)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attendance"] ?? null), ($context["cycleNum"] ?? null), [], "array", false, true, false, 68), "present", [], "any", false, false, false, 68), 0)) : (0)), "html", null, true);
                yield "
                </td>
                ";
            }
            // line 71
            yield "                <td>
                    ";
            // line 72
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attendance"] ?? null), ($context["cycleNum"] ?? null), [], "array", false, true, false, 72), "absent", [], "any", true, true, false, 72)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attendance"] ?? null), ($context["cycleNum"] ?? null), [], "array", false, true, false, 72), "absent", [], "any", false, false, false, 72), 0)) : (0)), "html", null, true);
            yield "
                </td>
                <td>
                    ";
            // line 75
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attendance"] ?? null), ($context["cycleNum"] ?? null), [], "array", false, true, false, 75), "late", [], "any", true, true, false, 75)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attendance"] ?? null), ($context["cycleNum"] ?? null), [], "array", false, true, false, 75), "late", [], "any", false, false, false, 75), 0)) : (0)), "html", null, true);
            yield "
                </td>
                <td>
                    ";
            // line 78
            $context["total"] = ((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attendance"] ?? null), ($context["cycleNum"] ?? null), [], "array", false, true, false, 78), "present", [], "any", true, true, false, 78)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attendance"] ?? null), ($context["cycleNum"] ?? null), [], "array", false, true, false, 78), "present", [], "any", false, false, false, 78), 0)) : (0)) + ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 79
($context["attendance"] ?? null), ($context["cycleNum"] ?? null), [], "array", false, true, false, 79), "absent", [], "any", true, true, false, 79)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attendance"] ?? null), ($context["cycleNum"] ?? null), [], "array", false, true, false, 79), "absent", [], "any", false, false, false, 79), 0)) : (0))) + ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 80
($context["attendance"] ?? null), ($context["cycleNum"] ?? null), [], "array", false, true, false, 80), "late", [], "any", true, true, false, 80)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attendance"] ?? null), ($context["cycleNum"] ?? null), [], "array", false, true, false, 80), "late", [], "any", false, false, false, 80), 0)) : (0)));
            // line 81
            yield "                    ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["total"] ?? null), "html", null, true);
            yield "
                </td>
            </tr>
        </tbody>
    </table>
";
        } else {
            // line 87
            yield "    <p style=\"text-align: center; font-size: 8pt;\">No attendance data available for the selected cycle.</p>
";
        }
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reports/attendance_copy2.twig.html";
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
        return array (  147 => 87,  137 => 81,  135 => 80,  134 => 79,  133 => 78,  127 => 75,  121 => 72,  118 => 71,  112 => 68,  109 => 67,  107 => 66,  98 => 59,  94 => 57,  92 => 56,  86 => 53,  80 => 49,  77 => 48,  74 => 47,  72 => 46,  40 => 16,  38 => 14,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Attendance - Single Cycle Compact
category: Student Data
sources:
    student: Student
    attendance: AttendanceByCycle
    reportingCycle: ReportingCycle
config:
    includePresent:
        label: Include Present?
        type: yesno
        default: Y
-->#}
{{- stylesheet ? include(stylesheet) -}}

<style>
    @page {
        size: legal portrait;
        margin: 0.5in;
    }
    body {
        font-family: Arial, sans-serif;
        font-size: 8pt; /* Smaller font size */
    }
    table {
        width: 60%; /* Smaller table width */
        margin: auto; /* Center align the table */
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #000;
        text-align: center;
        padding: 3px; /* Reduced padding */
        line-height: 1.2; /* Reduced line height */
    }
    .header {
        background-color: #d9d9d9;
        font-weight: bold;
    }
    .subheader {
        background-color: #f0f0f0;
        font-style: italic;
    }
</style>

{% if reportingCycle and attendance %}
    {% set cycleNum = 1 %}
    {% set cycleName = reportingCycle.cycles[cycleNum] | default('Cycle ' ~ cycleNum) %}

    <table cellspacing=\"0\" cellpadding=\"2\" nobr=\"true\">
        <thead>
            <tr>
                <th class=\"header\" colspan=\"4\">{{ cycleName }} Attendance Summary</th>
            </tr>
            <tr>
                {% if config.includePresent == 'Y' %}
                <th class=\"subheader\">Present</th>
                {% endif %}
                <th class=\"subheader\">Absent</th>
                <th class=\"subheader\">Late</th>
                <th class=\"subheader\">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                {% if config.includePresent == 'Y' %}
                <td>
                    {{ attendance[cycleNum].present | default(0) }}
                </td>
                {% endif %}
                <td>
                    {{ attendance[cycleNum].absent | default(0) }}
                </td>
                <td>
                    {{ attendance[cycleNum].late | default(0) }}
                </td>
                <td>
                    {% set total = (attendance[cycleNum].present|default(0)) 
                                    + (attendance[cycleNum].absent|default(0)) 
                                    + (attendance[cycleNum].late|default(0)) %}
                    {{ total }}
                </td>
            </tr>
        </tbody>
    </table>
{% else %}
    <p style=\"text-align: center; font-size: 8pt;\">No attendance data available for the selected cycle.</p>
{% endif %}
", "reports/attendance_copy2.twig.html", "/Applications/MAMP/htdocs/chhs/uploads/reports/templates/reports/attendance_copy2.twig.html");
    }
}
