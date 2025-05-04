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

/* ui/writingProgress.twig.html */
class __TwigTemplate_0145c0767b66fbfa6b917a220fc0b170 extends Template
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
";
        // line 11
        if ((($context["totalCount"] ?? null) > 0)) {
            // line 12
            yield "<div class=\"flex items-center\">
    ";
            // line 13
            $context["percent"] = Twig\Extension\CoreExtension::round(((($context["progressCount"] ?? null) / ($context["totalCount"] ?? null)) * 100));
            // line 14
            yield "    ";
            $context["colour"] = ((array_key_exists("progressColour", $context)) ? (Twig\Extension\CoreExtension::default(($context["progressColour"] ?? null), "purple")) : ("purple"));
            // line 15
            yield "
    <div class=\"";
            // line 16
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("width", $context)) ? (Twig\Extension\CoreExtension::default(($context["width"] ?? null), "flex-1")) : ("flex-1")), "html", null, true);
            yield " h-6 border bg-gray-100 border-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["colour"] ?? null), "html", null, true);
            yield "-600 flex\" title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["percent"] ?? null), "html", null, true);
            yield "% ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((($context["progressName"] ?? null)) ? (($context["progressName"] ?? null)) : ($this->env->getFunction('__')->getCallable()("Complete"))), "html", null, true);
            yield "\">
        <div class=\"bg-";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["colour"] ?? null), "html", null, true);
            yield "-";
            yield (((($context["colour"] ?? null) == "purple")) ? ("400") : ("300"));
            yield " h-full\" style=\"width: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["percent"] ?? null), "html", null, true);
            yield "%\"></div>

        ";
            // line 19
            if ((($context["partialCount"] ?? null) > 0)) {
                // line 20
                yield "            ";
                $context["percent"] = Twig\Extension\CoreExtension::round(((($context["partialCount"] ?? null) / ($context["totalCount"] ?? null)) * 100));
                // line 21
                yield "            ";
                $context["colour"] = ((array_key_exists("partialColour", $context)) ? (Twig\Extension\CoreExtension::default(($context["partialColour"] ?? null), "gray")) : ("gray"));
                // line 22
                yield "            <div class=\"bg-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["colour"] ?? null), "html", null, true);
                yield "-300 h-full\" style=\"width: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["percent"] ?? null), "html", null, true);
                yield "%\" title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["percent"] ?? null), "html", null, true);
                yield "% ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Pending"), "html", null, true);
                yield "\"></div>
        ";
            }
            // line 24
            yield "    </div>

    <span class=\"ml-2 text-xxs text-gray-600\" title=\"";
            // line 26
            (((($context["leftCount"] ?? null) > 0)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Progress count includes students who have left."), "html", null, true)) : (yield ""));
            yield "\">
        ";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["progressCount"] ?? null), "html", null, true);
            yield "/";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["totalCount"] ?? null), "html", null, true);
            yield " 

        ";
            // line 29
            if ((($context["leftCount"] ?? null) > 0)) {
                yield "<br/><span class=\"text-red-700 font-bold\" style=\"font-size: 80%\">(+";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["leftCount"] ?? null), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Left"), "html", null, true);
                yield ")</span>";
            }
            // line 30
            yield "    </span>
</div>
";
        }
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ui/writingProgress.twig.html";
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
        return array (  116 => 30,  108 => 29,  101 => 27,  97 => 26,  93 => 24,  81 => 22,  78 => 21,  75 => 20,  73 => 19,  64 => 17,  54 => 16,  51 => 15,  48 => 14,  46 => 13,  43 => 12,  41 => 11,  38 => 10,);
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

{% if totalCount > 0 %}
<div class=\"flex items-center\">
    {% set percent = ((progressCount / totalCount) * 100)|round %}
    {% set colour = progressColour|default('purple') %}

    <div class=\"{{ width|default('flex-1') }} h-6 border bg-gray-100 border-{{ colour }}-600 flex\" title=\"{{ percent }}% {{ progressName ? progressName : __('Complete') }}\">
        <div class=\"bg-{{ colour }}-{{ colour == 'purple' ? '400' : '300' }} h-full\" style=\"width: {{ percent }}%\"></div>

        {% if partialCount > 0 %}
            {% set percent = ((partialCount / totalCount) * 100)|round %}
            {% set colour = partialColour|default('gray') %}
            <div class=\"bg-{{ colour }}-300 h-full\" style=\"width: {{ percent }}%\" title=\"{{ percent }}% {{ __('Pending')}}\"></div>
        {% endif %}
    </div>

    <span class=\"ml-2 text-xxs text-gray-600\" title=\"{{ leftCount > 0 ? __('Progress count includes students who have left.') }}\">
        {{ progressCount }}/{{ totalCount }} 

        {% if leftCount > 0 %}<br/><span class=\"text-red-700 font-bold\" style=\"font-size: 80%\">(+{{ leftCount }} {{ __('Left') }})</span>{% endif %}
    </span>
</div>
{% endif %}
", "ui/writingProgress.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/ui/writingProgress.twig.html");
    }
}
