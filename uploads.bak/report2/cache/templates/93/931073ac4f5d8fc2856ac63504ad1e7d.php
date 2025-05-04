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

/* tray.twig.html */
class __TwigTemplate_9fc938493e8d9e627e1e8c15e68d9f9b extends Template
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
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["statusTray"] ?? null), "messageWall", [], "any", false, false, false, 13)) {
            // line 14
            yield "
    <a id=\"messageWall\" x-data=\"{ read: ";
            // line 15
            yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "messengerRead", [], "any", false, false, false, 15)) ? ("true") : ("false"));
            yield " }\" hx-boost=\"true\" hx-target=\"#content-wrap\" hx-select=\"#content-wrap\" hx-swap=\"outerHTML show:no-scroll swap:0s\" class=\"inline-block relative mr-5\" title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Message Wall"), "html", null, true);
            yield "\" href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["statusTray"] ?? null), "messageWall", [], "any", false, false, false, 15), "url", [], "any", false, false, false, 15), "html", null, true);
            yield "\" @click.debounce.500ms=\"read = true\">
        ";
            // line 16
            if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["statusTray"] ?? null), "messageWall", [], "any", false, false, false, 16), "messages", [], "any", false, false, false, 16)) {
                // line 17
                yield "            <span class='badge  -mr-2 right-0' :class=\"read ? 'bg-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["themeColour"] ?? null), "html", null, true);
                yield "-400' : 'bg-red-500'\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["statusTray"] ?? null), "messageWall", [], "any", false, false, false, 17), "messages", [], "any", false, false, false, 17), "html", null, true);
                yield "</span>
        ";
            }
            // line 19
            yield "
        ";
            // line 20
            yield $this->env->getFunction('icon')->getCallable()("outline", "message-wall", ("minorLinkIcon size-10 -my-1 fill-current text-white " . ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["statusTray"] ?? null), "messageWall", [], "any", false, false, false, 20), "messages", [], "any", false, false, false, 20)) ? ("opacity-75") : ("opacity-25"))));
            yield "
    </a>
";
        }
        // line 23
        yield "
";
        // line 24
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["statusTray"] ?? null), "notifications", [], "any", false, false, false, 24)) {
            // line 25
            yield "        <a id=\"notifications\" hx-boost=\"true\" hx-target=\"#content-wrap\" hx-select=\"#content-wrap\" hx-swap=\"outerHTML show:no-scroll swap:0s\" class=\"inline-block relative mr-5\" title=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Notifications"), "html", null, true);
            yield "\" href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["statusTray"] ?? null), "notifications", [], "any", false, false, false, 25), "url", [], "any", false, false, false, 25), "html", null, true);
            yield "\">
            <span class=\"notificationCounter badge bg-red-500 -mr-2 right-0 ";
            // line 26
            yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["statusTray"] ?? null), "notifications", [], "any", false, false, false, 26), "count", [], "any", false, false, false, 26) == 0)) ? ("hidden") : (""));
            yield "\">
                ";
            // line 27
            (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["statusTray"] ?? null), "notifications", [], "any", false, false, false, 27), "count", [], "any", false, false, false, 27) > 0)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["statusTray"] ?? null), "notifications", [], "any", false, false, false, 27), "count", [], "any", false, false, false, 27), "html", null, true)) : (yield ""));
            yield "
            </span>

            ";
            // line 30
            yield $this->env->getFunction('icon')->getCallable()("outline", "notifications", ("notificationIcon size-8 fill-current text-white " . ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["statusTray"] ?? null), "notifications", [], "any", false, false, false, 30), "count", [], "any", false, false, false, 30)) ? ("opacity-75") : ("opacity-25"))));
            yield "
        </a>

        <script type=\"text/javascript\">
            setInterval(function() {
                refreshNotifications();
            }, ";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["statusTray"] ?? null), "notifications", [], "any", false, false, false, 36), "interval", [], "any", false, false, false, 36), "html", null, true);
            yield ");
        </script>
    </div>
";
        }
        // line 40
        yield "
";
        // line 41
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["statusTray"] ?? null), "alarm", [], "any", false, false, false, 41)) {
            // line 42
            yield "    <script>
        htmx.onLoad(function (content) {
            refreshNotifications();
        });
    </script>
";
        }
        // line 48
        yield "
<div id=\"dialog-timeout\" title=\"";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Session Timeout"), "html", null, true);
        yield "\" style=\"display: none\">
    <p>";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Your session is about to expire: you will be logged out shortly."), "html", null, true);
        yield "</p>
</div>

<script>
    function refreshNotifications() {
        \$.ajax({
            url: \"index_notification_ajax.php\",
            dataType: \"json\",
            success: function(data) {
                // Update notification count
                if (data.count > 0) {
                    \$(\"#notifications .notificationCounter\").removeClass('hidden').html(data.count);
                    \$(\"#notifications .notificationIcon\").removeClass('opacity-25').addClass('opacity-75');
                } else {
                    \$(\"#notifications .notificationCounter\").html('').addClass('hidden');
                    \$(\"#notifications .notificationIcon\").removeClass('opacity-75').addClass('opacity-25');
                }

                // Handle alarm display / cancel
                if (data.alarm != false) {
                    if (\$('#TB_window').is(':visible') == true && \$('#TB_window').hasClass('alarm') == false) {
                        \$(\"#TB_window\").remove();
                        \$(\"body\").append(\"<div id='TB_window'></div>\");
                    }
                    if (\$('#TB_window').is(':visible') == false) {
                        var url = '";
        // line 75
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/index_notification_ajax_alarm.php?type='+ data.alarm +'&KeepThis=true&TB_iframe=true&width=1000&height=500';
                        tb_show('', url);
                        \$('#TB_window').addClass('alarm') ;
                    }
                } else {
                    if (\$('#TB_window').is(':visible')==true && \$('#TB_window').hasClass('alarm') ) {
                        tb_remove();
                    }
                }

                // Handle session timeout dialog
                \$(\"#dialog-timeout\").dialog({
                    resizable: false,
                    height: \"auto\",
                    width: 400,
                    modal: true,
                    autoOpen: false,
                    buttons: {
                        \"";
        // line 93
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Stay Connected"), "html", null, true);
        yield "\": function() {
                            const req = new XMLHttpRequest();
                            req.open(\"POST\", \"";
        // line 95
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/keepAlive.php\");
                            req.send();
                            \$(\"#dialog-timeout\").dialog(\"close\");
                        },
                        \"";
        // line 99
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getFunction('__')->getCallable()("Log Out Now"), "html", null, true);
        yield " \": function() {
                            window.location = \"";
        // line 100
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/logout.php?timeout=true\";
                        },
                    }
                });

                if (data.timeout == 'force') {
                    window.location = \"";
        // line 106
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/logout.php?timeout=force\";
                } else if (data.timeout == 'expire') {
                    window.location = \"";
        // line 108
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/logout.php?timeout=true\";
                } else if (data.timeout == 'warn') {
                    \$(\"#dialog-timeout\").dialog(\"open\");
                } else if (!data.timeout && \$(\"#dialog-timeout\").dialog(\"isOpen\")) {
                    \$(\"#dialog-timeout\").dialog(\"close\");
                }
            }
        });
    }
</script>
";
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "tray.twig.html";
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
        return array (  210 => 108,  205 => 106,  196 => 100,  192 => 99,  185 => 95,  180 => 93,  159 => 75,  131 => 50,  127 => 49,  124 => 48,  116 => 42,  114 => 41,  111 => 40,  104 => 36,  95 => 30,  89 => 27,  85 => 26,  78 => 25,  76 => 24,  73 => 23,  67 => 20,  64 => 19,  56 => 17,  54 => 16,  46 => 15,  43 => 14,  41 => 13,  38 => 12,);
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

Main Menu: Displays the top-level categories and active modules.
-->#}

{% if statusTray.messageWall %}

    <a id=\"messageWall\" x-data=\"{ read: {{ currentUser.messengerRead ? 'true' : 'false' }} }\" hx-boost=\"true\" hx-target=\"#content-wrap\" hx-select=\"#content-wrap\" hx-swap=\"outerHTML show:no-scroll swap:0s\" class=\"inline-block relative mr-5\" title=\"{{ __('Message Wall') }}\" href=\"{{ statusTray.messageWall.url }}\" @click.debounce.500ms=\"read = true\">
        {%if statusTray.messageWall.messages %}
            <span class='badge  -mr-2 right-0' :class=\"read ? 'bg-{{ themeColour }}-400' : 'bg-red-500'\">{{ statusTray.messageWall.messages }}</span>
        {% endif %}

        {{ icon('outline', 'message-wall', 'minorLinkIcon size-10 -my-1 fill-current text-white ' ~ (statusTray.messageWall.messages ? 'opacity-75' : 'opacity-25') ) }}
    </a>
{% endif %}

{% if statusTray.notifications %}
        <a id=\"notifications\" hx-boost=\"true\" hx-target=\"#content-wrap\" hx-select=\"#content-wrap\" hx-swap=\"outerHTML show:no-scroll swap:0s\" class=\"inline-block relative mr-5\" title=\"{{ __('Notifications') }}\" href=\"{{ statusTray.notifications.url }}\">
            <span class=\"notificationCounter badge bg-red-500 -mr-2 right-0 {{ statusTray.notifications.count == 0 ? 'hidden' }}\">
                {{ statusTray.notifications.count > 0 ? statusTray.notifications.count : '' }}
            </span>

            {{ icon('outline', 'notifications', 'notificationIcon size-8 fill-current text-white ' ~ (statusTray.notifications.count ? 'opacity-75' : 'opacity-25') ) }}
        </a>

        <script type=\"text/javascript\">
            setInterval(function() {
                refreshNotifications();
            }, {{ statusTray.notifications.interval }});
        </script>
    </div>
{% endif %}

{% if statusTray.alarm %}
    <script>
        htmx.onLoad(function (content) {
            refreshNotifications();
        });
    </script>
{% endif %}

<div id=\"dialog-timeout\" title=\"{{ __('Session Timeout') }}\" style=\"display: none\">
    <p>{{ __('Your session is about to expire: you will be logged out shortly.') }}</p>
</div>

<script>
    function refreshNotifications() {
        \$.ajax({
            url: \"index_notification_ajax.php\",
            dataType: \"json\",
            success: function(data) {
                // Update notification count
                if (data.count > 0) {
                    \$(\"#notifications .notificationCounter\").removeClass('hidden').html(data.count);
                    \$(\"#notifications .notificationIcon\").removeClass('opacity-25').addClass('opacity-75');
                } else {
                    \$(\"#notifications .notificationCounter\").html('').addClass('hidden');
                    \$(\"#notifications .notificationIcon\").removeClass('opacity-75').addClass('opacity-25');
                }

                // Handle alarm display / cancel
                if (data.alarm != false) {
                    if (\$('#TB_window').is(':visible') == true && \$('#TB_window').hasClass('alarm') == false) {
                        \$(\"#TB_window\").remove();
                        \$(\"body\").append(\"<div id='TB_window'></div>\");
                    }
                    if (\$('#TB_window').is(':visible') == false) {
                        var url = '{{ absoluteURL }}/index_notification_ajax_alarm.php?type='+ data.alarm +'&KeepThis=true&TB_iframe=true&width=1000&height=500';
                        tb_show('', url);
                        \$('#TB_window').addClass('alarm') ;
                    }
                } else {
                    if (\$('#TB_window').is(':visible')==true && \$('#TB_window').hasClass('alarm') ) {
                        tb_remove();
                    }
                }

                // Handle session timeout dialog
                \$(\"#dialog-timeout\").dialog({
                    resizable: false,
                    height: \"auto\",
                    width: 400,
                    modal: true,
                    autoOpen: false,
                    buttons: {
                        \"{{ __('Stay Connected') }}\": function() {
                            const req = new XMLHttpRequest();
                            req.open(\"POST\", \"{{ absoluteURL }}/keepAlive.php\");
                            req.send();
                            \$(\"#dialog-timeout\").dialog(\"close\");
                        },
                        \"{{ __('Log Out Now') }} \": function() {
                            window.location = \"{{ absoluteURL }}/logout.php?timeout=true\";
                        },
                    }
                });

                if (data.timeout == 'force') {
                    window.location = \"{{ absoluteURL }}/logout.php?timeout=force\";
                } else if (data.timeout == 'expire') {
                    window.location = \"{{ absoluteURL }}/logout.php?timeout=true\";
                } else if (data.timeout == 'warn') {
                    \$(\"#dialog-timeout\").dialog(\"open\");
                } else if (!data.timeout && \$(\"#dialog-timeout\").dialog(\"isOpen\")) {
                    \$(\"#dialog-timeout\").dialog(\"close\");
                }
            }
        });
    }
</script>
", "tray.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/tray.twig.html");
    }
}
