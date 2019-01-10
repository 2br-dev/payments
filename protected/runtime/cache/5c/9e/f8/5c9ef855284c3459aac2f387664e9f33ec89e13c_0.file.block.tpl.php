<?php
/* Smarty version 3.1.32, created on 2019-01-10 12:48:45
  from 'C:\OpenServer\domains\authorization.local\protected\modules\pechat_schetov\tpl\block.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5c3714fded1e11_69194763',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c9ef855284c3459aac2f387664e9f33ec89e13c' => 
    array (
      0 => 'C:\\OpenServer\\domains\\authorization.local\\protected\\modules\\pechat_schetov\\tpl\\block.tpl',
      1 => 1545299781,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c3714fded1e11_69194763 (Smarty_Internal_Template $_smarty_tpl) {
if ($_SESSION['admin'] == 'true') {?>
  <div class="vystavlenie-schetov pechat-schetov">
    <select style="margin-top: 10px; padding: 8px 10px; border: 1px solid lightgray; border-radius: 5px;" name="renters">
      <?php if ($_GET['id']) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['renters']->value, 'renter');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['renter']->value) {
?>
          <?php if ($_smarty_tpl->tpl_vars['renter']->value['id'] != $_GET['id']) {?>
          <?php continue 1;?>
          <?php } else { ?>
          <option selected disabled hidden><?php echo $_smarty_tpl->tpl_vars['renter']->value['short_name'];?>
</option>
          <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <option class="select-renter" value="0">Все арендаторы</option>   
      <?php } else { ?>
      <option selected class="select-renter" value="0">Все арендаторы</option>  
      <?php }?>        
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['renters']->value, 'renter');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['renter']->value) {
?>
      <option class="select-renter" value="<?php echo $_smarty_tpl->tpl_vars['renter']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['renter']->value['short_name'];?>
</option>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>    
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
      <input type="submit" value="Показать">
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
" data-contract="<?php echo $_smarty_tpl->tpl_vars['i']->value['document_number'];?>
" class="renters-list-delete">удалить<span class="renters-list-delete-img"></span></span>
        </div>
        <hr>
        <div class="documents-block" data-block="<?php echo $_smarty_tpl->tpl_vars['i']->value['renter_id'];?>
">
          <?php if ($_smarty_tpl->tpl_vars['i']->value['disc'] == 0) {?>
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
          <?php } else { ?>
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
          <?php }?>
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

    <div class="renters-invoices" style="margin-top: 20px;">
      <div style="display: flex; justify-content: flex-start; align-items: baseline;">
        <h2 style="margin-bottom: 10px; margin-left: 10px; margin-top: 10px;">Акт сверки </h2>
        <div> 
          <select style="margin-right: 5px; padding: 8px 10px; border: 1px solid lightgray; border-radius: 5px;" name="contracts">
            <option selected disabled hidden>Выберите договор</option>          
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contracts']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
            <option class="select-contract" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">№ <?php echo $_smarty_tpl->tpl_vars['item']->value['number'];?>
, от <?php echo $_smarty_tpl->tpl_vars['item']->value['datetime'];?>
</option>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </select>
        </div>
        <div class="renter-invoices-dates"> 
          <label class="hide" for="dates" style="margin-right: 10px;">Выберите период</label>
          <input style="margin-right: 45px; padding: 8px 10px; border: 1px solid lightgray; border-radius: 5px;" type="text" name="dates" value="" />
        </div>
      </div>
      <hr style="margin-left: 30px" class="as-hidden">    
          <div class="renters-list-item">
            <div class="documents-block documents-block-renter as-hidden" data-block="<?php echo $_smarty_tpl->tpl_vars['i']->value['renter_id'];?>
">
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allinvoices']->value, 'contract');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contract']->value) {
?>	
              <p>Акт сверки <a id="as-normal" href="/schet-pechatnaya-forma?con=<?php echo $_smarty_tpl->tpl_vars['contract']->value['renter_id'];?>
&ind=as&pr=0" target="_blank" >Распечатать</a></p>
               <?php break 1;?>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allinvoices']->value, 'contract');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contract']->value) {
?>	
                <p>Акт сверки + печать<a id="as-print" href="/schet-pechatnaya-forma?con=<?php echo $_smarty_tpl->tpl_vars['contract']->value['renter_id'];?>
&ind=as&pr=1" target="_blank" >Распечатать</a></p>
               <?php break 1;?>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
          </div>
    </div>

      <?php if ($_smarty_tpl->tpl_vars['peni']->value) {?> 
      <div class="error-msg">      
        <img src="/img/warning_white_48x48.png" alt="">
        <div class="error-msg-text">
          <p><strong>Внимание!</strong></p>
          <p>У вас есть неоплаченные пени. <br> Следующее поступление денежных средств на счёт, будет покрывать неоплаченные пени.</p>
        </div>
        <div class="close"></div>
      </div>

      <div class="renters-invoices">
      <h2>Все пени</h2>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['peni']->value, 'i');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value) {
?>	
          <div class="renters-list-item">
            <p class="renters-list-link">Пени №: <?php echo $_smarty_tpl->tpl_vars['i']->value['peni_invoice'];?>
 за <?php echo $_smarty_tpl->tpl_vars['i']->value['month'];?>
, <?php echo $_smarty_tpl->tpl_vars['i']->value['year'];?>
, на сумму: <?php echo $_smarty_tpl->tpl_vars['i']->value['peni'];?>
 (просрочка на: <?php echo $_smarty_tpl->tpl_vars['i']->value['delay'];?>
 дней)</p>
            <hr>
            <div class="documents-block documents-block-renter" data-block="<?php echo $_smarty_tpl->tpl_vars['i']->value['renter_id'];?>
">
              <p>Счет <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['peni_invoice'];?>
&ind=sch&pr=0&disc=0&peni=1" target="_blank" >Распечатать</a></p>
              <p>Акт <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['akt_id'];?>
&ind=akt&pr=0&disc=0&peni=1" target="_blank" >Распечатать</a></p>
              <p>Счет-фактура <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['sf_id'];?>
&ind=sf&pr=0&disc=0&peni=1" target="_blank" >Распечатать</a></p>
              <p>Счет+печать <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['peni_invoice'];?>
&ind=sch&pr=1&disc=0&peni=1" target="_blank" >Распечатать</a></p>
              <p>Акт+печать <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['akt_id'];?>
&ind=akt&pr=1&disc=0&peni=1" target="_blank" >Распечатать</a></p>
              <p>Счет-фактура+печать <a href="/schet-pechatnaya-forma?num=<?php echo $_smarty_tpl->tpl_vars['i']->value['sf_id'];?>
&ind=sf&pr=1&disc=0&peni=1" target="_blank" >Распечатать</a></p>
            </div>
          </div>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div> <?php }?>

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
      <div class="close"></div>
      <div class="print-error-text">
        <p>К сожалению, за данный период нечего напечатать :(</p>
      </div>
    </div>  
  </div>
  <div class="black-wrapper"></div>
<?php }
}
}
