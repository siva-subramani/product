<?php

/* PrestaShopBundle:Admin/Module/Includes:action_menu.html.twig */
class __TwigTemplate_5bc80b5c61e8f1aa3ba979b5038d42e11330d7e1e4487ef36077f48aa96434f2 extends Twig_Template
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
        list($context["url"], $context["priceRaw"], $context["priceDisplay"], $context["url_active"], $context["urls"], $context["name"]) =         array($this->getAttribute($this->getAttribute(        // line 26
(isset($context["module"]) ? $context["module"] : null), "attributes", array()), "url", array()), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 27
(isset($context["module"]) ? $context["module"] : null), "attributes", array()), "price", array()), "raw", array()), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 28
(isset($context["module"]) ? $context["module"] : null), "attributes", array()), "price", array()), "displayPrice", array()), $this->getAttribute($this->getAttribute(        // line 29
(isset($context["module"]) ? $context["module"] : null), "attributes", array()), "url_active", array()), $this->getAttribute($this->getAttribute(        // line 30
(isset($context["module"]) ? $context["module"] : null), "attributes", array()), "urls", array()), $this->getAttribute($this->getAttribute(        // line 31
(isset($context["module"]) ? $context["module"] : null), "attributes", array()), "name", array()));
        // line 33
        echo "
<div class=\"pull-right btn-group\">
  ";
        // line 35
        if (((isset($context["url_active"]) ? $context["url_active"] : null) == "buy")) {
            // line 36
            echo "    <a class=\"btn pull-left btn-primary-reverse btn-primary-outline light-button module_action_menu_go_to_addons\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "\" target=\"_blank\">
      ";
            // line 37
            if (((isset($context["priceRaw"]) ? $context["priceRaw"] : null) != "0.00")) {
                echo twig_escape_filter($this->env, (isset($context["priceDisplay"]) ? $context["priceDisplay"] : null), "html", null, true);
                echo "
      ";
            } else {
                // line 38
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Discover", array(), "Admin.Modules.Feature"), "html", null, true);
            }
            // line 39
            echo "    </a>
  ";
        } else {
            // line 41
            echo "    <a class=\"btn btn-primary-reverse btn-primary-outline light-button module_action_menu_";
            echo twig_escape_filter($this->env, (isset($context["url_active"]) ? $context["url_active"] : null), "html", null, true);
            echo "\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["urls"]) ? $context["urls"] : null), (isset($context["url_active"]) ? $context["url_active"] : null), array(), "array"), "html", null, true);
            echo "\" data-confirm_modal=\"module-modal-confirm-";
            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, (isset($context["url_active"]) ? $context["url_active"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_replace_filter(twig_capitalize_string_filter($this->env, (isset($context["url_active"]) ? $context["url_active"] : null)), array("_" => " ")), "html", null, true);
            echo "</a>
    ";
            // line 42
            if ((twig_length_filter($this->env, (isset($context["urls"]) ? $context["urls"] : null)) > 1)) {
                // line 43
                echo "      <button type=\"button\" class=\"btn btn-primary-outline  dropdown-toggle light-button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        <span class=\"caret\"></span>
        <span class=\"sr-only\">";
                // line 45
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Toggle Dropdown", array(), "Admin.Modules.Feature"), "html", null, true);
                echo "</span>
      </button>
      <div class=\"dropdown-menu\">
        ";
                // line 48
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["urls"]) ? $context["urls"] : null));
                foreach ($context['_seq'] as $context["module_action"] => $context["module_url"]) {
                    // line 49
                    echo "          ";
                    if (($context["module_action"] != (isset($context["url_active"]) ? $context["url_active"] : null))) {
                        // line 50
                        echo "            <li>
              <a class=\"dropdown-item module_action_menu_";
                        // line 51
                        echo twig_escape_filter($this->env, $context["module_action"], "html", null, true);
                        echo "\" href=\"";
                        echo twig_escape_filter($this->env, $context["module_url"], "html", null, true);
                        echo "\" data-confirm_modal=\"module-modal-confirm-";
                        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $context["module_action"], "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, twig_replace_filter(twig_capitalize_string_filter($this->env, $context["module_action"]), array("_" => " ")), "html", null, true);
                        echo "</a>
            </li>
          ";
                    }
                    // line 54
                    echo "        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['module_action'], $context['module_url'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 55
                echo "      </div>
    ";
            }
            // line 57
            echo "  ";
        }
        // line 58
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:action_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 58,  110 => 57,  106 => 55,  100 => 54,  86 => 51,  83 => 50,  80 => 49,  76 => 48,  70 => 45,  66 => 43,  64 => 42,  51 => 41,  47 => 39,  44 => 38,  38 => 37,  33 => 36,  31 => 35,  27 => 33,  25 => 31,  24 => 30,  23 => 29,  22 => 28,  21 => 27,  20 => 26,  19 => 25,);
    }

    public function getSource()
    {
        return "";
    }
}
