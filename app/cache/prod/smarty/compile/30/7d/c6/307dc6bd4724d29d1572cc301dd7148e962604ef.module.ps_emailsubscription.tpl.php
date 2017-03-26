<?php /* Smarty version Smarty-3.1.19, created on 2017-01-30 21:24:13
         compiled from "module:ps_emailsubscription/views/templates/hook/ps_emailsubscription.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1706858345588ff54de3f937-00653219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '307dc6bd4724d29d1572cc301dd7148e962604ef' => 
    array (
      0 => 'module:ps_emailsubscription/views/templates/hook/ps_emailsubscription.tpl',
      1 => 1483465723,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '1706858345588ff54de3f937-00653219',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'urls' => 0,
    'value' => 0,
    'msg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_588ff54de43254_94777171',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_588ff54de43254_94777171')) {function content_588ff54de43254_94777171($_smarty_tpl) {?>

<div class="block_newsletter">
    <p class="label"><?php echo smartyTranslate(array('s'=>'Get our latest news and special sales','d'=>'Shop.Theme'),$_smarty_tpl);?>
</p>
    <div class="subscription">
      <form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['index'], ENT_QUOTES, 'UTF-8');?>
#footer" method="post">
        <div class="row">
          <div class="col-xs-9">
            <input
              name="email"
              type="text"
              value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value, ENT_QUOTES, 'UTF-8');?>
"
              placeholder="<?php echo smartyTranslate(array('s'=>'Your email address','d'=>'Shop.Forms.Labels'),$_smarty_tpl);?>
"
            >
          </div>
          <div class="col-xs-3">
            <button type="submit" name="submitNewsletter" class="btn btn-primary"><i class="material-icons">send</i></button>
			
            <input type="hidden" name="action" value="0">
          </div>
          <div class="col-xs-12">
              
              <?php if ($_smarty_tpl->tpl_vars['msg']->value) {?>
                <span>
                  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['msg']->value, ENT_QUOTES, 'UTF-8');?>

                </span>
              <?php }?>
          </div>
        </div>
      </form>
    </div>
</div>
<?php }} ?>
