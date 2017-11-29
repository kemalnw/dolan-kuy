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

$(".select2").select2();
$('.input-daterange').datepicker({
                                    todayBtn: 'linked',
                                    format: 'dd/mm/yyyy',
                                    startDate: '+0d',
                                    endDate: '+2m',
                                    autoclose: true
                                });
$("form#ajax_load").submit(function (e) {
            e.preventDefault();
            var k_data = $(this).serialize();
            var k_url = $(this).attr('action');
            $.ajax({
                    url: k_url,
                    data: k_data,
                    timeout: false,
                    type: 'POST',
                    dataType: 'JSON',
                    success: function (resp) {
                        if (resp.success) {
                            $('#result').html('<div class="alert alert-success clearfix" align="center" role="alert">'+resp.msg+'</div>');
                            if (resp.redirect) {
                            window.location.replace(resp.redirect);
                            }
                        } else {
                            $('#result').html('<div class="alert alert-danger clearfix" align="center" role="alert">'+resp.msg+'</div>');
                        }
                    }, error: function (a, b, c) {
                        $('#result').html('<div class="alert alert-danger clearfix" role="alert">'+c+'</div>');
                    }
            });
            return false;
        });