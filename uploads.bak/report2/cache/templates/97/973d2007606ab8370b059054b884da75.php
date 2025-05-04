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

/* ui/enrolmentOverview.twig.html */
class __TwigTemplate_3e08c21740524c4ad5ba3b35a187a055 extends Template
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
<div class=\"flex flex-col sm:flex-row w-full mt-4 mb-6 bg-white shadow rounded font-sans\">

    <div class=\"w-full sm:w-1/3 flex flex-wrap font-sans items-start content-end justify-between py-5 px-6 border-b sm:border-b-0 sm:border-r border-gray-300\">
        <div class=\"w-full text-sm font-light text-gray-600\">
            ";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Current Enrolment"), "html", null, true);
        yield "
        </div>
        <div class=\"text-xl font-semibold text-gray-800 leading-normal\">
            ";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["currentEnrolment"] ?? null), "html", null, true);
        yield "
        </div>
    </div>

    <div class=\"w-full sm:w-1/3 flex flex-wrap font-sans items-start content-end justify-between py-5 px-6 border-b sm:border-b-0 sm:border-r border-gray-300\">
        <div class=\"w-full text-sm font-light text-gray-600\">
            ";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("60 Days Ago"), "html", null, true);
        yield "
        </div>
        <div class=\"text-xl font-semibold text-gray-800 leading-normal\">
            ";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["lastEnrolment"] ?? null), "html", null, true);
        yield "
        </div>
        <div class=\"mt-1\">
            ";
        // line 30
        $context["change"] = (($context["currentEnrolment"] ?? null) - ($context["lastEnrolment"] ?? null));
        // line 31
        yield "            <span class=\"tag rounded-full ";
        yield (((($context["change"] ?? null) > 0)) ? ("success") : ((((($context["change"] ?? null) < 0)) ? ("error") : ("dull"))));
        yield "\">
                ";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((($context["change"] ?? null) > 0)) ? (("+" . ($context["change"] ?? null))) : ((((($context["change"] ?? null) < 0)) ? (($context["change"] ?? null)) : ($this->env->getFunction('__')->getCallable()("No Change"))))), "html", null, true);
        yield "
            </span>
        </div>
    </div>

    <div class=\"w-full sm:w-1/3 flex flex-wrap font-sans items-start content-end justify-between py-5 px-6 border-gray-300\">
        <div class=\"w-full text-sm font-light text-gray-600\">
            ";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("In 60 Days"), "html", null, true);
        yield "
        </div>
        <div class=\"text-xl font-semibold text-gray-800 leading-normal\">
            ";
        // line 42
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["nextEnrolment"] ?? null), "html", null, true);
        yield "
        </div>
        <div class=\"mt-1\">
            ";
        // line 45
        $context["change"] = (($context["nextEnrolment"] ?? null) - ($context["currentEnrolment"] ?? null));
        // line 46
        yield "            <span class=\"tag rounded-full ";
        yield (((($context["change"] ?? null) > 0)) ? ("success") : ((((($context["change"] ?? null) < 0)) ? ("error") : ("dull"))));
        yield "\">
                ";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((($context["change"] ?? null) > 0)) ? (("+" . ($context["change"] ?? null))) : ((((($context["change"] ?? null) < 0)) ? (($context["change"] ?? null)) : ($this->env->getFunction('__')->getCallable()("No Change"))))), "html", null, true);
        yield "
            </span>
        </div>
    </div>
</div>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ui/enrolmentOverview.twig.html";
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
        return array (  108 => 47,  103 => 46,  101 => 45,  95 => 42,  89 => 39,  79 => 32,  74 => 31,  72 => 30,  66 => 27,  60 => 24,  51 => 18,  45 => 15,  38 => 10,);
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

<div class=\"flex flex-col sm:flex-row w-full mt-4 mb-6 bg-white shadow rounded font-sans\">

    <div class=\"w-full sm:w-1/3 flex flex-wrap font-sans items-start content-end justify-between py-5 px-6 border-b sm:border-b-0 sm:border-r border-gray-300\">
        <div class=\"w-full text-sm font-light text-gray-600\">
            {{ __('Current Enrolment') }}
        </div>
        <div class=\"text-xl font-semibold text-gray-800 leading-normal\">
            {{ currentEnrolment }}
        </div>
    </div>

    <div class=\"w-full sm:w-1/3 flex flex-wrap font-sans items-start content-end justify-between py-5 px-6 border-b sm:border-b-0 sm:border-r border-gray-300\">
        <div class=\"w-full text-sm font-light text-gray-600\">
            {{ __('60 Days Ago') }}
        </div>
        <div class=\"text-xl font-semibold text-gray-800 leading-normal\">
            {{ lastEnrolment }}
        </div>
        <div class=\"mt-1\">
            {% set change = currentEnrolment - lastEnrolment %}
            <span class=\"tag rounded-full {{ change > 0 ? 'success' : ( change < 0 ? 'error' : 'dull' ) }}\">
                {{ change > 0 ? \"+\" ~ change : ( change < 0 ? change : __('No Change') ) }}
            </span>
        </div>
    </div>

    <div class=\"w-full sm:w-1/3 flex flex-wrap font-sans items-start content-end justify-between py-5 px-6 border-gray-300\">
        <div class=\"w-full text-sm font-light text-gray-600\">
            {{ __('In 60 Days') }}
        </div>
        <div class=\"text-xl font-semibold text-gray-800 leading-normal\">
            {{ nextEnrolment }}
        </div>
        <div class=\"mt-1\">
            {% set change = nextEnrolment - currentEnrolment  %}
            <span class=\"tag rounded-full {{ change > 0 ? 'success' : ( change < 0 ? 'error' : 'dull' ) }}\">
                {{ change > 0 ? \"+\" ~ change : ( change < 0 ? change : __('No Change') ) }}
            </span>
        </div>
    </div>
</div>
", "ui/enrolmentOverview.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/ui/enrolmentOverview.twig.html");
    }
}
