$(document).ready(function () {

    $('body').on('click', '#show-user', function () {
        var userURL = $(this).data('url');
        $.get(userURL, function (data) {
            $('#userShowModal').modal('show');
            $('#users-id').text(data.id);
            $('#users-name').text(data.name);
            $('#users-email').text(data.email);
            if (data.is_admin) {
                $('#users-is_admin').text('Admin');
            } else {
                $('#users-is_admin').text('Officer');
            }
        })
    });
});
$(document).ready(function () {

    $(document).on('click', '.editbtn', function () {

        var users_id = $(this).val();
        // alert(users_id);
        $('#editModel').modal('show');

        $.ajax({
            type: "GET",
            url: "/edit-user/" + users_id,
            success: function (response) {
                // console.log(response.users.name);
                $('#user-name').val(response.users.name);
                $('#user-email').val(response.users.email);
                $('#users_id').val(users_id);
            }
        })
    });
});


