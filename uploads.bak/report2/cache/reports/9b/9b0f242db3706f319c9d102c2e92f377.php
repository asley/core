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

/* reports/internalAssessment.twig.html */
class __TwigTemplate_95d486fcbf2f11215a3ee700e4b754d9 extends Template
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
        // line 9
        yield ((($context["stylesheet"] ?? null)) ? (Twig\Extension\CoreExtension::include($this->env, $context, ($context["stylesheet"] ?? null))) : (""));
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["internalAssessment"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["assessment"]) {
            // line 12
            yield "
    <table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"10\" nobr=\"true\">
        <tr>
            <td class=\"header bg-primary border-top border-bottom border-left\" style=\"width:50%;\">";
            // line 16
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "courseName", [], "any", false, false, false, 16), "html", null, true);
            // line 17
            yield "</td>
            <td class=\"subheader bg-primary border-top border-bottom border-right\" style=\"width:50%;text-align:right;\">

            </td>
        </tr>
        <tr>
            <td class=\"border w-full\" colspan=\"2\"><table class=\"w-full table\" style=\"font-size: 9pt;\" cellspacing=\"0\" cellpadding=\"0\">
                ";
            // line 24
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "attainmentActive", [], "any", false, false, false, 24) == "Y")) {
                // line 25
                yield "                <tr>
                    <td style=\"width: 15%; height: 6mm; vertical-align: top; font-weight: bold;\">";
                // line 27
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Attainment"), "html", null, true);
                yield ":
                    </td>
                    <td style=\"vertical-align: top;\">";
                // line 30
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "attainmentDescriptor", [], "any", false, false, false, 30)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "attainmentDescriptor", [], "any", false, false, false, 30)) : (CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "attainmentValue", [], "any", false, false, false, 30))), "html", null, true);
                // line 31
                yield "</td>
                </tr>
                ";
            }
            // line 34
            yield "
                ";
            // line 35
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "effortActive", [], "any", false, false, false, 35) == "Y")) {
                // line 36
                yield "                <tr>
                    <td style=\"width: 15%; height: 6mm; vertical-align: top; font-weight: bold;\">";
                // line 38
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Effort"), "html", null, true);
                yield ":
                    </td>
                    <td style=\"vertical-align: top;\">";
                // line 41
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "effortDescriptor", [], "any", false, false, false, 41)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "effortDescriptor", [], "any", false, false, false, 41)) : (CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "effortValue", [], "any", false, false, false, 41))), "html", null, true);
                // line 42
                yield "</td>
                </tr>
                ";
            }
            // line 45
            yield "
                ";
            // line 46
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "commentActive", [], "any", false, false, false, 46) == "Y")) {
                // line 47
                yield "                <tr>
                    <td style=\"width: 15%; height: 6mm; vertical-align: top; font-weight: bold;\">";
                // line 49
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Comment"), "html", null, true);
                yield ":
                    </td>
                    <td style=\"vertical-align: top; width: 85%;\">";
                // line 52
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["assessment"], "comment", [], "any", false, false, false, 52), "html", null, true);
                // line 53
                yield "</td>
                </tr>
                ";
            }
            // line 56
            yield "                </table></td>
        </tr>
    </table>

    ";
            // line 60
            if ( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 60)) {
                // line 61
                yield "    <table cellspacing=\"0\" cellpadding=\"6\"><tr><td style=\"font-size: 1px;\">&nbsp;</td></tr></table>
    ";
            }
            // line 63
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['assessment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        yield "<br/>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reports/internalAssessment.twig.html";
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
        return array (  157 => 65,  142 => 63,  138 => 61,  136 => 60,  130 => 56,  125 => 53,  123 => 52,  118 => 49,  115 => 47,  113 => 46,  110 => 45,  105 => 42,  103 => 41,  98 => 38,  95 => 36,  93 => 35,  90 => 34,  85 => 31,  83 => 30,  78 => 27,  75 => 25,  73 => 24,  64 => 17,  62 => 16,  57 => 12,  40 => 11,  38 => 9,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Internal Assessment
category: Student Data
types: Body
sources:
    student: Student
    internalAssessment: InternalAssessment
-->#}
{{- stylesheet ? include(stylesheet) -}}

{% for assessment in internalAssessment %}

    <table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"10\" nobr=\"true\">
        <tr>
            <td class=\"header bg-primary border-top border-bottom border-left\" style=\"width:50%;\">
                {{- assessment.courseName -}}
            </td>
            <td class=\"subheader bg-primary border-top border-bottom border-right\" style=\"width:50%;text-align:right;\">

            </td>
        </tr>
        <tr>
            <td class=\"border w-full\" colspan=\"2\"><table class=\"w-full table\" style=\"font-size: 9pt;\" cellspacing=\"0\" cellpadding=\"0\">
                {% if assessment.attainmentActive == 'Y' %}
                <tr>
                    <td style=\"width: 15%; height: 6mm; vertical-align: top; font-weight: bold;\">
                        {{- __('Attainment') }}:
                    </td>
                    <td style=\"vertical-align: top;\">
                        {{- assessment.attainmentDescriptor ? assessment.attainmentDescriptor : assessment.attainmentValue -}}
                    </td>
                </tr>
                {% endif %}

                {% if assessment.effortActive == 'Y' %}
                <tr>
                    <td style=\"width: 15%; height: 6mm; vertical-align: top; font-weight: bold;\">
                        {{- __('Effort') }}:
                    </td>
                    <td style=\"vertical-align: top;\">
                        {{- assessment.effortDescriptor ? assessment.effortDescriptor : assessment.effortValue -}}
                    </td>
                </tr>
                {% endif %}

                {% if assessment.commentActive == 'Y' %}
                <tr>
                    <td style=\"width: 15%; height: 6mm; vertical-align: top; font-weight: bold;\">
                        {{- __('Comment') }}:
                    </td>
                    <td style=\"vertical-align: top; width: 85%;\">
                        {{- assessment.comment -}}
                    </td>
                </tr>
                {% endif %}
                </table></td>
        </tr>
    </table>

    {% if not loop.last %}
    <table cellspacing=\"0\" cellpadding=\"6\"><tr><td style=\"font-size: 1px;\">&nbsp;</td></tr></table>
    {% endif %}

{% endfor %}
<br/>
", "reports/internalAssessment.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/reports/internalAssessment.twig.html");
    }
}
