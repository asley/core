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

/* components/editor.twig.html */
class __TwigTemplate_81f322eb0d98f401ff9c9bfa057f7cd8 extends Template
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
";
        // line 13
        $context["resourceAlphaSort"] = ((($context["resourceAlphaSort"] ?? null)) ? ("true") : ("false"));
        // line 14
        yield "
<a name=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "editor\"></a>

<div class=\"editor-toolbar flex flex-wrap sm:flex-no-wrap justify-between text-xs\">

    ";
        // line 19
        if (($context["showMedia"] ?? null)) {
            // line 20
            yield "    <div id=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "mediaOuter\" class=\"h-6\">
        <div id=\"";
            // line 21
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "mediaInner\" class=\"flex items-center py-1\">
            <script type=\"text/javascript\">
            \$(document).ready(function(){
                \$(\".";
            // line 24
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "resourceSlider, .";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "resourceAddSlider, .";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "resourceQuickSlider\").hide();
                \$(\".";
            // line 25
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "show_hide\").unbind('click').click(function(){
                    \$(\".";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "resourceSlider\").slideToggle();
                    \$(\".";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "resourceAddSlider, .";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "resourceQuickSlider\").hide();
                    if (tinyMCE.get('";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "').selection.getRng().startOffset < 1) {
                        tinyMCE.get('";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "').focus();
                    }
                });
                \$(\".";
            // line 32
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "show_hideAdd\").unbind('click').click(function(){
                    \$(\".";
            // line 33
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "resourceAddSlider\").slideToggle();
                    \$(\".";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "resourceSlider, .";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "resourceQuickSlider\").hide();
                    if (tinyMCE.get('";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "').selection.getRng().startOffset < 1) {
                        tinyMCE.get('";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "').focus();
                    }
                });
                \$(\".";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "show_hideQuickAdd\").unbind('click').click(function(){
                \$(\".";
            // line 40
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "resourceQuickSlider\").slideToggle();
                \$(\".";
            // line 41
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "resourceSlider, .";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "resourceAddSlider\").hide();
                if (tinyMCE.get('";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "').selection.getRng().startOffset < 1) {
                    tinyMCE.get('";
            // line 43
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "').focus();
                }
                });
            });
            </script>

            <div class=\"mr-2 flex items-center\">
                <span>";
            // line 50
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Shared Resources"), "html", null, true);
            yield ":</span> 
        
                <a title=\"";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Insert Existing Resource"), "html", null, true);
            yield "\" class=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "show_hide mx-1\" onclick='\$(\".";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "resourceSlider\").load(\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
            yield "/modules/Planner/resources_insert_ajax.php?alpha=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["resourceAlphaSort"] ?? null), "html", null, true);
            yield "&";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["initialFilter"] ?? null), "html", null, true);
            yield "\",\"id=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "&allowUpload=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["allowUpload"] ?? null), "html", null, true);
            yield "\");'>
                    ";
            // line 53
            yield $this->env->getFunction('icon')->getCallable()("solid", "search", "size-5 text-gray-600");
            yield "
                </a>
            
                ";
            // line 56
            if (($context["allowUpload"] ?? null)) {
                // line 57
                yield "                <a title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Create & Insert New Resource"), "html", null, true);
                yield "\" class=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
                yield "show_hideAdd mx-1\" onclick='\$(\".";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
                yield "resourceAddSlider\").load(\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
                yield "/modules/Planner/resources_add_ajax.php?alpha=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["resourceAlphaSort"] ?? null), "html", null, true);
                yield "&";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["initialFilter"] ?? null), "html", null, true);
                yield "\",\"id=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
                yield "&allowUpload=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["allowUpload"] ?? null), "html", null, true);
                yield "\");'>
                    ";
                // line 58
                yield $this->env->getFunction('icon')->getCallable()("solid", "zoom", "size-5 text-gray-600");
                yield "
                </a>
                ";
            }
            // line 61
            yield "            </div>
            
            ";
            // line 63
            if (($context["allowUpload"] ?? null)) {
                // line 64
                yield "            <div class=\"mr-2 flex items-center\">
                <span>";
                // line 65
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Quick File Upload"), "html", null, true);
                yield ":</span> 

                <a title=\"";
                // line 67
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Quick Add"), "html", null, true);
                yield "\" class=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
                yield "show_hideQuickAdd mx-1\" onclick='\$(\".";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
                yield "resourceQuickSlider\").load(\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
                yield "/modules/Planner/resources_addQuick_ajax.php?alpha=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["resourceAlphaSort"] ?? null), "html", null, true);
                yield "&";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["initialFilter"] ?? null), "html", null, true);
                yield "\",\"id=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
                yield "&allowUpload=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["allowUpload"] ?? null), "html", null, true);
                yield "\");'>
                    ";
                // line 68
                yield $this->env->getFunction('icon')->getCallable()("solid", "add", "size-5 text-gray-600");
                yield "
                </a>
            </div>
            ";
            }
            // line 72
            yield "        </div>
    </div>
    ";
        }
        // line 75
        yield "
    <div class=\"editor-tabs flex flex-grow justify-end items-end\">
        <a id=\"";
        // line 77
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "edButtonPreview\" class=\"active hide-if-no-js block cursor-pointer bg-gray-100 text-gray-500 border border-b-0 rounded-t px-4 pt-2 pb-1 mx-1 font-bold z-10\">
            ";
        // line 78
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Visual"), "html", null, true);
        yield "
        </a>
        <a id=\"";
        // line 80
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "edButtonHTML\" class=\"hide-if-no-js block cursor-pointer bg-gray-100 text-gray-500 border border-b-0 rounded-t px-4 pt-2 pb-1 mx-1 font-bold z-10\">
            HTML
        </a>
    </div>
</div>


";
        // line 87
        if (($context["showMedia"] ?? null)) {
            // line 88
            yield "    ";
            // line 89
            yield "    <div class=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "resourceSlider hidden w-full\">
        <div class=\"w-full text-center h-20 p-6\">
            <img src=\"";
            // line 91
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
            yield "/themes/Default/img/loading.gif\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Loading"), "html", null, true);
            yield "\" onclick=\"return false;\" /><br/>
            ";
            // line 92
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Loading"), "html", null, true);
            yield "
        </div>
    </div>
";
        }
        // line 96
        yield "
";
        // line 97
        if ((($context["showMedia"] ?? null) && ($context["allowUpload"] ?? null))) {
            // line 98
            yield "    ";
            // line 99
            yield "    <div class=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "resourceQuickSlider hidden w-full\">
        <div class=\"w-full text-center h-20 p-6\">
            <img src=\"";
            // line 101
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
            yield "/themes/Default/img/loading.gif\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Loading"), "html", null, true);
            yield "\" onclick=\"return false;\" /><br/>
            ";
            // line 102
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Loading"), "html", null, true);
            yield "
        </div>
    </div>

    ";
            // line 107
            yield "    <div class=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "resourceAddSlider hidden w-full\">
        <div class=\"w-full text-center h-20 p-6\">
            <img src=\"";
            // line 109
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
            yield "/themes/Default/img/loading.gif\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Loading"), "html", null, true);
            yield "\" onclick=\"return false;\" /><br/>
            ";
            // line 110
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Loading"), "html", null, true);
            yield "
        </div>
    </div>
";
        }
        // line 114
        yield "

<div id=\"editorcontainer\" class=\"relative\">
    <textarea class=\"tinymce w-full ml-0 float-none focus:shadow-none focus:border-gray-500\" name=\"";
        // line 117
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["name"] ?? null), "html", null, true);
        yield "\" id=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "\" rows=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["rows"] ?? null), "html", null, true);
        yield "\" style=\"height: ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($context["rows"] ?? null) * 18), "html", null, true);
        yield "px;\" ";
        if (($context["required"] ?? null)) {
            yield " x-validate.required data-error-msg=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("This field is required"), "html", null, true);
            yield "\" ";
        }
        yield " >";
        // line 118
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["value"] ?? null), "html", null, true);
        // line 119
        yield "</textarea>
</div>

<script type=\"text/javascript\">
document.addEventListener('tinymceSetup', function (event) {

    ";
        // line 125
        if (($context["tinymceInit"] ?? null)) {
            // line 126
            yield "        tinyMCE.execCommand('mceAddControl', false, '";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "');
    ";
        }
        // line 128
        yield "
    ";
        // line 129
        if (($context["onKeyDownSubmitUrl"] ?? null)) {
            // line 130
            yield "    setTimeout(function() {
        tinyMCE.get('";
            // line 131
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
            yield "').on('keydown', function (){
            tinyMCE.triggerSave();
            gibbonFormSubmitQuiet(\$('#";
            // line 133
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["onKeyDownSubmitFormId"] ?? null), "html", null, true);
            yield "'), '";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["onKeyDownSubmitUrl"] ?? null), "html", null, true);
            yield "')
        })
    }, 100);
    ";
        }
        // line 137
        yield "
    \$('#";
        // line 138
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "edButtonPreview').addClass('active') ;
    \$('#";
        // line 139
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "edButtonHTML').click(function(){
        tinyMCE.execCommand('mceRemoveEditor', false, '";
        // line 140
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "');
        \$('#";
        // line 141
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "edButtonHTML').addClass('active') ;
        \$('#";
        // line 142
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "edButtonPreview').removeClass('active') ;
        \$(\".";
        // line 143
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "resourceSlider\").hide();
        \$(\"#";
        // line 144
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "mediaInner\").hide();
    }) ;
    \$('#";
        // line 146
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "edButtonPreview').click(function(){
        tinyMCE.execCommand('mceAddEditor', false, '";
        // line 147
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "');
        \$('#";
        // line 148
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "edButtonPreview').addClass('active');
        \$('#";
        // line 149
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "edButtonHTML').removeClass('active'); 
        \$(\"#";
        // line 150
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["id"] ?? null), "html", null, true);
        yield "mediaInner\").show();
    });
});
</script>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "components/editor.twig.html";
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
        return array (  449 => 150,  445 => 149,  441 => 148,  437 => 147,  433 => 146,  428 => 144,  424 => 143,  420 => 142,  416 => 141,  412 => 140,  408 => 139,  404 => 138,  401 => 137,  392 => 133,  387 => 131,  384 => 130,  382 => 129,  379 => 128,  373 => 126,  371 => 125,  363 => 119,  361 => 118,  346 => 117,  341 => 114,  334 => 110,  328 => 109,  322 => 107,  315 => 102,  309 => 101,  303 => 99,  301 => 98,  299 => 97,  296 => 96,  289 => 92,  283 => 91,  277 => 89,  275 => 88,  273 => 87,  263 => 80,  258 => 78,  254 => 77,  250 => 75,  245 => 72,  238 => 68,  220 => 67,  215 => 65,  212 => 64,  210 => 63,  206 => 61,  200 => 58,  181 => 57,  179 => 56,  173 => 53,  155 => 52,  150 => 50,  140 => 43,  136 => 42,  130 => 41,  126 => 40,  122 => 39,  116 => 36,  112 => 35,  106 => 34,  102 => 33,  98 => 32,  92 => 29,  88 => 28,  82 => 27,  78 => 26,  74 => 25,  66 => 24,  60 => 21,  55 => 20,  53 => 19,  46 => 15,  43 => 14,  41 => 13,  38 => 12,);
    }

    public function getSourceContext()
    {
        return new Source("", "components/editor.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/components/editor.twig.html");
    }
}
