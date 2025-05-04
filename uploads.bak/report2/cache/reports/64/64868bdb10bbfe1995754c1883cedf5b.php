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

/* reports/misc/space.twig.html */
class __TwigTemplate_66e6a464a96f12814f1df6dce626139d extends Template
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
        // line 13
        yield ((($context["stylesheet"] ?? null)) ? (Twig\Extension\CoreExtension::include($this->env, $context, ($context["stylesheet"] ?? null))) : (""));
        // line 15
        yield "<table class=\"w-full table\" cellpadding=\"0\" cellspacing=\"0\">
    <tr>
        <td class=\"w-full\" style=\"font-size: ";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "height", [], "any", true, true, false, 17)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "height", [], "any", false, false, false, 17), 4)) : (4)), "html", null, true);
        yield "mm;\">&nbsp;</td>
    </tr>
</table>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reports/misc/space.twig.html";
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
        return array (  44 => 17,  40 => 15,  38 => 13,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Space
category: Miscellaneous
types: Body,Header,Footer
icon: ruler-combined.svg
config:
    height:
        label: Height
        type: number
        default: 4
-->#}

{{- stylesheet ? include(stylesheet) -}}

<table class=\"w-full table\" cellpadding=\"0\" cellspacing=\"0\">
    <tr>
        <td class=\"w-full\" style=\"font-size: {{ config.height|default(4)}}mm;\">&nbsp;</td>
    </tr>
</table>
", "reports/misc/space.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/reports/misc/space.twig.html");
    }
}
