{strip}

  {if $uri[0] == ''}

    {if isset($_sitemenu.main) nocache}
    <div class="navigation navigation-main">
      {foreach $_sitemenu.main as $e}
      <div>
        <a href="/{$e.system}" class="srv-{$e.system}">{$e.name}</a>
      </div>
      <hr>    
      {/foreach}
      <div class='logout-btn'><h1><a href='logout.php'>Выйти</a></h1></div> 
    </div>        
    {/if}

  {else}

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

  {/if}
{/strip}