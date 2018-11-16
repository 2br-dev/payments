{strip}
{foreach from=$reestr item=renter}
  <div class='renters'>
    <h2 class="renter">{$renter.short_name}</h2>
    <div class='renters-details'>
      <p><b>{$renter.full_name}</b></p>
      <p><b>ИНН:</b> {$renter.inn} / <b>КПП:</b> {$renter.kpp}</p>
      <p><b>ОГРН/ОГРНИП:</b> {$renter.ogrn}</p>
      <p><b>Юридический адрес:</b> {$renter.uridich_adress}</p>
      <p><b>Почтовый адрес:</b> {$renter.short_name}</p>
      <p><b>Телефон:</b> {$renter.phone}</p>
      <p><b>E-mail:</b> {$renter.email}</p>
      <p><b>Наименование банка:</b> {$renter.bank_name}</p>
      <p><b>БИК:</b> {$renter.bank_bik}</p>
      <p><b>Кор. счет:</b> {$renter.bank_ks}</p>
      <p><b>Расчетный счет:</b> {$renter.bank_rs}</p>
    </div>
    {foreach from=$contract item=cont}
      {if $cont.renter == $renter.id}
        {foreach from=$rooms item=room}
          {if $cont.rooms == $room.id && $cont.status == 1}
            <div class='renter-contract'>
              <p>{$cont.number} от {$cont.datetime}</p>
              <div class='renters-schet'>
                <p><b>Помещение:</b> {$room.number}</p>
                <p><b>Номер на схеме:</b> {$room.number_scheme}</p>
                <p><b>Площадь:</b> {$room.square}</p>
                <p><b>Сумма договора:</b> {$cont.summa}</p>
                <p><b>Срок Аренды:</b> с {$cont.start_date} по {$cont.end_date}</p>
                <p><b>Размер пени:</b> {$cont.peni}</p>
                <p><b>Аренда начисляется с:</b> {$cont.start_date}</p>
              </div>
            </div>
          {/if}
        {/foreach}
      {/if}
    {/foreach}
  </div>
{/foreach}
{/strip}