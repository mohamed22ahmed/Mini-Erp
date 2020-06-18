"use strict";

/***** Nav btn  ****/
(function () {
  "use strict";

  var treeviewMenu = $('.app-menu'); // Toggle Sidebar

  $('[data-toggle="sidebar"]').click(function (event) {
    event.preventDefault();
    $('body').toggleClass('sidenav-toggled');

    if ($('body').hasClass('sidenav-toggled')) {
      $('.app-sidebar').fadeOut(300);
      $('.main-div').removeClass('col-xl-10 col-lg-9 col-md-8 ml-auto').addClass('col-xl-11 col-lg-10 col-md-9 ml-5');
      $('body').addClass('sidenav-toggled55');
    } else if ($('body').hasClass('sidenav-toggled55')) {
      $('.app-sidebar').fadeIn(300);
      $('.main-div').addClass('col-xl-10 col-lg-9 col-md-8 ml-auto ').removeClass('col-xl-11 col-lg-10 col-md-9 ml-5');
      $('body').removeClass('sidenav-toggled55');
    }
    /** Arabic  */


    if ($('body').hasClass('sidenav-toggled')) {
      $('.app-sidebar').fadeOut(300);
      $('.main-div1').removeClass('col-xl-10 col-lg-9 col-md-8 mr-auto').addClass('col-xl-11 col-lg-10 col-md-9 mr-5');
      $('body').addClass('sidenav-toggled66');
    } else if ($('body').hasClass('sidenav-toggled66')) {
      $('.app-sidebar').fadeIn(300);
      $('.main-div1').addClass('col-xl-10 col-lg-9 col-md-8 mr-auto ').removeClass('col-xl-11 col-lg-10 col-md-9 mr-5');
      $('body').removeClass('sidenav-toggled66');
    }
  }); // Activate sidebar treeview toggle

  $("[data-toggle='treeview']").click(function (event) {
    event.preventDefault();

    if (!$(this).parent().hasClass('is-expanded')) {
      treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
    }

    $(this).parent().toggleClass('is-expanded');
  }); // Set initial active toggle

  $("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded'); //Activate bootstrip tooltips

  $("[data-toggle='tooltip']").tooltip();
})();