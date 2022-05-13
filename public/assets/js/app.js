$(document).ready(function(){
    // HERO SLİDER
    $('#hero-slider').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        items:1,
        rtl:false,
        smartSpeed:1500,
        navText: ["PREV","NEXT"],
        responsive:{
            0:{
                // items:1
                nav:false,
            },
            768:{
                // items:3
                nav:true
            }
        }           
        
    })

    // PROJECT SLİDER
    $('#project-slider').owlCarousel({
        loop:true,
        margin:0,
        nav:false,
        dots:true,
        rtl:false,
        margin:24,
        smartSpeed:1000,
        autoplay: true,
        autoplayTimeout: 4000,
        responsive:{
            0:{
                items:1,
                margin:0,
            },
            768:{
                items:2,
                margin:2,              
            },
            1140:{
                items:2,
                center:true,
                
            }
        }           
        
    })
    // REVİEWS
    $('#reviews-slider').owlCarousel({
        loop:true,
        margin:10,
        nav:false,
        dots:true,
        smartSpeed:2000,
        items:1, 
        autoplay: true,
        autoplayTimeout: 4000,
        
        
    })
})



