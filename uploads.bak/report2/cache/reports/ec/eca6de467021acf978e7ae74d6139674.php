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

/* stylesheets/style_dec2024.twig.html */
class __TwigTemplate_b7036c92f19a84abc1ed4d26ecb7d1bb extends Template
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
        yield "
<style>
    table, .table {
        border-collapse: collapse;
        border-spacing: 0px;
        font-size: 7pt; /* Reduced font size for compact layout */
    }

    td {
        color: #c68c53;
        line-height: 1.2;
        padding: 4px; /* Reduced padding for compact layout */
    }

    .w-full {
        width: 60%;
    }

    .border {
        border: 1pt solid #dbe0e6;
    }

    .bg-primary {
        background-color: #ffff80;
    }

    .bg-secondary {
        background-color: #b3b300; /* Slightly darker shade for alternating rows */
    }

    .header {
        font-size: 8pt; /* Slightly reduced header size */
        font-weight: bold;
        vertical-align: middle;
        padding: 6px;
    }

    .subheader {
        font-size: 5pt; /* Reduced size for subheaders */
        font-weight: bold;
        vertical-align: middle;
        padding: 4px;
    }

    .cycle-row:nth-child(even) {
        background-color: #f9f9f9; /* Alternating shading for cycle rows */
    }

    .cycle-row:nth-child(odd) {
        background-color: #ffffff;
    }

    .course-divider {
        height: 4px; /* Thickness */
        background-color: #b7af9b; /* Color */
        margin: 20px 0; /* Spacing above and below */
        border-radius: 2px; /* Optional: Makes the edges rounded */
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
        return "stylesheets/style_dec2024.twig.html";
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
name: chhs
category: Stylesheets
types: Stylesheet
-->#}

<style>
    table, .table {
        border-collapse: collapse;
        border-spacing: 0px;
        font-size: 7pt; /* Reduced font size for compact layout */
    }

    td {
        color: #c68c53;
        line-height: 1.2;
        padding: 4px; /* Reduced padding for compact layout */
    }

    .w-full {
        width: 60%;
    }

    .border {
        border: 1pt solid #dbe0e6;
    }

    .bg-primary {
        background-color: #ffff80;
    }

    .bg-secondary {
        background-color: #b3b300; /* Slightly darker shade for alternating rows */
    }

    .header {
        font-size: 8pt; /* Slightly reduced header size */
        font-weight: bold;
        vertical-align: middle;
        padding: 6px;
    }

    .subheader {
        font-size: 5pt; /* Reduced size for subheaders */
        font-weight: bold;
        vertical-align: middle;
        padding: 4px;
    }

    .cycle-row:nth-child(even) {
        background-color: #f9f9f9; /* Alternating shading for cycle rows */
    }

    .cycle-row:nth-child(odd) {
        background-color: #ffffff;
    }

    .course-divider {
        height: 4px; /* Thickness */
        background-color: #b7af9b; /* Color */
        margin: 20px 0; /* Spacing above and below */
        border-radius: 2px; /* Optional: Makes the edges rounded */
    }
    
</style>

{#
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
#}", "stylesheets/style_dec2024.twig.html", "/Applications/MAMP/htdocs/chhs/uploads/reports/templates/stylesheets/style_dec2024.twig.html");
    }
}
