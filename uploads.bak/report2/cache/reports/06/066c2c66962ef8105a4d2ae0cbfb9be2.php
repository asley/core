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

/* reports/yearGroupComments.twig.html */
class __TwigTemplate_e0388923ce607b9a6c8747e587cbc6de extends Template
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
        // line 11
        yield ((($context["stylesheet"] ?? null)) ? (Twig\Extension\CoreExtension::include($this->env, $context, ($context["stylesheet"] ?? null))) : (""));
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::merge(Twig\Extension\CoreExtension::merge([], ((CoreExtension::getAttribute($this->env, $this->source, ($context["yearGroupCriteria"] ?? null), "perGroup", [], "any", true, true, false, 14)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["yearGroupCriteria"] ?? null), "perGroup", [], "any", false, false, false, 14), [])) : ([]))), ((CoreExtension::getAttribute($this->env, $this->source, ($context["yearGroupCriteria"] ?? null), "perStudent", [], "any", true, true, false, 14)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["yearGroupCriteria"] ?? null), "perStudent", [], "any", false, false, false, 14), [])) : ([]))));
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
        foreach ($context['_seq'] as $context["_key"] => $context["criteria"]) {
            // line 15
            yield "<table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"0\" nobr=\"true\" style=\"padding: 0;\">
    ";
            // line 16
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "valueType", [], "any", false, false, false, 16) == "Comment")) {
                // line 17
                yield "    <tr>
        <td class=\"w-full header\" style=\"line-height:1.8;font-size: 12pt; font-weight: bold;\" colspan=\"2\">";
                // line 19
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "criteriaName", [], "any", false, false, false, 19), "html", null, true);
                // line 20
                yield "</td>
    </tr>
    <tr><td style=\"font-size: 4px;\">&nbsp;</td></tr>
    <tr>
        <td class=\"w-full\" style=\"font-size: 10pt\" colspan=\"2\">
            \"";
                // line 25
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "comment", [], "any", false, false, false, 25), "html", null, true);
                yield "\" –&nbsp;<b>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "title", [], "any", false, false, false, 25), "html", null, true);
                yield "&nbsp;";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "preferredName", [], "any", false, false, false, 25)), "html", null, true);
                yield ".&nbsp;";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "surname", [], "any", false, false, false, 25), "html", null, true);
                yield "</b>
        </td>
    </tr>
    ";
            }
            // line 29
            yield "</table>
";
            // line 30
            if ( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 30)) {
                // line 31
                yield "    <table cellspacing=\"0\" cellpadding=\"6\"><tr><td style=\"font-size: 1px;\">&nbsp;</td></tr></table>
";
            }
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['criteria'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        yield "<br/>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reports/yearGroupComments.twig.html";
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
        return array (  108 => 34,  92 => 31,  90 => 30,  87 => 29,  74 => 25,  67 => 20,  65 => 19,  62 => 17,  60 => 16,  57 => 15,  40 => 14,  38 => 11,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Comments - Year Group
category: Reporting Cycle
types: Body
icon: comment-alt.svg
sources:
    student: Student
    reportingCycle: ReportingCycle
    yearGroupCriteria: YearGroupCriteria
-->#}
{{- stylesheet ? include(stylesheet) -}}


{%- for criteria in []|merge(yearGroupCriteria.perGroup|default([]))|merge(yearGroupCriteria.perStudent|default([])) -%}
<table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"0\" nobr=\"true\" style=\"padding: 0;\">
    {% if criteria.valueType == 'Comment' %}
    <tr>
        <td class=\"w-full header\" style=\"line-height:1.8;font-size: 12pt; font-weight: bold;\" colspan=\"2\">
            {{- criteria.criteriaName -}}
        </td>
    </tr>
    <tr><td style=\"font-size: 4px;\">&nbsp;</td></tr>
    <tr>
        <td class=\"w-full\" style=\"font-size: 10pt\" colspan=\"2\">
            \"{{- criteria.comment -}}\" –&nbsp;<b>{{ criteria.title }}&nbsp;{{ criteria.preferredName|first }}.&nbsp;{{ criteria.surname }}</b>
        </td>
    </tr>
    {% endif %}
</table>
{% if not loop.last %}
    <table cellspacing=\"0\" cellpadding=\"6\"><tr><td style=\"font-size: 1px;\">&nbsp;</td></tr></table>
{% endif %}
{%- endfor -%}
<br/>
", "reports/yearGroupComments.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/reports/yearGroupComments.twig.html");
    }
}
