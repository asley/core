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

/* headers/logoCenter_copy2.twig.html */
class __TwigTemplate_efc72a18922834eb60e76de2b4e8b409 extends Template
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
        // line 41
        yield ((($context["stylesheet"] ?? null)) ? (Twig\Extension\CoreExtension::include($this->env, $context, ($context["stylesheet"] ?? null))) : (""));
        // line 43
        yield "<style>
    .school-header {
        font-family: \"Georgia\", serif;
        font-size: 14pt;
        font-weight: bold;
        color: #5A3A1E; /* Dark-brown color */
        text-align: center;
        margin: 5px 0;
    }
    .school-subheader {
        font-family: \"Arial\", sans-serif;
        font-size: 10pt;
        color: #000; /* Black color */
        text-align: center;
        margin: 2px 0;
    }
    .logo-container {
        text-align: center;
        margin: 10px auto;
        padding: 10px; /* Adds space around content */
        border: 2px solid #5A3A1E; /* Dark-brown border */
        width: 70%; /* Reduces width for neatness */
        border-radius: 10px; /* Adds rounded corners */
        box-sizing: border-box;
    }
    .divider-line {
        height: 1px;
        background-color: #000;
        margin: 5px 0;
    }
</style>

<table class=\"w-full table\" cellspacing=\"0\" nobr=\"true\">
    <tr>
        <td colspan=\"3\" class=\"logo-container\">
            <p class=\"school-header\">CLEMENT HOWELL HIGH SCHOOL</p>
            <p class=\"school-subheader\"><i>\"Commitment to Excellence\"</i></p>
            <p class=\"school-subheader\">
                P.O. Box 222, Blue Hills, Providenciales, Turks and Caicos Islands<br/>
                Tel: (649) 941-3411; Fax: (649) 941-3685<br/>
                Email: chhs@tciway.tc, clementhowellhigh@gov.tc<br/>
                Website: <a href=\"http://www.chhstc.org\" style=\"color:#5A3A1E; text
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "headers/logoCenter_copy2.twig.html";
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
        return array (  40 => 43,  38 => 41,);
    }

    public function getSourceContext()
    {
        return new Source("{#<!--
name: Logo - Center with School Info and Border
category: Report Info
types: Body,Header
icon: align-center.svg
sources:
    school: School
    report: Report
params:
    height: 30
config:
    headingLeft:
        label: Left Heading
        type: words
        default:
    textLeft:
        label: Left Text
        type: text
        default:
    headingRight:
        label: Right Heading
        type: words
        default:
    textRight:
        label: Right Text
        type: text
        default:
    logo:
        label: Logo
        type: image
    logoHeight:
        label: Logo Height
        type: number
        default: 30
    dividerLine:
        label: Divider Line
        type: yesno
        default: Y
-->#}

{{- stylesheet ? include(stylesheet) -}}

<style>
    .school-header {
        font-family: \"Georgia\", serif;
        font-size: 14pt;
        font-weight: bold;
        color: #5A3A1E; /* Dark-brown color */
        text-align: center;
        margin: 5px 0;
    }
    .school-subheader {
        font-family: \"Arial\", sans-serif;
        font-size: 10pt;
        color: #000; /* Black color */
        text-align: center;
        margin: 2px 0;
    }
    .logo-container {
        text-align: center;
        margin: 10px auto;
        padding: 10px; /* Adds space around content */
        border: 2px solid #5A3A1E; /* Dark-brown border */
        width: 70%; /* Reduces width for neatness */
        border-radius: 10px; /* Adds rounded corners */
        box-sizing: border-box;
    }
    .divider-line {
        height: 1px;
        background-color: #000;
        margin: 5px 0;
    }
</style>

<table class=\"w-full table\" cellspacing=\"0\" nobr=\"true\">
    <tr>
        <td colspan=\"3\" class=\"logo-container\">
            <p class=\"school-header\">CLEMENT HOWELL HIGH SCHOOL</p>
            <p class=\"school-subheader\"><i>\"Commitment to Excellence\"</i></p>
            <p class=\"school-subheader\">
                P.O. Box 222, Blue Hills, Providenciales, Turks and Caicos Islands<br/>
                Tel: (649) 941-3411; Fax: (649) 941-3685<br/>
                Email: chhs@tciway.tc, clementhowellhigh@gov.tc<br/>
                Website: <a href=\"http://www.chhstc.org\" style=\"color:#5A3A1E; text
", "headers/logoCenter_copy2.twig.html", "/Applications/MAMP/htdocs/chhs/uploads/reports/templates/headers/logoCenter_copy2.twig.html");
    }
}
