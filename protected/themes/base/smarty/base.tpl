{strip}

{include file="./components/meta.tpl"}
{include file="./components/main.tpl"}

{if isset($_sitemenu.main) nocache}
  
  {foreach $_sitemenu.main as $e}
    {if $uri[0] == $e.system}
      <div>
        <h1 class='renters-header'>{$e.name}</h1>
      </div> 
    {/if}
  {/foreach} 
        
{/if}

{$_page.content}

{include file="./components/scripts.tpl"}

{/strip}