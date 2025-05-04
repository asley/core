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

/* ui/reportingCycleHeader.twig.html */
class __TwigTemplate_705c5c681a8d1bc397c3aa793b868acc extends Template
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
        yield "<h2>
    ";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "name", [], "any", false, false, false, 11), "html", null, true);
        yield "
    <span class=\"ml-2 text-sm font-normal\">
        ";
        // line 13
        yield $this->env->getFunction('formatUsing')->getCallable()("dateRangeReadable", CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "dateStart", [], "any", false, false, false, 13), CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "dateEnd", [], "any", false, false, false, 13));
        yield "
    </span>
</h2>

";
        // line 17
        if (($context["milestones"] ?? null)) {
            // line 18
            yield "    <div class=\"flex flex-wrap rounded border bg-gray-100 mb-8\">
    ";
            // line 19
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["milestones"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["milestone"]) {
                // line 20
                yield "        ";
                $context["dateClass"] = ((($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y-m-d") > CoreExtension::getAttribute($this->env, $this->source, $context["milestone"], "milestoneDate", [], "any", false, false, false, 20))) ? ("bg-gray-400 text-gray-700") : ("text-gray-800"));
                // line 21
                yield "
        <div class=\"flex-1 flex flex-col justify-start p-4 ";
                // line 22
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["dateClass"] ?? null), "html", null, true);
                yield " ";
                yield (( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 22)) ? ("border-r") : (""));
                yield "\">
            <div class=\"text-xl text-center font-light\">";
                // line 23
                yield $this->env->getFunction('formatUsing')->getCallable()("dateReadable", CoreExtension::getAttribute($this->env, $this->source, $context["milestone"], "milestoneDate", [], "any", false, false, false, 23), 102);
                yield "</div>
            <div class=\"mt-4 text-xs text-center text-gray-600\">";
                // line 24
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["milestone"], "milestoneName", [], "any", false, false, false, 24), "html", null, true);
                yield "</div>
        </div>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['milestone'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            yield "    </div>
";
        }
        // line 29
        yield "
";
        // line 30
        if ((($context["proofsTotal"] ?? null) > 0)) {
            // line 31
            yield "    <a class=\"flex items-center rounded border bg-gray-100  -mt-4 mb-8 p-3\" href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
            yield "/index.php?q=/modules/Reports/reporting_proofread.php&gibbonPersonID=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonPersonID"] ?? null), "html", null, true);
            yield "\">

        <div class=\"text-sm text-gray-700 mr-2 mt-1\">
            ";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Proof Reading"), "html", null, true);
            yield "
        </div>

        <div class=\"flex-1\">
            ";
            // line 38
            yield Twig\Extension\CoreExtension::include($this->env, $context, "ui/writingProgress.twig.html");
            yield "
        </div>

        <img class=\"w-5 h-5 ml-2\" src=\"";
            // line 41
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
            yield "/themes/Default/img/config.png\" title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Proof Read"), "html", null, true);
            yield "\">
    </a>
";
        }
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ui/reportingCycleHeader.twig.html";
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
        return array (  139 => 41,  133 => 38,  126 => 34,  117 => 31,  115 => 30,  112 => 29,  108 => 27,  91 => 24,  87 => 23,  81 => 22,  78 => 21,  75 => 20,  58 => 19,  55 => 18,  53 => 17,  46 => 13,  41 => 11,  38 => 10,);
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
<h2>
    {{ reportingCycle.name }}
    <span class=\"ml-2 text-sm font-normal\">
        {{ formatUsing('dateRangeReadable', reportingCycle.dateStart, reportingCycle.dateEnd) }}
    </span>
</h2>

{% if milestones %}
    <div class=\"flex flex-wrap rounded border bg-gray-100 mb-8\">
    {% for milestone in milestones %}
        {% set dateClass = 'now'|date('Y-m-d') > milestone.milestoneDate ? 'bg-gray-400 text-gray-700' : 'text-gray-800' %}

        <div class=\"flex-1 flex flex-col justify-start p-4 {{ dateClass }} {{ not loop.last ? 'border-r' }}\">
            <div class=\"text-xl text-center font-light\">{{ formatUsing('dateReadable', milestone.milestoneDate, 102) }}</div>
            <div class=\"mt-4 text-xs text-center text-gray-600\">{{ milestone.milestoneName }}</div>
        </div>
    {% endfor %}
    </div>
{% endif %}

{% if proofsTotal > 0 %}
    <a class=\"flex items-center rounded border bg-gray-100  -mt-4 mb-8 p-3\" href=\"{{ absoluteURL }}/index.php?q=/modules/Reports/reporting_proofread.php&gibbonPersonID={{ gibbonPersonID }}\">

        <div class=\"text-sm text-gray-700 mr-2 mt-1\">
            {{ __(\"Proof Reading\") }}
        </div>

        <div class=\"flex-1\">
            {{ include('ui/writingProgress.twig.html') }}
        </div>

        <img class=\"w-5 h-5 ml-2\" src=\"{{ absoluteURL }}/themes/Default/img/config.png\" title=\"{{ __('Proof Read') }}\">
    </a>
{% endif %}
", "ui/reportingCycleHeader.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/ui/reportingCycleHeader.twig.html");
    }
}
