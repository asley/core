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

/* ui/writingListHeader.twig.html */
class __TwigTemplate_52f22c53e624079ef174486e78dbf246 extends Template
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
<div class=\"border rounded bg-gray-100 my-4\">
    ";
        // line 12
        if (($context["scopeDetails"] ?? null)) {
            // line 13
            yield "    <div class=\"p-4 flex flex-wrap items-center\">
        <div class=\"w-full text-center sm:text-left flex items-center justify-center\">
            <div class=\"text-sm text-gray-700 text-center leading-tight\">
                <strong>";
            // line 16
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["scopeDetails"] ?? null), "scopeName", [], "any", false, false, false, 16), "html", null, true);
            yield "</strong> - ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["scopeDetails"] ?? null), "nameShort", [], "any", false, false, false, 16), "html", null, true);
            yield " ";
            (((CoreExtension::getAttribute($this->env, $this->source, ($context["scopeDetails"] ?? null), "name", [], "any", false, false, false, 16) != CoreExtension::getAttribute($this->env, $this->source, ($context["scopeDetails"] ?? null), "nameShort", [], "any", false, false, false, 16))) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("- " . CoreExtension::getAttribute($this->env, $this->source, ($context["scopeDetails"] ?? null), "name", [], "any", false, false, false, 16)), "html", null, true)) : (yield ""));
            yield "
            </div>
        </div>
    </div>
    ";
        }
        // line 21
        yield "
    ";
        // line 22
        if ((($context["totalCount"] ?? null) > 0)) {
            // line 23
            yield "        <div class=\"p-4 ";
            yield ((($context["scopeDetails"] ?? null)) ? ("pt-0") : (""));
            yield "\">
        ";
            // line 24
            yield Twig\Extension\CoreExtension::include($this->env, $context, "ui/writingProgress.twig.html");
            yield "
        </div>
    ";
        }
        // line 27
        yield "
    ";
        // line 28
        if ((($context["relatedReports"] ?? null) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["relatedReports"] ?? null)) > 1))) {
            // line 29
            yield "        <div class=\"p-4 ";
            yield ((($context["totalCount"] ?? null)) ? ("pt-0") : (""));
            yield " text-center text-xs\">
            
            
            ";
            // line 32
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
                // line 33
                yield "                <a ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["report"], "gibbonReportingCycleID", [], "any", false, false, false, 33) == CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "gibbonReportingCycleID", [], "any", false, false, false, 33))) ? ("class=\"active\"") : (""));
                yield " href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
                yield "/index.php?q=/modules/Reports/reporting_write.php&gibbonPersonID=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "gibbonPersonID", [], "any", false, false, false, 33), "html", null, true);
                yield "&gibbonReportingCycleID=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["report"], "gibbonReportingCycleID", [], "any", false, false, false, 33), "html", null, true);
                yield "&gibbonReportingScopeID=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["report"], "gibbonReportingScopeID", [], "any", false, false, false, 33), "html", null, true);
                yield "&scopeTypeID=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "scopeTypeID", [], "any", false, false, false, 33), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["report"], "nameShort", [], "any", false, false, false, 33), "html", null, true);
                yield "</a>
                ";
                // line 34
                if ( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 34)) {
                    yield "&nbsp; |  &nbsp;";
                }
                // line 35
                yield "            ";
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
            // line 36
            yield "        </div>
    ";
        }
        // line 38
        yield "
    ";
        // line 39
        if ((($context["canWriteReport"] ?? null) == false)) {
            // line 40
            yield "    <div class=\"bg-red-200 text-red-700 border-t mt-2 p-4 text-sm\">
        <img class=\"w-6 h-6 -my-2 mr-2\" src=\"";
            // line 41
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
            yield "/themes/Default/img/key.png\" title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Read-only"), "html", null, true);
            yield "\">
        ";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("This report is read-only. You do not have access to make changes."), "html", null, true);
            yield "
    </div>
    ";
        } elseif ((        // line 44
($context["reportingEnded"] ?? null) == true)) {
            // line 45
            yield "    <div class=\"bg-gray-200 text-gray-700 border-t mt-2 p-4 text-sm\">
        <img class=\"w-6 h-6 -my-2 mr-2\" src=\"";
            // line 46
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
            yield "/themes/Default/img/planner.png\" title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Ended"), "html", null, true);
            yield "\">
        ";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("This reporting cycle has ended. You have access to edit data, however the report is read-only for most users."), "html", null, true);
            yield "
    </div>
    ";
        }
        // line 50
        yield "</div>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ui/writingListHeader.twig.html";
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
        return array (  181 => 50,  175 => 47,  169 => 46,  166 => 45,  164 => 44,  159 => 42,  153 => 41,  150 => 40,  148 => 39,  145 => 38,  141 => 36,  127 => 35,  123 => 34,  106 => 33,  89 => 32,  82 => 29,  80 => 28,  77 => 27,  71 => 24,  66 => 23,  64 => 22,  61 => 21,  49 => 16,  44 => 13,  42 => 12,  38 => 10,);
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

<div class=\"border rounded bg-gray-100 my-4\">
    {% if scopeDetails %}
    <div class=\"p-4 flex flex-wrap items-center\">
        <div class=\"w-full text-center sm:text-left flex items-center justify-center\">
            <div class=\"text-sm text-gray-700 text-center leading-tight\">
                <strong>{{ scopeDetails.scopeName }}</strong> - {{ scopeDetails.nameShort }} {{ scopeDetails.name != scopeDetails.nameShort ? \"- \"~scopeDetails.name : \"\" }}
            </div>
        </div>
    </div>
    {% endif %}

    {% if totalCount > 0 %}
        <div class=\"p-4 {{ scopeDetails ? 'pt-0' }}\">
        {{ include('ui/writingProgress.twig.html') }}
        </div>
    {% endif %}

    {% if relatedReports and relatedReports|length > 1 %}
        <div class=\"p-4 {{ totalCount ? 'pt-0' }} text-center text-xs\">
            
            
            {% for report in relatedReports %}
                <a {{ report.gibbonReportingCycleID == params.gibbonReportingCycleID ? 'class=\"active\"' }} href=\"{{ absoluteURL }}/index.php?q=/modules/Reports/reporting_write.php&gibbonPersonID={{ params.gibbonPersonID }}&gibbonReportingCycleID={{ report.gibbonReportingCycleID }}&gibbonReportingScopeID={{ report.gibbonReportingScopeID }}&scopeTypeID={{ params.scopeTypeID }}\">{{ report.nameShort }}</a>
                {% if not loop.last %}&nbsp; |  &nbsp;{% endif %}
            {% endfor %}
        </div>
    {% endif %}

    {% if canWriteReport == false %}
    <div class=\"bg-red-200 text-red-700 border-t mt-2 p-4 text-sm\">
        <img class=\"w-6 h-6 -my-2 mr-2\" src=\"{{ absoluteURL }}/themes/Default/img/key.png\" title=\"{{ __('Read-only') }}\">
        {{ __('This report is read-only. You do not have access to make changes.') }}
    </div>
    {% elseif reportingEnded == true %}
    <div class=\"bg-gray-200 text-gray-700 border-t mt-2 p-4 text-sm\">
        <img class=\"w-6 h-6 -my-2 mr-2\" src=\"{{ absoluteURL }}/themes/Default/img/planner.png\" title=\"{{ __('Ended') }}\">
        {{ __('This reporting cycle has ended. You have access to edit data, however the report is read-only for most users.') }}
    </div>
    {% endif %}
</div>
", "ui/writingListHeader.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/ui/writingListHeader.twig.html");
    }
}
