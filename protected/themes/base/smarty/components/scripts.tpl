{strip}
{* type   = 'inline' *}
{compress
    attr   = 'data-no-instant'
    mode   = 'js'
    source = [
        [ 'file' => '/js/vendor.min.js' ],
        [ 'file' => '/js/app.min.js' ]
    ]
}


  <script type="text/javascript" src="/static/js/jquery.min.js"></script>
  {if $uri[0] == 'pechat-aktov-schetov'}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  {/if}
  <script type="text/javascript" src="/static/js/main.js"></script>



</body>
</html>
{/strip}