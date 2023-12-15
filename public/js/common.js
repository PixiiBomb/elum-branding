$(function() {

    let $result = $('#result');
    let token = $('meta[name="csrf-token"]').attr('content');

    function post(form)
    {
        let url = form.attr("action");

        $.ajax({
            url: url,
            type: 'POST',
            data: new FormData(form),
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': token
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
    }

});
