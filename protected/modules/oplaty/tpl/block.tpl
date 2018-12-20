{strip}

  <div class="payments">
    <form id="payments" method='post' action=''>

    <select name="sources" id="sources" name="renter_name" class="custom-select sources" 
      {if $contracts}
        {foreach from=$contracts item=ren}
        placeholder='{$ren.short_name}'
        {break}
        {/foreach}
      {else}
        placeholder="Выберите арендатора"
      {/if}
        >
      {foreach from=$renters item=renter}
        <option name="renter_id" data-id="{$renter.id}" value="{$renter.full_name}">{$renter.short_name}</option>
        
      {/foreach}
    </select>
     
    {if $contracts}
      <select name="sources" id="sources" class="custom-select sources" 
        {if $invoices}
          {foreach from=$contracts item=num}
            {if $smarty.get.id != $num.id} 
              {continue}
              {else}
              placeholder="№: {$num.number}, от {$num.datetime}, <i>на сумму: {$num.summa}</i>, {if $contract.status == 0} завершенный {else} действующий {/if}"
              {break}
            {/if}
          {/foreach}
        {else}
          placeholder="Выберите договор"
        {/if}
        >
        {foreach from=$contracts item=contract}
            <option name="renter_document" data-id="{$contract.id}" value="{$contract.number}">
              №: {$contract.number}, от {$contract.datetime}, <i>на сумму: {$contract.summa}</i>, 
              {if $contract.status == 0} завершенный
                {else} действующий
              {/if}
            </option>
        {/foreach}
      </select>
    {/if}

    {if $invoices}
      <a id="helper"></a>
      {foreach from=$invoices item=invoice}
      <label class="container-checkbox" style="margin-bottom: 0">{$invoice.period_month}, {$invoice.period_year}, остаток по счёту: <b>{$invoice.rest}</b>
        <input name="invoice_number" type="checkbox" value="{$invoice.invoice_number}">
        <span class="checkmark"></span>
      </label>
      {/foreach}
       
    {/if}
    <p id="error-empty">За данный период нет выставленных счетов.</p>  

      <p class="payments-data"><b>Данные платежа</b></p>
      <label for="sum">Сумма платежа:</label>
      <input type="text" id="sum" name="summa">
      <label for="date">Дата платежа:</label>
      <input type="date" id="date" name="date">
      <label for="number">Номер платежа:</label>
      <input type="text" id="number" name="document_number">
      <button type="submit">Отправить</button>
    </form>
    <div class="success-message">
      <div class="close"></div>
      <p>Успех.</p>
    </div>
    <div class="error-message">
      <div class="close"></div>
      <p>Заполните все поля.</p>
    </div>
    <div class="black-wrapper"></div>  
  </div>

  <script>
    function recountDate() {
      var elem = document.getElementById("helper");
      var form = document.getElementById("payments").contains(elem);
      var url = window.location.href.split('=');
      if (form || url.length != 3) {
        document.getElementById("error-empty").style.display = 'none';
      } else {
        document.getElementById("error-empty").style.display = 'block';
      }
        
      var d = new Date();
      var date = d.getDate();
      var month = d.getMonth() + 1;
      var year = d.getFullYear();
      if (date < 10) {
        date = '0' + date;
      }
      if (month < 10) {
        month = '0' + month;
      }
      var x = year + "-" + month + "-" + date;
      document.getElementById('date').value = x;
    }
    recountDate();
  </script>

{/strip}