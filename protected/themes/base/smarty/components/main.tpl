{strip}

  {if $uri[0] == ''}

    {* классы для главной страницы *} 
    {if isset($_sitemenu.main) nocache}
    <div class="navigation navigation-main">
      {foreach $_sitemenu.main as $e}
      <div>
        <a href="/{$e.system}" class="srv-{$e.system}">{$e.name}</a>
      </div>
      <hr>    
      {/foreach}
      <div class='logout-btn'><a href='logout.php'>Выйти</a></div>

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
    </div>
    <div class='logout-btn-web'>
      <p>Вы вошли как: {$smarty.session.login}</p>
      <a href='logout.php'>Выйти</a>
    </div>         
    {/if}

  {/if}

  {if $smarty.session.admin == "false"}

  <style>
    .navigation {
      display: none;
    }
    .renters-header {
      margin-top: 75px;
    }
  </style>

  {if $uri[0] == ''}
    <script>
      window.location = "/pechat-aktov-schetov";
    </script>
  {/if}

  {/if}
{/strip}