console.log('index.js executed');

$('#ajaxLauncher').on('click', function () {
    $.ajax({url: './ajax.php'}).then(function(data) {
        $('#content').html(data.html);
        // $('#ajaxLauncher').remove();
    });
});
