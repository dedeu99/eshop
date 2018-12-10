<?php /* Smarty version Smarty-3.1.21-dev, created on 2018-12-04 17:46:37
         compiled from "/users/a62362/public_html/LAB11A/application/views/templates/replies_template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10952029135c06bd285d5262-32471618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f084a7edec52de80ba015f7a47da25851a37a3a' => 
    array (
      0 => '/users/a62362/public_html/LAB11A/application/views/templates/replies_template.tpl',
      1 => 1543945514,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10952029135c06bd285d5262-32471618',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c06bd28613ee5_91366548',
  'variables' => 
  array (
    'replies' => 0,
    'reply' => 0,
    'base_url' => 0,
    'imgpath' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c06bd28613ee5_91366548')) {function content_5c06bd28613ee5_91366548($_smarty_tpl) {?>

<?php  $_smarty_tpl->tpl_vars['reply'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['reply']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['replies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['reply']->key => $_smarty_tpl->tpl_vars['reply']->value) {
$_smarty_tpl->tpl_vars['reply']->_loop = true;
?>







<hr style="width:100%">
<div class="col-sm-9">

  <div class="row no-gutters align-items-center" style="margin-left:30px">
    <p><?php echo nl2br($_smarty_tpl->tpl_vars['reply']->value['content']);?>
</p>



  </div>

</div>
<div class="col-sm-3 text-center"  >
  <br>
  <a>
    <span class="rounded-circle">
      <img

      <?php if (file_exists("img/user".((string)$_smarty_tpl->tpl_vars['reply']->value['user_id']).".jpg")) {?> 
      <?php $_smarty_tpl->tpl_vars["imgpath"] = new Smarty_variable("img/user".((string)$_smarty_tpl->tpl_vars['reply']->value['user_id']).".jpg", null, 0);?> 

      src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;
echo $_smarty_tpl->tpl_vars['imgpath']->value;?>
"
      <?php } else { ?> 
      src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
img/user.jpg" 
      <?php }?>


      style="width:40px;" alt="User Image">
    </span>
    <p><?php echo $_smarty_tpl->tpl_vars['reply']->value['name'];?>
</p>
  </a>
  <p>Replied:</p>
  <p><?php echo $_smarty_tpl->tpl_vars['reply']->value['created_at'];?>
</p>
</div>























<?php } ?>        
<?php }} ?>
