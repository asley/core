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

/* mail/notification.twig.html */
class __TwigTemplate_46e22eab6b78c8aa9f9c10c14a9fd130 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'bodyBottom' => [$this, 'block_bodyBottom'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 10
        return "mail/email.twig.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("mail/email.twig.html", "mail/notification.twig.html", 10);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 12
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 13
        yield "    <h2 style=\"margin-top: 0px;\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
        yield "</h2>
";
        return; yield '';
    }

    // line 16
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 17
        yield "
    ";
        // line 18
        yield ($context["body"] ?? null);
        yield "

    ";
        // line 20
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["details"] ?? null)) > 0)) {
            // line 21
            yield "        <hr style=\"border:none;border-bottom:1px solid #ececec;margin:1.5rem 0;width:100%;\">

        <ul>
            ";
            // line 24
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["details"] ?? null));
            foreach ($context['_seq'] as $context["label"] => $context["value"]) {
                // line 25
                yield "            <li style=\"padding: 3px 0px;\">
                <b>";
                // line 26
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield "</b>: ";
                yield $context["value"];
                yield "
            </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['label'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            yield "        </ul>

        <hr style=\"border:none;border-bottom:1px solid #ececec;margin:1.5rem 0;width:100%;\">
    ";
        }
        // line 33
        yield "
";
        return; yield '';
    }

    // line 36
    public function block_bodyBottom($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 37
        yield "    <span style=\"font-size: 12px; line-height: 18px;\">
        ";
        // line 38
        yield Twig\Extension\CoreExtension::sprintf($this->env->getFunction('__')->getCallable()("Login to %1\$s and use the notification icon to check your new notification, or %2\$sclick here%3\$s."), ($context["systemName"] ?? null), (((("<a href=\"" . ($context["absoluteURL"] ?? null)) . "/index.php?q=notifications.php\" style=\"") . ($context["linkStyle"] ?? null)) . "\">"), "</a>");
        yield "
    </span>
";
        return; yield '';
    }

    // line 42
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 43
        yield "    ";
        yield Twig\Extension\CoreExtension::sprintf($this->env->getFunction('__')->getCallable()("If you do not wish to receive email notifications from %1\$s, please %2\$sclick here%3\$s to adjust your preferences:"), ($context["systemName"] ?? null), (((("<a href=\"" . ($context["absoluteURL"] ?? null)) . "/index.php?q=preferences.php\" style=\"") . ($context["linkStyle"] ?? null)) . "\">"), "</a>");
        yield "

    <br/><br/>

    ";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf($this->env->getFunction('__')->getCallable()("Email sent via %1\$s at %2\$s."), ($context["systemName"] ?? null), ($context["organisationName"] ?? null)), "html", null, true);
        yield "
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "mail/notification.twig.html";
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
        return array (  138 => 47,  130 => 43,  126 => 42,  118 => 38,  115 => 37,  111 => 36,  105 => 33,  99 => 29,  88 => 26,  85 => 25,  81 => 24,  76 => 21,  74 => 20,  69 => 18,  66 => 17,  62 => 16,  54 => 13,  50 => 12,  39 => 10,);
    }

    public function getSourceContext()
    {
        return new Source("", "mail/notification.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/mail/notification.twig.html");
    }
}
