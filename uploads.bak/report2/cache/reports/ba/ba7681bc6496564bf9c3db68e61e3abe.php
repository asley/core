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

/* reports/ClementHowellReport2025.twig.html */
class __TwigTemplate_e912cfa680ef4d6e1649df8179c5b6a8 extends Template
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
        yield ((($context["stylesheet"] ?? null)) ? (Twig\Extension\CoreExtension::include($this->env, $context, ($context["stylesheet"] ?? null))) : (""));
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["courseCriteriaByCycle"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["course"]) {
            // line 17
            yield "
<table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"4\" nobr=\"true\">
    <tr>
        <td colspan=\"";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", false, false, false, 20)) + 1), "html", null, true);
            yield "\" class=\"header bg-primary border\">
            ";
            // line 21
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "courseName", [], "any", false, false, false, 21), "html", null, true);
            yield "
        </td>
        <td style=\"text-align: right;\">
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
                yield "                ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["teacher"], "fullName", [], "any", false, false, false, 25), "html", null, true);
                yield (( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 25)) ? (", ") : (""));
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
            // line 27
            yield "        </td>
    </tr>
    
    <tr>
        <td class=\"subheader border\">Mark Sheet</td>
        ";
            // line 32
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", false, false, false, 32));
            foreach ($context['_seq'] as $context["_key"] => $context["criteria"]) {
                // line 33
                yield "            ";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "valueType", [], "any", false, false, false, 33) != "Comment")) {
                    // line 34
                    yield "                <td class=\"subheader border\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "criteriaName", [], "any", false, false, false, 34), "html", null, true);
                    yield "</td>
            ";
                }
                // line 36
                yield "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['criteria'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 37
            yield "    </tr>

    ";
            // line 39
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, ((CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", true, true, false, 39)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", false, false, false, 39), 1)) : (1))));
            foreach ($context['_seq'] as $context["_key"] => $context["cycleNum"]) {
                // line 40
                yield "    <tr class=\"cycle-row\">
        ";
                // line 41
                $context["cycleName"] = (($__internal_compile_0 = CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycles", [], "any", false, false, false, 41)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["cycleNum"]] ?? null) : null);
                // line 42
                yield "        <td class=\"border\">Marksheet ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["cycleNum"], "html", null, true);
                yield "</td>
        ";
                // line 43
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", false, false, false, 43));
                foreach ($context['_seq'] as $context["_key"] => $context["criteria"]) {
                    // line 44
                    yield "            ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "valueType", [], "any", false, false, false, 44) != "Comment")) {
                        // line 45
                        yield "            <td class=\"border\">
                ";
                        // line 46
                        $context["value"] = (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 46), ($context["cycleName"] ?? null), [], "array", false, true, false, 46), "descriptor", [], "any", true, true, false, 46) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 46), ($context["cycleName"] ?? null), [], "array", false, true, false, 46), "descriptor", [], "any", false, false, false, 46)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 46), ($context["cycleName"] ?? null), [], "array", false, true, false, 46), "descriptor", [], "any", false, false, false, 46)) : (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 46), ($context["cycleName"] ?? null), [], "array", false, true, false, 46), "value", [], "any", true, true, false, 46)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 46), ($context["cycleName"] ?? null), [], "array", false, true, false, 46), "value", [], "any", false, false, false, 46), "")) : (""))));
                        // line 47
                        yield "                ";
                        $context["sanitizedValue"] = Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::replace(($context["value"] ?? null), ["%" => ""]));
                        // line 48
                        yield "                ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::matches("/^-?\\d+(\\.\\d+)?\$/", ($context["sanitizedValue"] ?? null))) ? ((($context["sanitizedValue"] ?? null) . "%")) : (($context["value"] ?? null))), "html", null, true);
                        yield "
            </td>
            ";
                    }
                    // line 51
                    yield "        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['criteria'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 52
                yield "    </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cycleNum'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            yield "
    ";
            // line 55
            if (CoreExtension::getAttribute($this->env, $this->source, $context["course"], "hasComments", [], "any", false, false, false, 55)) {
                // line 56
                yield "    <tr>
        <td colspan=\"";
                // line 57
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", false, false, false, 57)) + 1), "html", null, true);
                yield "\" class=\"border bg-secondary\" style=\"font-size: 90%; text-align: left;\">
            ";
                // line 58
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", false, false, false, 58));
                foreach ($context['_seq'] as $context["_key"] => $context["criteria"]) {
                    // line 59
                    yield "                ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "valueType", [], "any", false, false, false, 59) == "Comment")) {
                        // line 60
                        yield "                    ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 60), ($context["cycleName"] ?? null), [], "array", false, true, false, 60), "descriptor", [], "any", true, true, false, 60) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 60), ($context["cycleName"] ?? null), [], "array", false, true, false, 60), "descriptor", [], "any", false, false, false, 60)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 60), ($context["cycleName"] ?? null), [], "array", false, true, false, 60), "descriptor", [], "any", false, false, false, 60)) : (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 60), ($context["cycleName"] ?? null), [], "array", false, true, false, 60), "value", [], "any", true, true, false, 60)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 60), ($context["cycleName"] ?? null), [], "array", false, true, false, 60), "value", [], "any", false, false, false, 60), "No comments available.")) : ("No comments available.")))), "html", null, true);
                        yield "
                ";
                    }
                    // line 62
                    yield "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['criteria'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 63
                yield "        </td>
    </tr>
    ";
            }
            // line 66
            yield "</table>

<div class=\"course-divider\"></div> <!-- Divider between courses -->

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['course'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        yield "
";
        // line 73
        yield "


";
        // line 76
        $context["overallGradeCount"] = 0;
        // line 77
        $context["courseCount"] = 0;
        yield " ";
        // line 78
        $context["overallAverage"] = 0;
        // line 79
        $context["overallTotalGrades"] = 0;
        // line 80
        yield "
";
        // line 82
        $context["currentCycleName"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycles", [], "any", false, true, false, 82), CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleNumber", [], "any", false, false, false, 82), [], "array", true, true, false, 82)) ? (Twig\Extension\CoreExtension::default((($__internal_compile_1 = CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycles", [], "any", false, true, false, 82)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleNumber", [], "any", false, false, false, 82)] ?? null) : null), "")) : (""));
        yield " 
";
        // line 83
        $context["courseCount"] = 0;
        yield " ";
        // line 84
        yield "
";
        // line 86
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["courseCriteriaByCycle"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["course"]) {
            // line 87
            yield "    ";
            $context["courseTotalGrades"] = 0;
            // line 88
            yield "    ";
            $context["courseGradeCount"] = 0;
            // line 89
            yield "
    
    
    
    ";
            // line 94
            yield "    ";
            // line 96
            yield "        
         ";
            // line 98
            yield "        ";
            // line 102
            yield "        ";
            // line 103
            yield " 


        ";
            // line 107
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", false, false, false, 107));
            foreach ($context['_seq'] as $context["_key"] => $context["criteria"]) {
                yield " 
            ";
                // line 108
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "valueType", [], "any", false, false, false, 108) != "Comment")) {
                    yield " 
            ";
                    // line 110
                    yield "            ";
                    $context["rawGrade"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 110), ($context["currentCycleName"] ?? null), [], "array", false, true, false, 110), "value", [], "any", true, true, false, 110)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 110), ($context["currentCycleName"] ?? null), [], "array", false, true, false, 110), "value", [], "any", false, false, false, 110), "")) : (""));
                    // line 111
                    yield "            ";
                    $context["sanitizedGrade"] = Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::replace(($context["rawGrade"] ?? null), ["%" => ""]));
                    yield " 

    ";
                    // line 114
                    yield "    ";
                    // line 117
                    yield "    ";
                    // line 119
                    yield "    ";
                    // line 120
                    yield "    ";
                    // line 122
                    yield "

                
                ";
                    // line 126
                    yield "                ";
                    if (( !Twig\Extension\CoreExtension::testEmpty(($context["sanitizedGrade"] ?? null)) && CoreExtension::matches("/^-?\\d+(\\.\\d+)?\$/", ($context["sanitizedGrade"] ?? null)))) {
                        // line 127
                        yield "                    ";
                        $context["grade"] = (($context["sanitizedGrade"] ?? null) + 0);
                        // line 128
                        yield "                    ";
                        // line 130
                        yield "                    ";
                        // line 131
                        yield "                    ";
                        $context["courseTotalGrades"] = (($context["courseTotalGrades"] ?? null) + ($context["grade"] ?? null));
                        // line 132
                        yield "                    ";
                        $context["courseGradeCount"] = (($context["courseGradeCount"] ?? null) + 1);
                        // line 133
                        yield "                ";
                    }
                    // line 134
                    yield "            ";
                }
                // line 135
                yield "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['criteria'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 136
            yield "
    ";
            // line 138
            yield "    ";
            // line 139
            yield "    ";
            // line 140
            yield "    


";
            // line 144
            yield "
";
            // line 145
            if ((($context["courseGradeCount"] ?? null) > 0)) {
                // line 146
                $context["overallTotalGrades"] = (($context["overallTotalGrades"] ?? null) + ($context["courseTotalGrades"] ?? null));
                // line 147
                $context["overallGradeCount"] = (($context["overallGradeCount"] ?? null) + ($context["courseGradeCount"] ?? null));
                // line 148
                $context["courseCount"] = (($context["courseCount"] ?? null) + 1);
                yield " ";
            }
            // line 149
            yield " 
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['course'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 150
        yield " 



";
        // line 155
        $context["overallAverage"] = (((($context["overallGradeCount"] ?? null) > 0)) ? (Twig\Extension\CoreExtension::round((($context["overallTotalGrades"] ?? null) / ($context["courseCount"] ?? null)), 2)) : ("N/A"));
        // line 156
        yield "

";
        // line 159
        yield "<table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"4\" nobr=\"true\">
    <tr>
        <td class=\"header bg-primary border\">Overall Average</td>
        <td class=\"border bg-secondary\">";
        // line 162
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["overallAverage"] ?? null) . "%"), "html", null, true);
        yield "</td>
        
    </tr>
    <tr>
        <td class=\"header bg-primary border\">Total Subjects</td>
        <td class=\"border bg-secondary\">";
        // line 167
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["courseCount"] ?? null), "html", null, true);
        yield "</td>
    </tr>


</table>

<div class=\"course-divider\"></div> <!-- Divider between courses -->

<div style=\"display: flex; justify-content: space-between; align-items: flex-start; margin: 20px 0;\">
    <table class=\"table academic-scale\" cellspacing=\"0\" cellpadding=\"10\" nobr=\"true\" style=\"flex: 1; margin-right: 10px; border-collapse: collapse;\">
        <thead>
            <tr>
                <th colspan=\"3\" class=\"header bg-primary border text-center\">ACADEMIC SCALE</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">A</td>
                <td class=\"border\" style=\"text-align: center;\">85% - 100%</td>
                <td class=\"border\" style=\"text-align: center;\">Excellent</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">B</td>
                <td class=\"border\" style=\"text-align: center;\">70% - 84%</td>
                <td class=\"border\" style=\"text-align: center;\">Very Good</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">C</td>
                <td class=\"border\" style=\"text-align: center;\">60% - 69%</td>
                <td class=\"border\" style=\"text-align: center;\">Good</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">D</td>
                <td class=\"border\" style=\"text-align: center;\">50% - 59%</td>
                <td class=\"border\" style=\"text-align: center;\">Fair</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">E</td>
                <td class=\"border\" style=\"text-align: center;\">40% - 49%</td>
                <td class=\"border\" style=\"text-align: center;\">Poor</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">F</td>
                <td class=\"border\" style=\"text-align: center;\">Below 40%</td>
                <td class=\"border\" style=\"text-align: center;\">Very Poor</td>
            </tr>
        </tbody>
    </table>

    <table class=\"table personality-scale\" cellspacing=\"0\" cellpadding=\"10\" nobr=\"true\" style=\"flex: 1; margin-left: 10px; border-collapse: collapse;\">
        <thead>
            <tr>
                <th colspan=\"3\" class=\"header bg-primary border text-center\">PERSONALITY & CONDUCT RATING KEY</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">EX</td>
                <td class=\"border\" style=\"text-align: center;\">Excellent</td>
                <td class=\"border\" style=\"text-align: center;\">7</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">VG</td>
                <td class=\"border\" style=\"text-align: center;\">Very Good</td>
                <td class=\"border\" style=\"text-align: center;\">6</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">G</td>
                <td class=\"border\" style=\"text-align: center;\">Good</td>
                <td class=\"border\" style=\"text-align: center;\">5</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">F</td>
                <td class=\"border\" style=\"text-align: center;\">Fair</td>
                <td class=\"border\" style=\"text-align: center;\">4</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">S</td>
                <td class=\"border\" style=\"text-align: center;\">Satisfactory</td>
                <td class=\"border\" style=\"text-align: center;\">3</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">U</td>
                <td class=\"border\" style=\"text-align: center;\">Unsatisfactory</td>
                <td class=\"border\" style=\"text-align: center;\">2</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">P</td>
                <td class=\"border\" style=\"text-align: center;\">Poor</td>
                <td class=\"border\" style=\"text-align: center;\">1</td>
            </tr>
        </tbody>
    </table>
</div>



";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reports/ClementHowellReport2025.twig.html";
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
        return array (  397 => 167,  389 => 162,  384 => 159,  380 => 156,  378 => 155,  372 => 150,  365 => 149,  361 => 148,  359 => 147,  357 => 146,  355 => 145,  352 => 144,  347 => 140,  345 => 139,  343 => 138,  340 => 136,  334 => 135,  331 => 134,  328 => 133,  325 => 132,  322 => 131,  320 => 130,  318 => 128,  315 => 127,  312 => 126,  307 => 122,  305 => 120,  303 => 119,  301 => 117,  299 => 114,  293 => 111,  290 => 110,  286 => 108,  279 => 107,  274 => 103,  272 => 102,  270 => 98,  267 => 96,  265 => 94,  259 => 89,  256 => 88,  253 => 87,  249 => 86,  246 => 84,  243 => 83,  239 => 82,  236 => 80,  234 => 79,  232 => 78,  229 => 77,  227 => 76,  222 => 73,  219 => 71,  209 => 66,  204 => 63,  198 => 62,  192 => 60,  189 => 59,  185 => 58,  181 => 57,  178 => 56,  176 => 55,  173 => 54,  166 => 52,  160 => 51,  153 => 48,  150 => 47,  148 => 46,  145 => 45,  142 => 44,  138 => 43,  133 => 42,  131 => 41,  128 => 40,  124 => 39,  120 => 37,  114 => 36,  108 => 34,  105 => 33,  101 => 32,  94 => 27,  76 => 25,  59 => 24,  53 => 21,  49 => 20,  44 => 17,  40 => 16,  38 => 12,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Final Report 2025-A.Smith
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
        <td class=\"subheader border\">Mark Sheet</td>
        {% for criteria in course.perStudent %}
            {% if criteria.valueType != 'Comment' %}
                <td class=\"subheader border\">{{ criteria.criteriaName }}</td>
            {% endif %}
        {% endfor %}
    </tr>

    {% for cycleNum in range(1, reportingCycle.cycleTotal|default(1)) %}
    <tr class=\"cycle-row\">
        {% set cycleName = reportingCycle.cycles[cycleNum] %}
        <td class=\"border\">Marksheet {{ cycleNum }}</td>
        {% for criteria in course.perStudent %}
            {% if criteria.valueType != 'Comment' %}
            <td class=\"border\">
                {% set value = criteria.values[cycleName].descriptor ?? criteria.values[cycleName].value|default('') %}
                {% set sanitizedValue = value|replace({'%': ''})|trim %}
                {{ sanitizedValue matches '/^-?\\\\d+(\\\\.\\\\d+)?\$/' ? sanitizedValue ~ '%' : value }}
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

{# OverAll Average Calculations #}



{% set overallGradeCount = 0 %}
{% set courseCount = 0 %} {# To count courses with valid grades #}
{% set overallAverage = 0 %}
{% set overallTotalGrades = 0 %}

{# Get the current cycle name #}
{% set currentCycleName = reportingCycle.cycles[reportingCycle.cycleNumber]|default('') %} 
{% set courseCount = 0 %} {# Initialize course count #}

{# Iterate over courses for the current cycle only #}
{% for course in courseCriteriaByCycle %}
    {% set courseTotalGrades = 0 %}
    {% set courseGradeCount = 0 %}

    
    
    
    {# Iterate over cycles #}
    {# {% for cycleNum in range(1, reportingCycle.cycleTotal|default(1)) %}
    {% set cycleName = reportingCycle.cycles[cycleNum]|default('') %}  #}
        
         {# Check each criteria #}
        {# {% if cycleName is not empty %}
        {% for criteria in course.perStudent| default([]) %}
        {% if criteria.valueType != 'Comment' %}
        {# Extract and sanitize the grade value #}
        {# {% set rawGrade = criteria.values[cycleName].value|default('') %}
        {% set sanitizedGrade = rawGrade|replace({'%': ''})|trim %} #} 


        {# Check each criteria for the current cycle #}
            {% for criteria in course.perStudent %} 
            {% if criteria.valueType != 'Comment' %} 
            {# Extract and sanitize the grade value #}
            {% set rawGrade = criteria.values[currentCycleName].value|default('') %}
            {% set sanitizedGrade = rawGrade|replace({'%': ''})|trim %} 

    {# Consider only the current cycle #}
    {# {% set cycleName = reportingCycle.current|default('') %}
    {% if cycleName is not empty %}
    {# Iterate over per-student criteria #}
    {# {% for criteria in course.perStudent|default([]) %}
    {# {% if criteria.valueType != 'Comment' %} #}
    {# Extract and sanitize the grade value #}
    {# {% set rawGrade = criteria.values[cycleName].value|default('') %}
    {% set sanitizedGrade = rawGrade|replace({'%': ''})|trim %} #}


                
                {# Check if sanitized grade is numeric #}
                {% if sanitizedGrade is not empty and (sanitizedGrade matches '/^-?\\\\d+(\\\\.\\\\d+)?\$/') %}
                    {% set grade = sanitizedGrade + 0 %}
                    {# {% if sanitizedGrade matches '/^\\\\d+(\\\\.\\\\d+)?\$/' %}
                    {% set grade = sanitizedGrade|int %} #}
                    {# {% set grade = sanitizedGrade|number_format(0) %} #}
                    {% set courseTotalGrades = courseTotalGrades + grade %}
                    {% set courseGradeCount = courseGradeCount + 1 %}
                {% endif %}
            {% endif %}
            {% endfor %}

    {# Update overall totals #}
    {# {% set overallTotalGrades = overallTotalGrades + courseTotalGrades %} #}
    {# {% set overallGradeCount = overallGradeCount + courseGradeCount %} #}
    


{# Update overall totals only if there are grades for this course in the current cycle #}

{% if courseGradeCount > 0 %}
{% set overallTotalGrades = overallTotalGrades + courseTotalGrades %}
{% set overallGradeCount = overallGradeCount + courseGradeCount %}
{% set courseCount = courseCount + 1 %} {# Increment course count #}
{% endif %} 
{% endfor %} 



{# Calculate the overall average grade  #}
{% set overallAverage = overallGradeCount > 0 ? (overallTotalGrades / courseCount )|round(2): 'N/A' %}


{# Display results #}
<table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"4\" nobr=\"true\">
    <tr>
        <td class=\"header bg-primary border\">Overall Average</td>
        <td class=\"border bg-secondary\">{{ overallAverage ~ '%'}}</td>
        
    </tr>
    <tr>
        <td class=\"header bg-primary border\">Total Subjects</td>
        <td class=\"border bg-secondary\">{{ courseCount }}</td>
    </tr>


</table>

<div class=\"course-divider\"></div> <!-- Divider between courses -->

<div style=\"display: flex; justify-content: space-between; align-items: flex-start; margin: 20px 0;\">
    <table class=\"table academic-scale\" cellspacing=\"0\" cellpadding=\"10\" nobr=\"true\" style=\"flex: 1; margin-right: 10px; border-collapse: collapse;\">
        <thead>
            <tr>
                <th colspan=\"3\" class=\"header bg-primary border text-center\">ACADEMIC SCALE</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">A</td>
                <td class=\"border\" style=\"text-align: center;\">85% - 100%</td>
                <td class=\"border\" style=\"text-align: center;\">Excellent</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">B</td>
                <td class=\"border\" style=\"text-align: center;\">70% - 84%</td>
                <td class=\"border\" style=\"text-align: center;\">Very Good</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">C</td>
                <td class=\"border\" style=\"text-align: center;\">60% - 69%</td>
                <td class=\"border\" style=\"text-align: center;\">Good</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">D</td>
                <td class=\"border\" style=\"text-align: center;\">50% - 59%</td>
                <td class=\"border\" style=\"text-align: center;\">Fair</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">E</td>
                <td class=\"border\" style=\"text-align: center;\">40% - 49%</td>
                <td class=\"border\" style=\"text-align: center;\">Poor</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">F</td>
                <td class=\"border\" style=\"text-align: center;\">Below 40%</td>
                <td class=\"border\" style=\"text-align: center;\">Very Poor</td>
            </tr>
        </tbody>
    </table>

    <table class=\"table personality-scale\" cellspacing=\"0\" cellpadding=\"10\" nobr=\"true\" style=\"flex: 1; margin-left: 10px; border-collapse: collapse;\">
        <thead>
            <tr>
                <th colspan=\"3\" class=\"header bg-primary border text-center\">PERSONALITY & CONDUCT RATING KEY</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">EX</td>
                <td class=\"border\" style=\"text-align: center;\">Excellent</td>
                <td class=\"border\" style=\"text-align: center;\">7</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">VG</td>
                <td class=\"border\" style=\"text-align: center;\">Very Good</td>
                <td class=\"border\" style=\"text-align: center;\">6</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">G</td>
                <td class=\"border\" style=\"text-align: center;\">Good</td>
                <td class=\"border\" style=\"text-align: center;\">5</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">F</td>
                <td class=\"border\" style=\"text-align: center;\">Fair</td>
                <td class=\"border\" style=\"text-align: center;\">4</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">S</td>
                <td class=\"border\" style=\"text-align: center;\">Satisfactory</td>
                <td class=\"border\" style=\"text-align: center;\">3</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">U</td>
                <td class=\"border\" style=\"text-align: center;\">Unsatisfactory</td>
                <td class=\"border\" style=\"text-align: center;\">2</td>
            </tr>
            <tr>
                <td class=\"border\" style=\"text-align: center;\">P</td>
                <td class=\"border\" style=\"text-align: center;\">Poor</td>
                <td class=\"border\" style=\"text-align: center;\">1</td>
            </tr>
        </tbody>
    </table>
</div>



{# 
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

    {% set total = 0 %}
    {% set count = 0 %}
    {% for cycleNum in range(1, reportingCycle.cycleTotal|default(1)) %}
    <tr class=\"cycle-row\">
        {% set cycleName = reportingCycle.cycles[cycleNum] %}
        <td class=\"border\">Cycle {{ cycleNum }}</td>
        {% for criteria in course.perStudent %}
            {% if criteria.valueType != 'Comment' %}
                <td class=\"border\">
                    {% set value = criteria.values[cycleName].value | replace({'%': ''}) | default('N/A') %}
                    {{ value != 'N/A' ? value : 'N/A' }}
    
                    {% if value is defined and value|default('') matches('/^\\\\d+(\\\\.\\\\d+)?\$/') %}
                        {% set total = total + value|default(0)%}
                        {% set count = count + 1 %}
                    {% endif %}
                </td>
            {% endif %}
        {% endfor %}
    </tr>
    {% endfor %}    

    {% if count > 0 %}
    <tr>
        <td colspan=\"2\" class=\"border\"><strong>{{ __('Average') }}</strong></td>
        <td class=\"border\" colspan=\"{{ course.perStudent | length - 1 }}\">
            {{ (total / count) | round(2) }}
        </td>
    </tr>
    {% endif %}

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
 #}", "reports/ClementHowellReport2025.twig.html", "/Applications/MAMP/htdocs/chhs/uploads/reports/templates/reports/ClementHowellReport2025.twig.html");
    }
}
