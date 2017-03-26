<?php /* Smarty version Smarty-3.1.19, created on 2017-02-04 19:08:13
         compiled from "module:ps_wirepayment/views/templates/hook/ps_wirepayment_intro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:133920402458966ced8fc476-38955092%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac93800f7c79e4effac1051becf76659826f5560' => 
    array (
      0 => 'module:ps_wirepayment/views/templates/hook/ps_wirepayment_intro.tpl',
      1 => 1485832010,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '133920402458966ced8fc476-38955092',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'bankwireReservationDays' => 0,
    'bankwireCustomText' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58966ced901289_29492175',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58966ced901289_29492175')) {function content_58966ced901289_29492175($_smarty_tpl) {?>

<section>
  <p>
    <?php echo smartyTranslate(array('s'=>'Please transfer the invoice amount to our bank account. You will receive our order confirmation per email containing bank details and order number.','mod'=>'ps_wirepayment'),$_smarty_tpl);?>

    <?php echo smartyTranslate(array('s'=>'Goods will be reserved %s days for you and we\'ll process the order immediately after receiving the payment.','sprintf'=>array($_smarty_tpl->tpl_vars['bankwireReservationDays']->value),'mod'=>'ps_wirepayment'),$_smarty_tpl);?>

    <?php if ($_smarty_tpl->tpl_vars['bankwireCustomText']->value) {?>
        <a data-toggle="modal" data-target="#bankwire-modal"><?php echo smartyTranslate(array('s'=>'More information','mod'=>'ps_wirepayment'),$_smarty_tpl);?>
</a>
    <?php }?>
  </p>

  <div class="modal fade" id="bankwire-modal" tabindex="-1" role="dialog" aria-labelledby="Bankwire information" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h2><?php echo smartyTranslate(array('s'=>'Bankwire','mod'=>'ps_wirepayment'),$_smarty_tpl);?>
</h2>
        </div>
        <div class="modal-body">
          <p><?php echo smartyTranslate(array('s'=>'Payment is made by transfer of the invoice amount to the following account:','mod'=>'ps_wirepayment'),$_smarty_tpl);?>
</p>
          <?php echo $_smarty_tpl->getSubTemplate ('module:ps_wirepayment/views/templates/hook/_partials/payment_infos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

          <?php echo $_smarty_tpl->tpl_vars['bankwireCustomText']->value;?>

        </div>
      </div>
    </div>
  </div>
</section>
<?php }} ?>
