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

/* ui/reportingStudentFooter.twig.html */
class __TwigTemplate_a4fd8a1f24e0e2e049576306ce5e4743 extends Template
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
        yield "
<div class=\"flex my-4 items-stretch\">
    <a class=\"block w-32 p-2 items-center rounded-l border bg-gray-100 text-gray-600 hover:bg-blue-200 hover:border-blue-700 hover:text-blue-800\" href=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/index.php?q=/modules/Reports/reporting_write_byStudent.php&gibbonReportingCycleID=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "gibbonReportingCycleID", [], "any", false, false, false, 12), "html", null, true);
        yield "&gibbonReportingScopeID=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "gibbonReportingScopeID", [], "any", false, false, false, 12), "html", null, true);
        yield "&scopeTypeID=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "scopeTypeID", [], "any", false, false, false, 12), "html", null, true);
        yield "&gibbonPersonID=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "gibbonPersonID", [], "any", false, false, false, 12), "html", null, true);
        yield "&gibbonPersonIDStudent=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["prevStudent"] ?? null), "gibbonPersonID", [], "any", false, false, false, 12), "html", null, true);
        yield "\">
        <img class=\"inline-block  mr-2 w-4 h-4 align-top\" title=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Prev"), "html", null, true);
        yield "\" src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/themes/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonThemeName"] ?? null), "html", null, true);
        yield "/img/page_left.png\" >
        <span class=\"inline-block px-1  text-sm leading-tight\">
            ";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Prev"), "html", null, true);
        yield "
        </span>
    </a>

    <a class=\"flex-1 flex items-center justify-center border-t border-b bg-gray-100 text-gray-600 hover:bg-blue-200 hover:border-blue-700 hover:text-blue-800\"  href=\"#\">
        <img class=\"inline-block mr-2 w-4 h-4 align-top\" title=\"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Prev"), "html", null, true);
        yield "\" src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/themes/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonThemeName"] ?? null), "html", null, true);
        yield "/img/upload.png\" >
        <span class=\"inline-block text-sm text-center leading-tight\">
                ";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Top"), "html", null, true);
        yield " 
        </span>
    </a>

    <a class=\"block w-32 p-2 items-center rounded-r border bg-gray-100 text-gray-600 text-right hover:bg-blue-200 hover:border-blue-700 hover:text-blue-800\" href=\"";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/index.php?q=/modules/Reports/reporting_write_byStudent.php&gibbonReportingCycleID=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "gibbonReportingCycleID", [], "any", false, false, false, 26), "html", null, true);
        yield "&gibbonReportingScopeID=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "gibbonReportingScopeID", [], "any", false, false, false, 26), "html", null, true);
        yield "&scopeTypeID=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "scopeTypeID", [], "any", false, false, false, 26), "html", null, true);
        yield "&gibbonPersonID=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["params"] ?? null), "gibbonPersonID", [], "any", false, false, false, 26), "html", null, true);
        yield "&gibbonPersonIDStudent=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["nextStudent"] ?? null), "gibbonPersonID", [], "any", false, false, false, 26), "html", null, true);
        yield "\">
        
        <span class=\"inline-block px-1  text-sm leading-tight\">
            ";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Next"), "html", null, true);
        yield " 
        </span>
        <img class=\"inline-block  ml-2 w-4 h-4 align-top\" title=\"";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Next"), "html", null, true);
        yield "\" src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/themes/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonThemeName"] ?? null), "html", null, true);
        yield "/img/page_right.png\" >
    </a>
</div>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ui/reportingStudentFooter.twig.html";
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
        return array (  110 => 31,  105 => 29,  89 => 26,  82 => 22,  73 => 20,  65 => 15,  56 => 13,  42 => 12,  38 => 10,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
Gibbon: the flexible, open school platform
Founded by Ross Parker at ICHK Secondary. Built by Ross Parker, Sandra Kuipers and the Gibbon community (https://gibbonedu.org/about/)
Copyright © 2010, Gibbon Foundation
Gibbon™, Gibbon Education Ltd. (Hong Kong)

This is a Gibbon template file, written in HTML and Twig syntax.
For info about editing, see: https://twig.symfony.com/doc/2.x/
-->#}

<div class=\"flex my-4 items-stretch\">
    <a class=\"block w-32 p-2 items-center rounded-l border bg-gray-100 text-gray-600 hover:bg-blue-200 hover:border-blue-700 hover:text-blue-800\" href=\"{{ absoluteURL }}/index.php?q=/modules/Reports/reporting_write_byStudent.php&gibbonReportingCycleID={{ params.gibbonReportingCycleID }}&gibbonReportingScopeID={{ params.gibbonReportingScopeID }}&scopeTypeID={{ params.scopeTypeID }}&gibbonPersonID={{ params.gibbonPersonID }}&gibbonPersonIDStudent={{ prevStudent.gibbonPersonID }}\">
        <img class=\"inline-block  mr-2 w-4 h-4 align-top\" title=\"{{ __('Prev') }}\" src=\"{{ absoluteURL }}/themes/{{ gibbonThemeName }}/img/page_left.png\" >
        <span class=\"inline-block px-1  text-sm leading-tight\">
            {{ __('Prev') }}
        </span>
    </a>

    <a class=\"flex-1 flex items-center justify-center border-t border-b bg-gray-100 text-gray-600 hover:bg-blue-200 hover:border-blue-700 hover:text-blue-800\"  href=\"#\">
        <img class=\"inline-block mr-2 w-4 h-4 align-top\" title=\"{{ __('Prev') }}\" src=\"{{ absoluteURL }}/themes/{{ gibbonThemeName }}/img/upload.png\" >
        <span class=\"inline-block text-sm text-center leading-tight\">
                {{ __('Top') }} 
        </span>
    </a>

    <a class=\"block w-32 p-2 items-center rounded-r border bg-gray-100 text-gray-600 text-right hover:bg-blue-200 hover:border-blue-700 hover:text-blue-800\" href=\"{{ absoluteURL }}/index.php?q=/modules/Reports/reporting_write_byStudent.php&gibbonReportingCycleID={{ params.gibbonReportingCycleID }}&gibbonReportingScopeID={{ params.gibbonReportingScopeID }}&scopeTypeID={{ params.scopeTypeID }}&gibbonPersonID={{ params.gibbonPersonID }}&gibbonPersonIDStudent={{ nextStudent.gibbonPersonID }}\">
        
        <span class=\"inline-block px-1  text-sm leading-tight\">
            {{ __('Next') }} 
        </span>
        <img class=\"inline-block  ml-2 w-4 h-4 align-top\" title=\"{{ __('Next') }}\" src=\"{{ absoluteURL }}/themes/{{ gibbonThemeName }}/img/page_right.png\" >
    </a>
</div>
", "ui/reportingStudentFooter.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/ui/reportingStudentFooter.twig.html");
    }
}
