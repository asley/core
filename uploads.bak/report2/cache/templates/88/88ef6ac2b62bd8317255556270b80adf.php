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

/* menu.twig.html */
class __TwigTemplate_5da98d8437a408d0ca5a33927ec8d496 extends Template
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
        // line 12
        yield "
<hr class=\"opacity-25 border-";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
        yield "-300 border-b-0 mx-0 -my-px\">
<ul class=\"list-none flex flex-wrap items-center my-3 -mx-4\">
    <li class=\"mx-0 px-0\">
        <a hx-boost=\"true\" hx-target=\"#content-wrap\" hx-select=\"#content-wrap\" hx-swap=\"outerHTML show:no-scroll swap:0s\" class=\"block uppercase font-bold text-sm text-gray-100 hover:text-gray-800 no-underline ml-1 px-4 py-3\" href=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/index.php\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Home"), "html", null, true);
        yield "</a>
    </li>

    ";
        // line 19
        if (($context["isLoggedIn"] ?? null)) {
            // line 20
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["menuMain"] ?? null));
            foreach ($context['_seq'] as $context["categoryName"] => $context["items"]) {
                // line 21
                yield "        <li class=\"sm:relative group mx-0 px-0 \" x-data=\"{menuOpen: false}\" @mouseleave=\"menuOpen = false\" @click.outside=\"menuOpen = false\">
            <a @mouseenter=\"menuOpen = true\" @click=\"menuOpen = true\" :class=\"{'text-gray-800': menuOpen, 'text-gray-100': !menuOpen}\" class=\"block uppercase font-bold text-sm text-gray-100 no-underline px-4 py-3 cursor-pointer\">";
                // line 22
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()($context["categoryName"]), "html", null, true);
                yield "</a>

            <ul x-cloak x-show=\"menuOpen\" x-transition:enter.duration.250ms x-transition:leave.duration.0s class=\"list-none bg-black bg-opacity-75 backdrop-blur-lg backdrop-contrast-125 backdrop-saturate-150 rounded-md absolute w-available ms-4 me-4 sm:mx-0 sm:w-52  my-0 p-1 sm:p-1.5 z-50 ";
                // line 24
                yield ((($context["rightToLeft"] ?? null)) ? ("right-0") : ("left-0"));
                yield "\">
                ";
                // line 25
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable($context["items"]);
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 26
                    yield "                <li class=\"hover:bg-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
                    yield "-700 rounded\">
                    <a @click=\"menuOpen = false\" class=\"block text-sm text-white focus:text-";
                    // line 27
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
                    yield "-200 no-underline px-2 py-2 md:py-1 leading-normal ";
                    yield ((($context["rightToLeft"] ?? null)) ? ("text-right") : ("text-left"));
                    yield "\" href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, false, 27), "html", null, true);
                    yield "\">
                        ";
                    // line 28
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 28), CoreExtension::getAttribute($this->env, $this->source, $context["item"], "textDomain", [], "any", false, false, false, 28)), "html", null, true);
                    yield "
                    </a>
                </li>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 32
                yield "            </ul>
            <div x-cloak x-show=\"menuOpen\" class=\"absolute -left-8 h-48 m-0 z-40\" style=\"width:calc(100% + 8rem);\"></div>
        </li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['categoryName'], $context['items'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 36
            yield "    ";
        }
        // line 37
        yield "
    <li class=\" notificationTray flex-grow relative\">
        <div class=\"flex flex-row-reverse items-center\">

            <div id=\"finderTray\" class=\"mr-4 w-auto sm:w-full max-w-sm\">
                ";
        // line 42
        yield Twig\Extension\CoreExtension::include($this->env, $context, "finder.twig.html");
        yield "
            </div>

            ";
        // line 45
        yield Twig\Extension\CoreExtension::include($this->env, $context, "tray.twig.html");
        yield "
        </div>
    </li>
</ul>


";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "menu.twig.html";
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
        return array (  126 => 45,  120 => 42,  113 => 37,  110 => 36,  101 => 32,  91 => 28,  83 => 27,  78 => 26,  74 => 25,  70 => 24,  65 => 22,  62 => 21,  57 => 20,  55 => 19,  47 => 16,  41 => 13,  38 => 12,);
    }

    public function getSourceContext()
    {
        return new Source("", "menu.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/menu.twig.html");
    }
}
