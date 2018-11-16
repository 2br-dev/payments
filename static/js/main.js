$(document).ready(function() { 

  $("#authorization").submit(function(e){
    e.preventDefault();
    var self = this;

    var data = {
      password: $(this.password).val(),
      login: $(this.login).val(),
    };
    
    $.ajax({
        type: "POST",
        url: "/login.php",
        data: data,
        success: function(res){
          var response = res.slice(0,4);
          
          if (response === 'fail') {
            $( ".form-input" ).addClass( "invalid" );
            $( '.error' ).fadeIn();
          } else {
            window.location.href = 'http://authorization.local/';
          }
          self.reset();
        },
        error: function(err) {
          window.location.href = 'http://authorization.local/';
        }
    });
  });

  $( ".form-input" ).click(function() {
    $( ".form-input" ).removeClass( "invalid" );
    $( '.error' ).fadeOut();
  });

});

$( ".renter" ).click(function() {
  $(this).siblings('.renters-details').slideToggle();
});
$( ".renter-contract p" ).click(function() {
  $(this).siblings('.renters-schet').slideToggle();
});