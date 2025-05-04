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

/* fullscreen.twig.html */
class __TwigTemplate_b83fe24d3e35677333706b69cfccc83a extends Template
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
        yield "<!DOCTYPE html>
<html>
    <head>
        ";
        // line 13
        yield from         $this->loadTemplate("head.twig.html", "fullscreen.twig.html", 13)->unwrap()->yieldBlock("meta", $context);
        yield "
        ";
        // line 14
        yield from         $this->loadTemplate("head.twig.html", "fullscreen.twig.html", 14)->unwrap()->yieldBlock("styles", $context);
        yield "
    </head>
    <body style='background-image: none'>

        ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "alerts", [], "any", false, false, false, 18));
        foreach ($context['_seq'] as $context["type"] => $context["alerts"]) {
            // line 19
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["alerts"]);
            foreach ($context['_seq'] as $context["_key"] => $context["text"]) {
                // line 20
                yield "                <div class=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["type"], "html", null, true);
                yield "\">";
                yield $context["text"];
                yield "</div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['text'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            yield "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['alerts'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        yield "
        ";
        // line 24
        yield Twig\Extension\CoreExtension::join(($context["content"] ?? null), "
");
        yield "
    </body>
</html>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "fullscreen.twig.html";
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
        return array (  83 => 24,  80 => 23,  74 => 22,  63 => 20,  58 => 19,  54 => 18,  47 => 14,  43 => 13,  38 => 10,);
    }

    public function getSourceContext()
    {
        return new Source("", "fullscreen.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/fullscreen.twig.html");
    }
}
