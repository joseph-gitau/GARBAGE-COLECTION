<?php
// if session is not set start session
if (!isset($_SESSION)) {
    session_start();
}

include "dbh.php";

if (isset($_POST['send-request'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $errors = [];
    if (empty($name)) {
        $errors['name'] = "Name field is required";
    }
    if (empty($email)) {
        $errors['email'] = "Email field is required";
    }
    if (empty($phone)) {
        $errors['phone'] = "Phone field is required";
    }
    if (empty($address)) {
        $errors['address'] = "Address field is required";
    }
    if (empty($message)) {
        $errors['message'] = "Message field is required";
    }
    if (empty($date)) {
        $errors['date'] = "Date field is required";
    }

    if (count($errors) > 0) {
        foreach ($errors as $key => $value) {
            echo "<h5 style='color: red;'>$value</h5>";
        }
    } else {
        $sql = "INSERT INTO requests (name, email, phone, address, message, date) VALUES ('$name', '$email', '$phone', '$address', '$message', '$date')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "success";
        } else {
            echo "Request failed" . mysqli_error($conn);
        }
    }
}
// register
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $errors = [];
    if (empty($name)) {
        $errors['name'] = "Name field is required";
    }
    if (empty($email)) {
        $errors['email'] = "Email field is required";
    }
    if (empty($username)) {
        $errors['username'] = "Username field is required";
    }
    if (empty($password)) {
        $errors['password'] = "Password field is required";
    }
    if (empty($confirm_password)) {
        $errors['confirm-password'] = "Confirm password field is required";
    }
    if ($password != $confirm_password) {
        $errors['password'] = "Passwords does not match";
    }
    if (count($errors) > 0) {
        foreach ($errors as $key => $value) {
            echo "<h5 style='color: red;'>$value</h5>";
        }
    } else {
        // check if username exists
        $sql_username = "SELECT * FROM admins WHERE username = '$username'";
        $result_username = mysqli_query($conn, $sql_username);
        if (mysqli_num_rows($result_username) > 0) {
            echo "<h5 style='color: red;'>Username already taken</h5>";
            exit();
        } else {
            $sql = "INSERT INTO admins (name, email, username, password) VALUES ('$name', '$email', '$username', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "success";
            } else {
                echo "Registration failed" . mysqli_error($conn);
            }
        }
    }
}

// login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $errors = [];
    if (empty($username)) {
        $errors['username'] = "Username field is required";
    }
    if (empty($password)) {
        $errors['password'] = "Password field is required";
    }
    if (count($errors) > 0) {
        foreach ($errors as $key => $value) {
            echo "<h5 style='color: red;'>$value</h5>";
        }
    } else {
        $sql = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['id'];
            echo "success";
            // pretty dump session
            /* echo "<pre>";
            print_r($_SESSION);
            echo "</pre>";*/
        } else {
            echo "Login failed" . mysqli_error($conn);
        }
    }
}

// request-view-data
if (isset($_POST['request-view'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM requests WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>

            <form action="/reg_exe.php" method="POST">
                <!-- name -->
                <div class="form-control">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name" readonly value="<?php echo $row['name'] ?>">
                </div>
                <!-- email -->
                <div class="form-control">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" readonly value="<?php echo $row['email'] ?>">
                </div>
                <!-- phone -->
                <div class="form-control">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" placeholder="Enter your phone" readonly value="<?php echo $row['phone'] ?>">
                </div>
                <!-- address -->
                <div class="form-control">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" placeholder="Enter your address" readonly value="<?php echo $row['address'] ?>">
                </div>
                <!-- message -->
                <div class="form-control">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="5" placeholder="Enter your message" readonly value="<?php echo $row['message'] ?>"></textarea>
                </div>
                <!-- date of garbage request -->
                <div class="form-control">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" placeholder="Enter date" readonly value="<?php echo $row['date'] ?>">
                </div>
            </form>

<?php }
    }
}

// rate-us
if (isset($_POST['rate-us'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $message = $_POST['message'];
    $errors = [];
    if (empty($name)) {
        $errors['name'] = "Name field is required";
    }
    if (empty($email)) {
        $errors['email'] = "Email field is required";
    }
    if (empty($rating)) {
        $errors['rating'] = "Rating field is required";
    }
    if (empty($message)) {
        $errors['message'] = "Message field is required";
    }
    if (count($errors) > 0) {
        foreach ($errors as $key => $value) {
            echo "<h5 style='color: red;'>$value</h5>";
        }
    } else {
        $sql = "INSERT INTO ratings (name, email, rating, message) VALUES ('$name', '$email', '$rating', '$message')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "success";
        } else {
            echo "Request failed" . mysqli_error($conn);
        }
    }
}
