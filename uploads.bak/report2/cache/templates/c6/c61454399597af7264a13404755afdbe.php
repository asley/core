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

/* ui/tabs.twig.html */
class __TwigTemplate_911980249b67df440ce3fb6dfc6e7947 extends Template
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
        yield "<div
    x-data=\"{
        tabSelected: ";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("selected", $context)) ? (Twig\Extension\CoreExtension::default(($context["selected"] ?? null), 1)) : (1)), "html", null, true);
        yield ",
        tabId: \$id('tabs'),
        tabButtonClicked(tabButton){
            this.tabSelected = tabButton.id.replace(this.tabId + '-', '');
        },
        tabActive(tab){
            return this.tabSelected == tab.id.replace(this.tabId + '-', '');
        },
        tabContentActive(tabContent){
            return this.tabSelected == tabContent.id.replace(this.tabId + '-content-', '');
        }
    }\"
    x-init=\"tabSelected = ";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("selected", $context)) ? (Twig\Extension\CoreExtension::default(($context["selected"] ?? null), 1)) : (1)), "html", null, true);
        yield "\" class=\"relative w-full max-w-full ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["class"] ?? null), "html", null, true);
        yield "\">
    
    <div class=\"overflow-y-hidden w-full\">
        <div x-ref=\"tabButtons\" @keydown.right.prevent=\"\$focus.wrap().next()\" @keydown.left.prevent=\"\$focus.wrap().previous()\" class=\"flex flex-wrap justify-start items-end\" role=\"tablist\" aria-label=\"tab options\">
            ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["tabs"] ?? null));
        foreach ($context['_seq'] as $context["tabID"] => $context["tab"]) {
            // line 29
            yield "            <button :id=\"\$id(tabId)\" @click=\"tabButtonClicked(\$el);\" :aria-selected=\"tabActive(\$el)\" type=\"button\" :class=\"tabActive(\$el) ? 'text-gray-900 border border-gray-400 border-b-white z-10 bg-white shadow' : 'text-gray-800 hover:bg-gray-200 border border-transparent hover:border-b-gray-400 bg-transparent'\" class=\"inline-flex flex-col sm:flex-row gap-1.5 items-center px-4 sm:px-5 xl:px-6 py-2 -mr-1 sm:-mr-2 font-normal rounded-t-md  \" role=\"tab\" tabindex=\"tabActive(\$el) ? '0' : '-1'\" aria-selected=\"true\">
                ";
            // line 30
            if ((($context["icons"] ?? null) && CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "icon", [], "any", false, false, false, 30))) {
                // line 31
                yield "                    <span x-cloak x-show=\"tabActive(\$el.parentElement)\" class=\"inline-flex\">
                    ";
                // line 32
                yield $this->env->getFunction('icon')->getCallable()("solid", CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "icon", [], "any", false, false, false, 32), "inline-block size-5  sm:-ml-1 opacity-50");
                yield "
                    </span>
                    <span x-show=\"!tabActive(\$el.parentElement)\" class=\"inline-flex\">
                        ";
                // line 35
                yield $this->env->getFunction('icon')->getCallable()("outline", CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "icon", [], "any", false, false, false, 35), "inline-block size-5  sm:-ml-1 opacity-50", ["stroke-width" => 1.5]);
                yield "
                    </span>
                ";
            }
            // line 38
            yield "                <span class=\"block sm:inline text-xxs sm:text-sm whitespace-nowrap\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "label", [], "any", false, false, false, 38), "html", null, true);
            yield "</span>
            </button>
    
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['tabID'], $context['tab'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        yield "        </div>
    </div>

    <div role=\"tabpanels\" class=\"h-full pt-4 -mt-px ";
        // line 45
        yield ((($context["outset"] ?? null)) ? ("-mx-4 sm:-mx-8 px-4 sm:px-8 pb-6 border-t") : ("px-4 border"));
        yield " rounded-b bg-white border-gray-400\">
        ";
        // line 46
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["tabs"] ?? null));
        foreach ($context['_seq'] as $context["tabID"] => $context["tab"]) {
            // line 47
            yield "        <div :id=\"\$id(tabId + '-content')\" x-show=\"tabContentActive(\$el)\" class=\"relative\"  :aria-labelledby=\"\$id(tabId + '-content')\" role=\"tabpanel\">
           ";
            // line 48
            yield CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "content", [], "any", false, false, false, 48);
            yield "
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['tabID'], $context['tab'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        yield "    </div>
</div>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ui/tabs.twig.html";
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
        return array (  126 => 51,  117 => 48,  114 => 47,  110 => 46,  106 => 45,  101 => 42,  90 => 38,  84 => 35,  78 => 32,  75 => 31,  73 => 30,  70 => 29,  66 => 28,  57 => 24,  42 => 12,  38 => 10,);
    }

    public function getSourceContext()
    {
        return new Source("", "ui/tabs.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/ui/tabs.twig.html");
    }
}
