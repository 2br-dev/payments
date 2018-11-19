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
        url: "/ajax/login",
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

  $("#vystavlenie-schetov").submit(function(e){
    e.preventDefault();
    var self = this;

    var allRenters = [];
    $("input[name='renter']:checked").each(function() {
      allRenters.push($(this).val());
    });

    var data = {
      year:     $("input[name='year']:checked").val(),
      month:    $("input[name='month']:checked").val(),
      renter:   allRenters,
      first:    $("input[name='from-first']:checked").val(),
      date:     $("input[name='date']").val(),
    };
    
    console.log(data);
    //валидация
    if(!data.renter) {
      $(".renter-error").show(); 
    } 
    if(!data.date) {
      $(".date-error").addClass('error');
    } 
    if(!data.year) {
      $(".year-error").show();
    } 
    if(!data.month) {
      $(".month-error").show();
    } 

    if (data.date && data.year && data.month && data.renter) {
                 
      $.ajax({
        type: "POST",
        url: "/ajax/write",
        data: data,
        success: function(res){
          console.log(res);
          self.reset();
        },
        error: function(err) {
          console.log(err);
        }
      });
    }
  
  }); 

});


$("input[name='year']").click(function() {
  $(".year-error").hide();
});
$("input[name='month']").click(function() {
  $(".month-error").hide();
});
$("input[name='renter']").click(function() {
  $(".renter-error").hide();
});
$("input[name='date']").click(function() {
  $(".date-error").removeClass('error');
});
$( ".form-input" ).click(function() {
  $( ".form-input" ).removeClass( "invalid" );
  $( '.error' ).fadeOut();
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