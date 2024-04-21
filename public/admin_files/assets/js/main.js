

  $(function() {
	"use strict";

  $(".btn-toggle").click(function () {
    $("body").hasClass("toggled") ? ($("body").removeClass("toggled"), $(".mini-sidebar").unbind("hover")) : ($("body").addClass("toggled"), $(".mini-sidebar").hover(function () {
      $("body").addClass("sidebar-hovered")
    }, function () {
      $("body").removeClass("sidebar-hovered")
    }))
  })
  /* scrollar */

    new PerfectScrollbar(".quick-menu")

    new PerfectScrollbar(".notify-list")

    new PerfectScrollbar(".search-content")

    

    // new PerfectScrollbar(".mega-menu-widgets")
    



    /* Light & Dark Mode */

    $("[theme-change]").on("click", function () {
      var theme = $(this).attr('theme-change');
      $("html").attr("data-bs-theme", theme);
    }),

    /* search control */

    $(".search-control").click(function(){
      $(".search-popup").addClass("d-block");
      $(".search-close").addClass("d-block");
    });


    $(".search-close").click(function(){
      $(".search-popup").removeClass("d-block");
      $(".search-close").removeClass("d-block");
    });

    
    $(".mobile-search-btn").click(function(){
      $(".search-popup").addClass("d-block");
    });


    $(".mobile-search-close").click(function(){
      $(".search-popup").removeClass("d-block");
    });


  /* sidenav */
    
  $(function () {
    $('#sidenav').metisMenu();
  });

 

/* menu active */

  $(function() {
    for (var e = window.location, o = $(".metismenu li a").filter(function() {
        return this.href == e
      }).addClass("").parent().addClass("mm-active"); o.is("li");) o = o.parent("").addClass("mm-show").parent("").addClass("mm-active")
  });
  


});










