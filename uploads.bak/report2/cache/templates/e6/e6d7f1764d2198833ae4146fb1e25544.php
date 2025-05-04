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

/* ui/reportingStudentHeader.twig.html */
class __TwigTemplate_4d0cdd8e2b22ab79bad55e826b9e6182 extends Template
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
        yield "
<div class=\"flex my-4 items-stretch\">
    <a class=\" w-32 p-2 flex items-center rounded-l border bg-gray-100 text-gray-600 hover:bg-blue-200 hover:border-blue-700 hover:text-blue-800\" href=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/index.php?q=/modules/Reports/reporting_write_byStudent.php&gibbonPersonIDStudent=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["prevStudent"] ?? null), "gibbonPersonID", [], "any", false, false, false, 12), "html", null, true);
        yield "&";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(($context["params"] ?? null)), "html", null, true);
        yield "\">
        <img class=\"inline-block  mr-2 w-4 h-4 align-top\" title=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Prev"), "html", null, true);
        yield "\" src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/themes/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonThemeName"] ?? null), "html", null, true);
        yield "/img/page_left.png\" >
        <span class=\"inline-block px-1  text-sm leading-tight\">
            ";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Prev"), "html", null, true);
        yield "
        </span>
    </a>

    <div class=\"flex-1 flex flex-col items-center justify-center py-4 border-t border-b bg-gray-100 text-gray-700\" >
        <a class=\"text-sm text-center leading-tight text-gray-700 hover:text-blue-700 hover:underline\" href=\"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/index.php?q=/modules/Reports/reporting_write.php&gibbonPersonIDStudent=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["prevStudent"] ?? null), "gibbonPersonID", [], "any", false, false, false, 20), "html", null, true);
        yield "&";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(($context["params"] ?? null)), "html", null, true);
        yield "\">
                <strong>";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["scopeDetails"] ?? null), "scopeName", [], "any", false, false, false, 21), "html", null, true);
        yield "</strong> - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["scopeDetails"] ?? null), "nameShort", [], "any", false, false, false, 21), "html", null, true);
        yield " ";
        (((CoreExtension::getAttribute($this->env, $this->source, ($context["scopeDetails"] ?? null), "name", [], "any", false, false, false, 21) != CoreExtension::getAttribute($this->env, $this->source, ($context["scopeDetails"] ?? null), "nameShort", [], "any", false, false, false, 21))) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("- " . CoreExtension::getAttribute($this->env, $this->source, ($context["scopeDetails"] ?? null), "name", [], "any", false, false, false, 21)), "html", null, true)) : (yield ""));
        yield "
        </a>

        ";
        // line 24
        if ((($context["relatedReports"] ?? null) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["relatedReports"] ?? null)) > 1))) {
            // line 25
            yield "            <div class=\"pt-4 text-center text-xs\">
                ";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["relatedReports"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["report"]) {
                // line 27
                yield "                <a ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["report"], "gibbonReportingCycleID", [], "any", false, false, false, 27) == CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "gibbonReportingCycleID", [], "any", false, false, false, 27))) ? ("class=\"active\"") : (""));
                yield " href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
                yield "/index.php?q=/modules/Reports/reporting_write_byStudent.php&gibbonPersonIDStudent=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "gibbonPersonID", [], "any", false, false, false, 27), "html", null, true);
                yield "&gibbonPersonID=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "gibbonPersonID", [], "any", false, false, false, 27), "html", null, true);
                yield "&gibbonReportingCycleID=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["report"], "gibbonReportingCycleID", [], "any", false, false, false, 27), "html", null, true);
                yield "&gibbonReportingScopeID=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["report"], "gibbonReportingScopeID", [], "any", false, false, false, 27), "html", null, true);
                yield "&scopeTypeID=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "scopeTypeID", [], "any", false, false, false, 27), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["report"], "nameShort", [], "any", false, false, false, 27), "html", null, true);
                yield "</a>
                ";
                // line 28
                if ( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 28)) {
                    yield "&nbsp; |  &nbsp;";
                }
                // line 29
                yield "                ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['report'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            yield "            </div>
        ";
        }
        // line 32
        yield "        
    </div>

    <a class=\" w-32 p-2 flex items-center justify-end rounded-r border bg-gray-100 text-gray-600 text-right hover:bg-blue-200 hover:border-blue-700 hover:text-blue-800\" href=\"";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/index.php?q=/modules/Reports/reporting_write_byStudent.php&gibbonPersonIDStudent=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["nextStudent"] ?? null), "gibbonPersonID", [], "any", false, false, false, 35), "html", null, true);
        yield "&";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode(($context["params"] ?? null)), "html", null, true);
        yield "\">
        <span class=\"inline-block px-1  text-sm leading-tight\">
            ";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Next"), "html", null, true);
        yield " 
        </span>
        <img class=\"inline-block  ml-2 w-4 h-4 align-top\" title=\"";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Next"), "html", null, true);
        yield "\" src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/themes/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonThemeName"] ?? null), "html", null, true);
        yield "/img/page_right.png\" >
    </a>
</div>


<div class=\"border rounded bg-gray-100 my-4\">
    ";
        // line 45
        if ((($context["canWriteReport"] ?? null) == false)) {
            // line 46
            yield "    <div class=\"bg-red-200 text-red-700 border-b p-4 text-sm\">
        <img class=\"w-6 h-6 -my-2 mr-2\" src=\"";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
            yield "/themes/Default/img/key.png\" title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Read-only"), "html", null, true);
            yield "\">
        ";
            // line 48
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("This report is read-only. You do not have access to make changes."), "html", null, true);
            yield "
    </div>
    ";
        } elseif ((        // line 50
($context["reportingEnded"] ?? null) == true)) {
            // line 51
            yield "    <div class=\"bg-gray-200 text-gray-700 border-b p-4 text-sm\">
        <img class=\"w-6 h-6 -my-2 mr-2\" src=\"";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
            yield "/themes/Default/img/planner.png\" title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Ended"), "html", null, true);
            yield "\">
        ";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("This reporting cycle has ended. You have access to edit data, however the report is read-only for most users."), "html", null, true);
            yield "
    </div>
    ";
        }
        // line 56
        yield "
    <div class=\"p-4 flex flex-wrap items-center\">
        <div class=\"flex flex-col justify-center sm:justify-start items-center text-xs text-center mt-4 sm:mt-0\">

            ";
        // line 60
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "alerts", [], "any", false, false, false, 60)) {
            // line 61
            yield "                <div class=\"w-20 lg:w-24 text-left pb-1 px-0 mx-auto\">
                ";
            // line 62
            yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "alerts", [], "any", false, false, false, 62)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "alerts", [], "any", false, false, false, 62)) : (""));
            yield "
                </div>
            ";
        }
        // line 65
        yield "
            ";
        // line 66
        yield $this->env->getFunction('formatUsing')->getCallable()("userPhoto", CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "image_240", [], "any", false, false, false, 66), 75);
        yield "
        </div>

        <div class=\"flex-1 text-center sm:text-left sm:pl-6\">
            <a class=\"block text-lg underline leading-none mb-1 p-0\" href=\"";
        // line 70
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/index.php?q=/modules/Students/student_view_details.php&gibbonPersonID=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "gibbonPersonID", [], "any", false, false, false, 70), "html", null, true);
        yield "&allStudents=on\" target=\"_blank\">
                ";
        // line 71
        yield $this->env->getFunction('formatUsing')->getCallable()("name", CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "title", [], "any", false, false, false, 71), CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "preferredName", [], "any", false, false, false, 71), CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "surname", [], "any", false, false, false, 71), "Student", false, true);
        yield "
            </a>
            <div class=\"text-sm text-gray-600 mb-0\">
                ";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "formGroup", [], "any", false, false, false, 74), "html", null, true);
        yield "
            
                ";
        // line 76
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "status", [], "any", false, false, false, 76) != "Full")) {
            // line 77
            yield "                    <span class=\"tag error\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "status", [], "any", false, false, false, 77), "html", null, true);
            yield "</span>
                ";
        }
        // line 79
        yield "            </div>
        </div>

        <div class=\"flex-1 flex flex-grow justify-between sm:justify-start items-center text-xs text-center\">
            <a class=\"thickbox px-0 sm:px-2 w-20\" href=\"";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/fullscreen.php?q=/modules/Students/student_view_details.php&gibbonPersonID=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "gibbonPersonID", [], "any", false, false, false, 83), "html", null, true);
        yield "&allStudents=on&width=900&height=700\">
                <img class=\"\" src=\"";
        // line 84
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/themes/Default/img/plus.png\" title=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Profile"), "html", null, true);
        yield "\" width=\"25\" height=\"25\">
                <div class=\"mt-1\">";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Profile"), "html", null, true);
        yield "</div>
            </a>

            <a class=\"thickbox px-0 sm:px-2 w-20\" href=\"";
        // line 88
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/fullscreen.php?q=/modules/Students/student_view_details.php&gibbonPersonID=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "gibbonPersonID", [], "any", false, false, false, 88), "html", null, true);
        yield "&allStudents=on&subpage=Attendance&width=900&height=700\">
                <img class=\"\" src=\"";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/themes/Default/img/planner.png\" title=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Attendance"), "html", null, true);
        yield "\" width=\"25\" height=\"25\">
                <div class=\"mt-1\">";
        // line 90
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Attendance"), "html", null, true);
        yield "</div>
            </a>

            <a class=\"thickbox px-0 sm:px-2 w-20\" href=\"";
        // line 93
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/fullscreen.php?q=/modules/Students/student_view_details.php&gibbonPersonID=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "gibbonPersonID", [], "any", false, false, false, 93), "html", null, true);
        yield "&allStudents=on&subpage=Markbook&width=900&height=700\">
                <img class=\"\" src=\"";
        // line 94
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/themes/Default/img/markbook.png\" title=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Markbook"), "html", null, true);
        yield "\" width=\"25\" height=\"25\">
                <div class=\"mt-1\">";
        // line 95
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Markbook"), "html", null, true);
        yield "</div>
            </a>

            <a class=\"thickbox px-0 sm:px-2 w-20\" href=\"";
        // line 98
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/fullscreen.php?q=/modules/Reports/archive_byStudent_view.php&gibbonSchoolYearID=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "gibbonSchoolYearID", [], "any", false, false, false, 98), "html", null, true);
        yield "&gibbonYearGroupID=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "gibbonYearGroupID", [], "any", false, false, false, 98), "html", null, true);
        yield "&gibbonFormGroupID=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "gibbonFormGroupID", [], "any", false, false, false, 98), "html", null, true);
        yield "&gibbonPersonID=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "gibbonPersonID", [], "any", false, false, false, 98), "html", null, true);
        yield "&width=900&height=700\">
                <img class=\"\" src=\"";
        // line 99
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/themes/Default/img/internalAssessment.png\" title=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Reports"), "html", null, true);
        yield "\" width=\"25\" height=\"25\">
                <div class=\"mt-1\">";
        // line 100
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Reports"), "html", null, true);
        yield "</div>
            </a>

        </div>

        
    </div>
</div>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ui/reportingStudentHeader.twig.html";
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
        return array (  343 => 100,  337 => 99,  325 => 98,  319 => 95,  313 => 94,  307 => 93,  301 => 90,  295 => 89,  289 => 88,  283 => 85,  277 => 84,  271 => 83,  265 => 79,  259 => 77,  257 => 76,  252 => 74,  246 => 71,  240 => 70,  233 => 66,  230 => 65,  224 => 62,  221 => 61,  219 => 60,  213 => 56,  207 => 53,  201 => 52,  198 => 51,  196 => 50,  191 => 48,  185 => 47,  182 => 46,  180 => 45,  167 => 39,  162 => 37,  153 => 35,  148 => 32,  144 => 30,  130 => 29,  126 => 28,  107 => 27,  90 => 26,  87 => 25,  85 => 24,  75 => 21,  67 => 20,  59 => 15,  50 => 13,  42 => 12,  38 => 10,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
Gibbon: the flexible, open school platform
Founded by Ross Parker at ICHK Secondary. Built by Ross Parker, Sandra Kuipers and the Gibbon community (https://gibbonedu.org/about/)
Copyright © 2010, Gibbon Foundation
Gibbon™, Gibbon Education Ltd. (Hong Kong)

This is a Gibbon template file, written in HTML and Twig syntax.
For info about editing, see: https://twig.symfony.com/doc/2.x/
-->#}

<div class=\"flex my-4 items-stretch\">
    <a class=\" w-32 p-2 flex items-center rounded-l border bg-gray-100 text-gray-600 hover:bg-blue-200 hover:border-blue-700 hover:text-blue-800\" href=\"{{ absoluteURL }}/index.php?q=/modules/Reports/reporting_write_byStudent.php&gibbonPersonIDStudent={{ prevStudent.gibbonPersonID }}&{{ params|url_encode }}\">
        <img class=\"inline-block  mr-2 w-4 h-4 align-top\" title=\"{{ __('Prev') }}\" src=\"{{ absoluteURL }}/themes/{{ gibbonThemeName }}/img/page_left.png\" >
        <span class=\"inline-block px-1  text-sm leading-tight\">
            {{ __('Prev') }}
        </span>
    </a>

    <div class=\"flex-1 flex flex-col items-center justify-center py-4 border-t border-b bg-gray-100 text-gray-700\" >
        <a class=\"text-sm text-center leading-tight text-gray-700 hover:text-blue-700 hover:underline\" href=\"{{ absoluteURL }}/index.php?q=/modules/Reports/reporting_write.php&gibbonPersonIDStudent={{ prevStudent.gibbonPersonID }}&{{ params|url_encode }}\">
                <strong>{{ scopeDetails.scopeName }}</strong> - {{ scopeDetails.nameShort }} {{ scopeDetails.name != scopeDetails.nameShort ? \"- \"~scopeDetails.name : \"\" }}
        </a>

        {% if relatedReports and relatedReports|length > 1 %}
            <div class=\"pt-4 text-center text-xs\">
                {% for report in relatedReports %}
                <a {{ report.gibbonReportingCycleID == params.gibbonReportingCycleID ? 'class=\"active\"' }} href=\"{{ absoluteURL }}/index.php?q=/modules/Reports/reporting_write_byStudent.php&gibbonPersonIDStudent={{ student.gibbonPersonID }}&gibbonPersonID={{ params.gibbonPersonID }}&gibbonReportingCycleID={{ report.gibbonReportingCycleID }}&gibbonReportingScopeID={{ report.gibbonReportingScopeID }}&scopeTypeID={{ params.scopeTypeID }}\">{{ report.nameShort }}</a>
                {% if not loop.last %}&nbsp; |  &nbsp;{% endif %}
                {% endfor %}
            </div>
        {% endif %}
        
    </div>

    <a class=\" w-32 p-2 flex items-center justify-end rounded-r border bg-gray-100 text-gray-600 text-right hover:bg-blue-200 hover:border-blue-700 hover:text-blue-800\" href=\"{{ absoluteURL }}/index.php?q=/modules/Reports/reporting_write_byStudent.php&gibbonPersonIDStudent={{ nextStudent.gibbonPersonID }}&{{ params|url_encode }}\">
        <span class=\"inline-block px-1  text-sm leading-tight\">
            {{ __('Next') }} 
        </span>
        <img class=\"inline-block  ml-2 w-4 h-4 align-top\" title=\"{{ __('Next') }}\" src=\"{{ absoluteURL }}/themes/{{ gibbonThemeName }}/img/page_right.png\" >
    </a>
</div>


<div class=\"border rounded bg-gray-100 my-4\">
    {% if canWriteReport == false %}
    <div class=\"bg-red-200 text-red-700 border-b p-4 text-sm\">
        <img class=\"w-6 h-6 -my-2 mr-2\" src=\"{{ absoluteURL }}/themes/Default/img/key.png\" title=\"{{ __('Read-only') }}\">
        {{ __('This report is read-only. You do not have access to make changes.') }}
    </div>
    {% elseif reportingEnded == true %}
    <div class=\"bg-gray-200 text-gray-700 border-b p-4 text-sm\">
        <img class=\"w-6 h-6 -my-2 mr-2\" src=\"{{ absoluteURL }}/themes/Default/img/planner.png\" title=\"{{ __('Ended') }}\">
        {{ __('This reporting cycle has ended. You have access to edit data, however the report is read-only for most users.') }}
    </div>
    {% endif %}

    <div class=\"p-4 flex flex-wrap items-center\">
        <div class=\"flex flex-col justify-center sm:justify-start items-center text-xs text-center mt-4 sm:mt-0\">

            {% if student.alerts %}
                <div class=\"w-20 lg:w-24 text-left pb-1 px-0 mx-auto\">
                {{ student.alerts ? student.alerts | raw }}
                </div>
            {% endif %}

            {{ formatUsing('userPhoto', student.image_240, 75)|raw }}
        </div>

        <div class=\"flex-1 text-center sm:text-left sm:pl-6\">
            <a class=\"block text-lg underline leading-none mb-1 p-0\" href=\"{{ absoluteURL }}/index.php?q=/modules/Students/student_view_details.php&gibbonPersonID={{ student.gibbonPersonID }}&allStudents=on\" target=\"_blank\">
                {{ formatUsing('name', student.title, student.preferredName, student.surname, 'Student', false, true) }}
            </a>
            <div class=\"text-sm text-gray-600 mb-0\">
                {{ student.formGroup }}
            
                {% if student.status != 'Full' %}
                    <span class=\"tag error\">{{ student.status }}</span>
                {% endif %}
            </div>
        </div>

        <div class=\"flex-1 flex flex-grow justify-between sm:justify-start items-center text-xs text-center\">
            <a class=\"thickbox px-0 sm:px-2 w-20\" href=\"{{ absoluteURL }}/fullscreen.php?q=/modules/Students/student_view_details.php&gibbonPersonID={{ student.gibbonPersonID }}&allStudents=on&width=900&height=700\">
                <img class=\"\" src=\"{{ absoluteURL }}/themes/Default/img/plus.png\" title=\"{{ __('Profile') }}\" width=\"25\" height=\"25\">
                <div class=\"mt-1\">{{ __('Profile') }}</div>
            </a>

            <a class=\"thickbox px-0 sm:px-2 w-20\" href=\"{{ absoluteURL }}/fullscreen.php?q=/modules/Students/student_view_details.php&gibbonPersonID={{ student.gibbonPersonID }}&allStudents=on&subpage=Attendance&width=900&height=700\">
                <img class=\"\" src=\"{{ absoluteURL }}/themes/Default/img/planner.png\" title=\"{{ __('Attendance') }}\" width=\"25\" height=\"25\">
                <div class=\"mt-1\">{{ __('Attendance') }}</div>
            </a>

            <a class=\"thickbox px-0 sm:px-2 w-20\" href=\"{{ absoluteURL }}/fullscreen.php?q=/modules/Students/student_view_details.php&gibbonPersonID={{ student.gibbonPersonID }}&allStudents=on&subpage=Markbook&width=900&height=700\">
                <img class=\"\" src=\"{{ absoluteURL }}/themes/Default/img/markbook.png\" title=\"{{ __('Markbook') }}\" width=\"25\" height=\"25\">
                <div class=\"mt-1\">{{ __('Markbook') }}</div>
            </a>

            <a class=\"thickbox px-0 sm:px-2 w-20\" href=\"{{ absoluteURL }}/fullscreen.php?q=/modules/Reports/archive_byStudent_view.php&gibbonSchoolYearID={{ student.gibbonSchoolYearID}}&gibbonYearGroupID={{ student.gibbonYearGroupID }}&gibbonFormGroupID={{ student.gibbonFormGroupID }}&gibbonPersonID={{ student.gibbonPersonID }}&width=900&height=700\">
                <img class=\"\" src=\"{{ absoluteURL }}/themes/Default/img/internalAssessment.png\" title=\"{{ __('Reports') }}\" width=\"25\" height=\"25\">
                <div class=\"mt-1\">{{ __('Reports') }}</div>
            </a>

        </div>

        
    </div>
</div>
", "ui/reportingStudentHeader.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/ui/reportingStudentHeader.twig.html");
    }
}
