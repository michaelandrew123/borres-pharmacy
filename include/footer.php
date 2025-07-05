

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $(document).ready(function () {
        $("#loginForm").submit(function (e) {
            e.preventDefault();
            const $messageBox = $("#loginError");
            $.ajax({
                type: "POST",
                url: "./login.php",
                data: $(this).serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        $messageBox
                            .removeClass("d-none alert-danger")
                            .addClass("alert alert-success")
                            .text("Login successful! Redirecting...");
                        setTimeout(() => {
                            window.location.href = "index.php";
                        }, 1000);
                    } else {
                        $messageBox
                            .removeClass("d-none alert-success")
                            .addClass("alert alert-danger")
                            .text(response.message);
                    }
                },
                error: function () {
                    $messageBox
                        .removeClass("d-none alert-success")
                        .addClass("alert alert-danger")
                        .text("An unexpected error occurred. Please try again.");
                }
            });
        });


        $('#authModal').on('hidden.bs.modal', function () {
            $("#loginError")
                .addClass("d-none")
                .removeClass("alert-success alert-danger")
                .text('');
            $("#loginForm")[0].reset(); // optional: clear form
        });


        $("#registerForm").submit(function (e) {
            e.preventDefault();
            const $msg = $("#registerMessage");

            $.ajax({
                type: "POST",
                url: "register.php",
                data: $(this).serialize(),
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        $msg
                            .removeClass("d-none alert-danger")
                            .addClass("alert alert-success")
                            .html(response.message);
                        $("#registerForm")[0].reset();
                    } else {
                        $msg
                            .removeClass("d-none alert-success")
                            .addClass("alert alert-danger")
                            .text(response.message);
                    }
                },
                error: function () {
                    $msg
                        .removeClass("d-none alert-success")
                        .addClass("alert alert-danger")
                        .text("Something went wrong. Please try again.");
                }
            });
        });

        // Reset message and form on modal close
        $('#registerModal').on('hidden.bs.modal', function () {
            $("#registerMessage")
                .addClass("d-none")
                .removeClass("alert-success alert-danger")
                .html('');
            $("#registerForm")[0].reset();
        });
    });
</script>

</body>
</html>
