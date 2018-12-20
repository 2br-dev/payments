{if $smarty.session.admin == 'true'}
  <div class="vystavlenie-schetov pechat-schetov">
    <select style="margin-top: 10px; padding: 8px 10px; border: 1px solid lightgray; border-radius: 5px;" name="renters">
      {if $smarty.get.id}
        {foreach from=$renters item=renter}
          {if $renter.id != $smarty.get.id}
          {continue}
          {else}
          <option selected disabled hidden>{$renter.short_name}</option>
          {/if}
        {/foreach}
        <option class="select-renter" value="0">Все арендаторы</option>   
      {else}
      <option selected class="select-renter" value="0">Все арендаторы</option>  
      {/if}        
      {foreach from=$renters item=renter}
      <option class="select-renter" value="{$renter.id}">{$renter.short_name}</option>
      {/foreach}
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
  {if $inv}
    <div class="renters-list">
      <div class='pechat-schetov-result'>
        <h2 class='pechat-schetov-result-header'>{$year} {$month}</h2>
      </div>
      {foreach from=$inv item=i}	
      <div class="renters-list-item">
        <div class="renters-list-container">
          <a data-arendator="{$i.renter_id}" class="renters-list-link">
            <p>{$i.renter_name}, № счёта: {$i.invoice_number}, на сумму: {$i.invoice_summa}</p>
          </a>
          <span data-invoice="{$i.invoice_number}" data-contract="{$i.document_number}" class="renters-list-delete">удалить<span class="renters-list-delete-img"></span></span>
        </div>
        <hr>
        <div class="documents-block" data-block="{$i.renter_id}">
          {if $i.disc == 0}
          <div class="without-print">
            <a href="/schet-pechatnaya-forma?num={$i.invoice_number}&ind=sch&pr=0&disc=0" target="_blank" >Счет</a>
            <a href="/schet-pechatnaya-forma?num={$i.akt_id}&ind=akt&pr=0&disc=0" target="_blank" >Акт</a>
            <a href="/schet-pechatnaya-forma?num={$i.sf_id}&ind=sf&pr=0&disc=0" target="_blank" >Счет-фактура</a>
          </div>
          <div class="with-print">
            <a href="/schet-pechatnaya-forma?num={$i.invoice_number}&ind=sch&pr=1&disc=0" target="_blank" >Счет+печать</a>
            <a href="/schet-pechatnaya-forma?num={$i.akt_id}&ind=akt&pr=1&disc=0" target="_blank" >Акт+печать</a>
            <a href="/schet-pechatnaya-forma?num={$i.sf_id}&ind=sf&pr=1&disc=0" target="_blank" >Счет-фактура+печать</a>
          </div>
          {else}
          <div class="with-discount">
            <a href="/schet-pechatnaya-forma?num={$i.invoice_number}&ind=sch&pr=0&disc=1" target="_blank" >Счет (со скидкой)</a>
            <a href="/schet-pechatnaya-forma?num={$i.akt_id}&ind=akt&pr=0&disc=1" target="_blank" >Акт (со скидкой)</a>
            <a href="/schet-pechatnaya-forma?num={$i.sf_id}&ind=sf&pr=0&disc=1" target="_blank" >Счет-фактура (со скидкой)</a>
          </div>
          <div class="with-discount">
            <a href="/schet-pechatnaya-forma?num={$i.invoice_number}&ind=sch&pr=1&disc=1" target="_blank" >Счет (со скидкой)+печать</a>
            <a href="/schet-pechatnaya-forma?num={$i.akt_id}&ind=akt&pr=1&disc=1" target="_blank" >Акт (со скидкой)+печать</a>
            <a href="/schet-pechatnaya-forma?num={$i.sf_id}&ind=sf&pr=1&disc=1" target="_blank" >Счет-фактура (со скидкой)+печать</a>
          </div>
          {/if}
        </div>
      </div>
      {/foreach}
    </div>
  {/if}
{/if}

{if $smarty.session.admin == "false"} {* // if not admin *}

    <div class="renters-list">
      <div class='pechat-schetov-result'>

        {foreach from=$allinvoices item=i}
          <h2 class='pechat-schetov-result-header'>{$i.renter_name}</h2>
          {break}
        {/foreach}

        <table class="invoice-table">
        <tr style="text-align: left">
          <th>N% Договора</th>
          <th style="width: 20%; text-align: center">На сумму</th>
        </tr>
        {foreach from=$contracts item=contract}
          <tr>
            <td style="text-align: left"><b>{$contract.number}</b> на период: <i>{$contract.start_date} - {$contract.end_date}</i></td>
            <td class="invoice_summa">{$contract.summa}</td> 
          </tr>
        {/foreach}
        </table>
      </div>

    <div class="renters-invoices" style="margin-top: 20px;">
      <div style="display: flex; justify-content: flex-start; align-items: baseline;">
        <h2 style="margin-bottom: 10px; margin-left: 10px; margin-top: 10px;">Акт сверки </h2>
        <div> 
          <select style="margin-right: 5px; padding: 8px 10px; border: 1px solid lightgray; border-radius: 5px;" name="contracts">
            <option selected disabled hidden>Выберите договор</option>          
            {foreach from=$contracts item=item}
            <option class="select-contract" value="{$item.id}">№ {$item.number}, от {$item.datetime}</option>
            {/foreach}
          </select>
        </div>
        <div class="renter-invoices-dates"> 
          <label class="hide" for="dates" style="margin-right: 10px;">Выберите период</label>
          <input style="margin-right: 45px; padding: 8px 10px; border: 1px solid lightgray; border-radius: 5px;" type="text" name="dates" value="" />
        </div>
      </div>
      <hr style="margin-left: 30px" class="as-hidden">    
          <div class="renters-list-item">
            <div class="documents-block documents-block-renter as-hidden" data-block="{$i.renter_id}">
              {foreach from=$allinvoices item=contract}	
              <p>Акт сверки <a id="as-normal" href="/schet-pechatnaya-forma?con={$contract.renter_id}&ind=as&pr=0" target="_blank" >Распечатать</a></p>
               {break}
              {/foreach}
              {foreach from=$allinvoices item=contract}	
                <p>Акт сверки + печать<a id="as-print" href="/schet-pechatnaya-forma?con={$contract.renter_id}&ind=as&pr=1" target="_blank" >Распечатать</a></p>
               {break}
              {/foreach}
            </div>
          </div>
    </div>

      {if $peni} 
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
      {foreach from=$peni item=i}	
          <div class="renters-list-item">
            <p class="renters-list-link">Пени №: {$i.peni_invoice} за {$i.month}, {$i.year}, на сумму: {$i.peni} (просрочка на: {$i.delay} дней)</p>
            <hr>
            <div class="documents-block documents-block-renter" data-block="{$i.renter_id}">
              <p>Счет <a href="/schet-pechatnaya-forma?num={$i.peni_invoice}&ind=sch&pr=0&disc=0&peni=1" target="_blank" >Распечатать</a></p>
              <p>Акт <a href="/schet-pechatnaya-forma?num={$i.akt_id}&ind=akt&pr=0&disc=0&peni=1" target="_blank" >Распечатать</a></p>
              <p>Счет-фактура <a href="/schet-pechatnaya-forma?num={$i.sf_id}&ind=sf&pr=0&disc=0&peni=1" target="_blank" >Распечатать</a></p>
              <p>Счет+печать <a href="/schet-pechatnaya-forma?num={$i.peni_invoice}&ind=sch&pr=1&disc=0&peni=1" target="_blank" >Распечатать</a></p>
              <p>Акт+печать <a href="/schet-pechatnaya-forma?num={$i.akt_id}&ind=akt&pr=1&disc=0&peni=1" target="_blank" >Распечатать</a></p>
              <p>Счет-фактура+печать <a href="/schet-pechatnaya-forma?num={$i.sf_id}&ind=sf&pr=1&disc=0&peni=1" target="_blank" >Распечатать</a></p>
            </div>
          </div>
      {/foreach}
      </div> {/if}

      <div class="renters-invoices">
      <h2>Все выставленные счета</h2>
      {foreach from=$allinvoices item=i}	
          <div class="renters-list-item">
            <p class="renters-list-link">№ счёта: {$i.invoice_number} за {$i.month}, {$i.year}, на сумму: {$i.invoice_summa}</p>
            <hr>
            <div class="documents-block documents-block-renter" data-block="{$i.renter_id}">
              {if $i.discount == 0}
              <p>Счет <a href="/schet-pechatnaya-forma?num={$i.invoice_number}&ind=sch&pr=0&disc=0" target="_blank" >Распечатать</a></p>
              <p>Акт <a href="/schet-pechatnaya-forma?num={$i.akt_id}&ind=akt&pr=0&disc=0" target="_blank" >Распечатать</a></p>
              <p>Счет-фактура <a href="/schet-pechatnaya-forma?num={$i.sf_id}&ind=sf&pr=0&disc=0" target="_blank" >Распечатать</a></p>
              <p>Счет+печать <a href="/schet-pechatnaya-forma?num={$i.invoice_number}&ind=sch&pr=1&disc=0" target="_blank" >Распечатать</a></p>
              <p>Акт+печать <a href="/schet-pechatnaya-forma?num={$i.akt_id}&ind=akt&pr=1&disc=0" target="_blank" >Распечатать</a></p>
              <p>Счет-фактура+печать <a href="/schet-pechatnaya-forma?num={$i.sf_id}&ind=sf&pr=1&disc=0" target="_blank" >Распечатать</a></p>
              {else}
              <p>Счет <a href="/schet-pechatnaya-forma?num={$i.invoice_number}&ind=sch&pr=0&disc=1" target="_blank" >Распечатать</a></p>
              <p>Акт <a href="/schet-pechatnaya-forma?num={$i.akt_id}&ind=akt&pr=0&disc=1" target="_blank" >Распечатать</a></p>
              <p>Счет-фактура <a href="/schet-pechatnaya-forma?num={$i.sf_id}&ind=sf&pr=0&disc=1" target="_blank" >Распечатать</a></p>
              <p>Счет+печать <a href="/schet-pechatnaya-forma?num={$i.invoice_number}&ind=sch&pr=1&disc=1" target="_blank" >Распечатать</a></p>
              <p>Акт+печать <a href="/schet-pechatnaya-forma?num={$i.akt_id}&ind=akt&pr=1&disc=1" target="_blank" >Распечатать</a></p>
              <p>Счет-фактура+печать <a href="/schet-pechatnaya-forma?num={$i.sf_id}&ind=sf&pr=1&disc=1" target="_blank" >Распечатать</a></p>
              {/if}
            </div>
          </div>
      {/foreach}
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
 
 




{/if} {* end noadmin  *}

{*  error  *}
{if $error} 
  <div class="print-error">
    <div class="wrapper">
      <div class="close"></div>
      <div class="print-error-text">
        <p>К сожалению, за данный период нечего напечатать :(</p>
      </div>
    </div>  
  </div>
  <div class="black-wrapper"></div>
{/if}