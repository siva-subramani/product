<?php

/* PrestaShopBundle:Admin:Common/_partials/_sidebar.html.twig */
class __TwigTemplate_67cbe22d0904626b228c3885977f1f9e6b9a0cc84688c0d340026572c5dd5485 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 25
        echo "<div id=\"ps-quicknav-sidebar\"  class=\"_fullspace\">
    <div class=\"quicknav-header\">
        <div class=\"pull-left\"><a href=\"#\" data-toggle=\"sidebar\" data-target=\".sidebar\">×</a></div>
        <h2>";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans((isset($context["title"]) ? $context["title"] : null), array(), "AdminCommon"), "html", null, true);
        echo "</h2>
    </div>
    <div class=\"quicknav-scroller _fullspace\">
        <object class=\"_fullspace\" data=\"";
        // line 31
        echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
        echo "\"></object>
    </div>
    <div class=\"quicknav-fixed-bottom navbar-form-footer\">
        ";
        // line 34
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin:Common/_partials/_sidebar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 34,  30 => 31,  24 => 28,  19 => 25,);
    }

    public function getSource()
    {
        return "";
    }
}
