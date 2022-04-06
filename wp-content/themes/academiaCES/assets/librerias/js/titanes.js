jQuery(function($) {
    $(document).ready(function() {
        $(".carusel-destacados").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 1000,
            arrows: true,
            dots: false,
            pauseOnHover: true,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    },
                },
                {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });



    });

    $(function() {
        $('[data-toggle="popover"]').popover({ html: true });
    });

    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });

    $(".pop-menu .menu-item-has-children a").hover(function() {
        $(".pop-menu .menu-item-has-children ul").toggleClass("mostrar");
    });

    /* aparecer el menu dropdown shop on hover */
    $(".menu-item-has-children").on("mouseover", function() {
        $(this).find(".dropdown-menu").css({ height: "160px" });
        $(this).on("mouseleave", function() {
            $(this).find(".dropdown-menu").css({ height: "0" });
        });
    });


    $(window).scroll(function() {
        if ($(document).scrollTop() > 100) {
            $("#masthead").addClass("position-relative");
            $("#masthead").removeClass("position-relative");
            $("#masthead").addClass("bg-white");
        } else {
            $("#masthead").removeClass("position-relative");
            $("#masthead").addClass("position-relative");


        }
    });

});