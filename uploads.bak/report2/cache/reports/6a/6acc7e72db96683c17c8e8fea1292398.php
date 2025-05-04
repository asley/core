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

/* reports/misc/textRich.twig.html */
class __TwigTemplate_6e8be5f0453f2d445a86e1b0e74c37f0 extends Template
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
        // line 13
        yield ((($context["stylesheet"] ?? null)) ? (Twig\Extension\CoreExtension::include($this->env, $context, ($context["stylesheet"] ?? null))) : (""));
        // line 15
        yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "text", [], "any", true, true, false, 15)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["config"] ?? null), "text", [], "any", false, false, false, 15), "<table cellpadding=\"8\" cellspacing=\"0\" style=\"width: 100%; height: 77px; border: 1px solid #666666; border-color: #666666;\"><tbody><tr><td style=\"width: 33%; vertical-align: top;\"><b style=\"color: red;\">This is an example of</b><br/>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td><td style=\"width: 33%; vertical-align: top;\"><b style=\"color: blue;\">Rich text and HTML</b><br/>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td><td style=\"width: 33%; vertical-align: top;\"><b style=\"color: green;\">In a three column layout</b><br/>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td></tr></tbody></table>")) : ("<table cellpadding=\"8\" cellspacing=\"0\" style=\"width: 100%; height: 77px; border: 1px solid #666666; border-color: #666666;\"><tbody><tr><td style=\"width: 33%; vertical-align: top;\"><b style=\"color: red;\">This is an example of</b><br/>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</td><td style=\"width: 33%; vertical-align: top;\"><b style=\"color: blue;\">Rich text and HTML</b><br/>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td><td style=\"width: 33%; vertical-align: top;\"><b style=\"color: green;\">In a three column layout</b><br/>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</td></tr></tbody></table>"));
        // line 16
        yield "<br/>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reports/misc/textRich.twig.html";
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
        return array (  42 => 16,  40 => 15,  38 => 13,);
    }

    public function getSourceContext()
    {
        return new Source("", "reports/misc/textRich.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/reports/misc/textRich.twig.html");
    }
}
