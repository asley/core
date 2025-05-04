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

/* footer.twig.html */
class __TwigTemplate_fc444e80ff081df8233b504dfb465b47 extends Template
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
        // line 25
        yield "
<span class=\"inline-block font-bold\">
    ";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Powered by"), "html", null, true);
        yield " <a class=\"text-";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
        yield "-800\" target='_blank' href='https://gibbonedu.org'>Gibbon</a> ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["versionName"] ?? null), "html", null, true);
        yield "<br/>
</span> 
<br/>
<span class=\"text-xs\">
    ";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Founded by Ross Parker at ICHK Secondary"), "html", null, true);
        yield " | ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Built by Ross Parker, Sandra Kuipers and the Gibbon community"), "html", null, true);
        yield "<br/>
    Copyright © <a class=\"text-";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
        yield "-800\" target='_blank' href='http://gibbonedu.org'>Gibbon Foundation</a> 2010-";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " | Gibbon™ of Gibbon Education Ltd. (Hong Kong)<br/>
    ";
        // line 33
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Created under the"), "html", null, true);
        yield " <a class=\"text-";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
        yield "-800\" target='_blank' href='https://www.gnu.org/licenses/gpl.html'>GNU GPL</a> |
    <a class=\"text-";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
        yield "-800\" target='_blank' href='https://gibbonedu.org/about/#ourTeam'>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Credits"), "html", null, true);
        yield "</a> | 
    <a class=\"text-";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
        yield "-800\" target='_blank' href='https://gibbonedu.org/about/#translators'>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Translators"), "html", null, true);
        yield "</a> | 
    <a class=\"text-";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
        yield "-800\" target='_blank' href='https://gibbonedu.org/support/'>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Support"), "html", null, true);
        yield "</a>
    <br/>
    ";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["footerThemeAuthor"] ?? null), "html", null, true);
        yield "<br/>
</span>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "footer.twig.html";
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
        return array (  90 => 38,  83 => 36,  77 => 35,  71 => 34,  65 => 33,  59 => 32,  53 => 31,  42 => 27,  38 => 25,);
    }

    public function getSourceContext()
    {
        return new Source("", "footer.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/footer.twig.html");
    }
}
