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

/* reports/footers/signatureLine.twig.html */
class __TwigTemplate_923c7a783a80a0cdb6422a776a2c8f84 extends Template
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
        yield "<table class=\"w-full table\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color:#ffffff; height: 12mm;\">
    <tr>
        <td class=\"\" style=\"width:35%; height: 12mm; line-height: 1; border-bottom: 1.2pt solid #000000;\">
            ";
        // line 35
        if (($context["isDraft"] ?? null)) {
            // line 36
            yield "                <span style=\"color: #cccccc; font-size: 22pt; font-weight: bold; line-height:1.9;\">DRAFT</span>
            ";
        } elseif (CoreExtension::getAttribute($this->env, $this->source,         // line 37
($context["config"] ?? null), "signatureImage", [], "any", false, false, false, 37)) {
            // line 38
            yield "                <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["basePath"] ?? null), "html", null, true);
            yield "/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "signatureImage", [], "any", false, false, false, 38), "html", null, true);
            yield "\" style=\"max-height: 12mm; width: auto\" width=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "signatureWidth", [], "any", true, true, false, 38)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "signatureWidth", [], "any", false, false, false, 38), "240")) : ("240")), "html", null, true);
            yield "\" height=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "signatureHeight", [], "any", true, true, false, 38)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "signatureHeight", [], "any", false, false, false, 38), "80")) : ("80")), "html", null, true);
            yield "\"/>
            ";
        }
        // line 40
        yield "        </td>
        <td style=\"width:5%;\"></td>
        <td style=\"width:25%; line-height: 3; font-size: 10pt; border-bottom: 1.2pt solid #000000; vertical-align: middle;\">";
        // line 43
        yield $this->env->getFunction('formatUsing')->getCallable()("dateReadable", CoreExtension::getAttribute($this->env, $this->source, ($context["reportingCycle"] ?? null), "dateEnd", [], "any", false, false, false, 43));
        // line 44
        yield "</td>
        <td style=\"width:35%;\"></td>
    </tr>
    <tr>
        <td class=\"\" style=\"width:35%; font-size: 9.5pt; line-height:2; vertical-align: middle;\">";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::default(Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "signatureTitle", [], "any", false, false, false, 49), "html", null, true)), "Principal"), "html", null, true);
        // line 50
        yield "</td>
        <td style=\"width:5%;\"></td>
        <td class=\"\" style=\"width:25%; font-size: 9.5pt; line-height:2; vertical-align: middle;\">";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Date"), "html", null, true);
        // line 54
        yield "</td>
        <td style=\"width:35%;\"></td>
    </tr>
</table>";
        // line 58
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "pageNumber", [], "any", false, false, false, 58) == "Y")) {
            // line 59
            yield "<table>
    <tr>
        <td style=\"color: #000; text-align:right;line-height:1.8;\">";
            // line 61
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
        return "reports/footers/signatureLine.twig.html";
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
        return array (  95 => 61,  91 => 59,  89 => 58,  84 => 54,  82 => 53,  78 => 50,  76 => 49,  70 => 44,  68 => 43,  64 => 40,  52 => 38,  50 => 37,  47 => 36,  45 => 35,  40 => 32,  38 => 31,);
    }

    public function getSourceContext()
    {
        return new Source("", "reports/footers/signatureLine.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/reports/footers/signatureLine.twig.html");
    }
}
