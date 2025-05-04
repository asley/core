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

/* reports/courseCriteriaByCycle_correct.twig.html */
class __TwigTemplate_cd8768bf5c180e13ee320b47c2869f8a extends Template
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
                        $context["value"] = (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 46), ($context["cycleName"] ?? null), [], "array", false, true, false, 46), "descriptor", [], "any", true, true, false, 46) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 46), ($context["cycleName"] ?? null), [], "array", false, true, false, 46), "descriptor", [], "any", false, false, false, 46)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 46), ($context["cycleName"] ?? null), [], "array", false, true, false, 46), "descriptor", [], "any", false, false, false, 46)) : (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 46), ($context["cycleName"] ?? null), [], "array", false, true, false, 46), "value", [], "any", true, true, false, 46)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 46), ($context["cycleName"] ?? null), [], "array", false, true, false, 46), "value", [], "any", false, false, false, 46), "N/A")) : ("N/A"))));
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
                    // line 54
                    yield "        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['criteria'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 55
                yield "    </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cycleNum'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 57
            yield "
    ";
            // line 58
            if (CoreExtension::getAttribute($this->env, $this->source, $context["course"], "hasComments", [], "any", false, false, false, 58)) {
                // line 59
                yield "    <tr>
        <td colspan=\"";
                // line 60
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", false, false, false, 60)) + 1), "html", null, true);
                yield "\" class=\"border bg-secondary\" style=\"font-size: 90%; text-align: left;\">
            ";
                // line 61
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", false, false, false, 61));
                foreach ($context['_seq'] as $context["_key"] => $context["criteria"]) {
                    // line 62
                    yield "                ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "valueType", [], "any", false, false, false, 62) == "Comment")) {
                        // line 63
                        yield "                    ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 63), ($context["cycleName"] ?? null), [], "array", false, true, false, 63), "descriptor", [], "any", true, true, false, 63) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 63), ($context["cycleName"] ?? null), [], "array", false, true, false, 63), "descriptor", [], "any", false, false, false, 63)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 63), ($context["cycleName"] ?? null), [], "array", false, true, false, 63), "descriptor", [], "any", false, false, false, 63)) : (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 63), ($context["cycleName"] ?? null), [], "array", false, true, false, 63), "value", [], "any", true, true, false, 63)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 63), ($context["cycleName"] ?? null), [], "array", false, true, false, 63), "value", [], "any", false, false, false, 63), "No comments available.")) : ("No comments available.")))), "html", null, true);
                        yield "
                ";
                    }
                    // line 65
                    yield "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['criteria'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 66
                yield "        </td>
    </tr>
    ";
            }
            // line 69
            yield "</table>

<div class=\"course-divider\"></div> <!-- Divider between courses -->

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['course'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        yield "

";
        // line 77
        yield "

";
        // line 79
        $context["overallTotalGrades"] = 0;
        // line 80
        $context["overallGradeCount"] = 0;
        // line 81
        yield "
";
        // line 83
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["courseCriteriaByCycle"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["course"]) {
            // line 84
            yield "    ";
            $context["courseTotalGrades"] = 0;
            // line 85
            yield "    ";
            $context["courseGradeCount"] = 0;
            // line 86
            yield "
    ";
            // line 88
            yield "    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, ((CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", true, true, false, 88)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycleTotal", [], "any", false, false, false, 88), 1)) : (1))));
            foreach ($context['_seq'] as $context["_key"] => $context["cycleNum"]) {
                // line 89
                yield "        ";
                $context["cycleName"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycles", [], "any", false, true, false, 89), $context["cycleNum"], [], "array", true, true, false, 89)) ? (Twig\Extension\CoreExtension::default((($__internal_compile_1 = CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "cycles", [], "any", false, true, false, 89)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[$context["cycleNum"]] ?? null) : null), "")) : (""));
                // line 90
                yield "       
       
        ";
                // line 92
                if ( !Twig\Extension\CoreExtension::testEmpty(($context["cycleName"] ?? null))) {
                    // line 93
                    yield "    ";
                    // line 94
                    yield "       

        ";
                    // line 97
                    yield "        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(((CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", true, true, false, 97)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "perStudent", [], "any", false, false, false, 97), [])) : ([])));
                    foreach ($context['_seq'] as $context["_key"] => $context["criteria"]) {
                        // line 98
                        yield "            ";
                        if ((CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "valueType", [], "any", false, false, false, 98) != "Comment")) {
                            // line 99
                            yield "                ";
                            // line 100
                            yield "                ";
                            $context["rawGrade"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 100), ($context["cycleName"] ?? null), [], "array", false, true, false, 100), "value", [], "any", true, true, false, 100)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 100), ($context["cycleName"] ?? null), [], "array", false, true, false, 100), "value", [], "any", false, false, false, 100), "")) : (""));
                            // line 101
                            yield "                ";
                            $context["sanitizedGrade"] = Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::replace(($context["rawGrade"] ?? null), ["%" => ""]));
                            // line 102
                            yield "                
                ";
                            // line 104
                            yield "                ";
                            if (( !Twig\Extension\CoreExtension::testEmpty(($context["sanitizedGrade"] ?? null)) && CoreExtension::matches("/^-?\\d+(\\.\\d+)?\$/", ($context["sanitizedGrade"] ?? null)))) {
                                // line 105
                                yield "                    ";
                                $context["grade"] = (($context["sanitizedGrade"] ?? null) + 0);
                                // line 106
                                yield "                    ";
                                $context["courseTotalGrades"] = (($context["courseTotalGrades"] ?? null) + ($context["grade"] ?? null));
                                // line 107
                                yield "                    ";
                                $context["courseGradeCount"] = (($context["courseGradeCount"] ?? null) + 1);
                                // line 108
                                yield "                ";
                            }
                            // line 109
                            yield "            ";
                        }
                        // line 110
                        yield "        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['criteria'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 111
                    yield "        ";
                }
                // line 112
                yield "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cycleNum'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 113
            yield "
    ";
            // line 115
            yield "    ";
            $context["overallTotalGrades"] = (($context["overallTotalGrades"] ?? null) + ($context["courseTotalGrades"] ?? null));
            // line 116
            yield "    ";
            $context["overallGradeCount"] = (($context["overallGradeCount"] ?? null) + ($context["courseGradeCount"] ?? null));
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['course'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 118
        yield "
";
        // line 120
        $context["overallAverage"] = (((($context["overallGradeCount"] ?? null) > 0)) ? (Twig\Extension\CoreExtension::round((($context["overallTotalGrades"] ?? null) / ($context["overallGradeCount"] ?? null)), 2)) : ("N/A"));
        // line 121
        yield "
";
        // line 123
        yield "<table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"4\" nobr=\"true\">
    <tr>
        <td colspan=\"2\" class=\"header bg-primary border\">
            Overall Average
        </td>
        <td class=\"border bg-secondary\">
            ";
        // line 129
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["overallAverage"] ?? null), "html", null, true);
        yield "
        </td>
    </tr>
</table>
<div class=\"course-divider\"></div> <!-- Divider between courses -->

<div style=\"display: flex; justify-content: space-between; align-items: flex-start; gap: 20px; margin: 20px 0;\">
    <table class=\"table academic-scale\" cellspacing=\"0\" cellpadding=\"10\" nobr=\"true\" style=\"width: 45%; border-collapse: collapse;\">
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

    <table class=\"table personality-scale\" cellspacing=\"0\" cellpadding=\"10\" nobr=\"true\" style=\"width: 45%; border-collapse: collapse;\">
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
        return "reports/courseCriteriaByCycle_correct.twig.html";
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
        return array (  351 => 129,  343 => 123,  340 => 121,  338 => 120,  335 => 118,  328 => 116,  325 => 115,  322 => 113,  316 => 112,  313 => 111,  307 => 110,  304 => 109,  301 => 108,  298 => 107,  295 => 106,  292 => 105,  289 => 104,  286 => 102,  283 => 101,  280 => 100,  278 => 99,  275 => 98,  270 => 97,  266 => 94,  264 => 93,  262 => 92,  258 => 90,  255 => 89,  250 => 88,  247 => 86,  244 => 85,  241 => 84,  237 => 83,  234 => 81,  232 => 80,  230 => 79,  226 => 77,  222 => 74,  212 => 69,  207 => 66,  201 => 65,  195 => 63,  192 => 62,  188 => 61,  184 => 60,  181 => 59,  179 => 58,  176 => 57,  169 => 55,  163 => 54,  153 => 48,  150 => 47,  148 => 46,  145 => 45,  142 => 44,  138 => 43,  133 => 42,  131 => 41,  128 => 40,  124 => 39,  120 => 37,  114 => 36,  108 => 34,  105 => 33,  101 => 32,  94 => 27,  76 => 25,  59 => 24,  53 => 21,  49 => 20,  44 => 17,  40 => 16,  38 => 12,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Asley Smith CHHS Correct
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
                {% set value = criteria.values[cycleName].descriptor ?? criteria.values[cycleName].value|default('N/A') %}
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


{% set overallTotalGrades = 0 %}
{% set overallGradeCount = 0 %}

{# Iterate over courses #}
{% for course in courseCriteriaByCycle %}
    {% set courseTotalGrades = 0 %}
    {% set courseGradeCount = 0 %}

    {# Iterate over cycles #}
    {% for cycleNum in range(1, reportingCycle.cycleTotal|default(1)) %}
        {% set cycleName = reportingCycle.cycles[cycleNum]|default('') %}
       
       
        {% if cycleName is not empty %}
    {# Proceed with grade processing #}
       

        {# Check each criteria #}
        {% for criteria in course.perStudent| default([]) %}
            {% if criteria.valueType != 'Comment' %}
                {# Extract and sanitize the grade value #}
                {% set rawGrade = criteria.values[cycleName].value|default('') %}
                {% set sanitizedGrade = rawGrade|replace({'%': ''})|trim %}
                
                {# Check if sanitized grade is numeric #}
                {% if sanitizedGrade is not empty and (sanitizedGrade matches '/^-?\\\\d+(\\\\.\\\\d+)?\$/') %}
                    {% set grade = sanitizedGrade + 0 %}
                    {% set courseTotalGrades = courseTotalGrades + grade %}
                    {% set courseGradeCount = courseGradeCount + 1 %}
                {% endif %}
            {% endif %}
        {% endfor %}
        {% endif %}
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
<div class=\"course-divider\"></div> <!-- Divider between courses -->

<div style=\"display: flex; justify-content: space-between; align-items: flex-start; gap: 20px; margin: 20px 0;\">
    <table class=\"table academic-scale\" cellspacing=\"0\" cellpadding=\"10\" nobr=\"true\" style=\"width: 45%; border-collapse: collapse;\">
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

    <table class=\"table personality-scale\" cellspacing=\"0\" cellpadding=\"10\" nobr=\"true\" style=\"width: 45%; border-collapse: collapse;\">
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
{% endfor %}
#}", "reports/courseCriteriaByCycle_correct.twig.html", "/Applications/MAMP/htdocs/chhs/uploads/reports/templates/reports/courseCriteriaByCycle_correct.twig.html");
    }
}
