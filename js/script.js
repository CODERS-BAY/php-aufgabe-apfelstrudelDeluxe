$(document).ready(function() {

    console.log("test");

    // $('#alterMyTeam').submit(function(event) {
    //     event.preventDefault();
    //     console.log("klick");
    // });

    // $('#alterMyTeam').click(function() {
    //     console.log("geklickt");
    // });

    $('#teamMates').submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'index_teamMates.php',
            data: $(this).serialize(),
            success: function(data){
                $('#yourTeamMates').html(data);
            }
        })
    });



});