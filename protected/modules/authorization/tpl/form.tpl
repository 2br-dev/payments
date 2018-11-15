{strip}
  {if isset($smarty.session.user)}
    <div class="auth-user">
      <p><strong>Дата регистрации:</strong> {$smarty.session.user.created}</p>
    </div>
  {else}
    <form action="/auth/auth.php" method="post">
        <label for="login">Login:</label>
        <input id="login" type="text" name="login" required/>
        <label for="password">Password:</label>
        <input id="password" type="password" name="password" required/>
        <input type="submit" value="Login" />
        <input type="hidden" name="_backuri" value="{$_backuri}">
    </form>

    <style>
      form {
        display: flex;
        flex-direction: column;
        width: 500px;
        margin: 100px auto 0;
      }
    </style>
  {/if}
{/strip}