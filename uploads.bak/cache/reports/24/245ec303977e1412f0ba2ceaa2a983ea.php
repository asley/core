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

/* reports/internalAssessmentByCourse_CHHS_2025_February.twig.html */
class __TwigTemplate_7ae01ff9903dfe5078524f5a25aa53e2 extends Template
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
        // line 21
        yield ((($context["stylesheet"] ?? null)) ? (Twig\Extension\CoreExtension::include($this->env, $context, ($context["stylesheet"] ?? null))) : (""));
        // line 24
        $context["totalArray"] = [];
        // line 25
        $context["percentArray"] = [];
        // line 26
        yield "
";
        // line 28
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "limitByReportingCycle", [], "any", false, false, false, 28) == "Y")) {
            // line 29
            yield "    ";
            $context["allAssessments"] = Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["internalAssessmentByCourse"] ?? null), "assessments", [], "any", false, false, false, 29), function ($__a__) use ($context, $macros) { $context["a"] = $__a__; return ((CoreExtension::getAttribute($this->env, $this->source, ($context["a"] ?? null), "completeDate", [], "any", false, false, false, 29) >= CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "dateStart", [], "any", false, false, false, 29)) && (CoreExtension::getAttribute($this->env, $this->source, ($context["a"] ?? null), "completeDate", [], "any", false, false, false, 29) <= CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "dateEnd", [], "any", false, false, false, 29))); });
        } else {
            // line 31
            yield "    ";
            $context["allAssessments"] = CoreExtension::getAttribute($this->env, $this->source, ($context["internalAssessmentByCourse"] ?? null), "assessments", [], "any", false, false, false, 31);
        }
        // line 33
        yield "
";
        // line 35
        yield "<tr>
        ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, ((CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", true, true, false, 36)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", false, false, false, 36), 1)) : (1))));
        foreach ($context['_seq'] as $context["_key"] => $context["cycleNum"]) {
            // line 37
            yield "            ";
            $context["cycleName"] = (($__internal_compile_0 = CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycles", [], "any", false, false, false, 37)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["cycleNum"]] ?? null) : null);
            // line 38
            yield "            <td class=\"border\" >";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["cycleName"] ?? null), "html", null, true);
            // line 40
            yield "</td>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cycleNum'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        yield "    </tr>

<table class= \"w-full table\" cellspacing=\"0\" cellpadding=\"4\" nobr=\"true\" style=\"font-size: 11px;\">
    ";
        // line 46
        yield "    <tr>
        <td class=\"header bg-primary border-top border-bottom border-right border-left\">
            ";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Subjects"), "html", null, true);
        yield "
        </td>
        <td class=\"header bg-primary border-top border-bottom border-left border-right text-center\">
            ";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Grade"), "html", null, true);
        yield "
        </td>
        <td class=\"header bg-primary border-top border-bottom border-left border-right text-center\">
            ";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Effort"), "html", null, true);
        yield "
        </td>
    </tr>

    ";
        // line 59
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["internalAssessmentByCourse"] ?? null), "courses", [], "any", false, false, false, 59));
        foreach ($context['_seq'] as $context["course"] => $context["assessments"]) {
            // line 60
            yield "    <tr>
        <td class=\"border-top bg-primary border-bottom border-left \" style=\"font-weight: bold;\">
            ";
            // line 62
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["course"], "html", null, true);
            yield "
        </td>

        ";
            // line 66
            yield "        ";
            $context["firstAssessment"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), Twig\Extension\CoreExtension::keys($context["assessments"]));
            // line 67
            yield "        ";
            $context["assessmentData"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["assessments"], ($context["firstAssessment"] ?? null), [], "array", true, true, false, 67)) ? ((($__internal_compile_1 = $context["assessments"]) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[($context["firstAssessment"] ?? null)] ?? null) : null)) : ([]));
            // line 68
            yield "
        ";
            // line 70
            yield "        <td class=\"border-top bg-primary border-bottom border-left text-center\">
            ";
            // line 71
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((CoreExtension::getAttribute($this->env, $this->source, ($context["assessmentData"] ?? null), "attainmentDescriptor", [], "any", true, true, false, 71) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["assessmentData"] ?? null), "attainmentDescriptor", [], "any", false, false, false, 71)))) ? (CoreExtension::getAttribute($this->env, $this->source,             // line 72
($context["assessmentData"] ?? null), "attainmentDescriptor", [], "any", false, false, false, 72)) : ((((CoreExtension::getAttribute($this->env, $this->source,             // line 73
($context["assessmentData"] ?? null), "attainmentValue", [], "any", true, true, false, 73) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["assessmentData"] ?? null), "attainmentValue", [], "any", false, false, false, 73)))) ? (CoreExtension::getAttribute($this->env, $this->source,             // line 74
($context["assessmentData"] ?? null), "attainmentValue", [], "any", false, false, false, 74)) : ("N/A")))), "html", null, true);
            // line 75
            yield "
        </td>

        ";
            // line 79
            yield "        <td class=\"border-top bg-primary border-bottom border-left border-right text-center\">
            ";
            // line 80
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((CoreExtension::getAttribute($this->env, $this->source, ($context["assessmentData"] ?? null), "effortDescriptor", [], "any", true, true, false, 80) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["assessmentData"] ?? null), "effortDescriptor", [], "any", false, false, false, 80)))) ? (CoreExtension::getAttribute($this->env, $this->source,             // line 81
($context["assessmentData"] ?? null), "effortDescriptor", [], "any", false, false, false, 81)) : ((((CoreExtension::getAttribute($this->env, $this->source,             // line 82
($context["assessmentData"] ?? null), "effortValue", [], "any", true, true, false, 82) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["assessmentData"] ?? null), "effortValue", [], "any", false, false, false, 82)))) ? (CoreExtension::getAttribute($this->env, $this->source,             // line 83
($context["assessmentData"] ?? null), "effortValue", [], "any", false, false, false, 83)) : ("N/A")))), "html", null, true);
            // line 84
            yield "
        </td>

        ";
            // line 88
            yield "        ";
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["assessmentData"] ?? null), "attainmentValue", [], "any", true, true, false, 88) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["assessmentData"] ?? null), "attainmentValue", [], "any", false, false, false, 88)))) {
                // line 89
                yield "            ";
                $context["totalArray"] = Twig\Extension\CoreExtension::merge(($context["totalArray"] ?? null), [$context["course"] => Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::replace(CoreExtension::getAttribute($this->env, $this->source, ($context["assessmentData"] ?? null), "attainmentValue", [], "any", false, false, false, 89), ["%" => "", "," => ""]))]);
                // line 90
                yield "        ";
            }
            // line 91
            yield "
        ";
            // line 92
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["assessmentData"] ?? null), "effortValue", [], "any", true, true, false, 92) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["assessmentData"] ?? null), "effortValue", [], "any", false, false, false, 92)))) {
                // line 93
                yield "            ";
                $context["percentArray"] = Twig\Extension\CoreExtension::merge(($context["percentArray"] ?? null), [$context["course"] => Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::replace(CoreExtension::getAttribute($this->env, $this->source, ($context["assessmentData"] ?? null), "effortValue", [], "any", false, false, false, 93), ["%" => "", "," => ""]))]);
                // line 94
                yield "        ";
            }
            // line 95
            yield "    </tr>

    ";
            // line 98
            yield "    ";
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["assessmentData"] ?? null), "comment", [], "any", true, true, false, 98) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["assessmentData"] ?? null), "comment", [], "any", false, false, false, 98)))) {
                // line 99
                yield "    <tr>
        <td class=\"border-bottom border-left border-right bg-light text-sm\" colspan=\"3\" style=\"font-size: 9px; padding: 3px;\">
            <i>";
                // line 101
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["assessmentData"] ?? null), "comment", [], "any", false, false, false, 101), "html", null, true);
                yield "</i>
            <br>
            <span style=\"font-size: 7px; font-weight: bold; display: inline-block; width: 50%;\">
                ";
                // line 106
                (((CoreExtension::getAttribute($this->env, $this->source,                 // line 104
($context["assessmentData"] ?? null), "teacherName", [], "any", true, true, false, 104) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["assessmentData"] ?? null), "teacherName", [], "any", false, false, false, 104)))) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source,                 // line 105
($context["assessmentData"] ?? null), "teacherName", [], "any", false, false, false, 105), "html", null, true)) : (yield "N/A"));
                // line 106
                yield "
            </span>
        </td>
    </tr>
    ";
            }
            // line 111
            yield "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['course'], $context['assessments'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 113
        yield "    
    ";
        // line 115
        yield "   

    ";
        // line 117
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "includeAverage", [], "any", false, false, false, 117) == "Y")) {
            // line 118
            yield "<tr>
     <td class=\"header bg-primary border-top border-bottom border-left border-right text-center\" style=\"font-weight: bold;\">
        ";
            // line 120
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Average"), "html", null, true);
            yield "
    </td> 
    

    ";
            // line 125
            yield "    ";
            $context["totalAttainmentSum"] = 0;
            // line 126
            yield "    ";
            $context["totalAttainmentCount"] = 0;
            // line 127
            yield "
       

    ";
            // line 130
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["totalArray"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                // line 131
                yield "        ";
                // line 132
                yield "        ";
                $context["cleanedValue"] = Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::replace($context["value"], ["%" => ""]));
                // line 133
                yield "
        ";
                // line 135
                yield "     ";
                // line 136
                yield "        ";
                if (CoreExtension::matches("/^\\d+\$/", ($context["cleanedValue"] ?? null))) {
                    // line 137
                    yield "        ";
                }
                // line 138
                yield "
        ";
                // line 140
                yield "        ";
                if (CoreExtension::matches("/^[-+]?[0-9]*\\.?[0-9]+\$/", ($context["cleanedValue"] ?? null))) {
                    // line 141
                    yield "        ";
                }
                // line 142
                yield "


            ";
                // line 146
                yield "            ";
                $context["numericValue"] = (($context["cleanedValue"] ?? null) * 1);
                // line 147
                yield "            ";
                $context["totalAttainmentSum"] = (($context["totalAttainmentSum"] ?? null) + ($context["numericValue"] ?? null));
                // line 148
                yield "            ";
                $context["totalAttainmentCount"] = (($context["totalAttainmentCount"] ?? null) + 1);
                // line 149
                yield "       
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 151
            yield "


    ";
            // line 155
            yield "    <td class=\"header bg-primary border-top border-bottom border-left border-right text-center\">
        ";
            // line 156
            if ((($context["totalAttainmentCount"] ?? null) > 0)) {
                // line 157
                yield "            ";
                $context["averageAttainment"] = Twig\Extension\CoreExtension::round((($context["totalAttainmentSum"] ?? null) / ($context["totalAttainmentCount"] ?? null)), 1);
                // line 158
                yield "            ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["averageAttainment"] ?? null), "html", null, true);
                yield "%
        ";
            } else {
                // line 160
                yield "            N/A
        ";
            }
            // line 162
            yield "    </td>

    
</tr>
";
        }
        // line 167
        yield "    
</table>






";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reports/internalAssessmentByCourse_CHHS_2025_February.twig.html";
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
        return array (  325 => 167,  318 => 162,  314 => 160,  308 => 158,  305 => 157,  303 => 156,  300 => 155,  295 => 151,  288 => 149,  285 => 148,  282 => 147,  279 => 146,  274 => 142,  271 => 141,  268 => 140,  265 => 138,  262 => 137,  259 => 136,  257 => 135,  254 => 133,  251 => 132,  249 => 131,  245 => 130,  240 => 127,  237 => 126,  234 => 125,  227 => 120,  223 => 118,  221 => 117,  217 => 115,  214 => 113,  207 => 111,  200 => 106,  198 => 105,  197 => 104,  196 => 106,  190 => 101,  186 => 99,  183 => 98,  179 => 95,  176 => 94,  173 => 93,  171 => 92,  168 => 91,  165 => 90,  162 => 89,  159 => 88,  154 => 84,  152 => 83,  151 => 82,  150 => 81,  149 => 80,  146 => 79,  141 => 75,  139 => 74,  138 => 73,  137 => 72,  136 => 71,  133 => 70,  130 => 68,  127 => 67,  124 => 66,  118 => 62,  114 => 60,  109 => 59,  102 => 54,  96 => 51,  90 => 48,  86 => 46,  81 => 42,  74 => 40,  72 => 39,  70 => 38,  67 => 37,  63 => 36,  60 => 35,  57 => 33,  53 => 31,  49 => 29,  47 => 28,  44 => 26,  42 => 25,  40 => 24,  38 => 21,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Internal Assessment by Course February 2025
category: Student Data
types: Body
sources:
    student: Student
    internalAssessmentByCourse: InternalAssessmentByCourse
    reportingCycle: ReportingCycle
config:
    includeAverage:
        label: Include Average Attainment?
        type: yesno
        default: Y
    limitByReportingCycle:
        label: Limit Columns by Reporting Cycle?
        type: yesno
        default: Y
-->#}


{{- stylesheet ? include(stylesheet) -}}


{% set totalArray = {} %}
{% set percentArray = {} %}

{# ✅ Filter assessments based on reporting cycle configuration #}
{% if config.limitByReportingCycle == 'Y' %}
    {% set allAssessments = internalAssessmentByCourse.assessments|filter(a => (a.completeDate >= reportingCycle.dateStart and a.completeDate <= reportingCycle.dateEnd) ) %}
{% else %}
    {% set allAssessments = internalAssessmentByCourse.assessments %}
{% endif %}

{# Reporting Cycle#}
<tr>
        {% for cycleNum in range(1, reportingCycle.cycleTotal|default(1)) %}
            {% set cycleName = reportingCycle.cycles[cycleNum] %}
            <td class=\"border\" >
                {{- cycleName -}}
            </td>
        {% endfor %}
    </tr>

<table class= \"w-full table\" cellspacing=\"0\" cellpadding=\"4\" nobr=\"true\" style=\"font-size: 11px;\">
    {# 🔹 Table Header Row: Course Names #}
    <tr>
        <td class=\"header bg-primary border-top border-bottom border-right border-left\">
            {{ __('Subjects') }}
        </td>
        <td class=\"header bg-primary border-top border-bottom border-left border-right text-center\">
            {{ __('Grade') }}
        </td>
        <td class=\"header bg-primary border-top border-bottom border-left border-right text-center\">
            {{ __('Effort') }}
        </td>
    </tr>

    {# 🔹 Iterate Through Each Course and Display Data #}
    {% for course, assessments in internalAssessmentByCourse.courses %}
    <tr>
        <td class=\"border-top bg-primary border-bottom border-left \" style=\"font-weight: bold;\">
            {{ course }}
        </td>

        {# ✅ Dynamically Fetch the First Available Assessment Name #}
        {% set firstAssessment = assessments|keys|first %}
        {% set assessmentData = assessments[firstAssessment] is defined ? assessments[firstAssessment] : {} %}

        {# ✅ Display Attainment Value or Descriptor #}
        <td class=\"border-top bg-primary border-bottom border-left text-center\">
            {{ assessmentData.attainmentDescriptor is defined and assessmentData.attainmentDescriptor is not empty
                ? assessmentData.attainmentDescriptor
                : (assessmentData.attainmentValue is defined and assessmentData.attainmentValue is not empty 
                    ? assessmentData.attainmentValue 
                    : 'N/A') }}
        </td>

        {# ✅ Display Effort Value or Descriptor #}
        <td class=\"border-top bg-primary border-bottom border-left border-right text-center\">
            {{ assessmentData.effortDescriptor is defined and assessmentData.effortDescriptor is not empty
                ? assessmentData.effortDescriptor
                : (assessmentData.effortValue is defined and assessmentData.effortValue is not empty 
                    ? assessmentData.effortValue 
                    : 'N/A') }}
        </td>

        {# ✅ Store total values for calculating averages #}
        {% if assessmentData.attainmentValue is defined and assessmentData.attainmentValue is not empty %}
            {% set totalArray = totalArray|merge({ (course): (assessmentData.attainmentValue|replace({'%': '', ',': ''})|trim) }) %}
        {% endif %}

        {% if assessmentData.effortValue is defined and assessmentData.effortValue is not empty %}
            {% set percentArray = percentArray|merge({ (course): (assessmentData.effortValue|replace({'%': '', ',': ''})|trim) }) %}
        {% endif %}
    </tr>

    {# 🔹 Row for displaying Teacher Comments & Teacher Name #}
    {% if assessmentData.comment is defined and assessmentData.comment is not empty %}
    <tr>
        <td class=\"border-bottom border-left border-right bg-light text-sm\" colspan=\"3\" style=\"font-size: 9px; padding: 3px;\">
            <i>{{ assessmentData.comment }}</i>
            <br>
            <span style=\"font-size: 7px; font-weight: bold; display: inline-block; width: 50%;\">
                {{ assessmentData.teacherName is defined and assessmentData.teacherName is not empty 
                    ? assessmentData.teacherName 
                    : 'N/A' }}
            </span>
        </td>
    </tr>
    {% endif %}

    {% endfor %}
    
    {# ✅ Display Average Scores (If Configured) #}
   

    {% if config.includeAverage == 'Y' %}
<tr>
     <td class=\"header bg-primary border-top border-bottom border-left border-right text-center\" style=\"font-weight: bold;\">
        {{ __('Average') }}
    </td> 
    

    {# Initialize Sum and Count for Attainment #}
    {% set totalAttainmentSum = 0 %}
    {% set totalAttainmentCount = 0 %}

       

    {% for key, value in totalArray %}
        {# Remove '%' and trim whitespace #}
        {% set cleanedValue = value|replace({'%': ''})|trim %}

        {# Check if the cleaned value is numeric #}
     {# Match integer #}
        {% if cleanedValue matches '/^\\\\d+\$/' %}
        {% endif %}

        {# Match floating point number #}
        {% if cleanedValue matches '/^[-+]?[0-9]*\\\\.?[0-9]+\$/' %}
        {% endif %}



            {# Coerce to number by multiplying by 1 #}
            {% set numericValue = cleanedValue * 1 %}
            {% set totalAttainmentSum = totalAttainmentSum + numericValue %}
            {% set totalAttainmentCount = totalAttainmentCount + 1 %}
       
    {% endfor %}



    {# Display Calculated Average Attainment #}
    <td class=\"header bg-primary border-top border-bottom border-left border-right text-center\">
        {% if totalAttainmentCount > 0 %}
            {% set averageAttainment = (totalAttainmentSum / totalAttainmentCount)|round(1) %}
            {{ averageAttainment }}%
        {% else %}
            N/A
        {% endif %}
    </td>

    
</tr>
{% endif %}
    
</table>






", "reports/internalAssessmentByCourse_CHHS_2025_February.twig.html", "/Applications/MAMP/htdocs/chhs/uploads/reports/templates/reports/internalAssessmentByCourse_CHHS_2025_February.twig.html");
    }
}
