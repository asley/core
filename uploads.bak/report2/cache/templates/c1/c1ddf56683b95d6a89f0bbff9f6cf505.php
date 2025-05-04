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

/* components/formBlank.twig.html */
class __TwigTemplate_9619ad6dbcb8ec5ceff274f0f3c06848 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'header' => [$this, 'block_header'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        yield "
";
        // line 11
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getAction", [], "any", false, false, false, 11) != "ajax")) {
            // line 12
            yield "<form x-validate ";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getAttributeString", [], "any", false, false, false, 12);
            yield " x-data=\"{'advancedOptions': false, 'invalid': false, 'submitting': false}\"  x-ref=\"form\" @submit=\"\$validate.submit; invalid = !\$validate.isComplete(\$el); if (invalid) submitting = false;\" @change.debounce.750ms=\"if (invalid) invalid = !\$validate.isComplete(\$el); \">
";
        }
        // line 14
        yield "
    ";
        // line 15
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getTitle", [], "any", false, false, false, 15) &&  !CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getHeader", [], "any", false, false, false, 15))) {
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
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        // line 35
        yield "
    ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getHiddenValues", [], "any", false, false, false, 36));
        foreach ($context['_seq'] as $context["_key"] => $context["values"]) {
            // line 37
            yield "        <input type=\"hidden\" name=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["values"], "name", [], "any", false, false, false, 37), "html", null, true);
            yield "\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["values"], "value", [], "any", false, false, false, 37), "html", null, true);
            yield "\">
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['values'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        yield "
    ";
        // line 40
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getRows", [], "any", false, false, false, 40)) > 0)) {
            // line 41
            yield "    <section class=\"w-full\">

        ";
            // line 43
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getRows", [], "any", false, false, false, 43));
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
            foreach ($context['_seq'] as $context["num"] => $context["row"]) {
                // line 44
                yield "
            ";
                // line 45
                $context["rowLoop"] = $context["loop"];
                // line 46
                yield "
            <div id=\"";
                // line 47
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "getID", [], "any", false, false, false, 47), "html", null, true);
                yield "\" class=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "getClass", [], "any", false, false, false, 47), "html", null, true);
                yield " \" ";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["row"], "getAttributeString", ["data-drag-id,x-show,x-transition,x-cloak"], "method", false, false, false, 47);
                yield ">
    
            ";
                // line 49
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["row"], "getElements", [], "any", false, false, false, 49));
                foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                    // line 50
                    yield "
                ";
                    // line 51
                    $context["hasClass"] = (CoreExtension::getAttribute($this->env, $this->source, $context["element"], "instanceOf", ["Gibbon\\Forms\\Layout\\Element"], "method", false, false, false, 51) || CoreExtension::getAttribute($this->env, $this->source, $context["element"], "instanceOf", ["Gibbon\\Forms\\Layout\\Row"], "method", false, false, false, 51));
                    // line 52
                    yield "                <div class=\"";
                    ((($context["hasClass"] ?? null)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["element"], "getClass", [], "any", false, false, false, 52), "html", null, true)) : (yield "flex-1"));
                    yield "\" >
                    ";
                    // line 53
                    yield CoreExtension::getAttribute($this->env, $this->source, $context["element"], "getOutput", [], "any", false, false, false, 53);
                    yield "
                </div>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 56
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
            unset($context['_seq'], $context['_iterated'], $context['num'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            yield "
    </section>
    ";
        }
        // line 62
        yield "
    ";
        // line 63
        if (($context["javascript"] ?? null)) {
            // line 64
            yield "    <script type=\"text/javascript\">
        ";
            // line 65
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["javascript"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["code"]) {
                // line 66
                yield "            ";
                yield $context["code"];
                yield "
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['code'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 68
            yield "    </script>
    ";
        }
        // line 70
        yield "
";
        // line 71
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getAction", [], "any", false, false, false, 71) != "ajax")) {
            // line 72
            yield "</form>
";
        }
        return; yield '';
    }

    // line 23
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 24
        yield "        <header class=\"relative flex justify-between items-end mb-2 ";
        yield ((($context["standardLayout"] ?? null)) ? ("") : (""));
        yield "\">
            ";
        // line 25
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getHeader", [], "any", false, false, false, 25)) {
            // line 26
            yield "                <h2>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getTitle", [], "any", false, false, false, 26), "html", null, true);
            yield "</h2>
                <div class=\"linkTop flex justify-end gap-2 h-10 py-px\">
                    ";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "getHeader", [], "any", false, false, false, 28));
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 29
                yield "                        ";
                yield CoreExtension::getAttribute($this->env, $this->source, $context["action"], "getOutput", [], "any", false, false, false, 29);
                yield "
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            yield "                </div>
            ";
        }
        // line 33
        yield "        </header>
    ";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "components/formBlank.twig.html";
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
        return array (  253 => 33,  249 => 31,  240 => 29,  236 => 28,  230 => 26,  228 => 25,  223 => 24,  219 => 23,  212 => 72,  210 => 71,  207 => 70,  203 => 68,  194 => 66,  190 => 65,  187 => 64,  185 => 63,  182 => 62,  177 => 59,  161 => 56,  152 => 53,  147 => 52,  145 => 51,  142 => 50,  138 => 49,  129 => 47,  126 => 46,  124 => 45,  121 => 44,  104 => 43,  100 => 41,  98 => 40,  95 => 39,  84 => 37,  80 => 36,  77 => 35,  75 => 23,  72 => 22,  66 => 20,  64 => 19,  61 => 18,  55 => 16,  53 => 15,  50 => 14,  44 => 12,  42 => 11,  39 => 10,);
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

{% if form.getAction != 'ajax' %}
<form x-validate {{ form.getAttributeString|raw }} x-data=\"{'advancedOptions': false, 'invalid': false, 'submitting': false}\"  x-ref=\"form\" @submit=\"\$validate.submit; invalid = !\$validate.isComplete(\$el); if (invalid) submitting = false;\" @change.debounce.750ms=\"if (invalid) invalid = !\$validate.isComplete(\$el); \">
{% endif %}

    {% if form.getTitle and not form.getHeader %}
        <h2>{{ form.getTitle }}</h2>
    {% endif %}

    {% if form.getDescription %}
        <p>{{ form.getDescription|raw }}</p>
    {% endif %}
    
    {% block header %}
        <header class=\"relative flex justify-between items-end mb-2 {{ standardLayout ? '' }}\">
            {% if form.getHeader %}
                <h2>{{ form.getTitle }}</h2>
                <div class=\"linkTop flex justify-end gap-2 h-10 py-px\">
                    {% for action in form.getHeader %}
                        {{ action.getOutput|raw }}
                    {% endfor %}
                </div>
            {% endif %}
        </header>
    {% endblock header %}

    {% for values in form.getHiddenValues %}
        <input type=\"hidden\" name=\"{{ values.name }}\" value=\"{{ values.value }}\">
    {% endfor %}

    {% if form.getRows|length > 0 %}
    <section class=\"w-full\">

        {% for num, row in form.getRows %}

            {% set rowLoop = loop %}

            <div id=\"{{ row.getID }}\" class=\"{{ row.getClass }} \" {{ row.getAttributeString(\"data-drag-id,x-show,x-transition,x-cloak\")|raw }}>
    
            {% for element in row.getElements %}

                {% set hasClass = element.instanceOf('Gibbon\\\\Forms\\\\Layout\\\\Element') or element.instanceOf('Gibbon\\\\Forms\\\\Layout\\\\Row') %}
                <div class=\"{{ hasClass ? element.getClass : 'flex-1' }}\" >
                    {{ element.getOutput|raw }}
                </div>
            {% endfor %}

            </div>
        {% endfor %}

    </section>
    {% endif %}

    {% if javascript %}
    <script type=\"text/javascript\">
        {% for code in javascript %}
            {{ code|raw }}
        {% endfor %}
    </script>
    {% endif %}

{% if form.getAction != 'ajax' %}
</form>
{% endif %}
", "components/formBlank.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/components/formBlank.twig.html");
    }
}
