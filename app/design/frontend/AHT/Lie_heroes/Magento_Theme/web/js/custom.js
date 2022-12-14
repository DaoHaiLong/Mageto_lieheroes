require(['jquery', 'slick',
    'mage/accordion'
], function($) {
    $("#accordion").accordion({
        active: "",
        collapsible: true,
        openedState: "close",
        multipleCollapsible: true
    });
    $("#accordion2").accordion({
        active: "0",
        collapsible: true,
        openedState: "active",
        multipleCollapsible: true
    });
    $("#accordion3").accordion({
        active: "",
        collapsible: true,
        openedState: "close",
        multipleCollapsible: true
    });
    $("#accordion4").accordion({
        active: "",
        collapsible: true,
        openedState: "close",
        multipleCollapsible: true
    });
    $("#accordion5").accordion({
        active: "",
        collapsible: true,
        openedState: "close",
        multipleCollapsible: true
    });
    $("#accordion6").accordion({
        active: "",
        collapsible: true,
        openedState: "close",
        multipleCollapsible: true
    });

    $("ul.links ").click(function() {
        $(".links li").slideToggle();
        $("ul ul").css("display", "none");
        $(".ul.links .on").toggleClass("on");
    });
    $('.switcher-dropdown li').click(function() {
        console.log($(this).text())
        var abs = $(this).text()
        $('.image-option').hide();
        $('#' + abs).show()
    })

    $(".block-viewed-products-grid .product-items").slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [{
                breakpoint: 1280,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

});