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

/* ui/writingStudentOverview.twig.html */
class __TwigTemplate_bb5a33545f391f0d151775dd2e7a9165 extends Template
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
        if (($context["reportCriteria"] ?? null)) {
            // line 12
            yield "
    <h3>
        ";
            // line 14
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Report Overview"), "html", null, true);
            yield "
    </h3>

    ";
            // line 17
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["reportCriteria"] ?? null));
            foreach ($context['_seq'] as $context["course"] => $context["criteriaList"]) {
                // line 18
                yield "        ";
                $context["criteriaCheck"] = Twig\Extension\CoreExtension::last($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, $context["criteriaList"], function ($__v__) use ($context, $macros) { $context["v"] = $__v__; return (CoreExtension::getAttribute($this->env, $this->source, ($context["v"] ?? null), "criteriaTarget", [], "any", false, false, false, 18) == "Per Student"); }));
                // line 19
                yield "        

        <div class=\"mb-3\">
        <table class=\"w-full  ";
                // line 22
                yield (((($context["canWriteReport"] ?? null) && (CoreExtension::getAttribute($this->env, $this->source, ($context["criteriaCheck"] ?? null), "progress", [], "any", false, false, false, 22) == "Complete"))) ? ("border-green-600") : (""));
                yield "\">
        <thead>
            <tr>
                <th class=\"p-2 ";
                // line 25
                yield (((($context["canWriteReport"] ?? null) && (CoreExtension::getAttribute($this->env, $this->source, ($context["criteriaCheck"] ?? null), "progress", [], "any", false, false, false, 25) == "Complete"))) ? ("success") : (""));
                yield "\">
                    <h5 class=\"m-0 mt-1 p-0 text-sm border-0\" href=\"#\">
                        ";
                // line 27
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["criteriaCheck"] ?? null), "scopeName", [], "any", false, false, false, 27), "html", null, true);
                yield "
                    </h5>
                    <span class=\"font-normal leading-normal\">
                        ";
                // line 30
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["criteriaCheck"] ?? null), "teachers", [], "any", false, false, false, 30)) {
                    // line 31
                    yield "                            ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["criteriaCheck"] ?? null), "teachers", [], "any", false, false, false, 31), "html", null, true);
                    yield "

                            ";
                    // line 33
                    if (!CoreExtension::inFilter(((CoreExtension::getAttribute($this->env, $this->source, ($context["criteriaCheck"] ?? null), "preferredName", [], "any", false, false, false, 33) . " ") . CoreExtension::getAttribute($this->env, $this->source, ($context["criteriaCheck"] ?? null), "surname", [], "any", false, false, false, 33)), CoreExtension::getAttribute($this->env, $this->source, ($context["criteriaCheck"] ?? null), "teachers", [], "any", false, false, false, 33))) {
                        // line 34
                        yield "                                (";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Edited by {name}", ["name" => ((CoreExtension::getAttribute($this->env, $this->source, ($context["criteriaCheck"] ?? null), "preferredName", [], "any", false, false, false, 34) . " ") . CoreExtension::getAttribute($this->env, $this->source, ($context["criteriaCheck"] ?? null), "surname", [], "any", false, false, false, 34))]), "html", null, true);
                        yield ")
                            ";
                    }
                    // line 36
                    yield "                        ";
                } else {
                    // line 37
                    yield "                            ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["criteriaCheck"] ?? null), "preferredName", [], "any", false, false, false, 37) . " ") . CoreExtension::getAttribute($this->env, $this->source, ($context["criteriaCheck"] ?? null), "surname", [], "any", false, false, false, 37)), "html", null, true);
                    yield "
                        ";
                }
                // line 39
                yield "                    </span>
                </th>
                <th class=\"p-2 text-right font-normal ";
                // line 41
                yield (((($context["canWriteReport"] ?? null) && (CoreExtension::getAttribute($this->env, $this->source, ($context["criteriaCheck"] ?? null), "progress", [], "any", false, false, false, 41) == "Complete"))) ? ("success") : (""));
                yield "\">
                    ";
                // line 42
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["criteriaCheck"] ?? null), "progress", [], "any", false, false, false, 42), "html", null, true);
                yield "
                </th>
            </tr>
        </thead>
        
        ";
                // line 47
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable($context["criteriaList"]);
                foreach ($context['_seq'] as $context["_key"] => $context["criteria"]) {
                    // line 48
                    yield "            ";
                    if (( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "category", [], "any", false, false, false, 48)) && (CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "category", [], "any", false, false, false, 48) != ($context["lastCategory"] ?? null)))) {
                        // line 49
                        yield "                <tr class=\"\">
                    <td colspan=2 class=\"p-2 font-bold\">
                        ";
                        // line 51
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "category", [], "any", false, false, false, 51), "html", null, true);
                        yield "
                    </td>
                </tr>
            ";
                    }
                    // line 55
                    yield "
            <tr class=\"\">
            ";
                    // line 57
                    if (((CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "valueType", [], "any", false, false, false, 57) == "Comment") || (CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "valueType", [], "any", false, false, false, 57) == "Remark"))) {
                        // line 58
                        yield "                <td colspan=2 class=\"p-2\">
                    <strong class=\"inline-block pt-1\">";
                        // line 59
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "name", [], "any", false, false, false, 59), "html", null, true);
                        yield "</strong>

                    <p class=\"mt-2 mb-1 \">
                        ";
                        // line 62
                        if (CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "comment", [], "any", false, false, false, 62)) {
                            yield " 
                            ";
                            // line 63
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "comment", [], "any", false, false, false, 63), "html", null, true);
                            yield "
                        ";
                        } else {
                            // line 65
                            yield "                            <span class=\"text-xxs text-gray-600 italic\">";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("N/A"), "html", null, true);
                            yield " </span>
                        ";
                        }
                        // line 67
                        yield "                        </p>
                </td>
            ";
                    } else {
                        // line 70
                        yield "                <td class=\"p-2 py-1\">
                    <span class=\"inline-block py-1\">";
                        // line 71
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "name", [], "any", false, false, false, 71), "html", null, true);
                        yield "</span>
                </td>
                <td class=\"p-2 py-1 w-48 border-l-0 border-r-0\">
                    ";
                        // line 74
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "value", [], "any", false, false, false, 74), "html", null, true);
                        yield "
                </td>
            ";
                    }
                    // line 77
                    yield "            </tr>

            ";
                    // line 79
                    $context["lastCategory"] = CoreExtension::getAttribute($this->env, $this->source, $context["criteria"], "category", [], "any", false, false, false, 79);
                    // line 80
                    yield "        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['criteria'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 81
                yield "        </table>
        </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['course'], $context['criteriaList'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            yield "
";
        }
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ui/writingStudentOverview.twig.html";
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
        return array (  211 => 84,  203 => 81,  197 => 80,  195 => 79,  191 => 77,  185 => 74,  179 => 71,  176 => 70,  171 => 67,  165 => 65,  160 => 63,  156 => 62,  150 => 59,  147 => 58,  145 => 57,  141 => 55,  134 => 51,  130 => 49,  127 => 48,  123 => 47,  115 => 42,  111 => 41,  107 => 39,  101 => 37,  98 => 36,  92 => 34,  90 => 33,  84 => 31,  82 => 30,  76 => 27,  71 => 25,  65 => 22,  60 => 19,  57 => 18,  53 => 17,  47 => 14,  43 => 12,  41 => 11,  38 => 10,);
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

{% if reportCriteria %}

    <h3>
        {{ __('Report Overview') }}
    </h3>

    {% for course, criteriaList in reportCriteria %}
        {% set criteriaCheck = criteriaList|filter(v => v.criteriaTarget == 'Per Student')|last %}
        

        <div class=\"mb-3\">
        <table class=\"w-full  {{ canWriteReport and criteriaCheck.progress == 'Complete' ? 'border-green-600'}}\">
        <thead>
            <tr>
                <th class=\"p-2 {{ canWriteReport and criteriaCheck.progress == 'Complete' ? 'success'}}\">
                    <h5 class=\"m-0 mt-1 p-0 text-sm border-0\" href=\"#\">
                        {{ criteriaCheck.scopeName }}
                    </h5>
                    <span class=\"font-normal leading-normal\">
                        {% if criteriaCheck.teachers %}
                            {{ criteriaCheck.teachers }}

                            {% if (criteriaCheck.preferredName~\" \"~criteriaCheck.surname) not in criteriaCheck.teachers %}
                                ({{__('Edited by {name}', {'name': criteriaCheck.preferredName~\" \"~criteriaCheck.surname })}})
                            {% endif %}
                        {% else %}
                            {{ criteriaCheck.preferredName~\" \"~criteriaCheck.surname }}
                        {% endif %}
                    </span>
                </th>
                <th class=\"p-2 text-right font-normal {{ canWriteReport and criteriaCheck.progress == 'Complete' ? 'success'}}\">
                    {{ criteriaCheck.progress }}
                </th>
            </tr>
        </thead>
        
        {% for criteria in criteriaList %}
            {% if criteria.category is not empty and criteria.category != lastCategory %}
                <tr class=\"\">
                    <td colspan=2 class=\"p-2 font-bold\">
                        {{ criteria.category }}
                    </td>
                </tr>
            {% endif %}

            <tr class=\"\">
            {% if criteria.valueType == 'Comment' or criteria.valueType == 'Remark' %}
                <td colspan=2 class=\"p-2\">
                    <strong class=\"inline-block pt-1\">{{ criteria.name }}</strong>

                    <p class=\"mt-2 mb-1 \">
                        {% if criteria.comment %} 
                            {{ criteria.comment }}
                        {% else %}
                            <span class=\"text-xxs text-gray-600 italic\">{{ __('N/A') }} </span>
                        {% endif%}
                        </p>
                </td>
            {% else %}
                <td class=\"p-2 py-1\">
                    <span class=\"inline-block py-1\">{{ criteria.name }}</span>
                </td>
                <td class=\"p-2 py-1 w-48 border-l-0 border-r-0\">
                    {{ criteria.value }}
                </td>
            {% endif%}
            </tr>

            {% set lastCategory = criteria.category %}
        {% endfor %}
        </table>
        </div>
    {% endfor %}

{% endif %}
", "ui/writingStudentOverview.twig.html", "/Applications/MAMP/htdocs/chhs/modules/Reports/templates/ui/writingStudentOverview.twig.html");
    }
}
