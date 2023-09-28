

$(document).ready(function(){
    $('#carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        items: 1,
        responsive:{
            0:{
                
            },
            600:{

            },
            1000:{

            }
        }
    })
});



//Modal Form Add Product


$('.apply_job').click(function(event){
    event.preventDefault();

    var job = $(this).attr('job');
    alert(job);
});


