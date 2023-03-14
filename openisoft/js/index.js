$("#send-request").click(function () {
    event.preventDefault();
    // run custom waitme
    run_waitMe_custom('roundBounce', '.snd-rqst', 'Sending...', 'horizontal');
    // send request
    var formData = new FormData();
    formData.append('name', $('#name').val());
    formData.append('email', $('#email').val());
    formData.append('phone', $('#phone').val());
    formData.append('address', $('#address').val());
    formData.append('message', $('#message').val());
    formData.append('date', $('#date').val());
    formData.append('send-request', true);
    $.ajax({
        url: "reg_exe.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            // stop waitme
            $('.snd-rqst').waitMe('hide');
            if (data == "success") {
                // swal fire success
                swal.fire({
                    title: "Success",
                    text: "Request sent successfully!",
                    icon: "success",
                    button: "OK",
                }).then(function () {
                    // reload page
                    location.reload();
                });
            } else {
                // swal fire error
                swal.fire({
                    title: "Error",
                    html: data,
                    icon: "error",
                    button: "OK",
                })
            }
        }
    });
});

// register
$("#register").click(function () {
    event.preventDefault();
    // run custom waitme
    run_waitMe_custom('roundBounce', '.register', 'Registering...', 'horizontal');
    // send request
    var formData = new FormData();
    formData.append('name', $('#name').val());
    formData.append('email', $('#email').val());
    formData.append('username', $('#username').val());
    formData.append('password', $('#password').val());
    formData.append('confirm-password', $('#confirm-password').val());
    formData.append('register', true);
    $.ajax({
        url: "../reg_exe.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            // stop waitme
            $('.register').waitMe('hide');
            if (data == "success") {
                // swal fire success
                swal.fire({
                    title: "Success",
                    text: "Registration successful!",
                    icon: "success",
                    button: "OK",
                }).then(function () {
                    // reload page
                    location.reload();
                });
            } else {
                // swal fire error
                swal.fire({
                    title: "Error",
                    html: data,
                    icon: "error",
                    button: "OK",
                })
            }
        }
    });
});
// login
$("#login").click(function () {
    event.preventDefault();
    // run custom waitme
    run_waitMe_custom('roundBounce', '.login', 'Login in...', 'horizontal');
    // send request
    var formData = new FormData();
    formData.append('username', $('#username').val());
    formData.append('password', $('#password').val());
    formData.append('login', true);
    $.ajax({
        url: "../reg_exe.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            // stop waitme
            $('.login').waitMe('hide');
            if (data == "success") {
                // swal fire success
                swal.fire({
                    title: "Success",
                    text: "successfully logged in!",
                    icon: "success",
                    button: "OK",
                }).then(function () {
                    // window location
                    window.location.href = "index.php";
                });
            } else {
                // swal fire error
                swal.fire({
                    title: "Error",
                    html: data,
                    icon: "error",
                    button: "OK",
                })
            }
        }
    });
});

// request-view
$(".request-view").click(function () {
    event.preventDefault();
    // clear #request-view-data
    $('#request-view-data').html('');
    // get this id
    var id = $(this).attr('id');
    console.log(id);
    // open request-view modal
    $('#request').modal('show');
    // run custom waitme
    run_waitMe_custom('roundBounce', '#request-view-data', 'Loading...', 'horizontal');
    // get the current row data
    var formData = new FormData();
    formData.append('id', id);
    formData.append('request-view', true);
    $.ajax({
        url: "../reg_exe.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            // stop waitme
            $('#request-view-data').waitMe('hide');
            // set the data
            $('#request-view-data').html(data);
        }
    });

});
// rate-us
$("#rate-us").click(function () {
    event.preventDefault();
    // run custom waitme
    run_waitMe_custom('roundBounce', '.snd-rt', 'Adding Rating...', 'horizontal');
    // send request
    var formData = new FormData();
    formData.append('name', $('#rate-name').val());
    formData.append('email', $('#rate-email').val());
    formData.append('message', $('#rate-message').val());
    formData.append('rating', $('#rate-rating').val());
    formData.append('rate-us', true);
    $.ajax({
        url: "reg_exe.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            // stop waitme
            $('.snd-rt').waitMe('hide');
            if (data == "success") {
                // swal fire success
                swal.fire({
                    title: "Success",
                    text: "Rating added successfully!",
                    icon: "success",
                    button: "OK",
                }).then(function () {
                    // reload page
                    location.reload();
                });
            } else {
                // swal fire error
                swal.fire({
                    title: "Error",
                    html: data,
                    icon: "error",
                    button: "OK",
                })
            }
        }
    });
});
