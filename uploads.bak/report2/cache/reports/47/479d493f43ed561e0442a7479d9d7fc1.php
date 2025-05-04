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

/* preview.twig.html */
class __TwigTemplate_ca06c6f396ef720b06c73bbf7db692b1 extends Template
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
<style>
    @font-face {
        font-family: 'DroidSansFallback';
        src: url('./resources/assets/fonts/DroidSansFallback.ttf') format('truetype');
        /* Safari, Android, iOS */
    }

    ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["fontList"] ?? null));
        foreach ($context['_seq'] as $context["fontFamily"] => $context["fonts"]) {
            // line 19
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["fonts"]);
            foreach ($context['_seq'] as $context["fontType"] => $context["fontPath"]) {
                // line 20
                yield "            @font-face {
                font-family: '";
                // line 21
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["fontFamily"], "html", null, true);
                yield "';
                src: url('";
                // line 22
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["fontURL"] ?? null), "html", null, true);
                yield "/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["fontPath"], "html", null, true);
                yield "') format('truetype');

                font-style: ";
                // line 24
                yield ((CoreExtension::inFilter("I", $context["fontType"])) ? ("italic") : ("normal"));
                yield ";

                font-weight: ";
                // line 26
                yield ((CoreExtension::inFilter("B", $context["fontType"])) ? ("700") : ("normal"));
                yield ";
            }
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['fontType'], $context['fontPath'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['fontFamily'], $context['fonts'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        yield "
    body {
        margin: 0;
        padding: 0;
        font-family: 'DroidSansFallback', sans;
        background-color: #e8e8e8;
    }

    table {
        width: 100%;
        max-width: 100%;
        line-height: 1.2;
    }

    header {
        margin-bottom: -4mm;
    }

    section {
        /* margin: 4mm 0mm; */
    }

    footer {
        position: absolute;
        left: 0;
        bottom: 0;

        width: calc(100% - (";
        // line 57
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["marginX"] ?? null), "html", null, true);
        yield " mm * 2));
        padding: 0 ";
        // line 58
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["marginX"] ?? null), "html", null, true);
        yield " mm;
    }
</style>

<!-- style=\"transform: scale(0.85); transform-origin: top center;\" -->
<div class=\"bg-gray-300 p-px\">

    <h1 class=\"text-center text-lg text-gray-700 font-bold my-4\">";
        // line 65
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["name"] ?? null), "html", null, true);
        yield "</h1>

    ";
        // line 67
        if (($context["debugData"] ?? null)) {
            // line 68
            yield "    <details class=\"mx-auto max-w-3xl mb-4\">
        <summary class=\"text-gray-700 text-sm\">
            ";
            // line 70
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Inspect"), "html", null, true);
            yield "
        </summary>
        <pre class=\"bg-white p-4\">";
            // line 73
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["debugData"] ?? null), "html", null, true);
            // line 74
            yield "</pre>
    </details>
    ";
        }
        // line 77
        yield "
    ";
        // line 78
        if ((Twig\Extension\CoreExtension::upper($this->env->getCharset(), ($context["pageSize"] ?? null)) == "LETTER")) {
            // line 79
            yield "        ";
            $context["baseWidth"] = (((($context["orientation"] ?? null) == "L")) ? ("279.4") : ("215.9"));
            // line 80
            yield "        ";
            $context["baseHeight"] = (((($context["orientation"] ?? null) == "L")) ? ("215.9") : ("279.4"));
            // line 81
            yield "    ";
        } else {
            // line 82
            yield "        ";
            $context["baseWidth"] = (((($context["orientation"] ?? null) == "L")) ? ("297") : ("210"));
            // line 83
            yield "        ";
            $context["baseHeight"] = (((($context["orientation"] ?? null) == "L")) ? ("210") : ("297"));
            // line 84
            yield "    ";
        }
        // line 85
        yield "
    ";
        // line 86
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["pages"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 87
            yield "    <div class=\"relative mx-auto bg-white shadow-lg m-4 mb-8\"
            style=\"padding: ";
            // line 88
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["marginY"] ?? null), "html", null, true);
            yield "mm ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["marginX"] ?? null), "html", null, true);
            yield "mm; width: calc(";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseWidth"] ?? null), "html", null, true);
            yield "mm - (";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["marginX"] ?? null), "html", null, true);
            yield "mm * 2)); ";
            if ( !($context["prototype"] ?? null)) {
                yield "min-height: calc(";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["baseHeight"] ?? null), "html", null, true);
                yield "mm - (";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["marginY"] ?? null), "html", null, true);
                yield "mm * 2));";
            }
            yield "\">

        <div class=\"absolute top-0 left-0 w-24 h-8 text-xl font-bold text-gray-400 text-right mt-16\"
                style=\"transform: rotate(-90deg);transform-origin: bottom left;\">
            ";
            // line 92
            if (($context["prototype"] ?? null)) {
                // line 93
                yield "                ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Preview"), "html", null, true);
                yield "
            ";
            } else {
                // line 95
                yield "                ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Page"), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 95), "html", null, true);
                yield "
            ";
            }
            // line 97
            yield "        </div>

        ";
            // line 99
            yield $context["page"];
            yield "
    </div>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        yield "
    <p class=\"-mt-2 mb-4 text-center text-xxs text-gray-600\">";
        // line 103
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("This HTML preview is for sample purposes and may not be an exact match to the final PDF."), "html", null, true);
        yield "</p>
</div>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "preview.twig.html";
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
        return array (  264 => 103,  261 => 102,  244 => 99,  240 => 97,  232 => 95,  226 => 93,  224 => 92,  203 => 88,  200 => 87,  183 => 86,  180 => 85,  177 => 84,  174 => 83,  171 => 82,  168 => 81,  165 => 80,  162 => 79,  160 => 78,  157 => 77,  152 => 74,  150 => 73,  145 => 70,  141 => 68,  139 => 67,  134 => 65,  124 => 58,  120 => 57,  91 => 30,  85 => 29,  76 => 26,  71 => 24,  64 => 22,  60 => 21,  57 => 20,  52 => 19,  48 => 18,  38 => 10,);
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

<style>
    @font-face {
        font-family: 'DroidSansFallback';
        src: url('./resources/assets/fonts/DroidSansFallback.ttf') format('truetype');
        /* Safari, Android, iOS */
    }

    {% for fontFamily, fonts in fontList %}
        {% for fontType, fontPath in fonts %}
            @font-face {
                font-family: '{{ fontFamily }}';
                src: url('{{ fontURL }}/{{ fontPath }}') format('truetype');

                font-style: {{'I' in fontType ? 'italic': 'normal'}};

                font-weight: {{'B' in fontType ? '700': 'normal'}};
            }
        {% endfor %}
    {% endfor %}

    body {
        margin: 0;
        padding: 0;
        font-family: 'DroidSansFallback', sans;
        background-color: #e8e8e8;
    }

    table {
        width: 100%;
        max-width: 100%;
        line-height: 1.2;
    }

    header {
        margin-bottom: -4mm;
    }

    section {
        /* margin: 4mm 0mm; */
    }

    footer {
        position: absolute;
        left: 0;
        bottom: 0;

        width: calc(100% - ({{marginX}} mm * 2));
        padding: 0 {{marginX}} mm;
    }
</style>

<!-- style=\"transform: scale(0.85); transform-origin: top center;\" -->
<div class=\"bg-gray-300 p-px\">

    <h1 class=\"text-center text-lg text-gray-700 font-bold my-4\">{{ name }}</h1>

    {% if debugData %}
    <details class=\"mx-auto max-w-3xl mb-4\">
        <summary class=\"text-gray-700 text-sm\">
            {{ __('Inspect')}}
        </summary>
        <pre class=\"bg-white p-4\">
            {{- debugData -}}
        </pre>
    </details>
    {% endif %}

    {% if pageSize|upper == 'LETTER' %}
        {% set baseWidth = orientation == 'L' ? '279.4' : '215.9' %}
        {% set baseHeight = orientation == 'L' ? '215.9' : '279.4' %}
    {% else %}
        {% set baseWidth = orientation == 'L' ? '297' : '210' %}
        {% set baseHeight = orientation == 'L' ? '210' : '297' %}
    {% endif%}

    {% for page in pages %}
    <div class=\"relative mx-auto bg-white shadow-lg m-4 mb-8\"
            style=\"padding: {{ marginY }}mm {{ marginX }}mm; width: calc({{ baseWidth }}mm - ({{ marginX }}mm * 2)); {% if not prototype %}min-height: calc({{ baseHeight }}mm - ({{ marginY }}mm * 2));{% endif %}\">

        <div class=\"absolute top-0 left-0 w-24 h-8 text-xl font-bold text-gray-400 text-right mt-16\"
                style=\"transform: rotate(-90deg);transform-origin: bottom left;\">
            {% if prototype %}
                {{ __('Preview') }}
            {% else %}
                {{ __('Page') }} {{ loop.index }}
            {% endif %}
        </div>

        {{ page|raw }}
    </div>
    {% endfor %}

    <p class=\"-mt-2 mb-4 text-center text-xxs text-gray-600\">{{ __('This HTML preview is for sample purposes and may not be an exact match to the final PDF.') }}</p>
</div>
", "preview.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/preview.twig.html");
    }
}
