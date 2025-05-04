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

/* reports/footers/signatureBox.twig.html */
class __TwigTemplate_9cc8c76578be3d7f2c414685b40d41b4 extends Template
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
        // line 31
        yield ((($context["stylesheet"] ?? null)) ? (Twig\Extension\CoreExtension::include($this->env, $context, ($context["stylesheet"] ?? null))) : (""));
        // line 32
        yield "<table class=\"w-full table\" cellpadding=\"2\" cellspacing=\"0\" style=\"background-color:#ffffff; height: 12mm;\">
    <tr>
        <td class=\"footer border-left border-top border-bottom\" style=\"width:15%;font-size: 9.5pt;line-height:4.2;\">
            &nbsp; <b>";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Signature"), "html", null, true);
        yield ":</b>
        </td>
        <td class=\"border-right border-top border-bottom\" style=\"width:30%; height: 12mm; line-height: 1;\">
            ";
        // line 38
        if (($context["isDraft"] ?? null)) {
            // line 39
            yield "                <span style=\"color: #cccccc; font-size: 22px; font-weight: bold; line-height:1.9;\">DRAFT</span>
            ";
        } elseif (CoreExtension::getAttribute($this->env, $this->source,         // line 40
($context["config"] ?? null), "signatureImage", [], "any", false, false, false, 40)) {
            // line 41
            yield "                <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["basePath"] ?? null), "html", null, true);
            yield "/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "signatureImage", [], "any", false, false, false, 41), "html", null, true);
            yield "\" style=\"max-height: 12mm; width: auto\" width=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "signatureWidth", [], "any", true, true, false, 41)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "signatureWidth", [], "any", false, false, false, 41), "240")) : ("240")), "html", null, true);
            yield "\" height=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "signatureHeight", [], "any", true, true, false, 41)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "signatureHeight", [], "any", false, false, false, 41), "80")) : ("80")), "html", null, true);
            yield "\"/>
            ";
        }
        // line 43
        yield "        </td>
        <td class=\"footer border\" style=\"width:30%;font-size: 9.5pt;line-height:4.2;\">
            &nbsp; ";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "signatureTitle", [], "any", true, true, false, 45)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "signatureTitle", [], "any", false, false, false, 45), "Principal")) : ("Principal")), "html", null, true);
        yield "
        </td>
        <td class=\"footer border\" style=\"width:25%;font-size: 9.5pt;line-height:4.2;\">
            &nbsp; ";
        // line 48
        yield $this->env->getFunction('formatUsing')->getCallable()("dateReadable", CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "dateEnd", [], "any", false, false, false, 48));
        yield "
        </td>
    </tr>
</table>";
        // line 52
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "pageNumber", [], "any", false, false, false, 52) == "Y")) {
            // line 53
            yield "<table>
    <tr>
        <td style=\"color: #000; text-align:right;line-height:1.8;\">";
            // line 55
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Page"), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["pageNum"] ?? null), "html", null, true);
            yield "</td>
    </tr>
</table>";
        }
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reports/footers/signatureBox.twig.html";
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
        return array (  92 => 55,  88 => 53,  86 => 52,  80 => 48,  74 => 45,  70 => 43,  58 => 41,  56 => 40,  53 => 39,  51 => 38,  45 => 35,  40 => 32,  38 => 31,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Signature - Box
category: Headers & Footers
types: Footer
icon: signature.svg
sources:
    reportingCycle: ReportingCycle
params:
    height: 26
config:
    signatureTitle:
        label: Signature Title
        type: words
        default: Principal
    signatureImage:
        label: Signature Image
        type: image
    signatureWidth:
        label: Signature Width
        type: number
        default: 240
    signatureHeight:
        label: Signature Height
        type: number
        default: 80
    pageNumber:
        label: Page Number
        type: yesno
        default: N
-->#}
{{- stylesheet ? include(stylesheet) -}}
<table class=\"w-full table\" cellpadding=\"2\" cellspacing=\"0\" style=\"background-color:#ffffff; height: 12mm;\">
    <tr>
        <td class=\"footer border-left border-top border-bottom\" style=\"width:15%;font-size: 9.5pt;line-height:4.2;\">
            &nbsp; <b>{{ __('Signature') }}:</b>
        </td>
        <td class=\"border-right border-top border-bottom\" style=\"width:30%; height: 12mm; line-height: 1;\">
            {% if isDraft %}
                <span style=\"color: #cccccc; font-size: 22px; font-weight: bold; line-height:1.9;\">DRAFT</span>
            {% elseif config.signatureImage %}
                <img src=\"{{ basePath }}/{{ config.signatureImage }}\" style=\"max-height: 12mm; width: auto\" width=\"{{ config.signatureWidth|default('240') }}\" height=\"{{ config.signatureHeight|default('80') }}\"/>
            {% endif %}
        </td>
        <td class=\"footer border\" style=\"width:30%;font-size: 9.5pt;line-height:4.2;\">
            &nbsp; {{ config.signatureTitle|default(\"Principal\") }}
        </td>
        <td class=\"footer border\" style=\"width:25%;font-size: 9.5pt;line-height:4.2;\">
            &nbsp; {{ formatUsing('dateReadable', reportingCycle.dateEnd) }}
        </td>
    </tr>
</table>
{%- if config.pageNumber == 'Y' -%}
<table>
    <tr>
        <td style=\"color: #000; text-align:right;line-height:1.8;\">{{ __('Page') }} {{ pageNum -}}</td>
    </tr>
</table>
{%- endif -%}
", "reports/footers/signatureBox.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/reports/footers/signatureBox.twig.html");
    }
}
