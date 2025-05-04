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

/* ui/upcomingDeadlines.twig.html */
class __TwigTemplate_24f970be063ac0da0bbdd8496c5e48e9 extends Template
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
";
        // line 11
        if (($context["heading"] ?? null)) {
            // line 12
            yield "<";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["heading"] ?? null), "html", null, true);
            yield ">
    ";
            // line 13
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Upcoming Due Dates"), "html", null, true);
            yield "
</";
            // line 14
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["heading"] ?? null), "html", null, true);
            yield ">
";
        }
        // line 16
        yield "
";
        // line 17
        if (($context["deadlines"] ?? null)) {
            // line 18
            yield "
    <ol class=\"ml-6\">
    ";
            // line 20
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["deadlines"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["deadline"]) {
                // line 21
                yield "        ";
                $context["difference"] = CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Twig\Extension\CoreExtension']->convertDate(CoreExtension::getAttribute($this->env, $this->source, $context["deadline"], "homeworkDueDateTime", [], "any", false, false, false, 21)), "diff", [$this->extensions['Twig\Extension\CoreExtension']->convertDate()], "method", false, false, false, 21);
                // line 22
                yield "
        ";
                // line 23
                if (((CoreExtension::getAttribute($this->env, $this->source, $context["deadline"], "homeworkComplete", [], "any", false, false, false, 23) == "Y") || (CoreExtension::getAttribute($this->env, $this->source, $context["deadline"], "onlineSubmission", [], "any", false, false, false, 23) == "Y"))) {
                    // line 24
                    yield "            ";
                    $context["class"] = "success border-r-8";
                    // line 25
                    yield "            ";
                    $context["tag"] = (("<span class='tag success border border-green-300 ml-2'>" . $this->env->getFunction('__')->getCallable()("Complete")) . "</span>");
                    // line 26
                    yield "        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, ($context["difference"] ?? null), "days", [], "any", false, false, false, 26) <= 0)) {
                    // line 27
                    yield "            ";
                    $context["class"] = "error border-r-8";
                    // line 28
                    yield "            ";
                    $context["tag"] = (("<span class='tag error border border-red-300 ml-2'>" . $this->env->getFunction('__')->getCallable()("Due Soon")) . "</span>");
                    // line 29
                    yield "        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, ($context["difference"] ?? null), "days", [], "any", false, false, false, 29) <= 2)) {
                    // line 30
                    yield "            ";
                    $context["class"] = "warning border-r-8";
                    // line 31
                    yield "            ";
                    $context["tag"] = (("<span class='tag warning border border-red-300 ml-2'>" . $this->env->getFunction('__')->getCallable()("Due Soon")) . "</span>");
                    // line 32
                    yield "        ";
                } else {
                    // line 33
                    yield "            ";
                    $context["class"] = "text-gray-800";
                    // line 34
                    yield "            ";
                    $context["tag"] = "";
                    // line 35
                    yield "        ";
                }
                // line 36
                yield "
        <li>
            <a class=\"";
                // line 38
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["class"] ?? null), "html", null, true);
                yield " block p-2\" href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
                yield "/index.php?q=/modules/Planner/planner_view_full.php&search=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonPersonID"] ?? null), "html", null, true);
                yield "&gibbonPlannerEntryID=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["deadline"], "gibbonPlannerEntryID", [], "any", false, false, false, 38), "html", null, true);
                yield "&viewBy=";
                (((array_key_exists("viewBy", $context) &&  !(null === ($context["viewBy"] ?? null)))) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["viewBy"] ?? null), "html", null, true)) : (yield "date"));
                yield "&gibbonCourseClassID=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["deadline"], "gibbonCourseClassID", [], "any", false, false, false, 38), "html", null, true);
                yield "&date=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["deadline"], "date", [], "any", false, false, false, 38), "html", null, true);
                yield "\">
                <span class=\"font-bold\">
                    ";
                // line 40
                yield $this->env->getFunction('formatUsing')->getCallable()("courseClassName", CoreExtension::getAttribute($this->env, $this->source, $context["deadline"], "course", [], "any", false, false, false, 40), CoreExtension::getAttribute($this->env, $this->source, $context["deadline"], "class", [], "any", false, false, false, 40));
                yield "
                    ";
                // line 41
                (( !($context["hideLessonName"] ?? null)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((" - " . CoreExtension::getAttribute($this->env, $this->source, $context["deadline"], "name", [], "any", false, false, false, 41)), "html", null, true)) : (yield ""));
                yield "
                </span><br/>

                <span class=\"text-xs italic opacity-75\">
                    ";
                // line 45
                yield $this->env->getFunction('__')->getCallable()("Due at {time} on {date}", ["time" => $this->env->getFunction('formatUsing')->getCallable()("time", CoreExtension::getAttribute($this->env, $this->source, $context["deadline"], "homeworkDueDateTime", [], "any", false, false, false, 45)), "date" => $this->env->getFunction('formatUsing')->getCallable()("date", CoreExtension::getAttribute($this->env, $this->source, $context["deadline"], "homeworkDueDateTime", [], "any", false, false, false, 45))]);
                yield " 

                    ";
                // line 47
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["deadline"], "type", [], "any", false, false, false, 47) == "studentRecorded")) {
                    // line 48
                    yield "                        • ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Student Recorded"), "html", null, true);
                    yield "
                    ";
                }
                // line 50
                yield "
                    ";
                // line 51
                yield ($context["tag"] ?? null);
                yield "
                </span>
            </a>
        </li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['deadline'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 56
            yield "    </ol>

";
        } else {
            // line 59
            yield "    ";
            yield $this->env->getFunction('formatUsing')->getCallable()("alert", $this->env->getFunction('__')->getCallable()("No upcoming due dates!"), "success");
            yield "
";
        }
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ui/upcomingDeadlines.twig.html";
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
        return array (  178 => 59,  173 => 56,  162 => 51,  159 => 50,  153 => 48,  151 => 47,  146 => 45,  139 => 41,  135 => 40,  118 => 38,  114 => 36,  111 => 35,  108 => 34,  105 => 33,  102 => 32,  99 => 31,  96 => 30,  93 => 29,  90 => 28,  87 => 27,  84 => 26,  81 => 25,  78 => 24,  76 => 23,  73 => 22,  70 => 21,  66 => 20,  62 => 18,  60 => 17,  57 => 16,  52 => 14,  48 => 13,  43 => 12,  41 => 11,  38 => 10,);
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

{% if heading %}
<{{ heading }}>
    {{ __('Upcoming Due Dates') }}
</{{ heading }}>
{% endif %}

{% if deadlines %}

    <ol class=\"ml-6\">
    {% for deadline in deadlines %}
        {% set difference = date(deadline.homeworkDueDateTime).diff(date()) %}

        {% if deadline.homeworkComplete == 'Y' or deadline.onlineSubmission == 'Y' %}
            {% set class = \"success border-r-8\" %}
            {% set tag = \"<span class='tag success border border-green-300 ml-2'>\" ~  __('Complete')  ~ \"</span>\" %}
        {% elseif difference.days <= 0 %}
            {% set class = \"error border-r-8\" %}
            {% set tag = \"<span class='tag error border border-red-300 ml-2'>\" ~  __('Due Soon')  ~ \"</span>\" %}
        {% elseif difference.days <= 2 %}
            {% set class = \"warning border-r-8\" %}
            {% set tag = \"<span class='tag warning border border-red-300 ml-2'>\" ~  __('Due Soon')  ~ \"</span>\" %}
        {% else %}
            {% set class = \"text-gray-800\" %}
            {% set tag = \"\" %}
        {% endif %}

        <li>
            <a class=\"{{ class }} block p-2\" href=\"{{ absoluteURL}}/index.php?q=/modules/Planner/planner_view_full.php&search={{ gibbonPersonID }}&gibbonPlannerEntryID={{ deadline.gibbonPlannerEntryID }}&viewBy={{ viewBy ?? 'date' }}&gibbonCourseClassID={{  deadline.gibbonCourseClassID }}&date={{ deadline.date }}\">
                <span class=\"font-bold\">
                    {{ formatUsing('courseClassName', deadline.course, deadline.class) }}
                    {{ not hideLessonName ? ' - ' ~ deadline.name : '' }}
                </span><br/>

                <span class=\"text-xs italic opacity-75\">
                    {{ __('Due at {time} on {date}', {'time': formatUsing('time', deadline.homeworkDueDateTime), 'date': formatUsing('date', deadline.homeworkDueDateTime) })|raw }} 

                    {% if deadline.type == 'studentRecorded' %}
                        • {{ __('Student Recorded') }}
                    {% endif %}

                    {{ tag|raw }}
                </span>
            </a>
        </li>
    {% endfor %}
    </ol>

{% else %}
    {{ formatUsing('alert', __('No upcoming due dates!'), 'success') }}
{% endif %}
", "ui/upcomingDeadlines.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/ui/upcomingDeadlines.twig.html");
    }
}
