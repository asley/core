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

/* components/formTable.twig.html */
class __TwigTemplate_d0ac58ef37cb2a7c530a732405848968 extends Template
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
        CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "addClass", ["formTable"], "method", false, false, false, 11);
        // line 12
        yield "
<form ";
        // line 13
        yield CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getAttributeString", [], "any", false, false, false, 13);
        yield " x-data=\"{'submitting': false}\">

    ";
        // line 15
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getTitle", [], "any", false, false, false, 15)) {
            // line 16
            yield "        <h2>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getTitle", [], "any", false, false, false, 16), "html", null, true);
            yield "</h2>
    ";
        }
        // line 18
        yield "    
    ";
        // line 19
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getDescription", [], "any", false, false, false, 19)) {
            // line 20
            yield "        <p>";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getDescription", [], "any", false, false, false, 20);
            yield "</p>
    ";
        }
        // line 22
        yield "
    ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getHiddenValues", [], "any", false, false, false, 23));
        foreach ($context['_seq'] as $context["_key"] => $context["values"]) {
            // line 24
            yield "        <input type=\"hidden\" name=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["values"], "name", [], "any", false, false, false, 24), "html", null, true);
            yield "\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["values"], "value", [], "any", false, false, false, 24), "html", null, true);
            yield "\">
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['values'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        yield "
    <table class=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getClass", [], "any", false, false, false, 27), "html", null, true);
        yield " font-sans text-xs text-gray-700 relative overflow-hidden bg-gray-50 rounded border mt-3\" cellspacing=\"0\">
        
    ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getRows", [], "any", false, false, false, 29));
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
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 30
            yield "        ";
            $context["rowLoop"] = $context["loop"];
            // line 31
            yield "
        <tr id=\"";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "getID", [], "any", false, false, false, 32), "html", null, true);
            yield "\" class=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::replace(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "getClass", [], "any", false, false, false, 32), ["standardWidth" => ""]), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rowClass"] ?? null), "html", null, true);
            yield " ";
            yield (((!CoreExtension::inFilter("noIntBorder", CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getClass", [], "any", false, false, false, 32)) &&  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 32))) ? ("border-b") : (""));
            yield " \">

        ";
            // line 34
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "getElements", [], "any", false, false, false, 34));
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
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 35
                yield "            ";
                $context["colspan"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 35) && (CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "length", [], "any", false, false, false, 35) < ($context["totalColumns"] ?? null)))) ? (((($context["totalColumns"] ?? null) + 1) - CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "length", [], "any", false, false, false, 35))) : (0));
                // line 36
                yield "
            <td class=\"";
                // line 37
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["class"] ?? null), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::replace(CoreExtension::getAttribute($this->env, $this->source, $context["element"], "getClass", [], "any", false, false, false, 37), ["standardWidth" => ""]), "html", null, true);
                yield "\" ";
                yield ((($context["colspan"] ?? null)) ? (Twig\Extension\CoreExtension::sprintf("colspan=\"%s\"", ($context["colspan"] ?? null))) : (""));
                yield ">
                ";
                // line 38
                yield CoreExtension::getAttribute($this->env, $this->source, $context["element"], "getOutput", [], "any", false, false, false, 38);
                yield "

                ";
                // line 40
                if (CoreExtension::getAttribute($this->env, $this->source, $context["element"], "instanceOf", ["Gibbon\\Forms\\ValidatableInterface"], "method", false, false, false, 40)) {
                    // line 41
                    yield "                <script type=\"text/javascript\">
                    ";
                    // line 42
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["element"], "getValidationOutput", [], "any", false, false, false, 42);
                    yield "
                </script>
                ";
                }
                // line 45
                yield "            </td>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 47
            yield "
        </tr>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        yield "    </table>

    <script type=\"text/javascript\">
        ";
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["javascript"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["code"]) {
            // line 54
            yield "            ";
            yield $context["code"];
            yield "
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['code'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        yield "    </script>
</form>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "components/formTable.twig.html";
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
        return array (  226 => 56,  217 => 54,  213 => 53,  208 => 50,  192 => 47,  177 => 45,  171 => 42,  168 => 41,  166 => 40,  161 => 38,  153 => 37,  150 => 36,  147 => 35,  130 => 34,  119 => 32,  116 => 31,  113 => 30,  96 => 29,  91 => 27,  88 => 26,  77 => 24,  73 => 23,  70 => 22,  64 => 20,  62 => 19,  59 => 18,  53 => 16,  51 => 15,  46 => 13,  43 => 12,  41 => 11,  38 => 10,);
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

{% do form.addClass('formTable')%}

<form {{ form.getAttributeString|raw }} x-data=\"{'submitting': false}\">

    {% if form.getTitle %}
        <h2>{{ form.getTitle }}</h2>
    {% endif %}
    
    {% if form.getDescription %}
        <p>{{ form.getDescription|raw }}</p>
    {% endif %}

    {% for values in form.getHiddenValues %}
        <input type=\"hidden\" name=\"{{ values.name }}\" value=\"{{ values.value }}\">
    {% endfor %}

    <table class=\"{{ form.getClass }} font-sans text-xs text-gray-700 relative overflow-hidden bg-gray-50 rounded border mt-3\" cellspacing=\"0\">
        
    {% for row in form.getRows %}
        {% set rowLoop = loop %}

        <tr id=\"{{ row.getID }}\" class=\"{{ row.getClass|replace({'standardWidth': ''}) }} {{ rowClass }} {{ \"noIntBorder\" not in form.getClass and not loop.last? 'border-b' }} \">

        {% for element in row.getElements %}
            {% set colspan = loop.last and loop.length < totalColumns ? (totalColumns + 1 - loop.length) : 0  %}

            <td class=\"{{ class }} {{ element.getClass|replace({'standardWidth': ''}) }}\" {{ colspan ? 'colspan=\"%s\"'|format(colspan)|raw }}>
                {{ element.getOutput|raw }}

                {% if element.instanceOf('Gibbon\\\\Forms\\\\ValidatableInterface') %}
                <script type=\"text/javascript\">
                    {{ element.getValidationOutput|raw }}
                </script>
                {% endif %}
            </td>
        {% endfor %}

        </tr>
    {% endfor %}
    </table>

    <script type=\"text/javascript\">
        {% for code in javascript %}
            {{ code|raw }}
        {% endfor %}
    </script>
</form>
", "components/formTable.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/components/formTable.twig.html");
    }
}
