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

/* reports/misc/image.twig.html */
class __TwigTemplate_0768d90bad00e7e4b6aedf94519438f5 extends Template
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
        // line 20
        yield "
<div style=\"text-align: ";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::default(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "align", [], "any", false, false, false, 21)), ""), "html", null, true);
        yield "\">
    <img src=\"";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["basePath"] ?? null), "html", null, true);
        yield "/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "image", [], "any", true, true, false, 22)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "image", [], "any", false, false, false, 22), (("themes/" . ($context["gibbonThemeName"] ?? null)) . "/img/anonymous_125.jpg"))) : ((("themes/" . ($context["gibbonThemeName"] ?? null)) . "/img/anonymous_125.jpg"))), "html", null, true);
        yield "\" style=\"display: inline-block; height: ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "height", [], "any", true, true, false, 22)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "height", [], "any", false, false, false, 22), 30)) : (30)), "html", null, true);
        yield "mm;\" >
</div>
<br/>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reports/misc/image.twig.html";
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
        return array (  45 => 22,  41 => 21,  38 => 20,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Image
category: Miscellaneous
types: Body,Header,Footer
icon: image.svg
config:
    image:
        label: Image
        type: image
    height:
        label: Height
        type: words
        default: 30
    align:
        label: Alignment
        type: select
        options: Left, Center, Right
        default: center
-->#}

<div style=\"text-align: {{ config.align|lower|default('') }}\">
    <img src=\"{{ basePath }}/{{ config.image|default('themes/'~gibbonThemeName~'/img/anonymous_125.jpg') }}\" style=\"display: inline-block; height: {{ config.height|default(30) }}mm;\" >
</div>
<br/>
", "reports/misc/image.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/reports/misc/image.twig.html");
    }
}
