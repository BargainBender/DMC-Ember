$(document).ready(function() {

    // Set default opened tab
    if (sessionStorage.getItem('openedTab') === null) {
        sessionStorage.setItem('openedTab','editor');
    }

    $('#test').click(function() {
        $.get('./text.txt', function(data, status) {
            $('#sampleP').html(data);
            alert(status);
        });
    });

    $(document).on('click','.student-info', function(el) {
        //let student_id = el.target.dataset.fullName;
        console.log('works!')
        
    });

});