
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
})
// $.ajax({
//     type: "POST",
//     url: "find.php",
//     data: $('#search').serialize(),
//     success: function (result)
//     {
//         $('#display-books').html(result);
//     }

// })
