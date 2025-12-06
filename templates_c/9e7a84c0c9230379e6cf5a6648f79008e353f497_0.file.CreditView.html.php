<?php
/* Smarty version 3.1.30, created on 2025-12-06 13:20:48
  from "C:\xampp\htdocs\obiektowosc\app\CreditView.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_69341fa044adb9_71291609',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e7a84c0c9230379e6cf5a6648f79008e353f497' => 
    array (
      0 => 'C:\\xampp\\htdocs\\obiektowosc\\app\\CreditView.html',
      1 => 1765022766,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69341fa044adb9_71291609 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>
 <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_214556061569341fa0449e37_59810608', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender(($_smarty_tpl->tpl_vars['conf']->value->root_path).("/templates/main.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
}
/* {block 'content'} */
class Block_214556061569341fa0449e37_59810608 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2 class="content-head is-center">Kalkulator kredytowy</h2>

<div class="pure-g">
  <div class="l-box-lrg pure-u-1 pure-u-med-2-5">
    <form
      class="pure-form pure-form-stacked"
      action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/credit.php"
      method="post"
    >
      <fieldset>
        <label for="amount">Kwota kredytu</label>
        <input
          id="amount"
          type="text"
          placeholder="np. 20000"
          name="amount"
          value="<?php echo $_smarty_tpl->tpl_vars['form']->value->amount;?>
"
        />

        <label for="years">Liczba lat</label>
        <input
          id="years"
          type="text"
          placeholder="np. 5"
          name="years"
          value="<?php echo $_smarty_tpl->tpl_vars['form']->value->years;?>
"
        />

        <label for="percent">Oprocentowanie (%)</label>
        <input
          id="percent"
          type="text"
          placeholder="np. 7.5"
          name="percent"
          value="<?php echo $_smarty_tpl->tpl_vars['form']->value->percent;?>
"
        />

        <button type="submit" class="pure-button">Oblicz</button>
      </fieldset>
    </form>
  </div>

  <div class="l-box-lrg pure-u-1 pure-u-med-3-5">
    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
    <h4>Wystąpiły błędy:</h4>
    <ol class="err">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
?>
      <li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ol>
    <?php }?> <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
    <h4>Informacje:</h4>
    <ol class="inf">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
?>
      <li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </ol>
    <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['res']->value->monthly)) {?>
    <h4>Wynik obliczeń</h4>
    <p>Rata miesięczna: <strong><?php echo $_smarty_tpl->tpl_vars['res']->value->monthly;?>
 zł</strong></p>
    <p>Całkowity koszt kredytu: <strong><?php echo $_smarty_tpl->tpl_vars['res']->value->cost;?>
 zł</strong></p>
    <?php }?>
  </div>
</div>

<?php
}
}
/* {/block 'content'} */
}
