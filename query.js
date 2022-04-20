
$('#allbooks').click(function (e)
{
    e.preventDefault();
    $.get('allbooks.php', function (data)
    {
        $('#display-books').html(data);
    })
    $('#display-books').show('slow')
})

$('#webdevBooks').click(function (e)
{
    e.preventDefault();
    $.get('webdevelopment.php', function (data)
    {
        $('#display-books').html(data);
    })
    $('#display-books').slideDown('slow')

})
$('#fiction').click(function (e)
{

    $.get('fiction.php', function (data)
    {
        $('#display-books').html(data);
    })
    $('#display-books').slideDown('slow')
});


$(".hero-slider .owl-nav .hero-slider .owl-dots").appendTo('.slider-nav');

$('.product-slider').owlCarousel({
    loop: true,
    nav: true,
    dots: false,
    margin: 30,
    autoplay: true,
    navText: ['<i class="flaticon-left-arrow-1"></i>', '<i class="flaticon-right-arrow-1"></i>'],
    responsive: {
        0: {
            items: 1,
        },
        480: {
            items: 2,
        },
        768: {
            items: 3,
        },
        1200: {
            items: 4,
        }
    }
});

// $.ajax({
//     type: "POST",
//     url: "find.php",
//     data: $('#search').serialize(),
//     success: function (result)
//     {
//         $('#display-books').html(result);
//     }

// })
