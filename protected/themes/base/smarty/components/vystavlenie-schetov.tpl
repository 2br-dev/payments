{strip}
  {if isset($_sitemenu.main) nocache}
    {foreach $_sitemenu.main as $e}
    {if $uri[0] == $e.system}
    <div>
      <h1>{$e.name}</h1>
    </div>    
    {/if}
    {/foreach}       
  {/if}
{/strip}