<?php

/* PrestaShopBundle:Admin/Module/Includes:menu_top.html.twig */
class __TwigTemplate_c80d3f976cddacaede77e6ca6dd53ea0194a5a0b35cd5a133a3caa3e148b2c13 extends Twig_Template
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
        echo "<div class=\"module-top-menu\">
    <div class=\"row\">
        <div class=\"col-md-8 module-menu-item\">
            ";
        // line 28
        if (array_key_exists("topMenuData", $context)) {
            // line 29
            echo "                ";
            $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:dropdown_categories.html.twig", "PrestaShopBundle:Admin/Module/Includes:menu_top.html.twig", 29)->display(array_merge($context, array("topMenuData" => (isset($context["topMenuData"]) ? $context["topMenuData"] : null))));
            // line 30
            echo "            ";
        }
        // line 31
        echo "            ";
        if ((array_key_exists("requireFilterStatus", $context) && ((isset($context["requireFilterStatus"]) ? $context["requireFilterStatus"] : null) == true))) {
            // line 32
            echo "                ";
            $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:dropdown_status.html.twig", "PrestaShopBundle:Admin/Module/Includes:menu_top.html.twig", 32)->display($context);
            // line 33
            echo "            ";
        }
        // line 34
        echo "        </div>

        <div class=\"col-md-4\">
            <div class=\"input-group module-search-block\">
                <span class=\"input-group-addon module-search-icon\">
                    <i class=\"material-icons\">search</i>
                </span>
                <input id=\"module-search-bar\" class=\"module-search-bar form-control\" type=\"text\">
            </div>
        </div>

    </div>
</div>

<hr class=\"top-menu-separator\"/>

";
        // line 50
        $context["js_translatable"] = twig_array_merge(array("Search - placeholder" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Search modules: keyword, name, author...", array(), "Admin.Modules.Help")),         // line 52
(isset($context["js_translatable"]) ? $context["js_translatable"] : null));
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:menu_top.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 52,  59 => 50,  41 => 34,  38 => 33,  35 => 32,  32 => 31,  29 => 30,  26 => 29,  24 => 28,  19 => 25,);
    }

    public function getSource()
    {
        return "";
    }
}
