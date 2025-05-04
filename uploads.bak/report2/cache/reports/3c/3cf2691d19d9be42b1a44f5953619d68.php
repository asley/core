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

/* reports/headers/reportInfo.twig.html */
class __TwigTemplate_6034feb76110bb543cdaf61988751cba extends Template
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
        // line 16
        yield ((($context["stylesheet"] ?? null)) ? (Twig\Extension\CoreExtension::include($this->env, $context, ($context["stylesheet"] ?? null))) : (""));
        // line 17
        yield "<table class=\"w-full table\" cellspacing=\"0\">
    <tr>
        <td style=\"text-align:left;width:50%;\"><b>";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["report"] ?? null), "name", [], "any", false, false, false, 19), "html", null, true);
        yield "</b> - ";
        yield $this->env->getFunction('formatUsing')->getCallable()("dateReadable", CoreExtension::getAttribute($this->env, $this->source, ($context["report"] ?? null), "date", [], "any", false, false, false, 19));
        yield "</td>
        <td style=\"text-align:right;width:50%;\"><b>";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "officialName", [], "any", false, false, false, 20), "html", null, true);
        yield "</b>, ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "formGroupNameShort", [], "any", false, false, false, 20), "html", null, true);
        yield "</td>
    </tr>
    ";
        // line 22
        if ((((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "dividerLine", [], "any", true, true, false, 22)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "dividerLine", [], "any", false, false, false, 22), "Y")) : ("Y")) == "Y")) {
            // line 23
            yield "    <tr>
        <td colspan=\"3\" class=\"border-bottom\" style=\"font-size: 5px;\">&nbsp;</td>
    </tr>
    ";
        }
        // line 27
        yield "</table>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reports/headers/reportInfo.twig.html";
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
        return array (  65 => 27,  59 => 23,  57 => 22,  50 => 20,  44 => 19,  40 => 17,  38 => 16,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Report Info
category: Headers & Footers
types: Body,Header
sources:
    student: Student
    report: Report
params:
    height: 12
config:
    dividerLine:
        label: Divider Line
        type: yesno
        default: Y
-->#}
{{- stylesheet ? include(stylesheet) -}}
<table class=\"w-full table\" cellspacing=\"0\">
    <tr>
        <td style=\"text-align:left;width:50%;\"><b>{{- report.name -}}</b> - {{ formatUsing('dateReadable', report.date) -}}</td>
        <td style=\"text-align:right;width:50%;\"><b>{{ student.officialName }}</b>, {{ student.formGroupNameShort }}</td>
    </tr>
    {% if config.dividerLine|default('Y') == 'Y' %}
    <tr>
        <td colspan=\"3\" class=\"border-bottom\" style=\"font-size: 5px;\">&nbsp;</td>
    </tr>
    {% endif %}
</table>
", "reports/headers/reportInfo.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/reports/headers/reportInfo.twig.html");
    }
}
