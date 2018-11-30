{strip}

<div>
{foreach from=$renters item=renter}
  <div class='renters'>
    <h2 class="renter">{$renter.short_name} — Баланс: {$renter.balance} ₽</h2>
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
        <p class='renter-contract-header'>{$item.contract_number} от {$item.datetime}</p>
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

{/strip}