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

/* reports/stylesheets/style.twig.html */
class __TwigTemplate_3b2633a4cdfc62752a024caacb2436eb extends Template
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
        yield "<style>
    table, .table {
        border-collapse: collapse;
        border-spacing: 0px;
        font-size: 8pt;
    }

    td {
        color: #2b3243;
        line-height: 1.2;
    }

    .w-full {
        width: 100%;
    }

    .border {
        border: 1pt solid #dbe0e6;
    }

    .border-top {
        border-top: 1pt solid #dbe0e6;
    }

    .border-bottom {
        border-bottom: 1pt solid #dbe0e6;
    }

    .border-left {
        border-left: 1pt solid #dbe0e6;
    }

    .border-right {
        border-right: 1pt solid #dbe0e6;
    }

    .divider-line {
        border-bottom: 1.5pt solid #97befd;
    }

    .bg-primary {
        background-color: #f5f7fb;
    }

    .bg-secondary {
        background-color: #f5f7fb;
    }

    .header {
        font-size: 9pt;
        font-weight: bold;
        vertical-align: middle;
    }

    .subheader {
        font-size: 8pt ;
        font-weight: bold;
        vertical-align: middle;
    }
</style>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "reports/stylesheets/style.twig.html";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array ();
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Default Stylesheet
category: Stylesheets
types: Stylesheet
-->#}
<style>
    table, .table {
        border-collapse: collapse;
        border-spacing: 0px;
        font-size: 8pt;
    }

    td {
        color: #2b3243;
        line-height: 1.2;
    }

    .w-full {
        width: 100%;
    }

    .border {
        border: 1pt solid #dbe0e6;
    }

    .border-top {
        border-top: 1pt solid #dbe0e6;
    }

    .border-bottom {
        border-bottom: 1pt solid #dbe0e6;
    }

    .border-left {
        border-left: 1pt solid #dbe0e6;
    }

    .border-right {
        border-right: 1pt solid #dbe0e6;
    }

    .divider-line {
        border-bottom: 1.5pt solid #97befd;
    }

    .bg-primary {
        background-color: #f5f7fb;
    }

    .bg-secondary {
        background-color: #f5f7fb;
    }

    .header {
        font-size: 9pt;
        font-weight: bold;
        vertical-align: middle;
    }

    .subheader {
        font-size: 8pt ;
        font-weight: bold;
        vertical-align: middle;
    }
</style>
", "reports/stylesheets/style.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/reports/stylesheets/style.twig.html");
    }
}
