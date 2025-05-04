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

/* reports/reportName.twig.html */
class __TwigTemplate_eee6ff640e4cfeb83d1f9feab308c5e3 extends Template
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
        // line 18
        yield "<table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"0\">
    <tr>
        <td colspan=3 style=\"text-align:center; line-height: 1.4; font-size: ";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "textSize", [], "any", true, true, false, 20)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "textSize", [], "any", false, false, false, 20), 18)) : (18)), "html", null, true);
        yield "pt; font-weight: bold; color: #444444;\">";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["report"] ?? null), "name", [], "any", false, false, false, 21), "html", null, true);
        // line 22
        yield "</td>
    </tr>
</table>
<br/>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reports/reportName.twig.html";
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
        return array (  49 => 22,  47 => 21,  44 => 20,  40 => 18,  38 => 16,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Report Name
category: Report Info
types: Body
params:
    height: 20
sources:
    report: Report
config:
    textSize:
        label: Text Size
        type: number
        default: 18
-->#}

{{- stylesheet ? include(stylesheet) -}}

<table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"0\">
    <tr>
        <td colspan=3 style=\"text-align:center; line-height: 1.4; font-size: {{ config.textSize|default(18) }}pt; font-weight: bold; color: #444444;\">
            {{- report.name -}} 
        </td>
    </tr>
</table>
<br/>
", "reports/reportName.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/reports/reportName.twig.html");
    }
}
