$( document ).ready(function() {

    $(".owl-one").owlCarousel({
        loop:false,
        items:1,
        margin:25,
        autoHeight:true,
        nav:true,
        navText:['<i class="fas fa-chevron-left"></i>','<i class="fas fa-chevron-right"></i>'],
    });

    $('.owl-two').owlCarousel({
        loop:true,
        margin:130,
        nav:false,
        responsive:{
            1500:{
                items:6
            },
            1300:{
                items:5
            },
            1000:{
                items:3
            },
            600:{
                items:2
            },
            0:{
                items:2
            },
        }
    });

    $('.owl-three').owlCarousel({
        loop:true,
        margin:80,
        nav:false,
        responsive:{
            1500:{
                items:3
            },
            1000:{
                items:2
            },
            900:{
                items:1
            },
            0:{
                items:1
            },
        }
    });

    $(window).scroll(function (event) {
        var scroll = $(window).scrollTop();
        if(scroll >= 50){
            $(".navigation").addClass("fixed");
            $('.mobilemenucontent').removeClass('active');
        }

        if(scroll <= 50){
            $(".navigation").removeClass("fixed");
        }
    });

    $(document).on('click','.btnContent',function(e){
        
        var elem = $(this);
        var href = elem.attr('href');
        var more = elem.attr('data-more');
        var content = $('.viewMore[data-more="'+more+'"]');

        if(href == '#'){
            e.preventDefault();

            elem.toggleClass('open');

            if(elem.hasClass('open')){
                elem.html('Fermer -');
            }else{
                elem.html('En savoir +')
            }

            content.slideToggle();
        }

    });

    $('.linknav').on('click', function(e){
        e.preventDefault();
        
        var button = $(this);
        var nav = button.attr('data-nav');
   
        $('html, body').stop().animate({
            scrollTop: ($(nav).offset().top - 80)
        }, 1500); 
        
    });

    $('.faqs').accordion({
        heightStyle: "content",
        active: false,
        collapsible: true
    });

    $('.fa-bars').on('click', function(e){
        e.preventDefault();
        $('.mobilemenucontent').toggleClass('active');
    });


});

