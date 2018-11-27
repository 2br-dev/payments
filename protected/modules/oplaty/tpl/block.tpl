{strip}

  <div class="payments">
    <form id="payments" method='post' action=''>

      {if $payments_docs == false}
      <select name="sources" id="sources" name="renter_name" class="custom-select sources" placeholder="Выберите арендатора">
        {foreach from=$payments item=renter}
        <option name="renter_name" value="{$renter.full_name}">{$renter.short_name}</option>
        {/foreach}
      </select>
      {else}
        {foreach from=$payments_docs item=renter}
        <select name="sources" id="sources" name="renter_document" class="custom-select sources" placeholder="{$renter.short_name}">
        {break}
        {/foreach}
          {foreach from=$payments item=renter}
          <option name="renter_name" value="{$renter.full_name}">{$renter.short_name}</option>
          {/foreach}
        </select>
      {/if}

      {if $payments_docs}
          <select name="sources" id="sources" class="custom-select sources" placeholder="Выберите счёт">
            {foreach from=$payments_docs item=renter}
              {if $renter.status != 0}
              <option name="renter_document" data-id="{$renter.id}" value="{$renter.number}">{$renter.period_year}, {$renter.period_month}, № документа: {$renter.number}, Сумма: {$renter.rest}</option>
              {/if}
            {/foreach}
          </select>
      {/if}

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

{/strip}