<?php

/* PrestaShopBundle:Admin/Product/Include:catalog_order_carrets.html.twig */
class __TwigTemplate_20085dc4416832f254937e02439af01dbcf71423aabc9c13a6cf043305476263 extends Twig_Template
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
        $context["column"] = ((array_key_exists("column", $context)) ? (_twig_default_filter((isset($context["column"]) ? $context["column"] : null), "")) : (""));
        // line 26
        $context["sortOrder"] = ((array_key_exists("sortOrder", $context)) ? (_twig_default_filter((isset($context["sortOrder"]) ? $context["sortOrder"] : null), "")) : (""));
        // line 27
        $context["orderBy"] = ((array_key_exists("orderBy", $context)) ? (_twig_default_filter((isset($context["orderBy"]) ? $context["orderBy"] : null), "")) : (""));
        // line 28
        echo "
";
        // line 29
        if ((isset($context["column"]) ? $context["column"] : null)) {
            // line 30
            echo "  ";
            ob_start();
            // line 31
            echo "    <span
      psorderby=\"";
            // line 32
            echo twig_escape_filter($this->env, (isset($context["column"]) ? $context["column"] : null), "html", null, true);
            echo "\"
      psorderway=\"asc\"
      class=\"icon-caret-up icon-caret ";
            // line 34
            if ((((isset($context["orderBy"]) ? $context["orderBy"] : null) == (isset($context["column"]) ? $context["column"] : null)) && ((isset($context["sortOrder"]) ? $context["sortOrder"] : null) == "asc"))) {
                echo "-current";
            }
            echo "\"
    >
      &#9650;
    </span>
    <span
      psorderby=\"";
            // line 39
            echo twig_escape_filter($this->env, (isset($context["column"]) ? $context["column"] : null), "html", null, true);
            echo "\"
      psorderway=\"desc\"
      class=\"icon-caret-down icon-caret ";
            // line 41
            if ((((isset($context["orderBy"]) ? $context["orderBy"] : null) == (isset($context["column"]) ? $context["column"] : null)) && ((isset($context["sortOrder"]) ? $context["sortOrder"] : null) == "desc"))) {
                echo "-current";
            }
            echo "\"
    >
      &#9660;
    </span>
  ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        }
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Product/Include:catalog_order_carrets.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 41,  51 => 39,  41 => 34,  36 => 32,  33 => 31,  30 => 30,  28 => 29,  25 => 28,  23 => 27,  21 => 26,  19 => 25,);
    }

    public function getSource()
    {
        return "";
    }
}
