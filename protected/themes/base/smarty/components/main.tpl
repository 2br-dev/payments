{strip}

	{if isset($_sitemenu.main) nocache}
  <div class="navigation">
    {foreach $_sitemenu.main as $e}
    <div>
      <a href="/{$e.system}" class="srv-{$e.system}">{$e.name}</a>
    </div>    
    {/foreach}
    <div class='logout-btn'><h1><a href='logout.php'>Выйти</a></h1></div> 
  </div>        
  {/if}


{/strip}