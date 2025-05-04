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

/* ui/gettingStarted.twig.html */
class __TwigTemplate_c7ca1d0a3f1749febb60b4e70eaf4288 extends Template
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
        $macros["page"] = $this->macros["page"] = $this;
        // line 12
        yield "
";
        // line 13
        if (($context["postInstall"] ?? null)) {
            // line 14
            yield "    <div class=\"mt-6 mb-2 py-6 px-6 bg-white shadow rounded font-sans\">
        <div class=\"text-lg text-gray-800 font-semibold leading-normal\">
            ";
            // line 16
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Post-Install & Server Config"), "html", null, true);
            yield "
        </div>

        <p class=\"mt-2 mb-0 text-gray-600\">
            ";
            // line 20
            yield Twig\Extension\CoreExtension::sprintf($this->env->getFunction('__')->getCallable()("To complete your installation, it is advisable to follow the %1\$sPost-Install and Server Config instructions%2\$s."), "<a target='_blank' href='https://docs.gibbonedu.org/introduction/post-installation'>", "</a>");
            yield "
            <br/><br/>

            ";
            // line 23
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("After logging in, be sure to visit the System Check page to ensure all system requirements have been met. You can find additional information about your system in the Server Info page."), "html", null, true);
            yield "
        </p>
    </div>
";
        }
        // line 27
        yield "
<div class=\"mt-6 mb-2 bg-white shadow rounded font-sans\">

    <div class=\"py-6 px-6 border-b border-gray-300\">
        <div class=\"text-lg text-gray-800 font-semibold leading-normal\">
            ";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Getting Started with Gibbon"), "html", null, true);
        yield "
        </div>

        <p class=\"mt-2 mb-0 text-gray-600\">";
        // line 35
        yield $this->env->getFunction('__')->getCallable()("Our community offers documentation and support forums to help get you up and running with Gibbon. If you need additional assistance, members of the Gibbon team can provide expert support. Visit {link} to learn more.", ["link" => "<a href=\"http://gibbonedu.com\" target=\"_blank\" class=\"text-red-700 underline\">gibbonedu.com</a>"]);
        yield "</p>
    </div>

    <div class=\"py-4 px-3 flex flex-wrap items-stretch\">

        ";
        // line 40
        yield CoreExtension::callMacro($macros["page"], "macro_card", [$this->env->getFunction('__')->getCallable()("Documentation"), $this->env->getFunction('__')->getCallable()("Our docs provide technical information as well as user guides for Administrators, Developers, Teachers, and Parents."), "docs", "https://docs.gibbonedu.org"], 40, $context, $this->getSourceContext());
        yield "

        ";
        // line 42
        yield CoreExtension::callMacro($macros["page"], "macro_card", [$this->env->getFunction('__')->getCallable()("Support Forums"), $this->env->getFunction('__')->getCallable()("If you need help try asking members of the Gibbon community. Similarly, issues and bugs can be reported to the forum as well."), "forums", "https://ask.gibbonedu.org"], 42, $context, $this->getSourceContext());
        yield "

        <div class=\"w-full text-base text-gray-600 font-light mt-6 mb-2 ml-3\">
            ";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Extended Services"), "html", null, true);
        yield "
        </div>

        ";
        // line 48
        if (Twig\Extension\CoreExtension::testEmpty(($context["gibboneduComOrganisationKey"] ?? null))) {
            // line 49
            yield "
            ";
            // line 50
            yield CoreExtension::callMacro($macros["page"], "macro_card", [$this->env->getFunction('__')->getCallable()("Expert Support"), $this->env->getFunction('__')->getCallable()("Members of the Gibbon team are available to help with your Gibbon needs through Ad Hoc support or a Support Contract."), "support", "http://gibbonedu.com"], 50, $context, $this->getSourceContext());
            yield "

            ";
            // line 52
            yield CoreExtension::callMacro($macros["page"], "macro_card", [$this->env->getFunction('__')->getCallable()("Value Added License"), $this->env->getFunction('__')->getCallable()("Gibbon Value Added License, which, via the Query Builder module, gives access to over 90 useful queries."), "license", "http://gibbonedu.com"], 52, $context, $this->getSourceContext());
            yield "

        ";
        } else {
            // line 55
            yield "
            ";
            // line 56
            yield CoreExtension::callMacro($macros["page"], "macro_card", [$this->env->getFunction('__')->getCallable()("Expert Support"), $this->env->getFunction('__')->getCallable()("Members of the Gibbon team are available to help with your Gibbon needs through Ad Hoc support or a Support Contract."), "support", (($context["absoluteURL"] ?? null) . "/index.php?q=/modules/System Admin/services_manage.php"), ""], 56, $context, $this->getSourceContext());
            yield "

            ";
            // line 58
            yield CoreExtension::callMacro($macros["page"], "macro_card", [$this->env->getFunction('__')->getCallable()("Value Added License"), $this->env->getFunction('__')->getCallable()("Gibbon Value Added License, which, via the Query Builder module, gives access to over 90 useful queries."), "license", (($context["absoluteURL"] ?? null) . "/index.php?q=/modules/System Admin/services_manage.php"), ""], 58, $context, $this->getSourceContext());
            yield "

        ";
        }
        // line 61
        yield "    </div>

    ";
        // line 63
        if ((Twig\Extension\CoreExtension::testEmpty(($context["gibboneduComOrganisationKey"] ?? null)) &&  !Twig\Extension\CoreExtension::testEmpty(($context["gibbonVersion"] ?? null)))) {
            // line 64
            yield "    <div class=\"px-6 pt-3 pb-3 text-gray-600 border-t border-gray-300\">
        <p class=\"m-0\">
        ";
            // line 66
            yield $this->env->getFunction('__')->getCallable()("Do you have a Service Key? View and configure your licenses on the {link} page.", ["link" => (((("<a href=\"" . ($context["absoluteURL"] ?? null)) . "/index.php?q=/modules/System Admin/services_manage.php\" class=\"text-red-700 underline\">") . $this->env->getFunction('__')->getCallable()("Manage Services")) . "</a>")]);
            yield "
        </p>
    </div>
    ";
        }
        // line 70
        yield "</div>

";
        return; yield '';
    }

    // line 72
    public function macro_card($__name__ = null, $__content__ = null, $__icon__ = "", $__url__ = "", $__target__ = "_blank", ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "name" => $__name__,
            "content" => $__content__,
            "icon" => $__icon__,
            "url" => $__url__,
            "target" => $__target__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 73
            yield "    <div class=\"w-full sm:w-1/2 pr-4\">
        <a href=\"";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["url"] ?? null), "html", null, true);
            yield "\" target=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["target"] ?? null), "html", null, true);
            yield "\" class=\"flex bg-white rounded h-full text-gray-800 hover:bg-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
            yield "-100 hover:text-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
            yield "-800\">
            <div class=\"pl-4 pr-2 py-4\">
                ";
            // line 76
            yield $this->env->getFunction('icon')->getCallable()("large", ($context["icon"] ?? null), "size-10 opacity-75 text-purple-700");
            yield "
            </div>
            <div class=\"flex-1 p-4\">
                <p class=\"m-0 text-base font-semibold font-sans\">
                    ";
            // line 80
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["name"] ?? null), "html", null, true);
            yield "
                </p>
                <p class=\"m-0 pt-3 text-gray-600 leading-tight\">
                    ";
            // line 83
            yield ($context["content"] ?? null);
            yield "
                </p>
            </div>
        </a>
    </div>
";
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ui/gettingStarted.twig.html";
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
        return array (  207 => 83,  201 => 80,  194 => 76,  183 => 74,  180 => 73,  164 => 72,  157 => 70,  150 => 66,  146 => 64,  144 => 63,  140 => 61,  134 => 58,  129 => 56,  126 => 55,  120 => 52,  115 => 50,  112 => 49,  110 => 48,  104 => 45,  98 => 42,  93 => 40,  85 => 35,  79 => 32,  72 => 27,  65 => 23,  59 => 20,  52 => 16,  48 => 14,  46 => 13,  43 => 12,  41 => 11,  38 => 10,);
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

{% import _self as page  %}

{% if postInstall %}
    <div class=\"mt-6 mb-2 py-6 px-6 bg-white shadow rounded font-sans\">
        <div class=\"text-lg text-gray-800 font-semibold leading-normal\">
            {{ __('Post-Install & Server Config') }}
        </div>

        <p class=\"mt-2 mb-0 text-gray-600\">
            {{ __('To complete your installation, it is advisable to follow the %1\$sPost-Install and Server Config instructions%2\$s.')|format(\"<a target='_blank' href='https://docs.gibbonedu.org/introduction/post-installation'>\", \"</a>\")|raw }}
            <br/><br/>

            {{ __('After logging in, be sure to visit the System Check page to ensure all system requirements have been met. You can find additional information about your system in the Server Info page.') }}
        </p>
    </div>
{% endif %}

<div class=\"mt-6 mb-2 bg-white shadow rounded font-sans\">

    <div class=\"py-6 px-6 border-b border-gray-300\">
        <div class=\"text-lg text-gray-800 font-semibold leading-normal\">
            {{ __('Getting Started with Gibbon') }}
        </div>

        <p class=\"mt-2 mb-0 text-gray-600\">{{ __('Our community offers documentation and support forums to help get you up and running with Gibbon. If you need additional assistance, members of the Gibbon team can provide expert support. Visit {link} to learn more.', {link: '<a href=\"http://gibbonedu.com\" target=\"_blank\" class=\"text-red-700 underline\">gibbonedu.com</a>'})|raw }}</p>
    </div>

    <div class=\"py-4 px-3 flex flex-wrap items-stretch\">

        {{ page.card(__('Documentation'), __('Our docs provide technical information as well as user guides for Administrators, Developers, Teachers, and Parents.'), 'docs', 'https://docs.gibbonedu.org' ) }}

        {{ page.card(__('Support Forums'), __('If you need help try asking members of the Gibbon community. Similarly, issues and bugs can be reported to the forum as well.'), 'forums', 'https://ask.gibbonedu.org' ) }}

        <div class=\"w-full text-base text-gray-600 font-light mt-6 mb-2 ml-3\">
            {{ __('Extended Services') }}
        </div>

        {% if gibboneduComOrganisationKey is empty %}

            {{ page.card(__('Expert Support'), __('Members of the Gibbon team are available to help with your Gibbon needs through Ad Hoc support or a Support Contract.'), 'support', 'http://gibbonedu.com' ) }}

            {{ page.card(__('Value Added License'), __('Gibbon Value Added License, which, via the Query Builder module, gives access to over 90 useful queries.'), 'license', 'http://gibbonedu.com') }}

        {% else %}

            {{ page.card(__('Expert Support'), __('Members of the Gibbon team are available to help with your Gibbon needs through Ad Hoc support or a Support Contract.'), 'support', absoluteURL~'/index.php?q=/modules/System Admin/services_manage.php', '') }}

            {{ page.card(__('Value Added License'), __('Gibbon Value Added License, which, via the Query Builder module, gives access to over 90 useful queries.'), 'license', absoluteURL~'/index.php?q=/modules/System Admin/services_manage.php', '') }}

        {% endif %}
    </div>

    {% if gibboneduComOrganisationKey is empty and gibbonVersion is not empty %}
    <div class=\"px-6 pt-3 pb-3 text-gray-600 border-t border-gray-300\">
        <p class=\"m-0\">
        {{ __('Do you have a Service Key? View and configure your licenses on the {link} page.', {link: '<a href=\"'~absoluteURL~'/index.php?q=/modules/System Admin/services_manage.php\" class=\"text-red-700 underline\">'~__('Manage Services')~'</a>'})|raw }}
        </p>
    </div>
    {% endif %}
</div>

{% macro card(name, content, icon = '', url = '', target = '_blank') %}
    <div class=\"w-full sm:w-1/2 pr-4\">
        <a href=\"{{ url }}\" target=\"{{ target }}\" class=\"flex bg-white rounded h-full text-gray-800 hover:bg-{{ themeColour }}-100 hover:text-{{ themeColour }}-800\">
            <div class=\"pl-4 pr-2 py-4\">
                {{ icon('large', icon, 'size-10 opacity-75 text-purple-700') }}
            </div>
            <div class=\"flex-1 p-4\">
                <p class=\"m-0 text-base font-semibold font-sans\">
                    {{ name }}
                </p>
                <p class=\"m-0 pt-3 text-gray-600 leading-tight\">
                    {{ content|raw }}
                </p>
            </div>
        </a>
    </div>
{% endmacro card %}
", "ui/gettingStarted.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/ui/gettingStarted.twig.html");
    }
}
