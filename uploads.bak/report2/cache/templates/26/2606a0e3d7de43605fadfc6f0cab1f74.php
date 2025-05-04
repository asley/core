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

/* components/listOptions.twig.html */
class __TwigTemplate_372dbb04e434bb3b77977052ec21f83e extends Template
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
        if (($context["listOptions"] ?? null)) {
            // line 12
            yield "<div class=\"flex-1 flex justify-end items-top font-sans mb-2\">
    ";
            // line 13
            $context["buttonClass"] = "h-8 text-sm bg-white text-gray-700 border-gray-500 hover:bg-blue-500 hover:border-blue-700 hover:text-white border -ml-px px-3 md:px-5 py-1 leading-normal overflow-hidden";
            // line 14
            yield "
    ";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["listOptions"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["view"] => $context["label"]) {
                // line 16
                yield "    <a class=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonClass"] ?? null), "html", null, true);
                yield " ";
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 16)) ? ("rounded-l") : (((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 16)) ? ("rounded-r") : (""))));
                yield "\" href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["url"] ?? null), "html", null, true);
                yield "&view=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["view"], "html", null, true);
                yield "\" title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield "\">
        <span class=\"hidden md:inline-block\">";
                // line 17
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield "</span>

        ";
                // line 19
                if (($context["view"] == "list")) {
                    // line 20
                    yield "            <svg aria-hidden=\"true\" focusable=\"false\" data-icon=\"bars\" class=\"inline-block w-4 align-middle ml-1 -mt-px md:-mt-1\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z\"></path></svg>
        ";
                } elseif ((                // line 21
$context["view"] == "grid")) {
                    // line 22
                    yield "            <svg aria-hidden=\"true\" focusable=\"false\" data-icon=\"th\" class=\"inline-block w-4 align-middle ml-1 -mt-px md:-mt-1\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 512 512\"><path fill=\"currentColor\" d=\"M149.333 56v80c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V56c0-13.255 10.745-24 24-24h101.333c13.255 0 24 10.745 24 24zm181.334 240v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm32-240v80c0 13.255 10.745 24 24 24H488c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24zm-32 80V56c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm-205.334 56H24c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zm386.667-56H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm0 160H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zM181.333 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24z\"></path></svg>
        ";
                } elseif ((                // line 23
$context["view"] == "card")) {
                    // line 24
                    yield "            <svg aria-hidden=\"true\" focusable=\"false\" data-icon=\"address-card\" class=\"inline-block w-5 align-middle ml-1 -mt-px md:-mt-1\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 576 512\"><path fill=\"currentColor\" d=\"M528 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm0 400H48V80h480v352zM208 256c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm-89.6 128h179.2c12.4 0 22.4-8.6 22.4-19.2v-19.2c0-31.8-30.1-57.6-67.2-57.6-10.8 0-18.7 8-44.8 8-26.9 0-33.4-8-44.8-8-37.1 0-67.2 25.8-67.2 57.6v19.2c0 10.6 10 19.2 22.4 19.2zM360 320h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm0-64h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm0-64h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8z\"></path></svg>
        ";
                } elseif ((                // line 25
$context["view"] == "map")) {
                    // line 26
                    yield "            <svg aria-hidden=\"true\" focusable=\"false\" data-icon=\"chart-network\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 640 512\" class=\"inline-block w-5 align-middle ml-1 md:-mt-1\"><path fill=\"currentColor\" d=\"M576 192c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zM64 240c-35.3 0-64 28.7-64 64s28.7 64 64 64 64-28.7 64-64-28.7-64-64-64zm449.6-37.2l-19.2-25.6-48 36 19.2 25.6 48-36zM576 384c-14.4 0-27.6 5-38.3 13l-96-57.6c3.8-11.2 6.3-23 6.3-35.5 0-61.9-50.1-112-112-112-8.4 0-16.6 1.1-24.4 2.9l-40.8-87.4C281.4 96 288 80.8 288 64c0-35.3-28.7-64-64-64s-64 28.7-64 64 28.7 64 64 64c1.1 0 2.1-.3 3.2-.3l41 87.8C241.5 235.9 224 267.8 224 304c0 61.9 50.1 112 112 112 32.1 0 60.8-13.7 81.2-35.3l95.8 57.5c-.5 3.2-1 6.5-1 9.8 0 35.3 28.7 64 64 64s64-28.7 64-64-28.7-64-64-64zm-240-32c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm-184-32h48v-32h-48v32z\" class=\"\"></path></svg>
        ";
                }
                // line 28
                yield "    </a>
    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['view'], $context['label'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            yield "</div>
";
        }
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "components/listOptions.twig.html";
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
        return array (  122 => 30,  107 => 28,  103 => 26,  101 => 25,  98 => 24,  96 => 23,  93 => 22,  91 => 21,  88 => 20,  86 => 19,  81 => 17,  68 => 16,  51 => 15,  48 => 14,  46 => 13,  43 => 12,  41 => 11,  38 => 10,);
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

{% if listOptions %}
<div class=\"flex-1 flex justify-end items-top font-sans mb-2\">
    {% set buttonClass = 'h-8 text-sm bg-white text-gray-700 border-gray-500 hover:bg-blue-500 hover:border-blue-700 hover:text-white border -ml-px px-3 md:px-5 py-1 leading-normal overflow-hidden' %}

    {% for view, label in listOptions %}
    <a class=\"{{ buttonClass }} {{ loop.first ?'rounded-l' : loop.last ? 'rounded-r' }}\" href=\"{{ url }}&view={{ view }}\" title=\"{{ label }}\">
        <span class=\"hidden md:inline-block\">{{- label -}}</span>

        {% if view == 'list' %}
            <svg aria-hidden=\"true\" focusable=\"false\" data-icon=\"bars\" class=\"inline-block w-4 align-middle ml-1 -mt-px md:-mt-1\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z\"></path></svg>
        {% elseif view == 'grid' %}
            <svg aria-hidden=\"true\" focusable=\"false\" data-icon=\"th\" class=\"inline-block w-4 align-middle ml-1 -mt-px md:-mt-1\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 512 512\"><path fill=\"currentColor\" d=\"M149.333 56v80c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V56c0-13.255 10.745-24 24-24h101.333c13.255 0 24 10.745 24 24zm181.334 240v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm32-240v80c0 13.255 10.745 24 24 24H488c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24zm-32 80V56c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm-205.334 56H24c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zm386.667-56H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm0 160H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zM181.333 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24z\"></path></svg>
        {% elseif view == 'card' %}
            <svg aria-hidden=\"true\" focusable=\"false\" data-icon=\"address-card\" class=\"inline-block w-5 align-middle ml-1 -mt-px md:-mt-1\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 576 512\"><path fill=\"currentColor\" d=\"M528 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm0 400H48V80h480v352zM208 256c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm-89.6 128h179.2c12.4 0 22.4-8.6 22.4-19.2v-19.2c0-31.8-30.1-57.6-67.2-57.6-10.8 0-18.7 8-44.8 8-26.9 0-33.4-8-44.8-8-37.1 0-67.2 25.8-67.2 57.6v19.2c0 10.6 10 19.2 22.4 19.2zM360 320h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm0-64h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm0-64h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8z\"></path></svg>
        {% elseif view == 'map' %}
            <svg aria-hidden=\"true\" focusable=\"false\" data-icon=\"chart-network\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 640 512\" class=\"inline-block w-5 align-middle ml-1 md:-mt-1\"><path fill=\"currentColor\" d=\"M576 192c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zM64 240c-35.3 0-64 28.7-64 64s28.7 64 64 64 64-28.7 64-64-28.7-64-64-64zm449.6-37.2l-19.2-25.6-48 36 19.2 25.6 48-36zM576 384c-14.4 0-27.6 5-38.3 13l-96-57.6c3.8-11.2 6.3-23 6.3-35.5 0-61.9-50.1-112-112-112-8.4 0-16.6 1.1-24.4 2.9l-40.8-87.4C281.4 96 288 80.8 288 64c0-35.3-28.7-64-64-64s-64 28.7-64 64 28.7 64 64 64c1.1 0 2.1-.3 3.2-.3l41 87.8C241.5 235.9 224 267.8 224 304c0 61.9 50.1 112 112 112 32.1 0 60.8-13.7 81.2-35.3l95.8 57.5c-.5 3.2-1 6.5-1 9.8 0 35.3 28.7 64 64 64s64-28.7 64-64-28.7-64-64-64zm-240-32c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm-184-32h48v-32h-48v32z\" class=\"\"></path></svg>
        {% endif%}
    </a>
    {% endfor %}
</div>
{% endif %}
", "components/listOptions.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/components/listOptions.twig.html");
    }
}
