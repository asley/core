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

/* components/gridTable.twig.html */
class __TwigTemplate_f85b99bc21b23db27c3613eeb427ad9a extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'table' => [$this, 'block_table'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 11
        return "components/paginatedTable.twig.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("components/paginatedTable.twig.html", "components/gridTable.twig.html", 11);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 13
    public function block_table($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 14
        yield "    
<div id=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getID", [], "any", false, false, false, 15), "html", null, true);
        yield "\">
    <div class=\"dataTable\" data-results=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getResultCount", [], "any", false, false, false, 16), "html", null, true);
        yield "\">
        
    ";
        // line 18
        if ( !($context["hidePagination"] ?? null)) {
            // line 19
            yield "    ";
            yield from             $this->unwrap()->yieldBlock("header", $context, $blocks);
            yield "
    ";
        }
        // line 21
        yield "                    
    ";
        // line 22
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["dataSet"] ?? null), "getResultCount", [], "any", false, false, false, 22) == 0)) {
            // line 23
            yield "        <div class=\"h-24 rounded-sm border bg-gray-100 shadow-inner overflow-hidden\">
        ";
            // line 24
            yield from             $this->unwrap()->yieldBlock("blankslate", $context, $blocks);
            yield "
        </div>
    ";
        } else {
            // line 27
            yield "
        <div class=\"w-full\">
            ";
            // line 29
            yield ($context["gridHeader"] ?? null);
            yield "
        </div>

        <div class=\"flex flex-wrap ";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getMetaData", ["gridClass"], "method", true, true, false, 32)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getMetaData", ["gridClass"], "method", false, false, false, 32), "py-2")) : ("py-2")), "html", null, true);
            yield "\">
            
            ";
            // line 34
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["rows"] ?? null));
            foreach ($context['_seq'] as $context["rowIndex"] => $context["rowData"]) {
                // line 35
                yield "                ";
                yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["rowData"], "row", [], "any", false, false, false, 35), "getPrepended", [], "any", false, false, false, 35);
                yield "

                <div class=\"flex-col ";
                // line 37
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getMetaData", ["gridItemClass"], "method", true, true, false, 37)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getMetaData", ["gridItemClass"], "method", false, false, false, 37), "w-1/2 sm:w-1/3 text-center")) : ("w-1/2 sm:w-1/3 text-center")), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::replace(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["rowData"], "row", [], "any", false, false, false, 37), "getClass", [], "any", false, false, false, 37), ["odd" => "", "even" => ""]), "html", null, true);
                yield "\">
                ";
                // line 38
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["columns"] ?? null));
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
                foreach ($context['_seq'] as $context["columnIndex"] => $context["column"]) {
                    // line 39
                    yield "                    
                    ";
                    // line 40
                    $context["cell"] = (($__internal_compile_0 = CoreExtension::getAttribute($this->env, $this->source, $context["rowData"], "cells", [], "any", false, false, false, 40)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["columnIndex"]] ?? null) : null);
                    // line 41
                    yield "
                    <div class=\"";
                    // line 42
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["column"], "getClass", [], "any", false, false, false, 42), "html", null, true);
                    yield "\">
                        ";
                    // line 43
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["column"], "getID", [], "any", false, false, false, 43) == "actions")) {
                        yield " 
                            ";
                        // line 44
                        yield from                         $this->unwrap()->yieldBlock("actions", $context, $blocks);
                        yield "
                        ";
                    } else {
                        // line 46
                        yield "                            ";
                        yield CoreExtension::getAttribute($this->env, $this->source, $context["column"], "getOutput", [CoreExtension::getAttribute($this->env, $this->source, $context["rowData"], "data", [], "any", false, false, false, 46)], "method", false, false, false, 46);
                        yield "
                        ";
                    }
                    // line 48
                    yield "                    </div>

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
                unset($context['_seq'], $context['_iterated'], $context['columnIndex'], $context['column'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 51
                yield "                </div>

                ";
                // line 53
                yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["rowData"], "row", [], "any", false, false, false, 53), "getAppended", [], "any", false, false, false, 53);
                yield "

            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['rowIndex'], $context['rowData'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 56
            yield "
            
        </div>
    ";
        }
        // line 60
        yield "
    <div class=\"w-full\">
        ";
        // line 62
        yield ($context["gridFooter"] ?? null);
        yield "
    </div>

    ";
        // line 65
        yield from         $this->unwrap()->yieldBlock("footer", $context, $blocks);
        yield "
        
    </div>
</div>

";
        // line 70
        if ((($context["path"] ?? null) && ($context["identifier"] ?? null))) {
            // line 71
            yield "<script>
\$(function(){
    \$('#";
            // line 73
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["table"] ?? null), "getID", [], "any", false, false, false, 73), "html", null, true);
            yield "').gibbonDataTable( '";
            yield ($context["path"] ?? null);
            yield "', ";
            yield ($context["jsonData"] ?? null);
            yield ", '";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["identifier"] ?? null), "html", null, true);
            yield "');
});
</script>
";
        }
        // line 77
        yield "
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "components/gridTable.twig.html";
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
        return array (  232 => 77,  219 => 73,  215 => 71,  213 => 70,  205 => 65,  199 => 62,  195 => 60,  189 => 56,  180 => 53,  176 => 51,  160 => 48,  154 => 46,  149 => 44,  145 => 43,  141 => 42,  138 => 41,  136 => 40,  133 => 39,  116 => 38,  110 => 37,  104 => 35,  100 => 34,  95 => 32,  89 => 29,  85 => 27,  79 => 24,  76 => 23,  74 => 22,  71 => 21,  65 => 19,  63 => 18,  58 => 16,  54 => 15,  51 => 14,  47 => 13,  36 => 11,);
    }

    public function getSourceContext()
    {
        return new Source("", "components/gridTable.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/components/gridTable.twig.html");
    }
}
