/**
* Theme: Adminto Admin Template
* Author: Coderthemes
* Module/App: Main Js
*/


!function($) {
    "use strict";

    var Navbar = function() {};

    //navbar - topbar
    Navbar.prototype.init = function () {
      //toggle
      $('.navbar-toggle').on('click', function (event) {
        $(this).toggleClass('open');
        $('#navigation').slideToggle(400);
        $('.cart, .search').removeClass('open');
      });

      $('.navigation-menu>li').slice(-1).addClass('last-elements');

      $('.navigation-menu li.has-submenu a[href="#"]').on('click', function (e) {
        if ($(window).width() < 992) {
          e.preventDefault();
          $(this).parent('li').toggleClass('open').find('.submenu:first').toggleClass('open');
        }
      });

      $(".right-bar-toggle").click(function(){
        $(".right-bar").toggle();
        $('.wrapper').toggleClass('right-bar-enabled');
      });

        $(".navigation-menu a").each(function () {
            if (this.href == window.location.href) {
                $(this).parent().addClass("active"); // add active to li of the current link
                $(this).parent().parent().parent().addClass("active"); // add active class to an anchor
                $(this).parent().parent().parent().parent().parent().addClass("active"); // add active class to an anchor
            }
        });
    },
    //init
    $.Navbar = new Navbar, $.Navbar.Constructor = Navbar
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.Navbar.init()
}(window.jQuery);



sessionStorage['pjax'] = true;
$.pjax.defaults.timeout = 20000;
$(document).pjax('a[data-pjax]');
$(document).on('submit', 'form[data-pjax]', function(event) {event.preventDefault(); $.pjax.submit(event)});
function __load() {
    $(".select2").select2();
    $('.input-daterange').datepicker({
                                        todayBtn: 'linked',
                                        format: 'dd/mm/yyyy',
                                        startDate: '+0d',
                                        endDate: '+2m',
                                        autoclose: true
                                    });

    $('#datatable').dataTable();





    function showTooltip(x, y, contents) {
      $('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css({
        position : 'absolute',
        top : y + 5,
        left : x + 5
      }).appendTo("body").fadeIn(200);
    }

    var selector = "#website-stats";
    var data1 = [[0, 9], [1, 8], [2, 5], [3, 8], [4, 5], [5, 14], [6, 10]];
    var labels = ["Sewa"];
    var colors = ['#188ae2'];
    var borderColor = '#f5f5f5';
    var bgColor = '#fff';

    $.plot($(selector), [{
      data : data1,
      label : labels,
      color : colors
    }], {
      series : {
        lines : {
          show : true,
          fill : true,
          lineWidth : 2,
          fillColor : {
            colors : [{
              opacity : 0.4
            }, {
              opacity : 0.4
            }]
          }
        },
        points : {
          show : false
        },
        shadowSize : 0
      },

      grid : {
        hoverable : true,
        clickable : true,
        borderColor : borderColor,
        tickColor : "#f9f9f9",
        borderWidth : 1,
        labelMargin : 10,
        backgroundColor : bgColor
      },
      legend : {
        position : "ne",
        margin : [0, -24],
        noColumns : 0,
        labelBoxBorderColor : null,
        labelFormatter : function(label, series) {
          // just add some space to labes
          return '' + label + '&nbsp;&nbsp;';
        },
        width : 30,
        height : 2
      },
      yaxis : {
        tickColor : '#f5f5f5',
        font : {
          color : '#bdbdbd'
        }
      },
      xaxis : {
        tickColor : '#f5f5f5',
        font : {
          color : '#bdbdbd'
        }
      },
      tooltip : true,
      tooltipOpts : {
        content : '%s: Value of %x is %y',
        shifts : {
          x : -60,
          y : 25
        },
        defaultTheme : false
      }
    });
}
$(__load);
$(document).on('pjax:success', __load);