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

// add-driver-rqst
if (isset($_POST['add-driver-rqst'])) {
    $name = $_POST['name'];
    $national_id = $_POST['national_id'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $license = $_POST['license'];
    $errors = [];
    if (empty($name)) {
        $errors['name'] = "Name field is required";
    }
    if (empty($national_id)) {
        $errors['national_id'] = "National ID field is required";
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
    if (empty($license)) {
        $errors['license'] = "License field is required";
    }
    if (count($errors) > 0) {
        foreach ($errors as $key => $value) {
            echo "<h5 style='color: red;'>$value</h5>";
        }
    } else {
        $sql = "INSERT INTO drivers (name, national_id, email, phone, address, license) VALUES ('$name', '$national_id', '$email', '$phone', '$address', '$license')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "success";
        } else {
            echo "Request failed" . mysqli_error($conn);
        }
    }
}

//  edit-driver-view
if (isset($_POST['edit-driver-view'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM drivers WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <!-- name -->
            <div class="form-control">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter your name" value="<?php echo $row['name'] ?>">
            </div>
            <!-- national id -->
            <div class="form-control">
                <label for="national_id">National ID</label>
                <input type="text" name="national_id" id="national_id" placeholder="Enter your national id" value="<?php echo $row['national_id'] ?>">
            </div>
            <!-- email -->
            <div class="form-control">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" value="<?php echo $row['email'] ?>">
            </div>
            <!-- phone -->
            <div class="form-control">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" placeholder="Enter your phone" value="<?php echo $row['phone'] ?>">
            </div>
            <!-- address -->
            <div class="form-control">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" placeholder="Enter your address" value="<?php echo $row['address'] ?>">
            </div>
            <!-- license -->
            <div class="form-control">
                <label for="license">License</label>
                <input type="text" name="license" id="license" placeholder="Enter your license" value="<?php echo $row['license'] ?>">
            </div>
            <!-- hidden id -->
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <!-- submit -->
            <div class="form-control edit-driver-rqst">
                <button type="submit" name="edit-driver" class="btn btn-primary edit-driver-view">Edit driver</button>
            </div>
        <?php
        }
    }
}
//  edit-driver
if (isset($_POST['edit-driver'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $national_id = $_POST['national_id'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $license = $_POST['license'];
    $errors = [];
    if (empty($name)) {
        $errors['name'] = "Name field is required";
    }
    if (empty($national_id)) {
        $errors['national_id'] = "National ID field is required";
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
    if (empty($license)) {
        $errors['license'] = "License field is required";
    }
    if (count($errors) > 0) {
        foreach ($errors as $key => $value) {
            echo "<h5 style='color: red;'>$value</h5>";
        }
    } else {
        $sql = "UPDATE drivers SET name = '$name', national_id = '$national_id', email = '$email', phone = '$phone', address = '$address', license = '$license' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // redirect to drivers page with success message
            $_SESSION['message'] = "Driver updated successfully";
            $_SESSION['type'] = "success";
            // header("Location: admin/drivers.php");
            // redirect using javascript
            echo "<script>window.location.href = 'admin/drivers.php'</script>";
        } else {
            echo "Request failed" . mysqli_error($conn);
        }
    }
}

// delete-driver
if (isset($_POST['delete-driver'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM drivers WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "success";
    } else {
        echo "Request failed" . mysqli_error($conn);
    }
}

// request-reply-view
if (isset($_POST['request-reply-view'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM requests WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <!-- compose an email to send to user's email -->
            <div class="form-control">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" value="<?php echo $row['email'] ?>">
            </div>
            <!-- subject -->
            <div class="form-control">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" placeholder="Enter your subject" value="">
            </div>
            <!-- message -->
            <div class="form-control">
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your message"></textarea>
            </div>
            <!-- hidden id -->
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <!-- submit -->
            <div class="form-control request-reply-rqst">
                <button type="submit" name="request-reply" class="btn btn-primary request-reply-view">Reply</button>
            </div>

        <?php
        }
    }
}
// request-reply
if (isset($_POST['request-reply'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $errors = [];
    if (empty($email)) {
        $errors['email'] = "Email field is required";
    }
    if (empty($subject)) {
        $errors['subject'] = "Subject field is required";
    }
    if (empty($message)) {
        $errors['message'] = "Message field is required";
    }
    if (count($errors) > 0) {
        /* foreach ($errors as $key => $value) {
            echo "<h5 style='color: red;'>$value</h5>";
        } */
        // redirect to requests page with error message
        $_SESSION['errors'] = $errors;
        // header("Location: admin/requests.php");
        // redirect using javascript
        echo "<script>window.location.href = 'admin/requests.php';</script>";
    } else {
        // send email to user
        $to = $email;
        $subject = $subject;
        $message = $message;
        $headers = "From: noreply@garbageCollection.com";
        if (mail($to, $subject, $message, $headers)) {
            // redirect to requests page with success message
            $_SESSION['message'] = "Email sent successfully";
            $_SESSION['type'] = "success";
            // header("Location: admin/requests.php");
            // redirect using javascript
            echo "<script>window.location.href = 'admin/requests.php';</script>";
        } else {
            echo "Request failed" . mysqli_error($conn);
        }
    }
}

// contact
if (isset($_POST['contact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $errors = [];
    if (empty($name)) {
        $errors['name'] = "Name field is required";
    }
    if (empty($email)) {
        $errors['email'] = "Email field is required";
    }
    if (empty($message)) {
        $errors['message'] = "Message field is required";
    }
    if (count($errors) > 0) {
        foreach ($errors as $key => $value) {
            echo "<h5 style='color: red;'>$value</h5>";
        }
    } else {
        // insert into database
        $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "success";
            // send email to admin
            $to = "josephjuma2509@gmail.com";
            $subject = "Contact form";
            $message = "Name: $name \nEmail: $email \nMessage: $message";
            $headers = "From: Garbage collector: $email";
            mail($to, $subject, $message, $headers);
            // send email to user
            $to = $email;
            $subject = "Message received";
            $message = "Thank you for contacting us. We will get back to you shortly.";
            $headers = "From: Garbage collector system";
            mail($to, $subject, $message, $headers);
        } else {
            echo "Request failed" . mysqli_error($conn);
        }
    }
}

// send-login-details
if (isset($_POST['send-login-details'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM drivers WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $email = $row['email'];
            $password = $row['national_id'];
            // send email to user
            $to = $email;
            $subject = "Login details";
            $message = "Your login details are: \nEmail: $email \nPassword: $password";
            $headers = "From: Garbage collector system";
            if (mail($to, $subject, $message, $headers)) {
                echo "success";
            } else {
                echo "Request failed" . mysqli_error($conn);
            }
        }
    } else {
        echo "Request failed" . mysqli_error($conn);
    }
}

// request-rating-view
if (isset($_POST['request-rating-view'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM ratings WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $email = $row['email'];
            $message = $row['message'];
        ?>
            <!-- compose an email to send to user's email -->
            <form action="../reg_exe.php" method="post">
                <div class="form-control">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name" value="<?php echo $name ?>" readonly>
                </div>
                <!-- email -->
                <div class="form-control">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" value="<?php echo $email ?>" readonly>
                </div>
                <!-- message -->
                <div class="form-control">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your message" readonly><?php echo $message ?></textarea>
                </div>
                <!-- your reply -->
                <div class="form-control">
                    <label for="reply">Your reply</label>
                    <textarea name="reply" id="reply" cols="30" rows="10" placeholder="Enter your reply"></textarea>
                </div>
                <!-- hidden id -->
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <!-- submit -->
                <div class="form-control request-reply-rqst">
                    <button type="submit" name="rating-reply" class="btn btn-primary request-reply-view">Reply</button>
                </div>
            </form>

<?php
        }
    }
}
// rating-reply
if (isset($_POST['rating-reply'])) {
    $id = $_POST['id'];
    $reply = $_POST['reply'];
    // get name, email and message
    $sql = "SELECT * FROM ratings WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $email = $row['email'];
            $message = $row['message'];
        }
        $errors = [];
        if (empty($reply)) {
            $errors['reply'] = "Reply field is required";
        }
        if (count($errors) > 0) {
            // display errors
            foreach ($errors as $key => $value) {
                echo "<h5 style='color: red;'>$value</h5>";
            }
            echo "this page will redirect in 3 seconds" . "<br>";
            echo "If it doesn't redirect, click <a href='admin/ratings.php'>here</a>";
            // redirect after 3 seconds using javascript
            echo "<script>setTimeout(() => {
                window.location.href = 'admin/ratings.php';
            }, 3000);</script>";
        } else {
            // send email to user
            $to = $email;
            $subject = "Reply to your rating";
            $message = "Your rating: \nName: $name \nEmail: $email \nMessage: $message \n\nReply: $reply";
            $headers = "From: Garbage collector system";
            if (mail($to, $subject, $message, $headers)) {
                echo "success";
            } else {
                echo "Request failed" . mysqli_error($conn) . "<br>";
                echo "this page will redirect in 3 seconds" . "<br>";
                echo "If it doesn't redirect, click <a href='admin/ratings.php'>here</a>";
                // redirect after 3 seconds using javascript
                echo "<script>setTimeout(() => {
                    window.location.href = 'admin/ratings.php';
                }, 3000);</script>";
            }
        }
    } else {
        echo "Request failed" . mysqli_error($conn);
    }
}
