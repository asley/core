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

/* components/blankSlate.twig.html */
class __TwigTemplate_73d0b91584b41c5a174de2ba8d70d065 extends Template
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
        // line 12
        yield "
<div class=\"blankslate w-full h-full flex flex-col items-center justify-center text-gray-600 text-lg\">
    ";
        // line 14
        if (($context["isFiltered"] ?? null)) {
            // line 15
            yield "        ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("No results matched your search."), "html", null, true);
            yield "
    ";
        } elseif (        // line 16
($context["blankSlate"] ?? null)) {
            // line 17
            yield "        ";
            yield ($context["blankSlate"] ?? null);
            yield "
    ";
        } else {
            // line 19
            yield "        ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("There are no records to display."), "html", null, true);
            yield "
    ";
        }
        // line 21
        yield "</div>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "components/blankSlate.twig.html";
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
        return array (  63 => 21,  57 => 19,  51 => 17,  49 => 16,  44 => 15,  42 => 14,  38 => 12,);
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

Rich Text Editor
-->#}

<div class=\"blankslate w-full h-full flex flex-col items-center justify-center text-gray-600 text-lg\">
    {% if isFiltered %}
        {{ __('No results matched your search.') }}
    {% elseif blankSlate %}
        {{ blankSlate|raw }}
    {% else %}
        {{ __('There are no records to display.') }}
    {% endif %}
</div>
", "components/blankSlate.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/components/blankSlate.twig.html");
    }
}
