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

/* mail/email.twig.html */
class __TwigTemplate_5177425aaa3332571e784d670930f691 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'preview' => [$this, 'block_preview'],
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'bodyBottom' => [$this, 'block_bodyBottom'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 35
        $context["fontFamily"] = "'Helvetica Neue',Helvetica,Arial,sans-serif!important";
        // line 36
        $context["linkStyle"] = "color:#439fe0;font-weight:bold;text-decoration:none;";
        // line 37
        $context["buttonColor"] = "#439fe0";
        // line 38
        $context["buttonHover"] = "#4e6d8c";
        // line 39
        yield "<!doctype html>
<html>
  <head>
    <meta name=\"viewport\" content=\"width=device-width\">
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
    <title>";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
        yield "</title>
    <style>

    /* -------------------------------------
        RESPONSIVE AND MOBILE FRIENDLY STYLES
    ------------------------------------- */
    @media only screen and (max-width: 620px) {
      table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
      }
      table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
        font-size: 16px !important;
      }
      table[class=body] .wrapper,
            table[class=body] .article {
        padding: 20px 10px !important;
      }
      table[class=body] .content {
        padding: 0 !important;
      }
      table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
      }
      table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
      }
      table[class=body] .btn table {
        width: 100% !important;
      }
      table[class=body] .btn a {
        width: 100% !important;
      }
      table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
      }
      table[class=foot] .content-block,
      table[class=foot] .content-block a {
        font-size: 12px !important;
      }
      img, img[style] {
          max-width: 100%;
      }
    }

    /* -------------------------------------
        PRESERVE THESE STYLES IN THE HEAD
    ------------------------------------- */

    @media all {
      .ExternalClass {
        width: 100%;
      }
      .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
        line-height: 100%;
      }
      .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
      }
      .btn-primary table td:hover {
        color: #ffffff !important;
        background-color: ";
        // line 125
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonHover"] ?? null), "html", null, true);
        yield " !important;
      }
      .btn-primary a:hover {
        color: #ffffff !important;
        background-color: ";
        // line 129
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonHover"] ?? null), "html", null, true);
        yield " !important;
        border-color: ";
        // line 130
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonHover"] ?? null), "html", null, true);
        yield " !important;
      }
    }
    </style>
  </head>
  <body class=\"\" style=\"background-color: #f6f6f6; font-family: ";
        // line 135
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["fontFamily"] ?? null), "html", null, true);
        yield "; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;\">
    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"body\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;\">
      <tr>
        <td style=\"font-family: ";
        // line 138
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["fontFamily"] ?? null), "html", null, true);
        yield "; font-size: 14px; vertical-align: top;\">&nbsp;</td>
        <td class=\"container\" style=\"font-family: ";
        // line 139
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["fontFamily"] ?? null), "html", null, true);
        yield "; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("maxWidth", $context)) ? (Twig\Extension\CoreExtension::default(($context["maxWidth"] ?? null), "780px")) : ("780px")), "html", null, true);
        yield "; padding: 10px 0px; width: 90%;\">
          <div class=\"header\" style=\"box-sizing: border-box; display: block; Margin: 0 auto; max-width: ";
        // line 140
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("maxWidth", $context)) ? (Twig\Extension\CoreExtension::default(($context["maxWidth"] ?? null), "780px")) : ("780px")), "html", null, true);
        yield "; padding:20px 16px 12px;text-align:center;\">
            <a href=\"";
        // line 141
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "\" style=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["linkStyle"] ?? null), "html", null, true);
        yield "\" target=\"_blank\">
                <img src=\"";
        // line 142
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["absoluteURL"] ?? null), "html", null, true);
        yield "/";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::default(Twig\Extension\CoreExtension::replace(($context["organisationLogo"] ?? null), ["svg" => "png"]), "/themes/Default/img/logo.png"), "html", null, true);
        yield "\" style=\"outline:none;text-decoration:none;border:none\" height=\"50\">
            </a>
          </div>
          <div class=\"content\" style=\"box-sizing: border-box; display: block; Margin: 0 auto; max-width: ";
        // line 145
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("maxWidth", $context)) ? (Twig\Extension\CoreExtension::default(($context["maxWidth"] ?? null), "780px")) : ("780px")), "html", null, true);
        yield "; padding: 0px 0px 40px;\">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class=\"preheader\" style=\"color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;\">
                ";
        // line 149
        yield from $this->unwrap()->yieldBlock('preview', $context, $blocks);
        // line 150
        yield "            </span>
            <table class=\"main\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 6px;\">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class=\"wrapper\" style=\"font-family: ";
        // line 155
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["fontFamily"] ?? null), "html", null, true);
        yield "; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 32px;\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;\">
                    <tr>
                      <td style=\"font-family: ";
        // line 158
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["fontFamily"] ?? null), "html", null, true);
        yield "; font-size: 14px; vertical-align: top;\">
                        <div style=\"font-family: ";
        // line 159
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["fontFamily"] ?? null), "html", null, true);
        yield "; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;color: #373737;\">
                            ";
        // line 160
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        // line 163
        yield "                        </div>
                        <div style=\"font-family: ";
        // line 164
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["fontFamily"] ?? null), "html", null, true);
        yield "; font-size: 16px; line-height: 22px; font-weight: normal; margin: 0; Margin-bottom: 15px; color: #555549;\">
                            ";
        // line 165
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 166
        yield "                        </div>

                        ";
        // line 168
        if (($context["button"] ?? null)) {
            // line 169
            yield "                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"btn btn-primary\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt;  box-sizing: border-box;\">
                          <tbody>
                            <tr>
                              <td align=\"left\" style=\"font-family: ";
            // line 172
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["fontFamily"] ?? null), "html", null, true);
            yield "; font-size: 14px; vertical-align: top; padding: 15px 0px 25px;\">
                                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;\">
                                  <tbody>
                                    <tr>
                                      <td style=\"font-family: ";
            // line 176
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["fontFamily"] ?? null), "html", null, true);
            yield "; font-size: 18px; vertical-align: top; background-color: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonColor"] ?? null), "html", null, true);
            yield "; border-radius: 5px; text-align: center;\"> 
                                        <a href=\"";
            // line 177
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((CoreExtension::getAttribute($this->env, $this->source, ($context["button"] ?? null), "external", [], "any", false, false, false, 177) || CoreExtension::inFilter("http", CoreExtension::getAttribute($this->env, $this->source, ($context["button"] ?? null), "url", [], "any", false, false, false, 177)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["button"] ?? null), "url", [], "any", false, false, false, 177)) : (((($context["absoluteURL"] ?? null) . "/") . CoreExtension::getAttribute($this->env, $this->source, ($context["button"] ?? null), "url", [], "any", false, false, false, 177)))), "html", null, true);
            yield "\" target=\"_blank\" style=\"display: inline-block; color: #ffffff; background-color: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonColor"] ?? null), "html", null, true);
            yield "; border: solid 1px ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonColor"] ?? null), "html", null, true);
            yield "; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 18px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonColor"] ?? null), "html", null, true);
            yield ";\">
                                            ";
            // line 178
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["button"] ?? null), "text", [], "any", false, false, false, 178), "html", null, true);
            yield "
                                        </a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>

                              ";
            // line 185
            if (($context["button2"] ?? null)) {
                // line 186
                yield "                                <td align=\"left\" style=\"font-family: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["fontFamily"] ?? null), "html", null, true);
                yield "; font-size: 14px; vertical-align: top; padding: 15px 15px 25px;\">
                                    <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;\">
                                    <tbody>
                                        <tr>
                                        <td style=\"font-family: ";
                // line 190
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["fontFamily"] ?? null), "html", null, true);
                yield "; font-size: 18px; vertical-align: top; background-color: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonColor"] ?? null), "html", null, true);
                yield "; border-radius: 5px; text-align: center;\"> 
                                            <a href=\"";
                // line 191
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((CoreExtension::getAttribute($this->env, $this->source, ($context["button2"] ?? null), "external", [], "any", false, false, false, 191) || CoreExtension::inFilter("http", CoreExtension::getAttribute($this->env, $this->source, ($context["button2"] ?? null), "url", [], "any", false, false, false, 191)))) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["button2"] ?? null), "url", [], "any", false, false, false, 191)) : (((($context["absoluteURL"] ?? null) . "/") . CoreExtension::getAttribute($this->env, $this->source, ($context["button2"] ?? null), "url", [], "any", false, false, false, 191)))), "html", null, true);
                yield "\" target=\"_blank\" style=\"display: inline-block; color: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonColor"] ?? null), "html", null, true);
                yield "; background-color: #ffffff; border: solid 1px ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonColor"] ?? null), "html", null, true);
                yield "; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 18px; font-weight: normal; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["buttonColor"] ?? null), "html", null, true);
                yield ";\">
                                                ";
                // line 192
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["button2"] ?? null), "text", [], "any", false, false, false, 192), "html", null, true);
                yield "
                                            </a> </td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </td>
                              ";
            }
            // line 199
            yield "                            </tr>
                          </tbody>
                        </table>
                        ";
        }
        // line 203
        yield "
                        <p style=\"font-family: ";
        // line 204
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["fontFamily"] ?? null), "html", null, true);
        yield "; font-size: 16px; line-height: 22px; font-weight: normal; margin: 0; color: #555549;\">
                            ";
        // line 205
        yield from $this->unwrap()->yieldBlock('bodyBottom', $context, $blocks);
        // line 206
        yield "                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class=\"footer\" style=\"clear: both; Margin-top: 10px; text-align: center; width: 100%;\">
              <table class=\"foot\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;\">
                <tr>
                  <td class=\"content-block\" style=\"font-family: ";
        // line 220
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["fontFamily"] ?? null), "html", null, true);
        yield "; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;\">
                    ";
        // line 221
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        // line 224
        yield "                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style=\"font-family: ";
        // line 233
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["fontFamily"] ?? null), "html", null, true);
        yield "; font-size: 14px; vertical-align: top;\">&nbsp;</td>
      </tr>
    </table>
  </body>
</html>
";
        return; yield '';
    }

    // line 149
    public function block_preview($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["preview"] ?? null), "html", null, true);
        return; yield '';
    }

    // line 160
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 161
        yield "                                <h2 style=\"margin-top: 0px;\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["title"] ?? null), "html", null, true);
        yield "</h2>
                            ";
        return; yield '';
    }

    // line 165
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield ($context["body"] ?? null);
        return; yield '';
    }

    // line 205
    public function block_bodyBottom($context, array $blocks = [])
    {
        $macros = $this->macros;
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["bodyBottom"] ?? null), "html", null, true);
        return; yield '';
    }

    // line 221
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 222
        yield "                        ";
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
        return "mail/email.twig.html";
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
        return array (  415 => 222,  411 => 221,  403 => 205,  395 => 165,  387 => 161,  383 => 160,  375 => 149,  364 => 233,  353 => 224,  351 => 221,  347 => 220,  331 => 206,  329 => 205,  325 => 204,  322 => 203,  316 => 199,  306 => 192,  296 => 191,  290 => 190,  282 => 186,  280 => 185,  270 => 178,  260 => 177,  254 => 176,  247 => 172,  242 => 169,  240 => 168,  236 => 166,  234 => 165,  230 => 164,  227 => 163,  225 => 160,  221 => 159,  217 => 158,  211 => 155,  204 => 150,  202 => 149,  195 => 145,  187 => 142,  181 => 141,  177 => 140,  171 => 139,  167 => 138,  161 => 135,  153 => 130,  149 => 129,  142 => 125,  58 => 44,  51 => 39,  49 => 38,  47 => 37,  45 => 36,  43 => 35,);
    }

    public function getSourceContext()
    {
        return new Source("", "mail/email.twig.html", "/Applications/MAMP/htdocs/chhs/resources/templates/mail/email.twig.html");
    }
}
