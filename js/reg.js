console.log(jQuery().jquery);

$('#reg-form').on('submit', function (e) {
    e.preventDefault();
    var $form = $(this);
    $.ajax({
        type: 'POST',
        url: './reg_ajax.php',
        data: $form.serialize()
    }).done(function () {
        $form[0].reset()
        console.log($form);
        alert('Thank you for registration!')
    }).fail(function () {
        console.log($form);
        alert('Something went wrong')

    });
});