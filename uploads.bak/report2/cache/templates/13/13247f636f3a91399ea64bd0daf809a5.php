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

/* components/studentHistory.twig.html */
class __TwigTemplate_17d8567c77a4349bcf0ee1fe91a3b32e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'tableInner' => [$this, 'block_tableInner'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 11
        return "components/dataTable.twig.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 12
        $macros["attendance"] = $this->macros["attendance"] = $this;
        // line 11
        $this->parent = $this->loadTemplate("components/dataTable.twig.html", "components/studentHistory.twig.html", 11);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 14
    public function block_tableInner($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 15
        yield "
    <div class=\"flex flex-wrap justify-center md:justify-between rounded bg-gray-100 border\">
        <div class=\"md:flex-1 p-4 text-sm text-gray-700\">
            <h3 class=\"mt-2 border-b-0\">
                ";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Summary"), "html", null, true);
        yield "
            </h3>

            ";
        // line 22
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["summary"] ?? null), "total", [], "any", false, false, false, 22)) {
            // line 23
            yield "                ";
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["summary"] ?? null), "total", [], "any", false, false, false, 23) != ((CoreExtension::getAttribute($this->env, $this->source, ($context["summary"] ?? null), "present", [], "any", false, false, false, 23) + CoreExtension::getAttribute($this->env, $this->source, ($context["summary"] ?? null), "partial", [], "any", false, false, false, 23)) + CoreExtension::getAttribute($this->env, $this->source, ($context["summary"] ?? null), "absent", [], "any", false, false, false, 23)))) {
                // line 24
                yield "                    <div class=\"italic mb-4 text-xs\">
                    ";
                // line 25
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("It appears that this student is missing attendance data for some school days:"), "html", null, true);
                yield "
                    </div>
                ";
            }
            // line 28
            yield "
                <div class=\"leading-snug\">
                    <strong>";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Total number of school days to date:"), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["summary"] ?? null), "total", [], "any", false, false, false, 30), "html", null, true);
            yield "</strong><br/>
                    ";
            // line 31
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Total number of school days attended:"), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, ($context["summary"] ?? null), "present", [], "any", false, false, false, 31) + CoreExtension::getAttribute($this->env, $this->source, ($context["summary"] ?? null), "partial", [], "any", false, false, false, 31)), "html", null, true);
            yield "<br/>
                    ";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Total number of school days absent:"), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["summary"] ?? null), "absent", [], "any", false, false, false, 32), "html", null, true);
            yield "<br/>
                </div>
            ";
        }
        // line 35
        yield "        </div>

        ";
        // line 37
        if ( !($context["printView"] ?? null)) {
            // line 38
            yield "        <div class=\" p-4\">
            ";
            // line 39
            yield ($context["chart"] ?? null);
            yield "
        </div>
        ";
        }
        // line 42
        yield "    </div>


    <div id=\"studentHistory\">
    ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["dataSet"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["term"]) {
            // line 47
            yield "        <h4>
        ";
            // line 48
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["term"], "name", [], "any", false, false, false, 48), "html", null, true);
            yield "
        </h4>

        ";
            // line 51
            $context["daysOfWeek"] = CoreExtension::getAttribute($this->env, $this->source, $context["term"], "daysOfWeek", [], "any", false, false, false, 51);
            // line 52
            yield "        ";
            $context["blockWidth"] = ("w-1/" . Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["daysOfWeek"] ?? null)));
            // line 53
            yield "        ";
            $context["dayClass"] = "flex flex-col justify-center border-t border-b border-r py-2 px-1 -mt-px ";
            // line 54
            yield "
        <div class=\"flex flex-wrap border-t border-l border-gray-500\">

            ";
            // line 58
            yield "            <div class=\"w-full flex items-stretch text-xs text-center text-gray-700 font-bold bg-gray-200 border-b border-r border-gray-500\">
                ";
            // line 59
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["daysOfWeek"] ?? null));
            foreach ($context['_seq'] as $context["dayNameShort"] => $context["dayName"]) {
                // line 60
                yield "                    <div class=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["blockWidth"] ?? null), "html", null, true);
                yield " py-1\" title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()($context["dayName"]), "html", null, true);
                yield "\">
                        ";
                // line 61
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()($context["dayNameShort"]), "html", null, true);
                yield "
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['dayNameShort'], $context['dayName'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            yield "
                ";
            // line 65
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["daysOfWeek"] ?? null));
            foreach ($context['_seq'] as $context["dayNameShort"] => $context["dayName"]) {
                // line 66
                yield "                    <div class=\"hidden md:block ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["blockWidth"] ?? null), "html", null, true);
                yield " py-1\" title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()($context["dayName"]), "html", null, true);
                yield "\">
                        ";
                // line 67
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()($context["dayNameShort"]), "html", null, true);
                yield "
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['dayNameShort'], $context['dayName'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            yield "            </div>

            ";
            // line 73
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["term"], "weeks", [], "any", false, false, false, 73));
            foreach ($context['_seq'] as $context["weekNumber"] => $context["week"]) {
                // line 74
                yield "                <div class=\"w-full md:w-1/2 flex items-stretch text-xxs text-center text-gray-600\" style=\"min-height: 55px;\">

                ";
                // line 76
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable($context["week"]);
                foreach ($context['_seq'] as $context["_key"] => $context["day"]) {
                    // line 77
                    yield "                    ";
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["day"], "outsideTerm", [], "any", false, false, false, 77)) {
                        // line 78
                        yield "                        <div class=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["blockWidth"] ?? null), "html", null, true);
                        yield " ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["dayClass"] ?? null), "html", null, true);
                        yield " bg-gray-400 border-gray-600 text-gray-500\">
                        </div>
                    ";
                    } elseif (CoreExtension::getAttribute($this->env, $this->source,                     // line 80
$context["day"], "beforeStartDate", [], "any", false, false, false, 80)) {
                        // line 81
                        yield "                        <div class=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["blockWidth"] ?? null), "html", null, true);
                        yield " ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["dayClass"] ?? null), "html", null, true);
                        yield " bg-gray-400 border-gray-600 text-gray-500\" title=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Before Start Date"), "html", null, true);
                        yield "\">
                            ";
                        // line 82
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["day"], "dateDisplay", [], "any", false, false, false, 82), "html", null, true);
                        yield "<br/>
                            ";
                        // line 83
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Before Start Date"), "html", null, true);
                        yield "
                        </div>
                    ";
                    } elseif (CoreExtension::getAttribute($this->env, $this->source,                     // line 85
$context["day"], "afterEndDate", [], "any", false, false, false, 85)) {
                        // line 86
                        yield "                        <div class=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["blockWidth"] ?? null), "html", null, true);
                        yield " ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["dayClass"] ?? null), "html", null, true);
                        yield " bg-gray-400 border-gray-600 text-gray-500\" title=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("After End Date"), "html", null, true);
                        yield "\">
                            ";
                        // line 87
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["day"], "dateDisplay", [], "any", false, false, false, 87), "html", null, true);
                        yield "<br/>
                            ";
                        // line 88
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("After End Date"), "html", null, true);
                        yield "
                        </div>
                    ";
                    } elseif (CoreExtension::getAttribute($this->env, $this->source,                     // line 90
$context["day"], "specialDay", [], "any", false, false, false, 90)) {
                        // line 91
                        yield "                        <div class=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["blockWidth"] ?? null), "html", null, true);
                        yield " ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["dayClass"] ?? null), "html", null, true);
                        yield " bg-gray-400 border-gray-600 text-gray-500\" title=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("School Closed"), "html", null, true);
                        yield "\">
                            ";
                        // line 92
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["day"], "specialDay", [], "any", false, false, false, 92), "html", null, true);
                        yield "
                        </div>
                    ";
                    } elseif ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source,                     // line 94
$context["day"], "logs", [], "any", false, false, false, 94)) && Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["day"], "classLogs", [], "any", false, false, false, 94)))) {
                        // line 95
                        yield "                        <div class=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["blockWidth"] ?? null), "html", null, true);
                        yield " ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["dayClass"] ?? null), "html", null, true);
                        yield " bg-gray-200 border-gray-600 text-gray-700\" title=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("No Data"), "html", null, true);
                        yield "\">
                            ";
                        // line 96
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["day"], "dateDisplay", [], "any", false, false, false, 96), "html", null, true);
                        yield "
                        </div>
                    ";
                    } else {
                        // line 99
                        yield "                        <a class=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["blockWidth"] ?? null), "html", null, true);
                        yield " ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["dayClass"] ?? null), "html", null, true);
                        yield " ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["day"], "endOfDay", [], "any", false, false, false, 99), "statusClass", [], "any", false, false, false, 99), "html", null, true);
                        yield " relative z-10\" data-log=\"";
                        yield CoreExtension::callMacro($macros["attendance"], "macro_tooltip", [$context["day"]], 99, $context, $this->getSourceContext());
                        yield "\"
                            ";
                        // line 100
                        if (($context["canTakeAttendanceByPerson"] ?? null)) {
                            // line 101
                            yield "                                href=\"";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
                            yield "/index.php?q=/modules/Attendance/attendance_take_byPerson.php&gibbonPersonID=";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["day"], "gibbonPersonID", [], "any", false, false, false, 101), "html", null, true);
                            yield "&currentDate=";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["day"], "date", [], "any", false, false, false, 101), "html", null, true);
                            yield "\"
                            ";
                        }
                        // line 102
                        yield ">

                            ";
                        // line 104
                        yield CoreExtension::callMacro($macros["attendance"], "macro_badge", [$context["day"]], 104, $context, $this->getSourceContext());
                        yield "

                            <span>";
                        // line 106
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["day"], "dateDisplay", [], "any", false, false, false, 106), "html", null, true);
                        yield "</span>
                            <span class=\"mt-1 font-bold\">";
                        // line 107
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["day"], "endOfDay", [], "any", false, false, false, 107), "type", [], "any", false, false, false, 107)), "html", null, true);
                        yield "</span>

                            ";
                        // line 109
                        if (($context["printView"] ?? null)) {
                            // line 110
                            yield "                                <span class=\"mt-1\">
                                ";
                            // line 111
                            $context['_parent'] = $context;
                            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["day"], "logs", [], "any", false, false, false, 111));
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
                            foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
                                // line 112
                                yield "                                    ";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "code", [], "any", false, false, false, 112), "html", null, true);
                                // line 113
                                yield (( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 113)) ? (" : ") : (""));
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
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 115
                            yield "                                </span>
                            ";
                        }
                        // line 117
                        yield "                        </a>
                    ";
                    }
                    // line 119
                    yield "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['day'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 120
                yield "            </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['weekNumber'], $context['week'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 122
            yield "        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['term'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 124
        yield "    </div>


";
        return; yield '';
    }

    // line 192
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield "

<style>
    .tooltip-reset {
        background: #ffffff !important;
        min-width: 16rem;
    }
    .w-1\\/7 {
        width: 14.28%;
    }
</style>
<script>
\$('#studentHistory').tooltip({
    items: \"a[data-log]\",
    show: 800,
    hide: false,
    content: function () {
        return \$(this).data('log');
    },
    tooltipClass: \"tooltip-reset\",
    position: {
        my: \"center bottom-5\",
        at: \"center top\",
        using: function (position, feedback) {
            \$(this).css(position);
            \$(\"<div>\").
                addClass(\"arrow\").
                addClass(feedback.vertical).
                addClass(feedback.horizontal).
                appendTo(this);
        }
    }
});
</script>

";
        return; yield '';
    }

    // line 133
    public function macro_tooltip($__day__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "day" => $__day__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 134
            yield "    <section class='-mx-2 p-4 border text-center ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "endOfDay", [], "any", false, false, false, 134), "statusClass", [], "any", false, false, false, 134), "html", null, true);
            yield "'>
        ";
            // line 135
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "dateDisplay", [], "any", false, false, false, 135), "html", null, true);
            yield "<br/>
        
        <span class='font-bold text-base leading-normal'>";
            // line 137
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "endOfDay", [], "any", false, false, false, 137), "type", [], "any", false, false, false, 137)), "html", null, true);
            yield "</span><br/>

        ";
            // line 139
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "endOfDay", [], "any", false, false, false, 139), "reason", [], "any", false, false, false, 139)) {
                // line 140
                yield "            <span class='mt-1 text-xs'>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "endOfDay", [], "any", false, false, false, 140), "reason", [], "any", false, false, false, 140)), "html", null, true);
                yield "</span><br/>
        ";
            }
            // line 142
            yield "
        <ul class='list-none ml-0 mt-4 text-xs text-left'>
            <li class='text-xxs  font-bold'>";
            // line 144
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("School Attendance"), "html", null, true);
            yield ":</li>
            ";
            // line 145
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "logs", [], "any", false, false, false, 145));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
                // line 146
                yield "                <li class='";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "statusClass", [], "any", false, false, false, 146), "html", null, true);
                yield " leading-relaxed'>
                    ";
                // line 147
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "timestampTaken", [], "any", false, false, false, 147), ((($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "timestampTaken", [], "any", false, false, false, 147), "Y-m-d") == CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "date", [], "any", false, false, false, 147))) ? ("H:i") : ("H:i Y-m-d"))), "html", null, true);
                yield " -
                    ";
                // line 148
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 148)), "html", null, true);
                ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "reason", [], "any", false, false, false, 148)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((", " . $this->env->getFunction('__')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "reason", [], "any", false, false, false, 148))), "html", null, true)) : (yield ""));
                yield " - 
                    ";
                // line 149
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "contextName", [], "any", false, false, false, 149)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["log"], "contextName", [], "any", false, false, false, 149)) : ($this->env->getFunction('__')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "context", [], "any", false, false, false, 149)))), "html", null, true);
                yield "
                </li>
            ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 152
                yield "                <li class='text-xxs'>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Not Available"), "html", null, true);
                yield "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 154
            yield "
        ";
            // line 155
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "classLogs", [], "any", false, false, false, 155)) {
                // line 156
                yield "            <li class='text-xxs  font-bold mt-2'>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Class Attendance"), "html", null, true);
                yield ":</li>
            ";
                // line 157
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "classLogs", [], "any", false, false, false, 157));
                foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
                    // line 158
                    yield "                <li class='";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "statusClass", [], "any", false, false, false, 158), "html", null, true);
                    yield " leading-relaxed'>
                    ";
                    // line 159
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "timestampTaken", [], "any", false, false, false, 159), ((($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "timestampTaken", [], "any", false, false, false, 159), "Y-m-d") == CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "date", [], "any", false, false, false, 159))) ? ("H:i") : ("H:i Y-m-d"))), "html", null, true);
                    yield " -
                    ";
                    // line 160
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "type", [], "any", false, false, false, 160)), "html", null, true);
                    ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "reason", [], "any", false, false, false, 160)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((", " . $this->env->getFunction('__')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "reason", [], "any", false, false, false, 160))), "html", null, true)) : (yield ""));
                    yield " - 
                    ";
                    // line 161
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "contextName", [], "any", false, false, false, 161)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["log"], "contextName", [], "any", false, false, false, 161)) : ($this->env->getFunction('__')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "context", [], "any", false, false, false, 161)))), "html", null, true);
                    yield "
                </li>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 164
                yield "        ";
            }
            // line 165
            yield "    </section>
";
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 173
    public function macro_badge($__day__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "day" => $__day__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 174
            yield "    ";
            if ((((CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "absentCount", [], "any", false, false, false, 174) > 0) || (CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "partialCount", [], "any", false, false, false, 174) > 0)) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "endOfDay", [], "any", false, false, false, 174), "status", [], "any", false, false, false, 174) == "present"))) {
                // line 175
                yield "    <div class=\"absolute top-0 right-0 mt-1 mr-1 z-10 rounded-full bg-gray-600 text-white no-underline leading-tight font-sans\" style=\"padding: 1px 3px; font-size: 8px\">
        ";
                // line 176
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "absentCount", [], "any", false, false, false, 176) + CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "partialCount", [], "any", false, false, false, 176)), "html", null, true);
                yield "
    </div>

    ";
            } elseif ((((CoreExtension::getAttribute($this->env, $this->source,             // line 179
($context["day"] ?? null), "presentCount", [], "any", false, false, false, 179) > 0) || (CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "partialCount", [], "any", false, false, false, 179) > 0)) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "endOfDay", [], "any", false, false, false, 179), "status", [], "any", false, false, false, 179) == "absent"))) {
                // line 180
                yield "    <div class=\"absolute top-0 right-0 mt-1 mr-1 z-10 rounded-full bg-gray-600 text-white no-underline leading-tight font-sans\" style=\"padding: 1px 3px; font-size: 8px\">
        ";
                // line 181
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "presentCount", [], "any", false, false, false, 181) + CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "partialCount", [], "any", false, false, false, 181)), "html", null, true);
                yield "
    </div>

    ";
            } elseif ((((CoreExtension::getAttribute($this->env, $this->source,             // line 184
($context["day"] ?? null), "presentCount", [], "any", false, false, false, 184) > 0) || (CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "absentCount", [], "any", false, false, false, 184) > 0)) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "endOfDay", [], "any", false, false, false, 184), "status", [], "any", false, false, false, 184) == "partial"))) {
                // line 185
                yield "    <div class=\"absolute top-0 right-0 mt-1 mr-1 z-10 rounded-full bg-gray-600 text-white no-underline leading-tight font-sans\" style=\"padding: 1px 3px; font-size: 8px\">
        ";
                // line 186
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "presentCount", [], "any", false, false, false, 186) + CoreExtension::getAttribute($this->env, $this->source, ($context["day"] ?? null), "absentCount", [], "any", false, false, false, 186)), "html", null, true);
                yield "
    </div>
    ";
            }
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "components/studentHistory.twig.html";
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
        return array (  624 => 186,  621 => 185,  619 => 184,  613 => 181,  610 => 180,  608 => 179,  602 => 176,  599 => 175,  596 => 174,  584 => 173,  577 => 165,  574 => 164,  565 => 161,  560 => 160,  556 => 159,  551 => 158,  547 => 157,  542 => 156,  540 => 155,  537 => 154,  528 => 152,  520 => 149,  515 => 148,  511 => 147,  506 => 146,  501 => 145,  497 => 144,  493 => 142,  487 => 140,  485 => 139,  480 => 137,  475 => 135,  470 => 134,  458 => 133,  415 => 192,  407 => 124,  400 => 122,  393 => 120,  387 => 119,  383 => 117,  379 => 115,  365 => 113,  362 => 112,  345 => 111,  342 => 110,  340 => 109,  335 => 107,  331 => 106,  326 => 104,  322 => 102,  312 => 101,  310 => 100,  299 => 99,  293 => 96,  284 => 95,  282 => 94,  277 => 92,  268 => 91,  266 => 90,  261 => 88,  257 => 87,  248 => 86,  246 => 85,  241 => 83,  237 => 82,  228 => 81,  226 => 80,  218 => 78,  215 => 77,  211 => 76,  207 => 74,  202 => 73,  198 => 70,  189 => 67,  182 => 66,  178 => 65,  175 => 64,  166 => 61,  159 => 60,  155 => 59,  152 => 58,  147 => 54,  144 => 53,  141 => 52,  139 => 51,  133 => 48,  130 => 47,  126 => 46,  120 => 42,  114 => 39,  111 => 38,  109 => 37,  105 => 35,  97 => 32,  91 => 31,  85 => 30,  81 => 28,  75 => 25,  72 => 24,  69 => 23,  67 => 22,  61 => 19,  55 => 15,  51 => 14,  46 => 11,  44 => 12,  37 => 11,);
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

{% extends \"components/dataTable.twig.html\" %}
{% import _self as attendance  %}

{% block tableInner %}

    <div class=\"flex flex-wrap justify-center md:justify-between rounded bg-gray-100 border\">
        <div class=\"md:flex-1 p-4 text-sm text-gray-700\">
            <h3 class=\"mt-2 border-b-0\">
                {{ __('Summary') }}
            </h3>

            {% if summary.total %}
                {% if summary.total != (summary.present + summary.partial + summary.absent) %}
                    <div class=\"italic mb-4 text-xs\">
                    {{ __('It appears that this student is missing attendance data for some school days:') }}
                    </div>
                {% endif %}

                <div class=\"leading-snug\">
                    <strong>{{ __('Total number of school days to date:') }} {{ summary.total }}</strong><br/>
                    {{ __('Total number of school days attended:') }} {{ summary.present + summary.partial }}<br/>
                    {{ __('Total number of school days absent:') }} {{ summary.absent }}<br/>
                </div>
            {% endif %}
        </div>

        {% if not printView %}
        <div class=\" p-4\">
            {{ chart|raw }}
        </div>
        {% endif %}
    </div>


    <div id=\"studentHistory\">
    {% for term in dataSet %}
        <h4>
        {{ term.name }}
        </h4>

        {% set daysOfWeek = term.daysOfWeek %}
        {% set blockWidth = \"w-1/\" ~ daysOfWeek|length %}
        {% set dayClass = \"flex flex-col justify-center border-t border-b border-r py-2 px-1 -mt-px \" %}

        <div class=\"flex flex-wrap border-t border-l border-gray-500\">

            {#<!-- Days of the Week Header: only shows one week on mobile -->#}
            <div class=\"w-full flex items-stretch text-xs text-center text-gray-700 font-bold bg-gray-200 border-b border-r border-gray-500\">
                {% for dayNameShort, dayName in daysOfWeek %}
                    <div class=\"{{ blockWidth }} py-1\" title=\"{{ __(dayName) }}\">
                        {{ __(dayNameShort) }}
                    </div>
                {% endfor %}

                {% for dayNameShort, dayName in daysOfWeek %}
                    <div class=\"hidden md:block {{ blockWidth }} py-1\" title=\"{{ __(dayName) }}\">
                        {{ __(dayNameShort) }}
                    </div>
                {% endfor %}
            </div>

            {#<!-- Attendance Days: grouped by week -->#}
            {% for weekNumber, week in term.weeks %}
                <div class=\"w-full md:w-1/2 flex items-stretch text-xxs text-center text-gray-600\" style=\"min-height: 55px;\">

                {% for day in week %}
                    {% if day.outsideTerm %}
                        <div class=\"{{ blockWidth }} {{ dayClass }} bg-gray-400 border-gray-600 text-gray-500\">
                        </div>
                    {% elseif day.beforeStartDate %}
                        <div class=\"{{ blockWidth }} {{ dayClass }} bg-gray-400 border-gray-600 text-gray-500\" title=\"{{ __('Before Start Date') }}\">
                            {{ day.dateDisplay }}<br/>
                            {{ __('Before Start Date') }}
                        </div>
                    {% elseif day.afterEndDate %}
                        <div class=\"{{ blockWidth }} {{ dayClass }} bg-gray-400 border-gray-600 text-gray-500\" title=\"{{ __('After End Date') }}\">
                            {{ day.dateDisplay }}<br/>
                            {{ __('After End Date') }}
                        </div>
                    {% elseif day.specialDay %}
                        <div class=\"{{ blockWidth }} {{ dayClass }} bg-gray-400 border-gray-600 text-gray-500\" title=\"{{ __('School Closed') }}\">
                            {{ day.specialDay }}
                        </div>
                    {% elseif day.logs is empty and day.classLogs is empty %}
                        <div class=\"{{ blockWidth }} {{ dayClass }} bg-gray-200 border-gray-600 text-gray-700\" title=\"{{ __('No Data') }}\">
                            {{ day.dateDisplay }}
                        </div>
                    {% else %}
                        <a class=\"{{ blockWidth }} {{ dayClass }} {{ day.endOfDay.statusClass }} relative z-10\" data-log=\"{{ attendance.tooltip(day) }}\"
                            {% if canTakeAttendanceByPerson %}
                                href=\"{{ absoluteURL }}/index.php?q=/modules/Attendance/attendance_take_byPerson.php&gibbonPersonID={{ day.gibbonPersonID }}&currentDate={{ day.date }}\"
                            {% endif %}>

                            {{ attendance.badge(day) }}

                            <span>{{ day.dateDisplay }}</span>
                            <span class=\"mt-1 font-bold\">{{ __(day.endOfDay.type) }}</span>

                            {% if printView %}
                                <span class=\"mt-1\">
                                {% for log in day.logs %}
                                    {{ log.code }}
                                    {{- not loop.last ? \" : \" -}}
                                {% endfor %}
                                </span>
                            {% endif %}
                        </a>
                    {% endif %}
                {% endfor %}
            </div>
            {% endfor %}
        </div>
    {% endfor %}
    </div>


{% endblock tableInner %}

{#<!--
    Tooltip Macro: 
    Display a tooltip of attendance data for a single day. Should not contain \" double quotes.
-->#}
{% macro tooltip(day) %}
    <section class='-mx-2 p-4 border text-center {{ day.endOfDay.statusClass }}'>
        {{ day.dateDisplay }}<br/>
        
        <span class='font-bold text-base leading-normal'>{{ __(day.endOfDay.type) }}</span><br/>

        {% if day.endOfDay.reason %}
            <span class='mt-1 text-xs'>{{ __(day.endOfDay.reason) }}</span><br/>
        {% endif %}

        <ul class='list-none ml-0 mt-4 text-xs text-left'>
            <li class='text-xxs  font-bold'>{{ __('School Attendance') }}:</li>
            {% for log in day.logs %}
                <li class='{{ log.statusClass }} leading-relaxed'>
                    {{ log.timestampTaken|date( log.timestampTaken|date('Y-m-d') == day.date ? 'H:i' : 'H:i Y-m-d') }} -
                    {{ __(log.type) }} {{- log.reason ? ', ' ~ __(log.reason) }} - 
                    {{ log.contextName ? log.contextName : __(log.context) }}
                </li>
            {% else %}
                <li class='text-xxs'>{{ __('Not Available') }}</li>
            {% endfor %}

        {%if day.classLogs %}
            <li class='text-xxs  font-bold mt-2'>{{ __('Class Attendance') }}:</li>
            {% for log in day.classLogs %}
                <li class='{{ log.statusClass }} leading-relaxed'>
                    {{ log.timestampTaken|date( log.timestampTaken|date('Y-m-d') == day.date ? 'H:i' : 'H:i Y-m-d') }} -
                    {{ __(log.type) }} {{- log.reason ? ', ' ~ __(log.reason) }} - 
                    {{ log.contextName ? log.contextName : __(log.context) }}
                </li>
            {% endfor %}
        {% endif %}
    </section>
{% endmacro tooltip %}


{#<!--
    Badge Macro:
    Display a badge number for attendance days with partial absence / presence.
-->#}
{% macro badge(day) %}
    {% if (day.absentCount > 0 or day.partialCount > 0) and day.endOfDay.status == \"present\" %}
    <div class=\"absolute top-0 right-0 mt-1 mr-1 z-10 rounded-full bg-gray-600 text-white no-underline leading-tight font-sans\" style=\"padding: 1px 3px; font-size: 8px\">
        {{ day.absentCount + day.partialCount }}
    </div>

    {% elseif (day.presentCount > 0 or day.partialCount > 0) and day.endOfDay.status == \"absent\" %}
    <div class=\"absolute top-0 right-0 mt-1 mr-1 z-10 rounded-full bg-gray-600 text-white no-underline leading-tight font-sans\" style=\"padding: 1px 3px; font-size: 8px\">
        {{ day.presentCount + day.partialCount }}
    </div>

    {% elseif (day.presentCount > 0 or day.absentCount > 0) and day.endOfDay.status == \"partial\" %}
    <div class=\"absolute top-0 right-0 mt-1 mr-1 z-10 rounded-full bg-gray-600 text-white no-underline leading-tight font-sans\" style=\"padding: 1px 3px; font-size: 8px\">
        {{ day.presentCount + day.absentCount }}
    </div>
    {% endif %}
{% endmacro badge %}


{% block footer %}


{#<!--
    Configure a custom tooltip for Student History. This ensures it doesn't 
    conflict with existing tooltips, and also displays on mobile devices.
-->#}
<style>
    .tooltip-reset {
        background: #ffffff !important;
        min-width: 16rem;
    }
    .w-1\\/7 {
        width: 14.28%;
    }
</style>
<script>
\$('#studentHistory').tooltip({
    items: \"a[data-log]\",
    show: 800,
    hide: false,
    content: function () {
        return \$(this).data('log');
    },
    tooltipClass: \"tooltip-reset\",
    position: {
        my: \"center bottom-5\",
        at: \"center top\",
        using: function (position, feedback) {
            \$(this).css(position);
            \$(\"<div>\").
                addClass(\"arrow\").
                addClass(feedback.vertical).
                addClass(feedback.horizontal).
                appendTo(this);
        }
    }
});
</script>

{% endblock footer %}
", "components/studentHistory.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/components/studentHistory.twig.html");
    }
}
