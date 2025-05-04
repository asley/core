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

/* reports/studentDetails.twig.html */
class __TwigTemplate_cced26b78ca4936235193508d4e4ba15 extends Template
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
        // line 13
        yield "<table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"10\">
    <tr>
        ";
        // line 15
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "image_240", [], "any", false, false, false, 15)) {
            // line 16
            yield "        <td class=\"border-left border-top border-bottom\" style=\"width: 14%;line-height: 0;height: 33mm\"><img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["basePath"] ?? null), "html", null, true);
            yield "/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "image_240", [], "any", false, false, false, 16), "html", null, true);
            yield "\" style=\"height: 30mm\" /></td>
        ";
        }
        // line 18
        yield "        <td class=\"border-right border-top border-bottom ";
        yield ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "image_240", [], "any", false, false, false, 18))) ? ("border-left") : (""));
        yield "\" style=\"";
        yield ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "image_240", [], "any", false, false, false, 18))) ? ("width: 100%;") : ("width: 86%;"));
        yield " line-height: 1.8;\">";
        // line 19
        $__internal_compile_0 = $context;
        // line 20
        yield "<span style=\"font-size: 12pt; font-weight: bold;\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "officialName", [], "any", false, false, false, 20), "html", null, true);
        yield "</span><br/><span style=\"font-size: 9pt;\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "yearGroupName", [], "any", false, false, false, 20), "html", null, true);
        yield "</span><br/><br/><table class=\"w-full table\" cellspacing=\"0\" cellpadding=\"0\" style=\"width: 100%; font-size: 8pt\">
                    <tr>
                        <td class=\"border-right\" style=\"width: 22%\">";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["report"] ?? null), "name", [], "any", false, false, false, 22), "html", null, true);
        yield "<br/>";
        // line 23
        yield $this->env->getFunction('formatUsing')->getCallable()("dateReadable", CoreExtension::getAttribute($this->env, $this->source, ($context["report"] ?? null), "date", [], "any", false, false, false, 23));
        // line 24
        yield "</td>
                        <td style=\"width: 4mm;\"></td>
                        <td class=\"border-right\" style=\"width: 22%\">";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Form Group"), "html", null, true);
        yield "<br/>";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "formGroupName", [], "any", false, false, false, 27), "html", null, true);
        // line 28
        yield "</td>
                        <td style=\"width: 4mm;\"></td>
                        <td class=\"border-right\" style=\"width: 22%\">";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Tutor"), "html", null, true);
        yield "<br/>
                            ";
        // line 31
        $context["tutor"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), ($context["tutors"] ?? null));
        // line 32
        yield "                            ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["tutor"] ?? null), "title", [], "any", false, false, false, 32), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["tutor"] ?? null), "preferredName", [], "any", false, false, false, 32)), "html", null, true);
        yield ". ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["tutor"] ?? null), "surname", [], "any", false, false, false, 32), "html", null, true);
        yield "
                        </td>
                        <td style=\"width: 4mm;\"></td>
                        <td class=\"\" style=\"width: 22%\">";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Student ID"), "html", null, true);
        yield "<br/>";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "studentID", [], "any", false, false, false, 36), "html", null, true);
        // line 37
        yield "</td>
                        <td></td>
                    </tr>
                </table>";
        $context = $__internal_compile_0;
        // line 42
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
        return "reports/studentDetails.twig.html";
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
        return array (  116 => 42,  110 => 37,  108 => 36,  105 => 35,  94 => 32,  92 => 31,  88 => 30,  84 => 28,  82 => 27,  79 => 26,  75 => 24,  73 => 23,  70 => 22,  62 => 20,  60 => 19,  54 => 18,  46 => 16,  44 => 15,  40 => 13,  38 => 11,);
    }

    public function getSourceContext()
    {
        return new Source("", "reports/studentDetails.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/reports/studentDetails.twig.html");
    }
}
