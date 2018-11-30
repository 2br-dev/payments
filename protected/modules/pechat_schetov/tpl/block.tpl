{if $smarty.session.admin == 'true'}
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
          <span data-invoice="{$i.invoice_number}" class="renters-list-delete">удалить<span class="renters-list-delete-img"></span></span>
        </div>
        <hr>
        <div class="documents-block" data-block="{$i.renter_id}">
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
          <th>N% Документа</th>
          <th>Сумма к оплате</th> 
          <th>Задолженность</th>
          <th style="text-align: center">Статус</th>
        </tr>
        {foreach from=$allinvoices item=i}
          <tr>
            <td style="text-align: left"><b>{$i.document_number}</b> - <i>{$i.month}, {$i.year}</i></td>
            <td style="text-align: left" class="invoice_summa">{$i.invoice_summa}</td> 
            <td style="text-align: left" class="invoice_rest">{$i.invoice_rest}</td>
            {if $i.status == 1}
              <td>Действующий</td>
              {else}
              <td>Завершенный</td>
            {/if}
          </tr>
        {/foreach}
        <tr>
          <td></td>
          <td style="text-align: left"><b>Итого:</b> <i id="period_sum"></i></td> 
          <td style="text-align: left"><b>Итого:</b> <i id="debet_sum"></i></td>
          <td></td>
        </tr>  
        </table>
      </div>
    {foreach from=$allinvoices item=i}	
          <div class="renters-list-item">
            <a href="#" data-arendator = "{$i.renter_id}" class="renters-list-link"><p style="word-spacing: 10px;">{$i.document_number} - {$i.month}, {$i.year}</p></a>
            <hr>
            <div class="documents-block" data-block="{$i.renter_id}">
                <a href="/schet-pechatnaya-forma?num={$i.akt_id}&ind=akt&pr=0&disc=0" target="_blank" >Акт</a>
                <a href="/schet-pechatnaya-forma?num={$i.akt_id}&ind=akt&pr=1&disc=0" target="_blank" >Акт+печать</a>
            </div>
          </div>
    {/foreach}
    </div>

    <script>
      var x = document.getElementsByClassName("invoice_summa");
      var y = document.getElementsByClassName("invoice_rest");
      var periodSum = 0;
      var periodRest = 0;
      for (var i = 0; i< x.length; i++) {
        periodSum += +(x[i].innerHTML);
      }
      for (var i = 0; i< y.length; i++) {
        periodRest += +(y[i].innerHTML);
      }
      document.getElementById('period_sum').innerHTML = periodSum;
      document.getElementById('debet_sum').innerHTML = periodRest;
    </script>
 
{/if} {* end noadmin  *}

{*  error  *}
{if $error} 
  <div class="print-error">
    <div class="wrapper">
      <a href="#" class="close"></a>
      <div class="print-error-text">
        <p>К сожалению, за данный период нечего напечатать :(</p>
      </div>
    </div>  
  </div>
  <div class="black-wrapper"></div>
{/if}