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

/* welcome.twig.html */
class __TwigTemplate_6d966f6e0a071d23079c5d37ac0c14de extends Template
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
        $macros["homepage"] = $this->macros["homepage"] = $this;
        // line 11
        yield "
<div class=\"flex flex-wrap mb-4 -mx-2 items-stretch \">
    <div class=\"w-full mx-2 my-2\">
        <h2>";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Welcome"), "html", null, true);
        yield "</h2>
        <p>
        ";
        // line 16
        yield ($context["indexText"] ?? null);
        yield "
        </p>
    </div>

    ";
        // line 20
        if (($context["admissionsEnabled"] ?? null)) {
            // line 21
            yield "        ";
            yield CoreExtension::callMacro($macros["homepage"], "macro_card", [$this->env->getFunction('__')->getCallable()(            // line 22
($context["admissionsLinkName"] ?? null)), $this->env->getFunction('__')->getCallable()(            // line 23
($context["admissionsLinkText"] ?? null)), "/?q=/modules/Admissions/applicationFormSelect.php",             // line 25
($context["organisationName"] ?? null), "first"], 21, $context, $this->getSourceContext());
            // line 27
            yield "

    ";
        } elseif (        // line 29
($context["publicStudentApplications"] ?? null)) {
            // line 30
            yield "        ";
            yield CoreExtension::callMacro($macros["homepage"], "macro_card", [$this->env->getFunction('__')->getCallable()("Student Applications"), $this->env->getFunction('__')->getCallable()("Parents of students interested in study at %1\$s may use our %2\$s online form%3\$s to initiate the application process."), "/?q=/modules/Students/applicationForm.php",             // line 34
($context["organisationName"] ?? null), "first"], 30, $context, $this->getSourceContext());
            // line 36
            yield "
    ";
        }
        // line 38
        yield "
    ";
        // line 39
        if (($context["publicStaffApplications"] ?? null)) {
            // line 40
            yield "        ";
            yield CoreExtension::callMacro($macros["homepage"], "macro_card", [$this->env->getFunction('__')->getCallable()("Staff Applications"), $this->env->getFunction('__')->getCallable()("Individuals interested in working at %1\$s may use our %2\$s online form%3\$s to view job openings and begin the recruitment process."), "/?q=/modules/Staff/applicationForm_jobOpenings_view.php",             // line 44
($context["organisationName"] ?? null), "first"], 40, $context, $this->getSourceContext());
            // line 46
            yield "
    ";
        }
        // line 48
        yield "
    ";
        // line 49
        if (($context["publicRegistration"] ?? null)) {
            // line 50
            yield "        ";
            yield CoreExtension::callMacro($macros["homepage"], "macro_card", [$this->env->getFunction('__')->getCallable()("Register"), (($this->env->getFunction('__')->getCallable()("Join our learning community.") . " ") . $this->env->getFunction('__')->getCallable()("It's free!")), "/?q=/publicRegistration.php"], 50, $context, $this->getSourceContext());
            // line 54
            yield "

    ";
        }
        // line 57
        yield "
    ";
        // line 58
        if (($context["makeDepartmentsPublic"] ?? null)) {
            // line 59
            yield "        ";
            yield CoreExtension::callMacro($macros["homepage"], "macro_card", [$this->env->getFunction('__')->getCallable()("Departments"), $this->env->getFunction('__')->getCallable()("Please feel free to %1\$sbrowse our departmental information%2\$s, to learn more about %3\$s."), "/?q=/modules/Departments/departments.php",             // line 63
($context["organisationName"] ?? null), "second"], 59, $context, $this->getSourceContext());
            // line 65
            yield "
    ";
        }
        // line 67
        yield "
    ";
        // line 68
        if (($context["makeUnitsPublic"] ?? null)) {
            // line 69
            yield "        ";
            yield CoreExtension::callMacro($macros["homepage"], "macro_card", [$this->env->getFunction('__')->getCallable()("Learn With Us"), $this->env->getFunction('__')->getCallable()("We are sharing some of our units of study with members of the public, so you can learn with us. Feel free to %1\$sbrowse our public units%2\$s."), "/?q=/modules/Planner/units_public.php&sidebar=false",             // line 73
($context["organisationName"] ?? null), "second"], 69, $context, $this->getSourceContext());
            // line 75
            yield "
    ";
        }
        // line 77
        yield "
    ";
        // line 78
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["indexHooks"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["hook"]) {
            // line 79
            yield "        ";
            yield CoreExtension::callMacro($macros["homepage"], "macro_card", [CoreExtension::getAttribute($this->env, $this->source, $context["hook"], "title", [], "any", false, false, false, 79), CoreExtension::getAttribute($this->env, $this->source, $context["hook"], "text", [], "any", false, false, false, 79), CoreExtension::getAttribute($this->env, $this->source, $context["hook"], "url", [], "any", false, false, false, 79), ($context["organisationName"] ?? null)], 79, $context, $this->getSourceContext());
            yield "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hook'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        yield "
    ";
        // line 82
        if (($context["privacyPolicy"] ?? null)) {
            // line 83
            yield "        ";
            yield CoreExtension::callMacro($macros["homepage"], "macro_card", [$this->env->getFunction('__')->getCallable()("Privacy Policy"), $this->env->getFunction('__')->getCallable()("Read more about how personal data is used, stored and retained at %1\$s."), "/?q=privacyPolicy.php",             // line 87
($context["organisationName"] ?? null), "first"], 83, $context, $this->getSourceContext());
            // line 89
            yield "
    ";
        }
        // line 91
        yield "</div>
";
        return; yield '';
    }

    // line 92
    public function macro_card($__name__ = null, $__content__ = null, $__url__ = "", $__organisationName__ = null, $__orgNamePos__ = "first", ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "name" => $__name__,
            "content" => $__content__,
            "url" => $__url__,
            "organisationName" => $__organisationName__,
            "orgNamePos" => $__orgNamePos__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 93
            yield "

    <div class=\"w-full sm:w-1/2 px-2 pb-4\">
        <a href=\"";
            // line 96
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["absoluteURL"] ?? null) . ($context["url"] ?? null)), "html", null, true);
            yield "\" class=\"block border shadow-sm rounded bg-white h-full text-gray-800 hover:shadow-md hover:text-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
            yield "-800 hover:border-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
            yield "-600\">
            <div class=\"block m-0 pt-4 px-4 text-base uppercase font-bold font-sans tracking-tight\">
                ";
            // line 98
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["name"] ?? null), "html", null, true);
            yield "
                ";
            // line 99
            yield $this->env->getFunction('icon')->getCallable()("basic", "chevron-double-right", "size-6 float-right -mt-px fill-current");
            yield "
            </div>
            <p class=\"mb-1 p-4 text-gray-700 leading-tight\">
                ";
            // line 102
            if ((($context["orgNamePos"] ?? null) == "first")) {
                // line 103
                yield "                    ";
                yield Twig\Extension\CoreExtension::sprintf(($context["content"] ?? null), ($context["organisationName"] ?? null), "", "");
                yield "
                ";
            } elseif ((            // line 104
($context["orgNamePos"] ?? null) == "second")) {
                // line 105
                yield "                    ";
                yield Twig\Extension\CoreExtension::sprintf(($context["content"] ?? null), "", "", ($context["organisationName"] ?? null));
                yield "
                ";
            } else {
                // line 107
                yield "                    ";
                yield ($context["content"] ?? null);
                yield "
                ";
            }
            // line 109
            yield "            </p>
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
        return "welcome.twig.html";
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
        return array (  227 => 109,  221 => 107,  215 => 105,  213 => 104,  208 => 103,  206 => 102,  200 => 99,  196 => 98,  187 => 96,  182 => 93,  166 => 92,  160 => 91,  156 => 89,  154 => 87,  152 => 83,  150 => 82,  147 => 81,  138 => 79,  134 => 78,  131 => 77,  127 => 75,  125 => 73,  123 => 69,  121 => 68,  118 => 67,  114 => 65,  112 => 63,  110 => 59,  108 => 58,  105 => 57,  100 => 54,  97 => 50,  95 => 49,  92 => 48,  88 => 46,  86 => 44,  84 => 40,  82 => 39,  79 => 38,  75 => 36,  73 => 34,  71 => 30,  69 => 29,  65 => 27,  63 => 25,  62 => 23,  61 => 22,  59 => 21,  57 => 20,  50 => 16,  45 => 14,  40 => 11,  38 => 10,);
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
{% import _self as homepage  %}

<div class=\"flex flex-wrap mb-4 -mx-2 items-stretch \">
    <div class=\"w-full mx-2 my-2\">
        <h2>{{ __('Welcome') }}</h2>
        <p>
        {{ indexText | raw }}
        </p>
    </div>

    {% if admissionsEnabled %}
        {{ homepage.card(
            __(admissionsLinkName), 
            __(admissionsLinkText), 
            \"/?q=/modules/Admissions/applicationFormSelect.php\",
            organisationName,
            'first'
        ) }}

    {% elseif publicStudentApplications %}
        {{ homepage.card(
            __('Student Applications'), 
            __('Parents of students interested in study at %1\$s may use our %2\$s online form%3\$s to initiate the application process.'), 
            \"/?q=/modules/Students/applicationForm.php\",
            organisationName,
            'first'
        ) }}
    {% endif %}

    {% if publicStaffApplications %}
        {{ homepage.card(
            __('Staff Applications'), 
            __('Individuals interested in working at %1\$s may use our %2\$s online form%3\$s to view job openings and begin the recruitment process.'),
            \"/?q=/modules/Staff/applicationForm_jobOpenings_view.php\",
            organisationName,
            'first'
        ) }}
    {% endif %}

    {% if publicRegistration %}
        {{ homepage.card(
            __('Register'), 
            __('Join our learning community.') ~ ' ' ~ __(\"It's free!\"), 
            \"/?q=/publicRegistration.php\"
        ) }}

    {% endif %}

    {% if makeDepartmentsPublic %}
        {{ homepage.card(
            __('Departments'), 
            __('Please feel free to %1\$sbrowse our departmental information%2\$s, to learn more about %3\$s.'),
            \"/?q=/modules/Departments/departments.php\",
            organisationName,
            'second'
        ) }}
    {% endif %}

    {% if makeUnitsPublic %}
        {{ homepage.card(
            __('Learn With Us'), 
            __('We are sharing some of our units of study with members of the public, so you can learn with us. Feel free to %1\$sbrowse our public units%2\$s.'),
            \"/?q=/modules/Planner/units_public.php&sidebar=false\",
            organisationName,
            'second'
        ) }}
    {% endif %}

    {% for hook in indexHooks %}
        {{ homepage.card(hook.title, hook.text, hook.url, organisationName) }}
    {% endfor %}

    {% if privacyPolicy %}
        {{ homepage.card(
            __('Privacy Policy'), 
            __('Read more about how personal data is used, stored and retained at %1\$s.'),
            \"/?q=privacyPolicy.php\",
            organisationName,
            'first'
        ) }}
    {% endif %}
</div>
{% macro card(name, content, url = '', organisationName, orgNamePos = 'first') %}


    <div class=\"w-full sm:w-1/2 px-2 pb-4\">
        <a href=\"{{ absoluteURL ~ url }}\" class=\"block border shadow-sm rounded bg-white h-full text-gray-800 hover:shadow-md hover:text-{{ themeColour }}-800 hover:border-{{ themeColour }}-600\">
            <div class=\"block m-0 pt-4 px-4 text-base uppercase font-bold font-sans tracking-tight\">
                {{ name }}
                {{ icon('basic', 'chevron-double-right', 'size-6 float-right -mt-px fill-current') }}
            </div>
            <p class=\"mb-1 p-4 text-gray-700 leading-tight\">
                {% if orgNamePos == 'first' %}
                    {{ content|format(organisationName, '', '')|raw }}
                {% elseif orgNamePos == 'second' %}
                    {{ content|format('', '', organisationName)|raw }}
                {% else %}
                    {{ content|raw }}
                {% endif %}
            </p>
        </a>
    </div>

{% endmacro card %}
", "welcome.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/welcome.twig.html");
    }
}
