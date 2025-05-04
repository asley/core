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

/* systemOverview.twig.html */
class __TwigTemplate_558b9762b2c860d2fe105857e084f73b extends Template
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
<div class=\"flex flex-col sm:flex-row w-full mb-6 bg-white shadow rounded font-sans\">

    <div class=\"w-full sm:w-1/3 flex flex-wrap font-sans items-start content-end justify-between py-5 px-6 border-b sm:border-b-0 sm:border-r border-gray-300\">
        <div class=\"w-full text-sm font-light text-gray-600\">
            ";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Gibbon Version"), "html", null, true);
        yield "
        </div>
        <div class=\"text-xl font-semibold text-gray-800 leading-normal\">
            v";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonVersion"] ?? null), "html", null, true);
        yield "
        </div>
        <div id=\"gibbonCheck\" class=\"mt-1\">
            <span class=\"tag rounded-full ";
        // line 21
        yield ((($context["gibbonCheck"] ?? null)) ? ("success") : ("dull"));
        yield "\">
                ";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((($context["gibbonCheck"] ?? null)) ? ($this->env->getFunction('__')->getCallable()("OK")) : ($this->env->getFunction('__')->getCallable()("Checking"))), "html", null, true);
        yield "
            </span>
        </div>
    </div>

    <div class=\"w-full sm:w-1/3 flex flex-wrap font-sans items-start content-end justify-between py-5 px-6 border-b sm:border-b-0 sm:border-r border-gray-300\">
        <div class=\"w-full text-sm font-light text-gray-600\">
            ";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("PHP Version"), "html", null, true);
        yield "
        </div>
        <div class=\"text-xl font-semibold text-gray-800 leading-normal\">
            ";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["phpVersion"] ?? null), "html", null, true);
        yield "
        </div>
        <div class=\"mt-1\">
            <span class=\"tag rounded-full ";
        // line 35
        yield ((($context["phpCheck"] ?? null)) ? ("success") : ("error"));
        yield "\">
                ";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((($context["phpCheck"] ?? null)) ? ($this->env->getFunction('__')->getCallable()("OK")) : ($this->env->getFunction('__')->getCallable()("Error"))), "html", null, true);
        yield "
            </span>
        </div>
    </div>

    <div class=\"w-full sm:w-1/3 flex flex-wrap font-sans items-start content-end justify-between py-5 px-6 border-gray-300\">
        <div class=\"w-full text-sm font-light text-gray-600\">
            ";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("MySQL Version"), "html", null, true);
        yield "
        </div>
        <div class=\"text-xl font-semibold text-gray-800 leading-normal\">
            ";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["mySqlVersion"] ?? null), "html", null, true);
        yield "
        </div>
        <div class=\"mt-1\">
            <span class=\"tag rounded-full ";
        // line 49
        yield ((($context["mySqlCheck"] ?? null)) ? ("success") : ("error"));
        yield "\">
                ";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((($context["mySqlCheck"] ?? null)) ? ($this->env->getFunction('__')->getCallable()("OK")) : ($this->env->getFunction('__')->getCallable()("Error"))), "html", null, true);
        yield "
            </span>
        </div>
    </div>
</div>

";
        // line 56
        yield ($context["uploadsCheck"] ?? null);
        yield "

";
        // line 58
        yield ($context["versionCheck"] ?? null);
        yield "


";
        // line 61
        yield Twig\Extension\CoreExtension::include($this->env, $context, "ui/gettingStarted.twig.html");
        yield "
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "systemOverview.twig.html";
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
        return array (  133 => 61,  127 => 58,  122 => 56,  113 => 50,  109 => 49,  103 => 46,  97 => 43,  87 => 36,  83 => 35,  77 => 32,  71 => 29,  61 => 22,  57 => 21,  51 => 18,  45 => 15,  38 => 10,);
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

<div class=\"flex flex-col sm:flex-row w-full mb-6 bg-white shadow rounded font-sans\">

    <div class=\"w-full sm:w-1/3 flex flex-wrap font-sans items-start content-end justify-between py-5 px-6 border-b sm:border-b-0 sm:border-r border-gray-300\">
        <div class=\"w-full text-sm font-light text-gray-600\">
            {{ __('Gibbon Version') }}
        </div>
        <div class=\"text-xl font-semibold text-gray-800 leading-normal\">
            v{{ gibbonVersion }}
        </div>
        <div id=\"gibbonCheck\" class=\"mt-1\">
            <span class=\"tag rounded-full {{ gibbonCheck ? 'success' : 'dull' }}\">
                {{ gibbonCheck ? __('OK') : __('Checking') }}
            </span>
        </div>
    </div>

    <div class=\"w-full sm:w-1/3 flex flex-wrap font-sans items-start content-end justify-between py-5 px-6 border-b sm:border-b-0 sm:border-r border-gray-300\">
        <div class=\"w-full text-sm font-light text-gray-600\">
            {{ __('PHP Version') }}
        </div>
        <div class=\"text-xl font-semibold text-gray-800 leading-normal\">
            {{ phpVersion }}
        </div>
        <div class=\"mt-1\">
            <span class=\"tag rounded-full {{ phpCheck ? 'success' : 'error' }}\">
                {{ phpCheck ? __('OK') : __('Error') }}
            </span>
        </div>
    </div>

    <div class=\"w-full sm:w-1/3 flex flex-wrap font-sans items-start content-end justify-between py-5 px-6 border-gray-300\">
        <div class=\"w-full text-sm font-light text-gray-600\">
            {{ __('MySQL Version') }}
        </div>
        <div class=\"text-xl font-semibold text-gray-800 leading-normal\">
            {{ mySqlVersion }}
        </div>
        <div class=\"mt-1\">
            <span class=\"tag rounded-full {{ mySqlCheck ? 'success' : 'error' }}\">
                {{ mySqlCheck ? __('OK') : __('Error') }}
            </span>
        </div>
    </div>
</div>

{{ uploadsCheck|raw }}

{{ versionCheck|raw }}


{{ include('ui/gettingStarted.twig.html') }}
", "systemOverview.twig.html", "/Applications/MAMP/htdocs/chhs/modules/System Admin/templates/systemOverview.twig.html");
    }
}
