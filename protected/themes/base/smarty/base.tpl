{strip}
{include file="./components/meta.tpl"}

{include file="./components/main.tpl"}


{if $uri[0] == 'reestr-arendatorov'}
{include file="./components/reestr-arendatorov.tpl"}
{/if}

{if $uri[0] == 'vystavlenie-schetov-za-arendu'}
{include file="./components/vystavlenie-schetov.tpl"}
{/if}

{if $uri[0] == 'pechat-aktov-schetov'}
{include file="./components/pechat-aktov.tpl"}
{/if}

{if $uri[0] == 'oplaty'}
{include file="./components/oplaty.tpl"}
{/if}

{$_page.content}

{include file="./components/scripts.tpl"}
{/strip}