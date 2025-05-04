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
class __TwigTemplate_f029d252fdd57214cb41151fa425fe92 extends Template
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
";
        // line 261
        yield "


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
        return array (  407 => 261,  397 => 167,  389 => 162,  384 => 159,  380 => 156,  378 => 155,  372 => 150,  365 => 149,  361 => 148,  359 => 147,  357 => 146,  355 => 145,  352 => 144,  347 => 140,  345 => 139,  343 => 138,  340 => 136,  334 => 135,  331 => 134,  328 => 133,  325 => 132,  322 => 131,  320 => 130,  318 => 128,  315 => 127,  312 => 126,  307 => 122,  305 => 120,  303 => 119,  301 => 117,  299 => 114,  293 => 111,  290 => 110,  286 => 108,  279 => 107,  274 => 103,  272 => 102,  270 => 98,  267 => 96,  265 => 94,  259 => 89,  256 => 88,  253 => 87,  249 => 86,  246 => 84,  243 => 83,  239 => 82,  236 => 80,  234 => 79,  232 => 78,  229 => 77,  227 => 76,  222 => 73,  219 => 71,  209 => 66,  204 => 63,  198 => 62,  192 => 60,  189 => 59,  185 => 58,  181 => 57,  178 => 56,  176 => 55,  173 => 54,  166 => 52,  160 => 51,  153 => 48,  150 => 47,  148 => 46,  145 => 45,  142 => 44,  138 => 43,  133 => 42,  131 => 41,  128 => 40,  124 => 39,  120 => 37,  114 => 36,  108 => 34,  105 => 33,  101 => 32,  94 => 27,  76 => 25,  59 => 24,  53 => 21,  49 => 20,  44 => 17,  40 => 16,  38 => 12,);
    }

    public function getSourceContext()
    {
        return new Source("", "reports/ClementHowellReport2025.twig.html", "/Applications/MAMP/htdocs/chhs/uploads/reports/templates/reports/ClementHowellReport2025.twig.html");
    }
}
