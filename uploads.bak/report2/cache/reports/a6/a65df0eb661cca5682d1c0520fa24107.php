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

/* headers/CHHS_LogoCenter.twig.html */
class __TwigTemplate_f03edc784fbe20e6ab949facdc428498 extends Template
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
        // line 41
        yield ((($context["stylesheet"] ?? null)) ? (Twig\Extension\CoreExtension::include($this->env, $context, ($context["stylesheet"] ?? null))) : (""));
        // line 42
        yield "<table class=\"w-full table\" cellspacing=\"0\">
    <tr>
        <td style=\"width:40%;text-align:left;font-size:8pt;\">";
        // line 45
        if (( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "headingLeft", [], "any", false, false, false, 45)) ||  !CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "headingLeft", [], "any", true, true, false, 45))) {
            // line 46
            yield "                <b>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "headingLeft", [], "any", true, true, false, 46)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "headingLeft", [], "any", false, false, false, 46), CoreExtension::getAttribute($this->env, $this->source, ($context["school"] ?? null), "organisationName", [], "any", false, false, false, 46))) : (CoreExtension::getAttribute($this->env, $this->source, ($context["school"] ?? null), "organisationName", [], "any", false, false, false, 46))), "html", null, true);
            yield "</b><br/>
            ";
        }
        // line 49
        if (( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "textLeft", [], "any", false, false, false, 49)) ||  !CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "textLeft", [], "any", true, true, false, 49))) {
            // line 50
            yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "textLeft", [], "any", true, true, false, 50)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "textLeft", [], "any", false, false, false, 50), CoreExtension::getAttribute($this->env, $this->source, ($context["school"] ?? null), "address", [], "any", false, false, false, 50))) : (CoreExtension::getAttribute($this->env, $this->source, ($context["school"] ?? null), "address", [], "any", false, false, false, 50))), "html", null, true));
            yield "<br/>
            ";
        }
        // line 52
        yield "        </td>
        <td style=\"width:20%;text-align:center;font-size:8pt;\">
            <img src=\"";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["basePath"] ?? null), "html", null, true);
        yield "/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "logo", [], "any", true, true, false, 54)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "logo", [], "any", false, false, false, 54), (("themes/" . ($context["gibbonThemeName"] ?? null)) . "/img/anonymous_125.jpg"))) : ((("themes/" . ($context["gibbonThemeName"] ?? null)) . "/img/anonymous_125.jpg"))), "html", null, true);
        yield "\" style=\"display: inline-block; height: ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "logoHeight", [], "any", true, true, false, 54)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "logoHeight", [], "any", false, false, false, 54), 18)) : (18)), "html", null, true);
        yield "mm;\" >
        </td>
        <td style=\"width:40%;text-align:right;font-size:8pt;\">";
        // line 57
        if (( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "headingRight", [], "any", false, false, false, 57)) ||  !CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "headingRight", [], "any", true, true, false, 57))) {
            // line 58
            yield "                <b>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "headingRight", [], "any", true, true, false, 58)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "headingRight", [], "any", false, false, false, 58), CoreExtension::getAttribute($this->env, $this->source, ($context["report"] ?? null), "name", [], "any", false, false, false, 58))) : (CoreExtension::getAttribute($this->env, $this->source, ($context["report"] ?? null), "name", [], "any", false, false, false, 58))), "html", null, true);
            yield "</b><br/>
            ";
        }
        // line 61
        if (( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "textRight", [], "any", false, false, false, 61)) ||  !CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "textRight", [], "any", true, true, false, 61))) {
            // line 62
            yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "textRight", [], "any", true, true, false, 62)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "textRight", [], "any", false, false, false, 62), CoreExtension::getAttribute($this->env, $this->source, ($context["report"] ?? null), "date", [], "any", false, false, false, 62))) : (CoreExtension::getAttribute($this->env, $this->source, ($context["report"] ?? null), "date", [], "any", false, false, false, 62))), "html", null, true));
            yield "<br/>
            ";
        }
        // line 64
        yield "        </td>
    </tr>
    ";
        // line 66
        if ((((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "dividerLine", [], "any", true, true, false, 66)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "dividerLine", [], "any", false, false, false, 66), "Y")) : ("Y")) == "Y")) {
            // line 67
            yield "    <tr>
        <td colspan=\"3\" class=\"divider-line\" style=\"font-size: 5px;\">&nbsp;</td>
    </tr>
    ";
        }
        // line 71
        yield "</table>
    ";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "headers/CHHS_LogoCenter.twig.html";
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
        return array (  99 => 71,  93 => 67,  91 => 66,  87 => 64,  82 => 62,  80 => 61,  74 => 58,  72 => 57,  63 => 54,  59 => 52,  54 => 50,  52 => 49,  46 => 46,  44 => 45,  40 => 42,  38 => 41,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Logo - Center
category: Report Info
types: Body,Header
icon: align-center.svg
sources:
    school: School
    report: Report
params:
    height: 30
config:
    headingLeft:
        label: Left Heading
        type: words
        default:
    textLeft:
        label: Left Text
        type: text
        default:
    headingRight:
        label: Right Heading
        type: words
        default:
    textRight:
        label: Right Text
        type: text
        default:
    logo:
        label: Logo
        type: image
    logoHeight:
        label: Logo Height
        type: number
        default: 18
    dividerLine:
        label: Divider Line
        type: yesno
        default: Y
-->#}

{{- stylesheet ? include(stylesheet) -}}
<table class=\"w-full table\" cellspacing=\"0\">
    <tr>
        <td style=\"width:40%;text-align:left;font-size:8pt;\">
            {%- if config.headingLeft is not empty or config.headingLeft is not defined %}
                <b>{{- config.headingLeft|default(school.organisationName) -}}</b><br/>
            {% endif %}

            {%- if config.textLeft is not empty or config.textLeft is not defined %}
                {{- config.textLeft|default(school.address)|nl2br -}}<br/>
            {% endif %}
        </td>
        <td style=\"width:20%;text-align:center;font-size:8pt;\">
            <img src=\"{{ basePath }}/{{ config.logo|default('themes/'~gibbonThemeName~'/img/anonymous_125.jpg') }}\" style=\"display: inline-block; height: {{ config.logoHeight|default(18) }}mm;\" >
        </td>
        <td style=\"width:40%;text-align:right;font-size:8pt;\">
            {%- if config.headingRight is not empty or config.headingRight is not defined %}
                <b>{{- config.headingRight|default(report.name) -}}</b><br/>
            {% endif %}

            {%- if config.textRight is not empty or config.textRight is not defined %}
                {{- config.textRight|default(report.date)|nl2br -}}<br/>
            {% endif %}
        </td>
    </tr>
    {% if config.dividerLine|default('Y') == 'Y' %}
    <tr>
        <td colspan=\"3\" class=\"divider-line\" style=\"font-size: 5px;\">&nbsp;</td>
    </tr>
    {% endif %}
</table>
    ", "headers/CHHS_LogoCenter.twig.html", "/Applications/MAMP/htdocs/chhs/uploads/reports/templates/headers/CHHS_LogoCenter.twig.html");
    }
}
