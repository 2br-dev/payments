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


// custom select
$(".custom-select").each(function() {
  var classes = $(this).attr("class"),
      id      = $(this).attr("id"),
      name    = $(this).attr("name");
  var template =  '<div class="' + classes + '">';
      template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
      template += '<div class="custom-options">';
      $(this).find("option").each(function() {
        template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
      });
  template += '</div></div>';
  
  $(this).wrap('<div class="custom-select-wrapper"></div>');
  $(this).hide();
  $(this).after(template);
});
$(".custom-option:first-of-type").hover(function() {
  $(this).parents(".custom-options").addClass("option-hover");
}, function() {
  $(this).parents(".custom-options").removeClass("option-hover");
});
$(".custom-select-trigger").on("click", function() {
  $('html').one('click',function() {
    $(".custom-select").removeClass("opened");
  });
  $(this).parents(".custom-select").toggleClass("opened");
  event.stopPropagation();
});
$(".custom-option").on("click", function() {
  $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
  $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
  $(this).addClass("selection");
  $(this).parents(".custom-select").removeClass("opened");
  $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
});