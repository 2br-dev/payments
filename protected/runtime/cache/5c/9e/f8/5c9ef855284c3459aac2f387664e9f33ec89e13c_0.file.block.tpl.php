<?php
/* Smarty version 3.1.32, created on 2018-12-05 18:55:30
  from 'C:\OpenServer\domains\authorization.local\protected\modules\pechat_schetov\tpl\block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c07f4f27ff1a0_74824746',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c9ef855284c3459aac2f387664e9f33ec89e13c' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\modules\\pechat_schetov\\tpl\\block.tpl',
      1 => 1543923869,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c07f4f27ff1a0_74824746 (Smarty_Internal_Template $_smarty_tpl) {
if ($_SESSION['admin'] == 'true') {?>
  <div class="vystavlenie-schetov pechat-schetov">
    <form id="pechat-schetov" action="" method="post">
      <p class="mb0">Год</p><span class="error year-error">Выберите год:</span>
      <div class="vystavlenie-schetov-year">
         <label class="container-radio">2016
          <input name="year" type="radio" value="2016">
          <span class="checkmark"></span>
        </label>
        <label class="container-radio">2017
          <input name="year" type="radio" value="2017">
          <span class="checkmark"></span>
        </label>
        <label class="container-radio">2018
          <input name="year" type="radio" value="2018">
          <span class="checkmark"></span>
        </label>
        <label class="container-radio">2019
          <input name="year" type="radio" value="2019">
          <span class="checkmark"></span>
        </label>
        <label class="container-radio">2020
          <input name="year" type="radio" value="2020">
          <span class="checkmark"></span>
        </label>        
      </div>
      <p class="mb0">Месяц</p><span class="error month-error">Выберите месяц:</span>
      <div class="vystavlenie-schetov-month">
        <span>
          <label class="container-radio">Январь
            <input name="month" type="radio" value="Январь">
            <span class="checkmark"></span>
          </label>
          <label class="container-radio">Май
            <input name="month" type="radio" value="Май">
            <span class="checkmark"></span>
          </label>
          <label class="container-radio">Сентябрь
            <input name="month" type="radio" value="Сентябрь">
            <span class="checkmark"></span>
          </label>
        </span>
        <span>
          <label class="container-radio">Февраль
            <input name="month" type="radio" value="Февраль">
            <span class="checkmark"></span>
          </label>
          <label class="container-radio">Июнь
            <input name="month" type="radio" value="Июнь">
            <span class="checkmark"></span>
          </label>
          <label class="container-radio">Октябрь
            <input name="month" type="radio" value="Октябрь">
            <span class="checkmark"></span>
          </label>                    
        </span>
        <span>
          <label class="container-radio">Март
            <input name="month" type="radio" value="Март">
            <span class="checkmark"></span>
          </label>
          <label class="container-radio">Июль
            <input name="month" type="radio" value="Июль">
            <span class="checkmark"></span>
          </label>
          <label class="container-radio">Ноябрь
            <input name="month" type="radio" value="Ноябрь">
            <span class="checkmark"></span>
          </label>                    
        </span>
        <span>
          <label class="container-radio">Апрель
            <input name="month" type="radio" value="Апрель">
            <span class="checkmark"></span>
          </label>
          <label class="container-radio">Август
            <input name="month" type="radio" value="Август">
            <span class="checkmark"></span>
          </label>
          <label class="container-radio">Декабрь
            <input name="month" type="radio" value="Декабрь">
            <span class="checkmark"></span>
          </label>                    
        </span>
      </div>
      <hr>
      <input type="submit" value="Отправить">
    </form>
  </div>
  <?php if ($_smarty_tpl->tpl_vars['inv']->value) {?>
    <div class="renters-list">
      <div class='pechat-schetov-result'>
        <h2 class='pechat-schetov-result-header'><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['month']->value;?>
</h2>
      </div>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['inv']->value, 'i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
?>	
      <div class="renters-list-item">
        <div class="renters-list-container">
          <a data-arendator="<?php echo $_smarty_tpl->tpl_vars['i']->value['renter_id'];?>
" class="renters-list-link">
            <p><?php echo $_smarty_tpl->tpl_vars['i']->value['renter_name'];?>
, № счёта: <?php echo $_smarty_tpl->tpl_vars['i']->value['invoice_number'];?>
, на сумму: <?php echo $_smarty_tpl->tpl_vars['i']->value['invoice_summa'];?>
</p>
          </a>
          <span data-invoice="<?php echo $_smarty_tpl->tpl_vars['i']->value['invoice_number'];?>
" class="renters-list-delete">удалить<span class="renters-list-delete-img"></span></span>
        </div>
        <hr>
        <div class="documents-block" data-block="<?php echo $_smarty_tpl->tpl_vars['i']->value['renter_id'];?>
">
          <div class="without-print">
            <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['invoice_number'];?>
&ind=sch&pr=0&disc=0" target="_blank" >Счет</a>
            <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['akt_id'];?>
&ind=akt&pr=0&disc=0" target="_blank" >Акт</a>
            <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['sf_id'];?>
&ind=sf&pr=0&disc=0" target="_blank" >Счет-фактура</a>
          </div>
          <div class="with-print">
            <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['invoice_number'];?>
&ind=sch&pr=1&disc=0" target="_blank" >Счет+печать</a>
            <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['akt_id'];?>
&ind=akt&pr=1&disc=0" target="_blank" >Акт+печать</a>
            <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['sf_id'];?>
&ind=sf&pr=1&disc=0" target="_blank" >Счет-фактура+печать</a>
          </div>
          <div class="with-discount">
            <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['invoice_number'];?>
&ind=sch&pr=0&disc=1" target="_blank" >Счет (со скидкой)</a>
            <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['akt_id'];?>
&ind=akt&pr=0&disc=1" target="_blank" >Акт (со скидкой)</a>
            <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['sf_id'];?>
&ind=sf&pr=0&disc=1" target="_blank" >Счет-фактура (со скидкой)</a>
          </div>
          <div class="with-discount">
            <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['invoice_number'];?>
&ind=sch&pr=1&disc=1" target="_blank" >Счет (со скидкой)+печать</a>
            <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['akt_id'];?>
&ind=akt&pr=1&disc=1" target="_blank" >Акт (со скидкой)+печать</a>
            <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['sf_id'];?>
&ind=sf&pr=1&disc=1" target="_blank" >Счет-фактура (со скидкой)+печать</a>
          </div>
        </div>
      </div>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
  <?php }
}?>

<?php if ($_SESSION['admin'] == "false") {?> 
    <div class="renters-list">
      <div class='pechat-schetov-result'>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allinvoices']->value, 'i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
?>
          <h2 class='pechat-schetov-result-header'><?php echo $_smarty_tpl->tpl_vars['i']->value['renter_name'];?>
</h2>
          <?php break 1;?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        <table class="invoice-table">
        <tr style="text-align: left">
          <th>N% Договора</th>
          <th style="width: 20%; text-align: center">На сумму</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contracts']->value, 'contract');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contract']->value) {
?>
          <tr>
            <td style="text-align: left"><b><?php echo $_smarty_tpl->tpl_vars['contract']->value['number'];?>
</b> на период: <i><?php echo $_smarty_tpl->tpl_vars['contract']->value['start_date'];?>
 - <?php echo $_smarty_tpl->tpl_vars['contract']->value['end_date'];?>
</i></td>
            <td class="invoice_summa"><?php echo $_smarty_tpl->tpl_vars['contract']->value['summa'];?>
</td> 
          </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
      </div>
      <div class="renters-invoices">
      <h2>Все выставленные счета</h2>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allinvoices']->value, 'i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
?>	
          <div class="renters-list-item">
            <p class="renters-list-link">№ счёта: <?php echo $_smarty_tpl->tpl_vars['i']->value['invoice_number'];?>
 за <?php echo $_smarty_tpl->tpl_vars['i']->value['month'];?>
, <?php echo $_smarty_tpl->tpl_vars['i']->value['year'];?>
, на сумму: <?php echo $_smarty_tpl->tpl_vars['i']->value['invoice_summa'];?>
</p>
            <hr>
            <div class="documents-block documents-block-renter" data-block="<?php echo $_smarty_tpl->tpl_vars['i']->value['renter_id'];?>
">
              <?php if ($_smarty_tpl->tpl_vars['i']->value['discount'] == 0) {?>
              <p>Счет <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['invoice_number'];?>
&ind=sch&pr=0&disc=0" target="_blank" >Распечатать</a></p>
              <p>Акт <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['akt_id'];?>
&ind=akt&pr=0&disc=0" target="_blank" >Распечатать</a></p>
              <p>Счет-фактура <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['sf_id'];?>
&ind=sf&pr=0&disc=0" target="_blank" >Распечатать</a></p>
              <p>Счет+печать <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['invoice_number'];?>
&ind=sch&pr=1&disc=0" target="_blank" >Распечатать</a></p>
              <p>Акт+печать <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['akt_id'];?>
&ind=akt&pr=1&disc=0" target="_blank" >Распечатать</a></p>
              <p>Счет-фактура+печать <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['sf_id'];?>
&ind=sf&pr=1&disc=0" target="_blank" >Распечатать</a></p>
              <?php } else { ?>
              <p>Счет <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['invoice_number'];?>
&ind=sch&pr=0&disc=1" target="_blank" >Распечатать</a></p>
              <p>Акт <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['akt_id'];?>
&ind=akt&pr=0&disc=1" target="_blank" >Распечатать</a></p>
              <p>Счет-фактура <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['sf_id'];?>
&ind=sf&pr=0&disc=1" target="_blank" >Распечатать</a></p>
              <p>Счет+печать <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['invoice_number'];?>
&ind=sch&pr=1&disc=1" target="_blank" >Распечатать</a></p>
              <p>Акт+печать <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['akt_id'];?>
&ind=akt&pr=1&disc=1" target="_blank" >Распечатать</a></p>
              <p>Счет-фактура+печать <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['sf_id'];?>
&ind=sf&pr=1&disc=1" target="_blank" >Распечатать</a></p>
              <?php }?>
            </div>
          </div>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div>
    </div>

    <style>
      .renters-list {
        width: unset;
        background: unset;
        cursor: default;
        box-shadow: unset;
      }
    </style>
 
<?php }?> 
<?php if ($_smarty_tpl->tpl_vars['error']->value) {?> 
  <div class="print-error">
    <div class="wrapper">
      <a href="#" class="close"></a>
      <div class="print-error-text">
        <p>К сожалению, за данный период нечего напечатать :(</p>
      </div>
    </div>  
  </div>
  <div class="black-wrapper"></div>
<?php }
}
}
