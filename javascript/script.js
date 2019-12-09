$(document).ready(function() {
    if (sessionStorage.getItem('openedTab') === null) {
        sessionStorage.setItem('openedTab','editor');
    }

    $('#test').click(function() {
        $.get('./text.txt', function(data, status) {
            $('#sampleP').html(data);
            alert(status);
        });
    });
});