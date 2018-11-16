{strip}

  <div class="payments">
    <form id="payments">
      <select name="sources" id="sources" class="custom-select sources" placeholder="Выберите арендатора">
        {foreach from=$payments item=renter}
        <option value="{$renter.full_name}">{$renter.full_name}</option>
        {/foreach}
      </select>
      <p class="payments-data"><b>Данные платежа</b></p>
      <label for="sum">Сумма платежа:</label>
      <input type="number" id="sum">
      <label for="date">Дата платежа:</label>
      <input type="date" id="date">
      <label for="number">Номер платежа:</label>
      <input type="number" id="number">
      <button type="submit">Отправить</button>
    </form>  
  </div>

{/strip}