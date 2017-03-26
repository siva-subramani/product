<?php

/* PrestaShopBundle:Admin/Module/Includes:modal_import.html.twig */
class __TwigTemplate_3fcece45eba7a429a0a599368c482e57d4b5e82b03bbd8aa02d65aea75553384 extends Twig_Template
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
        echo "<div id=\"module-modal-import\" class=\"modal modal-vcenter fade\" role=\"dialog\" data-backdrop=\"static\" data-keyboard=\"false\">
    <div class=\"modal-dialog\">
        <!-- Modal content-->
        <div class=\"modal-content\">
            <div class=\"modal-header\">
              <button id=\"module-modal-import-closing-cross\" type=\"button\" class=\"close\">&times;</button>
              <h4 class=\"modal-title module-modal-title\">";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Upload a module", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "</h4>
            </div>
            <div class=\"modal-body\">
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <form action=\"#\" class=\"dropzone\" id=\"importDropzone\">
                            <div class=\"module-import-start\">
                                <i class=\"module-import-start-icon material-icons\">cloud_upload</i><br/>
                                <p class=module-import-start-main-text>
                                    ";
        // line 40
        echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Drop your module archive here or [1]select file[/1]", array(), "Admin.Modules.Feature"), array("[1]" => "<a href=\"#\" class=\"module-import-start-select-manual\">", "[/1]" => "</a>"));
        echo "
                                </p>
                                <p class=module-import-start-footer-text>
                                    ";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Please upload one file at a time, .zip or tarball format (.tar, .tar.gz or .tgz).", array(), "Admin.Modules.Help"), "html", null, true);
        echo "
                                    ";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Your module will be installed right after that.", array(), "Admin.Modules.Help"), "html", null, true);
        echo "
                                </p>
                            </div>
                            <div class='module-import-processing'>
                                <!-- Loader -->
                                <button class=\"btn btn-primary-reverse btn-lg onclick\" ></button>
                                <p class=module-import-processing-main-text>";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Installing module...", array(), "Admin.Modules.Notification"), "html", null, true);
        echo "</p>
                                <p class=module-import-processing-footer-text>
                                    ";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("It will close as soon as the module is installed. It won't be long!", array(), "Admin.Modules.Notification"), "html", null, true);
        echo "
                                </p>
                            </div>
                            <div class='module-import-success'>
                                <i class=\"module-import-success-icon material-icons\">done</i><br/>
                                <p class='module-import-success-msg'>";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Module installed!", array(), "Admin.Modules.Notification"), "html", null, true);
        echo "</p>
                                <p class=\"module-import-success-details\"></p>
                                <a class=\"module-import-success-configure btn btn-primary btn-sm light-button\" href='#'>";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Configure", array(), "Admin.Actions"), "html", null, true);
        echo "</a>
                            </div>
                            <div class='module-import-failure'>
                                <i class=\"module-import-failure-icon material-icons\">error</i><br/>
                                <p class='module-import-failure-msg'>";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Oops... Upload failed.", array(), "Admin.Modules.Notification"), "html", null, true);
        echo "</p>
                                <a href=\"#\" class=\"module-import-failure-details-action\">";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("What happened?", array(), "Admin.Modules.Help"), "html", null, true);
        echo "</a>
                                <div class='module-import-failure-details'></div>
                                <a class=\"module-import-failure-retry btn btn-tertiary\" href='#'>";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Try again", array(), "Admin.Actions"), "html", null, true);
        echo "</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class=\"modal-footer\">
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:modal_import.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 66,  87 => 64,  83 => 63,  76 => 59,  71 => 57,  63 => 52,  58 => 50,  49 => 44,  45 => 43,  39 => 40,  27 => 31,  19 => 25,);
    }

    public function getSource()
    {
        return "";
    }
}
