{strip}

  <div class="payments">
    <form id="payments" method='post' action=''>

      {if $payments_docs == false}
      <select name="sources" id="sources" name="renter_name" class="custom-select sources" placeholder="Выберите арендатора">
        {foreach from=$payments item=renter}
        <option name="renter_name" value="{$renter.full_name}">{$renter.full_name}</option>
        {/foreach}
      </select>
      {else}
        {foreach from=$payments_docs item=renter}
        <select name="sources" id="sources" name="renter_document" class="custom-select sources" placeholder="{$renter.full_name}">
        {break}
        {/foreach}
          {foreach from=$payments item=renter}
          <option name="renter_name" value="{$renter.full_name}">{$renter.full_name}</option>
          {/foreach}
        </select>
      {/if}

      {if $payments_docs}
          <select name="sources" id="sources" class="custom-select sources" placeholder="Выберите счёт">
            {foreach from=$payments_docs item=renter}
            <option name="renter_document" value="{$renter.number}">№ документа: {$renter.number}, Сумма: {$renter.rest}</option>
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
  </div>

{/strip}