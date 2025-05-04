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

/* reports/merge.twig.html */
class __TwigTemplate_fa67cd32e1f945b05fe059c50a3c7149 extends Template
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
        // line 13
        yield "
";
        // line 15
        yield ((($context["stylesheet"] ?? null)) ? (Twig\Extension\CoreExtension::include($this->env, $context, ($context["stylesheet"] ?? null))) : (""));
        // line 17
        yield "<div class=\"student-report\">
    <h1>";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Student Report"), "html", null, true);
        yield "</h1>
    <h2>";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "firstName", [], "any", false, false, false, 19), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "surname", [], "any", false, false, false, 19), "html", null, true);
        yield "</h2>
    <p><strong>";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Form Group:"), "html", null, true);
        yield "</strong> ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "formGroupName", [], "any", false, false, false, 20), "html", null, true);
        yield "</p>
    <p><strong>";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Tutor:"), "html", null, true);
        yield "</strong> ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "tutorName", [], "any", false, false, false, 21), "html", null, true);
        yield "</p>
    <hr>

    ";
        // line 25
        yield "    <h2>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Internal Assessment Data"), "html", null, true);
        yield "</h2>
    <table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"10\" nobr=\"true\">
        <thead>
            <tr>
                <th class=\"header bg-primary border\">";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Course Name"), "html", null, true);
        yield "</th>
                <th class=\"header bg-primary border\">";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Assessment Name"), "html", null, true);
        yield "</th>
                <th class=\"header bg-primary border\">";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Attainment"), "html", null, true);
        yield "</th>
                <th class=\"header bg-primary border\">";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Effort"), "html", null, true);
        yield "</th>
                <th class=\"header bg-primary border\">";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Comments"), "html", null, true);
        yield "</th>
            </tr>
        </thead>
        <tbody>
            
            ";
        // line 38
        $context["internalTotal"] = 0;
        // line 39
        yield "            ";
        $context["internalCount"] = 0;
        // line 40
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["internalAssessmentByCourse"] ?? null), "courses", [], "any", false, false, false, 40));
        foreach ($context['_seq'] as $context["courseID"] => $context["courseData"]) {
            // line 41
            yield "    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["courseData"]);
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
            foreach ($context['_seq'] as $context["assessmentName"] => $context["assessment"]) {
                // line 42
                yield "        <tr>
            ";
                // line 43
                if (CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 43)) {
                    // line 44
                    yield "                <td rowspan=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), $context["courseData"]), "html", null, true);
                    yield "\" class=\"border\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "courseName", [], "any", false, false, false, 44), "html", null, true);
                    yield "</td>
            ";
                }
                // line 46
                yield "            <td class=\"border\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "name", [], "any", false, false, false, 46), "html", null, true);
                yield "</td>
            <td class=\"border\">";
                // line 47
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "attainmentValue", [], "any", true, true, false, 47)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "attainmentValue", [], "any", false, false, false, 47), "N/A")) : ("N/A")), "html", null, true);
                yield "</td>
            <td class=\"border\">";
                // line 48
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "effortValue", [], "any", true, true, false, 48)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "effortValue", [], "any", false, false, false, 48), "N/A")) : ("N/A")), "html", null, true);
                yield "</td>
            <td class=\"border\">";
                // line 49
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "comment", [], "any", true, true, false, 49)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "comment", [], "any", false, false, false, 49), "No comments provided.")) : ("No comments provided.")), "html", null, true);
                yield "</td>
            
            ";
                // line 51
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "attainmentValue", [], "any", true, true, false, 51) && (((CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "attainmentValue", [], "any", true, true, false, 51)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "attainmentValue", [], "any", false, false, false, 51), "")) : ("")) != ""))) {
                    // line 52
                    yield "                ";
                    $context["numericValue"] = Twig\Extension\CoreExtension::replace(CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "attainmentValue", [], "any", false, false, false, 52), ["%" => ""]);
                    // line 53
                    yield "                ";
                    if (CoreExtension::matches("/^d+(.d+)?\$/", ($context["numericValue"] ?? null))) {
                        // line 54
                        yield "                    ";
                        $context["internalTotal"] = (($context["internalTotal"] ?? null) + ((array_key_exists("numericValue", $context)) ? (Twig\Extension\CoreExtension::default(($context["numericValue"] ?? null), 0)) : (0)));
                        // line 55
                        yield "                    ";
                        $context["internalCount"] = (($context["internalCount"] ?? null) + 1);
                        // line 56
                        yield "                ";
                    }
                    // line 57
                    yield "            ";
                }
                // line 58
                yield "        </tr>
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
            unset($context['_seq'], $context['_iterated'], $context['assessmentName'], $context['assessment'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['courseID'], $context['courseData'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        yield "
                <tr>
                    <td colspan=\"5\" class=\"border text-center\">";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("No internal assessment data available."), "html", null, true);
        yield "</td>
                </tr>
        
        </tbody>
    </table>

    <p><strong>";
        // line 69
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Internal Assessment Average:"), "html", null, true);
        yield "</strong> 
        ";
        // line 70
        (((($context["internalCount"] ?? null) > 0)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round((($context["internalTotal"] ?? null) / ($context["internalCount"] ?? null)), 2), "html", null, true)) : (yield "N/A"));
        yield "
    </p>
    <hr>

    ";
        // line 75
        yield "    <h2>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Markbook Data"), "html", null, true);
        yield "</h2>
    <table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"10\" nobr=\"true\">
        <thead>
            <tr>
                <th class=\"header bg-primary border\">";
        // line 79
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Course Name"), "html", null, true);
        yield "</th>
                <th class=\"header bg-primary border\">";
        // line 80
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Markbook Column"), "html", null, true);
        yield "</th>
                <th class=\"header bg-primary border\">";
        // line 81
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Attainment"), "html", null, true);
        yield "</th>
                <th class=\"header bg-primary border\">";
        // line 82
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Effort"), "html", null, true);
        yield "</th>
                <th class=\"header bg-primary border\">";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Comments"), "html", null, true);
        yield "</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 87
        $context["markbookTotal"] = 0;
        // line 88
        yield "            ";
        $context["markbookCount"] = 0;
        // line 89
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["markbookEntry"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["course"]) {
            // line 90
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "columns", [], "any", false, false, false, 90));
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
            foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                // line 91
                yield "                    <tr>
                        ";
                // line 92
                if (CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 92)) {
                    // line 93
                    yield "                            <td rowspan=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["course"], "columns", [], "any", false, false, false, 93)), "html", null, true);
                    yield "\" class=\"border\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["course"], "courseName", [], "any", false, false, false, 93), "html", null, true);
                    yield "</td>
                        ";
                }
                // line 95
                yield "                        <td class=\"border\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "name", [], "any", false, false, false, 95), "html", null, true);
                yield "</td>
                        <td class=\"border\">";
                // line 96
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attainmentValueRaw", [], "any", true, true, false, 96)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attainmentValueRaw", [], "any", false, false, false, 96), "N/A")) : ("N/A")), "html", null, true);
                yield "</td>
                        <td class=\"border\">";
                // line 97
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["column"], "effortValue", [], "any", true, true, false, 97)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "effortValue", [], "any", false, false, false, 97), "N/A")) : ("N/A")), "html", null, true);
                yield "</td>
                        <td class=\"border\">";
                // line 98
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["column"], "comment", [], "any", true, true, false, 98)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "comment", [], "any", false, false, false, 98), "No comments provided.")) : ("No comments provided.")), "html", null, true);
                yield "</td>

                        ";
                // line 100
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attainmentValueRaw", [], "any", true, true, false, 100) && (((CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attainmentValueRaw", [], "any", true, true, false, 100)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attainmentValueRaw", [], "any", false, false, false, 100), "")) : ("")) != ""))) {
                    // line 101
                    yield "                            ";
                    $context["numericValue"] = Twig\Extension\CoreExtension::replace(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "attainmentValueRaw", [], "any", false, false, false, 101), ["%" => ""]);
                    // line 102
                    yield "                            ";
                    if (CoreExtension::matches("/^d+(.d+)?\$/", ($context["numericValue"] ?? null))) {
                        // line 103
                        yield "                                ";
                        $context["markbookTotal"] = (($context["markbookTotal"] ?? null) + ((array_key_exists("numericValue", $context)) ? (Twig\Extension\CoreExtension::default(($context["numericValue"] ?? null), 0)) : (0)));
                        // line 104
                        yield "                                ";
                        $context["markbookCount"] = (($context["markbookCount"] ?? null) + 1);
                        // line 105
                        yield "                            ";
                    }
                    // line 106
                    yield "                        ";
                }
                // line 107
                yield "                    </tr>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['course'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 110
        yield "                <tr>
                    <td colspan=\"5\" class=\"border text-center\">";
        // line 111
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("No markbook data available."), "html", null, true);
        yield "</td>
                </tr>
        </tbody>
    </table>

    <p><strong>";
        // line 116
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Markbook Average:"), "html", null, true);
        yield "</strong> 
        ";
        // line 117
        (((($context["markbookCount"] ?? null) > 0)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::round((($context["markbookTotal"] ?? null) / ($context["markbookCount"] ?? null)), 2), "html", null, true)) : (yield "N/A"));
        yield "
    </p>
    <hr>

    ";
        // line 122
        yield "    <table>
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Assessment Name</th>
                <th>Attainment</th>
                <th>Effort</th>
                <th>Comments</th>
                <th>Teacher(s)</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 134
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["courseCriteriaByCycle"] ?? null));
        foreach ($context['_seq'] as $context["courseID"] => $context["courseData"]) {
            // line 135
            yield "            <tr>
                <td>";
            // line 136
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["courseData"], "courseName", [], "any", false, false, false, 136), "html", null, true);
            yield "</td>
                <td>December 2024 Exam</td>
                <td>";
            // line 138
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["courseData"], "perStudent", [], "any", false, true, false, 138), "Percentage Grade", [], "array", false, true, false, 138), "values", [], "any", false, true, false, 138), CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "name", [], "any", false, false, false, 138), [], "array", false, true, false, 138), "value", [], "any", true, true, false, 138)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["courseData"], "perStudent", [], "any", false, true, false, 138), "Percentage Grade", [], "array", false, true, false, 138), "values", [], "any", false, true, false, 138), CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "name", [], "any", false, false, false, 138), [], "array", false, true, false, 138), "value", [], "any", false, false, false, 138), "N/A")) : ("N/A")), "html", null, true);
            yield "</td>
                <td>";
            // line 139
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["courseData"], "perStudent", [], "any", false, true, false, 139), "Effort", [], "array", false, true, false, 139), "values", [], "any", false, true, false, 139), CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "name", [], "any", false, false, false, 139), [], "array", false, true, false, 139), "value", [], "any", true, true, false, 139)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["courseData"], "perStudent", [], "any", false, true, false, 139), "Effort", [], "array", false, true, false, 139), "values", [], "any", false, true, false, 139), CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "name", [], "any", false, false, false, 139), [], "array", false, true, false, 139), "value", [], "any", false, false, false, 139), "N/A")) : ("N/A")), "html", null, true);
            yield "</td>
                <td>";
            // line 140
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["courseData"], "perStudent", [], "any", false, true, false, 140), "Comments", [], "array", false, true, false, 140), "values", [], "any", false, true, false, 140), CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "name", [], "any", false, false, false, 140), [], "array", false, true, false, 140), "value", [], "any", true, true, false, 140)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["courseData"], "perStudent", [], "any", false, true, false, 140), "Comments", [], "array", false, true, false, 140), "values", [], "any", false, true, false, 140), CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "name", [], "any", false, false, false, 140), [], "array", false, true, false, 140), "value", [], "any", false, false, false, 140), "N/A")) : ("N/A")), "html", null, true);
            yield "</td>
                <td>
                    ";
            // line 142
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["courseData"], "teachers", [], "any", false, false, false, 142));
            $context['_iterated'] = false;
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
                // line 143
                yield "                        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["teacher"], "fullName", [], "any", false, false, false, 143), "html", null, true);
                if ( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 143)) {
                    yield ", ";
                }
                // line 144
                yield "                    ";
                $context['_iterated'] = true;
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            if (!$context['_iterated']) {
                // line 145
                yield "                        N/A
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['teacher'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 147
            yield "                </td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['courseID'], $context['courseData'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 150
        yield "        </tbody>
    </table>
    
    <!-- Calculate and Display Overall Average -->
    ";
        // line 154
        $context["total"] = 0;
        // line 155
        yield "    ";
        $context["count"] = 0;
        // line 156
        yield "    
    ";
        // line 157
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["courseCriteriaByCycle"] ?? null));
        foreach ($context['_seq'] as $context["courseID"] => $context["courseData"]) {
            // line 158
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["courseData"], "perStudent", [], "any", false, false, false, 158));
            foreach ($context['_seq'] as $context["criteriaName"] => $context["criteria"]) {
                // line 159
                yield "            ";
                if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, true, false, 159), CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "name", [], "any", false, false, false, 159), [], "array", false, true, false, 159), "value", [], "any", true, true, false, 159)) {
                    // line 160
                    yield "                ";
                    $context["numericValue"] = Twig\Extension\CoreExtension::replace(CoreExtension::getAttribute($this->env, $this->source, (($__internal_compile_0 = CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "values", [], "any", false, false, false, 160)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "name", [], "any", false, false, false, 160)] ?? null) : null), "value", [], "any", false, false, false, 160), ["%" => ""]);
                    // line 161
                    yield "                ";
                    if (CoreExtension::matches("/^d+(.d+)?\$/", ($context["numericValue"] ?? null))) {
                        // line 162
                        yield "                    ";
                        $context["total"] = (($context["total"] ?? null) + ((array_key_exists("numericValue", $context)) ? (Twig\Extension\CoreExtension::default(($context["numericValue"] ?? null), 0)) : (0)));
                        // line 163
                        yield "                    ";
                        $context["count"] = (($context["count"] ?? null) + 1);
                        // line 164
                        yield "                ";
                    }
                    // line 165
                    yield "            ";
                }
                // line 166
                yield "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['criteriaName'], $context['criteria'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 167
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['courseID'], $context['courseData'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 168
        yield "    
    <div>
        ";
        // line 170
        if ((($context["count"] ?? null) > 0)) {
            // line 171
            yield "            <strong>Overall Average:</strong> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((($context["total"] ?? null) / ($context["count"] ?? null)), 2), "html", null, true);
            yield "%
        ";
        } else {
            // line 173
            yield "            <strong>Overall Average:</strong> N/A
        ";
        }
        // line 175
        yield "    </div>
    



















    ";
        // line 223
        yield "







";
        // line 258
        yield "  
   
   
   
   
   
   
   ";
        // line 289
        yield " 

    
</div>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reports/merge.twig.html";
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
        return array (  580 => 289,  571 => 258,  561 => 223,  538 => 175,  534 => 173,  528 => 171,  526 => 170,  522 => 168,  516 => 167,  510 => 166,  507 => 165,  504 => 164,  501 => 163,  498 => 162,  495 => 161,  492 => 160,  489 => 159,  484 => 158,  480 => 157,  477 => 156,  474 => 155,  472 => 154,  466 => 150,  458 => 147,  451 => 145,  438 => 144,  432 => 143,  414 => 142,  409 => 140,  405 => 139,  401 => 138,  396 => 136,  393 => 135,  389 => 134,  375 => 122,  368 => 117,  364 => 116,  356 => 111,  353 => 110,  334 => 107,  331 => 106,  328 => 105,  325 => 104,  322 => 103,  319 => 102,  316 => 101,  314 => 100,  309 => 98,  305 => 97,  301 => 96,  296 => 95,  288 => 93,  286 => 92,  283 => 91,  265 => 90,  260 => 89,  257 => 88,  255 => 87,  248 => 83,  244 => 82,  240 => 81,  236 => 80,  232 => 79,  224 => 75,  217 => 70,  213 => 69,  204 => 63,  200 => 61,  181 => 58,  178 => 57,  175 => 56,  172 => 55,  169 => 54,  166 => 53,  163 => 52,  161 => 51,  156 => 49,  152 => 48,  148 => 47,  143 => 46,  135 => 44,  133 => 43,  130 => 42,  112 => 41,  107 => 40,  104 => 39,  102 => 38,  94 => 33,  90 => 32,  86 => 31,  82 => 30,  78 => 29,  70 => 25,  62 => 21,  56 => 20,  50 => 19,  46 => 18,  43 => 17,  41 => 15,  38 => 13,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Merge
category: Student Data
types: Body
sources:
    student: Student
    internalAssessmentByCourse: InternalAssessmentByCourse
    reportingCycle: ReportingCycle
config:
-->#}
{# Student Report Template: Internal and Markbook Grades #}
{#{{- stylesheet ? include(stylesheet) -}}#}

{# Student Report Template: Internal Assessment and Markbook #}
{{- stylesheet ? include(stylesheet) -}}

<div class=\"student-report\">
    <h1>{{ __('Student Report') }}</h1>
    <h2>{{ student.firstName }} {{ student.surname }}</h2>
    <p><strong>{{ __('Form Group:') }}</strong> {{ student.formGroupName }}</p>
    <p><strong>{{ __('Tutor:') }}</strong> {{ student.tutorName }}</p>
    <hr>

    {# Internal Assessment Section #}
    <h2>{{ __('Internal Assessment Data') }}</h2>
    <table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"10\" nobr=\"true\">
        <thead>
            <tr>
                <th class=\"header bg-primary border\">{{ __('Course Name') }}</th>
                <th class=\"header bg-primary border\">{{ __('Assessment Name') }}</th>
                <th class=\"header bg-primary border\">{{ __('Attainment') }}</th>
                <th class=\"header bg-primary border\">{{ __('Effort') }}</th>
                <th class=\"header bg-primary border\">{{ __('Comments') }}</th>
            </tr>
        </thead>
        <tbody>
            
            {% set internalTotal = 0 %}
            {% set internalCount = 0 %}
            {% for courseID, courseData in internalAssessmentByCourse.courses %}
    {% for assessmentName, assessment in courseData %}
        <tr>
            {% if loop.first %}
                <td rowspan=\"{{ courseData|length }}\" class=\"border\">{{ assessment.courseName }}</td>
            {% endif %}
            <td class=\"border\">{{ assessment.name }}</td>
            <td class=\"border\">{{ assessment.attainmentValue|default('N/A') }}</td>
            <td class=\"border\">{{ assessment.effortValue|default('N/A') }}</td>
            <td class=\"border\">{{ assessment.comment|default('No comments provided.') }}</td>
            
            {% if assessment.attainmentValue is defined and assessment.attainmentValue|default('') != '' %}
                {% set numericValue = assessment.attainmentValue|replace({'%': ''}) %}
                {% if numericValue matches('/^\\d+(\\.\\d+)?\$/') %}
                    {% set internalTotal = internalTotal + numericValue|default(0) %}
                    {% set internalCount = internalCount + 1 %}
                {% endif %}
            {% endif %}
        </tr>
    {% endfor %}
{% endfor %}

                <tr>
                    <td colspan=\"5\" class=\"border text-center\">{{ __('No internal assessment data available.') }}</td>
                </tr>
        
        </tbody>
    </table>

    <p><strong>{{ __('Internal Assessment Average:') }}</strong> 
        {{ internalCount > 0 ? (internalTotal / internalCount)|round(2) : 'N/A' }}
    </p>
    <hr>

    {# Markbook Section #}
    <h2>{{ __('Markbook Data') }}</h2>
    <table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"10\" nobr=\"true\">
        <thead>
            <tr>
                <th class=\"header bg-primary border\">{{ __('Course Name') }}</th>
                <th class=\"header bg-primary border\">{{ __('Markbook Column') }}</th>
                <th class=\"header bg-primary border\">{{ __('Attainment') }}</th>
                <th class=\"header bg-primary border\">{{ __('Effort') }}</th>
                <th class=\"header bg-primary border\">{{ __('Comments') }}</th>
            </tr>
        </thead>
        <tbody>
            {% set markbookTotal = 0 %}
            {% set markbookCount = 0 %}
            {% for course in markbookEntry %}
                {% for column in course.columns %}
                    <tr>
                        {% if loop.first %}
                            <td rowspan=\"{{ course.columns|length }}\" class=\"border\">{{ course.courseName }}</td>
                        {% endif %}
                        <td class=\"border\">{{ column.name }}</td>
                        <td class=\"border\">{{ column.attainmentValueRaw|default('N/A') }}</td>
                        <td class=\"border\">{{ column.effortValue|default('N/A') }}</td>
                        <td class=\"border\">{{ column.comment|default('No comments provided.') }}</td>

                        {% if column.attainmentValueRaw is defined and column.attainmentValueRaw|default('') != '' %}
                            {% set numericValue = column.attainmentValueRaw|replace({'%': ''}) %}
                            {% if numericValue matches('/^\\d+(\\.\\d+)?\$/') %}
                                {% set markbookTotal = markbookTotal + numericValue|default(0) %}
                                {% set markbookCount = markbookCount + 1 %}
                            {% endif %}
                        {% endif %}
                    </tr>
                {% endfor %}
{% endfor %}
                <tr>
                    <td colspan=\"5\" class=\"border text-center\">{{ __('No markbook data available.') }}</td>
                </tr>
        </tbody>
    </table>

    <p><strong>{{ __('Markbook Average:') }}</strong> 
        {{ markbookCount > 0 ? (markbookTotal / markbookCount)|round(2) : 'N/A' }}
    </p>
    <hr>

    {# Overall Average Section #}
    <table>
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Assessment Name</th>
                <th>Attainment</th>
                <th>Effort</th>
                <th>Comments</th>
                <th>Teacher(s)</th>
            </tr>
        </thead>
        <tbody>
            {% for courseID, courseData in courseCriteriaByCycle %}
            <tr>
                <td>{{ courseData.courseName }}</td>
                <td>December 2024 Exam</td>
                <td>{{ courseData.perStudent['Percentage Grade'].values[reportingCycle.name].value|default('N/A') }}</td>
                <td>{{ courseData.perStudent['Effort'].values[reportingCycle.name].value|default('N/A') }}</td>
                <td>{{ courseData.perStudent['Comments'].values[reportingCycle.name].value|default('N/A') }}</td>
                <td>
                    {% for teacher in courseData.teachers %}
                        {{ teacher.fullName }}{% if not loop.last %}, {% endif %}
                    {% else %}
                        N/A
                    {% endfor %}
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
    
    <!-- Calculate and Display Overall Average -->
    {% set total = 0 %}
    {% set count = 0 %}
    
    {% for courseID, courseData in courseCriteriaByCycle %}
        {% for criteriaName, criteria in courseData.perStudent %}
            {% if criteria.values[reportingCycle.name].value is defined %}
                {% set numericValue = criteria.values[reportingCycle.name].value|replace({'%': ''}) %}
                {% if numericValue matches('/^\\d+(\\.\\d+)?\$/') %}
                    {% set total = total + numericValue|default(0) %}
                    {% set count = count + 1 %}
                {% endif %}
            {% endif %}
        {% endfor %}
    {% endfor %}
    
    <div>
        {% if count > 0 %}
            <strong>Overall Average:</strong> {{ (total / count)|number_format(2) }}%
        {% else %}
            <strong>Overall Average:</strong> N/A
        {% endif %}
    </div>
    



















    {#
    {% set total = 0 %}
    {% set count = 0 %}
    
    {% for courseID, courseData in courseCriteriaByCycle %}
        <tr>
            <td>{{ courseData.courseName }}</td>
            {% for criteriaName, criteria in courseData.perStudent %}
                {% if criteria.values[reportingCycle.name].value is defined %}
                    {% set numericValue = criteria.values[reportingCycle.name].value|replace({'%': ''}) %}
                    {% if numericValue|default('') matches('/^\\d+(\\.\\d+)?\$/') %}
                        {% set total = total + numericValue|default(0) %}
                        {% set count = count + 1 %}
                    {% endif %}
                {% endif %}
            {% endfor %}
        </tr>
    {% endfor %}
    
    <div>
        {% if count > 0 %}
            <strong>Overall Average:</strong> {{ (total / count)|number_format(2) }}%
        {% else %}
            <strong>Overall Average:</strong> N/A
        {% endif %}
    </div>
    #}








{#

    {% set total = 0 %}
{% set count = 0 %}

{% for courseID, courseData in courseCriteriaByCycle %}
    {% for criteriaName, criteria in courseData.perStudent %}
        {% if criteria.values[reportingCycle.name].value is defined %}
        {% set numericValue = criteria.values[reportingCycle.name].value|replace({'%': ''}) %}
        {% if numericValue|default('') matches('/^\\d+(\\.\\d+)?\$/') %}
            {% set total = total + numericValue|default(0) %}
        {% endif %}
        
                {% set count = count + 1 %}
            {% endif %}
        {% endif %}
    {% endfor %}
{% endfor %}

<div>
    {% if count > 0 %}
        <strong>Overall Average:</strong> {{ (total / count)|number_format(2) }}%
    {% else %}
        <strong>Overall Average:</strong> N/A
    {% endif %}
</div>

 #}  
   
   
   
   
   
   
   {#
    {% set total = 0 %}
    {% set count = 0 %}
    
    {% for courseID, courseData in courseCriteriaByCycle %}
        {% for criteriaName, criteria in courseData.perStudent %}
            {% if criteria.values[reportingCycle.name].value is defined %}
                {% set numericValue = criteria.values[reportingCycle.name].value|replace({'%': ''}) %}
                {% if numericValue|default('') matches('/^\\d+(\\.\\d+)?\$/') %}
                    {% set total = total + numericValue|float %}
                    {% set count = count + 1 %}
                {% endif %}
            {% endif %}
        {% endfor %}
    {% endfor %}
    
    <div>
        {% if count > 0 %}
            <strong>Overall Average:</strong> {{ (total / count)|number_format(2) }}%
        {% else %}
            <strong>Overall Average:</strong> N/A
        {% endif %}
    </div>
    
   #} 

    
</div>
", "reports/merge.twig.html", "/Applications/MAMP/htdocs/chhs/uploads/reports/templates/reports/merge.twig.html");
    }
}
