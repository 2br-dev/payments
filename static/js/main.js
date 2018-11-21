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
            window.location.href = '/';
          }
          self.reset();
        },
        error: function(err) {
          window.location.href = '/';
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
    var allRentersId = [];
    $("input[name='renter_id']").each(function() {
      allRentersId.push($(this).val());
    });

    var data = {
      year:         $("input[name='year']:checked").val(),
      month:        $("input[name='month']:checked").val(),
      renter:       allRenters,
      from_first:   $("input[name='from_first']:checked").val(),
      date:         $("input[name='date']").val(),
      renter_id:    allRentersId,
    };
    
    console.log(data);
    //валидация
    if(data.renter.length === 0) {
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
  
  // этот кусочек кода создает "видимость get-запроса", 
  //такой сложный селектор для того чтобы не срабатывал скрипт на другие инпуты, а только на первый.
  $("#payments div:first-child span.custom-option.undefined").click(function() {
    var value = $(this).attr('data-value');
    window.location.href = `/oplaty?renter=${value}`;
  })

  $("#payments").submit(function(e){
    e.preventDefault();
    var self = this;

    var data = {
      summa:       $("input[name='summa']").val(),
      date:       $("input[name='date']").val(),
      number:     $("input[name='document_number']").val(),
      renter_name:       $("option[name='renter_name']:checked").val(),
      renter_document:     $("option[name='renter_document']:checked").val()
    };
    
    console.log(data);
 
      $.ajax({
        type: "POST",
        data: data,
        url: "/ajax/payment",
        success: function(res){
          console.log(res);
          self.reset();
        },
        error: function(err) {
          console.log(err);
        }
      });
  }); 

  /// cабмит для печать счетов
  $("#pechat-schetov").submit(function(e){
    //e.preventDefault();

    var data = {
      year:         $("input[name='year']:checked").val(),
      month:        $("input[name='month']:checked").val(),
    };
    
    //валидация
    if(!data.year) {
      e.preventDefault();
      $(".year-error").show();
    } 
    if(!data.month) {
      e.preventDefault();
      $(".month-error").show();
    } 

    if (data.year && data.month) {     
      $.ajax({
        type: "POST",
        data: data,
        success: function(res){
          console.log(res);

          $('.renters-list').show();
          self.reset();
        },
        error: function(err) {
          console.log(err);
        }
      });
    }
  
  }); 

});


$(".close").click(function() {
  $(".print-error").fadeOut();
  $(".black-wrapper").fadeOut();
})

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
      template += '<span class="custom-select-trigger" style="margin-top: 5px;">' + $(this).attr("placeholder") + '</span>';
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