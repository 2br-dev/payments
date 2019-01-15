// преобразование число прописью 
function numberToString(_number, toUpper) {
  var toUpper = toUpper || false;
  var _arr_numbers = new Array();
  _arr_numbers[1] = new Array('', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять', 'десять', 'одиннадцать', 'двенадцать', 'тринадцать', 'четырнадцать', 'пятнадцать', 'шестнадцать', 'семнадцать', 'восемнадцать', 'девятнадцать');
  _arr_numbers[2] = new Array('', '', 'двадцать', 'тридцать', 'сорок', 'пятьдесят', 'шестьдесят', 'семьдесят', 'восемьдесят', 'девяносто');
  _arr_numbers[3] = new Array('', 'сто', 'двести', 'триста', 'четыреста', 'пятьсот', 'шестьсот', 'семьсот', 'восемьсот', 'девятьсот');
  function number_parser(_num, _desc) {
      var _string = '';
      var _num_hundred = '';
      if (_num.length == 3) {
          _num_hundred = _num.substr(0, 1);
          _num = _num.substr(1, 3);
          _string = _arr_numbers[3][_num_hundred] + ' ';
      }
      if (_num < 20) _string += _arr_numbers[1][parseFloat(_num)] + ' ';
      else {
          var _first_num = _num.substr(0, 1);
          var _second_num = _num.substr(1, 2);
          _string += _arr_numbers[2][_first_num] + ' ' + _arr_numbers[1][_second_num] + ' ';
      }        
      switch (_desc){
          case 0:
              if (_num.length == 2 && parseFloat(_num.substr(0,1)) == 1) {
                  _string += 'рублей';
                  break;
              }
              var _last_num = parseFloat(_num.substr(-1));
              if (_last_num == 1) _string += 'рубль';
              else if (_last_num > 1 && _last_num < 5) _string += 'рубля';
              else _string += 'рублей';
              break;
          case 1:
              _num = _num.replace(/^[0]{1,}$/g, '0');
              if (_num.length == 2 && parseFloat(_num.substr(0,1)) == 1) {
                  _string += 'тысяч ';
                  break;
              }
              var _last_num = parseFloat(_num.substr(-1));
              if (_last_num == 1) _string += 'тысяча ';
              else if (_last_num > 1 && _last_num < 5) _string += 'тысячи ';
              else if (parseFloat(_num) > 0) _string += 'тысяч ';
              _string = _string.replace('один ', 'одна ');
              _string = _string.replace('два ', 'две ');
              break;
          case 2:
              _num = _num.replace(/^[0]{1,}$/g, '0');
              if (_num.length == 2 && parseFloat(_num.substr(0,1)) == 1) {
                  _string += 'миллионов ';
                  break;
              }
              var _last_num = parseFloat(_num.substr(-1));
              if (_last_num == 1) _string += 'миллион ';
              else if (_last_num > 1 && _last_num < 5) _string += 'миллиона ';
              else if (parseFloat(_num) > 0) _string += 'миллионов ';
              break;
          case 3:
              _num = _num.replace(/^[0]{1,}$/g, '0');
              if (_num.length == 2 && parseFloat(_num.substr(0,1)) == 1) {
                  _string += 'миллиардов ';
                  break;
              }
              var _last_num = parseFloat(_num.substr(-1));
              if (_last_num == 1) _string += 'миллиард ';
              else if (_last_num > 1 && _last_num < 5) _string += 'миллиарда ';
              else if (parseFloat(_num) > 0) _string += 'миллиардов ';
              break;
      }
      return _string;
  }
  function decimals_parser(_num) {
      var _first_num = _num.substr(0, 1);
      var _second_num = parseFloat(_num.substr(1, 2));
      var _string = ' ' + _first_num + _second_num;
      if (_second_num == 1) _string += ' копейка';
      else if (_second_num > 1 && _second_num < 5) _string += ' копейки';
      else _string += ' копеек';
      return _string;
  }
  if (!_number || _number == 0) return false;
  if (typeof _number !== 'number') {
      _number = _number + '';
      _number = _number.replace(',', '.');
      _number = parseFloat(_number);
      if (isNaN(_number)) return false;
  }
  _number = _number.toFixed(2);
  if(_number.indexOf('.') != -1) {
      var _number_arr = _number.split('.');
      var _number = _number_arr[0];
      var _number_decimals = _number_arr[1];
  }
  var _number_length = _number.length;
  var _string = '';
  var _num_parser = '';
  var _count = 0;
  for (var _p = (_number_length - 1); _p >= 0; _p--) {
      var _num_digit = _number.substr(_p, 1);
      _num_parser = _num_digit +  _num_parser;
      if ((_num_parser.length == 3 || _p == 0) && !isNaN(parseFloat(_num_parser))) {
          _string = number_parser(_num_parser, _count) + _string;
          _num_parser = '';
          _count++;
      }
  }
  if (_number_decimals) _string += decimals_parser(_number_decimals);
  if (toUpper === true || toUpper == 'upper') {
      _string = _string.substr(0,1).toUpperCase() + _string.substr(1);
  }
  return _string.replace(/[\s]{1,}/g, ' ');
};

Number.prototype.numberToString = function(toUpper) {
  return numberToString(this, toUpper);
};
String.prototype.numberToString = function(toUpper) {
  return numberToString(this, toUpper);
};

function sortNumber(a,b) {
  return a - b;
}

$(document).ready(function() {  

  (function(){
    var period = 0;
    $(".period-credit").each(function() {
      period += parseInt($(this).html()); 
    }); 
    $(".final-credit").html(period.toFixed(2));
  
    var periodDebet = 0;
    $(".period-debet").each(function() {
      periodDebet += parseInt($(this).html());
    });
    $(".final-debet").html(periodDebet.toFixed(2));

    var finalSaldo = period - periodDebet;

    if (finalSaldo >= 0) {
      $(".final-saldo").html(finalSaldo.toFixed(2));
    } else {
      $(".saldo-minus").html((finalSaldo * -1).toFixed(2));
    }
    
    if (finalSaldo === 0) {
      $(".num2str").html('ноль рублей 00 копеек');
    } else if (finalSaldo > 0 && finalSaldo < 1) {
      $(".num2str").html(`ноль ${numberToString(finalSaldo)}`);
    } else {
      $(".num2str").html(numberToString(finalSaldo));
    }
  
  })();

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
    var allId = [];
    var allSum = [];
    $("input[name='renter']:checked").each(function() {
      allRenters.push($(this).val());
      allId.push($(this).data('id'));
      allSum.push($(this).data('sum'));
    });
    
    var allMonths = [];
    $("input[name='month']:checked").each(function() {
      allMonths.push($(this).val());
    });

    var index = 0;
    $("input[name='period_sum']:enabled").each(function() {
      if ($(this).val() == '') {
        index++;
      } else {
        allSum[index] = $(this).val();
        index++;
      }
    }); 

    allSum = allSum.map(function(sum) {
      return parseFloat(sum.replace(/,/g,'.')).toFixed(2);
    });

    var data = {
      year:               $("input[name='year']:checked").val(),
      month:              allMonths,
      renter:             allRenters,
      from_first:         $("input[name='from_first']:checked").val(),
      from_first_number:  $("input[type='number']").val(),
      date:               $("input[name='date']").val(),
      summa_id:           allId,
      period_sum:         allSum,
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
    if(data.month.length === 0) {
      $(".month-error").show();
    } 

    if (data.date && data.year && data.month.length != 0 && data.renter.length != 0) {
      $('.success-message').fadeIn(); 
      $('.black-wrapper').fadeIn();
      $("input[name='period_sum']").prop('disabled', true);         
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
  $("#payments .custom-select-wrapper:first-child span.custom-option.undefined").click(function() {
    var value = $(this).attr('data-value');
    var id = $(this).attr('data-id');
    localStorage.setItem("renter_name",value);
    localStorage.setItem("renter_id",id);
    window.location.href = `/oplaty?renter=${id}`;
  })

  $("#payments .custom-select-wrapper:nth-child(2) span.custom-option.undefined").click(function() {
    var value   = $(this).attr('data-value');
    var id      = $(this).data('id');
    var renter  = localStorage.getItem("renter_id");
    window.location.href = `/oplaty?renter=${renter}&id=${id}`;
    localStorage.setItem("id",id);
    localStorage.setItem("renter_document",value);
  })

  $('.show-all').click(function(e) {
    e.preventDefault();
    var url = window.location.href;
    
    if (window.location.href.indexOf('show') !== -1) {
      window.location.href = '/reestr-arendatorov';
    } else {
      window.location.href = url + '?show=show';
    }
    $(this).text('Показать только действующие');
  });

  $("#payments").submit(function(e){
    e.preventDefault();
    var self = this;

    var invoices = [];
    $("input[name='invoice_number']:checked").each(function() {
      invoices.push($(this).val());
    });
    invoices.sort(sortNumber);

    var data = {
      summa:              $("input[name='summa']").val(),
      date:               $("input[name='date']").val(),
      number:             $("input[name='document_number']").val(),
      renter_id:          localStorage.getItem("renter_id"),
      renter_name:        localStorage.getItem("renter_name"),
      renter_document:    localStorage.getItem("renter_document"),
      contract_id:        localStorage.getItem("id"),
      invoices:           invoices,
    };
    
    console.log(data);
 
    if(window.location.href.indexOf('&') != -1 && data.summa && data.date && data.number && data.renter_name && data.renter_document) {
      $('.success-message').fadeIn(); 
      $('.black-wrapper').fadeIn();  
      $.ajax({
        type: "POST",
        data: data,
        url: "/ajax/payment",
        success: function(res){
          console.log(res);
          self.reset();
          recountDate();
        },
        error: function(err) {
          console.log(err);
        }
      });
    } else {
      $('.error-message').fadeIn(); 
      $('.black-wrapper').fadeIn();
    }
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

    if (data.year) {     
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

$(".vystavlenie-schetov-hidden-btn").click(function() {
  $(".vystavlenie-schetov-hidden").slideToggle();
})

$(".close").click(function() {
  $(".print-error").fadeOut();
  $(".black-wrapper").fadeOut();
  $(".success-message").fadeOut();
  $(".error-message").fadeOut();
})

$("input[name='period_sum']").click(function() {
  $(this).val('');
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
$( ".renter-contract-header" ).click(function() {
  $(this).siblings('.renters-schet').slideToggle();
});
$( ".renters-list-link" ).click(function() {
  $(this).siblings('.documents-block-renter').slideToggle();
});
$( ".documents-block-renter p").click(function() {
  var url = $(this).children('a').attr('href');
  var win = window.open(url, '_blank');
  win.focus();
})

var colorOrig = $(".documents-block-renter p").css('color');
$(".documents-block-renter p").hover(
function() {
    //mouse over
    $(this).css('color','white');
    $(this).children('.documents-block-renter a').css('color','white');
}, function() {
    //mouse out
    $(this).css('color', colorOrig);
    $(this).children('.documents-block-renter a').css('color', colorOrig);
});

// позволяет вводить частичную сумму только для отмеченных договоров, во избежании ошибок скрипта
$("input[name='period_sum']").prop('disabled', true);
$("input[name='renter']").click(function() {
  var makeEnabled = $(this).data('id');
  
  if ( $(this).prop('checked') ) {
    $(`input[name='period_sum'][data-id=${makeEnabled}]`).prop('disabled', false);
  } else {
    $(`input[name='period_sum'][data-id=${makeEnabled}]`).prop('disabled', true);
  }
})

$(".error-msg .close").click(function() {
  $('.error-msg').slideToggle();
})

// custom select
$(".custom-select").each(function() {
  var classes = $(this).attr("class"),
      id      = $(this).attr("id"),
      name    = $(this).attr("name");
  var template =  '<div class="' + classes + '">';
      template += '<span class="custom-select-trigger" style="margin-top: 5px;">' + $(this).attr("placeholder") + '</span>';
      template += '<div class="custom-options">';
      $(this).find("option").each(function() {
        template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '" data-id="' + $(this).attr("data-id") + '">' + $(this).html() + '</span>';
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

$(".renters-list-delete").click(function() {

  var data = {
    invoice:  $(this).data('invoice'),
    number:   $(this).data('contract'),
  }
  console.log(data);

  $.ajax({
    type: "POST",
    url: "/ajax/delete",
    data: data,
    success: function(res){
      console.log(res);
    },
    error: function(err) {
      console.log(err);
    }
  });

  setTimeout(function() { 
    location.reload(); 
  }, 1200);
  
})

$('.as-hidden').css("display", "none");

if ($('input[name="dates"]').length) {
  
  $('input[name="dates"]').daterangepicker({
    autoUpdateInput: false,
    locale: {
      cancelLabel: 'Clear'
    }
  });
}

$('input[name="dates"]').click(function() {
    if ( $('.as-hidden').css('display') == 'block'){
      $(".as-hidden").slideToggle();
    }
});

if (document.getElementById('as-normal') !== null) {
  var asNormalHref = document.getElementById('as-normal').href;
  var asPrintHref = document.getElementById('as-print').href;
}

$('.renter-invoices-dates').css('display', 'none');

$('select').on('change', function() {
  if ($('input[name="dates"]').val() !== '') {
    $(".as-hidden").slideToggle();
  }
  $('.renter-invoices-dates').css('display', 'block');
});

var currentHref = window.location.pathname;
$('select[name="renters"]').on('change', function() {
  var idFromOption = $('select[name="renters"]').val();
  window.location.href = `${currentHref}?id=${idFromOption}`;
});

$('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
  $(this).val(picker.startDate.format('MM.DD.YYYY') + ' - ' + picker.endDate.format('MM.DD.YYYY'));
  
  if ($("select[name='contracts']").val() !== null) {
    $(".as-hidden").slideToggle();
  }

  var contractId = $("select[name='contracts']").val();
  var startDate = picker.startDate.format('DD.MM.YYYY');
  var endDate = picker.endDate.format('DD.MM.YYYY');
  var asNormalHrefDone = `${asNormalHref}&start=${startDate}&end=${endDate}&id=${contractId}`;
  var asPrintHrefDone = `${asPrintHref}&start=${startDate}&end=${endDate}&id=${contractId}`;
  document.getElementById('as-normal').href = asNormalHrefDone;
  document.getElementById('as-print').href = asPrintHrefDone;
  //$('input[name="dates"]').prop('disabled', true);
});

$('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
  $(this).val('');
});

(function() {
  if(window.location.pathname === '/reestr-arendatorov') {
    $('.renters').each(function() {
      if ( $( this ).children( ".renter-contract" ).length > 0) {
        return;
      } else {
        $(this).hide();
      }
    });
  } 
})();