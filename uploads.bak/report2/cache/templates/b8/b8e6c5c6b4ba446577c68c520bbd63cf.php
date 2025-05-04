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

/* ui/templateBuilder.twig.html */
class __TwigTemplate_14450d3c9357a09a769bd881146abcb1 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'component' => [$this, 'block_component'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        yield "
<div class=\"flex mt-4\">

    <a href=\"./fullscreen.php?q=/modules/Reports/templates_preview.php&gibbonReportTemplateID=";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonReportTemplateID"] ?? null), "html", null, true);
        yield "&TB_iframe=true&width=";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["template"] ?? null), "orientation", [], "any", false, false, false, 13) == "P")) ? (900) : (1200));
        yield "&height=700\" class=\"thickbox w-full mr-1 py-3 bg-gray-100 border text-gray-700 text-center text-base font-bold hover:bg-blue-500 hover:border-blue-700 hover:text-white\">
        <img class=\"w-5 h-5 opacity-50 mr-2 align-text-bottom \" src=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/modules/Reports/img/icons/file-alt.svg\">
        ";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Preview HTML"), "html", null, true);
        yield "
    </a>
    
    <a href=\"./export.php?q=/modules/Reports/templates_preview.php&gibbonReportTemplateID=";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonReportTemplateID"] ?? null), "html", null, true);
        yield "\" class=\"w-full py-3 bg-gray-100 border text-gray-700 text-center text-base font-bold hover:bg-blue-500 hover:border-blue-700 hover:text-white\">
        <img class=\"w-5 h-5 opacity-50 mr-2 align-text-bottom \" src=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/modules/Reports/img/icons/file-pdf.svg\">
        ";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Preview PDF"), "html", null, true);
        yield "
    </a>
</div>
        

<section class=\"flex items-stretch\">
    <div class=\"flex-1 pr-6\">
        ";
        // line 27
        yield ($context["headers"] ?? null);
        yield "

        ";
        // line 29
        yield ($context["body"] ?? null);
        yield "

        ";
        // line 31
        yield ($context["footers"] ?? null);
        yield "
    </div>

    <div id=\"sections\" class=\"w-2/5 h-full\">
        <h3>
            ";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Add Sections"), "html", null, true);
        yield " <span class=\"text-xxs font-normal\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Drag & Drop"), "html", null, true);
        yield "</span>
        </h3>

        <div id='tabs'>
            <ul>
                <li><a href='#tabs0'>";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Core"), "html", null, true);
        yield "</a></li>
                <li><a href='#tabs1'>";
        // line 42
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Additional"), "html", null, true);
        yield "</a></li>
                <!-- <li><a href='#tabs2'>";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Settings"), "html", null, true);
        yield "</a></li> -->
            </ul>

            <div id=\"tabs0\" class=\"prototype\" style=\"padding: 1rem 0 0.5rem 1rem !important;\">
            ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["coreSections"] ?? null));
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
        foreach ($context['_seq'] as $context["category"] => $context["sectionList"]) {
            // line 48
            yield "                <div class=\"text-gray-600 text-xs mb-1 ";
            yield (( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 48)) ? ("mt-3") : (""));
            yield "\">
                    ";
            // line 49
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), $context["category"]), "html", null, true);
            yield "
                </div>

                <div class=\"flex flex-wrap items-stretch\">
                ";
            // line 53
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["sectionList"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
                // line 54
                yield "
                    ";
                // line 55
                yield from $this->unwrap()->yieldBlock('component', $context, $blocks);
                // line 65
                yield "                ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 66
            yield "                </div>
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
        unset($context['_seq'], $context['_iterated'], $context['category'], $context['sectionList'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        yield "            </div>

            <div id=\"tabs1\" class=\"prototype\"  style=\"padding: 1rem 0 0.5rem 1rem !important;\">
            ";
        // line 71
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["additionalSections"] ?? null));
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
        foreach ($context['_seq'] as $context["category"] => $context["sectionList"]) {
            // line 72
            yield "                <div class=\"text-gray-600 text-xs mb-1 ";
            yield (( !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 72)) ? ("mt-3") : (""));
            yield "\">
                    ";
            // line 73
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), $context["category"]), "html", null, true);
            yield "
                </div>

                <div class=\"flex flex-wrap\">
                ";
            // line 77
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["sectionList"]);
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
            foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
                // line 78
                yield "                    ";
                yield from                 $this->unwrap()->yieldBlock("component", $context, $blocks);
                yield "
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 80
            yield "                </div>
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
        unset($context['_seq'], $context['_iterated'], $context['category'], $context['sectionList'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        yield "            </div>

            <!-- <div id=\"tabs2\" class=\"prototype\" style=\"padding: 1rem !important;\">
                ";
        // line 85
        yield ($context["form"] ?? null);
        yield "
            </div> -->
        </div>
    </div>
</section>

<script>

    \$(\"#tabs\").tabs({
        active: 'tabs0',
        ajaxOptions: {
            error: function( xhr, status, index, anchor ) {
                \$(anchor.hash).html(\"Couldn't load this tab.\");
            }
        }
    });

    \$('#sections .prototype .prototypeItem').draggable({
        helper: \"clone\",
        revert: \"invalid\",
    });

    var DroppableDataTable = {
        accept: '.prototypeItem',
        over: function(event, ui) {
            \$(this).addClass('relative');
            \$(this).append('<div id=\"droppable-overlay\" class=\"absolute top-0 left-0 w-full h-full rounded-sm opacity-75 bg-transparent-600 flex items-stretch z-10\"><div class=\"flex-1 flex justify-center items-center m-3 border-4 border-dashed border-white text-white text-xl font-bold uppercase\">";
        // line 111
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Drop Here"), "html", null, true);
        yield "</div></div>');
        },
        out: function(event, ui) {
            \$('#droppable-overlay').remove();
            \$(this).removeClass('relative');
        },
        deactivate: function(event, ui) {
            \$('#droppable-overlay').remove();
            \$(this).removeClass('relative');
        },
        drop: function(event, ui) {
            var table = \$(this);

            var tableSelector = \$(table).prop('id');

            \$.ajax({
                url: '";
        // line 127
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/modules/Reports/templates_manage_editDropAjax.php',
                data: {
                    gibbonReportTemplateID: \"";
        // line 129
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonReportTemplateID"] ?? null), "html", null, true);
        yield "\",
                    gibbonReportPrototypeSectionID: ui.draggable.data('section'),
                    type: \$(table).prop('id').replace('Table', '').toUpperCase(),
                },
                type: 'POST',
                complete: function (data) {
                    reloadDragDropState(table, tableSelector);
                },
                
            });
        },
    };

    var reloadDragDropState = function(table, tableSelector) {
        \$(table).load('./fullscreen.php?q=/modules/Reports/templates_manage_edit.php&gibbonReportTemplateID=";
        // line 143
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonReportTemplateID"] ?? null), "html", null, true);
        yield " #'+tableSelector, {}, function(responseText, textStatus, jqXHR) {
            \$('#'+tableSelector).droppable(DroppableDataTable);
            htmx.process(this);
            htmx.trigger(this, 'htmx:load');
        });
    };

    \$('.dataTable').droppable(DroppableDataTable);
</script>
";
        return; yield '';
    }

    // line 55
    public function block_component($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 56
        yield "                    <div class=\"prototypeItem w-full sm:w-20 lg:w-24 flex flex-col items-center justify-around group relative p-2 mr-2 mb-2 bg-white border rounded hover:shadow-md hover:border-gray-500 cursor-move z-10\" data-section=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["section"] ?? null), "value", [], "any", false, false, false, 56), "html", null, true);
        yield "\">
                        <a class=\"thickbox absolute top-0 mt-1 right-0 mr-1 hidden group-hover:block opacity-50 hover:opacity-100\" href=\"";
        // line 57
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/fullscreen.php?q=/modules/Reports/templates_assets_components_preview.php&gibbonReportTemplateID=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonReportTemplateID"] ?? null), "html", null, true);
        yield "&gibbonReportPrototypeSectionID=";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["section"] ?? null), "value", [], "any", false, false, false, 57), "html", null, true);
        yield "&TB_iframe=true&width=900&height=500\">
                            <img class=\"w-4 h-4\" title=\"";
        // line 58
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Preview"), "html", null, true);
        yield "\" src=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/themes/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["gibbonThemeName"] ?? null), "html", null, true);
        yield "/img/plus.png\" >
                        </a>

                        <img class=\"w-8 h-8 opacity-50 mb-2\" src=\"";
        // line 61
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/modules/Reports/img/icons/";
        ((CoreExtension::getAttribute($this->env, $this->source, ($context["section"] ?? null), "icon", [], "any", false, false, false, 61)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["section"] ?? null), "icon", [], "any", false, false, false, 61), "html", null, true)) : (yield "grip-lines.svg"));
        yield "\">
                        <div class=\"text-center text-gray-600 text-xs leading-tight mt-px\">";
        // line 62
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["section"] ?? null), "name", [], "any", false, false, false, 62), "html", null, true);
        yield "</div>
                    </div>
                    ";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "ui/templateBuilder.twig.html";
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
        return array (  407 => 62,  401 => 61,  391 => 58,  383 => 57,  378 => 56,  374 => 55,  359 => 143,  342 => 129,  337 => 127,  318 => 111,  289 => 85,  284 => 82,  269 => 80,  252 => 78,  235 => 77,  228 => 73,  223 => 72,  206 => 71,  201 => 68,  186 => 66,  172 => 65,  170 => 55,  167 => 54,  150 => 53,  143 => 49,  138 => 48,  121 => 47,  114 => 43,  110 => 42,  106 => 41,  96 => 36,  88 => 31,  83 => 29,  78 => 27,  68 => 20,  64 => 19,  60 => 18,  54 => 15,  50 => 14,  44 => 13,  39 => 10,);
    }

    public function getSourceContext()
    {
        return new Source("", "ui/templateBuilder.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/ui/templateBuilder.twig.html");
    }
}
