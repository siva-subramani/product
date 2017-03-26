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

use PrestaShop\PrestaShop\Core\Module\WidgetInterface;
use PrestaShop\PrestaShop\Adapter\Category\CategoryProductSearchProvider;
use PrestaShop\PrestaShop\Adapter\NewProducts\NewProductsProductSearchProvider;
use PrestaShop\PrestaShop\Adapter\BestSales\BestSalesProductSearchProvider;
use PrestaShop\PrestaShop\Adapter\PricesDrop\PricesDropProductSearchProvider;
use PrestaShop\PrestaShop\Adapter\Image\ImageRetriever;
use PrestaShop\PrestaShop\Adapter\Product\PriceFormatter;
use PrestaShop\PrestaShop\Core\Product\ProductListingPresenter;
use PrestaShop\PrestaShop\Adapter\Product\ProductColorsRetriever;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchContext;
use PrestaShop\PrestaShop\Core\Product\Search\ProductSearchQuery;
use PrestaShop\PrestaShop\Core\Product\Search\SortOrder;

class Lavacustom extends Module
{
    protected static $cache_products;

    public function __construct()
    {
        $this->name = 'lavacustom';
        $this->tab = 'others';
        $this->author = 'uhuPage';
        $this->version = '1.0.2';

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = 'Lava Customize Block';
        $this->description = $this->l('Adds a block for customize.');
        if (Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=') == true) {
            $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
            $this->ps_version = '1.7';
        } else {
            $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
            $this->ps_version = '1.6';
        }

        if (Configuration::get(_THEME_NAME_) == '') {
            $this->loadModTheme();
            $this->loadConfigFile();
        }

        $this->layout = $this->getTemplateId();
        $this->settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_setting'));
        $this->displays = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_display'));
        $this->grids = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_bootstrap'));
    }

    public function install()
    {
        $success = (parent::install()
            && $this->registerHook('displayHeader')
            && $this->registerHook('displayBanner')
            && $this->registerHook('displayNav')
            && $this->registerHook('displayTop')
            && $this->registerHook('displayNav1')
            && $this->registerHook('displayNav2')
            && $this->registerHook('displayTopColumn')
            && $this->registerHook('displayHome')
            && $this->registerHook('displayFooterBefore')
            && $this->registerHook('displayFooter')
            && $this->registerHook('displayFooterAfter')
            && $this->registerHook('displayReassurance')
            && $this->registerHook('displayRightColumnProduct')
            && $this->registerHook('displayLeftColumnProduct')
            && $this->registerHook('displayFooterProduct')
            && $this->registerHook('displayMaintenance')
            && $this->registerHook('displayBackground')
            && $this->registerHook('displayBeforeBodyClosingTag')
            && $this->registerHook('addproduct')
            && $this->registerHook('updateproduct')
            && $this->registerHook('deleteproduct')
            && $this->registerHook('actionObjectCategoryUpdateAfter')
            && $this->registerHook('actionObjectCategoryDeleteAfter')
            && $this->registerHook('actionObjectCategoryAddAfter')
            && $this->registerHook('actionObjectCmsUpdateAfter')
            && $this->registerHook('actionObjectCmsDeleteAfter')
            && $this->registerHook('actionObjectCmsAddAfter')
            && $this->registerHook('actionObjectSupplierUpdateAfter')
            && $this->registerHook('actionObjectSupplierDeleteAfter')
            && $this->registerHook('actionObjectSupplierAddAfter')
            && $this->registerHook('actionObjectManufacturerUpdateAfter')
            && $this->registerHook('actionObjectManufacturerDeleteAfter')
            && $this->registerHook('actionObjectManufacturerAddAfter')
            && $this->registerHook('actionObjectProductUpdateAfter')
            && $this->registerHook('actionObjectProductDeleteAfter')
            && $this->registerHook('actionObjectProductAddAfter')
            && $this->registerHook('categoryUpdate')
        );

        return $success;
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

    public function loadConfigFile()
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

    public function resetModContent($mod_name, $current_theme)
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

    public function getConfigCount($mod_name)
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

    public function displayCode($params, $hooks, $pos)
    {
        $html = '';

        $hooks = explode('|', $hooks);
        if ($hooks <> '') {
            foreach ($hooks as $hook) {
                //echo $hook.'<br>';
                switch($hook) {
                    case 'logo':
                        $html .= $this->displayLogo($params);
                        break;
                    case 'hamburger':
                        $html .= $this->displayHamburger();
                        break;
                    case 'categories':
                        $html .= $this->displayCategory($params, $pos);
                        break;
                    case 'news':
                        $html .= $this->displayNews($params, $pos);
                        break;
                    case 'reassure':
                        $html .= $this->displayReassure($params, $pos);
                        break;
                    case 'topbanner':
                        $html .= $this->displayTopBanner($params);
                        break;
                    case 'banner':
                        $html .= $this->displayBanner($params);
                        break;
                    case 'new':
                        $html .= $this->displayNew($params);
                        break;
                    case 'featured':
                        $html .= $this->displayFeatured($params);
                        break;
                    case 'best':
                        $html .= $this->displayBest($params);
                        break;
                    case 'special':
                        $html .= $this->displaySpecial($params);
                        break;
                    case 'catprd':
                        $html .= $this->displayCatprd($params);
                        break;
                    case 'hometabs':
                        $html .= $this->displayHometabs($params);
                        break;
                    case 'bancol':
                        $html .= $this->displayBannerTopcolumn($params);
                        break;
                    case 'bantab':
                        $html .= $this->displayBannerHometab($params);
                        break;
                    case 'banhome':
                        $html .= $this->displayBannerHome($params);
                        break;
                    case 'count':
                        $html .= $this->displayCountTo($params, $pos);
                        break;
                    case 'advtop':
                        $html .= $this->displayAdvertising($params, $hook, 8);
                        break;
                    case 'advbot':
                        $html .= $this->displayAdvertising($params, $hook, 6);
                        break;
                    case 'advpro':
                        $html .= $this->displayAdvpro($params);
                        break;
                    case 'contact':
                        $html .= $this->displayContact($params);
                        break;
                    case 'information':
                        $html .= $this->displayInformation($params);
                        break;
                    case 'myaccount':
                        $html .= $this->displayMyaccount($params);
                        break;
                    case 'service':
                        $html .= $this->displayService($params);
                        break;
                    case 'extra':
                        $html .= $this->displayExtra($params);
                        break;
                    case 'facebook':
                        //$html .= $this->displayFacebook($params);
                        break;
                    case 'copyright':
                        $html .= $this->displayCopyright($params);
                        break;
                    case 'social':
                        $html .= $this->displaySocial($params);
                        break;
                    case 'reaproduct':
                        $html .= $this->displayReaproduct($params);
                        break;
                    case 'newsletter':
                        $html .= $this->displayNewsletter($params);
                        break;
                    case 'slider':
                        $html .= $this->displaySlider($params);
                        break;
                    case 'reatop':
                        $html .= $this->displayReatop($params);
                        break;
                    case 'topmenu':
                        $html .= $this->displayTopmenu($params);
                        break;
                    case 'scrollto':
                        $html .= '<div class="top-scroll"><i class="material-icons">&#xe5ce;</i></div>';
                        break;
                    default:
                        break;
                }
            }
        }

        return $html;
    }

    public function getCache($params, $tpl)
    {
        $tid = $this->layout;
        $cache_path = _PS_MODULE_DIR_.$this->name.'/views/templates/hook/';
        $lang = $params['cookie']->id_lang;
        $currency = $params['cookie']->id_currency;
        $cache = $cache_path.'cache_'.$tid.'_'.$lang.'_'.$currency.'_'.$tpl;
        return $cache;
    }

    public function displayNews($params)
    {
        $data = array();
        $html = '';

        $tpl = 'lava_news.tpl';
        $cache = $this->getCache($params, $tpl);

        if ($this->displays[19] == 'yes') {
            if (file_exists($cache)) {
                $tid = $this->layout;
                $lang = $params['cookie']->id_lang;
                $currency = $params['cookie']->id_currency;
                $html = $this->display(__FILE__, 'cache_'.$tid.'_'.$lang.'_'.$currency.'_'.$tpl);
            } else {
                $data['imgurl'] = $this->getImageurl();
                //$data['blockgrid'] = $this->getResponsiveGrid(16);
                //$data['itemgrid'] = $this->getResponsiveGrid(42);

                $mod_name = 'news';
                $mvalue = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_'.$mod_name));

                $data['owlslider'] = $mvalue[4];
                $data['items_number'] =$mvalue[5];

                $data['block_title'] = $this->language($params, $mvalue, 6);
                $data['block_info'] = $this->language($params, $mvalue, 7);

                $data['tplid'] = $mvalue[8];
                $data['type'] = $mvalue[9];
                $data['owlid'] = $mvalue[10];

                $id = 17;
                $data['responsive0'] = $this->grids[$id][0];
                $data['responsive1'] = $this->grids[$id][1];
                $data['responsive2'] = $this->grids[$id][2];
                $data['responsive3'] = $this->grids[$id][3];

                $pos = 20;
                for ($i = 0; $i < $data['items_number']; $i++) {
                    $data['logo'][$i] = $mvalue[0 + $pos + $i * 10];
                    $data['link'][$i] = $mvalue[1 + $pos + $i * 10];
                    $data['title'][$i] = $this->language($params, $mvalue, 2 + $pos + $i * 10);
                    $data['subtitle'][$i] = $this->language($params, $mvalue, 3 + $pos + $i * 10);
                    $texts = $this->language($params, $mvalue, 4 + $pos + $i * 10);
                    $data['texts'][$i] = explode('<br />', Tools::nl2br($texts));
                    $data['ftitle'][$i] = $this->language($params, $mvalue, 5 + $pos + $i * 10);
                    $data['fsubtitle'][$i] = $this->language($params, $mvalue, 6 + $pos + $i * 10);
                }
                if ($data['type'] == 'lava_contactus') {
                    $data['html'] = 'lava_contactus.tpl';
                } else {
                    $data['html'] = 'lava_news.tpl';
                }

                $tpl = $data['html'];
                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayCountTo($params, $pos)
    {
        $data = array();
        $html = '';

        $tpl = 'lava_countto.tpl';
        $cache = $this->getCache($params, $tpl);

        if ($this->displays[65] == 'yes' && $this->displays[66] == $pos) {
            if (file_exists($cache)) {
                $tid = $this->layout;
                $lang = $params['cookie']->id_lang;
                $currency = $params['cookie']->id_currency;
                $html = $this->display(__FILE__, 'cache_'.$tid.'_'.$lang.'_'.$currency.'_'.$tpl);
            } else {
                $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_count'));
                $imgurl = $this->getImageurl();
                $data['block_title'] = $this->language($params, $settings, 0);
                $data['block_info'] = $this->language($params, $settings, 1);
                $data['type'] = $settings[2];
                $data['tpl_id'] = $settings[3];
                $data['tpl_file'] = $settings[4];
                $data['number'] = $settings[5];
                for ($i = 0; $i < $data['number']; $i++) {
                    $data['title'][$i] = $this->language($params, $settings, 6 + $i * 4);
                    $data['count'][$i] = $settings[7 + $i * 4];
                    $data['icon'][$i] = $settings[8 + $i * 4];
                    $data['image'][$i] = $imgurl.$settings[9 + $i * 4];
                }

                $bgs = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_background'));
                $data['scrollimage'] = $imgurl.$bgs[33];
                $data['scroll'] = $bgs[36];

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayAdvpro($params)
    {
        $data = array();
        $rands = array();
        $html = '';
        $tpl = 'lava_advpro.tpl';

        if ($this->displays[7] == 'yes') {
            $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_advpro'));
            $imgurl = $this->getImageurl();

            $data['wow'] = $settings[1];
            $data['wow_delay'] = $settings[2];
            $data['zoom'] = $settings[4];
            $data['id_name'] = $settings[5];
            if ($settings[7] <> '') {
                $data['title'] = $this->language($params, $settings, 7);
            } else {
                $data['title'] = '';
            }
            $data['adv_number'] = $settings[8]; //2

            $set = 12 / $settings[8]; //6
            for ($i = 0; $i < $set; $i++) {
                $rands[$i] = 20 + $i * $data['adv_number'] * 6;
            }
            shuffle($rands);

            $buts = array('0','9','10','11','12','13','14','15','16','17','18','19');
            for ($i = 0; $i < $data['adv_number']; $i++) {
                $adimgs = $rands[0] + $i * 6;
                $adv = $settings[$adimgs];
                if ($adv <> '') {
                    if (strstr($adv, 'http://') <> '') {
                        $data['adv_image'][$i] = $adv;
                    } else {
                        $data['adv_image'][$i] = $imgurl.$adv;
                    }
                } else {
                    $data['adv_image'][$i] = '';
                }

                $adlink = $rands[0] + 1 + $i * 6;
                $data['adv_link'][$i] = $settings[$adlink];

                $all_titles = $rands[0] + 2 + $i * 6;
                if ($settings[$all_titles] <> '') {
                    $adv_titles = $this->language($params, $settings, $all_titles);
                    $data['adv_title'][$i] = $adv_titles;
                }

                $all_texts = $rands[0] + 3 + $i * 6;
                if ($settings[$all_texts] <> '') {
                    $adv_texts = $this->language($params, $settings, $all_texts);
                    $data['adv_text'][$i] = $adv_texts;
                }

                $adeffect = $rands[0] + 4 + $i * 6;
                $data['adv_effect'][$i] = $settings[$adeffect];

                $data['adv_grid'][$i] = '';
                $adgrid = 3;//25 + $i * 6;
                $responsive = $this->settings[43];
                if ($responsive == 'bootstrap') {
                    if (isset($settings[$adgrid][0])) {
                        if ($settings[$adgrid][0] > 0) {
                            $data['adv_grid'][$i] .= ' col-xs-'.$settings[$adgrid][0];
                        }
                    }
                    if (isset($settings[$adgrid][1])) {
                        if ($settings[$adgrid][1] > 0) {
                            $data['adv_grid'][$i] .= ' col-sm-'.$settings[$adgrid][1];
                        }
                    }
                    if (isset($settings[$adgrid][2])) {
                        if ($settings[$adgrid][2] > 0) {
                            $data['adv_grid'][$i] .= ' col-md-'.$settings[$adgrid][2];
                        }
                    }
                    if (isset($settings[$adgrid][3])) {
                        if ($settings[$adgrid][3] > 0) {
                            $data['adv_grid'][$i] .= ' col-lg-'.$settings[$adgrid][3];
                        }
                    }
                } //elseif ($responsive == 'pure') {}

                $all_buttons = $buts[$i];
                if ($settings[$all_buttons] <> '') {
                    $adv_buttons = $this->language($params, $settings, $all_buttons);
                    $data['adv_button'][$i] = $adv_buttons;
                }
            }

            if (isset($settings[6]) && $settings[6] <> '') {
                $tpl = $settings[6].'.tpl';
            }
            $this->smarty->assign('data', $data);
            $html = $this->display(__FILE__, $tpl);
        }

        return $html;
    }

    public function displayAdvertising($params, $mod, $displayid)
    {
        $data = array();
        $html = '';

        $mvalue = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_'.$mod));
        $tpl = $mvalue[6].'.tpl';
        $cache = $this->getCache($params, $mod.'_'.$tpl);

        //$displays = Tools::unserialize(Configuration::get('lava_value_display'));
        if ($this->displays[$displayid] == 'yes') {
            if (file_exists($cache)) {
                $html = Tools::file_get_contents($cache);
            } else {
                $data = $this->hookDisplayAdv($params, $mod);
                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function hookDisplayAdv($params, $mod)
    {
        $data = array();
        $responsive = $this->settings[43];
        $imgurl = $this->getImageurl();

        if ($mod == 'advtop') {
            $data['blockgrid'] = $this->getResponsiveGrid(13);
            $data['mod'] = 'aup';
        } else {
            $data['blockgrid'] = $this->getResponsiveGrid(14);
            $data['mod'] = 'abw';
        }

        $mvalue = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_'.$mod));

        $data['wow'] = $mvalue[1];
        $data['wow_delay'] = $mvalue[2];
        $data['zoom'] = $mvalue[4];
        $data['id_name'] = $mvalue[5];
        if ($mvalue[7] <> '') {
            $data['title'] = $this->language($params, $mvalue, 7);
        } else {
            $data['title'] = '';
        }
        $data['adv_number'] = $mvalue[8];

        $buts = array('0','9','10','11','12','13','14','15','16','17','18','19');
        for ($i = 0; $i < $data['adv_number']; $i++) {
            $adimgs = 20 + $i * 6;
            $adv = $mvalue[$adimgs];
            if ($adv <> '') {
                if (strstr($adv, 'http://') <> '') {
                    $data['adv_image'][$i] = $adv;
                } else {
                    $data['adv_image'][$i] = $imgurl.$adv;
                }
            } else {
                $data['adv_image'][$i] = '';
            }

            $adlink = 21 + $i * 6;
            $data['adv_link'][$i] = $mvalue[$adlink];

            $all_titles = 22 + $i * 6;
            if ($mvalue[$all_titles] <> '') {
                $adv_titles = $this->language($params, $mvalue, $all_titles);
                //$data['adv_title'][$i] = $adv_titles;
                $data['adv_title'][$i] = explode('<br />', Tools::nl2br($adv_titles));
            }

            $all_texts = 23 + $i * 6;
            if ($mvalue[$all_texts] <> '') {
                $adv_texts = $this->language($params, $mvalue, $all_texts);
                //$data['adv_text'][$i] = Tools::nl2br($adv_texts);
                $data['adv_text'][$i] = explode('<br />', Tools::nl2br($adv_texts));
            }

            $adeffect = 24 + $i * 6;
            $data['adv_effect'][$i] = $mvalue[$adeffect];

            $data['adv_grid'][$i] = '';
            $adgrid = 25 + $i * 6;
            if ($responsive == 'bootstrap') {
                if (isset($mvalue[$adgrid][0])) {
                    if ($mvalue[$adgrid][0] > 0) {
                        $data['adv_grid'][$i] .= ' col-xs-'.$mvalue[$adgrid][0];
                    }
                }
                if (isset($mvalue[$adgrid][1])) {
                    if ($mvalue[$adgrid][1] > 0) {
                        $data['adv_grid'][$i] .= ' col-md-'.$mvalue[$adgrid][1];
                    }
                }
                if (isset($mvalue[$adgrid][2])) {
                    if ($mvalue[$adgrid][2] > 0) {
                        $data['adv_grid'][$i] .= ' col-lg-'.$mvalue[$adgrid][2];
                    }
                }
                if (isset($mvalue[$adgrid][3])) {
                    if ($mvalue[$adgrid][3] > 0) {
                        $data['adv_grid'][$i] .= ' col-xl-'.$mvalue[$adgrid][3];
                    }
                }
            } //elseif ($responsive == 'pure') {}

            $all_buttons = $buts[$i];
            if ($mvalue[$all_buttons] <> '') {
                $adv_buttons = $this->language($params, $mvalue, $all_buttons);
                $data['adv_button'][$i] = $adv_buttons;
            }
        }

        return $data;
    }

    public function displayCategory($params)
    {
        $this->user_groups = ($this->context->customer->isLogged() ?
            $this->context->customer->getGroups() : array(Configuration::get('PS_UNIDENTIFIED_GROUP')));
        $data = array();
        $html = '';

        $tpl = 'lava_categories.tpl';
        $cache = $this->getCache($params, $tpl);

        if ($this->displays[52] == 'yes') {
            if (file_exists($cache)) {
                $tid = $this->layout;
                $lang = $params['cookie']->id_lang;
                $currency = $params['cookie']->id_currency;
                $html = $this->display(__FILE__, 'cache_'.$tid.'_'.$lang.'_'.$currency.'_'.$tpl);
            } else {
                $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_categories'));
                $imgurl = $this->getImageurl();
                $data['block_title'] = $this->language($params, $settings, 6);
                $data['block_info'] = $this->language($params, $settings, 7);
                $data['tpl_id'] = $settings[3];
                $data['tpl_file'] = $settings[4];
                $data['number'] = $settings[5];
                for ($i = 0; $i < $data['number']; $i++) {
                    if (strstr($settings[10 + $i * 10], 'http://') <> '' || $settings[10 + $i * 10] == '') {
                        $data['image'][$i] = $settings[10 + $i * 10];
                    } else {
                        $data['image'][$i] = $imgurl.$settings[10 + $i * 10];
                    }
                    $data['link'][$i] = $settings[11 + $i * 10];
                    $data['title'][$i] = $this->language($params, $settings, 12 + $i * 10);
                    $data['text'][$i] = $this->language($params, $settings, 13 + $i * 10);

                    $id_lang = (int)$this->context->language->id;
                    $id = 14 + $i * 10;
                    if (isset($settings[$id]) && $settings[$id] <> 1) {
                        $cid = $settings[$id];
                        $category = new Category((int)$cid, (int)$id_lang);
                        if (!is_null($category->id)) {
                            if ($category->level_depth > 1) {
                                $category_link = $category->getLink();
                            } else {
                                $category_link = $this->context->link->getPageLink('index');
                            }

                            $is_intersected = array_intersect($category->getGroups(), $this->user_groups);
                            if (!empty($is_intersected)) {
                                $data['cat_link'][$i] = $category_link;
                                $data['cat_name'][$i] = $category->name;
                            }
                        } else {
                            $data['cat_link'][$i] = '';
                            $data['cat_name'][$i] = '';
                        }
                    } else {
                        $data['cat_link'][$i] = '';
                        $data['cat_name'][$i] = '';
                    }

                    if (isset($settings[15 + $i * 10]) && $settings[15 + $i * 10] <> '') {
                        foreach ($settings[15 + $i * 10] as $key => $id) {
                            $data['subnumber'][$i] = count($settings[15 + $i * 10]);
                            $category = new Category((int)$id, (int)$id_lang);
                            if (!is_null($category->id)) {
                                if ($category->level_depth > 1) {
                                    $category_link = $category->getLink();
                                } else {
                                    $category_link = $this->context->link->getPageLink('index');
                                }
                                $is_intersected = array_intersect($category->getGroups(), $this->user_groups);
                                if (!empty($is_intersected)) {
                                    //$link = Tools::HtmlEntitiesUTF8($category_link);
                                    $data['sub_link'][$i][$key] = $category_link;
                                    $data['sub_name'][$i][$key] = $category->name;
                                }
                            } else {
                                $data['sub_link'][$i][$key] = '';
                                $data['sub_name'][$i][$key] = '';
                            }
                        }
                    } else {
                        $data['subnumber'][$i] = 0;
                        $data['sub_link'][$i][0] = '';
                        $data['sub_name'][$i][0] = '';
                    }

                    $data['ftitle'][$i] = $this->language($params, $settings, 16 + $i * 10);
                    $data['flink'][$i] = $settings[17 + $i * 10];
                }

                //$data['blockgrid'] = $this->getResponsiveGrid(46);
                //$data['itemgrid'] = $this->getResponsiveGrid(47);

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayBanner($params)
    {
        $data = array();
        $html = '';

        $tpl = 'lava_banner.tpl';
        $cache = $this->getCache($params, $tpl);

        if (isset($this->displays[0]) && $this->displays[0] == 'yes') {
            if (file_exists($cache)) {
                $tid = $this->layout;
                $lang = $params['cookie']->id_lang;
                $currency = $params['cookie']->id_currency;
                $html = $this->display(__FILE__, 'cache_'.$tid.'_'.$lang.'_'.$currency.'_'.$tpl);
            } else {
                $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_banner'));
                $data['title'] = $this->language($params, $settings, 1);
                $data['text'] = $this->language($params, $settings, 2);
                $data['button'] = $this->language($params, $settings, 3);
                $data['text_days'] = $this->language($params, $settings, 12);
                $data['text_hours'] = $this->language($params, $settings, 13);
                $data['text_minutes'] = $this->language($params, $settings, 14);
                $data['text_seconds'] = $this->language($params, $settings, 15);

                $data['image'] = '';
                $adv = $settings[4];
                if ($adv <> '') {
                    $imgurl = $this->getImageurl();
                    $data['image'] = $imgurl.$adv;
                }
                $data['link'] = $settings[5];

                $data['countdown'] = $settings[7];
                $data['countdown_stamp'] = $settings[8];
                $data['id'] = 'lava_banner';

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayTopBanner($params)
    {
        $data = array();
        $html = '';

        $tpl = 'lava_topbanner.tpl';
        $cache = $this->getCache($params, $tpl);

        if (isset($this->displays[1]) && $this->displays[1] == 'yes') {
            if (file_exists($cache)) {
                $tid = $this->layout;
                $lang = $params['cookie']->id_lang;
                $currency = $params['cookie']->id_currency;
                $html = $this->display(__FILE__, 'cache_'.$tid.'_'.$lang.'_'.$currency.'_'.$tpl);
            } else {
                $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_banner'));
                $data['text_days'] = $this->language($params, $settings, 12);
                $data['text_hours'] = $this->language($params, $settings, 13);
                $data['text_minutes'] = $this->language($params, $settings, 14);
                $data['text_seconds'] = $this->language($params, $settings, 15);
                $data['title'] = $this->language($params, $settings, 16);
                $data['text'] = $this->language($params, $settings, 17);
                $data['button'] = $this->language($params, $settings, 18);

                $adv = $settings[19];
                $data['image'] = '';
                if ($adv <> '') {
                    $imgurl = $this->getImageurl();
                    $data['image'] = $imgurl.$adv;
                }
                $data['link'] = $settings[20];

                $data['countdown'] = $settings[6];
                $data['countdown_stamp'] = $settings[21];
                $data['pos'] = 'top';
                $data['id'] = 'lava_topbanner';
                if ($settings[0] <> '') {
                    $data['days'] = $settings[0];
                } else {
                    $data['days'] = 7;
                }

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayBannerTopcolumn($params)
    {
        $data = array();
        $html = '';

        $tpl = 'lava_banner.tpl';
        $cache = $this->getCache($params, 'topcolumn_'.$tpl);

        if (isset($this->displays[62]) && $this->displays[62] == 'yes') {
            if (file_exists($cache)) {
                $tid = $this->layout;
                $lang = $params['cookie']->id_lang;
                $currency = $params['cookie']->id_currency;
                $html = $this->display(__FILE__, 'cache_'.$tid.'_'.$lang.'_'.$currency.'_topcolumn_'.$tpl);
            } else {
                $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_banners'));
                $imgurl = $this->getImageurl();
                $data['title'] = $this->language($params, $settings, 8);
                $data['text'] = $this->language($params, $settings, 9);
                $data['button'] = $this->language($params, $settings, 10);
                //$data['image'] = $imgurl.$settings[4];
                $data['link'] = $settings[12];
                $adv = $settings[11];
                if ($adv <> '') {
                    if (strstr($adv, 'http://') <> '') {
                        $data['image'] = $adv;
                    } else {
                        $data['image'] = $imgurl.$adv;
                    }
                } else {
                    $data['image'] = '';
                }

                $data['countdown'] = 'no';
                $data['countdown_stamp'] = 0;

                $data['blockgrid'] = $this->getResponsiveGrid(59);

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayBannerHometab($params)
    {
        $data = array();
        $html = '';

        $tpl = 'lava_banner.tpl';
        $cache = $this->getCache($params, 'hometab_'.$tpl);

        if (isset($this->displays[63]) && $this->displays[63] == 'yes') {
            if (file_exists($cache)) {
                $tid = $this->layout;
                $lang = $params['cookie']->id_lang;
                $currency = $params['cookie']->id_currency;
                $html = $this->display(__FILE__, 'cache_'.$tid.'_'.$lang.'_'.$currency.'_hometab_'.$tpl);
            } else {
                $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_banners'));
                $imgurl = $this->getImageurl();
                $data['title'] = $this->language($params, $settings, 15);
                $data['text'] = $this->language($params, $settings, 16);
                $data['button'] = $this->language($params, $settings, 17);
                //$data['image'] = $imgurl.$settings[4];
                $data['link'] = $settings[19];
                $adv = $settings[18];
                if ($adv <> '') {
                    if (strstr($adv, 'http://') <> '') {
                        $data['image'] = $adv;
                    } else {
                        $data['image'] = $imgurl.$adv;
                    }
                } else {
                    $data['image'] = '';
                }

                $data['countdown'] = 'no';
                $data['countdown_stamp'] = 0;

                $data['blockgrid'] = $this->getResponsiveGrid(60);

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayBannerHome($params)
    {
        $data = array();
        $html = '';

        $tpl = 'lava_banner.tpl';
        $cache = $this->getCache($params, 'home_'.$tpl);

        if (isset($this->displays[64]) && $this->displays[64] == 'yes') {
            if (file_exists($cache)) {
                $tid = $this->layout;
                $lang = $params['cookie']->id_lang;
                $currency = $params['cookie']->id_currency;
                $html = $this->display(__FILE__, 'cache_'.$tid.'_'.$lang.'_'.$currency.'_home_'.$tpl);
            } else {
                $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_banners'));
                $imgurl = $this->getImageurl();
                $data['title'] = $this->language($params, $settings, 22);
                $data['text'] = $this->language($params, $settings, 23);
                $data['button'] = $this->language($params, $settings, 24);
                //$data['image'] = $imgurl.$settings[4];
                $data['link'] = $settings[26];
                $adv = $settings[25];
                if ($adv <> '') {
                    if (strstr($adv, 'http://') <> '') {
                        $data['image'] = $adv;
                    } else {
                        $data['image'] = $imgurl.$adv;
                    }
                } else {
                    $data['image'] = '';
                }

                $data['countdown'] = 'no';
                $data['countdown_stamp'] = 0;

                $data['blockgrid'] = $this->getResponsiveGrid(61);

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayLogo($params)
    {
        $data = array();
        $html = '';

        $tpl = 'lava_logo.tpl';
        $cache = $this->getCache($params, $tpl);

        if ($this->displays[42] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $mvalue = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_logo'));

                $imgurl = _PS_IMG_;//$this->getImageurl();
                //$data['logo_pos'] = $pos;
                $data['logo_type'] = $mvalue[0];
                $data['logo_effect'] = $mvalue[1];
                if (isset($mvalue[2]) && $mvalue[2]) {
                    $data['logo_image'] = $imgurl.$mvalue[2];
                } else {
                    $data['logo_image'] = _PS_IMG_.'logo.jpg';
                }
                $data['logo_text'] = $mvalue[3];
                $data['logo_subtitle'] = $mvalue[4];

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayHamburger()
    {
        $tpl = 'lava_hamburger.tpl';
        return $this->display(__FILE__, $tpl);
    }

    public function displayContact($params)
    {
        $data = array();
        $html = '';
        $tpl = 'lava_contact.tpl';
        $cache = $this->getCache($params, $tpl);

        if ($this->displays[30] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_contact'));
                $data['company'] = explode('<br />', Tools::nl2br($this->language($params, $settings, 0)));
                $data['address'] = explode('<br />', Tools::nl2br($this->language($params, $settings, 1)));
                $data['title'] = $this->language($params, $settings, 2);
                $data['subtitle'] = $this->language($params, $settings, 3);
                $data['text'] = $this->language($params, $settings, 4);
                $data['phone'] = explode('<br />', Tools::nl2br($settings[5]));
                if ($settings[6] <> '') {
                    $data['email'] = explode('<br />', Tools::nl2br($settings[6]));
                } else {
                    $data['email'] = '';
                }
                $data['link'] = $settings[7];
                $data['logo'] = $settings[8];

                $data['imgurl'] = $this->getImageurl();
                $data['position'] = $this->displays[55];

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayInformation($params)
    {
        $data = array();
        $html = '';
        $tpl = 'lava_information.tpl';
        $cache = $this->getCache($params, $tpl);

        if ($this->displays[21] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_information'));

                $data['title'] = $this->language($params, $settings, 31);
                $data['special'] = $this->translateWord('Specials', (int)$params['cookie']->id_lang);
                $data['new'] = $this->translateWord('New products', (int)$params['cookie']->id_lang);
                $data['best'] = $this->translateWord('Top sellers', (int)$params['cookie']->id_lang);
                $data['contact'] = $this->translateWord('Contact us', (int)$params['cookie']->id_lang);
                $data['sitemap'] = $this->translateWord('Sitemap', (int)$params['cookie']->id_lang);
                $data['store'] = $this->translateWord('Our stores', (int)$params['cookie']->id_lang);

                $data['position'] = $this->displays[38];

                $data['cmslinks'] = array();
                $id = 0;
                if (isset($settings[0])) {
                    $informations = $settings[0];
                    foreach ($informations as $item) {
                        $cms = CMS::getLinks((int)$this->context->language->id, array($item));
                        if (count($cms)) {
                            $data['cmslinks'][$id] = array(
                                'link'  => $cms[0]['link'],
                                'title' => $cms[0]['meta_title'],
                            );
                            $id++;
                        }
                    }
                }
                for ($i = 0; $i < 5; $i++) {
                    if (isset($settings[2 * $i + 1])) {
                        $data['cmslinks'][$id] = array(
                            'title'  => $this->language($params, $settings, 2 * $i + 1),
                            'link' => $this->language($params, $settings, 2 * $i + 2),//$settings[2 * $i + 2],
                        );
                        $id++;
                    }
                }

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayMyaccount($params)
    {
        $data = array();
        $html = '';
        $tpl = 'lava_myaccount.tpl';
        $cache = $this->getCache($params, $tpl);

        if ($this->displays[22] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_information'));
                $data['my_title'] = $this->language($params, $settings, 34);

                $data['my_orders'] = $this->translateWord('Orders', (int)$params['cookie']->id_lang);
                $data['my_returns'] = $this->translateWord('My merchandise returns', (int)$params['cookie']->id_lang);
                $data['my_credit'] = $this->translateWord('Credit slips', (int)$params['cookie']->id_lang);
                $data['my_addresses'] = $this->translateWord('Addresses', (int)$params['cookie']->id_lang);
                $data['my_personal'] = $this->translateWord('Personal info', (int)$params['cookie']->id_lang);
                $data['my_vouchers'] = $this->translateWord('Vouchers', (int)$params['cookie']->id_lang);
                $data['my_signout'] = $this->translateWord('Sign out', (int)$params['cookie']->id_lang);

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayService($params)
    {
        $data = array();
        $html = '';
        $tpl = 'lava_service.tpl';
        $cache = $this->getCache($params, $tpl);

        if ($this->displays[49] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_information'));

                $data['cmslinks'] = array();
                for ($i = 0; $i < 5; $i++) {
                    if (isset($settings[2 * $i + 11])) {
                        $data['cmslinks'][] = array(
                            'title'  => $this->language($params, $settings, 2 * $i + 11),
                            'link' => $this->language($params, $settings, 2 * $i + 12),//$settings[2 * $i + 12],
                        );
                    }
                }

                $data['title'] = $this->language($params, $settings, 33);

                $data['contact'] = $this->translateWord('Contact us', (int)$params['cookie']->id_lang);
                $data['sitemap'] = $this->translateWord('Sitemap', (int)$params['cookie']->id_lang);
                $data['store'] = $this->translateWord('Our stores', (int)$params['cookie']->id_lang);

                $data['show_contact'] = $this->displays[24];
                $data['show_sitemap'] = $this->displays[25];
                $data['show_store'] = $this->displays[26];

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayExtra($params)
    {
        $data = array();
        $html = '';
        $tpl = 'lava_extra.tpl';
        $cache = $this->getCache($params, $tpl);

        if ($this->displays[50] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_information'));

                $data['cmslinks'] = array();
                for ($i = 0; $i < 5; $i++) {
                    if (isset($settings[2 * $i + 21])) {
                        $data['cmslinks'][] = array(
                            'title'  => $this->language($params, $settings, 2 * $i + 21),
                            'link' => $this->language($params, $settings, 2 * $i + 21),//$settings[2 * $i + 22],
                        );
                    }
                }

                $data['title'] = $this->language($params, $settings, 32);

                $data['special'] = $this->translateWord('Specials', (int)$params['cookie']->id_lang);
                $data['new'] = $this->translateWord('New products', (int)$params['cookie']->id_lang);
                $data['best'] = $this->translateWord('Top sellers', (int)$params['cookie']->id_lang);
                $data['brand'] = $this->translateWord('Brands', (int)$params['cookie']->id_lang);

                $data['show_drop'] = $this->displays[67];
                $data['show_new'] = $this->displays[68];
                $data['show_best'] = $this->displays[23];
                $data['show_brand'] = $this->displays[69];

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayCopyright($params)
    {
        $data = array();
        $html = '';
        $tpl = 'lava_copyright.tpl';
        $cache = $this->getCache($params, $tpl);

        if ($this->displays[20] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_copyright'));
                $data['company'] = $this->language($params, $settings, 0);
                $data['copyright'] = $this->language($params, $settings, 1);
                $data['image'] = $settings[2];
                $data['imgurl'] = $this->getImageurl();
                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displaySocial($params)
    {
        $data = array();
        $html = '';
        $tpl = 'lava_social.tpl';
        $cache = $this->getCache($params, $tpl);

        if ($this->displays[27] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_social'));
                $imgurl = $this->getImageurl();
                $data['so_title'] = $this->translateWord('Follow us', (int)$params['cookie']->id_lang);
                $data['so_type'] = $settings[0];
                $data['so_effect'] = $settings[1];
                $data['so_number'] = 8;
                for ($i = 0; $i < 8; $i++) {
                    $data['so_link'][$i] = $settings[2 + $i * 3];
                    $data['so_image'][$i] = $imgurl.$settings[3 + $i * 3];
                    $data['so_icon'][$i] = $settings[4 + $i * 3];
                }

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayReassure($params)
    {
        $data = array();
        $html = '';
        $tpl = 'lava_reassure.tpl';
        $cache = $this->getCache($params, $tpl);

        if ($this->displays[29] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_reassure'));
                $imgurl = $this->getImageurl();
                $data['block_title'] = $this->language($params, $settings, 0);
                $data['block_info'] = $this->language($params, $settings, 1);
                $data['type'] = $settings[2];
                if (isset($settings[3])) {
                    $data['block_id'] = $settings[3];
                }
                $data['slider_id'] = $settings[5];
                $data['number'] = 6;
                for ($i = 0; $i < $data['number']; $i++) {
                    $data['title'][$i] = $this->language($params, $settings, 6 + $i * 4);
                    $data['text'][$i] = $this->language($params, $settings, 7 + $i * 4);
                    $data['icon'][$i] = $settings[8 + $i * 4];
                    $data['image'][$i] = $imgurl.$settings[9 + $i * 4];
                }

                $bgs = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_background'));
                $data['scrollimage'] = $imgurl.$bgs[33];
                if (isset($bgs[36])) {
                    $data['scroll'] = $bgs[36];
                } else {
                    $data['scroll'] = '';
                }

                if (isset($settings[4]) && $settings[4] <> '') {
                    $tpl = $settings[4].'.tpl';
                }
                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayReatop($params)
    {
        $data = array();
        $html = '';
        $tpl = 'lava_reatop.tpl';
        $cache = $this->getCache($params, $tpl);

        if (isset($this->displays[47]) && $this->displays[47] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_reatop'));
                $imgurl = $this->getImageurl();
                $data['block_title'] = $this->language($params, $settings, 0);
                $data['block_info'] = $this->language($params, $settings, 1);
                $data['type'] = $settings[2];
                if (isset($settings[3])) {
                    $data['block_id'] = $settings[3];
                }
                $data['slider_id'] = $settings[5];
                $data['number'] = 3;
                for ($i = 0; $i < $data['number']; $i++) {
                    $data['title'][$i] = $this->language($params, $settings, 6 + $i * 4);
                    $data['text'][$i] = $this->language($params, $settings, 7 + $i * 4);
                    $data['icon'][$i] = $settings[8 + $i * 4];
                    $data['image'][$i] = $imgurl.$settings[9 + $i * 4];
                }

                if (isset($settings[4]) && $settings[4] <> '') {
                    $tpl = $settings[4].'.tpl';
                }
                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayReaproduct($params)
    {
        $data = array();
        $html = '';
        $tpl = 'reassurance-product.tpl';
        $cache = $this->getCache($params, $tpl);

        if ($this->displays[37] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_reaproduct'));
                $imgurl = $this->getImageurl();
                $data['type'] = $settings[0];
                $data['number'] = $settings[1];
                for ($i = 0; $i < $data['number']; $i++) {
                    $data['title'][$i] = $this->language($params, $settings, 3 + $i * 3);
                    $data['icon'][$i] = $settings[4 + $i * 3];
                    $data['image'][$i] = $imgurl.$settings[5 + $i * 3];
                }
                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displaySlider($params)
    {
        $data = array();
        $html = '';
        $tpl = 'lava_slider.tpl';
        $cache = $this->getCache($params, $tpl);
        $mvalue = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_slider'));
        $data['slider'] = $mvalue[4];
        switch (Tools::strtolower($data['slider'])) {
            case 'refineslide':
                $tpl = 'lava_refineslide.tpl';
                break;
            case 'owlslider':
                $tpl = 'lava_owlslider.tpl';
                break;
            case 'pointyslider':
                $tpl = 'lava_pointyslider.tpl';
                break;
            case 'vegas':
                $tpl = 'lava_vegas.tpl';
                break;
            default:
                $tpl = 'lava_bxslider.tpl';
                break;
        }

        if (isset($this->displays[4]) && $this->displays[4] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $imgurl = $this->getImageurl();

                $data['slider_number'] = $mvalue[2];
                $data['slider_delay'] = $mvalue[3];

                $data['awesome_prev'] = $mvalue[5];
                $data['awesome_next'] = $mvalue[6];

                $data['h2_animate_in'] = $mvalue[7];
                $data['h3_animate_in'] = $mvalue[8];
                $data['h4_animate_in'] = $mvalue[11];
                //$data['h5_animate_in'] = $mvalue[12];
                $data['link_animate_in'] = $mvalue[17];
                $data['logo_animate_in'] = $mvalue[18];

                $data['slider_transition'] = $mvalue[9];
                $data['slider_easing'] = 'sliceV';

                // delay for each text
                $delay = $mvalue[13];
                $time_in = 500;
                $data['h2_time_in'] = $time_in;
                $data['h3_time_in'] = $time_in + $delay;
                $data['h4_time_in'] = $time_in + $delay * 2;
                //$data['h5_time_in'] = $time_in + $delay * 3;
                $data['link_time_in'] = $time_in + $delay * 3;
                $data['logo_time_in'] = $time_in + $delay * 4;

                // Bxslider
                $data['easing'] = $mvalue[14];

                $data['max_width'] = $mvalue[16];

                //$data['pc_height'] = 560;
                //$data['tablet_height'] = 460;
                //$data['mobile_height'] = 360;
                $data['slider_duration'] = 800;


                // 用于owlslider
                //$responsive = 19;
                //$data['responsive1'] = 4;
                //$data['responsive2'] = 4;
                //$data['responsive3'] = 2;

                //$result = base64_encode(Tools::file_get_contents($imgurl.'loading.gif'));
                //file_put_contents(_PS_MODULE_DIR_.'uhuthemesetting/views/img/slider/loadinggif', $result);
                //$data['loading_icon'] = Tools::file_get_contents($imgurl.'loadinggif');
                $data['loading_icon'] = $imgurl.$mvalue[19];

                //$text_effect = 5;
                //$texteffects = explode('|', $this->mvalue[$text_effect]);

                for ($i = 0; $i < $mvalue[2]; $i++) {
                    $slider_img = 20 + 10 * $i;
                    $slider_image = $mvalue[$slider_img];

                    $slider_img = 21 + 10 * $i;
                    $slider_image_m = $mvalue[$slider_img];

                    $slider_img = 22 + 10 * $i;
                    $slider_image_s = $mvalue[$slider_img];

                    $data['slider_image'][$i] = $imgurl.$slider_image;
                    $data['slider_image_m'][$i] = $imgurl.$slider_image_m;
                    $data['slider_image_s'][$i] = $imgurl.$slider_image_s;

                    $data['slider_texteffect'][$i] = $mvalue[23 + 10 * $i];

                    $data['slider_h2'][$i] = $this->language($params, $mvalue, 24 + 10 * $i);
                    $data['slider_h3'][$i] = $this->language($params, $mvalue, 25 + 10 * $i);
                    $data['slider_h4'][$i] = $this->language($params, $mvalue, 26 + 10 * $i);
                    $data['slider_link'][$i] = $this->language($params, $mvalue, 27 + 10 * $i);
                    if ($mvalue[28 + 10 * $i] <> '') {
                        $data['slider_logo'][$i] = $imgurl.$mvalue[28 + 10 * $i];
                    } else {
                        $data['slider_logo'][$i] = '';
                    }

                    $data['slider_url'][$i] = $mvalue[29 + 10 * $i];
                }

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayNewsletter($params)
    {
        $data = array();
        $values = array();
        $html = '';
        $tpl = 'lava_newsletter.tpl';
        $cache = $this->getCache($params, $tpl);
        $data['showpopup'] = false;

        if ($this->displays[28] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $data['showpopup'] = true;
                if ($values[0] <> '') {
                    $data['time'] = $values[0];
                } else {
                    $data['time'] = 4000;
                }
                if ($values[1] <> '') {
                    $data['width'] = str_replace('px', '', $values[1]);
                } else {
                    $data['width'] = '700';
                }
                if ($values[2] <> '') {
                    $data['height'] = str_replace('px', '', $values[2]);
                } else {
                    $data['height'] = '700';
                }
                if ($values[4] <> '') {
                    $data['days'] = $values[4];
                } else {
                    $data['days'] = 7;
                }
                $data['descriptiom'] = $this->language($params, $values, 6);
                $data['footer_desc'] = $this->language($params, $values, 7);

                $data['title'] = $this->translateWord('Newsletter', (int)$params['cookie']->id_lang);
                $data['enter'] = $this->translateWord('Enter your e-mail', (int)$params['cookie']->id_lang);
                $data['subscribe'] = $this->translateWord('Subscribe', (int)$params['cookie']->id_lang);
                $data['donot'] = $this->translateWord('Don\'t show this popup again', (int)$params['cookie']->id_lang);

                $data['imgurl'] = $this->getImageurl();
                $data['blockgrid'] = $this->getResponsiveGrid(41);

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayHometabs($params)
    {
        $data = array();
        $html = '';
        $tpl = 'lava_hometabs.tpl';
        $cache = $this->getCache($params, $tpl);

        $data['ps_version'] = $this->ps_version;

        if (isset($this->displays[32]) && $this->displays[32] == 'yes' ||
            isset($this->displays[33]) && $this->displays[33] == 'yes' ||
            isset($this->displays[34]) && $this->displays[34] == 'yes' ||
            isset($this->displays[35]) && $this->displays[35] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $mvalue = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_product'));

                $data['slider'] = 'no';
                $data['width'] = '';
                $data['height'] = '';

                // Feature
                $data['feature_display'] = $this->displays[32];
                $data['feature_title'] = $this->language($params, $mvalue, 0);
                $data['features_products'] = $this->getFeaturedProducts($mvalue);

                // New
                $data['new_display'] = $this->displays[33];
                $data['new_title'] = $this->language($params, $mvalue, 1);
                $data['new_products'] = $this->getNewProducts($mvalue);

                // Bestseller
                $data['best_display'] = $this->displays[34];
                $data['best_title'] = $this->language($params, $mvalue, 2);
                $data['best_products'] = $this->getBestProducts($mvalue);

                // Specials
                $data['special_display'] = $this->displays[35];
                $data['special_title'] = $this->language($params, $mvalue, 3);
                $data['special_products'] = $this->getSpecialProducts($mvalue);

                foreach ($data['special_products'] as $rawProduct) {
                    if ($rawProduct['specific_prices']) {
                        if ($rawProduct['specific_prices']['from'] <> $rawProduct['specific_prices']['to']) {
                            $to = strtotime($rawProduct['specific_prices']['to']);
                            $from = strtotime($rawProduct['specific_prices']['from']);
                            $data['stamp'][$rawProduct['id_product']] = ($to + $from) * 1000;//'2944345480000';//
                        }
                    }
                }

                $data['tpl_id'] = 'uhu_xp_9502';
                $data['popular'] = '';
                $data['effect'] = $mvalue[20];

                $data['msg'] = $this->translateWord('No products.', (int)$params['cookie']->id_lang);
                //$data['text_no_results'] = $this->language->get('text_no_results');
                //$data['button_cart'] = $this->language->get('button_cart');
                //$data['button_wishlist'] = $this->language->get('button_wishlist');
                //$data['button_compare'] = $this->language->get('button_compare');

                //$data['slider'] = $this->displays[58];
                //if (isset($this->displays[58]) && $this->displays[58] <> 'no') {
                //    $data['responsive'] = $this->model_extension_lava_base->getResponsiveItem($this->grids, 52);
                //} else {
                //    $data['responsive'] = '';
                //}

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayCatprd($params)
    {
        $data = array();
        $html = '';
        $prds = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_product'));
        $tpl = 'lava_listcatprd.tpl';
        $cache = $this->getCache($params, $tpl);
        if (isset($prds[26]) && $prds[26] <> '') {
            $tpl = $prds[26];
        }

        $data['ps_version'] = $this->ps_version;

        $lang = (int)Context::getContext()->language->id;
        if (isset($this->displays[36]) && $this->displays[36] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $data['show_catprd'] = $this->displays[36];
                $data['slider'] = $this->displays[51];
                $data['show_all'] = $this->displays[33];

                $data['responsive'] = $this->getResponsiveItem(45);
                $data['blocktitle'] = $this->language($params, $prds, 6);

                $nb = $prds[17];
                //$data['all_products'] = $this->getNewProducts($nb);
                //$data['tab_all'] = $this->translateWord('All', (int)$lang);

                if (isset($prds[16])) {
                    $cats = $prds[16];
                    $data['category_number'] = count($cats);

                    for ($i = 0; $i < $data['category_number']; $i++) {
                        $categoryid = $cats[$i];
                        $category = new Category((int)$categoryid, (int)$lang);
                        $data['catprd'][$i] = '';
                        $data['title'][$i] = '';
                        if (Validate::isLoadedObject($category)) {
                            $data['catprd'][$i] = $this->getCategoryProducts($categoryid, $nb);

                            $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
                                SELECT c.`id_category`, cl.`name`
                                FROM `'._DB_PREFIX_.'category` c
                                LEFT JOIN `'._DB_PREFIX_.'category_lang` cl ON (c.`id_category` = cl.`id_category`)
                                WHERE cl.`id_lang` = '.(int)$lang.' AND cl.`id_category` = '.$categoryid.' 
                                ORDER BY c.`position`');

                            $data['title'][$i] = $result['name'];
                        }
                    }
                } else {
                    $data['category_number'] = 0;
                }

                $data['msg'] = $this->translateWord('No products.', (int)$params['cookie']->id_lang);

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayBest($params)
    {
        $data = array();
        $html = '';
        $tpl = 'lava_best.tpl';
        $cache = $this->getCache($params, $tpl);

        $data['ps_version'] = $this->ps_version;

        if (isset($this->displays[34]) && $this->displays[34] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $mvalue = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_product'));

                $data['title'] = $this->language($params, $mvalue, 2);

                $data['products'] = $this->getBestProducts($mvalue);
                $data['effect'] = '';
                $data['tpl_id'] = 'uhu_cp_1901';
                $data['slider'] = 'no';

                //$data['blockgrid'] = $this->getResponsiveGrid(53);
                //$data['itemgrid'] = $this->getResponsiveGrid(54);

                $data['msg'] = $this->translateWord('No products.', (int)$params['cookie']->id_lang);

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displaySpecial($params)
    {
        $data = array();
        $html = '';
        $tpl = 'lava_special.tpl';
        $cache = $this->getCache($params, $tpl);

        $data['ps_version'] = $this->ps_version;

        if (isset($this->displays[35]) && $this->displays[35] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $mvalue = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_product'));

                $data['title'] = $this->language($params, $mvalue, 3);
                $data['text_days'] = $this->language($params, $mvalue, 22);
                $data['text_hours'] = $this->language($params, $mvalue, 23);
                $data['text_minutes'] = $this->language($params, $mvalue, 24);
                $data['text_seconds'] = $this->language($params, $mvalue, 25);

                $data['products'] = $this->getSpecialProducts($mvalue);
                $data['effect'] = '';

                $data['tpl_id'] = 'lava_specials';
                $data['slider'] = $this->displays[60];
                if ($this->displays[60] <> 'no') {
                    $data['responsive'] = $this->getResponsiveItem(72);
                } else {
                    $data['responsive'] = '';
                }

                foreach ($data['products'] as $rawProduct) {
                    if ($rawProduct['specific_prices']) {
                        if ($rawProduct['specific_prices']['from'] <> $rawProduct['specific_prices']['to']) {
                            $to = strtotime($rawProduct['specific_prices']['to']);
                            $from = strtotime($rawProduct['specific_prices']['from']);
                            $data['stamp'][$rawProduct['id_product']] = ($to + $from) * 1000;//'2944345480000';//
                        }
                    }
                }

                $data['msg'] = $this->translateWord('No products.', (int)$params['cookie']->id_lang);

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayFeatured($params)
    {
        $data = array();
        $html = '';
        $tpl = 'lava_featured.tpl';
        $cache = $this->getCache($params, $tpl);

        $data['ps_version'] = $this->ps_version;

        if (isset($this->displays[32]) && $this->displays[32] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $mvalue = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_product'));

                $data['title'] = $this->language($params, $mvalue, 0);

                $data['products'] = $this->getFeaturedProducts($mvalue);

                $data['slider'] = $this->displays[58];
                $data['popular'] = '';
                $data['effect'] = $mvalue[20];

                //$data['blockgrid'] = $this->getResponsiveGrid(49);
                //$data['itemgrid'] = $this->getResponsiveGrid(50);
                $data['msg'] = $this->translateWord('No products.', (int)$params['cookie']->id_lang);

                $data['tpl_id'] = 'uhu_xp_9502';
                if (isset($this->displays[58]) && $this->displays[58] <> 'no') {
                    $data['responsive'] = $this->getResponsiveItem(52);
                } else {
                    $data['responsive'] = '';
                }

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function displayNew($params)
    {
        $data = array();
        $html = '';
        $tpl = 'lava_new.tpl';
        $cache = $this->getCache($params, $tpl);

        $data['ps_version'] = $this->ps_version;

        if (isset($this->displays[33]) && $this->displays[33] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $mvalue = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_product'));

                $data['title'] = $this->language($params, $mvalue, 1);
                if ($data['title'] == '') {
                    $data['title'] = $this->translateWord('New products', (int)$params['cookie']->id_lang);
                }

                $data['products'] = $this->getNewProducts($mvalue);

                $data['slider'] = $this->displays[57];
                $data['popular'] = '';
                $data['effect'] = $mvalue[21];

                $data['msg'] = $this->translateWord('No products.', (int)$params['cookie']->id_lang);

                $data['tpl_id'] = 'uhu_xp_9501';
                if ($this->displays[57] <> 'no') {
                    $data['responsive'] = $this->getResponsiveItem(52);
                } else {
                    $data['responsive'] = '';
                }

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    public function getCategoryProducts($categoryid, $nb)
    {
        if (Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=') == true) {
            //$result = '';//1.6
            $result = $this->getProducts($categoryid, $nb);//1.7
        } else {
            $category = new Category((int)$categoryid, (int)Context::getContext()->language->id);
            $result = $category->getProducts((int)Context::getContext()->language->id, 1, ($nb ? $nb : 8), 'position');

            if ($result === false || empty($result)) {
                return false;
            }

            foreach ($result as &$row) {
                $images = Image::getImages((int) $this->context->language->id, $row['id_product']);
                if (is_array($images)) {
                    foreach ($images as $image) {
                        if ($row['id_image'] <> $row['id_product'].'-'.$image['id_image']) {
                            $row['id_hover'] = $row['id_product'].'-'.$image['id_image'];
                            break;
                        }
                    }
                } else {
                    $row['id_hover'] = $row['id_image'];
                }
            }
        }

        return $result;
    }

    public function getFeaturedProducts($mvalue)
    {
        if (Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=') == true) {
            //$result = '';//1.6
            $result = $this->getProducts((int)$mvalue[10], (int)$mvalue[12]);//1.7
        } else {
            $lang = (int)Context::getContext()->language->id;
            $category = new Category((int)$mvalue[10], $lang);
            $nb = (int)$mvalue[12];
            $nb = $nb ? $nb : 8;
            if ($mvalue[9] == 'true') {
                $result = $category->getProducts($lang, 1, $nb, null, null, false, true, true, $nb);
            } else {
                $result = $category->getProducts($lang, 1, $nb, 'position');
            }

            if ($result === false || empty($result)) {
                return false;
            }

            foreach ($result as &$row) {
                $images = Image::getImages((int) $this->context->language->id, $row['id_product']);
                if (is_array($images)) {
                    foreach ($images as $image) {
                        if ($row['id_image'] <> $row['id_product'].'-'.$image['id_image']) {
                            $row['id_hover'] = $row['id_product'].'-'.$image['id_image'];
                            break;
                        }
                    }
                } else {
                    $row['id_hover'] = $row['id_image'];
                }
            }
        }

        return $result;
    }

    protected function getNewProducts($mvalue)
    {
        $nb = (int)$mvalue[11];

        if (Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=') == true) {
            //$result = '';//1.6
            $result = $this->getNewArrivals($nb);//1.7
        } else {
            if (Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) {
                $result = Product::getNewProducts((int) $this->context->language->id, 0, ($nb ? $nb : 8));
            }

            if ($result === false || empty($result)) {
                return false;
            }

            foreach ($result as &$row) {
                $images = Image::getImages((int)$this->context->language->id, $row['id_product']);
                if (is_array($images)) {
                    foreach ($images as $image) {
                        if ($row['id_image'] <> $row['id_product'].'-'.$image['id_image']) {
                            $row['id_hover'] = $row['id_product'].'-'.$image['id_image'];
                            break;
                        }
                    }
                } else {
                    $row['id_hover'] = $row['id_image'];
                }
            }
        }

        return $result;
    }

    protected function getBestProducts($mvalue)
    {
        if (Configuration::get('PS_CATALOG_MODE')) {
            return false;
        }

        $nb = (int)$mvalue[13];
        if (Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=') == true) {
            //$result = '';//1.6
            $result = $this->getBestSellers($nb);//1.7
        } else {
            $result = ProductSale::getBestSalesLight((int) $this->context->language->id, 0, ($nb ? $nb : 8));

            if ($result === false || empty($result)) {
                return false;
            }

            $currency = new Currency($this->context->currency->id);
            $usetax = (Product::getTaxCalculationMethod((int)$this->context->customer->id) != PS_TAX_EXC);
            foreach ($result as &$row) {
                $row['price'] = Tools::displayPrice(Product::getPriceStatic($row['id_product'], $usetax), $currency);
            }

            foreach ($result as &$row) {
                $images = Image::getImages((int)$this->context->language->id, $row['id_product']);
                if (is_array($images)) {
                    foreach ($images as $image) {
                        if ($row['id_image'] <> $row['id_product'].'-'.$image['id_image']) {
                            $row['id_hover'] = $row['id_product'].'-'.$image['id_image'];
                            break;
                        }
                    }
                } else {
                    $row['id_hover'] = $row['id_image'];
                }
            }
        }

        return $result;
    }

    protected function getSpecialProducts($mvalue)
    {
        if (Configuration::get('PS_CATALOG_MODE')) {
            return false;
        }

        $nb = (int)$mvalue[14];
        if (Tools::version_compare(_PS_VERSION_, '1.7.0.0', '>=') == true) {
            //$result = '';//1.6
            $result = $this->getPricesDrop($nb);//1.7
        } else {
            $result = Product::getPricesDrop((int) $this->context->language->id, 0, ($nb ? $nb : 8));

            if ($result === false || empty($result)) {
                return false;
            }

            foreach ($result as &$row) {
                $images = Image::getImages((int) $this->context->language->id, $row['id_product']);
                if (is_array($images)) {
                    foreach ($images as $image) {
                        if ($row['id_image'] <> $row['id_product'].'-'.$image['id_image']) {
                            $row['id_hover'] = $row['id_product'].'-'.$image['id_image'];
                            break;
                        }
                    }
                } else {
                    $row['id_hover'] = $row['id_image'];
                }
            }
        }

        return $result;
    }

    /*
    *
    *    1.7
    *
    */
    protected function getBestSellers($nProducts)
    {
        $searchProvider = new BestSalesProductSearchProvider(
            $this->context->getTranslator()
        );

        $context = new ProductSearchContext($this->context);

        $query = new ProductSearchQuery();

        $query
            ->setResultsPerPage($nProducts)
        ;

        $result = $searchProvider->runQuery(
            $context,
            $query
        );

        $assembler = new ProductAssembler($this->context);

        $presenterFactory = new ProductPresenterFactory($this->context);
        $presentationSettings = $presenterFactory->getPresentationSettings();
        $presenter = new ProductListingPresenter(
            new ImageRetriever(
                $this->context->link
            ),
            $this->context->link,
            new PriceFormatter(),
            new ProductColorsRetriever(),
            $this->context->getTranslator()
        );

        $products_for_template = [];

        foreach ($result->getProducts() as $rawProduct) {
            $products_for_template[] = $presenter->present(
                $presentationSettings,
                $assembler->assembleProduct($rawProduct),
                $this->context->language
            );
        }

        return $products_for_template;
    }

    protected function getNewArrivals($nProducts)
    {
        $searchProvider = new NewProductsProductSearchProvider(
            $this->context->getTranslator()
        );

        $context = new ProductSearchContext($this->context);

        $query = new ProductSearchQuery();

        $query
            ->setResultsPerPage($nProducts)
            ->setQueryType('new-products')
            ->setSortOrder(new SortOrder('product', 'date_add', 'desc'))
        ;

        $result = $searchProvider->runQuery(
            $context,
            $query
        );

        $assembler = new ProductAssembler($this->context);

        $presenterFactory = new ProductPresenterFactory($this->context);
        $presentationSettings = $presenterFactory->getPresentationSettings();
        $presenter = new ProductListingPresenter(
            new ImageRetriever(
                $this->context->link
            ),
            $this->context->link,
            new PriceFormatter(),
            new ProductColorsRetriever(),
            $this->context->getTranslator()
        );

        $products_for_template = [];

        foreach ($result->getProducts() as $rawProduct) {
            $products_for_template[] = $presenter->present(
                $presentationSettings,
                $assembler->assembleProduct($rawProduct),
                $this->context->language
            );
        }

        return $products_for_template;
    }

    protected function getPricesDrop($nProducts)
    {
        $searchProvider = new PricesDropProductSearchProvider(
            $this->context->getTranslator()
        );

        $context = new ProductSearchContext($this->context);

        $query = new ProductSearchQuery();

        $query
            ->setResultsPerPage($nProducts)
        ;

        $result = $searchProvider->runQuery(
            $context,
            $query
        );

        $assembler = new ProductAssembler($this->context);

        $presenterFactory = new ProductPresenterFactory($this->context);
        $presentationSettings = $presenterFactory->getPresentationSettings();
        $presenter = new ProductListingPresenter(
            new ImageRetriever(
                $this->context->link
            ),
            $this->context->link,
            new PriceFormatter(),
            new ProductColorsRetriever(),
            $this->context->getTranslator()
        );

        $products_for_template = [];

        foreach ($result->getProducts() as $rawProduct) {
            $products_for_template[] = $presenter->present(
                $presentationSettings,
                $assembler->assembleProduct($rawProduct),
                $this->context->language
            );
        }

        return $products_for_template;
    }

    public function getProducts($category_id, $nProducts)
    {
        $category = new Category($category_id);

        $searchProvider = new CategoryProductSearchProvider(
            $this->context->getTranslator(),
            $category
        );

        $context = new ProductSearchContext($this->context);

        $query = new ProductSearchQuery();

        if ($nProducts < 0) {
            $nProducts = 12;
        }

        $query
            ->setResultsPerPage($nProducts)
            ->setPage(1)
        ;

        if (Configuration::get('HOME_FEATURED_RANDOMIZE')) {
            $query->setSortOrder(SortOrder::random());
        } else {
            $query->setSortOrder(new SortOrder('product', 'position', 'asc'));
        }

        $result = $searchProvider->runQuery(
            $context,
            $query
        );

        $assembler = new ProductAssembler($this->context);

        $presenterFactory = new ProductPresenterFactory($this->context);
        $presentationSettings = $presenterFactory->getPresentationSettings();
        $presenter = new ProductListingPresenter(
            new ImageRetriever(
                $this->context->link
            ),
            $this->context->link,
            new PriceFormatter(),
            new ProductColorsRetriever(),
            $this->context->getTranslator()
        );

        $products_for_template = [];

        foreach ($result->getProducts() as $rawProduct) {
            $products_for_template[] = $presenter->present(
                $presentationSettings,
                $assembler->assembleProduct($rawProduct),
                $this->context->language
            );
        }

        return $products_for_template;
    }
    //*/

    /*
    *
    *    Live demo
    *
    */
    public function getTemplateId()
    {
        if (Configuration::get('PS_UHU_LIVE_DEMO') == 1) {
            if (Tools::getValue('tid')) {
                $current_theme = Tools::getValue('tid');
                Context::getContext()->cookie->theme = $current_theme;
                Context::getContext()->cookie->write();
            } elseif (!empty(Context::getContext()->cookie->theme)) {
                $current_theme = trim(Context::getContext()->cookie->theme);
            } else {
                $themes = Tools::unserialize(Configuration::get(_THEME_NAME_));
                $current_theme = $themes[4];
            }
        } else {
            $themes = Tools::unserialize(Configuration::get(_THEME_NAME_));
            $current_theme = $themes[4];
        }

        return $current_theme;
    }

    public function getColorId()
    {
        if (Configuration::get('PS_UHU_LIVE_DEMO') == 1) {
            if (Tools::getValue('cid')) {
                $current_color = Tools::getValue('cid');
                Context::getContext()->cookie->color = $current_color;
                Context::getContext()->cookie->write();
            } elseif (!empty(Context::getContext()->cookie->color)) {
                $current_color = trim(Context::getContext()->cookie->color);
            } else {
                $themes = Tools::unserialize(Configuration::get(_THEME_NAME_));
                $current_color = $themes[8];
            }
        } else {
            $themes = Tools::unserialize(Configuration::get(_THEME_NAME_));
            $current_color = $themes[8];
        }

        return $current_color;
    }

    /*
    *
    *    Menu
    *
    */
    public function displayTopmenu($params)
    {
        $data = array();
        $html = '';
        $tpl = 'lava_mainmenu.tpl';

        $tid = $this->layout;
        $cache_path = _PS_MODULE_DIR_.$this->name.'/views/templates/hook/';
        if ($this->context->customer->isLogged()) {
            $cache = $cache_path.'cache_'.$tid.'_logout_'.$params['cookie']->id_lang.'_'.$tpl;
        } else {
            $cache = $cache_path.'cache_'.$tid.'_login_'.$params['cookie']->id_lang.'_'.$tpl;
        }

        if (isset($this->displays[2]) && $this->displays[2] == 'yes') {
            if (file_exists($cache) && (filemtime($cache) + $this->settings[17] > time())) {
                $html = Tools::file_get_contents($cache);
            } else {
                $this->user_groups = ($this->context->customer->isLogged() ?
                    $this->context->customer->getGroups() : array(Configuration::get('PS_UNIDENTIFIED_GROUP')));

                //$settings = $this->settings;
                //$imagefolder = $settings[21];
                //$baseurl = $this->context->link->protocol_content.Tools::getMediaServer($this->name)._MODULE_DIR_;
                //$tid = $this->layout;
                //$this->imgurl = $baseurl.'lavasetting'.$imagefolder.$tid.'/';
                //$this->responsive = $settings[43];

                $data['pos'] = $this->displays[3];
                $data['popup'] = $this->displays[18];
                $data['imgurl'] = $this->getImageurl();//$baseurl.'lavasetting'.$imagefolder.$tid.'/';

                $topmenu = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_topmenu'));

                $data['topmenu_hom'] = $this->makeHomeMenu($params, $topmenu);

                $data['total_lnk'] = $topmenu[13];
                $data['topmenu_lnk'] = '';
                for ($item = 0; $item < $topmenu[13]; $item++) {
                    $data['topmenu_lnk'][$item] = $this->makeCustomLink($params, $topmenu, $item);
                }

                $data['topmenu_all'] = $this->makeCategoryMenu($params, $topmenu);
                $data['topmenu_pro'] = $this->makeProductMenu($params, $topmenu);
                $data['topmenu_bra'] = $this->makeBrandMenu($params, $topmenu);
                $data['topmenu_new'] = $this->makeNewsMenu($params, $topmenu);

                if ($topmenu[27] <> 0) {
                    $data['topmenu_cms'][0] = $this->makeCustomCms($params, $topmenu, 23, 24, 1, 43);
                    $data['topmenu_cms'][1] = $this->makeCustomCms($params, $topmenu, 44, 45, 2, 46);
                    $data['topmenu_cms'][2] = $this->makeCustomCms($params, $topmenu, 26, 28, 3, 29);
                    $data['topmenu_cms'][3] = $this->makeCustomCms($params, $topmenu, 35, 36, 4, 37);
                    $data['topmenu_cms'][4] = $this->makeCustomCms($params, $topmenu, 41, 42, 5, 47);
                }

                $data['total_cus'] = $topmenu[25];
                $data['topmenu_cus'] = '';
                for ($item = 0; $item < $topmenu[25]; $item++) {
                    $data['topmenu_cus'][$item] = $this->makeCategoryMenuItems($topmenu, $item);
                }

                $data['logged'] = $this->context->customer->isLogged();
                $link = new Link;
                $data['my_account_url'] = $link->getPageLink('my-account', true);
                $data['logout_url'] = $link->getPageLink('index', true, null, 'mylogout');

                $data['menu_signin'] = $this->translateWord('Sign in', (int)$params['cookie']->id_lang);
                $data['menu_signout'] = $this->translateWord('Sign out', (int)$params['cookie']->id_lang);
                $data['menu_myaccount'] = $this->translateWord('My account', (int)$params['cookie']->id_lang);

                $mvalue = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_logo'));
                $data['logo_type'] = $mvalue[0];
                if (isset($mvalue[2]) && $mvalue[2]) {
                    $data['logo_image'] = $data['imgurl'].$mvalue[2];
                } else {
                    $data['logo_image'] = _PS_IMG_.'logo.jpg';
                }
                $data['logo_text'] = $mvalue[3];
                $data['logo_subtitle'] = $mvalue[4];

                $html = $this->makeCache($data, $cache, $tpl);
            }
        }

        return $html;
    }

    private function makeHomeMenu($params, $mod_value)
    {
        $data = array();
        if ($this->displays[17] == 'no') {
            return;
        }

        $data['link'] = _PS_BASE_URL_.__PS_BASE_URI__;
        if ($mod_value[16] <> '') {
            $data['link'] = $mod_value[16];
        }

        $data['roll'] = $mod_value[13];
        if ($this->displays[17] == 'yes') {
            $data['menu_title'] = $this->language($params, $mod_value, 12);
            if ($data['menu_title'] == '') {
                $data['menu_title'] = $this->translateWord('Home', (int)$params['cookie']->id_lang);
            }
        }

        return $data;
    }

    private function makeCategoryMenu($params, $mod_value)
    {
        $data = array();
        if ($this->displays[11] == 'no' && $this->displays[12] == 'no') {
            return;
        }

        $category_id = (int)Configuration::get('PS_HOME_CATEGORY');
        $cat = new Category($category_id);
        $data['link'] = Tools::HtmlEntitiesUTF8($cat->getLink());
        if ($mod_value[17] <> '') {
            $data['link'] = $mod_value[17];
        }

        $data['menu_title'] = $this->language($params, $mod_value, 38);
        if ($data['menu_title'] == '') {
            $data['menu_title'] = $this->translateWord('Categories', (int)$params['cookie']->id_lang);
        }
        $data['text_all'] = $this->language($params, $mod_value, 31);

        $data['roll'] = $mod_value[13];
        $data['display11'] = $this->displays[11];
        $data['display12'] = $this->displays[12];

        if ($this->displays[18] == 'yes') {
            if ($this->displays[12] == 'yes') {
                $data['allcats'] = $this->getCategory((int)Configuration::get('PS_HOME_CATEGORY'), false, false);
            }

            if ($this->displays[11] == 'yes') {
                $cates = $mod_value[8];
                $data['cates_count'] = count($cates);
                if ($cates <> '') {
                    foreach ($cates as $key => $category_id) {
                        $data['cates'][$key] = $this->getSingleCategory((int)$category_id, false, false);
                    }
                }
            }
        }

        return $data;
    }

    private function makeProductMenu($params, $mod_value)
    {
        $data = array();
        if ($this->displays[13] == 'no' && $this->displays[14] == 'no') {
            return;
        }

        $link = new Link;
        $data['link'] = $link->getPageLink('new-products');
        if ($mod_value[18] <> '') {
            $data['link'] = $mod_value[18];
        }

        $data['menu_title'] = $this->language($params, $mod_value, 39);
        if ($data['menu_title'] == '') {
            $data['menu_title'] = $this->translateWord('Products', (int)$params['cookie']->id_lang);
        }

        $data['roll'] = $mod_value[13];
        $data['display13'] = $this->displays[13];
        $data['display14'] = $this->displays[14];

        $data['adv_img'] = $mod_value[14];
        $data['adv_lnk'] = $mod_value[15];

        $products = $mod_value[6];
        $data['count'] = count($mod_value[6]);
        if ($products <> '') {
            foreach ($products as $key => $product_id) {
                $product = new Product((int)$product_id, true, (int)$this->context->language->id);
                if (!is_null($product->id)) {
                    $row_image = Product::getCover($product->id);
                    $product->id_image = $row_image['id_image'];
                    $typea = 'home';
                    $typeb = 'default';
                    $type = $typea.'_'.$typeb;
                    //$type = ImageType::getFormattedName('home');
                    $rewrite = $product->link_rewrite;
                    $link = Context::getContext()->link->getImageLink($rewrite, $product->id_image, $type);
                    $data['productimage'][$key] = str_replace('http://', Tools::getShopProtocol(), $link);
                    $data['productlink'][$key] = $product->getLink();
                    $data['productname'][$key] = $product->name;
                    $data['productdesc'][$key] = strip_tags($product->description_short);
                }
            }
        }

        return $data;
    }

    private function makeBrandMenu($params, $mod_value)
    {
        $data = array();
        if ($this->displays[15] == 'no' && $this->displays[16] == 'no') {
            return;
        }

        $link = new Link;
        $data['link'] = $link->getPageLink('manufacturer');
        if ($mod_value[19] <> '') {
            $data['link'] = $mod_value[19];
        }

        $data['menu_title'] = $this->language($params, $mod_value, 40);
        if ($data['menu_title'] == '') {
            $data['menu_title'] = $this->translateWord('Brands', (int)$params['cookie']->id_lang);
        }

        $data['roll'] = $mod_value[13];
        $data['display15'] = $this->displays[15];
        $data['display16'] = $this->displays[16];

        $brands = $mod_value[7];
        $data['brands'] = count($brands);
        if ($brands <> '') {
            foreach ($brands as $key => $manufacturer_id) {
                $data['images'][$key] = '';
                $data['links'][$key] = '';
                $data['names'][$key] = '';
                $manufacturer = new Manufacturer((int)$manufacturer_id, (int)$this->context->language->id);
                //if (!is_null($manufacturer->id)) {
                if (Validate::isLoadedObject($manufacturer)) {
                    if ((int)Configuration::get('PS_REWRITING_SETTINGS')) {
                        $manufacturer->link_rewrite = Tools::link_rewrite($manufacturer->name);
                    } else {
                        $manufacturer->link_rewrite = 0;
                    }
                    $link = new Link;
                    $data['images'][$key] = _THEME_MANU_DIR_.$manufacturer->id.'.jpg';
                    $data['links'][$key] = $link->getManufacturerLink(
                        (int)$manufacturer_id,
                        $manufacturer->link_rewrite
                    );
                    $data['names'][$key] = $manufacturer->name;
                }
            }
        }

        $manufacturers = Manufacturer::getManufacturers();
        $data['bcount'] = count($manufacturers);
        foreach ($manufacturers as $key => $manufacturer) {
            $link = new Link;
            $mid = (int)$manufacturer['id_manufacturer'];
            $data['url'][$key] = htmlentities($link->getManufacturerLink($mid, $manufacturer['link_rewrite']));
            $data['name'][$key] = $manufacturer['name'];
        }

        return $data;
    }

    private function makeNewsMenu($params, $mod_value)
    {
        $data = array();
        if ($this->displays[9] == 'no' && $this->displays[10] == 'no') {
            return;
        }

        $data['link'] = '';
        if ($mod_value[20] <> '') {
            $data['link'] = $mod_value[20];
        }

        $data['menu_title'] = $this->language($params, $mod_value, 48);
        if ($data['menu_title'] == '') {
            $data['menu_title'] = $this->translateWord('News', (int)$params['cookie']->id_lang);
        }

        $data['roll'] = $mod_value[13];
        $data['display_news'] = $this->displays[9];
        $data['display_cms'] = $this->displays[10];

        $data['news_img'] = $mod_value[51];
        $data['news_block_title'] = $this->language($params, $mod_value, 52);

        for ($i = 0; $i < 3; $i++) {
            $cid = 53 + $i * 2;
            $data['news_title'][$i] = $this->language($params, $mod_value, $cid);
            $data['news_text'][$i] = $this->language($params, $mod_value, $cid + 1);
        }

        $data['news_cms_title'] = $this->language($params, $mod_value, 59);
        $informations = $mod_value[9];
        $data['news_cms_count'] = count($informations);
        foreach ($informations as $key => $item) {
            $data['news_cmstitle'][$key] = '';
            $data['news_cmslink'][$key] = '';
            $cms = CMS::getLinks((int)$this->context->language->id, array($item));
            if (count($cms)) {
                $data['news_cmstitle'][$key] = $cms[0]['meta_title'];
                $data['news_cmslink'][$key] = htmlentities($cms[0]['link']);
            }
        }

        return $data;
    }

    private function makeCustomCms($params, $mod_value, $id1, $id2, $id4, $id3)
    {
        $data = array();

        $data['roll'] = $mod_value[13];
        $data['width'] = $mod_value[$id3];
        if ($this->language($params, $mod_value, $id1) <> '') {
            $data['label'] = $this->language($params, $mod_value, $id1);
            $data['link'] = $this->language($params, $mod_value, $id2);//$mod_value[$id2];
            $data['nav'] = '';
            if (isset($mod_value[$id4]) && $mod_value[$id4] <> '') {
                $data['nav'] = 'nav_a';
                $informations = $mod_value[$id4];
                $data['cms_count'] = count($informations);
                foreach ($informations as $key => $item) {
                    $cms = CMS::getLinks((int)$this->context->language->id, array($item));
                    if (count($cms)) {
                        $data['cmstitle'][$key] = $cms[0]['meta_title'];
                        $data['cmslink'][$key] = htmlentities($cms[0]['link']);
                    }
                }
            }
        }

        return $data;
    }

    private function makeCustomLink($params, $mod_value, $item)
    {
        $data = array();

        $data['roll'] = $mod_value[13];
        $data['menu_title'] = $this->language($params, $mod_value, 10 + $item);
        $data['menu_link'] = $this->language($params, $mod_value, 21 + $item);

        $data['width'] = $mod_value[49 + $item];
        $data['total'] = $mod_value[158 + $item];
        for ($i = 0; $i < $data['total']; $i++) {
            if (isset($mod_value[36 * $item + 86 + $i * 3])) {
                $data['label'][$i] = $this->language($params, $mod_value, 36 * $item + 86 + $i * 3);
            } else {
                $data['label'][$i] = '';
            }
            if (isset($mod_value[36 * $item + 87 + $i * 3])) {
                $data['link'][$i] = $this->language($params, $mod_value, 36 * $item + 87 + $i * 3);
            } else {
                $data['link'][$i] = '';
            }
            if (isset($mod_value[36 * $item + 88 + $i * 3])) {
                $data['image'][$i] = $mod_value[36 * $item + 88 + $i * 3];
            } else {
                $data['image'][$i] = '';
            }
        }

        return $data;
    }

    private function makeCategoryMenuItems($mod_value, $item)
    {
        $data = array();

        $cates = '';
        if ($item == 0) {
            $category_id = $mod_value[30];
            $data['type'] = $mod_value[31];
            if (isset($mod_value[32])) {
                $cates = $mod_value[32];
            }
            $data['adv_img'] = $mod_value[33];
            $data['adv_lnk'] = $mod_value[34];
        } else {
            $category_id = $mod_value[60 - 5 + $item * 5];
            $data['type'] = $mod_value[61 - 5 + $item * 5];
            if (isset($mod_value[62 - 5 + $item * 5])) {
                $cates = $mod_value[62 - 5 + $item * 5];
            }
            $data['adv_img'] = $mod_value[63 - 5 + $item * 5];
            $data['adv_lnk'] = $mod_value[64 - 5 + $item * 5];
        }

        $data['roll'] = $mod_value[13];
        $data['display40'] = $this->displays[40];
        $data['display41'] = $this->displays[41];

        if ($category_id <> '') {
            $category = new Category((int)$category_id, (int)$this->context->language->id);
            if ($category->level_depth > 1) {
                $category_link = $category->getLink();
            } else {
                $category_link = $this->context->link->getPageLink('index');
            }
            $data['category_link'] = Tools::HtmlEntitiesUTF8($category_link);
            $data['category_name'] = $category->name;
            $data['cates_count'] = count($cates);

            if ($this->displays[18] == 'yes') {

                if ($this->displays[40] <> '') {

                    if ($data['type'] == 'Custom category' && $cates <> '') {
                        foreach ($cates as $key => $catid) {
                            $category_info = new Category((int)$catid, (int)$this->context->language->id);

                            if ($category_info) {
                                if ($category->level_depth > 1) {
                                    $category_link = $category_info->getLink();
                                } else {
                                    $category_link = $this->context->link->getPageLink('index');
                                }
                                $data['cates_link'][$key] = $category_link;
                                $data['cates_name'][$key] = $category_info->name;
                            }
                        }
                    } else {
                        $data['allcats'] = $this->getCategory((int)$category_id, false, false);
                    }
                }
            }
        }
        
        return $data;
    }

    private function getCategory($id_category, $id_lang = false, $id_shop = false)
    {
        $data = array();

        $id_shop = $id_shop;
        $id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
        $category = new Category((int)$id_category, (int)$id_lang);

        if ($category->level_depth > 1) {
            $category_link = $category->getLink();
        } else {
            $category_link = $this->context->link->getPageLink('index');
        }

        if (is_null($category->id)) {
            return;
        }

        $children = Category::getChildren((int)$id_category, (int)$id_lang, true, (int)$id_shop);
        $data['catcount1'] = count($children);

        $is_intersected = array_intersect($category->getGroups(), $this->user_groups);
        if (!empty($is_intersected)) {
            if (count($children)) {
                foreach ($children as $key => $child) {
                    $category_child = new Category((int)$child['id_category'], (int)$id_lang);

                    if ($category_child->level_depth > 1) {
                        $category_link = $category_child->getLink();
                    } else {
                        $category_link = $this->context->link->getPageLink('index');
                    }

                    if (is_null($category_child->id)) {
                        return;
                    }

                    $child_two = Category::getChildren((int)$child['id_category'], (int)$id_lang, true, (int)$id_shop);
                    $data['catcount2'][$key] = count($child_two);

                    $is_intersected = array_intersect($category_child->getGroups(), $this->user_groups);
                    if (!empty($is_intersected)) {
                        $data['catlink1'][$key] = $category_link;
                        $data['catname1'][$key] = $category_child->name;

                        if (count($child_two)) {
                            foreach ($child_two as $key2 => $childtwo) {
                                $category_childtwo = new Category((int)$childtwo['id_category'], (int)$id_lang);

                                if ($category_childtwo->level_depth > 1) {
                                    $category_linktwo = $category_childtwo->getLink();
                                } else {
                                    $category_linktwo = $this->context->link->getPageLink('index');
                                }

                                if (is_null($category_childtwo->id)) {
                                    return;
                                }

                                $is_intersected = array_intersect($category_childtwo->getGroups(), $this->user_groups);
                                if (!empty($is_intersected)) {
                                    $data['catlink2'][$key][$key2] = $category_linktwo;
                                    $data['catname2'][$key][$key2] = $category_childtwo->name;
                                }
                            }
                        }
                    }
                }
            }
        }

        return $data;
    }

    private function getSingleCategory($id_category, $id_lang = false, $id_shop = false)
    {
        $data = array();

        $id_shop = $id_shop;
        $id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
        $category = new Category((int)$id_category, (int)$id_lang);

        if ($category->level_depth > 1) {
            $category_link = $category->getLink();
        } else {
            $category_link = $this->context->link->getPageLink('index');
        }

        if (is_null($category->id)) {
            return;
        }

        $is_intersected = array_intersect($category->getGroups(), $this->user_groups);
        if (!empty($is_intersected)) {
            $data['link'] = htmlentities($category_link);
            //$type = 'medium';
            //$data['image'] = _THEME_CAT_DIR_.$id_category.'-'.$type.'_default.jpg';
            $data['image'] = _THEME_CAT_DIR_.$id_category.'.jpg';
            $data['name'] = $category->name;
            $data['desc'] = strip_tags($category->description);
        }

        return $data;
    }

    public function cacheProducts()
    {
        if (!isset(Uhucustomize::$cache_products)) {
            $lang = (int)Context::getContext()->language->id;
            $category = new Category((int)Configuration::get('HOME_FEATURED_CAT'), $lang);
            $nb = (int)Configuration::get('HOME_FEATURED_NBR');
            $nb = ($nb ? $nb : 8);
            if (Configuration::get('HOME_FEATURED_RANDOMIZE')) {
                $products = $category->getProducts($lang, 1, $nb, null, null, false, true, true, $nb);
                Uhucustomize::$cache_products = $products;
            } else {
                $products = $category->getProducts($lang, 1, $nb, 'position');
                Uhucustomize::$cache_products = $products;
            }
        }

        if (Uhucustomize::$cache_products === false || empty(Uhucustomize::$cache_products)) {
            return false;
        }
    }

    /*
    *
    *    tools
    *
    */
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

    public function getImageurl()
    {
        $imagefolder = $this->settings[21];
        $baseurl = $this->context->shop->getBaseURL();
        $tid = $this->layout;
        $imgurl = $baseurl.'themes/'._THEME_NAME_.'/'.$imagefolder.$tid.'/';

        return $imgurl;
    }

    public function getResponsiveItem($id)
    {
        $item = array();
        $grids = $this->grids;
        if (isset($grids[$id][0])) {
            $item[0] = $grids[$id][0];

            if (isset($grids[$id][1])) {
                $item[1] = $grids[$id][1];
            } else {
                $item[1] = $item[0];
            }
            if (isset($grids[$id][2])) {
                $item[2] = $grids[$id][2];
            } else {
                $item[2] = $item[0];
            }
            if (isset($grids[$id][3])) {
                $item[3] = $grids[$id][3];
            } else {
                $item[3] = $item[0];
            }
        }

        return $item;
    }

    public function getResponsiveGrid($id)
    {
        $responsive = $this->settings[43];

        $grid = '';
        $grids = $this->grids;
        if ($responsive == 'bootstrap') {
            if (isset($grids[$id][0])) {
                if ($grids[$id][0] > 0) {
                    $grid .= ' col-xs-'.$grids[$id][0];
                }
            }
            if (isset($grids[$id][1])) {
                if ($grids[$id][1] > 0) {
                    $grid .= ' col-sm-'.$grids[$id][1];
                }
            }
            if (isset($grids[$id][2])) {
                if ($grids[$id][2] > 0) {
                    $grid .= ' col-md-'.$grids[$id][2];
                }
            }
            if (isset($grids[$id][3])) {
                if ($grids[$id][3] > 0) {
                    $grid .= ' col-lg-'.$grids[$id][3];
                }
            }
        } //elseif ($responsive == 'pure') {}

        return $grid;
    }

    public function translateWord($string, $id_lang)
    {
        static $_MODULES = array();

        $lang = Language::getIsoById($id_lang);

        if (!array_key_exists($id_lang, $_MODULES)) {
            if (file_exists($file1 = _PS_MODULE_DIR_.'lavasetting/translations/'.$lang.'.php')) {
                $_MODULES[$id_lang] = include($file1);
            } elseif (file_exists($file2 = _PS_MODULE_DIR_.'lavasetting/'.$lang.'.php')) {
                $_MODULES[$id_lang] = include($file2);
            } else {
                return $string;
            }
        }

        $string = str_replace('\'', '\\\'', $string);

        // set array key to lowercase for 1.3 compatibility
        $_MODULES[$id_lang] = array_change_key_case($_MODULES[$id_lang]);
        $name = 'lavasetting';//Tools::strtolower($this->name);
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

    public function language($params, $mvalue, $id)
    {
        if ($mvalue[$id] == '') {
            return;
        }
/*
        $lang_iso = Language::getIsoById($params['cookie']->id_lang);
        if (isset($mvalue[$id][$lang_iso])) {
            return $mvalue[$id][$lang_iso];
        } else {
            return;
        }
*/
        $lang_iso = Language::getIsoById($params['cookie']->id_lang);
        if (isset($mvalue[$id][$lang_iso])) {
            if ($mvalue[$id][$lang_iso] <> '') {
                $string = $mvalue[$id][$lang_iso];
            } else {
                $string = $this->translateWord($mvalue[$id]['en'], (int)$params['cookie']->id_lang);
            }
        } else {
            $string = $this->translateWord($mvalue[$id]['en'], (int)$params['cookie']->id_lang);
        }

        return $string;
    }

    /*
    *
    *    hook
    *
    */
    public function hookdisplayHeader()
    {
        $settings = $this->settings;
        $sliders = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_slider'));

        $csspath = _MODULE_DIR_.'lavasetting/views/css/';

        $this->context->controller->addCSS($csspath.'animate.css', 'all');
        $this->context->controller->addCSS($csspath.'animation.css', 'all');
        $this->context->controller->addCSS($csspath.'linkeffect.css', 'all');
        $this->context->controller->addCSS($csspath.'owl.carousel.css', 'all');
        $this->context->controller->addCSS($csspath.'refineslide.css', 'all');
        $this->context->controller->addCSS($csspath.'pointy.css', 'all');
        $this->context->controller->addCSS($csspath.'vegas.min.css', 'all');
        $this->context->controller->addCSS($csspath.'countdown.css', 'all');
        //$this->context->controller->addCSS($csspath.'maintenance.css', 'all');

        $current_theme = $this->layout;
        $current_color = $this->getColorId();
        if ($current_color == '') {
            $themecolor_names = explode('|', $settings[3]);
            $current_color = $themecolor_names[0];
        }

        $css_path = 'themes/'._THEME_NAME_.'/assets/css/'.$current_theme.'/';
        $media = ['media' => 'all', 'priority' => 150];
        $this->context->controller->registerStylesheet('lava-custom', $css_path.'custom.css', $media);
        $this->context->controller->registerStylesheet('lava-style', $css_path.'theme_style.css', $media);
        $this->context->controller->registerStylesheet('lava-layout', $css_path.$settings[12].'_layout.css', $media);
        $this->context->controller->registerStylesheet('lava-fw004', $css_path.'fw004.css', $media);
        $this->context->controller->registerStylesheet('lava-styleall', $css_path.'style_all.css', $media);
        $this->context->controller->registerStylesheet('lava-psstyle.css', $css_path.'ps_style.css', $media);
        $this->context->controller->registerStylesheet('lava-color', $css_path.'/'.$current_color.'.css', $media);
        $this->context->controller->registerStylesheet('lava-colors', $css_path.'/'.$current_color.'s.css', $media);
        $this->context->controller->registerStylesheet('lava-mystyle', $css_path.'mystyle.css', $media);
        $this->context->controller->registerStylesheet('lava-mycustom', $css_path.'mycustom.css', $media);

        $jspath = _MODULE_DIR_.'lavasetting/views/js/';
        if ($sliders[4] == 'RefineSlide') {
            $this->context->controller->addJS($jspath.'jquery.refineslide.js');
        }

        if ($sliders[4] == 'Bxslider') {
            $this->context->controller->addJqueryPlugin(array('bxslider'));
        }

        if ($sliders[4] == 'Pointyslider') {
            $this->context->controller->addJS($jspath.'jquery.pointy.js');
        }

        if ($sliders[4] == 'Vegas') {
            $this->context->controller->addJS($jspath.'vegas.min.js');
        }

        if ($settings[15] == 'yes') {
            $this->context->controller->addJS($jspath.'jquery.stellar.js');
            $this->context->controller->addJS($jspath.'uhu.js');
        }

        if ($settings[16] == 'yes') {
            $this->context->controller->addJS($jspath.'jquery.imageScroll.js');
        }

        //if ($settings[28] == 'yes') {
            $this->context->controller->addJS($jspath.'jquery.countdown.js');
        //}

        if ($settings[29] == 'yes') {
            $this->context->controller->addJS($jspath.'jquery.countTo.js');
        }

        $menus = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_topmenu'));
        if ($menus[0] == 'yes') {
            $this->context->controller->addJS($jspath.'jquery-scrolltofixed.js');
            $this->context->controller->addJS($jspath.'fixmenu.js');
        }

        $this->context->controller->addJqueryPlugin(array('fancybox', 'scrollTo', 'idtabs'));
        $this->context->controller->addJS($jspath.'imagesloaded.pkgd.js');
        $this->context->controller->addJS($jspath.'owl.carousel.js');
        $this->context->controller->addJS($jspath.'wow.min.js');
        $this->context->controller->addJS($jspath.'jquery.inview.js');
        $this->context->controller->addJS($jspath.'last.js');
    }

    public function hookdisplayMaintenance($params)
    {
        $data = array();
        $fonts = array();

        $tid = $this->layout;
        $data['bgslide_css'] = _MODULE_DIR_.'lavasetting/views/css/bgslide.css';
        $data['maintenance_css'] = _MODULE_DIR_.'lavasetting/views/css/countdown.css';
        $data['countdown_css'] = _MODULE_DIR_.'lavasetting/views/css/maintenance.css';
        $data['mystyle_css'] = _MODULE_DIR_.'lavasetting/views/css/'.$tid.'/mystyle.css';

        $this->context->controller->addJquery();
        $this->context->controller->addJS(_MODULE_DIR_.'lavasetting/views/js/jquery.countdown.js');

        $imgurl = $this->getImageurl();

        $settings = Tools::unserialize(Configuration::get('lava_'.$this->layout.'_maintenance'));

        $data['logo'] = $imgurl.$settings[0];
        $data['logo_width'] = $settings[1];
        $data['logo_height'] = $settings[2];

        $data['title'] = $this->language($params, $settings, 3);
        $fonts[0] = $settings[4];

        $data['description'] = $this->language($params, $settings, 8);
        $fonts[1] = $settings[9];

        $data['copyright'] = $this->language($params, $settings, 21);
        $fonts[2] = $settings[22];

        $data['static'] = $settings[13];
        $animation_name = $settings[14];
        $data['number'] = $settings[15];
        //$bg_color = $settings[16];

        $data['countdown'] = $settings[20];
        $data['countdown_stamp'] = $settings[23];//Configuration::get('lava_maintenance_countdown');

        for ($id = 0; $id < $data['number']; $id++) {
            $data['image'][$id] = $settings[30 + $id];
        }

        $data['slideshow'] = '';
        $data['slideshow-span'] = '';
         $data['slideshow-li'] = array();

        if ($data['static'] == 'Dynamic' && $data['number'] >= '1') {
            $slider_delay = 15;
            $total_delay = $data['number'] * $slider_delay;

            $anis = $animation_name.' '.$total_delay.'s linear infinite 0s;'.PHP_EOL;
            $data['slideshow-span'] .= '.bg-slideshow li span {'.PHP_EOL;
            $data['slideshow-span'] .= '-webkit-animation: '.$anis;
            $data['slideshow-span'] .= '-moz-animation: '.$anis;
            $data['slideshow-span'] .= '-o-animation: '.$anis;
            $data['slideshow-span'] .= '-ms-animation: '.$anis;
            $data['slideshow-span'] .= 'animation: '.$anis;
            $data['slideshow-span'] .= '}'.PHP_EOL;

            for ($i = 0; $i < $data['number']; $i++) {
                $data['slideshow-li'][$i] = '.bg-slideshow li:nth-child('.($i + 1).') span {'.PHP_EOL;
                $data['slideshow-li'][$i] .= 'background-image: url('.$imgurl.$data['image'][$i].');'.PHP_EOL;
                $data['slideshow-li'][$i] .= '-webkit-animation-delay: '.$i * $slider_delay.'s;'.PHP_EOL;
                $data['slideshow-li'][$i] .= '-moz-animation-delay: '.$i * $slider_delay.'s;'.PHP_EOL;
                $data['slideshow-li'][$i] .= '-o-animation-delay: '.$i * $slider_delay.'s;'.PHP_EOL;
                $data['slideshow-li'][$i] .= '-ms-animation-delay: '.$i * $slider_delay.'s;'.PHP_EOL;
                $data['slideshow-li'][$i] .= 'animation-delay: '.$i * $slider_delay.'s;'.PHP_EOL;
                $data['slideshow-li'][$i] .= '}'.PHP_EOL;
            }
        }

        $data['securemode'] = (Tools::usingSecureMode()) ? 'https://' : 'http://';
        $data['googlefonts'] = $this->updateGooglefont($fonts);

        $this->smarty->assign('data', $data);

        return $this->display(__FILE__, 'lava_maintenance.tpl');
    }

    public function hookdisplayBeforeBodyClosingTag($params)
    {
        $mhooks = 'scrollto';
        $html = $this->displayCode($params, $mhooks, '');

        return $html;
    }

    public function hookdisplayBanner($params)
    {
        $mhooks = $this->settings[14];
        $html = $this->displayCode($params, $mhooks, '');

        return $html;
    }

    public function hookdisplayTop($params)
    {
        $mhooks = $this->settings[22];
        $html = $this->displayCode($params, $mhooks, 'top');

        return $html;
    }

    // 1.6
    public function hookdisplayNav($params)
    {
        $mhooks = $this->settings[13];
        $html = $this->displayCode($params, $mhooks, 'top');

        return $html;
    }

    // 1.7
    public function hookdisplayNav1($params)
    {
        $mhooks = $this->settings[13];
        $html = $this->displayCode($params, $mhooks, 'top');

        return $html;
    }

    // 1.7
    public function hookdisplayNav2($params)
    {
        $mhooks = $this->settings[34];
        $html = $this->displayCode($params, $mhooks, 'top');

        return $html;
    }

    public function hookdisplayHome($params)
    {
        $mhooks = $this->settings[23];
        $html = $this->displayCode($params, $mhooks, 'home');

        return $html;
    }

    public function hookdisplayTopColumn($params)
    {
        $mhooks = $this->settings[35];
        $html = $this->displayCode($params, $mhooks, 'topcolumn');

        return $html;
    }

    public function hookdisplayFooterProduct($params)
    {
        $mhooks = $this->settings[25];
        $html = $this->displayCode($params, $mhooks, '');

        return $html;
    }

    public function hookdisplayFooter($params)
    {
        $mhooks = $this->settings[20];
        $html = $this->displayCode($params, $mhooks, '');

        return $html;
    }

    public function hookdisplayFooterBefore($params)
    {
        $mhooks = $this->settings[19];
        $html = $this->displayCode($params, $mhooks, '');

        return $html;
    }

    public function hookdisplayFooterAfter($params)
    {
        $mhooks = $this->settings[26];
        $html = $this->displayCode($params, $mhooks, '');

        return $html;
    }

    public function hookdisplayReassurance($params)
    {
        $mhooks = $this->settings[24];
        $html = $this->displayCode($params, $mhooks, '');

        return $html;
    }

    /*
    *
    *    clear
    *
    */
    public function hookActionObjectCategoryAddAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectCategoryUpdateAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectCategoryDeleteAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectCmsUpdateAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectCmsDeleteAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectCmsAddAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectSupplierUpdateAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectSupplierDeleteAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectSupplierAddAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectManufacturerUpdateAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectManufacturerDeleteAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectManufacturerAddAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectProductUpdateAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectProductDeleteAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookActionObjectProductAddAfter($params)
    {
        $this->clearMenuCache();
    }

    public function hookCategoryUpdate($params)
    {
        $this->clearMenuCache();
    }

    protected function clearMenuCache()
    {
        $this->clearCache($this->name.'/views/templates/hook/');
    }

    public function hookAddProduct($params)
    {
        if (!isset($params['product'])) {
            return;
        }

        $this->clearCache($this->name.'/views/templates/hook/');
    }

    public function hookUpdateProduct($params)
    {
        if (!isset($params['product'])) {
            return;
        }

        $this->clearCache($this->name.'/views/templates/hook/');
    }

    public function hookDeleteProduct($params)
    {
        if (!isset($params['product'])) {
            return;
        }

        $this->clearCache($this->name.'/views/templates/hook/');
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
}
