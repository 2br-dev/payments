{strip}

{foreach from=$reestr item=renter}
  <div class='renters'>
    <h2 class="renter">{$renter.short_name}</h2>
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
    <div class='renter-contract'>
      <p class='renter-contract-header'>{$renter.contract_number} от {$renter.datetime}</p>
      <div class='renters-schet'>
        <p><b>Помещение:</b> {$renter.room_number}</p>
        <p><b>Номер на схеме:</b> {$renter.number_scheme}</p>
        <p><b>Площадь:</b> {$renter.square}</p>
        <p><b>Сумма договора:</b> {$renter.summa}</p>
        <p><b>Срок Аренды:</b> с {$renter.start_date} по {$renter.end_date}</p>
        <p><b>Размер пени:</b> {$renter.peni}</p>
        <p><b>Аренда начисляется с:</b> {$renter.start_date}</p>
      </div>
    </div>
  </div>
{/foreach}

{/strip}