//import {post} from "./common";

$(function() {

    let $conversation = $('#conversation');
    let $result = $('#result');

    $('form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr("action"),
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                $result.html('Loading...');
            },
            success: function(request) {
                $result.html(`<b>GOOD JOB</b><br>${request}`);
            },
            error: function(xhr, status, error) {
                $result.html(`<b>ERROR</b><br>${xhr.responseText}`);
            }
        });

    });

});

