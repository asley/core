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

/* ui/archiveStudentHeader.twig.html */
class __TwigTemplate_08a63485964993c60b1bdcc3a20defe5 extends Template
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
<div class=\"border rounded bg-gray-100 my-4\">
    <div class=\"p-4 flex flex-wrap items-center\">
        <div class=\"flex h-32 justify-center sm:justify-start items-center text-xs text-center mt-4 sm:mt-0\">
            ";
        // line 14
        yield $this->env->getFunction('formatUsing')->getCallable()("userPhoto", CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "image_240", [], "any", false, false, false, 14), 75);
        yield "
        </div>

        <div class=\"flex-1 text-center sm:text-left sm:pl-6\">
            <div class=\"text-lg text-gray-800 leading-none mb-2 p-0\">";
        // line 18
        yield $this->env->getFunction('formatUsing')->getCallable()("name", CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "title", [], "any", false, false, false, 18), CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "preferredName", [], "any", false, false, false, 18), CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "surname", [], "any", false, false, false, 18), "Student", false, true);
        yield "</div>

            <div class=\"text-sm text-gray-600 mb-0\">";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["student"] ?? null), "formGroup", [], "any", false, false, false, 20), "html", null, true);
        yield "</div>

            ";
        // line 22
        if (($context["status"] ?? null)) {
            // line 23
            yield "                <span class=\"tag ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("tag", $context)) ? (Twig\Extension\CoreExtension::default(($context["tag"] ?? null), "success")) : ("success")), "html", null, true);
            yield " mt-2 mb-0\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["status"] ?? null), "html", null, true);
            yield "</span>
            ";
        }
        // line 25
        yield "        </div>
    </div>
</div>

";
        // line 29
        if (($context["archiveInformation"] ?? null)) {
            // line 30
            yield "<p class=\"text-left mb-8\">";
            yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["archiveInformation"] ?? null), "html", null, true));
            yield "</p>
";
        }
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ui/archiveStudentHeader.twig.html";
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
        return array (  79 => 30,  77 => 29,  71 => 25,  63 => 23,  61 => 22,  56 => 20,  51 => 18,  44 => 14,  38 => 10,);
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

<div class=\"border rounded bg-gray-100 my-4\">
    <div class=\"p-4 flex flex-wrap items-center\">
        <div class=\"flex h-32 justify-center sm:justify-start items-center text-xs text-center mt-4 sm:mt-0\">
            {{ formatUsing('userPhoto', student.image_240, 75)|raw }}
        </div>

        <div class=\"flex-1 text-center sm:text-left sm:pl-6\">
            <div class=\"text-lg text-gray-800 leading-none mb-2 p-0\">{{ formatUsing('name', student.title, student.preferredName, student.surname, 'Student', false, true) }}</div>

            <div class=\"text-sm text-gray-600 mb-0\">{{ student.formGroup }}</div>

            {% if status %}
                <span class=\"tag {{ tag|default('success') }} mt-2 mb-0\">{{ status }}</span>
            {% endif %}
        </div>
    </div>
</div>

{% if archiveInformation %}
<p class=\"text-left mb-8\">{{ archiveInformation|nl2br|raw }}</p>
{% endif %}
", "ui/archiveStudentHeader.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/ui/archiveStudentHeader.twig.html");
    }
}
