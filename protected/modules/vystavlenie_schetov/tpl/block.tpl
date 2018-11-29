{strip}
  <div class="vystavlenie-schetov">
    <form id="vystavlenie-schetov" method="POST" action="/ajax/write">
      <div class="vystavlenie-schetov-date">
        <p class="date-error">Выберите дату:</p>
        <input type="date" name="date" value="2018-01-01" id="date">
      </div>
      <hr style="margin-bottom: 40px">
      <p class="error renter-error">Выберите одного или более арендодателей:</p>

      <p><b style="font-size: 18px">Действующие договора:</p></b>
      {foreach from=$renters item=renter}
        {if $renter.status == 1}
        <div class="vystavlenie-schetov-item">
          <label class="container-checkbox" style="width: 80%">{$renter.short_name} - {$renter.contract_number}
            <input type="checkbox" name="renter" data-sum="{$renter.summa}" data-id="{$renter.contract_id}" value="{$renter.renter_id}">
            <span class="checkmark"></span>
          </label>
           <label class="period-sum" for="period_sum">сумма по договору: <i>{$renter.summa}</i></label><br>
            <input type="text" data-id="{$renter.contract_id}" name="period_sum" style="width: 130px; color: gray; border: none; border-bottom: 1px solid; padding-left: 5px;">
        </div>
        {/if}
      {/foreach}
      <p class="vystavlenie-schetov-hidden-btn">Показать недействующие договора</p>
      <div class="vystavlenie-schetov-hidden">
        {foreach from=$renters item=renter}
          {if $renter.status == 0}
          <div class="vystavlenie-schetov-item">
            <label class="container-checkbox" style="width: 80%">{$renter.short_name} - {$renter.contract_number}
              <input type="checkbox" name="renter" data-sum="{$renter.summa}" data-id="{$renter.contract_id}" value="{$renter.renter_id}">
              <span class="checkmark"></span>
            </label>
            <label class="period-sum" for="period_sum">сумма по договору: <i>{$renter.summa}</i></label><br>
            <input type="text" data-id="{$renter.contract_id}" name="period_sum" style="width: 130px; color: gray; border: none; border-bottom: 1px solid; padding-left: 5px;">
          </div>
          {/if}
        {/foreach}
      </div>
      <p style="display: inline">Год</p><span class="error year-error">Выберите год:</span>
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
      <p style="display: inline">Месяц</p><span class="error month-error">Выберите месяц:</span>
      <div class="vystavlenie-schetov-month">
        <span>
          <label class="container-checkbox">Январь
            <input name="month" type="checkbox" value="Январь">
            <span class="checkmark"></span>
          </label>
          <label class="container-checkbox">Май
            <input name="month" type="checkbox" value="Май">
            <span class="checkmark"></span>
          </label>
          <label class="container-checkbox">Сентябрь
            <input name="month" type="checkbox" value="Сентябрь">
            <span class="checkmark"></span>
          </label>
        </span>
        <span>
          <label class="container-checkbox">Февраль
            <input name="month" type="checkbox" value="Февраль">
            <span class="checkmark"></span>
          </label>
          <label class="container-checkbox" >Июнь
            <input name="month" type="checkbox" value="Июнь">
            <span class="checkmark"></span>
          </label>
          <label class="container-checkbox">Октябрь
            <input name="month" type="checkbox" value="Октябрь">
            <span class="checkmark"></span>
          </label>                    
        </span>
        <span>
          <label class="container-checkbox">Март
            <input name="month" type="checkbox" value="Март">
            <span class="checkmark"></span>
          </label>
          <label class="container-checkbox">Июль
            <input name="month" type="checkbox" value="Июль">
            <span class="checkmark"></span>
          </label>
          <label class="container-checkbox">Ноябрь
            <input name="month" type="checkbox" value="Ноябрь">
            <span class="checkmark"></span>
          </label>                    
        </span>
        <span>
          <label class="container-checkbox">Апрель
            <input name="month" type="checkbox" value="Апрель">
            <span class="checkmark"></span>
          </label>
          <label class="container-checkbox">Август
            <input name="month" type="checkbox" value="Август">
            <span class="checkmark"></span>
          </label>
          <label class="container-checkbox">Декабрь
            <input name="month" type="checkbox" value="Декабрь">
            <span class="checkmark"></span>
          </label>                    
        </span>
      </div>
      <hr>
      <label class="container-checkbox">Начать нумерацию с 1
        <input type="checkbox" name="from_first">
        <span class="checkmark"></span>
      </label>
      <input type="submit" value="Отправить">
    </form>
    
    <div class="success-message">
      <div class="close"></div>
      <p>Счёт выставлен успешно.</p>
    </div>
    <div class="black-wrapper"></div>
  </div>

  <script>
  var d = new Date();
  var date = d.getDate();
  var month = d.getMonth() + 1;
  var year = d.getFullYear();
  var x = year + "-" + month + "-" + date;
  document.getElementById('date').value = x;
  </script>
{/strip}

