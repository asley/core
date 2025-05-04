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
class __TwigTemplate_17154f9a48022d20c9fe050d94d1d376 extends Template
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
        return new Source("", "components/blankSlate.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/components/blankSlate.twig.html");
    }
}
