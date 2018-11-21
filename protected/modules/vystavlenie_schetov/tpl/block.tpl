{strip}
  <div class="vystavlenie-schetov">
    <form id="vystavlenie-schetov" method="POST" action="/ajax/write">
      <div class="vystavlenie-schetov-date">
        <p class="date-error">Выберите дату:</p>
        <input type="date" name="date" value="2018-01-01">
      </div>
      <hr style="margin-bottom: 40px">
      <p class="error renter-error">Выберите одного или более арендодателей:</p>
      {foreach from=$renters item=renter}
      <div class="vystavlenie-schetov-item">
        <label class="container-checkbox">{$renter.full_name} - {$renter.contract_number}
          <input type="checkbox" name="renter" value="{$renter.renter_id}">
          <span class="checkmark"></span>
        </label>
      </div>
      {/foreach}
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
          <label class="container-radio" >Июнь
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
      <label class="container-checkbox">Начать нумерацию с 1
        <input type="checkbox" name="from_first">
        <span class="checkmark"></span>
      </label>
      <input type="submit" value="Отправить">
    </form>
  </div>
{/strip}

