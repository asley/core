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

/* reports/formGroupComments.twig.html */
class __TwigTemplate_ec53b710dbb053f155dce54f20f881ea extends Template
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
        yield ((($context["stylesheet"] ?? null)) ? (Twig\Extension\CoreExtension::include($this->env, $context, ($context["stylesheet"] ?? null))) : (""));
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::merge(Twig\Extension\CoreExtension::merge([], ((CoreExtension::getAttribute($this->env, $this->source, ($context["formGroupCriteria"] ?? null), "perGroup", [], "any", true, true, false, 12)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formGroupCriteria"] ?? null), "perGroup", [], "any", false, false, false, 12), [])) : ([]))), ((CoreExtension::getAttribute($this->env, $this->source, ($context["formGroupCriteria"] ?? null), "perStudent", [], "any", true, true, false, 12)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formGroupCriteria"] ?? null), "perStudent", [], "any", false, false, false, 12), [])) : ([]))));
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
            // line 13
            yield "<table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"0\" nobr=\"true\" style=\"padding: 0;\">
    ";
            // line 14
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "valueType", [], "any", false, false, false, 14) == "Comment")) {
                // line 15
                yield "    <tr>
        <td class=\"w-full header\" style=\"line-height:1.8;font-size: 12pt; font-weight: bold;\" colspan=\"2\">";
                // line 17
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "criteriaName", [], "any", false, false, false, 17), "html", null, true);
                // line 18
                yield "</td>
    </tr>
    <tr><td style=\"font-size: 4px;\">&nbsp;</td></tr>
    <tr>
        <td class=\"w-full\" style=\"font-size: 10pt\" colspan=\"2\">
            \"";
                // line 23
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "comment", [], "any", false, false, false, 23), "html", null, true);
                yield "\" –&nbsp;
            <b>";
                // line 25
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["tutors"] ?? null));
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
                foreach ($context['_seq'] as $context["_key"] => $context["tutor"]) {
                    // line 26
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tutor"], "title", [], "any", false, false, false, 26), "html", null, true);
                    yield "&nbsp;";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["tutor"], "preferredName", [], "any", false, false, false, 26)), "html", null, true);
                    yield ".&nbsp;";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tutor"], "surname", [], "any", false, false, false, 26), "html", null, true);
                    yield "
                ";
                    // line 27
                    yield (( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 27)) ? (", ") : (""));
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tutor'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 28
                yield "</b>
        </td>
    </tr>
    ";
            }
            // line 32
            yield "</table>
";
            // line 33
            if ( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 33)) {
                // line 34
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
        // line 37
        yield "<br/>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reports/formGroupComments.twig.html";
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
        return array (  144 => 37,  128 => 34,  126 => 33,  123 => 32,  117 => 28,  103 => 27,  95 => 26,  78 => 25,  74 => 23,  67 => 18,  65 => 17,  62 => 15,  60 => 14,  57 => 13,  40 => 12,  38 => 10,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Comments - Form Group
category: Reporting Cycle
types: Body
icon: comment-alt.svg
sources:
    tutors: Tutors
    formGroupCriteria: FormGroupCriteria
-->#}
{{- stylesheet ? include(stylesheet) -}}

{%- for criteria in []|merge(formGroupCriteria.perGroup|default([]))|merge(formGroupCriteria.perStudent|default([])) -%}
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
            \"{{- criteria.comment -}}\" –&nbsp;
            <b>
            {%- for tutor in tutors -%}
                {{ tutor.title }}&nbsp;{{ tutor.preferredName|first }}.&nbsp;{{ tutor.surname }}
                {{ not loop.last ? ', ' }}
            {%- endfor -%}</b>
        </td>
    </tr>
    {% endif %}
</table>
{% if not loop.last %}
    <table cellspacing=\"0\" cellpadding=\"6\"><tr><td style=\"font-size: 1px;\">&nbsp;</td></tr></table>
{% endif %}
{%- endfor -%}
<br/>
", "reports/formGroupComments.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/reports/formGroupComments.twig.html");
    }
}
