<?php

/* PrestaShopBundle:Admin/Module/Includes:card_manage_installed.html.twig */
class __TwigTemplate_44045d716e745ed39de618de3294ea8ec526c4613f0df5d229cd2efdbe5e51ae extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:card_list.html.twig", "PrestaShopBundle:Admin/Module/Includes:card_manage_installed.html.twig", 25);
        $this->blocks = array(
            'addon_version' => array($this, 'block_addon_version'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin/Module/Includes:card_list.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 30
    public function block_addon_version($context, array $blocks = array())
    {
        // line 31
        echo "  ";
        if (($this->getAttribute($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "attributes", array()), "productType", array()) == "service")) {
            // line 32
            echo "    ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Service by %author%", array("%author%" => (("<b>" . $this->getAttribute($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "attributes", array()), "author", array())) . "</b>")), "Admin.Modules.Feature");
            echo "
  ";
        } else {
            // line 34
            echo "    ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("v%version% - by %author%", array("%version%" => $this->getAttribute($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "attributes", array()), "version", array()), "%author%" => (("<b>" . $this->getAttribute($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "attributes", array()), "author", array())) . "</b>")), "Admin.Modules.Feature");
            echo "
  ";
        }
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:card_manage_installed.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 34,  34 => 32,  31 => 31,  28 => 30,  11 => 25,);
    }

    public function getSource()
    {
        return "";
    }
}
