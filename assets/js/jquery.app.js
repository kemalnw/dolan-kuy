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
function getCustomerInfo(uid) {
  $.getJSON(base_url+"ajax/getCustomerInfo/"+uid+"/", function(resp){
      $("#uid").val(uid);
      $("#nama_depan").val(resp.nama_depan);
      $("#nama_belakang").val(resp.nama_belakang);
      $("#hp").val(resp.hp);
      $("#email").val(resp.email);
      $("#alamat").val(resp.alamat);
  });
}
function getArmadaInfo(id) {
  $.getJSON(base_url+"ajax/getArmadaInfo/"+id+"/", function(resp){
      $("#id").val(id);
      $("#nama_armada").val(resp.nama_armada);
      $("#kota option[value='"+resp.kota+"']").attr("selected","selected");
      $("#price").val(resp.harga_sewa);
      $("select#editstatus option[value='"+resp.status+"']").attr("selected","selected");
      $("#desc").val(resp.desc);
  });
}

function __load() {
    jQuery.fn.exists = function(){ return this.length > 0; }
    $(".select2").select2();
    $('.input-daterange').datepicker({
                                        todayBtn: 'linked',
                                        format: 'dd-mm-yyyy',
                                        startDate: '+0d',
                                        endDate: '+2m',
                                        autoclose: true
                                    });
    if($("#datatable").exists()) {
      $('#datatable').dataTable();
    }
    $("#login").click(function(){
      $("#signup").hide();
      $("#signin").show();
    });
    $("#daftar").click(function(){
      $("#signin").hide();
      $("#signup").show();
    });

}
$(__load);
$(document).on('pjax:success', __load);