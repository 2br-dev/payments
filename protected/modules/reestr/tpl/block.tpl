{strip}
<div style="padding-bottom: 100px">
<div style='width: 50%; margin: 0 auto; text-align: center;'>
  <button class="show-all">Показать все договора</button>
</div>
{foreach from=$renters item=renter}
  <div class='renters'>   
    <h2 class="renter">{$renter.short_name} — Баланс: 
     {if $renter.balance < 0}
     <span style="color: #d32f2f;"> {$renter.balance} ₽</span>
     {else}
     <span> {$renter.balance} ₽</span>
     {/if}
    </h2>
    <div class='renters-details'>
      <p><b>{$renter.full_name}</b></p>
      <p><b>ИНН:</b> {$renter.inn} / <b>КПП:</b> {$renter.kpp}</p>
      <p><b>ОГРН/ОГРНИП:</b> {$renter.ogrn}</p>
      <p><b>Юридический адрес:</b> {$renter.uridich_address}</p>
      <p><b>Почтовый адрес:</b> {$renter.post_adress}</p>
      <p><b>Телефон:</b> {$renter.phone}</p>
      <p><b>E-mail:</b> {$renter.email}</p>
      <p><b>Наименование банка:</b> {$renter.bank_name}</p>
      <p><b>БИК:</b> {$renter.bank_bik}</p>
      <p><b>Кор. счет:</b> {$renter.bank_ks}</p>
      <p><b>Расчетный счет:</b> {$renter.bank_rs}</p>
    </div>
    {foreach from=$reestr item=item}
    
      {if $item.short_name == $renter.short_name}
      <div class='renter-contract'>
        <div class='renter-contract-header' style="display: flex; justify-content: space-between; padding-right: 30px;">
          
          {if $item.end_date != ''}
            <p>{$item.contract_number} от {$item.datetime}</p>
          {else}
            <p>{$item.contract_number} от {$item.datetime} <i>(безсрочно)</i></p>
          {/if}

          {if $item.status == 0}
          <span style="color: #d32f2f">Завершенный</span>
          {elseif $item.status == 0.5}
          <span style="color: #ffa000">Действителен до: {$item.end_date}</span>
          {else}
          <span style="color: #2e7d32">Действующий</span>
          {/if}
        </div>
        <div class='renters-schet'>
          <p><b>Помещение:</b> {$item.room_number}</p>
          <p><b>Номер на схеме:</b> {$item.number_scheme}</p>
          <p><b>Площадь:</b> {$item.square}</p>
          <p><b>Сумма договора:</b> {$item.summa}</p>
          <p><b>Срок Аренды:</b> с {$item.start_date} по {$item.end_date}</p>
          <p><b>Размер пени:</b> {$item.peni}</p>
          <p><b>Аренда начисляется с:</b> {$item.start_date}</p>
        </div>
      </div>
      {/if}
    {/foreach}
  </div>
{/foreach}
</div>

<style>
  .show-all {
    background: #8eacbb;
    padding: 15px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    border: none;
    color: white;
    text-transform: uppercase;
    border-radius: 20px;
    width: 50%;
    margin: 0 auto;
    cursor: pointer;
  }
</style>

{/strip}