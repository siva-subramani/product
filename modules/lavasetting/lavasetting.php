<?php
/**
* 2007-2016 uhuPage
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. 
*
*  @author    uhuPage <support@uhupage.com>
*  @copyright 2007-2016 uhuPage
*  @license   GNU General Public License version 2
*/

class Lavasetting extends Module
{
    public function __construct()
    {
        $this->name = 'lavasetting';
        $this->tab = 'others';
        $this->version = '1.0.3';
        $this->bootstrap = true;
        $this->author = 'uhuPage';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = 'Lava Theme configurator';
        $this->description = $this->l('Change all settings of the theme.');

        if (Configuration::get(_THEME_NAME_) == '') {
            $this->loadModTheme();
            $this->loadConfigFile();
        }
    }

    public function install()
    {
        if (!parent::install() ||
            !$this->registerHook('displayBackOfficeHeader')) {
            return false;
        }

        return true;
    }

    public function uninstall()
    {
        Configuration::deleteByName(_THEME_NAME_);
        return parent::uninstall();
    }

    public function hookDisplayBackOfficeHeader()
    {
        $this->context->controller->addJquery();
        $this->context->controller->addJS(_PS_JS_DIR_.'jquery/plugins/jquery.colorpicker.js');
        $this->context->controller->addJS(($this->_path).'views/js/common.js');
    }

    /*
        BackOffice
    */
    public function getContent()
    {
        $this->_html = '';

        $this->postProcess();
        $this->displayToolbar();
        $this->displayForm();

        return $this->_html;
    }

    public function postProcess()
    {
        $errors = '';

        if (Tools::isSubmit('submitCustomCSS')) {
            // custom css
            $customcss = Tools::getValue('customcss');
            Configuration::updateValue('lava_custom_css', $customcss);

            $current_theme = $this->layout;
            $fp = fopen(_PS_ROOT_DIR_.'/modules/lavasetting/views/css/'.$current_theme.'/mycustom.css', 'wb');
            fputs($fp, $customcss);
            fclose($fp);
        }

        // New sigle mode save
        if (Tools::isSubmit('submitModConfig')) {
            $layout = $this->getTemplateId();
            $mod = Tools::getValue('mod');
            if (Tools::getIsset('config_'.$mod)) {
                $value = serialize(Tools::getValue('config_'.$mod));
                Configuration::updateValue('lava_'.$layout.'_'.$mod, $value);

                $this->clearAllCache();
            }

            if ($mod == 'banner') {
                $data = Tools::unserialize(Configuration::get('lava_'.$layout.'_banner'));
                $time_start = time() * 1000;
                $data[8] = 2 * $time_start + $data[9]*24*60*60*1000 + $data[10]*60*60*1000 + $data[11]*60*1000;
                $time_start = time() * 1000;
                $data[21] = 2 * $time_start + $data[22]*24*60*60*1000 + $data[23]*60*60*1000 + $data[24]*60*1000;
                Configuration::updateValue('lava_'.$layout.'_banner', serialize($data));
            }

            if ($mod == 'product') {
                $data = Tools::unserialize(Configuration::get('lava_'.$layout.'_product'));
                Configuration::updateValue('HOME_FEATURED_CAT', $data[10]);
            }

            if ($mod == 'bootstrap' || $mod == 'fontcolor' || $mod == 'newsletter') {
                $this->makeCustomStyle();
            }

            $values = Tools::unserialize(Configuration::get('lava_'.$layout.'_display'));
            $displays = Tools::getValue('config_display');
            $displayids = Tools::getValue('displayids');
            $dids = explode('|', $displayids);
            foreach ($dids as $did) {
                if ($did <> '') {
                    $values[$did] = $displays[$did];
                }
            }
            Configuration::updateValue('lava_'.$layout.'_display', serialize($values));
        }

        //  mulit settins
        if (Tools::isSubmit('submitModsConfig')) {
            $mod = Tools::getValue('mod');
            $modules = explode('|', $mod);
            foreach ($modules as $mod) {
                if (Tools::getIsset('config_'.$mod)) {
                    $value = serialize(Tools::getValue('config_'.$mod));
                    Configuration::updateValue('lava_'.$this->layout.'_'.$mod, $value);
                }
                if ($mod == 'product') {
                    $data = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_facebook'));
                    $this->updateFacebook($data[1]);
                }
            }

            $this->clearAllCache();

            $values = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_display'));
            $displays = Tools::getValue('config_display');
            $displayids = Tools::getValue('displayids');
            $dids = explode('|', $displayids);
            foreach ($dids as $did) {
                if ($did <> '') {
                    $values[$did] = $displays[$did];
                }
            }
            Configuration::updateValue('lava_'.$this->layout.'_display', serialize($values));
        }

        if (Tools::isSubmit('submitImportTheme')) {
            $this->page = 1;
            define('_IMPORT_FOLDER_', dirname(__FILE__).'/import/');
            if (!file_exists(_IMPORT_FOLDER_) || !is_dir(_IMPORT_FOLDER_)) {
                mkdir(_IMPORT_FOLDER_, 0777);
            }
            define('ARCHIVE_NAME', _IMPORT_FOLDER_.'uploaded.zip');
            define('XMLFILENAME', 'Config.xml');

            if ($_FILES['themearchive']['error'] || !file_exists($_FILES['themearchive']['tmp_name'])) {
                $errors[] = $this->l('An error has occurred during the file upload.');
            } elseif (Tools::substr($_FILES['themearchive']['name'], -4) != '.zip') {
                $errors[] = $this->l('Only zip files are allowed');
            } elseif (!rename($_FILES['themearchive']['tmp_name'], ARCHIVE_NAME)) {
                $errors[] = $this->l('An error has occurred during the file copy.');
            } elseif (Tools::ZipTest(ARCHIVE_NAME)) {
                $this->page = 2;
            } else {
                $errors[] = $this->l('Zip file seems to be broken');
            }

            if ($this->page == 2 && file_exists(ARCHIVE_NAME)) {
                Tools::ZipExtract(ARCHIVE_NAME, _IMPORT_FOLDER_);
                if (!self::checkXmlFields()) {
                    $errors[] = $this->l('Bad configuration file');
                } else {
                    $s_dir = _IMPORT_FOLDER_.'lavasetting/';
                    $d_dir = _PS_MODULE_DIR_.'lavasetting/';
                    $this->xcopy($s_dir, $d_dir);

                    $xml = simplexml_load_file(_IMPORT_FOLDER_.XMLFILENAME);
                    $themes = Tools::unserialize(Configuration::get(_THEME_NAME_));
                    if (substr_count($themes[3], $xml['key']) == 0) {
                        $themes[3] = $xml['key'].'|'.$themes[3];
                        $themes[4] = '';
                        $themes[5] = $xml['name'].'|'.$themes[5];
                        Configuration::updateValue(_THEME_NAME_, serialize($themes));
                    }
                    $this->_html .= $this->displayConfirmation($this->l('The theme was successfully imported.'));
                }
            }

            if (file_exists(ARCHIVE_NAME)) {
                unlink(ARCHIVE_NAME);
            }
            self::deleteTmpFiles();
        }

        if (Tools::isSubmit('submitChoiseThemeColor')) {
            $themes = Tools::unserialize(Configuration::get(_THEME_NAME_));
            $themes[8] = Tools::getValue('selected_theme_color');
            Configuration::updateValue(_THEME_NAME_, serialize($themes));
        }

        if (Tools::isSubmit('submitManageThemes')) {
            $themes = Tools::unserialize(Configuration::get(_THEME_NAME_));
            $themes[3] = Tools::getValue('theme_id');
            $themes[5] = Tools::getValue('theme_title');
            Configuration::updateValue(_THEME_NAME_, serialize($themes));
        }

        if (Tools::isSubmit('submitChoiseThemeStyle')) {
            $themes = Tools::unserialize(Configuration::get(_THEME_NAME_));
            $themes[4] = Tools::getValue('selected_theme_style');

            $settings = Tools::unserialize(Configuration::get('lava_'.$themes[4].'_setting'));
            $themecolor_names = explode('|', $settings[3]);
            $themes[8] = $themecolor_names[0];

            Configuration::updateValue(_THEME_NAME_, serialize($themes));

            if ($themes[4] <> '' && Configuration::get('lava_'.$themes[4].'_setting') == '') {
                $this->loadConfigFile();
            }
        }

        if (Tools::isSubmit('submitChoiseHeaderStyle')) {
            $selected_style_name = Tools::getValue('selected_theme_header');
            Configuration::updateValue('PS_UHU_HEADER', $selected_style_name);
        }

        if (Tools::isSubmit('submitResetMod')) {
            $layout = $this->getTemplateId();
            $this->resetModContent(Tools::getValue('reset_module'), $layout);
            $this->clearAllCache();
        }

        if (Tools::isSubmit('submitMaintenance')) {
            $mod = 'maintenance';
            $layout = $this->getTemplateId();
            if (Tools::getIsset('config_'.$mod)) {
                $data = Tools::getValue('config_'.$mod);
                $time_start = time() * 1000;
                $data[23] = 2 * $time_start + $data[17]*24*60*60*1000 + $data[18]*60*60*1000 + $data[19]*60*1000;
                Configuration::updateValue('lava_'.$layout.'_'.$mod, serialize($data));

                $this->makeCustomStyle();
            }
        }

        /* Deletes */
        if (Tools::isSubmit('delete_id_image')) {
            $imagefolder = $this->getImageFolder();//$mvalue[21];
            $slide = Tools::getValue('delete_id_image');
            if (file_exists(_PS_THEME_DIR_.$imagefolder.$slide)) {
                unlink(_PS_THEME_DIR_.$imagefolder.$slide);
            }
            $url = explode('&delete_id_image', $_SERVER['REQUEST_URI']);
            Tools::redirect(Tools::getShopProtocol().$_SERVER['SERVER_NAME'].$url[0]);
        }

        if (Tools::isSubmit('submitNativeProductConfig')) {
            foreach ($this->getConfigurableModules() as $module) {
                $module_instance = Module::getInstanceByName($module['name']);
                if ($module_instance === false || !is_object($module_instance)) {
                    continue;
                }

                $is_installed = (int)Validate::isLoadedObject($module_instance);
                if ($is_installed) {
                    if (($active = (int)Tools::getValue($module['name'])) == $module_instance->active) {
                        continue;
                    }

                    if ($active) {
                        $module_instance->enable();
                    } else {
                        $module_instance->disable();
                    }
                } else {
                    if ((int)Tools::getValue($module['name'])) {
                        $module_instance->install();
                    }
                }
            }
        }

        if (Tools::isSubmit('submitConfigBackground')) {
            $mod = 'background';
            $this->layout = $this->getTemplateId();
            if (Tools::getIsset('config_'.$mod)) {
                $postdata = Tools::getValue('config_'.$mod);
                Configuration::updateValue('lava_'.$this->layout.'_'.$mod, serialize($postdata));
                $this->makeCustomStyle();
            }
        }

        if (Tools::isSubmit('submitUpdatePanel')) {
            Configuration::updateValue('PS_SHOP_ENABLE', Tools::getValue('PS_SHOP_ENABLE'));
            Configuration::updateValue('PS_MAINTENANCE_IP', Tools::getValue('PS_MAINTENANCE_IP'));
        }

        if ($errors) {
            $this->_html .= $this->displayError($errors);
        }
    }

    private function displayToolbar()
    {
        $same = '';
        $same .= "
                    dataType: 'json',
                    success: function(json) {
                        response($.map(json['item'], function(item) {
                            return {
                                label: item['name'],
                                value: item['id']
                            }
                        }));
                    }
                });
            },
            select: function(item) {
                $('input[name=\'product\']').val('');
                var button_id = $(this).attr(\"id\");
                var buttonid = $(this).attr(\"id\").replace('[', '').replace(']', '');

                $('#featured-' + buttonid + '_' + item['value']).remove();";
        $same .= "
                $('#featured-' + buttonid).append('<div id=\"featured-' + buttonid + '_' + item['value'] + '\">";
        $same .= "<i onclick=\"$(\'#featured-' + buttonid + '_' + item['value'] + '\').remove();\" ";
        $same .= "class=\"icon-minus-sign\"></i> ' + item['label'] + '<input type=\"hidden\" ";
        $same .= "name=\"' + button_id + '[]\" value=\"' + item['value'] + '\" /></div>');";
        $same .= "
            }
        });
    });
</script>";

        $this->_html .= "
<script type='text/javascript'>
    $(document).ready(function() {
        $('div.productTabs').find('a').each(function() { $(this).attr('href', '#');    });
        $('div.productTabs a').click(function() {
            var id = $(this).attr('id');
            $('.nav-profile').removeClass('active');
            $(this).addClass('active');
            $('.tab-profile').hide();
            $('.'+id).show();
        });
    });
</script>";
        $this->_html .= "
<script type='text/javascript'>
    $(document).ready(function() {
        $('.btn-upload').on('click', function() {
            var button_id = $(this).attr(\"id\");
            $('#form-upload').remove();";
        $this->_html .= "
            $('body').prepend('<form enctype=\"multipart/form-data\" id=\"form-upload\" ";
        $this->_html .= "style=\"display: none;\"><input type=\"file\" name=\"file\" /></form>');";
        $this->_html .= "
            $('#form-upload input[name=\'file\']').trigger('click');
            if (typeof timer != 'undefined') {
                clearInterval(timer);
            }

            timer = setInterval(function() {
                if ($('#form-upload input[name=\'file\']').val() != '') {
                    clearInterval(timer);        

                    $.ajax({";
        $this->_html .= "
                        url: 'index.php?controller=AdminModules&configure=lavasetting&token=";
        $this->_html .= Tools::getValue('token')."&module_name=lavasetting&ajax=1&action=UploadImage',";
        $this->_html .= "
                        type: 'post',        
                        dataType: 'json',
                        data: new FormData($('#form-upload')[0]),
                        cache: false,
                        contentType: false,
                        processData: false,        
                        beforeSend: function() {
                            $('#button-upload').button('loading');
                        },
                        complete: function() {
                            $('#button-upload').button('reset');
                        },    
                        success: function(json) {
                            if (json['success'])";
        $this->_html .= "
                                $('#ajax_confirmation').removeClass('hide').";
        $this->_html .= "removeClass('alert-danger').addClass('alert-success');";
        $this->_html .= "
                            else";
        $this->_html .= "
                                $('#ajax_confirmation').removeClass('hide').";
        $this->_html .= "removeClass('alert-success').addClass('alert-danger');";
        $this->_html .= "
                            $('#ajax_confirmation').html(json['result']);
                            $('#input-'+button_id).attr('value', json['filename']);
                            $('#thumb-'+button_id).attr('src', json['thumb']);
                        },            
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(thrownError + ".'"\r\n"'." + xhr.statusText + ".'"\r\n"'." + xhr.responseText);
                        }
                    });
                }
            }, 500);
        });
    });
</script>";

        $this->_html .= "
<script type='text/javascript'>
    $(document).ready(function() {
        $('input[name=\'product\']').autoselect({
            source: function(request, response) {
                $.ajax({";
        $this->_html .= "
                    url: 'index.php?controller=AdminModules&configure=lavasetting&token=";
        $this->_html .= Tools::getValue('token')."&module_name=lavasetting&ajax=1&action=AutoProduct',";
        $this->_html .= $same;

        $this->_html .= "
<script type='text/javascript'>
    $(document).ready(function() {
        $('input[name=\'category\']').autoselect({
            source: function(request, response) {
                $.ajax({";
        $this->_html .= "
                    url: 'index.php?controller=AdminModules&configure=lavasetting&token=";
        $this->_html .= Tools::getValue('token')."&module_name=lavasetting&ajax=1&action=AutoCategory',";
        $this->_html .= $same;

        $this->_html .= "
<script type='text/javascript'>
    $(document).ready(function() {
        $('input[name=\'manufacturer\']').autoselect({
            source: function(request, response) {
                $.ajax({";
        $this->_html .= "
                    url: 'index.php?controller=AdminModules&configure=lavasetting&token=";
        $this->_html .= Tools::getValue('token')."&module_name=lavasetting&ajax=1&action=AutoManufacturer',";
        $this->_html .= $same;

        $this->_html .= "
<script type='text/javascript'>
    $(document).ready(function() {
        $('input[name=\'information\']').autoselect({
            source: function(request, response) {
                $.ajax({";
        $this->_html .= "
                    url: 'index.php?controller=AdminModules&configure=lavasetting&token=";
        $this->_html .= Tools::getValue('token')."&module_name=lavasetting&ajax=1&action=AutoInformation',";
        $this->_html .= $same;
    }

    private function displayForm()
    {
        $this->layout = $this->getTemplateId();
        //$settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        //if (isset($settings[39]) && $settings[39] == 'FE') {
        //    $flag = ' <i class="icon-lock" style="float: right;"></i>';
        //} else {
        //    $flag = $settings[39];//'';
        //}

        $tag_front = 'a class="nav-profile list-group-item';
        $tab_tag = 'a';

        $this->_html .= '<div id="ajax_confirmation" class="alert alert-success hide"></div>';
        $this->_html .= '<div id="ajaxBox" style="display:none"></div>';
    
        $this->_html .= '<div class="row">';
        $this->_html .= '<div class="col-lg-12">';
        $this->_html .= '<div class="row">';

        $this->_html .= '<div class="productTabs col-lg-2 col-md-3">';
        $this->_html .= '<div class="list-group">';

        $style = 'font-size:14px; background-color:#fcfdfe;';
        $this->_html .= '<span class="nav-profile list-group-item" style="'.$style.'"></span>';
        $this->_html .= '<span class="nav-profile list-group-item" style="'.$style.' border-top: none;">';
        $this->_html .= '    <i class="icon-edit" style="font-size:20px;"></i>'.$this->l('Theme');
        $this->_html .= '</span>';
        $this->_html .= '<'.$tag_front.' active" id="profile-0" href="#">'.$this->l('Add New Theme').'</a>';
        if ($this->layout <> '' || $this->getThemes() <> '') {
            $this->_html .= '<'.$tag_front.'" id="profile-1" href="#">'.$this->l('Change Theme').'</a>';
            $this->_html .= '<'.$tag_front.'" id="profile-2" href="#">'.$this->l('Change Color').'</a>';
            $this->_html .= '<'.$tag_front.' hidden" id="profile-3" href="#">'.$this->l('Manage Theme').'</a>';
        }

        if ($this->layout <> '') {
            //
            // General
            //
            $this->_html .= '<span class="nav-profile list-group-item" style="'.$style.'"></span>';
            $this->_html .= '<span class="nav-profile list-group-item" style="'.$style.' border-top: none;">';
            $this->_html .= '    <i class="icon-edit" style="font-size:20px;"></i>'.$this->l('General');
            $this->_html .= '</span>';
            $this->_html .= '<'.$tag_front.'" id="profile-10" href="#">'.$this->l('Logo').'</'.$tab_tag.'>';
            $this->_html .= '<'.$tag_front.'" id="profile-11" href="#">'.$this->l('News').'</'.$tab_tag.'>';
            $this->_html .= '<'.$tag_front.'" id="profile-12" href="#">'.$this->l('Social').'</'.$tab_tag.'>';
            $this->_html .= '<'.$tag_front.'" id="profile-13" href="#">'.$this->l('Reassurance').'</'.$tab_tag.'>';
            $this->_html .= '<'.$tag_front.'" id="profile-14" href="#">'.$this->l('Info').'</'.$tab_tag.'>';

            //
            // Modules
            //
            $this->_html .= '<span class="nav-profile list-group-item" style="'.$style.'"></span>';
            $this->_html .= '<span class="nav-profile list-group-item" style="'.$style.' border-top: none;">';
            $this->_html .= '    <i class="icon-edit" style="font-size:20px;"></i>'.$this->l('Modules');
            $this->_html .= '</span>';
            $this->_html .= '<'.$tag_front.'" id="profile-20" href="#">'.$this->l('Menu').'</'.$tab_tag.'>';
            $this->_html .= '<'.$tag_front.'" id="profile-21" href="#">'.$this->l('Category').'</'.$tab_tag.'>';
            $this->_html .= '<'.$tag_front.'" id="profile-22" href="#">'.$this->l('Product').'</'.$tab_tag.'>';

            //$this->_html .= '<'.$tag_front.'" id="profile-20" href="#">'.$this->l('Count').'</'.$tab_tag.'>';
            //$this->_html .= '<'.$tag_front.'" id="profile-19" href="#">'.$this->l('Newsletter').'</'.$tab_tag.'>';
            //$this->_html .= '<'.$tag_front.'" id="profile-21" href="#">'.$this->l('Footer Links').'</'.$tab_tag.'>';
            //$this->_html .= '<'.$tag_front.'" id="profile-22" href="#">'.$this->l('Product Page').'</'.$tab_tag.'>';

            //
            // Image
            //
            $this->_html .= '<span class="nav-profile list-group-item" style="'.$style.'"></span>';
            $this->_html .= '<span class="nav-profile list-group-item" style="'.$style.' border-top: none;">';
            $this->_html .= '    <i class="icon-edit" style="font-size:20px;"></i>'.$this->l('Image');
            $this->_html .= '</span>';
            $this->_html .= '<'.$tag_front.'" id="profile-30" href="#">'.$this->l('Slider').'</'.$tab_tag.'>';
            $this->_html .= '<'.$tag_front.'" id="profile-31" href="#">'.$this->l('Banner').'</'.$tab_tag.'>';
            $this->_html .= '<'.$tag_front.'" id="profile-32" href="#">'.$this->l('Single').'</'.$tab_tag.'>';
            $this->_html .= '<'.$tag_front.'" id="profile-33" href="#">'.$this->l('Top').'</'.$tab_tag.'>';
            $this->_html .= '<'.$tag_front.'" id="profile-34" href="#">'.$this->l('Bottom').'</'.$tab_tag.'>';

            //
            // Footer
            //
            $this->_html .= '<span class="nav-profile list-group-item" style="'.$style.'"></span>';
            $this->_html .= '<span class="nav-profile list-group-item" style="'.$style.' border-top: none;">';
            $this->_html .= '    <i class="icon-edit" style="font-size:20px;"></i>'.$this->l('Footer');
            $this->_html .= '</span>';
            $this->_html .= '<'.$tag_front.'" id="profile-40" href="#">'.$this->l('Contact').'</'.$tab_tag.'>';
            $this->_html .= '<'.$tag_front.'" id="profile-41" href="#">'.$this->l('Information').'</'.$tab_tag.'>';
            $this->_html .= '<'.$tag_front.'" id="profile-42" href="#">'.$this->l('Copyright').'</'.$tab_tag.'>';

            //
            // Customize
            //
            $this->_html .= '<span class="nav-profile list-group-item" style="'.$style.'"></span>';
            $this->_html .= '<span class="nav-profile list-group-item" style="'.$style.' border-top: none;">';
            $this->_html .= '    <i class="icon-edit" style="font-size:20px;"></i>'.$this->l('Customize');
            $this->_html .= '</span>';
            $this->_html .= '<'.$tag_front.'" id="profile-50" href="#">'.$this->l('Background').'</'.$tab_tag.'>';
            $this->_html .= '<'.$tag_front.'" id="profile-51" href="#">'.$this->l('Font').'</'.$tab_tag.'>';
            $this->_html .= '<'.$tag_front.'" id="profile-52" href="#">'.$this->l('Width').'</'.$tab_tag.'>';


            //
            // Tools
            //
            $this->_html .= '<span class="nav-profile list-group-item" style="'.$style.'"></span>';
            $this->_html .= '<span class="nav-profile list-group-item" style="'.$style.' border-top: none;">';
            $this->_html .= '    <i class="icon-edit" style="font-size:20px;"></i>'.$this->l('Tools');
            $this->_html .= '</span>';
            $this->_html .= '<'.$tag_front.'" id="profile-60" href="#">'.$this->l('Maintenance').'</'.$tab_tag.'>';
            $this->_html .= '<'.$tag_front.'" id="profile-61" href="#">'.$this->l('CSS code').'</'.$tab_tag.'>';
            $this->_html .= '<'.$tag_front.'" id="profile-62" href="#">'.$this->l('Image manager').'</'.$tab_tag.'>';
            $this->_html .= '<'.$tag_front.'" id="profile-63" href="#">'.$this->l('Reset').'</'.$tab_tag.'>';
        }

        $this->_html .= '</div>';
        $this->_html .= '</div>';

        $this->displayFormTabAddTheme(0);
        if ($this->layout <> '' || $this->getThemes() <> '') {
            $this->displayFormTabChangeTheme(1);
            $this->displayFormTabChangeColor(2);
            $this->displayFormTabManageTheme(3);
        }

        $class = 'form-horizontal col-lg-10 col-md-9';
        $style = 'margin-bottom:0; min-height:0;';
        $act = Tools::safeOutput($_SERVER['REQUEST_URI']);
        $csa = 'class="'.$class.'" style="'.$style.'" action="'.$act.'"';

        if ($this->layout <> '') {
            //
            // General
            //
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabLogo(10);
            $this->_html .= '</form>';
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabNews(11);
            $this->_html .= '</form>';
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabSocial(12);
            $this->_html .= '</form>';
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabReassure(13);
            $this->_html .= '</form>';
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabReatop(14);
            $this->_html .= '</form>';

            /*
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabNewsletter(19);
            $this->_html .= '</form>';

            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabCountTo(20);
            $this->_html .= '</form>';

            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabFooter(21);
            $this->_html .= '</form>';

            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabProductPage(22);
            $this->_html .= '</form>';
            */

            //
            // Modules
            //
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabTopmenu(20);
            $this->_html .= '</form>';
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabCategory(21);
            $this->_html .= '</form>';
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabProduct(22);
            $this->_html .= '</form>';

            //
            // Image
            //
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabSlider(30);
            $this->_html .= '</form>';
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabBanner(31);
            $this->_html .= '</form>';
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabSingle(32);
            $this->_html .= '</form>';
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $items = array('8','60');
            $this->_html .= $this->displayFormTabAdvertising(33, 'advtop', $items);
            $this->_html .= '</form>';
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $items = array('6','7');
            $this->_html .= $this->displayFormTabAdvertising(34, 'advbot', $items);
            $this->_html .= '</form>';


            //
            // Footer
            //
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabContact(40);
            $this->_html .= '</form>';
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabInformation(41);
            $this->_html .= '</form>';
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabCopyright(42);
            $this->_html .= '</form>';

            //
            // Customize
            //
            $this->displayFormTabBackground(50);
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabFontColor(51);
            $this->_html .= '</form>';
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->_html .= $this->displayFormTabBootstrap(52);
            $this->_html .= '</form>';

            //
            // Tools
            //
            $this->displayFormTabMaintenance(60);
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->displayFormTabCustom(61);
            $this->_html .= '</form>';
            $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
            $this->displayFormTabImage(62);
            $this->_html .= '</form>';
            $this->displayFormTabReset(63);
        }

        $this->_html .= '</div>';
        $this->_html .= '</div>';
        $this->_html .= '</div>';
    }

    public function makeCustomStyle()
    {
        $fonts = array();

        $this->layout = $this->getTemplateId();
        $file = '';
        $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        //$imagefolder = $settings[21];
        $imagefolder = $this->getImageFolder();
        $modules = explode('|', $settings[40]);
        $css_list = explode('|', $settings[42]);
        foreach ($modules as $mod) {
            //echo $mod.'<br>';
            $moddatas = $this->displayFormTabOneModContent($mod);
            if ($moddatas) {
                if ($mod == 'background') {
                    $selector = '';
                    if ($moddatas[1]['modvalue'] == 'home page') {
                        $selector = '.common-home';
                    }
                    if ($moddatas[18]['modvalue'] == 'Static') {
                        $items = array('0','22','2','3','4','5');
                    } else {
                        $items = array('0');
                    }
                    foreach ($items as $item) {
                        if ($moddatas[$item]['modtitle'] == 'background-image' && $moddatas[$item]['modvalue'] <> '') {
                            $value = 'url(../../../'.$imagefolder.$moddatas[$item]['modvalue'].')';
                            $title = $moddatas[$item]['modtitle'];
                            $file .= $this->postProcessStyle($value, $title, $moddatas[$item]['modinfo'].$selector);
                        } else {
                            $value = $moddatas[$item]['modvalue'];
                            $title = $moddatas[$item]['modtitle'];
                            $file .= $this->postProcessStyle($value, $title, $moddatas[$item]['modinfo'].$selector);
                        }
                    }
                    $items = array('6','7','8','9','10','11','12','13','14','15','16','17',
                            '32','33','34','39','40','41','42','43','44','45','46');
                    foreach ($items as $item) {
                        if ($moddatas[$item]['modtitle'] == 'background-image' && $moddatas[$item]['modvalue'] <> '') {
                            $value = 'url(../../../'.$imagefolder.$moddatas[$item]['modvalue'].')';
                            $title = $moddatas[$item]['modtitle'];
                            $file .= $this->postProcessStyle($value, $title, $moddatas[$item]['modinfo']);
                        } else {
                            $value = $moddatas[$item]['modvalue'];
                            $title = $moddatas[$item]['modtitle'];
                            $file .= $this->postProcessStyle($value, $title, $moddatas[$item]['modinfo']);
                        }
                    }
                } elseif ($mod == 'maintenance') {
                    if ($moddatas[13]['modvalue'] == 'Static') {
                        $maintenances = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_maintenance'));
                        $maintenances[15] = 1;
                        Configuration::updateValue('lava_'.$this->layout.'_maintenance', serialize($maintenances));
                        $items = array('16','26','27','28','29','30','4','5','6','9','10','11','22','23','24');
                    } else {
                        $items = array('4','5','6','9','10','11','22','23','24');
                    }
                    foreach ($items as $item) {
                        if ($moddatas[$item]['modtitle'] == 'background-image' && $moddatas[$item]['modvalue'] <> '') {
                            $value = 'url(../../../'.$imagefolder.$moddatas[$item]['modvalue'].')';
                            $title = $moddatas[$item]['modtitle'];
                            $file .= $this->postProcessStyle($value, $title, $moddatas[$item]['modinfo']);
                        } else {
                            $value = $moddatas[$item]['modvalue'];
                            $title = $moddatas[$item]['modtitle'];
                            $file .= $this->postProcessStyle($value, $title, $moddatas[$item]['modinfo']);
                        }
                    }
                } else {
                    foreach ($moddatas as $item => $mod_data) {
                        if ($mod_data['modtitle'] <> '' && in_array($mod_data['modtitle'], $css_list)) {
                            if ($mod_data['modtitle'] == 'background-image' && $moddatas[$item]['modvalue'] <> '') {
                                $value = 'url(../../../'.$imagefolder.$mod_data['modvalue'].')';
                                $title = $mod_data['modtitle'];
                                $file .= $this->postProcessStyle($value, $title, $mod_data['modinfo']);
                            } else {
                                $value = $mod_data['modvalue'];
                                $title = $mod_data['modtitle'];
                                $file .= $this->postProcessStyle($value, $title, $mod_data['modinfo']);
                            }
                        }
                    }
                }

                // font
                foreach ($moddatas as $mod_data) {
                    if ($mod_data['modtitle'] == 'font-family') {
                        $fonts[] = $mod_data['modvalue'];
                    }
                }
            }
        }

        $googlefonts = $this->updateGooglefont($fonts);

        $current_theme = $this->layout;

        $fp = fopen(_PS_THEME_DIR_.'assets/css/'.$current_theme.'/mystyle.css', 'wb');
        fputs($fp, '@import url(\'//fonts.googleapis.com/icon?family=Material+Icons\');'."\n");
        if ($googlefonts <> '') {
            fputs($fp, '@import url(\'//fonts.googleapis.com/css?family='.$googlefonts.'\');'."\n");
        }
        fputs($fp, $file);
        fclose($fp);

        return $googlefonts;
    }

    private function changeGrid($cssvalue)
    {
        switch($cssvalue) {
            case '1/12':
                $value = '8.33333%';
                break;
            case '2/12':
                $value = '16.66667%';
                break;
            case '3/12':
                $value = '25%';
                break;
            case '4/12':
                $value = '33.33333%';
                break;
            case '5/12':
                $value = '41.66667%';
                break;
            case '6/12':
                $value = '50%';
                break;
            case '7/12':
                $value = '58.33333%';
                break;
            case '8/12':
                $value = '66.66667%';
                break;
            case '9/12':
                $value = '75%';
                break;
            case '10/12':
                $value = '83.33333%';
                break;
            case '11/12':
                $value = '91.66667%';
                break;
            case '12/12':
                $value = '100%';
                break;
            default:
                $value = $cssvalue;
                break;
        }

        return $value;
    }

    private function postProcessStyle($cssvalue, $csstitle, $selectors)
    {
        $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        $responsive = $settings[43];

        $code = '';
        if ($csstitle == 'font-size' ||
            $csstitle == 'width' ||
            $csstitle == 'height' ||
            $csstitle == 'top' ||
            $csstitle == 'left') {
            if ($responsive == 'bootstrap') {
                if (is_array($cssvalue)) {
                    if (isset($cssvalue[0]) && $cssvalue[0] <> '' && $csstitle <> '' && $selectors <> '') {
                        if (isset($cssvalue[0]) && $cssvalue[0] == '0') {
                            $csstitle = 'display';
                            $value = 'none';
                        } else {
                            $value = $this->changeGrid($cssvalue[0]);
                        }
                        $code .= $selectors.' {'.$csstitle.':'.$value.";}\n";
                    }
                    if (isset($cssvalue[1]) && $cssvalue[1] <> '' && $csstitle <> '' && $selectors <> '') {
                        if (isset($cssvalue[1]) && $cssvalue[1] == '0') {
                            $csstitle = 'display';
                            $value = 'none';
                        } else {
                            $value = $this->changeGrid($cssvalue[1]);
                        }
                        $code .= "@media (min-width: 768px) {\n";
                        $code .= "    ".$selectors.' {'.$csstitle.':'.$value.";}\n";
                        $code .= "}\n";
                    }
                    if (isset($cssvalue[2]) && $cssvalue[2] <> '' && $csstitle <> '' && $selectors <> '') {
                        if (isset($cssvalue[2]) && $cssvalue[2] == '0') {
                            $csstitle = 'display';
                            $value = 'none';
                        } else {
                            $value = $this->changeGrid($cssvalue[2]);
                        }
                        $code .= "@media (min-width: 992px) {\n";
                        $code .= "    ".$selectors.' {'.$csstitle.':'.$value.";}\n";
                        $code .= "}\n";
                    }
                    if (isset($cssvalue[3]) && $cssvalue[3] <> '' && $csstitle <> '' && $selectors <> '') {
                        if (isset($cssvalue[3]) && $cssvalue[3] == '0') {
                            $csstitle = 'display';
                            $value = 'none';
                        } else {
                            $value = $this->changeGrid($cssvalue[3]);
                        }
                        $code .= "@media (min-width: 1200px) {\n";
                        $code .= "    ".$selectors.' {'.$csstitle.':'.$value.";}\n";
                        $code .= "}\n";
                    }
                }
            } elseif ($responsive == 'pure') {
                if (isset($cssvalue[0]) && $cssvalue[0] <> '' && $csstitle <> '' && $selectors <> '') {
                    $code .= $selectors.' {'.$csstitle.':'.$cssvalue[0].";}\n";
                }
                if (isset($cssvalue[1]) && $cssvalue[1] <> '' && $csstitle <> '' && $selectors <> '') {
                    $code .= "@media screen and (min-width: 35.5em) {\n";
                    $code .= "    ".$selectors.' {'.$csstitle.':'.$cssvalue[1].";}\n";
                    $code .= "}\n";
                }
                if (isset($cssvalue[2]) && $cssvalue[2] <> '' && $csstitle <> '' && $selectors <> '') {
                    $code .= "@media screen and (min-width: 48em) {\n";
                    $code .= "    ".$selectors.' {'.$csstitle.':'.$cssvalue[2].";}\n";
                    $code .= "}\n";
                }
                if (isset($cssvalue[3]) && $cssvalue[3] <> '' && $csstitle <> '' && $selectors <> '') {
                    $code .= "@media screen and (min-width: 64em) {\n";
                    $code .= "    ".$selectors.' {'.$csstitle.':'.$cssvalue[3].";}\n";
                    $code .= "}\n";
                }
                if (isset($cssvalue[4]) && $cssvalue[4] <> '' && $csstitle <> '' && $selectors <> '') {
                    $code .= "@media screen and (min-width: 80em) {\n";
                    $code .= "    ".$selectors.' {'.$csstitle.':'.$cssvalue[4].";}\n";
                    $code .= "}\n";
                }
            }
        } else {
            if ($cssvalue <> '' && $csstitle <> '' && $selectors <> '') {
                if ($csstitle == 'font-family') {
                    $cssvalues = explode(':', $cssvalue);
                    $cssvalue = $cssvalues[0];
                }
                $code .= $selectors.' {'.$csstitle.':'.$cssvalue.";}\n";
            }
        }
        return $code;
    }

    private function updateFacebook($sandbox)
    {
        if ($sandbox == 'no' && Configuration::get('lava_update_fblike') <> 'no') {
            Configuration::updateValue('lava_update_fblike', 'no');
            $result = Tools::file_get_contents(_PS_MODULE_DIR_.'uhuassist/uhuassist.php');
            $result = str_replace('/* uhupage', '/* uhupage */', $result);
            $result = str_replace('*/ //uhupage', '/* uhupage */', $result);
            file_put_contents(_PS_MODULE_DIR_.'uhuassist/uhuassist.php', $result);
        }
    }

    private function displayFormTabMaintenance($tab)
    {
        $class = 'form-horizontal col-lg-10 col-md-9';
        $style = 'margin-bottom:0; min-height:0;';
        $act = Tools::safeOutput($_SERVER['REQUEST_URI']);
        $csa = 'class="'.$class.'" style="'.$style.'" action="'.$act.'"';

        $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
        $this->_html .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';

        $this->_html .= '<div class="panel product-tab" id="tabPane1">';
        $this->_html .= '<h3>'.$this->l('Maintenance').'</h3>';

        $tips = $this->l('Please deactivate your shop before you make any changes.');
        $this->_html .= '<div class="alert alert-info">'.$tips.'</div>';
        $this->_html .= '<div class="form-group">';
        $this->_html .= '<label class="control-label col-lg-3">'.$this->l('Enable Shop').'</label>';
        $this->_html .= '<div class="col-lg-9">
                            <div class="row">
                                <div class="input-group col-lg-2">
                                    <span class="switch prestashop-switch">
                                        <input type="radio" name="PS_SHOP_ENABLE" id="PS_SHOP_ENABLE_1" value="1" '.
                                        ((Configuration::get('PS_SHOP_ENABLE') == 1) ? 'checked="checked"' : '').'>
                                        <label for="PS_SHOP_ENABLE_1">
                                            <i class="icon-check-sign color_success"></i> Yes
                                        </label>
                                        <input type="radio" name="PS_SHOP_ENABLE" id="PS_SHOP_ENABLE_0" value="0" '.
                                        ((Configuration::get('PS_SHOP_ENABLE') == 0) ? 'checked="checked"' : '').'>
                                        <label for="PS_SHOP_ENABLE_0">
                                            <i class="icon-ban-circle color_danger"></i> No
                                        </label>
                                        <a class="slide-button btn btn-default"></a>
                                    </span>
                                </div>
                            </div>
                            <div class="help-block">
                                Activate or deactivate your shop.
                            </div>
                        </div>';
        $this->_html .= '</div>';

        $hint = $this->l('IP addresses allowed to access the Front Office even if the shop is disabled. 
                        Please use a comma to separate them (e.g. 42.24.4.2,127.0.0.1,99.98.97.96)');

        $this->_html .= '<div class="form-group">
                            <div id="conf_id_PS_MAINTENANCE_IP">
                                <label class="control-label col-lg-3">
                                    <span title="" data-toggle="tooltip" class="label-tooltip"
                                    data-original-title="'.$hint.'" data-html="true">Maintenance IP</span>
                                </label>';
        $this->_html .= '
                        <script type="text/javascript">
                            function addRemoteAddr()
                            {
                                var length = $(\'input[name=PS_MAINTENANCE_IP]\').attr(\'value\').length;
                                if (length > 0) ';
        $this->_html .= ' $(\'input[name=PS_MAINTENANCE_IP]\').attr(\'value\',';
        $this->_html .= ' $(\'input[name=PS_MAINTENANCE_IP]\').attr(\'value\') +\','.Tools::getRemoteAddr().'\');';
        $this->_html .= ' else ';
        $this->_html .= ' $(\'input[name=PS_MAINTENANCE_IP]\').attr(\'value\',\''.Tools::getRemoteAddr().'\');
                            }
                        </script>';
        $this->_html .= '<div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-8">
                                    <input type="text" size="5" name="PS_MAINTENANCE_IP"
                                    value="'.Configuration::get('PS_MAINTENANCE_IP').'">
                                </div>
                                <div class="col-lg-1">
                                    <button type="button" class="btn btn-default" onclick="addRemoteAddr();">
                                    <i class="icon-plus"></i> '.$this->l('Add my IP').'</button>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>';

        $this->_html .= '<div class="panel-footer" id="toolbar-footer">';
        $this->_html .= '<button type="submit" class="btn btn-default pull-right" name="submitUpdatePanel">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $this->_html .= '</div>';
        $this->_html .= '</div>';

        if (Configuration::get('PS_SHOP_ENABLE') == 0) {
            $mod_name = 'maintenance';
            $settings = $this->displayFormTabOneModContent($mod_name);
            $selects = $this->getSelectValue($settings, $mod_name);
            $this->_html .= '<div class="panel product-tab" id="tabPane1">';
            $this->_html .= '<h3>'.$this->l('Maintenance Page').'</h3>';
            $items = array('0','1','2');
            $this->_html .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

            $this->_html .= '<h3>'.$this->l('Text').'</h3>';
            $items = array('3','4','5','6','7','8','9','10','11','12','21','22','23','24','25');
            $this->_html .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

            $this->_html .= '<h3>'.$this->l('Countdown').'</h3>';
            $display = 'true';
            $items = array('20','17','18','19');
            $this->_html .= $this->makeFormgroups($settings, $mod_name, $items, $selects, $display);

            $this->_html .= '<h3>'.$this->l('Background').'</h3>';
            $display = 'true';
            $items = array('13','14');
            $this->_html .= $this->makeFormgroups($settings, $mod_name, $items, $selects, $display);
            $items = array('26','27','28','29','16','15');
            $this->_html .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

            $item = 15;
            $slider_number = $settings[$item]['modvalue'];
            for ($i = 0; $i < $slider_number; $i++) {
                $item = 30 + $i;
                $sourceitem = 30;
                $this->_html .= $this->makeFormgroup($settings, $mod_name, $item, $sourceitem, $selects);
            }

            $this->_html .= '<div class="panel-footer" id="toolbar-footer">';
            $this->_html .= '<button type="submit" class="btn btn-default pull-right" name="submitMaintenance">
                                <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
            $this->_html .= '</div>';
            $this->_html .= '</div>';
        }

        $this->_html .= '</div>';
        $this->_html .= '</form>';
    }

    private function displayFormTabAddTheme($tab)
    {
        $class = 'form-horizontal col-lg-10 col-md-9';
        $style = 'margin-bottom:0; min-height:0;';
        $act = Tools::safeOutput($_SERVER['REQUEST_URI']);
        $csa = 'class="'.$class.'" style="'.$style.'" action="'.$act.'"';

        $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
        $this->_html .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:block">';

        $this->_html .= '<div class="panel product-tab" id="tabPane1">';
        $this->_html .= '<h3>'.$this->l('Add a new theme').'</h3>';
        $this->_html .= '<div class="form-group">';
        $this->_html .= '<label class="control-label col-lg-3">'.$this->l('Archive File').'</label>';
        $this->_html .= '<div class="col-lg-9 ">';
        $this->_html .= '    <div class="row">';
        $this->_html .= '        <div class="margin-form col-lg-4">';
        $style = 'border-color:#C7D6DB; border-width:1px; border-style:solid; padding:5px;';
        $this->_html .= '            <input type="file" style="'.$style.'" id="themearchive" name="themearchive" />';
        $this->_html .= '            <p class="clear">'.$this->l('Where is your zip file?').'</p>';
        $this->_html .= '        </div>';
        $this->_html .= '    </div>';
        $this->_html .= '</div>';
        $this->_html .= '</div>';

        $this->_html .= '<div class="panel-footer" id="toolbar-footer">';
        $style = 'display:block; width:30px; height:30px; margin:0 auto; font-size:28px;';
        $style .= 'background:transparent; background-size:26px; background-position:center;';
        $this->_html .= '<button type="submit" class="btn btn-default pull-right" name="submitImportTheme">
                            <i style="'.$style.'" class="icon-upload-alt"></i> '.$this->l('Upload').'</button>';
        $this->_html .= '</div>';
        $this->_html .= '</div>';

        $this->_html .= '</div>';
        $this->_html .= '</form>';
    }

    private function displayFormTabChangeTheme($tab)
    {
        $class = 'form-horizontal col-lg-10 col-md-9';
        $style = 'margin-bottom:0; min-height:0;';
        $act = Tools::safeOutput($_SERVER['REQUEST_URI']);
        $csa = 'class="'.$class.'" style="'.$style.'" action="'.$act.'"';

        $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
        $this->_html .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';

        $themes = Tools::unserialize(Configuration::get(_THEME_NAME_));
        $themes_styles = explode('|', $themes[3]);
        $selectd_style = $themes[4];
        $style_value = explode('|', $themes[5]);

        $this->_html .= '<div class="panel product-tab" id="tabPane1">';
        $this->_html .= '<h3>'.$this->l('Theme: Style').'</h3>';

        $this->_html .= '<div class="form-group">';
        $this->_html .= '<label class="control-label col-lg-1"></label>';
        $this->_html .= '<div class="col-lg-10">';
        foreach ($themes_styles as $key => $theme) {
            $selected = ($selectd_style == $theme) ? 'checked="checked"' : '';
            $style = 'padding:4px;margin:0 0 20px 0;height:180px;overflow:hidden;';
            $imgfile = _THEME_DIR_.'assets/img/'.$theme.'/preview.jpg';

            if ($theme <> '') {
                $this->_html .= '<div style="margin-bottom:30px;" class="radio col-xs-6 col-sm-4 col-md-3 col-lg-2">';
                $this->_html .= '<div style="'.$style.'"><img style="max-width:120px;" src="'.$imgfile.'" /></div>';
                $this->_html .= '<label><input type="radio" name="selected_theme_style" id="selected_'.$theme.'"';
                $this->_html .= ' value="'.$theme.'" '.$selected.'>';
                $this->_html .= $style_value[$key ++].'</label>';
                $this->_html .= '</div>';
            }
        }
        $this->_html .= '</div>';
        $this->_html .= '</div>';

        $this->_html .= '<div class="panel-footer" id="toolbar-footer">';
        $this->_html .= '<button type="submit" class="btn btn-default pull-right" name="submitChoiseThemeStyle">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $this->_html .= '</div>';
        $this->_html .= '</div>';

        $this->_html .= '</div>';
        $this->_html .= '</form>';
    }

    private function displayFormTabChangeColor($tab)
    {
        $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        $themecolor_names = explode('|', $settings[3]);
        $themecolor_value = explode('|', $settings[4]);
        //$imagefolder = $settings[21];
        //$selectd_theme = $settings[41];
        $themes = Tools::unserialize(Configuration::get(_THEME_NAME_));
        $selectd_color = $themes[8];

        $class = 'form-horizontal col-lg-10 col-md-9';
        $style = 'margin-bottom:0; min-height:0;';
        $act = Tools::safeOutput($_SERVER['REQUEST_URI']);
        $csa = 'class="'.$class.'" style="'.$style.'" action="'.$act.'"';

        $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
        $this->_html .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';

        //
        // switch theme
        //
        $this->_html .= '<div class="panel product-tab" id="tabPane1">';
        $this->_html .= '<h3>'.$this->l('Theme: Color').'</h3>';
        $id = 0;
        foreach ($themecolor_names as $id => $themes_name) {
            $selected = ($selectd_color == $themes_name) ? 'checked="checked"' : '';
            $this->_html .= '<div class="form-group">';
            $style = 'padding-top:0;';
            $this->_html .= '<label class="control-label col-lg-1" style="'.$style.'">';
            $this->_html .= '<span style="margin-right: 10px;">'.$themes_name.'</span>';
            $this->_html .= '<input type="radio" name="selected_theme_color" id="selected_'.$themes_name.'
                                " value="'.$themes_name.'" '.$selected.'>';
            $this->_html .= '</label>';
            $this->_html .= '<div class="col-lg-11">';
            $colors = explode('^', $themecolor_value[$id]);
            $items = array('0','1','2','3','4','5','6','7','8','9','10','11','12','13');
            $this->_html .= $this->displayFormTabThemeColorSingle($items, $colors, '', '', '');
            //$colors = explode('^', $themecolor_value[$id]);
            //$items = array('6','7','8','9','10','11','12','13');
            //$this->_html .= $this->displayFormTabThemeColorSingle($items, $colors, '', '', '');
            $this->_html .= '</div>';
            $this->_html .= '</div>';
            //$this->_html .= '<br><br>';
        }

        $this->_html .= '<div class="panel-footer" id="toolbar-footer">';
        $this->_html .= '<button type="submit" class="btn btn-default pull-right" name="submitChoiseThemeColor">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $this->_html .= '</div>';
        $this->_html .= '</div>';

        $this->_html .= '</div>';
        $this->_html .= '</form>';
    }

    private function displayFormTabManageTheme($tab)
    {
        $class = 'form-horizontal col-lg-10 col-md-9';
        $style = 'margin-bottom:0; min-height:0;';
        $act = Tools::safeOutput($_SERVER['REQUEST_URI']);
        $csa = 'class="'.$class.'" style="'.$style.'" action="'.$act.'"';

        $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
        $this->_html .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';

        $themes = Tools::unserialize(Configuration::get(_THEME_NAME_));
        $themes_styles = explode('|', $themes[3]);
        $selectd_style = $themes[4];
        $style_value = explode('|', $themes[5]);

        $this->_html .= '<div class="panel product-tab" id="tabPane1">';
        $this->_html .= '<h3>'.$this->l('Theme: Style').'</h3>';

        $this->_html .= '<div class="form-group">';
        $this->_html .= '<label class="control-label col-lg-1"></label>';
        $this->_html .= '<div class="col-lg-10">';
        foreach ($themes_styles as $key => $theme) {
            $selected = ($selectd_style == $theme) ? 'checked="checked"' : '';
            $style = 'padding:4px;margin:0 0 20px 0;height:180px;overflow:hidden;';
            $imgfile = _MODULE_DIR_.$this->name.'/views/img/'.$theme.'/preview.jpg';

            if ($theme <> '') {
                $this->_html .= '<div style="margin-bottom:30px;" class="radio col-xs-6 col-sm-4 col-md-3 col-lg-2">';
                $this->_html .= '<div style="'.$style.'"><img style="max-width:120px;" src="'.$imgfile.'" /></div>';
                $this->_html .= '<label><input type="radio" name="selected_theme_style" id="selected_'.$theme.'"';
                $this->_html .= ' value="'.$theme.'" '.$selected.'>';
                $this->_html .= $style_value[$key ++].'</label>';
                $this->_html .= '</div>';
            }
        }
        $this->_html .= '</div>';
        $this->_html .= '</div>';

        $this->_html .= '<div class="form-group">';
        $this->_html .= '<label class="control-label col-lg-1">Theme ID</label>';
        $this->_html .= '<div class="col-lg-9">
                            <div class="input-group col-lg-9">
                                <input style="border-radius: 3px" type="text" name="theme_id" value="'.$themes[3].'">
                            </div>
                        </div>
                        </div>';

        $this->_html .= '<div class="form-group">';
        $this->_html .= '<label class="control-label col-lg-1">Title</label>';
        $this->_html .= '<div class="col-lg-9">
                            <div class="input-group col-lg-9">
                                <input style="border-radius: 3px" type="text" name="theme_title" value="'.$themes[5].'">
                            </div>
                        </div>
                        </div>';

        $this->_html .= '<div class="panel-footer" id="toolbar-footer">';
        $this->_html .= '<button type="submit" class="btn btn-default pull-right" name="submitManageThemes">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $this->_html .= '</div>';
        $this->_html .= '</div>';

        $this->_html .= '</div>';
        $this->_html .= '</form>';
    }

    private function displayFormTabReset($tab)
    {
        $mod_name = 'setting';
        $values = $this->displayFormTabOneModContent($mod_name);
        $settings = array();
        $settings[] = array(
            'modorder'   => $values[40]['modorder'],
            'modtype'    => $values[40]['modtype'],
            'modid'      => $values[40]['modid'],
            'modtitle'   => $values[40]['modtitle'],
            'modinfo'    => $values[40]['modinfo'],
            'modvalue'   => $values[40]['modvalue'],
            'moddisplay' => $values[40]['moddisplay'],
            'modname'    => $values[40]['modname'],
            'moddesp'    => $values[40]['moddesp']
        );
        $selects = $this->getSelectValue($settings, $mod_name);

        $class = 'form-horizontal col-lg-10 col-md-9';
        $style = 'margin-bottom:0; min-height:0;';
        $act = Tools::safeOutput($_SERVER['REQUEST_URI']);
        $csa = 'class="'.$class.'" style="'.$style.'" action="'.$act.'"';

        $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
        $this->_html .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';

        $this->_html .= '<div class="panel product-tab" id="tabPane1">';
        $this->_html .= '<h3>'.$this->l('Reset Module').'</h3>';
        /*
        $this->_html .= '<div class="form-group">';
        $this->_html .= '<label class="control-label col-lg-3">Module name</label>';
        $this->_html .= '<div class="col-lg-9 ">';
        $this->_html .= '    <div class="row">';
        $this->_html .= '        <div class="input-group col-lg-4">';
        $this->_html .= '            <input type="text" name="reset_module" id="" value="">';
        $this->_html .= '        </div>';
        $this->_html .= '    </div>';
        $this->_html .= '</div>';
        $this->_html .= '</div>';
        */
        $sourceitem = 0;
        $display = 'true';
        //$desp = $settings[$sourceitem]['moddesp'];
        $type = $settings[$sourceitem]['modtype'];
        $label = $settings[$sourceitem]['modname'];
        $title =$settings[$sourceitem]['modtitle'];
        $value = $settings[$sourceitem]['modvalue'];
        $name = 'reset_module';

        $this->_html .= $this->showFormgroup($display);
        $this->_html .= $this->showLabel('', $label);
        $this->_html .= '<div class="col-lg-9">';

        if (isset($selects[$sourceitem])) {
            $select = $selects[$sourceitem];
            $select[] = 'setting';
        } else {
            $select = '';
        }
        $this->_html .= $this->makeAllinput('', $type, $name, $select, $value, $title, $sourceitem, $settings);

        $this->_html .= '</div>';
        $this->_html .= $this->showFormgroupEnd();

        $this->_html .= '<div class="panel-footer" id="toolbar-footer">';
        $this->_html .= '<button type="submit" class="btn btn-default pull-right" name="submitResetMod">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $this->_html .= '</div>';
        $this->_html .= '</div>';

        $this->_html .= '</div>';
        $this->_html .= '</form>';
    }

    protected function displayFormTabOneModContent($mod_name)
    {
        $data = array();

        $current_theme = $this->getTemplateId();

        if (file_exists(_PS_THEME_DIR_.'config/'.$current_theme.'/mod_'.$mod_name.'.txt')) {
            $item_total = $this->getConfigCount($mod_name);

            $mvalue = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_'.$mod_name));
            $fp = fopen(_PS_THEME_DIR_.'config/'.$current_theme.'/mod_'.$mod_name.'.txt', 'rb');
            for ($j = 0; $j < $item_total; $j++) {
                $modorder = trim(fgets($fp));
                $modtype = trim(fgets($fp));
                $modid = trim(fgets($fp));
                $modtitle = trim(fgets($fp));
                $modinfo = trim(fgets($fp));
                $modvalue = trim(fgets($fp));
                $moddisplay = trim(fgets($fp));
                $modname = trim(fgets($fp));
                $moddesp = trim(fgets($fp));

                if (isset($mvalue[$j])) {
                    $data[$j] = array(
                        'modorder'   => $modorder,
                        'modtype'    => $modtype,
                        'modid'      => $modid,
                        'modtitle'   => $modtitle,
                        'modinfo'    => $modinfo,
                        'modvalue'   => $mvalue[$j],
                        'moddisplay' => $moddisplay,
                        'modname'    => $modname,//$this->language->get('entry_'.$mod_name.'_'.$id),
                        'moddesp'    => $moddesp,//$this->language->get('help_'.$mod_name.'_'.$id)
                    );
                } else {
                    $data[$j] = array(
                        'modorder'   => $modorder,
                        'modtype'    => $modtype,
                        'modid'      => $modid,
                        'modtitle'   => $modtitle,
                        'modinfo'    => $modinfo,
                        'modvalue'   => $modvalue,
                        'moddisplay' => $moddisplay,
                        'modname'    => $modname,//$this->language->get('entry_'.$mod_name.'_'.$id),
                        'moddesp'    => $moddesp,//$this->language->get('help_'.$mod_name.'_'.$id)
                    );
                }
            }

            $mods = array('slider','news','background','advtop','advbot');
            if (in_array($mod_name, $mods)) {
                if ($mod_name == 'slider') {
                    $total = 20 + 10 * $mvalue[2];
                }
                if ($mod_name == 'advtop' || $mod_name == 'advbot') {
                    $total = 20 + 6 * $mvalue[8];
                }
                if ($mod_name == 'news') {
                    $total = 20 + 10 * $mvalue[5];
                }
                //if ($mod_name == 'topmenu') {
                //    $total = 50 + 5 * $mvalue[25];
                //}
                if ($mod_name == 'background') {
                    $total = 22 + 1 * $mvalue[21];
                }
                if ($total > $item_total) {
                    for ($j = $item_total; $j < $total; $j++) {
                        if (isset($mvalue[$j])) {
                            $data[$j] = array(
                                'modorder'   => '',
                                'modtype'    => '',
                                'modid'      => '',
                                'modtitle'   => '',
                                'modinfo'    => '',
                                'modvalue'   => $mvalue[$j],
                                'moddisplay' => '',
                                'modname'    => '',
                                'moddesp'    => ''
                            );
                        } else {
                            $data[$j] = array(
                                'modorder'   => '',
                                'modtype'    => '',
                                'modid'      => '',
                                'modtitle'   => '',
                                'modinfo'    => '',
                                'modvalue'   => '',
                                'moddisplay' => '',
                                'modname'    => '',
                                'moddesp'    => ''
                            );
                        }
                    }
                }
            } elseif ($mod_name == 'categories') {
                $total = 10 + 10 * $mvalue[5];
            }
            fclose($fp);
        } else {
            echo 'Need config file: '._PS_THEME_DIR_.'config/'.$current_theme.'/mod_' . $mod_name . '.txt<br>';
        }

        return $data;
    }

    public function getSelectValue($settings, $mod_name)
    {
        $selects = array();
        foreach ($settings as $item => $setting) {
            if ($setting['modtype'] == 'select' || $setting['modtype'] == 'selectresponsive') {
                if ($setting['moddesp'] == '') {
                    echo 'Error:' . $mod_name. ' - ' . $item . '<br>';
                } else {
                    $selects[$item] = explode('|', $settings[$item]['moddesp']);
                }
            }
        }
        return $selects;
    }

    private function displayColumns($mod_name, $id)
    {
        $tpl = '';
        $setting = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        $columns = explode('|', $setting[$id]);

        $settings = $this->displayFormTabOneModContent($mod_name);
        $selects = $this->getSelectValue($settings, $mod_name);
        $item_total = $this->getConfigCount($mod_name);

        foreach ($columns as $column) {
            $label = $this->translateWord($column, (int)$this->context->language->id);
            $tpl .= '<h3>'.$label.'</h3>';
            for ($item = 0; $item < $item_total; $item++) {
                if ($settings[$item]['modorder'] == Tools::strtolower($column)) {
                    $tpl .= $this->makeFormgroup($settings, $mod_name, $item, $item, $selects);
                }
            }
        }
        return $tpl;
    }

    private function displayFormOneModule($mod_name, $displayids, $mod_title = '')
    {
        $tpl = '';
        $settings = $this->displayFormTabOneModContent($mod_name);
        $selects = $this->getSelectValue($settings, $mod_name);
        $item_total = $this->getConfigCount($mod_name);

        if ($mod_title <> '') {
            $label = $this->translateWord($mod_title, (int)$this->context->language->id);
        } else {
            $label = $this->translateWord($mod_name, (int)$this->context->language->id);
        }

        $tpl .= '<h3>'.$label.'</h3>';

        if (count($displayids) > 0) {
            $tpl .= $this->displayItemDisplay($displayids);
        }

        for ($item = 0; $item < $item_total; $item++) {
            $tpl .= '<br>';
            $tpl .= $this->makeFormgroup($settings, $mod_name, $item, $item, $selects);
        }
        return $tpl;
    }

    private function displayFormTabFontColor($tab)
    {
        $tpl = '';

        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $mod_name = 'fontcolor';
        $tpl .= $this->displayColumns($mod_name, 46);

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    private function displayFormTabBootstrap($tab)
    {
        $tpl = '';

        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $mod_name = 'bootstrap';
        $tpl .= $this->displayColumns($mod_name, 47);

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    private function displayFormTabBackground($tab)
    {
        $class = 'form-horizontal col-lg-10 col-md-9';
        $style = 'margin-bottom:0; min-height:0;';
        $act = Tools::safeOutput($_SERVER['REQUEST_URI']);
        $csa = 'class="'.$class.'" style="'.$style.'" action="'.$act.'"';

        $this->_html .= '<form '.$csa.' method="post" enctype="multipart/form-data">';
        $this->_html .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $this->_html .= '<div class="panel product-tab" id="tabPane1">';

        $mod_name = 'background';
        $settings = $this->displayFormTabOneModContent($mod_name);
        $selects = $this->getSelectValue($settings, $mod_name);

        $this->_html .= '<h3>'.$this->l('Body').'</h3>';
        $items = array('1','0','2','3','4','5','20');
        $this->_html .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $display = 'true';
        $items = array('18','19','21');
        $this->_html .= $this->makeFormgroups($settings, $mod_name, $items, $selects, $display);

        $slider_number = $settings[21]['modvalue'];
        for ($i = 0; $i < $slider_number; $i++) {
            $item = 22 + $i;
            $sourceitem = 22;
            $this->_html .= $this->makeFormgroup($settings, $mod_name, $item, $sourceitem, $selects);
        }

        $this->_html .= '<h3>'.$this->l('Header').'</h3>';
        $items = array('6','7','8','9','10','11');
        $this->_html .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $this->_html .= '<h3>'.$this->l('Footer').'</h3>';
        $items = array('12','13','14','15','16','17');
        $this->_html .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $this->_html .= '<h3>'.$this->l('News').'</h3>';
        $items = array('32', '35');
        $this->_html .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $this->_html .= '<h3>'.$this->l('Reassure').'</h3>';
        $items = array('33','36');
        $this->_html .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $this->_html .= '<h3>'.$this->l('Category').'</h3>';
        $items = array('34','37');
        $this->_html .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $this->_html .= '<h3>'.$this->l('Breadcrumb').'</h3>';
        $items = array('38','39','40','41','42','43','44','45','46');
        $this->_html .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $this->_html .= '<div class="panel-footer" id="toolbar-footer">';
        $this->_html .= '<button type="submit" class="btn btn-default pull-right" name="submitConfigBackground">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $this->_html .= '</div>';

        $this->_html .= '</div>';
        $this->_html .= '</div>';
        $this->_html .= '</form>';
    }

    private function displayItemDisplay($items, $display = '')
    {
        $tpl = '';
        $mod_name = 'display';
        $settings = $this->displayFormTabOneModContent($mod_name);
        $selects = $this->getSelectValue($settings, $mod_name);

        $tpl .= '<br><br>';
        foreach ($items as $item) {
            $tpl .= $this->makeFormgroup($settings, $mod_name, $item, $item, $selects, $display);
        }
        $tpl .= '<br><br>';

        return $tpl;
    }

    private function displayFormTabTopmenu($tab)
    {
        $tpl = '';

        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $displayids = '';
        $mod_name = 'topmenu';
        $settings = $this->displayFormTabOneModContent($mod_name);
        $selects = $this->getSelectValue($settings, $mod_name);

        $tpl .= '<h3>'.$this->l('General').'</h3>';

        $items = array('2','3','17','18');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);

        $items = array('12','16','0','31');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<h3>'.$this->l('Categories').'</h3>';
        $items = array('11','12');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);

        $items = array('38','17','8');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<h3>'.$this->l('Products').'</h3>';
        $items = array('13','14');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);

        $items = array('39','18','6','14','15');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<h3>'.$this->l('Brands').'</h3>';
        $items = array('15','16');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);

        $items = array('40','19','7');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<h3>'.$this->l('News').'</h3>';
        $items = array('9','10');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);

        $items = array('48','20','59','9');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<br><hr><br>';
        $items = array('52','51','53','54','55','56','57','58');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<br><br><br>';
        $tpl .= '<h3>'.$this->l('Custom CMS').'</h3>';
        $items = array('27');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $display = 'false';
        if ($settings[27]['modvalue'] > 0) {
            $display = 'true';
            $tpl .= '<br><hr><br>';
        }
        $items = array('23','24','43','1');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects, $display);

        $display = 'false';
        if ($settings[27]['modvalue'] > 1) {
            $display = 'true';
            $tpl .= '<br><hr><br>';
        }
        $items = array('44','45','46','2');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects, $display);

        $display = 'false';
        if ($settings[27]['modvalue'] > 2) {
            $display = 'true';
            $tpl .= '<br><hr><br>';
        }
        $items = array('26','28','29','3');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects, $display);

        $display = 'false';
        if ($settings[27]['modvalue'] > 3) {
            $display = 'true';
            $tpl .= '<br><hr><br>';
        }
        $items = array('35','36','37','4');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects, $display);

        $display = 'false';
        if ($settings[27]['modvalue'] > 4) {
            $display = 'true';
            $tpl .= '<br><hr><br>';
        }
        $items = array('41','42','47','5');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects, $display);

        $tpl .= '<br><br><br>';
        $tpl .= '<h3>'.$this->l('Custom Category').'</h3>';
        $items = array('40','41','75','76');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);

        $item = 25;
        $items_number = $settings[$item]['modvalue'];
        $tpl .= $this->makeFormgroup($settings, $mod_name, $item, $item, $selects);

        $tpl .= '<br><hr><br>';
        $items = array('30','32','33','34');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        for ($i = 1; $i < $items_number; $i++) {
            $tpl .= '<br><hr><br>';
            for ($j = 0; $j < 5; $j++) {
                $item = 55 + $i * 5 + $j;
                $sourceitem = 30 + $j;
                $tpl .= $this->makeFormgroup($settings, $mod_name, $item, $sourceitem, $selects);
            }
        }
        $tpl .= '<br><br><br>';
        $tpl .= '<h3>'.$this->l('Custom Link').'</h3>';
        $items = array('13');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $display = 'false';
        if ($settings[13]['modvalue'] > 0) {
            $display = 'true';
            $tpl .= '<br><hr><br>';
        }
        $items = array('10','21','49','158');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects, $display);

        $item = 158;
        $items_number = $settings[$item]['modvalue'];
        for ($i = 0; $i < $items_number; $i++) {
            $tpl .= '<br><br>';
            for ($j = 0; $j < 3; $j++) {
                $item = 86 + $i * 3 + $j;
                $sourceitem = 86 + $j;
                $tpl .= $this->makeFormgroup($settings, $mod_name, $item, $sourceitem, $selects);
            }
        }

        $display = 'false';
        if ($settings[13]['modvalue'] > 1) {
            $display = 'true';
            $tpl .= '<br><hr><br>';
        }
        $items = array('11','22','50','159');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects, $display);

        $item = 159;
        $items_number = $settings[$item]['modvalue'];
        for ($i = 0; $i < $items_number; $i++) {
            $tpl .= '<br><br>';
            for ($j = 0; $j < 3; $j++) {
                $item = 122 + $i * 3 + $j;
                $sourceitem = 86 + $j;
                $tpl .= $this->makeFormgroup($settings, $mod_name, $item, $sourceitem, $selects);
            }
        }

        //$tpl .= '<br><br><br>';
        //$tpl .= '<h3>'.$this->l('Menu Title').'</h3>';
        //$items = array('12','16','38','17','39','18','40','19','48','20');
        //$tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    private function displayFormTabCategory($tab)
    {
        $tpl = '';

        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $displayids = '';
        $mod_name = 'categories';
        $settings = $this->displayFormTabOneModContent($mod_name);
        $selects = $this->getSelectValue($settings, $mod_name);

        $items = array('52','53');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('6','7','0','1','2','3','4','8','9');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $item = 5;
        $items_number = $settings[$item]['modvalue'];
        $tpl .= $this->makeFormgroup($settings, $mod_name, $item, $item, $selects);
        for ($i = 0; $i < $items_number; $i++) {
            $tpl .= '<br><hr><br>';
            for ($j = 0; $j < 10; $j++) {
                $item = 10 + $i * 10 + $j;
                $sourceitem = 10 + $j;
                $tpl .= $this->makeFormgroup($settings, $mod_name, $item, $sourceitem, $selects);
            }
        }

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    private function displayFormTabProduct($tab)
    {
        $tpl = '';

        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $displayids = '';
        $mod_name = 'product';
        $settings = $this->displayFormTabOneModContent($mod_name);
        $selects = $this->getSelectValue($settings, $mod_name);

        $tpl .= '<h3>'.$this->l('Popular').'</h3>';
        $items = array('32', '58');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('0','12','10','9');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);
        $tpl .= '<br><br><br>';

        $tpl .= '<h3>'.$this->l('New arrivals').'</h3>';
        $items = array('33', '57');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('1','11','15');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);
        $tpl .= '<br><br><br>';

        $tpl .= '<h3>'.$this->l('Best Sellers').'</h3>';
        $items = array('34');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('2','13');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);
        $tpl .= '<br><br><br>';

        $tpl .= '<h3>'.$this->l('Specials').'</h3>';
        $items = array('35','60');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('3','14','22','23','24','25');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);
        $tpl .= '<br><br><br>';

        $tpl .= '<h3>'.$this->l('New Products on Featured Category').'</h3>';
        $items = array('36','51');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('6','16','17','26');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);
        $tpl .= '<br><br><br>';

        $items = array('4','5','8','18','19','20','21');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    //
    // General 10
    //
    private function displayFormTabLogo($tab)
    {
        $tpl = '';
        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $displayids = '';
        $mod_name = 'logo';
        $items = array('42','43','44');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayFormOneModule($mod_name, $items);

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    //
    // General 11
    //
    private function displayFormTabNews($tab)
    {
        $tpl = '';
        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $displayids = '';
        $mod_name = 'news';
        $settings = $this->displayFormTabOneModContent($mod_name);
        $selects = $this->getSelectValue($settings, $mod_name);

        $tpl .= '<h3>'.$this->l('General').'</h3>';

        $items = array('19','45');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('6','7','4','8','9','10','0','1','2','3','11','12','13','14','15','16','17','18','19');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<br><br>';
        $tpl .= '<h3>'.$this->l('News').'</h3>';
        $item = 5;
        $tpl .= $this->makeFormgroup($settings, $mod_name, $item, $item, $selects);

        $news_number = $settings[$item]['modvalue'];
        for ($i = 0; $i < $news_number; $i++) {
            $tpl .= '<br><hr></br>';
            for ($j = 0; $j < 10; $j++) {
                $item = 20 + $i * 10 + $j;
                $sourceitem = 20 + $j;
                $tpl .= $this->makeFormgroup($settings, $mod_name, $item, $sourceitem, $selects);
            }
        }

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    //
    // General 12
    //
    private function displayFormTabSocial($tab)
    {
        $tpl = '';
        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $displayids = '';
        $mod_name = 'social';
        $items = array('27');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayFormOneModule($mod_name, $items);

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    //
    // General 13
    //
    private function displayFormTabReassure($tab)
    {
        $tpl = '';
        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $displayids = '';
        $mod_name = 'reassure';
        $items = array('29');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayFormOneModule($mod_name, $items);

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    //
    // General 14
    //
    private function displayFormTabReatop($tab)
    {
        $tpl = '';
        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $displayids = '';
        $mod_name = 'reatop';
        $mod_title = 'Custom Block on Header';
        $items = array('47','48');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayFormOneModule($mod_name, $items, $mod_title);

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    //
    // Footer 40
    //
    private function displayFormTabContact($tab)
    {
        $tpl = '';
        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $displayids = '';
        $mod_name = 'contact';
        $items = array('30');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayFormOneModule($mod_name, $items);

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    //
    // Footer 41
    //
    private function displayFormTabInformation($tab)
    {
        $tpl = '';
        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $displayids = '';
        $mod_name = 'information';
        $settings = $this->displayFormTabOneModContent($mod_name);
        $selects = $this->getSelectValue($settings, $mod_name);

        $tpl .= '<h3>'.$this->l('Information').'</h3>';
        $items = array('30');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('0','31','1','2','3','4','5','6','7','8','9','10');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<h3>'.$this->l('Account').'</h3>';
        $items = array('22');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('34');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<h3>'.$this->l('Service').'</h3>';
        $items = array('49');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('33','11','12','13','14','15','16','17','18','19','20');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<h3>'.$this->l('Extras').'</h3>';
        $items = array('50','23','67','68','69');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('32','21','22','23','24','25','26','27','28','29','30');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    //
    // Footer 42
    //
    private function displayFormTabCopyright($tab)
    {
        $tpl = '';
        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $displayids = '';
        $mod_name = 'copyright';
        $items = array('20','39');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayFormOneModule($mod_name, $items);

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    private function displayFormTabSlider($tab)
    {
        $tpl = '';
        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $displayids = '';
        $mod_name = 'slider';
        $settings = $this->displayFormTabOneModContent($mod_name);
        $selects = $this->getSelectValue($settings, $mod_name);

        $tpl .= '<h3>'.$this->l('General').'</h3>';

        $items = array('4','5');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);

        $items = array('4','14','10','15','0','1','12','5','6','19');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $display = 'false';
        if ($settings[4]['modvalue'] == 'RefineSlide') {
            $display = 'true';
        }
        $items = array('3','9','13','16');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects, $display);
        $items = array('7','8','11','17','18');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects, $display);

        $tpl .= '<br><br><br><br><br>';
        $tpl .= '<h3></h3>';
        $items = array('2');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $slider_number = $settings[2]['modvalue'];
        for ($i = 0; $i < $slider_number; $i++) {
            $tpl .= '<h3>'.$this->l('Slider').':'.($i + 1).'</h3>';
            for ($j = 0; $j < 10; $j++) {
                $item = 20 + $i * 10 + $j;
                $sourceitem = 20 + $j;
                $tpl .= $this->makeFormgroup($settings, $mod_name, $item, $sourceitem, $selects);
            }
        }

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    private function displayFormTabAdvertising($tab, $mod_name, $display)
    {
        $tpl = '';
        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $displayids = '';
        //$mod_name = 'advtop';
        //$mod_names .= $mod_name.'|';
        $settings = $this->displayFormTabOneModContent($mod_name);
        $selects = $this->getSelectValue($settings, $mod_name);

        $tpl .= '<h3>'.$this->l('Position: Content Top').'</h3>';

        $items = $display;
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('8','1','2','3','4','5','6','7');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $buts = array('0','9','10','11','12','13','14','15','16','17','18','19');
        $slider_number = $settings[8]['modvalue'];
        for ($i = 0; $i < $slider_number; $i++) {
            $tpl .= '<br><hr><br>';
            for ($j = 0; $j < 6; $j++) {
                $item = 20 + $i * 6 + $j;
                $sourceitem = 20 + $j;
                $display = '';
                if ($settings[$item]['modtitle'] == 'Multi-languages') {
                    if ($settings[6]['modvalue'] == 'uhuadvertising') {
                        $display = 'false';
                    }
                }
                $tpl .= $this->makeFormgroup($settings, $mod_name, $item, $sourceitem, $selects, $display);
            }

            $item = $buts[$i];
            $sourceitem = $buts[$i];
            $display = '';
            if ($settings[$item]['modtitle'] == 'Multi-languages') {
                if ($settings[6]['modvalue'] == 'uhuadvertising') {
                    $display = 'false';
                }
            }
            $tpl .= $this->makeFormgroup($settings, $mod_name, $item, $sourceitem, $selects, $display);
        }

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    private function displayFormTabSingle($tab)
    {
        $tpl = '';
        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $displayids = '';
        $mod_name = 'banners';
        $settings = $this->displayFormTabOneModContent($mod_name);
        $selects = $this->getSelectValue($settings, $mod_name);

        $tpl .= '<h3>'.$this->l('Top').'</h3>';
        $items = array('61');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('1','2','3');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);
        $items = array('4','5','0','6');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<h3>'.$this->l('Topcolumn').'</h3>';
        $items = array('62');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('8','9','10');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);
        $items = array('11','12','7','13');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<h3>'.$this->l('Hometab').'</h3>';
        $items = array('63');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('15','16','17');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);
        $items = array('18','19','14','20');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<h3>'.$this->l('Home').'</h3>';
        $items = array('64');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('22','23','24');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);
        $items = array('25','26','21','27');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    private function displayFormTabBanner($tab)
    {
        $tpl = '';
        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $displayids = '';
        $mod_name = 'banner';
        $settings = $this->displayFormTabOneModContent($mod_name);
        $selects = $this->getSelectValue($settings, $mod_name);

        $tpl .= '<h3>'.$this->l('Banner').'</h3>';
        $items = array('0');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);

        $items = array('1','2','3');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $items = array('4','5');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $items = array('7','8','9','10','11');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<br><br><h3>'.$this->l('Top Banner').'</h3>';
        $items = array('1');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);

        $items = array('16','17','18');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $items = array('19','20');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $items = array('6','21','22','23','24','0');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<br><br><h3>'.$this->l('Translations').'</h3>';
        $items = array('12','13','14','15');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    private function displayFormTabCountTo($tab)
    {
        $tpl = '';
        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $displayids = '';
        $mod_name = 'count';
        $items = array('65','66');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayFormOneModule($mod_name, $items);

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    private function displayFormTabNewsletter($tab)
    {
        $tpl = '';
        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $displayids = '';
        $mod_name = 'newsletter';
        $items = array('54','28');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayFormOneModule($mod_name, $items);

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    private function displayFormTabFooter($tab)
    {
        $tpl = '';

        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $displayids = '';
        $mod_name = 'information';
        $settings = $this->displayFormTabOneModContent($mod_name);
        $selects = $this->getSelectValue($settings, $mod_name);

        $tpl .= '<h3>'.$this->l('Information').'</h3>';
        $items = array('21','38');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('0','1','2','3','4','5','6','7','8','9','10');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<h3>'.$this->l('Customer Service').'</h3>';
        $items = array('49','24','25','26');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('11','12','13','14','15','16','17','18','19','20');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<h3>'.$this->l('Extras').'</h3>';
        $items = array('50','23','67','68','69');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('21','22','23','24','25','26','27','28','29','30');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<h3>'.$this->l('My account').'</h3>';
        $items = array('22');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);

        $tpl .= '<h3>'.$this->l('Translations').'</h3>';
        $items = array('31','32','33','34');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_name.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    private function displayFormTabProductPage($tab)
    {
        //$setting = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        $tpl = '';

        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $tpl .= '<div class="panel product-tab" id="tabPane1">';

        $mod_names = '';
        $displayids = '';

        $mod_name = 'reaproduct';
        $mod_names .= $mod_name.'|';
        $settings = $this->displayFormTabOneModContent($mod_name);
        $selects = $this->getSelectValue($settings, $mod_name);

        $tpl .= '<h3>'.$this->l('Reassurance').'</h3>';
        $items = array('37');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('0','1','2');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);
        $item = 1;
        $rea_number = $settings[$item]['modvalue'];
        for ($i = 0; $i < $rea_number; $i++) {
            $tpl .= '<br><br><br>';
            for ($j = 0; $j < 3; $j++) {
                $item = 3 + $i * 3 + $j;
                $sourceitem = $item;
                $tpl .= $this->makeFormgroup($settings, $mod_name, $item, $sourceitem, $selects);
            }
        }

        $tpl .= '<br><br>';

        $mod_name = 'advpro';
        $mod_names .= $mod_name.'|';
        $settings = $this->displayFormTabOneModContent($mod_name);
        $selects = $this->getSelectValue($settings, $mod_name);

        $tpl .= '<h3>'.$this->l('Advertising').'</h3>';

        $items = array('7');
        foreach ($items as $item) {
            $displayids .= $item.'|';
        }
        $tpl .= $this->displayItemDisplay($items);
        $items = array('8','1','2','3','4','5','6','7');
        $tpl .= $this->makeFormgroups($settings, $mod_name, $items, $selects);

        $buts = array('0','9','10','11','12','13','14','15','16','17','18','19');
        $image_set = 12 / $settings[8]['modvalue'];
        $slider_number = $settings[8]['modvalue'];
        for ($set = 0; $set < $image_set; $set++) {
            $tpl .= '<br><br><br>';
            $tpl .= '<h3>'.$this->l('Random image set').'</h3>';
            for ($i = 0; $i < $slider_number; $i++) {
                for ($j = 0; $j < 6; $j++) {
                    $item = 20 + $set * $slider_number * 6 + $i * 6 + $j;
                    $sourceitem = $item;
                    $display = '';
                    if ($settings[$item]['modtitle'] == 'Multi-languages') {
                        if ($settings[6]['modvalue'] == 'uhuadvertising') {
                            $display = 'false';
                        }
                    }
                    $tpl .= $this->makeFormgroup($settings, $mod_name, $item, $sourceitem, $selects, $display);
                }

                $item = $buts[$i];
                $sourceitem = $buts[$i];
                $display = '';
                if ($settings[$item]['modtitle'] == 'Multi-languages') {
                    if ($settings[6]['modvalue'] == 'uhuadvertising') {
                        $display = 'false';
                    }
                }
                $tpl .= $this->makeFormgroup($settings, $mod_name, $item, $sourceitem, $selects, $display);
            }
        }

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<input type="hidden" name="displayids" value="'.$displayids.'" />';
        $tpl .= '<input type="hidden" name="mod" value="'.$mod_names.'" />';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitModsConfig">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    private function displayFormTabCustom($tab)
    {
        $this->_html .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $this->_html .= '<div class="panel product-tab" id="tabPane1">';

        $this->_html .= '<h3>'.$this->l('Add your CSS styles').'</h3>';
        $this->_html .= '<div class="form-group">';
        $this->_html .= '<label class="control-label col-lg-3">'.$this->l('CSS:').'</label>';
        $this->_html .= '<div class="col-lg-9">';
        $this->_html .= '<textarea id="customcss" name="customcss" cols="100" rows="25">';
        $this->_html .= Configuration::get('lava_custom_css');
        $this->_html .= '</textarea>';
        $this->_html .= '</div>';
        $this->_html .= '</div>';

        $this->_html .= '<div class="panel-footer" id="toolbar-footer">';
        $this->_html .= '<button type="submit" class="btn btn-default pull-right" name="submitCustomCSS">
                            <i class="process-icon-save"></i> '.$this->l('Save Custom CSS').'</button>';
        $this->_html .= '</div>';

        $this->_html .= '</div>';
        $this->_html .= '</div>';
    }

    private function displayFormTabImage($tab)
    {
        $imagefolder = $this->getImageFolder();

        $this->_html .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';
        $this->_html .= '<div class="panel product-tab" id="tabPane1">';

        $this->_html .= '<h3>'.$this->l('Image').'</h3>';
        if (is_dir(_PS_THEME_DIR_.$imagefolder)) {
            $patternfile = scandir(_PS_THEME_DIR_.$imagefolder);
            $pattern = count($patternfile);
            for ($i = 0; $i < $pattern; $i++) {
                $imgfile = _PS_THEME_DIR_.$imagefolder.$patternfile[$i];
                if (is_file($imgfile) && $patternfile[$i] <> 'index.php') {
                    $this->_html .= '<div class="form-group">';
                    $this->_html .= '<label class="control-label col-lg-3">'.$patternfile[$i].'</label>';
                    $this->_html .= '<div class="col-lg-9">';
                    $this->_html .= '<div class="form-group">';
                    $this->_html .= '<div class="col-lg-6">';

                    $style = 'border:1px solid #ccc;padding:10px;margin:0;max-width:200px;max-height:100px;';
                    $imgfile = _THEME_DIR_.$imagefolder.$patternfile[$i];
                    $this->_html .= '<img style="'.$style.'" src="'.$imgfile.'" />';
                    $this->_html .= '<div class="btn-group-action pull-right" style="line-height: 12px;">';
                    $this->_html .= '<a class="btn btn-default" href="index.php?controller=AdminModules&amp;';
                    $this->_html .= 'configure='.$this->name.'&amp;token='.Tools::getAdminTokenLite('AdminModules');
                    $this->_html .= '&amp;configure='.$this->name.'&amp;delete_id_image='.$patternfile[$i].'">';
                    $this->_html .= '<i class="icon-trash"></i>Delete</a>';
                    $this->_html .= '</div>';
                    $this->_html .= '</div>';
                    $this->_html .= '</div>';
                    $this->_html .= '</div>';
                    $this->_html .= '</div>';
                }
            }
        }

        $this->_html .= '</div>';
        $this->_html .= '</div>';
    }

    public function makeFormgroups($settings, $mod_name, $items, $selects, $display = '')
    {
        $tpl = '';
        foreach ($items as $item) {
            $tpl .= $this->makeFormgroup($settings, $mod_name, $item, $item, $selects, $display);
        }
        return $tpl;
    }

    public function makeFormgroup($settings, $mod_name, $item, $sourceitem, $selects, $display = '')
    {
        $tpl = '';
        if (isset($settings[$sourceitem])) {
            if ($display == '') {
                $display = $settings[$sourceitem]['moddisplay'];
            }

            $mods = array('fontcolor','bootstrap','news','banner','banners','advbot','categories');
            if ($this->layout <> '') {
                $setting = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
            }
            if (in_array($mod_name, $mods) && isset($setting[39]) && $setting[39] == 'FE') {
                $order = 'lock';
            } else {
                $order = $settings[$sourceitem]['modorder'];
            }

            //$desp = $settings[$sourceitem]['moddesp'];
            $type = $settings[$sourceitem]['modtype'];
            $label = $settings[$sourceitem]['modname'];
            $label = $this->translateWord($label, (int)$this->context->language->id);

            $title =$settings[$sourceitem]['modtitle'];

            $value = $settings[$item]['modvalue'];
            $name = 'config_'. $mod_name . '[' . $item . ']';

            $tpl .= $this->showFormgroup($display);
            $tpl .= $this->showLabel($order, $label);
            $tpl .= '<div class="col-lg-9">';

            if (isset($selects[$sourceitem])) {
                $select = $selects[$sourceitem];
            } else {
                $select = '';
            }
            $tpl .= $this->makeAllinput($order, $type, $name, $select, $value, $title, $item, $settings);

            $tpl .= '</div>';
            $tpl .= $this->showFormgroupEnd();
        } else {
            echo 'Warning: '.$mod_name.' : '. $item.' : '.$sourceitem.'<br>';
        }

        return $tpl;
    }

    public function showFormgroup($display)
    {
        $tpl = '<div class="form-group' . (($display <> 'true') ? ' hidden' : '') . '">';

        return $tpl;
    }

    public function showFormgroupEnd()
    {
        $tpl = '</div>';

        return $tpl;
    }

    public function showLabel($order, $label)
    {
        if ($this->layout <> '') {
            $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        }
        if (isset($settings[39]) && $settings[39] == 'FE' && $order == 'lock') {
            $tpl = '<label class="control-label col-lg-3">';
            $tpl .= '<i class="icon-lock"></i> '.$label;
        } else {
            $tpl = '<label class="control-label col-lg-3">';
            $tpl .= $label;
        }
        $tpl .= '</label>';

        return $tpl;
    }

    public function makeAllinput($order, $type, $name, $select, $value, $title, $item, $settings = '')
    {
        $tpl = '';
        $id_lang = (int)$this->context->language->id;

        if ($type == 'select') {
            $tpl .= $this->makeSelect($order, $name, $select, $value);
        } elseif ($type == 'selectresponsive') {
            $tpl .= $this->makeSelectresponsive($order, $name, $select, $value);
        } elseif ($type == 'selectcategory') {
            $tpl .= $this->makeSelectcategory($order, $name, $value, $id_lang);
        } elseif ($type == 'fontsize') {
            $tpl .= $this->makeSelectfontsize($order, $name, $value);
        } elseif ($type == 'font') {
            $tpl .= $this->makeSelectfont($order, $name, $value);
        } elseif ($type == 'upload') {
            $placeholder = $this->l('Choose a file');
            $button = $this->l('Upload');
            $tpl .= $this->makeUpload($order, $name, $value, $placeholder, $button);
        } elseif ($type == 'textarea') {
            $tpl .= $this->makeTextarea($order, $name, $value, $title);
        } elseif ($type == 'color') {
            $tpl .= $this->makeColor($order, $name, $value);
        } elseif ($type == 'autoproduct') {
            $title = $this->l('Products');
            $tpl .= $this->makeAutoproduct($name, $settings, $item, $id_lang, $title);
        } elseif ($type == 'autocategory') {
            $title = $this->l('Categories');
            $tpl .= $this->makeAutocategory($order, $name, $settings, $item, $id_lang, $title);
        } elseif ($type == 'automanufacturer') {
            $title = $this->l('Manufacturer');
            $tpl .= $this->makeAutomanufacturer($name, $settings, $item, $id_lang, $title);
        } elseif ($type == 'autoinformation') {
            $title = $this->l('CMS');
            $tpl .= $this->makeAutoinformation($name, $settings, $item, $id_lang, $title);
        } else {
            $tpl .= $this->makeInput($order, $name, $value, $title);
        }

        return $tpl;
    }

    private function loadConfigFile()
    {
        $current_theme = $this->getTemplateId();

        $mod_file = _PS_THEME_DIR_.'config/'.$current_theme.'/mod_setting.txt';
        if (file_exists($mod_file)) {
            $result = Tools::file_get_contents($mod_file);
            $results = explode(PHP_EOL, $result);

            $modules_list = explode('|', trim($results[365]));
            foreach ($modules_list as $mod_name) {
                $this->resetModContent($mod_name, $current_theme);
            }
        }
        $this->resetModContent('setting', $current_theme);
    }

    public function loadModTheme()
    {
        $mod_name = 'theme';
        if (file_exists(_PS_THEME_DIR_.'config/mod_'.$mod_name.'.txt')) {
            $result = Tools::file_get_contents(_PS_THEME_DIR_.'config/mod_'.$mod_name.'.txt');
            $results = explode(PHP_EOL, $result);
            $item_total = (count($results) - 1) / 9;
            //$value = array();
            $fp2 = fopen(_PS_THEME_DIR_.'config/mod_'.$mod_name.'.txt', 'rb');
            $mvalue = array();
            for ($j = 0; $j < $item_total; $j++) {
                fgets($fp2);
                fgets($fp2);
                fgets($fp2);
                fgets($fp2);
                fgets($fp2);
                $mvalue[$j] = trim(fgets($fp2));
                fgets($fp2);
                fgets($fp2);
                fgets($fp2);
            }
            fclose($fp2);
            Configuration::updateValue(_THEME_NAME_, serialize($mvalue));
        }
    }

    protected function resetModContent($mod_name, $current_theme)
    {
        if (file_exists(_PS_THEME_DIR_.'config/'.$current_theme.'/mod_'.$mod_name.'.txt')) {
            $item_total = $this->getConfigCount($mod_name);
            $value = array();
            $fp2 = fopen(_PS_THEME_DIR_.'config/'.$current_theme.'/mod_'.$mod_name.'.txt', 'rb');
            $mvalue = array();
            for ($j = 0; $j < $item_total; $j++) {
                fgets($fp2);
                $type = fgets($fp2);
                fgets($fp2);
                fgets($fp2);
                fgets($fp2);
                $myvalue = trim(fgets($fp2));
                $myvalue = str_replace('[br]', "\r\n", $myvalue);
                if (strstr($myvalue, '¤') <> '') {
                    $values = explode('|', $myvalue);
                    foreach ($values as $value) {
                        $langs = explode('¤', $value);
                        if (isset($langs[1]) && $langs[1] <> '') {
                            $mvalue[$j][$langs[1]] = $langs[0];
                        }
                    }
                } else {
                    if (strstr($type, 'auto') <> '') {
                        $mvalue[$j] = explode(',', $myvalue);
                    } elseif (strstr($type, 'fontsize') <> '') {
                        $mvalue[$j] = explode(',', $myvalue);
                    } elseif (strstr($type, 'selectresponsive') <> '') {
                        $mvalue[$j] = explode(',', $myvalue);
                    } else {
                        $mvalue[$j] = $myvalue;
                    }
                }
                fgets($fp2);
                fgets($fp2);
                fgets($fp2);
            }
            fclose($fp2);

            Configuration::updateValue('lava_'.$current_theme.'_'.$mod_name, serialize($mvalue));
        }
    }

    /*
        Ajax process
    */
    public function ajaxProcessUploadImage()
    {
        $json = array();

        $file = basename(html_entity_decode($_FILES['file']['name'], ENT_QUOTES, 'UTF-8'));
        $imagefolder = $this->getImageFolder();

        move_uploaded_file($_FILES['file']['tmp_name'], _PS_THEME_DIR_.$imagefolder . $file);

        $json['filename'] = $file;
        $new_image = _THEME_DIR_.$imagefolder.$file;

        $json['thumb'] = $new_image;
        $json['success'] = true;
        $json['result'] = 'text_upload';

        die(Tools::jsonEncode($json));
    }

    public function ajaxProcessAutoProduct()
    {
        $json = array();

        $lang = (int)Context::getContext()->language->id;
        $category = new Category((int)Configuration::get('HOME_FEATURED_CAT'), $lang);
        $nb = (int)Configuration::get('HOME_FEATURED_NBR');
        $nb = ($nb ? $nb : 8);
        if (Configuration::get('HOME_FEATURED_RANDOMIZE')) {
            $results = $category->getProducts($lang, 1, $nb, null, null, false, true, true, $nb);
        } else {
            $results = $category->getProducts($lang, 1, $nb, 'position');
        }

        if ($results) {
            foreach ($results as $result) {
                $json['item'][] = array(
                    'id'   => $result['id_product'],
                    'name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
                );
            }
            $json['success'] = true;
        } else {
            $json['success'] = false;
        }
        $json['result'] = count($results);

        die(Tools::jsonEncode($json));
    }

    public function ajaxProcessAutoManufacturer()
    {
        $json = array();

        $results = Manufacturer::getManufacturers();
        if ($results) {
            foreach ($results as $result) {
                $json['item'][] = array(
                    'id'   => $result['id_manufacturer'],
                    'name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
                );
            }
            $json['success'] = true;
        } else {
            $json['success'] = false;
        }
        $json['result'] = count($results);

        die(Tools::jsonEncode($json));
    }

    public function ajaxProcessAutoInformation()
    {
        $json = array();

        $items = $this->getMenuItems();
        $options = $this->getCMSOptions(0, 1, $this->context->language->id, $items);
        $options = rtrim($options, '|');
        $results = explode('|', $options);
        if ($results) {
            foreach ($results as $result) {
                $res = explode(':', $result);
                $json['item'][] = array(
                    'id'   => $res[0],
                    'name' => strip_tags(html_entity_decode($res[1], ENT_QUOTES, 'UTF-8'))
                );
            }
            $json['success'] = true;
        } else {
            $json['success'] = false;
        }
        $json['result'] = $options;

        die(Tools::jsonEncode($json));
    }

    public function ajaxProcessAutoCategory()
    {
        $json = array();

        $items = $this->getMenuItems();
        $shop_id = (int)$this->context->shop->id;
        $lang = (int)Context::getContext()->language->id;
        $categories = $this->customGetNestedCategories($shop_id, null, $lang, false);
        $options = $this->generateCategoriesOption($categories, $items);
        $options = rtrim($options, '|');
        $results = explode('|', $options);
        if ($results) {
            foreach ($results as $result) {
                $res = explode(':', $result);
                $json['item'][] = array(
                    'id'   => $res[0],
                    'name' => strip_tags(html_entity_decode($res[1], ENT_QUOTES, 'UTF-8'))
                );
            }
            $json['success'] = true;
        } else {
            $json['success'] = false;
        }
        $json['result'] = $options;

        die(Tools::jsonEncode($json));
    }

    protected function getCMSOptions($parent = 0, $depth = 1, $id_lang = false, $items_to_skip = null, $id_shop = false)
    {
        $html = '';
        $id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
        $id_shop = ($id_shop !== false) ? $id_shop : Context::getContext()->shop->id;
        $categories = $this->getCMSCategories(false, (int)$parent, (int)$id_lang, (int)$id_shop);
        $pages = $this->getCMSPages((int)$parent, (int)$id_shop, (int)$id_lang);

        $spacer = str_repeat('&nbsp;', $this->spacer_size * (int)$depth);

        foreach ($categories as $category) {
            if (isset($items_to_skip)) {
                $html .= $category['id_cms_category'].':'.$spacer.$category['name'].'|';
            }
            $cid = $category['id_cms_category'];
            $html .= $this->getCMSOptions($cid, (int)$depth + 1, (int)$id_lang, $items_to_skip);
        }

        foreach ($pages as $page) {
            if (isset($items_to_skip)) {
                $html .= $page['id_cms'].':'.$spacer.$page['meta_title'].'|';
            }
        }

        return $html;
    }

    protected function getCMSCategories($recursive = false, $parent = 1, $id_lang = false, $id_shop = false)
    {
        $id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
        $id_shop = ($id_shop !== false) ? $id_shop : Context::getContext()->shop->id;
        $join_shop = '';
        $where_shop = '';
        $categories = array();

        if (Tools::version_compare(_PS_VERSION_, '1.6.0.12', '>=') == true) {
            $join_shop = ' INNER JOIN `'._DB_PREFIX_.'cms_category_shop` cs
            ON (bcp.`id_cms_category` = cs.`id_cms_category`)';
            $where_shop = ' AND cs.`id_shop` = '.(int)$id_shop.' AND cl.`id_shop` = '.(int)$id_shop;
        }

        if ($recursive === false) {
            $sql = 'SELECT bcp.`id_cms_category`, bcp.`id_parent`, bcp.`level_depth`, 
                bcp.`active`, bcp.`position`, cl.`name`, cl.`link_rewrite`
                FROM `'._DB_PREFIX_.'cms_category` bcp'.
                $join_shop.'
                INNER JOIN `'._DB_PREFIX_.'cms_category_lang` cl
                ON (bcp.`id_cms_category` = cl.`id_cms_category`)
                WHERE cl.`id_lang` = '.(int)$id_lang.'
                AND bcp.`id_parent` = '.(int)$parent.
                $where_shop;

            return Db::getInstance()->executeS($sql);
        } else {
            $sql = 'SELECT bcp.`id_cms_category`, bcp.`id_parent`, bcp.`level_depth`, 
                bcp.`active`, bcp.`position`, cl.`name`, cl.`link_rewrite`
                FROM `'._DB_PREFIX_.'cms_category` bcp'.
                $join_shop.'
                INNER JOIN `'._DB_PREFIX_.'cms_category_lang` cl
                ON (bcp.`id_cms_category` = cl.`id_cms_category`)
                WHERE cl.`id_lang` = '.(int)$id_lang.'
                AND bcp.`id_parent` = '.(int)$parent.
                $where_shop;

            $results = Db::getInstance()->executeS($sql);
            foreach ($results as $result) {
                $sub_categories = $this->getCMSCategories(true, $result['id_cms_category'], (int)$id_lang);
                if ($sub_categories && count($sub_categories) > 0) {
                    $result['sub_categories'] = $sub_categories;
                }
                $categories[] = $result;
            }

            return isset($categories) ? $categories : false;
        }

    }

    protected function getCMSPages($id_cms_category, $id_shop = false, $id_lang = false)
    {
        $id_shop = ($id_shop !== false) ? (int)$id_shop : (int)Context::getContext()->shop->id;
        $id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;

        $where_shop = '';
        if (Tools::version_compare(_PS_VERSION_, '1.6.0.12', '>=') == true) {
            $where_shop = ' AND cl.`id_shop` = '.(int)$id_shop;
        }

        $sql = 'SELECT c.`id_cms`, cl.`meta_title`, cl.`link_rewrite`
            FROM `'._DB_PREFIX_.'cms` c
            INNER JOIN `'._DB_PREFIX_.'cms_shop` cs
            ON (c.`id_cms` = cs.`id_cms`)
            INNER JOIN `'._DB_PREFIX_.'cms_lang` cl
            ON (c.`id_cms` = cl.`id_cms`)
            WHERE c.`id_cms_category` = '.(int)$id_cms_category.'
            AND cs.`id_shop` = '.(int)$id_shop.'
            AND cl.`id_lang` = '.(int)$id_lang.
            $where_shop.'
            AND c.`active` = 1
            ORDER BY `position`';

        return Db::getInstance()->executeS($sql);
    }

    protected function generateCategoriesOption($categories, $items_to_skip = null)
    {
        $html = '';

        foreach ($categories as $category) {
            if (isset($items_to_skip) /*&& !in_array('CAT'.(int)$category['id_category'], $items_to_skip)*/) {
                $html .= (int)$category['id_category'].':'
                    .str_repeat('&nbsp;', $this->spacer_size * (int)$category['level_depth']).$category['name'].'|';
            }

            if (isset($category['children']) && !empty($category['children'])) {
                $html .= $this->generateCategoriesOption($category['children'], $items_to_skip);
            }

        }
        return $html;
    }

    public function customGetNestedCategories($shop_id, $root_category = null, $id_lang = false, $active = false)
    {
        $groups = null;
        $use_shop_restriction = true;
        $sql_filter = '';
        $sql_sort = '';
        $sql_limit = '';

        if (isset($root_category) && !Validate::isInt($root_category)) {
            die(Tools::displayError());
        }

        if (!Validate::isBool($active)) {
            die(Tools::displayError());
        }

        if (isset($groups) && Group::isFeatureActive() && !is_array($groups)) {
            $groups = (array)$groups;
        }

        $sql = 'SELECT c.*, cl.*
            FROM `'._DB_PREFIX_.'category` c
            INNER JOIN `'._DB_PREFIX_.'category_shop` category_shop
            ON (category_shop.`id_category` = c.`id_category` AND category_shop.`id_shop` = "'.(int)$shop_id.'")
            LEFT JOIN `'._DB_PREFIX_.'category_lang` cl
            ON (c.`id_category` = cl.`id_category` AND cl.`id_shop` = "'.(int)$shop_id.'")
            WHERE 1 '.$sql_filter.' '.($id_lang ? 'AND cl.`id_lang` = '.(int)$id_lang : '').'
            '.($active ? ' AND (c.`active` = 1 OR c.`is_root_category` = 1)' : '').'
            '.(isset($groups) && Group::isFeatureActive() ? ' AND cg.`id_group` IN ('.implode(',', $groups).')' : '').'
            '.(!$id_lang || (isset($groups) && Group::isFeatureActive()) ? ' GROUP BY c.`id_category`' : '').'
            '.($sql_sort != '' ? $sql_sort : ' ORDER BY c.`level_depth` ASC').'
            '.($sql_sort == '' && $use_shop_restriction ? ', category_shop.`position` ASC' : '').'
            '.($sql_limit != '' ? $sql_limit : '');
        $result = Db::getInstance()->executeS($sql);

        $categories = array();
        $buff = array();

        foreach ($result as $row) {
            $current = &$buff[$row['id_category']];
            $current = $row;

            if ($row['id_parent'] == 0) {
                $categories[$row['id_category']] = &$current;
            } else {
                $buff[$row['id_parent']]['children'][$row['id_category']] = &$current;
            }
        }

        return $categories;
    }

    protected function getMenuItems()
    {
        $items = Tools::getValue('items');
        if (is_array($items) && count($items)) {
            return $items;
        } else {
            $shops = Shop::getContextListShopID();
            $conf = null;

            if (count($shops) > 1) {
                foreach ($shops as $key => $shop_id) {
                    $shop_group_id = Shop::getGroupFromShop($shop_id);
                    $conf .= (string)($key > 1 ? ',' : '');
                    $conf .= Configuration::get('MOD_BLOCKTOPMENU_ITEMS', null, $shop_group_id, $shop_id);
                }
            } else {
                $shop_id = (int)$shops[0];
                $shop_group_id = Shop::getGroupFromShop($shop_id);
                $conf = Configuration::get('MOD_BLOCKTOPMENU_ITEMS', null, $shop_group_id, $shop_id);
            }

            if (Tools::strlen($conf)) {
                return explode(',', $conf);
            } else {
                return array();
            }
        }
    }

    private function displayFormTabThemeColorSingle($items, $colors, $mycolors, $label, $titles)
    {
        $tpl = '';

        //$tpl .= '<div class="form-group">';
        $style = 'padding-top:0;';
        if ($label <> '') {
            $tpl .= '<label class="control-label col-lg-3" style="'.$style.'">'.$label.'</label>';
            $tpl .= '<div class="col-lg-9">';
        } else {
            $tpl .= '<div class="col-lg-12">';
        }

        if ($colors <> '') {
            /*$tpl .= '    <div class="row">';
            foreach ($items as $item) {
                $style = 'width:110px; height:50px; border-radius:3px; border: 1px solid #C7D6DB; ';
                $style .= 'float:left; margin-left:10px; ';
                $style .= 'background-color:'.$colors[$item];
                $tpl .= '        <div class="attributes-color-container" style="'.$style.';"></div>';
            }
            $tpl .= '    </div>';*/

            $tpl .= '    <div class="row">';
            foreach ($items as $item) {
                $style = 'float:left; margin-left:10px;';
                $tpl .= '        <span style="'.$style.' color:'.$colors[$item].';">';
                $tpl .= $colors[$item];
                $tpl .= '        </span>';
            }
            $tpl .= '    </div>';
            $tpl .= '    <br>';
        }

        if ($mycolors <> '') {
            $tpl .= '    <div class="row">';
            foreach ($items as $item) {
                $style = 'float:left; width:110px; margin-left:10px; ';
                if (isset($mycolors[$item])) {
                    $value = $mycolors[$item];
                } else {
                    $value = '';
                }
                $nameid = 'mycolor_'.$item;
                $tpl .= '<div class="input-group" style="'.$style.'">';
                $tpl .= '<input type="text" data-hex="true" class="color mColorPickerInput mColorPicker"
                        name="'.$nameid.'" value="'.$value.'" id="'.$nameid.'">';
                $class = 'mColorPickerTrigger input-group-addon';
                $tpl .= '<span style="cursor:pointer;" id="icp_'.$nameid.'"
                        class="'.$class.'" data-mcolorpicker="true">';
                $tpl .= '<img src="../img/admin/color.png" style="border:0;margin:0 0 0 3px" align="absmiddle"></span>';
                $tpl .= '</div>';
            }
            $tpl .= '    </div>';

            $tpl .= '    <div class="row">';
            foreach ($titles as $item) {
                $style = 'float:left; margin-left:10px; width:110px;';
                $tpl .= '        <span style="'.$style.'">';
                $tpl .= $item;
                $tpl .= '        </span>';
            }
            $tpl .= '    </div>';
            $tpl .= '    <br>';
        }

        $tpl .= '</div>';
        //$tpl .= '</div>';

        return $tpl;
    }

    private function displayFormTabThemeColor($tab)
    {
        $tpl = '';

        $tpl .= '<div class="profile-'.$tab.' tab-profile product-tab-content" style="display:none">';

        $tpl .= '<div class="panel product-tab" id="tabPane1">';
        $tpl .= '<h3>'.$this->l('Theme Color').'</h3>';
        $info = $this->l('Please deactivate your shop before you make any changes.');
        $tpl .= '<div class="alert alert-info">'.$info.'</div>';

        $items = array('46');
        $tpl .= $this->displayItemDisplay($items);

        $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        $themecolor_names = explode('|', $settings[3]);
        $themecolor_value = explode('|', $settings[4]);
        $selectd_theme = $settings[41];
        $mycolors = explode('^', $settings[44]);
        foreach ($themecolor_names as $id => $themes_name) {
            if ($selectd_theme == $themes_name) {
                $colors = explode('^', $themecolor_value[$id]);
                $items = array('0','1','2','3','4');
                $label = $this->l('Semantic');
                $tpl .= $this->displayFormTabThemeColorSingle($items, $colors, $mycolors, $label, '');
                $tpl .= '<br><br><br>';

                $items = array('5','6','7','8','9');
                $label = $this->l('Grayscale');
                $tpl .= $this->displayFormTabThemeColorSingle($items, $colors, $mycolors, $label, '');
                $tpl .= '<br><br><br>';

                $items = array('10','11');
                $label = $this->l('Default');
                $tpl .= $this->displayFormTabThemeColorSingle($items, $colors, $mycolors, $label, '');
                $tpl .= '<br><br>';
            }
        }

        $tpl .= '<div class="panel-footer" id="toolbar-footer">';
        $tpl .= '<button type="submit" class="btn btn-default pull-right" name="submitUpdateMycolor">
                            <i class="process-icon-save"></i> '.$this->l('Save').'</button>';
        $tpl .= '</div>';
        $tpl .= '</div>';

        $tpl .= '</div>';

        return $tpl;
    }

    /*
        Make Forms class
    */
    private function makeColor($order, $name, $value)
    {
        $nameid = str_replace('[', '', $name);
        $nameid = str_replace(']', '', $nameid);
        $nameid = str_replace('config_', '', $nameid);
        $tpl = '';
        if ($this->layout <> '') {
            $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        }
        if (isset($settings[39]) && $settings[39] == 'FE' && $order == 'lock') {
            $disabled = ' disabled="disabled"';
            $tpl .= '<input type="hidden" name="'.$name.'" value="'.$value.'">';
            $name = '';
        } else {
            $disabled = '';
        }

        $tpl .= '<div class="col-lg-2">';
        $tpl .= '<div class="row">';
        $tpl .= '<div class="input-group">';

        $tpl .= '<input type="text" data-hex="true" class="color mColorPickerInput mColorPicker"
                            name="'.$name.'" value="'.$value.'" id="'.$nameid.'"'.$disabled.'>';
        $class = 'mColorPickerTrigger input-group-addon';
        $tpl .= '<span style="cursor:pointer;" id="icp_'.$nameid.'" class="'.$class.'" data-mcolorpicker="true">';
        $tpl .= '<img src="../img/admin/color.png" style="border:0;margin:0 0 0 3px" align="absmiddle"></span>';

        $tpl .= '</div>';
        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    private function makeSelectcategory($order, $name, $value, $id_lang)
    {
        $data_selects = array();

        $results = Category::getAllCategoriesName(null, $id_lang, false);
        foreach ($results as $result) {
            $data_selects[] = array(
                'category_id' => $result['id_category'],
                'name' => $result['name']
            );
        }
        $tpl = '';
        if ($this->layout <> '') {
            $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        }
        if (isset($settings[39]) && $settings[39] == 'FE' && $order == 'lock') {
            $disabled = ' disabled="disabled"';
            $tpl .= '<input type="hidden" name="'.$name.'" value="'.$value.'">';
            $name = '';
        } else {
            $disabled = '';
        }

        $tpl .= '
                <select name="' . $name . '" id="' . $name . '" class="form-control"'.$disabled.'>
        ';
        foreach ($data_selects as $selectitem) {
            if ($value == $selectitem['category_id']) {
                $tpl .= '
                    <option value="'.$selectitem['category_id'].'" selected="selected">'.$selectitem['name'].'</option>
                ';
            } else {
                $tpl .= '
                    <option value="' . $selectitem['category_id'] . '">' . $selectitem['name'] . '</option>
                ';
            }
        }
        $tpl .= '
                </select>
        ';
        return $tpl;
    }

    private function makeSelectresponsive($order, $name, $selects, $values)
    {
        $selectgrid = '';
        $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        $responsive = $settings[43];
        if ($responsive == 'bootstrap') {
            $id = 4;
            $selectgrid .= '<span style="float: left; margin-right: 15px;" class="fixed-width-md "> Always </span>';
            $selectgrid .= '<span style="float: left; margin-right: 15px;" class="fixed-width-md "> ≥768px </span>';
            $selectgrid .= '<span style="float: left; margin-right: 15px;" class="fixed-width-md "> ≥992px </span>';
            $selectgrid .= '<span style="float: left; margin-right: 15px;" class="fixed-width-md "> ≥1200px </span>';
        } elseif ($responsive == 'pure') {
            $id = 5;
            $selectgrid .= '<span style="float: left; margin-right: 15px;" class="fixed-width-md "> Always </span>';
            $selectgrid .= '<span style="float: left; margin-right: 15px;" class="fixed-width-md "> ≥ 568px </span>';
            $selectgrid .= '<span style="float: left; margin-right: 15px;" class="fixed-width-md "> ≥ 768px </span>';
            $selectgrid .= '<span style="float: left; margin-right: 15px;" class="fixed-width-md "> ≥ 1024px </span>';
            $selectgrid .= '<span style="float: left; margin-right: 15px;" class="fixed-width-md "> ≥ 1280px </span>';
        }

        //$settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        $responsive = $settings[43];

        $tpl = '';
        if (isset($settings[39]) && $settings[39] == 'FE' && $order == 'lock') {
            $disabled = ' disabled="disabled"';
        } else {
            $disabled = '';
        }

        for ($i = 0; $i < $id; $i++) {
            $value = '';
            if (isset($values[$i])) {
                $value = $values[$i];
            }
            $style = 'float:left; margin-right:15px;';
            $class = 'form-control fixed-width-md ';
            $tpl .= '<select style="'.$style.'" class="'.$class.'" name="'.$name.'[]" id="'.$name.'[]" '.$disabled.'>';
            foreach ($selects as $selectitem) {
                if ($value == $selectitem) {
                    $tpl .= '<option value="' . $selectitem . '" selected="selected">' . $selectitem . '</option>';
                } else {
                    $tpl .= '<option value="' . $selectitem . '">' . $selectitem . '</option>';
                }
            }
            $tpl .= '</select>';
        }
        $tpl .= '<br><br>';
        $tpl .= $selectgrid;

        return $tpl;
    }

    private function makeSelectfontsize($order, $name, $values)
    {
        $selectgrid = '';
        $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        $responsive = $settings[43];
        if ($responsive == 'bootstrap') {
            $id = 4;
            $selectgrid .= '<span style="float: left; margin-right: 15px;" class="fixed-width-md "> Always </span>';
            $selectgrid .= '<span style="float: left; margin-right: 15px;" class="fixed-width-md "> ≥768px </span>';
            $selectgrid .= '<span style="float: left; margin-right: 15px;" class="fixed-width-md "> ≥992px </span>';
            $selectgrid .= '<span style="float: left; margin-right: 15px;" class="fixed-width-md "> ≥1200px </span>';
        } elseif ($responsive == 'pure') {
            $id = 5;
            $selectgrid .= '<span style="float: left; margin-right: 15px;" class="fixed-width-md "> Always </span>';
            $selectgrid .= '<span style="float: left; margin-right: 15px;" class="fixed-width-md "> ≥ 568px </span>';
            $selectgrid .= '<span style="float: left; margin-right: 15px;" class="fixed-width-md "> ≥ 768px </span>';
            $selectgrid .= '<span style="float: left; margin-right: 15px;" class="fixed-width-md "> ≥ 1024px </span>';
            $selectgrid .= '<span style="float: left; margin-right: 15px;" class="fixed-width-md "> ≥ 1280px </span>';
        }

        $sizes = Tools::file_get_contents(_PS_THEME_DIR_.'config/fontsize.txt');
        $selects = explode('|', $sizes);

        $tpl = '';
        for ($i = 0; $i < $id; $i++) {
            $value = '';
            if (isset($values[$i])) {
                $value = $values[$i];
            }
            $style = 'float: left; margin-right: 15px;';
            $class = 'form-control fixed-width-md ';
            if (isset($settings[39]) && $settings[39] == 'FE' && $order == 'lock') {
                $disabled = ' disabled="disabled"';
                $tpl .= '<input type="hidden" name="'.$name.'" value="'.$value.'">';
                $name = '';
            } else {
                $disabled = '';
            }
            $tpl .= '<select style="'.$style.'" class="'.$class.'" name="'.$name.'[]" id="'.$name.'[]"'.$disabled.'>';
            foreach ($selects as $selectitem) {
                if ($value == $selectitem) {
                    $tpl .= '<option value="' . $selectitem . '" selected="selected">' . $selectitem . '</option>';
                } else {
                    $tpl .= '<option value="' . $selectitem . '">' . $selectitem . '</option>';
                }
            }
            $tpl .= '</select>';
        }
        $tpl .= '<br><br>';
        $tpl .= $selectgrid;

        return $tpl;
    }

    private function makeSelectfont($order, $name, $value)
    {
        $fonts = Tools::file_get_contents(_PS_THEME_DIR_.'config/googlefonts.txt');
        $fonts = str_replace("'", "", $fonts);
        $selects = explode(',', $fonts);

        $tpl = '';
        if ($this->layout <> '') {
            $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        }
        if (isset($settings[39]) && $settings[39] == 'FE' && $order == 'lock') {
            $disabled = ' disabled="disabled"';
        } else {
            $disabled = '';
        }
        $tpl .= '<select class="form-control fixed-width-xxl " name="'.$name.'" id="'.$name.'"'.$disabled.'>';
        foreach ($selects as $selectitem) {
            if ($value == $selectitem) {
                $tpl .= '<option value="' . $selectitem . '" selected="selected">' . $selectitem . '</option>';
            } else {
                $tpl .= '<option value="' . $selectitem . '">' . $selectitem . '</option>';
            }
        }
        $tpl .= '</select>';

        return $tpl;
    }

    private function makeInput($order, $name, $value, $title = '')
    {
        $language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $default_form_language = $language->id;

        $tpl = '';

        if ($this->layout <> '') {
            $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        }
        if (isset($settings[39]) && $settings[39] == 'FE' && $order == 'lock') {
            $disabled = ' disabled="disabled"';
        } else {
            $disabled = '';
        }

        $languages = Language::getLanguages(true);
        if ($title == 'Multi-languages') {
            foreach ($languages as $lang) {
                if (isset($value[$lang['iso_code']])) {
                    $modvalue = $value[$lang['iso_code']];
                } else {
                    $modvalue = '';
                }

                $tpl .= '<div class="translatable-field lang-'.$lang['id_lang'].'"
                            style="display: '.($lang['id_lang'] == $default_form_language ? 'block' : 'none').';">';
                $tpl .= '<div class="col-lg-9" style="padding-left: 0; padding-right: 0;">';
                $tpl .= '<input type="text" name="'.$name.'['.$lang['iso_code'] . ']"
                            value="'.$modvalue.'" '.$disabled.'>';
                $tpl .= '</div>';
                $tpl .= '<div class="col-lg-2">';
                $class = 'btn btn-default dropdown-toggle';
                $tpl .= '<button type="button" class="'.$class.'" tabindex="-1" data-toggle="dropdown">';
                $tpl .= $lang['iso_code'].'<i class="icon-caret-down"></i></button>';
                $tpl .= '<ul class="dropdown-menu">';
                foreach ($languages as $language) {
                    $tpl .= '<li><a href="javascript:hideOtherLanguage('.$language['id_lang'].');" tabindex="-1">';
                    $tpl .= $language['name'].'</a></li>';
                }
                $tpl .= '</ul>';
                $tpl .= '</div>';
                $tpl .= '</div>';
            }
        } else {
            $tpl .= '<div class="input-group col-lg-9">';
            if (!is_array($value)) {
                if (isset($settings[39]) && $settings[39] == 'FE' && $order == 'lock') {
                    $disabled = ' disabled="disabled"';
                    $tpl .= '<input type="hidden" name="'.$name.'" value="'.$value.'" '.$disabled.'>';
                    $name = '';
                } else {
                    $disabled = '';
                }
                $tpl .= '<input style="border-radius: 3px" type="text"
                          name="'.$name.'" value="'.$value.'" '.$disabled.'>';
            } else {
                echo $name.':'.serialize($value).'<br>';
            }
            $tpl .= '</div>';
        }

        return $tpl;
    }

    private function makeTextarea($order, $name, $value, $title = '')
    {
        $language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $default_form_language = $language->id;

        $tpl = '';
        if ($this->layout <> '') {
            $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        }
        if (isset($settings[39]) && $settings[39] == 'FE' && $order == 'lock') {
            $disabled = ' disabled="disabled"';
        } else {
            $disabled = '';
        }

        $languages = Language::getLanguages(true);
        if ($title == 'Multi-languages') {
            foreach ($languages as $lang) {
                if (isset($value[$lang['iso_code']])) {
                    $modvalue = $value[$lang['iso_code']];
                } else {
                    $modvalue = '';
                }

                $tpl .= '<div class="translatable-field lang-'.$lang['id_lang'].'"
                            style="display: '.($lang['id_lang'] == $default_form_language ? 'block' : 'none').';">';
                $tpl .= '<div class="col-lg-9" style="padding-left: 0; padding-right: 0;">';
                $tpl .= '<textarea class="textarea-autosize" name="'.$name.'['.$lang['iso_code'] . ']"
                            cols="30" rows="5" '.$disabled.'>'.$modvalue.'</textarea>';
                $tpl .= '</div>';
                $tpl .= '<div class="col-lg-2">';
                $class = 'btn btn-default dropdown-toggle';
                $tpl .= '<button type="button" class="'.$class.'" tabindex="-1" data-toggle="dropdown">';
                $tpl .= $lang['iso_code'].'<i class="icon-caret-down"></i></button>';
                $tpl .= '<ul class="dropdown-menu">';
                foreach ($languages as $language) {
                    $tpl .= '<li><a href="javascript:hideOtherLanguage('.$language['id_lang'].');" tabindex="-1">';
                    $tpl .= $language['name'].'</a></li>';
                }
                $tpl .= '</ul>';
                $tpl .= '</div>';
                $tpl .= '</div>';
            }
        } else {
            $tpl .= '<div class="col-lg-9">';
            $tpl .= '<textarea class="textarea-autosize" name="'.$name.'"
                      cols="30" rows="5" '.$disabled.'>'.$value.'</textarea>';
            $tpl .= '</div>';
        }

        return $tpl;
    }

    private function makeUpload($order, $name, $value, $placeholder, $button)
    {
        $style = 'padding:4px; background-color:#fff; border:1px solid #ddd; ';
        $style .= 'border-radius:3px; max-width:100px; max-height:100px;';

        $imagefolder = $this->getImageFolder();
        $image = _THEME_DIR_.$imagefolder.$value;
        $placeholder = 'placeholder="'.$placeholder.'"';

        $nameid = str_replace('[', '', $name);
        $nameid = str_replace(']', '', $nameid);
        $nameid = str_replace('config_', '', $nameid);

        $tpl = '';
        if ($this->layout <> '') {
            $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        }
        if (isset($settings[39]) && $settings[39] == 'FE' && $order == 'lock') {
            $disabled = ' disabled="disabled"';
            $tpl .= '<input type="hidden" name="'.$name.'" value="'.$value.'">';
            $name = '';
        } else {
            $disabled = '';
        }

        if ($value <> '') {
            $tpl .= '<img style="'.$style.'" src="'.$image.'" alt="" title="" id="thumb-'.$nameid.'"><br><br>';
        }
        $tpl .= '<div class="input-group col-lg-9">';
        $tpl .= '<input type="text" name="'.$name.'" value="'.$value.'" ';
        $tpl .= $placeholder.' id="input-'.$nameid.'" class="form-control" '.$disabled.'>';
        $tpl .= '<span class="input-group-btn">';
        $class = 'btn btn-primary btn-upload';
        $tpl .= '<button type="button" id="'.$nameid.'" data-loading-text="'.'text_loading'.'"
                  class="'.$class.'" '.$disabled.'>';
        $tpl .= '<i class="icon-upload-alt"></i> '.$button.'</button>';
        $tpl .= '</span>';
        $tpl .= '</div>';

        return $tpl;
    }

    private function makeSelect($order, $name, $selects, $value)
    {
        $tpl = '';
        if ($this->layout <> '') {
            $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        }
        if (isset($settings[39]) && $settings[39] == 'FE' && $order == 'lock') {
            $disabled = ' disabled="disabled"';
            $tpl .= '<input type="hidden" name="'.$name.'" value="'.$value.'">';
            $name = '';
        } else {
            $disabled = '';
        }

        $tpl .= '<select class="form-control fixed-width-xxl " name="'.$name.'" id="'.$name.'"'.$disabled.'>';
        foreach ($selects as $selectitem) {
            if ($value == $selectitem) {
                $tpl .= '<option value="' . $selectitem . '" selected="selected">' . $selectitem . '</option>';
            } else {
                $tpl .= '<option value="' . $selectitem . '">' . $selectitem . '</option>';
            }
        }
        $tpl .= '</select>';

        return $tpl;
    }

    private function makeAutoproduct($name, $settings, $item, $id_lang, $title)
    {
        $data_items = array();

        if (!is_array($settings[$item]['modvalue'])) {
            $items = explode(',', $settings[$item]['modvalue']);
        } else {
            $items = $settings[$item]['modvalue'];
        }
        for ($i = 0; $i < count($items); $i++) {
            if (isset($items[$i])) {
                $id = $items[$i];
                $product = new Product((int)$id, true, (int)$id_lang);

                if (Validate::isLoadedObject($product)) {
                    $data_items[] = array(
                        'id'   => $id,
                        'name' => $product->name
                    );
                }
            }
        }

        return $this->makeAutocommon($name, $data_items, 'product', $title, '');
    }

    private function makeAutocategory($order, $name, $settings, $item, $id_lang, $title)
    {
        $data_items = array();

        if (!is_array($settings[$item]['modvalue'])) {
            $items = explode(',', $settings[$item]['modvalue']);
        } else {
            $items = $settings[$item]['modvalue'];
        }
        for ($i = 0; $i < count($items); $i++) {
            if (isset($items[$i])) {
                $id = $items[$i];
                $category = new Category((int)$id, (int)$id_lang);

                if (Validate::isLoadedObject($category)) {
                    $data_items[] = array(
                        'id'   => $id,
                        'name' => $category->name
                    );
                }
            }
        }

        if ($this->layout <> '') {
            $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        }
        if (isset($settings[39]) && $settings[39] == 'FE' && $order == 'lock') {
            $disabled = ' disabled="disabled"';
        } else {
            $disabled = '';
        }

        return $this->makeAutocommon($name, $data_items, 'category', $title, $disabled);

    }

    private function makeAutomanufacturer($name, $settings, $item, $id_lang, $title)
    {
        $data_items = array();

        if (!is_array($settings[$item]['modvalue'])) {
            $items = explode(',', $settings[$item]['modvalue']);
        } else {
            $items = $settings[$item]['modvalue'];
        }
        for ($i = 0; $i < count($items); $i++) {
            if (isset($items[$i])) {
                $id = $items[$i];
                $manufacturer = new Manufacturer((int)$id, (int)$id_lang);

                if (Validate::isLoadedObject($manufacturer)) {
                    $data_items[] = array(
                        'id'   => $id,
                        'name' => $manufacturer->name
                    );
                }
            }
        }

        return $this->makeAutocommon($name, $data_items, 'manufacturer', $title, '');
    }

    private function makeAutoinformation($name, $settings, $item, $id_lang, $title)
    {
        $data_items = array();

        if (!is_array($settings[$item]['modvalue'])) {
            $items = explode(',', $settings[$item]['modvalue']);
        } else {
            $items = $settings[$item]['modvalue'];
        }
        for ($i = 0; $i < count($items); $i++) {
            if (isset($items[$i])) {
                $id = $items[$i];
                $cms = new CMS((int)$id, (int)$id_lang);

                if (Validate::isLoadedObject($cms)) {
                    $data_items[] = array(
                        'id'   => $id,
                        'name' => $cms->meta_title
                    );
                }
            }
        }

        return $this->makeAutocommon($name, $data_items, 'information', $title, '');
    }

    private function makeAutocommon($name, $data_items, $inputname, $placeholder, $disabled)
    {
        $nameid = str_replace('[', '', $name);
        $nameid = str_replace(']', '', $nameid);
        $placeholder = 'placeholder="'.$placeholder.'"';

        $tpl = '';
        $tpl .= '<div class="input-group col-lg-9">';
        $tpl .= '<input type="text" name="'.$inputname.'" value="" ';
        $tpl .= $placeholder.' id="' . $name . '" class="form-control" '.$disabled.'>';
        $tpl .= '<div id="featured-'.$nameid.'" class="well well-sm" style="height: 150px; overflow: auto;">';

        foreach ($data_items as $item) {
            $tpl .= '<div id="featured-'.$nameid.'_'.$item['id'] . '">';
            $tpl .= '<i onclick="$(\'#featured-'.$nameid.'_'.$item['id'].'\').remove();" class="icon-minus-sign"></i>';
            $tpl .= ' '.$item['name'];
            $tpl .= '<input type="hidden" name="'.$name.'[]" value="'.$item['id'].'" />';
            $tpl .= '</div>';
        }

        $tpl .= '</div>';
        $tpl .= '</div>';

        return $tpl;
    }

    /*
        Tools
    */
    public function getTemplateId()
    {
        $themes = Tools::unserialize(Configuration::get(_THEME_NAME_));
        return $themes[4];
    }

    public function getThemes()
    {
        $themes = Tools::unserialize(Configuration::get(_THEME_NAME_));

        return $themes[3];
    }

    private function makeCssCode($css_name, $csstitle, $selector, $color_table)
    {
        $css_code = '';
        $value = '';
        $csslist = array('font-family', 'font-size', 'line-height');
        if (in_array($csstitle, $csslist)) {
            $value = $css_name;
        } elseif ($css_name == 'transparent') {
            $value = 'transparent';
        } else {
            $color_id = str_replace('@', '', $css_name);
            if (isset($color_table[$color_id])) {
                $value = $color_table[$color_id];
            }
        }

        if ($value <> '' && $selector <> '') {
            $css_code .= $csstitle.':'.$value.';';
        }
        return $css_code;
    }

    protected function clearAllCache()
    {
        $this->clearCache('lavasetting/views/templates/hook/');
        //$this->clearCache('uhumainmenu/views/templates/hook/');
        //$this->clearCache('uhuimageslider/views/templates/hook/');
        $this->clearCache('lavacustom/views/templates/hook/');
    }

    protected function clearCache($cache_file)
    {
        $caches = array();
        $files = scandir(_PS_MODULE_DIR_.$cache_file);
        for ($i = 0; $i < count($files); $i++) {
            if (is_file(_PS_MODULE_DIR_.$cache_file.$files[$i]) && strstr($files[$i], 'cache_') <> '') {
                $caches[] = _PS_MODULE_DIR_.$cache_file.$files[$i];
            }
        }
        if (count($caches) > 0) {
            foreach ($caches as $cache) {
                unlink($cache);
            }
        }
    }

    public function makeCache($data, $cache, $tpl)
    {
        $this->smarty->assign('data', $data);
        $html = $this->display(__FILE__, $tpl);

        $html = str_replace('$(', ' $(', $html);
        $html = str_replace('});', '}); ', $html);
        $html = str_replace('};', '}; ', $html);
        $html = str_replace('{', '{ ', $html);
        file_put_contents($cache, $html);

        return $html;
    }

    public function getResponsiveGrid($id)
    {
        $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        $responsive = $settings[43];

        $grid = '';
        $grids = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_bootstrap'));
        if ($responsive == 'bootstrap') {
            if (isset($grids[$id][0])) {
                if ($grids[$id][0] > 0) {
                    $grid .= ' col-xs-'.$grids[$id][0];
                }
            }
            if (isset($grids[$id][1])) {
                if ($grids[$id][1] > 0) {
                    $grid .= ' col-md-'.$grids[$id][1];
                }
            }
            if (isset($grids[$id][2])) {
                if ($grids[$id][2] > 0) {
                    $grid .= ' col-lg-'.$grids[$id][2];
                }
            }
            if (isset($grids[$id][3])) {
                if ($grids[$id][3] > 0) {
                    $grid .= ' col-xl-'.$grids[$id][3];
                }
            }
        } //elseif ($responsive == 'pure') {}

        return $grid;
    }

    public function getImageFolder()
    {
        $current_theme = $this->getTemplateId();

        $settings = Tools::unserialize(Configuration::get('lava_'.$current_theme.'_setting'));
        $imagefolder = $settings[21];

        return $imagefolder.$current_theme.'/';
    }

    public function updateGooglefont($fonts)
    {
        $googlefont = '';
        $webfont_list = array('Serif','Sans-serif','Monospace','Cursive','Fantasy','','Arial','Tahoma','Verdana',
                            'Trebuchet MS','Lucida Sans Unicode','Georgia','Times New Roman');
        foreach ($fonts as $font) {
            if ($font <> '' && !in_array($font, $webfont_list) && strstr($googlefont, $font) == '') {
                $googlefont .= $font.'|';
            }
        }

        $googlefont = str_replace(' ', '+', $googlefont);
        return trim($googlefont, '|');
    }

    protected function getConfigCount($mod_name)
    {
        $item_total = 0;
        $current_theme = $this->getTemplateId();

        $mod_file = _PS_THEME_DIR_.'config/'.$current_theme.'/mod_'.$mod_name.'.txt';
        if (file_exists($mod_file)) {
            $result = Tools::file_get_contents($mod_file);
            $results = explode(PHP_EOL, $result);
            $item_total = (count($results) - 1) / 9;
        }

        return $item_total;
    }

    public function language($params, $mvalue, $id)
    {
        if ($mvalue[$id] == '') {
            return;
        }

        $lang_iso = Language::getIsoById($params['cookie']->id_lang);
        if (isset($mvalue[$id][$lang_iso])) {
            if ($mvalue[$id][$lang_iso] <> '') {
                return $mvalue[$id][$lang_iso];
            } else {
                return $mvalue[$id]['en'];
            }
        } else {
            return $mvalue[$id]['en'];
        }
    }

    public function translateWord($string, $id_lang)
    {
        static $_MODULES = array();

        $lang = Language::getIsoById($id_lang);

        if (!array_key_exists($id_lang, $_MODULES)) {
            if (file_exists($file1 = _PS_MODULE_DIR_.$this->name.'/translations/'.$lang.'.php')) {
                $_MODULES[$id_lang] = include($file1);
            } elseif (file_exists($file2 = _PS_MODULE_DIR_.$this->name.'/'.$lang.'.php')) {
                $_MODULES[$id_lang] = include($file2);
            } else {
                return $string;
            }
        }

        $string = str_replace('\'', '\\\'', $string);

        // set array key to lowercase for 1.3 compatibility
        $_MODULES[$id_lang] = array_change_key_case($_MODULES[$id_lang]);
        $name = Tools::strtolower($this->name);
        $current_key = '<{'.$name.'}'.Tools::strtolower(_THEME_NAME_).'>'.$name.'_'.md5($string);
        $default_key = '<{'.$name.'}prestashop>'.$name.'_'.md5($string);

        if (isset($_MODULES[$id_lang][$current_key])) {
            $ret = Tools::stripslashes($_MODULES[$id_lang][$current_key]);
        } elseif (isset($_MODULES[$id_lang][Tools::strtolower($current_key)])) {
            $ret = Tools::stripslashes($_MODULES[$id_lang][Tools::strtolower($current_key)]);
        } elseif (isset($_MODULES[$id_lang][$default_key])) {
            $ret = Tools::stripslashes($_MODULES[$id_lang][$default_key]);
        } elseif (isset($_MODULES[$id_lang][Tools::strtolower($default_key)])) {
            $ret = Tools::stripslashes($_MODULES[$id_lang][Tools::strtolower($default_key)]);
        } else {
            $ret = Tools::stripslashes($string);
        }

        return str_replace('"', '&quot;', $ret);
    }

    private function deleteDirectory($dirname)
    {
        $files = scandir($dirname);
        foreach ($files as $file) {
            if ($file != '.' && $file != '..') {
                if (is_dir($dirname.'/'.$file)) {
                    self::deleteDirectory($dirname.'/'.$file);
                } elseif (file_exists($dirname.'/'.$file)) {
                    unlink($dirname.'/'.$file);
                }
            }
        }
        rmdir($dirname);
    }

    private function deleteTmpFiles()
    {
        if (file_exists(_IMPORT_FOLDER_.'doc')) {
            self::deleteDirectory(_IMPORT_FOLDER_.'doc');
        }
        if (file_exists(_IMPORT_FOLDER_.XMLFILENAME)) {
            unlink(_IMPORT_FOLDER_.XMLFILENAME);
        }
        if (file_exists(_IMPORT_FOLDER_.'lavasetting')) {
            self::deleteDirectory(_IMPORT_FOLDER_.'lavasetting');
        }
    }

    private function checkXmlFields()
    {
        if (!file_exists(_IMPORT_FOLDER_.XMLFILENAME) || !$xml = simplexml_load_file(_IMPORT_FOLDER_.XMLFILENAME)) {
            return false;
        }
        if (!$xml['version'] || !$xml['name'] || !$xml['key']) {
            return false;
        }
        return true;
    }

    private function xcopy($source, $destination)
    {
        if (is_dir($source)) {
            if (!is_dir($destination)) {
                mkdir($destination, 0777);
            }

            $handle = dir($source);

            while ($entry=$handle->read()) {
                if (($entry!=".")&&($entry!="..")) {
                    if (is_dir($source."/".$entry)) {
                        $this->xcopy($source."/".$entry, $destination."/".$entry);
                    } else {
                        copy($source."/".$entry, $destination."/".$entry);
                    }
                }
            }
        }
    }
}
