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

/* reports/headers/logoCenter.twig.html */
class __TwigTemplate_95a6b326210a4fec03c06a88430a9861 extends Template
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
        return "reports/headers/logoCenter.twig.html";
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
        return new Source("", "reports/headers/logoCenter.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/reports/headers/logoCenter.twig.html");
    }
}
