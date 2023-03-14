<?php
// if session is not set start session
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
/* echo "<pre>";
print_r($_SESSION);
echo "</pre>"; */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "head.php"; ?>
    <title>Requests - Garbage collection system</title>
</head>

<body>
    <!-- header -->
    <?php include "header.php"; ?>
    <div class="admin-container">

        <div class="left">
            <?php include "sidebar.php"; ?>
        </div>
        <div class="right">
            <!-- requests -->
            <div class="requests">
                <h3>Requests</h3>
                <div class="requests-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Request ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <!-- <th>Message</th> -->
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // include database connection
                            include "../dbh.php";
                            // select all requests
                            $sql = "SELECT * FROM requests";
                            $result = mysqli_query($conn, $sql);
                            // if there are requests
                            if (mysqli_num_rows($result) > 0) {
                                // fetch requests
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // echo "<pre>";
                                    // print_r($row);
                                    // echo "</pre>";
                                    $request_id = $row['id'];
                                    $name = $row['name'];
                                    $email = $row['email'];
                                    $phone = $row['phone'];
                                    $address = $row['address'];
                                    // $message = $row['message'];
                                    $date = $row['date'];
                                    echo "<tr>
                                    <td>#$request_id</td>
                                    <td>$name</td>
                                    <td>$email</td>
                                    <td>$phone</td>
                                    <td>$address</td>
                                    <td>$date</td>
                                    <td>
                                        <a href='reply.php?request_id=$request_id' class='btn btn-success'>Reply</a>
                                        <button id='$request_id' class='btn btn-primary request-view'><i class='fas fa-eye'></i></button>
                                        <a href='delete.php?request_id=$request_id' class='btn btn-danger'><i class='fas fa-trash'></i></a>
                                    </td>
                                </tr>";
                                }
                            } else {
                                echo "<tr>
                                <td colspan='7'>No requests</td>
                            </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- request-view modal-->
    <div class="modal" id="request">
        <div class="modal-header">
            <h3>View Request</h3>
        </div>
        <div class="modal-body" id="request-view-data">

        </div>
    </div>
    <script src="../js/index.js"></script>
</body>

</html>