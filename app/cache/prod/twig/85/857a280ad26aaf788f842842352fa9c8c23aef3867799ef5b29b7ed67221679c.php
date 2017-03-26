<?php

/* PrestaShopBundle:Admin/Common/_partials:_header_tab.html.twig */
class __TwigTemplate_69942b97c5160578247a5dacdc5084c86ac551882bfe0f5d99e806ca5b0c28a4 extends Twig_Template
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
        echo "<a class=\"tab";
        if ($this->getAttribute((isset($context["tabData"]) ? $context["tabData"] : null), "isCurrent", array())) {
            echo " current";
        }
        echo "\" href=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath($this->getAttribute((isset($context["tabData"]) ? $context["tabData"] : null), "route", array()));
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans($this->getAttribute((isset($context["tabData"]) ? $context["tabData"] : null), "title", array()), array(), "AdminControllersListener"), "html", null, true);
        echo "</a>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Common/_partials:_header_tab.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 25,);
    }

    public function getSource()
    {
        return "";
    }
}
